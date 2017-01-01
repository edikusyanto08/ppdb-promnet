<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('Template');
		$this->load->model('AdminModel');
		$this->load->model('GeneralModel');
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
			$data['page_header'] = 'Login';
			$this->load->view('admin/login', $data);
		}else {
			$data['menu_dashboard'] = 'active';
			$content = 'admin/dashboard';
			$data['page_header'] = 'Dashboard';
			$data['b_crumb'] = array(
									'admin/' => 'Dashboard'
								);
			$data['sekolah_terdaftar'] = $this->db->count_all('sekolah');
			$data['siswa_mendaftar'] = $this->AdminModel->count_status_pendaftaran(1);
			$data['siswa_pending'] = $this->AdminModel->count_status_pendaftaran(2);
			$data['siswa_terdaftar'] = $this->AdminModel->count_status_pendaftaran(3);

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

	function jurusan($aksi = NULL, $id = NULL)
	{
		$data['page_header'] = 'Jurusan';
		$data['b_crumb'] = array (
			'#' => 'Data Master',
			'' => 'Jurusan'
		);

		if ($aksi != NULL && $id != NULL) {
			$data['aksi'] = 'edit';
			$data['edit_id'] = $id;
		}

		$data['menu_jurusan'] = $data['menu_datamaster'] = 'active';
		$data['list_jurusan'] = $this->GeneralModel->get_all(('jurusan'));

		$this->template->admin('admin/jurusan', $data);
	}

	function proses_jurusan()
	{
		$i = $this->db->insert('jurusan', $_POST);
		if ($this->db->affected_rows() > 0) {
			$this->session->set_flashdata('status', 'Data berhasil disimpan');
		}else {
			$this->session->set_flashdata('status', 'Data gagal disimpan');
		}

		redirect(base_url('admin/jurusan'),'refresh');
	}

	function update_jurusan()
	{
		$this->db->where('ID_jurusan', $this->input->post('ID_jurusan'));
		$this->db->update('jurusan', $_POST);
		if ($this->db->affected_rows() > 0) {
			$this->session->set_flashdata('status', 'Data berhasil diupdate');
		}else {

		}

		redirect(base_url('admin/jurusan'),'refresh');
	}

	function lokasi($aksi = NULL, $id = NULL)
	{
		$data['page_header'] = 'Data Lokasi';
		$data['b_crumb'] = array (
			'#' => 'Data Master',
			' ' => 'Data Lokasi'
		);

		if ($aksi != NULL && $id != NULL) {
			if ($aksi == 'editkota') {
				$data['edit_aksi'] = 'edit';
				$data['edit_id_kota'] = $id;
			}else if ($aksi == 'editkec') {
				$data['edit_aksi'] = 'edit';
				$data['edit_id_kec'] = $id;
			}
			else {
				$data['aksi'] = 'edit';
				$data['edit_id'] = $id;
			}
		}

		$data['menu_lokasi'] = $data['menu_datamaster'] = 'active';
		$data['list_provinsi'] = $this->GeneralModel->get_all(('provinsi'));
		$data['list_kota'] = $this->GeneralModel->get_all(('kota'));
		$data['list_kecamatan'] = $this->GeneralModel->get_all(('kecamatan'));

		$this->template->admin('admin/lokasi', $data);
	}

	function proses_lokasi()
	{
		$table = $this->input->post('table');
		unset($_POST['table']);

		$this->db->insert($table, $_POST);
		if ($this->db->affected_rows() > 0) {
			$this->session->set_flashdata('status', $table." Berhasil disimpan");
		}else $this->session->set_flashdata('status', $table." gagal disimpan");


		redirect(base_url('admin/lokasi'),'refresh');
	}

	function update_lokasi()
	{
		$table = $this->input->post('table');
		$id = "ID_" .$table;

		unset($_POST['table']);
		
		$this->db->where($id, $this->input->post($id));
		$this->db->update($table, $_POST);
		if ($this->db->affected_rows() > 0) {
			$this->session->set_flashdata('status', $table." Berhasil disimpan");
		}else $this->session->set_flashdata('status', $table." gagal disimpan");

		redirect(base_url('admin/lokasi'),'refresh');
	}

	function un()
	{
		$data['page_header'] = 'Ujian Nasional';
		$data['b_crumb'] = array (
			'#' => 'Data Master',
			'' => 'Ujian Nasional'
		);

		$data['menu_datamaster'] = $data['menu_un'] = 'active';

		$this->template->admin('admin/un', $data);
	}

	function status($aksi = NULL, $id = NULL)
	{
		$data['page_header'] = 'Status Pendaftaran';
		$data['b_crumb'] = array (
			'#' => 'Data Master',
			'' => 'Status Pendaftaran'
		);

		if ($aksi != NULL && $id != NULL) {
			$data['edit_id'] = $id;
			$data['edit_aksi'] = 'edit';
		}

		$data['menu_datamaster'] = $data['menu_status'] = 'active';
		$data['list_status'] = $this->GeneralModel->get_all('status');

		$this->template->admin('admin/status', $data);
	}

	function proses_status()
	{
		$this->db->insert('status', $_POST);
		if ($this->db->affected_rows() > 0) {
			$this->session->set_flashdata('status', 'Status berhasil disimpan');
		}else $this->session->set_flashdata('status', 'Status gagal disimpan');

		redirect(base_url('admin/status'),'refresh');
	}

	function update_status()
	{
		$this->db->where('ID_status', $this->input->post('ID_status'));
		unset($_POST['ID_status']);
		$this->db->update('status', $_POST);

		if ($this->db->affected_rows() > 0) {
			$this->session->set_flashdata('status', 'Status berhasil disimpan');
		}else $this->session->set_flashdata('status', 'Status gagal disimpan');


		redirect(base_url('admin/status'),'refresh');
	}

	function sekolah()
	{
		$data['page_header'] = 'Verifikasi Sekolah';
		$data['b_crumb'] = array (
			'#' => 'Verifikasi',
			'' => 'Verifikasi Sekolah'
		);

		$data['list_sekolah'] = $this->GeneralModel->get_list_sekolah();

		$this->template->admin('admin/sekolah', $data);
	}

	function verifikasi($table, $update, $where)
	{
		$id = "ID_" .$table;
		$this->db->where($id, $where);
		$data['status'] = $update;
		$this->db->update($table, $data);

		if ($this->db->affected_rows() > 0) {
			$sekolah = $this->GeneralModel->get_data_sekolah_by_id($where);
			$this->coba($sekolah);
		}else{
			$this->session->set_flashdata('status', 'Status gagal diperbaharui');
		}

		redirect(base_url('admin/sekolah'),'refresh');
	}

	function logout()
	{
		$this->session->sess_destroy();
		redirect(base_url('admin'),'refresh');
	}
	
	function coba($sekolah)
	{
		$config = Array(
	      'protocol' => 'smtp',
	      'smtp_host' => 'ssl://smtp.googlemail.com',
	      'smtp_port' => 465,
	      'smtp_user' => 'simanjuntakronaldo9@gmail.com',
	      'smtp_pass' => 'forzamilan14',
	      'mailtype' => 'html',
	      'charset' => 'iso-8859-1',
	      'wordwrap' => TRUE
	    );

		$this->load->library('email', $config);

		$this->email->set_newline("\r\n");
		$this->email->from('ppdb@smkn88bdg.sch.id', 'Panitia PPDB SMKN 88 BDG');
		$this->email->to($sekolah->email);
		/*$this->email->cc('another@another-example.com');
		$this->email->bcc('them@their-example.com');*/

		$header = "MIME-Version: 1.0" . "\r\n";
		$header .= "Content-type:text/html;charset=iso-8859-1" . "\r\n";
		$header .= 'From: <ppdb@smkn88bdg.sch.id>'. "\r\n";

		$this->email->subject('Pendaftaran PPDB Online');
		$msg = "Terimaskasih telah mendaftar. Kini " .$sekolah->nama_sekolah ." sudah resmi terdaftar di PPDB onlin SMKN 88 Bandung.\r\n";
		$msg .= "Silahkan login ke website PPDB Online SMKN 88 Bandung dengan akun berikut: \r\n";
		$msg .= "Username : " .$sekolah->username ."\r\n";
		$msg .= " dan \r\n";
		$msg .= "Password : " .$sekolah->password ."\r\n";
		
		$this->email->message($msg);
		$this->email->set_header('Header', $header);

		if ($this->email->send()) {
			$this->session->set_flashdata('status', 'Status diperbaharui. info akun terkirim ke email sekolah');
		}else {
			echo $this->email->print_debugger();
			 $this->session->set_flashdata('status', 'Email tidak Terkirim');
		}
	}

}

/* End of file admin.php */
/* Location: ./application/controllers/admin.php */