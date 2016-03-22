<?php
if (!defined('BASEPATH')) {exit('No direct script access allowed');}

class Inicio extends CI_Controller {

	private $CI;
	private $is_install;
	private $is_online;
	private $db_name;

	public function __construct() {

		parent::__construct();

		$this->CI = &get_instance();

		$this->load->helper('url');

		$this->is_install = $this->CI->config->item('install');
		$this->is_online  = $this->CI->config->item('off_line');

	}

	public function index() {

		if ($this->is_install) {
			
			redirect(base_url('index.php/install'));

		} elseif ($this->is_online) {

			echo "on_off";

		} else {

			echo "listo";

		}

	}
}

/* End of file  */
/* Location: ./application/controllers/ */