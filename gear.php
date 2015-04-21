<?php 
require_once('functions/session_functions.php');
require_once('functions/validation_functions.php');
include('views/includes/header.php');?>
	




<article class="content1">
	
	<h2 class="pageTitle">Gear Exchange</h2>

	<div>	

<form action="" method="post" id="gearItemSearchForm" name="gearItemSearchForm">
<?php
		$errors = errors();
		echo form_errors($errors);
?>
	

	<input type="hidden" name="action" value="gearItemSearch">

	<input type="text" name="searchItem" placeholder="Item Name">

	<input type="submit" value="Search Gear" />
</form>

</div><!--/form-->
</article>
<article class="contentTable1">
	
	<table class="table1">

		<!--<caption>Events</caption>-->
		
		<thead>
			<tr>
				<th>Item</th><th>Description</th>
				<th>Condition</th><th>Listing Member</th><th>Date Listed</th>
			</tr>
	</thead>
<?php 
	if(!isset($_POST['searchItem'])){
			$gears = getGear();
		}else{
		$item = $_POST['searchItem'];
		$_POST['searchItem'] = null;
		$gears = findGear($item);
	}
		foreach ( $gears as $gear):?>
		
		<tbody>
			<tr>
				<td><?php echo $gear['name_gex']; ?></td>
				<td><?php echo $gear['description_gex']; ?></td>
				<td><?php echo $gear['condition_con']; ?></td>
				<td><?php echo $gear['nickName_usr']; ?></td>
				<td><?php echo $gear['dateAdded_gex'] ?></td>
			</tr>
	<?php endforeach; ?>		
	</tbody></table>	
</article>

<div class="floatReset"></div>
  </article>


<?php include('views/includes/footer.php');
?>
