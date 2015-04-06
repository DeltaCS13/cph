<?php 
require_once('/functions/session_functions.php');
require_once('/functions/functions.php');
//require_once('/functions/validation_functions.php');
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
<h2>Update Your Profile</h2>
<form action="index.php" method="post" id="adminUpdateForm">
<?php
		$errors = errors();
		echo form_errors($errors);
?>
	<!--<fieldset>Update Your Profile</fieldset>-->
		
	<input type="hidden" name="action" value="admUpdate">

	<label>First Name:<br>
	<input type="text" name="firstName" required autofocus value="<?php if(isset($_SESSION['firstName'])) echo $_SESSION['firstName'];?>"></label><br>

	<label>Last Name:<br>
	<input type="text" name="lastName" required value="<?php if(isset($_SESSION['lastName'])) echo $_SESSION['lastName'];?>"></label><br>

	<label>Trail Name (User ID):
	<br><input type="text" name="nickName" placeholder="Nick Name" required value="<?php if(isset($_SESSION['nickName'])) echo $_SESSION['nickName'];?>"></label><br>
	<label>Hiker Level:
	<br><input type="text" name="hikerLevel" placeholder="Hiker Level" required value="<?php if(isset($_SESSION['userLevelName'])) echo $_SESSION['userLevelName'];?>"></label><br>
	<label>Access Level:
	<br><input type="text" name="accessLevel" placeholder="Access Level" required value="<?php if(isset($_SESSION['accName'])) echo $_SESSION['accName'];?>"></label><br>
	<input type="submit" value="Update" />
</form>

</div><!--/form-->

<div class="form1">	

<!--<form action="index.php" method="post" id="memPassUpdateForm">
<?php
		/*$errors = errors();
		echo form_errors($errors);*/
?>
<fieldset>Update Your Password</fieldset>
<input type="hidden" name="action" value="adminPassUpdate">
	<label>Old Password:<br>
	<input type="password" name="oldPass" required placeholder="********" ></label><br>

	<label>New Password:<br>
	<input type="password" name="newPass"  placeholder="********" pattern="(?=^.{8,}$)((?=.*\d)|(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$" title="Password must be 8 characters long and contain Upercase, Lowercase, Number, and Special Character (ex: !@#$%^)."><br></label>
	<label>Retype New Password<br>
	<input type="password" name="reNewPass"  placeholder="********" pattern="(?=^.{8,}$)((?=.*\d)|(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$" title="Password must be 8 characters long and contain Upercase, Lowercase, Number, and Special Character (ex: !@#$%^)."><br></label>
	<input type="submit" name="newPassword" value="Submit Password">-->
</article>

<?php include('views/includes/footer.php');
?>

</div><!--wrapper-->