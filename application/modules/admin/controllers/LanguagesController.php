<?php

class Admin_LanguagesController extends Base_Model_ObtorLib_App_Admin_Controller {

    public function init() {
        parent::init();
    }

    /**
     * The default action - show the home page
     */
    public function indexAction() {
        try {
            $pageHeading = "Languages";
            $this->view->page_heading = $pageHeading;
            $this->view->data_page = "tables";
            
            $relId = $this->_request->getParam('rel-id');
            $relObject = $this->_request->getParam('rel-object');
            
            // get all the professional experiences for the selected staff ...
            $languagesService = new Base_Model_ObtorLib_App_Core_Qualification_Service_Language();
            $languagesEntity  = new Base_Model_ObtorLib_App_Core_Qualification_Entity_Language();
            $languagesEntity->setRelId($relId);
            $languagesEntity->setRelObject($relObject);
            $languagesService->language = $languagesEntity;
            $languages = $languagesService->search();
            $this->view->languages = $languages;
            
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
            $pageHeading = "Add-New-Language";
            $this->view->page_heading = $pageHeading;
            $this->view->data_page = "forms";

           // get all the professional experiences for the selected staff ...
            $languagesService = new Base_Model_ObtorLib_App_Core_Qualification_Service_Language();
            $languagesEntity  = new Base_Model_ObtorLib_App_Core_Qualification_Entity_Language();
            
            if ($this->_request->isPost()) {
                
                $relId = $this->_request->getParam('rel-id');
                $relObject = $this->_request->getParam('rel-object');
                $languagesEntity->setLanguage($this->_request->getParam('txtLanguage'));
                $languagesEntity->setFluency($this->_request->getParam('txtFluency'));
                $languagesEntity->setCompetency($this->_request->getParam('txtCompetency'));
                $languagesEntity->setComments($this->_request->getParam('txtComments'));
                $languagesEntity->setRelId($relId);
                $languagesEntity->setRelObject($relObject);

                $languagesService->language = $languagesEntity;

                $languageId = $languagesService->addLanguage();
                if ($languageId) {
                    $this->_redirect("/admin/languages/?rel-id=".$relId."&rel-object=".$relObject."&action-status=updated");
                } else {
                    $this->_redirect("/admin/languages/?rel-id=".$relId."&rel-object=".$relObject."&action-status=failed");
                }
            } else {
                
                $languages = $this->getLanguages();
                $this->view->languages = $languages;
                
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
            $pageHeading = "Edit-Language";
            $this->view->page_heading = $pageHeading;
            $this->view->data_page = "forms";

            // get all the professional experiences for the selected staff ...
            $languagesService = new Base_Model_ObtorLib_App_Core_Qualification_Service_Language();
            $languagesEntity  = new Base_Model_ObtorLib_App_Core_Qualification_Entity_Language();
            
            if ($this->_request->isPost()) {
               
                $languagesEntity->setId($this->_request->getParam('id'));
                 $relId = $this->_request->getParam('rel-id');
                $relObject = $this->_request->getParam('rel-object');
                $languagesEntity->setLanguage($this->_request->getParam('txtLanguage'));
                $languagesEntity->setFluency($this->_request->getParam('txtFluency'));
                $languagesEntity->setCompetency($this->_request->getParam('txtCompetency'));
                $languagesEntity->setComments($this->_request->getParam('txtComments'));
                $languagesEntity->setRelId($relId);
                $languagesEntity->setRelObject($relObject);

                $languagesService->language = $languagesEntity;

                $isUpdated = $languagesService->updateLanguage();
                if ($isUpdated) {
                    $this->_redirect("/admin/languages/?rel-id=".$relId."&rel-object=".$relObject."&action-status=updated");
                } else {
                    $this->_redirect("/admin/languages/?rel-id=".$relId."&rel-object=".$relObject."&action-status=failed");
                }
            } else {
                $languageId = $this->_request->getParam('id');
                $languagesInfo = $languagesService->getLanguage($languageId);
                $this->view->languagesInfo = $languagesInfo;
                
                $languages = $this->getLanguages();
                $this->view->languages = $languages;
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
            $pageHeading = "View-Language";
            $this->view->page_heading = $pageHeading;
            $this->view->data_page = "forms";

           // get all the professional experiences for the selected staff ...
            $languagesService = new Base_Model_ObtorLib_App_Core_Qualification_Service_Language();
             $languageId = $this->_request->getParam('id');
             $languagesInfo = $languagesService->getLanguage($languageId);
             $this->view->languagesInfo = $languagesInfo;
                
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
            $languageId = $this->_request->getParam('id');
            
            // get all the professional experiences for the selected staff ...
            $languagesService = new Base_Model_ObtorLib_App_Core_Qualification_Service_Language();
            $languagesEntity  = new Base_Model_ObtorLib_App_Core_Qualification_Entity_Language();
            $languagesEntity->setId($languageId);
            $languagesService->language = $languagesEntity;
            $isDeleted = $languagesService->deleteLanguage();
            if ($isDeleted) {
                    $this->_redirect("/admin/languages/?rel-id=".$relId."&rel-object=".$relObject."&action-status=deleted");
                } else {
                    $this->_redirect("/admin/languages/?rel-id=".$relId."&rel-object=".$relObject."&action-status=failed");
                }
            
        } catch (Exception $ex) {
            throw new Exception('<ERROR>' . $ex->getMessage() . "\n");
        }
    }

}
