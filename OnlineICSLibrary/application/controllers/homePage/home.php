<?php
	class Home extends CI_Controller 
	{
		function __construct()
		{		
			parent::__construct();
		}
	
		public function index()
		{
			$this->load->view('homePage/home_page');
		}
		
		public function validateLogin()
		{
			$username = $this->input->post('username');
			$password = $this->input->post('password');
			$usertype = $this->input->post('usertype');
			
			$this->load->model('homePage/home_model');
			$response =  $this->home_model->validateLogIn($username, $password, $usertype);
				
			echo $response;
		}
		
		public function logout()
		{
			$this->load->library('session');
		
			$this->session->sess_destroy();
			$this->load->view('homePage/home_page');
		}
		
		public function displayAccountBox()
		{
			$this->load->library('session');
		
			if($this->session->userdata('loggedin') == TRUE)
			{
				echo $this->session->userdata('username');
			}
			else
			{
				echo 'not logged in';
			}
		}
	}
?>