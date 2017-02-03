<?php
/**
 * Created by PhpStorm.
 * Employee: ism-apac
 * Date: 8/7/14
 * Time: 3:26 PM
 */

class Base_Model_ObtorLib_App_Core_Employee_Service_LeaveDay  extends Base_Model_ObtorLib_Eav_Model_Service {

    public $leaveDay;

    /*
     * Get a leaveDay using id
     * @return      : Entity LeaveDay Object (Base_Model_ObtorLib_App_Core_Employee_Entity_LeaveDay)
     */

    public function getLeaveDay($id) {
        try {
            $objLeaveDay = new Base_Model_ObtorLib_App_Core_Employee_Dao_LeaveDay();
            $leaveDay = $objLeaveDay->getLeaveDay($id);
            return $leaveDay;
        } catch (Exception $e) {
            throw new Base_Model_ObtorLib_App_Core_Employee_Exception($e);
        }
    }

    /*
     * Add new leaveDay
     * @return      : Integer ID / Null
     */

    public function addLeaveDay() {
        try {
            if (!($this->leaveDay instanceof Base_Model_ObtorLib_App_Core_Employee_Entity_LeaveDay)) {
                throw new Base_Model_ObtorLib_App_Core_Employee_Exception(" LeaveDay Entity not initialized");
            } else {
                $objLeaveDay = new Base_Model_ObtorLib_App_Core_Employee_Dao_LeaveDay();
                $objLeaveDay->leaveDay = $this->leaveDay;
                return $objLeaveDay->addLeaveDay();
            }
        } catch (Exception $ex) {
            throw new Base_Model_ObtorLib_App_Core_Employee_Exception($ex);
        }
    }

    /*
     * Update leaveDay
     * @return      : Integer ID / Null
     */

    public function updateLeaveDay() {
        try {
            if (!($this->leaveDay instanceof Base_Model_ObtorLib_App_Core_Employee_Entity_LeaveDay)) {
                throw new Base_Model_ObtorLib_App_Core_Employee_Exception(" LeaveDay Entity not initialized");
            } else {
                $objLeaveDay = new Base_Model_ObtorLib_App_Core_Employee_Dao_LeaveDay();
                $objLeaveDay->leaveDay = $this->leaveDay;
                return $objLeaveDay->updateLeaveDay();
            }
        } catch (Exception $ex) {
            throw new Base_Model_ObtorLib_App_Core_Employee_Exception($ex);
        }
    }

    /*
     * Delete leaveDay
     * @return      : Integer ID / Null
     */

    public function deleteLeaveDay() {
        try {
            if (!($this->leaveDay instanceof Base_Model_ObtorLib_App_Core_Employee_Entity_LeaveDay)) {
                throw new Base_Model_ObtorLib_App_Core_Employee_Exception(" LeaveDay Entity not initialized");
            } else {
                $objLeaveDay = new Base_Model_ObtorLib_App_Core_Employee_Dao_LeaveDay();
                $objLeaveDay->leaveDay = $this->leaveDay;
                return $objLeaveDay->deleteLeaveDay();
            }
        } catch (Exception $ex) {
            throw new Base_Model_ObtorLib_App_Core_Employee_Exception($ex);
        }
    }

    /*
     * Search leaveDays....
     * @return : Array of LeaveDays Entities...
     */

    public function search() {
        try {
            if (!($this->leaveDay instanceof Base_Model_ObtorLib_App_Core_Employee_Entity_LeaveDay)) {
                throw new Base_Model_ObtorLib_App_Core_Employee_Exception(" LeaveDay Entity not initialized");
            } else {
                $objLeaveDay = new Base_Model_ObtorLib_App_Core_Employee_Dao_LeaveDay();
                $objLeaveDay->leaveDay = $this->leaveDay;
                return $objLeaveDay->search();
            }
        } catch (Exception $ex) {
            throw new Base_Model_ObtorLib_App_Core_Employee_Exception($ex);
        }
    }
    
    
    /*
     * Search leaveDays....
     * @return : Array of LeaveDays Entities...
     */

    public function searchCount() {
        try {
            if (!($this->leaveDay instanceof Base_Model_ObtorLib_App_Core_Employee_Entity_LeaveDay)) {
                throw new Base_Model_ObtorLib_App_Core_Employee_Exception(" LeaveDay Entity not initialized");
            } else {
                $objLeaveDay = new Base_Model_ObtorLib_App_Core_Employee_Dao_LeaveDay();
                $objLeaveDay->leaveDay = $this->leaveDay;
                return $objLeaveDay->searchCount();
            }
        } catch (Exception $ex) {
            throw new Base_Model_ObtorLib_App_Core_Employee_Exception($ex);
        }
    }

}