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
  <div class="wrapper">

<header>
  <h1>Couch Potato Hikers</h1>
  <nav>
    <ul>
      <li><a href="index.php" title="Home">Trail Head</a>
      <li><a href="login.php" title="Login">Login</a>
      <li><a href="register.php" title="Registration">Join Us</a>
      <li><a class="selected" href="index.php?action=member" title="Member's Area">Member's Area</a>
      <li><a href="index.php?action=admin" title="Administration">Administration</a>
    </ul>
  </nav>
</header>
<div id="contentWrapper">
  <article id="mainContent">
<article class="content1">

<?php 
  if(isset($_SESSION['error_message']))
    {?>
  <p>Sorry, <?php echo htmlentities($_SESSION['error_message']);} ?></p> 
    <p>Members can <a href="login.php">Log in Here</a>. Not a member yet?<a href="register.php"> Register Here</a> and join the hike.</p>
<?php $_SESSION['error_message'] = null; ?>
</article>
</article>

  




<?php include('views/includes/footer.php');
?>

</div><!--/wrapper-->