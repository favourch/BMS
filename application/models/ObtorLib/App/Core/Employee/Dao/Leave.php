<?php
/**
 * Created by PhpStorm.
 * Employee: ism-apac
 * Date: 8/7/14
 * Time: 3:26 PM
 */

class Base_Model_ObtorLib_App_Core_Employee_Dao_Leave extends Zend_Db_Table_Abstract {

    //put your code here
    public $leave;
    protected $_name = 'tbl_employee_leave';

    /*
     * Get a user employee using id
     * @return      : Entity Employee Object (Base_Model_ObtorLib_App_Core_Employee_Entity_Leave)
     */

    public function getLeave($id) {
        try {
            $id = (int) $id;
            $row = $this->fetchRow('id = ' . $id);
            if ($row) {
                $leaveRow = $row->toArray();
                $leaveEntity = new Base_Model_ObtorLib_App_Core_Employee_Entity_Leave();
                $leaveEntity->setId($leaveRow['id']);
                $leaveEntity->setEmployee($leaveRow['employee_id']);
                $leaveEntity->setNoOfDaysLeave($leaveRow['no_of_days_leave']);
                $leaveEntity->setReason($leaveRow['reason']);
                $leaveEntity->setActingStaffId($leaveRow['acting_staff_id']);
                $leaveEntity->setWorkAreaToBeCovered($leaveRow['work_area_to_be_covered']);
                $leaveEntity->setActingStaffSignature($leaveRow['acting_staff_signature']);
                $leaveEntity->setActingStaffRemarks($leaveRow['acting_staff_remarks']);
                $leaveEntity->setActingStaffSignatureDate($leaveRow['acting_staff_signature_date']);
                $leaveEntity->setSupervisorSignature($leaveRow['supervisor_signature']);
                $leaveEntity->setSupervisorRemarks($leaveRow['supervisor_remarks']);
                $leaveEntity->setSupervisorSignatureDate($leaveRow['supervisor_signature_date']);
                $leaveEntity->setSupervisorEmployeeId($leaveRow['supervisor_employee_id']);
                $leaveEntity->setManagerSignature($leaveRow['manager_signature']);
                $leaveEntity->setManagerRemarks($leaveRow['manager_remarks']);
                $leaveEntity->setManagerSignatureDate($leaveRow['manager_signature_date']);
                $leaveEntity->setManagerEmployeeId($leaveRow['manager_employee_id']);
                $leaveEntity->setAppStatus($leaveRow['app_status']);
                $leaveEntity->setIsApprovedByAdmin($leaveRow['is_approved_by_admin']);
                $leaveEntity->setAdminInfo($leaveRow['admin_id']);
                $leaveEntity->setAdminSignatureDate($leaveRow['admin_signature_date']);
                $leaveEntity->setAdminRemarks($leaveRow['admin_remarks']);
                $leaveEntity->setLastUpdatedDate($leaveRow['last_updated_date']);
                $leaveEntity->setLastUpdatedBy($leaveRow['last_updated_by']);
                $leaveEntity->setAddedBy($leaveRow['added_by_id']);
                $leaveEntity->setAddedOn($leaveRow['added_on']);
                $leaveEntity->setFromDate($leaveRow['from_date']);
                $leaveEntity->setToDate($leaveRow['to_date']);
                
                $leaveDayService = new Base_Model_ObtorLib_App_Core_Employee_Service_LeaveDay();
                $leaveDayEntity = new Base_Model_ObtorLib_App_Core_Employee_Entity_LeaveDay();
                $leaveDayEntity->setEmployeeLeave($leaveRow['id']);
                $leaveDayService->leaveDay = $leaveDayEntity;
                $leaveDays = $leaveDayService->search();
                $leaveEntity->setLeaveDays($leaveDays);
                return $leaveEntity;
            } else {
                return null;
            }
        } catch (Exception $ex) {
            throw new Base_Model_ObtorLib_App_Core_Employee_Exception($ex);
        }
    }


    /*
     * Add Leave
     * @return      : Integer ID / Null
     */

    public function addLeave() {
        try {
            if (!($this->leave instanceof Base_Model_ObtorLib_App_Core_Employee_Entity_Leave)) {
                throw new Base_Model_ObtorLib_App_Core_Employee_Exception(" Leave Entity not initialized");
            } else {
                $data = array(
                    'employee_id'=>$this->leave->getEmployee(),
                    'no_of_days_leave' => $this->leave->getNoOfDaysLeave(),
                    'reason' => $this->leave->getReason(),
                    'acting_staff_id' => $this->leave->getActingStaffId(),
                    'work_area_to_be_covered' => $this->leave->getWorkAreaToBeCovered(),
                    'acting_staff_signature' => $this->leave->getActingStaffSignature(),
                    'acting_staff_remarks' => $this->leave->getActingStaffRemarks(),
                    'acting_staff_signature_date' => $this->leave->getActingStaffSignatureDate(),
                    'supervisor_signature' => $this->leave->getSupervisorSignature(),
                    'supervisor_remarks' => $this->leave->getSupervisorRemarks(),
                    'supervisor_signature_date' => $this->leave->getSupervisorSignatureDate(),
                    'supervisor_employee_id' => $this->leave->getSupervisorEmployeeId(),
                    'manager_signature' => $this->leave->getManagerSignature(),
                    'manager_remarks' => $this->leave->getManagerRemarks(),
                    'manager_signature_date' => $this->leave->getManagerSignatureDate(),
                    'manager_employee_id' => $this->leave->getManagerEmployeeId(),
                    'app_status' => $this->leave->getAppStatus(),
                    'is_approved_by_admin' => $this->leave->getIsApprovedByAdmin(),
                    'admin_id' => $this->leave->getAdminInfo(),
                    'admin_signature_date' => $this->leave->getAdminSignatureDate(),
                    'admin_remarks' => $this->leave->getAdminRemarks(),
                    'last_updated_date' => $this->leave->getLastUpdatedDate(),
                    'last_updated_by' => $this->leave->getLastUpdatedBy(),
                    'added_by_id' => $this->leave->getAddedBy(),
                    'added_on' => $this->leave->getAddedOn(),
                    'from_date' => $this->leave->getFromDate(),
                    'to_date' => $this->leave->getToDate());
                
                $last_inserted_id = $this->insert($data);
                return $last_inserted_id;
            }
        } catch (Exception $ex) {
            throw new Base_Model_ObtorLib_App_Core_Employee_Exception($ex);
        }
    }

    /*
     * Update Leave
     * @return      : Boolean true/false
     */

    public function updateLeave() {
        try {
            if (!($this->leave instanceof Base_Model_ObtorLib_App_Core_Employee_Entity_Leave)) {
                throw new Base_Model_ObtorLib_App_Core_Employee_Exception(" Leave Entity not initialized");
            } else {
                 $data = array(
                     'employee_id'=>$this->leave->getEmployee(),
                    'no_of_days_leave' => $this->leave->getNoOfDaysLeave(),
                    'reason' => $this->leave->getReason(),
                    'acting_staff_id' => $this->leave->getActingStaffId(),
                    'work_area_to_be_covered' => $this->leave->getWorkAreaToBeCovered(),
                    'acting_staff_signature' => $this->leave->getActingStaffSignature(),
                    'acting_staff_remarks' => $this->leave->getActingStaffRemarks(),
                    'acting_staff_signature_date' => $this->leave->getActingStaffSignatureDate(),
                    'supervisor_signature' => $this->leave->getSupervisorSignature(),
                    'supervisor_remarks' => $this->leave->getSupervisorRemarks(),
                    'supervisor_signature_date' => $this->leave->getSupervisorSignatureDate(),
                    'supervisor_employee_id' => $this->leave->getSupervisorEmployeeId(),
                    'manager_signature' => $this->leave->getManagerSignature(),
                    'manager_remarks' => $this->leave->getManagerRemarks(),
                    'manager_signature_date' => $this->leave->getManagerSignatureDate(),
                    'manager_employee_id' => $this->leave->getManagerEmployeeId(),
                    'app_status' => $this->leave->getAppStatus(),
                    'is_approved_by_admin' => $this->leave->getIsApprovedByAdmin(),
                    'admin_id' => $this->leave->getAdminInfo(),
                    'admin_signature_date' => $this->leave->getAdminSignatureDate(),
                    'admin_remarks' => $this->leave->getAdminRemarks(),
                    'last_updated_date' => $this->leave->getLastUpdatedDate(),
                    'last_updated_by' => $this->leave->getLastUpdatedBy(),
                    'from_date' => $this->leave->getFromDate(),
                    'to_date' => $this->leave->getToDate());
                return $this->update($data, 'id = ' . (int) $this->leave->getId());
            }
        } catch (Exception $ex) {
            throw new Base_Model_ObtorLib_App_Core_Employee_Exception($ex);
        }
    }
    
    
     /*
     * Update Leave
     * @return      : Boolean true/false
     */

    public function staffUpdateLeave() {
        try {
            if (!($this->leave instanceof Base_Model_ObtorLib_App_Core_Employee_Entity_Leave)) {
                throw new Base_Model_ObtorLib_App_Core_Employee_Exception(" Leave Entity not initialized");
            } else {
                 $data = array(
                    'employee_id'=>$this->leave->getEmployee(),
                    'no_of_days_leave' => $this->leave->getNoOfDaysLeave(),
                    'reason' => $this->leave->getReason(),
                    'acting_staff_id' => $this->leave->getActingStaffId(),
                    'work_area_to_be_covered' => $this->leave->getWorkAreaToBeCovered(),
                    'from_date' => $this->leave->getFromDate(),
                    'to_date' => $this->leave->getToDate());
                return $this->update($data, 'id = ' . (int) $this->leave->getId());
            }
        } catch (Exception $ex) {
            throw new Base_Model_ObtorLib_App_Core_Employee_Exception($ex);
        }
    }
    
    

    /*
     * Delete Leave
     * @return      : Integer ID / Null
     */

    public function deleteLeave() {
        try {
            if (!($this->leave instanceof Base_Model_ObtorLib_App_Core_Employee_Entity_Leave)) {
                throw new Base_Model_ObtorLib_App_Core_Employee_Exception(" Leave Entity not initialized");
            } else {
                return $this->delete('id =' . (int) $this->leave->getId());
            }
        } catch (Exception $ex) {
            throw new Base_Model_ObtorLib_App_Core_Employee_Exception($ex);
        }
    }

    /*
     * Search leave....
     * @return : Array of Leave Entities...
     */

    public function search() {
        try {
            if (!($this->leave instanceof Base_Model_ObtorLib_App_Core_Employee_Entity_Leave)) {
                throw new Base_Model_ObtorLib_App_Core_Employee_Exception(" Leave Entity not initialized");
            } else {
                $arrWhere = array();
                $arrLeave = array();
                $employee = $this->leave->getEmployee();
                
                $leaveAppStatus = $this->leave->getAppStatus();
                $leaveFromDate = $this->leave->getFromDate();
                $leaveToDate = $this->leave->getToDate();
                
                
                $leaveSql = "SELECT id FROM tbl_employee_leave ";
                if ($employee) {
                    array_push($arrWhere, "employee_id = '" . $employee . "'");
                }
                
                if ($leaveAppStatus) {
                    array_push($arrWhere, "app_status = '" . $leaveAppStatus . "'");
                }
                
                if($leaveFromDate != "" && $leaveToDate != ""){
                    array_push($arrWhere, "from_date >= '" . $leaveFromDate . "' AND to_date <= '" . $leaveToDate . "'");
                }
                

                if (count($arrWhere) > 0) {
                     $leaveSql.= "WHERE " . implode(' AND ',$arrWhere);
                }

                $db = Zend_Db_Table_Abstract::getDefaultAdapter();
                $result = $db->fetchCol( $leaveSql);
                foreach ($result as $leaveId) {
                    $leaveIdInfo = $this->getLeave($leaveId);
                    array_push($arrLeave, $leaveIdInfo);
                }
                return $arrLeave;
            }
        } catch (Exception $ex) {
            throw new Base_Model_ObtorLib_App_Core_Employee_Exception($ex);
        }
    }
    
        /*
     * Update updateFromToLeave
     * @return      : Boolean true/false
     */

    public function updateFromToLeave() {
        try {
            if (!($this->leave instanceof Base_Model_ObtorLib_App_Core_Employee_Entity_Leave)) {
                throw new Base_Model_ObtorLib_App_Core_Employee_Exception(" Leave Entity not initialized");
            } else {
                 $data = array('from_date' => $this->leave->getFromDate(),
                    'to_date' => $this->leave->getToDate());
                 
                return $this->update($data, 'id = ' . (int) $this->leave->getId());
            }
        } catch (Exception $ex) {
            throw new Base_Model_ObtorLib_App_Core_Employee_Exception($ex);
        }
    }

}