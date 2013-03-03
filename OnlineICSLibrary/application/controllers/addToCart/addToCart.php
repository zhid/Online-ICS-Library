<?php
	class AddToCart extends CI_Controller 
	{
		function __construct()
		{		
			parent::__construct();
		}
		
		 public function addToCartfunc($username, $account_number, $call_number)
        {
			$this->load->database();
			$call_number = str_replace('%20', ' ', $call_number);
			$query  = "INSERT INTO cart(Username,AccountNumber,CallNumber,DateBorrowed,Due,DateOfReturn) VALUES ('$username','$account_number','$call_number','null','null','null')";
			$this->db->query($query);
			
			echo '<script type="text/javascript">alert("SUCCESSFULLY ADDED TO CART!")</script>';
			$this->load->view('searchPage/searchpage');
			return 'success';
		
        }
	}
?>