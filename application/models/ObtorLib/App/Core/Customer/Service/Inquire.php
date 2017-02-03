<?php

/**
 * Description of Inquire
 *
 * @author Iyngaran Iyathurai <iyngaran55@gmail.com>
 */
class Base_Model_ObtorLib_App_Core_Customer_Service_Inquire extends Base_Model_ObtorLib_Eav_Model_Service {

    public $inquire;

    /*
     * Get a user inquire using id
     * @return      : Entity Inquire Object (Base_Model_ObtorLib_App_Core_Customer_Entity_Inquire)
     */

    public function getInquire($id) {
        try {
            $objInquire = new Base_Model_ObtorLib_App_Core_Customer_Dao_Inquire();
            $inquire = $objInquire->getInquire($id);
            return $inquire;
        } catch (Exception $e) {
            throw new Base_Model_ObtorLib_App_Core_Customer_Exception($e);
        }
    }

    /*
     * Add new user inquire
     * @return      : Integer ID / Null
     */

    public function addInquire() {
        try {
            if (!($this->inquire instanceof Base_Model_ObtorLib_App_Core_Customer_Entity_Inquire)) {
                throw new Base_Model_ObtorLib_App_Core_Customer_Exception(" Inquire Entity not intialized");
            } else {
                $objInquire = new Base_Model_ObtorLib_App_Core_Customer_Dao_Inquire();
                $objInquire->inquire = $this->inquire;
                return $objInquire->addInquire();
            }
        } catch (Exception $ex) {
            throw new Base_Model_ObtorLib_App_Core_Customer_Exception($ex);
        }
    }

    /*
     * Update user inquire
     * @return      : Integer ID / Null
     */

    public function updateInquire() {
        try {
            if (!($this->inquire instanceof Base_Model_ObtorLib_App_Core_Customer_Entity_Inquire)) {
                throw new Base_Model_ObtorLib_App_Core_Customer_Exception(" Inquire Entity not intialized");
            } else {
                $objInquire = new Base_Model_ObtorLib_App_Core_Customer_Dao_Inquire();
                $objInquire->inquire = $this->inquire;
                return $objInquire->updateInquire();
            }
        } catch (Exception $ex) {
            throw new Base_Model_ObtorLib_App_Core_Customer_Exception($ex);
        }
    }

    /*
     * Delete user inquire
     * @return      : Integer ID / Null
     */

    public function deleteInquire() {
        try {
            if (!($this->inquire instanceof Base_Model_ObtorLib_App_Core_Customer_Entity_Inquire)) {
                throw new Base_Model_ObtorLib_App_Core_Customer_Exception(" Inquire Entity not intialized");
            } else {
                $objInquire = new Base_Model_ObtorLib_App_Core_Customer_Dao_Inquire();
                $objInquire->inquire = $this->inquire;
                return $objInquire->deleteInquire();
            }
        } catch (Exception $ex) {
            throw new Base_Model_ObtorLib_App_Core_Customer_Exception($ex);
        }
    }

    /*
     * Search user inquires....
     * @return : Array of Inquires Entities...
     */

    public function search($limit = null) {
        try {
            if (!($this->inquire instanceof Base_Model_ObtorLib_App_Core_Customer_Entity_Inquire)) {
                throw new Base_Model_ObtorLib_App_Core_Customer_Exception(" Inquire Entity not intialized");
            } else {
                $objInquire = new Base_Model_ObtorLib_App_Core_Customer_Dao_Inquire();
                $objInquire->inquire = $this->inquire;
                return $objInquire->search($limit);
            }
        } catch (Exception $ex) {
            throw new Base_Model_ObtorLib_App_Core_Customer_Exception($ex);
        }
    }
    
    /*
     * Search user inquires....
     * @return : Array of Inquires Entities...
     */

    public function searchCount() {
        try {
            if (!($this->inquire instanceof Base_Model_ObtorLib_App_Core_Customer_Entity_Inquire)) {
                throw new Base_Model_ObtorLib_App_Core_Customer_Exception(" Inquire Entity not intialized");
            } else {
                $objInquire = new Base_Model_ObtorLib_App_Core_Customer_Dao_Inquire();
                $objInquire->inquire = $this->inquire;
                return $objInquire->searchCount();
            }
        } catch (Exception $ex) {
            throw new Base_Model_ObtorLib_App_Core_Customer_Exception($ex);
        }
    }

}
