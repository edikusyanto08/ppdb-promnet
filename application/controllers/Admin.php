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
				redirect(base_url('admin'),'refresh');
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
			$data['siswa_diterima'] = $this->AdminModel->count_status_pendaftaran(4);
			$data['siswa_ditolak'] = $this->AdminModel->count_status_pendaftaran(5);

			$du = $data['un_terbaik'] = $this->AdminModel->get_best_un();

			foreach ($du as $value) {
				$this->db->where('ID_siswa', $value->ID_siswa);
				$r = $this->db->get('persyaratan');
				$r = $r->row();
				$data['foto'][] = $r->foto;
			}

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
		$this->cek_login();
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
		$this->cek_login();
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
		$this->cek_login();
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
		$this->cek_login();
		$data['page_header'] = 'Verifikasi Sekolah';
		$data['b_crumb'] = array (
			'#' => 'Verifikasi',
			'' => 'Verifikasi Sekolah'
		);
		$data['menu_verifikasi'] = $data['menu_sekolah'] = 'active';

		$data['list_sekolah'] = $this->GeneralModel->get_list_sekolah();

		$this->template->admin('admin/sekolah', $data);
	}

	function verifikasi($table, $update, $where)
	{
		$id = "ID_" .$table;
		$this->db->where($id, $where);
		if ($table == 'siswa') {
			$data['status_pendaftaran'] = $update;
		}else {
			$data['status'] = $update;
		}
		
		$this->db->update($table, $data);
 
		if ($this->db->affected_rows() > 0) {
			$this->session->set_flashdata('status', 'Data berhasil diupdate');
			if ($table == 'sekolah') {
				$sekolah = $this->GeneralModel->get_data_sekolah_by_id($where);
				$this->coba($sekolah);
			}
		}else{
			$this->session->set_flashdata('status', 'Status gagal diperbaharui');
		}

		redirect(base_url('admin/'.$table),'refresh');
	}

	function siswa()
	{
		$this->cek_login();
		$data['page_header'] = 'Verifikasi Siswa';
		$data['b_crumb'] = array (
			'#' => 'Verifikasi',
			'' => 'Verifikasi Siswa'
		);
		$data['menu_verifikasi'] = $data['menu_siswa'] = 'active';

		$data['list_siswa'] = $this->AdminModel->get_list_siswa_by_status(2);

		$this->template->admin('admin/siswa', $data);
	}

	function test()
	{
		$this->cek_login();
		$data['page_header'] = 'Test';
		$data['b_crumb'] = array (
			'' => 'Test'
		);
		$data['menu_test'] = 'active';

		$data['list_siswa'] = $this->AdminModel->get_list_siswa_by_status(3);

		$this->template->admin('admin/test', $data);
	}

	function nilai($id)
	{
		$this->cek_login();
		$data['page_header'] = "Nilai";
		$data['b_crumb'] = array (
			'' => 'Test'
		);
		$data['menu_test'] = 'active';

		$where['ID_siswa'] = $id;
		
		$r = $this->db->get_where('siswa', $where);
		$r = $r->row();

		$j = $this->db->get_where('pilihan', $where);
		$j = $j->row();

		$w['ID_jurusan'] = $j->pilihan1;
		$p1 = $this->db->get_where('jurusan', $w);
		$p1 = $p1->row();

		$w['ID_jurusan'] = $j->pilihan2;
		$p2 = $this->db->get_where('jurusan', $w);
		$p2 = $p2->row();

		$b = $this->db->get_where('persyaratan', $where);
		$b = $b->row();

		$un = $this->db->get_where('un', $where);
		$un = $un->row();

		$alamat = $this->db->get_where('alamat', $where);
		$alamat = $alamat->row();

		$data['siswa'] = $r;
		$data['jurusan'][] = $p1;
		$data['jurusan'][] = $p2;
		$data['berkas'] = $b;
		$data['un'] = $un;
		$data['alamat'] = $alamat;

		$this->template->admin('admin/nilai', $data);
	}

	function proses_nilai()
	{
		$lulus = 0;
		$id_lulus = 0;
		$data['ID_siswa'] = $this->input->post('ID_siswa');

		for($i = 0; $i < 2; $i++){
			$data['ID_jurusan'] = $_POST['ID_jurusan'][$i];
			$data['nilai'] = $_POST['nilai'][$i];
			if ($data['nilai'] > $_POST['kkm'][$i]) {
				$data['keterangan'] = 'Lulus';
				$lulus++;
				$id_lulus = $i;
			}else {
				$data['keterangan'] = 'Tidak Lulus';
			}

			$where['ID_siswa'] = $data['ID_siswa'];
			$where['ID_jurusan'] = $data['ID_jurusan'];
			$r = $this->db->get_where('test', $where);
			if ($r->num_rows() > 0) {
				$this->db->where('ID_siswa', $data['ID_siswa']);
				$this->db->where('ID_jurusan', $data['ID_jurusan']);
				$this->db->update('test', $data);
			}else {
				$this->db->insert('test', $data);
			}
		}

		if ($lulus == 2) {
			$msg = $_POST['nama_lengkap'] ." Lulus di jurusan " .$_POST['nama_jurusan'][0];
			$this->session->set_flashdata('status', $msg);

			$up['status_pendaftaran'] = 4;
			$this->db->where('ID_siswa', $data['ID_siswa']);
			$this->db->update('siswa', $up);

			// input ke table penerimaan
			$penerimaan['ID_siswa'] = $data['ID_siswa'];
			$penerimaan['ID_jurusan'] = $_POST['ID_jurusan'][0];

			// cek data siswa sudah diterima atau belum
			$wp['ID_siswa'] = $data['ID_siswa'];
			$r = $this->db->get_where('penerimaan', $wp);

			if ($r->num_rows() > 0) {
				$this->db->where('ID_siswa', $data['ID_siswa']);
				$this->db->update('penerimaan', $penerimaan);
			}else {
				$this->db->insert('penerimaan', $penerimaan);
			}
		}else if ($lulus == 1) {
			$msg = $_POST['nama_lengkap'] ." Lulus di jurusan " .$_POST['nama_jurusan'][$id_lulus];
			$this->session->set_flashdata('status', $msg);

			$up['status_pendaftaran'] = 4;
			$this->db->where('ID_siswa', $data['ID_siswa']);
			$this->db->update('siswa', $up);

			// input ke table penerimaan
			$penerimaan['ID_siswa'] = $data['ID_siswa'];
			$penerimaan['ID_jurusan'] = $_POST['ID_jurusan'][$id_lulus];

			// cek data siswa sudah diterima atau belum
			$wp['ID_siswa'] = $data['ID_siswa'];
			$r = $this->db->get_where('penerimaan', $wp);

			if ($r->num_rows() > 0) {
				$this->db->where('ID_siswa', $data['ID_siswa']);
				$this->db->update('penerimaan', $penerimaan);
			}else {
				$this->db->insert('penerimaan', $penerimaan);
			}
		}else {
			$msg = $_POST['nama_lengkap'] ." Tidak lulus dikedua jurusan";
			$this->session->set_flashdata('status', $msg);

			$up['status_pendaftaran'] = 5;
			$this->db->where('ID_siswa', $data['ID_siswa']);
			$this->db->update('siswa', $up);

			// cek data siswa sudah diterima atau belum
			$wp['ID_siswa'] = $data['ID_siswa'];
			$r = $this->db->get_where('penerimaan', $wp);

			if ($r->num_rows() > 0) {
				$this->db->where('ID_siswa', $data['ID_siswa']);
				$this->db->delete('penerimaan');
			}
		}

		redirect(base_url('admin/nilai/'.$_POST['ID_siswa']),'refresh');
	}

	function penerimaan()
	{
		$this->cek_login();
		$data['page_header'] = 'Penerimaan';
		$data['b_crumb'] = array (
			'#' => 'Penerimaan'
		);
		$data['menu_penerimaan'] = $data['menu_penerimaan'] = 'active';

		$data['list_siswa'] = $this->AdminModel->get_list_siswa_by_status(4);

		$this->template->admin('admin/penerimaan', $data);
	}

	function pendaftar()
	{
		$this->cek_login();
		$data['page_header'] = 'Pendaftar';
		$data['b_crumb'] = array (
			'#' => 'Pendaftar'
		);
		$data['menu_pendaftar'] = 'active';

		$data['list_siswa'] = $this->AdminModel->get_pendaftar();

		$this->template->admin('admin/pendaftar', $data);
	}

	function detail($table, $id)
	{
		if ($table = 'sekolah') {
			$data['menu_sekolah'] = $data['menu_verifikasi'] = 'active';
			$r = $data['sekolah'] = $this->GeneralModel->get_data_sekolah_by_id($id);

			$data['page_header'] = $r->nama_sekolah;
			$data['b_crumb'] = array (
				'#' => 'Verifikasi',
				base_url('admin/sekolah') => 'Sekolah',
				'' => $r->nama_sekolah
			);

			$this->template->admin('admin/detail_sekolah', $data);
		}else if ($table = 'siswa') {
			
		}
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