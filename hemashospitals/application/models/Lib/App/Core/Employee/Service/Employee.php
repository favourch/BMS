<?php
/**
 * Created by PhpStorm.
 * Employee: ism-apac
 * Date: 8/7/14
 * Time: 3:26 PM
 */

class Base_Model_Lib_App_Core_Employee_Service_Employee  extends Base_Model_Lib_Eav_Model_Service {

    public $employee;

    /*
     * Get a user employee using id
     * @return      : Entity Employee Employee Object (Base_Model_Lib_App_Core_Employee_Entity_Employee)
     */

    public function getEmployee($id) {
        try {
            $objEmployee = new Base_Model_Lib_App_Core_Employee_Dao_Employee();
            $employee = $objEmployee->getEmployee($id);
            return $employee;
        } catch (Exception $e) {
            throw new Base_Model_Lib_App_Core_Employee_Exception($e);
        }
    }

    /*
     * Add new user employee
     * @return      : Integer ID / Null
     */

    public function addEmployee() {
        try {
            if (!($this->employee instanceof Base_Model_Lib_App_Core_Employee_Entity_Employee)) {
                throw new Base_Model_Lib_App_Core_Employee_Exception(" Employee Employee Entity not initialized");
            } else {
                $objEmployee = new Base_Model_Lib_App_Core_Employee_Dao_Employee();
                $objEmployee->employee = $this->employee;
                return $objEmployee->addEmployee();
            }
        } catch (Exception $ex) {
            throw new Base_Model_Lib_App_Core_Employee_Exception($ex);
        }
    }

    /*
     * Update user employee
     * @return      : Integer ID / Null
     */

    public function updateEmployee() {
        try {
            if (!($this->employee instanceof Base_Model_Lib_App_Core_Employee_Entity_Employee)) {
                throw new Base_Model_Lib_App_Core_Employee_Exception(" Employee Employee Entity not initialized");
            } else {
                $objEmployee = new Base_Model_Lib_App_Core_Employee_Dao_Employee();
                $objEmployee->employee = $this->employee;
                return $objEmployee->updateEmployee();
            }
        } catch (Exception $ex) {
            throw new Base_Model_Lib_App_Core_Employee_Exception($ex);
        }
    }

    /*
     * Delete user employee
     * @return      : Integer ID / Null
     */

    public function deleteEmployee() {
        try {
            if (!($this->employee instanceof Base_Model_Lib_App_Core_Employee_Entity_Employee)) {
                throw new Base_Model_Lib_App_Core_Employee_Exception(" Employee Employee Entity not initialized");
            } else {
                $objEmployee = new Base_Model_Lib_App_Core_Employee_Dao_Employee();
                $objEmployee->employee = $this->employee;
                return $objEmployee->deleteEmployee();
            }
        } catch (Exception $ex) {
            throw new Base_Model_Lib_App_Core_Employee_Exception($ex);
        }
    }

    /*
     * Search user employees....
     * @return : Array of Employee Employees Entities...
     */

    public function search() {
        try {
            if (!($this->employee instanceof Base_Model_Lib_App_Core_Employee_Entity_Employee)) {
                throw new Base_Model_Lib_App_Core_Employee_Exception(" Employee Employee Entity not initialized");
            } else {
                $objEmployee = new Base_Model_Lib_App_Core_Employee_Dao_Employee();
                $objEmployee->employee = $this->employee;
                return $objEmployee->search();
            }
        } catch (Exception $ex) {
            throw new Base_Model_Lib_App_Core_Employee_Exception($ex);
        }
    }
    
    
    /*
     * Search user employees....
     * @return : Array of Employee Employees Entities...
     */

    public function searchCount() {
        try {
            if (!($this->employee instanceof Base_Model_Lib_App_Core_Employee_Entity_Employee)) {
                throw new Base_Model_Lib_App_Core_Employee_Exception(" Employee Employee Entity not initialized");
            } else {
                $objEmployee = new Base_Model_Lib_App_Core_Employee_Dao_Employee();
                $objEmployee->employee = $this->employee;
                return $objEmployee->searchCount();
            }
        } catch (Exception $ex) {
            throw new Base_Model_Lib_App_Core_Employee_Exception($ex);
        }
    }

}