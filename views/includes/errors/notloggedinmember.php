<?php 
/******************************************************
 * Auther: Howard La Flamme                     	  *
 * Title: Not Logged in Member (notliggedinmember.php)*
 * Description: displays if user tries to access 	  *
 *				a page they are not authorized to. 	  *
 * Revision: 0.1.0 4/30/2015                    	  *
 *****************************************************/
	include('views/includes/header.php');?>
<article class="content1">

<?php 
  if(isset($_SESSION['error_message']))
    {?>
  <p>Sorry, <?php echo htmlentities($_SESSION['error_message']);} ?></p> 
    <p>Members can <a href="login.php">Log in Here</a>. Not a member yet?<a href="register.php"> Register Here</a> and join the hike.</p>
<?php $_SESSION['error_message'] = null; ?>
</article>
</article>

  




<?php include('views/includes/footer.php');
?>

</div><!--/wrapper-->