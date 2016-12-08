<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	/*function __construct() {
				
	}*/

	function index() {
		if($this->session->userdata('logged_in')) {
			if ($this->session->userdata('id_level') == 1) {
				redirect(site_url('admin'));
			} else {
				redirect(site_url('dropshipper'));
			}
		} else {
			$this->load->view('login');
		}	
	}

	function login() {
		$username = $this->input->post('username');
		$password = $this->input->post('password');

		$temp_account = $this->User_model->login($username,$password)->row();
		$num_account = count($temp_account);

		$this->form_validation->set_rules('username','Username','required');
		$this->form_validation->set_rules('password','Password','required');

		if($this->form_validation->run() == FALSE) {
			$this->load->view('login');
		} else {
			
			if($num_account > 0) {

				$array_items = array('id_level' => $temp_account->id_level, 
									'username' => $temp_account->username,
									'logged_in'=> TRUE);

				$this->session->set_userdata($array_items);

				if ($this->session->userdata('id_level') == 1) {
					redirect(site_url('admin'));
				} else {
					redirect(site_url('dropshipper'));
				}
			} else {
				$this->session->set_flashdata('notification','Peringatan Username dan Password tidak cocok');

				redirect(site_url());
			}

		}
	}

	function logout() {
		$cek = $this->session->userdata('logged_in');
		if(empty($cek)) {
			redirect(site_url());
		} else {
			$this->session->sess_destroy();
			redirect(site_url());
		}
	}



}

?>