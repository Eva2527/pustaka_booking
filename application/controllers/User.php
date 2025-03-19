
<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
     public function __construct()
    {
        parent::__construct();
        $this->load->helper('pustaka_helper');
        cek_login();
        cek_user();
    }

    public function index()
    {
        $data['judul'] = 'Profil Saya';
        $data['user'] = $this->ModelUser->cekData(['email' => $this->session->userdata('email')])->row_array();
        $this->load->view('admin/header', $data);
        $this->load->view('admin/sidebar', $data);
        $this->load->view('admin/topbar', $data);
        $this->load->view('user/index', $data);
        $this->load->view('admin/footer');
    }

    public function anggota()
    {
        $data['judul'] = 'Data Anggota';
        $data['user'] = $this->ModelUser->cekData(['email'=> $this->session->userdata('email')])->row_array();
        $this->db->where('role_id', 2);
        $data['anggota'] = $this->db->get('user')->result_array();
        $this->load->view('admin/header', $data);
        $this->load->view('admin/sidebar', $data);
        $this->load->view('admin/topbar', $data);
        $this->load->view('user/anggota', $data);
        $this->load->view('admin/footer');
    }

   public function ubahProfil()
{
    $data['judul'] = 'Ubah Profil';
    $data['user'] = $this->ModelUser->cekData(['email' => $this->session->userdata('email')])->row_array();

    $this->form_validation->set_rules('nama', 'Nama Lengkap', 'required|trim', [
        'required' => 'Nama tidak boleh kosong'
    ]);

    if ($this->form_validation->run() == false) {
        $this->load->view('admin/header', $data);
        $this->load->view('admin/sidebar', $data);
        $this->load->view('admin/topbar', $data);
        $this->load->view('user/ubah-profile', $data);
        $this->load->view('admin/footer');
    } else {
        $nama = $this->input->post('nama', true);
        $email = $this->input->post('email', true);

        
        $user = $this->ModelUser->cekData(['email' => $email])->row_array();
        $gambar_lama = $user['gambar'];

        
        if (!empty($_FILES['gambar']['name'])) {
            $config['upload_path'] = './assets/img/profile/';
            $config['allowed_types'] = '*';
            $config['max_size']     = '5000'; 
            $config['file_name'] = 'profile_' . time();

            $this->load->library('upload', $config);

            if ($this->upload->do_upload('gambar')) {
                
                if ($gambar_lama != 'default.jpg' && file_exists(FCPATH . 'assets/img/profile/' . $gambar_lama)) {
                    unlink(FCPATH . 'assets/img/profile/' . $gambar_lama);
                }

              
                $gambar_baru = $this->upload->data('file_name');
                $this->db->set('gambar', $gambar_baru);
            } else {
               
                $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">Gagal mengunggah gambar: ' . $this->upload->display_errors('', '') . '</div>');
                redirect('user');
                return;
            }
        }

        // Update nama di database
        $this->db->set('nama', $nama);
        $this->db->where('email', $email);
        $this->db->update('user');

        // Flash message
        $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Profil berhasil diubah!</div>');
        redirect('user');
    }
}

}
