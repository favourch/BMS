<?php

/**
 * @namespace       : Base
 * @package         : Model
 * @subpackage 		: Lib.Message.Dao
 * @name 			: Message
 * @author 			: Iyngaran Iyathurai
 * 			  		  Software eng - Bcas R&D
 * 			          E-Mail - Iyngaran55@yahoo.com, Iyngaran@bcas.lk
 *
 * @copyright Copyright (c) 2009 - 2010 BCAS R&D . (http://www.lab.bcasrd.com)
 *
 * Description : The object-oriented interface to bcas database table tbl_client
 *
 */
class Base_Model_Lib_Support_Dao_Message extends Zend_Db_Table {

    protected $_name = 'tbl_messages'; // the table name
    protected $_primary = 'id'; // the primary key
    // the client object
    public $message;

    // the methods goes from here......
    /*
     * @name        : getMessage
     * @Description : The function is to get a client information
     * 				  from the database.
     * @param       : $id (Message Id)
     * @return      : Entity Message Object (Base_Model_Lib_Message_Entity_Message)
     */

    public function getMessage($id) {
        $objMessage = new Base_Model_Lib_Support_Entity_Message();
        $objMessageService = new Base_Model_Lib_Support_Service_Message();
        try {

            $id = (int) $id;
            $row = $this->fetchRow('id = ' . $id);

            if ($row != "") {
                $result = $row->toArray();
                $objMessage->setId($result['id']);
                $objMessage->setAddedBy($result['added_by']);
                $objMessage->setAddedByObject($result['added_by_object']);
                $objMessage->setAddedOn($result['added_on']);
                $objMessage->setMessage($result['message']);
                $objMessage->setSendEmail($result['send_email']);
                $objMessage->setStatus($result['status']);
                $objMessage->setTicketId($result['ticket_id']);
                $objMessage->setMessageId($result['message_id']);
                $objMessage->setMessageObject($result['message_object']);
                $objMessage->setMessageType($result['message_type']);
                $objMessage->setMessageReply($objMessageService->getAllMessageReply($result['id']));
            }
        } catch (Exception $e) {
            throw new Base_Model_Lib_Eav_Exception_Sql("<strong>Oops !, Error Class name -</strong>  <em>Base_Model_Lib_Message_Dao_Message</em>, <strong>Function -</strong> <em>getMessage()</em>, <strong>Exception -</strong> <em>" . $e->getMessage() . "</em>");
        }
        return $objMessage;
    }

    /*
     * @name        : addMessage
     * @Description : The function is to add a message information
     * 				  to the database.
     * @return      : Integer $last_inserted_id
     */

    public function addMessage() {
        $last_inserted_id = 0;
        try {

            if (!($this->message instanceof Base_Model_Lib_Support_Entity_Message))
                throw new Base_Model_Lib_Message_Exception(" Message Entity not intialized");

            $data = array(
                'message' => $this->message->getMessage(),
                'added_by' => $this->message->getAddedBy(),
                'added_by_object' => $this->message->getAddedByObject(),
                'added_on' => $this->message->getAddedOn(),
                'send_email' => $this->message->getSendEmail(),
                'status' => $this->message->getStatus(),
                'ticket_id' => $this->message->getTicketId(),
                'message_id' => $this->message->getMessageId(),
                'message_object' => $this->message->getMessageObject(),
                'message_type' => $this->message->getMessageType()
            );

            $last_inserted_id = $this->insert($data);
        } catch (Exception $e) {
            throw new Base_Model_Lib_Eav_Exception_Sql("<strong>Oops !, Error Class name -</strong>  <em>Base_Model_Lib_Message_Dao_Message</em>, <strong>Function -</strong> <em>addMessage()</em>, <strong>Exception -</strong> <em>" . $e->getMessage() . "</em>");
        }

        return $last_inserted_id;
    }

    /*
     * @name        : updateMessage
     * @Description : The function is to update/edit a client information
     * 				  in the database.
     * @return      : $success true/false
     */

    public function updateMessage() {
        $success = false;
        try {

            if (!($this->message instanceof Base_Model_Lib_Support_Entity_Message))
                throw new Base_Model_Lib_Message_Exception(" Message Entity not intialized");

            $data = array(
                'message' => $this->message->getMessage(),
                'added_by' => $this->message->getAddedBy(),
                'added_by_object' => $this->message->getAddedByObject(),
                'added_on' => $this->message->getAddedOn(),
                'send_email' => $this->message->getSendEmail(),
                'status' => $this->message->getStatus(),
                'ticket_id' => $this->message->getTicketId(),
                'message_id' => $this->message->getMessageId(),
                'message_object' => $this->message->getMessageObject(),
                'message_type' => $this->message->getMessageType()
            );
            $this->update($data, 'id = ' . (int) $this->message->getId());
            $success = true;
        } catch (Exception $e) {
            throw new Base_Model_Lib_Eav_Exception_Sql("<strong>Oops !, Error Class name -</strong>  <em>Base_Model_Lib_Message_Dao_Message</em>, <strong>Function -</strong> <em>updateMessage()</em>, <strong>Exception -</strong> <em>" . $e->getMessage() . "</em>");
        }
        return $success;
    }

    /*
     * @name        : deleteMessage
     * @Description : The function is to delete a client information
     * 				  in the database.
     * @return      : $success true/false
     */

    public function deleteMessage() {
        $success = false;
        try {

            if (!($this->message instanceof Base_Model_Lib_Support_Entity_Message))
                throw new Base_Model_Lib_Message_Exception(" Message Entity not intialized");

            if ($this->delete('id =' . (int) $this->message->getId()) == '1') {
                $success = true;
            }
        } catch (Exception $e) {
            throw new Base_Model_Lib_Eav_Exception_Sql("<strong>Oops !, Error Class name -</strong>  <em>Base_Model_Lib_Message_Dao_Message</em>, <strong>Function -</strong> <em>deleteMessage()</em>, <strong>Exception -</strong> <em>" . $e->getMessage() . "</em>");
        }
        return $success;
    }

    
    /*
     * @name        : search
     * @Description : The function is to search Student information
     * 				  from the database.
     * @return      : Aray Of Entity Student Object (Base_Model_Lib_Student_Entity_Student)
     */
    public function search($limit) {
        // declare an array variable
        $arrMessages = array();
        $arrWhere = array();
        $sql = "";
        try {

           if (!($this->message instanceof Base_Model_Lib_Support_Entity_Message))
                throw new Base_Model_Lib_Message_Exception(" Message Entity not intialized");

                $status = $this->message->getStatus();
                $messageObject = $this->message->getMessageObject();
                $messageTicketId = $this->message->getTicketId();
                $parentMessageId = $this->message->getMessageId();

                $sql = "SELECT id FROM tbl_messages ";



            if ($status != '')
                array_push($arrWhere, "status = '" . $status . "'");
            
            if ($messageObject != '')
                array_push($arrWhere, "message_object = '" . $messageObject . "'");
            
            if ($messageTicketId != '')
                array_push($arrWhere, "ticket_id = '" . $messageTicketId . "'");
            
            if ($parentMessageId != '')
                array_push($arrWhere, "message_id = '" . $parentMessageId . "'");
            
            
            

            if (count($arrWhere) > 0)
                $sql.= "WHERE " . implode(' AND ', $arrWhere);

            
                // $limit
                $sql.= $limit;
                $db = Zend_Db_Table_Abstract::getDefaultAdapter();
                $result = $db->fetchCol($sql);

                foreach ($result as $cid) {
                    $objSupportMessage = $this->getMessage($cid);
                    array_push($arrMessages, $objSupportMessage);
                }
        } catch (Exception $e) {
            throw new Base_Model_Lib_Eav_Exception_Sql("<strong>Oops !, Error Class name -</strong>  <em>Base_Model_Lib_Client_Entity_Client</em>, <strong>Function -</strong> <em>loginClient()</em>, <strong>Exception -</strong> <em>" . $e->getMessage() . "</em>");
        }
        return $arrMessages;
    }
    
    
    
    /*
     * @name        : searchCount()
     * @Description : The function is to search Student information
     * 				  from the database.
     * @return      : Aray Of Entity Student Object (Base_Model_Lib_Student_Entity_Student)
     */
    public function searchCount() {
        // declare an array variable
        $totalMessages = 0;
        $arrWhere = array();
        $sql = "";
        try {

           if (!($this->message instanceof Base_Model_Lib_Support_Entity_Message))
                throw new Base_Model_Lib_Message_Exception(" Message Entity not intialized");

                $status = $this->message->getStatus();
                $messageObject = $this->message->getMessageObject();
                $messageTicketId = $this->message->getTicketId();
                $parentMessageId = $this->message->getMessageId();

                $sql = "SELECT count(id) as tot FROM tbl_messages ";



            if ($status != '')
                array_push($arrWhere, "status = '" . $status . "'");
            
            if ($messageObject != '')
                array_push($arrWhere, "message_object = '" . $messageObject . "'");
            
            if ($messageTicketId != '')
                array_push($arrWhere, "ticket_id = '" . $messageTicketId . "'");
            
            if ($parentMessageId != '')
                array_push($arrWhere, "message_id = '" . $parentMessageId . "'");

             if( count($arrWhere)> 0)
		$sql.=	"WHERE ".implode(' AND ',$arrWhere);

			
                 
                 $db     	= Zend_Db_Table_Abstract::getDefaultAdapter();
		 $totalMessages 	= $db->fetchOne($sql);
                 
        } catch (Exception $e) {
            throw new Base_Model_Lib_Eav_Exception_Sql("<strong>Oops !, Error Class name -</strong>  <em>Base_Model_Lib_Client_Entity_Client</em>, <strong>Function -</strong> <em>loginClient()</em>, <strong>Exception -</strong> <em>" . $e->getMessage() . "</em>");
        }
        return $totalMessages;
    }

    
    /*
     * @name        : updateMessage
     * @Description : The function is to update/edit a client information
     * 				  in the database.
     * @return      : $success true/false
     */

    public function updateMessageStatus() {
        $success = false;
        try {

            if (!($this->message instanceof Base_Model_Lib_Support_Entity_Message))
                throw new Base_Model_Lib_Message_Exception(" Message Entity not intialized");

            $data = array('status' => $this->message->getStatus());
            $this->update($data, 'id = ' . (int) $this->message->getId());
            $success = true;
        } catch (Exception $e) {
            throw new Base_Model_Lib_Eav_Exception_Sql("<strong>Oops !, Error Class name -</strong>  <em>Base_Model_Lib_Message_Dao_Message</em>, <strong>Function -</strong> <em>updateMessage()</em>, <strong>Exception -</strong> <em>" . $e->getMessage() . "</em>");
        }
        return $success;
    }
    
        /*
     * @name        : search
     * @Description : The function is to search Student information
     * 				  from the database.
     * @return      : Aray Of Entity Student Object (Base_Model_Lib_Student_Entity_Student)
     */
    public function getAllMessageReply($messageId) {
        // declare an array variable
        $arrMessages = array();
        $sql = "";
        try {

		$sql = "SELECT id FROM tbl_messages WHERE message_id = '".$messageId."' AND message_type = 'Reply'";
                $db = Zend_Db_Table_Abstract::getDefaultAdapter();
                $result = $db->fetchCol($sql);

                foreach ($result as $cid) {
                    $objSupportMessage = $this->getMessage($cid);
                    array_push($arrMessages, $objSupportMessage);
                }
        } catch (Exception $e) {
            throw new Base_Model_Lib_Eav_Exception_Sql("<strong>Oops !, Error Class name -</strong>  <em>Base_Model_Lib_Client_Entity_Client</em>, <strong>Function -</strong> <em>loginClient()</em>, <strong>Exception -</strong> <em>" . $e->getMessage() . "</em>");
        }
        return $arrMessages;
    }
}
?>