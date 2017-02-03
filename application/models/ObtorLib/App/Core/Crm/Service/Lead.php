<?php

/**
 * Description of Lead
 *
 * @author Iyngaran Iyathurai <iyngaran55@gmail.com>
 */
class Base_Model_ObtorLib_App_Core_Crm_Service_Lead extends Base_Model_ObtorLib_Eav_Model_Service {

    public $lead;

    /*
     * Get a user lead using id
     * @return      : Entity Lead Object (Base_Model_ObtorLib_App_Core_Crm_Entity_Lead)
     */

    public function getLead($id) {
        try {
            $objLead = new Base_Model_ObtorLib_App_Core_Crm_Dao_Lead();
            $lead = $objLead->getLead($id);
            return $lead;
        } catch (Exception $e) {
            throw new Base_Model_ObtorLib_App_Core_Crm_Exception($e);
        }
    }

    /*
     * Add new user lead
     * @return      : Integer ID / Null
     */

    public function addLead() {
        try {
            if (!($this->lead instanceof Base_Model_ObtorLib_App_Core_Crm_Entity_Lead)) {
                throw new Base_Model_ObtorLib_App_Core_Crm_Exception(" Lead Entity not intialized");
            } else {
                $objLead = new Base_Model_ObtorLib_App_Core_Crm_Dao_Lead();
                $objLead->lead = $this->lead;
                return $objLead->addLead();
            }
        } catch (Exception $ex) {
            throw new Base_Model_ObtorLib_App_Core_Crm_Exception($ex);
        }
    }

    /*
     * Update user lead
     * @return      : Integer ID / Null
     */

    public function updateLead() {
        try {
            if (!($this->lead instanceof Base_Model_ObtorLib_App_Core_Crm_Entity_Lead)) {
                throw new Base_Model_ObtorLib_App_Core_Crm_Exception(" Lead Entity not intialized");
            } else {
                $objLead = new Base_Model_ObtorLib_App_Core_Crm_Dao_Lead();
                $objLead->lead = $this->lead;
                return $objLead->updateLead();
            }
        } catch (Exception $ex) {
            throw new Base_Model_ObtorLib_App_Core_Crm_Exception($ex);
        }
    }

    /*
     * Delete user lead
     * @return      : Integer ID / Null
     */

    public function deleteLead() {
        try {
            if (!($this->lead instanceof Base_Model_ObtorLib_App_Core_Crm_Entity_Lead)) {
                throw new Base_Model_ObtorLib_App_Core_Crm_Exception(" Lead Entity not intialized");
            } else {
                $objLead = new Base_Model_ObtorLib_App_Core_Crm_Dao_Lead();
                $objLead->lead = $this->lead;
                return $objLead->deleteLead();
            }
        } catch (Exception $ex) {
            throw new Base_Model_ObtorLib_App_Core_Crm_Exception($ex);
        }
    }

    /*
     * Search user leads....
     * @return : Array of Leads Entities...
     */

    public function search() {
        try {
            if (!($this->lead instanceof Base_Model_ObtorLib_App_Core_Crm_Entity_Lead)) {
                throw new Base_Model_ObtorLib_App_Core_Crm_Exception(" Lead Entity not intialized");
            } else {
                $objLead = new Base_Model_ObtorLib_App_Core_Crm_Dao_Lead();
                $objLead->lead = $this->lead;
                return $objLead->search();
            }
        } catch (Exception $ex) {
            throw new Base_Model_ObtorLib_App_Core_Crm_Exception($ex);
        }
    }
    
    
     /*
     * Search user leads....
     * @return : Array of Leads Entities...
     */

    public function searchCount() {
        try {
            if (!($this->lead instanceof Base_Model_ObtorLib_App_Core_Crm_Entity_Lead)) {
                throw new Base_Model_ObtorLib_App_Core_Crm_Exception(" Lead Entity not intialized");
            } else {
                $objLead = new Base_Model_ObtorLib_App_Core_Crm_Dao_Lead();
                $objLead->lead = $this->lead;
                return $objLead->searchCount();
            }
        } catch (Exception $ex) {
            throw new Base_Model_ObtorLib_App_Core_Crm_Exception($ex);
        }
    }

}
