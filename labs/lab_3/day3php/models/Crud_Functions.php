<?php

class Crud_Functions{
	
	public function get_all_users(){
		
		$db = new PDO("mysql:hostname=localhost;dbname=ssldb", "root", "root");
		
		// select all first names last names from users order by userId limit 50
		$sql = "SELECT firstname, lastname, userId
				FROM db_users ORDER BY userId
				LIMIT 50";
		// remember to find a way to fix the limit 50 
		$statment = $db->prepare($sql);
		$statment -> execute();
		
		// get all users
		$result = $statment -> fetchAll();
		// var_dump($result);
		return $result;
	}// end get all users
	
	public function get_one_user($user_id){
		$db = new PDO("mysql:hostname=localhost;dbname=ssldb", "root", "root");
		// select one user from db
		$sql = "SELECT firstname, lastname, userId
				WHERE userId = ".$user_id." ";
		$stmt = $db->prepare($sql);
		$stmt ->execute();
		// get user
		$result = $stmt ->fetchAll();
		// var_dump($result);
		return $result;
	}
	
	public function delete_user($user_id){
		// deletes a user based on user iD
		$db = new PDO("mysql:hostname=localhost;dbname=ssldb", "root", "root");
		$sql = "DELETE FROM db_users
				WHERE userId = ".$user_id." ";
		
				
		$statement = $db->prepare($sql);
		$statement -> execute();

		$count = $statement->rowCount();
		echo "Rows Deleted"." = ".$count;
	}// end delete user
	
	public function update_user($user_data){
		// updates a user based on user ID
		$db = new PDO("mysql:hostname=localhost;dbname=ssldb", "root", "root");

				
		$sql = "UPDATE db_users ".
		"SET firstname='".$user_data["first_name"]."',".
		"lastname='".$user_data["last_name"]."'".
		"WHERE userId=".$user_data["userId"]."";
		
		$stmt = $db->prepare($sql);
		$stmt ->execute();
		$count = $stmt->rowCount();
		echo "Rows Updated"." = ".$count;
		
		
	}// end update user
}// end Crud function
