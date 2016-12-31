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
			// proses login siswa disini
			$r = $this->GeneralModel->get_login('siswa', $_POST['username'], $_POST['password']);

			if ($r == NULL) { //user pertama kali login
				// jika user pertama login password tidak di md5
				// maka ambil username sama passnya tanpa md5
				$r = $this->GeneralModel->get_login('sekolah', $_POST['username'], $_POST['password']);

				if ($r != NULL) {
					// lalu update passnya jadi md5
					$u = $this->GeneralModel->md5_pass('siswa', $this->input->post('password'), $r->ID_siswa);

					if ($u > 0) { //kondisi berhasil login
						
					}else {
						// proses update gagal
					}
				}else {
					// username atau password salah
				}
				
			}else {
				// username atau password salah
			}


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
							$update_log = $this->GeneralModel->update_log('sekolah', $r->ID_sekolah);
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

	function ganti_password()
	{
		$this->form_validation->set_rules('old_password', 'Password Lama', 'trim|required');
		$this->form_validation->set_rules('new_password', 'Password Lama', 'trim|required');
		
		if ($this->form_validation->run() == TRUE) {
			$oldpass = md5($this->input->post('old_password'));
			$data['ID_sekolah'] = $this->session->userdata('ID_sekolah');
			$r = $this->db->get_where('sekolah', $data);
			$r = $r->row();

			if ($oldpass == $r->password) {
				$this->db->where('ID_sekolah', $r->ID_sekolah);
				$data['password'] = md5($this->input->post('new_password'));
				$u = $this->db->update('sekolah', $data);
				if ($this->db->affected_rows() > 0) {
					$this->session->set_flashdata('status', 'Password berhasil diubah');
				}else $this->session->set_flashdata('status', 'Password gagal diubah');
			}else $this->session->set_flashdata('status', 'Password Lama salah');
		} else {
			$this->session->set_flashdata('status', 'Masukan password lama dan password baru');
		}

		redirect(base_url('sekolah/pengaturan'),'refresh');
	}

	function logout()
	{
		$this->session->sess_destroy();
		redirect(base_url('ppdb'),'refresh');
	}

}

/* End of file ppdb.php */
/* Location: ./application/controllers/ppdb.php */