<?php
/**
 * Created by PhpStorm.
 * Employee: ism-apac
 * Date: 8/7/14
 * Time: 3:26 PM
 */

class Base_Model_ObtorLib_App_Core_Employee_Service_EmployeeSalaryPaymentBreakdown  extends Base_Model_ObtorLib_Eav_Model_Service {

    public $employeeSalaryPaymentBreakdown;

    /*
     * Get a user employeeSalaryPaymentBreakdown using id
     * @return      : Entity Employee Employee Object (Base_Model_ObtorLib_App_Core_Employee_Entity_Employee)
     */

    public function getEmployeeSalaryPaymentBreakdown($id) {
        try {
            $objEmployeeSalaryPaymentBreakdown = new Base_Model_ObtorLib_App_Core_Employee_Dao_EmployeeSalaryPaymentBreakdown();
            $employeeSalaryPaymentBreakdown = $objEmployeeSalaryPaymentBreakdown->getEmployeeSalaryPaymentBreakdown($id);
            return $employeeSalaryPaymentBreakdown;
        } catch (Exception $e) {
            throw new Base_Model_ObtorLib_App_Core_Employee_Exception($e);
        }
    }

    /*
     * Add new user employeeSalaryPaymentBreakdown
     * @return      : Integer ID / Null
     */

    public function addEmployeeSalaryPaymentBreakdown() {
        try {
            if (!($this->employeeSalaryPaymentBreakdown instanceof Base_Model_ObtorLib_App_Core_Employee_Entity_EmployeeSalaryPaymentBreakdown)) {
                throw new Base_Model_ObtorLib_App_Core_Employee_Exception(" EmployeeSalaryPaymentBreakdown Entity not initialized");
            } else {
                $objEmployeeSalaryPaymentBreakdown = new Base_Model_ObtorLib_App_Core_Employee_Dao_EmployeeSalaryPaymentBreakdown();
                $objEmployeeSalaryPaymentBreakdown->employeeSalaryPaymentBreakdown = $this->employeeSalaryPaymentBreakdown;
                return $objEmployeeSalaryPaymentBreakdown->addEmployeeSalaryPaymentBreakdown();
            }
        } catch (Exception $ex) {
            throw new Base_Model_ObtorLib_App_Core_Employee_Exception($ex);
        }
    }

    /*
     * Update user employeeSalaryPaymentBreakdown
     * @return      : Integer ID / Null
     */

    public function updateEmployeeSalaryPaymentBreakdown() {
        try {
            if (!($this->employeeSalaryPaymentBreakdown instanceof Base_Model_ObtorLib_App_Core_Employee_Entity_EmployeeSalaryPaymentBreakdown)) {
                throw new Base_Model_ObtorLib_App_Core_Employee_Exception(" EmployeeSalaryPaymentBreakdown Entity not initialized");
            } else {
                $objEmployeeSalaryPaymentBreakdown = new Base_Model_ObtorLib_App_Core_Employee_Dao_EmployeeSalaryPaymentBreakdown();
                $objEmployeeSalaryPaymentBreakdown->employeeSalaryPaymentBreakdown = $this->employeeSalaryPaymentBreakdown;
                return $objEmployeeSalaryPaymentBreakdown->updateEmployeeSalaryPaymentBreakdown();
            }
        } catch (Exception $ex) {
            throw new Base_Model_ObtorLib_App_Core_Employee_Exception($ex);
        }
    }

    /*
     * Delete user employeeSalaryPaymentBreakdown
     * @return      : Integer ID / Null
     */

    public function deleteEmployeeSalaryPaymentBreakdown() {
        try {
             if (!($this->employeeSalaryPaymentBreakdown instanceof Base_Model_ObtorLib_App_Core_Employee_Entity_EmployeeSalaryPaymentBreakdown)) {
                throw new Base_Model_ObtorLib_App_Core_Employee_Exception(" EmployeeSalaryPaymentBreakdown Entity not initialized");
            } else {
                $objEmployeeSalaryPaymentBreakdown = new Base_Model_ObtorLib_App_Core_Employee_Dao_EmployeeSalaryPaymentBreakdown();
                $objEmployeeSalaryPaymentBreakdown->employeeSalaryPaymentBreakdown = $this->employeeSalaryPaymentBreakdown;
                return $objEmployeeSalaryPaymentBreakdown->deleteEmployeeSalaryPaymentBreakdown();
            }
        } catch (Exception $ex) {
            throw new Base_Model_ObtorLib_App_Core_Employee_Exception($ex);
        }
    }

    /*
     * Search user employeeSalaryPaymentBreakdowns....
     * @return : Array of Employee Employees Entities...
     */

    public function search() {
        try {
            if (!($this->employeeSalaryPaymentBreakdown instanceof Base_Model_ObtorLib_App_Core_Employee_Entity_EmployeeSalaryPaymentBreakdown)) {
                throw new Base_Model_ObtorLib_App_Core_Employee_Exception(" EmployeeSalaryPaymentBreakdown Employee Entity not initialized");
            } else {
                $objEmployeeSalaryPaymentBreakdown = new Base_Model_ObtorLib_App_Core_Employee_Dao_EmployeeSalaryPaymentBreakdown();
                $objEmployeeSalaryPaymentBreakdown->employeeSalaryPaymentBreakdown = $this->employeeSalaryPaymentBreakdown;
                return $objEmployeeSalaryPaymentBreakdown->search();
            }
        } catch (Exception $ex) {
            throw new Base_Model_ObtorLib_App_Core_Employee_Exception($ex);
        }
    }


    
}