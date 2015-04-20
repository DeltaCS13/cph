<?php
if (!isset($_SESSION['adminUpdates'])){
	?>
	<article class="content2">

<h2 class="pageTitleH2">Administrator Actions</h3>
  <ul class="menu1">
    <li><a href="index.php?action=adminUpdate" title="Admin Update">Update Profile</a>
    <li><a href="index.php?action=gear" title="Gear Exchange">Gear Exchange</a>
  </ul>
     

</article>
<?php
}elseif($_SESSION['adminUpdates'] === 'adminUpdate'){
?>
<article class="content2">
	<div class="form1">	
		<h2 class="pageTitleH2">Update Your Profile</h2>
	<form action="index.php" method="post" id="adminUpdateForm">
	<?php
			$errors = errors();
			echo form_errors($errors);
	?>
		
			
		<input type="hidden" name="action" value="admUpdate">

		<label>First Name:<br>
		<input type="text" name="firstName" required autofocus value="<?php if(isset($_SESSION['firstName'])) echo $_SESSION['firstName'];?>"></label><br>

		<label>Last Name:<br>
		<input type="text" name="lastName" required value="<?php if(isset($_SESSION['lastName'])) echo $_SESSION['lastName'];?>"></label><br>

		<label>Trail Name (User ID):
		<br><input type="text" name="nickName" placeholder="Nick Name" required value="<?php if(isset($_SESSION['nickName'])) echo $_SESSION['nickName'];?>"></label><br>
		<label>Current Hiker Level: <?php echo htmlentities($userInfo['name_lvl']);?>
		<br>
		<select name="hikerLevel">
			<?php $hikerLevels = allHikerLevels();
			
				foreach ($hikerLevels as $hikerLevel): ?>
					<option value="<?php echo htmlentities($hikerLevel['name_lvl'])?>"><?php echo htmlentities($hikerLevel['name_lvl']);?>, <?php echo htmlentities($hikerLevel['discription_lvl']);?></option>
				<?php endforeach;?>
			</select>
		</label>
			<br>
		<label>Current Access Level: <?php echo htmlentities($userInfo['accessLvl_ual']);?>
		<br>
		<select name="accessLevel">
			<?php $accessLevels = allAccessLevels();
			
				foreach ($accessLevels as $accessLevel): ?>
					<option value="<?php echo htmlentities($accessLevel['accessLvl_ual'])?>"><?php echo htmlentities($accessLevel['accessLvl_ual']);?></option>
				<?php endforeach;?>
			</select>
			<br></label><br>
		<input type="submit" value="Update" />
	</form>

	</div><!--/form-->
</article>
<div class="form1">	

<!--<form action="index.php" method="post" id="memPassUpdateForm">
<?php
		/*$errors = errors();
		echo form_errors($errors);*/
?>
<fieldset>Update Your Password</fieldset>
<input type="hidden" name="action" value="adminPassUpdate">
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
