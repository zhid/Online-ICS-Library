<?php
	class EditMaterial extends CI_Controller 
	{
		var $isSuccessful;
	
		function __construct()
		{		
			parent::__construct();
		}
		
		public function index()
		{
			$this->load->view('editMaterial/editmaterial');
		}
		
		public function editMaterials()
		{
			//Fields
			$keyword = $this->input->post('edit_keyword');
			$type = $this->input->post('material_type');
			$field = $this->input->post('material_field');
			
			$this->load->database();
			
			//SQL QUERY
			$sq1 = "SELECT * FROM ".$type." WHERE ".$field." LIKE '%".$keyword."%'";
			
			$query = $this->db->query($sq1);
			$row = $query->row_array();
			
			//NO MATCH
			if($query->num_rows() == 0){
				echo "NOT FOUND";
			}
			//MATCH
			else if($query->num_rows() == 1){
				if($type == 'book'){
					echo '<form id = "edit_form" name = "edit_form" action = "../editSuccessPage/editsuccess/edit_book" method = "POST">';
					echo '<table>';
					echo '<tr><td><label for = "edit_title">Title</label></td>';
					echo '<td><input type = "text" value = "'.$row['Title'].'" size = 50 id = "edit_title" name = "edit_title" required = "required" /></td></tr>'; 
					echo '<tr><td><label for = "edit_author">Author</label></td>';
					echo '<td><input type = "text" value = "'.$row['Author'].'" size = 50 id = "edit_author" name = "edit_author" /></td>';
					echo '<tr><td><label for = "edit_subject">Subject</label></td>';
					echo '<td><input type = "text" value = "'.$row['Subject'].'" size = 50 id = "edit_subject" name = "edit_subject" /></td></tr>';
					echo '<tr><td><label for = "editTitle">Status</label></td>';
					echo '<td><select id = "edit_status" name = "edit_status" select = "'.$row['Status'].'">
									<option value = "on-shelf">On-Shelf</option>
									<option value = "on-loan">On-Loan</option>
						</select></td>';
					echo '<tr><td><label for = "edit_type">Type</label></td>';
					echo '<td><select id = "edit_type" name = "edit_type">
									<option value = "regular">Regular</option>
									<option value = "non-circulating">Non-Circulating</option>
						</select></td>';
					echo '<tr><td><label for = "edit_account_number">Account Number</label></td>';
					echo '<td><input type = "text" value = "'.$row['AccountNumber'].'" size = 50 id = "edit_account_number" name = "edit_account_number" hidden = "hidden" /></td></tr>';
					echo '<tr><td><label for = "edit_call_number">Call Number</label></td>';
					echo '<td><input type = "text" value = "'.$row['CallNumber'].'" size = 50 id = "edit_call_number" name = "edit_call_number" hidden = "hidden" /></td></tr>';
					echo '<tr><td><label for = "edit_publication_date">Publication Date</label></td>';
					echo '<td><input type = "date" value = "'.$row['PublicationDate'].'" size = 50 id = "edit_publication_date" name = "edit_publication_date" /></td></tr>';
					echo '<tr><td><label for = "edit_number_of_copies">Number of Copies</label></td>';
					echo '<td><input type = "number" value = "'.$row['NumberOfCopies'].'" size = 50 id = "edit_number_of_copies" name = "edit_number_of_copies" /></td></tr>';
					echo '<tr><td><label for = "edit_isbn">ISBN</label></td>';
					echo '<td><input type = "text" value = "'.$row['ISBN'].'" size = 50 id = "edit_isbn" name = "edit_isbn" /></td></tr>';
					echo '<tr><td><label for = "edit_edition">Edition</label></td>';
					echo '<td><input type = "text" value = "'.$row['Edition'].'" size = 50 id = "edit_edition" name = "edit_edition" /></td></tr>';
					echo '<tr><td><label for = "edit_publisher">Publisher</label></td>';
					echo '<td><input type = "text" value = "'.$row['Publisher'].'" size = 50 id = "edit_publisher" name = "edit_publisher" /></td></tr>';
					echo '<tr><td><label for = "edit_description">Description</label></td>';
					echo '<td><input type = "text" value = "'.$row['Description'].'" size = 50 id = "edit_description" name = "edit_description" /></td></tr>';
					echo '<tr><td><label for = "edit_number_of_pages">Number of Pages</label></td>';
					echo '<td><input type = "number" value = "'.$row['NumberOfPages'].'" size = 50 id = "edit_number_of_pages" name = "edit_number_of_pages" /></td></tr>';
					echo '</table>';
					echo '<input type = "submit" name = "edit" id = "edit" value = "UPDATE RECORD" />';
					echo "</form>";
				}
				else if($type == 'journal'){
					echo '<form id = "edit_form" name = "edit_form" action = "../editSuccessPage/editsuccess/edit_journal" method = "POST">';
					echo '<table>';
					echo '<tr><td><label for = "edit_title">Title</label></td>';
					echo '<td><input type = "text" value = "'.$row['Title'].'" size = 50 id = "edit_title" name = "edit_title" /></td></tr>'; 
					echo '<tr><td><label for = "edit_author">Author</label></td>';
					echo '<td><input type = "text" value = "'.$row['Author'].'" size = 50 id = "edit_author" name = "edit_author" /></td>';
					echo '<tr><td><label for = "edit_subject">Subject</label></td>';
					echo '<td><input type = "text" value = "'.$row['Subject'].'" size = 50 id = "edit_subject" name = "edit_subject" /></td></tr>';
					echo '<tr><td><label for = "editTitle">Status</label></td>';
					echo '<td><select id = "edit_status" name = "edit_status" select = "'.$row['Status'].'">
									<option value = "on-shelf">On-Shelf</option>
									<option value = "on-loan">On-Loan</option>
						</select></td>';
					echo '<tr><td><label for = "edit_type">Type</label></td>';
					echo '<td><select id = "edit_type" name = "edit_type">
									<option value = "regular">Regular</option>
									<option value = "non-circulating">Non-Circulating</option>
						</select></td>';
					echo '<tr><td><label for = "edit_account_number">Account Number</label></td>';
					echo '<td><input type = "text" value = "'.$row['AccountNumber'].'" size = 50 id = "edit_account_number" name = "edit_account_number" hidden = "hidden" /></td></tr>';
					echo '<tr><td><label for = "edit_call_number">Call Number</label></td>';
					echo '<td><input type = "text" value = "'.$row['CallNumber'].'" size = 50 id = "edit_call_number" name = "edit_call_number" hidden = "hidden" /></td></tr>';
					echo '<tr><td><label for = "edit_publication_date">Publication Date</label></td>';
					echo '<td><input type = "date" value = "'.$row['PublicationDate'].'" size = 50 id = "edit_publication_date" name = "edit_publication_date" /></td></tr>';
					echo '<tr><td><label for = "edit_number_of_copies">Number of Copies</label></td>';
					echo '<td><input type = "number" value = "'.$row['NumberOfCopies'].'" size = 50 id = "edit_number_of_copies" name = "edit_number_of_copies" /></td></tr>';
					echo '<tr><td><label for = "edit_volume">Volume</label></td>';
					echo '<td><input type = "number" value = "'.$row['Volume'].'" size = 50 id = "volume" name = "volume" /></td></tr>';
					echo '<tr><td><label for = "edit_description">Description</label></td>';
					echo '<td><input type = "text" value = "'.$row['Description'].'" size = 50 id = "edit_description" name = "edit_description" /></td></tr>';
					echo '</table>';
					echo '<input type = "submit" name = "edit" id = "edit" value = "UPDATE RECORD" />';
					echo "</form>";
				}
				else{
					/*Thesis*/
					/*
					echo '<form id = "edit_form" name = "edit_form" action = "../editSuccessPage/editsuccess/edit_thesis" method = "POST">';
					echo '<table>';
					echo '<tr><td><label for = "edit_title">Title</label></td>';
					echo '<td><input type = "text" value = "'.$row['Title'].'" size = 50 id = "edit_title" name = "edit_title" /></td></tr>'; 
					echo '<tr><td><label for = "edit_author">Author</label></td>';
					echo '<td><input type = "text" value = "'.$row['Author'].'" size = 50 id = "edit_author" name = "edit_author" /></td>';
					echo '<tr><td><label for = "edit_subject">Subject</label></td>';
					echo '<td><input type = "text" value = "'.$row['Subject'].'" size = 50 id = "edit_subject" name = "edit_subject" /></td></tr>';
					echo '<tr><td><label for = "editTitle">Status</label></td>';
					echo '<td><select id = "edit_status" name = "edit_status" select = "'.$row['Status'].'">
									<option value = "on-shelf">On-Shelf</option>
									<option value = "on-loan">On-Loan</option>
						</select></td>';
					echo '<tr><td><label for = "edit_type">Type</label></td>';
					echo '<td><select id = "edit_type" name = "edit_type">
									<option value = "regular">Regular</option>
									<option value = "non-circulating">Non-Circulating</option>
						</select></td>';
					echo '<tr><td><label for = "edit_account_number">Account Number</label></td>';
					echo '<td><input type = "text" value = "'.$row['AccountNumber'].'" size = 50 id = "edit_account_number" name = "edit_account_number" hidden = "hidden" /></td></tr>';
					echo '<tr><td><label for = "edit_call_number">Call Number</label></td>';
					echo '<td><input type = "text" value = "'.$row['CallNumber'].'" size = 50 id = "edit_call_number" name = "edit_call_number" hidden = "hidden" /></td></tr>';
					echo '<tr><td><label for = "edit_publication_date">Publication Date</label></td>';
					echo '<td><input type = "date" value = "'.$row['PublicationDate'].'" size = 50 id = "edit_publication_date" name = "edit_publication_date" /></td></tr>';
					echo '<tr><td><label for = "edit_number_of_copies">Number of Copies</label></td>';
					echo '<td><input type = "number" value = "'.$row['NumberOfCopies'].'" size = 50 id = "edit_number_of_copies" name = "edit_number_of_copies" /></td></tr>';
					echo '<tr><td><label for = "edit_thesis_adviser">Thesis Adviser</label></td>';
					echo '<td><input type = "text" value = "'.$row['ThesisAdviser'].'" size = 50 id = "edit_thesis_adviser" name = "edit_thesis_adviser" /></td></tr>';
					echo '</table>';
					echo '<input type = "submit" name = "edit" id = "edit" value = "UPDATE RECORD" />';
					echo "</form>";
					*/
				}
			}
			else{
				$row = $query->row();
				echo '<table border = 1px>';
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
					echo '<td><form action = "" method = "POST"><input type = "submit" value = "EDIT" /></form></td>';
					$row = $query->next_row();
				}
					/*Need to edit*/
				echo '</table>';
			}

		}
		
	
	}
?>