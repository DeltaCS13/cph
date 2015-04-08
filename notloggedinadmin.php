<?php include('views/includes/header.php');?>
<article class="content1">

<?php 
  if(isset($_SESSION['error_message']))
    {?>
  <p>Sorry, <?php echo htmlentities($_SESSION['error_message']);} ?></p> 
    <p>Administrators can <a href="login.php">Log in Here</a>. Not a member yet? Join us as a new Member, <a href="register.php">Register Here</a>.</p>
  <?php $_SESSION['error_message'] = null; ?>
</article>
</article>
  



<?php include('views/includes/footer.php');
?>

</div><!--/wrapper-->