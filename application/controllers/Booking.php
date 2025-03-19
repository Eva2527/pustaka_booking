<?php 
defined('BASEPATH') or exit('No Direct Script Access Allowed'); 
date_default_timezone_set('Asia/Jakarta'); 
class Booking extends CI_Controller { 
    public function __construct() { 
        parent::__construct();
        $this->load->helper('pustaka_helper'); 
        cek_login(); 
       
    } 
    
    public function index() { 
        $id = ['bo.user_id' => $this->uri->segment(3)]; 
        $user_id = $this->session->userdata('user_id'); 
        $data['booking'] = $this->ModelBooking->joinOrder($id)->result(); 
        $user = $this->ModelUser->cekData(['email' => $this->session->userdata('email')])->row_array(); 
        foreach ($user as $a) { 
            $data = [ 'gambar' => $user['gambar'], 'user' => $user['nama'], 'email' => $user['email'], 'tanggal_input' => $user['tanggal_input'] ]; 
        } 
        $dtb = $this->ModelBooking->showtemp(['user_id' => $user_id])->num_rows();
        if ($dtb < 1) {
            $this->session->set_flashdata('pesan', '<div class="alert alert-massege alert-danger" role="alert">Tidak Ada Buku dikeranjang</div>'); 
            redirect(base_url()); 
        } 
        else { 
            $data['temp'] = $this->db->query("select gambar, judul_buku, penulis, penerbit, tahun_terbit,buku_id from temp where user_id='$user_id'")->result_array(); 
        } 
        $data['judul'] = "Data Booking"; 
        $this->load->view('template/header', $data); 
        $this->load->view('booking/data-booking', $data);
         
        $this->load->view('template/modal'); 
        $this->load->view('template/footer'); 
    }   
    public function tambahBooking() { 
        $buku_id = $this->uri->segment(3);
   
        $d = $this->db->query("select*from buku where id='$buku_id'")->row(); 
    
        $isi = [ 
            'buku_id' => $buku_id, 
            'judul_buku' => $d->judul_buku, 
            'user_id' => $this->session->userdata('user_id'), 
            'email_user' => $this->session->userdata('email'), 
            'tgl_booking' => date('Y-m-d H:i:s'), 
            'gambar' => $d->gambar, 
            'penulis' => $d->pengarang, 
            'penerbit' => $d->penerbit, 
            'tahun_terbit' => $d->tahun_terbit ]; 
    
        $temp = $this->ModelBooking->getDataWhere('temp', ['buku_id' => $buku_id])->num_rows(); 
        $userid = $this->session->userdata('user_id'); 
      
        $tempuser = $this->db->query("select*from temp where user_id ='$userid'")->num_rows(); 

        $databooking = $this->db->query("select*from booking where user_id='$userid'")->num_rows(); 
        if ($databooking > 0) { 
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-message" role="alert">Masih Ada booking buku sebelumnya yang belum diambil.<br> Abmil Buku yang dibooking atau tunggu 1x24 Jam untuk bisa booking kembali </div>'); 
            redirect(base_url()); 
        } 
      
        if ($temp > 0) { 
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-message" role="alert">Buku ini Sudah anda booking </div>'); 
            redirect(base_url() . 'home');
        } 
     
        if ($tempuser == 3) { 
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-message" role="alert">Booking Buku Tidak Boleh Lebih dari 3</div>'); 
            redirect(base_url() . 'home'); 
        } 
      
        $this->ModelBooking->createTemp();
        $this->ModelBooking->insertData('temp', $isi);
       
        $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-message" role="alert">Buku berhasil ditambahkan ke keranjang </div>'); 
        redirect(base_url() . 'home');
    }
public function hapusbooking() { 
        $buku_id = $this->uri->segment(3); 
        $user_id = $this->session->userdata('user_id'); 
        $this->ModelBooking->deleteData(['buku_id' => $buku_id], 'temp'); 
        $kosong = $this->db->query("select*from temp where user_id='$user_id'")->num_rows(); 
        if ($kosong < 1) { 
            $this->session->set_flashdata('pesan', '<div class="alert alert-massege alert-danger" role="alert">Tidak Ada Buku dikeranjang</div>'); 
            redirect(base_url()); 
        } 
        else { 
            redirect(base_url() . 'booking'); 
        } 
    }
public function bookingSelesai($where) { 
        
        $this->db->query("UPDATE buku, temp SET buku.dibooking=buku.dibooking+1, buku.stok=buku.stok-1 WHERE buku.id=temp.buku_id"); 
        $tglsekarang = date('Y-m-d'); 
        $isibooking = [ 'booking_id' => $this->ModelBooking->kodeOtomatis('booking', 'booking_id'), 'tgl_booking' => date('Y-m-d H:m:s'), 'batas_ambil' => date('Y-m-d', strtotime('+2 days', strtotime($tglsekarang))), 'user_id' => $where ]; 
      
        $this->ModelBooking->insertData('booking', $isibooking); 
        $this->ModelBooking->simpanDetail($where); 
        $this->ModelBooking->kosongkanData('temp'); redirect(base_url() . 'booking/info'); 
    }
public function info() { 
        $where = $this->session->userdata('user_id'); 
        $data['user'] = $this->session->userdata('nama'); 
        $data['judul'] = "Selesai Booking"; 
        $data['useraktif'] = $this->ModelUser->cekData(['id' => $this->session->userdata('user_id')])->result(); 
        $data['items'] = $this->db->query("select*from booking bo, booking_detail d, buku bu where d.booking_id=bo.booking_id and d.buku_id=bu.id and bo.user_id='$where'")->result_array(); 
        $this->load->view('template/header', $data); 
        $this->load->view('booking/info-booking', $data); 
        $this->load->view('template/modal'); 
        $this->load->view('template/footer'); 
    }
public function exportToPdf() { 
        $user_id = $this->session->userdata('user_id'); 
        $data['user'] = $this->session->userdata('nama'); 
        $data['judul'] = "Cetak Bukti Booking"; 
        $data['useraktif'] = $this->ModelUser->cekData(['id' => $this->session->userdata('user_id')])->result(); 
        $data['items'] = $this->db->query("select*from booking bo, booking_detail d, buku bu where d.booking_id=bo.booking_id and d.buku_id=bu.id and bo.user_id='$user_id'")->result_array(); 
        $this->load->library('dompdf_gen');
        $this->load->view('booking/bukti-pdf', $data); 
        $paper_size = 'A4'; 
       
        $orientation = 'landscape';
      
        $html = $this->output->get_output(); 
        $this->dompdf->set_paper($paper_size, $orientation); 
        //Convert to PDF 
        $this->dompdf->load_html($html); 
        $this->dompdf->render();
        ob_end_clean(); 
        $this->dompdf->stream("bukti-booking-$user_id.pdf", array('Attachment' => 0)); // nama file pdf yang di hasilkan 
    }
    

}

