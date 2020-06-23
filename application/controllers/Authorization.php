<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Authorization extends CI_Controller {
	function __construct() {
		parent::__construct();
		$this->load->model('AuthModel', 'auth');
	}

	public function index()
	{
		$this->loadView('auth/login');
	}
	
	public function login()
	{
		$this->form_validation->set_rules('username', 'Username', 'trim|required');
		$this->form_validation->set_rules('password', 'Password', 'trim|required');

		if($this->form_validation->run() == false){
			return $this->loadView('auth/login');
		}
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		if (!filter_var($username, FILTER_VALIDATE_EMAIL)) {
			$where = array('username'=>$username);
		}else{
			$where = array('email'=>$username);
		}
		$result = $this->auth->getRow('users',$where);
		if(!isset($result) && empty($result)){
			return $this->loadView('auth/login',['errors' => "User does not exist."]);
		}
		if($result->password != sha1($password)){
			return $this->loadView('auth/login',['errors' => "Password does not match."]);
		}
		if($result->status != 1){
			return $this->loadView('auth/login',['errors' => "Please contact to Administrator."]);
		}
		$session_data = array(
			'id'=>$result->id,
			'email'=>$result->email,
			'username'=>$result->username,
			'fName'=>$result->fName,
			'lName'=>$result->lName,
		);
		$this->session->set_userdata(['usersession'=>$session_data]);
		return redirect('dashboard');	
	}

	public function registration()
	{
		return $this->loadView('auth/registration');
	}

	public function register()
	{
		if($this->input->post() == false){
			return redirect('registration');
		}
		$this->form_validation->set_rules('fName', 'First Name', 'trim|required|alpha',
		['required'     => '%s is required.',
		'alpha'     => '%s contain characters only.']);
		$this->form_validation->set_rules('lName', 'Last Name', 'trim|required|alpha',
		['required'     => '%s is required.', 
		'alpha'     => '%s contain characters only.']);
		$this->form_validation->set_rules('email', 'Email', 'trim|required|xss_clean|is_unique[users.email]',
		['required'     => '%s is required.',
		'is_unique'     => '%s already exists.']);
		$this->form_validation->set_rules('username', 'Username', 'trim|required|alpha_numeric|xss_clean|is_unique[users.username]',['required'     => '%s is required.',
		'alpha_numeric'     => '%s contain alpha-numeric only.',
		'is_unique'     => '%s already exists.']);
		$this->form_validation->set_rules('mobile', 'Mobile Number', 'trim|required|numeric|min_length[10]|max_length[10]',
		['required'     => '%s is required.',
		'numeric'     	=> '%s contain numbers only.',
		'min_length'     => '%s should be 10 digits.',
		'max_length'     => '%s should be 10 digits.']);
		$this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean|regex_match[/^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#\$%\^&\*])(?=.{8,})/]',
		['required'     => '%s is required.',
		'regex_match'		=> '%s is not in correct format.']);//^(?=.*[a-zA-Z])(?=.*[0-9])(?=.*[!@#\$%\^&\*])(?=.{8,}) for upercase relex
		$this->form_validation->set_rules('rpassword', 'Re-type Password', 'trim|required|matches[password]',['required'     => '%s is required.',
		'matches' => 'Re-type Password does not match Password.']);

		if ($this->form_validation->run() == FALSE) {
			return $this->loadView('auth/registration');
		}
		
		$data = array(
			'fName'=>$this->input->post('fName'),
			'lName'=>$this->input->post('lName'),
			'email'=>$this->input->post('email'),
			'username'=>$this->input->post('username'),
			'mobile'=>$this->input->post('mobile'),
			'password'=>sha1($this->input->post('password')),
		);
		$id = $this->auth->insertAry('users',$data);
		$session_data = array(
			'id'=>$id,
			'email'=>$data['email'],
			'username'=>$data['username'],
			'fName'=>$data['fName'],
			'lName'=>$data['lName'],
		);
		$this->session->set_userdata(['usersession'=>$session_data]);
		return redirect('dashboard');	
	}

	public function logout()
	{
		$this->session->sess_destroy();
		return redirect('login');
	}

	public function loadView($page,$data=[]){
		$this->load->view('auth/header');
		$this->load->view($page,$data);
		$this->load->view('auth/footer');
	}
}
