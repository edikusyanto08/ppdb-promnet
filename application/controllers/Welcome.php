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
		$this->db->limit(8);
		$data['list_jurusan'] = $this->GeneralModel->get_all('jurusan');
		$this->load->view('landingpage/layout/head');
		$this->load->view('landingpage/layout/header', $data);
		$this->load->view('landingpage/layout/slider');
		$this->load->view('landingpage/layout/body');
		$this->load->view('landingpage/layout/footer');
	}
}
