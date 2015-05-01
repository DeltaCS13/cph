<?php 
/******************************************************
* Auther: Howard La Flamme                            *
* Title: Address Registration page (regAddress.php)	  *
* Description: Second page of registration for address*
*      and email. 									  *
* Revision: 0.1.0 4/30/2015                           *
*****************************************************/

require_once('functions/session_functions.php');
require_once('functions/validation_functions.php');
include('views/includes/header.php');

?>
	
<article class="content1">
<?php 
	if (isset($error_message))
	{
		echo $error_message;
	}

?>

<div class="form1">	
<?php
		//Field Validation
		$errors = errors();
		echo form_errors($errors);
?>
<form action="index.php" method="post" id="registerAddressForm">

	<fieldset><h1>New Member Registration</h1>
				<h3>Add Address</h3></fieldset>
		<p>Fields marked with an asterisks (*) are requiered.</p>


	<input type="hidden" name="action" value="registerAddress">

	<label>email<span class="requiered">*</span>:<br>
	<input type="text" name="email" placeholder="example@email.com" required value="<?php if(isset($_POST['email'])) echo $_POST['email'];?>"></label><br>

	<label>Address Type:<br>
		<select name="type" required>
			<option value="home">Home</option>
			<option value="business">Business</option>
			<option value="other">Other</option>
		</select>
	</label><br>

	<label>Address<span class="requiered">*</span>:<br>
	<input type="text" name="address1" placeholder="555 Example St" required value="<?php if(isset($_POST['address1']))echo $_POST['address1'];?>"></label><br>

	<label>Address 2:<br>
	<input type="text" name="address2" placeholder="optional" value="<?php if(isset($_POST['address2'])) echo $_POST['address2'];?>"></label><br>

	<label>Address 3:<br>
	<input type="text" name="address3" placeholder="optional" value="<?php if(isset($_POST['address3'])) echo $_POST['address3'];?>"></label><br>
	
	<label>City<span class="requiered">*</span>:<br>
		<input type="text" name="city" placeholder="Asheville" required value="<?php if(isset($_POST['city'])) echo $_POST['city'];?>"></label><br>

	<label>State/Provence<span class="requiered">*</span>:<br>
		<select name="region" required>
			<option selected></option>
			<?php $regions = allRegions();
			
				foreach ($regions as $region): ?>
					<option value="<?php echo htmlentities($region['id_sre'])?>"><?php echo htmlentities($region['name_sre']);?></option>
				<?php endforeach;?>
			</select>
		</label><br>	
	
	<label>Country:<br>
		<select name="country">
			<option selected></option>
			<?php $countrys = allCountrys();
			
				foreach ($countrys as $country): ?>
					<option value="<?php echo htmlentities($country['id_cou'])?>"><?php echo htmlentities($country['country_cou']);?></option>
				<?php endforeach;?>
			</select>
		</label><br>

		<label>Postal Code/ Zip Code:<br>
		<input type="text" name="zipCode" placeholder="00000-0000" required value="<?php if(isset($_POST['zipCode'])) echo $_POST['zipCode'];?>"></label><br>

	<input type="submit" value="Continue" />
</form>

</div><!--/form-->
</article>



<?php include('views/includes/footer.php');
?>