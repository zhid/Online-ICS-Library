<?php
	class searchpage extends CI_Controller 
	{
		var $isSuccessful;
	
		function __construct()
		{		
			parent::__construct();
		}
		
		public function index()
		{
			$this->load->view('searchPage/searchPage');
			$this->load->library('session');
		}
		
		public function search() {
			$this->load->library('session');
			
			//Fields
			$keyword = $this->input->post('bsearch');
			$type = $this->input->post('material_type');
			$field = $this->input->post('material_field');
			
			$username = $this->session->userdata('username');
			
			$this->load->database();
			
			//SQL QUERY
			$sq1 = "SELECT * FROM ".$type." WHERE ".$field." LIKE '%".$keyword."%'";
			
			$query = $this->db->query($sq1);
			$row = $query->row_array();
			if($query->num_rows() == 0){
				echo "<br/><br/><br/>MATERIAL NOT FOUND";
			}
			else{	
				$this->load->helper('url');
				
				$row = $query->row();
				echo '<table>';
				echo '<tr>';
				echo '<td><strong>Title</strong></td>';
				echo '<td><strong>Author</strong></td>';
				echo '<td><strong>Account Number</strong></td>';
				echo '<td><strong>Call Number</strong></td>';
				echo '</tr>';
				
				for($i = 0;$i < $query->num_rows(); $i ++){
					echo '<tr>';
					echo '<td>'.$row->Title.'</td>';
					echo '<td>'.$row->Author.'</td>';
					echo '<td>'.$row->AccountNumber.'</td>';
					echo '<td>'.$row->CallNumber.'</td>';
					echo '<td>
							<form action = "'.base_url().'index.php/viewPage/viewpage/" method = "POST">
								<input type = "hidden" name = "material_type" id ="material_type" value = "'.($type).'" />
								<input type = "hidden" name = "accountnumber" id = "accountnumber" value = "'.($row->AccountNumber).'" />
								<input type = "hidden" name = "callnumber" id ="callnumber" value = "'.($row->CallNumber).'" />
								<input type = "submit" class = "view" name = "view" value = "VIEW" />
							</form>
						</td>';
					//$islogin = $this->session->userdata('loggedin');
					if($this->session->userdata('loggedin') == TRUE)
					{
						echo '<td><form action="'.base_url().'index.php/addToCart/addToCart/addToCartfunc/'.$username.'/'.$row->AccountNumber.'/'.$row->CallNumber.'" method="POST"><input type="submit" class="deletematerial_button" value ="ADD TO CART"/></form></td>';
					}
					$row = $query->next_row();
				}
				echo '</table>';			
			}
		}
		
		public function advancedSearch(){	
			$this->load->library('session');
		
			//Fields
			$keyword1 = $this->input->post('textbox1');
			$keyword2 = $this->input->post('textbox2');
			$keyword3 = $this->input->post('textbox3');
			$field1 = $this->input->post('material_field1');
			$field2 = $this->input->post('material_field2');
			$field3 = $this->input->post('material_field3');
			$operator1 = $this->input->post('operator1');
			$operator2 = $this->input->post('operator2');
			$type = $this->input->post('material_type');
			
			$this->load->database();
			
			$username = $this->session->userdata('username');
			
			//SQL QUERY
			$sq1 = "SELECT * FROM ".$type." WHERE ".$field1." LIKE '%".$keyword1."%' ".$operator1."(".$field2." LIKE '%".$keyword2."%') ".$operator2."(".$field3." LIKE '%".$keyword3."%')";
			
			$query = $this->db->query($sq1);
			$row = $query->row_array();
			if($query->num_rows() == 0){
				echo "<br/><br/><br/>MATERIAL NOT FOUND";
			}
			else{	
				$this->load->helper('url');
				
				$row = $query->row();
				echo '<table>';
				echo '<tr>';
				echo '<td><strong>Title</strong></td>';
				echo '<td><strong>Author</strong></td>';
				echo '<td><strong>Account Number</strong></td>';
				echo '<td><strong>Call Number</strong></td>';
				echo '</tr>';
				
				for($i = 0;$i < $query->num_rows(); $i ++){
					echo '<tr>';
					echo '<td>'.$row->Title.'</td>';
					echo '<td>'.$row->Author.'</td>';
					echo '<td>'.$row->AccountNumber.'</td>';
					echo '<td>'.$row->CallNumber.'</td>';
					echo '<td>
							<form action = "'.base_url().'index.php/viewPage/viewpage/" method = "POST">
								<input type = "hidden" name = "material_type" id ="material_type" value = "'.($type).'" />
								<input type = "hidden" name = "accountnumber" id = "accountnumber" value = "'.($row->AccountNumber).'" />
								<input type = "hidden" name = "callnumber" id ="callnumber" value = "'.($row->CallNumber).'" />
								<input type = "submit" class = "view" name = "view" value = "VIEW" />
							</form>
						</td>';
					//$islogin = $this->session->userdata('loggedin');
					if($this->session->userdata('loggedin') ==  TRUE)
					{
						echo '<td><form action = "'.base_url().'index.php/addToCart/addToCart/addToCartfunc/'.$username.'/'.$row->AccountNumber.'/'.$row->CallNumber.'" method = "POST"><input type = "submit" class = "addtoCart" name = "addtoCart" value = "ADD TO CART" /></form></td>';
					}
					$row = $query->next_row();
				}
				echo '</table>';			
			}
		}
	}
?>