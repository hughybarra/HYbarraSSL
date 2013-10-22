<?php
	class crud_functions{
		
		// gets the emailand password from the databse 
		// based off of given email
		public function get_login_user($form_data){
			// echo "get_login_user running";
			$db = new PDO("mysql:hostname=localhost;dbname=reddit_db","root","root");
			// select one user from db
			$sql= "SELECT userId, email, user_pass
				   FROM db_users
				   WHERE email = :user_email";
			$st = $db->prepare($sql);
	
			$st->execute(array(":user_email"=>$form_data["email"]));
			// $st->execute();
			$result = $st->fetchAll();
			$exists = $st->rowCount();
			
			
			if ($exists){
				return $result;
			}else{
				return false;
			}
		}// end get login user
		//==================================================================================
		//==================================================================================
		public function check_if_email_exists($user_data){
		// echo "check if email exists is running";
		// check the database for the email/user name 
	    $db = new PDO ("mysql:hostname=localhost; dbname=reddit_db", "root", "root");
		
		$sql = "SELECT email
				FROM db_users
				WHERE email = :email";
				
		$st = $db->prepare($sql);
		
		$st->execute(array(":email"=>$user_data["new_email"]));
		$st->fetchAll();
		$is_valid = $st->rowCount();
		
		return $is_valid;
		}// end check if email exists
		//==================================================================================
		//==================================================================================
			
		public function get_user_id($form_data){
			$db = new PDO("mysql:hostname=localhost;dbname=reddit_db","root","root");
			// select user id from db
			$sql = "
				SELECT userId
				FROM db_users
				WHERE email = :email
				"; 
			$st = $db->prepare($sql);
			$st->execute(array(":email"=>$form_data["email"]));
			$result = $st->fetchAll();
			$exists = $st->rowCount();
			
		    if ($exists){
				return $result;
			}else{
				return false;
			}
	    }// end get_user_id
	    //==================================================================================
	    //==================================================================================
	    public function register_user($user_data){
	    // new_firstname
	    // new_lastname
	    // new_email
	    // true password
	    	
		// registers a new user to the database
		$db = new PDO ("mysql:hostname=localhost; dbname=reddit_db", "root", "root");
		
		$sql = "INSERT INTO db_users (firstname, lastname, user_pass, email)
				VALUES (:first, :last, :pass, :email) ";
		
		$st = $db->prepare($sql);
		$st->execute(array(":first"=>$user_data["new_firstname"],":last"=>$user_data["new_lastname"],
						   ":pass"=>$user_data["true_pass"], ":email"=>$user_data["new_email"]));
		
		$is_valid = $st->rowCount();
		return $is_valid;
		
		// INSERT INTO table_name (column1,column2,column3,...)
		// VALUES (value1,value2,value3,...);
    }// end regisgter _user
    //==================================================================================
    //==================================================================================
	// Create user posts
	    public function create_post($data){
	    	$user_info = get_user_id($form_data);
			$db = new PDO('mysql:hostname=localhost; dbname=reddit_db;', 'root', 'root');
			$info = json_decode($data);
			// VALUES(null, '$user_info', '$info['image_path']'=>':image_path', '$info['title']'=>':title', '$info['date']'=>':date', '$info['details']'=>':details', '$info['comments']'=>':comments', '$info['votes']'=>':votes')'
			$sql = 'INSERT INTO db_posts
					VALUES(null, username, image_path, title, date, details, comments, votes)';
			$st = $db->prepare($sql);
			$st->execute();
			$good = $st->rowCount();
			json_encode();
		}// end create_post
		public function read_post($data){
			$db = new PDO('mysql:hostname=localhost; dbname=reddit_db;', 'root', 'root');
			$sql = 'SELECT postId, details, comments
					FROM db_posts
					WHERE  postId = :postId';
			$st = $db->prepare($sql);
			$st->execute(array(':postId'=>$data));
			$result = $st->fetchAll();
			echo $result[0][0];
			echo $result[0][1];
			echo $result[0][2];
		}
		public function update_post($data){
			$db = new PDO('mysql:hostname=localhost; dbname=reddit_db;', 'root', 'root');
			$sql = 'UPDATE postId, image_path, title, date, details, comments
					FROM db_posts
					WHERE postId = :postId';
			$st = $db->prepare($sql);
			$st->execute(array(':postId'=>$data['postId'], ':image_path'=>$data['image_path'], 
						':title'=>$data['title'], date("Y-m-d H:i:s")=>$data['date'], ':details'=>$data['details'], 
						':comments'=>$data['comments']));
			$good = $st->rowCount();
			if($good > 0){
				echo 'updated';
			}
		}
		public function delete_post($data){
			$db = new PDO('mysql:hostname=localhost; dbname=reddit_db;', 'root', 'root');
			$sql = 'DELETE
					FROM db_posts
					WHERE postId = :postId';
			$st = $db->prepare($sql);
			$st->execute(array(':postId'=>$data));
			$good = $st->rowCount();
			if($good > 0){
				echo 'row deleted';
			}
		}
	}

	
