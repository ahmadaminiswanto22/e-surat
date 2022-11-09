<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Registrasi extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('Registrasi_m');
        $this->load->library('form_validation');
    }

    function index()
    {
        if ($this->session->userdata('akses') == 'admin') {
            $data['judul'] = 'Registrasi User';

            $data['user'] = $this->Registrasi_m->getAllUser();

            $this->load->view('templates/header', $data);
            $this->load->view('registrasi/registrasi', $data);
            $this->load->view('templates/footer');
        } else {
            $this->session->set_flashdata('flash', ' Dialihkan, Anda Tidak Memiliki Akses!');
            redirect('Home');
        }
    }

    function tambah_user()
    {

        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');
        $this->form_validation->set_rules('password2', 'Password2', 'required|matches[password]');
        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('akses', 'Akses', 'required');

        if ($this->form_validation->run() == FALSE) {
            // $data['judul'] = 'Registrasi User';


            // $this->load->view('templates/header', $data);
            // $this->load->view('registrasi/registrasi');
            // $this->load->view('templates/footer');
            $this->session->set_flashdata('gagal', ' Password tidak sesuai !');
            redirect('Registrasi');
        } else {
            $username = strtolower(stripslashes($this->input->post('username')));
            $email = $this->input->post('email');
            $password = password_hash($this->input->post('password'), PASSWORD_DEFAULT);
            $nama = $this->input->post('nama');
            $akses = $this->input->post('akses');

            $sql = $this->db->query("SELECT username FROM tbl_user where username='$username'");
            $cek = $sql->num_rows();
            if ($cek > 0) {
                $this->session->set_flashdata('gagal', 'Username Sudah Digunakan');
                redirect('Registrasi');
            }
            $data = array(
                'username' => $username,
                'password' => $password,
                'nama' => $nama,
                'akses' => $akses,
                'email' => $email
            );
            // print_r($data);
            // exit;

            $this->Registrasi_m->tambahDataUser($data);
            $this->session->set_flashdata('success', ' Ditambahkan');
            redirect('Registrasi');
        }
    }
    public function hapus_user($id)
    {
        $this->Registrasi_m->hapusDataUser($id);
        $this->session->set_flashdata('success', ' Dihapus');
        redirect('Registrasi');
    }

    public function getedit_user()
    {
        $id = $this->input->post('id');
        $data = $this->Registrasi_m->getUserById($id);
        echo json_encode($data);
    }

    public function edit_user()
    {
        $this->form_validation->set_rules('id_user', 'Id_User', 'required');
        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');
        $this->form_validation->set_rules('password2', 'Password2', 'required|matches[password]');
        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('akses', 'Akses', 'required');


        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('gagal', ' Password tidak sesuai !');
            redirect('Registrasi');
        } else {
            $id_user = $this->input->post('id_user');
            $username = strtolower(stripslashes($this->input->post('username')));
            $email = $this->input->post('email');
            $password = password_hash($this->input->post('password'), PASSWORD_DEFAULT);
            $nama = $this->input->post('nama');
            $akses = $this->input->post('akses');

            $data = array(
                'id_user' => $id_user,
                'username' => $username,
                'password' => $password,
                'nama' => $nama,
                'akses' => $akses,
                'email' => $email
            );
            // print_r($data);
            // exit;

            $this->Registrasi_m->editDataUser($data, $id_user);
            $this->session->set_flashdata('success', ' Diubah');
            redirect('Registrasi');

            $sql = $this->db->query("SELECT username FROM tbl_user where username='$username'");
            $cek = $sql->num_rows();
            if ($cek > 0) {
                $this->session->set_flashdata('gagal', 'Username Sudah Digunakan');
                redirect('Registrasi');
            }
        }
    }
}
