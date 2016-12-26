<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class GeneralModel extends CI_Model {

	function get_all($table)
	{
		$r = $this->db->get($table);
		return $r->result();
	}

	function get_kota($id)
	{
		$this->db->where('ID_kota', $id);
		$r = $this->db->get('kota', 1, 0);
		return $r->row();
	}

}

/* End of file generalModel.php */
/* Location: ./application/models/generelModel.php */