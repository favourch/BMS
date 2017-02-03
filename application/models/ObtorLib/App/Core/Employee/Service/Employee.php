<?php
/**
 * Created by PhpStorm.
 * Employee: ism-apac
 * Date: 8/7/14
 * Time: 3:26 PM
 */

class Base_Model_ObtorLib_App_Core_Employee_Service_Employee  extends Base_Model_ObtorLib_Eav_Model_Service {

    public $employee;

    /*
     * Get a user employee using id
     * @return      : Entity Employee Employee Object (Base_Model_ObtorLib_App_Core_Employee_Entity_Employee)
     */

    public function getEmployee($id) {
        try {
            $objEmployee = new Base_Model_ObtorLib_App_Core_Employee_Dao_Employee();
            $employee = $objEmployee->getEmployee($id);
            return $employee;
        } catch (Exception $e) {
            throw new Base_Model_ObtorLib_App_Core_Employee_Exception($e);
        }
    }

    /*
     * Add new user employee
     * @return      : Integer ID / Null
     */

    public function addEmployee() {
        try {
            if (!($this->employee instanceof Base_Model_ObtorLib_App_Core_Employee_Entity_Employee)) {
                throw new Base_Model_ObtorLib_App_Core_Employee_Exception(" Employee Employee Entity not initialized");
            } else {
                $objEmployee = new Base_Model_ObtorLib_App_Core_Employee_Dao_Employee();
                $objEmployee->employee = $this->employee;
                return $objEmployee->addEmployee();
            }
        } catch (Exception $ex) {
            throw new Base_Model_ObtorLib_App_Core_Employee_Exception($ex);
        }
    }

    /*
     * Update user employee
     * @return      : Integer ID / Null
     */

    public function updateEmployee() {
        try {
            if (!($this->employee instanceof Base_Model_ObtorLib_App_Core_Employee_Entity_Employee)) {
                throw new Base_Model_ObtorLib_App_Core_Employee_Exception(" Employee Employee Entity not initialized");
            } else {
                $objEmployee = new Base_Model_ObtorLib_App_Core_Employee_Dao_Employee();
                $objEmployee->employee = $this->employee;
                return $objEmployee->updateEmployee();
            }
        } catch (Exception $ex) {
            throw new Base_Model_ObtorLib_App_Core_Employee_Exception($ex);
        }
    }

    /*
     * Delete user employee
     * @return      : Integer ID / Null
     */

    public function deleteEmployee() {
        try {
            if (!($this->employee instanceof Base_Model_ObtorLib_App_Core_Employee_Entity_Employee)) {
                throw new Base_Model_ObtorLib_App_Core_Employee_Exception(" Employee Employee Entity not initialized");
            } else {
                $objEmployee = new Base_Model_ObtorLib_App_Core_Employee_Dao_Employee();
                $objEmployee->employee = $this->employee;
                return $objEmployee->deleteEmployee();
            }
        } catch (Exception $ex) {
            throw new Base_Model_ObtorLib_App_Core_Employee_Exception($ex);
        }
    }

    /*
     * Search user employees....
     * @return : Array of Employee Employees Entities...
     */

    public function search($limit = NULL) {
        try {
            if (!($this->employee instanceof Base_Model_ObtorLib_App_Core_Employee_Entity_Employee)) {
                throw new Base_Model_ObtorLib_App_Core_Employee_Exception(" Employee Employee Entity not initialized");
            } else {
                $objEmployee = new Base_Model_ObtorLib_App_Core_Employee_Dao_Employee();
                $objEmployee->employee = $this->employee;
                return $objEmployee->search($limit);
            }
        } catch (Exception $ex) {
            throw new Base_Model_ObtorLib_App_Core_Employee_Exception($ex);
        }
    }
    
    
    /*
     * Search user employees....
     * @return : Array of Employee Employees Entities...
     */

    public function searchCount() {
        try {
            if (!($this->employee instanceof Base_Model_ObtorLib_App_Core_Employee_Entity_Employee)) {
                throw new Base_Model_ObtorLib_App_Core_Employee_Exception(" Employee Employee Entity not initialized");
            } else {
                $objEmployee = new Base_Model_ObtorLib_App_Core_Employee_Dao_Employee();
                $objEmployee->employee = $this->employee;
                return $objEmployee->searchCount();
            }
        } catch (Exception $ex) {
            throw new Base_Model_ObtorLib_App_Core_Employee_Exception($ex);
        }
    }
    
    
        /*
     * Add new user employee
     * @return      : Integer ID / Null
     */

    public function uploadImage() {
        try {
            if (!($this->employee instanceof Base_Model_ObtorLib_App_Core_Employee_Entity_Employee)) {
                throw new Base_Model_ObtorLib_App_Core_Employee_Exception(" Employee Employee Entity not initialized");
            } else {
                $objEmployee = new Base_Model_ObtorLib_App_Core_Employee_Dao_Employee();
                $objEmployee->employee = $this->employee;
                return $objEmployee->uploadImage();
            }
        } catch (Exception $ex) {
            throw new Base_Model_ObtorLib_App_Core_Employee_Exception($ex);
        }
    }
    
    
    
           /*
     * Add new user employee
     * @return      : Integer ID / Null
     */

    public function updatePassword() {
        try {
            if (!($this->employee instanceof Base_Model_ObtorLib_App_Core_Employee_Entity_Employee)) {
                throw new Base_Model_ObtorLib_App_Core_Employee_Exception(" Employee Employee Entity not initialized");
            } else {
                $objEmployee = new Base_Model_ObtorLib_App_Core_Employee_Dao_Employee();
                $objEmployee->employee = $this->employee;
                return $objEmployee->updatePassword();
            }
        } catch (Exception $ex) {
            throw new Base_Model_ObtorLib_App_Core_Employee_Exception($ex);
        }
    }
    
    
           /*
     * Add new user employee
     * @return      : Integer ID / Null
     */

    public function generatePassword() {
        try {
            if (!($this->employee instanceof Base_Model_ObtorLib_App_Core_Employee_Entity_Employee)) {
                throw new Base_Model_ObtorLib_App_Core_Employee_Exception(" Employee Employee Entity not initialized");
            } else {
                $objEmployee = new Base_Model_ObtorLib_App_Core_Employee_Dao_Employee();
                $objEmployee->employee = $this->employee;
                return $objEmployee->generatePassword();
            }
        } catch (Exception $ex) {
            throw new Base_Model_ObtorLib_App_Core_Employee_Exception($ex);
        }
    }
    
    
      /*
     * doLogin()
     * @return      : Integer ID / Null
     */

    public function doLogin() {
        try {
            if (!($this->employee instanceof Base_Model_ObtorLib_App_Core_Employee_Entity_Employee)) {
                throw new Base_Model_ObtorLib_App_Core_Employee_Exception(" Employee Employee Entity not initialized");
            } else {
                $objEmployee = new Base_Model_ObtorLib_App_Core_Employee_Dao_Employee();
                $objEmployee->employee = $this->employee;
                return $objEmployee->doLogin();
            }
        } catch (Exception $ex) {
            throw new Base_Model_ObtorLib_App_Core_Employee_Exception($ex);
        }
    }
    
    
    public function getWorkingTime($staffId,$dateOn) {
        try {
            
            $objSettingService = new Base_Model_Lib_System_Service_Settings();
            // get attendance settings....paramater is setting id..
            $useCommonOfficeHours = $objSettingService->getItem('55');
            $UseEmployeesIndividual = $objSettingService->getItem('56');
            $officeWorkingTimeInfo = $objSettingService->getOfficeWorkingTime($dateOn);
            
            $dbDefaultAdapter = Zend_Db_Table_Abstract::getDefaultAdapter();
            
            // check which time base, we should use..., Common office hours or staff's working hours...
            if ($useCommonOfficeHours->getSettingValue() == 'Yes' && $UseEmployeesIndividual->getSettingValue() == 'No') {
                  $staff_actual_working_hrs = $officeWorkingTimeInfo;
                       // print("System is using common office hours for OnTime and Office..\n");
            } elseif ($useCommonOfficeHours->getSettingValue() == 'No' && $UseEmployeesIndividual->getSettingValue() == 'Yes') {
                        // get the staffs working time from the staff's profile...
                      //  print("System is using employees individual office hours for OnTime and Office..\n");
            } else {
                     //   print("OnTime or Office Time not found to process the attendance.");
            }
            
            $workingTime = array('day_name'=>$staff_actual_working_hrs['day_name'],
                'is_working_day'=>$staff_actual_working_hrs['is_working_day'],
                'on_time'=>$staff_actual_working_hrs['on_time'],
                'off_time'=>$staff_actual_working_hrs['off_time'],
                'opening_hours_in_day'=>$staff_actual_working_hrs['opening_hours_in_day']);
            
            return $workingTime;
            
        } catch (Exception $ex) {
            throw new Base_Model_ObtorLib_App_Core_Employee_Exception($ex);
        }
    }

}