<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	function __construct() {
		parent::__construct();
		$this->load->model('Produk_m', 'p_m');
	}

	function index() {
		if($this->session->userdata('id_level') == 1) {
			$data['sidemenu'] = $this->load->view('layout/sidemenu',array(),true);
			$data['jumlah'] = $this->User_model->getCountUser()->row()->jumlah;
			$data['header'] = $this->load->view('layout/header',array("username" => $this->session->userdata('username')),true);
			$data['menu'] = $this->load->view('layout/menu',array("username" => $this->session->userdata('username')),true);
			$data['jumpro'] = count($this->p_m->showAllProduct());
			$data['footer'] = $this->load->view('layout/footer',array(),true);
			$this->load->view('admin/index', $data);
		} else {
			redirect(base_url());
		}
	}

	public function tampilproduk() {
		$query = $this->p_m->showAllProduct();
		echo json_encode($query);
	}


}

?>
