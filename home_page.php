<html>	
	<head>
		<title>
			ONLINE ICS LIBRARY
		</title>
		
		<style type="text/css" media="screen">
		body
		{
			background-image: url('images/body_background.jpg');
		}
		
		#navigationBox
		{
			margin-left: auto;
			margin-right: auto;
			height: 60px;
			width: 1000px;
			background-color: yellow;
		}
		
		ul#navigation
		{
			margin-top: 0px;
			padding-left: 0px;
			margin-left: 20px;
		}
		
		ul#navigation li
		{
			background-color:green;
			margin-top: 10px;
			list-style: none;
			float: left;
			width: 160px;
			height: 40px;
		}
		
		ul#navigation li a
		{
			padding-top: 7px;
			display: block;
			text-decoration:none;
			text-align:center;
			font-size: 18px;
			color: white;
		}
		
		li#home
		{
			background-color:green;
			border-top-left-radius: 10px;
			border-bottom-left-radius: 10px;
		}
		
		li#contact
		{
			background-color:green;
			border-top-right-radius: 10px;
			border-bottom-right-radius: 10px;
		}
		
		#container 
		{
			background-color: blue;
			width:890px;
			height:300px;
			margin-top: 30px;
			margin-left: auto;
			margin-right: auto;
			position:relative;
			z-index:0;
		}

		#slide_container 
		{
			width:650px;
			height:350px;
			position:relative;
		}
		
		#frame 
		{
			position:absolute;
			z-index:0;
			width:940px;
			height:341px;
			top:-3px;
			left:-23px;
		}

		#images 
		{
			position:absolute;
			top:15px;
			left:84px;
			z-index:100;
		}

		.slides_container 
		{
			width:726px;
			overflow:hidden;
			position:relative;
			display:none;
		}

		.slides_container a 
		{
			width:730px;
			height:270px;
			display:block;
		}

		.slides_container a img 
		{
			display:block;
		}

		#images .next, #images .prev
		{
			position:absolute;
			top:107px;
			left:-43px;
			width:24px;
			height:43px;
			display:block;
			z-index:101;
		}

		#images .next 
		{
			left:744px;
		}

		.pagination 
		{
			margin:26px auto 0;
			width:100px;
		}

		.pagination li 
		{
			float:left;
			margin:0 1px;
			list-style:none;
		}

		.pagination li a 
		{
			display:block;
			width:12px;
			height:0;
			padding-top:12px;
			background-image:url(images/pagination.png);
			background-position:0 0;
			float:left;
			overflow:hidden;
		}

		.pagination li.current a 
		{
			background-position:0 -12px;
		}

		</style>
		
		<script src="javascript/jquery-1.9.0.js"></script>
		<script src="javascript/jquery-1.9.0.min.js"></script>
		<script src="javascript/slides.min.jquery.js"></script>
		
		<script>
			$(function(){
				$('#images').slides({
					preload: true,
					preloadImage: 'images/loading.gif',
					play: 5000,
					pause: 2500,
					hoverPause: true
				});
			});
        </script>
	</head>
	
	<body>
		<div id="navigationBox">
			<ul id="navigation">
				<li id="home"><a href=""><span>Home</span></a></li>
				<li id="gallery_page"><a href=""><span>Gallery Page</span></a></li>
				<li id="catalouge"><a href=""><span>Catalogue</span></a></li>
				<li id="about"><a href=""><span>About</span></a></li>
				<li id="help"><a href=""><span>Help</span></a></li>
				<li id="contact"><a href=""><span>Contact</span></a></li>
			</ul>
		</div>
	
		<div id="container">
			<div id="slider_container">
				<div id="images">
					<div class="slides_container">
						<a href=""><img src="images/picture1.jpg" width="730" height="270" alt="Picture1">
						<a href=""><img src="images/picture2.jpg" width="730" height="270" alt="Picture2"></a>
						<a href=""><img src="images/picture3.jpg" width="730" height="270" alt="Picture3"></a>
						<a href=""><img src="images/picture4.jpg" width="730" height="270" alt="Picture4"></a>
						<a href=""><img src="images/picture5.jpg" width="730" height="270" alt="Picture5"></a>
						<a href=""><img src="images/picture6.jpg" width="730" height="270" alt="Picture6"></a>
						<a href=""><img src="images/picture7.jpg" width="730" height="270" alt="Picture7"></a>
					</div>
					<a href="#" class="prev"><img src="images/arrowprev.png" width="24" height="43" alt="Arrow Prev"></a>
					<a href="#" class="next"><img src="images/arrownext.png" width="24" height="43" alt="Arrow Next"></a>
				</div>
				<img src="images/frame.png" width="739" height="341" alt="Image Frame" id="frame">
			</div>
		</div>
	</body>
</html>