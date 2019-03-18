<?php

/***********************************
 * head.php 
 * @author  dixie
 ***********************************
*/			
function head()  
{
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="apple-mobile-web-app-title" content="Eat Me NYC">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="keywords" content="Operational, management Services,service industry" />
    <meta name="description" content="Operational Management Services for the Service Industry"/>
    <title><?php echo getUserSession("page"); ?></title>
	<link href="/css/bootstrap.css" rel="stylesheet">
	<link href="/css/font-awesome.min.css" rel="stylesheet" >
	<link href="/css/animate.css" rel="stylesheet" />
	<link href="/css/prettyPhoto.css" rel="stylesheet"> 
	<link href="/css/style.css" rel="stylesheet">	
  </head>
  <body>
<?php
}

/**
 * pageTitle -- sets page name 
 * 
 * @param $page -- page name
 *
 */			
function pageTitle($page)
{
    setUserSession("page", $page);
}
?>
