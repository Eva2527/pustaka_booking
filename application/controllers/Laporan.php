<?php 
defined('BASEPATH') or exit('No Direct script access allowed'); 
class Laporan extends CI_Controller { 
    function __construct() { 
        parent::__construct(); 
    } 
    
    public function laporan_buku() { 
        $data['judul'] = 'Laporan Data Buku'; 
        $data['user'] = $this->ModelUser->cekData(['email' => $this->session->userdata('email')])->row_array(); 
        $data['buku'] = $this->ModelBuku->getBuku()->result_array(); 
        $data['kategori'] = $this->ModelBuku->getKategori()->result_array(); 
        $this->load->view('admin/header', $data); 
        $this->load->view('admin/sidebar', $data); 
        $this->load->view('admin/topbar', $data); 
        $this->load->view('buku/laporan_buku', $data); 
        $this->load->view('admin/footer'); 
    }
        public function cetak_laporan_buku(){
        $data['buku'] = $this->ModelBuku->getBuku()->result_array();
        $data['kategori'] = $this->ModelBuku->getKategori()->result_array();
        $this->load->view('buku/laporan_print_buku',$data);
    }
public function laporan_buku_pdf()
    {
        $user_id = $this->session->userdata('user_id');  
        $data['buku'] = $this->ModelBuku->getBuku()->result_array(); 
        $this->load->library('dompdf_gen');
        $this->load->view('buku/laporan_pdf_buku', $data); 
        $paper_size = 'A4'; 
       
        $orientation = 'landscape';
        
        $html = $this->output->get_output(); 
        $this->dompdf->set_paper($paper_size, $orientation);  
        $this->dompdf->load_html($html); 
        $this->dompdf->render();
        $this->dompdf->stream("laporanbuku.pdf", array('Attachment' => 0));
    }
 public function export_excel()
    {
        $data = array( 'title' => 'Laporan Buku','buku' => $this->ModelBuku->getBuku()->result_array());
        $this->load->view('buku/export_excel_buku', $data);
    }

    public function laporan_pinjam()
    { 
    $data['judul'] = 'Laporan Data Peminjaman'; 
    $data['user'] = $this->ModelUser->cekData(['email' => $this->session->userdata('email')])->row_array(); 
    $data['laporan'] = $this->db->query("select * from pinjam p,detail_pinjam d, buku b,user u where d.buku_id=b.id and p.user_id=u.id and p.no_pinjam=d.no_pinjam")->result_array(); 
    $this->load->view('admin/header', $data); 
    $this->load->view('admin/sidebar', $data); 
    $this->load->view('admin/topbar', $data); 
    $this->load->view('pinjam/laporan-pinjam', $data);
    $this->load->view('admin/footer'); 
    }
    public function cetak_laporan_pinjam() 
    {
        $data['laporan'] = $this->db->query("select * from pinjam p,detail_pinjam d, buku b,user u where d.buku_id=b.id and p.user_id=u.id and p.no_pinjam=d.no_pinjam")->result_array();
        $this->load->view('pinjam/laporan-print-pinjam', $data); 
    }

    public function export_excel_pinjam() 
    { 
        $data = array( 'title' => 'Laporan Data Peminjaman Buku', 'laporan' => $this->db->query("select * from pinjam p,detail_pinjam d, buku b,user u where d.buku_id=b.id and p.user_id=u.id and p.no_pinjam=d.no_pinjam")->result_array()); 
        $this->load->view('pinjam/export-excel-pinjam', $data); 
    }
public function laporan_pinjam_pdf()
{
    $this->load->library('dompdf_gen');

    
    $this->db->select('user.nama, buku.judul_buku, pinjam.tgl_pinjam, pinjam.tgl_kembali, pinjam.total_denda, pinjam.status');
    $this->db->from('pinjam');
    $this->db->join('user', 'user.id = pinjam.user_id');
    $this->db->join('detail_pinjam', 'detail_pinjam.no_pinjam = pinjam.no_pinjam');
    $this->db->join('buku', 'buku.id = detail_pinjam.buku_id');
    $data['laporan'] = $this->db->get()->result_array();

 
    $html = $this->load->view('pinjam/laporan-pdf-pinjam', $data, TRUE);

    
    $this->dompdf->set_paper('A4', 'portrait');
    $this->dompdf->load_html($html);
    $this->dompdf->render();

    
    $this->dompdf->stream("laporan_pinjam.pdf", array("Attachment" => 0));
}

public function laporan_anggota()
{ 
    $data['judul'] = 'Laporan Data Anggota'; 
    $data['user'] = $this->ModelUser->cekData(['email' => $this->session->userdata('email')])->row_array(); 
    
    $data['laporan'] = $this->db->get_where('user', ['role_id' => 2])->result_array(); 

    $this->load->view('admin/header', $data); 
    $this->load->view('admin/sidebar', $data); 
    $this->load->view('admin/topbar', $data); 
    $this->load->view('member/laporan-anggota', $data);
    $this->load->view('admin/footer'); 
}
public function cetak_laporan_anggota()
{
    $data['laporan'] = $this->db->get_where('user', ['role_id' => 2])->result_array();
    $this->load->view('member/cetak_laporan_anggota', $data);
}


public function laporan_anggota_pdf()
{
    $this->load->library('dompdf_gen');

    $data['laporan'] = $this->db->get_where('user', ['role_id' => 2])->result_array();

    $this->load->view('member/laporan_anggota_pdf', $data); // Perbaiki path view

    $paper_size = 'A4';
    $orientation = 'portrait';
    $html = $this->output->get_output();

    $this->dompdf->set_paper($paper_size, $orientation);
    $this->dompdf->load_html($html);
    $this->dompdf->render();
    $this->dompdf->stream("laporan_anggota.pdf", array("Attachment" => 0));
}

public function export_excel_anggota()
{
    $data['laporan'] = $this->db->get_where('user', ['role_id' => 2])->result_array();

    header("Content-type: application/vnd-ms-excel");
    header("Content-Disposition: attachment; filename=Laporan_Anggota.xls");

    $this->load->view('member/export_excel_anggota', $data);
}


}
