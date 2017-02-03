<?php

class Admin_WorkingTimeController extends Base_Model_ObtorLib_App_Admin_Controller {

    public function init() {
        parent::init();
    }

    /**
     * The default action - show the home page
     */
    public function indexAction() {
        try {
            $pageHeading = "Working-Time";
            $this->view->page_heading = $pageHeading;
            $this->view->data_page = "tables";
            
            $relId = $this->_request->getParam('rel-id');
            // get all the professional experiences for the selected staff ...
            $employeeWorkingScheduleEntity  = new Base_Model_ObtorLib_App_Core_Employee_Entity_EmployeeWorkingSchedule();
            $employeeWorkingScheduleService  = new Base_Model_ObtorLib_App_Core_Employee_Service_EmployeeWorkingSchedule();
            $employeeWorkingScheduleEntity->setEmployeeId($relId);
            $employeeWorkingScheduleService->employeeWorkingSchedule = $employeeWorkingScheduleEntity;
            $employeeWorkingSchedule = $employeeWorkingScheduleService->search();
            $this->view->employeeWorkingSchedule = $employeeWorkingSchedule;
            
            $this->view->relId = $relId;
            
            
        } catch (Exception $ex) {
            throw new Exception('<ERROR>' . $ex->getMessage() . "\n");
        }
    }

    /**
     * The add action
     */
    public function addAction() {
        try {
            $pageHeading = "Add-New-Working-Time";
            $this->view->page_heading = $pageHeading;
            $this->view->data_page = "forms";

           // get all the professional experiences for the selected staff ...
            $employeeWorkingTimeEntity  = new Base_Model_ObtorLib_App_Core_Employee_Entity_EmployeeWorkingTime();
            $employeeWorkingTimeService  = new Base_Model_ObtorLib_App_Core_Employee_Service_EmployeeWorkingTime();
            
            $employeeWorkingScheduleEntity  = new Base_Model_ObtorLib_App_Core_Employee_Entity_EmployeeWorkingSchedule();
            $employeeWorkingScheduleService  = new Base_Model_ObtorLib_App_Core_Employee_Service_EmployeeWorkingSchedule();
            
            if ($this->_request->isPost()) {
                
                $relId = $this->_request->getParam('rel-id');
                $weekDays = $this->_request->getParam('txtWeekDays');
                $onTimes  = $this->_request->getParam('txtOnTime');
                $offTimes  = $this->_request->getParam('txtOffTime');
                $isWorkingDay  = $this->_request->getParam('cmbIsWorking');
                $expectedWorkingHours = $this->_request->getParam('cmbWorkingHours');
                
                $effectiveFrom = $this->_request->getParam('txtEffectiveFrom');
                $isActiveCurrently = $this->_request->getParam('cmbIsActiveCurrently');
                
                $employeeWorkingScheduleEntity->setEffectiveFromDate($effectiveFrom);
                $employeeWorkingScheduleEntity->setEmployeeId($relId);
                $employeeWorkingScheduleEntity->setIsActive($isActiveCurrently);
                $employeeWorkingScheduleService->employeeWorkingSchedule = $employeeWorkingScheduleEntity;
                $scheduleId = $employeeWorkingScheduleService->addEmployeeWorkingSchedule();

                if($scheduleId != ""){
                    foreach($weekDays As $wIndex=>$workingDay){

                            $weekDay = $weekDays[$wIndex];
                            $onTime  = $onTimes[$wIndex];
                            $offTime  = $offTimes[$wIndex];
                            $isWorking  = $isWorkingDay[$wIndex];
                            $expectedWorkingHr = $expectedWorkingHours[$wIndex];

                            $employeeWorkingTimeEntity->setIsWorking($isWorking);
                            $employeeWorkingTimeEntity->setWeekDay($weekDay);
                            $employeeWorkingTimeEntity->setOnTime($onTime);
                            $employeeWorkingTimeEntity->setOffTime($offTime);
                            $employeeWorkingTimeEntity->setSchedule($scheduleId);
                            $employeeWorkingTimeEntity->setExpectedWorkingHours($expectedWorkingHr);
                            $employeeWorkingTimeService->employeeWorkingTime = $employeeWorkingTimeEntity;
                            $workingTimeId = $employeeWorkingTimeService->addEmployeeWorkingTime();
                    }
          
               $this->_redirect("/admin/working-time/?rel-id=".$relId."&action-status=updated");
                } else {
                    $this->_redirect("/admin/working-time/?rel-id=".$relId."&action-status=failed");
                }
               
            } else {
                $weekDays = $this->getWeekDays();
                $this->view->weekDays = $weekDays;
            }
        } catch (Exception $ex) {
            throw new Exception('<ERROR>' . $ex->getMessage() . "\n");
        }
    }

    /**
     * The add action
     */
    public function editAction() {
        try {
            $pageHeading = "Add-New-Working-Time";
            $this->view->page_heading = $pageHeading;
            $this->view->data_page = "forms";

           // get all the professional experiences for the selected staff ...
            $employeeWorkingTimeEntity  = new Base_Model_ObtorLib_App_Core_Employee_Entity_EmployeeWorkingTime();
            $employeeWorkingTimeService  = new Base_Model_ObtorLib_App_Core_Employee_Service_EmployeeWorkingTime();
            
            $employeeWorkingScheduleEntity  = new Base_Model_ObtorLib_App_Core_Employee_Entity_EmployeeWorkingSchedule();
            $employeeWorkingScheduleService  = new Base_Model_ObtorLib_App_Core_Employee_Service_EmployeeWorkingSchedule();
            
            if ($this->_request->isPost()) {
                
                $relId = $this->_request->getParam('rel-id');
                $scheduleId = $this->_request->getParam('id');
                $weekDayIds = $this->_request->getParam('txtWeekDayId');
                $weekDays = $this->_request->getParam('txtWeekDays');
                $onTimes  = $this->_request->getParam('txtOnTime');
                $offTimes  = $this->_request->getParam('txtOffTime');
                $isWorkingDay  = $this->_request->getParam('cmbIsWorking');
                $expectedWorkingHours = $this->_request->getParam('cmbWorkingHours');
                
                $effectiveFrom = $this->_request->getParam('txtEffectiveFrom');
                $isActiveCurrently = $this->_request->getParam('cmbIsActiveCurrently');
                
                $employeeWorkingScheduleEntity->setId($scheduleId);
                $employeeWorkingScheduleEntity->setEffectiveFromDate($effectiveFrom);
                $employeeWorkingScheduleEntity->setEmployeeId($relId);
                $employeeWorkingScheduleEntity->setIsActive($isActiveCurrently);
                $employeeWorkingScheduleService->employeeWorkingSchedule = $employeeWorkingScheduleEntity;
                $isUpdated = $employeeWorkingScheduleService->updateEmployeeWorkingSchedule();
                $isUpdated = true;
                if($isUpdated){
                    foreach($weekDays As $wIndex=>$workingDay){

                            $weekDayId = $weekDayIds[$wIndex];
                            $weekDay = $weekDays[$wIndex];
                            $onTime  = $onTimes[$wIndex];
                            $offTime  = $offTimes[$wIndex];
                            $isWorking  = $isWorkingDay[$wIndex];
                            $expectedWorkingHr = $expectedWorkingHours[$wIndex];

                            $employeeWorkingTimeEntity->setId($weekDayId);
                            $employeeWorkingTimeEntity->setIsWorking($isWorking);
                            $employeeWorkingTimeEntity->setWeekDay($weekDay);
                            $employeeWorkingTimeEntity->setOnTime($onTime);
                            $employeeWorkingTimeEntity->setOffTime($offTime);
                            $employeeWorkingTimeEntity->setSchedule($scheduleId);
                            $employeeWorkingTimeEntity->setExpectedWorkingHours($expectedWorkingHr);
                            $employeeWorkingTimeService->employeeWorkingTime = $employeeWorkingTimeEntity;
                            $workingTimeId = $employeeWorkingTimeService->updateEmployeeWorkingTime();
                    }
          
                    $this->_redirect("/admin/working-time/?rel-id=".$relId."&action-status=updated");
                } else {
                    $this->_redirect("/admin/working-time/?rel-id=".$relId."&action-status=failed");
                }
               
            } else {
                $weekDays = $this->getWeekDays();
                $this->view->weekDays = $weekDays;
                
                $workingScheduleId = $this->_request->getParam('id');
                $workingScheduleInformation = $employeeWorkingScheduleService->getEmployeeWorkingSchedule($workingScheduleId);
                $this->view->workingScheduleInformation = $workingScheduleInformation;
                
                $workingDays = $workingScheduleInformation->getWeekDays();
                $this->view->workingDays = $workingDays;
                
                
            }
        } catch (Exception $ex) {
            throw new Exception('<ERROR>' . $ex->getMessage() . "\n");
        }
    }
   

    

    /**
     * The add action
     */
    public function deleteAction() {
        try {
            $pageHeading = "Delete-Country";
            $this->view->page_heading = $pageHeading;
            $this->view->data_page = "forms";

            $relId = $this->_request->getParam('rel-id');
            $relObject = $this->_request->getParam('rel-object');
            $workingScheduleId = $this->_request->getParam('id');
            
            // get all the professional experiences for the selected staff ...
            $employeeWorkingScheduleEntity  = new Base_Model_ObtorLib_App_Core_Employee_Entity_EmployeeWorkingSchedule();
            $employeeWorkingScheduleService  = new Base_Model_ObtorLib_App_Core_Employee_Service_EmployeeWorkingSchedule();
            
            $workingScheduleInformation    = $employeeWorkingScheduleService->getEmployeeWorkingSchedule($workingScheduleId);
            
            $workingWeekDays = $workingScheduleInformation->getWeekDays();
            // delete the working days..
            $employeeWorkingTimeService  = new Base_Model_ObtorLib_App_Core_Employee_Service_EmployeeWorkingTime();
            foreach($workingWeekDays As $wIndex=>$workingDay){
                $employeeWorkingTimeEntity  = new Base_Model_ObtorLib_App_Core_Employee_Entity_EmployeeWorkingTime();
                $workingDayId = $workingDay->getId();
                $employeeWorkingTimeEntity->setId($workingDayId);
                $employeeWorkingTimeService->employeeWorkingTime = $employeeWorkingTimeEntity;
                $employeeWorkingTimeService->deleteEmployeeWorkingTime();
            }
            $employeeWorkingScheduleEntity->setId($workingScheduleId);
            $employeeWorkingScheduleService->employeeWorkingSchedule = $employeeWorkingScheduleEntity;
            $isDeleted = $employeeWorkingScheduleService->deleteEmployeeWorkingSchedule();
            
            if ($isDeleted) {
                    $this->_redirect("/admin/working-time/?rel-id=".$relId."&rel-object=".$relObject."&action-status=deleted");
                } else {
                    $this->_redirect("/admin/working-time/?rel-id=".$relId."&rel-object=".$relObject."&action-status=failed");
                }
            
        } catch (Exception $ex) {
            throw new Exception('<ERROR>' . $ex->getMessage() . "\n");
        }
    }

}
