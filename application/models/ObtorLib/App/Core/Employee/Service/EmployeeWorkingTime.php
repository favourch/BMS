<?php
/**
 * Created by PhpStorm.
 * Employee: ism-apac
 * Date: 8/7/14
 * Time: 3:26 PM
 */

class Base_Model_ObtorLib_App_Core_Employee_Service_EmployeeWorkingTime  extends Base_Model_ObtorLib_Eav_Model_Service {

    public $employeeWorkingTime;

    /*
     * Get a user employeeWorkingTime using id
     * @return      : Entity Employee Employee Object (Base_Model_ObtorLib_App_Core_Employee_Entity_Employee)
     */

    public function getEmployeeWorkingTime($id) {
        try {
            $objEmployeeWorkingTime = new Base_Model_ObtorLib_App_Core_Employee_Dao_EmployeeWorkingTime();
            $employeeWorkingTime = $objEmployeeWorkingTime->getEmployeeWorkingTime($id);
            return $employeeWorkingTime;
        } catch (Exception $e) {
            throw new Base_Model_ObtorLib_App_Core_Employee_Exception($e);
        }
    }

    /*
     * Add new user employeeWorkingTime
     * @return      : Integer ID / Null
     */

    public function addEmployeeWorkingTime() {
        try {
            if (!($this->employeeWorkingTime instanceof Base_Model_ObtorLib_App_Core_Employee_Entity_EmployeeWorkingTime)) {
                throw new Base_Model_ObtorLib_App_Core_Employee_Exception(" EmployeeWorkingTime Entity not initialized");
            } else {
                $objEmployeeWorkingTime = new Base_Model_ObtorLib_App_Core_Employee_Dao_EmployeeWorkingTime();
                $objEmployeeWorkingTime->employeeWorkingTime = $this->employeeWorkingTime;
                return $objEmployeeWorkingTime->addEmployeeWorkingTime();
            }
        } catch (Exception $ex) {
            throw new Base_Model_ObtorLib_App_Core_Employee_Exception($ex);
        }
    }

    /*
     * Update user employeeWorkingTime
     * @return      : Integer ID / Null
     */

    public function updateEmployeeWorkingTime() {
        try {
            if (!($this->employeeWorkingTime instanceof Base_Model_ObtorLib_App_Core_Employee_Entity_EmployeeWorkingTime)) {
                throw new Base_Model_ObtorLib_App_Core_Employee_Exception(" EmployeeWorkingTime Entity not initialized");
            } else {
                $objEmployeeWorkingTime = new Base_Model_ObtorLib_App_Core_Employee_Dao_EmployeeWorkingTime();
                $objEmployeeWorkingTime->employeeWorkingTime = $this->employeeWorkingTime;
                return $objEmployeeWorkingTime->updateEmployeeWorkingTime();
            }
        } catch (Exception $ex) {
            throw new Base_Model_ObtorLib_App_Core_Employee_Exception($ex);
        }
    }

    /*
     * Delete user employeeWorkingTime
     * @return      : Integer ID / Null
     */

    public function deleteEmployeeWorkingTime() {
        try {
             if (!($this->employeeWorkingTime instanceof Base_Model_ObtorLib_App_Core_Employee_Entity_EmployeeWorkingTime)) {
                throw new Base_Model_ObtorLib_App_Core_Employee_Exception(" EmployeeWorkingTime Entity not initialized");
            } else {
                $objEmployeeWorkingTime = new Base_Model_ObtorLib_App_Core_Employee_Dao_EmployeeWorkingTime();
                $objEmployeeWorkingTime->employeeWorkingTime = $this->employeeWorkingTime;
                return $objEmployeeWorkingTime->deleteEmployeeWorkingTime();
            }
        } catch (Exception $ex) {
            throw new Base_Model_ObtorLib_App_Core_Employee_Exception($ex);
        }
    }

    /*
     * Search user employeeWorkingTimes....
     * @return : Array of Employee Employees Entities...
     */

    public function search() {
        try {
            if (!($this->employeeWorkingTime instanceof Base_Model_ObtorLib_App_Core_Employee_Entity_EmployeeWorkingTime)) {
                throw new Base_Model_ObtorLib_App_Core_Employee_Exception(" EmployeeWorkingTime Employee Entity not initialized");
            } else {
                $objEmployeeWorkingTime = new Base_Model_ObtorLib_App_Core_Employee_Dao_EmployeeWorkingTime();
                $objEmployeeWorkingTime->employeeWorkingTime = $this->employeeWorkingTime;
                return $objEmployeeWorkingTime->search();
            }
        } catch (Exception $ex) {
            throw new Base_Model_ObtorLib_App_Core_Employee_Exception($ex);
        }
    }
    
}