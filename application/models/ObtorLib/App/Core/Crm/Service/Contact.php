<?php

/**
 * Description of Contact
 *
 * @author Iyngaran Iyathurai <iyngaran55@gmail.com>
 */
class Base_Model_ObtorLib_App_Core_Crm_Service_Contact extends Base_Model_ObtorLib_Eav_Model_Service {

    public $contact;

    /*
     * Get a user contact using id
     * @return      : Entity Contact Object (Base_Model_ObtorLib_App_Core_Crm_Entity_Contact)
     */

    public function getContact($id) {
        try {
            $objContact = new Base_Model_ObtorLib_App_Core_Crm_Dao_Contact();
            $contact = $objContact->getContact($id);
            return $contact;
        } catch (Exception $e) {
            throw new Base_Model_ObtorLib_App_Core_Crm_Exception($e);
        }
    }

    /*
     * Add new user contact
     * @return      : Integer ID / Null
     */

    public function addContact() {
        try {
            if (!($this->contact instanceof Base_Model_ObtorLib_App_Core_Crm_Entity_Contact)) {
                throw new Base_Model_ObtorLib_App_Core_Crm_Exception(" Contact Entity not intialized");
            } else {
                $objContact = new Base_Model_ObtorLib_App_Core_Crm_Dao_Contact();
                $objContact->contact = $this->contact;
                return $objContact->addContact();
            }
        } catch (Exception $ex) {
            throw new Base_Model_ObtorLib_App_Core_Crm_Exception($ex);
        }
    }

    /*
     * Update user contact
     * @return      : Integer ID / Null
     */

    public function updateContact() {
        try {
            if (!($this->contact instanceof Base_Model_ObtorLib_App_Core_Crm_Entity_Contact)) {
                throw new Base_Model_ObtorLib_App_Core_Crm_Exception(" Contact Entity not intialized");
            } else {
                $objContact = new Base_Model_ObtorLib_App_Core_Crm_Dao_Contact();
                $objContact->contact = $this->contact;
                return $objContact->updateContact();
            }
        } catch (Exception $ex) {
            throw new Base_Model_ObtorLib_App_Core_Crm_Exception($ex);
        }
    }

    /*
     * Delete user contact
     * @return      : Integer ID / Null
     */

    public function deleteContact() {
        try {
            if (!($this->contact instanceof Base_Model_ObtorLib_App_Core_Crm_Entity_Contact)) {
                throw new Base_Model_ObtorLib_App_Core_Crm_Exception(" Contact Entity not intialized");
            } else {
                $objContact = new Base_Model_ObtorLib_App_Core_Crm_Dao_Contact();
                $objContact->contact = $this->contact;
                return $objContact->deleteContact();
            }
        } catch (Exception $ex) {
            throw new Base_Model_ObtorLib_App_Core_Crm_Exception($ex);
        }
    }

    /*
     * Search user contacts....
     * @return : Array of Contacts Entities...
     */

    public function search() {
        try {
            if (!($this->contact instanceof Base_Model_ObtorLib_App_Core_Crm_Entity_Contact)) {
                throw new Base_Model_ObtorLib_App_Core_Crm_Exception(" Contact Entity not intialized");
            } else {
                $objContact = new Base_Model_ObtorLib_App_Core_Crm_Dao_Contact();
                $objContact->contact = $this->contact;
                return $objContact->search();
            }
        } catch (Exception $ex) {
            throw new Base_Model_ObtorLib_App_Core_Crm_Exception($ex);
        }
    }
    
    
     /*
     * Search user contacts....
     * @return : Array of Contacts Entities...
     */

    public function searchCount() {
        try {
            if (!($this->contact instanceof Base_Model_ObtorLib_App_Core_Crm_Entity_Contact)) {
                throw new Base_Model_ObtorLib_App_Core_Crm_Exception(" Contact Entity not intialized");
            } else {
                $objContact = new Base_Model_ObtorLib_App_Core_Crm_Dao_Contact();
                $objContact->contact = $this->contact;
                return $objContact->searchCount();
            }
        } catch (Exception $ex) {
            throw new Base_Model_ObtorLib_App_Core_Crm_Exception($ex);
        }
    }

}
