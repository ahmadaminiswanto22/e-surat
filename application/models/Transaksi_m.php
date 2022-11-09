<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Transaksi_m extends CI_Model
{

	public function getAllSurat()
	{
		$this->db->select('*');
		$this->db->from('tbl_surat_cetak');
		$this->db->join('tbl_user', 'tbl_surat_cetak.id_user = tbl_user.id_user');
		$this->db->order_by('idCetak', 'DESC');
		return $this->db->get()->result_array();
	}

	public function getAllDetail()
	{
		$this->db->select('*');
		$this->db->from('tbl_surat_cetakdetail');
		$this->db->join('tbl_surat_cetak', 'tbl_surat_cetakdetail.idCetak = tbl_surat_cetak.idCetak');
		$this->db->join('tbl_siswa', 'tbl_surat_cetakdetail.id_siswa = tbl_siswa.id_siswa');
		$this->db->join('tbl_kelas', 'tbl_siswa.id_kelas = tbl_kelas.id_kelas');
		$this->db->join('tbl_user', 'tbl_surat_cetak.id_user = tbl_user.id_user');
		$this->db->order_by('id', 'DESC');
		$query = $this->db->get();
		return $query->result_array();
	}

	function get_siswa($id)
	{
		$hsl = $this->db->query("SELECT * FROM tbl_siswa WHERE id_siswa='$id'");
		return $hsl;
	}

	function loaddataTabel($offset, $limit, $order, $where)
	{
		// $level=$this->session->userdata('level');
		// $kd_supplier=$this->session->userdata('kd_supplier');

		if (isset($_GET['sort'])) {
			$sort = $this->input->get("sort");
		} else {
			$sort = 'idCetak';
		}


		$this->db->select('a.idCetak');
		$this->db->from('tbl_surat_cetak as a');
		$this->db->join('tbl_siswa as b ', 'a.id_siswa = b.id_siswa');

		$this->db->where($where);
		$hasil = $this->db->get();
		$total = $hasil->num_rows();


		$this->db->select("a.*,b.nama,b.nis,b.jenjang,b.jurusan
			");
		$this->db->from('tbl_surat_cetak as a');
		$this->db->join('tbl_siswa as b ', 'a.id_siswa = b.id_siswa');

		$this->db->where($where);
		$this->db->order_by($sort, $order);
		$this->db->limit($limit, $offset);

		$hasil = $this->db->get();

		//	echo $this->db->last_query();
		$rs = $hasil->result();
		$result["total"] = $total;
		$items = array();
		foreach ($rs as $row) {
			array_push($items, $row);
		}

		$result["rows"] = $items;
		echo json_encode($result);
	}

	function loaddataSiswa($offset, $limit, $order, $where)
	{
		if (isset($_GET['sort'])) {
			$sort = $this->input->get("sort");
		} else {
			$sort = 'id_siswa';
		}

		$this->db->select('a.id_siswa');
		$this->db->from('tbl_siswa as a');
		$this->db->join('tbl_kelas as b ', 'a.id_kelas = b.id_kelas');
		$this->db->where($where);

		$hasil = $this->db->get();
		$total = $hasil->num_rows();



		$this->db->select("a.*,b.jenjang,b.jurusan");
		$this->db->from('tbl_siswa as a');
		$this->db->join('tbl_kelas as b ', 'a.id_kelas = b.id_kelas');


		$this->db->where($where);

		$this->db->order_by($sort, $order);
		$this->db->limit($limit, $offset);

		$hasil = $this->db->get();

		//	echo $this->db->last_query();
		$rs = $hasil->result();
		$result["total"] = $total;
		$items = array();
		foreach ($rs as $row) {
			array_push($items, $row);
		}

		$result["rows"] = $items;
		echo json_encode($result);
	}


	public function tambahDataSurat($data)
	{
		$status = $this->db->insert('tbl_surat_cetak', $data);
		$id = $this->db->insert_id();
		return $id;
	}


	function simpanDetail($datamanual)
	{
		$status = $this->db->insert('tbl_surat_cetakdetail', $datamanual);
		//echo $this->db->last_query(); exit;
		if (!$status) return false;
		else return true;
	}

	function getsurat($id)
	{
		$data = array();

		$this->db->select("a.*");
		$this->db->from('tbl_surat_cetak as a');
		$this->db->where('a.idCetak ', $id);
		$hasil = $this->db->get();
		//		echo $this->db->last_query();exit;
		if ($hasil->num_rows() > 0) {
			$data = $hasil->result();
		}

		$hasil->free_result();
		return $data;
	}

	function getsuratdetail($id)
	{
		$data = array();

		$this->db->select("b.*,c.*,d.id_siswa,d.nama,d.nis,e.id_kelas,e.jenjang,e.jurusan");
		$this->db->from('tbl_surat_cetakdetail as b');
		$this->db->join('tbl_surat_cetak as c', 'b.idCetak=c.idCetak');
		$this->db->join('tbl_siswa as d', 'b.id_siswa=d.id_siswa');
		$this->db->join('tbl_kelas as e', 'd.id_kelas=e.id_kelas');
		$this->db->where('b.idCetak ', $id);
		$hasil = $this->db->get();
		//		echo $this->db->last_query();exit;
		if ($hasil->num_rows() > 0) {
			$data = $hasil->result();
		}

		$hasil->free_result();
		return $data;
	}

	function hapusData($id)
	{

		$this->db->where('idCetak', $id);
		$status = $this->db->delete('tbl_surat_cetak');
		if (!$status) return false;
		else return true;
	}

	function hapusDetail($id)
	{
		$this->db->where('idCetak', $id);
		$status = $this->db->delete('tbl_surat_cetakdetail');
		if (!$status) return false;
		else return true;
	}

	public function getSuratById($id)
	{
		$this->db->select('a.*,b.*,c.id_siswa,c.nama,c.nis,d.id_kelas,d.jenjang,d.jurusan,e.is_user,e.nama');
		$this->db->from('tbl_surat_cetakdetail as a');
		$this->db->join('tbl_surat_cetak as b', 'tbl_surat_cetakdetail.idCetak = tbl_surat_cetak.idCetak');
		$this->db->join('tbl_siswa as c', 'tbl_surat_cetakdetail.id_siswa = tbl_siswa.id_siswa');
		$this->db->join('tbl_kelas as d', 'tbl_siswa.id_kelas = tbl_kelas.id_kelas');
		$this->db->join('tbl_user as e', 'tbl_surat_cetak.id_user = tbl_user.id_user');
		$this->db->where('id', $id);
		$query = $this->db->get();
		return $query->result_array();
	}
}
