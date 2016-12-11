<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	function __construct() {
		parent::__construct();
		$this->load->model('Produk_model', 'p_m');
		$this->load->model('Dropshiper_model','d_m');

		if($this->session->userdata('id_level') != 1) {
			redirect(base_url());
		}
	}

	function index() {

		$data['sidemenu'] = $this->load->view('layout/sidemenuadmin',array(),true);
		$data['jumlah'] = $this->User_model->getCountUser()->row()->jumlah;
		$data['jumlahdrop'] = $this->d_m->getAllUser()->num_rows();
		$data['header'] = $this->load->view('layout/header',array("username" => $this->session->userdata('username')),true);
		$data['menu'] = $this->load->view('layout/menu',array("username" => $this->session->userdata('username')),true);
		$data['jumpro'] = count($this->p_m->showAllProduct());
		$data['footer'] = $this->load->view('layout/footer',array(),true);
		$this->load->view('admin/index', $data);
		
	}

	public function tampilproduk() {
		$query = $this->p_m->showAllProduct();
		echo json_encode($query);
	}

	function manajemen_user() {
		
		$data['sidemenu'] = $this->load->view('layout/sidemenuadmin',array(),true);
		//$data['jumlah'] = $this->User_model->getCountUser()->row()->jumlah;
		$data['header'] = $this->load->view('layout/header',array("username" => $this->session->userdata('username')),true);
			$data['menu'] = $this->load->view('layout/menu',array("username" => $this->session->userdata('username')),true);
			//$data['jumpro'] = count($this->M_m->showAllUser());
		$data['footer'] = $this->load->view('layout/footer',array(),true);
		$this->load->view('admin/man_user', $data);
	}

	public function tampiluser() {
		$query = $this->User_model->showAllUser();
		echo json_encode($query);
	}

	function tambahUser() {
		$result = $this->User_model->addUser();
		$msg['success'] = false;
		$msg['type'] = "";
		if($result) {
			$msg['success'] = true;
			$msg['type'] = "add";
		}

		echo json_encode($msg);
	}

	function editUser() {
		$query = $this->User_model->getUserById();
		echo json_encode($query);
	}

	function updateUser() {
		$query = $this->User_model->updateUser();
		$msg['success'] = false;
		$msg['type'] = "";
		if($query) {
			$msg['success'] = true;
			$msg['type'] = "update";
		}

		echo json_encode($msg);
	}
}

?>
