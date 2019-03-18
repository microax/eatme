<?php
require_once "DBObject.php";

/********************************************
 * Menu represents a table in eatmeDB 
 *
 * @author  mgill
 * @version 190204
 ********************************************
 */
class Menu extends DBObject
{    
    public $menuId=0;
    public $accountId=0;
    public $menuTemplate="";
    public $menuName="";
    public $menuCreated="";
    public $menuModified="";
    public $menuModifiedBy=0;
    public $menuApprovedBy=0;
    public $menuStatus="";



    /*****************************************************
     * Returns an HTTP parameter list for Menu object
     *
     * @return
     *****************************************************
     */
    public function makeHTTPParameters()
    {    
        $b ="&";
        $b.="menuId=".$this->menuId."&";
        $b.="accountId=".$this->accountId."&";
        $b.="menuTemplate=".$this->menuTemplate."&";
        $b.="menuName=".$this->menuName."&";
        $b.="menuCreated=".$this->menuCreated."&";
        $b.="menuModified=".$this->menuModified."&";
        $b.="menuModifiedBy=".$this->menuModifiedBy."&";
        $b.="menuApprovedBy=".$this->menuApprovedBy."&";
        $b.="menuStatus=".$this->menuStatus."&";
        return($b);


    }

    /**************************************************************
     * Returns a JSON encoded representation of the Menu object
     *
     * @return JSON
     **************************************************************
     */
    public function makeJSON()
    {
        return(json_encode($this));
    }

    /******************************************************
     * Construct a Menu from a JSONObject.
     *
     * @param json
     *        A JSONObject.
     ******************************************************
     */
    function Menu($jsonString='')
    {
        //--------------------------------------------------------------------
        // I'm basically OK with being quiet on missing JSON property names
        //--------------------------------------------------------------------
        error_reporting( error_reporting() & ~E_NOTICE );
        error_reporting( error_reporting() & ~E_WARNING );

        if($json = $this->getJSON($jsonString) )
        {        
        $this->menuId= $json['menuId'];
        $this->accountId= $json['accountId'];
        $this->menuTemplate= $json['menuTemplate'];
        $this->menuName= $json['menuName'];
        $this->menuCreated= $json['menuCreated'];
        $this->menuModified= $json['menuModified'];
        $this->menuModifiedBy= $json['menuModifiedBy'];
        $this->menuApprovedBy= $json['menuApprovedBy'];
        $this->menuStatus= $json['menuStatus'];

        }
    }
}

?>
