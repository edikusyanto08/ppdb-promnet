<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Migrate extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if (!$this->input->is_cli_request()) {
			show_error('you don\'t have permission for this action');
		}
	}

	public function version($version)
	{
		$migration = $this->migration->version($version);

		if (!$migration) {
			echo $this->migration->error_string();
		}else {
			echo "Migration Done" .PHP_EOL;
		}
	}

	

}

/* End of file migrate.php */
/* Location: ./application/controllers/migrate.php */