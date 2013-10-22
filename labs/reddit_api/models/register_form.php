<?php

	class Register_Form{
		
		public function register($form_data){
			
			
			// declaring variables
			// $first 		= $form_data["first_name"];
			// $last 		= $form_data["last_name"];
			// $email		= $form_data["email"];
			// $pass_one 	= $form_data["pass_one"];
			// $pass_two 	= $form_data["pass_two"];
			$first 		= "";
			$last 		= "";
			$email  	= "";
			$pass_one 	= "";
			$pass_two 	= "";
			$true_pass  = "";
			$pass_match = True;
			$is_valid 	= True;
			
			// Regex 
			$email_regex 	= "/[^@]+@[^@]+\.[^@]+/";
			$string_regex 		= "/^[a-zA-Z]{3,15}$/";
			$password_regex = "/^[a-zA-Z0-9]{8,15}/";
			
			// validations 
			// first name
			if (!empty($form_data["new_firstname"])){
				if(preg_match($string_regex, $form_data["new_firstname"])){
				    $first = strtolower($form_data["new_firstname"]);
				}else{
					$first = False;
				}
			}else{
				$first= False;
			}
			
			
			// last name 
			if (!empty($form_data["new_lastname"])){
				if(preg_match($string_regex, $form_data["new_lastname"])){
					$last = strtolower($form_data["new_lastname"]);
				}else{
					$last = False;
				}
			}else{
				$last_name = False;
			}
			// email 
			if (!empty($form_data["new_email"])){
				if(preg_match($email_regex, $form_data["new_email"])){
					$email = strtolower($form_data["new_email"]);
				}else{
					$email= False;
				}
			}else{
				$email=False;
			}
			// pass one
			if (!empty($form_data["new_password"])){
				if(preg_match($password_regex, $form_data["new_password"])){
					$pass_one = $form_data["new_password"];
				}else{
					$pass_one = False;
				}
			}else{
				$pass_one = False;
			}
			// pass two 
			if (!empty($form_data["new_reenter"])){
				if(preg_match($password_regex, $form_data["new_reenter"])){
					$pass_two = $form_data["new_reenter"];
				}else{
					$pass_two = False;
				}
			}else{
				$pass_two = False;
			}
			
			// pass match 
			if ($pass_one != $pass_two){
				$pass_match == False;
			}else {
				$true_pass = $pass_one;
			}
			
			if ($first && $last && $email && $pass_one 
				&& $pass_two && $pass_match){
					$is_valid == True;
				}else{
					$is_valid = False;
				}
			
			// json encode data 
			//===================================================
		
			
			$form_data_array = array (
			"success"=>$is_valid,
			"new_firstname"=>$first,
			"new_lastname"=>$last,
			"new_email"=>$email,
			);
			
			
			echo json_encode($form_data_array);
			if ($is_valid){
				// connect to the database 
				// insert the user
				
				// md5 the password 
				$form_data_array["true_pass"]= md5($true_pass);
				
				$crud_functions = new crud_functions();
				
				$exists = $crud_functions->check_if_email_exists($form_data_array);

				if ($exists == 0 ){
					// user name does not exist
					// add the user to the database
					$form_data_array["user_name"] 	= True;
					
					$user_added = $crud_functions->register_user($form_data_array);
					if($user_added){
						// response with user was added
						$form_data_array["db_add"] 	= True;
						unset($form_data_array["true_pass"]);
						echo json_encode($form_data_array);
						//=======SESSION HERE --------
						$_SESSION["logged_in"]= 1;
						$_SESSION["user_data"] = $form_data_array;
					}else {
						// if there is an error adding the user 
						// this error will pop up 
						// kick back an erorr response with user not added
						$form_data_array["db_add"] 	= False;

						unset($form_data_array["true_pass"]);
						echo json_encode($form_data_array);
						$_SESSION["logged_in"] = 0;
					}// end else		
			    }else{
					// user name already exists 
					// kick back an arror	
					$form_data_array["user_name"] 	= False;
					unset($form_data_array["true_pass"]);
					echo json_encode($form_data_array);
					$_SESSION["logged_in"]= 0;
				}// end else 
			}else {
				
			}// end isvalid 
			

		}
	}
