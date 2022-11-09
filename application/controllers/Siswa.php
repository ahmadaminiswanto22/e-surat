<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Siswa extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Siswa_m');
        //$this->load->model('Kelas_m');
        $this->load->library('form_validation');
    }

    public function index()
    {
        if ($this->session->userdata('akses') == 'admin') {
            $data['judul'] = 'Master Siswa';
            $this->load->model('Kelas_m');
            $data['kelas'] = $this->Kelas_m->getAllKelas();
            $data['siswa'] = $this->Siswa_m->getAllSiswa();
            $this->load->view('templates/header', $data);
            $this->load->view('master/siswa_v', $data);
            $this->load->view('templates/footer');
        } else {
            $this->session->set_flashdata('flash', ' Dialihkan, Anda Tidak Memiliki Akses!');
            redirect('Home');
        }
    }

    public function tambah_siswa()
    {
        $data['judul'] = 'Tambah Kelas';

        $this->form_validation->set_rules('nis', 'NIS', 'required');
        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('jenis_kelamin', 'Jenis_Kelamin', 'required');
        $this->form_validation->set_rules('tempat_lahir', 'Tempat_Lahir', 'required');
        $this->form_validation->set_rules('tgl_lahir', 'Tgl_Lahir', 'required');
        $this->form_validation->set_rules('alamt', 'Alamt', 'required');
        $this->form_validation->set_rules('kelas', 'Kelas', 'required');

        if ($this->form_validation->run() == FALSE) {
            redirect('Siswa');
        } else {
            $this->Siswa_m->tambahDataSiswa();
            $this->session->set_flashdata('flash', ' Ditambahkan');
            redirect('Siswa');
        }
    }

    public function hapus_Siswa($id)
    {
        $this->Siswa_m->hapusDataSiswa($id);
        $this->session->set_flashdata('flash', ' Dihapus');
        redirect('Siswa');
    }

    public function getedit_siswa()
    {
        //$this->load->model('Kelas_m');
        $id = $this->input->post('id');
        $data = $this->Siswa_m->getSiswaById($id);
        echo json_encode($data);
    }

    public function edit_siswa()
    {

        $this->form_validation->set_rules('nis', 'NIS', 'required');
        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('jenis_kelamin', 'Jenis_Kelamin', 'required');
        $this->form_validation->set_rules('tempat_lahir', 'Tempat_Lahir', 'required');
        $this->form_validation->set_rules('tgl_lahir', 'Tgl_Lahir', 'required');
        $this->form_validation->set_rules('alamt', 'Alamt', 'required');
        $this->form_validation->set_rules('kelas', 'Kelas', 'required');

        if ($this->form_validation->run() == FALSE) {
            redirect('Siswa');
        } else {
            $this->Siswa_m->editDataSiswa();
            $this->session->set_flashdata('flash', ' Diedit');
            redirect('Siswa');
        }
    }
}
