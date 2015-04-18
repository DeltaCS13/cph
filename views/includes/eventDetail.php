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