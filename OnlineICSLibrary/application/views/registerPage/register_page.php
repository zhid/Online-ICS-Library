<!DOCTYPE html>
<html>
	<head>
		<title>ONLINE ICS LIBRARY</title>

		<meta charset = "utf-8" />
		
		<link rel="stylesheet" type="text/css" href="<?php $this->load->helper('url'); echo base_url();?>stylesheet/register_page.css"/>
		
		<script src="<?php $this->load->helper('url'); echo base_url();?>javascript/jquery-1.9.0.js"></script>
		<script src="<?php $this->load->helper('url'); echo base_url();?>javascript/jquery-1.9.0.min.js"></script>
		<script src="<?php $this->load->helper('url'); echo base_url();?>javascript/slides.min.jquery.js"></script>
		
		<script>
		
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
			<form id = "" action = "" method = "POST" name = "">
				<h1>REGISTER</h1>
				<h2>Account Details</h2>
				<label for = "username">Username</label>
				<input type = "text" id = "username" name = "username" placeholder = "Username" required = "required"/>
				<br />
				<label for = "password">Password</label>
				<input type = "password" id = "password" name = "password" placeholder = "Password" />
				<br />
				<h2>User Details</h2>
				<label>Full Name</label>
				<input type = "text" id = "first_name" name = "first_name" placeholder = "Given" />
				<input type = "text" id = "middle_name" name = "middle_name" placeholder = "Middle" />
				<input type = "text" id = "last_name" name = "last_name" placeholder = "Last" /><br/>
				<label>Email Address</label><input type = "email" id= "email_address" name = "email_address" placeholder = "xxxx@xxxx"/><br/>
				<label>Address</label><input type= "text" id = "address" name = "address" />
				<br/>
				<input type = "submit" value="Submit"/>
			</form>
		</div>
	</body>
</html>