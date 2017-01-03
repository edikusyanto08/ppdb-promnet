<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Template
{
	protected $ci;

	public function __construct()
	{
        $this->ci =& get_instance();
	}

	function admin($content, $data)
	{
		if (is_array($content)) {
			
		}else {
			$data['__head'] = $this->ci->load->view('admin/layout/head', $data, TRUE);
			$data['__header'] = $this->ci->load->view('admin/layout/header', $data, TRUE);
			$data['__sidebar'] = $this->ci->load->view('admin/layout/sidebar', $data, TRUE);
			$data['__content'] = $this->ci->load->view($content, $data, TRUE);
			$data['__body'] = $this->ci->load->view('admin/layout/body', $data, TRUE);
			$data['__footer'] = $this->ci->load->view('admin/layout/footer', $data, TRUE);
		}

		$this->ci->load->view('admin/layout/main', $data);
	}

	function user($content, $data)
	{
		if (is_array($content)) {
			
		}else {
			$data['__head'] = $this->ci->load->view('user/layout/head', $data, TRUE);
			$data['__header'] = $this->ci->load->view('user/layout/header', $data, TRUE);
			$data['__content'] = $this->ci->load->view($content, $data, TRUE);
			$data['__body'] = $this->ci->load->view('user/layout/body', $data, TRUE);
			$data['__footer'] = $this->ci->load->view('user/layout/footer', $data, TRUE);
		}

		$this->ci->load->view('user/layout/main', $data);
	}

	function kartu($content, $data)
	{
		if (is_array($content)) {
			
		}else {
			$data['__head'] = $this->ci->load->view('user/layout/head', $data, TRUE);
			$data['__content'] = $this->ci->load->view($content, $data, TRUE);
		}

		$v = $this->ci->load->view('user/layout/kartu', $data, TRUE);
		return $v;
	}

}

/* End of file template.php */
/* Location: ./application/libraries/template.php */
