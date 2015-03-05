<?php

require('/../controllers/dbconnect.php');

function addMember($firstName, $lastName, $nickName, $password){
	
	global $db;
	//validate nickName is unique
	
	$password = password_hash($password, PASSWORD_DEFAULT);

	
	$query = 'INSERT INTO user_usr (firstName_usr, lastName_usr, nickName_usr, password_usr)
		VALUES(:firstName, :lastName, :nickName, :password)';
		
		$statement = $db->prepare($query);
		
		$statement->bindValue( ':firstName', $firstName);
		$statement->bindValue( ':lastName', $lastName);
		$statement->bindValue( ':nickName', $nickName);
		$statement->bindValue( ':password', $password);
		$statement->execute();
		$statement->closeCursor();
		echo $query;

}

function is_valid_login($nickName, $password)
{
	global $db;
	$password = password_hash($password, PASSWORD_DEFAULT);
	$query = 'SELECT id_usr FROM user_usr WHERE $nickName = :nickName and $password = :password_usr';
	$statement = $db->prepare($query);
	$statement->bindValue(':nickName, $nickName');
	$statement->bindValue(':password, $password');
	$statement->execute();
	$valid = ($statement->rowCount() == 1);
	$statement->closeCursor();
	return $valid;
}

function validatNickNameUnique($nickName)
{
	global $db;

	$query = "SELECT nickNmae_usr FROM user_usr WHERE '$nickName' = nickName_usr;";

	$statement = $db->prepare($query);
	$statement->bindValue(':nickName', $nickName);
	$statement->execute();
	$valid = ($statement->rowCount() == 1);
	$statement->closeCursor();
	return $nickNameValid;	
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

