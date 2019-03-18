<?php
require_once "EatmeDB.php";
require      "User.php";

/********************************************************************
 * UserModel inherits EatmeDB and provides functions to
 * map User class to eatmeDB.
 *
 * @author  mgill
 * @version 190204
 *********************************************************************
 */
class UserModel extends EatmeDB
{
    /*********************************************************
     * Returns a User by userId
     *
     * @return user
     *********************************************************
     */
    public function find($id)
    {
        $query="SELECT userId,".
                      "accountId,".
                      "userName,".
                      "userPassword,".
                      "userPasscode,".
                      "userFirstName,".
                      "userLastName,".
                      "userNickName,".
                      "userPhoto,".
                      "userLongitude,".
                      "userLatitude,".
                      "userLastLogin,".
                      "userPhone,".
                      "userEmail,".
                      "userCreated,".
                      "userModified,".
                      "userStatus ".                      		               
	       "FROM user ".
	       "WHERE userId=".$id;

        return($this->selectDB($query, "User"));
    }

    /*********************************************************
     * Insert a new User into eatmeDB database
     *
     * @param $user
     * @return n/a
     *********************************************************
     */
    public function insert($user)
    {
        $query="INSERT INTO user ( ".
	              "userId,".
                      "accountId,".
                      "userName,".
                      "userPassword,".
                      "userPasscode,".
                      "userFirstName,".
                      "userLastName,".
                      "userNickName,".
                      "userPhoto,".
                      "userLongitude,".
                      "userLatitude,".
                      "userLastLogin,".
                      "userPhone,".
                      "userEmail,".
                      "userCreated,".
                      "userModified,".
                      "userStatus ".                      
                           ")".
               "VALUES (".
                      "null,".
                      " ".$user->accountId." ,".
                      "'".$this->sqlSafe($user->userName)."',".
                      "'".$this->sqlSafe($user->userPassword)."',".
                      "'".$this->sqlSafe($user->userPasscode)."',".
                      "'".$this->sqlSafe($user->userFirstName)."',".
                      "'".$this->sqlSafe($user->userLastName)."',".
                      "'".$this->sqlSafe($user->userNickName)."',".
                      "'".$this->sqlSafe($user->userPhoto)."',".
                      "'".$this->sqlSafe($user->userLongitude)."',".
                      "'".$this->sqlSafe($user->userLatitude)."',".
                      "'".$this->sqlSafe($user->userLastLogin)."',".
                      "'".$this->sqlSafe($user->userPhone)."',".
                      "'".$this->sqlSafe($user->userEmail)."',".
                      "'".$this->sqlSafe($user->userCreated)."',".
                      "'".$this->sqlSafe($user->userModified)."',".
                      "'".$this->sqlSafe($user->userStatus)."' ".                      
                      ")"; 

        $this->executeQuery($query);
    }


    /*********************************************************
     * Insert a new User into eatmeDB database
     * and return a User with new autoincrement
     * primary key
     *
     * @param  $user
     * @return $user
     *********************************************************
     */
    public function insert2($user)
    {
        $query="INSERT INTO user ( ".
	              "userId,".
                      "accountId,".
                      "userName,".
                      "userPassword,".
                      "userPasscode,".
                      "userFirstName,".
                      "userLastName,".
                      "userNickName,".
                      "userPhoto,".
                      "userLongitude,".
                      "userLatitude,".
                      "userLastLogin,".
                      "userPhone,".
                      "userEmail,".
                      "userCreated,".
                      "userModified,".
                      "userStatus ".                      
                           ")".
               "VALUES (".
                      "null,".
                      " ".$user->accountId." ,".
                      "'".$this->sqlSafe($user->userName)."',".
                      "'".$this->sqlSafe($user->userPassword)."',".
                      "'".$this->sqlSafe($user->userPasscode)."',".
                      "'".$this->sqlSafe($user->userFirstName)."',".
                      "'".$this->sqlSafe($user->userLastName)."',".
                      "'".$this->sqlSafe($user->userNickName)."',".
                      "'".$this->sqlSafe($user->userPhoto)."',".
                      "'".$this->sqlSafe($user->userLongitude)."',".
                      "'".$this->sqlSafe($user->userLatitude)."',".
                      "'".$this->sqlSafe($user->userLastLogin)."',".
                      "'".$this->sqlSafe($user->userPhone)."',".
                      "'".$this->sqlSafe($user->userEmail)."',".
                      "'".$this->sqlSafe($user->userCreated)."',".
                      "'".$this->sqlSafe($user->userModified)."',".
                      "'".$this->sqlSafe($user->userStatus)."' ".                      
                      ")"; 

        $id = $this->executeInsert($query);
	    $user->userId = $id;
	    return($user);	
    }


    /*********************************************************
     * Update a User in eatmeDB database
     *
     * @param $user
     * @return n/a
     *********************************************************
     */
    public function update($user)
    {
        $query="UPDATE  user ".
	          "SET ".
                      "userId= ".$user->userId." ,".
                      "accountId= ".$user->accountId." ,".
                      "userName='".$this->sqlSafe($user->userName)."',".
                      "userPassword='".$this->sqlSafe($user->userPassword)."',".
                      "userPasscode='".$this->sqlSafe($user->userPasscode)."',".
                      "userFirstName='".$this->sqlSafe($user->userFirstName)."',".
                      "userLastName='".$this->sqlSafe($user->userLastName)."',".
                      "userNickName='".$this->sqlSafe($user->userNickName)."',".
                      "userPhoto='".$this->sqlSafe($user->userPhoto)."',".
                      "userLongitude='".$this->sqlSafe($user->userLongitude)."',".
                      "userLatitude='".$this->sqlSafe($user->userLatitude)."',".
                      "userLastLogin='".$this->sqlSafe($user->userLastLogin)."',".
                      "userPhone='".$this->sqlSafe($user->userPhone)."',".
                      "userEmail='".$this->sqlSafe($user->userEmail)."',".
                      "userCreated='".$this->sqlSafe($user->userCreated)."',".
                      "userModified='".$this->sqlSafe($user->userModified)."',".
                      "userStatus='".$this->sqlSafe($user->userStatus)."' ".                      
	          "WHERE userId=".$user->userId;

        $this->executeQuery($query);
    }

    /*********************************************************
     * Delete a User by userId
     *
     * @param  $id
     * @return n/a
     *********************************************************
     */
    public function delete($id)
    {
        $query="DELETE FROM user WHERE userId=".$id;

        $this->executeQuery($query);
    }
}

?>