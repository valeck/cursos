<?php if (!defined('BASEPATH')) {exit('No direct script access allowed');
}

class Admins_Model extends CI_Model {

	public function _list() {

		$sql = 'Select * from tbl_admin_users ';

		switch ($this->session->type) {
			case 'S':

				$sql += "where user_type not in('SA')";
				break;
			case 'A':
				$sql += "where user_type not in('SA','S')";
				break;

		}

		return $qry = $this->db->query($sql)->result();
	}

	public function _new() {

		$pass = md5($_POST['password']);

		$sql = sprintf('insert into tbl_admin_users(username, email, password, block, user_type) values("%s","%s","%s",0,"A")',
			$_POST['username'], $_POST['email'], $pass);

		$qry = $this->db->query($sql);

		return $data = array(
			'result' => "200",
			'msj'    => "Se ha agregado el administrador correctamente",
		);

	}

	public function _update() {}

	public function _block() {}

}

/* End of file  */
/* Location: ./application/models/ */