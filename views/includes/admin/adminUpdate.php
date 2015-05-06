<?php
 /************************************************
 * Auther: Howard La Flamme                      *
 * Title: Administration Update (addUpdate.php)  *
 * Description: Provides Forms for updateing  	 *
 *				address. 						 *
 * Revision: 0.1.5 5/6/2015                      *
 ************************************************/

	if (!isset($_SESSION['adminUpdates'])){

?>
<article class="content2">

	<h2>Administrator Actions</h2>
  		<ul>
    		<li><a class="link" href="index.php?action=adminUpdate" title="Admin Update">Update Profile</a>
    		
    		<li><a class="link" href="index.php?action=adminAddUpdate" title="Address Update">Update Address</a>

    		<li><a class="link" href="index.php?action=adminUpdateEmail" title="Update Email">Update Email</a>
    		
    		<li><a class="link" href="index.php?action=adminManageGear" title="Manage Your Gear Exchange Items">Manage Your Gear</a> on the Gear Exchange

    		<li><a class="link" href="index.php?action=manageEvents" title="Manage Events">Manage Events</a>
  		</ul>
</article>

<?php
	}elseif($_SESSION['adminUpdates'] === 'adminUpdate'){
		include('/../updateForms/adminProfileUpdate.php');
	}elseif($_SESSION['adminUpdates'] === 'adminUpdateEmail'){
	include('/../updateForms/updateEmail.php');
	}elseif($_SESSION['adminUpdates'] === 'adminAddUpdate'){
		include('/../updateForms/addUpdate.php');
	}elseif($_SESSION['adminUpdates'] === 'adminManageGear'){
		include('/../gearExchange/adminManageGear.php');
	}elseif($_SESSION['adminUpdates'] === 'manageEvents'){
		include('/../events/manageEvents.php');
	}

?>
