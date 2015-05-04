<?php
 /*****************************************************************
 * Auther: Howard La Flamme                      				  *
 * Title: Validation Functions (validation_functions.php)         *
 * Description: Provides functions for validating data.			  *
 * Revision: 0.1.0 4/30/2015                    				  *
 *****************************************************************/
//Initiate errors array
	$errors = array();


	

//editing functions
	/**********************************
	*function name: fieldname_as_text *
	*arguments: $fieldname     		  *
	*returned data: $fieldname 	      *
	*description: removes spaces and  *
	* 	underscores from field name   *
	*	and capitalizes first letter  *
	*	of field name. 				  *
	*Dependencies:					  *
	***********************************/
	function fieldname_as_text($fieldname)
	{
		$fieldname = str_replace("_", " ", $fieldname);
		$fieldname = ucfirst($fieldname);
		return $fieldname;
	}

//Validation functions

	/********************************
	*function name: confirm_query 	*
	*arguments: $result_set        	*
	*returned data:  				*
	*description: determines if a   *
	*	query returned a result. 	* 				
	*Dependencies: 					*
	*********************************/
	function confirm_query($result_set) {
			if (!$result_set) {
				$_SESSION['error_message'] = 'No results found';
				die("Database query failed.");
			}
		}

		function confirm_results($results)
		{ 
			
			if(!$results)
			{
				
				$_SESSION['error_message'] = 'No Data Found';
return;
			}
			
		}

	/********************************
	*function name: has_presence	*
	*arguments: $value	           	*
	*returned data: true/false 		*
	*description: checks if the 	*
	*	field has a value entered 	*
	*Dependencies:					*
	*********************************/
	function has_presence($value)
	{
		return isset($value) && $value !== "";
	}

	/************************************
	*function name: validate_presence   *
	*arguments: $required_fields (array)*
	*returned data: if an empty field is*
	* 	detected, error message returned*
	*description: checks all form fields*
	*	for entries.					*
	*Dependencies:	has_presence($value)*
	*	field_name_as_text($field)		*
	*************************************/
	function validate_presences($required_fields)
	{
		global $errors;

		foreach($required_fields as $field)
		{
		
			$value = trim($_POST[$field]);
			if(!has_presence($value))
			{
				$errors[$field] = fieldname_as_text($field)." cannot be blank!";
			}
		}	
		
	}

?>