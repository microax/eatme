<?php
require_once "EatmeDB.php";
require      "Message.php";

/********************************************************************
 * MessageModel inherits EatmeDB and provides functions to
 * map Message class to eatmeDB.
 *
 * @author  mgill
 * @version 190204
 *********************************************************************
 */
class MessageModel extends EatmeDB
{
    /*********************************************************
     * Returns a Message by messageId
     *
     * @return message
     *********************************************************
     */
    public function find($id)
    {
        $query="SELECT messageId,".
                      "userId,".
                      "messageFrom,".
                      "messageSubject,".
                      "messageBody,".
                      "messageCreated,".
                      "messageModified,".
                      "messageStatus ".                      		               
	       "FROM message ".
	       "WHERE messageId=".$id;

        return($this->selectDB($query, "Message"));
    }

    /*********************************************************
     * Insert a new Message into eatmeDB database
     *
     * @param $message
     * @return n/a
     *********************************************************
     */
    public function insert($message)
    {
        $query="INSERT INTO message ( ".
	              "messageId,".
                      "userId,".
                      "messageFrom,".
                      "messageSubject,".
                      "messageBody,".
                      "messageCreated,".
                      "messageModified,".
                      "messageStatus ".                      
                           ")".
               "VALUES (".
                      "null,".
                      " ".$message->userId." ,".
                      " ".$message->messageFrom." ,".
                      "'".$this->sqlSafe($message->messageSubject)."',".
                      "'".$this->sqlSafe($message->messageBody)."',".
                      "'".$this->sqlSafe($message->messageCreated)."',".
                      "'".$this->sqlSafe($message->messageModified)."',".
                      "'".$this->sqlSafe($message->messageStatus)."' ".                      
                      ")"; 

        $this->executeQuery($query);
    }


    /*********************************************************
     * Insert a new Message into eatmeDB database
     * and return a Message with new autoincrement
     * primary key
     *
     * @param  $message
     * @return $message
     *********************************************************
     */
    public function insert2($message)
    {
        $query="INSERT INTO message ( ".
	              "messageId,".
                      "userId,".
                      "messageFrom,".
                      "messageSubject,".
                      "messageBody,".
                      "messageCreated,".
                      "messageModified,".
                      "messageStatus ".                      
                           ")".
               "VALUES (".
                      "null,".
                      " ".$message->userId." ,".
                      " ".$message->messageFrom." ,".
                      "'".$this->sqlSafe($message->messageSubject)."',".
                      "'".$this->sqlSafe($message->messageBody)."',".
                      "'".$this->sqlSafe($message->messageCreated)."',".
                      "'".$this->sqlSafe($message->messageModified)."',".
                      "'".$this->sqlSafe($message->messageStatus)."' ".                      
                      ")"; 

        $id = $this->executeInsert($query);
	    $message->messageId = $id;
	    return($message);	
    }


    /*********************************************************
     * Update a Message in eatmeDB database
     *
     * @param $message
     * @return n/a
     *********************************************************
     */
    public function update($message)
    {
        $query="UPDATE  message ".
	          "SET ".
                      "messageId= ".$message->messageId." ,".
                      "userId= ".$message->userId." ,".
                      "messageFrom= ".$message->messageFrom." ,".
                      "messageSubject='".$this->sqlSafe($message->messageSubject)."',".
                      "messageBody='".$this->sqlSafe($message->messageBody)."',".
                      "messageCreated='".$this->sqlSafe($message->messageCreated)."',".
                      "messageModified='".$this->sqlSafe($message->messageModified)."',".
                      "messageStatus='".$this->sqlSafe($message->messageStatus)."' ".                      
	          "WHERE messageId=".$message->messageId;

        $this->executeQuery($query);
    }

    /*********************************************************
     * Delete a Message by messageId
     *
     * @param  $id
     * @return n/a
     *********************************************************
     */
    public function delete($id)
    {
        $query="DELETE FROM message WHERE messageId=".$id;

        $this->executeQuery($query);
    }
}

?>