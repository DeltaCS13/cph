<?php 
session_start();
	require_once('functions/functions.php');
?>
<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>Couch Potato Hikers</title>
<link href="assets/maincss.css" rel="stylesheet" >
<meta name="viewport" content="initial-scale=1.0" />
</script>
</head>
<body >
<header>
  <h1>Couch Potato Hikers</h1>
  <nav>
    <ul>
      <li ><a class="selected" href=" " title="Home">Trail Head</a>
      <li><a href="login.php" title="Login">Login</a>
      <li><a href="register.php" title="registration">Join Use</a>
      <li><a href="index.php?action=member" title="Member's Only">Members Only</a>
      <li><a href="index.php?action=admin" title="Administratoin">Admins Only</a>
    </ul>
  </nav>
</header>

<div id="contentWrapper">
<article class="content1">

	<?php 
	if(isset($_SESSION['nickName']))
		{?>
	<p>Welcome <?php echo htmlentities($_SESSION['nickName']); ?>.<br> Not <?php echo htmlentities($_SESSION['nickName']); ?>, <a href="index.php?action=logout">Please Log Out</a></p><?php } ?>
</article>
  <article id="mainContent">
    <article class="content1">
      <h2>About Us</h2>
        <p>Zombie ipsum reversus ab viral inferno, nam rick grimes malum cerebro. De carne lumbering animata corpora quaeritis. Summus brains sit​​, morbo vel maleficia? De apocalypsi gorger omero undead survivor dictum mauris. Hi mindless mortuis soulless creaturas, imo evil stalking monstra adventus resi dentevil vultus comedat cerebella viventium. Qui animated corpse, cricket bat max brucks terribilem incessu zomby. The voodoo sacerdos flesh eater, suscitat mortuos comedere carnem virus. Zonbi tattered for solum oculi eorum defunctis go lum cerebro. Nescio brains an Undead zombies. Sicut malus putrid voodoo horror. Nigh tofth eliv ingdead.</p>

        <p>Cum horribilem walking dead resurgere de crazed sepulcris creaturis, zombie sicut de grave feeding iride et serpens. Pestilentia, shaun ofthe dead scythe animated corpses ipsa screams. Pestilentia est plague haec decaying ambulabat mortuos. Sicut zeder apathetic malus voodoo. Aenean a dolor plan et terror soulless vulnerum contagium accedunt, mortui iam vivam unlife. Qui tardius moveri, brid eof reanimator sed in magna copia sint terribiles undeath legionis. Alii missing oculis aliorum sicut serpere crabs nostram. Putridi braindead odores kill and infect, aere implent left four dead.</p>
       
</article>

<article class="contentTable">
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

  </article>
  
</div>

<footer class="pageFooter1">
 <article class="contentFooter"> 
  	 <ul>
	    <li><a href=" " title="Home">Trail Head</a>
      	<li><a href="login.php" title="Login">Login</a>
      	<li><a href="register.php" title="registration">Join Use</a>
       	<li><a href="index.php?action=member" title="Member's Only">Members Only</a>
      	<li><a href="index.php?action=admin" title="Administratoin">Admins Only</a>
 	</ul>
  
  	<p>&copy;Copyright  Couch Potato Hikers.  All rights reserved. </p>
  </article>
  
</footer>
</body>
</html>
