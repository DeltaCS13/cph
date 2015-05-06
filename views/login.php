<?php 
/******************************************************
* Auther: Howard La Flamme                            *
* Title: Log In (login.php)            	      		  *
* Description: Login page for Members & Admin. 		  *
* Revision: 0.1.5 5/6/2015                            *
*****************************************************/
	include('views/includes/header.php');
?>

<article class="content1">

	<?php if(isset($_SESSION['error_message']))
		{
	?>
		<h2><span class="redText"><?php echo htmlentities($_SESSION['error_message']); ?></span></h2>
			<p>Please try again. Not yet a member? <a href="index.php?action=register">Register Here</a> to join the hike.</p>
	<?php
		}
  		$_SESSION['error_message'] = null;
  	?> 
<div><!-- login form-->
	<?php
		//Field Validation
		$errors = errors();
		echo form_errors($errors);
	?>
		<form action="index.php" method="post" id="loginForm">
			
			<h1>CPH Member Login</h1>
				<p>Fields marked with an asterisks (<span class="redText">*</span>) are requiered.</p>
			
					<input type="hidden" name="action" value="logMeIn">
					
				Trail Name <span class="redText">*</span>:<br>
					<input type="text" name="trail_Name" required placeholder="User Name"  value="<?php if(isset($_SESSION['trail_Name'])) {echo $_SESSION['trail_Name'];}?>"><br>
				
				Password <span class="redText">*</span>:<br>
					<input type="password" name="password" required placeholder="********" ><br>
				
				<!--reCaptcha-->
					<div class="g-recaptcha" data-sitekey="6Le_MgYTAAAAALAtSdipFL2xWNpb4PGvg7Gs3GGF"></div>

					<input type="submit" value="login" >
		</form><!-- form -->
</div><!--/form-->
</article>

<?php 
	include('views/includes/footer.php');
?>
</div><!--/wrapper-->