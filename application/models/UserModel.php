<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class UserModel extends CI_Model {

	function count_mendaftar_by_sekolah($id)
	{
		$this->db->where('ID_sekolah', $id);
		$r = $this->db->where('status_pendaftaran', 1);
		$c = $this->db->count_all_results('siswa');
		return $c;
	}

	function count_terdaftar_by_sekolah($id)
	{
		$this->db->where('ID_sekolah', $id);
		$r = $this->db->where('status_pendaftaran', 3);
		$c = $this->db->count_all_results('siswa');
		return $c;
	}

	function count_pending_by_sekolah($id)
	{
		$this->db->where('ID_sekolah', $id);
		$r = $this->db->where('status_pendaftaran', 2);
		$c = $this->db->count_all_results('siswa');
		return $c;
	}

	function count_diterima_by_sekolah($id)
	{
		$this->db->where('ID_sekolah', $id);
		$r = $this->db->where('status_pendaftaran', 4);
		$c = $this->db->count_all_results('siswa');
		return $c;
	}

	function count_ditolak_by_sekolah($id)
	{
		$this->db->where('ID_sekolah', $id);
		$r = $this->db->where('status_pendaftaran', 5);
		$c = $this->db->count_all_results('siswa');
		return $c;
	}

	function get_status_siswa($id)
	{
		$q = "SELECT a.nama_lengkap as nama_lengkap, a.status_pendaftaran as status_pendaftaran, b.nama_status as nama_status from siswa a, status b where a.status_pendaftaran=b.ID_status and a.ID_siswa = $id";
		$r = $this->db->query($q);
		return $r->row();
	}

	function get_status_siswa_by_sekolah($id)
	{
		$q = "SELECT a.NISN, a.status_pendaftaran, a.nama_lengkap, a.username, a.password, c.nama_status from siswa a, sekolah b, status c WHERE a.status_pendaftaran = c.ID_status and a.ID_sekolah = b.ID_sekolah and a.ID_sekolah = $id";
		$r = $this->db->query($q);
		return $r->result();
	}

	function get_data_siswa_for_kartu($id)
	{
		$q = "SELECT * FROM siswa a, alamat b, provinsi c, kota d, kecamatan e, pilihan f, persyaratan g, sekolah h, jurusan i WHERE a.ID_siswa = b.ID_siswa and b.provinsi = c.ID_provinsi and b.kota = d.ID_kota and b.kecamatan = e.ID_kecamatan and a.ID_siswa = f.ID_siswa and a.ID_siswa = g.ID_siswa and a.ID_sekolah = h.ID_sekolah and a.ID_siswa=$id";
		
		$r = $this->db->query($q);
		return $r->row();
	}

}

/* End of file userModel.php */
/* Location: ./application/models/userModel.php */