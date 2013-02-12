<?php
	class AddMaterial extends CI_Controller 
	{
		var $isSuccessful;
	
		function __construct()
		{		
			parent::__construct();
		}
		
		public function index()
		{
			$this->load->view('addMaterial/addbook');
		}
		
		public function addTheBook()
		{
			$this->load->helper('url');
		
			$config['upload_path'] = 'bookimages/';
			$config['file_name'] = $this->input->post('book_title');
			$config['remove_spaces'] = FALSE;
			$config['allowed_types'] = 'gif|jpg|png|jpeg';
			$config['max_size']    = '3000';
			$config['max_width']  = '3000';
			$config['max_height']  = '3000';
			
			$title = $this->input->post('book_title');
			$author = $this->input->post('book_author');
			$subject = $this->input->post('book_subject');
			$status = $this->input->post('book_status');
			$type = $this->input->post('book_type');
			$accountnumber = $this->input->post('book_account_number');
			$callnumber = $this->input->post('book_call_number');
			$publicationdate = $this->input->post('book_publication_date');
			$numberofcopies = $this->input->post('book_number_of_copies');
			$isbn = $this->input->post('book_isbn');
			$edition = $this->input->post('book_edition');
			$publisher = $this->input->post('book_publisher');
			$description = $this->input->post('book_description');
			$numberofpages = $this->input->post('book_pages');
			
			//loads the necessary libraries
			$this->load->database();
			$this->load->library('upload', $config);
			
			$sql = "SELECT AccountNumber, CallNumber FROM book WHERE AccountNumber='".$accountnumber."' OR CallNumber='".$callnumber."'";
			$query1 = $this->db->query($sql);
				
			if(!$this->upload->do_upload() || $query1->num_rows() != 0)
			{
				$this->isSuccessful = 0;
				$data['isSuccessful'] = $this->isSuccessful;
				$this->load->view('addedPage/added_page', $data);
			}
			else
			{
				$query = "INSERT INTO book(Title,Author,Subject,Status,Type,AccountNumber,CallNumber,PublicationDate,NumberOfCopies,ISBN,Edition,Publisher,Description,NumberOfPages) VALUES ('$title','$author','$subject','$status','$type','$accountnumber','$callnumber','$publicationdate','$numberofcopies','$isbn','$edition','$publisher','$description','$numberofpages')";
					
				$data = array('upload_data' => $this->upload->data());
				
				$this->db->query($query);
				$this->isSuccessful = 1;
				$data['isSuccessful'] = $this->isSuccessful;
				$this->load->view('addedPage/added_page', $data);
			}
		}
		
		public function addTheThesis()
		{
			$this->load->helper('url');
		
			$config['upload_path'] = 'thesisimages/';
			$config['file_name'] = $this->input->post('thesis_title');
			$config['remove_spaces'] = FALSE;
			$config['allowed_types'] = 'gif|jpg|png|jpeg';
			$config['max_size']    = '3000';
			$config['max_width']  = '3000';
			$config['max_height']  = '3000';
			
			$title = $this->input->post('thesis_title');
			$author = $this->input->post('thesis_author');
			$subject = $this->input->post('thesis_subject');
			$status = $this->input->post('thesis_status');
			$type = $this->input->post('thesis_type');
			$accountnumber = $this->input->post('thesis_account_number');
			$callnumber = $this->input->post('thesis_call_number');
			$publicationdate = $this->input->post('thesis_publication_date');
			$numberofcopies = $this->input->post('thesis_number_of_copies');
			$thesisadviser = $this->input->post('thesis_adviser');
			
			//loads the necessary libraries
			$this->load->database();
			$this->load->library('upload', $config);
			
			$sql = "SELECT AccountNumber, CallNumber FROM thesis WHERE AccountNumber='".$accountnumber."' OR CallNumber='".$callnumber."'";
			$query1 = $this->db->query($sql);
				
			if(!$this->upload->do_upload() || $query1->num_rows() != 0)
			{
				$this->isSuccessful = 0;
				$data['isSuccessful'] = $this->isSuccessful;
				$this->load->view('addedPage/added_page', $data);
			}
			else
			{
				$query = "INSERT INTO thesis(Title,Author,Subject,Status,Type,AccountNumber,CallNumber,PublicationDate,NumberOfCopies,ThesisAdviser) VALUES ('$title','$author','$subject','$status','$type','$accountnumber','$callnumber','$publicationdate','$numberofcopies','$thesisadviser')";
					
				$data = array('upload_data' => $this->upload->data());
				
				$this->db->query($query);
				$this->isSuccessful = 1;
				$data['isSuccessful'] = $this->isSuccessful;
				$this->load->view('addedPage/added_page', $data);
			}
		}
		
		public function addTheJournal()
		{
			$this->load->helper('url');
		
			$config['upload_path'] = 'journalimages/';
			$config['file_name'] = $this->input->post('journal_title');
			$config['remove_spaces'] = FALSE;
			$config['allowed_types'] = 'gif|jpg|png|jpeg';
			$config['max_size']    = '3000';
			$config['max_width']  = '3000';
			$config['max_height']  = '3000';
			
			$title = $this->input->post('journal_title');
			$author = $this->input->post('journal_author');
			$subject = $this->input->post('journal_subject');
			$status = $this->input->post('journal_status');
			$type = $this->input->post('journal_type');
			$accountnumber = $this->input->post('journal_account_number');
			$callnumber = $this->input->post('journal_call_number');
			$publicationdate = $this->input->post('journal_publication_date');
			$numberofcopies = $this->input->post('journal_number_of_copies');
			$volume = $this->input->post('journal_volume');
			$series = $this->input->post('journal_series');
			
			//loads the necessary libraries
			$this->load->database();
			$this->load->library('upload', $config);
			
			$sql = "SELECT AccountNumber, CallNumber FROM journal WHERE AccountNumber='".$accountnumber."' OR CallNumber='".$callnumber."'";
			$query1 = $this->db->query($sql);
				
			if(!$this->upload->do_upload() || $query1->num_rows() != 0)
			{
				$this->isSuccessful = 0;
				$data['isSuccessful'] = $this->isSuccessful;
				$this->load->view('addedPage/added_page', $data);
			}
			else
			{
				$query = "INSERT INTO journal(Title,Author,Subject,Status,Type,AccountNumber,CallNumber,PublicationDate,NumberOfCopies,Volume,Series) VALUES ('$title','$author','$subject','$status','$type','$accountnumber','$callnumber','$publicationdate','$numberofcopies','$volume','$series')";
					
				$data = array('upload_data' => $this->upload->data());
				
				$this->db->query($query);
				$this->isSuccessful = 1;
				$data['isSuccessful'] = $this->isSuccessful;
				$this->load->view('addedPage/added_page', $data);
			}
		}
		
		public function addLink($type)
		{
			if($type == 'book')
			{
				$this->load->view('addMaterial/addbook');
			}
			else if($type == 'thesis')
			{
				$this->load->view('addMaterial/addthesis');
			}
			else if($type == 'journal')
			{
				$this->load->view('addMaterial/addjournal');
			}
		}
	}
?>