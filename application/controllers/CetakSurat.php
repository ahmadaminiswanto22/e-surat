<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CetakSurat extends CI_Controller {
    public function __construct() {
        parent:: __construct();
        $this->load->model('Transaksi_m');
        $this->load->model('Siswa_m');
        $this->load->model('Kelas_m');
        $this->load->library('form_validation');
        
    }
    public function index(){
        $data['judul'] = 'Surat';
        
        $data['siswa']= $this->Siswa_m->getAllSiswa();

        $this->load->view('templates/header',$data);
        $this->load->view('t_surat/suratT_v',$data);
        $this->load->view('templates/footer');
    }


}


?>