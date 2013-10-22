<?php 

if(isset($_SESSION["logged_in"])){
	if($_SESSION['logged_in'] == 1){
		echo "you are logged in";
	}else{
		header("Location:/SSl/sessions/index.php");
	}
	
}else {
	
	header("Location:/SSl/sessions/index.php");

}