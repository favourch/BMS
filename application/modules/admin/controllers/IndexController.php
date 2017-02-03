<?php

class Admin_IndexController extends Base_Model_ObtorLib_App_Admin_Controller {


    public function init() {
        parent::init();
    }

    /**
     * The default action - show the home page
     */
    public function indexAction() {
        try {
            $pageHeading = "Dashboard";
            $this->view->page_heading = $pageHeading;
            $this->view->data_page = "dashboard";
            
            $systemDateToday = $this->getSystemDate();
            
            // attendance summary report...
            $country = '';
            $region = '';
            $branch = '';
            $department = '';
            
            $objAttendanceDailySummaryService = new Base_Model_ObtorLib_App_Core_Employee_Service_AttendanceDailySummary();
            $objAttendanceDailySummaryEntity = new Base_Model_ObtorLib_App_Core_Employee_Entity_AttendanceDailySummary();
            $objAttendanceDailySummaryEntity->setDateOn($systemDateToday);
            $objAttendanceDailySummaryEntity->setCountry($country);
            $objAttendanceDailySummaryEntity->setRegion($region);
            $objAttendanceDailySummaryEntity->setBranch($branch);
            $objAttendanceDailySummaryEntity->setDepartment($department);
            $objAttendanceDailySummaryService->attendanceDailySummary = $objAttendanceDailySummaryEntity;
            $attendanceDailySummary = $objAttendanceDailySummaryService->search();
            
            $totalStaffInService = 0;
            $onDutyToday = 0;
            $offDutyToday = 0;
            
            foreach($attendanceDailySummary As $ds=>$attendanceSummary){
                $totalStaffInService = $totalStaffInService + $attendanceSummary->getTotalStaffInService();
                $onDutyToday = $onDutyToday + $attendanceSummary->getTotalStaffOnDuty();
                $offDutyToday = $offDutyToday + $attendanceSummary->getTotalStaffOffDuty();
            }
            $this->view->totalStaffInService = $totalStaffInService;
            $this->view->onDutyToday = $onDutyToday;
            $this->view->offDutyToday = $offDutyToday;
            
            
            $objTaskEntity = new Base_Model_ObtorLib_App_Core_Pms_Entity_Task();
            $objTaskService = new Base_Model_ObtorLib_App_Core_Pms_Service_Task();
            $objTaskEntity->setTaskType('immediate');
            $objTaskService->task = $objTaskEntity;
            $totalImmediateTasks = $objTaskService->searchCount();
            $this->view->totalImmediateTasks = $totalImmediateTasks;
            
            $objTaskEntity = new Base_Model_ObtorLib_App_Core_Pms_Entity_Task();
            $objTaskEntity->setTaskType('urgent');
            $objTaskService->task = $objTaskEntity;
            $totalUrgentTasks = $objTaskService->searchCount();
            $this->view->totalUrgentTasks = $totalUrgentTasks;
            
            // total tasks on progress....
            $total_tasks_on_progress = $objTaskService->getTotalOnProgressTasks();
            $this->view->total_tasks_on_progress = $total_tasks_on_progress;
            
            $objEmployeeSalaryPaymentService = new Base_Model_ObtorLib_App_Core_Employee_Service_EmployeeSalaryPayment();
            $salaryYear = Date('Y');
            $salaryMonth = NULL;
            $salaryStatus = 'Paid';
            $totalSalaryThisYear = $objEmployeeSalaryPaymentService->getTotalSalary($salaryYear,$salaryMonth,$salaryStatus);
            $this->view->totalSalaryThisYear = $totalSalaryThisYear;
            
            $salaryMonth = '2';//Date('m');
            
            $lastMonthInt = $salaryMonth-1;
            $totalSalaryLastMonth = $objEmployeeSalaryPaymentService->getTotalSalary($salaryYear,$lastMonthInt,$salaryStatus);
            $this->view->totalSalaryLastMonth = $totalSalaryLastMonth;
            
            
            $totalSalaryThisMonth = $objEmployeeSalaryPaymentService->getTotalSalary($salaryYear,$salaryMonth);
            $this->view->totalSalaryThisMonth = $totalSalaryThisMonth;
            
            // get total assets value.....
            $objAssetsService = new Base_Model_ObtorLib_App_Core_Asset_Service_Asset();
            $purchasedDateFrom = NULL;
            $purchasedDateTo = NULL;
            $execuldeStatus = array('assets-out-of-use','assets-sold');
            $totalAssetsValue = $objAssetsService->getTotalAssetsValue($purchasedDateFrom, $purchasedDateTo, $execuldeStatus); 
            $this->view->totalAssetsValue =  $totalAssetsValue;
            
            $execuldeStatus = array('assets-in-use','assets-ready-to-use','assets-waiting-for-service','assets-sent-out-for-service','assets-sold');
            $totalAssetsValueOutOfUse = $objAssetsService->getTotalAssetsValue($purchasedDateFrom, $purchasedDateTo, $execuldeStatus); 
            $this->view->totalAssetsValueOutOfUse =  $totalAssetsValueOutOfUse;
            
            $execuldeStatus = NULL;
            $strdate = Date('Y').'-01'.'-01';
            $endDate = Date('Y').'-12'.'-01';
            $purchasedDateFrom = $this->makeStartDate($strdate);
            $purchasedDateTo = $this->makeEndDate($endDate);
            $totalNewAssets = $objAssetsService->getTotalAssetsValue($purchasedDateFrom, $purchasedDateTo, $execuldeStatus); 
            $this->view->totalNewAssets =  $totalNewAssets;
            
            $thisWeekStartDate = '2014-01-01';//$this->getThisWeekStartDate();
            $thisWeekEndDate = '2014-01-08';//$this->getThisWeekEndDate();
            
            $graphArrDates = array();
            $graphArrTotalStaffInService = array();
            $graphArrOnDutyToday = array();
            $graphArrOffDutyToday = array();
            $graphArrTotalPresentedOnTime = array();
            $graphArrTotalPresentedLate = array();
            $graphArrTotalPresentedEarlyOff = array();
            
            $datesBetweenTwoDates = $this->getDatesBetweenTwoDates($thisWeekStartDate, $thisWeekEndDate);

            foreach($datesBetweenTwoDates As $dIndex=>$dateOn){
            
                $objAttendanceDailySummaryService = new Base_Model_ObtorLib_App_Core_Employee_Service_AttendanceDailySummary();
                $objAttendanceDailySummaryEntity = new Base_Model_ObtorLib_App_Core_Employee_Entity_AttendanceDailySummary();
                $objAttendanceDailySummaryEntity->setDateOn($dateOn);
                $objAttendanceDailySummaryEntity->setCountry($country);
                $objAttendanceDailySummaryEntity->setRegion($region);
                $objAttendanceDailySummaryEntity->setBranch($branch);
                $objAttendanceDailySummaryEntity->setDepartment($department);
                $objAttendanceDailySummaryService->attendanceDailySummary = $objAttendanceDailySummaryEntity;
                $attendanceDailySummaryGraphData = $objAttendanceDailySummaryService->search();
            
                $graphTotalStaffInService = 0;
                $graphOnDutyToday = 0;
                $graphOffDutyToday = 0;
                $graphTotalPresentedOnTime = 0;
                $graphTotalPresentedLate = 0;
                $graphTotalPresentedEarlyOff = 0;
                
            
                foreach($attendanceDailySummaryGraphData As $ds=>$attendanceGraphData){
                    $graphTotalStaffInService = $graphTotalStaffInService + $attendanceGraphData->getTotalStaffInService();
                    $graphOnDutyToday = $graphOnDutyToday + $attendanceGraphData->getTotalStaffOnDuty();
                    $graphOffDutyToday = $graphOffDutyToday + $attendanceGraphData->getTotalStaffOffDuty();
                    $graphTotalPresentedOnTime = $graphTotalPresentedOnTime + $attendanceGraphData->getTotalStaffOffDuty();
                    $graphTotalPresentedLate = $graphTotalPresentedLate + $attendanceGraphData->getTotalPresentedLate();
                    $graphTotalPresentedEarlyOff = $graphTotalPresentedEarlyOff + $attendanceGraphData->getTotalPresentedEarlyOff();
                    
                }
                
                array_push($graphArrDates, $dateOn);
                array_push($graphArrTotalStaffInService, $graphTotalStaffInService);
                array_push($graphArrOnDutyToday, $graphOnDutyToday);
                array_push($graphArrOffDutyToday, $graphOffDutyToday);
                
                array_push($graphArrTotalPresentedOnTime, $graphTotalPresentedOnTime);
                array_push($graphArrTotalPresentedLate, $graphTotalPresentedLate);
                array_push($graphArrTotalPresentedEarlyOff, $graphTotalPresentedEarlyOff);
                
            }
            
            $weekAttendanceSummaryDates = implode(',', $graphArrDates);
            $weekAttendanceTotalStaffInService = implode(',', $graphArrTotalStaffInService);
            $weekAttendanceOnDutyToday = implode(',', $graphArrOnDutyToday);
            $weekAttendanceOffDutyToday = implode(',', $graphArrOffDutyToday);
            
            $weekTotalPresentedOnTime = implode(',', $graphArrTotalPresentedOnTime);
            $weekTotalPresentedLate = implode(',', $graphArrTotalPresentedLate);
            $weekTotalPresentedEarlyOff = implode(',', $graphArrTotalPresentedEarlyOff);
            
            
          
            $this->view->weekAttendanceSummaryDates = $weekAttendanceSummaryDates;
            $this->view->weekAttendanceTotalStaffInService = $weekAttendanceTotalStaffInService;
            $this->view->weekAttendanceOnDutyToday = $weekAttendanceOnDutyToday;
            $this->view->weekAttendanceOffDutyToday = $weekAttendanceOffDutyToday;
            $this->view->weekTotalPresentedOnTime = $weekTotalPresentedOnTime;
            $this->view->weekTotalPresentedLate = $weekTotalPresentedLate;
            $this->view->weekTotalPresentedEarlyOff = $weekTotalPresentedEarlyOff;
            
            
            $objTaskEntity = new Base_Model_ObtorLib_App_Core_Pms_Entity_Task();
            $objTaskService = new Base_Model_ObtorLib_App_Core_Pms_Service_Task();
            $objTaskService->task = $objTaskEntity;
            $limit = " LIMIT 0,10";
            $objTaskService->task = $objTaskEntity;
            $pendingTasksInfo = $objTaskService->search($limit);
            $this->view->taskInformation = $pendingTasksInfo;
            
             // get all the toDoList...
                $status = 'Active';
                $limit = ' LIMIT 0,10';
                $toDoListService = new Base_Model_ObtorLib_App_Core_Crm_Service_ToDoList();
                $toDoListEntity = new Base_Model_ObtorLib_App_Core_Crm_Entity_ToDoList();
                $toDoListEntity->setAddedByUserObject('Admin');
                $toDoListEntity->setStatus($status);
                $toDoListEntity->setAddedBy($this->getUserId());
                $toDoListService->toDoList = $toDoListEntity;
                $toDoListInfo = $toDoListService->search($limit);
                $this->view->toDoListInfo = $toDoListInfo;

        } catch (Exception $ex) {
            throw new Exception('<ERROR>' . $ex->getMessage() . "\n");
        }
    }

}
