<?php
require_once('controllers/dbconnect.php');
require_once('functions/functions.php');
require_once('functions/validation_functions.php');
require_once('functions/session_functions.php');

//get action
  if (isset($_POST['action'])) {
  	$action = $_POST['action'];
  } else if (isset($_GET['action'])) {
      $action = $_GET['action'];
  } else {
      $action = 'pubhome';
  }
//if user not logged in
 
  if(!isset($_SESSION['nickName']))
  {
    $_SESSION['accessLevel'] = null;
  }

  $_SESSION['action'] = $action ; 
//perform action
  switch($action) {
      case "login":

        include('login.php');
        break;

      case "logMeIn":

          $nickName = $_POST['trail_Name'];
          $password = $_POST['password'];

          $required_fields = array('trail_Name', 'password');

            validate_presences($required_fields);
              if (!empty($errors))
              { 
                $_SESSION["errors"] = $errors;
                include('login.php');
              } 
                if (is_valid_login($nickName, $password)) {
               
                    if($_SESSION['accessLevel'] === '1')
                    { 
                       $action ='admin';
                       include('views/includes/admin/admin.php');
                       break;
                    }
                    elseif($_SESSION['accessLevel'] === '2') 
                    { 
                         $action = 'member';
                       include('views/includes/members/member.php');
                         break;
                    }
               } break;

      case "pubhome":
          
          $_SESSION['selected'] = 'home';
          include('pubhome.php');
          break;

      case "register":

        include('register.php');
        break;

      case "newRegister":

      	$firstName = $_POST['first_Name'];
      	$lastName = $_POST['last_Name'];
      	$nickName = $_POST['trail_Name'];
      	$password = $_POST['password'];
     

      
        $required_fields = array('first_Name', 'last_Name', 'trail_Name', 'password');

        validate_presences($required_fields);
              if (!empty($errors))
              { 
                $_SESSION["errors"] = $errors;
                include('register.php');
              } else {

      	addMember($firstName, $lastName, $nickName, $password);
         
        $_SESSION['trail_Name'] = $nickName;
        
        header('Location:index.php?action=login');
      	}
          break;

      case "member":
         
          memberValidate($action);

          break;
       
      case "admin":
       
         adminValidate($action);
              break;
          
      case "memberUpdate":
          
        $_SESSION['memberUpdates'] = $action;
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
        
        $action = 'member';
        include('views/includes/members/member.php');
        break;

      case "memPassUpdate":

        memberValidate($action);

        $oldPass = $_POST['oldPass'];
        $newPass = $_POST['newPass'];
        $reNewPass = $_POST['reNewPass'];

        changePassword($oldPass, $newPass, $reNewPass);

        include('views/includes/members/member.php');
        break;

      case "adminUpdate";
        $_SESSION['adminUpdates'] = $action;
        adminValidate($action);

        break;

      case "admUpdate":
        $fName = $_POST['firstName'];
        $lName = $_POST['lastName'];
        $nName = $_POST['nickName'];
        $hLevel = $_POST['hikerLevel'];
        $aLevel = $_POST['accessLevel'];
        $userID = $_SESSION['user_id'];
        admUpdate($fName, $lName, $nName, $hLevel, $aLevel);


         $userInfo = getMemberByID($userID);

         $_SESSION['firstName']= $userInfo['firstName_usr'];
         $_SESSION['lastName']= $userInfo['lastName_usr'];
         $_SESSION['nickName']= $userInfo['nickName_usr'];
         $_SESSION['accessLevel']= $userInfo['accessLevel_ual_id_ual'];
         $_SESSION['userLevel']= $userInfo['level_lvl_id_lvl'];

        $action = 'admin';
         include('views/includes/admin/admin.php');
         break;

      case "gear":

          include('gear.php');
          break;

      case "gearItemSearch";
          $action = 'gear';
          include('gear.php');
          break;

      case "events":
      $_SESSION['selected']= 'events';
          include('views/includes/events/events.php');
          break;
       
      case "eventDetails":
        
        $eventName = $_POST['eventName'];

       
        $_POST['eventName'] = NULL;
        $_SESSION['eventDetail'] = $eventName;
        $action = 'events';
        include('views/includes/events/events.php');
        break;

      case "logout":

          $nickNameLogOut = $_SESSION['nickName'];
          logout();
         /* $_SESSION['nickName'];
          $_SESSION['user_id'];
          $_SESSION['accessLevel'];   
          $_SESSION = array(); 
          session_destroy();     // Clean up the session */
          include('logout.php');
          break;

     
  }
?>