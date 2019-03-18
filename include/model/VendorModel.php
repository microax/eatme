<?php
require_once "EatmeDB.php";
require      "Vendor.php";

/********************************************************************
 * VendorModel inherits EatmeDB and provides functions to
 * map Vendor class to eatmeDB.
 *
 * @author  mgill
 * @version 190204
 *********************************************************************
 */
class VendorModel extends EatmeDB
{
    /*********************************************************
     * Returns a Vendor by vendorId
     *
     * @return vendor
     *********************************************************
     */
    public function find($id)
    {
        $query="SELECT vendorId,".
                      "vendorCompany,".
                      "vendorShortName,".
                      "vendorAddress,".
                      "vendorCity,".
                      "vendorState,".
                      "vendorZip,".
                      "vendorCountry,".
                      "vendorPhone,".
                      "vendorSmsNumber,".
                      "vendorEmail,".
                      "vendorContactName,".
                      "vendorCreated,".
                      "vendorModified,".
                      "vendorStatus ".                      		               
	       "FROM vendor ".
	       "WHERE vendorId=".$id;

        return($this->selectDB($query, "Vendor"));
    }

    /*********************************************************
     * Insert a new Vendor into eatmeDB database
     *
     * @param $vendor
     * @return n/a
     *********************************************************
     */
    public function insert($vendor)
    {
        $query="INSERT INTO vendor ( ".
	              "vendorId,".
                      "vendorCompany,".
                      "vendorShortName,".
                      "vendorAddress,".
                      "vendorCity,".
                      "vendorState,".
                      "vendorZip,".
                      "vendorCountry,".
                      "vendorPhone,".
                      "vendorSmsNumber,".
                      "vendorEmail,".
                      "vendorContactName,".
                      "vendorCreated,".
                      "vendorModified,".
                      "vendorStatus ".                      
                           ")".
               "VALUES (".
                      "null,".
                      "'".$this->sqlSafe($vendor->vendorCompany)."',".
                      "'".$this->sqlSafe($vendor->vendorShortName)."',".
                      "'".$this->sqlSafe($vendor->vendorAddress)."',".
                      "'".$this->sqlSafe($vendor->vendorCity)."',".
                      "'".$this->sqlSafe($vendor->vendorState)."',".
                      "'".$this->sqlSafe($vendor->vendorZip)."',".
                      "'".$this->sqlSafe($vendor->vendorCountry)."',".
                      "'".$this->sqlSafe($vendor->vendorPhone)."',".
                      "'".$this->sqlSafe($vendor->vendorSmsNumber)."',".
                      "'".$this->sqlSafe($vendor->vendorEmail)."',".
                      "'".$this->sqlSafe($vendor->vendorContactName)."',".
                      "'".$this->sqlSafe($vendor->vendorCreated)."',".
                      "'".$this->sqlSafe($vendor->vendorModified)."',".
                      "'".$this->sqlSafe($vendor->vendorStatus)."' ".                      
                      ")"; 

        $this->executeQuery($query);
    }


    /*********************************************************
     * Insert a new Vendor into eatmeDB database
     * and return a Vendor with new autoincrement
     * primary key
     *
     * @param  $vendor
     * @return $vendor
     *********************************************************
     */
    public function insert2($vendor)
    {
        $query="INSERT INTO vendor ( ".
	              "vendorId,".
                      "vendorCompany,".
                      "vendorShortName,".
                      "vendorAddress,".
                      "vendorCity,".
                      "vendorState,".
                      "vendorZip,".
                      "vendorCountry,".
                      "vendorPhone,".
                      "vendorSmsNumber,".
                      "vendorEmail,".
                      "vendorContactName,".
                      "vendorCreated,".
                      "vendorModified,".
                      "vendorStatus ".                      
                           ")".
               "VALUES (".
                      "null,".
                      "'".$this->sqlSafe($vendor->vendorCompany)."',".
                      "'".$this->sqlSafe($vendor->vendorShortName)."',".
                      "'".$this->sqlSafe($vendor->vendorAddress)."',".
                      "'".$this->sqlSafe($vendor->vendorCity)."',".
                      "'".$this->sqlSafe($vendor->vendorState)."',".
                      "'".$this->sqlSafe($vendor->vendorZip)."',".
                      "'".$this->sqlSafe($vendor->vendorCountry)."',".
                      "'".$this->sqlSafe($vendor->vendorPhone)."',".
                      "'".$this->sqlSafe($vendor->vendorSmsNumber)."',".
                      "'".$this->sqlSafe($vendor->vendorEmail)."',".
                      "'".$this->sqlSafe($vendor->vendorContactName)."',".
                      "'".$this->sqlSafe($vendor->vendorCreated)."',".
                      "'".$this->sqlSafe($vendor->vendorModified)."',".
                      "'".$this->sqlSafe($vendor->vendorStatus)."' ".                      
                      ")"; 

        $id = $this->executeInsert($query);
	    $vendor->vendorId = $id;
	    return($vendor);	
    }


    /*********************************************************
     * Update a Vendor in eatmeDB database
     *
     * @param $vendor
     * @return n/a
     *********************************************************
     */
    public function update($vendor)
    {
        $query="UPDATE  vendor ".
	          "SET ".
                      "vendorId= ".$vendor->vendorId." ,".
                      "vendorCompany='".$this->sqlSafe($vendor->vendorCompany)."',".
                      "vendorShortName='".$this->sqlSafe($vendor->vendorShortName)."',".
                      "vendorAddress='".$this->sqlSafe($vendor->vendorAddress)."',".
                      "vendorCity='".$this->sqlSafe($vendor->vendorCity)."',".
                      "vendorState='".$this->sqlSafe($vendor->vendorState)."',".
                      "vendorZip='".$this->sqlSafe($vendor->vendorZip)."',".
                      "vendorCountry='".$this->sqlSafe($vendor->vendorCountry)."',".
                      "vendorPhone='".$this->sqlSafe($vendor->vendorPhone)."',".
                      "vendorSmsNumber='".$this->sqlSafe($vendor->vendorSmsNumber)."',".
                      "vendorEmail='".$this->sqlSafe($vendor->vendorEmail)."',".
                      "vendorContactName='".$this->sqlSafe($vendor->vendorContactName)."',".
                      "vendorCreated='".$this->sqlSafe($vendor->vendorCreated)."',".
                      "vendorModified='".$this->sqlSafe($vendor->vendorModified)."',".
                      "vendorStatus='".$this->sqlSafe($vendor->vendorStatus)."' ".                      
	          "WHERE vendorId=".$vendor->vendorId;

        $this->executeQuery($query);
    }

    /*********************************************************
     * Delete a Vendor by vendorId
     *
     * @param  $id
     * @return n/a
     *********************************************************
     */
    public function delete($id)
    {
        $query="DELETE FROM vendor WHERE vendorId=".$id;

        $this->executeQuery($query);
    }
}

?>