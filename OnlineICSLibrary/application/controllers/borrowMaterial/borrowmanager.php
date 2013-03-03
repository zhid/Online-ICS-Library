<?php
	class BorrowManager extends CI_Controller 
	{
		function __construct()
		{		
			parent::__construct();
		}
		
		 public function addToBorrowfunc()
        {
			$this->load->database();
			$sql  = "SELECT * FROM cart";
			$query1 = $this->db->query($sql);
			$row = $query1->row_array(); 
			$row = $query1->row();   
			for($i=0; $i<$query1->num_rows(); $i++){
			    //$row = $query->row();        
				$user_name = $row->Username;
				$account_num = $row->AccountNumber;
				$call_num = $row->CallNumber;
				$date_borrowed = $row->DateBorrowed;
				$due = $row->Due;
				$date_of_return = $row->DateOfReturn;
			
				$call_num = str_replace('%20', ' ', $call_num);
				$query  = "INSERT INTO borrows(Username,AccountNumber,CallNumber,DateBorrowed,Due,DateOfReturn) VALUES ('$user_name','$account_num','$call_num','$date_borrowed','$due','$date_of_return')";
				$this->db->query($query);
				
				$row = $query1->next_row();
			}
			
			echo '<script type="text/javascript">alert("BORROW REQUEST SENT!")</script>';
			$this->load->view('searchPage/searchpage');
			return 'success';
		
        }
		
	}
?>