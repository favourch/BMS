<?php

class Admin_UserRolesController extends Base_Model_ObtorLib_App_Admin_Controller {

    public function init() {
        parent::init();
    }

    /**
     * The default action - show the home page
     */
    public function indexAction() {
        try {
            $pageHeading = "User-Roles";
            $this->view->page_heading = $pageHeading;
            $this->view->data_page = "tables";

            // get all the user roles...
            $userRoleService = new Base_Model_ObtorLib_App_Core_User_Service_Role();
            $userRoleEntity = new Base_Model_ObtorLib_App_Core_User_Entity_Role();
            $userRoleService->role = $userRoleEntity;
            $userRoles = $userRoleService->search();
            $this->view->userRoles = $userRoles;
        } catch (Exception $ex) {
            throw new Exception('<ERROR>' . $ex->getMessage() . "\n");
        }
    }

    /**
     * The add action
     */
    public function addAction() {
        try {
            $pageHeading = "Add-New-User-Role";
            $this->view->page_heading = $pageHeading;
            $this->view->data_page = "forms";

            // get all the user roles...
            $userRoleService = new Base_Model_ObtorLib_App_Core_User_Service_Role();
            $userRoleEntity = new Base_Model_ObtorLib_App_Core_User_Entity_Role();
            if ($this->_request->isPost()) {
                $userRoleEntity->setName($this->_request->getParam('txtGroupName'));
                $userRoleService->role = $userRoleEntity;

                $roleId = $userRoleService->addRole();
                if ($roleId) {
                    $this->_redirect("/admin/user-roles/?action-status=updated");
                } else {
                    $this->_redirect("/admin/user-roles/?action-status=failed");
                }
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
            $pageHeading = "Edit-User-Role";
            $this->view->page_heading = $pageHeading;
            $this->view->data_page = "forms";

            // get all the user roles...
            $userRoleService = new Base_Model_ObtorLib_App_Core_User_Service_Role();
            $userRoleEntity = new Base_Model_ObtorLib_App_Core_User_Entity_Role();
            if ($this->_request->isPost()) {
                $userRoleEntity->setId($this->_request->getParam('id'));
                $userRoleEntity->setName($this->_request->getParam('txtGroupName'));
                $userRoleService->role = $userRoleEntity;
                $roleId = $userRoleService->updateRole();
                if ($roleId) {
                    $this->_redirect("/admin/user-roles/?action-status=updated");
                } else {
                    $this->_redirect("/admin/user-roles/?action-status=failed");
                }
            } else {
                $userId = $this->_request->getParam('id');
                $userRoleInfo = $userRoleService->getRole($userId);
                $this->view->userRoleInfo = $userRoleInfo;
            }
        } catch (Exception $ex) {
            throw new Exception('<ERROR>' . $ex->getMessage() . "\n");
        }
    }

    /**
     * The add action
     */
    public function permissionsAction() {
        try {
            $pageHeading = "Add-New-User-Role";
            $this->view->page_heading = $pageHeading;
            $this->view->data_page = "forms";

            $xml=simplexml_load_file(APPLICATION_PATH."/resources/application_resources.xml");
            $this->view->xmlData = $xml;
            
            

            // get all the user roles...
            $userRoleService = new Base_Model_ObtorLib_App_Core_User_Service_Role();
            $userId = $this->_request->getParam('id');
            $userRoleInfo = $userRoleService->getRole($userId);
            
            $this->view->userRoleInfo = $userRoleInfo;
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
            $userRoleService = new Base_Model_ObtorLib_App_Core_User_Service_Role();
            $userRoleEntity = new Base_Model_ObtorLib_App_Core_User_Entity_Role();
            $userRoleEntity->setId($this->_request->getParam('id'));
            $userRoleService->role = $userRoleEntity;
            $roleId = $userRoleService->deleteRole();
            if ($roleId) {
                $this->_redirect("/admin/user-roles/?action-status=deleted");
            } else {
                $this->_redirect("/admin/user-roles/?action-status=failed");
            }
        } catch (Exception $ex) {
            throw new Exception('<ERROR>' . $ex->getMessage() . "\n");
        }
    }

}
