<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Produk_model extends CI_Model {

	public function showAllProduct() {
		$query = $this->db->get('tbl_item');
		if($query->num_rows() > 0) {
			return $query->result();
		} else {
			return FALSE;
		}
	}	

}

/* End of file Produk_model.php */
/* Location: ./application/models/Produk_model.php */