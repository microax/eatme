<?php
require_once "EatmeDB.php";
require      "Inventoryitem_vendor.php";

/********************************************************************
 * Inventoryitem_vendorModel inherits EatmeDB and provides functions to
 * map Inventoryitem_vendor class to eatmeDB.
 *
 * @author  mgill
 * @version 190204
 *********************************************************************
 */
class Inventoryitem_vendorModel extends EatmeDB
{
    /*********************************************************
     * Insert a new Inventoryitem_vendor into eatmeDB database
     *
     * @param $inventoryitem_vendor
     * @return n/a
     *********************************************************
     */
    public function insert($inventoryitem_vendor)
    {
        $query="INSERT INTO inventoryitem_vendor ( ".
                      "inventoryitemId,".
                      "vendorId ".                      
                           ")".
               "VALUES (".
                      " ".$inventoryitem_vendor->inventoryitemId." ,".
                      " ".$inventoryitem_vendor->vendorId."  ".                      
                     ")"; 

        $this->executeQuery($query);
    }

    /*********************************************************
     * Delete a Inventoryitem_vendor by keys
     *
     * @param  $id
     * @param  $id2
     *
     * @return n/a
     *********************************************************
     */
    public function delete($id, $id2)
    {
        $query="DELETE FROM inventoryitem_vendor WHERE inventoryitemId=".$id." AND vendorId=".$id2;

        $this->executeQuery($query);
    }

}
?>    