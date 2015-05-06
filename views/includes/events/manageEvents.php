<?php
 /************************************************
 * Auther: Howard La Flamme                      *
 * Title: Manage Events (manageEvent.php)        *
 * Description: Provides forms for administrators*
 * 			to manage Evnets  					 *
 * Revision: 0.1.5 5/6/2015                      *
 ************************************************/
if($_SESSION['accessLevel'] === '1'){
 		$action = 'admin';
 		$page = 'Administration';
 	$_SESSION['adminUpdates'] = NULL;
 	}
?>

<article class="content2">
	<h1>Coming Soon</h1>
	<h2>Manage Events</h2>
	<p><a class="link" href="index.php?action=<?php echo htmlentities($action)?>" title="Return to Administrator Page">Click Here</a> to return to <?php echo htmlentities($page)?> Actions</p>
</article>