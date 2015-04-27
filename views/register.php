<?php 
require_once('functions/session_functions.php');
require_once('functions/validation_functions.php');
include('views/includes/header.php');

?>
	
<article class="content1">
<?php 
	if (isset($error_message))
	{
		echo $error_message;
	}

?>

<div class="form1">	
<?php
		//Field Validation
		$errors = errors();
		echo form_errors($errors);
?>
<form action="index.php" method="post" id="registerForm">

	<fieldset><h2>New Member Registration</h2></fieldset>
		<p>Fields marked with an asterisks (*) are requiered.</p>


	<input type="hidden" name="action" value="newRegister">

	<label>First Name *:<br>
	<input type="text" name="first_Name" placeholder="John" required value="<?php if(isset($_POST['first_Name'])) echo $_POST['first_Name'];?>"></label><br>

	<label>Last Name *:<br>
	<input type="text" name="last_Name" placeholder="Doe" required value="<?php if(isset($_POST['last_Name'])) echo $_POST['last_Name'];?>"></label><br>

	<label>Trail Name (User ID) *:
	<br><input type="text" name="trail_Name" placeholder="Nick Name" required value="<?php if(isset($_POST['trail_Name'])) echo $_POST['trail_Name'];?>"></label><br>

	<label>Password *:<br>
	<input type="password" name="password" required placeholder="********" pattern="(?=^.{8,}$)((?=.*\d)|(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$" title="Password must be at least 8 characters long and contain Upercase, Lowercase, Number, and Special Character (ex: ! @ # $ % ^ )."><br></label>

	<input type="submit" value="Register" />
</form>

</div><!--/form-->
</article>



<?php include('views/includes/footer.php');
?>
