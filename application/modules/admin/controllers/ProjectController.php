<?php

class Admin_ProjectController extends Base_Model_ObtorLib_App_Admin_Controller {

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
            $projectService = new Base_Model_ObtorLib_App_Core_Pms_Service_Project();
            $projectEntity = new Base_Model_ObtorLib_App_Core_Pms_Entity_Project();
            $projectEntity->setProjectNumber($project_number);
            $projectEntity->setProjectName($project_name);
            $projectEntity->setLinkToAccountsContacts($accounts_contacts);
            $projectEntity->setProjectStatus($project_status);
            $projectEntity->setProjectPriority($project_priority);
            $projectEntity->setProjectType($project_type);
            $projectService->project = $projectEntity;
            
            $objPaggination = new Base_Model_ObtorLib_Base_Lib_Paggination();
            $page = $this->_getParam('page', 1);
            $objPaggination->CurrentPage = $page;
            $objPaggination->TotalResults = $projectService->searchCount();
            $paginationData = $objPaggination->getPaggingData();
            $pageLimit1 = $paginationData['MYSQL_LIMIT1'];
            $pageLimit2 = $paginationData['MYSQL_LIMIT2'];

            $limit = " LIMIT $pageLimit1,$pageLimit2";


            $projectService->project = $projectEntity;
            $projectInfo = $projectService->search($limit);
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
    public function addAction() {
        try {
            $pageHeading = "Add-New-Project";
            $this->view->page_heading = $pageHeading;
            $this->view->data_page = "forms";

            if ($this->_request->isPost()) {
                $id = $this->_request->getParam('txtId');
                $projectName = $this->_request->getParam('txtProject_name');
                $startDate = $this->_request->getParam('txtStart_date');
                $targetendDate = $this->_request->getParam('txtTargetend_date');
                $actualendDate = $this->_request->getParam('txtActualend_date');
                $targetBudget = $this->_request->getParam('txtTarget_budget');
                $projectUrl = $this->_request->getParam('txtProject_url');
                $projectStatus = $this->_request->getParam('txtProject_status');
                $projectPriority = $this->_request->getParam('txtProject_priority');
                $projectType = $this->_request->getParam('txtProject_type');
                $progress = $this->_request->getParam('txtprogress');
                $linkToAccountsContacts = $this->_request->getParam('txtLink_to_accounts_contacts');
                $projectNumber = $this->_request->getParam('txtProject_number');
                
                $objProjectEntity = new Base_Model_ObtorLib_App_Core_Pms_Entity_Project();
                $objProjectService = new Base_Model_ObtorLib_App_Core_Pms_Service_Project();
                $objProjectEntity->setProjectName($projectName);
                $objProjectEntity->setStartDate($startDate);
                $objProjectEntity->setTargetendDate($targetendDate);
                $objProjectEntity->setActualendDate($actualendDate);
                $objProjectEntity->setTargetBudget($targetBudget);
                $objProjectEntity->setProjectUrl($projectUrl);
                $objProjectEntity->setProjectStatus($projectStatus);
                $objProjectEntity->setProjectPriority($projectPriority);
                $objProjectEntity->setProjectType($projectType);
                $objProjectEntity->setProgress($progress);
                $objProjectEntity->setLinkToAccountsContacts($linkToAccountsContacts);
                $objProjectEntity->setProjectNumber($projectNumber);
                $objProjectService->project = $objProjectEntity;
                $projectId = $objProjectService->addProject();
                if ($projectId) {
                    $this->_redirect("/admin/project/?action-status=updated");
                } else {
                    $this->_redirect("/admin/project/?action-status=failed");
                }
                
            } else {
                
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
            $pageHeading = "Edit-Project";
            $this->view->page_heading = $pageHeading;
            $this->view->data_page = "forms";
            
            $objProjectService = new Base_Model_ObtorLib_App_Core_Pms_Service_Project();

            if ($this->_request->isPost()) {
                $id = $this->_request->getParam('id');
                $projectName = $this->_request->getParam('txtProject_name');
                $startDate = $this->_request->getParam('txtStart_date');
                $targetendDate = $this->_request->getParam('txtTargetend_date');
                $actualendDate = $this->_request->getParam('txtActualend_date');
                $targetBudget = $this->_request->getParam('txtTarget_budget');
                $projectUrl = $this->_request->getParam('txtProject_url');
                $projectStatus = $this->_request->getParam('txtProject_status');
                $projectPriority = $this->_request->getParam('txtProject_priority');
                $projectType = $this->_request->getParam('txtProject_type');
                $progress = $this->_request->getParam('txtprogress');
                $linkToAccountsContacts = $this->_request->getParam('txtLink_to_accounts_contacts');
                $projectNumber = $this->_request->getParam('txtProject_number');
                
                $objProjectEntity = new Base_Model_ObtorLib_App_Core_Pms_Entity_Project();
                
                $objProjectEntity->setId($id);
                $objProjectEntity->setProjectName($projectName);
                $objProjectEntity->setStartDate($startDate);
                $objProjectEntity->setTargetendDate($targetendDate);
                $objProjectEntity->setActualendDate($actualendDate);
                $objProjectEntity->setTargetBudget($targetBudget);
                $objProjectEntity->setProjectUrl($projectUrl);
                $objProjectEntity->setProjectStatus($projectStatus);
                $objProjectEntity->setProjectPriority($projectPriority);
                $objProjectEntity->setProjectType($projectType);
                $objProjectEntity->setProgress($progress);
                $objProjectEntity->setLinkToAccountsContacts($linkToAccountsContacts);
                $objProjectEntity->setProjectNumber($projectNumber);
                $objProjectService->project = $objProjectEntity;
                $isUpdated = $objProjectService->updateProject();
                if ($isUpdated) {
                    $this->_redirect("/admin/project/?action-status=updated");
                } else {
                    $this->_redirect("/admin/project/?action-status=failed");
                }
                
            } else {
                
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
                
                $projectId = $this->_request->getParam('id');
                $projectInformation = $objProjectService->getProject($projectId);
                $this->view->projectInformation = $projectInformation;
                
                
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
            $pageHeading = "View-Project";
            $this->view->page_heading = $pageHeading;
            $this->view->data_page = "forms";

            $projectId = $this->_request->getParam('id');
            $objProjectService = new Base_Model_ObtorLib_App_Core_Pms_Service_Project();
            $projectInformation = $objProjectService->getProject($projectId);
            $this->view->projectInformation = $projectInformation;
            
            // get all the Task information...
            $objTaskEntity = new Base_Model_ObtorLib_App_Core_Pms_Entity_Task();
            $objTaskService = new Base_Model_ObtorLib_App_Core_Pms_Service_Task();
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
    public function deleteAction() {
        try {
            $pageHeading = "Delete-Project";
            $this->view->page_heading = $pageHeading;
            $this->view->data_page = "forms";

            // delete branch....
            $objProjectEntity = new Base_Model_ObtorLib_App_Core_Pms_Entity_Project();
            $objProjectService = new Base_Model_ObtorLib_App_Core_Pms_Service_Project();
            $objProjectEntity->setId($this->_request->getParam('id'));
            $objProjectService->project = $objProjectEntity;
            $isDeleted = $objProjectService->deleteProject();
            if ($isDeleted) {
                $this->_redirect("/admin/project/?action-status=deleted");
            } else {
                $this->_redirect("/admin/project/?action-status=failed");
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

}
