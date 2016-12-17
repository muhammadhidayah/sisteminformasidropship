<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cart_model extends CI_Model {

	public function order() {
		
		//Create New Purchase at tbl_purchase
		$id_inv = $this->db->select('fnCreateIdPurchase() as Id')->get()->row()->Id;
		$data_pur = array(
				'id_purchase' 	=> 	$id_inv,
				'id_dropship'	=>	$this->session->userdata('id_user'),
				'date'			=>	date("Y-m-d H:i:s")
			);

		$this->db->insert('tbl_purchase',$data_pur);

		//Put detail item at tbl_purchase_item
		foreach ($this->cart->contents() as $item) {
			$data_it_pur = array(
				'id_purchase'	=>	$id_inv,
				'id_item'		=>	$item['id'],
				'amount'		=>	$item['qty'],
				'selling_price'	=>	$item['price']
				);
			$this->db->insert('tbl_purchasesitem',$data_it_pur);
		}

		return true;
	}



}

/* End of file Cart_model.php */
/* Location: ./application/models/Cart_model.php */