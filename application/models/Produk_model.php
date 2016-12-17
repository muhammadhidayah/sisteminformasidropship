<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Produk_model extends CI_Model {

	var $table = 'tbl_item';
	var $column_order = array('id_item', 'id_category','name_item', null, null,null);
	var $column_search = array('id_item', 'id_category','name_item');
	var $order = array('id_category' => 'asc');

	public function showAllProduct() {
		$query = $this->db->get('tbl_item');
		if($query->num_rows() > 0) {
			return $query->result();
		} else {
			return FALSE;
		}
	}

	public function getProductById($id) {
		$this->db->where('id_item',$id);
		$query = $this->db->get('tbl_item');
		
		return $query;
	}

	/* Untuk Datatables Server side, silahkan kalau kalian ingin menggunakan datatables. silahkan cari digoogle tutorial selanjutnya. Codingnya udah tak buatin
	private function _get_datatables_query() {
		$this->db->from($this->table);
		$i = 0;

		foreach ($this->column_search as $item) {
			if($_POST['search']['value']) {

				if($i === 0) {
					$this->db->group_start();
					$this->db->like($item,$_POST['search']['value']);
				} else {
					$this->db->or_like($item,$_POST['search']['value']);
				}

				if(count($this->column_search) - 1 == $i)
					$this->db->group_end();
			}
			$i++;
		}

		if(isset($_POST['order'])) {
			$this->db->oder_by($this->column_order[$_POST]['order']);
		} else if(isset($this->order)) {
			$order = $this->order;
			$this->db->order_by(key($order),$order[key($order)]);
		}
	}

	public function getDataTables() {
		$this->_get_datatables_query();
		if($_POST['length'] != -1) 
			$this->db->limit($_POST['length'],$_POST['start']);
		$query = $this->db->get();
		return $query->result();
	}

	public function countFiltered() {
		$this->_get_datatables_query();
		$query = $this->db->get();
		return $query->num_rows();
	}

	public function countAllProduk() {
		$this->db->from($this->table);
		return $this->db->count_all_results();
	}*/


}

/* End of file Produk_model.php */
/* Location: ./application/models/Produk_model.php */