<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Kelas_m extends CI_Model
{
    public function getAllKelas()
    {
        //  cara 1
        //    $this->db->select('*');
        //    $this->db->from('tbl_kelas');
        //    $this->db->order_by('id_kelas', 'DESC');
        //    return $this->db->get()->result_array();
        //  cara 2
        //    return $this->db->query('SELECT * FROM tbl_kelas ORDER BY id_kelas DESC')->result_array();
        //  cara 3
        $this->db->order_by('id_kelas', 'DESC');
        return $this->db->get('tbl_kelas')->result_array();
    }

    public function tambahDataKelas()
    {
        $data = [
            "jenjang" => $this->input->post('jenjang', true),
            "jurusan" => $this->input->post('jurusan', true),
            "jmlh" => $this->input->post('jmlh', true)
        ];

        $this->db->insert('tbl_kelas', $data);
    }

    public function hapusDataKelas($id)
    {
        // $this->db->where('id_kelas', $id);
        // $this->db->delete('tbl_kelas');
        // $this->db->delete('tbl_kelas', array('id_kelas' => $id));
        $this->db->delete('tbl_kelas', ['id_kelas' => $id]);
    }

    public function getKelasById($id)
    {
        // $this->db->query('SELECT * FROM ' . $this->table . ' WHERE id_kelas=:id ');
        // $this->db->bind('id_kelas', $id);
        // return $this->db->single();

        return $this->db->get_where('tbl_kelas', ['id_kelas' => $id])->row_array();
    }

    public function editDataKelas()
    {
        $data = [
            "jenjang" => $this->input->post('jenjang', true),
            "jurusan" => $this->input->post('jurusan', true),
            "jmlh" => $this->input->post('jmlh', true)
        ];


        $this->db->where('id_kelas', $this->input->post('id_kelas'));
        $this->db->update('tbl_kelas', $data);
    }
}
