<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dropshiper_model extends CI_Model {

	public function getDropshiperById($id) {
		$this->db->select('*');
		$this->db->from('tbl_user');
		$this->db->join('tbl_dropship','tbl_user.id_user = tbl_dropship.id_user');
		$this->db->where('tbl_user.id_user',$id);
		$query = $this->db->get();
		return $query;

	}

	function getAllUser() {
		$this->db->select('*');
		$this->db->from('tbl_dropship');
		$query = $this->db->get();
		if($query->num_rows() > 0) {
			return $query;
		} else {
			# code...
			return false;
		}
	}	

}

/* End of file Dropshiper_model.php */
/* Location: ./application/models/Dropshiper_model.php */