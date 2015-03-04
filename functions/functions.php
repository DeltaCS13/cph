<?php

require('/../controllers/dbconnect.php');

function addMember($firstName, $lastName, $nickName, $password){
	
	global $db;

	$password = password_hash($password, PASSWORD_DEFAULT);

	
	$query = 'INSERT INTO user_usr (firstName_usr, lastName_usr, nickName_usr, password_usr)
		VALUES(:firstName, :lastName, :nickName, :password)';
		$statement = $db->prepare($query);
		$statment->bindValue(':firstName', $firstName);
		$statment->bindValue(':lastName', $lastName);
		$statment->bindValue(':nickName', $nickName);
		$statment->bindValue(':password', $password);
		$statment->execute();
		$statment->closeCursor();
}

function is_valid_login($nickName, $password)
{
	global $db;
	$password = password_hash($password, PASSWORD_DEFAULT);
	$query = 'SELECT id_usr FROM user_usr WHERE $nickName = :nickName and $password = :password_usr';
	$statment = $db->prepare($query);
	$statment->bindValue(':nickName, $nickName');
	$statment->bindValue(':password, $password');
	$statment->execute();
	$valid = ($statment->rowCount() == 1);
	$statment->closeCursor();
	return $valid;
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

