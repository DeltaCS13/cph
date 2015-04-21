<?php
session_start();

//login/out functions

	/********************************
	*function name: logout 	 		*
	*arguments: 	           		*
	*returned data: 				*
	*description: logs out current 	*
	*	logged in member and clears *
	*	session variables. 		*
	*Dependencies:					*
	*********************************/
	function logout()
	{
		$_SESSION['nickName'];
		$_SESSION['user_id'];
		$_SESSION['accessLevel'];	
		 $_SESSION = array(); 
		  session_destroy();     // Clean up the session ID
	 }

//Error handling functions
	/********************************
	*function name: errors 			*
	*arguments: 	           		*
	*returned data: $errors			*
	*description: 					*
	*	if $_SESSION['errors'] is 	*
	*	set, $errors is set and 	*
	* 	returned. 					*
	*Dependencies:					*
	*********************************/
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