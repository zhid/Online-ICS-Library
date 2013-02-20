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
		
			if($this->session->userdata('loggedin') == TRUE && ($this->session->userdata('usertype') == 'student' || $this->session->userdata('usertype') == 'faculty'))
			{
				$this->load->helper('url');
			
				echo '<div id="user_account">
						<div class="img_link_container">
							<div class="img">
								<img src="images/accountuser.png" width=30 height=30 />
							</div>
							
							<div class="link">
								<a href="">My Profile</a>
							</div>
						</div>
					
						<div class="img_link_container">
							<div class="img">
								<img src="images/librarycard.ico" width=30 height=30 />
							</div>
							
							<div class="link">
								<a href="">Library Card</a>
							</div>
						</div>
						
						<div class="img_link_container">
							<div class="img">
								<img src="images/borrow.png" width=30 height=30 />
							</div>
							
							<div class="link">
								<a href="">Borrow Requests</a>
							</div>
						</div>
						
						<div class="img_link_container">
							<div class="img">
								<img src="images/notification.png" width=30 height=30 />
							</div>
							
							<div class="link">
								<a href="">Notifications</a>
							</div>
						</div>
						
						<div class="img_link_container">
							<div class="img">
								<img src="images/logout.png" width=30 height=30 />
							</div>
							
							<div class="lib_link">
								<form action="'.base_url().'index.php/homePage/home/logout" method="POST">
									<input type="submit" value="Logout"/>
								</form>
							</div>
						</div>
					</div>';
			}
			else if($this->session->userdata('loggedin') == TRUE && $this->session->userdata('usertype') == 'librarian')
			{
				$this->load->helper('url');
			
				echo '<div id="lb_user_account">
						<div class="lib_img_link_container">
							<div class="lib_img">
								<img src="images/librarian.png" width=30 height=30 />
							</div>
							
							<div class="lib_link">
								<a href="'.base_url().'index.php/manageUser/manageuser">Manage Library Users</a>
							</div>
						</div>
						
						<div class="lib_img_link_container">
							<div class="lib_img">
								<img src="images/librarian.png" width=30 height=30 />
							</div>
							
							<div class="lib_link">
								<a href="">Manage Borrow Requests</a>
							</div>
						</div>
						
						<div class="lib_img_link_container">
							<div class="lib_img">
								<img src="images/add.png" width=30 height=30 />
							</div>
							
							<div class="lib_link">
								<a href="'.base_url().'index.php/addMaterial/addmaterial">Add Material</a>
							</div>
						</div>
						
						<div class="lib_img_link_container">
							<div class="lib_img">
								<img src="images/edit.png" width=30 height=30 />
							</div>
							
							<div class="lib_link">
								<a href="'.base_url().'index.php/editMaterial/editmaterial">Edit Material</a>
							</div>
						</div>
						
						<div class="lib_img_link_container">
							<div class="lib_img">
								<img src="images/delete.png" width=30 height=30 />
							</div>
							
							<div class="lib_link">
								<a href="'.base_url().'index.php/deleteMaterial/deletematerial">Delete Material</a>
							</div>
						</div>
						
						<div class="lib_img_link_container">
							<div class="lib_img">
								<img src="images/logout.png" width=30 height=30 />
							</div>
							
							<div class="lib_link">
								<form action="'.base_url().'index.php/homePage/home/logout" method="POST">
									<input type="submit" value="Logout"/>
								</form>
							</div>
						</div>
					</div>';
			}
			else
			{
				echo 'not logged in';
			}
		}
	}
?>