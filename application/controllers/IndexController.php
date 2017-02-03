<?php

class IndexController extends Base_Model_ObtorLib_App_Staff_Controller
{

	public function init()
	{
            parent::init();
	}

	public function indexAction()
	{
            try {
            $pageHeading = "Dashboard";
            $this->view->page_heading = $pageHeading;
            $this->view->data_page = "tables";
            
            // get all pending tasks....
            
            $staffId = $this->getStaffUserId();
            $objTaskEntity = new Base_Model_ObtorLib_App_Core_Pms_Entity_Task();
            $objTaskService = new Base_Model_ObtorLib_App_Core_Pms_Service_Task();
            $objTaskEntity->setAssignedTo($staffId);
            $objTaskService->task = $objTaskEntity;
            $limit = " LIMIT 0,5";
            $objTaskService->task = $objTaskEntity;
            $tasksInfo = $objTaskService->search($limit);
            $this->view->taskInformation = $tasksInfo;
            
            
            // leave applications....
             $employee = $this->getStaffUserId();
             $objLeaveEntity = new Base_Model_ObtorLib_App_Core_Employee_Entity_Leave();
             $objLeaveService = new Base_Model_ObtorLib_App_Core_Employee_Service_Leave();
             $objLeaveEntity->setEmployee($employee);
             $objLeaveService->leave = $objLeaveEntity;
             $leaveInformations = $objLeaveService->search();
             $this->view->leaveInformations = $leaveInformations;
            
             
             $objAttendanceEntity = new Base_Model_ObtorLib_App_Core_Employee_Entity_Attendance();
            $objAttendanceService = new Base_Model_ObtorLib_App_Core_Employee_Service_Attendance();
            $objAttendanceEntity->setEmployee($employee);
            $objAttendanceService->attendance = $objAttendanceEntity;
            $attendanceInformation = $objAttendanceService->search(" LIMIT 0,5");
            $this->view->attendanceInformation = $attendanceInformation;
            
            
             $status = 'Active';
                $limit = ' LIMIT 0,10';
                $toDoListService = new Base_Model_ObtorLib_App_Core_Crm_Service_ToDoList();
                $toDoListEntity = new Base_Model_ObtorLib_App_Core_Crm_Entity_ToDoList();
                $toDoListEntity->setAddedByUserObject('Staff');
                $toDoListEntity->setStatus($status);
                $toDoListEntity->setAddedBy($this->getStaffUserId());
                $toDoListService->toDoList = $toDoListEntity;
                $toDoListInfo = $toDoListService->search($limit);
                $this->view->toDoListInfo = $toDoListInfo;
            
             } catch (Exception $ex) {
            throw new Exception('<ERROR>' . $ex->getMessage() . "\n");
        }
	}


}