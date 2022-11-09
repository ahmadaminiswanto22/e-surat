<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('Login_m');
        $this->load->library('form_validation');
    }

    function index()
    {
        $data['login'] = 'Login';
        $this->load->view('login_v', $data);
    }

    function logout()
    {
        $this->session->sess_destroy();
        $this->session->set_flashdata('gagal', 'LogOut');
        redirect('login');
    }

    public function cek_login()
    {
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        if ($this->Login_m->CekLogin($username, $password)) {
            $this->session->set_flashdata('flash', 'Login');
            redirect('home');
        } else {
            $this->session->set_flashdata('gagal', 'Username & Password Salah');
            redirect('login');
        }
    }
}
