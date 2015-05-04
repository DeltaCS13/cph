<?php
 /************************************************
 * Auther: Howard La Flamme                      *
 * Title: Address Update (addUpdate.php)         *
 * Description: Provides Forms for updateing  	 *
 *				address. 						 *
 * Revision: 0.1.0 4/30/2015                     *
 ************************************************/

 	if(isset($_SESSION['memberUpdates'])){
 		$action = 'member';
 		$page = 'Member';
 	$_SESSION['memberUpdates'] = NULL;	
 	}elseif(isset($_SESSION['adminUpdates'])){
 		$action = 'admin';
 		$page = 'Administration';
 	$_SESSION['adminUpdates'] = NULL;
 	}
?>

<article class="content2">
	<h2>Update Your Address</h2>
			<form action="index.php" method="post" id="addressUpdateForm">
	<?php
			$errors = errors();
			echo form_errors($errors);
			$_SESSION['memberUpdates']=NULL;

			echo $_SESSION['user_id'];
	?>

				
				<input type="hidden" name="action" value="addressUpdate">

			Address Type:<br>
				<select name="type">
					<option selected value="<?php echo htmlentities($userInfo['type_uad']);?>"><?php echo htmlentities($userInfo['type_uad']);?></option>
					<option value="Home">Home</option>
					<option value="Business">Business</option>
					<option value="Other">Other</option>
				</select><br>

			Address:
				<br><input type="text" name="add1" value="<?php echo htmlentities($userInfo['address1_uad']);?>"><br>
				
			Address 2:
				<br><input type="text" name="add2" value="<?php echo htmlentities($userInfo['address2_uad']);?>"><br>

			Address 3:
				<br><input type="text" name="add3" value="<?php echo htmlentities($userInfo['address3_uad']);?>"><br>
			City:
				<br><input type="text" name="city"  value="<?php echo htmlentities($userInfo['city_uad']);?>"><br>

			State/Provence:
				<br><select name="state">
					<option selected value="<?php echo htmlentities($userInfo['id_sre']);?>"><?php echo htmlentities($userInfo['name_sre']);?></option>
					<?php $states = allRegions();

							foreach ($states as $state): 
					?>
					<option value="<?php echo htmlentities($state['id_sre']);?>"><?php echo htmlentities($state['name_sre']);?></option>
					<?php
						endforeach;
					?>
				</select><br>

			Country (Updated automatically based on State/Province):
				<br><input type="text" name="zipCode" value="<?php echo htmlentities($userInfo['country_cou']);?>"><br>

			Postal/Zip Code:
				<br><input type="text" name="zipCode" value="<?php echo htmlentities($userInfo['postalCode_uad']);?>"><br>

				<input type="submit" value="Update Address" />
		</form>
	</div><!--/form-->
</article>
</article>