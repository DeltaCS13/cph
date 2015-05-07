<?php 
/******************************************************
* Auther: Howard La Flamme                            *
* Title: Address Registration page (regAddress.php)	  *
* Description: Second page of registration for address*
*      and email. 									  *
* Revision: 0.1.5 5/6/2015                            *
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

<div>	
	<?php
			//Field Validation
			$errors = errors();
			echo form_errors($errors);
	?>
		<form action="index.php" method="post" id="registerAddressForm">

			<fieldset><h1>New Member Registration</h1>
						<h3>Add Address</h3></fieldset>
				<p>Fields marked with an asterisks (<span class="redText">*</span>) are requiered.</p>


			<input type="hidden" name="action" value="registerAddress">

			email<span class="requiered">*</span>:<br>
				<input type="text" name="email" placeholder="example@email.com" required value="<?php if(isset($_POST['email'])) echo $_POST['email'];?>"><br>

			Address Type<span class="redText">*</span>:<br>
				<select name="type" required>
					<option value="">Please Select</option>
					<option value="home">Home</option>
					<option value="business">Business</option>
					<option value="other">Other</option>
				</select>
			<br>

			Address<span class="redText">*</span>:<br>
				<input type="text" name="address1" placeholder="555 Example St" required value="<?php if(isset($_POST['address1']))echo $_POST['address1'];?>"><br>

			Address 2:<br>
				<input type="text" name="address2" placeholder="optional" value="<?php if(isset($_POST['address2'])) echo $_POST['address2'];?>"><br>

			Address 3:<br>
				<input type="text" name="address3" placeholder="optional" value="<?php if(isset($_POST['address3'])) echo $_POST['address3'];?>"><br>
			
			City<span class="redText">*</span>:<br>
				<input type="text" name="city" placeholder="Asheville" required value="<?php if(isset($_POST['city'])) echo $_POST['city'];?>"><br>

			State/Provence<span class="redText">*</span>:<br>
				<select name="region" required>
					<option value="">Please Select</option>
					<?php $regions = allRegions();
					
						foreach ($regions as $region): ?>
							<option value="<?php echo htmlentities($region['id_sre'])?>"><?php echo htmlentities($region['name_sre']);?></option>
						<?php endforeach;?>
					</select>
				<br>	
			
			Country:<br>
				<select name="country">
					<option value="">Please Select</option>
					<?php $countrys = allCountrys();
					
						foreach ($countrys as $country): ?>
							<option value="<?php echo htmlentities($country['id_cou'])?>"><?php echo htmlentities($country['country_cou']);?></option>
						<?php endforeach;?>
					</select>
				<br>

			Postal Code/ Zip Code<span span class="redText">*</span>:<br>
				<input type="text" name="zipCode" placeholder="00000-0000" required value="<?php if(isset($_POST['zipCode'])) echo $_POST['zipCode'];?>"><br>

				<input type="submit" value="Continue" />
		</form>

</div><!--/form-->
</article>



<?php
	include('views/includes/footer.php');
?>