<?php
require_once "EatmeDB.php";
require      "Menuitem.php";

/********************************************************************
 * MenuitemModel inherits EatmeDB and provides functions to
 * map Menuitem class to eatmeDB.
 *
 * @author  mgill
 * @version 190204
 *********************************************************************
 */
class MenuitemModel extends EatmeDB
{
    /*********************************************************
     * Returns a Menuitem by menuitemId
     *
     * @return menuitem
     *********************************************************
     */
    public function find($id)
    {
        $query="SELECT menuitemId,".
                      "menuId,".
                      "menuitemPage,".
                      "menuitemSection,".
                      "menuitemHeader,".
                      "menuitemDescription,".
                      "menuitemCreated,".
                      "menuitemModified,".
                      "menuitemStatus ".                      		               
	       "FROM menuitem ".
	       "WHERE menuitemId=".$id;

        return($this->selectDB($query, "Menuitem"));
    }

    /*********************************************************
     * Insert a new Menuitem into eatmeDB database
     *
     * @param $menuitem
     * @return n/a
     *********************************************************
     */
    public function insert($menuitem)
    {
        $query="INSERT INTO menuitem ( ".
	              "menuitemId,".
                      "menuId,".
                      "menuitemPage,".
                      "menuitemSection,".
                      "menuitemHeader,".
                      "menuitemDescription,".
                      "menuitemCreated,".
                      "menuitemModified,".
                      "menuitemStatus ".                      
                           ")".
               "VALUES (".
                      "null,".
                      " ".$menuitem->menuId." ,".
                      "'".$this->sqlSafe($menuitem->menuitemPage)."',".
                      "'".$this->sqlSafe($menuitem->menuitemSection)."',".
                      "'".$this->sqlSafe($menuitem->menuitemHeader)."',".
                      "'".$this->sqlSafe($menuitem->menuitemDescription)."',".
                      "'".$this->sqlSafe($menuitem->menuitemCreated)."',".
                      "'".$this->sqlSafe($menuitem->menuitemModified)."',".
                      "'".$this->sqlSafe($menuitem->menuitemStatus)."' ".                      
                      ")"; 

        $this->executeQuery($query);
    }


    /*********************************************************
     * Insert a new Menuitem into eatmeDB database
     * and return a Menuitem with new autoincrement
     * primary key
     *
     * @param  $menuitem
     * @return $menuitem
     *********************************************************
     */
    public function insert2($menuitem)
    {
        $query="INSERT INTO menuitem ( ".
	              "menuitemId,".
                      "menuId,".
                      "menuitemPage,".
                      "menuitemSection,".
                      "menuitemHeader,".
                      "menuitemDescription,".
                      "menuitemCreated,".
                      "menuitemModified,".
                      "menuitemStatus ".                      
                           ")".
               "VALUES (".
                      "null,".
                      " ".$menuitem->menuId." ,".
                      "'".$this->sqlSafe($menuitem->menuitemPage)."',".
                      "'".$this->sqlSafe($menuitem->menuitemSection)."',".
                      "'".$this->sqlSafe($menuitem->menuitemHeader)."',".
                      "'".$this->sqlSafe($menuitem->menuitemDescription)."',".
                      "'".$this->sqlSafe($menuitem->menuitemCreated)."',".
                      "'".$this->sqlSafe($menuitem->menuitemModified)."',".
                      "'".$this->sqlSafe($menuitem->menuitemStatus)."' ".                      
                      ")"; 

        $id = $this->executeInsert($query);
	    $menuitem->menuitemId = $id;
	    return($menuitem);	
    }


    /*********************************************************
     * Update a Menuitem in eatmeDB database
     *
     * @param $menuitem
     * @return n/a
     *********************************************************
     */
    public function update($menuitem)
    {
        $query="UPDATE  menuitem ".
	          "SET ".
                      "menuitemId= ".$menuitem->menuitemId." ,".
                      "menuId= ".$menuitem->menuId." ,".
                      "menuitemPage='".$this->sqlSafe($menuitem->menuitemPage)."',".
                      "menuitemSection='".$this->sqlSafe($menuitem->menuitemSection)."',".
                      "menuitemHeader='".$this->sqlSafe($menuitem->menuitemHeader)."',".
                      "menuitemDescription='".$this->sqlSafe($menuitem->menuitemDescription)."',".
                      "menuitemCreated='".$this->sqlSafe($menuitem->menuitemCreated)."',".
                      "menuitemModified='".$this->sqlSafe($menuitem->menuitemModified)."',".
                      "menuitemStatus='".$this->sqlSafe($menuitem->menuitemStatus)."' ".                      
	          "WHERE menuitemId=".$menuitem->menuitemId;

        $this->executeQuery($query);
    }

    /*********************************************************
     * Delete a Menuitem by menuitemId
     *
     * @param  $id
     * @return n/a
     *********************************************************
     */
    public function delete($id)
    {
        $query="DELETE FROM menuitem WHERE menuitemId=".$id;

        $this->executeQuery($query);
    }
}

?>