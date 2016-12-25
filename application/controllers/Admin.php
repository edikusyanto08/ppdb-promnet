<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('Template');
		$this->load->model('AdminModel');
	}

	function cek_login($return = NULL)
	{
		if (!$this->session->has_userdata('log')) {
			if ($return == NULL) {
				redirect(base_url(base_url('admin')),'refresh');
			}else return 0;
		}else return 1;
	}

	public function index()
	{
		$log = $this->cek_login(1);

		if ($log == 0) {
			$this->proses_login();
			$this->load->view('admin/login');
		}else {
			$data['menu_dashboard'] = 'active';
			$content = 'admin/dashboard';
			$data['page_header'] = 'Dashboard';
			$data['b_crumb'] = array(
									'admin/' => 'Dashboard'
								);
			$data['c'] = 'c';

			$this->template->admin($content, $data);
		}
	}

	function proses_login()
	{
		$this->form_validation->set_rules('username', 'Username', 'trim|required');
		$this->form_validation->set_rules('password', 'Password', 'trim|required');

		if ($this->form_validation->run() == TRUE) {
			$r = $this->AdminModel->get_login($this->input->post('username'), md5($this->input->post('password')));
			if ($r != NULL) {
				$array = array(
					'log' => TRUE,
					'ID' => $r->ID,
					'nama' => $r->nama_admin
				);
				
				$this->session->set_userdata($array);

				redirect(base_url('admin'),'refresh');
			}else {
				$this->session->set_flashdata('status', 'Username atau Password salah');
			}
		}
	}

	function logout()
	{
		$this->session->sess_destroy();
		redirect(base_url('admin'),'refresh');
	}

}

/* End of file admin.php */
/* Location: ./application/controllers/admin.php */