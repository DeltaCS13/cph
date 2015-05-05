<?php
 /************************************************
 * Auther: Howard La Flamme                      *
 * Title: Update Email (updateEmail.php)         *
 * Description: form to update email 			 *
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
	<h2>Update Your Email</h2>
	<form action="index.php" method="post" id="emailUpdateForm">
		<?php
			$errors = errors();
			echo form_errors($errors);
			$_SESSION['memberUpdates']=NULL;
		?>

				
				<input type="hidden" name="action" value="emailUpdate">

			Email:
				<br><input type="text" name="email" placeholder="example@email.com" required value="<?php echo htmlentities($userInfo['email_uad']);?>"><br>
				
				<input type="submit" value="Update Email" />
		</form>
</article>