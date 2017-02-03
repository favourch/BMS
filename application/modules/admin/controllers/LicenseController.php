<?php

class Admin_LicenseController extends Base_Model_ObtorLib_App_Admin_Controller {

    public function init() {
        parent::init();
    }

    /**
     * The default action - show the home page
     */
    public function indexAction() {
        try {
            $pageHeading = "License";
            $this->view->page_heading = $pageHeading;
            $this->view->data_page = "tables";
            
            $relId = $this->_request->getParam('rel-id');
            $relObject = $this->_request->getParam('rel-object');
            
            // get all the professional experiences for the selected staff ...
            $licensesService = new Base_Model_ObtorLib_App_Core_Qualification_Service_License();
            $licensesEntity  = new Base_Model_ObtorLib_App_Core_Qualification_Entity_License();
            $licensesEntity->setRelId($relId);
            $licensesEntity->setRelObject($relObject);
            $licensesService->license = $licensesEntity;
            $licenses = $licensesService->search();
            $this->view->licenses = $licenses;
            
            $this->view->relId = $relId;
            $this->view->relObject = $relObject;
            
            
        } catch (Exception $ex) {
            throw new Exception('<ERROR>' . $ex->getMessage() . "\n");
        }
    }

    /**
     * The add action
     */
    public function addAction() {
        try {
            $pageHeading = "Add-New-License";
            $this->view->page_heading = $pageHeading;
            $this->view->data_page = "forms";

           // get all the professional experiences for the selected staff ...
            $licensesService = new Base_Model_ObtorLib_App_Core_Qualification_Service_License();
            $licensesEntity  = new Base_Model_ObtorLib_App_Core_Qualification_Entity_License();
            
            if ($this->_request->isPost()) {
                
                $relId = $this->_request->getParam('rel-id');
                $relObject = $this->_request->getParam('rel-object');
                $licensesEntity->setLicenseType($this->_request->getParam('txtLicenseType'));
                $licensesEntity->setLicenseNumber($this->_request->getParam('txtLicenseNumber'));
                $licensesEntity->setIssuedDate($this->_request->getParam('txtIssuedDate'));
                $licensesEntity->setExpiryDate($this->_request->getParam('txtExpiryDate'));
                $licensesEntity->setRelId($relId);
                $licensesEntity->setRelObject($relObject);

                $licensesService->license = $licensesEntity;

                $licenseId = $licensesService->addLicense();
                if ($licenseId) {
                    $this->_redirect("/admin/license/?rel-id=".$relId."&rel-object=".$relObject."&action-status=updated");
                } else {
                    $this->_redirect("/admin/license/?rel-id=".$relId."&rel-object=".$relObject."&action-status=failed");
                }
            } else {
                
                $licenses = $this->getLicense();
                $this->view->licenses = $licenses;
                
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
            $pageHeading = "Edit-License";
            $this->view->page_heading = $pageHeading;
            $this->view->data_page = "forms";

            // get all the professional experiences for the selected staff ...
            $licensesService = new Base_Model_ObtorLib_App_Core_Qualification_Service_License();
            $licensesEntity  = new Base_Model_ObtorLib_App_Core_Qualification_Entity_License();
            
            if ($this->_request->isPost()) {
               
                $licensesEntity->setId($this->_request->getParam('id'));
                $relId = $this->_request->getParam('rel-id');
                $relObject = $this->_request->getParam('rel-object');
                $licensesEntity->setLicenseType($this->_request->getParam('txtLicenseType'));
                $licensesEntity->setLicenseNumber($this->_request->getParam('txtLicenseNumber'));
                $licensesEntity->setIssuedDate($this->_request->getParam('txtIssuedDate'));
                $licensesEntity->setExpiryDate($this->_request->getParam('txtExpiryDate'));
                $licensesEntity->setRelId($relId);
                $licensesEntity->setRelObject($relObject);

                $licensesService->license = $licensesEntity;

                $isUpdated = $licensesService->updateLicense();
                if ($isUpdated) {
                    $this->_redirect("/admin/license/?rel-id=".$relId."&rel-object=".$relObject."&action-status=updated");
                } else {
                    $this->_redirect("/admin/license/?rel-id=".$relId."&rel-object=".$relObject."&action-status=failed");
                }
            } else {
                $licenseId = $this->_request->getParam('id');
                $licensesInfo = $licensesService->getLicense($licenseId);
                $this->view->licenseInfo = $licensesInfo;
                
                $licenses = $this->getLicense();
                $this->view->licenses = $licenses;
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

            $relId = $this->_request->getParam('rel-id');
            $relObject = $this->_request->getParam('rel-object');
            $licenseId = $this->_request->getParam('id');
            
            // get all the professional experiences for the selected staff ...
            $licensesService = new Base_Model_ObtorLib_App_Core_Qualification_Service_License();
            $licensesEntity  = new Base_Model_ObtorLib_App_Core_Qualification_Entity_License();
            $licensesEntity->setId($licenseId);
            $licensesService->license = $licensesEntity;
            $isDeleted = $licensesService->deleteLicense();
            if ($isDeleted) {
                    $this->_redirect("/admin/license/?rel-id=".$relId."&rel-object=".$relObject."&action-status=deleted");
                } else {
                    $this->_redirect("/admin/license/?rel-id=".$relId."&rel-object=".$relObject."&action-status=failed");
                }
            
        } catch (Exception $ex) {
            throw new Exception('<ERROR>' . $ex->getMessage() . "\n");
        }
    }

}
