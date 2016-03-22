<?php
if (!defined('BASEPATH')) {exit('No direct script access allowed');}

class admin extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->helper(array('form', 'url'));
	}

	public function index() {

		if (!$this->session->id) {
			redirect(base_url('index.php/admin/login'));
		} else {
			redirect(base_url('index.php/admin/dashboard'));
		}
	}

	public function login() {

		$this->load->library('form_validation');

		$data = array();
		$this->form_validation->set_rules('usuario', 'Usuario', 'trim|required|valid_email',
			array('required' => 'Favor de ingresar %s', 'valid_email' => 'No es un correo de formato valido'));

		$this->form_validation->set_rules('password', 'Password', 'trim|required|md5',
			array('required' => 'Favor de ingresar %s'));

		if ($this->form_validation->run() == FALSE) {

			$data['respuesta'] = '';
			$this->load->view('admin/login', $data);

		} else {
			$this->load->model('admin/Login_Model');

			$result = $this->Login_Model->allow();

			if ($result) {
				$data['respuesta'] = $result;
				$this->load->view('admin/login', $data);
			} else {
				if ($this->session->block == 1) {
					$data['respuesta'] = 'usuario bloqueado favor de validar con el Administrador';
					$this->load->view('admin/login', $data);
				} else {
					redirect(base_url('index.php/admin/dashboard'));
				}
			}
		}
	}

	public function logout() {
		$this->load->model('admin/Login_Model');

		$this->Login_Model->sessionOut();

		redirect(base_url('index.php/admin/login'));
	}

	public function dashboard() {

		//var_dump($this->session).die();
		if ($this->session->id) {

			$data['menuH']     = $this->load->view('admin/menuH.html');
			$data['menuLeft']  = $this->load->view('admin/menuLeft');
			$data['container'] = $this->load->view('admin/container');
			$data['menuRight'] = $this->load->view('admin/menuRight');
			$data['footer']    = $this->load->view('admin/footer');

			$this->load->view('admin/index', $data);
			//$this->load->view('admin/dashboard');
		} else {
			redirect(base_url('index.php/admin/logout'));
		}

	}

	public function admins() {

		$this->load->model('admin/admins_model');

		$data['list'] = $this->admins_model->_list();
		//var_dump($data);

		$data['menuH']     = $this->load->view('admin/menuH.html');
		$data['menuLeft']  = $this->load->view('admin/menuLeft');
		$data['container'] = $this->load->view('admin/admins', $data);
		$data['footer']    = $this->load->view('admin/footer');
		$this->load->view('admin/index', $data);
	}

	public function users() {

		$data['menuH']     = $this->load->view('admin/menuH.html');
		$data['menuLeft']  = $this->load->view('admin/menuLeft');
		$data['container'] = $this->load->view('admin/container');
		$data['footer']    = $this->load->view('admin/footer');
		$this->load->view('admin/index', $data);
	}

	public function add() {

		$this->load->model('admin/admins_model');

		return $this->admins_model->_new();
	}

}

/* End of file  */
/* Location: ./application/controllers/ */