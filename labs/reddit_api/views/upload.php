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
          <a class="brand" href="#">Read-it!</a>
          <button type="submit" class="btn btn-danger pull-right ">Sign Out</button>
          </div><!--/.nav-collapse -->
        </div>
      </div>
    </div>

    <div class="container">
    <div id="uploadform" class="text-center">
    <h1>Upload Something Great:</h1>
    <hr>
      <form method="post" enctype="multipart/form-data"
      action = "index.php?action=upload_post">
          <label>Title:</label>
          <input class="span4" type="text" placeholder="Title" name="title"><br>
          <label>Description:</label>
          <textarea class="span4" rows="3" placeholder="Description" name="form_desc"></textarea><br>
          <label>Upload an image:</label>
          <input class="span4" type="file" placeholder="Upload an image..." name="pic"><br>
          <div id="uploadbtns">
            <button type="submit" class="btn-success btn-large">Upload</button>
            <button type="button" class="btn btn-large">Cancel</button>
          </div>
      </form>
      </div>

     <!-- From reddit -->
        <div class="span12">
          
        </div>
       

      <hr>

      <footer>
        <p>&copy; H.E.B. Co 2013</p>
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
