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
      <li><a href="login.php" title="Login">Login</a>
      <li><a href="register.php" title="registration">Join Use</a>
      <li><a href="index.php?action=member" title="Member's Only">Members Only</a>
      <li><a href="index.php?action=admin" title="Administratoin">Admins Only</a>
    </ul>
  </nav>
</header>
<div id="contentWrapper">
  <article id="mainContent">
    <article class="content1">
      <h1>You have loged out</h1>
          <p>Goodbye <?php echo htmlentities($nickNameLogOut); ?>, would you like to <a href="login.php">login</a> again?</p>
    </article>


<footer class="pageFooter1">
 <article class="contentFooter"> 
  	 <ul>
	    <li><a href="pubhome.com" title="Home">Trail Head</a>
      	<li><a href="login.php" title="Login">Login</a>
      	<li><a href="register.php" title="registration">Join Use</a>
       	<li><a href="index.php?actionmember" title="Member's Only">Members Only</a>
      	<li><a href="index.php?action=admin" title="Administratoin">Admins Only</a>
 	</ul>
  
  	<p>&copy;Copyright  Couch Potato Hikers.  All rights reserved. </p>
  </article>
  
</footer>
</body>
</html>
