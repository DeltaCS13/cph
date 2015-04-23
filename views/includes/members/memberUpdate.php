
<?php
if (!isset($_SESSION['memberUpdates'])){
	?>
	<article class="content2">

<h2 class="pageTitleH2">Member Actions</h2>
  <ul class="menu1">
    <li><a href="index.php?action=memberUpdate" title="Member Update">Update Profile</a>
    <li><a href="index.php?action=gear" title="Gear Exchange">Gear Exchange</a>
  </ul>
</article>
<?php
}elseif($_SESSION['memberUpdates'] === 'memberUpdate'){
?>
<article class="content2">
<div class="form1">	
<h2 class="pageTitleH2">Update Your Profile</h2>
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
	<input type="submit" value="Update" />
</form>
</div><!--/form-->
	<div class="userInfo">
		<p>Access Level: <?php echo htmlentities($_SESSION['accName']); ?></p>
		<p>Hiker Level: <?php echo htmlentities($_SESSION['userLevelName']); ?></p>
	</div>

<div class="form1">	

<!--<form action="index.php" method="post" id="memPassUpdateForm">
<?php
		/*$errors = errors();
		echo form_errors($errors);*/
?>
<fieldset>Update Your Password</fieldset>
<input type="hidden" name="action" value="memPassUpdate">
	<label>Old Password:<br>
	<input type="password" name="oldPass" required placeholder="********" ></label><br>

	<label>New Password:<br>
	<input type="password" name="newPass"  placeholder="********" pattern="(?=^.{8,}$)((?=.*\d)|(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$" title="Password must be 8 characters long and contain Upercase, Lowercase, Number, and Special Character (ex: !@#$%^)."><br></label>
	<label>Retype New Password<br>
	<input type="password" name="reNewPass"  placeholder="********" pattern="(?=^.{8,}$)((?=.*\d)|(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$" title="Password must be 8 characters long and contain Upercase, Lowercase, Number, and Special Character (ex: !@#$%^)."><br></label>
	<input type="submit" name="newPassword" value="Submit Password">-->
</article>

<?php }

?>

</div><!--wrapper-->
