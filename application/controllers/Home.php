<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{

    function __construct()
    {
        parent::__construct();

        if (!$this->session->userdata('is_login')) {
            $this->session->set_flashdata('gagal', 'Silahkan Login Disini!');
            redirect('login');
        }
    }

    function index()
    {
        $data['judul'] = 'Home';
        $this->load->view('templates/header', $data);
        $this->load->view('home/index_v');
        $this->load->view('templates/footer');
    }
}
