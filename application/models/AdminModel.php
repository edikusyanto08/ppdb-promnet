<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AdminModel extends CI_Model {

	function get_login($username, $password)
	{
		$this->db->where('username', $username);
		$this->db->where('password', $password);
		$r = $this->db->get('admin', 1, 0);
		return $r->row();
	}

	function count_status_pendaftaran($id)
	{
		$this->db->where('status_pendaftaran', $id);
		$c = $this->db->count_all_results('siswa');
		return $c;
	}

}

/* End of file adminModel.php */
/* Location: ./application/models/adminModel.php */