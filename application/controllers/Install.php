<?php
if (!defined('BASEPATH')) {exit('No direct script access allowed');}

class Install extends CI_Controller {

	private $file;

	public function __construct() {
		parent::__construct();

		$this->CI = &get_instance();

		$this->is_install = $this->CI->config->item('install');

		$this->file = APPPATH.'config/database.php';

		$this->load->helper('url');

	}

	public function index() {

		$result = $this->validaConfig($this->file);

		if (is_array($result)) {
			$this->load->view('actions/msg_db', $result);

		} else {

			$result = $this->creaBD($this->file);

			if (is_array($result)) {
				$this->load->view('actions/msg_db', $result);
			}
		}

	}

	public function validaConfig() {

		echo "entra a valida";

		$error = '';

		if (file_exists($this->file)) {
			include ($this->file);

			if (isset($db)) {

				if ($db['default']['username'] == '') {
					$error['message'][] = "No esta definido el Usuario de la base de datos en el archvo config/database.php ";
				}
				if ($db['default']['password'] == '') {
					$error['message'][] = "No esta definido el Password de la base de datos en el archvo config/database.php ";
				}
				if ($db['default']['dbdriver'] == '') {
					$error['message'][] = "No esta definido el Driver de la base de datos en el archvo config/database.php ";
				}

			} else {
				$error['message'][] = "No se encuentra la configuracion en el archvo config/database.php";
			}

		} else {
			$error['message'][] = "No se encuentra el archivo de configuracion config/database.php";
		}
		if (is_array($error)) {
			$error['header'] = "Falla de conexion";
			$error['tipo']   = "badconection";
		}

		return $error;
	}

	public function creaBD($file) {

		echo "entra a crear bd";

		$this->load->model('Instalar_Model');
		include $file;

		return $this->Instalar_Model->createDB($db['default']['database']);

	}
}

/* End of file  */
/* Location: ./application/controllers/ */