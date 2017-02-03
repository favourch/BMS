<?php
/**
 * Created by PhpStorm.
 * User: ism-apac
 * Date: 8/7/14
 * Time: 3:26 PM
 */

class Base_Model_ObtorLib_App_Core_Employee_Entity_AttendanceDailySummary {

    private $id;
    private $dateOn;
    private $country;
    private $region;
    private $branch;
    private $department;
    private $totalStaffInService;
    private $totalStaffOnDuty;
    private $totalStaffOffDuty;
    private $totalPresentedStaff;
    private $totalPresentedOnTime;
    private $totalPresentedLate;
    private $totalPresentedEarlyOff;
    private $totalAbsents;
    private $fromDate;
    private $toDate;
    
    
    public function getId() {
        return $this->id;
    }

    public function getDateOn() {
        return $this->dateOn;
    }

    public function getCountry() {
        return $this->country;
    }

    public function getRegion() {
        return $this->region;
    }

    public function getBranch() {
        return $this->branch;
    }

    public function getDepartment() {
        return $this->department;
    }

    public function getTotalStaffInService() {
        return $this->totalStaffInService;
    }

    public function getTotalStaffOnDuty() {
        return $this->totalStaffOnDuty;
    }

    public function getTotalStaffOffDuty() {
        return $this->totalStaffOffDuty;
    }

    public function getTotalPresentedStaff() {
        return $this->totalPresentedStaff;
    }

    public function getTotalPresentedOnTime() {
        return $this->totalPresentedOnTime;
    }

    public function getTotalPresentedLate() {
        return $this->totalPresentedLate;
    }

    public function getTotalPresentedEarlyOff() {
        return $this->totalPresentedEarlyOff;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function setDateOn($dateOn) {
        $this->dateOn = $dateOn;
    }

    public function setCountry($country) {
        $this->country = $country;
    }

    public function setRegion($region) {
        $this->region = $region;
    }

    public function setBranch($branch) {
        $this->branch = $branch;
    }

    public function setDepartment($department) {
        $this->department = $department;
    }

    public function setTotalStaffInService($totalStaffInService) {
        $this->totalStaffInService = $totalStaffInService;
    }

    public function setTotalStaffOnDuty($totalStaffOnDuty) {
        $this->totalStaffOnDuty = $totalStaffOnDuty;
    }

    public function setTotalStaffOffDuty($totalStaffOffDuty) {
        $this->totalStaffOffDuty = $totalStaffOffDuty;
    }

    public function setTotalPresentedStaff($totalPresentedStaff) {
        $this->totalPresentedStaff = $totalPresentedStaff;
    }

    public function setTotalPresentedOnTime($totalPresentedOnTime) {
        $this->totalPresentedOnTime = $totalPresentedOnTime;
    }

    public function setTotalPresentedLate($totalPresentedLate) {
        $this->totalPresentedLate = $totalPresentedLate;
    }

    public function setTotalPresentedEarlyOff($totalPresentedEarlyOff) {
        $this->totalPresentedEarlyOff = $totalPresentedEarlyOff;
    }

    public function getTotalAbsents() {
        return $this->totalAbsents;
    }

    public function setTotalAbsents($totalAbsents) {
        $this->totalAbsents = $totalAbsents;
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