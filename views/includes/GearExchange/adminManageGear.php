<?php
 /************************************************
 * Auther: Howard La Flamme                      *
 * Title: Admin Manage Gear (adminManageGear.php)*
 * Description: Provides forms to manage gear an *
 * 	admin has listed on the Gear Exchange and 	 *
 *  provides ability to remove any listings.     *
 * Revision: 0.1.5 5/6/2015                      *
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
	<h2>Manage Your Gear<br> on the Gear Exchange</h2>
	<p><a class="link" href="index.php?action=<?php echo htmlentities($action)?>" title="Return to Member's Page">Click Here</a> to return to <?php echo htmlentities($page)?> Actions</p>
</article>