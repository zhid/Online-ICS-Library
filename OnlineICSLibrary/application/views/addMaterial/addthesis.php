<!DOCTYPE html>
<html>
	<head>
		<title>ONLINE ICS LIBRARY</title>
		<meta charset = "utf-8" />
		<link rel = "stylesheet" type = "text/css" href = "<?php $this->load->helper('url'); echo base_url();?>stylesheet/addmaterial.css" />
		<script src="<?php $this->load->helper('url'); echo base_url();?>javascript/jquery-1.9.0.js"></script>
		<script src="<?php $this->load->helper('url'); echo base_url();?>javascript/jquery-1.9.0.min.js"></script>
		<script src="<?php $this->load->helper('url'); echo base_url();?>javascript/slides.min.jquery.js"></script>
		<script>
			$(function() {
				$('#material_type').change(
					function() {
						if($(this).val() == 'book')
						{
							window.location = '<?php $this->load->helper('url'); echo base_url();?>index.php/addMaterial/addmaterial/addlink/book';
						}
						else if($(this).val() == 'thesis')
						{
							window.location = '<?php $this->load->helper('url'); echo base_url();?>index.php/addMaterial/addmaterial/addlink/thesis';
						}
						else if($(this).val() == 'journal')
						{
							window.location = '<?php $this->load->helper('url'); echo base_url();?>index.php/addMaterial/addmaterial/addlink/journal';
						}
					}
				);
			});
		</script>
	</head>
	
	<body>
		<div id="navigationBox">
			<ul id="navigation">
				<li id="home"><a href="<?php $this->load->helper('url'); echo base_url();?>"><span>Home</span></a></li>
				<li id="gallery_page"><a href=""><span>Gallery Page</span></a></li>
				<li id="catalouge"><a href=""><span>Catalogue</span></a></li>
				<li id="about"><a href=""><span>About the Library</span></a></li>
				<li id="help"><a href=""><span>Help</span></a></li>
			</ul>
		</div>
		<div id= "container">
			<div id="container_header">
				<h2>ADD NEW MATERIAL</h2>
			</div>
			<div id="form_container">				
				<?php $this->load->helper('form'); echo form_open_multipart('addMaterial/addmaterial/addTheThesis');?>
					<table>
						<tr>
							<td><label for = "userfile">Thesis Image</label></td>
							<td>
								<input type="file" name="userfile" id="userfile" size="20" />
							</td>
						</tr>
					
						<tr>
							<td><label for = "material_type">Material Type</label></td>
							<td>
								<select id = "material_type" name = "material_type">
									<option value = "book">Book</option>
									<option selected="select" value = "thesis">Thesis</option>
									<option value = "journal">Journal</option>
								</select>
							</td>
						</tr>
						
						<tr>
							<td><label for = "thesis_title">Title</label></td>
							<td><input type = "text" id = "thesis_title" name = "thesis_title" required = "required" /></td>
						</tr>
						<tr>
							<td><label for = "thesis_author">Author</label></td>
							<td><input type = "text" id = "thesis_author" name = "thesis_author" required = "required" /></td>
						</tr>
						<tr>
							<td><label for = "thesis_subject">Subject</label></td>
							<td><input type = "text" id = "thesis_subject" name = "thesis_subject" required = "required" /></td>
						</tr>
						<tr>
							<td><label for = "thesis_status">Status</label></td>
							<td>
								<select id = "thesis_status" name = "thesis_status">
									<option value = "on loan">On Loan</option>
									<option selected="select" value = "on shelf">On Shelf</option>
								</select>
							</td>
						</tr>
						<tr>
							<td><label for = "thesis_type">Type</label></td>
							<td>
								<select id = "thesis_type" name = "thesis_type">
									<option value = "regular">Regular</option>
									<option value = "non-circulating">Non-Circulating</option>
								</select>
							</td>
						</tr>
						<tr>
							<td><label for = "thesis_account_number">Account Number</label></td>
							<td><input type = "text" id = "theis_account_number" name = "thesis_account_number" required = "required" /></td>
						</tr>
						<tr>
							<td><label for = "thesis_call_number">Call Number</label></td>
							<td><input type ="text" id = "thesis_call_number" name = "thesis_call_number" required = "required" /></td>
						</tr>
						<tr>
							<td><label for = "thesis_publication_date">Publication Date</label></td>
							<td><input type = "date" id = "thesis_publication_date" name = "thesis_publication_date" required = "required" />
						</tr>
						<tr>
							<td><label for = "thesis_number_of_copies">Number of Copies</label></td>
							<td><input type = "number" id = "thesis_number_of_copies" name = "thesis_number_of_copies" required = "required" />
						</tr>
						<tr>
							<td><label for = "thesis_adviser">Thesis Adviser</label></td>
							<td><input type = "text" id = "thesis_adviser" name = "thesis_adviser" required = "required" /> 
						</tr>
					</table>
					<input type = "submit" value = "ADD MATERIAL" />
				<?php echo form_close(); ?>
			</div>
		</div>
		<div id="footer">
				<span>ONLINE ICS LIBRARY 2013</span>
		</div>
	</body>
</html>