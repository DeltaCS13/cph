<?php
 /************************************************
 * Auther: Howard La Flamme                      *
 * Title: Address Update (addUpdate.php)         *
 * Description: Provides Forms for updateing  	 *
 *				address. 						 *
 * Revision: 0.1.0 4/30/2015                     *
 ************************************************/
 	if(isset($_SESSION['memberUpdates'])){
 		$action = 'member';
 		$page = 'Member';
 	$_SESSION['memberUpdates'] = NULL;	
 	}elseif(isset($_SESSION['adminUpdates'])){
 		$action = 'admin';
 		$page = 'Administration';
 	$_SESSION['adminUpdates'] = NULL;
 	}
	
?>

<article class="content2">
	<h1>Coming Soon</h1>
	<h2>Update Your Address</h2>
	<p><a class="link" href="index.php?action=<?php echo htmlentities($action)?>" title="Return to Member's Page">Click Here</a> to return to <?php echo htmlentities($page)?> Actions</p>
</article>