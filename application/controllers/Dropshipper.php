<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dropshipper extends CI_Controller {

	function __construct() {
		parent::__construct();
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

}

?>