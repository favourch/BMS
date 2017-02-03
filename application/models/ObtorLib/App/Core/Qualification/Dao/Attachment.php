<?php
class Base_Model_ObtorLib_App_Core_Qualification_Dao_Attachment extends Zend_Db_Table_Abstract{


    //put your code here
    public $attachment;
    protected $_name = 'tbl_attachment';

    /*
     * Get a attachment information using attachment id
     * @return      : Entity Attachment Object (Base_Model_ObtorLib_App_Core_Qualification_Entity_Attachment)
     */

    public function getAttachment($id) {
        try {
            $id = (int) $id;
            $row = $this->fetchRow('id = ' . $id);
            if ($row) {
                $attachmentRow = $row->toArray();
                $attachmentEntity = new Base_Model_ObtorLib_App_Core_Qualification_Entity_Attachment();
                $attachmentEntity->setId($attachmentRow['id']);
                $attachmentEntity->setAttachmentTitle($attachmentRow['attachment_title']);
                $attachmentEntity->setAttachmentDescription($attachmentRow['attachment_description']);
                $attachmentEntity->setDocPath($attachmentRow['doc_path']);                
                $attachmentEntity->setRelId($attachmentRow['rel_id']);
                $attachmentEntity->setRelObject($attachmentRow['rel_object']);
                return $attachmentEntity;
            } else {
                return null;
            }
        } catch (Exception $ex) {
            throw new Base_Model_ObtorLib_App_Core_Qualification_Exception($ex);
        }
    }



    /*
     * Add new Attachment
     * @return      : Integer ID / Null
     */

    public function addAttachment() {
        try {
            if (!($this->attachment instanceof Base_Model_ObtorLib_App_Core_Qualification_Entity_Attachment)) {
                throw new Base_Model_ObtorLib_App_Core_Qualification_Exception(" Attachment Entity not initialized");
            } else {
                $data = array(
                    'attachment_title' => $this->attachment->getAttachmentTitle(),
                    'attachment_description' => $this->attachment->getAttachmentDescription(),
                    'doc_path' => $this->attachment->getDocPath(),
                    'rel_id' => $this->attachment->getRelId(),
                    'rel_object' => $this->attachment->getRelObject());
                
                $last_inserted_id = $this->insert($data);
                return $last_inserted_id;
            }
        } catch (Exception $ex) {
            throw new Base_Model_ObtorLib_App_Core_Qualification_Exception($ex);
        }
    }



    /*
    * Update attachment
    * @return      : Boolean true/false
    */

    public function updateAttachment() {
        try {
            if (!($this->attachment instanceof Base_Model_ObtorLib_App_Core_Qualification_Entity_Attachment)) {
                throw new Base_Model_ObtorLib_App_Core_Qualification_Exception(" Attachment Entity not initialized");
            } else {
               $data = array(
                    'attachment_title' => $this->attachment->getAttachmentTitle(),
                    'attachment_description' => $this->attachment->getAttachmentDescription(),
                    'doc_path' => $this->attachment->getDocPath(),
                    'rel_id' => $this->attachment->getRelId(),
                    'rel_object' => $this->attachment->getRelObject());
                return $this->update($data, 'id = ' . (int) $this->attachment->getId());
            }
        } catch (Exception $ex) {
            throw new Base_Model_ObtorLib_App_Core_Qualification_Exception($ex);
        }
    }


    /*
    * Delete attachment
    * @return      : Boolean true/false
    */

    public function deleteAttachment() {
        try {
            if (!($this->attachment instanceof Base_Model_ObtorLib_App_Core_Qualification_Entity_Attachment)) {
                throw new Base_Model_ObtorLib_App_Core_Qualification_Exception(" Attachment Entity not initialized");
            } else {
                return $this->delete('id =' . (int) $this->attachment->getId());
            }
        } catch (Exception $ex) {
            throw new Base_Model_ObtorLib_App_Core_Qualification_Exception($ex);
        }
    }


    /*
     * Search attachments....
     * @return : Array of Attachments Entities...
     */

    public function search() {
        try {
            if (!($this->attachment instanceof Base_Model_ObtorLib_App_Core_Qualification_Entity_Attachment)) {
                throw new Base_Model_ObtorLib_App_Core_Qualification_Exception(" Attachment Entity not initialized");
            } else {
                $arrWhere = array();
                $arrAttachments = array();
                $relId = $this->attachment->getRelId();
                $relObject = $this->attachment->getRelObject();
                
                $attachmentSql = "SELECT id FROM tbl_attachment ";

                if ($relId) {
                    array_push($arrWhere, "rel_id = '" . $relId . "'");
                }
                
                if ($relObject) {
                    array_push($arrWhere, "rel_object = '" . $relObject . "'");
                }
                

                if (count($arrWhere) > 0) {
                    $attachmentSql.= "WHERE " . implode(' AND ',$arrWhere);
                }

                $db = Zend_Db_Table_Abstract::getDefaultAdapter();
                $result = $db->fetchCol($attachmentSql);
                foreach ($result as $attachmentId) {
                    $attachmentInfo = $this->getAttachment($attachmentId);
                    array_push($arrAttachments, $attachmentInfo);
                }
                return $arrAttachments;
            }
        } catch (Exception $ex) {
            throw new Base_Model_ObtorLib_App_Core_Qualification_Exception($ex);
        }
    }


} 