  <?php include('views/includes/header.php');?>

   
<!-- Events Table -->
<article class="contentTable">
		
	<form class= "eventSearch" action="index.php?eventSearch" method="post" id="eventSearch">
			<fieldset>
				<input type="text" name="eventSearch" placeholder="Search Events">
					<input type="submit" value="Search">
					
			</fieldset>
	</form>	
	<table class="table1">

		<caption>Events</caption>
		
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