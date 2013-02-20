<?php
	class DeleteManager extends CI_Controller 
	{
		function __construct()
		{		
			parent::__construct();
		}
		
		 public function deletefunc($type, $account_number)
        {
			$this->load->database();
		
			$sqldel  = "DELETE FROM ".$type." WHERE AccountNumber='".$account_number."'"; 
			$this->db->query($sqldel);
			$this->load->view('deleteMaterial/deletematerial');
        }
	}
?>