<?php
/**
 * Created by PhpStorm.
 * Employee: ism-apac
 * Date: 8/7/14
 * Time: 3:26 PM
 */

class Base_Model_ObtorLib_App_Core_Employee_Service_EmployeeSalaryPayment  extends Base_Model_ObtorLib_Eav_Model_Service {

    public $employeeSalaryPayment;

    /*
     * Get a user employeeSalaryPayment using id
     * @return      : Entity Employee Employee Object (Base_Model_ObtorLib_App_Core_Employee_Entity_Employee)
     */

    public function getEmployeeSalaryPayment($id) {
        try {
            $objEmployeeSalaryPayment = new Base_Model_ObtorLib_App_Core_Employee_Dao_EmployeeSalaryPayment();
            $employeeSalaryPayment = $objEmployeeSalaryPayment->getEmployeeSalaryPayment($id);
            return $employeeSalaryPayment;
        } catch (Exception $e) {
            throw new Base_Model_ObtorLib_App_Core_Employee_Exception($e);
        }
    }

    /*
     * Add new user employeeSalaryPayment
     * @return      : Integer ID / Null
     */

    public function addEmployeeSalaryPayment() {
        try {
            if (!($this->employeeSalaryPayment instanceof Base_Model_ObtorLib_App_Core_Employee_Entity_EmployeeSalaryPayment)) {
                throw new Base_Model_ObtorLib_App_Core_Employee_Exception(" EmployeeSalaryPayment Entity not initialized");
            } else {
                $objEmployeeSalaryPayment = new Base_Model_ObtorLib_App_Core_Employee_Dao_EmployeeSalaryPayment();
                $objEmployeeSalaryPayment->employeeSalaryPayment = $this->employeeSalaryPayment;
                return $objEmployeeSalaryPayment->addEmployeeSalaryPayment();
            }
        } catch (Exception $ex) {
            throw new Base_Model_ObtorLib_App_Core_Employee_Exception($ex);
        }
    }

    /*
     * Update user employeeSalaryPayment
     * @return      : Integer ID / Null
     */

    public function updateEmployeeSalaryPayment() {
        try {
            if (!($this->employeeSalaryPayment instanceof Base_Model_ObtorLib_App_Core_Employee_Entity_EmployeeSalaryPayment)) {
                throw new Base_Model_ObtorLib_App_Core_Employee_Exception(" EmployeeSalaryPayment Entity not initialized");
            } else {
                $objEmployeeSalaryPayment = new Base_Model_ObtorLib_App_Core_Employee_Dao_EmployeeSalaryPayment();
                $objEmployeeSalaryPayment->employeeSalaryPayment = $this->employeeSalaryPayment;
                return $objEmployeeSalaryPayment->updateEmployeeSalaryPayment();
            }
        } catch (Exception $ex) {
            throw new Base_Model_ObtorLib_App_Core_Employee_Exception($ex);
        }
    }
    
    
      /*
     * Update user employeeSalaryPayment
     * @return      : Integer ID / Null
     */

    public function updateEmployeeSalaryPaymentFinalAmount() {
        try {
            if (!($this->employeeSalaryPayment instanceof Base_Model_ObtorLib_App_Core_Employee_Entity_EmployeeSalaryPayment)) {
                throw new Base_Model_ObtorLib_App_Core_Employee_Exception(" EmployeeSalaryPayment Entity not initialized");
            } else {
                $objEmployeeSalaryPayment = new Base_Model_ObtorLib_App_Core_Employee_Dao_EmployeeSalaryPayment();
                $objEmployeeSalaryPayment->employeeSalaryPayment = $this->employeeSalaryPayment;
                return $objEmployeeSalaryPayment->updateEmployeeSalaryPaymentFinalAmount();
            }
        } catch (Exception $ex) {
            throw new Base_Model_ObtorLib_App_Core_Employee_Exception($ex);
        }
    }

    /*
     * Delete user employeeSalaryPayment
     * @return      : Integer ID / Null
     */

    public function deleteEmployeeSalaryPayment() {
        try {
             if (!($this->employeeSalaryPayment instanceof Base_Model_ObtorLib_App_Core_Employee_Entity_EmployeeSalaryPayment)) {
                throw new Base_Model_ObtorLib_App_Core_Employee_Exception(" EmployeeSalaryPayment Entity not initialized");
            } else {
                $objEmployeeSalaryPayment = new Base_Model_ObtorLib_App_Core_Employee_Dao_EmployeeSalaryPayment();
                $objEmployeeSalaryPayment->employeeSalaryPayment = $this->employeeSalaryPayment;
                return $objEmployeeSalaryPayment->deleteEmployeeSalaryPayment();
            }
        } catch (Exception $ex) {
            throw new Base_Model_ObtorLib_App_Core_Employee_Exception($ex);
        }
    }

    /*
     * Search user employeeSalaryPayments....
     * @return : Array of Employee Employees Entities...
     */

    public function search($limit = NULL) {
        try {
            if (!($this->employeeSalaryPayment instanceof Base_Model_ObtorLib_App_Core_Employee_Entity_EmployeeSalaryPayment)) {
                throw new Base_Model_ObtorLib_App_Core_Employee_Exception(" EmployeeSalaryPayment Employee Entity not initialized");
            } else {
                $objEmployeeSalaryPayment = new Base_Model_ObtorLib_App_Core_Employee_Dao_EmployeeSalaryPayment();
                $objEmployeeSalaryPayment->employeeSalaryPayment = $this->employeeSalaryPayment;
                return $objEmployeeSalaryPayment->search($limit);
            }
        } catch (Exception $ex) {
            throw new Base_Model_ObtorLib_App_Core_Employee_Exception($ex);
        }
    }


    /*
    * Search user employeeSalaryPayments....
    * @return : Array of Employee Employees Entities...
    */

    public function searchCount() {
        try {
            if (!($this->employeeSalaryPayment instanceof Base_Model_ObtorLib_App_Core_Employee_Entity_EmployeeSalaryPayment)) {
                throw new Base_Model_ObtorLib_App_Core_Employee_Exception(" EmployeeSalaryPayment Employee Entity not initialized");
            } else {
                $objEmployeeSalaryPayment = new Base_Model_ObtorLib_App_Core_Employee_Dao_EmployeeSalaryPayment();
                $objEmployeeSalaryPayment->employeeSalaryPayment = $this->employeeSalaryPayment;
                return $objEmployeeSalaryPayment->searchCount();
            }
        } catch (Exception $ex) {
            throw new Base_Model_ObtorLib_App_Core_Employee_Exception($ex);
        }
    }
    
    
     /*
     * Update user employeeSalaryPayment
     * @return      : Integer ID / Null
     */

    public function updateEmployeeSalaryPaymentStatus() {
        try {
            if (!($this->employeeSalaryPayment instanceof Base_Model_ObtorLib_App_Core_Employee_Entity_EmployeeSalaryPayment)) {
                throw new Base_Model_ObtorLib_App_Core_Employee_Exception(" EmployeeSalaryPayment Entity not initialized");
            } else {
                $objEmployeeSalaryPayment = new Base_Model_ObtorLib_App_Core_Employee_Dao_EmployeeSalaryPayment();
                $objEmployeeSalaryPayment->employeeSalaryPayment = $this->employeeSalaryPayment;
                return $objEmployeeSalaryPayment->updateEmployeeSalaryPaymentStatus();
            }
        } catch (Exception $ex) {
            throw new Base_Model_ObtorLib_App_Core_Employee_Exception($ex);
        }
    }
    
    
    public function getTotalSalary($salaryYear = NULL,$salaryMonth = NULL,$salaryStatus = NULL) {
        try {
             $objEmployeeSalaryPayment = new Base_Model_ObtorLib_App_Core_Employee_Dao_EmployeeSalaryPayment();
             return $objEmployeeSalaryPayment->getTotalSalary($salaryYear, $salaryMonth, $salaryStatus);
             
        } catch (Exception $ex) {
            throw new Base_Model_ObtorLib_App_Core_Employee_Exception($ex);
        }
    }
    
}