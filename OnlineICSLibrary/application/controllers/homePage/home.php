<?php
	class Home extends CI_Controller 
	{
		function __construct()
		{		
			parent::__construct();
			
			$this->load->library('session');
			$logindata = array(
			   'username'  => 'username',
			   'password'     => 'password',
			   'logged_in' => FALSE
			);
			  
			$this->session->set_userdata($logindata);
		}
	
		public function index()
		{
			$this->load->view('homePage/home_page');
		}
		
		public function displayAccountBox()
		{
			/*if($this->session->userdata('username') == "username")
			{
				echo '<div id="accountbox_form">
							<form action="" method="POST">
								<input type="text" id="username" name="username" placeholder="username" maxlength="10"/>
								<input type="password" id="password" name="password" placeholder="password" maxlength="6"/>
								<select id="usertype" name="usertype">
									<option value="student">I am a Student</option>
									<option value="faculty">I am a Faculty Member</option>
									<option value="librarian">I am the Librarian</option>
								</select>
							</form>
						</div>
						
						<div id="submit_button">
							<input type="submit" id="loginsubmit" value="Login"/>
						</div>';
			}*/
		}
	}
?>