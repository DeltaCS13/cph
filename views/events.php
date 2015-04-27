  <?php include('includes/header.php');?>

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
	
	<table>
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

<!-- Event Details-->
<?php
include('includes/events/eventDetail.php');
?>
	
  </article>
  

<div class="floatReset"></div>
<?php include('includes/footer.php');
?>