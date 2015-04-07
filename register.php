<?php 
require_once('/functions/session_functions.php');
require_once('/functions/functions.php');
require_once('/functions/validation_functions.php');
?>
<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>Couch Potato Hikers</title>
<link href="assets/maincss.css" rel="stylesheet" >
<meta name="viewport" content="initial-scale=1.0" />
</script>
</head>
<body >
<div class="wrapper">
<header>
  <h1>Couch Potato Hikers</h1>
  <nav>
    <ul>
      <li ><a  href="index.php?action=pubhome" title="Home">Trail Head</a>
     
      <?php 
	if(isset($_SESSION['user_id']))
		{?>
	<li><a href="index.php?action=logout" title="Logout">Welcome <?php echo htmlentities($_SESSION['nickName']);?>, Logout</a><?php }else{?>
    <li><a href="login.php" title="Login">Login</a>
      <li><a class="selected" href="register.php" title="registration">Join Us</a>
    <?php } ?>
	
     <?php if(isset($_SESSION['accessLevel'])){
     		if($_SESSION['accessLevel'] === '1' ){?>
     	<li><a href="index.php?action=member" title="Member's Area">Member's Area</a>
     
      <li><a href="index.php?action=admin" title="Administration">Administration</a>
     <?php }elseif($_SESSION['accessLevel'] === '2'){?>
     	<li><a href="index.php?action=member" title="Member's Area">Member's Area</a>
     	<?php }; }?>
     
    </ul>
  </nav>
</header>
<div id="contentWrapper">


  <article id="mainContent">
	
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
	<fieldset>New Member Registration</fieldset>
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