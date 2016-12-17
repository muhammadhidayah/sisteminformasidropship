<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dropshipper extends CI_Controller {

	function __construct() {
		parent::__construct();
		$this->load->model('Produk_model', 'p_m');
		$this->load->model('Dropshiper_model','d_m');
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
		if($is_processed) {
			$this->cart->destroy();
			echo "success";
		} else
			echo "failed";
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

}

?>