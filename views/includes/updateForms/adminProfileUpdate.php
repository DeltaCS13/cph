<article class="content2">
	<div>	
		<h2>Update Your Profile</h2>
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
				Hiker Level: <?php echo htmlentities($userInfo['name_lvl']);?>
				<br>
				<select name="hikerLevel">
					<option selected value="<?php echo htmlentities($userInfo['name_lvl']);?>"><?php echo htmlentities($userInfo['name_lvl']);?></option>
					
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
</article>