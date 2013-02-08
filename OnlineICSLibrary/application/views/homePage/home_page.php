<! DOCTYPE html>
<html>	
	<head>
		<title>
			ONLINE ICS LIBRARY
		</title>
		<link rel="stylesheet" type="text/css" href="stylesheet/home_page.css"/>
		
		<script src="javascript/jquery-1.9.0.js"></script>
		<script src="javascript/jquery-1.9.0.min.js"></script>
		<script src="javascript/slides.min.jquery.js"></script>
		
		<script>
			/*$(document).ready(function() {
				$('#account_box').load(
					"<?php $this->load->helper('url'); echo base_url();?>/index.php/homePage/home/displayAccountBox",
					function(response) {
						$("#account_box").html(response);
					}
				);
			}); */
		
			$(function(){
				$('#images').slides({
					preload: true,
					preloadImage: 'images/loading.png',
					play: 5000,
					pause: 2500,
					hoverPause: true
				});
			});
        </script>
	</head>
	
	<body>
			<div id="container">
			<div id="slider_container">
				<div id="images">
					<div class="slides_container">
						<a href=""><img src="images/picture1.jpg" width="900" height="270" alt="Picture1">
						<a href=""><img src="images/picture2.jpg" width="900" height="270" alt="Picture2"></a>
						<a href=""><img src="images/picture3.jpg" width="900" height="270" alt="Picture3"></a>
						<a href=""><img src="images/picture4.jpg" width="900" height="270" alt="Picture4"></a>
						<a href=""><img src="images/picture5.jpg" width="900" height="270" alt="Picture5"></a>
						<a href=""><img src="images/picture6.jpg" width="900" height="270" alt="Picture6"></a>
						<a href=""><img src="images/picture7.jpg" width="900" height="270" alt="Picture7"></a>
					</div>
					<a href="#" class="prev"><img src="images/arrowprev.png" width="24" height="43" alt="Arrow Prev"></a>
					<a href="#" class="next"><img src="images/arrownext.png" width="24" height="43" alt="Arrow Next"></a>
				</div>
			</div>
		</div>
	
		<div id="navigationBox">
			<ul id="navigation">
				<li id="home"><a href="<?php $this->load->helper('url'); echo base_url();?>"><span>Home</span></a></li>
				<li id="gallery_page"><a href=""><span>Gallery Page</span></a></li>
				<li id="catalouge"><a href=""><span>Catalogue</span></a></li>
				<li id="about"><a href=""><span>About the Library</span></a></li>
				<li id="help"><a href=""><span>Help</span></a></li>
			</ul>
		</div>
		
		<div id="FirstContainer">
			<div id="catalog">
				<div id="account_picture">
					<img src="images/account_pic.png" width="30" height="30" alt="account picture"/>
				</div>
				
				<div id="catalog_header">
					MY LIBRARY ACCOUNT
				</div>
				
				<div id="login_comment">
					
				</div>
				
				<div id="account_box">
					<div id="accountbox_form">
						<form action="" method="POST">
							<input type="text" id="username" name="username" placeholder="username" maxlength="10"/>
							<input type="password" id="password" name="password" placeholder="password" maxlength="6"/>
							<select id="usertype" name="usertype">
								<option value="student">I am a Student</option>
								<option value="faculty">I am a Faculty Member</option>
								<option value="librarian">I am the Librarian</option>
							</select>
						</form>
					</div>
						
					<div id="submit_button">
						<input type="submit" id="loginsubmit" value="Login"/>
					</div>
					
					<span>Not a member? </span><a href="<?php $this->load->helper('url'); echo base_url();?>index.php/registerPage/register">Register</a>
				</div>
			</div>
		
			<div id="news">
			</div>
			
			<div id="notice">
			</div>
		</div>
		
		<div id="SecondContainer">
			<div id="calendar">
			</div>
			
			<div id="latest">
			</div>
		</div>
		
		<div id="footerNavigationBox">
			<div id="beforeFooter">
				<ul id="footerNavigation">
					<li id="fhome"><a href="<?php $this->load->helper('url'); echo base_url();?>"><span>Home</span></a></li>
					<li>|</li>
					<li id="fgallery_page"><a href=""><span>Gallery Page</span></a></li>
					<li>|</li>
					<li id="fcatalouge"><a href=""><span>Catalogue</span></a></li>
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
		</div>
	</body>
</html>