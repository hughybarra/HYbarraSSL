<?php

class Lab_Two_Login{
	
	public function login($form_data){
		//Declaring variables
		$user_name 	= "";
		$password 	= "";
		$is_valid 	= "";
		
		// Declaring Regex
		$email_regex 	= "/[^@]+@[^@]+\.[^@]+/";
		$password_regex = "/^[a-zA-Z0-9]{8,15}/";
		
		// check fot user name
		//===================================================
		 if(!empty($form_data['user_name'])){
		 	if(preg_match($email_regex, $form_data["user_name"])){
		 		$user_name= $form_data["user_name"];
		 	}else{
		 		$user_name = False;
		 	}
		 }else{
		 	$user_name = False;
		 }// end user name
		// check for the password
		//===================================================
		if(!empty($form_data["password"])){
			if(preg_match($password_regex, $form_data["password"])){
				$password = $form_data["password"];
			}else{
				$password = False;
			}
		}else{
			$password = False;
		}// end password
		
		if ($user_name && $password){
			$form_valid = True;
		}else{
			$form_valid = False;
		}// end if
		
		
		$form_data_array = array(
			"success" => $form_valid,
			"use_name" => $user_name,
			"password" => $password
			
		);
		
		if($form_valid){
			// check the database for login and password
			echo json_encode($form_data_array);
			return json_encode($form_data_array);
			
		}else{
			// kick back invalid
			echo json_encode($form_data_array);
			return json_encode($form_data_array);
		}// end if 
		
		
		
	}// end login function
}// end Validate login class
