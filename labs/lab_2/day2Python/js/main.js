
$( document ).ready(function() {
 
    // ----------- login button ---------------
    $("#login").click(function(){
    	console.log("login clicked");
    }); // end login function
 	

 	// ----------- new member submit ----------
 	$("#new_member_submit").click(function(e){
 		console.log("new member submit clicked");

 		// do validation here 

 		var first_name 	= $("#first_name").val();
 		var last_name 	= $("#last_name").val();
 		var email 		= $("#email").val();
 		var pass_one 	= $("#pass_one").val();
 		var pass_two 	= $("#pass_two").val();
 		var pass_match 	= true; 
 		var isValid 	= true;	
 		var error_data 	= [];	
 		console.log(first_name);
 		console.log(last_name);
 		console.log(email);
 		console.log(pass_one);
 		console.log(pass_two);

 		// regex
 		var regex_email = /^[\w-\._\+%]+@(?:[\w-]+\.)+[\w]{2,6}$/;
		var regex_name = /^[a-zA-Z]{2,10}$/;
		var regex_pass = /^[a-zA-Z0-9]{8,15}$/;

		// validators

		// First name 
		//======================================
		if (!regex_name.test(first_name)){
			isValid = false;
			firt_name = false
			error_data.push(first_name);
		};// end first name validation

		// Last name 
		//======================================
		if (!regex_name.test(last_name)){
			isValid = false;
			last_name = false;
			error_data.push(last_name);
		};// end last name validation

		// email
		//======================================
		if (!regex_email.test(email)){
			isValid = false;
			email = false;
			error_data.push(email);

		};// end email validation

		// password 1
		//======================================
		if(!regex_pass.test(pass_one)){
			isValid = false;
			pass_one = false;
			error_data.push(pass_one);
		};// end password 1 validation

		// password 2 
		//======================================
		if (!regex_pass.test(pass_two)){
			isValid = false;
			pass_two = false;
			error_data.push(pass_two);
		};// end password 2 validation

		if (pass_one != pass_two){
			isValid = false;
			pass_match = false;
			error_data.push(pass_match);
		}

		if (isValid){
			console.log("error box go away");
			// remove error css if it is there
			//======================================
			$("#first_name").removeClass("v_error");
			$("#last_name").removeClass("v_error");
			$("#email").removeClass("v_error");
			$("#pass_one").removeClass("v_error");
			$("#pass_two").removeClass("v_error");
			// remove the error text
			// $("body").find("a:first-child").remove();
			$("error_box").remove("p");
			//======================================

			console.log("form is valid");

			// $.ajax({
			// 	url: $("#new_members_form").attr("action"),
			// 	type:"POST",
			// 	dataType: "json",
			// 	success: function(response){
			// 		console.log(response):
			// 		console.log(response.Success);
			// 		console.log("success worked");
			// 		noty({
			// 			text: "Load Success",
			// 			closeWith:["hover"],
			// 			type:"success"
			// 		})// end noty
			// 	}// end success function
			// })// end of ajax call


		}else{

			
			if (!first_name){
				$("#first_name").addClass("v_error");
			}else{
				$("#first_name").removeClass("v_error");
			}
			//======================================
			if (!last_name){
				$("#last_name").addClass("v_error");
			}else{
				$("#last_name").removeClass("v_error");
			}
			//======================================
			if (!email){
				$("#email").addClass("v_error");
			}else{
				$("#email").removeClass("v_error");
			}
			//======================================
			if (!pass_one){
				$("#pass_one").addClass("v_error");
			}else{
				$("#pass_one").removeClass("v_error");
			}
			//======================================
			if (!pass_two){
				$("#pass_two").addClass("v_error");
			}else{
				$("#pass_two").removeClass("v_error");
			}
			//======================================

			add_error = $(".error_box");
			required = "<p class='required'>Oops there seems to have been an error</p>";

			if ($(".error_box").children().length == 0){

				add_error.append(required);
			}

		};// end is valid


		// stop the form from auto submitting
 		e.preventDefault();
 		e.stopPropagation();
 	})// end new member function
});