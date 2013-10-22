</?php ?>
<!-- LAB three assignment
=================================================== -->
<div class="container cont_three">
	<div class="eight columns">
		<pclass="back_button2">back</p>
		
		
		
		
		
<?php 
// this is the body page
// inside views because this is a view

foreach($page_data as $par){
	echo "<br>";
	echo $par["firstname"]."<br>";
	echo $par["lastname"]."<br>";
	echo $par["userId"]."<br>";
	echo "<a href='?action=delete_user&userId=".$par["userId"]."'>Delete</a>";
	echo " | ";
	echo "<a href='?action=update_user_view&userId=".$par["userId"]."&firstname=".$par["firstname"]."&lastname=".$par["lastname"]."'>Update</a>";
	echo "<hr>";
	
}// end for each loop

?>
	</div>
</div>