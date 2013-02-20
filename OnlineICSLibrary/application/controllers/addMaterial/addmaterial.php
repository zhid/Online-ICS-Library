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
				
			$this->load->model('addMaterial/addmaterial_model');
			$response = $this->addmaterial_model->addBook($title, $author, $subject, $status, $type, $accountnumber, $callnumber, $publicationdate, $numberofcopies, $isbn, $edition, $publisher, $description, $numberofpages); 
		
			if($response == 0)
			{
				$this->isSuccessful = 0;
				$data['isSuccessful'] = $this->isSuccessful;
				$this->load->view('addedPage/added_page', $data);
			}
			else
			{
				$this->isSuccessful = 1;
				$data['isSuccessful'] = $this->isSuccessful;
				$this->load->view('addedPage/added_page', $data);
			}
		}
		
		public function addTheThesis()
		{
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
			
			
			$this->load->model('addMaterial/addmaterial_model');	
			$response = $this->addmaterial_model->addThesis($title, $author, $subject, $status, $type, $accountnumber, $callnumber, $publicationdate, $numberofcopies, $thesisadviser);
			
			if($response == 0)
			{
				$this->isSuccessful = 0;
				$data['isSuccessful'] = $this->isSuccessful;
				$this->load->view('addedPage/added_page', $data);
			}
			else
			{
				$this->isSuccessful = 1;
				$data['isSuccessful'] = $this->isSuccessful;
				$this->load->view('addedPage/added_page', $data);
			}
		}
		
		public function addTheJournal()
		{
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
			$description = $this->input->post('journal_description');
			
			$this->load->model('addMaterial/addmaterial_model');	
			$response = $this->addmaterial_model->addJournal($title, $author, $subject, $status, $type, $accountnumber, $callnumber, $publicationdate, $numberofcopies, $volume, $description);
			
			if($response == 0)
			{
				$this->isSuccessful = 0;
				$data['isSuccessful'] = $this->isSuccessful;
				$this->load->view('addedPage/added_page', $data);
			}
			else
			{
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