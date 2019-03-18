<?php
/***********************************
 * config.php
 * @author  megan
 ***********************************
*/			

function systemEmail()
{
    $admins = array('mgill@metaqueue.net');
    return($admins);
}

function pubServerAddress()
{
    return("http://eatme.metaqueue.net");
}

function smtpConfig()
{
    return("/opt/install/PHPMailer/PHPMailer.json");
}

function photoData()
{
    return("/opt/data/eatme/");
}

?>
