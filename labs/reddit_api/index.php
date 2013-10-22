<?php

	// imports 
	include "models/view_model.php";
	include "models/reddit_funcs.php";
	include "models/crud_functions.php";
	include "models/register_form.php";
	include "models/login.php";
	include "models/check_login.php";
	include "models/file_upload.php";
	
	
	// starting session 
	session_start();
	
	// url check / set
	if (empty($_GET["action"])){
			$action = "home";
		}
		else{
			$action = $_GET["action"];
		}
		
	// convert post to a variable 
	$my_data = $_POST;
	
	if ($action == "home"){
		// set user and password vars 
		// for reddit 
		$mod_hash 		= "";
		$user_name 		= "elgeneralisimo";
		$password 		= "Xd137652";
		$url 			= 'http://www.reddit.com/api/login';
		$fields_string  = "";
		$reddit_dictionary = array (
			"user"=>$user_name,
			"passwd"=>$password,
			"api_type"=>"json"
		);	
		// making new reddit class
		$reddit_funcs = new reddit_funcs();
		// logging into reddit
		$mod_hash = $reddit_funcs->login($reddit_dictionary, $url);
		
		// set the header for following requests
		$headers = array(
		"user-agent"=>"elgeneralisimo\'s FullSail University class project bot",
		);
		// so here we are logged in. Have to run this fun every time 
		// we want to pul user specific data. 
		// echo $mod_hash;
	
		// setting session header variable 
		// $_SESSION["headers"] = $headers;	
		$views = new view_model();
		
		$views->get_view("views/landing.php");
	}// end action == home
	elseif ($action == "login"){
		$my_crud = new crud_functions();
		$log_me_in = new Login($my_data);
		$my_view = new view_model();
		$my_view->get_view("views/content.php");
	}// end logins
	elseif($action == "signup"){
	
		$my_crud = new crud_functions();
		$register_user = new Register_Form();
		$register_user->register($my_data);
		$my_view = new view_model();
		$my_view->get_view("views/content.php");
	}// end signup 
	elseif($action == "logout"){
		$_SESSION["logged_in "] = False;
		$my_view = new view_model();
		$my_view->get_view("views/content.php");
		session_destroy();	
	}// end logout
	elseif($action == "upload"){
		$my_view = new view_model();
		$my_view->get_view("views/upload.php");
	}// end upload
	elseif($action == "upload_post"){
		$new_image = new file_handler();
		
			if (isset($_FILES['pic'])){
				
				$my_file = $_FILES["pic"];
				$rando_var = md5("All Your Bas Are Belong To Us! Surrender Now Make Your Time!!");
				$image_path = $new_image->fileupload($my_file, $rando_var);
				// save this to database 
				
				// check for title in form
				if (isset($my_data["title"])){
					$title = $my_data["title"];
				}else{
					$title = False;
				}
				// check for description in form 
				if(isset($my_data["form_desc"])){
					$form_desc = $my_data["form_desc"];
				}else{
					$form_desc = False;
				}
				
				if ($form_desc && $title){
					$isValid = True;
				}else{
					$isValid = False;
				}
				
				$data_array = array (
					"title"=>$title,
					"desc"=>$form_desc,
					"success"=>$isValid
				);
				
			}else{
				echo "there was an error";
			}
	}// end upload post
	
	
	
	

	
	
	
		
	
	
	
?>