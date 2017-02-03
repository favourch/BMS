<?php

class Admin_ProfessionalExperienceController extends Base_Model_ObtorLib_App_Admin_Controller {

    public function init() {
        parent::init();
    }

    /**
     * The default action - show the home page
     */
    public function indexAction() {
        try {
            $pageHeading = "Professional-Experience";
            $this->view->page_heading = $pageHeading;
            $this->view->data_page = "tables";
            
            $relId = $this->_request->getParam('rel-id');
            $relObject = $this->_request->getParam('rel-object');
            
            // get all the professional experiences for the selected staff ...
            $professionalExperienceService = new Base_Model_ObtorLib_App_Core_Qualification_Service_ProfessionalExperience();
            $professionalExperienceEntity  = new Base_Model_ObtorLib_App_Core_Qualification_Entity_ProfessionalExperience();
            $professionalExperienceEntity->setRelId($relId);
            $professionalExperienceEntity->setRelObject($relObject);
            $professionalExperienceService->professionalExperience = $professionalExperienceEntity;
            $professionalExperience = $professionalExperienceService->search();
            $this->view->professionalExperience = $professionalExperience;
            
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
            $pageHeading = "Add-New-Professional-Experience";
            $this->view->page_heading = $pageHeading;
            $this->view->data_page = "forms";

           // get all the professional experiences for the selected staff ...
            $professionalExperienceService = new Base_Model_ObtorLib_App_Core_Qualification_Service_ProfessionalExperience();
            $professionalExperienceEntity  = new Base_Model_ObtorLib_App_Core_Qualification_Entity_ProfessionalExperience();
            
            if ($this->_request->isPost()) {
                
                $relId = $this->_request->getParam('rel-id');
                $relObject = $this->_request->getParam('rel-object');
                $professionalExperienceEntity->setCompanyName($this->_request->getParam('txtCompanyName'));
                $professionalExperienceEntity->setJobTitle($this->_request->getParam('txtJobTitle'));
                $professionalExperienceEntity->setFromDate($this->_request->getParam('txtFromDate'));
                $professionalExperienceEntity->setToDate($this->_request->getParam('txtToDate'));
                $professionalExperienceEntity->setComments($this->_request->getParam('txtComments'));
                $professionalExperienceEntity->setRelId($relId);
                $professionalExperienceEntity->setRelObject($relObject);

                $professionalExperienceService->professionalExperience = $professionalExperienceEntity;

                $profExperienceId = $professionalExperienceService->addProfessionalExperience();
                if ($profExperienceId) {
                    $this->_redirect("/admin/professional-experience/?rel-id=".$relId."&rel-object=".$relObject."&action-status=updated");
                } else {
                    $this->_redirect("/admin/professional-experience/?rel-id=".$relId."&rel-object=".$relObject."&action-status=failed");
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
            $pageHeading = "Edit-Professional-Experience";
            $this->view->page_heading = $pageHeading;
            $this->view->data_page = "forms";

           // get all the professional experiences for the selected staff ...
            $professionalExperienceService = new Base_Model_ObtorLib_App_Core_Qualification_Service_ProfessionalExperience();
            $professionalExperienceEntity  = new Base_Model_ObtorLib_App_Core_Qualification_Entity_ProfessionalExperience();
            
            if ($this->_request->isPost()) {
                
                $relId = $this->_request->getParam('rel-id');
                $relObject = $this->_request->getParam('rel-object');
                $professionalExperienceEntity->setId($this->_request->getParam('id'));
                $professionalExperienceEntity->setCompanyName($this->_request->getParam('txtCompanyName'));
                $professionalExperienceEntity->setJobTitle($this->_request->getParam('txtJobTitle'));
                $professionalExperienceEntity->setFromDate($this->_request->getParam('txtFromDate'));
                $professionalExperienceEntity->setToDate($this->_request->getParam('txtToDate'));
                $professionalExperienceEntity->setComments($this->_request->getParam('txtComments'));
                $professionalExperienceEntity->setRelId($relId);
                $professionalExperienceEntity->setRelObject($relObject);

                $professionalExperienceService->professionalExperience = $professionalExperienceEntity;

                $isUpdated = $professionalExperienceService->updateProfessionalExperience();
                if ($isUpdated) {
                    $this->_redirect("/admin/professional-experience/?rel-id=".$relId."&rel-object=".$relObject."&action-status=updated");
                } else {
                    $this->_redirect("/admin/professional-experience/?rel-id=".$relId."&rel-object=".$relObject."&action-status=failed");
                }
            } else {
                $experienceId = $this->_request->getParam('id');
                $professionalExperienceInfo = $professionalExperienceService->getProfessionalExperience($experienceId);
                $this->view->professionalExperienceInfo = $professionalExperienceInfo;
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
            $pageHeading = "View-Professional-Experience";
            $this->view->page_heading = $pageHeading;
            $this->view->data_page = "forms";

           // get all the professional experiences for the selected staff ...
            $professionalExperienceService = new Base_Model_ObtorLib_App_Core_Qualification_Service_ProfessionalExperience();            
             $experienceId = $this->_request->getParam('id');
             $professionalExperienceInfo = $professionalExperienceService->getProfessionalExperience($experienceId);
             $this->view->professionalExperienceInfo = $professionalExperienceInfo;
                
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
            $experienceId = $this->_request->getParam('id');
            
            // get all the professional experiences for the selected staff ...
            $professionalExperienceService = new Base_Model_ObtorLib_App_Core_Qualification_Service_ProfessionalExperience();
            $professionalExperienceEntity  = new Base_Model_ObtorLib_App_Core_Qualification_Entity_ProfessionalExperience();
            $professionalExperienceEntity->setId($relId);
            $professionalExperienceService->professionalExperience = $professionalExperienceEntity;
            $isDeleted = $professionalExperienceService->deleteProfessionalExperience();
            if ($isDeleted) {
                    $this->_redirect("/admin/professional-experience/?rel-id=".$relId."&rel-object=".$relObject."&action-status=deleted");
                } else {
                    $this->_redirect("/admin/professional-experience/?rel-id=".$relId."&rel-object=".$relObject."&action-status=failed");
                }
            
        } catch (Exception $ex) {
            throw new Exception('<ERROR>' . $ex->getMessage() . "\n");
        }
    }

}
