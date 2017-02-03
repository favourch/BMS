<?php

/**
 * Description of SubLead
 *
 * @author Iyngaran Iyathurai <iyngaran55@gmail.com>
 */
class Base_Model_ObtorLib_App_Core_Crm_Service_SubLead extends Base_Model_ObtorLib_Eav_Model_Service {

    public $subLead;

    /*
     * Get a user subLead using id
     * @return      : Entity SubLead Object (Base_Model_ObtorLib_App_Core_Crm_Entity_SubLead)
     */

    public function getSubLead($id) {
        try {
            $objSubLead = new Base_Model_ObtorLib_App_Core_Crm_Dao_SubLead();
            $subLead = $objSubLead->getSubLead($id);
            return $subLead;
        } catch (Exception $e) {
            throw new Base_Model_ObtorLib_App_Core_Crm_Exception($e);
        }
    }

    /*
     * Add new user subLead
     * @return      : Integer ID / Null
     */

    public function addSubLead() {
        try {
            if (!($this->subLead instanceof Base_Model_ObtorLib_App_Core_Crm_Entity_SubLead)) {
                throw new Base_Model_ObtorLib_App_Core_Crm_Exception(" SubLead Entity not intialized");
            } else {
                $objSubLead = new Base_Model_ObtorLib_App_Core_Crm_Dao_SubLead();
                $objSubLead->subLead = $this->subLead;
                return $objSubLead->addSubLead();
            }
        } catch (Exception $ex) {
            throw new Base_Model_ObtorLib_App_Core_Crm_Exception($ex);
        }
    }

    /*
     * Update user subLead
     * @return      : Integer ID / Null
     */

    public function updateSubLead() {
        try {
            if (!($this->subLead instanceof Base_Model_ObtorLib_App_Core_Crm_Entity_SubLead)) {
                throw new Base_Model_ObtorLib_App_Core_Crm_Exception(" SubLead Entity not intialized");
            } else {
                $objSubLead = new Base_Model_ObtorLib_App_Core_Crm_Dao_SubLead();
                $objSubLead->subLead = $this->subLead;
                return $objSubLead->updateSubLead();
            }
        } catch (Exception $ex) {
            throw new Base_Model_ObtorLib_App_Core_Crm_Exception($ex);
        }
    }

    /*
     * Delete user subLead
     * @return      : Integer ID / Null
     */

    public function deleteSubLead() {
        try {
            if (!($this->subLead instanceof Base_Model_ObtorLib_App_Core_Crm_Entity_SubLead)) {
                throw new Base_Model_ObtorLib_App_Core_Crm_Exception(" SubLead Entity not intialized");
            } else {
                $objSubLead = new Base_Model_ObtorLib_App_Core_Crm_Dao_SubLead();
                $objSubLead->subLead = $this->subLead;
                return $objSubLead->deleteSubLead();
            }
        } catch (Exception $ex) {
            throw new Base_Model_ObtorLib_App_Core_Crm_Exception($ex);
        }
    }

    /*
     * Search user subLeads....
     * @return : Array of SubLeads Entities...
     */

    public function search() {
        try {
            if (!($this->subLead instanceof Base_Model_ObtorLib_App_Core_Crm_Entity_SubLead)) {
                throw new Base_Model_ObtorLib_App_Core_Crm_Exception(" SubLead Entity not intialized");
            } else {
                $objSubLead = new Base_Model_ObtorLib_App_Core_Crm_Dao_SubLead();
                $objSubLead->subLead = $this->subLead;
                return $objSubLead->search();
            }
        } catch (Exception $ex) {
            throw new Base_Model_ObtorLib_App_Core_Crm_Exception($ex);
        }
    }
    
    
     /*
     * Search user subLeads....
     * @return : Array of SubLeads Entities...
     */

    public function searchCount() {
        try {
            if (!($this->subLead instanceof Base_Model_ObtorLib_App_Core_Crm_Entity_SubLead)) {
                throw new Base_Model_ObtorLib_App_Core_Crm_Exception(" SubLead Entity not intialized");
            } else {
                $objSubLead = new Base_Model_ObtorLib_App_Core_Crm_Dao_SubLead();
                $objSubLead->subLead = $this->subLead;
                return $objSubLead->searchCount();
            }
        } catch (Exception $ex) {
            throw new Base_Model_ObtorLib_App_Core_Crm_Exception($ex);
        }
    }

}
