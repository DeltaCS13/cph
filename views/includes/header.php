<?php 
  require_once('./functions/functions.php');
?>
<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>Couch Potato Hikers</title>
<link href="css/maincss.css" rel="stylesheet" >
<meta name="viewport" content="initial-scale=1.0" />

</head>
<body>

<div class="wrapper">
<header>
  <div>
    <h1>Couch Potato Hikers</h1>

    <!--Header Navigation-->
    <nav> 
      <ul>
        <li ><a <?php if ($action === 'pubhome'){?> class="selected" <?php } ?> href="index.php?action=pubhome " title="Home">Trail Head</a>
       
       
    
       <?php if(isset($_SESSION['accessLevel'])){
          if($_SESSION['accessLevel'] === '1' ){?>
        <li><a <?php if ($action === 'member' || $action === 'memberUpdate'){?> class="selected" <?php } ?>href="index.php?action=member" title="Member's Area">Member's Area</a>
       
        <li><a <?php if ($action === 'admin'){?> class="selected" <?php } ?>href="index.php?action=admin" title="Administration">Administration</a>
       <?php }elseif($_SESSION['accessLevel'] === '2'){?>
        <li><a <?php if ($action === 'member' || $action === 'memberUpdate'){?> class="selected" <?php } ?>href="index.php?action=member" title="Member's Area">Member's Area</a>
        <?php }; }?>

        <li ><a <?php if ($action === 'gear'){?> class="selected" <?php } ?>href="index.php?action=gear " title="Gear Exchange">Gear Exchange</a>

        <li ><a <?php if ($action === 'events'){?> class="selected" <?php } ?>href="index.php?action=events " title="Events Page">Events</a>
        
        <?php if(!isset($_SESSION['user_id'])){?>
        <li><a <?php if ($action === 'register'){?> class="selected" <?php } ?> href="index.php?action=register" title="registration">Join Us</a>
        <?php } ?>  
        
        <?php 
            if(isset($_SESSION['user_id']))
          {?>
        <li><a <?php if ($action === 'logout'){?> class="selected" <?php } ?> href="index.php?action=logout" title="Logout">Welcome <?php echo htmlentities($_SESSION['nickName']);?>, Logout</a><?php }else{?>
          <li><a <?php if ($action === 'login' || $action === 'LogMeIn'){?> class="selected" <?php } ?> href="index.php?action=login" title="Login">Login</a> <?php } ?>
      </ul>
    </nav>
  </div>
</header>


   