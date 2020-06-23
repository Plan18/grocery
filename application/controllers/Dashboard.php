<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	function __construct() {
		parent::__construct();
		$this->load->model('AuthModel', 'auth');
	}
	
	public function index()
	{
//		print_r($this->session->userdata('usersession'));
		$this->load->view('common/header');
//		$this->load->view('common/sidebar');
		$this->load->view('dashboard/main-content');
		$this->load->view('common/footer');
	}
	
	
	/*public function loadView($page,$data=[]){
		$this->load->view('common/header');
		$this->load->view('common/sidebar');
		$this->load->view($page,$data);
		$this->load->view('common/footer');
	} */
}
