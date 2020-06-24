<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends CI_Controller {

	function __construct() {
		parent::__construct();
		$this->load->model('AuthModel', 'auth');
	}
	
	public function index()
	{
//		print_r($this->session->userdata('usersession'));
		$this->load->view('common/header');
//		$this->load->view('common/sidebar');
		$this->load->view('profile/main-content-pr');
		$this->load->view('common/footer');
	}
	
	
}
