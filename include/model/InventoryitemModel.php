<?php
require_once "EatmeDB.php";
require      "Inventoryitem.php";

/********************************************************************
 * InventoryitemModel inherits EatmeDB and provides functions to
 * map Inventoryitem class to eatmeDB.
 *
 * @author  mgill
 * @version 190204
 *********************************************************************
 */
class InventoryitemModel extends EatmeDB
{
    /*********************************************************
     * Returns a Inventoryitem by inventoryitemId
     *
     * @return inventoryitem
     *********************************************************
     */
    public function find($id)
    {
        $query="SELECT inventoryitemId,".
                      "inventorygroupId,".
                      "itemCatagory,".
                      "itemDescription,".
                      "cost,".
                      "sellPrice,".
                      "unitType,".
                      "weightType,".
                      "weightPerServing,".
                      "unitsInhouse,".
                      "unitsOnOrder,".
                      "inventoryStatus ".                      		               
	       "FROM inventoryitem ".
	       "WHERE inventoryitemId=".$id;

        return($this->selectDB($query, "Inventoryitem"));
    }

    /*********************************************************
     * Insert a new Inventoryitem into eatmeDB database
     *
     * @param $inventoryitem
     * @return n/a
     *********************************************************
     */
    public function insert($inventoryitem)
    {
        $query="INSERT INTO inventoryitem ( ".
	              "inventoryitemId,".
                      "inventorygroupId,".
                      "itemCatagory,".
                      "itemDescription,".
                      "cost,".
                      "sellPrice,".
                      "unitType,".
                      "weightType,".
                      "weightPerServing,".
                      "unitsInhouse,".
                      "unitsOnOrder,".
                      "inventoryStatus ".                      
                           ")".
               "VALUES (".
                      "null,".
                      " ".$inventoryitem->inventorygroupId." ,".
                      "'".$this->sqlSafe($inventoryitem->itemCatagory)."',".
                      "'".$this->sqlSafe($inventoryitem->itemDescription)."',".
                      "'".$this->sqlSafe($inventoryitem->cost)."',".
                      "'".$this->sqlSafe($inventoryitem->sellPrice)."',".
                      "'".$this->sqlSafe($inventoryitem->unitType)."',".
                      "'".$this->sqlSafe($inventoryitem->weightType)."',".
                      "'".$this->sqlSafe($inventoryitem->weightPerServing)."',".
                      " ".$inventoryitem->unitsInhouse." ,".
                      " ".$inventoryitem->unitsOnOrder." ,".
                      "'".$this->sqlSafe($inventoryitem->inventoryStatus)."' ".                      
                      ")"; 

        $this->executeQuery($query);
    }


    /*********************************************************
     * Insert a new Inventoryitem into eatmeDB database
     * and return a Inventoryitem with new autoincrement
     * primary key
     *
     * @param  $inventoryitem
     * @return $inventoryitem
     *********************************************************
     */
    public function insert2($inventoryitem)
    {
        $query="INSERT INTO inventoryitem ( ".
	              "inventoryitemId,".
                      "inventorygroupId,".
                      "itemCatagory,".
                      "itemDescription,".
                      "cost,".
                      "sellPrice,".
                      "unitType,".
                      "weightType,".
                      "weightPerServing,".
                      "unitsInhouse,".
                      "unitsOnOrder,".
                      "inventoryStatus ".                      
                           ")".
               "VALUES (".
                      "null,".
                      " ".$inventoryitem->inventorygroupId." ,".
                      "'".$this->sqlSafe($inventoryitem->itemCatagory)."',".
                      "'".$this->sqlSafe($inventoryitem->itemDescription)."',".
                      "'".$this->sqlSafe($inventoryitem->cost)."',".
                      "'".$this->sqlSafe($inventoryitem->sellPrice)."',".
                      "'".$this->sqlSafe($inventoryitem->unitType)."',".
                      "'".$this->sqlSafe($inventoryitem->weightType)."',".
                      "'".$this->sqlSafe($inventoryitem->weightPerServing)."',".
                      " ".$inventoryitem->unitsInhouse." ,".
                      " ".$inventoryitem->unitsOnOrder." ,".
                      "'".$this->sqlSafe($inventoryitem->inventoryStatus)."' ".                      
                      ")"; 

        $id = $this->executeInsert($query);
	    $inventoryitem->inventoryitemId = $id;
	    return($inventoryitem);	
    }


    /*********************************************************
     * Update a Inventoryitem in eatmeDB database
     *
     * @param $inventoryitem
     * @return n/a
     *********************************************************
     */
    public function update($inventoryitem)
    {
        $query="UPDATE  inventoryitem ".
	          "SET ".
                      "inventoryitemId= ".$inventoryitem->inventoryitemId." ,".
                      "inventorygroupId= ".$inventoryitem->inventorygroupId." ,".
                      "itemCatagory='".$this->sqlSafe($inventoryitem->itemCatagory)."',".
                      "itemDescription='".$this->sqlSafe($inventoryitem->itemDescription)."',".
                      "cost='".$this->sqlSafe($inventoryitem->cost)."',".
                      "sellPrice='".$this->sqlSafe($inventoryitem->sellPrice)."',".
                      "unitType='".$this->sqlSafe($inventoryitem->unitType)."',".
                      "weightType='".$this->sqlSafe($inventoryitem->weightType)."',".
                      "weightPerServing='".$this->sqlSafe($inventoryitem->weightPerServing)."',".
                      "unitsInhouse= ".$inventoryitem->unitsInhouse." ,".
                      "unitsOnOrder= ".$inventoryitem->unitsOnOrder." ,".
                      "inventoryStatus='".$this->sqlSafe($inventoryitem->inventoryStatus)."' ".                      
	          "WHERE inventoryitemId=".$inventoryitem->inventoryitemId;

        $this->executeQuery($query);
    }

    /*********************************************************
     * Delete a Inventoryitem by inventoryitemId
     *
     * @param  $id
     * @return n/a
     *********************************************************
     */
    public function delete($id)
    {
        $query="DELETE FROM inventoryitem WHERE inventoryitemId=".$id;

        $this->executeQuery($query);
    }
}

?>