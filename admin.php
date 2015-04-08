<?php include('views/includes/header.php');?>

 <article class="content1">  
<h1>Admin Page</h1>
<p>Welcome back to the trail <?php echo htmlentities($_SESSION['nickName']); ?>, nice to have you back.</p>

<table class="table1">
    <caption>User Profile</caption>
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
    <li><a href="index.php?action=gear" title="Gear Exchange">Gear Exchange</a>
  </ul>
     
</article>
</article>
</article>
<?php include('views/includes/footer.php');
?>
</div><!--/wrapper-->