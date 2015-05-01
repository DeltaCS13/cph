<?php
/******************************************************
* Auther: Howard La Flamme                            *
* Title: Home Page (pubhome.php)            	  	  *
* Description: Home page that Everyone can see.		  *
* Revision: 0.1.0 4/30/2015                           *
*****************************************************/

 include('views/includes/header.php');
?>
<article class="content1">
	<h1 class="pageTitle">Welcome to the Trail Head</h1>    	
</article>
<!--About CPH-->
<article class="content2">

	<h2>About Us</h2>
		<p>Like many families, we spend far too much time sitting whether it be on the couch watching TV or playing video games, or in front of a computer working, surfing the internet, or playing. We sit and &quot;vegetate&quot;, relax and chill, but rarely get up and out to see the sun, feel the breeze, and sense the earth under our feet. </p>

		<p>This is where the Couch Potato Hikers comes in. Started as a lark to motivate ourselves to get up off the couch and explore this big wonderful world we live in, CPH is growing into a commuity of like minded people that want to get out of the house and explore. Like our community, the CPH website is always growing and improving.</p>

		<p>So wont you join use and share the experience of be part of a community that encourages exploring the great outdoors.</p>
       
</article>
<!-- Events Table -->
<article class="contentTable">
	<h2>Events</h2>
		<p class="eventLink">For more information,<br>Vist the <a class="link" href="index.php?action=events">Events page</a></p>	

	<table>
		
		<thead>
			<tr>
				<th>Name</th><th>Location</th>
				<th>Date/Time</th>
			</tr>
		</thead>
	<?php 
		$events = getEvents();

		foreach ($events as $event):
	?>
		
		<tbody>
			<tr>
				<td><?php echo $event['name_evt']; ?></td>
				<td><?php echo $event['location_evt']; ?></td>
				<td><?php echo $event['dateTime_evt'] ?></td>
			</tr>
	<?php endforeach; ?>		
		</tbody>
	</table>
</article>

<article class="content2">
	<h1>Coming Soon</h1>
		<h2>Hiker Blog</h2>
			<p><a href="index.php?action=blog" title="Hiker Blog">Click Here</a> to visit the Hiker Blog</p>	
</article>

<div class="floatReset"></div>

<?php include('views/includes/footer.php');
?>


