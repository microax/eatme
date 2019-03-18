<?php
require_once "DBObject.php";

/********************************************
 * Message represents a table in eatmeDB 
 *
 * @author  mgill
 * @version 190204
 ********************************************
 */
class Message extends DBObject
{    
    public $messageId=0;
    public $userId=0;
    public $messageFrom=0;
    public $messageSubject="";
    public $messageBody="";
    public $messageCreated="";
    public $messageModified="";
    public $messageStatus="";



    /*****************************************************
     * Returns an HTTP parameter list for Message object
     *
     * @return
     *****************************************************
     */
    public function makeHTTPParameters()
    {    
        $b ="&";
        $b.="messageId=".$this->messageId."&";
        $b.="userId=".$this->userId."&";
        $b.="messageFrom=".$this->messageFrom."&";
        $b.="messageSubject=".$this->messageSubject."&";
        $b.="messageBody=".$this->messageBody."&";
        $b.="messageCreated=".$this->messageCreated."&";
        $b.="messageModified=".$this->messageModified."&";
        $b.="messageStatus=".$this->messageStatus."&";
        return($b);


    }

    /**************************************************************
     * Returns a JSON encoded representation of the Message object
     *
     * @return JSON
     **************************************************************
     */
    public function makeJSON()
    {
        return(json_encode($this));
    }

    /******************************************************
     * Construct a Message from a JSONObject.
     *
     * @param json
     *        A JSONObject.
     ******************************************************
     */
    function Message($jsonString='')
    {
        //--------------------------------------------------------------------
        // I'm basically OK with being quiet on missing JSON property names
        //--------------------------------------------------------------------
        error_reporting( error_reporting() & ~E_NOTICE );
        error_reporting( error_reporting() & ~E_WARNING );

        if($json = $this->getJSON($jsonString) )
        {        
        $this->messageId= $json['messageId'];
        $this->userId= $json['userId'];
        $this->messageFrom= $json['messageFrom'];
        $this->messageSubject= $json['messageSubject'];
        $this->messageBody= $json['messageBody'];
        $this->messageCreated= $json['messageCreated'];
        $this->messageModified= $json['messageModified'];
        $this->messageStatus= $json['messageStatus'];

        }
    }
}

?>
