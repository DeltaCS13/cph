<!--/******************************************************
	 * Auther: Howard La Flamme                     	  *
	 * Title: Admin Profile Update (adminProfileUpdate.php)*
	 * Description: Provides links for various  		  *
	 *   admin actions and forms for updates.        	  *
	 * Revision: 0.1.5 5/6/2015                     	  *
	 *****************************************************/-->
<article class="content2">
	<div>	
		<h2>Update Your Profile</h2>
			<form action="index.php" method="post" id="adminUpdateForm">
			<?php
					$errors = errors();
					echo form_errors($errors);
			?>
				
					
				<input type="hidden" name="action" value="admUpdate">

				First Name:<br>
					<input type="text" name="firstName" required autofocus value="<?php if(isset($_SESSION['firstName'])) echo $_SESSION['firstName'];?>"><br>

				Last Name:<br>
					<input type="text" name="lastName" required value="<?php if(isset($_SESSION['lastName'])) echo $_SESSION['lastName'];?>"><br>

				Trail Name (User ID):
					<br><input type="text" name="nickName" placeholder="Nick Name" required value="<?php if(isset($_SESSION['nickName'])) echo $_SESSION['nickName'];?>"><br>
				
				Hiker Level:<br>
				<select name="hikerLevel">
					<option selected value="<?php echo htmlentities($userInfo['name_lvl']);?>"><?php echo htmlentities($userInfo['name_lvl']);?></option>
					
					<?php $hikerLevels = allHikerLevels();
							
						foreach ($hikerLevels as $hikerLevel): ?>
							<option value="<?php echo htmlentities($hikerLevel['name_lvl'])?>"><?php echo htmlentities($hikerLevel['name_lvl']).' ( '. htmlentities($hikerLevel['description_lvl']).' )';?></option>
						<?php endforeach;?>
					</select>
				
					<br>
				Access Level:<br>
					<select name="accessLevel">
						<?php $accessLevels = allAccessLevels();
					
							foreach ($accessLevels as $accessLevel): ?>
								<option value="<?php echo htmlentities($accessLevel['accessLvl_ual'])?>"><?php echo htmlentities($accessLevel['accessLvl_ual']);?></option>
						<?php endforeach;?>
					</select>
					<br><br>
				<input type="submit" value="Update" />
			</form>
	</div><!--/form-->
</article>