<?php
/************************************************
 * Auther: Howard La Flamme                     *
 * Title: Functions (functions.php)             *
 * Description: function providing functionality*
 * Revision: 0.1.0 4/30/2015                    *
 ************************************************/
	require_once('/session_functions.php');
	require_once('/../controllers/dbconnect.php');
	require_once('/validation_functions.php');



	/********************************
	*function name: form_errors 	*
	*arguments: $errors (array)    	*
	*returned data: if error returns*
	*  	error message. 				*
	*description: if errors in for 	*
	*	are found, returns error 	*
	*		message.				*
	*Dependencies: 					*
	*********************************/
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

// login functions

	/********************************
	*function name: captchaValidate	*
	*arguments:     				*
	*returned data: 				*
	*description: If captcha test   *
	*not passed will not allow login*
	*Dependencies: 					*
	*********************************/

	function captchaValidate()
	{
		$secret = "6Le_MgYTAAAAAG77bicOJQUy3GtoLot5YP6WrCl8";
        $ip = $_SERVER['REMOTE_ADDR'];
        $captcha = $_POST['g-recaptcha-response'];
        $rsp = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=$secret&response=$captcha&remoteip=$ip");
        $arr = json_decode($rsp,TRUE);
        if($arr['success'])
        {
        	return;
        }else{
            $_SESSION['error_message'] = 'Invalid Captcha Validation';
            include('./views/login.php');
            break;
      }

	}

	/********************************
	*function name: password_check 	*
	*arguments: $password, $pwHash 	*
	*returned data: 				*
	*description: checks entered 	*
	*	 password against stored 	*
	*	 password. 					*
	*Dependencies: 					*
	*********************************/
	function password_check($password, $pwHash)
	{
		global $db;
			$hashCheck = password_verify($password, $pwHash);

		if( $hashCheck === true)
		{
			return true;
		} else {
			$_SESSION['error_message']='You entered an invalid Trail Name or Password.';
                        $action = 'login';
                        include('views/login.php');
		}

	}

	/********************************
	*function name: is_valid_login 	*
	*arguments: $password, $nickname*
	*returned data: user information*
	*description: checks entered 	*
	*	 password  and userID(Nick 	*
	*	 Name) against stored 	 	*
	*	 password and userID, if  	*
	*	passed, returns user  		*
	*	information and sets related*
	*	session	variables. 			*
	*Dependencies: 					*
	*********************************/
	function is_valid_login($nickName, $password)
	{
		global $db;
		$action = $_POST['action'];

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
	           
	            if($user['accessLevel_ual_id_ual'] === '2'){
	            	$_SESSION['memberUpdates'] = 'member';
	            }elseif($user['accessLevel_ual_id_ual'] === '1'){
	            	$_SESSION['memberUpdates'] = 'admin';
					
	            }return $user;
				}else{
				return false;

				}
			}else{
		 	$_SESSION['error_message']='You entered an invalid Trail Name or Password.';
	                $action = 'login';
	                include('views/login.php');
	               
		
		}
	}

//Admin Functions

	/********************************
	*function name: adminValisdate 	*
	*arguments: $action            	*
	*returned data:
	*description: directs to 		*
	*	admin page based on access  *
	*	level 						*
	*Dependencies:
	*********************************/
	function adminValidate($action)
	{
		if($_SESSION['accessLevel'] === '1')
	        {echo $_SESSION['adminUpdates'];
	        	$action = 'admin';
	           include('/views/admin.php');
	            
	        } else {
	           $_SESSION['error_message'] = 'You must be an Administrator to access the Administration area.';
	            include('errors/403.php');
			}
	}

	/********************************
	*function name: admUpdate 		*
	*arguments: $fName, $lName, 	*
	*			$nName, $hLevel,	*
	*			$aLevel            	*
	*returned data: 				*
	*description: Updates Admin		*
	*	information based on user   *
	*	input. 						*
	*Dependencies:					*
	*********************************/
	function admUpdate($fName, $lName, $nName, $hLevel,
						$aLevel)
	{
		$hikerLevel = getHikerLevelID($hLevel);
		
		$accessLevel = getAccessLevelID($aLevel);

		global $db;
			$query = 'UPDATE user_usr SET firstName_usr = :firstName, lastName_usr = :lastName, nickName_usr = :nickName, level_lvl_id_lvl= :hikerLevel, accessLevel_ual_id_ual = :accessLevel  WHERE id_usr = :user_id';
			
			$statement = $db->prepare($query);
			
			$statement->bindValue( ':firstName', $fName);
			$statement->bindValue( ':lastName', $lName);
			$statement->bindValue( ':nickName', $nName);
			$statement->bindValue( ':hikerLevel', $hikerLevel['id_lvl']);
			$statement->bindValue( ':accessLevel', $accessLevel['id_ual']);
			$statement->bindValue( ':user_id', $_SESSION['user_id']);
			$statement->execute();
			$statement->closeCursor();
			$_SESSION['adminUpdates'] = NULL;
			return;
			
	}


//member functions

	/********************************
	*function name: memberValidate	*
	*arguments: $action            	*
	*returned data: 				*
	*description: Directs user to 	*
	*	member's area page if 		*
	* 	they are a valid member or 	*
	*	admin.						*
	*Dependencies:					*
	*********************************/
	function memberValidate($action)
	{
		if($_SESSION['accessLevel'] === '1' )
	        {
	        	$_SESSION['action'] = 'member';
	           	include('views/member.php');
	        } elseif($_SESSION['accessLevel'] === '2') {
	          	include('views/member.php');
	        }else{
	            $_SESSION['error_message']= 'You must be logged in to see the Members section.';
	            include('errors/403.php');
	        }
	}

	/********************************
	*function name: memUpdate	*
	*arguments: $fName, $lName, 	*
	*			$nName            	*
	*returned data: 				*
	*description: User enters First *
	*	name, last name, and 		*
	*		nickname to update 		*
	* 		profile 			 	*
	*Dependencies:					*
	*********************************/
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

//Member and Admin functions (functions used for both)

	/********************************
	*function name: getMemberByID	*
	*arguments: $userID            	*
	*returned data: First name, Last*
	*	nick name, user level (name *
		and ID), access level (name *
		and ID)						*
	*description: returns user info *
	*	for use in the member's and *
	*		administrator's areas by*
	* 		using the user ID.
	*Dependencies:					*
	*********************************/
	function getMemberByID($userID)
	{
		global $db;

		
			$query = $sql = "SELECT * FROM user_usr JOIN level_lvl ON level_lvl_id_lvl = id_lvl JOIN accesslevel_ual ON `accessLevel_ual_id_ual` = id_ual JOIN useraddress_uad ON user_usr_id_usr = id_usr JOIN subregions_sre ON subregions_sre_id_sre = id_sre JOIN regions_cou ON id_cou = region_id_sre
			    WHERE id_usr = '$userID'";
			    
				$userInfo = $db->query($query);
				$user=$userInfo->fetch();
			
				return $user;
	}

	/********************************
	*function name: find_member		*
	*arguments: $nickName           *
	*returned data: First name, Last*
	*	nick name, user level (name *
	*	and ID), access level (name *
	*	and ID)						*
	*description: returns user info *
	*	for use in the member's and *
	*		administrator's areas 	*
	*		using the user's 		*
	*		nick name 				*
	*Dependencies:					*
	*********************************/
	function find_member($nickName)
	{
		global $db;

		$query = $sql = "SELECT * FROM user_usr JOIN accesslevel_ual a on a.id_ual = accessLevel_ual_id_ual JOIN level_lvl l on level_lvl_id_lvl = l.id_lvl WHERE nickName_usr = '$nickName'";

		$user_set = $db->query($query);
		$user_set = $user_set->fetch();
		
		return $user_set;
	}

	/********************************
	*function name: addAddress 		*
	*arguments: $email, $address1, 	*
	*	 $address2, $address3, 		*
	*	$city, $zipCode, $region, 	*
	*	 		        			*
	*returned data: 				*
	*description: User enters 		*
	*	address info to entrer into *
	*		database 				*
	*	 	to update profile 	 	*
	*Dependencies:					*
	*********************************/
	function addAddress( $email, $type, $address1, $address2, $address3, $city, $zipCode, $region)
	{
		$nickName = $_SESSION['trail_Name'];
		$user = find_member($nickName);
		$userID = $user['id_usr'];

	

		global $db;
			$query = "INSERT INTO useraddress_uad(`user_usr_id_usr`, `type_uad`, `address1_uad`, `address2_uad`, `address3_uad`, `city_uad`, `subregions_sre_id_sre`, `postalCode_uad`, `email_uad`) VALUES (:userID,:type,:add1,:add2,:add3,:city,:subReg,:zip,:email)";
			
			$statement = $db->prepare($query);
			
			$statement->bindValue( ':userID', $userID);
			$statement->bindValue( ':type', $type);
			$statement->bindValue( ':add1', $address1);
			$statement->bindValue( ':add2', $address2);
			$statement->bindValue( ':add3', $address3);
			$statement->bindValue( ':city', $city);
			$statement->bindValue( ':subReg', $region);
			$statement->bindValue( ':zip', $zipCode);
			$statement->bindValue( ':email', $email);
			
			$statement->execute();
			$statement->closeCursor();
			
			return;
			
	}


	/********************************
	*function name: updateEmail		*
	*arguments: $email
	*returned data: 				*
	*description: User enters 		*
	*	new email to update in the  *
	*		database 				*
	*Dependencies:					*
	*********************************/
	function updateEmail($email)
	{
			global $db;

			$query= $sql = "UPDATE useraddress_uad SET email_uad=:email WHERE user_usr_id_usr = :userID";

			$statement = $db->prepare($query);
			
			$statement->bindValue( ':userID', $_SESSION['user_id']);
			$statement->bindValue( ':email', $email);

			$statement->execute();
			$statement->closeCursor();

	}
	/********************************
	*function name: addressUpdate	*
	*arguments: $type, $add1, 		*
	*	 $add2, $add3, 				*
	*	$city, $zipCode, $state 	*
	*	 		        			*
	*returned data: 				*
	*description: User enters 		*
	*	address info to update in   *
	*		database 				*
	*	 	to update profile 	 	*
	*Dependencies:					*
	*********************************/
	function addressUpdate($userID, $type, $add1, $add2, $add3, $city, $state, $zipCode)
	{
global $db;

	$query = $sql = "UPDATE useraddress_uad SET type_uad=:type,address1_uad=:add1 ,address2_uad=:add2 ,address3_uad=:add3 ,city_uad=:city ,subregions_sre_id_sre=:state ,postalCode_uad=:zip WHERE user_usr_id_usr = :userID";

		$statement = $db->prepare($query);
			
		$statement->bindValue( ':userID', $userID);
		$statement->bindValue( ':type', $type);
		$statement->bindValue( ':add1', $add1);
		$statement->bindValue( ':add2', $add2);
		$statement->bindValue( ':add3', $add3);
		$statement->bindValue( ':city', $city);
		$statement->bindValue( ':state', $state);
		$statement->bindValue( ':zip', $zipCode);

		$statement->execute();
		$statement->closeCursor();


	}
	/********************************
	*function name: getUserAddress	*
	*arguments: 		          	*
	*returned data: all user address*
	* 				Info. 			*
	*description: gets all user 	* 
	*   	address information		*
	*     according to user ID 		*
	*Dependencies:					*
	*********************************/
	function getUserAddress($userID)
	{echo 'in get address function :'.$userID;
		global $db;

		$query = $sql = "SELECT * FROM useraddress_uad JOIN subregions_sre ON subregions_sre_id_sre = id_sre JOIN regions_cou ON region_id_sre = id_cou WHERE user_usr_id_usr = '$userID'";

		$user_set = $db->query($query);
		$userAddress = $user_set->fetch();
		$_SESSION['email_uad'] = $userAddress['email_uad'];
		return $userAddress; 

	}

	
//Public Functions

	/********************************
	*function name: addMember 		*
	*arguments: $firstName, 		*
	*	$lastName, $nickName, 		*
	*	$password           		*
	*returned data: 				*
	*description: On successful 	*
	*	registration, user is added *
	*	to database and redirected	*
	* 	to the login page. 			*
	*Dependencies:					*
	*********************************/
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

	/********************************
	*function name: allCountrys 	*
	*arguments:	$regionID			*
	*returned data: All Regions 	*
	*				 Listing 		*
	*description: returns all 		*
	* 	rows in regions_cou		 	*
	*	table. 						*
	*Dependencies:					*
	*********************************/
	function allCountrys()
	{
		global $db;
		$query = $sql = "Select * FROM regions_cou ORDER BY country_cou DESC";

	    $result = $db->query($query);
		return $result;
	}

	/********************************
	*function name: allRegions	 	*
	*arguments:	$regionID			*
	*returned data: All Regions 	*
	*				 Listing 		*
	*description: returns all 		*
	* 	rows in regions_cou		 	*
	*	table. 						*
	*Dependencies:					*
	*********************************/
	function allRegions()
	{
		global $db;
		$query = $sql = "Select * FROM subregions_sre ORDER BY name_sre";

				
		$result = $db->query($query);
		return $result;
	}

//gear exchange functions

	/********************************
	*function name: getGear 		*
	*arguments:						*
	*returned data: All Gear Listing*
	*description: returns all 		*
	* 	rows in gearExchange_gex 	*
	*	table. 						*
	*Dependencies:					*
	*********************************/
	function getGear()
	{
		global $db;
		$query = $sql = "Select g.name_gex, g.description_gex, c.condition_con,u.nickName_usr, g.dateAdded_gex
	   					FROM gearexchange_gex g JOIN condition_con c
	  					ON g.condition_con_id_con = c.id_con
	    				JOIN user_usr u on u.id_usr = g.user_usr_id_usr";
		$result = $db->query($query);
		return $result;
	}

	/********************************
	*function name: getUserGear		*
	*arguments:	$userID				*
	*returned data: All Gear Listed *
	*  by user. 					*
	*description: returns all 		*
	* 	rows in gearExchange_gex 	*
	*	table by user ID. 			*
	*Dependencies:					*
	*********************************/
	function getUserGear($userID)
	{
		global $db;
		$query = $sql = "Select g.id_gex, g.name_gex, g.description_gex, c.condition_con, g.dateAdded_gex
	   					FROM gearexchange_gex g JOIN condition_con c
	  					ON g.condition_con_id_con = c.id_con
	    				JOIN user_usr u on u.id_usr = g.user_usr_id_usr
	    				WHERE user_usr_id_usr = '$userID'";
		
		$result = $db->query($query);
	
		return $result;
	}

	/********************************
	*function name: findGear 		*
	*arguments: $item          		*
	*returned data: search results	*
	*description: search 			*
	* 	gearExchange_gex for gear 	*
	*	listing based on item name 	*
	*	inputed by user.			*
	*Dependencies:					*
	*********************************/
	function findGear($item)
	{
		global $db;
		$query = $sql = "Select g.name_gex, g.description_gex, c.condition_con,u.nickName_usr, g.dateAdded_gex
	   					FROM gearexchange_gex g JOIN condition_con c
	  					ON g.condition_con_id_con = c.id_con
	    				JOIN user_usr u on u.id_usr = g.user_usr_id_usr
	    				WHERE g.name_gex = '$item'";
		

		$result = $db->query($query);
		$result= $result->fetchAll();	
		confirm_results($result);
		return $result;
	}

//Event Functions

	/********************************
	*function name: getEvents 		*
	*arguments: 	           		*
	*returned data: all events from *
	*	events_evt table			*
	*description: returns all 		*
	*	information from events_evt *
	*	table to populate lists.	*
	*Dependencies:					*
	*********************************/
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

	/********************************
	*function name: getEventDetails	*
	*arguments:$eventDetail    		*
	*returned data: all information	*
	*		from one record in 		*
	*		events_evt table. 		*
	*description: returns 	 		*
	*	information from events_evt *
	*	table based on selected  	*
	*		event name.				*
	*Dependencies:					*
	*********************************/
	function  getEventDetails($eventDetail)
	{ 
		global $db;
		$query = $sql = "Select e.name_evt, e.location_evt, s.name_sre,e.description_evt, c.country_cou, e.dateTime_evt
	   					FROM events_evt e JOIN subregions_sre s
	  					ON e.subregions_sre_id_sre = s.id_sre
	    				JOIN regions_cou c on s.region_id_sre = c.id_cou
	    				WHERE e.name_evt = '$eventDetail'";
		$result = $db->query($query);
				
		return $result;

	}


//Miscellaneous Functions

	/********************************
	*function name: getAccessName	*
	*arguments: $accNum    			*
	*returned data: name of access 	*
	*	associated with the ID  	*
	*	number	associated with the *
	*	users access level 			*
	*description: Takes the ID 		*
	*	number associated with ID 	*
	*	and returns the access level*
	*	name. 						*
	*Dependencies:					*
	*********************************/
	function getAccessName($accNum)
	{
		global $db;

		$query = $sql = "SELECT accessLvl_ual FROM accesslevel_ual WHERE id_ual = '$accNum'";

		$accResult = $db->query($query);
		$accResult = $accResult->fetch();
		return $accResult;
	}

	/********************************
	*function name: allHikerLevels	*
	*arguments: 	    			*
	*returned data: all fields from *
	*	the level_lvl table 		*
	*	description: returns all 	*
	*	fields in level_lvl table 	*
	*	for	populating lists.		*
	*Dependencies:					*
	*********************************/
	function allHikerLevels()
	{
		global $db;
			$query = $sql = "SELECT * FROM level_lvl";
			$hikerLevels = $db->query($query);
			
			return $hikerLevels;
	}

	/********************************
	*function name: allAccessLevels	*
	*arguments: 	    			*
	*returned data: all fields from *
	*	the accesslevel_ual table	*
	*	description: returns all 	*
	*	fields in accesslevel_ual 	* 
	*	table for populating lists.	*
	*Dependencies:					*
	*********************************/
	function allAccessLevels()
	{
		global $db;
			$query = $sql = "SELECT * FROM accesslevel_ual";
			$accessLevels = $db->query($query);

			return $accessLevels;
	}

	/********************************
	*function name: getHikerLevelID *
	*arguments: $hLevel	    		*
	*returned data: id number from 	*
	* 		hike level name 	 	*
	*	description: gets ID # of  	*
	*	hiker level from hike level *
	*	name.						*
	*Dependencies:					*
	*********************************/
	function getHikerLevelID($hLevel)
	{ 
		global $db;
			$query = $sql = "SELECT id_lvl from level_lvl WHERE name_lvl = '$hLevel'";
			$hikerLevel = $db->query($query);
			$hikerLevel = $hikerLevel->fetch();
			
			return $hikerLevel;
			
	}

	/********************************
	*function name: getAccessLevelID*
	*arguments: $aLevel	    		*
	*returned data: access level ID#*
	*description: ID # from access 	* 
	* 	level name 					*
	*Dependencies:					*
	*********************************/
	function getAccessLevelID($aLevel)
	{
			global $db;
			$query = $sql = "SELECT id_ual FROM accesslevel_ual WHERE accessLvl_ual = '$aLevel'";
			$accessLevel = $db->query($query);
			$accessLevel = $accessLevel->fetch();
			return $accessLevel;

	}



