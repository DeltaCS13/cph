<article class="content2">
<div class="form1">	
<?php 
	$userID = $_SESSION['user_id'];
	$userAddress = getUserAddress($userID);
	$_SESSION['memberUpdates']= null;
?>
<h2>Update Your Address</h2>
<form action="index.php" method="post" id="addressUpdateForm">
<?php
		$errors = errors();
		echo form_errors($errors);
?>

	<input type="hidden" name="action" value="addUpdate">
	

		<label>Email:<br>
		<input type="text" name="email" required autofocus value="<?php echo htmlentities($userAddress['email_uad']);?>" placeholder="name@email.com" ></label><br>

		<label>Address Type:<br>
		<select name="type" required>
			<option selected><?php echo htmlentities($userAddress['type_uad']);?></option>
			<option value="home">Home</option>
			<option value="business">Business</option>
			<option value="other">Other</option>
		</select>
	</label><br>

	<label>Address<span class="requiered">*</span>:<br>
	<input type="text" name="address1" placeholder="555 Example St" required value="<?php echo htmlentities($userAddress['address1_uad']);?>"></label><br>

	<label>Address 2:<br>
	<input type="text" name="address2" placeholder="optional" value="<?php echo htmlentities($userAddress['address2_uad']);?>"></label><br>

	<label>Address 3:<br>
	<input type="text" name="address3" placeholder="optional" value="<?php echo htmlentities($userAddress['address3_uad']);?>"></label><br>
	
	<label>City<span class="requiered">*</span>:<br>
		<input type="text" name="city" placeholder="Asheville" required value="<?php echo htmlentities($userAddress['city_uad']);?>"></label><br>

	<label>State/Provence<span class="requiered">*</span>:<br>
		<select name="region" required>
			<option selected><?php echo htmlentities($userAddress['name_sre']);?></option>
			<?php $regions = allRegions();
			
				foreach ($regions as $region): ?>
					<option value="<?php echo htmlentities($region['id_sre'])?>"><?php echo htmlentities($region['name_sre']);?></option>
				<?php endforeach;?>
			</select>
		</label><br>	
	
	<label>Country:<br>
		<select name="country">
			<option selected><?php echo htmlentities($userAddress['country_cou']);?></option>
			<?php $countrys = allCountrys();
			
				foreach ($countrys as $country): ?>
					<option value="<?php echo htmlentities($country['id_cou'])?>"><?php echo htmlentities($country['country_cou']);?></option>
				<?php endforeach;?>
			</select>
		</label><br>

		<label>Postal Code/ Zip Code:<br>
		<input type="text" name="zipCode" placeholder="00000-0000" required value="<?php echo htmlentities($userAddress['postalCode_uad']);?>"></label><br>

		<input type="submit" value="Update Address"/>
	</form>
</div>
</article>	