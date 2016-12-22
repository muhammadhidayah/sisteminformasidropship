<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	function __construct() {
		parent::__construct();
		$this->load->model('Produk_model', 'p_m');
		$this->load->model('Dropshiper_model','d_m');
		$this->load->model('Transaksi_model', 't_m');

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

	//Function Product
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
			$row['option'] = '<center><a href="javascript:;" class="btn btn-warning btn-sm btn-edit" data="'. $produk->id_item.'"><span class="glyphicon glyphicon-pencil"></span>  Edit</a>&nbsp&nbsp&nbsp&nbsp <a href="javascript:;" class="btn btn-danger btn-sm btn-delete" data="'.$produk->id_item.'"><span class="glyphicon glyphicon-trash"></span> Delete Item</a></center>';

			$data[] = $row;
		}
		echo json_encode($data);
	}

	function getItemById() {
		$id = $this->input->get('id');
		$result = $this->p_m->getProductById($id);
		
		echo json_encode($result->row());
	}

	public function addProduct() {
		if(isset($_POST['simpan'])) {
			$this->form_validation->set_rules('txtId', 'ID Item', 'trim|required|min_length[3]|max_length[6]');
			$this->form_validation->set_rules('txtNama', 'Nama Item', 'trim|required');
			$this->form_validation->set_rules('txtStock', 'Stock Item', 'trim|required|numeric');
			$this->form_validation->set_rules('txtprice', 'Price Item', 'trim|required|numeric');
			$this->form_validation->set_rules('optioCategory', 'Category', 'required');
			//$this->form_validation->set_rules('optioCategory', 'inputcategory', 'required');

			if ($this->form_validation->run() == FALSE) {
				# code...
				$data['sidemenu'] = $this->load->view('layout/sidemenu',array(),true);
				$data['header'] = $this->load->view('layout/header',array("username" => $this->session->userdata('username')),true);
				$data['menu'] = $this->load->view('layout/menu',array("username" => $this->session->userdata('username')),true);
				$data['footer'] = $this->load->view('layout/footer',array(),true);
				$this->load->view('admin/addproduct', $data);
			} else {
				# code...
				if($_FILES['fotoitem']['name'] != '') {
					$config['upload_path'] = './upload/';
					$config['allowed_types'] = 'jpg|png';
					$config['max_size']  = '1024';
					$config['max_width']  = '2000';
					$config['max_height']  = '2000';
					
					$this->load->library('upload', $config);
					
					if (!$this->upload->do_upload('fotoitem')){
						$data['error'] = array('error' => $this->upload->display_errors());
						$data['sidemenu'] = $this->load->view('layout/sidemenu',array(),true);
						$data['header'] = $this->load->view('layout/header',array("username" => $this->session->userdata('username')),true);
						$data['menu'] = $this->load->view('layout/menu',array("username" => $this->session->userdata('username')),true);
						$data['footer'] = $this->load->view('layout/footer',array(),true);
						$this->load->view('admin/addproduct', $data);
					} else {
						$data = $this->upload->data();
						$gambar = $data['file_name'];
						$result = $this->p_m->addItem($gambar);
						if($result) {
							$data['sidemenu'] = $this->load->view('layout/sidemenu',array(),true);
							$data['header'] = $this->load->view('layout/header',array("username" => $this->session->userdata('username')),true);
							$data['menu'] = $this->load->view('layout/menu',array("username" => $this->session->userdata('username')),true);
							$data['footer'] = $this->load->view('layout/footer',array(),true);
							$data['error'] = '';
							$this->load->view('admin/addproduct', $data);
						} else {
							$data['sidemenu'] = $this->load->view('layout/sidemenu',array(),true);
							$data['header'] = $this->load->view('layout/header',array("username" => $this->session->userdata('username')),true);
							$data['menu'] = $this->load->view('layout/menu',array("username" => $this->session->userdata('username')),true);
							$data['footer'] = $this->load->view('layout/footer',array(),true);
							$data['error'] = 'Gagal Menambahkan';
							$this->load->view('admin/addproduct', $data);
						}
						
					}
				} else {
					$gambar = '';
					$result = $this->p_m->addItem($gambar);
					if($result) {
						$data['sidemenu'] = $this->load->view('layout/sidemenu',array(),true);
						$data['header'] = $this->load->view('layout/header',array("username" => $this->session->userdata('username')),true);
						$data['menu'] = $this->load->view('layout/menu',array("username" => $this->session->userdata('username')),true);
						$data['footer'] = $this->load->view('layout/footer',array(),true);
						$data['error'] = '';
						$this->load->view('admin/addproduct', $data);
					} else {
						$data['sidemenu'] = $this->load->view('layout/sidemenu',array(),true);
						$data['header'] = $this->load->view('layout/header',array("username" => $this->session->userdata('username')),true);
						$data['menu'] = $this->load->view('layout/menu',array("username" => $this->session->userdata('username')),true);
						$data['footer'] = $this->load->view('layout/footer',array(),true);
						$data['error'] = 'Gagal Menambahkan';
						$this->load->view('admin/addproduct', $data);
					}
				}
			}

		} else {
			$data['sidemenu'] = $this->load->view('layout/sidemenu',array(),true);
			$data['header'] = $this->load->view('layout/header',array("username" => $this->session->userdata('username')),true);
			$data['menu'] = $this->load->view('layout/menu',array("username" => $this->session->userdata('username')),true);
			$data['footer'] = $this->load->view('layout/footer',array(),true);
			$data['error'] = '';
			$this->load->view('admin/addproduct', $data);
		}
	}


	function editProduct() {
		$result = $this->p_m->editItem();
		$msg['success'] = false;

		if($result) {
			$msg['success'] = true;
		}

		echo json_encode($msg);
	}

	function deleteProduct() {
		$result = $this->p_m->deleteItem();
		$msg['success'] = false;

		if($result) {
			$msg['success'] = true;
		}

		echo json_encode($msg);
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

	//Function USER

	function manajemen_user() {
		
		$data['sidemenu'] = $this->load->view('layout/sidemenu',array(),true);
		$data['header'] = $this->load->view('layout/header',array("username" => $this->session->userdata('username')),true);
			$data['menu'] = $this->load->view('layout/menu',array("username" => $this->session->userdata('username')),true);
		$data['footer'] = $this->load->view('layout/footer',array(),true);
		$this->load->view('admin/man_user', $data);
	}

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


	//Transaksi
	public function transaksi() {
		$data['sidemenu'] = $this->load->view('layout/sidemenu',array(),true);
		$data['header'] = $this->load->view('layout/header',array("username" => $this->session->userdata('username')),true);
			$data['menu'] = $this->load->view('layout/menu',array("username" => $this->session->userdata('username')),true);
		$data['footer'] = $this->load->view('layout/footer',array(),true);
		$this->load->view('admin/transaksi', $data);
	}

	public function getAllTransaksi() {
		$result = $this->t_m->getAllTransaksi();
		$data = array();
		foreach ($result->result() as $rows) {
			$row = array();
			$row['id_purchase'] = $rows->id_purchase;
			$row['nama_toko'] = $rows->nama_toko;
			$row['status'] = $rows->status;
			if($rows->id_status == '002') {
				$row['option'] = '<center><a href="javascript:;" class="btn btn-warning btn-sm btn-lihat-detail" data="'. $rows->id_purchase.'"><span class="glyphicon glyphicon-eye-open"></span>  Lihat Detail</a>&nbsp&nbsp&nbsp&nbsp <a href="javascript:;" class="btn btn-danger btn-sm btn-confirm" data="'.$rows->id_purchase.'"><span class="glyphicon glyphicon-check"></span> Confirmasi</a></center>';
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

	function confirmTransaksi() {
		$result = $this->t_m->updateStatus();
		
		$msg['success'] = false;

		if($result) {
			$msg['success'] = true;
		}

		echo json_encode($msg);
	}
}

?>
