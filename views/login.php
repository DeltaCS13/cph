<?php 
/******************************************************
* Auther: Howard La Flamme                            *
* Title: Log In (login.php)            	      		  *
* Description: Login page for Members & Admin. 		  *
* Revision: 0.1.0 4/30/2015                           *
*****************************************************/
	include('views/includes/header.php');
?>

<article class="content1">

<?php if(isset($_SESSION['error_message']))
	{
		?><h2><?php echo htmlentities($_SESSION['error_message']); ?></h2>
		<p>Please try again. Not yet a member? <a href="index.php?action=register">Register Here</a> to join the hike.</p><?php
	}
  		$_SESSION['error_message'] = null; ?> 
	<div class="form1">
		<!-- login form-->
	<?php
		//Field Validation
		$errors = errors();
		echo form_errors($errors);
	?>
		<form action="index.php" method="post" id="loginForm">
			<fieldset>
				<h1>CPH Member Login</h1>
					<p>Fields marked with an asterisks (*) are requiered.</p>
			</fieldset>
				<input type="hidden" name="action" value="logMeIn">
					<label>Trail Name *:<br>
					<input type="text" name="trail_Name" required placeholder="User Name"  value="<?php if(isset($_SESSION['trail_Name'])) {echo $_SESSION['trail_Name'];}?>" ></label><br>
					<label>Password *:<br>
					<input type="password" name="password" required placeholder="********" ><br></label>
						<input type="submit" value="login" >
					
					
		</form><!-- form -->
	</div><!--/form-->
</article>

<?php include('views/includes/footer.php');
?>
</div><!--/wrapper-->