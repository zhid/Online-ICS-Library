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
				$student_number = $this->input->post('student_number');
				
				$this->load->model('registerPage/register_model');
				$response =  $this->register_model->registerTheStudent($first_name, $middle_name, $last_name, $username, $email_address, $address, $password, $student_number, $status);
			
				echo $response;
			}
			else
			{
				$employee_number = $this->input->post('employee_number');
			
				$this->load->model('registerPage/register_model');
				$response =  $this->register_model->registerTheFaculty($first_name, $middle_name, $last_name, $username, $email_address, $address, $password, $employee_number, $status);
			
				echo $response;
			}
		}
		
		public function loadUserNumber()
		{
			$user_type = $this->input->post('user_type');
			if($user_type == 'student')
			{
				echo '<td></td>
							<td><label for="student_number">Student Number</label></td>
							<td><input type="text" id="student_number" name="student_number" placeholder="2013-12345" maxlength=10 placeholder="2013-12345" pattern="[1-2][0-9][0-9][0-9][\-][0-9][0-9][0-9][0-9][0-9]" autofocus required/></td>';
			}
			else
			{
				echo '<td></td>
							<td><label for="employee_number">Employee Number</label></td>
							<td><input type="text" id="employee_number" name="employee_number" placeholder="123456789" pattern="[0-9]{9,9}" autofocus required/></td>';
			}
		}
	}
?>