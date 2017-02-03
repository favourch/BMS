<?php

class Admin_MyAccountController extends Base_Model_ObtorLib_App_Admin_Controller {

    public function init() {
        parent::init();
    }

    /**
     * The default action - show the home page
     */
    public function indexAction() {
        try {
            $pageHeading = "My-Account";
            $this->view->page_heading = $pageHeading;
            $this->view->data_page = "calendar";
              
                
        } catch (Exception $ex) {
            throw new Exception('<ERROR>' . $ex->getMessage() . "\n");
        }
    }
    
    
    /**
     * The default action - show the home page
     */
    public function profileAction() {
        try {
            $pageHeading = "My-Profile";
            $this->view->page_heading = $pageHeading;
            $this->view->data_page = "calendar";
            
            
            $currentUserId = $this->getUserId();
            
            // add new user information...
            $userService = new Base_Model_ObtorLib_App_Core_User_Service_User();
            $userEntity = new Base_Model_ObtorLib_App_Core_User_Entity_User();
            $userId = $currentUserId;
            $userInformation = $userService->getUser($userId);
            $this->view->userInformation = $userInformation;
                
           
              
                
        } catch (Exception $ex) {
            throw new Exception('<ERROR>' . $ex->getMessage() . "\n");
        }
    }

   

    
/**
     * The add action
     */
    public function settingsAction() {
        try {
            $pageHeading = "My-Account-Settings";
            $this->view->page_heading = $pageHeading;
            $this->view->data_page = "forms";

            $currentUserId = $this->getUserId();
            
            // add new user information...
            $userService = new Base_Model_ObtorLib_App_Core_User_Service_User();
            $userEntity = new Base_Model_ObtorLib_App_Core_User_Entity_User();
            if ($this->_request->isPost()) {
                $userEntity->setId($currentUserId);
                $userEntity->setEmpNumber($this->_request->getParam('txtEmployeeNumber'));
                $userEntity->setCountry($this->_request->getParam('country'));
                $userEntity->setRegion($this->_request->getParam('region'));
                $userEntity->setBranch($this->_request->getParam('branch'));
                $userEntity->setDepartment($this->_request->getParam('department'));
                $userEntity->setFullName($this->_request->getParam('txtFullName'));
                $userEntity->setEmailAddress($this->_request->getParam('txtUserEmail'));
                $userEntity->setDisplayName($this->_request->getParam('txtDisplayName'));
                $userEntity->setStatusIs($this->_request->getParam('txtUserStatus'));
                $userEntity->setUserName($this->_request->getParam('txtUsername'));
                
                $userPassword = '';
                if($this->_request->getParam('txtUserPassword') != ''){
                    $userPassword = md5($this->_request->getParam('txtUserPassword'));
                }
                
                $userEntity->setUserPassword($userPassword);
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

                $isUpdate = $userService->myAccountUpdate();
                if ($isUpdate) {
                    
                    
                    $userImage = $_FILES['txtUserImage'];
                    if($userImage){
                        if($userImage['name'] != ""){
                             $userImageName = $this->generateSystemFileName($userImage['name']);
                             $userImageTmpName = $userImage['tmp_name'];
                             if($userImageName){
                                move_uploaded_file($userImageTmpName,APPLICATION_PATH.'/../uploads/user/images/'.$userImageName);
                                
                                $userEntity = new Base_Model_ObtorLib_App_Core_User_Entity_User();
                                $userEntity->setId($currentUserId);
                                $userEntity->setUserImage($userImageName);
                                $userService->user = $userEntity;
                                $userService->updateUserImage();
                                
                            }
                       }
                     }
                    
                    $this->_redirect("/admin/my-account/settings/?action-status=updated");
                } else {
                    $this->_redirect("/admin/my-account/settings/?action-status=failed");
                }
            } else {
                
                $countryService = new Base_Model_ObtorLib_App_Core_Catalog_Service_Country();
                $countryEntity  = new Base_Model_ObtorLib_App_Core_Catalog_Entity_Country();
                $countryService->country = $countryEntity;
                $countries = $countryService->search();
                $this->view->countries = $countries;
                
                  // get all the user roles...
                $userRoleService = new Base_Model_ObtorLib_App_Core_User_Service_Role();
                $userRoleEntity = new Base_Model_ObtorLib_App_Core_User_Entity_Role();
                $userRoleService->role = $userRoleEntity;
                $userRoles = $userRoleService->search();
                $this->view->userRoles = $userRoles;
                
                $userId = $currentUserId;
                $userInformation = $userService->getUser($userId);
                $this->view->userInformation = $userInformation;
                
                
                $countryId = $userInformation->getCountry();
                // get all the Regions...
                $regionService = new Base_Model_ObtorLib_App_Core_Catalog_Service_Region();
                $regionEntity  = new Base_Model_ObtorLib_App_Core_Catalog_Entity_Region();
                $regionEntity->setCountry($countryId);
                $regionService->region = $regionEntity;
                $regions = $regionService->search();
                $this->view->regions = $regions;
                
                
                $regionId = $userInformation->getRegion();
                // get all the Regions...
                $branchService = new Base_Model_ObtorLib_App_Core_Catalog_Service_Branch();
                $branchEntity  = new Base_Model_ObtorLib_App_Core_Catalog_Entity_Branch();
                $branchEntity->setRegion($regionId);
                $branchService->branch = $branchEntity;
                $branches = $branchService->search();
                $this->view->branches = $branches;
            
                 $branchId = $userInformation->getBranch();
                // get all the Regions...
                $departmentService = new Base_Model_ObtorLib_App_Core_Catalog_Service_Department();
                $departmentEntity  = new Base_Model_ObtorLib_App_Core_Catalog_Entity_Department();
                $departmentEntity->setBranch($branchId);
                $departmentService->department = $departmentEntity;
                $departments = $departmentService->search();
                $this->view->departments = $departments;
            
                
            }
            
        } catch (Exception $ex) {
            throw new Exception('<ERROR>' . $ex->getMessage() . "\n");
        }
    }
    

}
