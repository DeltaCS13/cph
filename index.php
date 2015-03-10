<?php
//start session
session_start();
require_once('controllers/dbconnect.php');
require_once('functions/functions.php');

//get action
if (isset($_POST['action'])) {
	$action = $_POST['action'];
} else if (isset($_GET['action'])) {
    $action = $_GET['action'];
} else {
    $action = 'pubhome';
}
//if user not loged in
 
if(!isset($_SESSION['accessLevel']))
{
  $_SESSION['accessLevel'] = null;
}

   

//perform action
switch($action) {
    case "login":
        $nickName = $_POST['nickName'];
        $password = $_POST['password'];
        
        if (is_valid_login($nickName, $password)) {
       
           
            if($_SESSION['accessLevel'] === '1')
            {
               
               include('admin.php');
               break;
            }
            elseif($_SESSION['accessLevel'] === '2') 
            {
                 
               include('member.php');
                 break;
            }
            else
            {
                $_SESSION['error']='You must be a member to access this page.';
                
                include('login.php');
                break; 
            }
        }
       

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
       
        include('login.php');
    	
        break;

    case "member":
        if($_SESSION['accessLevel'] === '1' )
        {
           include('member.php');
           break; 
        } elseif($_SESSION['accessLevel'] === '2') {

          include('member.php');
          break;
        }else{
            $_SESSION['error_message']= 'You must be loged in to see the Members section.';
            include('login.php');
            break;
        }
     
      case "admin":
     
       if($_SESSION['accessLevel'] === '1')
        {
           include('admin.php');
           break; 
        } else {
           $_SESSION['error_message'] = 'You must be an Admin member to access the Admin area.';
            include('login.php');
            break;
        }
           
    case "logout":
    $nickNameLogOut = $_SESSION['nickName'];
      $_SESSION['nickName'];
      $_SESSION['user_id'];
      $_SESSION['accessLevel'];   
      $_SESSION = array(); 
      session_destroy();     // Clean up the session ID
        include('logout.php');
        break;
}


?>