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

	function get_list_siswa_by_status($id = NULL)
	{
		if ($id != NULL) {
			$this->db->where('status_pendaftaran', $id);
		}
		$r = $this->db->get('siswa');
		return $r->result();
	}

	function get_jurusan_siswa($id)
	{

	}

	function get_best_un()
	{
		$q = "SELECT a.ID_siswa, a.nama_lengkap, c.nama_sekolah, sum(matematika+bahasa_indonesia+bahasa_inggris+ipa) as total FROM siswa a, un b, sekolah c WHERE a.ID_siswa = b.ID_siswa and a.ID_sekolah = c.ID_sekolah group by b.ID_siswa order by total desc limit 4";
		$r = $this->db->query($q);
		$r = $r->result();
		return $r;
	}

	function get_pendaftar()
	{
		$q = "SELECT * FROM siswa a, status b WHERE a.status_pendaftaran = b.ID_status";
		$r = $this->db->query($q);
		$r = $r->result();
		return $r;
	}

	function count_jurusan_dipilih()
	{
		
	}

	function get_data_siswa_lengkap_by_id($id)
	{
		$where['ID_siswa'] = $id;

		// get from data siswa
		$q = "SELECT * FROM siswa a, sekolah b, status c WHERE a.ID_sekolah = b.ID_sekolah and a.status_pendaftaran = c.ID_status and a.ID_siswa = $id";
		$siswa = $this->db->query($q);
		$siswa = $siswa->row();

		// get from data alamat
		$q = "SELECT * FROM alamat a, provinsi b, kota c, kecamatan d WHERE a.kecamatan=d.ID_kecamatan and d.ID_kota=c.ID_kota and c.ID_provinsi=b.ID_provinsi and a.ID_siswa = $id";
		$alamat = $this->db->query($q);
		$alamat = $alamat->row();

		// get from data orangtua
		$orangtua = $this->db->get_where('orangtua', $where);
		$orangtua = $orangtua->row();

		// get from persyaratan
		$persyaratan = $this->db->get_where('persyaratan', $where);
		$persyaratan = $persyaratan->row();

		// get data from un
		$un = $this->db->get_where('un', $where);
		$un = $un->row();
		
		// get data jurusan
		$jurusan = $this->db->get_where('pilihan', $where);
		$jurusan = $jurusan->row();
		if ($jurusan != NULL) {
			$w['ID_jurusan'] = $jurusan->pilihan1;
			$j1 = $this->db->get_where('jurusan', $w);
			$j1 = $j1->row();
			$w['ID_jurusan'] = $jurusan->pilihan2;
			$j2 = $this->db->get_where('jurusan', $w);
			$j2 = $j2->row();
			$data['jurusan'][0] = $j1;
			$data['jurusan'][1] = $j2;
		}else {
			$data['jurusan'] = $jurusan;
		}

		$data['siswa'] = $siswa;
		$data['alamat'] = $alamat;
		$data['orangtua'] = $orangtua;
		$data['persyaratan'] = $persyaratan;
		$data['un'] = $un;

		return $data;
	}

}

/* End of file adminModel.php */
/* Location: ./application/models/adminModel.php */