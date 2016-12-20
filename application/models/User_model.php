<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model {

	function login($username, $password) {
		$this->db->select('*');
		$this->db->from('tbl_user');
		$this->db->where('username', $username);
		$this->db->where('password', md5($password));
		
		return $this->db->get();
	}

	
	public function showAllUser() {
		$this->db->select('*');
		$this->db->from('tbl_user');
		$this->db->join('tbl_jenis_user','tbl_user.id_level = tbl_jenis_user.id_level');
		$query = $this->db->get();
		if($query->num_rows() > 0) {
			return $query->result();
		} else {
			return FALSE;
		}
	}

	function getCountUser() {
		$this->db->select('count(id_user) as jumlah');
		$this->db->from('tbl_user');
		return $this->db->get();
	}

	public function addUser() {
		$data = array(
			"id_level" => $this->input->post('pilihJenisUser'),
			"username" => $this->input->post('txtUsername'),
			"password" => md5($this->input->post('txtPassword'))
		);
		$this->db->insert('tbl_user',$data);
		if($this->db->affected_rows() > 0) {
			return true;
		} else
			return false;
	}

	public function getUserById() {
		$id = $this->input->get('id');
		$this->db->where('id_user',$id);
		$result = $this->db->get('tbl_user');
		if($result->num_rows() > 0) {
			return $result->row();
		} else
			return false;
	}

	public function updateUser() {
		$id = $this->input->post('txtId');
		$data = array(
			"id_user" => $this->input->post('txtId'),
			"username" => $this->input->post('txtUsername'),
			"password" => md5($this->input->post('txtPassword'))
		);
		$this->db->where('id_user', $id);
		$this->db->update('tbl_user', $data);

		if($this->db->affected_rows() > 0) {
			return true;
		} else {
			return false;
		}

	}

	function updateUserLogin($id_user) {
		$this->db->select('NOW() as now');
		$result = $this->db->get()->row()->now;
		$data = array(
			"last_login" => $result
		);
		$this->db->where('id_user', $id_user);
		$this->db->update('tbl_user',$data);

	}

	function deleteUser() {
		$id = $this->input->post('id');
		$this->db->where('id_user', $id);
		$this->db->delete('tbl_user');
		
		if($this->db->affected_rows() > 0) {
			return true;
		} else {
			return false;
		}

	}

}

/* End of file User_model.php */
/* Location: ./application/models/User_model.php */