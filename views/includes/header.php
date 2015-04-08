<?php 
  require_once('./functions/functions.php');
?>
<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>Couch Potato Hikers</title>
<link href="assets/maincss.css" rel="stylesheet" >
<meta name="viewport" content="initial-scale=1.0" />

</head>
<body >

<div class="wrapper">
<header>
  <h1>Couch Potato Hikers</h1>

  <!--Header Navigation-->
  <nav>
    <ul>
      <li ><a href="index.php?action=pubhome " title="Home">Trail Head</a>
     
     
  
     <?php if(isset($_SESSION['accessLevel'])){
        if($_SESSION['accessLevel'] === '1' ){?>
      <li><a href="index.php?action=member" title="Member's Area">Member's Area</a>
     
      <li><a href="index.php?action=admin" title="Administration">Administration</a>
     <?php }elseif($_SESSION['accessLevel'] === '2'){?>
      <li><a href="index.php?action=member" title="Member's Area">Member's Area</a>
      <?php }; }?>

      <li ><a href="index.php?action=gear " title="Gear Exchange">Gear Exchange</a>

      <li ><a href="index.php?action=events " title="Events Page">Events Page</a>
      
      <?php if(!isset($_SESSION['user_id'])){?>
      <li><a href="register.php" title="registration">Join Us</a>
      <?php } ?>  
      
      <?php 
          if(isset($_SESSION['user_id']))
        {?>
      <li><a href="index.php?action=logout" title="Logout">Welcome <?php echo htmlentities($_SESSION['nickName']);?>, Logout</a><?php }else{?>
        <li><a href="login.php" title="Login">Login</a> <?php } ?>
    </ul>
  </nav>
</header>

<div id="contentWrapper">

  <article id="mainContent">
   