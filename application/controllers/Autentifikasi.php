<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Autentifikasi extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('ModelUser');
    }

    public function index() {
        if ($this->session->userdata('email')) {
            redirect('user');
        }

        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email', [
            'required' => 'Email harus diisi!',
            'valid_email' => 'Format email tidak valid!'
        ]);
        $this->form_validation->set_rules('password', 'Password', 'required|trim', [
            'required' => 'Password harus diisi!'
        ]);

        if ($this->form_validation->run() == false) {
            $data['judul'] = 'Form Login';
            $this->load->view('admin/aute_header', $data);
            $this->load->view('admin/login');
            $this->load->view('admin/aute_footer');
        } else {
            $this->_login();
        }
    }

  private function _login() {
    $email = $this->input->post('email', true);
    $password = $this->input->post('password', true);
    $user = $this->ModelUser->cekData(['email' => $email])->row_array();

    if ($user) {
        if ($user['is_active'] == 1) {
            if (password_verify($password, $user['password'])) {
                $data = [
                    'user_id' => $user['id'],  
                    'email' => $user['email'],
                    'role_id' => $user['role_id']
                ];
                $this->session->set_userdata($data);
                redirect($user['role_id'] == 1 ? 'admin' : 'user');
            } else {
                $this->session->set_flashdata('pesan', '<div class="alert alert-danger">Password salah!</div>');
                redirect('autentifikasi');
            }
        } else {
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger">Akun belum diaktivasi!</div>');
            redirect('autentifikasi');
        }
    } else {
        $this->session->set_flashdata('pesan', '<div class="alert alert-danger">Email tidak terdaftar!</div>');
        redirect('autentifikasi');
    }
}

    
    public function logout() {
        $this->session->unset_userdata('email');
        $this->session->unset_userdata('role_id');
        $this->session->set_flashdata('pesan', '<div class="alert alert-success">Anda telah logout!</div>');
        redirect('autentifikasi');
    }
}
