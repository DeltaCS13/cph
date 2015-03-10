<?php
	require_once('/../../functions/functions.php');
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
<article class="content1">
<?php if(isset($_SESSION['error']))
	{
		?><h2><?phphtmlentities($_SESSION['error']);?></h2><?php
	}
?> 
	<div class="form1">
		<!-- login form-->
		<form action="../../index.php" method="post" id="loginForm">
			<fieldset>
				<legend>CPH Member Login</legend>
					<p>Fields marked with an asterisks (*) are requiered.</p>
			</fieldset>
				<input type="hidden" name="action" value="login">
					<label>Trail Name *:<br>
					<input type="text" name="nickName" placeholder="User Name" required title="Nick Name (Your User Name/User ID) is a required field"><br>
					<label>Pasword *:<br>
					<input type="password" name="password" required placeholder="********" pattern="(?=^.{8,}$)((?=.*\d)|(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$" title="Password must be 8 characters long and contain Upercase, Lowercase, Number, and Special Character (ex: !@#$%^)."><br>
						<input type="submit" value="login" />
						<!--<a href="#">Lost your password?</a>
						<a href="#">Register</a>-->
					</div>
		</form><!-- form -->
	</div><!--/form-->
</article>
<article>
	<p><a href="../../index.php?action=logout">Log Out</a></p>
</article>

<?php
	include('../includes/loginfooter.php');
?>