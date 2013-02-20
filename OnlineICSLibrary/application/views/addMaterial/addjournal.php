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
				<?php $this->load->helper('form'); echo form_open_multipart('addMaterial/addmaterial/addTheJournal');?>
					<table>
						<tr>
							<td><label for = "userfile">Journal Image</label></td>
							<td>
								<input type="file" name="userfile" id="userfile" size="20" />
							</td>
						</tr>
					
						<tr>
							<td><label for = "material_type">Material Type</label></td>
							<td>
								<select id = "material_type" name = "material_type">
									<option value = "book">Book</option>
									<option value = "thesis">Thesis</option>
									<option selected="select" value = "journal">Journal</option>
								</select>
							</td>
						</tr>
						
						<tr>
							<td><label for = "journal_title">Title</label></td>
							<td><input type = "text" id = "journal_title" name = "journal_title" required = "required" /></td>
						</tr>
						<tr>
							<td><label for = "journal_author">Author</label></td>
							<td><input type = "text" id = "journal_author" name = "journal_author" required = "required" /></td>
						</tr>
						<tr>
							<td><label for = "journal_subject">Subject</label></td>
							<td><input type = "text" id = "journal_subject" name = "journal_subject" required = "required" /></td>
						</tr>
						<tr>
							<td><label for = "journal_status">Status</label></td>
							<td>
								<select id = "journal_status" name = "journal_status">
									<option value = "on loan">On Loan</option>
									<option selected="select" value = "on shelf">On Shelf</option>
								</select>
							</td>
						</tr>
						<tr>
							<td><label for = "journal_type">Type</label></td>
							<td>
								<select id = "journal_type" name = "journal_type">
									<option value = "regular">Regular</option>
									<option value = "non-circulating">Non-Circulating</option>
								</select>
							</td>
						</tr>
						<tr>
							<td><label for = "journal_account_number">Account Number</label></td>
							<td><input type = "text" id = "journal_account_number" name = "journal_account_number" required = "required" /></td>
						</tr>
						<tr>
							<td><label for = "journal_call_number">Call Number</label></td>
							<td><input type ="text" id = "journal_call_number" name = "journal_call_number" required = "required" /></td>
						</tr>
						<tr>
							<td><label for = "journal_publication_date">Publication Date</label></td>
							<td><input type = "date" id = "journal_publication_date" name = "journal_publication_date" required = "required" />
						</tr>
						<tr>
							<td><label for = "journal_number_of_copies">Number of Copies</label></td>
							<td><input type = "number" id = "journal_number_of_copies" name = "journal_number_of_copies" required = "required" />
						</tr>
						<tr>
							<td><label for = "journal_volume">Volume</label></td>
							<td><input type = "text" id = "journal_volume" name = "journal_volume" required = "required" /> 
						</tr>
						<tr>
							<td><label for = "journal_description">Description</label></td>
							<td>
								<textarea rows="10" cols="50" placeholder="Insert description..." id = "journal_description" name = "journal_description">
									
								</textarea></td>
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