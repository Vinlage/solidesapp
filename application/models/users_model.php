<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users_model extends CI_Model {

	public function auth($user, $password)
	{
		$password = md5($password);
		$this->db->where("user", $user);
		$this->db->where("password", $password);

		$login = $this->db->get("user")->row_array();

		return $login;
		
	}

	public function create_acc($new_user){
		$this->db->insert("user", $new_user);
	}
}
