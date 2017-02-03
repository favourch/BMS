<?php

class Admin_UserController extends Base_Model_Lib_App_Admin_Controller {

    public function init() {
        parent::init();
    }

    /**
     * The default action - show the home page
     */
    public function indexAction() {
        try {
            $pageHeading = "Users";
            $this->view->page_heading = $pageHeading;
            $this->view->data_page = "tables";

            // get all the user all users...
            $userService = new Base_Model_Lib_App_Core_User_Service_User();
            $userEntity = new Base_Model_Lib_App_Core_User_Entity_User();
            $userService->user = $userEntity;
            $users = $userService->search();
            $this->view->users = $users;
        } catch (Exception $ex) {
            throw new Exception('<ERROR>' . $ex->getMessage() . "\n");
        }
    }

    /**
     * The add action
     */
    public function addAction() {
        try {
            $pageHeading = "Add-New-User";
            $this->view->page_heading = $pageHeading;
            $this->view->data_page = "forms";

            // add new user information...
            $userService = new Base_Model_Lib_App_Core_User_Service_User();
            $userEntity = new Base_Model_Lib_App_Core_User_Entity_User();
            if ($this->_request->isPost()) {
                $userEntity->setEmpNumber($this->_request->getParam('txtEmployeeNumber'));
                $userEntity->setCountry($this->_request->getParam('txtCountry'));
                $userEntity->setRegion($this->_request->getParam('txtRegion'));
                $userEntity->setBranch($this->_request->getParam('txtBranchName'));
                $userEntity->setDepartment($this->_request->getParam('txtDepartmentName'));
                $userEntity->setFullName($this->_request->getParam('txtFullName'));
                $userEntity->setEmailAddress($this->_request->getParam('txtUserEmail'));
                $userEntity->setDisplayName($this->_request->getParam('txtDisplayName'));
                $userEntity->setStatusIs($this->_request->getParam('txtUserStatus'));
                $userEntity->setUserName($this->_request->getParam('txtUsername'));
                $userEntity->setUserPassword($this->_request->getParam('txtUserPassword'));
                $userEntity->setUserRole($this->_request->getParam('txtUserRole'));
                $userEntity->setDataPrivilage($this->_request->getParam('txtDataPrivilege'));
                $userEntity->setIsDeleted(0);
                $userEntity->setDateCreated($this->getSystemDate());
                $userEntity->setDateModified(null);
                $userEntity->setCreatedBy($this->getUserId());
                $userEntity->setModifiedUser(null);
                
                // allow countries and etc...
                    $userEntity->setAllowedCountries(implode (",", $this->_request->getParam('chkCountry')));
                    $userEntity->setAllowedRegions(implode (",", $this->_request->getParam('chkRegion')));
                    $userEntity->setAllowedBranches(implode (",", $this->_request->getParam('chkBranch')));
                    $userEntity->setAllowedDepartments(implode (",", $this->_request->getParam('chkDepartment')));
                
                
                $userService->user = $userEntity;

                $userId = $userService->addUser();
                if ($userId) {
                    $this->_redirect("/admin/user/?action-status=updated");
                } else {
                    $this->_redirect("/admin/user/?action-status=failed");
                }
            } else {
                
                $countryService = new Base_Model_Lib_App_Core_Catalog_Service_Country();
                $countryEntity  = new Base_Model_Lib_App_Core_Catalog_Entity_Country();
                $countryService->country = $countryEntity;
                $countries = $countryService->search();
                $this->view->countries = $countries;
                
                  // get all the user roles...
                $userRoleService = new Base_Model_Lib_App_Core_User_Service_Role();
                $userRoleEntity = new Base_Model_Lib_App_Core_User_Entity_Role();
                $userRoleService->role = $userRoleEntity;
                $userRoles = $userRoleService->search();
                $this->view->userRoles = $userRoles;
                
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
            $pageHeading = "Edit-User";
            $this->view->page_heading = $pageHeading;
            $this->view->data_page = "forms";

            // add new user information...
            $userService = new Base_Model_Lib_App_Core_User_Service_User();
            $userEntity = new Base_Model_Lib_App_Core_User_Entity_User();
            if ($this->_request->isPost()) {
                $userEntity->setId($this->_request->getParam('id'));
                $userEntity->setEmpNumber($this->_request->getParam('txtEmployeeNumber'));
                $userEntity->setCountry($this->_request->getParam('txtCountry'));
                $userEntity->setRegion($this->_request->getParam('txtRegion'));
                $userEntity->setBranch($this->_request->getParam('txtBranchName'));
                $userEntity->setDepartment($this->_request->getParam('txtDepartmentName'));
                $userEntity->setFullName($this->_request->getParam('txtFullName'));
                $userEntity->setEmailAddress($this->_request->getParam('txtUserEmail'));
                $userEntity->setDisplayName($this->_request->getParam('txtDisplayName'));
                $userEntity->setStatusIs($this->_request->getParam('txtUserStatus'));
                $userEntity->setUserName($this->_request->getParam('txtUsername'));
                $userEntity->setUserPassword($this->_request->getParam('txtUserPassword'));
                $userEntity->setUserRole($this->_request->getParam('txtUserRole'));
                $userEntity->setDataPrivilage($this->_request->getParam('txtDataPrivilege'));
                $userEntity->setIsDeleted(0);
                $userEntity->setDateModified($this->getSystemDate());
                $userEntity->setModifiedUser($this->getUserId());
                
                // allow countries and etc...
                    $userEntity->setAllowedCountries(implode (",", $this->_request->getParam('chkCountry')));
                    $userEntity->setAllowedRegions(implode (",", $this->_request->getParam('chkRegion')));
                    $userEntity->setAllowedBranches(implode (",", $this->_request->getParam('chkBranch')));
                    $userEntity->setAllowedDepartments(implode (",", $this->_request->getParam('chkDepartment')));
                
                
                $userService->user = $userEntity;

                $isUpdate = $userService->updateUser();
                if ($isUpdate) {
                    $this->_redirect("/admin/user/?action-status=updated");
                } else {
                    $this->_redirect("/admin/user/?action-status=failed");
                }
            } else {
                
                $countryService = new Base_Model_Lib_App_Core_Catalog_Service_Country();
                $countryEntity  = new Base_Model_Lib_App_Core_Catalog_Entity_Country();
                $countryService->country = $countryEntity;
                $countries = $countryService->search();
                $this->view->countries = $countries;
                
                  // get all the user roles...
                $userRoleService = new Base_Model_Lib_App_Core_User_Service_Role();
                $userRoleEntity = new Base_Model_Lib_App_Core_User_Entity_Role();
                $userRoleService->role = $userRoleEntity;
                $userRoles = $userRoleService->search();
                $this->view->userRoles = $userRoles;
                
                $userId = $this->_request->getParam('id');
                $userInformation = $userService->getUser($userId);
                $this->view->userInformation = $userInformation;
                
                
                $countryId = $userInformation->getCountry();
                // get all the Regions...
                $regionService = new Base_Model_Lib_App_Core_Catalog_Service_Region();
                $regionEntity  = new Base_Model_Lib_App_Core_Catalog_Entity_Region();
                $regionEntity->setCountry($countryId);
                $regionService->region = $regionEntity;
                $regions = $regionService->search();
                $this->view->regions = $regions;
                
                
                $regionId = $userInformation->getRegion();
                // get all the Regions...
                $branchService = new Base_Model_Lib_App_Core_Catalog_Service_Branch();
                $branchEntity  = new Base_Model_Lib_App_Core_Catalog_Entity_Branch();
                $branchEntity->setRegion($regionId);
                $branchService->branch = $branchEntity;
                $branches = $branchService->search();
                $this->view->branches = $branches;
            
                 $branchId = $userInformation->getBranch();
                // get all the Regions...
                $departmentService = new Base_Model_Lib_App_Core_Catalog_Service_Department();
                $departmentEntity  = new Base_Model_Lib_App_Core_Catalog_Entity_Department();
                $departmentEntity->setBranch($branchId);
                $departmentService->department = $departmentEntity;
                $departments = $departmentService->search();
                $this->view->departments = $departments;
            
                
            }
        } catch (Exception $ex) {
            throw new Exception('<ERROR>' . $ex->getMessage() . "\n");
        }
    }



    /**
     * The delete action
     */
    public function deleteAction() {
        try {
            $pageHeading = "Delete";
            $this->view->page_heading = $pageHeading;
            $this->view->data_page = "forms";

            // get all the user roles...
            $userService = new Base_Model_Lib_App_Core_User_Service_User();
            $userEntity = new Base_Model_Lib_App_Core_User_Entity_User();
            $userEntity->setId($this->_request->getParam('id'));
            $userEntity->setDateModified($this->getSystemDateTime());
            $userEntity->setModifiedUser($this->getUserId());
            $userEntity->setIsDeleted(1);
            $userService->user = $userEntity;
            $isDeleted = $userService->deleteUser();
            if ($isDeleted) {
                $this->_redirect("/admin/user/?action-status=deleted");
            } else {
                $this->_redirect("/admin/user/?action-status=failed");
            }
        } catch (Exception $ex) {
            throw new Exception('<ERROR>' . $ex->getMessage() . "\n");
        }
    }

    
    /**
     * The default action - show the home page
     */
    public function viewLogAction() {
        try {
            $pageHeading = "User-s-Log-Information";
            $this->view->page_heading = $pageHeading;
            $this->view->data_page = "tables";

            
            $userId = $this->_request->getParam('id');
            $userType = 'admin';
            
             // get all the user all users...
            $systemLogService = new Base_Model_Lib_App_Core_System_Service_Log();
            $systemLogEntity = new Base_Model_Lib_App_Core_System_Entity_Log();
            $systemLogEntity->setUserId($userId);
            $systemLogEntity->setUserType($userType);
            $systemLogService->log = $systemLogEntity;
            
            $objPaggination = new Base_Model_Lib_Base_Lib_Paggination();
            $page = $this->_getParam('page', 1);
            $objPaggination->CurrentPage = $page;
            $objPaggination->TotalResults = $systemLogService->searchCount();
            $paginationData = $objPaggination->getPaggingData();
            $pageLimit1 = $paginationData['MYSQL_LIMIT1'];
            $pageLimit2 = $paginationData['MYSQL_LIMIT2'];

            $limit = " LIMIT $pageLimit1,$pageLimit2";

           
            $systemLogEntity->setUserId($userId);
            $systemLogEntity->setUserType($userType);
            $systemLogService->log = $systemLogEntity;
            $systemLog = $systemLogService->search($limit);
            $this->view->systemLog = $systemLog;
            
            $this->view->pageNum = $page;
            $this->view->rowsPerPage = $objPaggination->ResultsPerPage;
            $this->view->paggination = $objPaggination;
            
        } catch (Exception $ex) {
            throw new Exception('<ERROR>' . $ex->getMessage() . "\n");
        }
    }
}
