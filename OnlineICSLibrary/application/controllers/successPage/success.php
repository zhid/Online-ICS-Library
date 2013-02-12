<?php
	class Success extends CI_Controller 
	{		
		function __construct()
		{		
			parent::__construct();
		}
		
		public function index()
		{
			$this->load->view('successPage/success_page');
		}
	}
?>