<!DOCTYPE html>
<html>
	<head>
		<title>ONLINE ICS LIBRARY</title>
		<meta charset = "utf-8" />
		<link rel="shortcut icon" href="<?php $this->load->helper('url'); echo base_url();?>images/favicon.ico" >
		<link rel = "stylesheet" type = "text/css" href = "<?php $this->load->helper('url'); echo base_url();?>stylesheet/addmaterial.css" />
		<script src="<?php $this->load->helper('url'); echo base_url();?>javascript/jquery-1.9.0.js"></script>
		<script src="<?php $this->load->helper('url'); echo base_url();?>javascript/jquery-1.9.0.min.js"></script>
		<script src="<?php $this->load->helper('url'); echo base_url();?>javascript/slides.min.jquery.js"></script>
		<script>	
			function clicked()
			{
				alert('hello!');
			}
		
			$(function() {
				$('#manageuser_select').change(function() {
					var action = $("#manageuser_form").attr('action');
					var form_data = {
						usertype: $("#manageuser_select").val(),
						is_ajax: 1
					};
					
					$.ajax({
						type: "POST",
						url: action,
						data: form_data,
						success: function(response)
						{
							$("#user_list").html(response);
							$(".clicked_button").on("click", clicked);
						}
					});
					return false;
				});
			});
		</script>
	</head>
	
	<body>	
		<div id="navigationBox">
			<ul id="navigation">
				<li id="home"><a href="<?php $this->load->helper('url'); echo base_url();?>"><span>Home</span></a></li>
				<li id="gallery_page"><a href="<?php $this->load->helper('url'); echo base_url();?>index.php/galleryPage/gallery"><span>Gallery Page</span></a></li>
				<li id="catalouge"><a href=""><span>Catalogue</span></a></li>
				<li id="about"><a href=""><span>About the Library</span></a></li>
				<li id="help"><a href=""><span>Help</span></a></li>
			</ul>
		</div>
		<div id= "container">
			<div id="container_header">
				<h2>MANAGE USER</h2>
			</div>
			<div id="manageuser_container">				
				<form action="<?php $this->load->helper('url'); echo base_url();?>index.php/manageUser/manageuser/usermanage" method="POST" id="manageuser_form" name="manageuser_form" >
					<select id="manageuser_select" name="manageuser_select">
						<option value="---" select="selected">---</option>
						<option value="student">Student</option>
						<option value="faculty">Faculty</option>
					</select>
				</form>
			</div>
			
			<div id="user_list">
			
			</div>
		</div>
		<div id="footer">
				<span>ONLINE ICS LIBRARY 2013</span>
		</div>
	</body>
</html>