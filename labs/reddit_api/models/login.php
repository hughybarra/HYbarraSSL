<?php

class Login{
	
	public function login($form_data){
		// echo "login running";
		//Declaring variables
		$user_name 	= "";
		$password 	= "";
		$is_valid 	= "";
		$p_valid 	= "";
		$u_valid 	= "";
		
		// Declaring Regex
		$email_regex 	= "/[^@]+@[^@]+\.[^@]+/";
		$password_regex = "/^[a-zA-Z0-9]{8,15}/";
		
		// check fot user name
		//===================================================
		 if(!empty($form_data['email'])){
		 	if(preg_match($email_regex, $form_data["email"])){
		 		$user_name= strtolower($form_data["email"]);
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
		);
		
		if($form_valid){
			// check the database for login and password
			$login_check = new crud_functions();
			$exists = $login_check->get_login_user($_POST);

			
			if($exists){
				$data_user = $exists[0]["email"];
				$data_pass = $exists[0]["user_pass"];
				
				// md5 form password 
				$p_password = md5($password);
				
				$logged_in = array (
					"success"=>True,
				);
				
				// check passwords
				if ($p_password == $data_pass){
					// passwords match
					$p_valid = True;
				}else{
					// passwords do not match
					$p_valid = False;
				}
				
				if ($data_user == $user_name){
					$u_valid = True;
				}else{
					$u_valid = False;
				}
				
				// setting session
				if($u_valid && $p_valid){
					// echo json_encode($logged_in);
					$_SESSION["logged_in"] = 1;
				}else{
					$logged_in["success"] = False;	
					$_SESSION["logged_in"] = 0;
					// echo json_encode($logged_in);
			    }
		 
			}else{
				
			}

			// echo json_encode($form_data_array);
		}else{
			// kick back invalid
			// echo json_encode($form_data_array);

		}// end if 
		
		
		
	}// end login function
}// end Validate login class
