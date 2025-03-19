<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Buku extends CI_Controller {

    public function __construct() { 
        parent::__construct(); 
         $this->load->library('form_validation');
     
    }
   public function hapusBuku() { 
    $where = ['id' => $this->uri->segment(3)]; 
    $this->ModelBuku->hapusBuku($where); 

    $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
        Buku berhasil dihapus!
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>');

    redirect('buku'); 
}


 public function index()
{
    $data['judul'] = 'Data Buku'; 
    $data['user'] = $this->ModelUser->cekData(['email' => $this->session->userdata('email')])->row_array(); 
    $data['buku'] = $this->ModelBuku->getBuku()->result_array(); 
    $data['kategori'] = $this->ModelBuku->getKategori()->result_array();

    $this->form_validation->set_rules('judul_buku', 'Judul Buku', 'required|min_length[3]', [
        'required' => 'Judul Buku harus diisi', 
        'min_length' => 'Judul buku terlalu pendek'
    ]); 
    $this->form_validation->set_rules('kategori_id', 'Kategori', 'required', [
        'required' => 'Kategori harus diisi',
    ]); 
    $this->form_validation->set_rules('pengarang', 'Nama Pengarang', 'required|min_length[3]', [
        'required' => 'Nama pengarang harus diisi', 
        'min_length' => 'Nama pengarang terlalu pendek'
    ]); 
    $this->form_validation->set_rules('penerbit', 'Nama Penerbit', 'required|min_length[3]', [
        'required' => 'Nama penerbit harus diisi', 
        'min_length' => 'Nama penerbit terlalu pendek'
    ]); 
    $this->form_validation->set_rules('tahun', 'Tahun Terbit', 'required|min_length[4]|max_length[4]|numeric', [
        'required' => 'Tahun terbit harus diisi', 
        'min_length' => 'Tahun terbit terlalu pendek', 
        'max_length' => 'Tahun terbit terlalu panjang', 
        'numeric' => 'Hanya boleh diisi angka'
    ]); 
    $this->form_validation->set_rules('isbn', 'Nomor ISBN', 'required|min_length[3]|numeric', [
        'required' => 'Nomor ISBN harus diisi', 
        'min_length' => 'Nomor ISBN terlalu pendek', 
        'numeric' => 'Yang Anda masukkan bukan angka'
    ]); 
    $this->form_validation->set_rules('stok', 'Stok', 'required|numeric', [
        'required' => 'Stok harus diisi', 
        'numeric' => 'Yang Anda masukkan bukan angka'
    ]); 

  
    $config['upload_path'] = './assets/img/upload/'; 
    $config['allowed_types'] = 'jpg|png|jpeg'; 
    $config['max_size'] = '3000'; 
    $config['max_width'] = '1024'; 
    $config['max_height'] = '1000'; 
    $config['file_name'] = 'img' . time(); 

    $this->load->library('upload', $config); 

    if ($this->form_validation->run() == false) { 
        $this->load->view('admin/header', $data); 
        $this->load->view('admin/sidebar', $data); 
        $this->load->view('admin/topbar', $data); 
        $this->load->view('buku/index', $data); 
        $this->load->view('admin/footer'); 
    } 
    else { 
        if ($this->upload->do_upload('gambar')) { 
            $gambar = $this->upload->data(); 
            $gambar = $gambar['file_name']; 
        } 
        else { 
            $gambar = ''; 
        } 

        $data = [ 
            'judul_buku' => $this->input->post('judul_buku', true), 
            'kategori_id' => $this->input->post('kategori_id', true), 
            'pengarang' => $this->input->post('pengarang', true), 
            'penerbit' => $this->input->post('penerbit', true), 
            'tahun_terbit' => $this->input->post('tahun', true), 
            'isbn' => $this->input->post('isbn', true), 
            'stok' => $this->input->post('stok', true), 
            'dipinjam' => 0, 
            'dibooking' => 0, 
            'gambar' => $gambar 
        ]; 

        $this->ModelBuku->simpanBuku($data);

       
        $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Buku berhasil ditambahkan!</div>');

        redirect('buku'); 
    } 
}
 
   public function ubahBuku()
{
    $data['judul'] = 'Ubah Data Buku';
    $data['user']  = $this->ModelUser->cekData(['email' => $this->session->userdata('email')])->row_array();

    
    $id_buku = $this->uri->segment(3);

   
    $data['buku'] = $this->ModelBuku->bukuWhere(['id' => $id_buku])->row_array();


    if (!$data['buku']) {
        $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">Data buku tidak ditemukan!</div>');
        redirect('buku');
    }

   
    $data['kategori'] = $this->ModelBuku->getKategori()->result_array();

   
    $this->form_validation->set_rules('judul_buku', 'Judul Buku', 'required|min_length[3]', [
        'required'   => 'Judul Buku harus diisi',
        'min_length' => 'Judul buku terlalu pendek'
    ]);
    $this->form_validation->set_rules('kategori_id', 'Kategori', 'required', [
        'required' => 'Kategori harus dipilih'
    ]);
    $this->form_validation->set_rules('pengarang', 'Pengarang', 'required|min_length[3]', [
        'required'   => 'Nama pengarang harus diisi',
        'min_length' => 'Nama pengarang terlalu pendek'
    ]);
    $this->form_validation->set_rules('penerbit', 'Penerbit', 'required|min_length[3]', [
        'required'   => 'Nama penerbit harus diisi',
        'min_length' => 'Nama penerbit terlalu pendek'
    ]);
    $this->form_validation->set_rules('tahun', 'Tahun Terbit', 'required|exact_length[4]|numeric', [
        'required'     => 'Tahun terbit harus diisi',
        'exact_length' => 'Tahun terbit harus 4 digit',
        'numeric'      => 'Tahun terbit harus berupa angka'
    ]);
    $this->form_validation->set_rules('isbn', 'ISBN', 'required|min_length[3]|numeric', [
        'required'   => 'ISBN harus diisi',
        'min_length' => 'ISBN terlalu pendek',
        'numeric'    => 'ISBN harus berupa angka'
    ]);
    $this->form_validation->set_rules('stok', 'Stok', 'required|numeric', [
        'required' => 'Stok harus diisi',
        'numeric'  => 'Stok harus berupa angka'
    ]);

      $config['upload_path']   = './assets/img/upload/';
    $config['allowed_types'] = 'jpg|png|jpeg';
    $config['max_size']      = 3000;
    $config['max_width']     = 3000;
    $config['max_height']    = 3000;
    $config['file_name']     = 'img' . time();

    $this->load->library('upload', $config);

    if ($this->form_validation->run() == false) {
        $this->load->view('admin/header', $data);
        $this->load->view('admin/sidebar', $data);
        $this->load->view('admin/topbar', $data);
        $this->load->view('buku/ubah_buku', $data);
        $this->load->view('admin/footer');
    } else {
       

       
        if ($this->upload->do_upload('gambar')) {
            $gambar = $this->upload->data();
          
            if ($this->input->post('old_pict', TRUE)) {
                unlink('./assets/img/upload/' . $this->input->post('old_pict', TRUE));
            }
            $gambar = $gambar['file_name'];
        } else {
       
            $gambar = $this->input->post('old_pict', TRUE);
        }

        $updateData = [
            'judul_buku'   => $this->input->post('judul_buku', true),
            'kategori_id'  => $this->input->post('kategori_id', true),
            'pengarang'    => $this->input->post('pengarang', true),
            'penerbit'     => $this->input->post('penerbit', true),
            'tahun_terbit' => $this->input->post('tahun', true),
            'isbn'         => $this->input->post('isbn', true),
            'stok'         => $this->input->post('stok', true),
            'gambar'       => $gambar
        ];

        $this->ModelBuku->updateBuku($updateData, ['id' => $id_buku]);
        $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Data buku berhasil diperbarui!</div>');
        redirect('buku');
    }
}

public function kategori()
{
    $data['judul'] = 'Kategori Buku';
    $data['user'] = $this->ModelUser->cekData(['email' => $this->session->userdata('email')])->row_array();
    $data['kategori'] = $this->ModelBuku->getKategori()->result_array();

    $this->form_validation->set_rules('nama_kategori', 'Kategori', 'required', [
        'required' => 'Nama Kategori harus diisi'
    ]);

    if ($this->form_validation->run() == false) {
        $this->load->view('admin/header', $data);
        $this->load->view('admin/sidebar', $data);
        $this->load->view('admin/topbar', $data);
        $this->load->view('buku/kategori', $data);
        $this->load->view('admin/footer');
    } else {
        $data = ['nama_kategori' => $this->input->post('nama_kategori')];
        $this->ModelBuku->simpanKategori($data);

        
        $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Kategori berhasil ditambahkan!</div>');

        redirect('buku/kategori');
    }
}

public function hapusKategori($id)
{
    $where = ['kategori_id' => $id];
    $this->ModelBuku->hapusKategori($where);


    $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">Kategori berhasil dihapus!</div>');

    redirect('buku/kategori');
}

  public function updateKategori($id)
{
    $data['judul'] = 'Ubah Data Kategori';
    $data['user'] = $this->ModelUser->cekData(['email' => $this->session->userdata('email')])->row_array();
    $data['kategori'] = $this->ModelBuku->kategoriWhere(['kategori_id' => $id])->row_array();

    $this->form_validation->set_rules('nama_kategori', 'Nama Kategori', 'required|min_length[3]', [
        'required' => 'Nama Kategori harus diisi',
        'min_length' => 'Nama Kategori terlalu pendek'
    ]);

    if ($this->form_validation->run() == false) {
        $this->load->view('admin/header', $data);
        $this->load->view('admin/sidebar', $data);
        $this->load->view('admin/topbar', $data);
        $this->load->view('buku/ubah_kategori', $data);
        $this->load->view('admin/footer');
    } else {
        $data = [
            'nama_kategori' => $this->input->post('nama_kategori', true)
        ];

        $this->ModelBuku->updateKategori(['kategori_id' => $id], $data);
        $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Kategori berhasil diubah.</div>');
        redirect('buku/kategori');
    }
}




}
