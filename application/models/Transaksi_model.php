<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Transaksi_model extends CI_Model {

	public function getAllTransaksi() {
		$this->db->select('p.id_purchase, d.nama_toko, status, p.id_status');
		$this->db->from('tbl_purchase p');
		$this->db->join('tbl_user u', 'p.id_user = u.id_user');
		$this->db->join('tbl_dropship d', 'u.id_user = d.id_user');
		$this->db->join('tbl_purchase_status s', 's.id_status = p.id_status');

		return $this->db->get();
	}

	function getDetailTransaksi() {
		$id = $this->input->post('id');
		$this->db->select('name_item, amount, i.selling_price, alamat');
		$this->db->from('tbl_purchasesitem pi');
		$this->db->join('tbl_item i', 'pi.id_item = i.id_item');
		$this->db->join('tbl_purchase p', 'p.id_purchase = pi.id_purchase');
		$this->db->where('pi.id_purchase', $id);

		return $this->db->get();
	}

	function updateStatus() {
		$id_confirm = '001';
		$id = $this->input->post('id');
		$this->db->set('id_status', $id_confirm);
		$this->db->where('id_purchase', $id);
		$this->db->update('tbl_purchase');

		if($this->db->affected_rows() > 0) {
			return true;
		} else
			return false;
	}

}

/* End of file Transaksi_model.php */
/* Location: ./application/models/Transaksi_model.php */