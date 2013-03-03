<?php
	class BookCart extends CI_Controller 
	{
		function __construct()
		{		
			parent::__construct();
		}
		
		public function index()
		{
			$this->load->view('bookcartPage/bookCart');
		}
        
		public function showCart()
		{
			$this->load->database();
	 
			$sql  = "SELECT * FROM cart";
			$query = $this->db->query($sql);
			$row = $query->row_array();             

			if($query->num_rows() > 0)
			{
				echo '<table>';
				echo '<tr>';
				echo '<td>Username</td>';
				echo '<td>Account Number</td>';
				echo '<td>Call Number</td>';
				echo '<td>Date Borrowed</td>';
				echo '<td>Due</td>';
				echo '<td>Date Of Return</td>';
				echo '</tr>';
			}
			else
			{
				echo 'YOUR SEARCH KEYWORD DID NOT MATCH ANYTHING.';
			}
         
         for($i=0; $i<$query->num_rows(); $i++)
        {
            $this->load->helper('url');
			if($i==0)
			{
				$row = $query->row();
				echo '<tr>';
				echo '<td>'.$row->Username.'</td>';
				echo '<td>'.$row->AccountNumber.'</td>';
				echo '<td>'.$row->CallNumber.'</td>';
				echo '<td>'.$row->DateBorrowed.'</td>';
				echo '<td>'.$row->Due.'</td>';
				echo '<td>'.$row->DateOfReturn.'</td>';
				
				echo '</tr>';
			}
			else
			{
				echo '<tr>';
				echo '<td>'.$row->Username.'</td>';
				echo '<td>'.$row->AccountNumber.'</td>';
				echo '<td>'.$row->CallNumber.'</td>';
				echo '<td>'.$row->DateBorrowed.'</td>';
				echo '<td>'.$row->Due.'</td>';
				echo '<td>'.$row->DateOfReturn.'</td>';
		
				echo '</tr>';
			}
			$row=$query->next_row();
        }
		
		echo '<td><form action="'.base_url().'index.php/borrowMaterial/borrowmanager/addToBorrowfunc/" method="POST"><input type="submit" class="borrow_button" value ="BORROW MATERIALS"/></form></td>';
        
        echo '</table>'; 
		}
		
   }
?>