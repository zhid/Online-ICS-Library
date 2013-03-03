<?php
	class Register_model extends CI_Model
	{
		function __construct()
		{
			parent::__construct();
		}
		
		public function registerTheStudent($first_name, $middle_name, $last_name, $username, $email_address, $address, $password, $student_number, $status)
		{
			$this->load->database();
			$sql = "SELECT Username, StudentNumber FROM student WHERE Username='".$username."' OR StudentNumber='".$student_number."'";
			$query1 = $this->db->query($sql);
				
			if($query1->num_rows() == 0)
			{
				$query2 = "INSERT INTO student(FirstName,MiddleName,LastName,Username,Email,Address,Password,StudentNumber,Status) VALUES ('$first_name','$middle_name', '$last_name', '$username', '$email_address', '$address', '$password', '$student_number', '$status')";
				$this->db->query($query2);
				/*$data = array(
					'FirstName'=>$first_name,
					'MiddleName'=>$middle_name,
					'LastName'=>$last_name,
					'UserName'=>$username,
					'Email'=>$email_address,
					'Address'=>$address,
					'Password'=>$password,
					'StudentNumber'=>$student_number,
					'Status'=>$status
				);
				$this->db->insert('student',$data);*/
				
				return 'success';
			}
			else
			{
				return 'failed';
			}
		}
		
		public function registerTheFaculty($first_name, $middle_name, $last_name, $username, $email_address, $address, $password, $employee_number, $status)
		{
			$this->load->database();
			$sql = "SELECT Username, EmployeeNumber FROM faculty WHERE Username='".$username."' OR EmployeeNumber='".$employee_number."'";
			$query1 = $this->db->query($sql);
		
			if($query1->num_rows() == 0)
			{
				$query2 = "INSERT INTO faculty(FirstName,MiddleName,LastName,Username,Email,Address,Password,EmployeeNumber,Status) VALUES ('$first_name','$middle_name', '$last_name', '$username', '$email_address', '$address', '$password', '$employee_number', '$status')";
				$this->db->query($query2);
				/*$data = array(
					'FirstName'=>$first_name,
					'MiddleName'=>$middle_name,
					'LastName'=>$last_name,
					'UserName'=>$username,
					'Email'=>$email_address,
					'Address'=>$address,
					'Password'=>$password,
					'StudentNumber'=>$employee_number,
					'Status'=>$status
				);
				$this->db->insert('faculty',$data);*/
				
				return 'success';
			}
			else
			{
				return 'failed';
			}
		}
	}
?>