<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ppdb extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('Template');
	}

	public function index()
	{
		$content = 'user/login';
		$data['c'] = 'c';
		$this->template->user($content, $data);
	}

}

/* End of file ppdb.php */
/* Location: ./application/controllers/ppdb.php */