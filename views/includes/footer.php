<footer class="pageFooter1">
 <article class="contentFooter"> 
  	 <ul>
      <li ><a href="index.php?action=pubhome" title="Home">Trail Head</a>
     
      <?php 
	if(!isset($_SESSION['user_id']))
		{?>
	
    <li><a href="index.php?action=login" title="Login">Login</a>
      <li><a href="index.php?action=register" title="registration">Join Us</a>
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
    <div> Icons made by <a href="http://www.flaticon.com/authors/freepik" title="Freepik">Freepik</a> from <a href="http://www.flaticon.com" title="Flaticon">www.flaticon.com</a>             is licensed by <a href="http://creativecommons.org/licenses/by/3.0/" title="Creative Commons BY 3.0">CC BY 3.0</a></div>
  </article>
  
</footer>
</body>
</html>