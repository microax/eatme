<?php
require_once "EatmeDB.php";
require      "Inventorygroup.php";

/********************************************************************
 * InventorygroupModel inherits EatmeDB and provides functions to
 * map Inventorygroup class to eatmeDB.
 *
 * @author  mgill
 * @version 190204
 *********************************************************************
 */
class InventorygroupModel extends EatmeDB
{
    /*********************************************************
     * Returns a Inventorygroup by inventorygroupId
     *
     * @return inventorygroup
     *********************************************************
     */
    public function find($id)
    {
        $query="SELECT inventorygroupId,".
                      "inventorygroupName,".
                      "account_accountId ".                      		               
	       "FROM inventorygroup ".
	       "WHERE inventorygroupId=".$id;

        return($this->selectDB($query, "Inventorygroup"));
    }

    /*********************************************************
     * Insert a new Inventorygroup into eatmeDB database
     *
     * @param $inventorygroup
     * @return n/a
     *********************************************************
     */
    public function insert($inventorygroup)
    {
        $query="INSERT INTO inventorygroup ( ".
	              "inventorygroupId,".
                      "inventorygroupName,".
                      "account_accountId ".                      
                           ")".
               "VALUES (".
                      "null,".
                      "'".$this->sqlSafe($inventorygroup->inventorygroupName)."',".
                      " ".$inventorygroup->account_accountId."  ".                      
                      ")"; 

        $this->executeQuery($query);
    }


    /*********************************************************
     * Insert a new Inventorygroup into eatmeDB database
     * and return a Inventorygroup with new autoincrement
     * primary key
     *
     * @param  $inventorygroup
     * @return $inventorygroup
     *********************************************************
     */
    public function insert2($inventorygroup)
    {
        $query="INSERT INTO inventorygroup ( ".
	              "inventorygroupId,".
                      "inventorygroupName,".
                      "account_accountId ".                      
                           ")".
               "VALUES (".
                      "null,".
                      "'".$this->sqlSafe($inventorygroup->inventorygroupName)."',".
                      " ".$inventorygroup->account_accountId."  ".                      
                      ")"; 

        $id = $this->executeInsert($query);
	    $inventorygroup->inventorygroupId = $id;
	    return($inventorygroup);	
    }


    /*********************************************************
     * Update a Inventorygroup in eatmeDB database
     *
     * @param $inventorygroup
     * @return n/a
     *********************************************************
     */
    public function update($inventorygroup)
    {
        $query="UPDATE  inventorygroup ".
	          "SET ".
                      "inventorygroupId= ".$inventorygroup->inventorygroupId." ,".
                      "inventorygroupName='".$this->sqlSafe($inventorygroup->inventorygroupName)."',".
                      "account_accountId= ".$inventorygroup->account_accountId."  ".                      
	          "WHERE inventorygroupId=".$inventorygroup->inventorygroupId;

        $this->executeQuery($query);
    }

    /*********************************************************
     * Delete a Inventorygroup by inventorygroupId
     *
     * @param  $id
     * @return n/a
     *********************************************************
     */
    public function delete($id)
    {
        $query="DELETE FROM inventorygroup WHERE inventorygroupId=".$id;

        $this->executeQuery($query);
    }
}

?>