<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ppdb extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('Template');
		$this->load->model('GeneralModel');
	}

	public function index()
	{
		if ($this->session->has_userdata('log_sekolah')) {
			redirect(base_url('sekolah'),'refresh');
		}else if ($this->session->has_userdata('log_siswa')) {
			redirect(base_url('siswa'),'refresh');
		}

		$content = 'user/login';
		$data['title'] = 'Login';
		$this->template->user($content, $data);
	}

	function sekolah($res = NULL)
	{
		if ($res == NULL) {
			$content = 'user/sekolah/form_registrasi_sekolah';
			$data['list_provinsi'] = $this->GeneralModel->get_all('provinsi');
			$data['list_kota'] = $this->GeneralModel->get_all('kota');
			$data['list_kecamatan'] = $this->GeneralModel->get_all('kecamatan');
			$this->template->user($content, $data);
		}else {
			if ($res == 'success') {
				$content = 'user/sekolah/respon_registrasi_sekolah';
				$data['email'] = $this->session->flashdata('email');
				$this->template->user($content, $data);
			}else {
				echo 'Galat';
			}
		}
	}

	function proses_sekolah()
	{
		$_POST['username'] = $this->RandomString();
		$_POST['password'] = $this->RandomString();

		$this->db->insert('sekolah', $_POST);

		if ($this->db->affected_rows() > 0) {
			$this->session->set_flashdata('email', $_POST['email']);
			redirect(base_url('ppdb/sekolah/success'),'refresh');
		}else {
			redirect(base_url('ppdb/sekolah/failed'),'refresh');
		}
	}

	function RandomString()
	{
	    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
	    $randstring = '';
	    for ($i = 0; $i < 10; $i++) {
	        $randstring .= $characters[rand(0, strlen($characters))];
	    }
	    return $randstring;
	}

	function proses_login()
	{

		if ($this->input->post('submit') == 'siswa') {
			$r = $this->GeneralModel->get_login('siswa', $_POST['username'], $_POST['password']);

		}else if ($this->input->post('submit') == 'sekolah') {

			$r = $this->GeneralModel->get_login('sekolah', $_POST['username'], md5($_POST['password']));

			if ($r == NULL) { //user baru pertamakali login
				$r = $this->GeneralModel->get_login('sekolah', $_POST['username'], $_POST['password']);
				if ($r != NULL) {
					$u = $this->GeneralModel->md5_pass('sekolah', $this->input->post('password'), $r->ID_sekolah);
					if ($u > 0) {
						$array = array(
						'log_sekolah' => TRUE,
						'nama_sekolah' => $r->nama_sekolah,
						'ID_sekolah' => $r->ID_sekolah
						);
						
						$this->session->set_userdata($array);

						if ($r->log == 0) {
							$this->session->set_flashdata('first_log', '1');
						}

						redirect(base_url('sekolah'),'refresh');
					}else {
						$this->session->set_flashdata('status', 'Error pembaruan akun. silahkan hubungi administrator');
						redirect(bsae_url('ppdb'),'refresh');
					}
					
				}else { //login salah
					$this->session->set_flashdata('status', 'Username atau Password salah');
					redirect(base_url('ppdb'),'refresh');
				}
			}else { //user sudah pernah login
				$array = array(
					'log_sekolah' => TRUE,
					'nama_sekolah' => $r->nama_sekolah,
					'ID_sekolah' => $r->ID_sekolah
					);
				
				$this->session->set_userdata($array);

				redirect(base_url('sekolah'),'refresh');
			}
		}else redirect(base_url('ppdb'),'refresh');
	}

	function logout()
	{
		$this->session->sess_destroy();
		redirect(base_url('ppdb'),'refresh');
	}

}

/* End of file ppdb.php */
/* Location: ./application/controllers/ppdb.php */