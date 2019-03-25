<?php

/***********************************
 * nav.php 
 * @author  dixie
 ***********************************
*/			
function nav()
{
    //---------------------------------------------
    // collapse menu for small screens on click...
    //---------------------------------------------
    $datatoggle=" data-toggle=\"collapse\" data-target=\".navbar-collapse.in\"";
    //---------------------------------------------
    // navbar links...
    //---------------------------------------------
    $inventory ="\"/inventory/\"".$datatoggle;
    $imenu     ="\"https://imenupro.com/login\"".$datatoggle;
    $reports   ="\"/reports/\"".$datatoggle;
    $inbox     ="\"/admin/\"".$datatoggle;
    $client    ="\"/admin/users.php/\"".$datatoggle;
    $chpasswd  ="\"/admin/index.php?func=chpassword\"".$datatoggle;
    $logout    ="\"/admin/index.php?func=logout\"".$datatoggle;
    $nowhere   ="\"#\"".$datatoggle;
    //---------------------------------------------------------
    // This trys to set class and style for site logo section
    // clearly, there must be a cleaner css solution
    //---------------------------------------------------------
    $logoid   ="";
    $logoclass="";
    if(isIphone())
    {
        $logoid   ="id=\"logospot\"";
        $logoclass="class=\"navbar-brand\"";
    }
    $logostyle= $logoclass."style=\"color:white; text-decoration:none; font-size:30px; font-family:'Roboto',sans-serif; font-weight:900\"";
?>
    <style type="text/css">
      #logospot {
                  position:absolute;
                  top:50%;
                  height:30px;
                  margin-top:-23px
      }
    </style>
    <nav class="navbar navbar-default navbar-fixed-top" style="background-color: black; color: white">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-4">
            <div class="navbar-header">
              <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#menu">
                <!-- <span class="fa fa-bars"></span>  -->
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
              <div <?php echo $logoid ?> class="site-logo">
              <?php if(isAdminLoginOK()) { echo "\n"; ?>
              <a href="/" <?php echo $logostyle; ?>> <?php echo $_SESSION['clientName']; ?></a>
              <?php } echo "\n"; ?>
              <?php if(!isAdminLoginOK()) { $_SESSION['clientName']='EatMe.nyc'; echo "\n"; ?>
              <a href="/" <?php echo $logostyle; ?>>EatMe.nyc</a>
              <?php } echo "\n"; ?>
              </div>
            </div>
          </div>
          <div class="col-md-8">
            <div class="collapse navbar-collapse" id="menu">
              <ul class="nav navbar-nav navbar-right"  style="background-color: black; color: white">
                <?php if(isAdminLoginOK()) { echo "\n"; ?>
                <?php if(hasPermission('canUpdateInventory')) { echo "\n"; ?>
                <li><a href=<?php echo $inventory ?>>Inventory</a></li>
                <?php } echo "\n"; ?>
                <?php if(hasPermission('canUpdateMenu')) { echo "\n"; ?>                                             
                <li><a target="imenu" href=<?php echo $imenu ?>>Edit-Menu</a></li>
                <?php } echo "\n"; ?>
                <li><a href=<?php echo $reports ?>>Reports</a></li>
                <?php if(hasPermission('canAccountEdit')) { echo "\n"; ?>
                <li><a href=<?php echo $inbox ?>>Inbox</a></li>
                <li><a href=<?php echo $client ?>>Client-Admin</a></li>
                <?php } echo "\n"; ?>
                <!-- <li><a class="dropdown-item" href=<?php echo $chpassword ?>>Change Password</a></li> -->
                     <li><a href=<?php echo $logout ?>>Logout</a></li>
                <!-- <li class="dropdown">
                     <a class="dropdown-toggle " href=<?php echo $nowhere ?> role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                     Account-Options <span class="caret"></span>
                     </a>
                    <ul class="dropdown-menu">
                      <li><a class="dropdown-item" href=<?php echo $chpasswd ?>>Change Password</a></li>
                      <li><a class="dropdown-item" href=<?php echo $logout ?>>Logout</a></li>
                    </ul>
                    </li> -->
                <?php } echo "\n"; ?>
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
