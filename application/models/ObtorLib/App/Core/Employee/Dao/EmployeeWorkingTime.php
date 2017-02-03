<?php
/**
 * Created by PhpStorm.
 * Employee: ism-apac
 * Date: 8/7/14
 * Time: 3:26 PM
 */

class Base_Model_ObtorLib_App_Core_Employee_Dao_EmployeeWorkingTime extends Zend_Db_Table_Abstract {

    //put your code here
    public $employeeWorkingTime;
    protected $_name = 'tbl_employee_working_time';

    /*
     * Get a user employee using id
     * @return      : Entity EmployeeWorkingTime Object (Base_Model_ObtorLib_App_Core_Employee_Entity_EmployeeWorkingTime)
     */

    public function getEmployeeWorkingTime($id) {
        try {
            $id = (int) $id;
            $row = $this->fetchRow('id = ' . $id);
            if ($row) {
                $result = $row->toArray();
                $objEmployeeWorkingTime = new Base_Model_ObtorLib_App_Core_Employee_Entity_EmployeeWorkingTime();
                $objEmployeeWorkingTime->setId($result['id']);
                $objEmployeeWorkingTime->setWeekDay($result['week_day']);
                $objEmployeeWorkingTime->setOnTime($result['on_time']);
                $objEmployeeWorkingTime->setOffTime($result['off_time']);
                $objEmployeeWorkingTime->setIsWorking($result['is_working']);
                $objEmployeeWorkingTime->setSchedule($result['schedule_id']);
                $objEmployeeWorkingTime->setExpectedWorkingHours($result['expected_working_hours']);
                return $objEmployeeWorkingTime;
            } else {
                return null;
            }
        } catch (Exception $ex) {
            throw new Base_Model_ObtorLib_App_Core_Employee_Exception($ex);
        }
    }


    /*
     * Add new user addEmployeeWorkingTime
     * @return      : Integer ID / Null
     */

    public function addEmployeeWorkingTime() {
        try {
            if (!($this->employeeWorkingTime instanceof Base_Model_ObtorLib_App_Core_Employee_Entity_EmployeeWorkingTime)) {
                throw new Base_Model_ObtorLib_App_Core_Employee_Exception(" EmployeeWorkingTime Entity not initialized");
            } else {
                $data = array('schedule_id' => $this->employeeWorkingTime->getSchedule(),
                'week_day' => $this->employeeWorkingTime->getWeekDay(),
                'on_time' => $this->employeeWorkingTime->getOnTime(),
                'off_time' => $this->employeeWorkingTime->getOffTime(),
                'is_working' => $this->employeeWorkingTime->getIsWorking(),
                'expected_working_hours'=> $this->employeeWorkingTime->getExpectedWorkingHours());
                
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

    public function updateEmployeeWorkingTime() {
        try {
            if (!($this->employeeWorkingTime instanceof Base_Model_ObtorLib_App_Core_Employee_Entity_EmployeeWorkingTime)) {
                throw new Base_Model_ObtorLib_App_Core_Employee_Exception(" EmployeeWorkingTime workingtime Entity not initialized");
            } else {
               $data = array('schedule_id' => $this->employeeWorkingTime->getSchedule(),
                'week_day' => $this->employeeWorkingTime->getWeekDay(),
                'on_time' => $this->employeeWorkingTime->getOnTime(),
                'off_time' => $this->employeeWorkingTime->getOffTime(),
                'is_working' => $this->employeeWorkingTime->getIsWorking(),
                'expected_working_hours'=> $this->employeeWorkingTime->getExpectedWorkingHours());
                return $this->update($data, 'id = ' . (int) $this->employeeWorkingTime->getId());
            }
        } catch (Exception $ex) {
            throw new Base_Model_ObtorLib_App_Core_Employee_Exception($ex);
        }
    }

    /*
     * Delete user employee working time...
     * @return      : Integer ID / Null
     */

    public function deleteEmployeeWorkingTime() {
        try {
            if (!($this->employeeWorkingTime instanceof Base_Model_ObtorLib_App_Core_Employee_Entity_EmployeeWorkingTime)) {
                throw new Base_Model_ObtorLib_App_Core_Employee_Exception(" EmployeeWorkingTime workingtime Entity not initialized");
            } else {
                return $this->delete('id =' . (int) $this->employeeWorkingTime->getId());
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
           if (!($this->employeeWorkingTime instanceof Base_Model_ObtorLib_App_Core_Employee_Entity_EmployeeWorkingTime)) {
                throw new Base_Model_ObtorLib_App_Core_Employee_Exception(" EmployeeWorkingTime workingtime Entity not initialized");
            } else {
                $arrWhere = array();
                $arrEmployeeWorkingTime = array();

                $schedule = $this->employeeWorkingTime->getSchedule();
                
                $employeeSql = "SELECT id FROM tbl_employee_working_time ";
               
                
                if ($schedule) {
                    array_push($arrWhere, "schedule_id = '" . $schedule . "'");
                }

                if (count($arrWhere) > 0) {
                    $employeeSql.= "WHERE " . implode(' AND ',$arrWhere);
                }


                $db = Zend_Db_Table_Abstract::getDefaultAdapter();
                $result = $db->fetchCol($employeeSql);
                foreach ($result as $empId) {
                    $employeeInfo = $this->getEmployeeWorkingTime($empId);
                    array_push($arrEmployeeWorkingTime, $employeeInfo);
                }
                return $arrEmployeeWorkingTime;
            }
        } catch (Exception $ex) {
            throw new Base_Model_ObtorLib_App_Core_Employee_Exception($ex);
        }
    }
     
}