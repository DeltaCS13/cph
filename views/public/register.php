<?php 
require_once('/../../functions/session_functions.php');
?>
<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>Couch Potato Hikers</title>
<link href="../../assets/maincss.css" rel="stylesheet" >
<meta name="viewport" content="initial-scale=1.0" />
</script>
</head>
<body >
<header>
  <h1>Couch Potato Hikers</h1>
  <nav>
    <ul>
      <li><a href="../../pubhome.php" title="Home">Trail Head</a>
      <li><a href="login.php" title="login">Login</a></li>
      <li><a href="register.php" title="registration">Join Use</a>
      <li><a href="../member/member.php" title="Member's Only">Members Only</a>
      <li><a href="../admin/admin.php" title="Administratoin">Admins Only</a>
    </ul>
  </nav>
</header>
<div id="contentWrapper">
  <article id="mainContent">
<h1>Registration page</h1>

<?php 
	if (isset($error_message))
	{
		echo $error_message;
	}

?>



	
<article class="content1">
<div class="form1">	

<form action="../../index.php" method="post" id="registerForm">
	<fieldset>New Member Registration</fieldset>
		<p>Fields marked with an asterisks (*) are requiered.</p>
	<input type="hidden" name="action" value="register">

	<label>First Name *:<br>
	<input type="text" name="firstName" placeholder="John" required autofocus ></label><br>

	<label>Last Name *:<br>
	<input type="text" name="lastName" placeholder="Doe" required></label><br>

	<label>Trail Name (User ID) *:
	<br><input type="text" name="nickName" placeholder="Nick Name" required></label><br>

	<label>Password *:<br>
	<input type="password" name="password" required placeholder="********" pattern="(?=^.{8,}$)((?=.*\d)|(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$" title="Password must be 8 characters long and contain Upercase, Lowercase, Number, and Special Character (ex: !@#$%^)."><br>

	<input type="submit" value="Register" />
</form>

</div><!--/form-->
</article>
<article>
	<p><a href="../index.php?action=logout">Log Out</a></p>
</article>
<?php
	include('../includes/loginfooter.php');
?>