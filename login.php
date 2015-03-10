<?php
//session_start();
	require_once('/functions/functions.php');
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
<header>
  <h1>Couch Potato Hikers</h1>
  <nav>
    <ul>
      <li><a href="pubhome.php" title="Home">Trail Head</a>
      <li><a  class="selected" href="login.php" title="login">Login</a></li>
      <li><a href="register.php" title="registration">Join Use</a>
        <li><a href="index.php?action=member" title="Member's Only">Members Only</a>
      <li><a href="index.php?action=admin" title="Administration">Admin Only</a>
    </ul>
  </nav>
</header>
<div id="contentWrapper">
<article class="content1">

	<?php 
	if(isset($_SESSION['nickName']))
		{?>
	<p>Welcome <?php echo htmlentities($_SESSION['nickName']); ?>.<br> Not <?php echo htmlentities($_SESSION['nickName']); ?>, <a href="index.php?action=logout">Please Log Out</a></p><?php } ?>
</article>
  <article id="mainContent">
<article class="content1">
<?php if(isset($_SESSION['error_message']))
	{
		?><h2><?php echo htmlentities($_SESSION['error_message']); ?></h2><?php
	}
?> 
	<div class="form1">
		<!-- login form-->
		<form action="index.php" method="post" id="loginForm">
			<fieldset>
				<legend>CPH Member Login</legend>
					<p>Fields marked with an asterisks (*) are requiered.</p>
			</fieldset>
				<input type="hidden" name="action" value="login">
					<label>Trail Name *:<br>
					<input type="text" name="nickName" placeholder="User Name" required title="Nick Name (Your User Name/User ID) is a required field" value="<?php if(isset($_POST['nickName'])) echo $_POST['nickName'];?>"><br>
					<label>Pasword *:<br>
					<input type="password" name="password" required placeholder="********" pattern="(?=^.{8,}$)((?=.*\d)|(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$" title="Password must be 8 characters long and contain Upercase, Lowercase, Number, and Special Character (ex: !@#$%^)."><br>
						<input type="submit" value="login" />
						<!--<a href="#">Lost your password?</a>
						<a href="#">Register</a>-->
					</div>
		</form><!-- form -->
	</div><!--/form-->
</article>


<footer class="pageFooter1">
 <article class="contentFooter"> 
  	 <ul>
	    <li><a href="pubhome.php" title="Home">Trail Head</a>
      <li><a href="login.php" title="login">Login</a></li>
      <li><a href="register.php" title="registration">Join Use</a>
      <li><a href="index.php?action=member" title="Member's Only">Members Only</a>
      <li><a href="index.php?action=admin" title="Administratoin">Admins Only</a>
 	</ul>
  
  	<p>&copy;Copyright  Couch Potato Hikers.  All rights reserved. </p>
  </article>
  
</footer>
</body>
</html>