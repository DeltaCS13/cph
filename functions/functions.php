<?php
require_once('session_functions.php');
require_once('/../controllers/dbconnect.php');
require_once('validation_functions.php');



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

function addMember($firstName, $lastName, $nickName, $password){
	
	global $db;
		/*$firstName = $_POST['firstName'];
    	$lastName = $_POST['lastName'];
    	$nickName = $_POST['nickName'];
    	$password = $_POST['password'];*/
	//Validation
  /*$required_fields = array('firstName', 'lastName', 'nickName', 'password');

  validate_presences($required_fields);

  if (!empty($errors))
  {
    $_SESSION["errors"] = $errors;
    redirect_to("/../register.php");
  }*/


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

function find_member($nickName)
{
	global $db;

	$query = $sql = "SELECT * FROM user_usr WHERE nickName_usr = '$nickName'";



	$user_set = $db->query($query);
	$user_set = $user_set->fetch();
	

	
	return $user_set;
}

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
            
            $_SESSION['nickName'] = $user['nickName_usr'];
            
            $_SESSION['accessLevel'] = $user['accessLevel_ual_id_ual'];
           

            
				return $user;
			}else{
			return false;

			}
	}else{
		return false;
	}
}

function getEvents()
{
	global $db;
	$query = $sql = "Select e.name_evt, e.location_evt, s.name_sre,c.country_cou, e.dateTime_evt
   					FROM events_evt e JOIN subregions_sre s
  					ON e.subregions_sre_id_sre = s.id_sre
    				JOIN regions_cou c on s.region_id_sre = c.id_cou";
	$result = $db->query($query);
	return $result;
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


//Validation Functions
