<!--/******************************************************
	 * Auther: Howard La Flamme                     	  *
	 * Title: Member Profile Update (memProfileUpdate.php)*
	 * Description: Provides links for various  		  *
	 *   member actions and forms for updates.      	  *
	 * Revision: 0.1.5 5/6/2015                     	  *
	 *****************************************************/-->

<article class="content2">
	<div>	
		<h2>Update Your Profile</h2>
			<p>Fields marked with an asterisks (<span class="redText">*</span>) are requiered.</p>
		
		<form action="index.php" method="post" id="memUpdateForm">
	<?php
			$errors = errors();
			echo form_errors($errors);
			$_SESSION['memberUpdates']=NULL;
	?>

				
				<input type="hidden" name="action" value="memUpdate">

			First Name <span class="redText">*</span>:<br>
				<input type="text" name="firstName" required autofocus value="<?php if(isset($_SESSION['firstName'])) echo $_SESSION['firstName'];?>"><br>

			Last Name <span class="redText">*</span>:<br>
				<input type="text" name="lastName" required value="<?php if(isset($_SESSION['lastName'])) echo $_SESSION['lastName'];?>"><br>

			Trail Name (User ID) <span class="redText">*</span>:
				<br><input type="text" name="nickName" placeholder="Nick Name" required value="<?php if(isset($_SESSION['nickName'])) echo $_SESSION['nickName'];?>"><br>
				
				<input type="submit" value="Update Profile" />
		</form>
	</div><!--/form-->
	
	<div class="userInfo">
		<p>Access Level: <?php echo htmlentities($_SESSION['accName']); ?></p>
		<p>Hiker Level: <?php echo htmlentities($_SESSION['userLevelName']); ?></p>
	</div>
</article>