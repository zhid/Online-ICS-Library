<?php
	class DeleteManager extends CI_Controller 
	{
		function __construct()
		{		
			parent::__construct();
		}
		
		 public function deletefunc($type, $thetitle, $account_number)
        {
			$this->load->database();
			
			//deletes the image of the material from the directory
			$title = str_replace('%20', '_', $thetitle);
			$path = $type.'images/'.$title.'.jpg';
 			unlink($path);
			
		
			$sqldel  = "DELETE FROM ".$type." WHERE AccountNumber='".$account_number."'"; 
			$this->db->query($sqldel);
			
			echo "deleted";
        }
	}
?>