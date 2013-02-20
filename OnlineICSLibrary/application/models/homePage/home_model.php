<?php
	class Home_model extends CI_Model
	{
		function __construct()
		{
			parent::__construct();
		}
		
		function validateLogIn($username, $password, $usertype)
		{
			$this->load->database();
			
			if($usertype == "student")
			{
				$sql = "SELECT Username, Status, Password FROM student WHERE Username='".$username."' AND Password = '".$password."'";
			}
			else if($usertype == "faculty")
			{
				$sql = "SELECT Username, Status, Password FROM faculty WHERE Username='".$username."' AND Password = '".$password."'";
			}
			else if($usertype == "librarian")
			{
				$sql = "SELECT Username, Password FROM librarian WHERE Username='".$username."' AND Password = '".$password."'";
			}
			
			$query = $this->db->query($sql);
			$row = $query->row_array(); 
			
			if($query->num_rows() == 0 || $row['Status'] == 'Pending')
			{
				return "fail";
			}
			else
			{
				$this->load->library('session');
				$logindata = array(
				   'username'  => $username,
				   'password'  => $password,
				   'usertype' => $usertype,
				   'loggedin' => TRUE
				);
			  
				$this->session->set_userdata($logindata);
				return "success";
			}
		}
	}
?>