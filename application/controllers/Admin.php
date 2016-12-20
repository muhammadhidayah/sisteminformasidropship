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

		$data['sidemenu'] = $this->load->view('layout/sidemenu',array(),true);
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

	function tampilProdukDataTables() {
		$list = $this->p_m->showAllProduct();
		$data = array();
		foreach ($list as $produk) {
			$row = array();
			$row['name_item'] = $produk->name_item;
			$row['stock'] = $produk->stock;
			$row['selling_price'] = 'Rp. '.$produk->selling_price;
			$row['foto'] = '<center><a href="'.base_url('upload/'.$produk->foto).'" target="_blank"><img src="'.base_url('upload/'.$produk->foto).'" class="img-responsive" width="40" height="50" /></a></center>';
			$row['option'] = '<a href="javascript:;" class="btn btn-primary btn-sm btn-edit" data="'. $produk->id_item.'"><span class="glyphicon glyphicon-shopping-cart"></span>beli</a>&nbsp&nbsp&nbsp&nbsp <a href="javascript:;'.$produk->id_item.'" class="btn btn-success btn-sm btn-delete"><span class="glyphicon glyphicon-download-alt"></span> Download foto</a>';

			$data[] = $row;
		}
		echo json_encode($data);
	}

	function manajemen_user() {
		
		$data['sidemenu'] = $this->load->view('layout/sidemenu',array(),true);
		$data['header'] = $this->load->view('layout/header',array("username" => $this->session->userdata('username')),true);
			$data['menu'] = $this->load->view('layout/menu',array("username" => $this->session->userdata('username')),true);
		$data['footer'] = $this->load->view('layout/footer',array(),true);
		$this->load->view('admin/man_user', $data);
	}

	//Function Untuk Kategory

	function category() {
		$data['sidemenu'] = $this->load->view('layout/sidemenu',array(),true);
		$data['header'] = $this->load->view('layout/header',array("username" => $this->session->userdata('username')),true);
			$data['menu'] = $this->load->view('layout/menu',array("username" => $this->session->userdata('username')),true);
		$data['footer'] = $this->load->view('layout/footer',array(),true);
		$this->load->view('admin/category', $data);
	}

	function showAllCategory() {
		$result = $this->p_m->getCategory()->result();
		$data = array();
		foreach ($result as $rows) {
			$row = array();
			$row['id_category'] = $rows->id_category;
			$row['explanation'] = $rows->explanation;
			$row['option'] = '<center><a href="javascript:;" class="btn btn-warning btn-sm btn-beli" data="'. $rows->id_category.'"><span class="glyphicon glyphicon-pencil"></span>  Edit</a>&nbsp&nbsp&nbsp&nbsp <a href="javascript:;"data='.$rows->id_category.' class="btn btn-danger btn-sm category-delete"><span class="glyphicon glyphicon-trash"></span> Delete foto</a></center>';

			$data[] = $row;
		}
		echo json_encode($data);
	}

	function addCategory() {
		$this->form_validation->set_rules('txtIdCategory', 'IDCategory', 'trim|required');
		$this->form_validation->set_rules('txtCategory', 'Category', 'trim|required');

		$result = $this->p_m->addCategory();
		$msg['success'] = false;
		if($result) {
			$msg['success'] = true;
		}

		echo json_encode($msg);
	}

	function deleteCategory() {
		$result = $this->p_m->deleteCategory();
		$msg['success'] = false;

		if($result) {
			$msg['success'] = true;
		}

		echo json_encode($msg);
	}


	//End Function Kategori

	public function tampiluser() {
		$query = $this->User_model->showAllUser();
		echo json_encode($query);
	}

	function tambahUser() {
		$this->form_validation->set_rules('txtUsername', 'Username', 'trim|required');
		$this->form_validation->set_rules('txtPassword', 'Password', 'trim|required');
		$this->form_validation->set_rules('pilihJenisUser', 'PilihJenisUser', 'required');
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

	function deleteUser(){
		
		$result = $this->User_model->deleteUser();
		$msg['success'] = false;
		if($result) {
			$msg['success'] = true;
		}

		echo json_encode($msg);
	}
	
}

?>
