<?php
require_once "DBObject.php";

/********************************************
 * Purchase represents a table in eatmeDB 
 *
 * @author  mgill
 * @version 190204
 ********************************************
 */
class Purchase extends DBObject
{    
    public $purchaseId=0;
    public $vendorId=0;
    public $inventoryitemId=0;
    public $purchasedBy=0;
    public $approvedBy=0;
    public $units=0;
    public $cost="";
    public $unitsPerServing="";
    public $sellPrice="";
    public $costPerUnit="";
    public $costOfGoods="";
    public $purchaseDate="";
    public $purchaseStatus="";



    /*****************************************************
     * Returns an HTTP parameter list for Purchase object
     *
     * @return
     *****************************************************
     */
    public function makeHTTPParameters()
    {    
        $b ="&";
        $b.="purchaseId=".$this->purchaseId."&";
        $b.="vendorId=".$this->vendorId."&";
        $b.="inventoryitemId=".$this->inventoryitemId."&";
        $b.="purchasedBy=".$this->purchasedBy."&";
        $b.="approvedBy=".$this->approvedBy."&";
        $b.="units=".$this->units."&";
        $b.="cost=".$this->cost."&";
        $b.="unitsPerServing=".$this->unitsPerServing."&";
        $b.="sellPrice=".$this->sellPrice."&";
        $b.="costPerUnit=".$this->costPerUnit."&";
        $b.="costOfGoods=".$this->costOfGoods."&";
        $b.="purchaseDate=".$this->purchaseDate."&";
        $b.="purchaseStatus=".$this->purchaseStatus."&";
        return($b);


    }

    /**************************************************************
     * Returns a JSON encoded representation of the Purchase object
     *
     * @return JSON
     **************************************************************
     */
    public function makeJSON()
    {
        return(json_encode($this));
    }

    /******************************************************
     * Construct a Purchase from a JSONObject.
     *
     * @param json
     *        A JSONObject.
     ******************************************************
     */
    function Purchase($jsonString='')
    {
        //--------------------------------------------------------------------
        // I'm basically OK with being quiet on missing JSON property names
        //--------------------------------------------------------------------
        error_reporting( error_reporting() & ~E_NOTICE );
        error_reporting( error_reporting() & ~E_WARNING );

        if($json = $this->getJSON($jsonString) )
        {        
        $this->purchaseId= $json['purchaseId'];
        $this->vendorId= $json['vendorId'];
        $this->inventoryitemId= $json['inventoryitemId'];
        $this->purchasedBy= $json['purchasedBy'];
        $this->approvedBy= $json['approvedBy'];
        $this->units= $json['units'];
        $this->cost= $json['cost'];
        $this->unitsPerServing= $json['unitsPerServing'];
        $this->sellPrice= $json['sellPrice'];
        $this->costPerUnit= $json['costPerUnit'];
        $this->costOfGoods= $json['costOfGoods'];
        $this->purchaseDate= $json['purchaseDate'];
        $this->purchaseStatus= $json['purchaseStatus'];

        }
    }
}

?>
