<?php

/**
 * Description of Attachment
 *
 * @author Iyngaran Iyathurai <iyngaran55@gmail.com>
 */
class Base_Model_ObtorLib_App_Core_Qualification_Service_Attachment extends Base_Model_ObtorLib_Eav_Model_Service {

    public $attachment;

    /*
     * Get a user attachment using id
     * @return      : Entity Attachment Object (Base_Model_ObtorLib_App_Core_Qualification_Entity_Attachment)
     */

    public function getAttachment($id) {
        try {
            $objAttachment = new Base_Model_ObtorLib_App_Core_Qualification_Dao_Attachment();
            $attachment = $objAttachment->getAttachment($id);
            return $attachment;
        } catch (Exception $e) {
            throw new Base_Model_ObtorLib_App_Core_Qualification_Exception($e);
        }
    }

    /*
     * Add new user attachment
     * @return      : Integer ID / Null
     */

    public function addAttachment() {
        try {
            if (!($this->attachment instanceof Base_Model_ObtorLib_App_Core_Qualification_Entity_Attachment)) {
                throw new Base_Model_ObtorLib_App_Core_Qualification_Exception(" Attachment Entity not initialized");
            } else {
                $objAttachment = new Base_Model_ObtorLib_App_Core_Qualification_Dao_Attachment();
                $objAttachment->attachment = $this->attachment;
                return $objAttachment->addAttachment();
            }
        } catch (Exception $ex) {
            throw new Base_Model_ObtorLib_App_Core_Qualification_Exception($ex);
        }
    }

    /*
     * Update user attachment
     * @return      : Integer ID / Null
     */

    public function updateAttachment() {
        try {
            if (!($this->attachment instanceof Base_Model_ObtorLib_App_Core_Qualification_Entity_Attachment)) {
                throw new Base_Model_ObtorLib_App_Core_Qualification_Exception(" Attachment Entity not initialized");
            } else {
                $objAttachment = new Base_Model_ObtorLib_App_Core_Qualification_Dao_Attachment();
                $objAttachment->attachment = $this->attachment;
                return $objAttachment->updateAttachment();
            }
        } catch (Exception $ex) {
            throw new Base_Model_ObtorLib_App_Core_Qualification_Exception($ex);
        }
    }

    /*
     * Delete user attachment
     * @return      : Integer ID / Null
     */

    public function deleteAttachment() {
        try {
            if (!($this->attachment instanceof Base_Model_ObtorLib_App_Core_Qualification_Entity_Attachment)) {
                throw new Base_Model_ObtorLib_App_Core_Qualification_Exception(" Attachment Entity not initialized");
            } else {
                $objAttachment = new Base_Model_ObtorLib_App_Core_Qualification_Dao_Attachment();
                $objAttachment->attachment = $this->attachment;
                return $objAttachment->deleteAttachment();
            }
        } catch (Exception $ex) {
            throw new Base_Model_ObtorLib_App_Core_Qualification_Exception($ex);
        }
    }

    /*
     * Search user attachments....
     * @return : Array of Attachments Entities...
     */

    public function search() {
        try {
            if (!($this->attachment instanceof Base_Model_ObtorLib_App_Core_Qualification_Entity_Attachment)) {
                throw new Base_Model_ObtorLib_App_Core_Qualification_Exception(" Attachment Entity not initialized");
            } else {
                $objAttachment = new Base_Model_ObtorLib_App_Core_Qualification_Dao_Attachment();
                $objAttachment->attachment = $this->attachment;
                return $objAttachment->search();
            }
        } catch (Exception $ex) {
            throw new Base_Model_ObtorLib_App_Core_Qualification_Exception($ex);
        }
    }

}
