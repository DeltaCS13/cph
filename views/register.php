<?php 
/******************************************************
* Auther: Howard La Flamme                            *
* Title: Registration Page (register.php)      		  *
* Description: First registration page for name. 	  *
*				trail name and password. 	 		  *
* Revision: 0.1.0 4/30/2015                           *
*****************************************************/

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

	//Field Validation
	$errors = errors();
	echo form_errors($errors);
?>
	<form action="index.php" method="post" id="registerForm">

		<fieldset><h1>New Member Registration</h1></fieldset>
			<p>Fields marked with an asterisks (<span class="redText">*</span>) are requiered.</p>


		<input type="hidden" name="action" value="newRegister">

		First Name <span class="redText">*</span>:<br>
			<input type="text" name="first_Name" placeholder="John" required value="<?php if(isset($_POST['first_Name'])) echo $_POST['first_Name'];?>"><br>

		Last Name <span class="redText">*</span>:<br>
			<input type="text" name="last_Name" placeholder="Doe" required value="<?php if(isset($_POST['last_Name'])) echo $_POST['last_Name'];?>"><br>

		Trail Name (User ID) <span class="redText">*</span>:<br>
			<input type="text" name="trail_Name" placeholder="Nick Name" required value="<?php if(isset($_POST['trail_Name'])) echo $_POST['trail_Name'];?>"><br>

		Password <span class="redText">*</span>:<br>
			<input type="password" name="password" required placeholder="********" pattern="(?=^.{8,}$)((?=.*\d)|(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$" title="Password must be at least 8 characters long and contain Upercase, Lowercase, Number, and Special Character (ex: ! @ # $ % ^ )."><br>

			<input type="submit" value="Next">
	</form>

	
</article>

<?php include('views/includes/footer.php');
?>

