<!DOCTYPE html>
<html>
	<head>
		<title>ONLINE ICS LIBRARY</title>

		<meta charset = "utf-8" />
		
		<link rel="stylesheet" type="text/css" href="<?php $this->load->helper('url'); echo base_url();?>stylesheet/success_page.css"/>
		
		<script src="<?php $this->load->helper('url'); echo base_url();?>javascript/jquery-1.9.0.js"></script>
		<script src="<?php $this->load->helper('url'); echo base_url();?>javascript/jquery-1.9.0.min.js"></script>
		<script src="<?php $this->load->helper('url'); echo base_url();?>javascript/slides.min.jquery.js"></script>
		
		<script>
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
		<div id = "container">
			<div id = "message">
				<form action = "<?php $this->load->helper('url'); echo base_url();?>index.php/addMaterial/addmaterial/addlink/book" method = "POST">
					<?php
						if($isSuccessful == 1)
						{
							echo'<h1>Material Successfully Added</h1>
							<p>To add more materials click the button below</p>
							<input type = "submit" value = "Add more materials" />';
						}
						else
						{
							echo'<h1>Material Unsuccessfully Added</h1>
							<p>To continue adding materials click the button below</p>
							<input type = "submit" value = "Add materials" />';
						}
					?>
				</form>
			</div>
			
			<div id="success_image">
				<?php
					if($isSuccessful == 1)
					{
						echo'<img src="http://localhost/OnlineICSLibrary/images/success.png" width=300 height=300 alt="success"/>';
					}
					else
					{
						echo'<img src="http://localhost/OnlineICSLibrary/images/fail.png" width=250 height=250 alt="success"/>';
					}
				?>
			</div>
		</div>
	</body>
</html>