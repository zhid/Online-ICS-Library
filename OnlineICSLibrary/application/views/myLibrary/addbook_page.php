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
				$('#mylibrary_box').height($('#add_form').height()+70);
			
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
			
			$(function() {
				$('#material_type').change(
					function() {
						if($(this).val() == 'book')
						{
							window.location = '<?php $this->load->helper('url'); echo base_url();?>index.php/myLibrary/mylibrary/addbook_link';
						}
						else if($(this).val() == 'thesis')
						{
							window.location = '<?php $this->load->helper('url'); echo base_url();?>index.php/myLibrary/mylibrary/addthesis_link';
						}
						else if($(this).val() == 'journal')
						{
							window.location = '<?php $this->load->helper('url'); echo base_url();?>index.php/myLibrary/mylibrary/addjournal_link';
						}
					}
				);
			});
		</script>
	</head>
	
	<body>
		<div id="overlay" style="display:none;"></div>
	
		<div id="success_box" style="display:none;"> 
			<div id="success_message">
				<h1></h1>
				<input type="button" id="success_button" value="okay!"/>
			</div>
			
			<div id="success_image">
				
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
					ADD NEW LIBRARY MATERIALS
				</div>
				
				<div id="add_form">
					<?php $this->load->helper('form'); $attributes = array('id' => 'addmaterial_form', 'name' => 'addmaterial_form'); echo form_open_multipart('addMaterial/addmaterial/addTheBook', $attributes);?>
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
							<td><input type = "text" id = "book_title" name = "book_title" pattern = "[ a-zA-Z0-9:._ -]{5,70}" title = "must be alphanumeric in 5-70 characters" autofocus required/></td>
						</tr>
						<tr>
							<td><label for = "book_author">Author</label></td>
							<td><input type = "text" id = "book_author" name = "book_author" pattern = "[a-z A-Z .,-]{5,50}" title = "must be alphanumeric in 5-50 characters" autofocus required/></td>
						</tr>
						<tr>
							<td><label for = "book_subject">Subject</label></td>
							<td><input type = "text" id = "book_subject" name = "book_subject" pattern = "[a-z A-Z .-_]{5,50}" title = "must be alphanumeric in 5-50 characters" autofocus required/></td>
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
							<td><input type = "text" id = "book_account_number" name = "book_account_number" autofocus required /></td>
						</tr>
						<tr>
							<td><label for = "book_call_number">Call Number</label></td>
							<td><input type ="text" id = "book_call_number" name = "book_call_number" autofocus required /></td>
						</tr>
						<tr>
							<td><label for = "book_publication_date">Publication Date</label></td>
							<td><input type = "date" id = "book_publication_date" name = "book_publication_date" autofocus required />
						</tr>
						<tr>
							<td><label for = "book_number_of_copies">Number of Copies</label></td>
							<td><input type = "number" id = "book_number_of_copies" name = "book_number_of_copies" min="1" autofocus required />
						</tr>
						<tr>
							<td><label for = "book_isbn">ISBN</label></td>
							<td><input type = "text" id = "book_isbn" name = "book_isbn" autofocus required /> 
						</tr>
						<tr>
							<td><label for = "book_edition">Edition</label></td>
							<td><input type = "text" id = "book_edition" name = "book_edition" autofocus required /></td>
						</tr>
						<tr>
							<td><label for = "book_publisher">Publisher</label></td>
							<td><input type = "text" id = "book_publisher" name = "book_publisher" autofocus required /></td>
						</tr>
						<tr>
							<td><label for = "book_pages">Number of Pages</label></td>
							<td><input type = "number" id = "book_pages" name = "book_pages" min="1" autofocus required /></td>
						</tr>
						<tr>
							<td><label for = "book_description">Description</label></td>
							<td>
								<textarea rows="10" cols="50" placeholder="Insert description..." id = "book_description" name = "book_description" autofocus required>
									
								</textarea>
							</td>
						</tr>
					</table>
					<input type = "submit" value = "ADD MATERIAL" class = "addmaterial_button" name = "addmaterial_button" />
				<?php echo form_close(); ?>
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