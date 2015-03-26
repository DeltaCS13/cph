<footer class="pageFooter1">
 <article class="contentFooter"> 
  	 <ul>
      <li ><a href="index.php?action=pubhome" title="Home">Trail Head</a>
     
      <?php 
	if(!isset($_SESSION['user_id']))
		{?>
	
    <li><a href="login.php" title="Login">Login</a>
      <li><a href="register.php" title="registration">Join Us</a>
    <?php } ?>
	
     <?php if(isset($_SESSION['accessLevel'])){
     		if($_SESSION['accessLevel'] === '1' ){?>
     	<li><a href="index.php?action=member" title="Member's Area">Member's Area</a>
     
      <li><a href="index.php?action=admin" title="Administration">Administration</a>
     <?php }elseif($_SESSION['accessLevel'] === '2'){?>
     	<li><a href="index.php?action=member" title="Member's Area">Member's Area</a>
     	<?php }; }?>
     
    </ul>
  
  	<p>&copy;Copyright 2015 Couch Potato Hikers.  All rights reserved. </p>
  </article>
  
</footer>
</body>
</html>