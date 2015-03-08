<?php
//start session
include_once('/functions/session_functions.php');
require_once('/controllers/dbconnect.php');
require_once('/functions/functions.php');

//get action
if (isset($_POST['action'])) {
	$action = $_POST['action'];
echo 'This is the $_POST  ';
echo $action;

} else if (isset($_GET['action'])) {
    $action = $_GET['action'];
} else {
    $action = 'pubhome';
}
//if user not loged in
/*if(!isset($_SESSION['cphmem']))
{
	$action = 'pubhome';
}*/

//perform action
switch($action) {
    case "login":
        $nickName = $_POST['nickName'];
        echo 'NickName: ';
        echo $nickName;

        $password = $_POST['password'];
        echo 'Password :';
        echo $password;
        if (is_valid_login($nickName, $password)) {
           // $_SESSION['cphmem'] = true;
            echo 'YOu are now logged in!';
            //include('view/member/member.php');
        } else {
            echo '   Really getting tired of failure! You must login to view this page.';
            //include('login.php');
        }
        break;
    case "pubhome":
        include('pubhome.php');
        break;
    case "register":
    	$firstName = $_POST['firstName'];
    	$lastName = $_POST['lastName'];
    	$nickName = $_POST['nickName'];
    	$password = $_POST['password'];
    	
    	/*validatNickNameUnique($nickName);
    	
		if($nickNameValid == 0)
		{*/
    	addMember($firstName, $lastName, $nickName, $password);
        include('views/member/member.php');
    	/*}else{
    		$error_message = 'Nick Name is already in use. Please try another.';
    		include('register.php');*/
    	//}
        break;
    
    case "logout":
        $_SESSION = array();   // Clear all session data from memory
        session_destroy();     // Clean up the session ID
        $login_message = 'You have been logged out.';
        include('view/public/logout.php');
        break;
}


?>