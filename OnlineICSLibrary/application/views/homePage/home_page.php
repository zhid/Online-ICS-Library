<! DOCTYPE html>
<html>	
	<head>
		<title>
			ONLINE ICS LIBRARY
		</title>
		<link rel="stylesheet" type="text/css" href="<?php $this->load->helper('url'); echo base_url();?>stylesheet/home_page.css"/>
		
		<script type="text/javascript" src="<?php $this->load->helper('url'); echo base_url();?>/jquery-1.9.0.js"></script>
		<script type="text/javascript" src="<?php $this->load->helper('url'); echo base_url();?>javascript/jquery-1.9.0.min.js"></script>
		<script src="<?php $this->load->helper('url'); echo base_url();?>javascript/slides.min.jquery.js"></script>
		
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
							$("#account_box").html(response);
						}
					}
				});
				return false;
			});
			
			$(function() {
				$('#loginsubmit').click(function() {
					var action = $("#loginform").attr('action');
					var form_data = {
						username: $("#username").val(),
						password: $("#password").val(),
						usertype: $("#usertype").val(),
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
			
		
			$(function(){
				$('#images').slides({
					preload: true,
					preloadImage: '<?php $this->load->helper('url'); echo base_url();?>images/loading.png',
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
						<a href=""><img src="<?php $this->load->helper('url'); echo base_url();?>images/picture1.jpg" width="900" height="270" alt="Picture1">
						<a href=""><img src="<?php $this->load->helper('url'); echo base_url();?>images/picture2.jpg" width="900" height="270" alt="Picture2"></a>
						<a href=""><img src="<?php $this->load->helper('url'); echo base_url();?>images/picture3.jpg" width="900" height="270" alt="Picture3"></a>
						<a href=""><img src="<?php $this->load->helper('url'); echo base_url();?>images/picture4.jpg" width="900" height="270" alt="Picture4"></a>
						<a href=""><img src="<?php $this->load->helper('url'); echo base_url();?>images/picture5.jpg" width="900" height="270" alt="Picture5"></a>
						<a href=""><img src="<?php $this->load->helper('url'); echo base_url();?>images/picture6.jpg" width="900" height="270" alt="Picture6"></a>
						<a href=""><img src="<?php $this->load->helper('url'); echo base_url();?>images/picture7.jpg" width="900" height="270" alt="Picture7"></a>
					</div>
					<a href="#" class="prev"><img src="<?php $this->load->helper('url'); echo base_url();?>images/arrowprev.png" width="24" height="43" alt="Arrow Prev"></a>
					<a href="#" class="next"><img src="<?php $this->load->helper('url'); echo base_url();?>images/arrownext.png" width="24" height="43" alt="Arrow Next"></a>
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
					<img src="<?php $this->load->helper('url'); echo base_url();?>images/account_pic.png" width="30" height="30" alt="account picture"/>
				</div>
				
				<div id="catalog_header">
					MY LIBRARY ACCOUNT
				</div>
				
				<div id="login_comment">
					
				</div>
				
				<div id="account_box">
					<div id="accountbox_form">
						<form id="loginform" name="loginform" action="<?php $this->load->helper('url'); echo base_url();?>index.php/homePage/home/validateLogin" method="POST">
							<div id="form_input">
								<input type="text" id="username" name="username" placeholder="username" maxlength="10"/>
								<input type="password" id="password" name="password" placeholder="password" maxlength="6"/>
								<select id="usertype" name="usertype">
									<option value="student">I am a Student</option>
									<option value="faculty">I am a Faculty Member</option>
									<option value="librarian">I am the Librarian</option>
								</select>
							</div>
							
							<div id="submit_button">
								<input type="submit" id="loginsubmit" value="Login"/>
							</div>
						</form>
					</div>
					
					<div id="not_member">
						<span>Not a member? </span><a href="<?php $this->load->helper('url'); echo base_url();?>index.php/registerPage/register">Register</a>
					</div>
				</div>
			</div>
		
			<div id="news">
				<div id="news_title">
					NEWS
				</div>
				
				<div id="news_content">
					Your bones don't break, mine do. That's clear. Your cells react to bacteria and viruses differently than mine. 
					You don't get sick, I do. That's also clear. But for some reason, you and I react the exact same way to water. 
					We swallow it too fast, we choke. We get some in our lungs, we drown. However unreal it may seem, we are connected,
					you and I. We're on the same curve, just on opposite ends.
				</div>
			</div>
			
			<div id="notice">
				<div id="notice_title">
					NOTICE
				</div>
				
				<div id="notice_content">
					The path of the righteous man is beset on all sides by the iniquities of the selfish and the tyranny of evil men. 
					Blessed is he who, in the name of charity and good will, shepherds the weak through the valley of darkness, for he 
					is truly his brother's keeper and the finder of lost children. And I will strike down upon thee with great vengeance 
					and furious anger those who would attempt to poison and destroy My brothers.
				</div>
			</div>
		</div>
		
		<div id="SecondContainer">
			<div id="calendar">
				<div id="calendar_title">
					CALENDAR
				</div>
				
				<div id="calendar_content">
					The inanimate victim was borne along by the vigorous arms which supported her, and which she did not seem in the least to burden. Mr. Fogg and Sir Francis stood erect, the Parsee bowed his head, and Passepartout was, no doubt, scarcely less stupefied.
					The resuscitated rajah approached Sir Francis and Mr. Fogg, and, in an abrupt tone, said, "Let us be off!"
					It was Passepartout himself, who had slipped upon the pyre in the midst of the smoke and, profiting by the still overhanging darkness, had delivered the young woman from death! It was Passepartout who, playing his part with a happy audacity, had passed through the crowd amid the general terror.
					A moment after all four of the party had disappeared in the woods, and the elephant was bearing them away at a rapid pace.
				</div>
			</div>
			
			<div id="latest">
				<div id="latest_title">
					MOST RECENT BOOKS
				</div>
				
				<div id="latest_content">
					"2012," he shrilled, and then fell to cackling grotesquely. "That was the year Morgan the Fifth was appointed President of the United States by the Board of Magnates. It must have been one of the last coins minted, for the Scarlet Death came in 2013. Lord! Lord!óthink of it! Sixty years ago, and I am the only person alive to-day that lived in those times. Where did you find it, Edwin?"
					The boy, who had been regarding him with the tolerant curiousness one accords to the prattlings of the feeble-minded, answered promptly.
					"I got it off of Hoo-Hoo. He found it when we was herdin' goats down near San Jos√© last spring. Hoo-Hoo said it was money. Ain't you hungry, Granser?"

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