<?php
require_once "DBObject.php";

/********************************************
 * User represents a table in eatmeDB 
 *
 * @author  mgill
 * @version 190204
 ********************************************
 */
class User extends DBObject
{    
    public $userId=0;
    public $accountId=0;
    public $userName="";
    public $userPassword="";
    public $userPasscode="";
    public $userFirstName="";
    public $userLastName="";
    public $userNickName="";
    public $userPhoto="";
    public $userLongitude="";
    public $userLatitude="";
    public $userLastLogin="";
    public $userPhone="";
    public $userEmail="";
    public $userCreated="";
    public $userModified="";
    public $userStatus="";



    /*****************************************************
     * Returns an HTTP parameter list for User object
     *
     * @return
     *****************************************************
     */
    public function makeHTTPParameters()
    {    
        $b ="&";
        $b.="userId=".$this->userId."&";
        $b.="accountId=".$this->accountId."&";
        $b.="userName=".$this->userName."&";
        $b.="userPassword=".$this->userPassword."&";
        $b.="userPasscode=".$this->userPasscode."&";
        $b.="userFirstName=".$this->userFirstName."&";
        $b.="userLastName=".$this->userLastName."&";
        $b.="userNickName=".$this->userNickName."&";
        $b.="userPhoto=".$this->userPhoto."&";
        $b.="userLongitude=".$this->userLongitude."&";
        $b.="userLatitude=".$this->userLatitude."&";
        $b.="userLastLogin=".$this->userLastLogin."&";
        $b.="userPhone=".$this->userPhone."&";
        $b.="userEmail=".$this->userEmail."&";
        $b.="userCreated=".$this->userCreated."&";
        $b.="userModified=".$this->userModified."&";
        $b.="userStatus=".$this->userStatus."&";
        return($b);


    }

    /**************************************************************
     * Returns a JSON encoded representation of the User object
     *
     * @return JSON
     **************************************************************
     */
    public function makeJSON()
    {
        return(json_encode($this));
    }

    /******************************************************
     * Construct a User from a JSONObject.
     *
     * @param json
     *        A JSONObject.
     ******************************************************
     */
    function User($jsonString='')
    {
        //--------------------------------------------------------------------
        // I'm basically OK with being quiet on missing JSON property names
        //--------------------------------------------------------------------
        error_reporting( error_reporting() & ~E_NOTICE );
        error_reporting( error_reporting() & ~E_WARNING );

        if($json = $this->getJSON($jsonString) )
        {        
        $this->userId= $json['userId'];
        $this->accountId= $json['accountId'];
        $this->userName= $json['userName'];
        $this->userPassword= $json['userPassword'];
        $this->userPasscode= $json['userPasscode'];
        $this->userFirstName= $json['userFirstName'];
        $this->userLastName= $json['userLastName'];
        $this->userNickName= $json['userNickName'];
        $this->userPhoto= $json['userPhoto'];
        $this->userLongitude= $json['userLongitude'];
        $this->userLatitude= $json['userLatitude'];
        $this->userLastLogin= $json['userLastLogin'];
        $this->userPhone= $json['userPhone'];
        $this->userEmail= $json['userEmail'];
        $this->userCreated= $json['userCreated'];
        $this->userModified= $json['userModified'];
        $this->userStatus= $json['userStatus'];

        }
    }
}

?>
