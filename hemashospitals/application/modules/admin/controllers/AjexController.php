<?php

class Admin_AjexController extends Base_Model_Lib_App_Admin_Controller {

    public function init() {
        parent::init();
        
    }

    /**
     * The default action - show the home page
     */
    public function loadRegionAction() {
        try {
            $this->_helper->layout()->disableLayout();
            $pageHeading = "Regions";
            $this->view->page_heading = $pageHeading;
            $this->view->data_page = "tables";

            $countryId = $this->_request->getParam('countryId');
            // get all the Regions...
            $regionService = new Base_Model_Lib_App_Core_Catalog_Service_Region();
            $regionEntity  = new Base_Model_Lib_App_Core_Catalog_Entity_Region();
            $regionEntity->setCountry($countryId);
            $regionService->region = $regionEntity;
            $regions = $regionService->search();
            $this->view->regions = $regions;
        } catch (Exception $ex) {
            throw new Exception('<ERROR>' . $ex->getMessage() . "\n");
        }
    }
    
    
    /**
     * The default action - show the home page
     */
    public function loadBranchAction() {
        try {
            $this->_helper->layout()->disableLayout();
            $pageHeading = "Branches";
            $this->view->page_heading = $pageHeading;
            $this->view->data_page = "tables";

            $regionId = $this->_request->getParam('regionId');
            // get all the Regions...
            $branchService = new Base_Model_Lib_App_Core_Catalog_Service_Branch();
            $branchEntity  = new Base_Model_Lib_App_Core_Catalog_Entity_Branch();
            $branchEntity->setRegion($regionId);
            $branchService->branch = $branchEntity;
            $branches = $branchService->search();
            $this->view->branches = $branches;
        } catch (Exception $ex) {
            throw new Exception('<ERROR>' . $ex->getMessage() . "\n");
        }
    }
    
    
    /**
     * The default action - show the home page
     */
    public function loadDepartmentAction() {
        try {
            $this->_helper->layout()->disableLayout();
            $pageHeading = "Department";
            $this->view->page_heading = $pageHeading;
            $this->view->data_page = "tables";

            $branchId = $this->_request->getParam('branchId');
            // get all the Regions...
            $departmentService = new Base_Model_Lib_App_Core_Catalog_Service_Department();
            $departmentEntity  = new Base_Model_Lib_App_Core_Catalog_Entity_Department();
            $departmentEntity->setBranch($branchId);
            $departmentService->department = $departmentEntity;
            $departments = $departmentService->search();
            $this->view->departments = $departments;
        } catch (Exception $ex) {
            throw new Exception('<ERROR>' . $ex->getMessage() . "\n");
        }
    }
    
    
    /**
     * The default action - show the home page
     */
    public function loadModelAction() {
        try {
            $this->_helper->layout()->disableLayout();
            $pageHeading = "Department";
            $this->view->page_heading = $pageHeading;
            $this->view->data_page = "tables";

            $categoryId = $this->_request->getParam('categoryId');
            // get all the Modles...
            $modelService = new Base_Model_Lib_App_Core_Catalog_Service_Model();
            $modelEntity  = new Base_Model_Lib_App_Core_Catalog_Entity_Model();
            $modelEntity->setCategory($categoryId);
            $modelService->model = $modelEntity;
            $models = $modelService->search();
            $this->view->models = $models;
        } catch (Exception $ex) {
            throw new Exception('<ERROR>' . $ex->getMessage() . "\n");
        }
    }

}
