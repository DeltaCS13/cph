<?php
	
	require_once('functions/functions.php');
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
      <li><a href="index.php" title="Home">Trail Head</a>
      <li><a href="login.php" title="Login">Login</a>
      <li><a href="register.php" title="Registration">Join Use</a>
      <li><a href="index.php?action=member" title="Member's Only">Members Only</a>
      <li><a class="selected" href="index.php?action=admin" title="Administration">Admin Only</a>
    </ul>
  </nav>
</header>
<div id="contentWrapper">
  <article id="mainContent">
<article class="content1">

  <?php 
  if(isset($_SESSION['nickName']))
    {?>
  <p>Welcome <?php echo htmlentities($_SESSION['nickName']); ?>.<br> Not <?php echo htmlentities($_SESSION['nickName']); ?>, <a href="index.php?action=logout">Please Log Out</a></p><?php } ?>
</article>

<article class="content1">
<h1>Admin Page</h1>
<p>Welcome back to the trail <?php echo htmlentities($_SESSION['nickName']); ?> nice to have you back.</p>
</article>


<footer class="pageFooter1">
 <article class="contentFooter"> 
  	 <ul>
	  <li><a href="index.php" title="Home">Trail Head</a>
      <li><a href="login.php" title="Login">Login</a>
      <li><a href="register.php" title="Registration">Join Use</a>
      <li><a href="index.php?action=member" title="Member's Only">Members Only</a>
      <li><a href="index.php?action=admin" title="Administration">Admin Only</a>
 	</ul>
  
  	<p>&copy;Copyright  Couch Potato Hikers.  All rights reserved. </p>
  </article>
  
</footer>
</body>
</html>