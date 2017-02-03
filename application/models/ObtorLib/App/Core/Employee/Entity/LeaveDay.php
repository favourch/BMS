<?php
/**
 * Created by PhpStorm.
 * User: ism-apac
 * Date: 8/7/14
 * Time: 3:26 PM
 */

class Base_Model_ObtorLib_App_Core_Employee_Entity_LeaveDay {

    private $id;
    private $leaveDate;
    private $leaveType;
    private $leaveTimeFrom;
    private $leaveTimeTo;
    private $employeeLeave;
    private $employeeId;
    
    public function getId() {
        return $this->id;
    }

    public function getLeaveDate() {
        return $this->leaveDate;
    }

    public function getLeaveType() {
        return $this->leaveType;
    }

    public function getLeaveTimeFrom() {
        return $this->leaveTimeFrom;
    }

    public function getLeaveTimeTo() {
        return $this->leaveTimeTo;
    }

    public function getEmployeeLeave() {
        return $this->employeeLeave;
    }

    public function getEmployeeId() {
        return $this->employeeId;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function setLeaveDate($leaveDate) {
        $this->leaveDate = $leaveDate;
    }

    public function setLeaveType($leaveType) {
        $this->leaveType = $leaveType;
    }

    public function setLeaveTimeFrom($leaveTimeFrom) {
        $this->leaveTimeFrom = $leaveTimeFrom;
    }

    public function setLeaveTimeTo($leaveTimeTo) {
        $this->leaveTimeTo = $leaveTimeTo;
    }

    public function setEmployeeLeave($employeeLeave) {
        $this->employeeLeave = $employeeLeave;
    }

    public function setEmployeeId($employeeId) {
        $this->employeeId = $employeeId;
    }


}