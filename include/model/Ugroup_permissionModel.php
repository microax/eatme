<?php
require_once "EatmeDB.php";
require      "Ugroup_permission.php";

/********************************************************************
 * Ugroup_permissionModel inherits EatmeDB and provides functions to
 * map Ugroup_permission class to eatmeDB.
 *
 * @author  mgill
 * @version 190204
 *********************************************************************
 */
class Ugroup_permissionModel extends EatmeDB
{
    /*********************************************************
     * Insert a new Ugroup_permission into eatmeDB database
     *
     * @param $ugroup_permission
     * @return n/a
     *********************************************************
     */
    public function insert($ugroup_permission)
    {
        $query="INSERT INTO ugroup_permission ( ".
                      "ugroupId,".
                      "permissionId ".                      
                           ")".
               "VALUES (".
                      " ".$ugroup_permission->ugroupId." ,".
                      " ".$ugroup_permission->permissionId."  ".                      
                     ")"; 

        $this->executeQuery($query);
    }

    /*********************************************************
     * Delete a Ugroup_permission by keys
     *
     * @param  $id
     * @param  $id2
     *
     * @return n/a
     *********************************************************
     */
    public function delete($id, $id2)
    {
        $query="DELETE FROM ugroup_permission WHERE ugroupId=".$id." AND permissionId=".$id2;

        $this->executeQuery($query);
    }

}
?>    