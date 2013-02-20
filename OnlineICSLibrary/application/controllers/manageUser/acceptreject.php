<?php
	class AcceptReject extends CI_Controller 
	{
		function __construct()
		{		
			parent::__construct();
		}
		
		public function index()
		{
			$this->load->view('manageUser/manageuser');
		}
		
		public function accept($type, $username)
		{
			$this->load->database();

			if($type == 'student')
			{
				$query = "UPDATE student SET Status='Approved' WHERE Username='".$username."'";
				
				$this->db->query($query);
			}
			else
			{
				$query = "UPDATE faculty SET Status='Approved' WHERE Username='".$username."'";
				
				$this->db->query($query);
			}
			
			$this->load->view('manageUser/manageuser');
		}
		
		public function reject($type, $username)
		{
			$this->load->database();
			
			if($type == 'student')
			{
				$query = "DELETE FROM student WHERE Username='".$username."'";
				
				$this->db->query($query);
			}
			else
			{
				$query = "DELETE FROM faculty WHERE Username='".$username."'";
				
				$this->db->query($query);
			}
			
			$this->load->view('manageUser/manageuser');
		}
	}
?>