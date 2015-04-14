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
				<td><a href="index.php?action=eventDetails"><?php echo $event['name_evt']; $_SESSION['eventDiscName'] = $event['name_evt']?></a></td>
				<td><?php echo $event['location_evt']; ?></td>
				<td><?php echo $event['name_sre']; ?></td>
				<td><?php echo $event['country_cou']; ?></td>
				<td><?php echo $event['dateTime_evt'] ?></td>
			</tr>
	<?php endforeach; ?>		
	</tbody></table>
</article>	
<div class="floatReset"></div>

<article>
	<?php
		if(isset($_SESSION['eventDetail']))
		{
			?><h2><?php echo htmlentities($eventDetail['name_evt'])?></h2>
			<p><?php echo htmlentities($eventDetail['dateTime_evt'])?><br>
			<?php echo htmlentities($eventDetail['discription_evt'])?></p>
	<?php }
		
	?>
</article>
  </article>
  
</div>

<?php include('views/includes/footer.php');
?>
</div>