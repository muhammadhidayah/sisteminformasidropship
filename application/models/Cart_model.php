<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cart_model extends CI_Model {

	public function order() {
		$alamat = "#Penerima: ". $this->input->post('txtNama') . "#Alamat" .$this->input->post('txtAlamat').$this->input->post('txtProvinsi').$this->input->post('txtKabupaten').$this->input->post('txtKecamatan').$this->input->post('txtNohp');
		//Create New Purchase at tbl_purchase
		$id_inv = $this->db->select('fnCreateIdPurchase() as Id')->get()->row()->Id;
		$data_pur = array(
				'id_purchase' 	=> 	$id_inv,
				'id_dropship'	=>	$this->session->userdata('id_user'),
				'id_status'		=> '002',
				'date'			=>	date("Y-m-d H:i:s"),
				'alamat'		=> 	$alamat
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