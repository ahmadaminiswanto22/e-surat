<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class SuratMasuk_m extends CI_Model {
    public function getAllSuratMasuk() {
        $this->db->select('*');
        $this->db->from('tbl_suratmasuk');
        $this->db->join('tbl_siswa', 'tbl_suratmasuk.id_siswa = tbl_siswa.id_siswa');
        $this->db->join('tbl_kelas', 'tbl_suratmasuk.id_kelas = tbl_kelas.id_kelas');
        $this->db->order_by('id_suratMasuk', 'DESC');
        $query = $this->db->get();
        return $query->result_array();
    
    }

    public function tambahDataSurat() {
        // $config['upload_path']  = './gambar';
        // $config['allowed_types']  = 'jpg|png|svg|gif|pdf';
        // $config['max_size']  = '2000';  // 2 MB
        // $this->load->library('upload', $config);

        // if($this->upload->do_upload('gambar')){

        // }

        $data = [
            "nomor" => $this->input->post('nomor', true),
            "lampiran" => $this->input->post('lampiran', true),
            "perihal" => $this->input->post('perihal', true),
            "asal_surat" => $this->input->post('asal_surat', true),
            "id_siswa" => $this->input->post('siswa', true),
            "id_kelas" => $this->input->post('kelas', true),
            "petugas" => $this->input->post('petugas', true),
            "tgl_srtMasuk" => $this->input->post('tgl_srtMasuk', true),
            // "gambar" => $this->input->post('gambar', true)
            "gambar" => $this->upload->data('file_name', true)
        ];

        $this->db->insert('tbl_suratMasuk', $data);
    }

    public function hapusDataSurat($id) {
        $this->db->delete('tbl_suratmasuk', ['id_suratMasuk' => $id]);
   }

    public function getSuratById($id) {
        return $this->db->get_where('tbl_suratmasuk', ['id_suratMasuk' => $id])->row_array();
    }

    public function getDetailSuratById($id_suratMasuk) {
        return $this->db->get_where('tbl_suratmasuk', ['id_suratMasuk' => $id_suratMasuk])->row_array();
         }

}