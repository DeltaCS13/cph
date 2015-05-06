<?php
/************************************************
 * Auther: Howard La Flamme                     *
 * Title: Member's Page (member.php)            *
 * Description: Provides Member information and *
 *  links for various member actions.           *
 * Revision: 0.1.5 5/6/2015                     *
 ************************************************/

    include('includes/header.php');
 ?>

<article class="content1">
  <h1 class="pageTitle">Member Page</h1>
</article>

<!-- show member info -->
<article class="content2">
  <?php 
    $userID = $_SESSION['user_id'];
    $userInfo = getMemberByID($userID);
     
    if(($_SESSION['memberUpdates'] != 'manageGear') || ($_SESSION['memberUpdates'] === NULL))
     { 
  ?>
  
  <h2>User Profile</h2>
    <div class="floatLeft">
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
    </div>

    <div class="floatLeft">
      <h3>Address Type:</h3>
        <p><?php echo htmlentities($userInfo['type_uad']);?></p>
      
      <h3>Address:</h3>
        <p><?php echo htmlentities($userInfo['address1_uad']);?></p>

    <?php if($userInfo['address2_uad'] != NULL) {?>
      <h3>Address 2:</h3>
        <p><?php echo htmlentities($userInfo['address2_uad']);?></p>
    <?php } ?>

    <?php if($userInfo['address3_uad'] != NULL) {?>
      <h3>Address 3:</h3>
        <p><?php echo htmlentities($userInfo['address3_uad']);?></p>
    <?php } ?>
    
      <h3>City:</h3>
        <p><?php echo htmlentities($userInfo['city_uad']);?></p>

      <h3>State/Provence:</h3>
        <p><?php echo htmlentities($userInfo['name_sre']);?></p>
      
      <h3>Country:</h3>
        <p><?php echo htmlentities($userInfo['country_cou']);?></p>

      <h3>Postal/Zip Code:</h3>
        <p><?php echo htmlentities($userInfo['postalCode_uad']);?></p>

    </div>  
  <div class="floatReset"></div>   
</article>
<!-- member update links/forms-->
<?php 
  include('includes/members/memberUpdate.php');  
  }elseif($_SESSION['memberUpdates'] === 'manageGear'){

  $userGears = getUserGear($userID);
?>

<h2>Listed Gear</h2>
    <div>
      
      <?php 
            if(isset($_SESSION['error_message']))
            {
              ?><h3>You have no items listed<br> on the Gear Exchange.</h3>
              <?php 
              $_SESSION['error_message']= NULL;
            }echo $_SESSION['error_message'];
              foreach($userGears as $userGear):
      ?>

        <h3>Item ID:</h3>
          <p><?php echo htmlentities($userGear['id_gex']);?></p>

        <h3>Category:</h3>
          <p><?php echo htmlentities($userGear['name_gex']);?></p>

        <h3>Condition:</h3>
          <p><?php echo htmlentities($userGear['condition_con']);?></p>

        <h3>Description:</h3>
          <p><?php echo htmlentities($userGear['description_gex']);?></p>

        <h3>Date Added:</h3>
          <p><?php echo htmlentities($userGear['dateAdded_gex']);?></p>
        <hr/>
    </div>
    <div class=".floatReset"></div>
      <?php
        endforeach;
      ?>
</article>
  <?php 
    include('includes/members/memberUpdate.php'); }
  ?>

<div class="floatReset"></div>
<?php
  include('includes/footer.php');
?>
