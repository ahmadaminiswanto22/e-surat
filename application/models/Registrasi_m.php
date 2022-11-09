<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Registrasi_m extends CI_Model
{
    public function getAllUser()
    {
        //  cara 1
        //    $this->db->select('*');
        //    $this->db->from('tbl_kelas');
        //    $this->db->order_by('id_kelas', 'DESC');
        //    return $this->db->get()->result_array();
        //  cara 2
        //    return $this->db->query('SELECT * FROM tbl_kelas ORDER BY id_kelas DESC')->result_array();
        //  cara 3
        $this->db->order_by('id_user', 'DESC');
        return $this->db->get('tbl_user')->result_array();
    }

    public function tambahDataUser($data)
    {
        $this->db->insert('tbl_user', $data);
    }

    public function hapusDataUser($id)
    {
        // $this->db->where('id_kelas', $id);
        // $this->db->delete('tbl_kelas');
        // $this->db->delete('tbl_kelas', array('id_kelas' => $id));
        $this->db->delete('tbl_user', ['id_user' => $id]);
    }

    public function getUserById($id)
    {
        // $this->db->query('SELECT * FROM ' . $this->table . ' WHERE id_kelas=:id ');
        // $this->db->bind('id_kelas', $id);
        // return $this->db->single();

        return $this->db->get_where('tbl_user', ['id_user' => $id])->row_array();
    }
    public function editDataUser($data, $id_user)
    {

        $this->db->where('id_user', $id_user);
        $this->db->update('tbl_user', $data);
    }
}
