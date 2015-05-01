<?php
/******************************************************
* Auther: Howard La Flamme                            *
* Title: Log Out page (logout.php)            		  *
* Description: Logout page for Members & Admin. 	  *
* Revision: 0.1.0 4/30/2015                           *
*****************************************************/

 	include('views/includes/header.php');
?>
    <article class="content1">
      <h1>You have loged out</h1>
          <p>Goodbye <?php echo htmlentities($nickNameLogOut); ?>, would you like to <a href="index.php?action=login">login</a> again?</p>
    </article>
  

<?php include('views/includes/footer.php');
?>


