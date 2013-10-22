<?php 

?>
	
<form action ="?action=update_user" method="post">

	<p>User Id: <? echo $page_data["userId"]?></p>
	<label for='uid'>UserID:</label>
	<input type="text" readonly="readonly" name="user_id" value="<?echo $page_data["userId"]?>"><hr>
	
	<label for="firstname">First Name:</label>
	<input type="text" name="first_name" id="firstname" value="<?echo $page_data["firstname"]?>"><hr>
	
	<label for="lastname">Last Name:</label>
	<input type="text" name="last_name" id="lastname" value="<?echo $page_data["lastname"]?>"><hr>

	<input type="submit" value="update"/>
</form>

