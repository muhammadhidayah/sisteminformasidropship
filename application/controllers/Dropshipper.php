<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dropshipper extends CI_Controller {

	/*function __construct() {
		NOTHING TO DO	
	}*/

	public function index() {
		if($this->session->userdata('id_level') == 2) { 
			$data['username'] = $this->session->userdata('username');
			$data['username'] = $this->session->userdata('username');
			$this->load->view('header');
			$this->load->view('sidemenu');
			$this->load->view('dropship/dashboard', $data);
			$this->load->view('footer');

		} else {
			redirect(base_url());
		}
	}

}

?>