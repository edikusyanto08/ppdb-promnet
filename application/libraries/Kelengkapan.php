<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kelengkapan
{
	protected $ci;
	protected $id;

	public function __construct()
	{
        $this->ci =& get_instance();
        $this->ci->load->model('GeneralModel');
	}

	function cek($id)
	{
		$data = array();
		$this->id = $id;

		$data['diri'] = $this->look('siswa');
		$data['alamat'] = $this->look('alamat');
		$data['orangtua'] = $this->look('orangtua');
		$data['berkas'] = $this->look('persyaratan');
		$data['un'] = $this->look('un');
		$data['pilihan'] = $this->look('pilihan');

		return $data;
	}

	function look($table)
	{
		$this->ci->db->where('ID_siswa', $this->id);
		$r = $this->ci->db->get($table, 1, 0);
		$data = $r->result_array();

		$datas = array();

		if ($data != NULL) {
			
			foreach ($data as $value) {
				foreach ($value as $key => $value2) {
					if ($value[$key] == '' || $value[$key] == '0') {
						if (strcmp($key, 'penghasilan_ibu') != 0 && strcmp($key, 'penghasilan_ayah') != 0) {
							$datas[] = $key;
						}
					}
				}
			}
			if (empty($datas)) {
				$datas = TRUE;
			}
		}else {
			$datas = FALSE;
		}

		return $datas;
	}

	

}

/* End of file kelengkapan.php */
/* Location: ./application/libraries/kelengkapan.php */
