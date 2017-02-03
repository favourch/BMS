<?php

class Admin_EducationQualificationController extends Base_Model_ObtorLib_App_Admin_Controller {

    public function init() {
        parent::init();
    }

    /**
     * The default action - show the home page
     */
    public function indexAction() {
        try {
            $pageHeading = "Educational-Qualification";
            $this->view->page_heading = $pageHeading;
            $this->view->data_page = "tables";
            
            $relId = $this->_request->getParam('rel-id');
            $relObject = $this->_request->getParam('rel-object');
            
            // get all the Educational Qualification for the selected staff ...
            $educationService = new Base_Model_ObtorLib_App_Core_Qualification_Service_Education();
            $educationEntity  = new Base_Model_ObtorLib_App_Core_Qualification_Entity_Education();
            $educationEntity->setRelId($relId);
            $educationEntity->setRelObject($relObject);
            $educationService->education = $educationEntity;
            $education = $educationService->search();
            $this->view->education = $education;
            
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
            $pageHeading = "Add-New-Educational-Qualification";
            $this->view->page_heading = $pageHeading;
            $this->view->data_page = "forms";

           // get all the Educational Qualification for the selected staff ...
            $educationService = new Base_Model_ObtorLib_App_Core_Qualification_Service_Education();
            $educationEntity  = new Base_Model_ObtorLib_App_Core_Qualification_Entity_Education();
            
            if ($this->_request->isPost()) {
                
                $relId = $this->_request->getParam('rel-id');
                $relObject = $this->_request->getParam('rel-object');
                $educationEntity->setLevel($this->_request->getParam('txtLevel'));
                $educationEntity->setInstitute($this->_request->getParam('txtInstitute'));
                $educationEntity->setMajorSpecialization($this->_request->getParam('txtMajorSpecialization'));
                $educationEntity->setYear($this->_request->getParam('txteYear'));
                $educationEntity->setGpa($this->_request->getParam('txtGpa'));
                $educationEntity->setStartDate($this->_request->getParam('txtStartDate'));
                $educationEntity->setEndDate($this->_request->getParam('txtEndDate'));
                $educationEntity->setRelId($relId);
                $educationEntity->setRelObject($relObject);

                $educationService->education = $educationEntity;

                $educationEdualificationId = $educationService->addEducation();
                if ($educationEdualificationId) {
                    $this->_redirect("/admin/education-qualification/?rel-id=".$relId."&rel-object=".$relObject."&action-status=updated");
                } else {
                    $this->_redirect("/admin/education-qualification/?rel-id=".$relId."&rel-object=".$relObject."&action-status=failed");
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
            $pageHeading = "Edit-Educational-Qualification";
            $this->view->page_heading = $pageHeading;
            $this->view->data_page = "forms";

           // get all the Educational Qualification for the selected staff ...
            $educationService = new Base_Model_ObtorLib_App_Core_Qualification_Service_Education();
            $educationEntity  = new Base_Model_ObtorLib_App_Core_Qualification_Entity_Education();
            
            if ($this->_request->isPost()) {
                
                $relId = $this->_request->getParam('rel-id');
                $relObject = $this->_request->getParam('rel-object');
                $educationEntity->setId($this->_request->getParam('id'));
                $educationEntity->setLevel($this->_request->getParam('txtLevel'));
                $educationEntity->setInstitute($this->_request->getParam('txtInstitute'));
                $educationEntity->setMajorSpecialization($this->_request->getParam('txtMajorSpecialization'));
                $educationEntity->setYear($this->_request->getParam('txteYear'));
                $educationEntity->setGpa($this->_request->getParam('txtGpa'));
                $educationEntity->setStartDate($this->_request->getParam('txtStartDate'));
                $educationEntity->setEndDate($this->_request->getParam('txtEndDate'));
                $educationEntity->setRelId($relId);
                $educationEntity->setRelObject($relObject);

                $educationService->education = $educationEntity;

                $isUpdated = $educationService->updateEducation();
                if ($isUpdated) {
                    $this->_redirect("/admin/education-qualification/?rel-id=".$relId."&rel-object=".$relObject."&action-status=updated");
                } else {
                    $this->_redirect("/admin/education-qualification/?rel-id=".$relId."&rel-object=".$relObject."&action-status=failed");
                }
            } else {
                
                 $educationId = $this->_request->getParam('id');
                $edualificationInfo = $educationService->getEducation($educationId);
                $this->view->edualificationInfo = $edualificationInfo;
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

           // get all the Educational Qualification for the selected staff ...
            $educationService = new Base_Model_ObtorLib_App_Core_Qualification_Service_Education();   
            $educationId = $this->_request->getParam('id');
                $edualificationInfo = $educationService->getEducation($educationId);
                $this->view->edualificationInfo = $edualificationInfo;
                
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
            
            // get all the Educational Qualification for the selected staff ...
            $educationService = new Base_Model_ObtorLib_App_Core_Qualification_Service_Education();
            $educationEntity  = new Base_Model_ObtorLib_App_Core_Qualification_Entity_Education();
            $educationEntity->setId($relId);
            $educationService->education = $educationEntity;
            $isDeleted = $educationService->deleteEducation();
            if ($isDeleted) {
                    $this->_redirect("/admin/education-qualification/?rel-id=".$relId."&rel-object=".$relObject."&action-status=deleted");
                } else {
                    $this->_redirect("/admin/education-qualification/?rel-id=".$relId."&rel-object=".$relObject."&action-status=failed");
                }
            
        } catch (Exception $ex) {
            throw new Exception('<ERROR>' . $ex->getMessage() . "\n");
        }
    }

}
