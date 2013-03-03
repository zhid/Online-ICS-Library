<!DOCTYPE html>
<html>
	<head>
		<title>ONLINE ICS LIBRARY</title>

		<meta charset = "utf-8" />
		<link rel="shortcut icon" href="<?php $this->load->helper('url'); echo base_url();?>images/favicon.ico" >
		<link rel="stylesheet" type="text/css" href="<?php $this->load->helper('url'); echo base_url();?>stylesheet/register_page.css"/>
		
		<script src="<?php $this->load->helper('url'); echo base_url();?>javascript/jquery-1.9.0.js"></script>
		<script src="<?php $this->load->helper('url'); echo base_url();?>javascript/jquery-1.9.0.min.js"></script>
		<script src="<?php $this->load->helper('url'); echo base_url();?>javascript/slides.min.jquery.js"></script>
		
		<script>
			$(function() {
				$('#signup_button').click(
					function() {
						var proceed = 1;
					
						var usernameRegEx = /^[a-zA-Z]{1,10}$/;
						var username = $('#username').val();
						
						var passwordRegEx = /^[a-zA-Z0-9]{6,10}$/;
						var password = $('#password').val();
						
						var studNumRegEx = /^[1-2][0-9][0-9][0-9][\-][0-9][0-9][0-9][0-9][0-9]$/;
						var student_number = $('#student_number').val();
						
						var empNumRegEx = /^[0-9]{9,9}$/;
						var employee_number =$('#employee_number').val();
						
						var nameRegEx = /^[a-zA-Z ]{1,30}$/;
						var first_name = $('#first_name').val();
						var middle_name = $('#middle_name').val();
						var last_name = $('#last_name').val();
						var email_address = $('#email_address').val();
						var emailRegEx = /^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,4})$/
						var address = $('#address').val();
						
						$('.comment').remove();
						$('#registration_comment').html("");
						$("#registration_comment").css('background', 'none');
						
						if(!usernameRegEx.test(username))
						{
							$('#username_td').html('<span class=comment>Please put a valid user name!</span>');
							proceed = 0;
						}
						if(password == "")
						{
							$('#password_td').html('<span class=comment>A valid Password is required!</span>');
							proceed = 0;
						}
						if(!studNumRegEx.test(student_number) && student_number != undefined)
						{
							$('#student_number_td').html('<span class=comment>Please put a valid student number!</span>');
							proceed = 0;
						}
						else if(!empNumRegEx.test(employee_number) && employee_number != undefined)
						{
							$('#employee_number_td').html('<span class=comment>Please put a valid employee number!</span>');
							proceed = 0;
						}
						if(!nameRegEx.test(first_name))
						{
							$('#first_name_td').html('<span class=comment>Please put a valid first name!</span>');
							proceed = 0;
						}
						if(!nameRegEx.test(middle_name))
						{
							$('#middle_name_td').html('<span class=comment>Please put a valid middle name!</span>');
							proceed = 0;
						}
						if(!nameRegEx.test(last_name))
						{
							$('#last_name_td').html('<span class=comment>Please put a valid last name!</span>');
							proceed = 0;
						}
						if(!emailRegEx.test(email_address))
						{
							$('#email_address_td').html('<span class=comment>Please put a valid email!</span>');
							proceed = 0;
						}
						if(address == "")
						{
							$('#address_td').html('<span class=comment>Address is required!</span>');
							proceed = 0;
						}
						
						if(proceed == 1)
						{
							var action = $("#registration_form").attr('action');
							var form_data = {
								username: $("#username").val(),
								password: $("#password").val(),
								student_number: $("#student_number").val(),
								employee_number: $("#employee_number").val(),
								first_name: $("#first_name").val(),
								middle_name: $("#middle_name").val(),
								last_name: $("#last_name").val(),
								email_address: $("#email_address").val(),
								address: $("#address").val(),
								is_ajax: 1
							};
				
							$.ajax({
								type: "POST",
								url: action,
								data: form_data,
								success: function(response)
								{
									if(response != 'failed')
									{
										window.location = '<?php $this->load->helper('url'); echo base_url();?>index.php/successPage/success';
									}
									else if(response == 'failed')
									{
										$('#registration_comment').html('REGISTRATION FAILED');
										$("#registration_comment").css({"background-color":"red"});
									}
								}	
							});
							return false;
						}
					}
				);
			});
		
			$(function() {
				$('#usertype').change(
					function() {
						var user_type = $(this).val();
					
						var form_data = {
							user_type: $(this).val(),
							is_ajax: 1
						};
						
						$.ajax({
							type: "POST",
							url: '<?php $this->load->helper('url'); echo base_url();?>index.php/registerPage/register/loadUserNumber',
							data: form_data,
							success: function(response)
							{
								$("#for_user_num").html(response);
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
				<li id="gallery_page"><a href="<?php $this->load->helper('url'); echo base_url();?>index.php/galleryPage/gallery"><span>Gallery Page</span></a></li>
				<li id="catalouge"><a href=""><span>Catalogue</span></a></li>
				<li id="about"><a href=""><span>About the Library</span></a></li>
				<li id="help"><a href=""><span>Help</span></a></li>
			</ul>
		</div>
		<div id= "container">
			<div id="container_header">
				<h2>CREATE YOUR LIBRARY ACCOUNT</h2>
			</div>
			
			<div id="registration_comment">
				
			</div>
			
			<div id="form_container">
				<form id = "registration_form" name = "registration_form" action = "<?php $this->load->helper('url'); echo base_url();?>index.php/registerPage/register/registerUser" method = "POST" >
					<table>
						<tr>
							<td><img src="<?php $this->load->helper('url'); echo base_url();?>images/user.png" width=50  height=50/></td>
							<td width=200><h4>ACCOUNT DETAILS</h4></td>
						</tr>
					
						<tr>
							<td></td>
							<td><label for="username">Username</label></td>
							<td><input type="text" id="username" name="username" maxlength="10" placeholder="Username"/></td>
							<td id="username_td"></td>
						</tr>
					
						<tr>
							<td></td>
							<td><label for="password">Password</label></td>
							<td><input type="password" id="password" name="password" maxlength="6" placeholder="Password"/></td>
							<td id="password_td" width=200></td>
						</tr>
						
						<tr>
							<td><img src="<?php $this->load->helper('url'); echo base_url();?>images/detail.png" width=50  height=50/></td>
							<td><h4>USER DETAILS</h4></td>
							<td><select id="usertype" name="usertype">
									<option value="student">I am a Student</option>
									<option value="faculty">I am a Faculty Member</option>
								</select>
							</td>
						</tr>	
						
						<tr id="for_user_num">
							<td></td>
							<td><label for="student_number">Student Number</label></td>
							<td><input type="text" id="student_number" name="student_number" maxlength=10 placeholder="2013-12345"/></td>
							<td id="student_number_td"> </td>
						</tr>
						
						<tr>
							<td></td>
							<td><label for="first_name">First Name</label></td>
							<td><input type="text" id="first_name" name="first_name"  placeholder="Given"/></td>
							<td id="first_name_td"></td>
						</tr>
						
						<tr>
							<td></td>
							<td><label for="middle_name">Middle Name</label></td>
							<td><input type="text" id="middle_name" name="middle_name"  placeholder="Middle"/></td>
							<td id="middle_name_td"></td>
						</tr>
						
						<tr>
							<td></td>
							<td><label for="last_name">Last Name</label></td>
							<td><input type="text" id="last_name" name="last_name"  placeholder="Last"/></td>
							<td id="last_name_td"> </td>
						</tr>
							
						<tr>
							<td></td>
							<td><label for="email_address">Email Address</label></td>
							<td><input type="text" id="email_address" name="email_address" placeholder="user@email.com"/></td>
							<td id="email_address_td"></td>
						</tr>
					
						<tr>
							<td></td>
							<td><label for="address">Address</label></td>
							<td><input type="text" id="address" name="address"/></td>
							<td id="address_td"></td>
						</tr>
					<br/>
					</table>
				</form>
				<input type="submit" id="signup_button" name="signup_button" value="Sign me up!"/>
			</div>
			
			<div id="rightOfForm">
				<img height=350 width=180 src="<?php $this->load->helper('url'); echo base_url();?>images/books-pile.png" />
			</div>
		</div>
		
		<div id="footer">
				<span>ONLINE ICS LIBRARY 2013</span>
			</div>
	</body>
</html>