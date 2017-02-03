<?php

class ProjectController extends Base_Model_ObtorLib_App_Staff_Controller {

    public function init() {
        parent::init();
    }

    /**
     * The default action - show the home page
     */
    public function indexAction() {
        try {
            
            $pageHeading = "Project-Management";
            $this->view->page_heading = $pageHeading;
            $this->view->data_page = "tables";
            
            $project_number =  $this->_request->getParam('project-number');
            $project_name =  $this->_request->getParam('project-name');
            $accounts_contacts =  $this->_request->getParam('accounts-contacts');
            $project_status =  $this->_request->getParam('project-status');
            $project_priority =  $this->_request->getParam('project-priority');
            $project_type =  $this->_request->getParam('project-type');
            
            
             // get all the user all projects...
            $staffId = $this->getStaffUserId();
            $projectService = new Base_Model_ObtorLib_App_Core_Pms_Service_Project();
            $projectInfo = $projectService->getStaffsProject($staffId);
            $this->view->projectInfo = $projectInfo;
            
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
    public function viewAction() {
        try {
            $pageHeading = "View-Project";
            $this->view->page_heading = $pageHeading;
            $this->view->data_page = "forms";

            $projectId = $this->_request->getParam('id');
            $objProjectService = new Base_Model_ObtorLib_App_Core_Pms_Service_Project();
            $projectInformation = $objProjectService->getProject($projectId);
            $this->view->projectInformation = $projectInformation;
            
            // get all the Task information...
            $staffId = $this->getStaffUserId();
            $objTaskEntity = new Base_Model_ObtorLib_App_Core_Pms_Entity_Task();
            $objTaskService = new Base_Model_ObtorLib_App_Core_Pms_Service_Task();
            $objTaskEntity->setAssignedTo($staffId);
            $objTaskEntity->setProjectId($projectId);
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
    public function searchAction() {
        try {
            $pageHeading = "Search-Project";
            $this->view->page_heading = $pageHeading;
            $this->view->data_page = "forms";

            $projectPriorityList = $this->getPmsPriorityList();
            $projectStatusList = $this->getPmsStatusList();
            $projectTypeList = $this->getProjectTypeList();
                
            $this->view->projectPriorityList = $projectPriorityList;
            $this->view->projectStatusList = $projectStatusList;
            $this->view->projectTypeList = $projectTypeList;
                
                // get all client list..
            $objClientService = new Base_Model_Lib_Client_Service_Client();
            $objClientEntity = new Base_Model_Lib_Client_Entity_Client();
            $objClientService->client = $objClientEntity;
            $clientList = $objClientService->search(NULL);
            $this->view->clientList = $clientList;
            
        } catch (Exception $ex) {
            throw new Exception('<ERROR>' . $ex->getMessage() . "\n");
        }
    }

    
    
    /**
     * The add action
     */
    public function taskViewAction() {
        try {
            $pageHeading = "View-Task";
            $this->view->page_heading = $pageHeading;
            $this->view->data_page = "forms";

            $objTaskService = new Base_Model_ObtorLib_App_Core_Pms_Service_Task();
            $taskId = $this->_request->getParam('id');
            $taskInformation = $objTaskService->getTask($taskId);
            $this->view->taskInformation = $taskInformation;
            

                $taskStatusList = $this->getPmsStatusList();
                $this->view->taskStatusList = $taskStatusList;
                
            
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
                
                if ($this->_request->isPost()) {
                $id = $this->_request->getParam('id');
               
                $progress = $this->_request->getParam('txtProgress');
                $assignedTo = $this->_request->getParam('txtAssignedTo');
                $currentStatus = $this->_request->getParam('txtCurrentStatus');
                
                $objTaskEntity = new Base_Model_ObtorLib_App_Core_Pms_Entity_Task();
                
                $objTaskEntity->setId($id);
                $objTaskEntity->setProgress($progress);
                $objTaskEntity->setAssignedTo($assignedTo);
                $objTaskEntity->setCurrentStatus($currentStatus);
                $objTaskService->task = $objTaskEntity;
                $isUpdated = $objTaskService->updateTaskStatus();
                if ($isUpdated) {
                    $this->_redirect("/project/task-view/id/".$id."/?action-status=updated");
                } else {
                    $this->_redirect("/project/task-view/id/".$id."/?action-status=failed");
                }
            
            
            }

            
        } catch (Exception $ex) {
            throw new Exception('<ERROR>' . $ex->getMessage() . "\n");
        }
    }
    
    
        /**
     * The add action
     */
    public function tasksAction() {
        try {
            $pageHeading = "Project-Tasks";
            $this->view->page_heading = $pageHeading;
            $this->view->data_page = "forms";
            
             // get all the Task information...
            $staffId = $this->getStaffUserId();
            $objTaskEntity = new Base_Model_ObtorLib_App_Core_Pms_Entity_Task();
            $objTaskService = new Base_Model_ObtorLib_App_Core_Pms_Service_Task();
            $objTaskEntity->setAssignedTo($staffId);
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
            
        } catch (Exception $ex) {
            throw new Exception('<ERROR>' . $ex->getMessage() . "\n");
        }
    }
}
