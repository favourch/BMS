<?php
/**
 * Created by PhpStorm.
 * Employee: ism-apac
 * Date: 8/7/14
 * Time: 3:26 PM
 */

class Base_Model_ObtorLib_App_Core_Employee_Service_EmployeeWorkingSchedule  extends Base_Model_ObtorLib_Eav_Model_Service {

    public $employeeWorkingSchedule;

    /*
     * Get a user employeeWorkingSchedule using id
     * @return      : Entity Employee Employee Object (Base_Model_ObtorLib_App_Core_Employee_Entity_Employee)
     */

    public function getEmployeeWorkingSchedule($id) {
        try {
            $objEmployeeWorkingSchedule = new Base_Model_ObtorLib_App_Core_Employee_Dao_EmployeeWorkingSchedule();
            $employeeWorkingSchedule = $objEmployeeWorkingSchedule->getEmployeeWorkingSchedule($id);
            return $employeeWorkingSchedule;
        } catch (Exception $e) {
            throw new Base_Model_ObtorLib_App_Core_Employee_Exception($e);
        }
    }

    /*
     * Add new user employeeWorkingSchedule
     * @return      : Integer ID / Null
     */

    public function addEmployeeWorkingSchedule() {
        try {
            if (!($this->employeeWorkingSchedule instanceof Base_Model_ObtorLib_App_Core_Employee_Entity_EmployeeWorkingSchedule)) {
                throw new Base_Model_ObtorLib_App_Core_Employee_Exception(" EmployeeWorkingSchedule Entity not initialized");
            } else {
                $objEmployeeWorkingSchedule = new Base_Model_ObtorLib_App_Core_Employee_Dao_EmployeeWorkingSchedule();
                $objEmployeeWorkingSchedule->employeeWorkingSchedule = $this->employeeWorkingSchedule;
                return $objEmployeeWorkingSchedule->addEmployeeWorkingSchedule();
            }
        } catch (Exception $ex) {
            throw new Base_Model_ObtorLib_App_Core_Employee_Exception($ex);
        }
    }

    /*
     * Update user employeeWorkingSchedule
     * @return      : Integer ID / Null
     */

    public function updateEmployeeWorkingSchedule() {
        try {
            if (!($this->employeeWorkingSchedule instanceof Base_Model_ObtorLib_App_Core_Employee_Entity_EmployeeWorkingSchedule)) {
                throw new Base_Model_ObtorLib_App_Core_Employee_Exception(" EmployeeWorkingSchedule Entity not initialized");
            } else {
                $objEmployeeWorkingSchedule = new Base_Model_ObtorLib_App_Core_Employee_Dao_EmployeeWorkingSchedule();
                $objEmployeeWorkingSchedule->employeeWorkingSchedule = $this->employeeWorkingSchedule;
                return $objEmployeeWorkingSchedule->updateEmployeeWorkingSchedule();
            }
        } catch (Exception $ex) {
            throw new Base_Model_ObtorLib_App_Core_Employee_Exception($ex);
        }
    }

    /*
     * Delete user employeeWorkingSchedule
     * @return      : Integer ID / Null
     */

    public function deleteEmployeeWorkingSchedule() {
        try {
             if (!($this->employeeWorkingSchedule instanceof Base_Model_ObtorLib_App_Core_Employee_Entity_EmployeeWorkingSchedule)) {
                throw new Base_Model_ObtorLib_App_Core_Employee_Exception(" EmployeeWorkingSchedule Entity not initialized");
            } else {
                $objEmployeeWorkingSchedule = new Base_Model_ObtorLib_App_Core_Employee_Dao_EmployeeWorkingSchedule();
                $objEmployeeWorkingSchedule->employeeWorkingSchedule = $this->employeeWorkingSchedule;
                return $objEmployeeWorkingSchedule->deleteEmployeeWorkingSchedule();
            }
        } catch (Exception $ex) {
            throw new Base_Model_ObtorLib_App_Core_Employee_Exception($ex);
        }
    }

    /*
     * Search user employeeWorkingSchedules....
     * @return : Array of Employee Employees Entities...
     */

    public function search() {
        try {
            if (!($this->employeeWorkingSchedule instanceof Base_Model_ObtorLib_App_Core_Employee_Entity_EmployeeWorkingSchedule)) {
                throw new Base_Model_ObtorLib_App_Core_Employee_Exception(" EmployeeWorkingSchedule Employee Entity not initialized");
            } else {
                $objEmployeeWorkingSchedule = new Base_Model_ObtorLib_App_Core_Employee_Dao_EmployeeWorkingSchedule();
                $objEmployeeWorkingSchedule->employeeWorkingSchedule = $this->employeeWorkingSchedule;
                return $objEmployeeWorkingSchedule->search();
            }
        } catch (Exception $ex) {
            throw new Base_Model_ObtorLib_App_Core_Employee_Exception($ex);
        }
    }
    
}