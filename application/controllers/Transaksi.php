<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Transaksi extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model(array('Transaksi_m'));
        $this->load->model('Siswa_m');
        $this->load->model('Kelas_m');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['judul'] = 'Cetak Surat';
        $this->load->model('Registrasi_m');
        $data['user'] = $this->Registrasi_m->getAllUser();
        $data['transaksi'] = $this->Transaksi_m->getAllSurat();
        $this->load->view('templates/header', $data);
        $this->load->view('t_surat/suratT_v', $data);
        $this->load->view('t_surat/javascrip');
        $this->load->view('templates/footer');
    }

    public function get_siswa()
    {
        $id = $this->input->post('id_siswa');
        $x['ctk'] = $this->Transaksi_m->get_siswa($id);
        $this->load->view('t_surat/detail_siswa_v', $x);
    }


    public function loadDataSiswa()
    {
        $offset = $this->input->get("offset");
        $limit = $this->input->get("limit");
        $order = $this->input->get("order");
        if ($this->input->get("search")) {
            $search = $this->input->get("search");
            $where = "(upper(a.nis) like upper('%$search%')  or upper(a.nama) like upper('%$search%')
			 or upper(b.jenjang) like upper('%$search%') or upper(b.jurusan) like upper('%$search%'))  ";
        } else {
            $where = 'a.id_siswa is not null';
        }

        $this->Transaksi_m->loaddataSiswa($offset, $limit, $order, $where);
    }


    public function tambah_surat()
    {
        $data['judul'] = 'Cetak Surat';

        $this->form_validation->set_rules('no_surat', 'No_Surat', 'required');
        $this->form_validation->set_rules('tgl_surat', 'Tgl_surat', 'required');
        $this->form_validation->set_rules('lampiran', 'Lampiran', 'required');
        $this->form_validation->set_rules('perihal', 'Perihal', 'required');
        $this->form_validation->set_rules('perusahaan', 'Perusahaan', 'required');
        $this->form_validation->set_rules('almt_perusahaan', 'Almt_perusahaan', 'required');
        $this->form_validation->set_rules('id_user', 'Id_User', 'required');

        $no_surat = trim($this->input->post('no_surat'));
        $tgl_surat = trim($this->input->post('tgl_surat'));
        $lampiran = trim($this->input->post('lampiran'));
        $perihal = trim($this->input->post('perihal'));
        $perusahaan = trim($this->input->post('perusahaan'));
        $almt_perusahaan = trim($this->input->post('almt_perusahaan'));
        $id_user = trim($this->input->post('id_user'));


        $data = array(
            "nomor" => $no_surat,
            "tgl_surat" => $tgl_surat,
            "lampiran" => $lampiran,
            "perihal" => $perihal,
            "perusahaan" => $perusahaan,
            "almt_perusahaan" => $almt_perusahaan,
            "id_user" => $id_user
        );
        $ceksatu = $this->Transaksi_m->tambahDataSurat($data);
        $iddet = $ceksatu;


        if (isset($_POST['detail'])) {
            $detaildua = $this->input->post('detail');
            foreach ($detaildua as $key => $detaildua) {
                $id_siswa = trim($detaildua['id_siswa']);
                //   $nama=trim($detaildua['nama']);
                //   $nis=trim($detaildua['nis']);
                //   $id_kelas=trim($detaildua['id_kelas']);

                $datamanual = array(
                    'idCetak' => $iddet,
                    'id_siswa' => $id_siswa,

                );
                $ceksatu = $this->Transaksi_m->simpanDetail($datamanual);
            }
        }


        // print_r($_POST);exit;
        $this->session->set_flashdata('flash', ' Ditambahkan');
        redirect('Transaksi');


        // if ($this->form_validation->run() == FALSE) {
        //     $this->load->view('templates/header', $data);
        //     $this->load->view('master/suratT_v');
        //     $this->load->view('templates/footer');
        // } else {
        //     //  $this->Transaksi_m->tambahDataSurat();
        //     $this->session->set_flashdata('flash', ' Ditambahkan');
        //     redirect('Transaksi');
        // }
    }

    function cetakSurat()
    {

        $id = $this->input->get('id');
        $this->load->library('pdfgenerator');
        $filename = 'report_' . time();
        $data['dtasurat'] = $this->Transaksi_m->getsurat($id);
        $data['detailsurat'] = $this->Transaksi_m->getsuratdetail($id);
        //print_r($data['dtasurat']);exit;
        /*foreach($data['databap'] as $bap){
			$id=$bap->id;
			$data['bapdet'][$id]=$this->Transaksi_m->getSuratdet($id);
			
		}*/

        $html = $this->load->view("cetak_surat/surat", $data, true);


        $this->pdfgenerator->generate($html, $filename, true, 'A4', 'Portrait');
        echo $id;
    }

    function hapusSurat($id)
    {
        $this->Transaksi_m->hapusDetail($id);
        $ceksatu = $this->Transaksi_m->hapusData($id);

        if ($ceksatu == 1) {
            $this->session->set_flashdata('flash', ' Dihapus');
            redirect('Transaksi');
        }
    }

    public function getedit_surat()
    {
        //$this->load->model('Kelas_m');
        $id = $this->input->post('id');
        $data = $this->Transaksi_m->getSuratById($id);
        echo json_encode($data);
    }
}
