<?php
require_once "EatmeDB.php";
require      "Permission.php";

/********************************************************************
 * PermissionModel inherits EatmeDB and provides functions to
 * map Permission class to eatmeDB.
 *
 * @author  mgill
 * @version 190204
 *********************************************************************
 */
class PermissionModel extends EatmeDB
{
    /*********************************************************
     * Returns a Permission by permissionId
     *
     * @return permission
     *********************************************************
     */
    public function find($id)
    {
        $query="SELECT permissionId,".
                      "permissionName ".                      		               
	       "FROM permission ".
	       "WHERE permissionId=".$id;

        return($this->selectDB($query, "Permission"));
    }

    /*********************************************************
     * Insert a new Permission into eatmeDB database
     *
     * @param $permission
     * @return n/a
     *********************************************************
     */
    public function insert($permission)
    {
        $query="INSERT INTO permission ( ".
	              "permissionId,".
                      "permissionName ".                      
                           ")".
               "VALUES (".
                      "null,".
                      "'".$this->sqlSafe($permission->permissionName)."' ".                      
                      ")"; 

        $this->executeQuery($query);
    }


    /*********************************************************
     * Insert a new Permission into eatmeDB database
     * and return a Permission with new autoincrement
     * primary key
     *
     * @param  $permission
     * @return $permission
     *********************************************************
     */
    public function insert2($permission)
    {
        $query="INSERT INTO permission ( ".
	              "permissionId,".
                      "permissionName ".                      
                           ")".
               "VALUES (".
                      "null,".
                      "'".$this->sqlSafe($permission->permissionName)."' ".                      
                      ")"; 

        $id = $this->executeInsert($query);
	    $permission->permissionId = $id;
	    return($permission);	
    }


    /*********************************************************
     * Update a Permission in eatmeDB database
     *
     * @param $permission
     * @return n/a
     *********************************************************
     */
    public function update($permission)
    {
        $query="UPDATE  permission ".
	          "SET ".
                      "permissionId= ".$permission->permissionId." ,".
                      "permissionName='".$this->sqlSafe($permission->permissionName)."' ".                      
	          "WHERE permissionId=".$permission->permissionId;

        $this->executeQuery($query);
    }

    /*********************************************************
     * Delete a Permission by permissionId
     *
     * @param  $id
     * @return n/a
     *********************************************************
     */
    public function delete($id)
    {
        $query="DELETE FROM permission WHERE permissionId=".$id;

        $this->executeQuery($query);
    }
}

?>