<?php
require_once('/session_functions.php');
require_once('/../controllers/dbconnect.php');
require_once('/validation_functions.php');


//Admin Functions

function adminValidate($action)
{
	if($_SESSION['accessLevel'] === '1')
        {
           include($action.='.php');
           break; 
        } else {
           $_SESSION['error_message'] = 'You must be an Administrator to access the Administration area.';
            include('notloggedinadmin.php');
}
}

function addMember($firstName, $lastName, $nickName, $password){
	
	global $db;

	$password = password_hash($password, PASSWORD_BCRYPT);

	
	$query = 'INSERT INTO user_usr (firstName_usr, lastName_usr, nickName_usr, password_usr)
		VALUES(:firstName, :lastName, :nickName, :password)';
		
		$statement = $db->prepare($query);
		
		$statement->bindValue( ':firstName', $firstName);
		$statement->bindValue( ':lastName', $lastName);
		$statement->bindValue( ':nickName', $nickName);
		$statement->bindValue( ':password', $password);
		$statement->execute();
		$statement->closeCursor();

		return;
		
}

function getMemberByID($userID)
{
	global $db;

	
		$query = $sql = "SELECT `firstName_usr`, `lastName_usr`, `nickName_usr`, name_lvl, accessLvl_ual
    FROM user_usr JOIN level_lvl ON level_lvl_id_lvl = id_lvl
    JOIN accesslevel_ual ON `accessLevel_ual_id_ual` = id_ual
    WHERE id_usr = '$userID'";
			$userInfo = $db->query($query);
			$user=$userInfo->fetch();
			return $user;
}

function find_member($nickName)
{
	global $db;

	$query = $sql = "SELECT * FROM user_usr JOIN accesslevel_ual a on a.id_ual = accessLevel_ual_id_ual JOIN level_lvl l on level_lvl_id_lvl = l.id_lvl WHERE nickName_usr = '$nickName'";

	$user_set = $db->query($query);
	$user_set = $user_set->fetch();
	
	return $user_set;
}

function changePassword($oldPass, $newPass, $reNewPass)
{
	global $db;

	$nickName = $_SESSION['nickName'];
	is_valid_login($nickName, $oldPass);

	if ($oldPass === true)
	{
		$query = 'UPDATE user_usr SET password_usr = :newPass WHERE id_usr = :user_id';
		
		$statement = $db->prepare($query);
		
		$statement->bindValue( ':newPass', $newPass);
		$statement->bindValue( ':user_id', $_SESSION['user_id']);
		$statement->execute();
		$statement->closeCursor();

		return;
	}else{
		$_SESSION['errors'] = 'IncorccectPassword';
		return;
	}

}

//member functions

function memberValidate($action)
{
	if($_SESSION['accessLevel'] === '1' )
        {
           include($action .='.php');
           
        } elseif($_SESSION['accessLevel'] === '2') {

          include('views/includes/members/member.php');
         
        }else{
            $_SESSION['error_message']= 'You must be logged in to see the Members section.';
            include('notloggedinmember.php');
            
        }
}


function memUpdate($fName, $lName, $nName)
{
	
	global $db;
		$query = 'UPDATE user_usr SET firstName_usr = :firstName, lastName_usr = :lastName, nickName_usr = :nickName WHERE id_usr = :user_id';
		
		$statement = $db->prepare($query);
		
		$statement->bindValue( ':firstName', $fName);
		$statement->bindValue( ':lastName', $lName);
		$statement->bindValue( ':nickName', $nName);
		$statement->bindValue( ':user_id', $_SESSION['user_id']);
		$statement->execute();
		$statement->closeCursor();
		$_SESSION['memberUpdates'] = NULL;
		return;
		
}



//Helper functions
function getAccessName($accNum)
{
	global $db;

	$query = $sql = "SELECT accessLvl_ual FROM accesslevel_ual WHERE id_ual = '$accNum'";

	$accResult = $db->query($query);
	$accResult = $accResult->fetch();
	return $accResult;
}

//Miscellaneous Functions


function getGear()
{
	global $db;
	$query = $sql = "Select g.name_gex, g.discription_gex, c.condition_con,u.nickName_usr, g.dateAdded_gex
   					FROM gearexchange_gex g JOIN condition_con c
  					ON g.condition_con_id_con = c.id_con
    				JOIN user_usr u on u.id_usr = g.user_usr_id_usr";
	$result = $db->query($query);
	return $result;
}

function findGear($item)
{
	global $db;
	$query = $sql = "Select g.name_gex, g.discription_gex, c.condition_con,u.nickName_usr, g.dateAdded_gex
   					FROM gearexchange_gex g JOIN condition_con c
  					ON g.condition_con_id_con = c.id_con
    				JOIN user_usr u on u.id_usr = g.user_usr_id_usr
    				WHERE g.name_gex = '$item'";
	$result = $db->query($query);
	return $result;

}
// login functions
function password_check($password, $pwHash)
{
	global $db;
		$hashCheck = password_verify($password, $pwHash);

	if( $hashCheck === true)
	{
		return true;
	} else {
		return false;
	}

}


function is_valid_login($nickName, $password)
{
	global $db;
	
	$user = find_member($nickName);

	if ($user['nickName_usr'] === $nickName) {
			if (password_check($password, $user["password_usr"])){

				
		 	$_SESSION['user_id'] = $user['id_usr'];
		 	$_SESSION['firstName'] = $user['firstName_usr'];
		 	$_SESSION['lastName'] = $user['lastName_usr'];
            
            $_SESSION['nickName'] = $user['nickName_usr'];
          
            $_SESSION['accessLevel'] = $user['accessLevel_ual_id_ual'];

            $_SESSION['accName'] =  $user['accessLvl_ual']; 
            $_SESSION['userLevelName'] = $user['name_lvl'];
           

            
				return $user;
			}else{
			return false;

			}
	}else{
		return false;
	}
}

// error handling functions

function confirm_query($result_set) {
		if (!$result_set) {
			die("Database query failed.");
		}
	}

function form_errors($errors=array())
{
	$output = "";
	if(!empty($errors))
	{
		$output .= "<div class=\"error\">";
		$output .= "Please fix the following errors:";
		$output .= "<ul>";
		foreach ($errors as $key => $error)
		{
			$output .= "<li>{$error}</li>";
		}
		$output .= "</ul>";
		$output .= "</div>";
	}
	return $output;
}


//Event Functions

function getEvents()
{
	global $db;
	$query = $sql = "Select e.name_evt, e.location_evt, s.name_sre,c.country_cou, e.dateTime_evt
   					FROM events_evt e JOIN subregions_sre s
  					ON e.subregions_sre_id_sre = s.id_sre
    				JOIN regions_cou c on s.region_id_sre = c.id_cou
    				ORDER BY dateTime_evt Desc";
	$result = $db->query($query);
	return $result;
}

function  getEventDetails($eventDetail)
{
	global $db;
	$query = $sql = "Select e.name_evt, e.location_evt, s.name_sre,e.discription_evt, c.country_cou, e.dateTime_evt
   					FROM events_evt e JOIN subregions_sre s
  					ON e.subregions_sre_id_sre = s.id_sre
    				JOIN regions_cou c on s.region_id_sre = c.id_cou
    				WHERE e.name_evt = '$eventDetail'";
	$result = $db->query($query);
	$_SESSION['eventDetail'] = $eventDetail;
	
	return $result;

}
