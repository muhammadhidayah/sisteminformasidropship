<?php

class User_model extends CI_Model {

	function login($username, $password) {
		$this->db->select('id_user, username, password');
		$this->db->from('tbl_user');
		$this->db->where('username', $username);
		$this->db->where('password', md5($password));

		return $this->db->get();		

	}

}

?>