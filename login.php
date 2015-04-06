<?php
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
<div class="wrapper">
<header>
  <h1>Couch Potato Hikers</h1>
<nav>
    <ul>
      <li ><a href="index.php?action=pubhome" title="Home">Trail Head</a>
     
      <?php 
	if(isset($_SESSION['user_id']))
		{?>
	<li><a href="index.php?action=logout" title="Logout">Welcome <?php echo htmlentities($_SESSION['nickName']);?>, Logout</a><?php }else{?>
    <li><a class="selected" href="login.php" title="Login">Login</a>
      <li><a href="register.php" title="registration">Join Us</a>
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




<?php if(isset($_SESSION['error_message']))
	{
		?><h2><?php echo htmlentities($_SESSION['error_message']); ?></h2>
		<p>Please try again. Not yet a member? <a href="register.php">Register Here</a> to join the hike.</p><?php
	}
  		$_SESSION['error_message'] = null; ?> 
	<div class="form1">
		<!-- login form-->
		<form action="index.php" method="post" id="loginForm">
			<fieldset>
				<legend>CPH Member Login</legend>
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