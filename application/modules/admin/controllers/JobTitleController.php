<?php

class Admin_JobTitleController extends Base_Model_ObtorLib_App_Admin_Controller {

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

            // get all the jobTitle...
            $jobTitleService = new Base_Model_ObtorLib_App_Core_Catalog_Service_JobTitle();
            $jobTitleEntity  = new Base_Model_ObtorLib_App_Core_Catalog_Entity_JobTitle();
            $jobTitleService->jobTitle = $jobTitleEntity;
            $jobTitles = $jobTitleService->search();
            $this->view->jobTitles = $jobTitles;
        } catch (Exception $ex) {
            throw new Exception('<ERROR>' . $ex->getMessage() . "\n");
        }
    }

    /**
     * The add action
     */
    public function addAction() {
        try {
            $pageHeading = "Add-New-JobTitle";
            $this->view->page_heading = $pageHeading;
            $this->view->data_page = "forms";

            // add new jobTitle name...
            $jobTitleService = new Base_Model_ObtorLib_App_Core_Catalog_Service_JobTitle();
            $jobTitleEntity = new Base_Model_ObtorLib_App_Core_Catalog_Entity_JobTitle();
            
            if ($this->_request->isPost()) {
                $jobTitleEntity->setName($this->_request->getParam('txtJobTitleName'));
                $jobTitleEntity->setPrefix($this->_request->getParam('txtJobTitleCode'));
                $jobTitleService->jobTitle = $jobTitleEntity;

                $jobTitleId = $jobTitleService->addJobTitle();
                if ($jobTitleId) {
                    $this->_redirect("/admin/job-title/?action-status=updated");
                } else {
                    $this->_redirect("/admin/job-title/?action-status=failed");
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
            $pageHeading = "Edit-JobTitle";
            $this->view->page_heading = $pageHeading;
            $this->view->data_page = "forms";

           // edit jobTitle name...
            $jobTitleService = new Base_Model_ObtorLib_App_Core_Catalog_Service_JobTitle();
            $jobTitleEntity = new Base_Model_ObtorLib_App_Core_Catalog_Entity_JobTitle();
            if ($this->_request->isPost()) {
                $jobTitleEntity->setId($this->_request->getParam('id'));
                $jobTitleEntity->setName($this->_request->getParam('txtJobTitleName'));
                $jobTitleEntity->setPrefix($this->_request->getParam('txtJobTitleCode'));
                $jobTitleService->jobTitle = $jobTitleEntity;

                $isUpdated = $jobTitleService->updateJobTitle();
                if ($isUpdated) {
                    $this->_redirect("/admin/job-title/?action-status=updated");
                } else {
                    $this->_redirect("/admin/job-title/?action-status=failed");
                }
            } else {
                $jobTitleId = $this->_request->getParam('id');
                $jobTitleInfo = $jobTitleService->getJobTitle($jobTitleId);
                $this->view->jobTitleInfo = $jobTitleInfo;
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
            $pageHeading = "Delete-JobTitle";
            $this->view->page_heading = $pageHeading;
            $this->view->data_page = "forms";

            // delete jobTitle....
            $jobTitleService = new Base_Model_ObtorLib_App_Core_Catalog_Service_JobTitle();
            $jobTitleEntity = new Base_Model_ObtorLib_App_Core_Catalog_Entity_JobTitle();
            $jobTitleEntity->setId($this->_request->getParam('id'));
            $jobTitleService->jobTitle = $jobTitleEntity;
            $jobTitleId = $jobTitleService->deleteJobTitle();
            if ($jobTitleId) {
                $this->_redirect("/admin/job-title/?action-status=deleted");
            } else {
                $this->_redirect("/admin/job-title/?action-status=failed");
            }
        } catch (Exception $ex) {
            throw new Exception('<ERROR>' . $ex->getMessage() . "\n");
        }
    }

}
