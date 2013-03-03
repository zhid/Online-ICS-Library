<!DOCTYPE html>
<html>
	<head>
		<title>ONLINE ICS LIBRARY</title>

		<meta charset = "utf-8" />
		<link rel="shortcut icon" href="<?php $this->load->helper('url'); echo base_url();?>images/favicon.ico" >
		<link rel="stylesheet" type="text/css" href="<?php $this->load->helper('url'); echo base_url();?>stylesheet/success_page.css"/>
	</head>
	
	<body>
		<div id = "container">
			<div id = "message">
				<form action = "<?php $this->load->helper('url'); echo base_url();?>index.php/addMaterial/addmaterial/addlink/book" method = "POST">
					<h1>Material Unsuccessfully Added</h1>
					<p>To continue adding materials click the button below</p>
					<input type = "submit" value = "Add materials" />
				</form>
			</div>
			
			<div id="success_image">
				<img src="<?php $this->load->helper('url'); echo base_url();?>images/success.png" width=300 height=300 alt="success"/>
			</div>
		</div>
	</body>
</html>