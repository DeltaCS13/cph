<?php include('views/includes/header.php');?>
    <article class="content1">
    	<h1 class="pageTitle">Welcome to the Trail Head</h1>    	
    </article>

    <article class="content2">
	

      <h2>About Us</h2>
        <p>Zombie ipsum reversus ab viral inferno, nam rick grimes malum cerebro. De carne lumbering animata corpora quaeritis. Summus brains sit​​, morbo vel maleficia? De apocalypsi gorger omero undead survivor dictum mauris. Hi mindless mortuis soulless creaturas, imo evil stalking monstra adventus resi dentevil vultus comedat cerebella viventium. Qui animated corpse, cricket bat max brucks terribilem incessu zomby. The voodoo sacerdos flesh eater, suscitat mortuos comedere carnem virus. Zonbi tattered for solum oculi eorum defunctis go lum cerebro. Nescio brains an Undead zombies. Sicut malus putrid voodoo horror. Nigh tofth eliv ingdead.</p>

        <p>Cum horribilem walking dead resurgere de crazed sepulcris creaturis, zombie sicut de grave feeding iride et serpens. Pestilentia, shaun ofthe dead scythe animated corpses ipsa screams. Pestilentia est plague haec decaying ambulabat mortuos. Sicut zeder apathetic malus voodoo. Aenean a dolor plan et terror soulless vulnerum contagium accedunt, mortui iam vivam unlife. Qui tardius moveri, brid eof reanimator sed in magna copia sint terribiles undeath legionis. Alii missing oculis aliorum sicut serpere crabs nostram. Putridi braindead odores kill and infect, aere implent left four dead.</p>
       
</article>
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