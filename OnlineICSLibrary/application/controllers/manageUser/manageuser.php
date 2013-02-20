<?php
	class ManageUser extends CI_Controller 
	{
		function __construct()
		{		
			parent::__construct();
		}
		
		public function index()
		{
			$this->load->view('manageUser/manageuser');
		}
		
		public function usermanage()
		{
			$this->load->database();
			
			$usertype = $this->input->post('usertype');
			
			if($usertype == 'student')
			{
				$query = "SELECT * FROM student WHERE Status='Pending'";
				$query = $this->db->query($query);
				$row = $query->row_array(); 
				
				echo '<table border=1>';
				echo '<tr>';
				echo '<td>Username</td>';
				echo '<td>First Name</td>';
				echo '<td>Middle Name</td>';
				echo '<td>Last Name</td>';
				echo '<td>&nbsp</td>';
				echo '<td>&nbsp</td>';
				echo '</tr>';
				
				for($i=0; $i<$query->num_rows(); $i++)
				{
					$this->load->helper('url');
				
					if($i == 0)
					{
						$row = $query->row();
						echo '<tr>';
						echo '<td>'.$row->Username.'</td>';
						echo '<td>'.$row->FirstName.'</td>';
						echo '<td>'.$row->MiddleName.'</td>';
						echo '<td>'.$row->LastName.'</td>';
						//echo '<td><form action="'.base_url().'index.php/manageUser/acceptreject/accept/student/'.$row->Username.'" method="POST"><input type="submit" class="clicked_button" value="accept" p="'.$row->Username.'" /></form></td>';
						//echo '<td><form action="'.base_url().'index.php/manageUser/acceptreject/reject/student/'.$row->Username.'" method="POST"><input type="submit" class="clicked_button" value="reject" p="'.$row->Username.'" /></form></td>';
						echo '<td><input type="button" class="clicked_button" value="accept" p="'.$row->Username.'" /></td>';
						echo '<td><input type="button" class="clicked_button" value="reject" p="'.$row->Username.'" /></td>';
						echo '';
						echo '</tr>';
					}
					else
					{
						echo '<tr>';
						echo '<form action="acceptreject/manage" method="POST">';
						echo '<td>'.$row->Username.'</td>';
						echo '<td>'.$row->FirstName.'</td>';
						echo '<td>'.$row->MiddleName.'</td>';
						echo '<td>'.$row->LastName.'</td>';
						//echo '<td><form action="'.base_url().'index.php/manageUser/acceptreject/accept/student/'.$row->Username.'" method="POST"><input type="submit" class="clicked_button" class="clicked_button" value="accept" /></form></td>';
						//echo '<td><form action="'.base_url().'index.php/manageUser/acceptreject/reject/student/'.$row->Username.'" method="POST"><input type="submit" class="clicked_button" class="clicked_button" value="reject" /></form></td>';
						echo '<td><input type="button" class="clicked_button" value="accept" p="'.$row->Username.'" /></td>';
						echo '<td><input type="button" class="clicked_button" value="reject" p="'.$row->Username.'" /></td>';
						echo '</form>';
						echo '</tr>';
					}
					$row = $query->next_row();
				}
			}
			else if ($usertype == 'faculty')
			{
				$query = "SELECT * FROM faculty WHERE Status='Pending'";
				$query = $this->db->query($query);
				$row = $query->row_array(); 
				
				echo '<table border=1>';
				echo '<tr>';
				echo '<td>Username</td>';
				echo '<td>First Name</td>';
				echo '<td>Middle Name</td>';
				echo '<td>Last Name</td>';
				echo '<td>&nbsp</td>';
				echo '<td>&nbsp</td>';
				echo '</tr>';
				
				for($i=0; $i<$query->num_rows(); $i++)
				{
					$this->load->helper('url');
				
					if($i == 0)
					{
						$row = $query->row();
						echo '<tr>';
						echo '<td>'.$row->Username.'</td>';
						echo '<td>'.$row->FirstName.'</td>';
						echo '<td>'.$row->MiddleName.'</td>';
						echo '<td>'.$row->LastName.'</td>';
						echo '<td><form action="'.base_url().'index.php/manageUser/acceptreject/accept/faculty/'.$row->Username.'" method="POST"><input type="submit" class="clicked_button" value="accept" p="'.$row->Username.'" /></form></td>';
						echo '<td><form action="'.base_url().'index.php/manageUser/acceptreject/reject/faculty/'.$row->Username.'" method="POST"><input type="submit" class="clicked_button" value="reject" p="'.$row->Username.'" /></form></td>';
						echo '</tr>';
					}
					else
					{
						echo '<tr>';
						echo '<td>'.$row->Username.'</td>';
						echo '<td>'.$row->FirstName.'</td>';
						echo '<td>'.$row->MiddleName.'</td>';
						echo '<td>'.$row->LastName.'</td>';
						echo '<td><form action="'.base_url().'index.php/manageUser/acceptreject/accept/faculty/'.$row->Username.'" method="POST"><input type="submit" class="clicked_button" value="accept" p="'.$row->Username.'" /></form></td>';
						echo '<td><form action="'.base_url().'index.php/manageUser/acceptreject/reject/faculty/'.$row->Username.'" method="POST"><input type="submit" class="clicked_button" value="reject" p="'.$row->Username.'" /></form></td>';
						echo '</tr>';
					}
					$row = $query->next_row();
				}
				
				echo '</table>';
			}
		}
	}
?>