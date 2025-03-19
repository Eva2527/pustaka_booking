<?php
if (!defined('BASEPATH')) exit('No Direct Script Access Allowed');

class Pinjam extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->helper('pustaka_helper');
        cek_login();
        cek_user();
    }

    public function index() {
        $data['judul'] = "Data Pinjam";
        $data['user'] = $this->ModelUser->cekData(['email' => $this->session->userdata('email')])->row_array();
        $data['pinjam'] = $this->ModelPinjam->joinData();
        $this->load->view('admin/header', $data);
        $this->load->view('admin/sidebar', $data);
        $this->load->view('admin/topbar', $data);
        $this->load->view('pinjam/data-pinjam', $data);
        $this->load->view('admin/footer');
    }

    public function daftarBooking() {
        $data['judul'] = "Daftar Booking";
        $data['user'] = $this->ModelUser->cekData(['email' => $this->session->userdata('email')])->row_array();
        $data['pinjam'] = $this->db->select('bo.booking_id, bo.tgl_booking, bo.user_id, IFNULL(u.nama, "Nama tidak ditemukan") as nama')
            ->from('booking bo')
            ->join('user u', 'bo.user_id = u.id', 'left')
            ->get()
            ->result_array();
        $this->load->view('admin/header', $data);
        $this->load->view('admin/sidebar', $data);
        $this->load->view('admin/topbar', $data);
        $this->load->view('booking/daftar-booking', $data);
        $this->load->view('admin/footer');
    }

    public function bookingDetail() {
        $booking_id = $this->uri->segment(3);
        $data['judul'] = "Booking Detail";
        $data['user'] = $this->ModelUser->cekData(['email' => $this->session->userdata('email')])->row_array();
        $data['agt_booking'] = $this->db->query("SELECT * FROM booking b, user u WHERE b.user_id=u.id AND b.booking_id='$booking_id'")->result_array();
        $data['detail'] = $this->db->query("SELECT buku_id, judul_buku, pengarang, penerbit, tahun_terbit FROM booking_detail d, buku b WHERE d.buku_id=b.id AND d.booking_id='$booking_id'")->result_array();
        $this->load->view('admin/header', $data);
        $this->load->view('admin/sidebar', $data);
        $this->load->view('admin/topbar', $data);
        $this->load->view('booking/booking-detail', $data);
        $this->load->view('admin/footer');
    }

    public function pinjamAct() {
        $booking_id = $this->uri->segment(3);
        $lama = $this->input->post('lama', TRUE);
        $bo = $this->db->query("SELECT * FROM booking WHERE booking_id='$booking_id'")->row();

        if (!$bo) {
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger">Data booking tidak ditemukan</div>');
            redirect(base_url('pinjam'));
            return;
        }

        $tglsekarang = date('Y-m-d');
        $no_pinjam = $this->ModelBooking->kodeOtomatis('pinjam', 'no_pinjam');
        $tgl_kembali = date('Y-m-d', strtotime('+' . $lama . ' days', strtotime($tglsekarang)));

        $databooking = [
            'no_pinjam' => $no_pinjam,
            'booking_id' => $booking_id,
            'tgl_pinjam' => $tglsekarang,
            'user_id' => $bo->user_id,
            'tgl_kembali' => $tgl_kembali,
            'status' => 'Pinjam',
            'total_denda' => 0
        ];

        $this->db->trans_start(); 

        $this->ModelPinjam->simpanPinjam($databooking);
        $this->ModelPinjam->simpanDetail($booking_id, $no_pinjam);

        $denda = $this->input->post('denda', TRUE);
        $this->db->query("UPDATE detail_pinjam SET denda='$denda'");

        // Update stok buku dengan kondisi aman
        $this->db->query("
            UPDATE buku 
            JOIN detail_pinjam ON buku.id = detail_pinjam.buku_id 
            SET buku.dipinjam = buku.dipinjam + 1, 
                buku.dibooking = CASE 
                    WHEN buku.dibooking > 0 THEN buku.dibooking - 1 
                    ELSE 0 
                END
            WHERE detail_pinjam.no_pinjam = '$no_pinjam'
        ");

        
        $this->ModelPinjam->deleteData('booking', ['booking_id' => $booking_id]);
        $this->ModelPinjam->deleteData('booking_detail', ['booking_id' => $booking_id]);

        $this->db->trans_complete(); 

        $this->session->set_flashdata('pesan', '<div class="alert alert-success">Data Peminjaman Berhasil Disimpan</div>');
        redirect(base_url('pinjam'));
    }

    public function ubahStatus() {
        $buku_id = $this->uri->segment(3);
        $no_pinjam = $this->uri->segment(4);

        $pinjam = $this->db->query("SELECT * FROM pinjam WHERE no_pinjam='$no_pinjam'")->row();

        if (!$pinjam) {
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger">Data peminjaman tidak ditemukan</div>');
            redirect(base_url('pinjam'));
            return;
        }

        $tgl_sekarang = date('Y-m-d');
        $status = 'Kembali';

        $selisih_hari = max(0, (strtotime($tgl_sekarang) - strtotime($pinjam->tgl_kembali)) / (60 * 60 * 24));
        $denda_per_hari = 5000;
        $total_denda = $selisih_hari * $denda_per_hari;

        $this->db->trans_start(); 

        $this->db->query("UPDATE pinjam SET status='$status', tgl_pengembalian='$tgl_sekarang', total_denda='$total_denda' WHERE no_pinjam='$no_pinjam'");

        
        $this->db->query("
            UPDATE buku 
            JOIN detail_pinjam ON buku.id = detail_pinjam.buku_id 
            SET buku.dipinjam = CASE 
                    WHEN buku.dipinjam > 0 THEN buku.dipinjam - 1 
                    ELSE 0 
                END, 
                buku.stok = buku.stok + 1 
            WHERE detail_pinjam.no_pinjam = '$no_pinjam'
        ");

        $this->db->trans_complete(); 

        $this->session->set_flashdata('pesan', '<div class="alert alert-success">Buku berhasil dikembalikan</div>');
        redirect(base_url('pinjam'));
    }
}
