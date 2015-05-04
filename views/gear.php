<?php 
/******************************************************
* Auther: Howard La Flamme                            *
* Title: Gear Exhange (gear.php)            	      *
* Description: Displays Gear for sale/trade. 		  *
* Revision: 0.1.0 4/30/2015                           *
*****************************************************/
	include('includes/header.php');
?>

<article class="content1">
	<h1>Gear Exchange</h1>
</article>

<article class="contentTable1">
	<form action="" method="post" id="gearItemSearchForm" name="gearItemSearchForm">
		<?php
			$errors = errors();
			echo form_errors($errors);
		?>

		<input type="hidden" name="action" value="gearItemSearch">

		<input type="text" name="searchItem" placeholder="Item Name">

		<input type="submit" value="Search Gear" />
	</form>
	
	<table>
		
		<tr>
			<th>Item</th><th>Description</th>
			<th>Condition</th><th>Listing Member</th><th>Date Listed</th>
		</tr>
	
		<?php 
				
			if(!isset($_POST['searchItem'])){
					$gears = getGear();
				}else{
				$item = $_POST['searchItem'];
				$_POST['searchItem'] = null;
				$gears = findGear($item);
				
					if(isset($_SESSION['error_message']))
						{
							?><h3><span class='redText'>Sorry, <?php echo htmlentities($_SESSION['error_message']);?>, Please try again.</span></h3>
							<?php 
							$_SESSION['error_message']= NULL;
						}
				

				}

				foreach ( $gears as $gear): 
			?>
		<tbody>
			<tr>
				<td><?php echo $gear['name_gex']; ?></td>
				<td><?php echo $gear['description_gex']; ?></td>
				<td><?php echo $gear['condition_con']; ?></td>
				<td><?php echo $gear['nickName_usr']; ?></td>
				<td><?php echo $gear['dateAdded_gex']; ?></td>
			</tr>
			<?php endforeach; ?>		
		</tbody>
	</table>	
</article>

<div class="floatReset"></div>

<?php 
	include('views/includes/footer.php');
?>
