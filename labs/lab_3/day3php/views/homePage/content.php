<?php 
?>
<!-- Primary Page Layout
================================================== -->
<!-- NAV
=================================================== -->
<div class="container">

<nav>
	
	<h1>Server Side</h1>
    <div class="sixteen colums offset-by-nine">
    	
        <form id="login_form"
        action="?action=login"
        method="post">
            <div class="two columns">
                <label for="user_name">User Name</label>
                <input type="text" id="user_name" name="user_name"></input>
            </div>

            <div class="two columns">
                <label for="password">Password</label>
                <input type="password" id="password" name="password"></input>
            </div>
            <div class="two columns">
            <input type="submit"></input>
            </div>
        </form>
	</div>
</nav>
</div>
<!-- LAB NAVIGATION 
=================================================== -->
<section class=" container cont_one">
	<div class="two columns offset-by-six">
		<ul>
			<li>
				<form>
					<input type="submit" value="lab-1"></input>
				</form>
			</li>
			<li>
					<input type="submit" class="show_lab_two"  value="lab-2"></input>
			</li>
			<li>
				<form
				action = "index.php?action=get_all_users"
				method = "post">
					<input type="submit" value="lab-3"></input>
					
				</form>
			</li>
		</ul>
	</div>
</section>

<!-- LAB TWO ASSIGNMENT 
=================================================== -->
<section class="container cont_two">
	
	<p class="back_button">back</p>
	
	<div class="fourteen columns offset-by-one" id="lab_two_data" >
		<h3>Assignment Details </h3>
		<p>So basically for this assignment I created a form in python. The form automatically added to the page by
        python automated index. javascript will validate the form on click and python will again validate to ensure
        form integrity once it reaches the server</p>
	</div>

