<?php
//start session
session_start();
require_once('../controllers/dbconnect.php');
require_once('login.php');
require_once('../functions/functions.php');
//get action
session_start();

//Check if session is set
if (isset($_SESSION['userInfo'])) {
   $userInfo = $_SESSION['userInfo'];

} else {
   $userInfo = array();
}

//perform action
switch($action)
{
	case 'login':
		$nickName = $_POST['nickName'];
		$password = $_POST['password'];
		if (is_valid_login($nickName, $password))
		{
			if ($user->accessLevel_usr == 1)
			{
				include('../admin/admin.php');
			}
		} else if ($user->accessLevel_usr == 2){
				include('../member/member.php');
		} else {
			$error = 'Invalid login';
			include('login.php');
		}

}