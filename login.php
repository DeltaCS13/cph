<?php include('views/includes/header.php');?>

<article class="content1">

<?php if(isset($_SESSION['error_message']))
	{
		?><h2><?php echo htmlentities($_SESSION['error_message']); ?></h2>
		<p>Please try again. Not yet a member? <a href="register.php">Register Here</a> to join the hike.</p><?php
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
				<legend><h2>CPH Member Login</h2></legend>
					<p>Fields marked with an asterisks (*) are requiered.</p>
			</fieldset>
				<input type="hidden" name="action" value="login">
					<label>Trail Name *:<br>
					<input type="text" name="nickName" required placeholder="User Name"  value="<?php if(isset($_POST['nickName'])) echo $_POST['nickName'];?>" ></label><br>
					<label>Password *:<br>
					<input type="password" name="password" required placeholder="********" ><br></label>
						<input type="submit" value="login" >
					
					
		</form><!-- form -->
	</div><!--/form-->
</article>
</article>
<?php include('views/includes/footer.php');
?>
</div><!--/wrapper-->