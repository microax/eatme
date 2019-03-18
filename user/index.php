<?php
require_once "../include/view/page/admin/usersIncludeFiles.php";
require_once "../include/etc/session.php";
require_once "../include/model/UserLoginModel.php";
siteSession();

/**
 * This is the /user controller.
 *
 * functions:
 * --------------
 * setClient()  
 *
 * @author    Dixie
 * @copyright 2018
 *
 */
if(isAdminLoginOK())
{
    switch(getRequest("func"))
    {
        case "set_client": 
        setClient();
        break;

        case "select_account": 
        selectAccount();
        break;

        case "switch_client": 
        switchClient();
        break;

        case "home":
        redirect("/admin/");
        break;
   
        default:
        redirect("/admin/");
    }
}
else
{
    //------------------------------------
    // if we're not logged in, do that...
    //------------------------------------
    redirect("/login/");
}

/**
 * setClient -- pick client to work with
 *
 */
function setClient()
{
    $db       = new UserLoginModel();
    $accounts = $db->findAllAccounts();
    
    viewSetClient($accounts);
}


/**
 * setClient -- pick client to work with
 *
 */
function switchClient()
{
    $db       = new UserLoginModel();
    $accounts = $db->findAllAccounts();
    
    viewSetClient($accounts);
}


/**
 * selectAccount -- account selected
 *
 */
function selectAccount()
{
    $db = new UserLoginModel();

    $_SESSION['clientId']= getRequest("id");    
    $_SESSION['clientName'] = $db->getCompanyShortNameByAccountId(getRequest("id"));


    redirect("/admin/");
}

?>
