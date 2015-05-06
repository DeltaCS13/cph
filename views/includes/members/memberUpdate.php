
<?php
/************************************************
 * Auther: Howard La Flamme                     *
 * Title: Member Update (memberUpdate.php)      *
 * Description: Provides links for various  	*
 *   member actions and forms for updates.      *
 * Revision: 0.1.5 5/6/2015                     *
 ************************************************/

	if (!isset($_SESSION['memberUpdates']))
	{
?>
<article class="content2">

	<h2>Member Actions</h2>
	  <ul>
	    
	    <li><a class="link" href="index.php?action=memProfileUpdate" title="Member Update">Update Profile</a>
	    
	    <li><a class="link" href="index.php?action=updateEmail" title="Update Email">Update Email</a>
	    
	    <li><a class="link" href="index.php?action=updateAddress" title="Update Address">Update Address</a>
	    
	    <li><a class="link" href="index.php?action=manageGear" title="Manage Your Gear Exchange Items">Manage Your Gear</a> on the Gear Exchange
	  </ul>
</article>
<?php
	}elseif($_SESSION['memberUpdates'] === 'memProfileUpdate'){
		include('/../updateForms/memProfileUpdate.php');
 	}elseif($_SESSION['memberUpdates'] === 'updateEmail'){
	include('/../updateForms/updateEmail.php');
	}elseif($_SESSION['memberUpdates'] === 'updateAddress'){
	include('/../updateForms/addUpdate.php');
	}elseif($_SESSION['memberUpdates'] === 'manageGear'){
	include('/../gearExchange/manageGear.php');
	}
?>


