<?php include('/../../includes/header.php');?>


<article class="content1">
  <h1 class="pageTitle">Member Page</h1>
</article>

<!-- show member info -->
  <article class="contentTable">

  <table class="table1">
      <h2 class="pageTitleH2">User Profile</h2>
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
       
    </tbody>
  </table>
</article>
<!-- member update links/forms-->
<?php 
  include('memberUpdate.php'); 
?>
</article>
<div class="floatReset"></div>
<?php include('/../../includes/footer.php');
?>
</div>