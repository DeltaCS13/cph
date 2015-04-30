<?php include('includes/header.php');?>


<article class="content1">
  <h1 class="pageTitle">Member Page</h1>
</article>

<!-- show member info -->
  <article class="content2">
  <?php 
     $userID = $_SESSION['user_id'];
      $userInfo = getMemberByID($userID);
    ?>
  
  <h2>User Profile</h2>
    <h3>Name:</h3>
      <p><?php echo htmlentities($userInfo['firstName_usr']).' '.htmlentities($userInfo['lastName_usr']);?></p>
    <h3>Trail Name:</h3>
      <p><?php echo htmlentities($userInfo['nickName_usr']);?></p>
    <h3>Email:</h3>
      <p><?php echo htmlentities($userInfo['email_uad']);?></p>
    <h3>Hiker Level:</h3>
      <p><?php echo htmlentities($userInfo['name_lvl']);?></p>
    <h3>Access Level:</h3>
      <p><?php echo htmlentities($userInfo['accessLvl_ual']);?></p>
     
</article>
<!-- member update links/forms-->
<?php 
  include('includes/members/memberUpdate.php'); 
?>

<div class="floatReset"></div>
<?php include('includes/footer.php');
?>
