<?php
require_once('controllers/dbconnect.php');
require_once('functions/functions.php');
require_once('functions/validation_functions.php');

//get action
if (isset($_POST['action'])) {
	$action = $_POST['action'];
} else if (isset($_GET['action'])) {
    $action = $_GET['action'];
} else {
    $action = 'pubhome';
}
//if user not logged in
 
if(!isset($_SESSION['accessLevel']))
{
  $_SESSION['accessLevel'] = null;
}

$_SESSION['action'] = $action ; 

//perform action
switch($action) {
    case "login":
        $nickName = $_POST['nickName'];
        $password = $_POST['password'];
        $required_fields = array('nickName', 'password');

validate_presences($required_fields);
  if (!empty($errors))
  {
    $_SESSION["errors"] = $errors;
    include("login.php");
    break;
  }
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
                $_SESSION['error_message']='You entered an invalid Trail Name or Password.';
                
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
    
 $required_fields = array('firstName', 'lastName', 'nickName', 'password');


    	addMember($firstName, $lastName, $nickName, $password);
       
        
        include('login.php');
    	
        break;

    case "member":
       
        memberValidate($action);
        break;
     
      case "admin":
     
       adminValidate($action);
            break;
        
    case "memberUpdate":


        memberValidate($action);
        break;

    case "memUpdate":
      $fName = $_POST['firstName'];
      $lName = $_POST['lastName'];
      $nName = $_POST['nickName'];
      $userID = $_SESSION['user_id'];
      memUpdate($fName, $lName, $nName);

       $userInfo = getMemberByID($userID);

       $_SESSION['firstName']= $userInfo['firstName_usr'];
       $_SESSION['lastName']= $userInfo['lastName_usr'];
       $_SESSION['nickName']= $userInfo['nickName_usr'];
          include('member.php');
      break;

    case "memPassUpdate":

      memberValidate($action);

      $oldPass = $_POST['oldPass'];
      $newPass = $_POST['newPass'];
      $reNewPass = $_POST['reNewPass'];

      changePassword($oldPass, $newPass, $reNewPass);

      include('member.php');
      break;

    case "adminUpdate";

     adminValidate($action);
     break;

    case "admUpdate":
      $fName = $_POST['firstName'];
      $lName = $_POST['lastName'];
      $nName = $_POST['nickName'];
      $hLevel = $_POST['hikerLevel'];
      $aLevel = $_POST['accessLevel'];
      $userID = $_SESSION['user_id'];
      adminUpdate($fName, $lName, $nName, $hlevel, $aLevel);

       $userInfo = getMemberByID($userID);

       $_SESSION['firstName']= $userInfo['firstName_usr'];
       $_SESSION['lastName']= $userInfo['lastName_usr'];
       $_SESSION['nickName']= $userInfo['nickName_usr'];
       $_SESSION['accessLevel']= $userInfo['accessLevel_ual_id_ual'];
      $_SESSION['userLevel']= $userInfo['Level_lvl_id_lvl'];

          include('admin.php');
      break;

    case "gear":

        include('gear.php');
        break;

    case "gearItemSearch";

        include('gear.php');
        break;

    case "events":

    include('events.php');
    break;
    
    case "logout":
    $nickNameLogOut = $_SESSION['nickName'];
      $_SESSION['nickName'];
      $_SESSION['user_id'];
      $_SESSION['accessLevel'];   
      $_SESSION = array(); 
      session_destroy();     // Clean up the session ID
        include('logout.php');
        break;

    case "eventDetails":

      
      $eventName = $_POST['eventName'];
      $_POST['eventName'] = NULL;
      $_SESSION['eventDetail'] = $eventName;
      //$eventDetail = getEventDetails($eventName);

      include('events.php');
      break;

}
?>