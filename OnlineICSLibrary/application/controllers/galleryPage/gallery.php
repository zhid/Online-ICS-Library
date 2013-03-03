<?php
	class Gallery extends CI_Controller
	{
		function __construct()
		{		
			parent::__construct();
		}
		
		public function index()
		{
			$this->load->view('galleryPage/gallery_page');
		}
		
		public function loadMaterials()
		{
			$this->load->helper('url');
			$this->load->library('pagination');
			$this->load->database();
			$section = $this->input->post('section');
			
			$start = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
			$limit = 3;
			
			//$this->db->limit($limit, $start);
			//$query = $this->db->get($section);

			//$sql = "SELECT * FROM ".$section." LIMIT ".$start.", 6";
			$sql = "SELECT * FROM ".$section;
			$query = $this->db->query($sql);
			$row = $query->row_array(); 
			
			$config['base_url'] = ''.base_url().'index.php/galleryPage/gallery/loadMaterials';
			$config['total_rows'] = $query->num_rows();
			$config['per_page'] = 3;
			$this->pagination->initialize($config); 
			
			for($i=0; $i<$query->num_rows(); $i++)
			{
				if($i == 0)
				{
					$row = $query->row();
					$title = str_replace(' ', '_', $row->Title);
					echo '<div class="material_container">
							<div class="material_image">
								<img src="'.base_url().''.$section.'images/'.$title.'.jpg" width="100" height="180" />
							</div>
							
							<div class="material_info">
								<table border="1">
									<tr>
										<td>Title</td>
									</tr>
									<tr>
										<td>'.($row->Title).'</td>
									</tr>
									<tr>
										<td>Author</td>
									</tr>
									<tr>
										<td>'.($row->Author).'</td>
									</tr>
									<tr>
										<td>Subject</td>
									</tr>
									<tr>
										<td>'.($row->Subject).'</td>
									</tr>
								</table>	
							</div>
						</div>';
				}
				else
				{
					$title = str_replace(' ', '_', $row->Title);
					echo '<div class="material_container">
							<div class="material_image">
								<img src="'.base_url().''.$section.'images/'.$title.'.jpg" width="100" height="180" />
							</div>
							
							<div class="material_info">
								<table border="1">
									<tr>
										<td>Title</td>
									</tr>
									<tr>
										<td>'.($row->Title).'</td>
									</tr>
									<tr>
										<td>Author</td>
									</tr>
									<tr>
										<td>'.($row->Author).'</td>
									</tr>
									<tr>
										<td>Subject</td>
									</tr>
									<tr>
										<td>'.($row->Subject).'</td>
									</tr>
								</table>	
							</div>
						</div>';
				}
				$row = $query->next_row();
			}
			//echo $this->pagination->create_links();
		}
	}
?>