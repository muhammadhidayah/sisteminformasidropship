<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dropshipper extends CI_Controller {

	function __construct() {
		parent::__construct();
		$this->load->model('Produk_model', 'p_m');
		$this->load->model('Dropshiper_model','d_m');
		$this->load->model('Transaksi_model', 't_m');
		if($this->session->userdata('id_level') != 2) {
			redirect(site_url());
		}
	}

	public function index() {
		
		$data['sidemenu'] = $this->load->view('layout/sidemenu',array(),true);
		$data['biodata'] = $this->d_m->getDropshiperById($this->session->userdata('id_user'))->row();
		$data['header'] = $this->load->view('layout/header',array("username" => $this->session->userdata('username')),true);
		$data['menu'] = $this->load->view('layout/menu',array("username" => $this->session->userdata('username')),true);
		$data['footer'] = $this->load->view('layout/footer',array(),true);
		$this->load->view('dropship/index', $data);
	}

	function katalog() {
		$data['sidemenu'] = $this->load->view('layout/sidemenu',array(),true);
		$data['header'] = $this->load->view('layout/header',array("username" => $this->session->userdata('username')),true);
		$data['menu'] = $this->load->view('layout/menu',array("username" => $this->session->userdata('username')),true);
		$data['footer'] = $this->load->view('layout/footer',array(),true);
		$this->load->view('dropship/katalog', $data);
	}
	
	public function tampilproduk() {
		$query = $this->p_m->showAllProduct();
		echo json_encode($query);
	}

	function addBasket() {
		$id = $this->input->post('id');
		$result = $this->p_m->getProductById($id);
		$msg['success'] = false;
		if($result->num_rows() > 0) {

			$results = $result->row();
			$data = array(
			 	'id' 	=> $results->id_item,
			 	'name' 	=> $results->name_item,
			 	'price' => $results->selling_price,
				'qty' 	=> 1
			);

			$this->cart->insert($data);

			$msg['success'] = true;
		} 

		echo json_encode($msg);
	}

	function order() {
		$this->load->model('Cart_model');
		$is_processed = $this->Cart_model->order();
		$msg['success'] = false;
		
		if($is_processed) {
			$this->cart->destroy();
			$msg['success'] = true;
		}

		echo json_encode($msg);
	}

	function emptyBasket() {
		$this->cart->destroy();
		$msg['success'] = false;
		$result = count($this->cart->contents());
		if($result == 0) {
			$msg['success'] = true;
		}

		echo json_encode($msg);
	}

	function test() {
		echo "<pre>";
		print_r($this->cart->contents());
	}

	function transaksi() {
		
		$data['sidemenu'] = $this->load->view('layout/sidemenu',array(),true);
		$data['header'] = $this->load->view('layout/header',array("username" => $this->session->userdata('username')),true);
		$data['menu'] = $this->load->view('layout/menu',array("username" => $this->session->userdata('username')),true);
		$data['footer'] = $this->load->view('layout/footer',array(),true);
		$this->load->view('dropship/transaksi', $data);
	}

	public function ShowTransaksi() {
		$result = $this->t_m->getTransaksiByID();
		$data = array();
		foreach ($result->result() as $rows) {
			$row = array();
			$row['id_purchase'] = $rows->id_purchase;
			$row['nama_toko'] = $rows->nama_toko;
			$row['status'] = $rows->status;
			if($rows->id_status == '002') {
				$row['option'] = '<center><a href="javascript:;" class="btn btn-warning btn-sm btn-lihat-detail" data="'. $rows->id_purchase.'"><span class="glyphicon glyphicon-eye-open"></span>  Lihat Detail</a>&nbsp&nbsp&nbsp&nbsp</center>';
			} else {
				$row['option'] = '<center><a href="javascript:;" class="btn btn-warning btn-sm btn-lihat-detail" data="'. $rows->id_purchase.'"><span class="glyphicon glyphicon-eye"></span>  Lihat Detail</a>&nbsp&nbsp&nbsp&nbsp';
			}
			

			$data[] = $row;
		}

		echo json_encode($data);
	}

	function getDetailTransaksi() {
		$result = $this->t_m->getDetailTransaksi();
		echo json_encode($result->result());
	}

}

?>