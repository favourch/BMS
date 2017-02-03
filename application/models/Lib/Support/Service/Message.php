<?php

/**
 * @namespace       : Base
 * @package         : Model
 * @subpackage 		: Lib.Client.Service
 * @name 			: Client
 * @author 			: Iyngaran Iyathurai
 * 			  		  Software eng - Bcas R&D
 * 			          E-Mail - Iyngaran55@yahoo.com, Iyngaran@bcas.lk
 *
 * @copyright Copyright (c) 2009 - 2010 BCAS R&D . (http://www.lab.bcasrd.com)
 *
 * Description : The Service class for the Client Object
 *
 */
class Base_Model_Lib_Support_Service_Message extends Base_Model_Lib_Eav_Model_Service {

    const RESULT_PER_PAGE = 20; // the const variable for pagging

    public $message;

    /*
     * @name        : getClient
     * @Description : The function is to get a message information
     * 				  from the database.
     * @param       : $id (Client Id)
     * @return      : Base_Model_Lib_Client_Entity_Client
     */

    public function getMessage($id) {
        $message = "";
        try {
            $objMessage = new Base_Model_Lib_Support_Dao_Message();
            $message = $objMessage->getMessage($id);
        } catch (Exception $e) {
            throw new Base_Model_Lib_Client_Exception("<strong>Oops !, Error Class name -</strong>  <em>Base_Model_Lib_Client_Service_Client</em>, <strong>Function -</strong> <em>getClient()</em>, <strong>Exception -</strong> <em>" . $e->getMessage() . "</em>");
        }
        return $message;
    }

    /*
     * @name        : addMessage()
     * @Description : The function is to add a message information
     * 				  to the database.
     * @return      : Integer $last_inserted_id
     */

    public function addMessage() {
        $last_inserted_id = 0;
        try {

            if (!($this->message instanceof Base_Model_Lib_Support_Entity_Message))
                throw new Base_Model_Lib_Message_Exception(" Message Entity not intialized");

            $objMessageDao = new Base_Model_Lib_Support_Dao_Message();
            $objMessageDao->message = $this->message;
            $last_inserted_id = $objMessageDao->addMessage();
        } catch (Exception $e) {
            throw new Base_Model_Lib_Client_Exception("<strong>Oops !, Error Class name -</strong>  <em>Base_Model_Lib_Client_Service_Client</em>, <strong>Function -</strong> <em>addClient()</em>, <strong>Exception -</strong> <em>" . $e->getMessage() . "</em>");
        }

        return $last_inserted_id;
    }

    /*
     * @name        : updateMessage()
     * @Description : The function is to add a message information
     * 				  to the database.
     * @return      : Integer $last_inserted_id
     */

    public function updateMessage() {
        $success = false;
        try {

            if (!($this->message instanceof Base_Model_Lib_Support_Entity_Message))
                throw new Base_Model_Lib_Message_Exception(" Message Entity not intialized");

            $objMessageDao = new Base_Model_Lib_Support_Dao_Message();
            $objMessageDao->message = $this->message;
            $success = $objMessageDao->updateMessage();
        } catch (Exception $e) {
            throw new Base_Model_Lib_Client_Exception("<strong>Oops !, Error Class name -</strong>  <em>Base_Model_Lib_Client_Service_Client</em>, <strong>Function -</strong> <em>addClient()</em>, <strong>Exception -</strong> <em>" . $e->getMessage() . "</em>");
        }

        return $success;
    }

    /*
     * @name        : deleteMessage()
     * @Description : The function is to delete a message information
      from the database.
     * @return      : $success true/false
     */

    public function deleteMessage() {
        $success = false;
        try {

            if (!($this->message instanceof Base_Model_Lib_Support_Entity_Message))
                throw new Base_Model_Lib_Message_Exception(" Message Entity not intialized");

            $objMessageDao = new Base_Model_Lib_Support_Dao_Message();
            $objMessageDao->message = $this->message;
            $success = $objMessageDao->deleteMessage();
        } catch (Exception $e) {
            throw new Base_Model_Lib_Client_Exception("<strong>Oops !, Error Class name -</strong>  <em>Base_Model_Lib_Client_Service_Client</em>, <strong>Function -</strong> <em>deleteClient()</em>, <strong>Exception -</strong> <em>" . $e->getMessage() . "</em>");
        }

        return $success;
    }

    /*
     * @name        : search($limit)
     * @Description : The function is to delete a message information
      from the database.
     * @return      : $success true/false
     */

    public function search($limit) {
        $messages = '';
        try {

            if (!($this->message instanceof Base_Model_Lib_Support_Entity_Message))
                throw new Base_Model_Lib_Message_Exception(" Message Entity not intialized");

            $objMessageDao = new Base_Model_Lib_Support_Dao_Message();
            $objMessageDao->message = $this->message;
            $messages = $objMessageDao->search($limit);
        } catch (Exception $e) {
            throw new Base_Model_Lib_Client_Exception("<strong>Oops !, Error Class name -</strong>  <em>Base_Model_Lib_Client_Service_Client</em>, <strong>Function -</strong> <em>deleteClient()</em>, <strong>Exception -</strong> <em>" . $e->getMessage() . "</em>");
        }

        return $messages;
    }

    /*
     * @name        : search($limit)
     * @Description : The function is to delete a message information
      from the database.
     * @return      : $success true/false
     */

    public function searchCount() {
        $totalMessages = '';
        try {

            if (!($this->message instanceof Base_Model_Lib_Support_Entity_Message))
                throw new Base_Model_Lib_Message_Exception(" Message Entity not intialized");

            $objMessageDao = new Base_Model_Lib_Support_Dao_Message();
            $objMessageDao->message = $this->message;
            $totalMessages = $objMessageDao->searchCount();
        } catch (Exception $e) {
            throw new Base_Model_Lib_Client_Exception("<strong>Oops !, Error Class name -</strong>  <em>Base_Model_Lib_Client_Service_Client</em>, <strong>Function -</strong> <em>deleteClient()</em>, <strong>Exception -</strong> <em>" . $e->getMessage() . "</em>");
        }

        return $totalMessages;
    }
    
    
     /*
     * @name        : updateMessage()
     * @Description : The function is to add a message information
     * 				  to the database.
     * @return      : Integer $last_inserted_id
     */

    public function updateMessageStatus() {
        $success = false;
        try {

            if (!($this->message instanceof Base_Model_Lib_Support_Entity_Message))
                throw new Base_Model_Lib_Message_Exception(" Message Entity not intialized");

            $objMessageDao = new Base_Model_Lib_Support_Dao_Message();
            $objMessageDao->message = $this->message;
            $success = $objMessageDao->updateMessageStatus();
        } catch (Exception $e) {
            throw new Base_Model_Lib_Client_Exception("<strong>Oops !, Error Class name -</strong>  <em>Base_Model_Lib_Client_Service_Client</em>, <strong>Function -</strong> <em>addClient()</em>, <strong>Exception -</strong> <em>" . $e->getMessage() . "</em>");
        }

        return $success;
    }
    
    
    /*
     * @name        : getClient
     * @Description : The function is to get a message information
     * 				  from the database.
     * @param       : $id (Client Id)
     * @return      : Base_Model_Lib_Client_Entity_Client
     */

    public function getAllMessageReply($messageId) {
        $message = "";
        try {
            $objMessage = new Base_Model_Lib_Support_Dao_Message();
            $message = $objMessage->getAllMessageReply($messageId);
        } catch (Exception $e) {
            throw new Base_Model_Lib_Client_Exception("<strong>Oops !, Error Class name -</strong>  <em>Base_Model_Lib_Client_Service_Client</em>, <strong>Function -</strong> <em>getClient()</em>, <strong>Exception -</strong> <em>" . $e->getMessage() . "</em>");
        }
        return $message;
    }

}

?>