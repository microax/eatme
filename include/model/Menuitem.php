<?php
require_once "DBObject.php";

/********************************************
 * Menuitem represents a table in eatmeDB 
 *
 * @author  mgill
 * @version 190204
 ********************************************
 */
class Menuitem extends DBObject
{    
    public $menuitemId=0;
    public $menuId=0;
    public $menuitemPage="";
    public $menuitemSection="";
    public $menuitemHeader="";
    public $menuitemDescription="";
    public $menuitemCreated="";
    public $menuitemModified="";
    public $menuitemStatus="";



    /*****************************************************
     * Returns an HTTP parameter list for Menuitem object
     *
     * @return
     *****************************************************
     */
    public function makeHTTPParameters()
    {    
        $b ="&";
        $b.="menuitemId=".$this->menuitemId."&";
        $b.="menuId=".$this->menuId."&";
        $b.="menuitemPage=".$this->menuitemPage."&";
        $b.="menuitemSection=".$this->menuitemSection."&";
        $b.="menuitemHeader=".$this->menuitemHeader."&";
        $b.="menuitemDescription=".$this->menuitemDescription."&";
        $b.="menuitemCreated=".$this->menuitemCreated."&";
        $b.="menuitemModified=".$this->menuitemModified."&";
        $b.="menuitemStatus=".$this->menuitemStatus."&";
        return($b);


    }

    /**************************************************************
     * Returns a JSON encoded representation of the Menuitem object
     *
     * @return JSON
     **************************************************************
     */
    public function makeJSON()
    {
        return(json_encode($this));
    }

    /******************************************************
     * Construct a Menuitem from a JSONObject.
     *
     * @param json
     *        A JSONObject.
     ******************************************************
     */
    function Menuitem($jsonString='')
    {
        //--------------------------------------------------------------------
        // I'm basically OK with being quiet on missing JSON property names
        //--------------------------------------------------------------------
        error_reporting( error_reporting() & ~E_NOTICE );
        error_reporting( error_reporting() & ~E_WARNING );

        if($json = $this->getJSON($jsonString) )
        {        
        $this->menuitemId= $json['menuitemId'];
        $this->menuId= $json['menuId'];
        $this->menuitemPage= $json['menuitemPage'];
        $this->menuitemSection= $json['menuitemSection'];
        $this->menuitemHeader= $json['menuitemHeader'];
        $this->menuitemDescription= $json['menuitemDescription'];
        $this->menuitemCreated= $json['menuitemCreated'];
        $this->menuitemModified= $json['menuitemModified'];
        $this->menuitemStatus= $json['menuitemStatus'];

        }
    }
}

?>
