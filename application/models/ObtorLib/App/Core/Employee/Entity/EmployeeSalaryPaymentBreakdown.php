<?php
/**
 * Created by PhpStorm.
 * User: ism-apac
 * Date: 8/7/14
 * Time: 3:26 PM
 */

class Base_Model_ObtorLib_App_Core_Employee_Entity_EmployeeSalaryPaymentBreakdown {

    private $id;
    private $salaryType;
    private $remarks;
    private $generatedOn;
    private $employeeId;
    private $addedOn;
    private $addedBy;
    private $employeeSalaryPaymentId;
    private $amount;
    private $amountType;
    
    
    public function getId() {
        return $this->id;
    }

    public function getSalaryType() {
        return $this->salaryType;
    }

    public function getRemarks() {
        return $this->remarks;
    }

    public function getGeneratedOn() {
        return $this->generatedOn;
    }

    public function getEmployeeId() {
        return $this->employeeId;
    }

    public function getAddedOn() {
        return $this->addedOn;
    }

    public function getAddedBy() {
        return $this->addedBy;
    }

    public function getEmployeeSalaryPaymentId() {
        return $this->employeeSalaryPaymentId;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function setSalaryType($salaryType) {
        $this->salaryType = $salaryType;
    }

    public function setRemarks($remarks) {
        $this->remarks = $remarks;
    }

    public function setGeneratedOn($generatedOn) {
        $this->generatedOn = $generatedOn;
    }

    public function setEmployeeId($employeeId) {
        $this->employeeId = $employeeId;
    }

    public function setAddedOn($addedOn) {
        $this->addedOn = $addedOn;
    }

    public function setAddedBy($addedBy) {
        $this->addedBy = $addedBy;
    }

    public function setEmployeeSalaryPaymentId($employeeSalaryPaymentId) {
        $this->employeeSalaryPaymentId = $employeeSalaryPaymentId;
    }

    public function getAmount() {
        return $this->amount;
    }

    public function getAmountType() {
        return $this->amountType;
    }

    public function setAmount($amount) {
        $this->amount = $amount;
    }

    public function setAmountType($amountType) {
        $this->amountType = $amountType;
    }

}