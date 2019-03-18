<?php
require_once "EatmeDB.php";
require      "Purchase.php";

/********************************************************************
 * PurchaseModel inherits EatmeDB and provides functions to
 * map Purchase class to eatmeDB.
 *
 * @author  mgill
 * @version 190204
 *********************************************************************
 */
class PurchaseModel extends EatmeDB
{
    /*********************************************************
     * Returns a Purchase by purchaseId
     *
     * @return purchase
     *********************************************************
     */
    public function find($id)
    {
        $query="SELECT purchaseId,".
                      "vendorId,".
                      "inventoryitemId,".
                      "purchasedBy,".
                      "approvedBy,".
                      "units,".
                      "cost,".
                      "unitsPerServing,".
                      "sellPrice,".
                      "costPerUnit,".
                      "costOfGoods,".
                      "purchaseDate,".
                      "purchaseStatus ".                      		               
	       "FROM purchase ".
	       "WHERE purchaseId=".$id;

        return($this->selectDB($query, "Purchase"));
    }

    /*********************************************************
     * Insert a new Purchase into eatmeDB database
     *
     * @param $purchase
     * @return n/a
     *********************************************************
     */
    public function insert($purchase)
    {
        $query="INSERT INTO purchase ( ".
	              "purchaseId,".
                      "vendorId,".
                      "inventoryitemId,".
                      "purchasedBy,".
                      "approvedBy,".
                      "units,".
                      "cost,".
                      "unitsPerServing,".
                      "sellPrice,".
                      "costPerUnit,".
                      "costOfGoods,".
                      "purchaseDate,".
                      "purchaseStatus ".                      
                           ")".
               "VALUES (".
                      "null,".
                      " ".$purchase->vendorId." ,".
                      " ".$purchase->inventoryitemId." ,".
                      " ".$purchase->purchasedBy." ,".
                      " ".$purchase->approvedBy." ,".
                      " ".$purchase->units." ,".
                      "'".$this->sqlSafe($purchase->cost)."',".
                      "'".$this->sqlSafe($purchase->unitsPerServing)."',".
                      "'".$this->sqlSafe($purchase->sellPrice)."',".
                      "'".$this->sqlSafe($purchase->costPerUnit)."',".
                      "'".$this->sqlSafe($purchase->costOfGoods)."',".
                      "'".$this->sqlSafe($purchase->purchaseDate)."',".
                      "'".$this->sqlSafe($purchase->purchaseStatus)."' ".                      
                      ")"; 

        $this->executeQuery($query);
    }


    /*********************************************************
     * Insert a new Purchase into eatmeDB database
     * and return a Purchase with new autoincrement
     * primary key
     *
     * @param  $purchase
     * @return $purchase
     *********************************************************
     */
    public function insert2($purchase)
    {
        $query="INSERT INTO purchase ( ".
	              "purchaseId,".
                      "vendorId,".
                      "inventoryitemId,".
                      "purchasedBy,".
                      "approvedBy,".
                      "units,".
                      "cost,".
                      "unitsPerServing,".
                      "sellPrice,".
                      "costPerUnit,".
                      "costOfGoods,".
                      "purchaseDate,".
                      "purchaseStatus ".                      
                           ")".
               "VALUES (".
                      "null,".
                      " ".$purchase->vendorId." ,".
                      " ".$purchase->inventoryitemId." ,".
                      " ".$purchase->purchasedBy." ,".
                      " ".$purchase->approvedBy." ,".
                      " ".$purchase->units." ,".
                      "'".$this->sqlSafe($purchase->cost)."',".
                      "'".$this->sqlSafe($purchase->unitsPerServing)."',".
                      "'".$this->sqlSafe($purchase->sellPrice)."',".
                      "'".$this->sqlSafe($purchase->costPerUnit)."',".
                      "'".$this->sqlSafe($purchase->costOfGoods)."',".
                      "'".$this->sqlSafe($purchase->purchaseDate)."',".
                      "'".$this->sqlSafe($purchase->purchaseStatus)."' ".                      
                      ")"; 

        $id = $this->executeInsert($query);
	    $purchase->purchaseId = $id;
	    return($purchase);	
    }


    /*********************************************************
     * Update a Purchase in eatmeDB database
     *
     * @param $purchase
     * @return n/a
     *********************************************************
     */
    public function update($purchase)
    {
        $query="UPDATE  purchase ".
	          "SET ".
                      "purchaseId= ".$purchase->purchaseId." ,".
                      "vendorId= ".$purchase->vendorId." ,".
                      "inventoryitemId= ".$purchase->inventoryitemId." ,".
                      "purchasedBy= ".$purchase->purchasedBy." ,".
                      "approvedBy= ".$purchase->approvedBy." ,".
                      "units= ".$purchase->units." ,".
                      "cost='".$this->sqlSafe($purchase->cost)."',".
                      "unitsPerServing='".$this->sqlSafe($purchase->unitsPerServing)."',".
                      "sellPrice='".$this->sqlSafe($purchase->sellPrice)."',".
                      "costPerUnit='".$this->sqlSafe($purchase->costPerUnit)."',".
                      "costOfGoods='".$this->sqlSafe($purchase->costOfGoods)."',".
                      "purchaseDate='".$this->sqlSafe($purchase->purchaseDate)."',".
                      "purchaseStatus='".$this->sqlSafe($purchase->purchaseStatus)."' ".                      
	          "WHERE purchaseId=".$purchase->purchaseId;

        $this->executeQuery($query);
    }

    /*********************************************************
     * Delete a Purchase by purchaseId
     *
     * @param  $id
     * @return n/a
     *********************************************************
     */
    public function delete($id)
    {
        $query="DELETE FROM purchase WHERE purchaseId=".$id;

        $this->executeQuery($query);
    }
}

?>