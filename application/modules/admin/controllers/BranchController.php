<?php

class Admin_BranchController extends Base_Model_ObtorLib_App_Admin_Controller {

    public function init() {
        parent::init();
    }

    /**
     * The default action - show the home page
     */
    public function indexAction() {
        try {
            $pageHeading = "Branches";
            $this->view->page_heading = $pageHeading;
            $this->view->data_page = "tables";

            // get all the Branches...
            $branchService = new Base_Model_ObtorLib_App_Core_Catalog_Service_Branch();
            $branchEntity  = new Base_Model_ObtorLib_App_Core_Catalog_Entity_Branch();
            $branchService->branch = $branchEntity;
            $branches = $branchService->search();
            $this->view->branches = $branches;
        } catch (Exception $ex) {
            throw new Exception('<ERROR>' . $ex->getMessage() . "\n");
        }
    }

    /**
     * The add action
     */
    public function addAction() {
        try {
            $pageHeading = "Add-New-Branch";
            $this->view->page_heading = $pageHeading;
            $this->view->data_page = "forms";

            // add new region name...
            $branchService = new Base_Model_ObtorLib_App_Core_Catalog_Service_Branch();
            $branchEntity  = new Base_Model_ObtorLib_App_Core_Catalog_Entity_Branch();
            
            if ($this->_request->isPost()) {
                
                
                $branchEntity->setRegion($this->_request->getParam('region'));
                $branchEntity->setName($this->_request->getParam('branch_name'));
                $branchEntity->setPrefix($this->_request->getParam('txtBranchCode'));
                $branchService->branch = $branchEntity;

                $branchId = $branchService->addBranch();
                if ($branchId) {
                    $this->_redirect("/admin/branch/?action-status=updated");
                } else {
                    $this->_redirect("/admin/branch/?action-status=failed");
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
            $pageHeading = "Add-New-Branch";
            $this->view->page_heading = $pageHeading;
            $this->view->data_page = "forms";

            // add new region name...
            $branchService = new Base_Model_ObtorLib_App_Core_Catalog_Service_Branch();
            $branchEntity  = new Base_Model_ObtorLib_App_Core_Catalog_Entity_Branch();
            
            if ($this->_request->isPost()) {
                $branchEntity->setId($this->_request->getParam('id'));
                $branchEntity->setRegion($this->_request->getParam('region'));
                $branchEntity->setName($this->_request->getParam('branch_name'));
                $branchEntity->setPrefix($this->_request->getParam('txtBranchCode'));
                $branchService->branch = $branchEntity;

                $branchId = $branchService->updateBranch();
                if ($branchId) {
                    $this->_redirect("/admin/branch/?action-status=updated");
                } else {
                    $this->_redirect("/admin/branch/?action-status=failed");
                }
            } else {
                 // get all the country...
                $countryService = new Base_Model_ObtorLib_App_Core_Catalog_Service_Country();
                $countryEntity  = new Base_Model_ObtorLib_App_Core_Catalog_Entity_Country();
                $countryService->country = $countryEntity;
                $countries = $countryService->search();
                $this->view->countries = $countries;
                
                $branchId = $this->_request->getParam('id');
                $branchInformation = $branchService->getBranch($branchId);
                $this->view->branchInformation = $branchInformation;
                
                if($branchInformation->getRegion()){
                    $regionService  = new Base_Model_ObtorLib_App_Core_Catalog_Service_Region();
                    $regionEntity   = new Base_Model_ObtorLib_App_Core_Catalog_Entity_Region();
                    $countryId      = $branchInformation->getRegion()->getCountry()->getId();
                    $regionEntity->setCountry($countryId);
                    $regionService->region = $regionEntity;
                    $regions = $regionService->search();
                    $this->view->regions = $regions;
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
            $branchService = new Base_Model_ObtorLib_App_Core_Catalog_Service_Branch();
            $branchEntity  = new Base_Model_ObtorLib_App_Core_Catalog_Entity_Branch();
            $branchEntity->setId($this->_request->getParam('id'));
            $branchService->branch = $branchEntity;
            $isDeleted = $branchService->deleteBranch();
            if ($isDeleted) {
                $this->_redirect("/admin/branch/?action-status=deleted");
            } else {
                $this->_redirect("/admin/branch/?action-status=failed");
            }
        } catch (Exception $ex) {
            throw new Exception('<ERROR>' . $ex->getMessage() . "\n");
        }
    }

}
