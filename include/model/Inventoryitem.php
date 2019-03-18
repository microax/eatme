<?php
require_once "DBObject.php";

/********************************************
 * Inventoryitem represents a table in eatmeDB 
 *
 * @author  mgill
 * @version 190204
 ********************************************
 */
class Inventoryitem extends DBObject
{    
    public $inventoryitemId=0;
    public $inventorygroupId=0;
    public $itemCatagory="";
    public $itemDescription="";
    public $cost="";
    public $sellPrice="";
    public $unitType="";
    public $weightType="";
    public $weightPerServing="";
    public $unitsInhouse=0;
    public $unitsOnOrder=0;
    public $inventoryStatus="";



    /*****************************************************
     * Returns an HTTP parameter list for Inventoryitem object
     *
     * @return
     *****************************************************
     */
    public function makeHTTPParameters()
    {    
        $b ="&";
        $b.="inventoryitemId=".$this->inventoryitemId."&";
        $b.="inventorygroupId=".$this->inventorygroupId."&";
        $b.="itemCatagory=".$this->itemCatagory."&";
        $b.="itemDescription=".$this->itemDescription."&";
        $b.="cost=".$this->cost."&";
        $b.="sellPrice=".$this->sellPrice."&";
        $b.="unitType=".$this->unitType."&";
        $b.="weightType=".$this->weightType."&";
        $b.="weightPerServing=".$this->weightPerServing."&";
        $b.="unitsInhouse=".$this->unitsInhouse."&";
        $b.="unitsOnOrder=".$this->unitsOnOrder."&";
        $b.="inventoryStatus=".$this->inventoryStatus."&";
        return($b);


    }

    /**************************************************************
     * Returns a JSON encoded representation of the Inventoryitem object
     *
     * @return JSON
     **************************************************************
     */
    public function makeJSON()
    {
        return(json_encode($this));
    }

    /******************************************************
     * Construct a Inventoryitem from a JSONObject.
     *
     * @param json
     *        A JSONObject.
     ******************************************************
     */
    function Inventoryitem($jsonString='')
    {
        //--------------------------------------------------------------------
        // I'm basically OK with being quiet on missing JSON property names
        //--------------------------------------------------------------------
        error_reporting( error_reporting() & ~E_NOTICE );
        error_reporting( error_reporting() & ~E_WARNING );

        if($json = $this->getJSON($jsonString) )
        {        
        $this->inventoryitemId= $json['inventoryitemId'];
        $this->inventorygroupId= $json['inventorygroupId'];
        $this->itemCatagory= $json['itemCatagory'];
        $this->itemDescription= $json['itemDescription'];
        $this->cost= $json['cost'];
        $this->sellPrice= $json['sellPrice'];
        $this->unitType= $json['unitType'];
        $this->weightType= $json['weightType'];
        $this->weightPerServing= $json['weightPerServing'];
        $this->unitsInhouse= $json['unitsInhouse'];
        $this->unitsOnOrder= $json['unitsOnOrder'];
        $this->inventoryStatus= $json['inventoryStatus'];

        }
    }
}

?>
