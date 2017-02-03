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
class Base_Model_Lib_Support_Service_Attachment extends Base_Model_Lib_Eav_Model_Service {

    const RESULT_PER_PAGE = 20; // the const variable for pagging

    public $attachment;

    /*
     * @name        : getClient
     * @Description : The function is to get a attachment information
     * 				  from the database.
     * @param       : $id (Client Id)
     * @return      : Base_Model_Lib_Client_Entity_Client
     */

    public function getAttachment($id) {
        $attachment = "";
        try {
            $objAttachment = new Base_Model_Lib_Support_Dao_Attachment();
            $attachment = $objAttachment->getAttachment($id);
        } catch (Exception $e) {
            throw new Base_Model_Lib_Client_Exception("<strong>Oops !, Error Class name -</strong>  <em>Base_Model_Lib_Client_Service_Client</em>, <strong>Function -</strong> <em>getClient()</em>, <strong>Exception -</strong> <em>" . $e->getAttachment() . "</em>");
        }
        return $attachment;
    }

    /*
     * @name        : addAttachment()
     * @Description : The function is to add a attachment information
     * 				  to the database.
     * @return      : Integer $last_inserted_id
     */

    public function addAttachment() {
        $last_inserted_id = 0;
        try {

            if (!($this->attachment instanceof Base_Model_Lib_Support_Entity_Attachment))
                throw new Base_Model_Lib_Attachment_Exception(" Attachment Entity not intialized");

            $objAttachmentDao = new Base_Model_Lib_Support_Dao_Attachment();
            $objAttachmentDao->attachment = $this->attachment;
            $last_inserted_id = $objAttachmentDao->addAttachment();
        } catch (Exception $e) {
            throw new Base_Model_Lib_Client_Exception("<strong>Oops !, Error Class name -</strong>  <em>Base_Model_Lib_Client_Service_Client</em>, <strong>Function -</strong> <em>addClient()</em>, <strong>Exception -</strong> <em>" . $e->getAttachment() . "</em>");
        }

        return $last_inserted_id;
    }

    /*
     * @name        : updateAttachment()
     * @Description : The function is to add a attachment information
     * 				  to the database.
     * @return      : Integer $last_inserted_id
     */

    public function updateAttachment() {
        $success = false;
        try {

            if (!($this->attachment instanceof Base_Model_Lib_Support_Entity_Attachment))
                throw new Base_Model_Lib_Attachment_Exception(" Attachment Entity not intialized");

            $objAttachmentDao = new Base_Model_Lib_Support_Dao_Attachment();
            $objAttachmentDao->attachment = $this->attachment;
            $success = $objAttachmentDao->updateAttachment();
        } catch (Exception $e) {
            throw new Base_Model_Lib_Client_Exception("<strong>Oops !, Error Class name -</strong>  <em>Base_Model_Lib_Client_Service_Client</em>, <strong>Function -</strong> <em>addClient()</em>, <strong>Exception -</strong> <em>" . $e->getAttachment() . "</em>");
        }

        return $success;
    }

    /*
     * @name        : deleteAttachment()
     * @Description : The function is to delete a attachment information
      from the database.
     * @return      : $success true/false
     */

    public function deleteAttachment() {
        $success = false;
        try {

            if (!($this->attachment instanceof Base_Model_Lib_Support_Entity_Attachment))
                throw new Base_Model_Lib_Attachment_Exception(" Attachment Entity not intialized");

            $objAttachmentDao = new Base_Model_Lib_Support_Dao_Attachment();
            $objAttachmentDao->attachment = $this->attachment;
            $success = $objAttachmentDao->deleteAttachment();
        } catch (Exception $e) {
            throw new Base_Model_Lib_Client_Exception("<strong>Oops !, Error Class name -</strong>  <em>Base_Model_Lib_Client_Service_Client</em>, <strong>Function -</strong> <em>deleteClient()</em>, <strong>Exception -</strong> <em>" . $e->getAttachment() . "</em>");
        }

        return $success;
    }

    /*
     * @name        : search($limit)
     * @Description : The function is to delete a attachment information
      from the database.
     * @return      : $success true/false
     */

    public function search($limit) {
        $attachments = '';
        try {

            if (!($this->attachment instanceof Base_Model_Lib_Support_Entity_Attachment))
                throw new Base_Model_Lib_Attachment_Exception(" Attachment Entity not intialized");

            $objAttachmentDao = new Base_Model_Lib_Support_Dao_Attachment();
            $objAttachmentDao->attachment = $this->attachment;
            $attachments = $objAttachmentDao->search($limit);
        } catch (Exception $e) {
            throw new Base_Model_Lib_Client_Exception("<strong>Oops !, Error Class name -</strong>  <em>Base_Model_Lib_Client_Service_Client</em>, <strong>Function -</strong> <em>deleteClient()</em>, <strong>Exception -</strong> <em>" . $e->getAttachment() . "</em>");
        }

        return $attachments;
    }

    /*
     * @name        : search($limit)
     * @Description : The function is to delete a attachment information
      from the database.
     * @return      : $success true/false
     */

    public function searchCount() {
        $totalAttachments = '';
        try {

            if (!($this->attachment instanceof Base_Model_Lib_Support_Entity_Attachment))
                throw new Base_Model_Lib_Attachment_Exception(" Attachment Entity not intialized");

            $objAttachmentDao = new Base_Model_Lib_Support_Dao_Attachment();
            $objAttachmentDao->attachment = $this->attachment;
            $totalAttachments = $objAttachmentDao->searchCount();
        } catch (Exception $e) {
            throw new Base_Model_Lib_Client_Exception("<strong>Oops !, Error Class name -</strong>  <em>Base_Model_Lib_Client_Service_Client</em>, <strong>Function -</strong> <em>deleteClient()</em>, <strong>Exception -</strong> <em>" . $e->getAttachment() . "</em>");
        }

        return $totalAttachments;
    }

}

?>