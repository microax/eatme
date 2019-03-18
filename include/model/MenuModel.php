<?php
require_once "EatmeDB.php";
require      "Menu.php";

/********************************************************************
 * MenuModel inherits EatmeDB and provides functions to
 * map Menu class to eatmeDB.
 *
 * @author  mgill
 * @version 190204
 *********************************************************************
 */
class MenuModel extends EatmeDB
{
    /*********************************************************
     * Returns a Menu by menuId
     *
     * @return menu
     *********************************************************
     */
    public function find($id)
    {
        $query="SELECT menuId,".
                      "accountId,".
                      "menuTemplate,".
                      "menuName,".
                      "menuCreated,".
                      "menuModified,".
                      "menuModifiedBy,".
                      "menuApprovedBy,".
                      "menuStatus ".                      		               
	       "FROM menu ".
	       "WHERE menuId=".$id;

        return($this->selectDB($query, "Menu"));
    }

    /*********************************************************
     * Insert a new Menu into eatmeDB database
     *
     * @param $menu
     * @return n/a
     *********************************************************
     */
    public function insert($menu)
    {
        $query="INSERT INTO menu ( ".
	              "menuId,".
                      "accountId,".
                      "menuTemplate,".
                      "menuName,".
                      "menuCreated,".
                      "menuModified,".
                      "menuModifiedBy,".
                      "menuApprovedBy,".
                      "menuStatus ".                      
                           ")".
               "VALUES (".
                      "null,".
                      " ".$menu->accountId." ,".
                      "'".$this->sqlSafe($menu->menuTemplate)."',".
                      "'".$this->sqlSafe($menu->menuName)."',".
                      "'".$this->sqlSafe($menu->menuCreated)."',".
                      "'".$this->sqlSafe($menu->menuModified)."',".
                      " ".$menu->menuModifiedBy." ,".
                      " ".$menu->menuApprovedBy." ,".
                      "'".$this->sqlSafe($menu->menuStatus)."' ".                      
                      ")"; 

        $this->executeQuery($query);
    }


    /*********************************************************
     * Insert a new Menu into eatmeDB database
     * and return a Menu with new autoincrement
     * primary key
     *
     * @param  $menu
     * @return $menu
     *********************************************************
     */
    public function insert2($menu)
    {
        $query="INSERT INTO menu ( ".
	              "menuId,".
                      "accountId,".
                      "menuTemplate,".
                      "menuName,".
                      "menuCreated,".
                      "menuModified,".
                      "menuModifiedBy,".
                      "menuApprovedBy,".
                      "menuStatus ".                      
                           ")".
               "VALUES (".
                      "null,".
                      " ".$menu->accountId." ,".
                      "'".$this->sqlSafe($menu->menuTemplate)."',".
                      "'".$this->sqlSafe($menu->menuName)."',".
                      "'".$this->sqlSafe($menu->menuCreated)."',".
                      "'".$this->sqlSafe($menu->menuModified)."',".
                      " ".$menu->menuModifiedBy." ,".
                      " ".$menu->menuApprovedBy." ,".
                      "'".$this->sqlSafe($menu->menuStatus)."' ".                      
                      ")"; 

        $id = $this->executeInsert($query);
	    $menu->menuId = $id;
	    return($menu);	
    }


    /*********************************************************
     * Update a Menu in eatmeDB database
     *
     * @param $menu
     * @return n/a
     *********************************************************
     */
    public function update($menu)
    {
        $query="UPDATE  menu ".
	          "SET ".
                      "menuId= ".$menu->menuId." ,".
                      "accountId= ".$menu->accountId." ,".
                      "menuTemplate='".$this->sqlSafe($menu->menuTemplate)."',".
                      "menuName='".$this->sqlSafe($menu->menuName)."',".
                      "menuCreated='".$this->sqlSafe($menu->menuCreated)."',".
                      "menuModified='".$this->sqlSafe($menu->menuModified)."',".
                      "menuModifiedBy= ".$menu->menuModifiedBy." ,".
                      "menuApprovedBy= ".$menu->menuApprovedBy." ,".
                      "menuStatus='".$this->sqlSafe($menu->menuStatus)."' ".                      
	          "WHERE menuId=".$menu->menuId;

        $this->executeQuery($query);
    }

    /*********************************************************
     * Delete a Menu by menuId
     *
     * @param  $id
     * @return n/a
     *********************************************************
     */
    public function delete($id)
    {
        $query="DELETE FROM menu WHERE menuId=".$id;

        $this->executeQuery($query);
    }
}

?>