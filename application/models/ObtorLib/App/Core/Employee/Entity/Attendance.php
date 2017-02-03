<?php
/**
 * Created by PhpStorm.
 * User: ism-apac
 * Date: 8/7/14
 * Time: 3:26 PM
 */

class Base_Model_ObtorLib_App_Core_Employee_Entity_Attendance {

    private $id;
    private $dateOn;
    private $isWorkingDay;
    private $scheduledOnTime;
    private $scheduledOffTime;
    private $attendanceInTime;
    private $attendanceOutTime;
    private $isLate;
    private $isEarlyOff;
    private $otherInOut;
    private $remarks;
    private $inTimeFpSerial;
    private $outTimeFpSerial;
    private $inTimeStatusExempted;
    private $outTimeStatusExempted;
    private $inTimeExecused;
    private $outTimeExecused;
    private $inTimeDifferentMin;
    private $outTimeDifferentMin;
    private $inTimeDifferentMinType;
    private $outTimeDifferentMinType;
    private $isOnLeave;
    private $countedWorkingDay;
    private $extraWorkingHrs;
    private $extraWorkingHrsApproved;
    private $approvedExtraWorkingHrs;
    private $isPaidForExtraHrs;
    private $manuallyAddedOrEdited;
    private $employee;
    private $employeeType;
    private $expectedWorkingHrsDay;
    
    
    // for search.....
    private $reportFromDate;
    private $reportToDate;
    

    /**
     * @param mixed $approvedExtraWorkingHrs
     */
    public function setApprovedExtraWorkingHrs($approvedExtraWorkingHrs)
    {
        $this->approvedExtraWorkingHrs = $approvedExtraWorkingHrs;
    }

    /**
     * @return mixed
     */
    public function getApprovedExtraWorkingHrs()
    {
        return $this->approvedExtraWorkingHrs;
    }

    /**
     * @param mixed $attendanceInTime
     */
    public function setAttendanceInTime($attendanceInTime)
    {
        $this->attendanceInTime = $attendanceInTime;
    }

    /**
     * @return mixed
     */
    public function getAttendanceInTime()
    {
        return $this->attendanceInTime;
    }

    /**
     * @param mixed $attendanceOutTime
     */
    public function setAttendanceOutTime($attendanceOutTime)
    {
        $this->attendanceOutTime = $attendanceOutTime;
    }

    /**
     * @return mixed
     */
    public function getAttendanceOutTime()
    {
        return $this->attendanceOutTime;
    }

    /**
     * @param mixed $countedWorkingDay
     */
    public function setCountedWorkingDay($countedWorkingDay)
    {
        $this->countedWorkingDay = $countedWorkingDay;
    }

    /**
     * @return mixed
     */
    public function getCountedWorkingDay()
    {
        return $this->countedWorkingDay;
    }

    /**
     * @param mixed $dateOn
     */
    public function setDateOn($dateOn)
    {
        $this->dateOn = $dateOn;
    }

    /**
     * @return mixed
     */
    public function getDateOn()
    {
        return $this->dateOn;
    }

    /**
     * @param mixed $employee
     */
    public function setEmployee($employee)
    {
        $this->employee = $employee;
    }

    /**
     * @return mixed
     */
    public function getEmployee()
    {
        return $this->employee;
    }

    /**
     * @param mixed $extraWorkingHrs
     */
    public function setExtraWorkingHrs($extraWorkingHrs)
    {
        $this->extraWorkingHrs = $extraWorkingHrs;
    }

    /**
     * @return mixed
     */
    public function getExtraWorkingHrs()
    {
        return $this->extraWorkingHrs;
    }

    /**
     * @param mixed $extraWorkingHrsApproved
     */
    public function setExtraWorkingHrsApproved($extraWorkingHrsApproved)
    {
        $this->extraWorkingHrsApproved = $extraWorkingHrsApproved;
    }

    /**
     * @return mixed
     */
    public function getExtraWorkingHrsApproved()
    {
        return $this->extraWorkingHrsApproved;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $inTimeDifferentMin
     */
    public function setInTimeDifferentMin($inTimeDifferentMin)
    {
        $this->inTimeDifferentMin = $inTimeDifferentMin;
    }

    /**
     * @return mixed
     */
    public function getInTimeDifferentMin()
    {
        return $this->inTimeDifferentMin;
    }

    /**
     * @param mixed $inTimeDifferentMinType
     */
    public function setInTimeDifferentMinType($inTimeDifferentMinType)
    {
        $this->inTimeDifferentMinType = $inTimeDifferentMinType;
    }

    /**
     * @return mixed
     */
    public function getInTimeDifferentMinType()
    {
        return $this->inTimeDifferentMinType;
    }

    /**
     * @param mixed $inTimeExecused
     */
    public function setInTimeExecused($inTimeExecused)
    {
        $this->inTimeExecused = $inTimeExecused;
    }

    /**
     * @return mixed
     */
    public function getInTimeExecused()
    {
        return $this->inTimeExecused;
    }

    /**
     * @param mixed $inTimeFpSerial
     */
    public function setInTimeFpSerial($inTimeFpSerial)
    {
        $this->inTimeFpSerial = $inTimeFpSerial;
    }

    /**
     * @return mixed
     */
    public function getInTimeFpSerial()
    {
        return $this->inTimeFpSerial;
    }

    /**
     * @param mixed $inTimeStatusExempted
     */
    public function setInTimeStatusExempted($inTimeStatusExempted)
    {
        $this->inTimeStatusExempted = $inTimeStatusExempted;
    }

    /**
     * @return mixed
     */
    public function getInTimeStatusExempted()
    {
        return $this->inTimeStatusExempted;
    }

    /**
     * @param mixed $isEarlyOff
     */
    public function setIsEarlyOff($isEarlyOff)
    {
        $this->isEarlyOff = $isEarlyOff;
    }

    /**
     * @return mixed
     */
    public function getIsEarlyOff()
    {
        return $this->isEarlyOff;
    }

    /**
     * @param mixed $isLate
     */
    public function setIsLate($isLate)
    {
        $this->isLate = $isLate;
    }

    /**
     * @return mixed
     */
    public function getIsLate()
    {
        return $this->isLate;
    }

    /**
     * @param mixed $isOnLeave
     */
    public function setIsOnLeave($isOnLeave)
    {
        $this->isOnLeave = $isOnLeave;
    }

    /**
     * @return mixed
     */
    public function getIsOnLeave()
    {
        return $this->isOnLeave;
    }

    /**
     * @param mixed $isPaidForExtraHrs
     */
    public function setIsPaidForExtraHrs($isPaidForExtraHrs)
    {
        $this->isPaidForExtraHrs = $isPaidForExtraHrs;
    }

    /**
     * @return mixed
     */
    public function getIsPaidForExtraHrs()
    {
        return $this->isPaidForExtraHrs;
    }

    /**
     * @param mixed $isWorkingDay
     */
    public function setIsWorkingDay($isWorkingDay)
    {
        $this->isWorkingDay = $isWorkingDay;
    }

    /**
     * @return mixed
     */
    public function getIsWorkingDay()
    {
        return $this->isWorkingDay;
    }

    /**
     * @param mixed $manuallyAddedOrEdited
     */
    public function setManuallyAddedOrEdited($manuallyAddedOrEdited)
    {
        $this->manuallyAddedOrEdited = $manuallyAddedOrEdited;
    }

    /**
     * @return mixed
     */
    public function getManuallyAddedOrEdited()
    {
        return $this->manuallyAddedOrEdited;
    }

    /**
     * @param mixed $otherInOut
     */
    public function setOtherInOut($otherInOut)
    {
        $this->otherInOut = $otherInOut;
    }

    /**
     * @return mixed
     */
    public function getOtherInOut()
    {
        return $this->otherInOut;
    }

    /**
     * @param mixed $outTimeDifferentMinType
     */
    public function setOutTimeDifferentMinType($outTimeDifferentMinType)
    {
        $this->outTimeDifferentMinType = $outTimeDifferentMinType;
    }

    /**
     * @return mixed
     */
    public function getOutTimeDifferentMinType()
    {
        return $this->outTimeDifferentMinType;
    }

    /**
     * @param mixed $outTimeExecused
     */
    public function setOutTimeExecused($outTimeExecused)
    {
        $this->outTimeExecused = $outTimeExecused;
    }

    /**
     * @return mixed
     */
    public function getOutTimeExecused()
    {
        return $this->outTimeExecused;
    }

    /**
     * @param mixed $outTimeFpSerial
     */
    public function setOutTimeFpSerial($outTimeFpSerial)
    {
        $this->outTimeFpSerial = $outTimeFpSerial;
    }

    /**
     * @return mixed
     */
    public function getOutTimeFpSerial()
    {
        return $this->outTimeFpSerial;
    }

    /**
     * @param mixed $outTimeStatusExempted
     */
    public function setOutTimeStatusExempted($outTimeStatusExempted)
    {
        $this->outTimeStatusExempted = $outTimeStatusExempted;
    }

    /**
     * @return mixed
     */
    public function getOutTimeStatusExempted()
    {
        return $this->outTimeStatusExempted;
    }

    /**
     * @param mixed $remarks
     */
    public function setRemarks($remarks)
    {
        $this->remarks = $remarks;
    }

    /**
     * @return mixed
     */
    public function getRemarks()
    {
        return $this->remarks;
    }

    /**
     * @param mixed $scheduledOffTime
     */
    public function setScheduledOffTime($scheduledOffTime)
    {
        $this->scheduledOffTime = $scheduledOffTime;
    }

    /**
     * @return mixed
     */
    public function getScheduledOffTime()
    {
        return $this->scheduledOffTime;
    }

    /**
     * @param mixed $scheduledOnTime
     */
    public function setScheduledOnTime($scheduledOnTime)
    {
        $this->scheduledOnTime = $scheduledOnTime;
    }

    /**
     * @return mixed
     */
    public function getScheduledOnTime()
    {
        return $this->scheduledOnTime;
    }

    public function getOutTimeDifferentMin() {
        return $this->outTimeDifferentMin;
    }

    public function setOutTimeDifferentMin($outTimeDifferentMin) {
        $this->outTimeDifferentMin = $outTimeDifferentMin;
    }

    public function getReportFromDate() {
        return $this->reportFromDate;
    }

    public function getReportToDate() {
        return $this->reportToDate;
    }

    public function setReportFromDate($reportFromDate) {
        $this->reportFromDate = $reportFromDate;
    }

    public function setReportToDate($reportToDate) {
        $this->reportToDate = $reportToDate;
    }

    public function getEmployeeType() {
        return $this->employeeType;
    }

    public function setEmployeeType($employeeType) {
        $this->employeeType = $employeeType;
    }


    public function getExpectedWorkingHrsDay() {
        return $this->expectedWorkingHrsDay;
    }

    public function setExpectedWorkingHrsDay($expectedWorkingHrsDay) {
        $this->expectedWorkingHrsDay = $expectedWorkingHrsDay;
    }


}