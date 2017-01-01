<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sekolah extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('Template');
		$this->load->model('GeneralModel');
		$this->load->model('UserModel');
	}

	public function index()
	{
		// cek apakah user pertama kali login?
		if ($this->session->has_userdata('first_log')) {
			$data['first_log'] = 1;
		}

		$data['title'] = $this->session->userdata('nama_sekolah');
		$data['menu_home'] = 1;
		$data['mendaftar'] = $this->UserModel->count_mendaftar_by_sekolah($this->session->userdata('ID_sekolah'));

		$this->template->user('user/sekolah/sekolah', $data);
	}

	function pengaturan()
	{
		$data['title'] = 'Pengaturan';
		$data['sekolah'] = $this->GeneralModel->get_data_sekolah_by_id($this->session->userdata('ID_sekolah'));
		$data['list_provinsi'] = $this->GeneralModel->get_all('provinsi');
		$data['list_kota'] = $this->GeneralModel->get_all('kota');
		$data['list_kec'] = $this->GeneralModel->get_all('kecamatan');

		$this->template->user('user/sekolah/pengaturan', $data);
	}

	function update_sekolah()
	{
		$r = $this->GeneralModel->update_table('sekolah', $_POST, $_POST['ID_sekolah']);
		if ($r > 0) {
			$this->session->set_flashdata('status2', 'Data berhasil diubah');
		}else $this->session->set_flashdata('status2', 'Data tidak diubah');

		redirect(base_url('sekolah/pengaturan'),'refresh');
	}

	function siswa()
	{
		$data['title'] = 'Siswa';
		$data['menu_siswa'] = 1;

		$where['ID_sekolah'] = $this->session->userdata('ID_sekolah');
		$r = $this->db->get_where('siswa', $where);
		$data['list_siswa'] = $r->result();

		$this->template->user('user/sekolah/siswa', $data);
	}

}

/* End of file sekolah.php */
/* Location: ./application/controllers/sekolah.php */