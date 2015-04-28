<?php
if (!isset($_SESSION['adminUpdates'])){
	?>
	<article class="content2">

<h2 class="pageTitleH2">Administrator Actions</h3>
  <ul class="menu1">
    <li><a class="link" href="index.php?action=adminUpdate" title="Admin Update">Update Profile</a>
    <li><a class="link" href="index.php?action=gear" title="Gear Exchange">Gear Exchange</a>
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
					<option value="<?php echo htmlentities($hikerLevel['name_lvl'])?>"><?php echo htmlentities($hikerLevel['name_lvl']).' ( '. htmlentities($hikerLevel['description_lvl']).' )';?></option>
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

<div class="form1">
<form action="index.php" method="post" id="addAddress">
	<input type="hidden" name="action" value="addAddress">
	<input type="submit" value="Add Address"/>
</form>
<form action="index.php" method="post" id="memAddressUpdateForm">
<?php
		$errors = errors();
		echo form_errors($errors);
?>
	<input type="hidden" name="action" value="addressUpdate">

		<label>Email:<br>
		<input type="text" name="email" required autofocus value="<?php if(isset($_SESSION['email'])) echo $_SESSION['email'];?>" placeholder="name@email.com" ></label><br>

		<input type="submit" value="Update"/>
	</form>
</div><!--/form-->

</article>

<?php }
?>

