<?php 
//session_start();
?>
<!doctype html>
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
      <li><a href="register.php" title="Registration">Join Us</a>
      <li><a  href="index.php?action=member" title="Member's Area">Member's Area</a>
      <li><a class="selected" href="index.php?action=admin" title="Administration">Administration</a>
    </ul>
  </nav>
</header>
<div id="contentWrapper">
  <article id="mainContent">
<article class="content1">

<?php 
  if(isset($_SESSION['error_message']))
    {?>
  <p>Sorry, <?php echo htmlentities($_SESSION['error_message']);} ?><br> 
    <p>Administrators can <a href="login.php">Log in Here</a>. Not a member yet? Join us as a new Member, <a href="register.php">Register Here</a>.</p>
  <?php $_SESSION['error_message'] = null; ?>
</article>

  




<footer class="pageFooter1">
 <article class="contentFooter"> 
    <ul>
      <li><a href="index.php" title="Home">Trail Head</a>
      <li><a href="login.php" title="Login">Login</a>
      <li><a href="register.php" title="Registration">Join Use</a>
      <li><a href="index.php?action=member" title="Member's Area">Member's Area</a>
      <li><a href="index.php?action=admin" title="Administration">Administration</a>
  </ul>
  
    <p>&copy;Copyright  Couch Potato Hikers.  All rights reserved. </p>
  </article>
  
</footer>
</body>
</html>