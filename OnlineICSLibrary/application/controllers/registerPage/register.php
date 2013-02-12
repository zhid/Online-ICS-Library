<?php
	class Register extends CI_Controller 
	{		
		function __construct()
		{		
			parent::__construct();
		}
		
		public function index()
		{
			$this->load->view('registerPage/register_page');
		}
		
		public function registerUser()
		{
			$this->load->database();
			
			$first_name = $this->input->post('first_name');
			$middle_name = $this->input->post('middle_name');
			$last_name = $this->input->post('last_name');
			$username = $this->input->post('username');
			$email_address = $this->input->post('email_address');
			$address = $this->input->post('address');
			$password = $this->input->post('password');
			$status = 'Pending';
			
			if($this->input->post('employee_number') == NULL)
			{
				$sql = "SELECT Username, StudentNumber FROM student WHERE Username='".$username."'";
				$query1 = $this->db->query($sql);
				
				if($query1->num_rows() == 0)
				{
					$student_number = $this->input->post('student_number');
					$query2 = "INSERT INTO student(FirstName,MiddleName,LastName,Username,Email,Address,Password,StudentNumber,Status) VALUES ('$first_name','$middle_name	', '$last_name', '$username', '$email_address', '$address', '$password', '$student_number', '$status')";
					$this->db->query($query2);
					echo 'success';
				}
				else
				{
					echo 'failed';
				}
			}
			else
			{
				$sql = "SELECT Username, EmployeeNumber FROM faculty WHERE Username='".$username."'";
				$query1 = $this->db->query($sql);
			
				if($query1->num_rows() == 0)
				{
					$employee_number = $this->input->post('employee_number');
					$query2 = "INSERT INTO faculty(FirstName,MiddleName,LastName,Username,Email,Address,Password,EmployeeNumber,Status) VALUES ('$first_name','$middle_name	', '$last_name', '$username', '$email_address', '$address', '$password', '$employee_number', '$status')";
					$this->db->query($query2);
					echo 'success';
				}
				else
				{
					echo 'failed';
				}
			}
		}
		
		public function loadUserNumber()
		{
			$user_type = $this->input->post('user_type');
			if($user_type == 'student')
			{
				echo '<td></td>
							<td><label for="student_number">Student Number</label></td>
							<td><input type="text" id="student_number" name="student_number" placeholder="2013-12345"/></td>
							<td id="student_number_td"> </td>';
			}
			else
			{
				echo '<td></td>
							<td><label for="employee_number">Employee Number</label></td>
							<td><input type="text" id="employee_number" name="employee_number" placeholder="123456789"/></td>
							<td id="employee_number_td"></td>';
			}
		}
	}
?>