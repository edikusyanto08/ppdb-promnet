<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sekolah extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('Template');
	}

	public function index()
	{
		// cek apakah user pertama kali login?
		if ($this->session->has_userdata('first_log')) {
			$data['first_log'] = 1;
		}

		$data['title'] = $this->session->userdata('nama_sekolah');
		$data['menu_home'] = 1;

		$this->template->user('user/sekolah/sekolah', $data);
	}

	function pengaturan()
	{
		$data['title'] = 'Pengaturan';

		$this->template->user('user/sekolah/pengaturan', $data);
	}

}

/* End of file sekolah.php */
/* Location: ./application/controllers/sekolah.php */