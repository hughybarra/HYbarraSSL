<?php ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Read it!</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Using Bootstrap version 2.0.4">
    <meta name="authors" content="Brock Stone, Hugh Ybarra,">

    <!-- styles -->
    <link href="css/bootstrap.css" rel="stylesheet">
    <style type="text/css">
      body {
        padding-top: 60px;
        padding-bottom: 40px;
      }
    </style>
    <link href="css/bootstrap-responsive.css" rel="stylesheet">
  </head>

  <body>

    <div class="navbar navbar-inverse navbar-fixed-top">
      <div class="navbar-inner">
        <div class="container">
          <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="brand" href="index.php?aciton=home">Read-it!</a>
         
            <form id='signin' class="navbar-form pull-right" method="post" action="index.php?action=login">
              <input name="email" class="span2" type="text" placeholder="Email">
              <input name="password" class="span2" type="password" placeholder="Password">
              <button type="submit" class="btn">Sign in</button>
            </form>
          </div><!--/.nav-collapse -->
        </div>
      </div>
    </div>

    <div class="container">

      <!-- Main hero unit for a primary marketing message or call to action -->
      <div class="hero-unit">
        <div id='welcome'> 
          <h1>Welcome to read it!</h1>
          <p>Read it is a community-based blog that posts only the hilarious, as a member you can upload and share your lifes funnies. Sign up today to start laughing!</p>
          <h2>Sign Up Today &raquo;</h2>
        </div>
       	
       
      </div>
	  <div class="span12">
  			<form id="signup" class="span5" method="post" action="index.php?action=signup">
              <input name="new_firstname" class="span3" type="text" placeholder="First Name"><br>
              <input name="new_lastname" class="span3" type="text" placeholder="Last Name"><br>
              <input name="new_email"class="span3" type="text" placeholder="Email"><br>
              <input name="new_password" class="span3" type="password" placeholder="Password"><br>
              <input name="new_reenter" class="span3" type="password" placeholder="Re-Enter Password"><br>
              <button type="submit" id="signupbtn" class="btn btn-primary btn-large">Sign up</button>
          </form>
      </div>
      

       

      <hr>

      <footer>
        <p>&copy; Company 2013</p>
      </footer>

    </div> <!-- /container -->


    <!-- Ye ol' Javascript
    ================================================== -->
    <!-- Grab Google CDN's jQuery, with a protocol relative URL; fall back to local if necessary -->
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="js/jquery-1.7.2.min.js"><\/script>')</script>
    <!-- Bootstrap jQuery plugins compiled and minified -->
    <script src="js/bootstrap.min.js"></script>
   

  </body>
</html>
