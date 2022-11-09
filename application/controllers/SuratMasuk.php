<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SuratMasuk extends CI_Controller {

    public function __construct() {
        parent:: __construct();
        $this->load->model('SuratMasuk_m');
        //$this->load->model('Kelas_m');
        $this->load->library('form_validation');
        $this->load->helper(array('form', 'url'));
        
    }

    public function index(){
        $data['judul'] = 'Master Surat Masuk';
        $this->load->model('Kelas_m');
        $this->load->model('Siswa_m');
        $data['suratMasuk'] = $this->SuratMasuk_m->getAllSuratMasuk();
        $data['kelas'] = $this->Kelas_m->getAllKelas();
        $data['siswa'] = $this->Siswa_m->getAllSiswa();
        $this->load->view('templates/header',$data);
        $this->load->view('master/suratMasuk_v', $data);
        $this->load->view('templates/footer');
    }

    public function tambah_surat() {
        $data['judul'] = 'Tambah Kelas';

        $this->form_validation->set_rules('nomor','Nomor','required');
        $this->form_validation->set_rules('lampiran','Lampiran','required');
        $this->form_validation->set_rules('perihal','perihal','required');
        $this->form_validation->set_rules('asal_surat','Asal_Surat','required');
        $this->form_validation->set_rules('siswa','Siswa','required');
        $this->form_validation->set_rules('kelas','Kelas','required');
        $this->form_validation->set_rules('petugas','Petugas','required');
        $this->form_validation->set_rules('tgl_srtMasuk','Tgl_SrtMasuk','required');
        $this->form_validation->set_rules('gambar','Gambar','required');

        $config['upload_path']  = './gambar';
        $config['allowed_types']  = 'jpg|png|svg|gif|pdf';
        $config['max_size']  = '2000';  // 2 MB
        $this->load->library('upload', $config);    

        if($this->form_validation->run() == FALSE && !$this->upload->do_upload('gambar')){
            $this->load->view('templates/header',$data);
            $this->load->view('master/suratMasuk_v',$data);
            $this->load->view('templates/footer');
        }else{
            $this->SuratMasuk_m->tambahDataSurat();
            $this->session->set_flashdata('flash',' Ditambahkan');
            redirect('SuratMasuk');
        }
    }

    public function hapus_Surat($id) {
        $this->SuratMasuk_m->hapusDataSurat($id);
        $this->session->set_flashdata('flash', ' Dihapus');
        redirect('SuratMasuk');
    }

    public function getedit_surat() {
        
        $id = $this->input->post('id');
        $data = $this->SuratMasuk_m->getSuratById($id);
        echo json_encode($data);
        
     }

    public function detail($id) {
        // $data['suratMasuk'] = $this->SuratMasuk_m->getDetailSuratById($id_suratMasuk);
        $data['suratMasuk'] = $this->SuratMasuk_m->getSuratById($id);
        print_r($data);
        $this->load->view('templates/header',$data);
        $this->load->view('master/suratMasuk_v',$data);
        $this->load->view('templates/footer');
    }


    
}




