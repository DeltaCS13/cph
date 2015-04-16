  <?php include('views/includes/header.php');?>

   <article class="content1">
		<h1 class="pageTitle">Events</h1>	
	</article>
<!-- Events Table -->
<?php if (isset($_SESSION['eventDetail']))
{?>
	<article class="contentTable">
<?php }else{
	?>
	<article class="contentTable1">
	<?php
	}?>	
	
	
	<table class="table1">

		<!--<caption>Events</caption>-->
		
		<thead>
			<tr>
				<th>Name</th><th>Location</th>
				<th>Date/Time</th>
			</tr>
	</thead>
	
	<?php 
		$events = getEvents();

		foreach ($events as $event):?>
		
		<tbody>
			<tr><?php $_POST['eventName'] = NULL; ?>
				<td><?php echo $event['name_evt'];?><form action="index.php" method="post" id="SelectEvent"><input type="hidden" name="action" value="eventDetails">
				<input type="hidden" name="eventName" value="<?php echo $event['name_evt'];?>"><input type="submit" value="More Info"></form></td>
				<td><?php echo $event['location_evt']; ?></td>
				
				<td><?php echo $event['dateTime_evt'] ?></td>

			</tr>

	<?php endforeach; ?>
	
	</tbody></table>
</article>	



	<?php
		if(isset($_SESSION['eventDetail']))
		{ ?>
		<article class="content2">
	<?php
			$_SESSION['eventDetail'] = $eventName;
			$eventDetails = getEventDetails($eventName); 
			foreach ($eventDetails as $key => $eventDetail):
				
		
			?><h2 class="pageTitleH2"><?php echo htmlentities($eventDetail['name_evt']);?></h2>
			<h3>When:</h3>
				<p><?php echo htmlentities($eventDetail['dateTime_evt']);
				?></p>
			<h3>Where:</h3>
				<p><?php echo htmlentities($eventDetail['location_evt']); ?><br><?php echo htmlentities($eventDetail['name_sre']);echo ', ';
				 echo htmlentities($eventDetail['country_cou']);?></p>
			<h3>Description:</h3>
			<p><?php echo htmlentities($eventDetail['discription_evt'])?></p>
	<?php endforeach;
	}
	$_SESSION['eventDetail'] = NULL;
	?>
</article>
  </article>
  
</div>
<div class="floatReset"></div>
<?php include('views/includes/footer.php');
?>
</div>