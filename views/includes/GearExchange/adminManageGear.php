<?php
 /************************************************
 * Auther: Howard La Flamme                      *
 * Title: Manage Gear (manageGear.php)           *
 * Description: Provides forms to manage gear a  *
 * 		member has listed on the Gear Exchange 	 *
 * Revision: 0.1.0 4/30/2015                     *
 ************************************************/

	if($_SESSION['accessLevel'] === '2'){
 		$action = 'member';
 		$page = 'Member';
 	$_SESSION['memberUpdates'] = NULL;	
 	}elseif($_SESSION['accessLevel'] === '1'){
 		$action = 'admin';
 		$page = 'Administration';
 	$_SESSION['adminUpdates'] = NULL;
 	}
?>

<article class="content2">
	<h1>Coming Soon</h1>
	<h2>Manage Your Gear Exchange</h2>
	<p><a class="link" href="index.php?action=<?php echo htmlentities($action)?>" title="Return to Member's Page">Click Here</a> to return to <?php echo htmlentities($page)?> Actions</p>
</article>