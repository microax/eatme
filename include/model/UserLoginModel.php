<?php
$root = realpath($_SERVER['DOCUMENT_ROOT']);
require_once $root."/include/etc/sql.php";
require_once "EatmeDB.php";
require_once "UserModel.php";
require_once "User.php";
require_once "Account.php";
require_once "Ugroup.php";

/********************************************************************
 * UserLoginModel inherits UserModel 
 * and provides function to validate user login
 *
 * @author  megan
 * @version 180924
 *********************************************************************
 */
class UserLoginModel extends UserModel
{
    /*********************************************************
     * Returns all users
     *
     * @return array  $user
     *********************************************************
     */
    public function findAll()
    {
        $query= <<<EOF

        SELECT        
            userId,
            accountId,
            userName,
            userPassword,
            userPasscode,
            userFirstName,
            userLastName,
            userNickName,
            userPhoto,
            userLongitude,
            userLatitude,
            userLastLogin,
            userPhone,
            userEmail,
            userCreated,
            userModified,
            userStatus                      		               
	    FROM 
            user 
EOF;
        return($this->selectDB($query, "User"));
    }

    /*********************************************************
     * Return User by userName
     *
     * @return array  $user
     *********************************************************
     */
    public function findByUserName($userName)
    {
        $query= <<<EOF

        SELECT        
            userId,
            accountId,
            userName,
            userPassword,
            userPasscode,
            userFirstName,
            userLastName,
            userNickName,
            userPhoto,
            userLongitude,
            userLatitude,
            userLastLogin,
            userPhone,
            userEmail,
            userCreated,
            userModified,
            userStatus                      		               
	    FROM 
            user 
	    WHERE 
	        userName='{$userName}' 
EOF;
        return($this->selectDB($query, "User"));
    }


    /*********************************************************
     * Return User by userName and userPasscode
     *
     * @return array  $user
     *********************************************************
     */
    public function findByUserPasscode($userName, $passCode)
    {
        $query= <<<EOF

        SELECT        
            userId,
            accountId,
            userName,
            userPassword,
            userPasscode,
            userFirstName,
            userLastName,
            userNickName,
            userPhoto,
            userLongitude,
            userLatitude,
            userLastLogin,
            userPhone,
            userEmail,
            userCreated,
            userModified,
            userStatus                      		               
	    FROM 
            user 
	    WHERE 
	        userName='{$userName}' AND userPasscode='{$passCode}'
EOF;
        return($this->selectDB($query, "User"));
    }


    
    /*********************************************************
     * Returns a User for $username and $password
     *
     * @param  string $username
     * @param  string $password 
     * @return array  $user
     *********************************************************
     */
    public function findUserLogin($username, $password)
    {
        $username        = $this->sqlSafe($username);

        $query= <<<EOF

	    SELECT
            userId,
            accountId,
            userName,
            userPassword,
            userPasscode,
            userFirstName,
            userLastName,
            userNickName,
            userPhoto,
            userLongitude,
            userLatitude,
            userLastLogin,
            userPhone,
            userEmail,
            userCreated,
            userModified,
            userStatus
	    FROM 
	        user 
	    WHERE 
	        userName='{$username}' 
        AND userStatus = 'ACTIVE' 
EOF;
        $r = $this->selectDB($query, "User");
        if($r)
        {
            $user = $r[0];
            if(!password_verify($password, $user->userPassword))
                $user = null;
        }
        else
        {
            $user = null;
        }
        return($user);
    }

    /*********************************************************
     * Reset a $username using $resetCode and new $password.
     * Returns a reset User.
     *
     * @param  string $username
     * @param  string $password 
     * @param  string $resetCode
     *
     * @return array  $user
     *********************************************************
     */
    public function resetUserLogin($username, $password, $resetCode)
    {
        $username  = $this->sqlSafe($username);
        $password  = $this->sqlSafe($password);
        $resetCode = $this->sqlSafe($resetCode);

        $query= <<<EOF

	    SELECT
            userId,
            accountId,
            userName,
            userPassword,
            userPasscode,
            userFirstName,
            userLastName,
            userNickName,
            userPhoto,
            userLongitude,
            userLatitude,
            userLastLogin,
            userPhone,
            userEmail,
            userCreated,
            userModified,
            userStatus
	    FROM 
	        user 
	    WHERE 
	         userName='{$username}' 
        AND  userPassword='{$resetCode}' 
        AND (userStatus = 'RESET' OR userStatus = 'NEW')   
EOF;
        $r = $this->selectDB($query, "User");
        if($r)
        {
            $user = $r[0];
            $user->userPassword = $this->encrypt(blacklistSafe($password)); 
            $user->userStatus   = 'ACTIVE';
            $this->update($user);
        }
        else
        {
            $user = null;
        }
        return($user);
    }
    

    /*********************************************************
     * Insert a new User
     *
     * @param  class $user
     * @return class $user -- with updated userId
     *********************************************************
     */
    public function insertUserLogin($user)
    {
        $username        = blacklistSafe($user->userName);
        $encryptPassword = $this->encrypt(blacklistSafe($user->userPassword)); 

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
     * get user groups
     *
     * @param  int   $userId
     * @return array $ugroups
     *********************************************************
     */
    public function findUserGroups($userId)
    {
        $query= <<<EOF

         SELECT 
           ugroup.ugroupId, ugroup.ugroupName
         FROM
           ugroup,
           user_ugroup,
           user
         WHERE
           user.userId = user_ugroup.userId
       AND ugroup.ugroupId = user_ugroup.ugroupId
       AND user_ugroup.userId =$userId  
EOF;
            return($this->selectDB($query, "Ugroup"));
    }    

    /*********************************************************
     * get all Ugroups
     *
     * @return array $ugroups
     *********************************************************
     */
    public function findAllGroups()
    {
        $query= <<<EOF

         SELECT 
           ugroup.ugroupId, ugroup.ugroupName
         FROM
           ugroup
EOF;
            return($this->selectDB($query, "Ugroup"));
    }    



    /*********************************************************
     * Returns a Account by accountId
     *
     * @return account
     *********************************************************
     */
    public function findAllAccounts()
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
            "FROM account WHERE accountStatus != 'DELETED' ";

        return($this->selectDB($query, "Account"));
    }


    /*********************************************************
     * getCompanyShortNameByAccountId() 
     *
     * @return company short name by accountId
     *********************************************************
     */
    public function getCompanyShortNameByAccountId($id)
    {
        $query="SELECT accountShortName ".
            "FROM account WHERE accountId=".$id;
        
        $r = $this->selectDB($query, "Account");
        if($r)
            return($r[0]->accountShortName);
        else
            return("");
    }


    
    /*********************************************************
     * getCompanyShortName() 
     *
     * @return company short name
     *********************************************************
     */
    public function getCompanyShortName($id)
    {
        $query="SELECT account.accountShortName ".
            "FROM account, user  WHERE user.accountId=account.accountId ".
            "AND user.userId=".$id;
        
        $r = $this->selectDB($query, "Account");
        if($r)
            return($r[0]->accountShortName);
        else
            return("");
    }


    /*********************************************************
     * getCompanyName() 
     *
     * @return company name
     *********************************************************
     */
    public function getCompanyName($id)
    {
        $query="SELECT account.accountCompany ".
            "FROM account, user  WHERE user.accountId=account.accountId ".
            "AND user.userId=".$id;
        
        $r = $this->selectDB($query, "Account");
        if($r)
            return($r[0]->accountCompany);
        else
            return("");
    }

    /*********************************************************
     * getCompanyAddress() 
     *
     * @return company address
     *********************************************************
     */
    public function getCompanyAddress($id)
    {
        $query="SELECT account.accountAddress ".
            "FROM account, user  WHERE user.accountId=account.accountId ".
            "AND user.userId=".$id;
        
        $r = $this->selectDB($query, "Account");
        if($r)
            return($r[0]->accountAddress);
        else
            return("");
    }


    
    /*********************************************************
     * Returns an AES encrypted binary string 
     *
     * @param  string $str
     * @return string $aes
     *********************************************************
     */
    public function encrypt($str)
    {
	    return(password_hash($str, PASSWORD_DEFAULT));
    }


}
?>
