<?php
	// making new reddit class
	$reddit_funcs = new reddit_funcs();
	$red_data = $reddit_funcs->get_front_page();
	// echo var_dump($red_data);
	// echo var_dump($red_data["data"]["children"]);
	// $my_data = $red_data["data"]["children"][1]["data"];
	$my_data = $red_data["data"]["children"];
	// echo var_dump($my_data);
	
	// for($i = 0; $i < count($my_data); $i ++){
		// // echo $my_data[$i]["data"]["title"]."<hr>";
		// echo $my_data[$i]["data"]["thumbnail"];
// 
	// }

	// echo 	strlen($my_data[20]["data"]["thumbnail"]);
	
?>

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
          <a class="brand" href="index.php?action=home">Read-it!</a>
          <button type="submit" class="btn btn-danger pull-right ">Sign Out</button>
          </div><!--/.nav-collapse -->
        </div>
      </div>
    </div>

    <div class="container">

     
		<form action="index.php?action=upload" method="post">
			  <button type="submit" id="uploadbtn" class="btn btn btn-success btn-large" >UPLOAD</button>
		</form>
            


      
       
          	<?php for ($i = 0; $i < count($my_data); $i ++){    ?>
          		
	          	<div class="span12 my_posts my_data" id="div_item_<?php echo $my_data[$i]["data"]["url"] ?>">
	          		
					<div class="span2 thumbs" >
						<img src="<?php  

									if (strlen($my_data[$i]["data"]["thumbnail"]) == 0){
										echo "img/placeholder.jpg";
									}else{
										echo $my_data[$i]["data"]["thumbnail"];
									}?>
						">
					</div>	
					<div class="span6 thumb_desc">
						<p><?php echo $my_data[$i]["data"]["title"] ?></p>
					</div>
					
					<!-- <div class="span4 votes">
						<a href="#">upvote</a> |
						<a href="#">downvote</a>
					</div> -->				 </div>
		
			<?  } // close the loop ?>
          	
       
       

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
    <script src="js/main.js"></script>
   

  </body>
</html>
