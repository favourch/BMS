<?php

class Admin_DepartmentController extends Base_Model_ObtorLib_App_Admin_Controller {

    public function init() {
        parent::init();
    }

    /**
     * The default action - show the home page
     */
    public function indexAction() {
        try {
            $pageHeading = "Departments";
            $this->view->page_heading = $pageHeading;
            $this->view->data_page = "tables";

            // get all the Branches...
            $departmentService = new Base_Model_ObtorLib_App_Core_Catalog_Service_Department();
            $departmentEntity  = new Base_Model_ObtorLib_App_Core_Catalog_Entity_Department();
            $departmentService->department = $departmentEntity;
            $departments = $departmentService->search();
            $this->view->departments = $departments;
        } catch (Exception $ex) {
            throw new Exception('<ERROR>' . $ex->getMessage() . "\n");
        }
    }

    /**
     * The add action
     */
    public function addAction() {
        try {
            $pageHeading = "Add-New-Department";
            $this->view->page_heading = $pageHeading;
            $this->view->data_page = "forms";

            // add new department name...
            $departmentService = new Base_Model_ObtorLib_App_Core_Catalog_Service_Department();
            $departmentEntity  = new Base_Model_ObtorLib_App_Core_Catalog_Entity_Department();
            
            if ($this->_request->isPost()) {
                $departmentEntity->setBranch($this->_request->getParam('branch'));
                $departmentEntity->setName($this->_request->getParam('txtDepartmentName'));
                $departmentEntity->setPrefix($this->_request->getParam('txtDepartmentCode'));
                $departmentService->department = $departmentEntity;

                $departmentId = $departmentService->addDepartment();
                if ($departmentId) {
                    $this->_redirect("/admin/department/?action-status=updated");
                } else {
                    $this->_redirect("/admin/department/?action-status=failed");
                }
            } else {
                 // get all the country...
                $countryService = new Base_Model_ObtorLib_App_Core_Catalog_Service_Country();
                $countryEntity  = new Base_Model_ObtorLib_App_Core_Catalog_Entity_Country();
                $countryService->country = $countryEntity;
                $countries = $countryService->search();
                $this->view->countries = $countries;
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
            $pageHeading = "Edit-Department";
            $this->view->page_heading = $pageHeading;
            $this->view->data_page = "forms";

            // add new department name...
            $departmentService = new Base_Model_ObtorLib_App_Core_Catalog_Service_Department();
            $departmentEntity  = new Base_Model_ObtorLib_App_Core_Catalog_Entity_Department();
            
            if ($this->_request->isPost()) {
                $departmentEntity->setId($this->_request->getParam('id'));
                $departmentEntity->setBranch($this->_request->getParam('branch'));
                $departmentEntity->setName($this->_request->getParam('txtDepartmentName'));
                $departmentEntity->setPrefix($this->_request->getParam('txtDepartmentCode'));
                $departmentService->department = $departmentEntity;

                $isUpdated = $departmentService->updateDepartment();
                if ($isUpdated) {
                    $this->_redirect("/admin/department/?action-status=updated");
                } else {
                    $this->_redirect("/admin/department/?action-status=failed");
                }
            } else {
                 // get all the country...
                $countryService = new Base_Model_ObtorLib_App_Core_Catalog_Service_Country();
                $countryEntity  = new Base_Model_ObtorLib_App_Core_Catalog_Entity_Country();
                $countryService->country = $countryEntity;
                $countries = $countryService->search();
                $this->view->countries = $countries;
                
                
                $departmentId = $this->_request->getParam('id');
                $departmentInformation = $departmentService->getDepartment($departmentId);
                $this->view->departmentInformation = $departmentInformation;
                
                if($departmentInformation->getBranch()){
                    $regionService  = new Base_Model_ObtorLib_App_Core_Catalog_Service_Region();
                    $regionEntity   = new Base_Model_ObtorLib_App_Core_Catalog_Entity_Region();
                    $countryId      = $departmentInformation->getBranch()->getRegion()->getCountry()->getId();
                    $regionEntity->setCountry($countryId);
                    $regionService->region = $regionEntity;
                    $regions = $regionService->search();
                    $this->view->regions = $regions;
                    
                    
                    $regionId = $departmentInformation->getBranch()->getRegion()->getId();
                    // get all the Regions...
                    $branchService = new Base_Model_ObtorLib_App_Core_Catalog_Service_Branch();
                    $branchEntity  = new Base_Model_ObtorLib_App_Core_Catalog_Entity_Branch();
                    $branchEntity->setRegion($regionId);
                    $branchService->branch = $branchEntity;
                    $branches = $branchService->search();
                    $this->view->branches = $branches;
                }
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
            $pageHeading = "Delete-Branch";
            $this->view->page_heading = $pageHeading;
            $this->view->data_page = "forms";

            // delete branch....
            $departmentService = new Base_Model_ObtorLib_App_Core_Catalog_Service_Department();
            $departmentEntity  = new Base_Model_ObtorLib_App_Core_Catalog_Entity_Department();
            $departmentEntity->setId($this->_request->getParam('id'));
            $departmentService->department = $departmentEntity;
            $isDeleted = $departmentService->deleteDepartment();
            if ($isDeleted) {
                $this->_redirect("/admin/department/?action-status=deleted");
            } else {
                $this->_redirect("/admin/department/?action-status=failed");
            }
        } catch (Exception $ex) {
            throw new Exception('<ERROR>' . $ex->getMessage() . "\n");
        }
    }

}
