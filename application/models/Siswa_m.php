<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Siswa_m extends CI_Model {
    public function getAllSiswa() {
        $this->db->select('*');
        $this->db->from('tbl_siswa');
        $this->db->join('tbl_kelas', 'tbl_siswa.id_kelas = tbl_kelas.id_kelas');
        $this->db->order_by('id_siswa', 'DESC');
        $query = $this->db->get();
        return $query->result_array();
    
    }

    public function tambahDataSiswa() {
        $data = [
            "nis" => $this->input->post('nis', true),
            "nama" => $this->input->post('nama', true),
            "jenis_kelamin" => $this->input->post('jenis_kelamin', true),
            "tempat_lahir" => $this->input->post('tempat_lahir', true),
            "tgl_lahir" => $this->input->post('tgl_lahir', true),
            "alamt" => $this->input->post('alamt', true),
            "id_kelas" => $this->input->post('kelas', true)
        ];

        $this->db->insert('tbl_siswa', $data);
    }

   public function hapusDataSiswa($id) {
        // $this->db->where('id_siswa', $id);
        // $this->db->delete('tbl_siswa');
        // $this->db->delete('tbl_siswa', array('id_siswa' => $id));
        $this->db->delete('tbl_siswa', ['id_siswa' => $id]);
   }

   public function getSiswaById($id) {
        // $this->db->query('SELECT * FROM ' . $this->table . ' WHERE id_siswa=:id ');
        // $this->db->bind('id_siswa', $id);
        // return $this->db->single();

       return $this->db->get_where('tbl_siswa', ['id_siswa' => $id])->row_array();
   }

   public function editDataSiswa() {
    $data = [
        "nis" => $this->input->post('nis', true),
        "nama" => $this->input->post('nama', true),
        "jenis_kelamin" => $this->input->post('jenis_kelamin', true),
        "tempat_lahir" => $this->input->post('tempat_lahir', true),
        "tgl_lahir" => $this->input->post('tgl_lahir', true),
        "alamt" => $this->input->post('alamt', true),
        "id_kelas" => $this->input->post('kelas', true)   
    ];

    $this->db->where('id_siswa', $this->input->post('id_siswa'));
    $this->db->update('tbl_siswa', $data);
   }

}