<?php

/***********************************
 * nav.php 
 * @author  dixie
 ***********************************
*/			
function nav()
{
?>
    <nav class="navbar navbar-default navbar-fixed-top" style="background-color: black; color: white">
      <div class="container">
        <div class="row">
         <div class="col-md-4">
            <div class="site-logo">
              <a href="/" class="brand" style="color: white">EatMe.nyc</a>
            </div>
          </div>		  
          <div class="col-md-8">	 
             <div class="navbar-header" style="background-color: black; color: white">
              <button type="button" class="navbar-toggle"  data-toggle="collapse" data-target="#menu">
                <i class="fa fa-bars"></i>
              </button>
            </div>
            <div class="collapse navbar-collapse" id="menu">
              <ul class="nav navbar-nav navbar-right" style="background-color: black; color: white">
                <!-- <li><a href="/signup/">Signup</a></li> -->
                <li><a href="/login/">Login</a></li>
              </ul>
            </div>
          </div>
        </div>
      </div>		
    </nav>
  <div id="home">
    <br><br>
  </div>

<?php
}
?>
