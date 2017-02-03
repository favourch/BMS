<?php

/**
 * @namespace       : Base
 * @package         : Model
 * @subpackage 		: Lib.Attachment.Dao
 * @name 			: Attachment
 * @author 			: Iyngaran Iyathurai
 * 			  		  Software eng - Bcas R&D
 * 			          E-Mail - Iyngaran55@yahoo.com, Iyngaran@bcas.lk
 *
 * @copyright Copyright (c) 2009 - 2010 BCAS R&D . (http://www.lab.bcasrd.com)
 *
 * Description : The object-oriented interface to bcas database table tbl_client
 *
 */
class Base_Model_Lib_Support_Dao_Attachment extends Zend_Db_Table {

    protected $_name = 'tbl_attachments'; // the table name
    protected $_primary = 'id'; // the primary key
    // the client object
    public $attachment;

    // the methods goes from here......
    /*
     * @name        : getAttachment
     * @Description : The function is to get a client information
     * 				  from the database.
     * @param       : $id (Attachment Id)
     * @return      : Entity Attachment Object (Base_Model_Lib_Attachment_Entity_Attachment)
     */

    public function getAttachment($id) {
        $objAttachment = new Base_Model_Lib_Support_Entity_Attachment();
        
        try {

            $id = (int) $id;
            $row = $this->fetchRow('id = ' . $id);

            if ($row != "") {
                $result = $row->toArray();
                $objAttachment->setId($result['id']);
                $objAttachment->setAttachmentObject($result['attachment_object']);
                $objAttachment->setAttachmentObjectId($result['attachment_object']);
                $objAttachment->setFileName($result['filename']);
                
            }
        } catch (Exception $e) {
            throw new Base_Model_Lib_Eav_Exception_Sql("<strong>Oops !, Error Class name -</strong>  <em>Base_Model_Lib_Attachment_Dao_Attachment</em>, <strong>Function -</strong> <em>getAttachment()</em>, <strong>Exception -</strong> <em>" . $e->getAttachment() . "</em>");
        }
        return $objAttachment;
    }

    /*
     * @name        : addAttachment
     * @Description : The function is to add a attachment information
     * 				  to the database.
     * @return      : Integer $last_inserted_id
     */

    public function addAttachment() {
        $last_inserted_id = 0;
        try {

            if (!($this->attachment instanceof Base_Model_Lib_Support_Entity_Attachment))
                throw new Base_Model_Lib_Attachment_Exception(" Attachment Entity not intialized");

            $data = array(
                'filename' => $this->attachment->getFileName(),
                'attachment_object' => $this->attachment->getAttachmentObject(),
                'attachment_object_id' => $this->attachment->getAttachmentObjectId()
            );

            $last_inserted_id = $this->insert($data);
        } catch (Exception $e) {
            throw new Base_Model_Lib_Eav_Exception_Sql("<strong>Oops !, Error Class name -</strong>  <em>Base_Model_Lib_Attachment_Dao_Attachment</em>, <strong>Function -</strong> <em>addAttachment()</em>, <strong>Exception -</strong> <em>" . $e->getAttachment() . "</em>");
        }

        return $last_inserted_id;
    }

    /*
     * @name        : updateAttachment
     * @Description : The function is to update/edit a client information
     * 				  in the database.
     * @return      : $success true/false
     */

    public function updateAttachment() {
        $success = false;
        try {

            if (!($this->attachment instanceof Base_Model_Lib_Support_Entity_Attachment))
                throw new Base_Model_Lib_Attachment_Exception(" Attachment Entity not intialized");

            $data = array(
                'filename' => $this->attachment->getFileName(),
                'attachment_object' => $this->attachment->getAttachmentObject(),
                'attachment_object_id' => $this->attachment->getAttachmentObjectId()
            );
            $this->update($data, 'id = ' . (int) $this->attachment->getId());
            $success = true;
        } catch (Exception $e) {
            throw new Base_Model_Lib_Eav_Exception_Sql("<strong>Oops !, Error Class name -</strong>  <em>Base_Model_Lib_Attachment_Dao_Attachment</em>, <strong>Function -</strong> <em>updateAttachment()</em>, <strong>Exception -</strong> <em>" . $e->getAttachment() . "</em>");
        }
        return $success;
    }

    /*
     * @name        : deleteAttachment
     * @Description : The function is to delete a client information
     * 				  in the database.
     * @return      : $success true/false
     */

    public function deleteAttachment() {
        $success = false;
        try {

            if (!($this->attachment instanceof Base_Model_Lib_Support_Entity_Attachment))
                throw new Base_Model_Lib_Attachment_Exception(" Attachment Entity not intialized");

            if ($this->delete('id =' . (int) $this->attachment->getId()) == '1') {
                $success = true;
            }
        } catch (Exception $e) {
            throw new Base_Model_Lib_Eav_Exception_Sql("<strong>Oops !, Error Class name -</strong>  <em>Base_Model_Lib_Attachment_Dao_Attachment</em>, <strong>Function -</strong> <em>deleteAttachment()</em>, <strong>Exception -</strong> <em>" . $e->getAttachment() . "</em>");
        }
        return $success;
    }

    
    /*
     * @name        : search
     * @Description : The function is to search Student information
     * 				  from the database.
     * @return      : Aray Of Entity Student Object (Base_Model_Lib_Student_Entity_Student)
     */
    public function getAll() {
        // declare an array variable
        $arrAttachments = array();
        $arrWhere = array();
        $sql = "";
        try {

           if (!($this->attachment instanceof Base_Model_Lib_Support_Entity_Attachment))
                throw new Base_Model_Lib_Attachment_Exception(" Attachment Entity not intialized");


                $sql = "SELECT id FROM tbl_attachments ";
                $db = Zend_Db_Table_Abstract::getDefaultAdapter();
                $result = $db->fetchCol($sql);

                foreach ($result as $cid) {
                    $objSupportAttachment = $this->getAttachment($cid);
                    array_push($arrAttachments, $objSupportAttachment);
                }
        } catch (Exception $e) {
            throw new Base_Model_Lib_Eav_Exception_Sql("<strong>Oops !, Error Class name -</strong>  <em>Base_Model_Lib_Client_Entity_Client</em>, <strong>Function -</strong> <em>loginClient()</em>, <strong>Exception -</strong> <em>" . $e->getAttachment() . "</em>");
        }
        return $arrAttachments;
    }
    
    
}
?>