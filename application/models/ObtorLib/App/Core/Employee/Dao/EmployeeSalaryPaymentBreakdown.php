<?php
/**
 * Created by PhpStorm.
 * Employee: ism-apac
 * Date: 8/7/14
 * Time: 3:26 PM
 */

class Base_Model_ObtorLib_App_Core_Employee_Dao_EmployeeSalaryPaymentBreakdown extends Zend_Db_Table_Abstract {

    //put your code here
    public $employeeSalaryPaymentBreakdown;
    protected $_name = 'tbl_employee_salary_payment_breakdown';

    /*
     * Get a user employee using id
     * @return      : Entity EmployeeSalaryPaymentBreakdown Object (Base_Model_ObtorLib_App_Core_Employee_Entity_EmployeeSalaryPaymentBreakdown)
     */

    public function getEmployeeSalaryPaymentBreakdown($id) {
        try {
            $id = (int) $id;
            $row = $this->fetchRow('id = ' . $id);
            if ($row) {
                $result = $row->toArray();
                $objEmployeeSalaryPaymentBreakdown = new Base_Model_ObtorLib_App_Core_Employee_Entity_EmployeeSalaryPaymentBreakdown();
                $objEmployeeSalaryPaymentBreakdown->setId($result['id']);
                $objEmployeeSalaryPaymentBreakdown->setSalaryType($result['salary_type']);
                $objEmployeeSalaryPaymentBreakdown->setRemarks($result['remarks']);
                $objEmployeeSalaryPaymentBreakdown->setGeneratedOn($result['generated_on']);
                $objEmployeeSalaryPaymentBreakdown->setEmployeeId($result['tbl_employee_id']);
                $objEmployeeSalaryPaymentBreakdown->setAddedOn($result['added_on']);
                $objEmployeeSalaryPaymentBreakdown->setAddedBy($result['added_by']);
                $objEmployeeSalaryPaymentBreakdown->setEmployeeSalaryPaymentId($result['tbl_employee_salary_payment_id']);
                $objEmployeeSalaryPaymentBreakdown->setAmount($result['amount']);
                $objEmployeeSalaryPaymentBreakdown->setAmountType($result['amount_type']);
                return $objEmployeeSalaryPaymentBreakdown;
            } else {
                return null;
            }
        } catch (Exception $ex) {
            throw new Base_Model_ObtorLib_App_Core_Employee_Exception($ex);
        }
    }


    /*
     * Add new user addEmployeeSalaryPaymentBreakdown
     * @return      : Integer ID / Null
     */

    public function addEmployeeSalaryPaymentBreakdown() {
        try {
            if (!($this->employeeSalaryPaymentBreakdown instanceof Base_Model_ObtorLib_App_Core_Employee_Entity_EmployeeSalaryPaymentBreakdown)) {
                throw new Base_Model_ObtorLib_App_Core_Employee_Exception(" EmployeeSalaryPaymentBreakdown Entity not initialized");
            } else {
                $data = array(
                    'salary_type' => $this->employeeSalaryPaymentBreakdown->getSalaryType(),
                    'remarks' => $this->employeeSalaryPaymentBreakdown->getRemarks(),
                    'generated_on' => $this->employeeSalaryPaymentBreakdown->getGeneratedOn(),
                    'tbl_employee_id' => $this->employeeSalaryPaymentBreakdown->getEmployeeId(),
                    'added_on' => $this->employeeSalaryPaymentBreakdown->getAddedOn(),
                    'added_by' => $this->employeeSalaryPaymentBreakdown->getAddedBy(),
                    'tbl_employee_salary_payment_id' => $this->employeeSalaryPaymentBreakdown->getEmployeeSalaryPaymentId(),
                    'amount' => $this->employeeSalaryPaymentBreakdown->getAmount(),
                    'amount_type' => $this->employeeSalaryPaymentBreakdown->getAmountType());
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

    public function updateEmployeeSalaryPaymentBreakdown() {
        try {
            if (!($this->employeeSalaryPaymentBreakdown instanceof Base_Model_ObtorLib_App_Core_Employee_Entity_EmployeeSalaryPaymentBreakdown)) {
                throw new Base_Model_ObtorLib_App_Core_Employee_Exception(" EmployeeSalaryPaymentBreakdown Entity not initialized");
            } else {
                 $data = array(
                    'salary_type' => $this->employeeSalaryPaymentBreakdown->getSalaryType(),
                    'remarks' => $this->employeeSalaryPaymentBreakdown->getRemarks(),
                    'generated_on' => $this->employeeSalaryPaymentBreakdown->getGeneratedOn(),
                    'tbl_employee_id' => $this->employeeSalaryPaymentBreakdown->getEmployeeId(),
                    'added_on' => $this->employeeSalaryPaymentBreakdown->getAddedOn(),
                    'added_by' => $this->employeeSalaryPaymentBreakdown->getAddedBy(),
                    'tbl_employee_salary_payment_id' => $this->employeeSalaryPaymentBreakdown->getEmployeeSalaryPaymentId(),
                    'amount' => $this->employeeSalaryPaymentBreakdown->getAmount(),
                    'amount_type' => $this->employeeSalaryPaymentBreakdown->getAmountType());
                return $this->update($data, 'id = ' . (int) $this->employeeSalaryPaymentBreakdown->getId());
            }
        } catch (Exception $ex) {
            throw new Base_Model_ObtorLib_App_Core_Employee_Exception($ex);
        }
    }

    /*
     * Delete user employee working time...
     * @return      : Integer ID / Null
     */

    public function deleteEmployeeSalaryPaymentBreakdown() {
        try {
            if (!($this->employeeSalaryPaymentBreakdown instanceof Base_Model_ObtorLib_App_Core_Employee_Entity_EmployeeSalaryPaymentBreakdown)) {
                throw new Base_Model_ObtorLib_App_Core_Employee_Exception(" EmployeeSalaryPaymentBreakdown Entity not initialized");
            } else {
                return $this->delete('id =' . (int) $this->employeeSalaryPaymentBreakdown->getId());
            }
        } catch (Exception $ex) {
            throw new Base_Model_ObtorLib_App_Core_Employee_Exception($ex);
        }
    }

    /*
     * Search user employees....
     * @return : Array of Employees Entities...
     */

    public function search() {
        try {
           if (!($this->employeeSalaryPaymentBreakdown instanceof Base_Model_ObtorLib_App_Core_Employee_Entity_EmployeeSalaryPaymentBreakdown)) {
                throw new Base_Model_ObtorLib_App_Core_Employee_Exception(" EmployeeSalaryPaymentBreakdown Entity not initialized");
            } else {
                $arrWhere = array();
                $arrEmployeeSalaryPaymentBreakdown = array();

                $employeeSalaryPaymentId = $this->employeeSalaryPaymentBreakdown->getEmployeeSalaryPaymentId();
                
                $employeeSalSql = "SELECT id FROM tbl_employee_salary_payment_breakdown ";
               
                
                if ($employeeSalaryPaymentId) {
                    array_push($arrWhere, "tbl_employee_salary_payment_id = '" . $employeeSalaryPaymentId . "'");
                }

              

               if (count($arrWhere) > 0) {
                    $employeeSalSql.= "WHERE " . implode(' AND ',$arrWhere);
                }


                $db = Zend_Db_Table_Abstract::getDefaultAdapter();
                $result = $db->fetchCol($employeeSalSql);
                foreach ($result as $empId) {
                    $salaryPaymentBreakdownInfo = $this->getEmployeeSalaryPaymentBreakdown($empId);
                    array_push($arrEmployeeSalaryPaymentBreakdown, $salaryPaymentBreakdownInfo);
                }
                return $arrEmployeeSalaryPaymentBreakdown;
            }
        } catch (Exception $ex) {
            throw new Base_Model_ObtorLib_App_Core_Employee_Exception($ex);
        }
    }


     
}