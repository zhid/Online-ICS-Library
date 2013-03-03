<?php
	class AddMaterial_model extends CI_Model
	{
		function __construct()
		{
			parent::__construct();
		}
		
		function addBook($title, $author, $subject, $status, $type, $accountnumber, $callnumber, $publicationdate, $numberofcopies, $isbn, $edition, $publisher, $description, $numberofpages)
		{
			$this->load->helper('url');
		
			$config['upload_path'] = 'bookimages/';
			$config['file_name'] = $title;
			$config['remove_spaces'] = TRUE;
			$config['allowed_types'] = 'gif|jpg|png|jpeg';
			$config['max_size']    = '8000';
			$config['max_width']  = '8000';
			$config['max_height']  = '8000';
			
			//loads the necessary libraries
			$this->load->database();
			$this->load->library('upload', $config);
			
			$sql = "SELECT AccountNumber, CallNumber FROM book WHERE AccountNumber='".$accountnumber."' OR CallNumber='".$callnumber."'";
			$query1 = $this->db->query($sql);
			
			if(!$this->upload->do_upload() || $query1->num_rows() != 0)
			{
				return 'failed';
			}
			else
			{
				$query = "INSERT INTO book(Title,Author,Subject,Status,Type,AccountNumber,CallNumber,PublicationDate,NumberOfCopies,ISBN,Edition,Publisher,Description,NumberOfPages) VALUES ('$title','$author','$subject','$status','$type','$accountnumber','$callnumber','$publicationdate','$numberofcopies','$isbn','$edition','$publisher','$description','$numberofpages')";
				$data = array('upload_data' => $this->upload->data());
				$this->db->query($query);
				return 'success';
			}
		}
		
		function addJounal($title, $author, $subject, $status, $type, $accountnumber, $callnumber, $publicationdate, $numberofcopies, $thesisadviser)
		{
			$this->load->helper('url');
		
			$config['upload_path'] = 'thesisimages/';
			$config['file_name'] = $title;
			$config['remove_spaces'] = TRUE;
			$config['allowed_types'] = 'gif|jpg|png|jpeg';
			$config['max_size']    = '8000';
			$config['max_width']  = '8000';
			$config['max_height']  = '8000';
			
			//loads the necessary libraries
			$this->load->database();
			$this->load->library('upload', $config);
			
			$sql = "SELECT AccountNumber, CallNumber FROM thesis WHERE AccountNumber='".$accountnumber."' OR CallNumber='".$callnumber."'";
			$query1 = $this->db->query($sql);
			
			if(!$this->upload->do_upload() || $query1->num_rows() != 0)
			{
				return 'failed';
			}
			else
			{
				$query = "INSERT INTO thesis(Title,Author,Subject,Status,Type,AccountNumber,CallNumber,PublicationDate,NumberOfCopies,ThesisAdviser) VALUES ('$title','$author','$subject','$status','$type','$accountnumber','$callnumber','$publicationdate','$numberofcopies','$thesisadviser')";
				$data = array('upload_data' => $this->upload->data());
				$this->db->query($query);
				return 'success';
			}
		}
		
		function addThesis($title, $author, $subject, $status, $type, $accountnumber, $callnumber, $publicationdate, $numberofcopies, $volume, $description)
		{
			$this->load->helper('url');
		
			$config['upload_path'] = 'journalimages/';
			$config['file_name'] = $title;
			$config['remove_spaces'] = TRUE;
			$config['allowed_types'] = 'gif|jpg|png|jpeg';
			$config['max_size']    = '8000';
			$config['max_width']  = '8000';
			$config['max_height']  = '8000';
			
			//loads the necessary libraries
			$this->load->database();
			$this->load->library('upload', $config);
			
			$sql = "SELECT AccountNumber, CallNumber FROM journal WHERE AccountNumber='".$accountnumber."' OR CallNumber='".$callnumber."'";
			$query1 = $this->db->query($sql);
				
			if(!$this->upload->do_upload() || $query1->num_rows() != 0)
			{
				return 'failed';
			}
			else
			{
				$query = "INSERT INTO journal(Title,Author,Subject,Status,Type,AccountNumber,CallNumber,PublicationDate,NumberOfCopies,Volume,Description) VALUES ('$title','$author','$subject','$status','$type','$accountnumber','$callnumber','$publicationdate','$numberofcopies','$volume','$description')";
				$data = array('upload_data' => $this->upload->data());
				$this->db->query($query);
				return 'success';
			}
		}
	}
?>