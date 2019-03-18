<?php
require_once "EatmeDB.php";
require      "Account.php";

/********************************************************************
 * AccountModel inherits EatmeDB and provides functions to
 * map Account class to eatmeDB.
 *
 * @author  mgill
 * @version 190204
 *********************************************************************
 */
class AccountModel extends EatmeDB
{
    /*********************************************************
     * Returns a Account by accountId
     *
     * @return account
     *********************************************************
     */
    public function find($id)
    {
        $query="SELECT accountId,".
                      "accountCompany,".
                      "accountAddress,".
                      "accountCity,".
                      "accountState,".
                      "accountZip,".
                      "accountCountry,".
                      "accountPhone,".
                      "accountFax,".
                      "accountEmail,".
                      "accountContactName,".
                      "accountShortName,".
                      "accountCreated,".
                      "accountModified,".
                      "accountStatus ".                      		               
	       "FROM account ".
	       "WHERE accountId=".$id;

        return($this->selectDB($query, "Account"));
    }

    /*********************************************************
     * Insert a new Account into eatmeDB database
     *
     * @param $account
     * @return n/a
     *********************************************************
     */
    public function insert($account)
    {
        $query="INSERT INTO account ( ".
	              "accountId,".
                      "accountCompany,".
                      "accountAddress,".
                      "accountCity,".
                      "accountState,".
                      "accountZip,".
                      "accountCountry,".
                      "accountPhone,".
                      "accountFax,".
                      "accountEmail,".
                      "accountContactName,".
                      "accountShortName,".
                      "accountCreated,".
                      "accountModified,".
                      "accountStatus ".                      
                           ")".
               "VALUES (".
                      "null,".
                      "'".$this->sqlSafe($account->accountCompany)."',".
                      "'".$this->sqlSafe($account->accountAddress)."',".
                      "'".$this->sqlSafe($account->accountCity)."',".
                      "'".$this->sqlSafe($account->accountState)."',".
                      "'".$this->sqlSafe($account->accountZip)."',".
                      "'".$this->sqlSafe($account->accountCountry)."',".
                      "'".$this->sqlSafe($account->accountPhone)."',".
                      "'".$this->sqlSafe($account->accountFax)."',".
                      "'".$this->sqlSafe($account->accountEmail)."',".
                      "'".$this->sqlSafe($account->accountContactName)."',".
                      "'".$this->sqlSafe($account->accountShortName)."',".
                      "'".$this->sqlSafe($account->accountCreated)."',".
                      "'".$this->sqlSafe($account->accountModified)."',".
                      "'".$this->sqlSafe($account->accountStatus)."' ".                      
                      ")"; 

        $this->executeQuery($query);
    }


    /*********************************************************
     * Insert a new Account into eatmeDB database
     * and return a Account with new autoincrement
     * primary key
     *
     * @param  $account
     * @return $account
     *********************************************************
     */
    public function insert2($account)
    {
        $query="INSERT INTO account ( ".
	              "accountId,".
                      "accountCompany,".
                      "accountAddress,".
                      "accountCity,".
                      "accountState,".
                      "accountZip,".
                      "accountCountry,".
                      "accountPhone,".
                      "accountFax,".
                      "accountEmail,".
                      "accountContactName,".
                      "accountShortName,".
                      "accountCreated,".
                      "accountModified,".
                      "accountStatus ".                      
                           ")".
               "VALUES (".
                      "null,".
                      "'".$this->sqlSafe($account->accountCompany)."',".
                      "'".$this->sqlSafe($account->accountAddress)."',".
                      "'".$this->sqlSafe($account->accountCity)."',".
                      "'".$this->sqlSafe($account->accountState)."',".
                      "'".$this->sqlSafe($account->accountZip)."',".
                      "'".$this->sqlSafe($account->accountCountry)."',".
                      "'".$this->sqlSafe($account->accountPhone)."',".
                      "'".$this->sqlSafe($account->accountFax)."',".
                      "'".$this->sqlSafe($account->accountEmail)."',".
                      "'".$this->sqlSafe($account->accountContactName)."',".
                      "'".$this->sqlSafe($account->accountShortName)."',".
                      "'".$this->sqlSafe($account->accountCreated)."',".
                      "'".$this->sqlSafe($account->accountModified)."',".
                      "'".$this->sqlSafe($account->accountStatus)."' ".                      
                      ")"; 

        $id = $this->executeInsert($query);
	    $account->accountId = $id;
	    return($account);	
    }


    /*********************************************************
     * Update a Account in eatmeDB database
     *
     * @param $account
     * @return n/a
     *********************************************************
     */
    public function update($account)
    {
        $query="UPDATE  account ".
	          "SET ".
                      "accountId= ".$account->accountId." ,".
                      "accountCompany='".$this->sqlSafe($account->accountCompany)."',".
                      "accountAddress='".$this->sqlSafe($account->accountAddress)."',".
                      "accountCity='".$this->sqlSafe($account->accountCity)."',".
                      "accountState='".$this->sqlSafe($account->accountState)."',".
                      "accountZip='".$this->sqlSafe($account->accountZip)."',".
                      "accountCountry='".$this->sqlSafe($account->accountCountry)."',".
                      "accountPhone='".$this->sqlSafe($account->accountPhone)."',".
                      "accountFax='".$this->sqlSafe($account->accountFax)."',".
                      "accountEmail='".$this->sqlSafe($account->accountEmail)."',".
                      "accountContactName='".$this->sqlSafe($account->accountContactName)."',".
                      "accountShortName='".$this->sqlSafe($account->accountShortName)."',".
                      "accountCreated='".$this->sqlSafe($account->accountCreated)."',".
                      "accountModified='".$this->sqlSafe($account->accountModified)."',".
                      "accountStatus='".$this->sqlSafe($account->accountStatus)."' ".                      
	          "WHERE accountId=".$account->accountId;

        $this->executeQuery($query);
    }

    /*********************************************************
     * Delete a Account by accountId
     *
     * @param  $id
     * @return n/a
     *********************************************************
     */
    public function delete($id)
    {
        $query="DELETE FROM account WHERE accountId=".$id;

        $this->executeQuery($query);
    }
}

?>