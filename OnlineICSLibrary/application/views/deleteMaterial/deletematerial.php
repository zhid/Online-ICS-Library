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
					$('#search_submit').click(
						function() {
							var action = $("#delete_form").attr('action');
							var form_data = {
								delete_keyword: $("#delete_keyword").val(),
								material_type: $("#material_type").val(),
								material_field: $("#material_field").val(),
								is_ajax: 1
							};
							
							$.ajax({
								type: "POST",
								url: action,
								data: form_data,
								success: function(response)
								{
									$("#materials_to_delete").html(response);
								}
							});
							return false;
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
				<h2>DELETE MATERIAL</h2>
			</div>
			
			<div id="deleteform_container">				
				<form id ="delete_form" name ="delete_form" action="<?php $this->load->helper('url'); echo base_url();?>index.php/deleteMaterial/deletematerial/showMaterials" method="POST">
					<label>search: </label>
					<input type = "text" placeholder = "type a keyword here" name = "delete_keyword" id = "delete_keyword"/>
					
					<select name = "material_type" id = "material_type">
						<option value="book">Book</option>
						<option value="thesis">Thesis</option>
						<option value="journal">Journal</option>
					</select>
					
					<select name = "material_field" id = "material_field">
						<option selected="select" value="Author">Author</option>
						<option value="Title">Title</option>
						<option value="Subject">Subject</option>
					</select>
					
					<input type = "submit" id = "search_submit" name = "search_submit" value = "search" />
				</form>
				
			</div>
			
			<div id="materials_to_delete">
			
			</div>
		</div>
		<div id="footer">
				<span>ONLINE ICS LIBRARY 2013</span>
		</div>
	</body>
</html>