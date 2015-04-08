  <?php include('views/includes/header.php');?>

   <article class="content1">
		<h1 class="pageTitle">Events</h1>	
	</article>
<!-- Events Table -->
<article class="contentTable1">
	
	
	
	<table class="table1">

		<!--<caption>Events</caption>-->
		
		<thead>
			<tr>
				<th>Name</th><th>Location</th>
				<th>State</th><th>Country</th><th>Date/Time</th>
			</tr>
	</thead>
	<?php 
		$events = getEvents();

		foreach ($events as $event):?>
		
		<tbody>
			<tr>
				<td><?php echo $event['name_evt']; ?></td>
				<td><?php echo $event['location_evt']; ?></td>
				<td><?php echo $event['name_sre']; ?></td>
				<td><?php echo $event['country_cou']; ?></td>
				<td><?php echo $event['dateTime_evt'] ?></td>
			</tr>
	<?php endforeach; ?>		
	</tbody></table>
</article>	
<div class="floatReset"></div>
  </article>
  
</div>

<?php include('views/includes/footer.php');
?>
</div>