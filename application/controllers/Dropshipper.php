<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dropshipper extends CI_Controller {

	public function index() {
		if($this->session->userdata('id_level') == 2) {
			$data['sidemenu'] = $this->load->view('layout/sidemenu',array(),true);
			$data['biodata'] = $this->User_model->getUserById($this->session->userdata('id_user'))->row();
			$data['header'] = $this->load->view('layout/header',array("username" => $this->session->userdata('username')),true);
			$data['menu'] = $this->load->view('layout/menu',array("username" => $this->session->userdata('username')),true);
			$data['footer'] = $this->load->view('layout/footer',array(),true);
			$this->load->view('dropship/index', $data);
		} else {
			redirect(site_url());
		}
	}

}

?>