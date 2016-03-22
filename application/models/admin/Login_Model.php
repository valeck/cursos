<?php if (!defined('BASEPATH')) {exit('No direct script access allowed');
}

class Login_Model extends CI_Model {

	public $variable;

	public function __construct() {
		parent::__construct();

	}

	public function allow() {

		$sql = sprintf('select * from tbl_admin_users where email="%s" and password="%s"', $_POST['usuario'], $_POST['password']);

		$qry = $this->db->query($sql);

		if ($qry->num_rows() > 0) {

			foreach ($qry->result() as $value) {

				$session = array(
					'id'          => $value->id,
					'username'    => $value->username,
					'email'       => $value->email,
					'block'       => $value->block,
					'type'        => $value->user_type,
					'last_access' => $value->last_access,
				);
			}
			$this->session->set_userdata($session);

		} else {
			return "No existe este administrador";
		}
	}

	public function sessionOut() {

		$this->_last_access($this->session->id);

		$session = array(
			'id', 'username', 'email', 'block', 'type', 'last_access',
		);
		$this->session->unset_userdata($session);
	}

	private function _last_access($id) {

		$date = new DateTime();

		$sql = sprintf('update tbl_admin_users set last_access="%s" where id=%s', date('Y-m-d H:i:s', $date->getTimestamp()), $id);
		$this->db->query($sql);

	}
}

/* End of file  */
/* Location: ./application/models/ */