<?php

class Admin_RegionController extends Base_Model_Lib_App_Admin_Controller {

    public function init() {
        parent::init();
    }

    /**
     * The default action - show the home page
     */
    public function indexAction() {
        try {
            $pageHeading = "Regions";
            $this->view->page_heading = $pageHeading;
            $this->view->data_page = "tables";

            // get all the Regions...
            $regionService = new Base_Model_Lib_App_Core_Catalog_Service_Region();
            $regionEntity  = new Base_Model_Lib_App_Core_Catalog_Entity_Region();
            $regionService->region = $regionEntity;
            $regions = $regionService->search();
            $this->view->regions = $regions;
        } catch (Exception $ex) {
            throw new Exception('<ERROR>' . $ex->getMessage() . "\n");
        }
    }

    /**
     * The add action
     */
    public function addAction() {
        try {
            $pageHeading = "Add-New-Region";
            $this->view->page_heading = $pageHeading;
            $this->view->data_page = "forms";

            // add new region name...
            $regionService = new Base_Model_Lib_App_Core_Catalog_Service_Region();
            $regionEntity  = new Base_Model_Lib_App_Core_Catalog_Entity_Region();
            
            if ($this->_request->isPost()) {
                $regionEntity->setCountry($this->_request->getParam('txtCountry'));
                $regionEntity->setName($this->_request->getParam('txtRegionName'));
                $regionEntity->setPrefix($this->_request->getParam('txtRegionCode'));
                $regionService->region = $regionEntity;

                $regionId = $regionService->addRegion();
                if ($regionId) {
                    $this->_redirect("/admin/region/?action-status=updated");
                } else {
                    $this->_redirect("/admin/region/?action-status=failed");
                }
            } else {
                 // get all the country...
                $countryService = new Base_Model_Lib_App_Core_Catalog_Service_Country();
                $countryEntity  = new Base_Model_Lib_App_Core_Catalog_Entity_Country();
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
            $pageHeading = "Edit-Region";
            $this->view->page_heading = $pageHeading;
            $this->view->data_page = "forms";

            // edit region...
            $regionService = new Base_Model_Lib_App_Core_Catalog_Service_Region();
            $regionEntity  = new Base_Model_Lib_App_Core_Catalog_Entity_Region();
            
            if ($this->_request->isPost()) {
                $regionEntity->setId($this->_request->getParam('id'));
                $regionEntity->setCountry($this->_request->getParam('txtCountry'));
                $regionEntity->setName($this->_request->getParam('txtRegionName'));
                $regionEntity->setPrefix($this->_request->getParam('txtRegionCode'));
                $regionService->region = $regionEntity;

                $isUpdated = $regionService->updateRegion();
                if ($isUpdated) {
                    $this->_redirect("/admin/region/?action-status=updated");
                } else {
                    $this->_redirect("/admin/region/?action-status=failed");
                }
            } else {
                 // get all the country...
                $countryService = new Base_Model_Lib_App_Core_Catalog_Service_Country();
                $countryEntity  = new Base_Model_Lib_App_Core_Catalog_Entity_Country();
                $countryService->country = $countryEntity;
                $countries = $countryService->search();
                $this->view->countries = $countries;
                
                $regionId = $this->_request->getParam('id');
                $regionInformation = $regionService->getRegion($regionId);
                $this->view->regionInformation = $regionInformation;
                
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
            $pageHeading = "Delete-Region";
            $this->view->page_heading = $pageHeading;
            $this->view->data_page = "forms";

            // delete region....
            $regionService = new Base_Model_Lib_App_Core_Catalog_Service_Region();
            $regionEntity  = new Base_Model_Lib_App_Core_Catalog_Entity_Region();
            $regionEntity->setId($this->_request->getParam('id'));
            $regionService->region = $regionEntity;
            $isDeleted = $regionService->deleteRegion();
            if ($isDeleted) {
                $this->_redirect("/admin/region/?action-status=deleted");
            } else {
                $this->_redirect("/admin/region/?action-status=failed");
            }
        } catch (Exception $ex) {
            throw new Exception('<ERROR>' . $ex->getMessage() . "\n");
        }
    }

}
