<?php
	echo $__head;
	echo $__header;
	if ($this->session->has_userdata('log_sekolah') && $title != 'Login') {
		$this->load->view('user/layout/nav_sekolah');
	}else if ($this->session->has_userdata('log_siswa') && $title != 'Login') {
		$this->load->view('user/layout/nav_siswa');
	}
	echo $__body;
	echo $__footer;
?>