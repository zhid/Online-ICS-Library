<! DOCTYPE html>
<html>	
	<head>
		<title>
			ONLINE ICS LIBRARY
		</title>
		<link rel="shortcut icon" href="<?php $this->load->helper('url'); echo base_url();?>images/favicon.ico" >
		<link rel="stylesheet" type="text/css" href="<?php $this->load->helper('url'); echo base_url();?>stylesheet/home_page.css"/>
		<link rel="stylesheet" type="text/css" href="<?php $this->load->helper('url'); echo base_url();?>stylesheet/mylib.css"/>
		
		<script type="text/javascript" src="<?php $this->load->helper('url'); echo base_url();?>javascript/jquery-1.9.0.js"></script>
		<script type="text/javascript" src="<?php $this->load->helper('url'); echo base_url();?>javascript/jquery-1.9.0.min.js"></script>
		<script type="text/javascript" src="<?php $this->load->helper('url'); echo base_url();?>javascript/slides.min.jquery.js"></script>
		
		<script>
			$(document).ready(function() {
				var form_data = {
					is_ajax: 1
				};
				
				$.ajax({
					type: "POST",
					url: '<?php $this->load->helper('url'); echo base_url();?>index.php/homePage/home/displayAccountBox',
					data: form_data,
					success: function(response)
					{
						if(response != 'not logged in')
						{
							$("#left_header").html("<a href='<?php $this->load->helper('url'); echo base_url();?>index.php/homePage/home/logout'><img src='<?php $this->load->helper('url'); echo base_url();?>images/logout.png' width=80  height=50/></a>");
						}
					}
				});
				return false;
			});
			
			$(function() {
				$('#not_member span').click(function () {
					$('#overlay').fadeIn('fast');
					$('#form_externalcontainer').fadeIn('fast');
					$('#catalog').fadeOut('fast');
				});
			});
			
			$(function() {
				$('#signup').click(function () {
					$('#overlay').fadeIn('fast');
					$('#form_externalcontainer').fadeIn('fast');
					$('#catalog').fadeOut('fast');
				});
			});
			
			$(function() {
				$('#login').click(function () {
					$('#overlay').fadeIn('fast');
					$('#catalog').fadeIn('fast');
					$('#form_externalcontainer').fadeOut('fast');
				});
			});
			
			$(function() {
				$('#cancel1 img').click(function () {
					$('#overlay').fadeOut('fast');
					$('#catalog').fadeOut('fast');
				});
			});
			
			$(function() {
				$('#cancel2 img').click(function () {
					$('#overlay').fadeOut('fast');
					$('#form_externalcontainer').fadeOut('fast');
				});
			});
			
			$(function() {
				$('#success_button').click(function () {
					$('#overlay').fadeOut('fast');
					$('#success_box').fadeOut('fast');
					
					var action = $("#delete_form").attr('action');
					
					$.ajax({
						type: "POST",
						url: action,
						data: $("#delete_form").serialize(),
						success: function(response)
						{
							$("#user_list").html(response);
							$('#mylibrary_box').height($('#user_list').height()+70);
							$("#deletematerial_button").on("click", deletematerial);
						}
					});
					return false;
				});
			});
			
			$(function() {
				$('#registration_form').submit(function() {
					var action = $("#registration_form").attr('action');
					
					$.ajax({
						type: "POST",
						url: action,
						data: $("#registration_form").serialize(),
						success: function(response)
						{
							if(response == 'success')
							{
								$('#form_externalcontainer').fadeOut('fast', function() {
									$('#overlay').fadeIn('fast');
									$('#success_box').fadeIn('fast');
								});
							}
							else if(response == 'failed')
							{
								$('#registration_comment').html('REGISTRATION FAILED! PLEASE TRY CHANGING THE USERNAME.');
								$("#registration_comment").css({"background-color":"red"});
							}
						}	
					});
					return false;
				});
			});
			
			$(function() {
				$('#loginsubmit').click(function() {
					var action = $("#loginform").attr('action');
					var form_data = {
						username: $("#loginform #username").val(),
						password: $("#loginform #password").val(),
						usertype: $("#loginform #usertype").val(),
						is_ajax: 1
					};
					
					$.ajax({
						type: "POST",
						url: action,
						data: form_data,
						success: function(response)
						{
							if(response == 'fail')
							{
								$("#login_comment").html("LOG IN FAILED!");
								$("#login_comment").css({"background-color":"red"});
							}
							else
							{
								window.location = '<?php $this->load->helper('url'); echo base_url();?>';
							}
						}
					});
					return false;
				});
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
			
		
			$(function(){
				$('#images').slides({
					preload: true,
					preloadImage: '<?php $this->load->helper('url'); echo base_url();?>images/loading.png',
					play: 5000,
					pause: 2500,
					hoverPause: true
				});
			});
			
			function clicked()
			{
				var action = $(this).closest('form').attr('action');
				
				var form_data = {
					is_ajax: 1
				};
				
				$.ajax({
					type: "POST",
					url: action,
					data: form_data,
					success: function(response)
					{
						if(response == "accepted")
						{
							$("#success_message h1").html("USER ACCEPTED");
							$('#overlay').fadeIn('fast');
							$('#success_box').fadeIn('fast');
						}
						else
						{
							$("#success_message h1").html("USER REJECTED");
							$('#overlay').fadeIn('fast');
							$('#success_box').fadeIn('fast');
						}
					}
				});
				return false;
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
							$('#mylibrary_box').height($('#user_list').height()+70);
							$(".clicked_button").on("click", clicked);
						}
					});
					return false;
				});
			});
			
			function deletematerial()
			{
				var action = $(this).closest('form').attr('action');
				
				var form_data = {
					is_ajax: 1
				};
				
				$.ajax({
					type: "POST",
					url: action,
					data: form_data,
					success: function(response)
					{
						if(response == "deleted")
						{
							$('#overlay').fadeIn('fast');
							$('#success_box').fadeIn('fast');
						}
					}
				});
				return false;
			}
			
			$(function() {
				$('#delete_form').submit(function() {
					var action = $("#delete_form").attr('action');
					
					$.ajax({
						type: "POST",
						url: action,
						data: $("#delete_form").serialize(),
						success: function(response)
						{
							$("#user_list").html(response);
							$('#mylibrary_box').height($('#user_list').height()+70);
							$(".deletematerial_button").on("click", deletematerial);
						}
					});
					return false;
				});
			});
		</script>
	</head>
	
	<body>
		<div id="overlay" style="display:none;"></div>
	
		<div id="success_box" style="display:none;"> 
			<div id="success_message">
				<h1>MATERIAL SUCCESSFULLY DELETED</h1>
				<input type="button" id="success_button" value="okay!"/>
			</div>
			
			<div id="success_image">
				<img src="<?php $this->load->helper('url'); echo base_url();?>images/success-icon.png" width=300 height=300 alt="success"/>
			</div>
		</div>
	
		<div id="logo_header">
			<img src="<?php $this->load->helper('url'); echo base_url();?>images/icslogo.png" width="100" height="100" />
			<span id="header_title">ONLINE ICS LIBRARY</span>
			<div id="left_header">
				<img id="login" src='<?php $this->load->helper('url'); echo base_url();?>images/login-icon.png' width=60  height=60/>
				<img id="signup" src='<?php $this->load->helper('url'); echo base_url();?>images/sign-up-icon.png' width=60  height=60/>
			</div>
		</div>
		
		<div id="navigationBox">
			<ul id="navigation">
				<li id="home"><a href="<?php $this->load->helper('url'); echo base_url();?>"><span>Home</span></a></li>
				<li id="gallery_page"><a href="<?php $this->load->helper('url'); echo base_url();?>index.php/galleryPage/gallery"><span>Gallery Page</span></a></li>
				<li id="catalouge"><a href="<?php $this->load->helper('url'); echo base_url();?>index.php/myLibrary/mylibrary"><span>My Library</span></a></li>
				<li id="about"><a href=""><span>About the Library</span></a></li>
				<li id="help"><a href=""><span>Help</span></a></li>
			</ul>
		</div>
		
		<div id="mylibrary_box">
			<div id="mylibrary_control">
				<div class="img_link_container">
					<div class="img">
						<img src="<?php $this->load->helper('url'); echo base_url();?>images/user-group-icon.png" width=30 height=30 />
					</div>
					
					<div class="link">
						<a href="<?php $this->load->helper('url'); echo base_url();?>index.php/myLibrary/mylibrary">Manage Library Users</a>
					</div>
				</div>
				
				<div class="img_link_container">
					<div class="img">
						<img src="<?php $this->load->helper('url'); echo base_url();?>images/shelf-icon.png" width=30 height=30 />
					</div>
					
					<div class="link">
						<a href="">Manage Borrow Requests</a>
					</div>
				</div>
				
				<div class="img_link_container">
					<div class="img">
						<img src="<?php $this->load->helper('url'); echo base_url();?>images/add-icon.png" width=30 height=30 />
					</div>
					
					<div class="link">
						<a href="<?php $this->load->helper('url'); echo base_url();?>index.php/myLibrary/mylibrary/addbook_link">Add Material</a>
					</div>
				</div>
				
				<div class="img_link_container">
					<div class="img">
						<img src="<?php $this->load->helper('url'); echo base_url();?>images/edit-icon.png" width=30 height=30 />
					</div>
					
					<div class="link">
						<a href="<?php $this->load->helper('url'); echo base_url();?>index.php/editMaterial/editmaterial">Edit Material</a>
					</div>
				</div>
				
				<div class="img_link_container">
					<div class="img">
						<img src="<?php $this->load->helper('url'); echo base_url();?>images/delete-icon.png" width=30 height=30 />
					</div>
					
					<div class="link">
						<a href="<?php $this->load->helper('url'); echo base_url();?>index.php/myLibrary/mylibrary/deletematerial_link">Delete Material</a>
					</div>
				</div>
			</div>
			
			<div id="mylibrary_content">
				<div id="mylibrary_content_header">
					DELETE LIBRARY MATERIALS
				</div>
				
				<div id="manageuser_container">				
					<form id ="delete_form" name ="delete_form" action="<?php $this->load->helper('url'); echo base_url();?>index.php/deleteMaterial/deletematerial/showMaterials" method="POST">
					<label>search: </label>
					<input type = "text" placeholder = "type a keyword here" title = "must be alphanumeric only" pattern = "[a-zA-Z0-9]+" name = "delete_keyword" id = "delete_keyword" required focus/>
					
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
				
				<div id="user_list">
			
				</div>
			</div>
		</div>
		
		<div id="footerNavigationBox">
			<div id="beforeFooter">
				<ul id="footerNavigation">
					<li id="fhome"><a href="<?php $this->load->helper('url'); echo base_url();?>"><span>Home</span></a></li>
					<li>|</li>
					<li id="fgallery_page"><a href="<?php $this->load->helper('url'); echo base_url();?>index.php/galleryPage/gallery"><span>Gallery Page</span></a></li>
					<li>|</li>
					<li id="fcatalouge"><a href="<?php $this->load->helper('url'); echo base_url();?>index.php/myLibrary/mylibrary"><span>Catalogue</span></a></li>
					<li>|</li>
					<li id="fabout"><a href=""><span>About the Library</span></a></li>
					<li>|</li>
					<li id="fhelp"><a href=""><span>Help</span></a></li>
				</ul>
			</div>
			
			<div id="afterFooter">
				<span>ONLINE ICS LIBRARY 2013</span>
			</div>
		</div>
	</body>
</html>