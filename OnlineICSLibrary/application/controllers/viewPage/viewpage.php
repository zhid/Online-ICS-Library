<?php
	class viewpage extends CI_Controller 
	{
		var $isSuccessful;
	
		function __construct()
		{		
			parent::__construct();
		}
		
		public function index()
		{
			$type = $this->input->post('material_type');
			
			if($type == "book")
			{
				$accountnumber = $this->input->post('accountnumber');
				$callnumber = $this->input->post('callnumber');
				$this->load->database();
				$sql = "SELECT * FROM ".$type." WHERE AccountNumber='".$accountnumber."' AND CallNumber='".$callnumber."'";
				$query = $this->db->query($sql);
				$row = $query->row_array();
				
				$row = $query->row();
				$data['mat_type'] = $type;
				
				for($i = 0;$i < $query->num_rows(); $i ++)
				{
					$data['title'] = $row->Title;
					$data['author'] = $row->Author;
					$data['subject'] = $row->Subject;
					$data['status'] = $row->Status;
					$data['type'] = $row->Type;
					$data['accountnumber'] = $row->AccountNumber;
					$data['callnumber'] = $row->CallNumber;
					$data['copies'] = $row->NumberOfCopies;
					$data['isbn'] = $row->ISBN;
					$data['edition'] = $row->Edition;
					$data['description'] = $row->Description;
					$data['publicationdate'] = $row->PublicationDate;
					$data['publisher'] = $row->Publisher;
					$data['pages'] = $row->NumberOfPages;
					
					$row = $query->next_row();
				}
				$this->load->view('viewPage/viewPage', $data);
			}
			else if($type == "journal")
			{
				$accountnumber = $this->input->post('accountnumber');
				$callnumber = $this->input->post('callnumber');
				$this->load->database();
				$sql = "SELECT * FROM ".$type." WHERE AccountNumber='".$accountnumber."' AND CallNumber='".$callnumber."'";
				$query = $this->db->query($sql);
				$row = $query->row_array();
				
				$row = $query->row();
				$data['mat_type'] = $type;
				
				for($i = 0;$i < $query->num_rows(); $i ++)
				{
					$data['title'] = $row->Title;
					$data['author'] = $row->Author;
					$data['subject'] = $row->Subject;
					$data['status'] = $row->Status;
					$data['type'] = $row->Type;
					$data['accountnumber'] = $row->AccountNumber;
					$data['callnumber'] = $row->CallNumber;
					$data['copies'] = $row->NumberOfCopies;
					$data['description'] = $row->Description;
					$data['publicationdate'] = $row->PublicationDate;
					$data['volume'] = $row->Volume;
					
					$row = $query->next_row();
				}
				$this->load->view('viewPage/viewPage_journal', $data);
			}
			else if($type == "thesis")
			{
				$accountnumber = $this->input->post('accountnumber');
				$callnumber = $this->input->post('callnumber');
				$this->load->database();
				$sql = "SELECT * FROM ".$type." WHERE AccountNumber='".$accountnumber."' AND CallNumber='".$callnumber."'";
				$query = $this->db->query($sql);
				$row = $query->row_array();
				
				$row = $query->row();
				$data['mat_type'] = $type;
				
				for($i = 0;$i < $query->num_rows(); $i ++)
				{
					$data['title'] = $row->Title;
					$data['author'] = $row->Author;
					$data['subject'] = $row->Subject;
					$data['status'] = $row->Status;
					$data['type'] = $row->Type;
					$data['accountnumber'] = $row->AccountNumber;
					$data['callnumber'] = $row->CallNumber;
					$data['copies'] = $row->NumberOfCopies;
					$data['thesisadviser'] = $row->ThesisAdviser;
					$data['publicationdate'] = $row->PublicationDate;
					
					$row = $query->next_row();
				}
				$this->load->view('viewPage/viewPage_thesis', $data);
			}
		}
		
		
	}
?>