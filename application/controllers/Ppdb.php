<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ppdb extends CI_Controller {

	public function index()
	{
		$this->load->view('ppdb/layout/head');
		$this->load->view('ppdb/layout/header');
		$this->load->view('ppdb/layout/body');
		$this->load->view('ppdb/layout/footer');
	}

}

/* End of file ppdb.php */
/* Location: ./application/controllers/ppdb.php */