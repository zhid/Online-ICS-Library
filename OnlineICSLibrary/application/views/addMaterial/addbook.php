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
				<?php $this->load->helper('form'); echo form_open_multipart('addMaterial/addmaterial/addTheBook');?>
					<table>
						<tr>
							<td><label for = "userfile">Book Image</label></td>
							<td>
								<input type="file" name="userfile" id="userfile" size="20" />
							</td>
						</tr>
					
						<tr>
							<td><label for = "material_type">Material Type</label></td>
							<td>
								<select id = "material_type" name = "material_type">
									<option selected="select" value = "book">Book</option>
									<option value = "thesis">Thesis</option>
									<option value = "journal">Journal</option>
								</select>
							</td>
						</tr>
						
						<tr>
							<td><label for = "book_title">Title</label></td>
							<td><input type = "text" id = "book_title" name = "book_title" required = "required" /></td>
						</tr>
						<tr>
							<td><label for = "book_author">Author</label></td>
							<td><input type = "text" id = "book_author" name = "book_author" required = "required" /></td>
						</tr>
						<tr>
							<td><label for = "book_subject">Subject</label></td>
							<td><input type = "text" id = "book_subject" name = "book_subject" required = "required" /></td>
						</tr>
						<tr>
							<td><label for = "book_status">Status</label></td>
							<td>
								<select id = "book_status" name = "book_status">
									<option  value = "on-loan">On Loan</option>
									<option selected="select" value = "on-shelf">On Shelf</option>
								</select>
							</td>
						</tr>
						<tr>
							<td><label for = "book_type">Type</label></td>
							<td>
								<select id = "book_type" name = "book_type">
									<option value = "regular">Regular</option>
									<option value = "non-circulating">Non-Circulating</option>
								</select>
							</td>
						</tr>
						<tr>
							<td><label for = "book_account_number">Account Number</label></td>
							<td><input type = "text" id = "book_account_number" name = "book_account_number" required = "required" /></td>
						</tr>
						<tr>
							<td><label for = "book_call_number">Call Number</label></td>
							<td><input type ="text" id = "book_call_number" name = "book_call_number" required = "required" /></td>
						</tr>
						<tr>
							<td><label for = "book_publication_date">Publication Date</label></td>
							<td><input type = "date" id = "book_publication_date" name = "book_publication_date" required = "required" />
						</tr>
						<tr>
							<td><label for = "book_number_of_copies">Number of Copies</label></td>
							<td><input type = "number" id = "book_number_of_copies" name = "book_number_of_copies" required = "required" />
						</tr>
						<tr>
							<td><label for = "book_isbn">ISBN</label></td>
							<td><input type = "text" id = "book_isbn" name = "book_isbn" required = "required" /> 
						</tr>
						<tr>
							<td><label for = "book_edition">Edition</label></td>
							<td><input type = "number" id = "book_edition" name = "book_edition" required = "required" /></td>
						</tr>
						<tr>
							<td><label for = "book_publisher">Publisher</label></td>
							<td><input type = "text" id = "book_publisher" name = "book_publisher" required = "required" /></td>
						</tr>
						<tr>
							<td><label for = "book_pages">Number of Pages</label></td>
							<td><input type = "number" id = "book_pages" name = "book_pages" required = "required" /></td>
						</tr>
						<tr>
							<td><label for = "book_description">Description</label></td>
							<td>
								<textarea rows="10" cols="50" placeholder="Describe yourself here..." id = "book_description" name = "book_description">
									
								</textarea>
							</td>
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