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
				
				$sql = "SELECT FirstName, Email FROM student WHERE Username='".$username."'";
				$query = $this->db->query($sql);
				$row = $query->row();
				$name = $row->FirstName; 
				
				$config = Array(
					'protocol' => 'smtp',
					'smtp_host' => 'ssl://smtp.googlemail.com',
					'smtp_port' => 465,
					'smtp_user' => 'onlineicslibrary@gmail.com',
					'smtp_pass' => 'icsuserpassword',
				);
				$this->load->library('email', $config);
				$this->email->set_newline("\r\n");

				$this->email->from('onlineicslibrary@gmail.com', 'The ICS Librarian');
				$this->email->to($row->Email);

				$this->email->subject('ONLINE ICS LIBRARY REGISTRATION NOTIFICATION');
				$this->email->message('WELCOME ' .$name. ' TO THE ONLINE ICS LIBRARY. WE WOULD LIKE TO INFORM YOU THAT YOU COULD USE YOUR LIBRARY ACCOUNT NOW!');
				$this->email->send();
			}
			else
			{
				$query = "UPDATE faculty SET Status='Approved' WHERE Username='".$username."'";
				$this->db->query($query);
				
				$sql = "SELECT FirstName, Email FROM student WHERE Username='".$username."'";
				$query = $this->db->query($sql);
				$row = $query->row();
				$name = $row->FirstName; 
				
				$config = Array(
					'protocol' => 'smtp',
					'smtp_host' => 'ssl://smtp.googlemail.com',
					'smtp_port' => 465,
					'smtp_user' => 'onlineicslibrary@gmail.com',
					'smtp_pass' => 'icsuserpassword',
				);
				$this->load->library('email', $config);
				$this->email->set_newline("\r\n");

				$this->email->from('onlineicslibrary@gmail.com', 'The ICS Librarian');
				$this->email->to($row->Email);

				$this->email->subject('ONLINE ICS LIBRARY REGISTRATION NOTIFICATION');
				$this->email->message('WELCOME ' .$name. ' TO THE ONLINE ICS LIBRARY. WE WOULD LIKE TO INFORM YOU THAT YOU COULD USE YOUR LIBRARY ACCOUNT NOW!');
				$this->email->send();
			}
			
			echo 'accepted';
		}
		
		public function reject($type, $username)
		{
			$this->load->database();
			
			if($type == 'student')
			{
				$query = "DELETE FROM student WHERE Username='".$username."'";
				$this->db->query($query);
				
				$sql = "SELECT FirstName, Email FROM student WHERE Username='".$username."'";
				$query = $this->db->query($sql);
				$row = $query->row();
				$name = $row->FirstName; 
				
				$config = Array(
					'protocol' => 'smtp',
					'smtp_host' => 'ssl://smtp.googlemail.com',
					'smtp_port' => 465,
					'smtp_user' => 'onlineicslibrary@gmail.com',
					'smtp_pass' => 'icsuserpassword',
				);
				$this->load->library('email', $config);
				$this->email->set_newline("\r\n");

				$this->email->from('onlineicslibrary@gmail.com', 'The ICS Librarian');
				$this->email->to($row->Email);

				$this->email->subject('ONLINE ICS LIBRARY REGISTRATION NOTIFICATION');
				$this->email->message('THANK YOU ' .$name. ' FOR SIGNING UP ON THE ONLINE ICS LIBRARY BUT AFTER REVIEWING YOUR ACCOUNT DETAILS WE FOUND SOME INCONSISTENCIES 
							THEREFORE WE HAVE DECIDED NOT TO ACCEPT YOUR REGISTRATION REQUEST');
				$this->email->send();
			}
			else
			{
				$query = "DELETE FROM faculty WHERE Username='".$username."'";
				$this->db->query($query);
				
				$sql = "SELECT FirstName, Email FROM student WHERE Username='".$username."'";
				$query = $this->db->query($sql);
				$row = $query->row();
				$name = $row->FirstName;  
				
				$config = Array(
					'protocol' => 'smtp',
					'smtp_host' => 'ssl://smtp.googlemail.com',
					'smtp_port' => 465,
					'smtp_user' => 'onlineicslibrary@gmail.com',
					'smtp_pass' => 'icsuserpassword',
				);
				$this->load->library('email', $config);
				$this->email->set_newline("\r\n");

				$this->email->from('onlineicslibrary@gmail.com', 'The ICS Librarian');
				$this->email->to($row->Email);

				$this->email->subject('ONLINE ICS LIBRARY REGISTRATION NOTIFICATION');
				$this->email->message('THANK YOU ' .$name. ' FOR SIGNING UP ON THE ONLINE ICS LIBRARY BUT AFTER REVIEWING YOUR ACCOUNT DETAILS WE FOUND SOME INCONSISTENCIES 
							THEREFORE WE HAVE DECIDED NOT TO ACCEPT YOUR REGISTRATION REQUEST');
				$this->email->send();
			}
			
			echo 'rejected';
		}
	}
?>