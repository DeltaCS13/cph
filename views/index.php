<?php
//start session
session_start();
require_once('../controllers/dbconnect.php');
require_once('../functions/functions.php');

//get action
if (isset($_POST['action'])) {
	$action = $_POST['action'];
	echo 'post: ';
	echo $action;
} else if (isset($_GET['action'])) {
    $action = $_GET['action'];
    echo 'get';
    echo $action;
} else {
    $action = 'pubhome';
    echo 'else';
    echo  $action;
}
echo 'this is a test of reg.';
print_r($_POST);
//if user not loged in
/*if(!isset($_SESSION['logedIn']))
{
	$action = 'pubhome';
}*/

//perform action
echo 'switch: ';
echo $action;
switch($action) {
    case "login":
        $nickNmae = $_POST['nickName'];
        $password = $_POST['password'];
        if (is_valid_login($nickName, $password)) {
            $_SESSION['logedIn'] = true;
            include('view/member/member.php');
        } else {
            $login_message = 'You must login to view this page.';
            include('view/login.php');
        }
        break;
    case "pubhome":
        include('../views/public/pubhome.php');
        break;
    case "register":
    	echo 'this is register switch';
    	$firstName = $_POST['firstName'];
    	$lastName = $_POST['lastName'];
    	$nickName = $_POST['nickName'];
    	$password = $_POST['password'];
    	echo 'firstName';
    	echo $firstName;
    	echo 'lastName';
    	echo $lastName;
    	echo 'nickName';
    	echo $nickName;
    	echo 'password';
    	echo $password;
    	addMember($firstName, $lastName, $nickName, $password);
        include('../views/member/member.php');
        break;
    
    case "logout":
        $_SESSION = array();   // Clear all session data from memory
        session_destroy();     // Clean up the session ID
        $login_message = 'You have been logged out.';
        include('view/public/logout.php');
        break;
}


?>