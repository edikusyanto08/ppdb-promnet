<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sekolah extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('Template');
		$this->load->model('GeneralModel');
		$this->load->model('UserModel');
		$this->load->library('Pdf');
	}

	public function index()
	{
		// cek apakah user pertama kali login?
		if ($this->session->has_userdata('first_log')) {
			$data['first_log'] = 1;
		}

		$this->db->where('nama_tetapan', 'tanggal_pengumuman');
		$r = $this->db->get('tetapan');
		$r = $r->row();
		$tanggal_pengumuman = $r->isi_tetapan;
		$n = date('Y-m-d');
		if ($n >= $tanggal_pengumuman ) {
			$data['pengumuman'] = TRUE;
		}else $data['pengumuman'] = FALSE;

		$data['title'] = $this->session->userdata('nama_sekolah');
		$data['menu_home'] = 1;
		$data['mendaftar'] = $this->UserModel->count_mendaftar_by_sekolah($this->session->userdata('ID_sekolah'));
		$data['pending'] = $this->UserModel->count_pending_by_sekolah($this->session->userdata('ID_sekolah'));
		$data['terdaftar'] = $this->UserModel->count_terdaftar_by_sekolah($this->session->userdata('ID_sekolah'));
		$data['diterima'] = $this->UserModel->count_diterima_by_sekolah($this->session->userdata('ID_sekolah'));
		$data['ditolak'] = $this->UserModel->count_ditolak_by_sekolah($this->session->userdata('ID_sekolah'));

		$this->template->user('user/sekolah/sekolah', $data);
	}

	function pengaturan()
	{
		$data['title'] = 'Pengaturan';
		$data['sekolah'] = $this->GeneralModel->get_data_sekolah_by_id($this->session->userdata('ID_sekolah'));
		$data['list_provinsi'] = $this->GeneralModel->get_all('provinsi');
		$data['list_kota'] = $this->GeneralModel->get_all('kota');
		$data['list_kec'] = $this->GeneralModel->get_all('kecamatan');

		$this->template->user('user/sekolah/pengaturan', $data);
	}

	function update_sekolah()
	{
		$r = $this->GeneralModel->update_table('sekolah', $_POST, $_POST['ID_sekolah']);
		if ($r > 0) {
			$this->session->set_flashdata('status2', 'Data berhasil diubah');
		}else $this->session->set_flashdata('status2', 'Data tidak diubah');

		redirect(base_url('sekolah/pengaturan'),'refresh');
	}

	function siswa()
	{
		$data['title'] = 'Siswa';
		$data['menu_siswa'] = 1;

		$this->db->where('nama_tetapan', 'tanggal_pengumuman');
		$r = $this->db->get('tetapan');
		$r = $r->row();
		$tanggal_pengumuman = $r->isi_tetapan;
		$n = date('Y-m-d');
		if ($n >= $tanggal_pengumuman ) {
			$data['pengumuman'] = TRUE;
		}else $data['pengumuman'] = FALSE;
		
		$data['list_siswa'] = $this->UserModel->get_status_siswa_by_sekolah($this->session->userdata('ID_sekolah'));

		if (isset($_POST['cetak'])) {
			$html = $this->load->view('user/sekolah/cetak_siswa', $data, TRUE);
			$nama = "Pendaftaran Siswa di PPDB SMKN 88 BDG";
			$this->pdf->generate_pdf($html, $nama);
		}

		$this->template->user('user/sekolah/siswa', $data);
	}

}

/* End of file sekolah.php */
/* Location: ./application/controllers/sekolah.php */