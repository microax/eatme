<?php
require_once "DBObject.php";

/********************************************
 * Inventoryitem_vendor represents a table in eatmeDB 
 *
 * @author  mgill
 * @version 190204
 ********************************************
 */
class Inventoryitem_vendor extends DBObject
{    
    public $inventoryitemId=0;
    public $vendorId=0;



    /*****************************************************
     * Returns an HTTP parameter list for Inventoryitem_vendor object
     *
     * @return
     *****************************************************
     */
    public function makeHTTPParameters()
    {    
        $b ="&";
        $b.="inventoryitemId=".$this->inventoryitemId."&";
        $b.="vendorId=".$this->vendorId."&";
        return($b);


    }

    /**************************************************************
     * Returns a JSON encoded representation of the Inventoryitem_vendor object
     *
     * @return JSON
     **************************************************************
     */
    public function makeJSON()
    {
        return(json_encode($this));
    }

    /******************************************************
     * Construct a Inventoryitem_vendor from a JSONObject.
     *
     * @param json
     *        A JSONObject.
     ******************************************************
     */
    function Inventoryitem_vendor($jsonString='')
    {
        //--------------------------------------------------------------------
        // I'm basically OK with being quiet on missing JSON property names
        //--------------------------------------------------------------------
        error_reporting( error_reporting() & ~E_NOTICE );
        error_reporting( error_reporting() & ~E_WARNING );

        if($json = $this->getJSON($jsonString) )
        {        
        $this->inventoryitemId= $json['inventoryitemId'];
        $this->vendorId= $json['vendorId'];

        }
    }
}

?>
