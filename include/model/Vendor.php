<?php
require_once "DBObject.php";

/********************************************
 * Vendor represents a table in eatmeDB 
 *
 * @author  mgill
 * @version 190204
 ********************************************
 */
class Vendor extends DBObject
{    
    public $vendorId=0;
    public $vendorCompany="";
    public $vendorShortName="";
    public $vendorAddress="";
    public $vendorCity="";
    public $vendorState="";
    public $vendorZip="";
    public $vendorCountry="";
    public $vendorPhone="";
    public $vendorSmsNumber="";
    public $vendorEmail="";
    public $vendorContactName="";
    public $vendorCreated="";
    public $vendorModified="";
    public $vendorStatus="";



    /*****************************************************
     * Returns an HTTP parameter list for Vendor object
     *
     * @return
     *****************************************************
     */
    public function makeHTTPParameters()
    {    
        $b ="&";
        $b.="vendorId=".$this->vendorId."&";
        $b.="vendorCompany=".$this->vendorCompany."&";
        $b.="vendorShortName=".$this->vendorShortName."&";
        $b.="vendorAddress=".$this->vendorAddress."&";
        $b.="vendorCity=".$this->vendorCity."&";
        $b.="vendorState=".$this->vendorState."&";
        $b.="vendorZip=".$this->vendorZip."&";
        $b.="vendorCountry=".$this->vendorCountry."&";
        $b.="vendorPhone=".$this->vendorPhone."&";
        $b.="vendorSmsNumber=".$this->vendorSmsNumber."&";
        $b.="vendorEmail=".$this->vendorEmail."&";
        $b.="vendorContactName=".$this->vendorContactName."&";
        $b.="vendorCreated=".$this->vendorCreated."&";
        $b.="vendorModified=".$this->vendorModified."&";
        $b.="vendorStatus=".$this->vendorStatus."&";
        return($b);


    }

    /**************************************************************
     * Returns a JSON encoded representation of the Vendor object
     *
     * @return JSON
     **************************************************************
     */
    public function makeJSON()
    {
        return(json_encode($this));
    }

    /******************************************************
     * Construct a Vendor from a JSONObject.
     *
     * @param json
     *        A JSONObject.
     ******************************************************
     */
    function Vendor($jsonString='')
    {
        //--------------------------------------------------------------------
        // I'm basically OK with being quiet on missing JSON property names
        //--------------------------------------------------------------------
        error_reporting( error_reporting() & ~E_NOTICE );
        error_reporting( error_reporting() & ~E_WARNING );

        if($json = $this->getJSON($jsonString) )
        {        
        $this->vendorId= $json['vendorId'];
        $this->vendorCompany= $json['vendorCompany'];
        $this->vendorShortName= $json['vendorShortName'];
        $this->vendorAddress= $json['vendorAddress'];
        $this->vendorCity= $json['vendorCity'];
        $this->vendorState= $json['vendorState'];
        $this->vendorZip= $json['vendorZip'];
        $this->vendorCountry= $json['vendorCountry'];
        $this->vendorPhone= $json['vendorPhone'];
        $this->vendorSmsNumber= $json['vendorSmsNumber'];
        $this->vendorEmail= $json['vendorEmail'];
        $this->vendorContactName= $json['vendorContactName'];
        $this->vendorCreated= $json['vendorCreated'];
        $this->vendorModified= $json['vendorModified'];
        $this->vendorStatus= $json['vendorStatus'];

        }
    }
}

?>
