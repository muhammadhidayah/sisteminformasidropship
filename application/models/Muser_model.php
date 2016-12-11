<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Muser_model extends CI_Model {

	public function showAllUser() {
		$query = $this->db->get('tbl_user');
		if($query->num_rows() > 0) {
			return $query->result();
		} else {
			return FALSE;
		}
	}
	

}

/* End of file Muser_model.php */
/* Location: ./application/models/Muser_model.php */