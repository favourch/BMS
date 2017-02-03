<?php
/**
 * Created by PhpStorm.
 * User: ism-apac
 * Date: 8/7/14
 * Time: 3:26 PM
 */

class Base_Model_ObtorLib_App_Core_Employee_Entity_Leave {

    private $id;
    private $employee;
    private $noOfDaysLeave;
    private $reason;
    private $actingStaffId;
    private $workAreaToBeCovered;
    private $actingStaffSignature;
    private $actingStaffRemarks;
    private $actingStaffSignatureDate;
    private $supervisorSignature;
    private $supervisorRemarks;
    private $supervisorSignatureDate;
    private $supervisorEmployeeId;
    private $managerSignature;
    private $managerRemarks;
    private $managerSignatureDate;
    private $managerEmployeeId;
    private $appStatus;
    private $isApprovedByAdmin;
    private $adminInfo;
    private $adminSignatureDate;
    private $adminRemarks;
    private $lastUpdatedDate;
    private $lastUpdatedBy;
    private $addedBy;
    private $addedOn;
    private $leaveDays;
    private $fromDate;
    private $toDate;

    public function getId() {
        return $this->id;
    }

    public function getEmployee() {
        return $this->employee;
    }

    public function getNoOfDaysLeave() {
        return $this->noOfDaysLeave;
    }

    public function getReason() {
        return $this->reason;
    }

    public function getActingStaffId() {
        return $this->actingStaffId;
    }

    public function getWorkAreaToBeCovered() {
        return $this->workAreaToBeCovered;
    }

    public function getActingStaffSignature() {
        return $this->actingStaffSignature;
    }

    public function getActingStaffRemarks() {
        return $this->actingStaffRemarks;
    }

    public function getActingStaffSignatureDate() {
        return $this->actingStaffSignatureDate;
    }

    public function getSupervisorSignature() {
        return $this->supervisorSignature;
    }

    public function getSupervisorRemarks() {
        return $this->supervisorRemarks;
    }

    public function getSupervisorSignatureDate() {
        return $this->supervisorSignatureDate;
    }

    public function getSupervisorEmployeeId() {
        return $this->supervisorEmployeeId;
    }

    public function getManagerSignature() {
        return $this->managerSignature;
    }

    public function getManagerRemarks() {
        return $this->managerRemarks;
    }

    public function getManagerSignatureDate() {
        return $this->managerSignatureDate;
    }

    public function getManagerEmployeeId() {
        return $this->managerEmployeeId;
    }

    public function getAppStatus() {
        return $this->appStatus;
    }

    public function getIsApprovedByAdmin() {
        return $this->isApprovedByAdmin;
    }

    public function getAdminInfo() {
        return $this->adminInfo;
    }

    public function getAdminSignatureDate() {
        return $this->adminSignatureDate;
    }

    public function getAdminRemarks() {
        return $this->adminRemarks;
    }

    public function getLastUpdatedDate() {
        return $this->lastUpdatedDate;
    }

    public function getLastUpdatedBy() {
        return $this->lastUpdatedBy;
    }

    public function getAddedBy() {
        return $this->addedBy;
    }

    public function getAddedOn() {
        return $this->addedOn;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function setEmployee($employee) {
        $this->employee = $employee;
    }

    public function setNoOfDaysLeave($noOfDaysLeave) {
        $this->noOfDaysLeave = $noOfDaysLeave;
    }

    public function setReason($reason) {
        $this->reason = $reason;
    }

    public function setActingStaffId($actingStaffId) {
        $this->actingStaffId = $actingStaffId;
    }

    public function setWorkAreaToBeCovered($workAreaToBeCovered) {
        $this->workAreaToBeCovered = $workAreaToBeCovered;
    }

    public function setActingStaffSignature($actingStaffSignature) {
        $this->actingStaffSignature = $actingStaffSignature;
    }

    public function setActingStaffRemarks($actingStaffRemarks) {
        $this->actingStaffRemarks = $actingStaffRemarks;
    }

    public function setActingStaffSignatureDate($actingStaffSignatureDate) {
        $this->actingStaffSignatureDate = $actingStaffSignatureDate;
    }

    public function setSupervisorSignature($supervisorSignature) {
        $this->supervisorSignature = $supervisorSignature;
    }

    public function setSupervisorRemarks($supervisorRemarks) {
        $this->supervisorRemarks = $supervisorRemarks;
    }

    public function setSupervisorSignatureDate($supervisorSignatureDate) {
        $this->supervisorSignatureDate = $supervisorSignatureDate;
    }

    public function setSupervisorEmployeeId($supervisorEmployeeId) {
        $this->supervisorEmployeeId = $supervisorEmployeeId;
    }

    public function setManagerSignature($managerSignature) {
        $this->managerSignature = $managerSignature;
    }

    public function setManagerRemarks($managerRemarks) {
        $this->managerRemarks = $managerRemarks;
    }

    public function setManagerSignatureDate($managerSignatureDate) {
        $this->managerSignatureDate = $managerSignatureDate;
    }

    public function setManagerEmployeeId($managerEmployeeId) {
        $this->managerEmployeeId = $managerEmployeeId;
    }

    public function setAppStatus($appStatus) {
        $this->appStatus = $appStatus;
    }

    public function setIsApprovedByAdmin($isApprovedByAdmin) {
        $this->isApprovedByAdmin = $isApprovedByAdmin;
    }

    public function setAdminInfo($adminInfo) {
        $this->adminInfo = $adminInfo;
    }

    public function setAdminSignatureDate($adminSignatureDate) {
        $this->adminSignatureDate = $adminSignatureDate;
    }

    public function setAdminRemarks($adminRemarks) {
        $this->adminRemarks = $adminRemarks;
    }

    public function setLastUpdatedDate($lastUpdatedDate) {
        $this->lastUpdatedDate = $lastUpdatedDate;
    }

    public function setLastUpdatedBy($lastUpdatedBy) {
        $this->lastUpdatedBy = $lastUpdatedBy;
    }

    public function setAddedBy($addedBy) {
        $this->addedBy = $addedBy;
    }

    public function setAddedOn($addedOn) {
        $this->addedOn = $addedOn;
    }


    public function getLeaveDays() {
        return $this->leaveDays;
    }

    public function setLeaveDays($leaveDays) {
        $this->leaveDays = $leaveDays;
    }


    public function getFromDate() {
        return $this->fromDate;
    }

    public function getToDate() {
        return $this->toDate;
    }

    public function setFromDate($fromDate) {
        $this->fromDate = $fromDate;
    }

    public function setToDate($toDate) {
        $this->toDate = $toDate;
    }


}