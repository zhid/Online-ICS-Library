<! DOCTYPE html>
<html>	
	<head>
		<title>
			ONLINE ICS LIBRARY
		</title>
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
					window.location = '<?php $this->load->helper('url'); echo base_url();?>';
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
			/*tabs*/
			$(document).ready(function(){
				$('ul.tabs').each(function(){
					var $active, $content, $links = $(this).find('a');
					$active = $($links.filter('[href="'+location.hash+'"]')[0] || $links[0]);
					$active.addClass('active');
					$content = $($active.attr('href'));
					$links.not($active).each(function () {
						$($(this).attr('href')).hide();
					});
					$(this).on('click', 'a', function(e){
						$active.removeClass('active');
						$content.hide();
						$active = $(this);
						$content = $($(this).attr('href'));
						$active.addClass('active');
						$content.show();
						e.preventDefault();
					});
				});
			});
			/*submit*/
			$(function() {
				$('#basic_search_form').submit(function() {
					var action = $("#basic_search_form").attr('action');
					$.ajax({
						type: "POST",
						url: action,
						data: $("#basic_search_form").serialize(),
						success: function(response)
						{
							$("#materials_searched").html(response);
						}
					});
					return false;
				});
			});
			
			$(function() {
				$('#advanced_search_form').submit(function() {
					var action = $("#advanced_search_form").attr('action');
					$.ajax({
						type: "POST",
						url: action,
						data: $("#advanced_search_form").serialize(),
						success: function(response)
						{
							$("#materials_searched").html(response);
						}
					});
					return false;
				});
			});
		</script>
	</head>
	
	<body>
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
				<li id="gallery_page"><a href=""><span>Gallery Page</span></a></li>
				<li id="catalouge"><a href="<?php $this->load->helper('url'); echo base_url();?>index.php/myLibrary/mylibrary"><span>My Library</span></a></li>
				<li id="about"><a href=""><span>About the Library</span></a></li>
				<li id="help"><a href=""><span>Help</span></a></li>
			</ul>
		</div>
		
		<div id="mylibrary_box">
			<div id="mylibrary_control">
				<div class="img_link_container">
					<div class="img">
						<img src="<?php $this->load->helper('url'); echo base_url();?>images/accountuser.png" width=30 height=30 />
					</div>
					
					<div class="link">
						<a href="">My Profile</a>
					</div>
				</div>
				
				<div class="img_link_container">
					<div class="img">
						<img src="<?php $this->load->helper('url'); echo base_url();?>images/search-icon.png" width=30 height=30 />
					</div>
					
					<div class="link">
						<a href="<?php $this->load->helper('url'); echo base_url();?>index.php/searchPage/searchpage"><span>Search</span></a>
					</div>
				</div>
			
				<div class="img_link_container">
					<div class="img">
						<img src="<?php $this->load->helper('url'); echo base_url();?>images/librarycard.ico" width=30 height=30 />
					</div>
					
					<div class="link">
						<a href="">Library Card</a>
					</div>
				</div>
				
				<div class="img_link_container">
					<div class="img">
						<img src="<?php $this->load->helper('url'); echo base_url();?>images/cart-icon.png" width=30 height=30 />
					</div>
					
					<div class="link">
						<a href="<?php $this->load->helper('url'); echo base_url();?>index.php/bookcartPage/bookcart">Book Cart</a>
					</div>
				</div>
				
				<div class="img_link_container">
					<div class="img">
						<img src="<?php $this->load->helper('url'); echo base_url();?>images/notification.png" width=30 height=30 />
					</div>
					
					<div class="link">
						<a href="">Notifications</a>
					</div>
				</div>
			</div>
			<!--START!-->
			<div id="mylibrary_content">
				<ul class="tabs">
					<li><a href="#tab1" class="active"><b class="tabname">Basic Search</b></a></li>
					<li><a href="#tab2" class=""><b class="tabname">Advanced Search</b></a></li>
				</ul>
			<div class="tab" id="tab1" style="display: block;">
				<form id ="basic_search_form" name ="basic_search_form" action="<?php $this->load->helper('url'); echo base_url();?>index.php/searchPage/searchpage/search" method="POST">
					Search the library's holdings for books, theses and journals.<br/><br/>
					<select name = "material_type" id = "material_type" style="height:25px; width:100px;">
						<option value="book">Book</option>
						<option value="thesis">Thesis</option>
						<option value="journal">Journal</option>
					</select>
					<select name = "material_field" id = "material_field" style="height:25px; width:100px;">
						<option value="title">Title</option>
						<option value="subject">Subject</option>
						<option value="author">Author</option>
					</select>
					<input type = "text" placeholder = "Search" name = "bsearch" id = "bsearch" style="height:25px; width:300px;" title="please type a keyword" required focus/>
					<input type="image" src="<?php $this->load->helper('url'); echo base_url();?>images/Search.png" alt="submit"/>
				</form>
			</div>
			
			<div class="tab" id="tab2" style="display: none;">
				<form id ="advanced_search_form" name ="advanced_search_form" action="<?php $this->load->helper('url'); echo base_url();?>index.php/searchPage/searchpage/advancedSearch" method="POST">
				<!-- Begin Box 1 -->
					<table bgcolor="#dedede" border="0" style="border-radius:5px;">
						<tr>
							<td width="100" align="center"><b class="title">Search Field</b></td>
							<td width="300" align="center"><b class="title">Search Expression</b></td>
						</tr>
						<tr>
							<td align="left">
								<select id="material_field1" name="material_field1">
									<option value="title" selected="">Title</option>
									<option value="author">Author</option>
									<option value="accountnumber">Account Number</option>
									<option value="callnumber">Call Number</option>
									<option value="isbn">ISBN</option>
									<option value="publisher">Publisher</option>
									<option value="subject">Subject</option>
								</select>
							</td>
							<td align="left"><input type="text" id="textbox1" name="textbox1" size="50" style="width: 370px;" title="please type a keyword" required focus>&nbsp;</td>
							<td align="left">
								<select name="operator1" id="operator1">
									<option selected="true" value="AND">AND</option>
									<option value="OR">OR</option>
								</select>
							</td>
						</tr>
						<tr><td align="left">
							<select id="material_field2" name="material_field2">
								<option value="author" selected="">Author</option>
								<option value="accountnumber">Account Number</option>
								<option value="callnumber">Call Number</option>
								<option value="isbn">ISBN</option>
								<option value="publisher">Publisher</option>
								<option value="subject">Subject</option>
								<option value="title">Title</option>
							</select></td>
								
							<td align="left"><input type="text" id="textbox2" name="textbox2" size="50" style="width: 370px" title="please type a keyword" required focus>&nbsp;</td>
							<td align="left">
									<select id="operator2" name="operator2">
										<option selected="true" value="AND">AND</option>
										<option value="OR">OR</option>
									</select></td>
									</tr>
						<tr><td align="left">
							<select id="material_field3" name="material_field3">
								<option value="author">Author</option>
								<option value="accountnumber">Account Number</option>
								<option value="callnumber">Call Number</option>
								<option value="isbn">ISBN</option>
								<option value="publisher" selected="">Publisher</option>
								<option value="subject">Subject</option>
								<option value="title">Title</option>
							</select></td>
										
							<td align="left"><input type="text" id="textbox3" name="textbox3" size="50" style="width: 370px" title="please type a keyword" required focus></td>
							<td align="left">&nbsp;</td>    
						</tr>
						<tr><td align="right"><b class="title">Type:</b>&nbsp;</td>
							<td align="left">
								<select name = "material_type" id = "material_type">
									<option value="book">Book</option>
									<option value="thesis">Thesis</option>
									<option value="journal">Journal</option>
								</select>
							</td>
						</tr>
					</table>				 
				<!-- End Box 1 -->
				<input type="submit" value="    Search    ">&nbsp;&nbsp;
				<input type="reset" value="    Reset    ">
				</form>
			</div>
			<div id="materials_searched">
			
			</div>
			</div>
		</div>
		<div id="footerNavigationBox">
			<div id="beforeFooter">
				<ul id="footerNavigation">
					<li id="fhome"><a href="<?php $this->load->helper('url'); echo base_url();?>"><span>Home</span></a></li>
					<li>|</li>
					<li id="fgallery_page"><a href=""><span>Gallery Page</span></a></li>
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