<?php include('views/includes/header.php');?>
	
<article class="content1">
<?php 
	if (isset($error_message))
	{
		echo $error_message;
	}

?>

<div class="form1">	

<form action="index.php" method="post" id="registerForm">
<?php
		$errors = errors();
		echo form_errors($errors);
?>
	<fieldset><h2>New Member Registration</h2></fieldset>
		<p>Fields marked with an asterisks (*) are requiered.</p>


	<input type="hidden" name="action" value="register">

	<label>First Name *:<br>
	<input type="text" name="firstName" placeholder="John" required autofocus value="<?php if(isset($_POST['firstName'])) echo $_POST['firstName'];?>"></label><br>

	<label>Last Name *:<br>
	<input type="text" name="lastName" placeholder="Doe" required value="<?php if(isset($_POST['lastName'])) echo $_POST['lastName'];?>"></label><br>

	<label>Trail Name (User ID) *:
	<br><input type="text" name="nickName" placeholder="Nick Name" required value="<?php if(isset($_POST['nickName'])) echo $_POST['nickName'];?>"></label><br>

	<label>Password *:<br>
	<input type="password" name="password" required placeholder="********" pattern="(?=^.{8,}$)((?=.*\d)|(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$" title="Password must be 8 characters long and contain Upercase, Lowercase, Number, and Special Character (ex: !@#$%^)."><br></label>

	<input type="submit" value="Register" />
</form>

</div><!--/form-->
</article>

<?php include('views/includes/footer.php');
?>

</div><!--wrapper-->