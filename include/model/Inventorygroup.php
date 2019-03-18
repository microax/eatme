<?php
require_once "DBObject.php";

/********************************************
 * Inventorygroup represents a table in eatmeDB 
 *
 * @author  mgill
 * @version 190204
 ********************************************
 */
class Inventorygroup extends DBObject
{    
    public $inventorygroupId=0;
    public $inventorygroupName="";
    public $account_accountId=0;



    /*****************************************************
     * Returns an HTTP parameter list for Inventorygroup object
     *
     * @return
     *****************************************************
     */
    public function makeHTTPParameters()
    {    
        $b ="&";
        $b.="inventorygroupId=".$this->inventorygroupId."&";
        $b.="inventorygroupName=".$this->inventorygroupName."&";
        $b.="account_accountId=".$this->account_accountId."&";
        return($b);


    }

    /**************************************************************
     * Returns a JSON encoded representation of the Inventorygroup object
     *
     * @return JSON
     **************************************************************
     */
    public function makeJSON()
    {
        return(json_encode($this));
    }

    /******************************************************
     * Construct a Inventorygroup from a JSONObject.
     *
     * @param json
     *        A JSONObject.
     ******************************************************
     */
    function Inventorygroup($jsonString='')
    {
        //--------------------------------------------------------------------
        // I'm basically OK with being quiet on missing JSON property names
        //--------------------------------------------------------------------
        error_reporting( error_reporting() & ~E_NOTICE );
        error_reporting( error_reporting() & ~E_WARNING );

        if($json = $this->getJSON($jsonString) )
        {        
        $this->inventorygroupId= $json['inventorygroupId'];
        $this->inventorygroupName= $json['inventorygroupName'];
        $this->account_accountId= $json['account_accountId'];

        }
    }
}

?>
