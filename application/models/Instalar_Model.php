<?php

/**
 * undocumented class
 *
 * @package default
 * @author
 **/
class Instalar_Model extends CI_Model {

	public function __construct() {

		parent::__construct();

	}

	public function createDB($db_name) {

		$this->load->dbforge();

		if ($this->dbforge->create_database($db_name)) {

			$data['header']    = "Base de Datos Creada";
			$data['tipo']      = "databaseOk";
			$data['message'][] = "Se creo correctamente <span style='color:red'>".$db_name."</span> en el Sistema";

		} else {
			
			$data['header']    = "Base de Datos ya existe";
			$data['tipo']      = "databaseBad";
			$data['message'][] = "Ya existe <span style='color:red'>".$db_name."</span> en el Sistema";
		}

		return $data;
	}

	private function createLog() {

	}

	private function createCatalogs() {
		#crear catalogo de tipo de registro

		#crear catalogo de tipo de usario
	}

	private function createUsuario() {

	}
}// END class

?>