
<?php
if (!isset($_SESSION['memberUpdates'])){?>
	<article class="content2">

<h2>Member Actions</h2>
  <ul class="menu1">
    <li><a class="link" href="index.php?action=memberUpdate" title="Member Update">Update Profile</a>
    <li><a class="link" href="index.php?action=updateAddress" title="Update Address">Update Address</a>
    <li><a class="link" href="index.php?action=gear" title="Gear Exchange">Gear Exchange</a>
  </ul>
</article>
<?php
}elseif($_SESSION['memberUpdates'] === 'memberUpdate'){
?>
<article class="content2">
<div class="form1">	
<h2>Update Your Profile</h2>
<form action="index.php" method="post" id="memUpdateForm">
<?php
		$errors = errors();
		echo form_errors($errors);
?>

		
	<input type="hidden" name="action" value="memUpdate">

	<label>First Name *:<br>
	<input type="text" name="firstName" required autofocus value="<?php if(isset($_SESSION['firstName'])) echo $_SESSION['firstName'];?>"></label><br>

	<label>Last Name *:<br>
	<input type="text" name="lastName" required value="<?php if(isset($_SESSION['lastName'])) echo $_SESSION['lastName'];?>"></label><br>

	<label>Trail Name (User ID) *:
	<br><input type="text" name="nickName" placeholder="Nick Name" required value="<?php if(isset($_SESSION['nickName'])) echo $_SESSION['nickName'];?>"></label><br>
	<input type="submit" value="Update Profile" />
</form>
</div><!--/form-->
	<div class="userInfo">
		<p>Access Level: <?php echo htmlentities($_SESSION['accName']); ?></p>
		<p>Hiker Level: <?php echo htmlentities($_SESSION['userLevelName']); ?></p>
	</div>






</article>

<?php }elseif($_SESSION['memberUpdates'] === 'updateAddress'){
	include('/../addressUpdate/addUpdate.php');
	}
?>


