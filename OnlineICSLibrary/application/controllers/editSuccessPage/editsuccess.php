<?php
	class EditSuccess extends CI_Controller 
	{		
		function __construct()
		{		
			parent::__construct();
		}
		
		public function index()
		{
		}
		
		public function edit_book()
		{
			$this->load->database();
			
			$title = $this->input->post('edit_title');
			$author = $this->input->post('edit_author');
			$subject = $this->input->post('edit_subject');
			$status = $this->input->post('edit_status');
			$type = $this->input->post('edit_type');
			$accountNumber = $this->input->post('edit_account_number');
			$callNumber = $this->input->post('edit_call_number');
			$publicationDate = $this->input->post('edit_publication_date');
			$numberOfCopies = $this->input->post('edit_number_of_copies');
			$isbn = $this->input->post('edit_isbn');
			$edition = $this->input->post('edit_edition');
			$publisher = $this->input->post('edit_publisher');
			$description = $this->input->post('edit_description');
			$numberOfPages = $this->input->post('edit_number_of_pages');
		
			$sq1 = "UPDATE book 
					SET 
						Title = '".$title."',
						Author = '".$author."',
						Subject = '".$subject."',
						Status = '".$status."',
						Type = '".$type."',
						AccountNumber = '".$accountNumber."',
						CallNumber = '".$callNumber."',
						PublicationDate = '".$publicationDate."',
						NumberOfCopies = '".$numberOfCopies."',
						ISBN = '".$isbn."',
						Edition = '".$edition."',
						Publisher = '".$publisher."',
						Description = '".$description."',
						NumberOfPages = ".$numberOfPages."
					WHERE CallNumber = '".$callNumber."' ";
			
			$this->db->query($sq1);
			$this->load->view('editSuccessPage/editSuccess_page');
		
		}
		
		public function edit_journal()
		{
			$this->load->database();
			
			$title = $this->input->post('edit_title');
			$author = $this->input->post('edit_author');
			$subject = $this->input->post('edit_subject');
			$status = $this->input->post('edit_status');
			$type = $this->input->post('edit_type');
			$accountNumber = $this->input->post('edit_account_number');
			$callNumber = $this->input->post('edit_call_number');
			$publicationDate = $this->input->post('edit_publication_date');
			$numberOfCopies = $this->input->post('edit_number_of_copies');
			$volume = $this->input->post('edit_volume');
			$description = $this->input->post('edit_description');
			
			$sq1 = "UPDATE journal 
					SET 
						Title = '".$title."',
						Author = '".$author."',
						Subject = '".$subject."',
						Status = '".$status."',
						Type = '".$type."',
						AccountNumber = '".$accountNumber."',
						CallNumber = '".$callNumber."',
						PublicationDate = '".$publicationDate."',
						NumberOfCopies = '".$numberOfCopies."',
						Volume = '".$volume."',
						Description = '".$description."'
					WHERE CallNumber = '".$callNumber."' ";
			
			$this->db->query($sq1);
			$this->load->view('editSuccessPage/editSuccess_page');
		}
		
		/*THESIS*/
		/*
		public function edit_thesis()
		{
			$this->load->database();
			
			$title = $this->input->post('edit_title');
			$author = $this->input->post('edit_author');
			$subject = $this->input->post('edit_subject');
			$status = $this->input->post('edit_status');
			$type = $this->input->post('edit_type');
			$accountNumber = $this->input->post('edit_account_number');
			$callNumber = $this->input->post('edit_call_number');
			$publicationDate = $this->input->post('edit_publication_date');
			$numberOfCopies = $this->input->post('edit_number_of_copies');
			$thesisAdviser = $this->input->post('edit_thesis_adviser');
			
			$sq1 = "UPDATE thesis 
					SET 
						Title = '".$title."',
						Author = '".$author."',
						Subject = '".$subject."',
						Status = '".$status."',
						Type = '".$type."',
						AccountNumber = '".$accountNumber."',
						CallNumber = '".$callNumber."',
						PublicationDate = '".$publicationDate."',
						NumberOfCopies = '".$numberOfCopies."',
						ThesisAdviser = '".$thesisAdviser."'
					WHERE CallNumber = '".$callNumber."' ";
			
			$this->db->query($sq1);
			$this->load->view('editSuccessPage/editSuccess_page');
		}
		*/
	}
?>