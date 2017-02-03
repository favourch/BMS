<?php

class Admin_SkillsController extends Base_Model_Lib_App_Admin_Controller {

    public function init() {
        parent::init();
    }

    /**
     * The default action - show the home page
     */
    public function indexAction() {
        try {
            $pageHeading = "Skills";
            $this->view->page_heading = $pageHeading;
            $this->view->data_page = "tables";
            
            $relId = $this->_request->getParam('rel-id');
            $relObject = $this->_request->getParam('rel-object');
            
            // get all the professional experiences for the selected staff ...
            $skillsService = new Base_Model_Lib_App_Core_Qualification_Service_Skill();
            $skillsEntity  = new Base_Model_Lib_App_Core_Qualification_Entity_Skill();
            $skillsEntity->setRelId($relId);
            $skillsEntity->setRelObject($relObject);
            $skillsService->skill = $skillsEntity;
            $skills = $skillsService->search();
            $this->view->skills = $skills;
            
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
            $pageHeading = "Add-New-Skill";
            $this->view->page_heading = $pageHeading;
            $this->view->data_page = "forms";

           // get all the professional experiences for the selected staff ...
            $skillsService = new Base_Model_Lib_App_Core_Qualification_Service_Skill();
            $skillsEntity  = new Base_Model_Lib_App_Core_Qualification_Entity_Skill();
            
            if ($this->_request->isPost()) {
                
                $relId = $this->_request->getParam('rel-id');
                $relObject = $this->_request->getParam('rel-object');
                $skillsEntity->setTitle($this->_request->getParam('txtTitle'));
                $skillsEntity->setYearsOfExperience($this->_request->getParam('txtYearsOfExperience'));
                $skillsEntity->setComments($this->_request->getParam('txtComments'));
                $skillsEntity->setRelId($relId);
                $skillsEntity->setRelObject($relObject);

                $skillsService->skill = $skillsEntity;

                $skillId = $skillsService->addSkill();
                if ($skillId) {
                    $this->_redirect("/admin/skills/?rel-id=".$relId."&rel-object=".$relObject."&action-status=updated");
                } else {
                    $this->_redirect("/admin/skills/?rel-id=".$relId."&rel-object=".$relObject."&action-status=failed");
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
            $pageHeading = "Edit-Skill";
            $this->view->page_heading = $pageHeading;
            $this->view->data_page = "forms";

            // get all the professional experiences for the selected staff ...
            $skillsService = new Base_Model_Lib_App_Core_Qualification_Service_Skill();
            $skillsEntity  = new Base_Model_Lib_App_Core_Qualification_Entity_Skill();
            
            if ($this->_request->isPost()) {
                
                $relId = $this->_request->getParam('rel-id');
                $relObject = $this->_request->getParam('rel-object');
                $skillsEntity->setId($this->_request->getParam('id'));
                $skillsEntity->setTitle($this->_request->getParam('txtTitle'));
                $skillsEntity->setYearsOfExperience($this->_request->getParam('txtYearsOfExperience'));
                $skillsEntity->setComments($this->_request->getParam('txtComments'));
                $skillsEntity->setRelId($relId);
                $skillsEntity->setRelObject($relObject);

                $skillsService->skill = $skillsEntity;

                $isUpdated = $skillsService->updateSkill();
                if ($isUpdated) {
                    $this->_redirect("/admin/skills/?rel-id=".$relId."&rel-object=".$relObject."&action-status=updated");
                } else {
                    $this->_redirect("/admin/skills/?rel-id=".$relId."&rel-object=".$relObject."&action-status=failed");
                }
            } else {
                $skillId = $this->_request->getParam('id');
                $skillsInfo = $skillsService->getSkill($skillId);
                $this->view->skillsInfo = $skillsInfo;
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
            $pageHeading = "View-Skill";
            $this->view->page_heading = $pageHeading;
            $this->view->data_page = "forms";

           // get all the professional experiences for the selected staff ...
            $skillsService = new Base_Model_Lib_App_Core_Qualification_Service_Skill();
             $skillId = $this->_request->getParam('id');
             $skillsInfo = $skillsService->getSkill($skillId);
             $this->view->skillsInfo = $skillsInfo;
                
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
            $skillId = $this->_request->getParam('id');
            
            // get all the professional experiences for the selected staff ...
            $skillsService = new Base_Model_Lib_App_Core_Qualification_Service_Skill();
            $skillsEntity  = new Base_Model_Lib_App_Core_Qualification_Entity_Skill();
            $skillsEntity->setId($skillId);
            $skillsService->skill = $skillsEntity;
            $isDeleted = $skillsService->deleteSkill();
            if ($isDeleted) {
                    $this->_redirect("/admin/skills/?rel-id=".$relId."&rel-object=".$relObject."&action-status=deleted");
                } else {
                    $this->_redirect("/admin/skills/?rel-id=".$relId."&rel-object=".$relObject."&action-status=failed");
                }
            
        } catch (Exception $ex) {
            throw new Exception('<ERROR>' . $ex->getMessage() . "\n");
        }
    }

}
