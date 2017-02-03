<?php

/**
 * Description of Potential
 *
 * @author Iyngaran Iyathurai <iyngaran55@gmail.com>
 */
class Base_Model_ObtorLib_App_Core_Crm_Service_Potential extends Base_Model_ObtorLib_Eav_Model_Service {

    public $potential;

    /*
     * Get a user potential using id
     * @return      : Entity Potential Object (Base_Model_ObtorLib_App_Core_Crm_Entity_Potential)
     */

    public function getPotential($id) {
        try {
            $objPotential = new Base_Model_ObtorLib_App_Core_Crm_Dao_Potential();
            $potential = $objPotential->getPotential($id);
            return $potential;
        } catch (Exception $e) {
            throw new Base_Model_ObtorLib_App_Core_Crm_Exception($e);
        }
    }

    /*
     * Add new user potential
     * @return      : Integer ID / Null
     */

    public function addPotential() {
        try {
            if (!($this->potential instanceof Base_Model_ObtorLib_App_Core_Crm_Entity_Potential)) {
                throw new Base_Model_ObtorLib_App_Core_Crm_Exception(" Potential Entity not intialized");
            } else {
                $objPotential = new Base_Model_ObtorLib_App_Core_Crm_Dao_Potential();
                $objPotential->potential = $this->potential;
                return $objPotential->addPotential();
            }
        } catch (Exception $ex) {
            throw new Base_Model_ObtorLib_App_Core_Crm_Exception($ex);
        }
    }

    /*
     * Update user potential
     * @return      : Integer ID / Null
     */

    public function updatePotential() {
        try {
            if (!($this->potential instanceof Base_Model_ObtorLib_App_Core_Crm_Entity_Potential)) {
                throw new Base_Model_ObtorLib_App_Core_Crm_Exception(" Potential Entity not intialized");
            } else {
                $objPotential = new Base_Model_ObtorLib_App_Core_Crm_Dao_Potential();
                $objPotential->potential = $this->potential;
                return $objPotential->updatePotential();
            }
        } catch (Exception $ex) {
            throw new Base_Model_ObtorLib_App_Core_Crm_Exception($ex);
        }
    }

    /*
     * Delete user potential
     * @return      : Integer ID / Null
     */

    public function deletePotential() {
        try {
            if (!($this->potential instanceof Base_Model_ObtorLib_App_Core_Crm_Entity_Potential)) {
                throw new Base_Model_ObtorLib_App_Core_Crm_Exception(" Potential Entity not intialized");
            } else {
                $objPotential = new Base_Model_ObtorLib_App_Core_Crm_Dao_Potential();
                $objPotential->potential = $this->potential;
                return $objPotential->deletePotential();
            }
        } catch (Exception $ex) {
            throw new Base_Model_ObtorLib_App_Core_Crm_Exception($ex);
        }
    }

    /*
     * Search user potentials....
     * @return : Array of Potentials Entities...
     */

    public function search() {
        try {
            if (!($this->potential instanceof Base_Model_ObtorLib_App_Core_Crm_Entity_Potential)) {
                throw new Base_Model_ObtorLib_App_Core_Crm_Exception(" Potential Entity not intialized");
            } else {
                $objPotential = new Base_Model_ObtorLib_App_Core_Crm_Dao_Potential();
                $objPotential->potential = $this->potential;
                return $objPotential->search();
            }
        } catch (Exception $ex) {
            throw new Base_Model_ObtorLib_App_Core_Crm_Exception($ex);
        }
    }
    
    
     /*
     * Search user potentials....
     * @return : Array of Potentials Entities...
     */

    public function searchCount() {
        try {
            if (!($this->potential instanceof Base_Model_ObtorLib_App_Core_Crm_Entity_Potential)) {
                throw new Base_Model_ObtorLib_App_Core_Crm_Exception(" Potential Entity not intialized");
            } else {
                $objPotential = new Base_Model_ObtorLib_App_Core_Crm_Dao_Potential();
                $objPotential->potential = $this->potential;
                return $objPotential->searchCount();
            }
        } catch (Exception $ex) {
            throw new Base_Model_ObtorLib_App_Core_Crm_Exception($ex);
        }
    }

}
