<?php

/**
 * Description of SubContact
 *
 * @author Iyngaran Iyathurai <iyngaran55@gmail.com>
 */
class Base_Model_ObtorLib_App_Core_Crm_Service_SubContact extends Base_Model_ObtorLib_Eav_Model_Service {

    public $subContact;

    /*
     * Get a user subContact using id
     * @return      : Entity SubContact Object (Base_Model_ObtorLib_App_Core_Crm_Entity_SubContact)
     */

    public function getSubContact($id) {
        try {
            $objSubContact = new Base_Model_ObtorLib_App_Core_Crm_Dao_SubContact();
            $subContact = $objSubContact->getSubContact($id);
            return $subContact;
        } catch (Exception $e) {
            throw new Base_Model_ObtorLib_App_Core_Crm_Exception($e);
        }
    }

    /*
     * Add new user subContact
     * @return      : Integer ID / Null
     */

    public function addSubContact() {
        try {
            if (!($this->subContact instanceof Base_Model_ObtorLib_App_Core_Crm_Entity_SubContact)) {
                throw new Base_Model_ObtorLib_App_Core_Crm_Exception(" SubContact Entity not intialized");
            } else {
                $objSubContact = new Base_Model_ObtorLib_App_Core_Crm_Dao_SubContact();
                $objSubContact->subContact = $this->subContact;
                return $objSubContact->addSubContact();
            }
        } catch (Exception $ex) {
            throw new Base_Model_ObtorLib_App_Core_Crm_Exception($ex);
        }
    }

    /*
     * Update user subContact
     * @return      : Integer ID / Null
     */

    public function updateSubContact() {
        try {
            if (!($this->subContact instanceof Base_Model_ObtorLib_App_Core_Crm_Entity_SubContact)) {
                throw new Base_Model_ObtorLib_App_Core_Crm_Exception(" SubContact Entity not intialized");
            } else {
                $objSubContact = new Base_Model_ObtorLib_App_Core_Crm_Dao_SubContact();
                $objSubContact->subContact = $this->subContact;
                return $objSubContact->updateSubContact();
            }
        } catch (Exception $ex) {
            throw new Base_Model_ObtorLib_App_Core_Crm_Exception($ex);
        }
    }

    /*
     * Delete user subContact
     * @return      : Integer ID / Null
     */

    public function deleteSubContact() {
        try {
            if (!($this->subContact instanceof Base_Model_ObtorLib_App_Core_Crm_Entity_SubContact)) {
                throw new Base_Model_ObtorLib_App_Core_Crm_Exception(" SubContact Entity not intialized");
            } else {
                $objSubContact = new Base_Model_ObtorLib_App_Core_Crm_Dao_SubContact();
                $objSubContact->subContact = $this->subContact;
                return $objSubContact->deleteSubContact();
            }
        } catch (Exception $ex) {
            throw new Base_Model_ObtorLib_App_Core_Crm_Exception($ex);
        }
    }

    /*
     * Search user subContacts....
     * @return : Array of SubContacts Entities...
     */

    public function search() {
        try {
            if (!($this->subContact instanceof Base_Model_ObtorLib_App_Core_Crm_Entity_SubContact)) {
                throw new Base_Model_ObtorLib_App_Core_Crm_Exception(" SubContact Entity not intialized");
            } else {
                $objSubContact = new Base_Model_ObtorLib_App_Core_Crm_Dao_SubContact();
                $objSubContact->subContact = $this->subContact;
                return $objSubContact->search();
            }
        } catch (Exception $ex) {
            throw new Base_Model_ObtorLib_App_Core_Crm_Exception($ex);
        }
    }
    
    
     /*
     * Search user subContacts....
     * @return : Array of SubContacts Entities...
     */

    public function searchCount() {
        try {
            if (!($this->subContact instanceof Base_Model_ObtorLib_App_Core_Crm_Entity_SubContact)) {
                throw new Base_Model_ObtorLib_App_Core_Crm_Exception(" SubContact Entity not intialized");
            } else {
                $objSubContact = new Base_Model_ObtorLib_App_Core_Crm_Dao_SubContact();
                $objSubContact->subContact = $this->subContact;
                return $objSubContact->searchCount();
            }
        } catch (Exception $ex) {
            throw new Base_Model_ObtorLib_App_Core_Crm_Exception($ex);
        }
    }

}
