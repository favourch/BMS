<?php
/**
 * Created by PhpStorm.
 * User: ism-apac
 * Date: 8/7/14
 * Time: 3:26 PM
 */

class Base_Model_ObtorLib_App_Core_Employee_Entity_EmployeeSalaryPayment {

    private $id;
    private $salMonth;
    private $salYear;
    private $grossSalaryAmount;
    private $totalDeduction;
    private $deductionSummary;
    private $netSalaryAmount;
    private $currentStatus;
    private $generatedOn;
    private $paidOn;
    private $paidBy;
    private $employeeId;

    /**
     * @param mixed $currentStatus
     */
    public function setCurrentStatus($currentStatus)
    {
        $this->currentStatus = $currentStatus;
    }

    /**
     * @return mixed
     */
    public function getCurrentStatus()
    {
        return $this->currentStatus;
    }

    /**
     * @param mixed $deductionSummary
     */
    public function setDeductionSummary($deductionSummary)
    {
        $this->deductionSummary = $deductionSummary;
    }

    /**
     * @return mixed
     */
    public function getDeductionSummary()
    {
        return $this->deductionSummary;
    }

    /**
     * @param mixed $generatedOn
     */
    public function setGeneratedOn($generatedOn)
    {
        $this->generatedOn = $generatedOn;
    }

    /**
     * @return mixed
     */
    public function getGeneratedOn()
    {
        return $this->generatedOn;
    }

    /**
     * @param mixed $grossSalaryAmount
     */
    public function setGrossSalaryAmount($grossSalaryAmount)
    {
        $this->grossSalaryAmount = $grossSalaryAmount;
    }

    /**
     * @return mixed
     */
    public function getGrossSalaryAmount()
    {
        return $this->grossSalaryAmount;
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
     * @param mixed $netSalaryAmount
     */
    public function setNetSalaryAmount($netSalaryAmount)
    {
        $this->netSalaryAmount = $netSalaryAmount;
    }

    /**
     * @return mixed
     */
    public function getNetSalaryAmount()
    {
        return $this->netSalaryAmount;
    }

    /**
     * @param mixed $paidBy
     */
    public function setPaidBy($paidBy)
    {
        $this->paidBy = $paidBy;
    }

    /**
     * @return mixed
     */
    public function getPaidBy()
    {
        return $this->paidBy;
    }

    /**
     * @param mixed $paidOn
     */
    public function setPaidOn($paidOn)
    {
        $this->paidOn = $paidOn;
    }

    /**
     * @return mixed
     */
    public function getPaidOn()
    {
        return $this->paidOn;
    }

    /**
     * @param mixed $salMonth
     */
    public function setSalMonth($salMonth)
    {
        $this->salMonth = $salMonth;
    }

    /**
     * @return mixed
     */
    public function getSalMonth()
    {
        return $this->salMonth;
    }

    /**
     * @param mixed $salYear
     */
    public function setSalYear($salYear)
    {
        $this->salYear = $salYear;
    }

    /**
     * @return mixed
     */
    public function getSalYear()
    {
        return $this->salYear;
    }

    /**
     * @param mixed $totalDeduction
     */
    public function setTotalDeduction($totalDeduction)
    {
        $this->totalDeduction = $totalDeduction;
    }

    /**
     * @return mixed
     */
    public function getTotalDeduction()
    {
        return $this->totalDeduction;
    }


    /**
     * @param mixed $employeeId
     */
    public function setEmployeeId($employeeId)
    {
        $this->employeeId = $employeeId;
    }

    /**
     * @return mixed
     */
    public function getEmployeeId()
    {
        return $this->employeeId;
    }


}