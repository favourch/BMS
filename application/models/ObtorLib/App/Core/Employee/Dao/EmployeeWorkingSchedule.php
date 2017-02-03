<?php
/**
 * Created by PhpStorm.
 * Employee: ism-apac
 * Date: 8/7/14
 * Time: 3:26 PM
 */

class Base_Model_ObtorLib_App_Core_Employee_Dao_EmployeeWorkingSchedule extends Zend_Db_Table_Abstract {

    //put your code here
    public $employeeWorkingSchedule;
    protected $_name = 'tbl_employee_working_schedule';

    /*
     * Get a user employee using id
     * @return      : Entity EmployeeWorkingSchedule Object (Base_Model_ObtorLib_App_Core_Employee_Entity_EmployeeWorkingSchedule)
     */

    public function getEmployeeWorkingSchedule($id) {
        try {
            $id = (int) $id;
            $row = $this->fetchRow('id = ' . $id);
            if ($row) {
                $result = $row->toArray();
                $objEmployeeWorkingSchedule = new Base_Model_ObtorLib_App_Core_Employee_Entity_EmployeeWorkingSchedule();
                $objEmployeeWorkingSchedule->setId($result['id']);
                $objEmployeeWorkingSchedule->setEffectiveFromDate($result['effective_from']);
                $objEmployeeWorkingSchedule->setEmployeeId($result['employee_id']);
                $objEmployeeWorkingSchedule->setIsActive($result['is_active']);
                
                // get working days ...
                $objEmployeeWorkingTimeEntity = new Base_Model_ObtorLib_App_Core_Employee_Entity_EmployeeWorkingTime();
                $objEmployeeWorkingTimeService = new Base_Model_ObtorLib_App_Core_Employee_Service_EmployeeWorkingTime();
                $objEmployeeWorkingTimeEntity->setSchedule($result['id']);
                $objEmployeeWorkingTimeService->employeeWorkingTime = $objEmployeeWorkingTimeEntity;
                $employeeWorkingDays = $objEmployeeWorkingTimeService->search();
                $objEmployeeWorkingSchedule->setWeekDays($employeeWorkingDays);      
                return $objEmployeeWorkingSchedule;
            } else {
                return null;
            }
        } catch (Exception $ex) {
            throw new Base_Model_ObtorLib_App_Core_Employee_Exception($ex);
        }
    }


    /*
     * Add new user addEmployeeWorkingSchedule
     * @return      : Integer ID / Null
     */

    public function addEmployeeWorkingSchedule() {
        try {
            if (!($this->employeeWorkingSchedule instanceof Base_Model_ObtorLib_App_Core_Employee_Entity_EmployeeWorkingSchedule)) {
                throw new Base_Model_ObtorLib_App_Core_Employee_Exception(" EmployeeWorkingSchedule Entity not initialized");
            } else {
                $data = array('employee_id' => $this->employeeWorkingSchedule->getEmployeeId(),
                'effective_from' => $this->employeeWorkingSchedule->getEffectiveFromDate(),
                'is_active' => $this->employeeWorkingSchedule->getIsActive());
                
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

    public function updateEmployeeWorkingSchedule() {
        try {
            if (!($this->employeeWorkingSchedule instanceof Base_Model_ObtorLib_App_Core_Employee_Entity_EmployeeWorkingSchedule)) {
                throw new Base_Model_ObtorLib_App_Core_Employee_Exception(" EmployeeWorkingSchedule workingtime Entity not initialized");
            } else {
                $data = array('employee_id' => $this->employeeWorkingSchedule->getEmployeeId(),
                'effective_from' => $this->employeeWorkingSchedule->getEffectiveFromDate(),
                'is_active' => $this->employeeWorkingSchedule->getIsActive());
                return $this->update($data, 'id = ' . (int) $this->employeeWorkingSchedule->getId());
            }
        } catch (Exception $ex) {
            throw new Base_Model_ObtorLib_App_Core_Employee_Exception($ex);
        }
    }

    /*
     * Delete user employee working time...
     * @return      : Integer ID / Null
     */

    public function deleteEmployeeWorkingSchedule() {
        try {
            if (!($this->employeeWorkingSchedule instanceof Base_Model_ObtorLib_App_Core_Employee_Entity_EmployeeWorkingSchedule)) {
                throw new Base_Model_ObtorLib_App_Core_Employee_Exception(" EmployeeWorkingSchedule workingtime Entity not initialized");
            } else {
                return $this->delete('id =' . (int) $this->employeeWorkingSchedule->getId());
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
           if (!($this->employeeWorkingSchedule instanceof Base_Model_ObtorLib_App_Core_Employee_Entity_EmployeeWorkingSchedule)) {
                throw new Base_Model_ObtorLib_App_Core_Employee_Exception(" EmployeeWorkingSchedule workingtime Entity not initialized");
            } else {
                $arrWhere = array();
                $arrEmployeeWorkingSchedule = array();
                $employeeId = $this->employeeWorkingSchedule->getEmployeeId();
                $employeeSql = "SELECT id FROM tbl_employee_working_schedule ";
                if ($employeeId) {
                    array_push($arrWhere, "employee_id = '" . $employeeId . "'");
                }

                if (count($arrWhere) > 0) {
                    $employeeSql.= "WHERE " . implode(' AND ',$arrWhere);
                }


                $db = Zend_Db_Table_Abstract::getDefaultAdapter();
                $result = $db->fetchCol($employeeSql);
                foreach ($result as $empId) {
                    $employeeInfo = $this->getEmployeeWorkingSchedule($empId);
                    array_push($arrEmployeeWorkingSchedule, $employeeInfo);
                }
                return $arrEmployeeWorkingSchedule;
            }
        } catch (Exception $ex) {
            throw new Base_Model_ObtorLib_App_Core_Employee_Exception($ex);
        }
    }
     
}