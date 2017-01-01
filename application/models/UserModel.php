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

}

/* End of file userModel.php */
/* Location: ./application/models/userModel.php */