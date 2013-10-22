<?php 
	// includes
	include "models/Crud_Functions.php";
	include "models/ViewModel.php";
	include "models/forms/lab_two_login.php";
	include "models/forms/lab_two_form_validation.php";
	include "controllers/Home.php";
	
	// check to see if form ahs an action
	if (empty($_GET["action"])){
		$action = "home";
	}
	else{
		$action = $_GET["action"];
	}
	

	if($action == "home"){
		$display_views = new Home();
		$display_views->get_views("views/header.php");
		$display_views->get_views("views/homePage/content.php");
		$display_views->get_views("views/lab_2/lab_two_form.php");
		$display_views->get_views("views/homePage/footer.php");
//=======================================================	
	}elseif($action == "lab_two_form"){
		$validate_form = new Validate_lab_Two_Forms();
		$validate_form->validate_forms($_POST);
//=======================================================		
	}elseif($action == "login"){
		$log_me_in = new Lab_Two_Login();
		$log_me_in -> login($_POST);
//=======================================================		
	}elseif($action == "get_all_users"){
		// getting a memory issue here. 
		// aparently php does not have priveleges enough to run my select statemet lol
		// either i can update the init file or change my crud function. not sure
		// for now i'm going to limit this search to the first 50 results
		$crud_functions = new Crud_Functions();
		// getting all users
	    $get_users = $crud_functions -> get_all_users();
		// getting users display
		$display_views = new ViewModel();
		// shwoing users display
		// passig $get_users data to display
		$display_views->get_view("views/lab_3/show_users_loop.php", $get_users);
//=======================================================		
	}elseif($action == "update_user_view"){
		$display_views = new ViewModel();
		$user_data = array(
			"userId" =>$_GET["userId"],
			"firstname" =>$_GET["firstname"],
			"lastname"=>$_GET["lastname"]
		);
		$display_views->get_view("views/lab_3/update_users.php", $user_data);	
//=======================================================	
	}elseif($action == "delete_user"){
		$crud_functions = new Crud_Functions();
		// check if user id is there
		// this seems dangerous
		if (!empty($_GET["userId"])){
			$user_id= $_GET["userId"];
			
			$crud_functions->delete_user($user_id);
		}
//=======================================================	
	}elseif ($action == "update_user"){
		$update_user = new Crud_functions();

		$update_data = array(
			"first_name"=>$_POST["first_name"],
			"last_name"=>$_POST["last_name"],
			"userId"=>$_POST["user_id"]
		);
		$update_user->update_user($update_data);
	}
	
