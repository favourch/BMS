<?php
/**
 * Created by PhpStorm.
 * Employee: ism-apac
 * Date: 8/7/14
 * Time: 3:26 PM
 */

class Base_Model_ObtorLib_App_Core_Employee_Dao_LeaveDay extends Zend_Db_Table_Abstract {

    //put your code here
    public $leaveDay;
    protected $_name = 'tbl_employee_leave_days';

    /*
     * Get a user employee using id
     * @return      : Entity Employee Object (Base_Model_ObtorLib_App_Core_Employee_Entity_LeaveDay)
     */

    public function getLeaveDay($id) {
        try {
            $id = (int) $id;
            $row = $this->fetchRow('id = ' . $id);
            if ($row) {
                $leaveDayRow = $row->toArray();
                $leaveDayDayEntity = new Base_Model_ObtorLib_App_Core_Employee_Entity_LeaveDay();
                $leaveDayDayEntity->setId($leaveDayRow['id']);
                $leaveDayDayEntity->setLeaveDate($leaveDayRow['leave_date']);
                $leaveDayDayEntity->setLeaveType($leaveDayRow['leave_type']);
                $leaveDayDayEntity->setLeaveTimeFrom($leaveDayRow['leave_time_from']);
                $leaveDayDayEntity->setLeaveTimeTo($leaveDayRow['leave_time_to']);
                $leaveDayDayEntity->setEmployeeId($leaveDayRow['employee_id']);
                $leaveDayDayEntity->setEmployeeLeave($leaveDayRow['tbl_employee_leave_id']);
                return $leaveDayDayEntity;
            } else {
                return null;
            }
        } catch (Exception $ex) {
            throw new Base_Model_ObtorLib_App_Core_Employee_Exception($ex);
        }
    }


    /*
     * Add LeaveDay
     * @return      : Integer ID / Null
     */

    public function addLeaveDay() {
        try {
            if (!($this->leaveDay instanceof Base_Model_ObtorLib_App_Core_Employee_Entity_LeaveDay)) {
                throw new Base_Model_ObtorLib_App_Core_Employee_Exception(" LeaveDay Entity not initialized");
            } else {
                $data = array(
                    'leave_date'=>$this->leaveDay->getLeaveDate(),
                    'leave_type'=>$this->leaveDay->getLeaveType(),
                    'leave_time_from'=>$this->leaveDay->getLeaveTimeFrom(),
                    'leave_time_to'=>$this->leaveDay->getLeaveTimeTo(),
                    'tbl_employee_leave_id'=>$this->leaveDay->getEmployeeLeave(),
                    'employee_id'=>$this->leaveDay->getEmployeeId()
                    );
                
                $last_inserted_id = $this->insert($data);
                return $last_inserted_id;
            }
        } catch (Exception $ex) {
            throw new Base_Model_ObtorLib_App_Core_Employee_Exception($ex);
        }
    }

    /*
     * Update LeaveDay
     * @return      : Boolean true/false
     */

    public function updateLeaveDay() {
        try {
            if (!($this->leaveDay instanceof Base_Model_ObtorLib_App_Core_Employee_Entity_LeaveDay)) {
                throw new Base_Model_ObtorLib_App_Core_Employee_Exception(" LeaveDay Entity not initialized");
            } else {
                  $data = array(
                    'leave_date'=>$this->leaveDay->getLeaveDate(),
                    'leave_type'=>$this->leaveDay->getLeaveType(),
                    'leave_time_from'=>$this->leaveDay->getLeaveTimeFrom(),
                    'leave_time_to'=>$this->leaveDay->getLeaveTimeTo(),
                    'tbl_employee_leave_id'=>$this->leaveDay->getEmployeeLeave(),
                    'employee_id'=>$this->leaveDay->getEmployeeId()
                    );
                return $this->update($data, 'id = ' . (int) $this->leaveDay->getId());
            }
        } catch (Exception $ex) {
            throw new Base_Model_ObtorLib_App_Core_Employee_Exception($ex);
        }
    }

    /*
     * Delete LeaveDay
     * @return      : Integer ID / Null
     */

    public function deleteLeaveDay() {
        try {
            if (!($this->leaveDay instanceof Base_Model_ObtorLib_App_Core_Employee_Entity_LeaveDay)) {
                throw new Base_Model_ObtorLib_App_Core_Employee_Exception(" LeaveDay Entity not initialized");
            } else {
                return $this->delete('id =' . (int) $this->leaveDay->getId());
            }
        } catch (Exception $ex) {
            throw new Base_Model_ObtorLib_App_Core_Employee_Exception($ex);
        }
    }

    /*
     * Search leaveDay....
     * @return : Array of LeaveDay Entities...
     */

    public function search() {
        try {
            if (!($this->leaveDay instanceof Base_Model_ObtorLib_App_Core_Employee_Entity_LeaveDay)) {
                throw new Base_Model_ObtorLib_App_Core_Employee_Exception(" LeaveDay Entity not initialized");
            } else {
                $arrWhere = array();
                $arrLeaveDay = array();
                $employee = $this->leaveDay->getEmployeeId();
                $leaveDayDate = $this->leaveDay->getLeaveDate();
                $leaveDayId = $this->leaveDay->getEmployeeLeave();
                
                
                $leaveDaySql = "SELECT id FROM tbl_employee_leave_days ";
                
                if ($employee) {
                    array_push($arrWhere, "employee_id = '" . $employee . "'");
                }
                
                if ($leaveDayDate) {
                    array_push($arrWhere, "leave_date = '" . $leaveDayDate . "'");
                }
                
                if ($leaveDayId) {
                    array_push($arrWhere, "tbl_employee_leave_id = '" . $leaveDayId . "'");
                }
                
                

                if (count($arrWhere) > 0) {
                    $leaveDaySql.= "WHERE " . implode($arrWhere);
                }

                $db = Zend_Db_Table_Abstract::getDefaultAdapter();
                $result = $db->fetchCol( $leaveDaySql);
                foreach ($result as $leaveDayId) {
                    $leaveDayIdInfo = $this->getLeaveDay($leaveDayId);
                    array_push($arrLeaveDay, $leaveDayIdInfo);
                }
                return $arrLeaveDay;
            }
        } catch (Exception $ex) {
            throw new Base_Model_ObtorLib_App_Core_Employee_Exception($ex);
        }
    }
    
     /*
     * Search leaveDay....
     * @return : Array of LeaveDay Entities...
     */

    public function searchCount() {
        try {
            if (!($this->leaveDay instanceof Base_Model_ObtorLib_App_Core_Employee_Entity_LeaveDay)) {
                throw new Base_Model_ObtorLib_App_Core_Employee_Exception(" LeaveDay Entity not initialized");
            } else {
                $arrWhere = array();
                $total_number = 0;
                $employee = $this->leaveDay->getEmployeeId();
                $leaveDayDate = $this->leaveDay->getLeaveDate();
                $leaveDayId = $this->leaveDay->getEmployeeLeave();
                
                
                $leaveDaySql = "SELECT count(id) as tot FROM tbl_employee_leave_days ";
                
                if ($employee) {
                    array_push($arrWhere, "employee_id = '" . $employee . "'");
                }
                
                if ($leaveDayDate) {
                    array_push($arrWhere, "leave_date = '" . $leaveDayDate . "'");
                }
                
                if ($leaveDayId) {
                    array_push($arrWhere, "tbl_employee_leave_id = '" . $leaveDayId . "'");
                }
                
                

                if (count($arrWhere) > 0) {
                    $leaveDaySql.= "WHERE " . implode($arrWhere);
                }

                $db = Zend_Db_Table_Abstract::getDefaultAdapter();
                $result 	= $db->fetchRow($leaveDaySql);
                $total_number = $result['tot']; 
                return $total_number;
            }
        } catch (Exception $ex) {
            throw new Base_Model_ObtorLib_App_Core_Employee_Exception($ex);
        }
    }
    

}