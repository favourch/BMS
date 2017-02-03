<?php

class Admin_TaskController extends Base_Model_ObtorLib_App_Admin_Controller {

    public function init() {
        parent::init();
    }

    /**
     * The default action - show the home page
     */
    public function indexAction() {
        try {
            $pageHeading = "Tasks";
            $this->view->page_heading = $pageHeading;
            $this->view->data_page = "tables";
            
            $name = $this->_request->getParam('name');
            $projectId = $this->_request->getParam('projectId');
            $assignedTo = $this->_request->getParam('assignedTo');
            $currentStatus = $this->_request->getParam('currentStatus');
            $taskType = $this->_request->getParam('taskType');
            $priority = $this->_request->getParam('priority');
             
            // get all the Task information...
            $objTaskEntity = new Base_Model_ObtorLib_App_Core_Pms_Entity_Task();
            $objTaskService = new Base_Model_ObtorLib_App_Core_Pms_Service_Task();
            
            $objTaskEntity->setName($name);
            $objTaskEntity->setProjectId($projectId);
            $objTaskEntity->setAssignedTo($assignedTo);
            $objTaskEntity->setCurrentStatus($currentStatus);
            $objTaskEntity->setTaskType($taskType);
            $objTaskEntity->setPriority($priority);
            
            $objTaskService->task = $objTaskEntity;
            
            $objPaggination = new Base_Model_ObtorLib_Base_Lib_Paggination();
            $page = $this->_getParam('page', 1);
            $objPaggination->CurrentPage = $page;
            $objPaggination->TotalResults = $objTaskService->searchCount();
            $paginationData = $objPaggination->getPaggingData();
            $pageLimit1 = $paginationData['MYSQL_LIMIT1'];
            $pageLimit2 = $paginationData['MYSQL_LIMIT2'];

            $limit = " LIMIT $pageLimit1,$pageLimit2";


            $objTaskService->task = $objTaskEntity;
            $tasksInfo = $objTaskService->search($limit);
            $this->view->taskInformation = $tasksInfo;
            
            $this->view->pageNum = $page;
            $this->view->rowsPerPage = $objPaggination->ResultsPerPage;
            $this->view->paggination = $objPaggination;
                
        } catch (Exception $ex) {
            throw new Exception('<ERROR>' . $ex->getMessage() . "\n");
        }
    }

    /**
     * The add action
     */
    public function addAction() {
        try {
            $pageHeading = "Add-New-Task";
            $this->view->page_heading = $pageHeading;
            $this->view->data_page = "forms";


            if ($this->_request->isPost()) {
                $id = $this->_request->getParam('txtId');
                $name = $this->_request->getParam('txtName');
                $description = $this->_request->getParam('txtDescription');
                $taskType = $this->_request->getParam('txtTaskType');
                $priority = $this->_request->getParam('txtPriority');
                $progress = $this->_request->getParam('txtProgress');
                $allocatedHours = $this->_request->getParam('txtAllocatedHours');
                $hoursSpent = $this->_request->getParam('txtHoursSpent');
                $startDate = $this->_request->getParam('txtStartDate');
                $endDate = $this->_request->getParam('txtEndDate');
                $projectId = $this->_request->getParam('txtProjectId');
                $assignedTo = $this->_request->getParam('txtAssignedTo');
                $currentStatus = $this->_request->getParam('txtCurrentStatus');
                
                $objTaskEntity = new Base_Model_ObtorLib_App_Core_Pms_Entity_Task();
                $objTaskService = new Base_Model_ObtorLib_App_Core_Pms_Service_Task();
                $objTaskEntity->setId($id);
                $objTaskEntity->setName($name);
                $objTaskEntity->setDescription($description);
                $objTaskEntity->setTaskType($taskType);
                $objTaskEntity->setPriority($priority);
                $objTaskEntity->setProgress($progress);
                $objTaskEntity->setAllocatedHours($allocatedHours);
                $objTaskEntity->setHoursSpent($hoursSpent);
                $objTaskEntity->setStartDate($startDate);
                $objTaskEntity->setEndDate($endDate);
                $objTaskEntity->setProjectId($projectId);
                $objTaskEntity->setAssignedTo($assignedTo);
                $objTaskEntity->setCurrentStatus($currentStatus);
                $objTaskService->task = $objTaskEntity;
                $taskId = $objTaskService->addTask();
                if ($taskId) {
                    $this->_redirect("/admin/task/?action-status=updated");
                } else {
                    $this->_redirect("/admin/task/?action-status=failed");
                }
            
            
            } else {
                
                $taskPriorityList = $this->getPmsPriorityList();
                $taskTypeList = $this->getTaskTypeList();
                $taskStatusList = $this->getPmsStatusList();
                
                $this->view->taskPriorityList = $taskPriorityList;
                $this->view->taskTypeList = $taskTypeList;
                $this->view->taskStatusList = $taskStatusList;
                
                // get all the user all projects...
                $projectService = new Base_Model_ObtorLib_App_Core_Pms_Service_Project();
                $projectEntity = new Base_Model_ObtorLib_App_Core_Pms_Entity_Project();
                $projectService->project = $projectEntity;
                $limit = NULL;
                $projectService->project = $projectEntity;
                $projectInfo = $projectService->search($limit);
                $this->view->projectInfo = $projectInfo;
                
                // get all the user all users...
                $employeeStatus = 'In-Service';
                $employeeService = new Base_Model_ObtorLib_App_Core_Employee_Service_Employee();
                $employeeEntity = new Base_Model_ObtorLib_App_Core_Employee_Entity_Employee();
                $employeeEntity->setEmployeeStatus($employeeStatus);
                $employeeService->employee = $employeeEntity;
                $limit = NULL;
                $employeeService->employee = $employeeEntity;
                $employeeInfo = $employeeService->search($limit);
                $this->view->employeeInfo = $employeeInfo;
                
                
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
            $pageHeading = "Edit-Task";
            $this->view->page_heading = $pageHeading;
            $this->view->data_page = "forms";

            $objTaskService = new Base_Model_ObtorLib_App_Core_Pms_Service_Task();

            if ($this->_request->isPost()) {
                $id = $this->_request->getParam('id');
                $name = $this->_request->getParam('txtName');
                $description = $this->_request->getParam('txtDescription');
                $taskType = $this->_request->getParam('txtTaskType');
                $priority = $this->_request->getParam('txtPriority');
                $progress = $this->_request->getParam('txtProgress');
                $allocatedHours = $this->_request->getParam('txtAllocatedHours');
                $hoursSpent = $this->_request->getParam('txtHoursSpent');
                $startDate = $this->_request->getParam('txtStartDate');
                $endDate = $this->_request->getParam('txtEndDate');
                $projectId = $this->_request->getParam('txtProjectId');
                $assignedTo = $this->_request->getParam('txtAssignedTo');
                $currentStatus = $this->_request->getParam('txtCurrentStatus');
                
                $objTaskEntity = new Base_Model_ObtorLib_App_Core_Pms_Entity_Task();
                
                $objTaskEntity->setId($id);
                $objTaskEntity->setName($name);
                $objTaskEntity->setDescription($description);
                $objTaskEntity->setTaskType($taskType);
                $objTaskEntity->setPriority($priority);
                $objTaskEntity->setProgress($progress);
                $objTaskEntity->setAllocatedHours($allocatedHours);
                $objTaskEntity->setHoursSpent($hoursSpent);
                $objTaskEntity->setStartDate($startDate);
                $objTaskEntity->setEndDate($endDate);
                $objTaskEntity->setProjectId($projectId);
                $objTaskEntity->setAssignedTo($assignedTo);
                $objTaskEntity->setCurrentStatus($currentStatus);
                $objTaskService->task = $objTaskEntity;
                $isUpdated = $objTaskService->updateTask();
                if ($isUpdated) {
                    $this->_redirect("/admin/task/?action-status=updated");
                } else {
                    $this->_redirect("/admin/task/?action-status=failed");
                }
            
            
            }else {
                
                $taskId = $this->_request->getParam('id');
                $taskInformation = $objTaskService->getTask($taskId);
                $this->view->taskInformation = $taskInformation;
                
                $taskPriorityList = $this->getPmsPriorityList();
                $taskTypeList = $this->getTaskTypeList();
                $taskStatusList = $this->getPmsStatusList();
                
                $this->view->taskPriorityList = $taskPriorityList;
                $this->view->taskTypeList = $taskTypeList;
                $this->view->taskStatusList = $taskStatusList;
                
                // get all the user all projects...
                $projectService = new Base_Model_ObtorLib_App_Core_Pms_Service_Project();
                $projectEntity = new Base_Model_ObtorLib_App_Core_Pms_Entity_Project();
                $projectService->project = $projectEntity;
                $limit = NULL;
                $projectService->project = $projectEntity;
                $projectInfo = $projectService->search($limit);
                $this->view->projectInfo = $projectInfo;
                
               // get all the user all users...
                $employeeStatus = 'In-Service';
                $employeeService = new Base_Model_ObtorLib_App_Core_Employee_Service_Employee();
                $employeeEntity = new Base_Model_ObtorLib_App_Core_Employee_Entity_Employee();
                $employeeEntity->setEmployeeStatus($employeeStatus);
                $employeeService->employee = $employeeEntity;
                $limit = NULL;
                $employeeService->employee = $employeeEntity;
                $employeeInfo = $employeeService->search($limit);
                $this->view->employeeInfo = $employeeInfo;
                
            }

            
        } catch (Exception $ex) {
            throw new Exception('<ERROR>' . $ex->getMessage() . "\n");
        }
    }

    
/**
     * The add action
     */
    public function viewAction() {
        try {
            $pageHeading = "View-Task";
            $this->view->page_heading = $pageHeading;
            $this->view->data_page = "forms";

            $objTaskService = new Base_Model_ObtorLib_App_Core_Pms_Service_Task();
            $taskId = $this->_request->getParam('id');
            $taskInformation = $objTaskService->getTask($taskId);
            $this->view->taskInformation = $taskInformation;
            
        } catch (Exception $ex) {
            throw new Exception('<ERROR>' . $ex->getMessage() . "\n");
        }
    }
    
    /**
     * The delete action
     */
    public function deleteAction() {
        try {
            $pageHeading = "Delete-Task";
            $this->view->page_heading = $pageHeading;
            $this->view->data_page = "forms";

            // delete task....
            $objTaskEntity = new Base_Model_ObtorLib_App_Core_Pms_Entity_Task();
            $objTaskService = new Base_Model_ObtorLib_App_Core_Pms_Service_Task();
            $objTaskEntity->setId($this->_request->getParam('id'));
            $objTaskService->task = $objTaskEntity;
            $isDeleted = $objTaskService->deleteTask();
            if ($isDeleted) {
                $this->_redirect("/admin/task/?action-status=deleted");
            } else {
                $this->_redirect("/admin/task/?action-status=failed");
            }
        } catch (Exception $ex) {
            throw new Exception('<ERROR>' . $ex->getMessage() . "\n");
        }
    }
    
    
    /**
     * The add action
     */
    public function searchAction() {
        try {
            $pageHeading = "Search-Task";
            $this->view->page_heading = $pageHeading;
            $this->view->data_page = "forms";

            $taskPriorityList = $this->getPmsPriorityList();
                $taskTypeList = $this->getTaskTypeList();
                $taskStatusList = $this->getPmsStatusList();
                
                $this->view->taskPriorityList = $taskPriorityList;
                $this->view->taskTypeList = $taskTypeList;
                $this->view->taskStatusList = $taskStatusList;
                
                // get all the user all projects...
                $projectService = new Base_Model_ObtorLib_App_Core_Pms_Service_Project();
                $projectEntity = new Base_Model_ObtorLib_App_Core_Pms_Entity_Project();
                $projectService->project = $projectEntity;
                $limit = NULL;
                $projectService->project = $projectEntity;
                $projectInfo = $projectService->search($limit);
                $this->view->projectInfo = $projectInfo;
                
                // get all the user all users...
                $employeeStatus = 'In-Service';
                $employeeService = new Base_Model_ObtorLib_App_Core_Employee_Service_Employee();
                $employeeEntity = new Base_Model_ObtorLib_App_Core_Employee_Entity_Employee();
                $employeeEntity->setEmployeeStatus($employeeStatus);
                $employeeService->employee = $employeeEntity;
                $limit = NULL;
                $employeeService->employee = $employeeEntity;
                $employeeInfo = $employeeService->search($limit);
                $this->view->employeeInfo = $employeeInfo;
            
        } catch (Exception $ex) {
            throw new Exception('<ERROR>' . $ex->getMessage() . "\n");
        }
    }
    

}
