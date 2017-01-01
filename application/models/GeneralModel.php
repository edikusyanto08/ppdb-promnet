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

	function get_data_sekolah_by_id($id)
	{
		$q = "SELECT a.*, b.nama_kecamatan as nama_kecamatan, c.nama_kota as nama_kota, d.nama_provinsi as nama_provinsi
			FROM sekolah a, kecamatan b, kota c, provinsi d
			WHERE a.kecamatan=b.ID_kecamatan and b.ID_kota=c.ID_kota and c.ID_provinsi=d.ID_provinsi and a.ID_sekolah=$id";
		$r = $this->db->query($q);
		return $r->row();
	}

	function get_list_sekolah()
	{
		$q = "SELECT a.*, b.nama_kecamatan as nama_kecamatan, c.nama_kota as nama_kota, d.nama_provinsi as nama_provinsi
			FROM sekolah a, kecamatan b, kota c, provinsi d
			WHERE a.kecamatan=b.ID_kecamatan and b.ID_kota=c.ID_kota and c.ID_provinsi=d.ID_provinsi";
		$r = $this->db->query($q);
		return $r->result();
	}

	function get_login($table, $username, $password)
	{
		$this->db->where('username', $username);
		$this->db->where('password', $password);
		$r = $this->db->get($table, 1, 0);
		return $r->row();
	}

	function md5_pass($table, $pass, $where)
	{
		$id = "ID_" .$table;
		$data['password'] = md5($pass);
		$this->db->where($id, $where);
		$this->db->update($table, $data);

		if ($this->db->affected_rows() > 0) {
			return 1;
		}else return 0;
	}

	function update_log($table, $where)
	{
		$id = "ID_" .$table;
		$this->db->where($id, $where);
		$data['log'] = 1;
		$this->db->update($table, $data);
		if ($this->db->affected_rows() > 0) {
			return 1;
		}else return 0;
	}

	function update_table($table, $data, $where)
	{
		$id = "ID_" .$table;
		$this->db->where($id, $where);
		$r = $this->db->update($table, $data);
		if ($this->db->affected_rows() > 0) {
			return $this->db->affected_rows();
		}else return FALSE;
	}

	function log($id, $msg, $usr)
	{
		$data['ID_akses'] = $id;
		$data['aksi'] = $msg;
		$data['waktu'] = date('Y/m/d H:i:s');
		$data['user'] = $usr;


		$this->db->insert('log', $data);
	}

}

/* End of file generalModel.php */
/* Location: ./application/models/generelModel.php */