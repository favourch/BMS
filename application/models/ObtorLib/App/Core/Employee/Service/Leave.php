<?php
/**
 * Created by PhpStorm.
 * Employee: ism-apac
 * Date: 8/7/14
 * Time: 3:26 PM
 */

class Base_Model_ObtorLib_App_Core_Employee_Service_Leave  extends Base_Model_ObtorLib_Eav_Model_Service {

    public $leave;

    /*
     * Get a leave using id
     * @return      : Entity Leave Object (Base_Model_ObtorLib_App_Core_Employee_Entity_Leave)
     */

    public function getLeave($id) {
        try {
            $objLeave = new Base_Model_ObtorLib_App_Core_Employee_Dao_Leave();
            $leave = $objLeave->getLeave($id);
            return $leave;
        } catch (Exception $e) {
            throw new Base_Model_ObtorLib_App_Core_Employee_Exception($e);
        }
    }

    /*
     * Add new leave
     * @return      : Integer ID / Null
     */

    public function addLeave() {
        try {
            if (!($this->leave instanceof Base_Model_ObtorLib_App_Core_Employee_Entity_Leave)) {
                throw new Base_Model_ObtorLib_App_Core_Employee_Exception(" Leave Entity not initialized");
            } else {
                $objLeave = new Base_Model_ObtorLib_App_Core_Employee_Dao_Leave();
                $objLeave->leave = $this->leave;
                return $objLeave->addLeave();
            }
        } catch (Exception $ex) {
            throw new Base_Model_ObtorLib_App_Core_Employee_Exception($ex);
        }
    }

    /*
     * Update leave
     * @return      : Integer ID / Null
     */

    public function updateLeave() {
        try {
            if (!($this->leave instanceof Base_Model_ObtorLib_App_Core_Employee_Entity_Leave)) {
                throw new Base_Model_ObtorLib_App_Core_Employee_Exception(" Leave Entity not initialized");
            } else {
                $objLeave = new Base_Model_ObtorLib_App_Core_Employee_Dao_Leave();
                $objLeave->leave = $this->leave;
                return $objLeave->updateLeave();
            }
        } catch (Exception $ex) {
            throw new Base_Model_ObtorLib_App_Core_Employee_Exception($ex);
        }
    }
    
    
       /*
     * Update leave
     * @return      : Integer ID / Null
     */

    public function staffUpdateLeave() {
        try {
            if (!($this->leave instanceof Base_Model_ObtorLib_App_Core_Employee_Entity_Leave)) {
                throw new Base_Model_ObtorLib_App_Core_Employee_Exception(" Leave Entity not initialized");
            } else {
                $objLeave = new Base_Model_ObtorLib_App_Core_Employee_Dao_Leave();
                $objLeave->leave = $this->leave;
                return $objLeave->staffUpdateLeave();
            }
        } catch (Exception $ex) {
            throw new Base_Model_ObtorLib_App_Core_Employee_Exception($ex);
        }
    }

    /*
     * Delete leave
     * @return      : Integer ID / Null
     */

    public function deleteLeave() {
        try {
            if (!($this->leave instanceof Base_Model_ObtorLib_App_Core_Employee_Entity_Leave)) {
                throw new Base_Model_ObtorLib_App_Core_Employee_Exception(" Leave Entity not initialized");
            } else {
                $objLeave = new Base_Model_ObtorLib_App_Core_Employee_Dao_Leave();
                $objLeave->leave = $this->leave;
                return $objLeave->deleteLeave();
            }
        } catch (Exception $ex) {
            throw new Base_Model_ObtorLib_App_Core_Employee_Exception($ex);
        }
    }

    /*
     * Search leaves....
     * @return : Array of Leaves Entities...
     */

    public function search() {
        try {
            if (!($this->leave instanceof Base_Model_ObtorLib_App_Core_Employee_Entity_Leave)) {
                throw new Base_Model_ObtorLib_App_Core_Employee_Exception(" Leave Entity not initialized");
            } else {
                $objLeave = new Base_Model_ObtorLib_App_Core_Employee_Dao_Leave();
                $objLeave->leave = $this->leave;
                return $objLeave->search();
            }
        } catch (Exception $ex) {
            throw new Base_Model_ObtorLib_App_Core_Employee_Exception($ex);
        }
    }
    
    
        /*
     * Update leave
     * @return      : Integer ID / Null
     */

    public function updateFromToLeave() {
        try {
            if (!($this->leave instanceof Base_Model_ObtorLib_App_Core_Employee_Entity_Leave)) {
                throw new Base_Model_ObtorLib_App_Core_Employee_Exception(" Leave Entity not initialized");
            } else {
                $objLeave = new Base_Model_ObtorLib_App_Core_Employee_Dao_Leave();
                $objLeave->leave = $this->leave;
                return $objLeave->updateFromToLeave();
            }
        } catch (Exception $ex) {
            throw new Base_Model_ObtorLib_App_Core_Employee_Exception($ex);
        }
    }

}