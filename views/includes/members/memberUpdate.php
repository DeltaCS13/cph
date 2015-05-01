
<?php
/************************************************
 * Auther: Howard La Flamme                     *
 * Title: Member Update (memberUpdate.php)      *
 * Description: Provides links for various  	*
 *   member actions and forms for updates.      *
 * Revision: 0.1.0 4/30/2015                    *
 ************************************************/

	if (!isset($_SESSION['memberUpdates'])){
?>
	<article class="content2">

<h2>Member Actions</h2>
  <ul class="menu1">
    <li><a class="link" href="index.php?action=memberUpdate" title="Member Update">Update Profile</a>
    <li><a class="link" href="index.php?action=updateEmail" title="Update Email">Update Email</a>
    <li><a class="link" href="index.php?action=updateAddress" title="Update Address">Update Address</a>
    <li><a class="link" href="index.php?action=manageGear" title="Manage Your Gear Exchange Items">Manage Your Gear</a> on the Gear Exchange
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

	First Name *:<br>
	<input type="text" name="firstName" required autofocus value="<?php if(isset($_SESSION['firstName'])) echo $_SESSION['firstName'];?>"><br>

	Last Name *:<br>
	<input type="text" name="lastName" required value="<?php if(isset($_SESSION['lastName'])) echo $_SESSION['lastName'];?>"><br>

	Trail Name (User ID) *:
	<br><input type="text" name="nickName" placeholder="Nick Name" required value="<?php if(isset($_SESSION['nickName'])) echo $_SESSION['nickName'];?>"><br>
	<input type="submit" value="Update Profile" />
</form>
</div><!--/form-->
	<div class="userInfo">
		<p>Access Level: <?php echo htmlentities($_SESSION['accName']); ?></p>
		<p>Hiker Level: <?php echo htmlentities($_SESSION['userLevelName']); ?></p>
	</div>






</article>

<?php }elseif($_SESSION['memberUpdates'] === 'updateEmail'){
	include('/../addressUpdate/updateEmail.php');
	}elseif($_SESSION['memberUpdates'] === 'updateAddress'){
	include('/../addressUpdate/addUpdate.php');
	}elseif($_SESSION['memberUpdates'] === 'manageGear'){
	include('/../gearExchange/manageGear.php');
	}
?>


