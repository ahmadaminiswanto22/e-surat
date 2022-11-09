<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kelas extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Kelas_m');
        $this->load->library('form_validation');
    }

    public function index()
    {
        if ($this->session->userdata('akses') == 'admin') {
            $data['judul'] = 'Master Kelas';

            $data['kelas'] = $this->Kelas_m->getAllKelas();
            $this->load->view('templates/header', $data);
            $this->load->view('master/kelas_v', $data);
            $this->load->view('templates/footer');
        } else {
            $this->session->set_flashdata('flash', ' Dialihkan, Anda Tidak Memiliki Akses!');
            redirect('Home');
        }
    }

    public function tambah_kelas()
    {
        $data['judul'] = 'Tambah Kelas';

        $this->form_validation->set_rules('jenjang', 'Jenjang', 'required');
        $this->form_validation->set_rules('jurusan', 'Jurusan', 'required');
        $this->form_validation->set_rules('jmlh', 'Jmlh', 'required');

        if ($this->form_validation->run() == FALSE) {
            redirect('Kelas');
        } else {
            $this->Kelas_m->tambahDataKelas();
            $this->session->set_flashdata('flash', ' Ditambahkan');
            redirect('Kelas');
        }
    }

    public function hapus_kelas($id)
    {
        $this->Kelas_m->hapusDataKelas($id);
        $this->session->set_flashdata('flash', ' Dihapus');
        redirect('Kelas');
    }

    public function getedit_kelas()
    {
        $id = $this->input->post('id');
        $data = $this->Kelas_m->getKelasById($id);
        echo json_encode($data);
    }

    public function edit_kelas()
    {

        $this->form_validation->set_rules('jenjang', 'Jenjang', 'required');
        $this->form_validation->set_rules('jurusan', 'Jurusan', 'required');
        $this->form_validation->set_rules('jmlh', 'Jmlh', 'required');

        if ($this->form_validation->run() == FALSE) {
            redirect('Kelas');
        } else {
            $this->Kelas_m->editDataKelas();
            $this->session->set_flashdata('flash', ' Diedit');
            redirect('Kelas');
        }
    }
}
