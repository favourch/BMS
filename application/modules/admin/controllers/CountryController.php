<?php

class Admin_CountryController extends Base_Model_ObtorLib_App_Admin_Controller {

    public function init() {
        parent::init();
    }

    /**
     * The default action - show the home page
     */
    public function indexAction() {
        try {
            $pageHeading = "Countries";
            $this->view->page_heading = $pageHeading;
            $this->view->data_page = "tables";

            // get all the country...
            $countryService = new Base_Model_ObtorLib_App_Core_Catalog_Service_Country();
            $countryEntity  = new Base_Model_ObtorLib_App_Core_Catalog_Entity_Country();
            $countryService->country = $countryEntity;
            $countries = $countryService->search();
            $this->view->countries = $countries;
        } catch (Exception $ex) {
            throw new Exception('<ERROR>' . $ex->getMessage() . "\n");
        }
    }

    /**
     * The add action
     */
    public function addAction() {
        try {
            $pageHeading = "Add-New-Country";
            $this->view->page_heading = $pageHeading;
            $this->view->data_page = "forms";

            // add new country name...
            $countryService = new Base_Model_ObtorLib_App_Core_Catalog_Service_Country();
            $countryEntity = new Base_Model_ObtorLib_App_Core_Catalog_Entity_Country();
            
            if ($this->_request->isPost()) {
                $countryEntity->setName($this->_request->getParam('txtCountryName'));
                $countryEntity->setPrefix($this->_request->getParam('txtCountryCode'));
                $countryService->country = $countryEntity;

                $countryId = $countryService->addCountry();
                if ($countryId) {
                    $this->_redirect("/admin/country/?action-status=updated");
                } else {
                    $this->_redirect("/admin/country/?action-status=failed");
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
            $pageHeading = "Edit-Country";
            $this->view->page_heading = $pageHeading;
            $this->view->data_page = "forms";

           // edit country name...
            $countryService = new Base_Model_ObtorLib_App_Core_Catalog_Service_Country();
            $countryEntity = new Base_Model_ObtorLib_App_Core_Catalog_Entity_Country();
            if ($this->_request->isPost()) {
                $countryEntity->setId($this->_request->getParam('id'));
                $countryEntity->setName($this->_request->getParam('txtCountryName'));
                $countryEntity->setPrefix($this->_request->getParam('txtCountryCode'));
                $countryService->country = $countryEntity;

                $isUpdated = $countryService->updateCountry();
                if ($isUpdated) {
                    $this->_redirect("/admin/country/?action-status=updated");
                } else {
                    $this->_redirect("/admin/country/?action-status=failed");
                }
            } else {
                $countryId = $this->_request->getParam('id');
                $countryInfo = $countryService->getCountry($countryId);
                $this->view->countryInfo = $countryInfo;
            }
        } catch (Exception $ex) {
            throw new Exception('<ERROR>' . $ex->getMessage() . "\n");
        }
    }

    

    /**
     * The add action
     */
    public function deleteAction() {
        try {
            $pageHeading = "Delete-Country";
            $this->view->page_heading = $pageHeading;
            $this->view->data_page = "forms";

            // delete country....
            $countryService = new Base_Model_ObtorLib_App_Core_Catalog_Service_Country();
            $countryEntity = new Base_Model_ObtorLib_App_Core_Catalog_Entity_Country();
            $countryEntity->setId($this->_request->getParam('id'));
            $countryService->country = $countryEntity;
            $countryId = $countryService->deleteCountry();
            if ($countryId) {
                $this->_redirect("/admin/country/?action-status=deleted");
            } else {
                $this->_redirect("/admin/country/?action-status=failed");
            }
        } catch (Exception $ex) {
            throw new Exception('<ERROR>' . $ex->getMessage() . "\n");
        }
    }

}
