<?php
/**
 * Created by PhpStorm.
 * Employee: ism-apac
 * Date: 8/7/14
 * Time: 3:26 PM
 */

class Base_Model_ObtorLib_App_Core_Employee_Dao_EmployeeSalaryPayment extends Zend_Db_Table_Abstract {

    //put your code here
    public $employeeSalaryPayment;
    protected $_name = 'tbl_employee_salary_payments';

    /*
     * Get a user employee using id
     * @return      : Entity EmployeeSalaryPayment Object (Base_Model_ObtorLib_App_Core_Employee_Entity_EmployeeSalaryPayment)
     */

    public function getEmployeeSalaryPayment($id) {
        try {
            $id = (int) $id;
            $row = $this->fetchRow('id = ' . $id);
            if ($row) {
                $result = $row->toArray();
                $objEmployeeSalaryPayment = new Base_Model_ObtorLib_App_Core_Employee_Entity_EmployeeSalaryPayment();
                $objEmployeeSalaryPayment->setId($result['id']);
                $objEmployeeSalaryPayment->setSalMonth($result['sal_month']);
                $objEmployeeSalaryPayment->setSalYear($result['sal_year']);
                $objEmployeeSalaryPayment->setGrossSalaryAmount($result['gross_salary_amount']);
                $objEmployeeSalaryPayment->setTotalDeduction($result['total_deduction']);
                $objEmployeeSalaryPayment->setDeductionSummary($result['deduction_summary']);
                $objEmployeeSalaryPayment->setNetSalaryAmount($result['net_salary_amount']);
                $objEmployeeSalaryPayment->setCurrentStatus($result['current_status']);
                $objEmployeeSalaryPayment->setGeneratedOn($result['generated_on']);
                $objEmployeeSalaryPayment->setPaidOn($result['paid_on']);
                $objEmployeeSalaryPayment->setPaidBy($result['paid_by']);
                $objEmployeeSalaryPayment->setEmployeeId($result['tbl_employee_id']);
                return $objEmployeeSalaryPayment;
            } else {
                return null;
            }
        } catch (Exception $ex) {
            throw new Base_Model_ObtorLib_App_Core_Employee_Exception($ex);
        }
    }


    /*
     * Add new user addEmployeeSalaryPayment
     * @return      : Integer ID / Null
     */

    public function addEmployeeSalaryPayment() {
        try {
            if (!($this->employeeSalaryPayment instanceof Base_Model_ObtorLib_App_Core_Employee_Entity_EmployeeSalaryPayment)) {
                throw new Base_Model_ObtorLib_App_Core_Employee_Exception(" EmployeeSalaryPayment Entity not initialized");
            } else {
                $data = array(
                    'sal_month' => $this->employeeSalaryPayment->getSalMonth(),
                    'sal_year' => $this->employeeSalaryPayment->getSalYear(),
                    'gross_salary_amount' => $this->employeeSalaryPayment->getGrossSalaryAmount(),
                    'total_deduction' => $this->employeeSalaryPayment->getTotalDeduction(),
                    'deduction_summary' => $this->employeeSalaryPayment->getDeductionSummary(),
                    'net_salary_amount' => $this->employeeSalaryPayment->getNetSalaryAmount(),
                    'current_status' => $this->employeeSalaryPayment->getCurrentStatus(),
                    'generated_on' => $this->employeeSalaryPayment->getGeneratedOn(),
                    'paid_on' => $this->employeeSalaryPayment->getPaidOn(),
                    'paid_by'=> $this->employeeSalaryPayment->getPaidBy(),
                    'tbl_employee_id'=>$this->employeeSalaryPayment->getEmployeeId());
                $last_inserted_id = $this->insert($data);
                return $last_inserted_id;
            }
        } catch (Exception $ex) {
            throw new Base_Model_ObtorLib_App_Core_Employee_Exception($ex);
        }
    }

    /*
     * Update user employee working time..
     * @return      : Boolean true/false
     */

    public function updateEmployeeSalaryPayment() {
        try {
            if (!($this->employeeSalaryPayment instanceof Base_Model_ObtorLib_App_Core_Employee_Entity_EmployeeSalaryPayment)) {
                throw new Base_Model_ObtorLib_App_Core_Employee_Exception(" EmployeeSalaryPayment Entity not initialized");
            } else {
                $data = array(
                    'sal_month' => $this->employeeSalaryPayment->getSalMonth(),
                    'sal_year' => $this->employeeSalaryPayment->getSalYear(),
                    'gross_salary_amount' => $this->employeeSalaryPayment->getGrossSalaryAmount(),
                    'total_deduction' => $this->employeeSalaryPayment->getTotalDeduction(),
                    'deduction_summary' => $this->employeeSalaryPayment->getDeductionSummary(),
                    'net_salary_amount' => $this->employeeSalaryPayment->getNetSalaryAmount(),
                    'current_status' => $this->employeeSalaryPayment->getCurrentStatus(),
                    'generated_on' => $this->employeeSalaryPayment->getGeneratedOn(),
                    'paid_on' => $this->employeeSalaryPayment->getPaidOn(),
                    'paid_by'=> $this->employeeSalaryPayment->getPaidBy(),
                    'tbl_employee_id'=>$this->employeeSalaryPayment->getEmployeeId());
                return $this->update($data, 'id = ' . (int) $this->employeeSalaryPayment->getId());
            }
        } catch (Exception $ex) {
            throw new Base_Model_ObtorLib_App_Core_Employee_Exception($ex);
        }
    }
    
    
    /*
     * Update user employee working time..
     * @return      : Boolean true/false
     */

    public function updateEmployeeSalaryPaymentFinalAmount() {
        try {
            if (!($this->employeeSalaryPayment instanceof Base_Model_ObtorLib_App_Core_Employee_Entity_EmployeeSalaryPayment)) {
                throw new Base_Model_ObtorLib_App_Core_Employee_Exception(" EmployeeSalaryPayment Entity not initialized");
            } else {
                $data = array(
                    'gross_salary_amount' => $this->employeeSalaryPayment->getGrossSalaryAmount(),
                    'total_deduction' => $this->employeeSalaryPayment->getTotalDeduction(),
                    'net_salary_amount' => $this->employeeSalaryPayment->getNetSalaryAmount());
                
                return $this->update($data, 'id = ' . (int) $this->employeeSalaryPayment->getId());
            }
        } catch (Exception $ex) {
            throw new Base_Model_ObtorLib_App_Core_Employee_Exception($ex);
        }
    }

    /*
     * Delete user employee working time...
     * @return      : Integer ID / Null
     */

    public function deleteEmployeeSalaryPayment() {
        try {
            if (!($this->employeeSalaryPayment instanceof Base_Model_ObtorLib_App_Core_Employee_Entity_EmployeeSalaryPayment)) {
                throw new Base_Model_ObtorLib_App_Core_Employee_Exception(" EmployeeSalaryPayment Entity not initialized");
            } else {
                return $this->delete('id =' . (int) $this->employeeSalaryPayment->getId());
            }
        } catch (Exception $ex) {
            throw new Base_Model_ObtorLib_App_Core_Employee_Exception($ex);
        }
    }

    /*
     * Search user employees....
     * @return : Array of Employees Entities...
     */

    public function search($limit = NULL) {
        try {
           if (!($this->employeeSalaryPayment instanceof Base_Model_ObtorLib_App_Core_Employee_Entity_EmployeeSalaryPayment)) {
                throw new Base_Model_ObtorLib_App_Core_Employee_Exception(" EmployeeSalaryPayment Entity not initialized");
            } else {
                $arrWhere = array();
                $arrEmployeeSalaryPayment = array();

                $employeeId = $this->employeeSalaryPayment->getEmployeeId();
                $salMonth = $this->employeeSalaryPayment->getSalMonth();
                $salYear = $this->employeeSalaryPayment->getSalYear();
                $salStatus = $this->employeeSalaryPayment->getCurrentStatus();
                
                $employeeSalSql = "SELECT id FROM tbl_employee_salary_payments ";
               
                
                if ($employeeId) {
                    array_push($arrWhere, "tbl_employee_id = '" . $employeeId . "'");
                }

               if ($salMonth) {
                   array_push($arrWhere, "sal_month = '" . $salMonth . "'");
               }

               if ($salYear) {
                   array_push($arrWhere, "sal_year = '" . $salYear . "'");
               }
               
               if ($salStatus) {
                   array_push($arrWhere, "current_status = '" . $salStatus . "'");
               }


               if (count($arrWhere) > 0) {
                    $employeeSalSql.= "WHERE " . implode(' AND ',$arrWhere);
                }


               // print($employeeSalSql);exit;
                
                $db = Zend_Db_Table_Abstract::getDefaultAdapter();
                $result = $db->fetchCol($employeeSalSql);
                foreach ($result as $empId) {
                    $employeeInfo = $this->getEmployeeSalaryPayment($empId);
                    array_push($arrEmployeeSalaryPayment, $employeeInfo);
                }
                return $arrEmployeeSalaryPayment;
            }
        } catch (Exception $ex) {
            throw new Base_Model_ObtorLib_App_Core_Employee_Exception($ex);
        }
    }



    /*
     * Search user employees....
     * @return : Array of Employees Entities...
     */

    public function searchCount() {
        try {
            if (!($this->employeeSalaryPayment instanceof Base_Model_ObtorLib_App_Core_Employee_Entity_EmployeeSalaryPayment)) {
                throw new Base_Model_ObtorLib_App_Core_Employee_Exception(" EmployeeSalaryPayment Entity not initialized");
            } else {
                $arrWhere = array();
                $total_number = 0;

                $employeeId = $this->employeeSalaryPayment->getEmployeeId();
                $salMonth = $this->employeeSalaryPayment->getSalMonth();
                $salYear = $this->employeeSalaryPayment->getSalYear();
                $salStatus = $this->employeeSalaryPayment->getCurrentStatus();

                $employeeSalSql = "SELECT count(id) as tot FROM tbl_employee_salary_payments ";


                if ($employeeId) {
                    array_push($arrWhere, "tbl_employee_id = '" . $employeeId . "'");
                }

                if ($salMonth) {
                    array_push($arrWhere, "sal_month = '" . $salMonth . "'");
                }

                if ($salYear) {
                    array_push($arrWhere, "	sal_year = '" . $salYear . "'");
                }
                
                if ($salStatus) {
                   array_push($arrWhere, "current_status = '" . $salStatus . "'");
               }

                if (count($arrWhere) > 0) {
                    $employeeSalSql.= "WHERE " . implode(' AND ',$arrWhere);
                }


                $db = Zend_Db_Table_Abstract::getDefaultAdapter();
                $result 	= $db->fetchRow($employeeSalSql);
                $total_number = $result['tot'];
                return $total_number;
            }
        } catch (Exception $ex) {
            throw new Base_Model_ObtorLib_App_Core_Employee_Exception($ex);
        }
    }
    
    
     /*
     * Update user employee working time..
     * @return      : Boolean true/false
     */

    public function updateEmployeeSalaryPaymentStatus() {
        try {
            if (!($this->employeeSalaryPayment instanceof Base_Model_ObtorLib_App_Core_Employee_Entity_EmployeeSalaryPayment)) {
                throw new Base_Model_ObtorLib_App_Core_Employee_Exception(" EmployeeSalaryPayment Entity not initialized");
            } else {
                $data = array('current_status' => $this->employeeSalaryPayment->getCurrentStatus(),
                    'paid_on' => $this->employeeSalaryPayment->getPaidOn(),
                    'paid_by'=> $this->employeeSalaryPayment->getPaidBy());
                return $this->update($data, 'id = ' . (int) $this->employeeSalaryPayment->getId());
            }
        } catch (Exception $ex) {
            throw new Base_Model_ObtorLib_App_Core_Employee_Exception($ex);
        }
    }
    
    public function getTotalSalary($salaryYear = NULL,$salaryMonth = NULL,$salaryStatus = NULL) {
        try {
            	$total_salary = 0;
                $arrWhere = array();
                
                $employeeSalSql = "SELECT sum(net_salary_amount) as total_salary_amount FROM tbl_employee_salary_payments ";
                
                if ($salaryYear) {
                    array_push($arrWhere, "sal_year = '" . $salaryYear . "'");
                }
                
                if ($salaryMonth) {
                    array_push($arrWhere, "sal_month_int = '" . $salaryMonth . "'");
                }
                
                 if ($salaryStatus) {
                    array_push($arrWhere, "current_status = '" . $salaryStatus . "'");
                }
                
                if (count($arrWhere) > 0) {
                    $employeeSalSql.= "WHERE " . implode(' AND ',$arrWhere);
                }
                
                //print($employeeSalSql);exit;
                
                $db = Zend_Db_Table_Abstract::getDefaultAdapter();
                $result 	= $db->fetchRow($employeeSalSql);
                $total_salary = $result['total_salary_amount'];
                return $total_salary;
        } catch (Exception $ex) {
            throw new Base_Model_ObtorLib_App_Core_Employee_Exception($ex);
        }
    }
     
}