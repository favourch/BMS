<?php
/**
 * Created by PhpStorm.
 * Employee: ism-apac
 * Date: 8/7/14
 * Time: 3:26 PM
 */

class Base_Model_ObtorLib_App_Core_Employee_Dao_Attendance extends Zend_Db_Table_Abstract {

    //put your code here
    public $attendance;
    protected $_name = 'tbl_attendance';

    /*
     * Get a user employee using id
     * @return      : Entity Employee Object (Base_Model_ObtorLib_App_Core_Employee_Entity_Attendance)
     */

    public function getAttendance($id) {
        try {
            $id = (int) $id;
            $row = $this->fetchRow('id = ' . $id);
            if ($row) {
                $attendanceRow = $row->toArray();
                $attendanceEntity = new Base_Model_ObtorLib_App_Core_Employee_Entity_Attendance();
                $attendanceEntity->setId($attendanceRow['id']);
                $attendanceEntity->setDateOn($attendanceRow['date_on']);
                $attendanceEntity->setIsWorkingDay($attendanceRow['is_working_day']);
                $attendanceEntity->setScheduledOnTime($attendanceRow['scheduled_on_time']);
                $attendanceEntity->setScheduledOffTime($attendanceRow['scheduled_off_time']);
                $attendanceEntity->setAttendanceInTime($attendanceRow['attendance_in_time']);
                $attendanceEntity->setAttendanceOutTime($attendanceRow['attendance_out_time']);
                $attendanceEntity->setIsLate($attendanceRow['is_late']);
                $attendanceEntity->setIsEarlyOff($attendanceRow['is_early_off']);
                $attendanceEntity->setOtherInOut($attendanceRow['other_in_out']);
                $attendanceEntity->setRemarks($attendanceRow['remarks']);
                $attendanceEntity->setInTimeFpSerial($attendanceRow['in_time_fp_serial']);
                $attendanceEntity->setOutTimeFpSerial($attendanceRow['out_time_fp_serial']);
                $attendanceEntity->setInTimeStatusExempted($attendanceRow['in_time_status_exempted']);
                $attendanceEntity->setOutTimeStatusExempted($attendanceRow['out_time_status_exempted']);
                $attendanceEntity->setInTimeExecused($attendanceRow['in_time_execused']);
                $attendanceEntity->setOutTimeExecused($attendanceRow['out_time_execused']);
                $attendanceEntity->setInTimeDifferentMin($attendanceRow['in_time_different_min']);
                $attendanceEntity->setOutTimeDifferentMin($attendanceRow['out_time_different_min']);
                $attendanceEntity->setInTimeDifferentMinType($attendanceRow['in_time_different_min_type']);
                $attendanceEntity->setOutTimeDifferentMinType($attendanceRow['out_time_different_min_type']);
                $attendanceEntity->setIsOnLeave($attendanceRow['is_on_leave']);
                $attendanceEntity->setCountedWorkingDay($attendanceRow['counted_working_day']);
                $attendanceEntity->setExtraWorkingHrs($attendanceRow['extra_working_hrs']);
                $attendanceEntity->setExtraWorkingHrsApproved($attendanceRow['extra_working_hrs_approved']);
                $attendanceEntity->setApprovedExtraWorkingHrs($attendanceRow['approved_extra_working_hrs']);
                $attendanceEntity->setIsPaidForExtraHrs($attendanceRow['is_paid_for_extra_hrs']);
                $attendanceEntity->setManuallyAddedOrEdited($attendanceRow['manually_added_or_edited']);
                $attendanceEntity->setEmployee($attendanceRow['tbl_employee_id']);
                $attendanceEntity->setEmployeeType($attendanceRow['employee_type']);
                $attendanceEntity->setExpectedWorkingHrsDay($attendanceRow['expected_working_hrs_day']);
                return $attendanceEntity;
            } else {
                return null;
            }
        } catch (Exception $ex) {
            throw new Base_Model_ObtorLib_App_Core_Employee_Exception($ex);
        }
    }


    /*
     * Add Attendance
     * @return      : Integer ID / Null
     */

    public function addAttendance() {
        try {
            if (!($this->attendance instanceof Base_Model_ObtorLib_App_Core_Employee_Entity_Attendance)) {
                throw new Base_Model_ObtorLib_App_Core_Employee_Exception(" Attendance Entity not initialized");
            } else {
                $data = array(
                    'date_on' => $this->attendance->getDateOn(),
                    'is_working_day' => $this->attendance->getIsWorkingDay(),
                    'scheduled_on_time' => $this->attendance->getScheduledOnTime(),
                    'scheduled_off_time' => $this->attendance->getScheduledOffTime(),
                    'attendance_in_time' => $this->attendance->getAttendanceInTime(),
                    'attendance_out_time' => $this->attendance->getAttendanceOutTime(),
                    'is_late' => $this->attendance->getIsLate(),
                    'is_early_off' => $this->attendance->getIsEarlyOff(),
                    'other_in_out' => $this->attendance->getOtherInOut(),
                    'remarks' => $this->attendance->getRemarks(),
                    'in_time_fp_serial' => $this->attendance->getInTimeFpSerial(),
                    'out_time_fp_serial' => $this->attendance->getOutTimeFpSerial(),
                    'in_time_status_exempted' => $this->attendance->getInTimeStatusExempted(),
                    'out_time_status_exempted' => $this->attendance->getOutTimeStatusExempted(),
                    'in_time_execused' => $this->attendance->getInTimeExecused(),
                    'out_time_execused' => $this->attendance->getOutTimeExecused(),
                    'in_time_different_min' => $this->attendance->getInTimeDifferentMin(),
                    'out_time_different_min' => $this->attendance->getOutTimeDifferentMin(),
                    'in_time_different_min_type' => $this->attendance->getInTimeDifferentMinType(),
                    'out_time_different_min_type' => $this->attendance->getOutTimeDifferentMinType(),
                    'is_on_leave' => $this->attendance->getIsOnLeave(),
                    'counted_working_day' => $this->attendance->getCountedWorkingDay(),
                    'extra_working_hrs' => $this->attendance->getExtraWorkingHrs(),
                    'extra_working_hrs_approved' => $this->attendance->getExtraWorkingHrsApproved(),
                    'approved_extra_working_hrs' => $this->attendance->getApprovedExtraWorkingHrs(),
                    'is_paid_for_extra_hrs' => $this->attendance->getIsPaidForExtraHrs(),
                    'manually_added_or_edited' => $this->attendance->getManuallyAddedOrEdited(),
                    'tbl_employee_id' => $this->attendance->getEmployee());
                $last_inserted_id = $this->insert($data);
                return $last_inserted_id;
            }
        } catch (Exception $ex) {
            throw new Base_Model_ObtorLib_App_Core_Employee_Exception($ex);
        }
    }

    /*
     * Update Attendance
     * @return      : Boolean true/false
     */

    public function updateAttendance() {
        try {
            if (!($this->attendance instanceof Base_Model_ObtorLib_App_Core_Employee_Entity_Attendance)) {
                throw new Base_Model_ObtorLib_App_Core_Employee_Exception(" Attendance Entity not initialized");
            } else {
              $data = array('other_in_out' => $this->attendance->getOtherInOut(),
                    'remarks' => $this->attendance->getRemarks(),
                    'in_time_fp_serial' => $this->attendance->getInTimeFpSerial(),
                    'out_time_fp_serial' => $this->attendance->getOutTimeFpSerial(),
                    'in_time_execused' => $this->attendance->getInTimeExecused(),
                    'out_time_execused' => $this->attendance->getOutTimeExecused(),
                    'extra_working_hrs_approved' => $this->attendance->getExtraWorkingHrsApproved(),
                    'approved_extra_working_hrs' => $this->attendance->getApprovedExtraWorkingHrs(),
                    'is_paid_for_extra_hrs' => $this->attendance->getIsPaidForExtraHrs());
                return $this->update($data, 'id = ' . (int) $this->attendance->getId());
            }
        } catch (Exception $ex) {
            throw new Base_Model_ObtorLib_App_Core_Employee_Exception($ex);
        }
    }
    
    
    
     /*
     * Update Attendance
     * @return      : Boolean true/false
     */

    public function completeUpdateAttendance() {
        try {
            if (!($this->attendance instanceof Base_Model_ObtorLib_App_Core_Employee_Entity_Attendance)) {
                throw new Base_Model_ObtorLib_App_Core_Employee_Exception(" Attendance Entity not initialized");
            } else {
              $data = array(
                    'date_on' => $this->attendance->getDateOn(),
                    'is_working_day' => $this->attendance->getIsWorkingDay(),
                    'scheduled_on_time' => $this->attendance->getScheduledOnTime(),
                    'scheduled_off_time' => $this->attendance->getScheduledOffTime(),
                    'attendance_in_time' => $this->attendance->getAttendanceInTime(),
                    'attendance_out_time' => $this->attendance->getAttendanceOutTime(),
                    'is_late' => $this->attendance->getIsLate(),
                    'is_early_off' => $this->attendance->getIsEarlyOff(),
                    'other_in_out' => $this->attendance->getOtherInOut(),
                    'remarks' => $this->attendance->getRemarks(),
                    'in_time_fp_serial' => $this->attendance->getInTimeFpSerial(),
                    'out_time_fp_serial' => $this->attendance->getOutTimeFpSerial(),
                    'in_time_status_exempted' => $this->attendance->getInTimeStatusExempted(),
                    'out_time_status_exempted' => $this->attendance->getOutTimeStatusExempted(),
                    'in_time_execused' => $this->attendance->getInTimeExecused(),
                    'out_time_execused' => $this->attendance->getOutTimeExecused(),
                    'in_time_different_min' => $this->attendance->getInTimeDifferentMin(),
                    'out_time_different_min' => $this->attendance->getOutTimeDifferentMin(),
                    'in_time_different_min_type' => $this->attendance->getInTimeDifferentMinType(),
                    'out_time_different_min_type' => $this->attendance->getOutTimeDifferentMinType(),
                    'is_on_leave' => $this->attendance->getIsOnLeave(),
                    'counted_working_day' => $this->attendance->getCountedWorkingDay(),
                    'extra_working_hrs' => $this->attendance->getExtraWorkingHrs(),
                    'extra_working_hrs_approved' => $this->attendance->getExtraWorkingHrsApproved(),
                    'approved_extra_working_hrs' => $this->attendance->getApprovedExtraWorkingHrs(),
                    'is_paid_for_extra_hrs' => $this->attendance->getIsPaidForExtraHrs(),
                    'manually_added_or_edited' => $this->attendance->getManuallyAddedOrEdited(),
                    'tbl_employee_id' => $this->attendance->getEmployee());
                return $this->update($data, 'id = ' . (int) $this->attendance->getId());
            }
        } catch (Exception $ex) {
            throw new Base_Model_ObtorLib_App_Core_Employee_Exception($ex);
        }
    }

    /*
     * Delete Attendance
     * @return      : Integer ID / Null
     */

    public function deleteAttendance() {
        try {
            if (!($this->attendance instanceof Base_Model_ObtorLib_App_Core_Employee_Entity_Attendance)) {
                throw new Base_Model_ObtorLib_App_Core_Employee_Exception(" Attendance Entity not initialized");
            } else {
                return $this->delete('id =' . (int) $this->attendance->getId());
            }
        } catch (Exception $ex) {
            throw new Base_Model_ObtorLib_App_Core_Employee_Exception($ex);
        }
    }

    /*
     * Search attendance....
     * @return : Array of Attendance Entities...
     */

    public function search($limit = NULL) {
        try {
            if (!($this->attendance instanceof Base_Model_ObtorLib_App_Core_Employee_Entity_Attendance)) {
                throw new Base_Model_ObtorLib_App_Core_Employee_Exception(" Attendance Entity not initialized");
            } else {
                $arrWhere = array();
                $arrAttendance = array();
                $employeeId         = $this->attendance->getEmployee();
                $reportFromDate     = $this->attendance->getReportFromDate();
                $reportToDate       = $this->attendance->getReportToDate();
                $reportOnDate       = $this->attendance->getDateOn();
                
                
                
                $attendanceSql = "SELECT id FROM tbl_attendance ";
                if ($employeeId) {
                    array_push($arrWhere, "tbl_employee_id = '" . $employeeId . "'");
                }
                
                if ($reportOnDate) {
                    array_push($arrWhere, "date_on = '" . $reportOnDate . "'");
                }
                
                 if ($reportFromDate != "" && $reportToDate != "") {
                    array_push($arrWhere, "date_on BETWEEN '" . $reportFromDate . "' AND '".$reportToDate."'");
                }

                if (count($arrWhere) > 0) {
                    $attendanceSql.= "WHERE " . implode($arrWhere);
                }
                
                if(!is_null($limit)){
                    $attendanceSql = $attendanceSql." ORDER BY id DESC";    
                    $attendanceSql = $attendanceSql.$limit;
                }
                //print($attendanceSql);exit;

                $db = Zend_Db_Table_Abstract::getDefaultAdapter();
                $result = $db->fetchCol($attendanceSql);
                foreach ($result as $attendanceId) {
                    $attendanceIdInfo = $this->getAttendance($attendanceId);
                    array_push($arrAttendance, $attendanceIdInfo);
                }
                return $arrAttendance;
            }
        } catch (Exception $ex) {
            throw new Base_Model_ObtorLib_App_Core_Employee_Exception($ex);
        }
    }
    
    
    public function getAttendanceByDateAndStaffId($dateOn,$staffId){
        try{
            
                $dbDefaultAdapter = Zend_Db_Table_Abstract::getDefaultAdapter();
                $sql_get_attendance_records = "SELECT id FROM tbl_attendance WHERE date_on = '" . $dateOn . "' AND tbl_employee_id = '" . $staffId . "'"; // the tbl_employee_id is the unique id in the employee table
                $result_attendance_records = $dbDefaultAdapter->fetchRow($sql_get_attendance_records);
                $attendanceId = $result_attendance_records['id'];
                $attendanceIdInfo = $this->getAttendance($attendanceId);
                return $attendanceIdInfo;
            
        } catch (Exception $ex) {
            throw new Base_Model_ObtorLib_App_Core_Employee_Exception($ex);
        }
    }

}