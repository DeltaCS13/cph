<?php
session_start();

function logout()
{
	$_SESSION['nickName'];
	$_SESSION['user_id'];
	$_SESSION['accessLevel'];	
	 $_SESSION = array(); 
	  session_destroy();     // Clean up the session ID
 }

 function errors()
 {
 	if (isset($_SESSION['errors']))
 	{
 		$errors = $_SESSION['errors'];

 		//clear session error
 		$_SESSION['errors'] = null;

 		return $errors;
 	}
 }
?>