<!DOCTYPE html>
<html>
	<head>
		<title>ONLINE ICS LIBRARY</title>

		<meta charset = "utf-8" />
		<link rel="shortcut icon" href="<?php $this->load->helper('url'); echo base_url();?>images/favicon.ico" >
		<link rel="stylesheet" type="text/css" href="<?php $this->load->helper('url'); echo base_url();?>stylesheet/success_page.css"/>
		
		<script src="<?php $this->load->helper('url'); echo base_url();?>javascript/jquery-1.9.0.js"></script>
		<script src="<?php $this->load->helper('url'); echo base_url();?>javascript/jquery-1.9.0.min.js"></script>
		<script src="<?php $this->load->helper('url'); echo base_url();?>javascript/slides.min.jquery.js"></script>
		
		<script>
		</script>
	</head>
	
	<body>
		<div id = "container">
			<div id = "message">
				<form action = "<?php $this->load->helper('url'); echo base_url();?>" method = "POST">
					<h1>Edit Material Successful</h1>
					<p></p>
					<input type = "submit" value = "Back to Home" />
				</form>
			</div>
			
			<div id="success_image">
				<img src="<?php $this->load->helper('url'); echo base_url();?>images/success.png" width=300 height=300 alt="success"/>
			</div>
		</div>
	</body>
</html>