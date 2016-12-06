<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	function __construct() {
		parent::__construct();
		$this->load->helper(array('form','url'));
		$this->load->library('form_validation');
		$this->load->model('User_model');
	}

	public function index() {
		$logged_in = $this->session->userdata('logged_in');

		if(!$logged_in) {
			redirect(site_url(''));
		}

		$this->load->view('dashboard');
	}

}

?>