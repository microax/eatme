<?php

/***********************************
 * kissyface.php
 *
 * @param header
 * @param url
 * 
 * @author megan
 ***********************************
*/			
function kissyface($header, $url)  
{
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords" content="Resturant, Bar, Operations" />
    <meta name="description" content="Operations Management for Service Industry"/>
    <title>EatMe.nyc</title>
	<link href="/css/bootstrap.css" rel="stylesheet">
	<link href="/css/font-awesome.min.css" rel="stylesheet" >
	<link href="/css/animate.css" rel="stylesheet" />
	<link href="/css/prettyPhoto.css" rel="stylesheet"> 
	<link href="/css/style.css" rel="stylesheet">
    <?php echo("<meta http-equiv=\"Refresh\" content=\"3; url=$url\">"); ?>
  </head>
  <body>
    <nav class="navbar navbar-default navbar-fixed-top"  style="background-color: black">
      <div class="container">
        <div class="row">
          <div class="col-md-4 col-md-offset-1">
            <div class="site-logo">
              <a href="/" class="brand" style="color: white">EatMe.nyc</a>
            </div>
          </div>					  
          <div class="col-md-8">	 
            <div class="navbar-header">
              <button type="button" class="navbar-toggle"  data-toggle="collapse" data-target="#menu">
                <i class="fa fa-bars"></i>
              </button>
            </div>
          </div>
        </div>
      </div>
    </nav>
  <br><br>
    <br><br><br><br>
    <section id="header">
      <br><br>
      <div class="container">
        <div class="center">
          <hr>
          <br><br>
          <h2>
            <?php echo($header); ?>
          </h2>
          <div class="col-md-10 col-md-offset-4">
            <img src="/images/pos.png" alt="EatMe.nyc" width="200" height="200">
          </div>
        </div>
      </div>
    </section>
  </body>
</html>

<?php
}
?>
