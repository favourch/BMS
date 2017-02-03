<?php
/**
 * Created by PhpStorm.
 * Employee: ism-apac
 * Date: 8/7/14
 * Time: 3:26 PM
 */

class Base_Model_ObtorLib_App_Core_Employee_Service_AttendanceDailySummary  extends Base_Model_ObtorLib_Eav_Model_Service {

    public $attendanceDailySummary;

    /*
     * Get a attendanceDailySummary using id
     * @return      : Entity AttendanceDailySummary Object (Base_Model_ObtorLib_App_Core_Employee_Entity_AttendanceDailySummary)
     */

    public function getAttendanceDailySummary($id) {
        try {
            $objAttendanceDailySummary = new Base_Model_ObtorLib_App_Core_Employee_Dao_AttendanceDailySummary();
            $attendanceDailySummary = $objAttendanceDailySummary->getAttendanceDailySummary($id);
            return $attendanceDailySummary;
        } catch (Exception $e) {
            throw new Base_Model_ObtorLib_App_Core_Employee_Exception($e);
        }
    }

    /*
     * Add new attendanceDailySummary
     * @return      : Integer ID / Null
     */

    public function addAttendanceDailySummary() {
        try {
            if (!($this->attendanceDailySummary instanceof Base_Model_ObtorLib_App_Core_Employee_Entity_AttendanceDailySummary)) {
                throw new Base_Model_ObtorLib_App_Core_Employee_Exception(" AttendanceDailySummary Entity not initialized");
            } else {
                $objAttendanceDailySummary = new Base_Model_ObtorLib_App_Core_Employee_Dao_AttendanceDailySummary();
                $objAttendanceDailySummary->attendanceDailySummary = $this->attendanceDailySummary;
                return $objAttendanceDailySummary->addAttendanceDailySummary();
            }
        } catch (Exception $ex) {
            throw new Base_Model_ObtorLib_App_Core_Employee_Exception($ex);
        }
    }

    /*
     * Update attendanceDailySummary
     * @return      : Integer ID / Null
     */

    public function updateAttendanceDailySummary() {
        try {
            if (!($this->attendanceDailySummary instanceof Base_Model_ObtorLib_App_Core_Employee_Entity_AttendanceDailySummary)) {
                throw new Base_Model_ObtorLib_App_Core_Employee_Exception(" AttendanceDailySummary Entity not initialized");
            } else {
                $objAttendanceDailySummary = new Base_Model_ObtorLib_App_Core_Employee_Dao_AttendanceDailySummary();
                $objAttendanceDailySummary->attendanceDailySummary = $this->attendanceDailySummary;
                return $objAttendanceDailySummary->updateAttendanceDailySummary();
            }
        } catch (Exception $ex) {
            throw new Base_Model_ObtorLib_App_Core_Employee_Exception($ex);
        }
    }

    /*
     * Delete attendanceDailySummary
     * @return      : Integer ID / Null
     */

    public function deleteAttendanceDailySummary() {
        try {
            if (!($this->attendanceDailySummary instanceof Base_Model_ObtorLib_App_Core_Employee_Entity_AttendanceDailySummary)) {
                throw new Base_Model_ObtorLib_App_Core_Employee_Exception(" AttendanceDailySummary Entity not initialized");
            } else {
                $objAttendanceDailySummary = new Base_Model_ObtorLib_App_Core_Employee_Dao_AttendanceDailySummary();
                $objAttendanceDailySummary->attendanceDailySummary = $this->attendanceDailySummary;
                return $objAttendanceDailySummary->deleteAttendanceDailySummary();
            }
        } catch (Exception $ex) {
            throw new Base_Model_ObtorLib_App_Core_Employee_Exception($ex);
        }
    }

    /*
     * Search attendanceDailySummarys....
     * @return : Array of AttendanceDailySummarys Entities...
     */

    public function search() {
        try {
            if (!($this->attendanceDailySummary instanceof Base_Model_ObtorLib_App_Core_Employee_Entity_AttendanceDailySummary)) {
                throw new Base_Model_ObtorLib_App_Core_Employee_Exception(" AttendanceDailySummary Entity not initialized");
            } else {
                $objAttendanceDailySummary = new Base_Model_ObtorLib_App_Core_Employee_Dao_AttendanceDailySummary();
                $objAttendanceDailySummary->attendanceDailySummary = $this->attendanceDailySummary;
                return $objAttendanceDailySummary->search();
            }
        } catch (Exception $ex) {
            throw new Base_Model_ObtorLib_App_Core_Employee_Exception($ex);
        }
    }
    
    
    /*
     * Search attendanceDailySummarys....
     * @return : Array of AttendanceDailySummarys Entities...
     */

    public function generateSummary($dateOn) {
        try {
            
            // get all countries....
            $countryService         = new Base_Model_ObtorLib_App_Core_Catalog_Service_Country();
            $regionService          = new Base_Model_ObtorLib_App_Core_Catalog_Service_Region();
            $branchService          = new Base_Model_ObtorLib_App_Core_Catalog_Service_Branch();
            $departmentService      = new Base_Model_ObtorLib_App_Core_Catalog_Service_Department();
            $objAttendanceService = new Base_Model_ObtorLib_App_Core_Employee_Service_Attendance();
            
            $countryEntity  = new Base_Model_ObtorLib_App_Core_Catalog_Entity_Country();
            $countryService->country = $countryEntity;
            $countries = $countryService->search();
            
            foreach($countries As $cIndex=>$country){
                $countryId = $country->getId();  // country id
                
                $regionEntity  = new Base_Model_ObtorLib_App_Core_Catalog_Entity_Region();
                $regionEntity->setCountry($countryId);
                $regionService->region = $regionEntity;
                $regionList = $regionService->search();
                
                foreach($regionList As $rIndex=>$region){
                    
                    $regionId = $region->getId(); // region id
                    
                    $branchEntity  = new Base_Model_ObtorLib_App_Core_Catalog_Entity_Branch();
                    $branchEntity->setRegion($regionId);
                    $branchService->branch = $branchEntity;
                    $branchList = $branchService->search();
                    
                    foreach($branchList As $bIndex=>$branch){
                        
                        $branchId = $branch->getId(); // the branch id
                        
                        $departmentEntity  = new Base_Model_ObtorLib_App_Core_Catalog_Entity_Department();
                        $departmentEntity->setBranch($branchId);
                        $departmentService->department = $departmentEntity;
                        $departmentList = $departmentService->search();
                        
                        foreach($departmentList As $dIndex=>$department){
                            
                            $departmentId = $department->getId(); // the department id.
                            
                            // get all the staffs...........
                            $employeeService = new Base_Model_ObtorLib_App_Core_Employee_Service_Employee();
                            $employeeEntity = new Base_Model_ObtorLib_App_Core_Employee_Entity_Employee();
                            $employeeEntity->setCountry($countryId);
                            $employeeEntity->setRegion($regionId);
                            $employeeEntity->setBranch($branchId);
                            $employeeEntity->setDepartment($departmentId);
                            $employeeEntity->setEmployeeStatus('In-Service');
                            $employeeService->employee = $employeeEntity;
                            $totalStaffInService = $employeeService->searchCount();  // total staff in service..
                            
                            
                            $employeeService->employee = $employeeEntity;
                            $employeeInfo = $employeeService->search();
                            
                            $total_staff_on_duty = 0;
                            $total_staff_off_duty = 0;
                            $total_presented_staff = 0;
                            $total_presented_on_time = 0;
                            $total_presented_late = 0;
                            $total_presented_early_off = 0;
                            $total_absents = 0;
                            
                            foreach($employeeInfo As $eIndex=>$employee){
                                $staffId = $employee->getId();
                                $staffWorkingTimeInfo = $employeeService->getWorkingTime($staffId, $dateOn);
                                
                                $is_working_day = $staffWorkingTimeInfo['is_working_day'];
                                if($is_working_day == 'Yes'){
                                    $total_staff_on_duty = $total_staff_on_duty + 1;
                                    
                                    // get attendance information....
                                    $objAttendanceService = new Base_Model_ObtorLib_App_Core_Employee_Service_Attendance();
                                    $attendanceInformation = $objAttendanceService->getAttendanceByDateAndStaffId($dateOn, $staffId);
                                    if($attendanceInformation){
                                       $total_presented_staff = $total_presented_staff + 1;
                                       $isLateCome = $attendanceInformation->getIsLate();
                                       if($isLateCome == 'Yes'){
                                           $total_presented_late = $total_presented_late + 1;
                                       } else {
                                           $total_presented_on_time = $total_presented_on_time + 1;
                                       }
                                       
                                       $isEarlyOff = $attendanceInformation->getIsEarlyOff();
                                       if($isEarlyOff == 'Yes'){
                                           $total_presented_early_off = $total_presented_early_off + 1;
                                       }
                                       
                                    } else {
                                        $total_absents = $total_absents + 1;
                                    }
                                    
                                } else {
                                    $total_staff_off_duty = $total_staff_off_duty + 1;
                                }
                            }
                            
                            
                            // insert the attendance_daily_summary
                            $objAttendanceDailySummary = new Base_Model_ObtorLib_App_Core_Employee_Entity_AttendanceDailySummary();
                            $objAttendanceDailySummary->setDateOn($dateOn);
                            $objAttendanceDailySummary->setCountry($countryId);
                            $objAttendanceDailySummary->setRegion($regionId);
                            $objAttendanceDailySummary->setBranch($branchId);
                            $objAttendanceDailySummary->setDepartment($departmentId);
                            $objAttendanceDailySummary->setTotalStaffInService($totalStaffInService);
                            $objAttendanceDailySummary->setTotalStaffOnDuty($total_staff_on_duty);
                            $objAttendanceDailySummary->setTotalStaffOffDuty($total_staff_off_duty);
                            $objAttendanceDailySummary->setTotalPresentedStaff($total_presented_staff);
                            $objAttendanceDailySummary->setTotalPresentedOnTime($total_presented_on_time);
                            $objAttendanceDailySummary->setTotalPresentedLate($total_presented_late);
                            $objAttendanceDailySummary->setTotalPresentedEarlyOff($total_presented_early_off);
                            $objAttendanceDailySummary->setTotalAbsents($total_absents);
                            $this->attendanceDailySummary = $objAttendanceDailySummary;
                            $this->addAttendanceDailySummary();
                            
                            print("Done : ".$departmentId." - ".$dateOn."\n");
  
                        }
                        
                        
                        
                        
                    }
                    
                 
                }
            }
            
            
            
        } catch (Exception $ex) {
            throw new Base_Model_ObtorLib_App_Core_Employee_Exception($ex);
        }
    }
    

}