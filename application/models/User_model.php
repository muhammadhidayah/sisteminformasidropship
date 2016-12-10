<?php

class User_model extends CI_Model {

	function login($username, $password) {
		$this->db->select('*');
		$this->db->from('tbl_user');
		$this->db->where('username', $username);
		$this->db->where('password', md5($password));
		return $this->db->get();

	}

	function getAllUser() {
		$query = $this->db->get('tbl_dropship');
		if($query->num_rows() > 0) {
			return $query->result();
		} else {
			# code...
			return false;
		}
	}

	function getCountUser(){
		$this->db->select('count(id_user) as jumlah');
		$this->db->from('tbl_user');

		return $this->db->get();
	}

	public function getUserById($id) {
		$this->db->select('*');
		$this->db->from('tbl_user');
		$this->db->join('tbl_dropship','tbl_user.id_user = tbl_dropship.id_user');
		$this->db->where('tbl_user.id_user',$id);
		$query = $this->db->get();
		return $query;

	}

}

?>
