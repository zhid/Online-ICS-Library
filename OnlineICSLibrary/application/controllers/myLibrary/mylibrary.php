<?php
	class MyLibrary extends CI_Controller
	{
		function __construct()
		{		
			parent::__construct();
		}
		
		public function index()
		{
			$this->load->library('session');
		
			if($this->session->userdata('loggedin') == TRUE && $this->session->userdata('usertype') == 'student')
			{
				$this->load->view('myLibrary/mylibrary_page');
			}
			else if($this->session->userdata('loggedin') == TRUE && $this->session->userdata('usertype') == 'librarian')
			{
				$this->load->view('myLibrary/librarianlibrary_page');
			}
			else
			{
				$this->load->view('myLibrary/guestlibrary_page');
			}
		}
		
		public function deletematerial_link()
		{
			$this->load->view('deleteMaterial/deletematerial_page');
		}
		
		public function addbook_link()
		{
			$this->load->view('myLibrary/addbook_page');
		}
		
		public function addthesis_link()
		{
			$this->load->view('myLibrary/addthesis_page');
		}
		
		public function addjournal_link()
		{
			$this->load->view('myLibrary/addjournal_page');
		}
	}
?>