<?php
/**
 * Created by PhpStorm.
 * User: ism-apac
 * Date: 8/7/14
 * Time: 3:26 PM
 */

class Base_Model_ObtorLib_App_Core_Employee_Entity_StaffAttendanceReportRow {

    private $dateOn;
    private $weekDay;
    private $inTime;
    private $outTime;
    private $otherInOut;
    private $isLate;
    private $earlyOff;
    private $onLeave;
    private $officeHoliday;
    private $expectedWorkDay;
    private $attendanceStatus;
    private $countedWorkingDay;
    private $countedExtraWorkingHrs;
    private $approvedExtraWorkingHrs;
    
    public function getDateOn() {
        return $this->dateOn;
    }

    public function getWeekDay() {
        return $this->weekDay;
    }

    public function getInTime() {
        return $this->inTime;
    }

    public function getOutTime() {
        return $this->outTime;
    }

    public function getOtherInOut() {
        return $this->otherInOut;
    }

    public function getIsLate() {
        return $this->isLate;
    }

    public function getEarlyOff() {
        return $this->earlyOff;
    }

    public function getOnLeave() {
        return $this->onLeave;
    }

    public function getOfficeHoliday() {
        return $this->officeHoliday;
    }

    public function getExpectedWorkDay() {
        return $this->expectedWorkDay;
    }

    public function getAttendanceStatus() {
        return $this->attendanceStatus;
    }

    public function getCountedWorkingDay() {
        return $this->countedWorkingDay;
    }

    public function getCountedExtraWorkingHrs() {
        return $this->countedExtraWorkingHrs;
    }

    public function getApprovedExtraWorkingHrs() {
        return $this->approvedExtraWorkingHrs;
    }

    public function setDateOn($dateOn) {
        $this->dateOn = $dateOn;
    }

    public function setWeekDay($weekDay) {
        $this->weekDay = $weekDay;
    }

    public function setInTime($inTime) {
        $this->inTime = $inTime;
    }

    public function setOutTime($outTime) {
        $this->outTime = $outTime;
    }

    public function setOtherInOut($otherInOut) {
        $this->otherInOut = $otherInOut;
    }

    public function setIsLate($isLate) {
        $this->isLate = $isLate;
    }

    public function setEarlyOff($earlyOff) {
        $this->earlyOff = $earlyOff;
    }

    public function setOnLeave($onLeave) {
        $this->onLeave = $onLeave;
    }

    public function setOfficeHoliday($officeHoliday) {
        $this->officeHoliday = $officeHoliday;
    }

    public function setExpectedWorkDay($expectedWorkDay) {
        $this->expectedWorkDay = $expectedWorkDay;
    }

    public function setAttendanceStatus($attendanceStatus) {
        $this->attendanceStatus = $attendanceStatus;
    }

    public function setCountedWorkingDay($countedWorkingDay) {
        $this->countedWorkingDay = $countedWorkingDay;
    }

    public function setCountedExtraWorkingHrs($countedExtraWorkingHrs) {
        $this->countedExtraWorkingHrs = $countedExtraWorkingHrs;
    }

    public function setApprovedExtraWorkingHrs($approvedExtraWorkingHrs) {
        $this->approvedExtraWorkingHrs = $approvedExtraWorkingHrs;
    }




}