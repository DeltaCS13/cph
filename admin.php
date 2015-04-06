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
    <li><a href="login.php" title="Login">Login</a>
      <li><a href="register.php" title="registration">Join Us</a>
    <?php } ?>
  
     <?php if(isset($_SESSION['accessLevel'])){
        if($_SESSION['accessLevel'] === '1' ){?>
      <li><a href="index.php?action=member" title="Member's Area">Member's Area</a>
     
      <li><a class="selected" href="index.php?action=admin" title="Administration">Administration</a>
     <?php }elseif($_SESSION['accessLevel'] === '2'){?>
      <li><a href="index.php?action=member" title="Member's Area">Member's Area</a>
      <?php }; }?>
     
    </ul>
  </nav>
</header>
<div id="contentWrapper">
  <article id="mainContent">

 <article class="content1">  
<h1>Admin Page</h1>
<p>Welcome back to the trail <?php echo htmlentities($_SESSION['nickName']); ?>, nice to have you back.</p>

<table class="table1">
    <caption>Events</caption>
    <thead>
      <tr>
        <th>First Name</th><th>Last Name</th>
        <th>Trail Name</th><th>Hiker Level</th><th>Access Level</th>
      </tr>
  </thead>
  <?php 
  $userID = $_SESSION['user_id'];
    $userInfo = getMemberByID($userID);
 
  ?>
    
    <tbody>
      <tr>
        <td><?php echo $userInfo['firstName_usr']; ?></td>
        <td><?php echo $userInfo['lastName_usr']; ?></td>
        <td><?php echo $userInfo['nickName_usr']; ?></td>
        <td><?php echo $userInfo['name_lvl']; ?></td>
        <td><?php echo $userInfo['accessLvl_ual'] ?></td>
      </tr>
     
  </tbody></table>

<article>
<h3>Member Actions</h3>
  <ul class="menu1">
    <li><a href="index.php?action=adminUpdate" title="Admin Update">Update Profile</a>
    <!--<li><a href="register.php" title="registration">Join Us</a>
    <li><a href="register.php" title="registration">Join Us</a> 
    <li><a href="register.php" title="registration">Join Us</a> 
    <li><a href="register.php" title="registration">Join Us</a> -->  
</article>
</article>
</article>
<?php include('views/includes/footer.php');
?>
</div><!--/wrapper-->