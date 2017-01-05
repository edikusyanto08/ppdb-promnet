<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */

	public function __construct()
	{
		parent::__construct();
		$this->load->model('GeneralModel');
	}
	public function index()
	{
		$this->db->where('nama_tetapan', 'tanggal_pengumuman');
		$r = $this->db->get('tetapan');
		$r = $r->row();
		$tanggal_pengumuman = $r->isi_tetapan;
		$n = date('Y-m-d');
		if ($n >= $tanggal_pengumuman ) {
			$data['pengumuman'] = TRUE;
		}else $data['pengumuman'] = FALSE;

		$this->db->limit(8);
		$data['list_jurusan'] = $this->GeneralModel->get_all('jurusan');
		$this->load->view('landingpage/layout/head');
		$this->load->view('landingpage/layout/header', $data);
		$this->load->view('landingpage/layout/slider');
		$this->load->view('landingpage/layout/body');
		$this->load->view('landingpage/layout/footer');
	}

	function pengumuman()
	{
		$this->db->where('nama_tetapan', 'tanggal_pengumuman');
		$r = $this->db->get('tetapan');
		$r = $r->row();
		$tanggal_pengumuman = $r->isi_tetapan;
		$n = date('Y-m-d');


		$data['list_diterima'] = $this->GeneralModel->get_pengumuman();

		$this->db->limit(8);
		$data['list_jurusan'] = $this->GeneralModel->get_all('jurusan');
		$this->load->view('landingpage/layout/head');
		$this->load->view('landingpage/layout/header', $data);
		$this->load->view('landingpage/layout/slider');
		if ($n >= $tanggal_pengumuman ) {
			$data['pengumuman'] = TRUE;
			$this->load->view('landingpage/pengumuman', $data);
		}else {
			$data['pengumuman'] = FALSE;
			$this->load->view('landingpage/pengumuman2');
		}
		
		$this->load->view('landingpage/layout/footer');
	}
}
