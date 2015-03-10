<?php 
//session_start();
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
      <li><a href="./index.php" title="Home">Trail Head</a>
      <li><a href="./views/public/login.php" title="Login">Login</a>
      <li><a href="./views/public/register.php" title="Registration">Join Use</a>
      <li><a href="./views/member/member.php" title="Member's Only">Members Only</a>
      <li><a href="./views/admin/admin.php" title="Administration">Admin Only</a>
    </ul>
  </nav>
</header>
<div id="contentWrapper">
  <article id="mainContent">
   
<h1>Member Page</h1>
<p>Welcome back to the trail <?php echo htmlentities($_SESSION['nickName']); ?> nice to have you back.</p>

<?php
	include('/../includes/memberfooter.php');
?>