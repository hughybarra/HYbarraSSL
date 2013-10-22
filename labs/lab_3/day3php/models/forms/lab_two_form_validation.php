<?php


/*
Doc Title  Lab_two_form_validation.php
Author: Hugh Ybarra
Description: Validates all fields of the lab 2 form
form method: post
example:
first
last
date
number
currency
url
checkbox
radios

validates form and returns a json encoded doc with true or false
if the form is valid or invalid
 
 */
 
class Validate_lab_Two_Forms{
	
	public function validate_forms($form_data){
		
		// Declaring Variables
		$first_name 	= "";
		$last_name 		= "";
		$email 			= "";
		$date 			= "";
		$number 		= "";
		$currency 		= "";
		$url 			= "";
		$select 		= "";
		$checkbox		= "";
		$gender			= "";
		$terms_agree 	= "";
		$mail_list 		= "";
		$response 		= "";
		$is_valid 		= "";
		
		// Declaring Regex Variables
		$email_regex 		= "/[^@]+@[^@]+\.[^@]+/";
		$password_regex 	= "/^[a-zA-Z0-9]{8,15}/";
		
		$string_regex 		= "/^[a-zA-Z]{3,15}$/";
		
		$number_regex 		= "(-?\d+(?:\.\d+)?+)";
		// using filter validate instead
		//FILTER_VALIDATE_URL
		// $url_regex 			= "/ ^http\:\/\/[a-zA-Z0-9\-\.]+\.[a-zA-Z]{2,3}(\/\S*)?$ /";
		
		
		// check for the first name 
		//===================================================
		if (!empty($form_data["first_name"])){
			// Regex validation
			if (preg_match($string_regex, $form_data["first_name"])){
				$first_name = $form_data["first_name"];
			}else{
				$first_name = False;
			}
		}else {
			$first_name = False;
		}// end of first name 
		
		// check for the last name 
		//===================================================
		if (!empty($form_data["last_name"])){
			// Regex validation
			if(preg_match($string_regex, $form_data["last_name"])){
				$last_name = $form_data["last_name"];
			}else{
				$last_name = False;
			}
		}else{
			$last_name = False;
		}// end last name
		
		// check for the date
		//===================================================
		if (!empty($form_data["form_date"])){
			$date = $form_data["form_date"];
		}else{
			$date = False;
		}// end date
		
		// check for the Number
		//===================================================
		// echo gettype($form_data["form_number"]);
		if(!empty($form_data["form_number"])){
			if(preg_match($number_regex ,$form_data["form_number"])){
				$number = $form_data["form_number"];
			}else{
				$number = False;
			}
		}else{
			$number = False;
		}// end number
		
		// check for the currency
		//===================================================
		if(!empty($form_data["form_currency"])){
			if(preg_match($number_regex, $form_data["form_currency"])){
				$currency = $form_data["form_currency"];
			}else{
				$currency = False;
			}
		}else{
			$currency = False;
		}// end currency
		
		// check for the url
		//===================================================
		if(!empty($form_data["form_url"])){
			if(filter_var($form_data["form_url"], FILTER_VALIDATE_URL)){
				$url = $form_data["form_url"];
			}else{
				$url = False;
			}
		}else{
			$url = False;
		}// end url
		
		// check the select
		//===================================================
		if(!empty($form_data["form_select"])){
			$select = $form_data["form_select"];
		}else{
			$select = False;
		}// end for select
		
		// check for gender
		//===================================================
		if(!empty($form_data["sex"])){
			$gender = $form_data["sex"];
		}else{
			$gender = False;
		}// end gender 
		// check for check boxes
		//===================================================
		if(!empty($form_data["agree"])){
			$terms_agree = "agree";
		}else{
			$terms_agree = False;
		}
		
		if(!empty($form_data["form_mailing_list"])){
			$mail_list = $form_data["form_mailing_list"];
		}else{
			$mail_list = False;
		}
		// end checkbox 
		//===================================================
		
		// check all fields 
		//===================================================
		if ($first_name && $last_name && $date && $number && $currency && $url && $select && $gender){
			$is_valid = True;
		}else{
			$is_valid = False;
		}
		
		// json encode data
		//===================================================
		$form_data_array = array(
			"success" => $is_valid,
			"first_name" => $first_name,
			"last_name"=> $last_name,
			"date" => $date,
			"number" => $number,
			"currency" => $currency,
			"url" => $url,
			"select" => $select,
			"gender" => $gender,
			"terms_agree" => $terms_agree,
			"mailing_list"=> $mail_list	
		);
		echo json_encode($form_data_array);
		return json_encode($form_data_array);
		
	}// end validate_forms function
}// end validate_lab_two_form class

