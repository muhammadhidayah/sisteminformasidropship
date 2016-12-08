<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	/*function __construct() {
		NOTHING TO DO	
	}*/

	function index() {
		if($this->session->userdata('id_level') == 1) { 
			$data['username'] = $this->session->userdata('username');
			$this->load->view('header');
			$this->load->view('sidemenu');
			$this->load->view('admin/dashboard', $data); 
			$this->load->view('footer');
		} else {
			redirect(base_url());
		}
	}

}

?>