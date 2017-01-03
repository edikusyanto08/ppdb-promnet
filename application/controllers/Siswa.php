<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Siswa extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('GeneralModel');
		$this->load->model('UserModel');
		$this->load->library('Template');
		$this->load->library('Kelengkapan');
		$this->load->library('Pdf');
	}

	public function index()
	{
		// cek apakah user pertama kali login?
		if ($this->session->has_userdata('first_log')) {
			$data['first_log'] = 1;
		}
		
		// variabel kebutuhan tampilan
		$data['title'] = 'Beranda';
		$data['menu_home'] = 1;

		// mengambil data status
		$data['siswa'] = $this->UserModel->get_status_siswa($this->session->userdata('ID_siswa'));
		$nama = $data['siswa']->nama_lengkap;

		if ($data['siswa']->status_pendaftaran == 1) {
			$data['warna'] = 'info';
		}else if ($data['siswa']->status_pendaftaran == 2) {
			$data['warna'] = 'warning';
		}else if ($data['siswa']->status_pendaftaran == 3) {
			$data['warna'] = 'primary';
		}else if ($data['siswa']->status_pendaftaran == 4) {
			$data['warna'] = 'success';

			$this->db->where('ID_siswa', $this->session->userdata('ID_siswa'));
			$p = $this->db->get('penerimaan', 1, 0);
			$p = $p->row();

			$this->db->where('ID_jurusan', $p->ID_jurusan);
			$j =  $this->db->get('jurusan', 1, 0);
			$j = $j->row();

			$jurusan = $j->nama_jurusan;

			$data['pesan'] = "Selamat! anda diterima di <strong>SMKN 88 Bandung Jurusan $jurusan</strong>. Mari berkarya dan selamat menempuh jalan baru di SMKN 88 Bandung $nama!";
		}else if ($data['siswa']->status_pendaftaran == 5) {
			$data['warna'] = 'danger';
			$data['pesan'] = "Mohon maaf $nama, Anda belum bisa kami terima. <br> Hei, Sukses adalah kemampuan untuk pergi dari suatu kegagalan tanpa kehilangan semangat. Tetap semangat ya :)";
		}

		$this->template->user('user/siswa/siswa', $data);
	}

	function biodata()
	{
		// variabel kebutuhan tampilan
		$data['title'] = 'Biodata';
		$data['menu_biodata'] = 1;

		// variabel data konten
		// mengambil data dari tabel siswa
		$where['ID_siswa'] = $this->session->userdata('ID_siswa');
		$r = $this->db->get_where('siswa', $where);
		$data['siswa']['siswa'] = $r->row();

		// mengambil nama sekolah siswa
		$this->db->reset_query();
		unset($where);
		$where['ID_sekolah'] = $data['siswa']['siswa']->ID_sekolah;
		$r = $this->db->get_where('sekolah', $where);
		$data['siswa']['sekolah'] = $r->row();

		// mengambil data provinsi
		$data['provinsi'] = $this->GeneralModel->get_all('provinsi');
		$data['kota'] = $this->GeneralModel->get_all('kota');
		$data['kecamatan'] = $this->GeneralModel->get_all('kecamatan');

		// mengambil data alamat siswa (jika ada)
		$this->db->reset_query();
		unset($where);
		$where['ID_siswa'] = $this->session->userdata('ID_siswa');
		$r = $this->db->get_where('alamat', $where);
		$r = $r->row();
		if ($r != NULL) {
			$data['siswa']['alamat'] = $r;
		}

		// mengambil data orangtua siswa (jika ada)
		$this->db->reset_query();
		unset($where);
		$where['ID_siswa'] = $this->session->userdata('ID_siswa');
		$r = $this->db->get_where('orangtua', $where);
		$r = $r->row();
		if ($r != NULL) {
			$data['siswa']['orangtua'] = $r;
		}

		$this->template->user('user/siswa/biodata', $data);
	}

	function proses_biodata()
	{
		$err = 3;

		// primary key
		$id = $_POST['ID_siswa'];

		// datadiri siswa
		$siswa['email'] = $_POST['email'];
		$siswa['kontak'] = $_POST['kontak'];

		// data ortu siswa
		$ortu['nama_ayah'] = $_POST['nama_ayah'];
		$ortu['pekerjaan_ayah'] = $_POST['pekerjaan_ayah'];
		$ortu['penghasilan_ayah'] = $_POST['penghasilan_ayah'];
		$ortu['umur_ayah'] = $_POST['umur_ayah'];
		$ortu['kontak_ayah'] = $_POST['kontak_ayah'];
		$ortu['nama_ibu'] = $_POST['nama_ibu'];
		$ortu['pekerjaan_ibu'] = $_POST['pekerjaan_ibu'];
		$ortu['penghasilan_ibu'] = $_POST['penghasilan_ibu'];
		$ortu['umur_ibu'] = $_POST['umur_ibu'];
		$ortu['kontak_ibu'] = $_POST['kontak_ibu'];
		$ortu['ID_siswa'] = $id;

		// data alamat siswa
		$alamat['provinsi'] = $_POST['provinsi'];
		$alamat['kota'] = $_POST['kota'];
		$alamat['kecamatan'] = $_POST['kecamatan'];
		$alamat['desa'] = $_POST['desa'];
		$alamat['detail'] = $_POST['detail'];
		$alamat['ID_siswa'] = $id;

		// update table siswa
		$this->db->where('ID_siswa', $id);
		$this->db->update('siswa', $siswa);
		if ($this->db->affected_rows() > 0) {
			$err--;
		}

		// cek data orangtua siswa di table orangtua apakah sudah ada atau belum
		$this->db->where('ID_siswa', $id);
		$r = $this->db->get('orangtua');

		if ($r->num_rows() < 1) { // jika kosong maka insert
			$this->db->insert('orangtua', $ortu);
			if ($this->db->affected_rows() > 0) {
				$err--;
			}
		}else{ //jika sudah ada maka update
			$this->db->where('ID_siswa', $id);
			$this->db->update('orangtua', $ortu);
			if ($this->db->affected_rows() > 0) {
				$err--;
			}
		}

		// cek data alamat siswa di tabel alamat
		$this->db->where('ID_siswa', $id);
		$r = $this->db->get('alamat');

		if ($r->num_rows() < 1) { // jika kosong maka insert
			$this->db->insert('alamat', $alamat);
			if ($this->db->affected_rows() > 0) {
				$err--;
			}
		}else{ //jika sudah ada maka update
			$this->db->where('ID_siswa', $id);
			$this->db->update('alamat', $alamat);
			if ($this->db->affected_rows() > 0) {
				$err--;
			}
		}

		if ($err == 0) {
			$this->session->set_flashdata('status', 'Biodata berhasil disimpan');
		}else if ($err < 3) {
			$this->session->set_flashdata('status', 'Biodata berhasil diupdate');
		}else {
			$this->session->set_flashdata('status', 'Biodata gagal disimpan/diupdate. silahkan coba lagi');
		}
		redirect(base_url('siswa/biodata'),'refresh');
	}

	function berkas()
	{
		// variabel kebutuhan tampilan
		$data['title'] = 'Berkas';
		$data['menu_berkas'] = 1;

		// variabel data konten
		$where['ID_siswa'] = $this->session->userdata('ID_siswa');
		$r = $this->db->get_where('persyaratan', $where);
		$data['berkas'] = $r->row();

		$this->template->user('user/siswa/berkas', $data);
	}

	function proses_berkas()
	{
		$id = $this->input->post('ID_siswa');
		$sum = 0;
		foreach ($_FILES as $value) {
			if ($value['name'] != '' || $value['name'] != NULL) {
				$sum++;
			}
		}
		
		$uploaded = 0;

		foreach ($_FILES as $key => $value) {
			if ($_FILES[$key]['name'] != '' || $_FILES[$key]['name'] != NULL) {
				$config['upload_path']          = './upload/';
		        $config['allowed_types']        = '*';
		        $config['max_size']             = 10240;
		        $config['max_width']            = 1024;
		        $config['max_height']           = 1024;
		        $nama_file = $key.$id;
		        $config['file_name']			= "$key$id";
		        $config['overwrite']			= TRUE;

		        $this->load->library('upload', $config);

		        if (!$this->upload->do_upload($key))
		        {
		                $error = array('error' => $this->upload->display_errors());
		        }
		        else {
	                $data = array('upload_data' => $this->upload->data());
	                // cek apakah berkas siswa sudah di DB
	                $this->db->where('ID_siswa', $id);
	                $r = $this->db->get('persyaratan');

		            $ins[$key] = $data['upload_data']['file_name'];
		            $ins['ID_siswa'] = $id;
	                
	                if ($r->num_rows() < 1) { //data belum ada
		                $this->db->insert('persyaratan', $ins);
	                }else { //data sudah ada
	                	$this->db->where('ID_siswa', $id);
	                	$this->db->update('persyaratan', $ins);
	                }

	                if ($this->db->affected_rows() > 0) {
	                	$uploaded++;
	                }else {
	                	
	                }
		        }
			}
		}

		if ($uploaded == $sum) {
			$this->session->set_flashdata('status', 'semua berkas berhasil diupload');
		}else if ($uploaded > 0 && $uploaded < $sum) {
			$this->session->set_flashdata('status', 'sebagian file tidak terupload');
		}else {
			$this->session->set_flashdata('status', 'upload file gagal');
		}

		redirect(base_url('siswa/berkas'),'refresh');
	}

	function nilai()
	{
		// variabel kebutuhan tampilan
		$data['title'] = 'Nilai UN';
		$data['menu_nilai'] = 1;

		// ambil nilai siswa jika ada
		$where['ID_siswa'] = $this->session->userdata('ID_siswa');
		$r = $this->db->get_where('un', $where);
		$data['nilai'] = $r->row();

		$this->template->user('user/siswa/nilai', $data);
	}

	function proses_nilai()
	{
		// cek apakah nilai un siswa sudah ada di tabel un
		$where['ID_siswa'] = $_POST['ID_siswa'];
		$r = $this->db->get_where('un', $where);
		$r = $r->row();

		if ($r != NULL) {
			$this->db->where('ID_siswa', $_POST['ID_siswa']);
			$this->db->update('un', $_POST);
			if ($this->db->affected_rows() > 0) {
				$this->session->set_flashdata('status', 'Nilai berhasil diupdate');
			}else $this->session->set_flashdata('status', 'Nilai tidak diupdate');
		}else {
			$this->db->insert('un', $_POST);
			if ($this->db->affected_rows() > 0) {
				$this->session->set_flashdata('status', 'Nilai berhasil disimpan');
			}else $this->session->set_flashdata('status', 'Nilai gagal disimpan');
		}

		redirect(base_url('siswa/nilai'),'refresh');
	}

	function jurusan()
	{
		// variabel kebutuhan tampilan
		$data['title'] = 'Jurusan';
		$data['menu_jurusan'] = 1;

		// ambil nilai siswa jika ada
		$where['ID_siswa'] = $this->session->userdata('ID_siswa');
		$r = $this->db->get_where('pilihan', $where);
		$data['pilihan'] = $r->row();

		// mengambil data jurusan yang ada
		$r = $this->db->get('jurusan');
		$data['jurusan'] = $r->result();

		$r = $this->UserModel->get_status_siswa($this->session->userdata('ID_siswa'));
		$data['status_pendaftaran'] = $r;


		$this->template->user('user/siswa/jurusan', $data);
	}

	function proses_jurusan()
	{
		// cek apakah jurusan yang dipilih siswa sudah ada di tabel pilihan
		$where['ID_siswa'] = $_POST['ID_siswa'];
		$r = $this->db->get_where('pilihan', $where);
		$r = $r->row();

		if ($r != NULL) {
			$this->db->where('ID_siswa', $_POST['ID_siswa']);
			$this->db->update('pilihan', $_POST);
			if ($this->db->affected_rows() > 0) {
				$this->session->set_flashdata('status', 'Jurusan berhasil diupdate');
			}else $this->session->set_flashdata('status', 'Jurusan tidak diupdate');
		}else {
			$this->db->insert('pilihan', $_POST);
			if ($this->db->affected_rows() > 0) {
				$this->session->set_flashdata('status', 'Jurusan berhasil disimpan');
			}else $this->session->set_flashdata('status', 'Jurusan gagal disimpan');
		}

		redirect(base_url('siswa/jurusan'),'refresh');
	}

	function verifikasi()
	{
		// variabel kebutuhan tampilan
		$data['title'] = 'Verifikasi';
		$data['menu_verif'] = 1;

		// cek kelengkapan
		$data['kelengkapan'] = $this->kelengkapan->cek($this->session->userdata('ID_siswa'));
		$sum = count($data['kelengkapan']);
		$c = 0;
		foreach ($data['kelengkapan'] as $value) {
			if ($value == 1) {
				$c++;
			}
		}
		if ($c == $sum) {
			$data['verifikasi'] = TRUE;
		}else {
			$data['verifikasi'] = FALSE;
		}

		// mengambil data status
		$data['siswa'] = $this->UserModel->get_status_siswa($this->session->userdata('ID_siswa'));

		$this->template->user('user/siswa/verifikasi', $data);
	}

	function submit()
	{
		$data['status_pendaftaran'] = 2;
		$this->db->where('ID_siswa', $_POST['ID_siswa']);
		$this->db->update('siswa', $data);

		if ($this->db->affected_rows() > 0) {
			$this->session->set_flashdata('status', 'Data telah disubmit');
		}else {
			$this->session->set_flashdata('status', 'Data gagal disubmit');
		}

		redirect(base_url('siswa/verifikasi'),'refresh');
	}

	function cetak()
	{
		// variabel kebutuhan tampilan
		$data['title'] = 'Cetak Kartu Pendaftaran';
		$data['menu_cetak'] = 1;

		// mengambil data siswa
		$data['siswa'] = $this->UserModel->get_data_siswa_for_kartu($this->session->userdata('ID_siswa'));
		$data['header'] = $this->load->view('user/layout/header', $data,TRUE);

		$where['ID_jurusan'] = $data['siswa']->pilihan1;
		$jurusan1 = $this->db->get_where('jurusan', $where);
		$jurusan1 = $jurusan1->row();

		$where['ID_jurusan'] = $data['siswa']->pilihan2;
		$jurusan2 = $this->db->get_where('jurusan', $where);
		$jurusan2 = $jurusan2->row();

		$data['siswa']->jurusan1 = $jurusan1->nama_jurusan;
		$data['siswa']->jurusan2 = $jurusan2->nama_jurusan;

		$data['kartu_peserta'] = $this->load->view('user/siswa/kartu_peserta', $data, TRUE);
		

		if (isset($_POST['submit'])) {
			$r = $this->load->view('user/siswa/kartu2', $data, TRUE);
			$html = $r;
			// $html = $this->template->kartu('user/siswa/kartu_peserta', $data);
			$nama = "Kartu-Peserta-PPDB-SMKN-88-BDG";
			// echo $html;
			$this->pdf->generate_pdf($html, $nama);
		}else {
			$this->template->user('user/siswa/cetak', $data);
		}

	}

}

/* End of file siswa.php */
/* Location: ./application/controllers/siswa.php */