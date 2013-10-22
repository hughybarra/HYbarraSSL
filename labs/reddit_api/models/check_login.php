<?php 
class ckUser{

	public function checkUser($data){
		session_start();
		
		$db= new PDO("mysql:hostname=localhost;dbname=ssl_project_db","root","root"); 
		$q  = "SELECT email, user_pass
			  FROM db_users
			  where email = :un and user_pass = :pass";
			  
		$st = $db->prepare($q);

		$st->execute(array(":un"=>$data["un"], ":pass"=>md5($data["pass"])));
		$st->fetchAll();
		$isgood = $st->rowCount();


		
		if($isgood> 0){
			$_SESSION["logged_in"]=1;
			return 1;
		}else{
			$_SESSION["logged_in"]=0;
			return 0;
		}
	}
}