<?php

class Admin_ModelController extends Base_Model_ObtorLib_App_Admin_Controller {

    public function init() {
        parent::init();
    }

    /**
     * The default action - show the home page
     */
    public function indexAction() {
        try {
            $pageHeading = "Categories";
            $this->view->page_heading = $pageHeading;
            $this->view->data_page = "tables";
                // get all the model list....
                $relName = $this->_request->getParam('rel');
                $modelService = new Base_Model_ObtorLib_App_Core_Catalog_Service_Model();
                $modelEntity  = new Base_Model_ObtorLib_App_Core_Catalog_Entity_Model();
                $modelEntity->setRelName($relName);
                $modelService->model = $modelEntity;
                $modelList = $modelService->search();
                $this->view->modelList = $modelList;
                
                $this->view->relName = $relName;
                
        } catch (Exception $ex) {
            throw new Exception('<ERROR>' . $ex->getMessage() . "\n");
        }
    }

    /**
     * The add action
     */
    public function addAction() {
        try {
            $pageHeading = "Add-New-Model";
            $this->view->page_heading = $pageHeading;
            $this->view->data_page = "forms";

            // add new country name...
            $modelService = new Base_Model_ObtorLib_App_Core_Catalog_Service_Model();
            $modelEntity  = new Base_Model_ObtorLib_App_Core_Catalog_Entity_Model();
            
            if ($this->_request->isPost()) {
                $relName = $this->_request->getParam('rel');
                $modelEntity->setName($this->_request->getParam('txtModelName'));
                $modelEntity->setCategory($this->_request->getParam('txtModelCategory'));
                $modelEntity->setCreatedBy($this->getUserId());
                $modelEntity->setDateCreated($this->getSystemDateTime());
                $modelEntity->setRelName($relName);
                $modelEntity->setDateModified(NULL);
                $modelEntity->setModifiedBy(NULL);
                $modelService->model = $modelEntity;

                $modelId = $modelService->addModel();
                if ($modelId) {
                    
                    // add the details to the system logs....
                    $actionName = 'ADD_NEW';
                    $logMessage = "log-msg-record-added";
                    $tableName = 'tbl_model';
                    $rowId = $modelId;
                    $this->addSystemLog($actionName, $logMessage, $tableName, $rowId);
                    $this->_redirect("/admin/model/?action-status=updated&rel=".$relName);
                } else {
                    $this->_redirect("/admin/model/?action-status=failed&rel=".$relName);
                }
            } else {
                
                $relName = $this->_request->getParam('rel');
                $categoryService = new Base_Model_ObtorLib_App_Core_Catalog_Service_Category();
                $categoryEntity  = new Base_Model_ObtorLib_App_Core_Catalog_Entity_Category();
                $categoryEntity->setRelName($relName);
                $categoryService->category = $categoryEntity;
                $categoryList = $categoryService->search();
                $this->view->categoryList = $categoryList;
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
            $pageHeading = "Edit-Model";
            $this->view->page_heading = $pageHeading;
            $this->view->data_page = "forms";

       
            // add new country name...
            $modelService = new Base_Model_ObtorLib_App_Core_Catalog_Service_Model();
            $modelEntity  = new Base_Model_ObtorLib_App_Core_Catalog_Entity_Model();
            
            if ($this->_request->isPost()) {
                $relName = $this->_request->getParam('rel');
                $recordId = $this->_request->getParam('id');
                $modelEntity->setId($recordId);
                $modelEntity->setName($this->_request->getParam('txtModelName'));
                $modelEntity->setCategory($this->_request->getParam('txtModelCategory'));
                $modelEntity->setCreatedBy($this->getUserId());
                $modelEntity->setDateCreated($this->getSystemDateTime());
                $modelEntity->setRelName($relName);
                $modelEntity->setDateModified($this->getSystemDateTime());
                $modelEntity->setModifiedBy($this->getUserId());
                $modelService->model = $modelEntity;

                $isUpdated = $modelService->updateModel();
                if ($isUpdated) {
                    
                    // add the details to the system logs....
                    $actionName = 'EDIT';
                    $logMessage = "log-msg-record-edited";
                    $tableName = 'tbl_model';
                    $rowId = $recordId;
                    $this->addSystemLog($actionName, $logMessage, $tableName, $rowId);
                    $this->_redirect("/admin/model/?action-status=updated&rel=".$relName);
                } else {
                    $this->_redirect("/admin/model/?action-status=failed&rel=".$relName);
                }
            } else {
                  $recordId = $this->_request->getParam('id');
                 $modelService = new Base_Model_ObtorLib_App_Core_Catalog_Service_Model();
                 $modelInfo    = $modelService->getModel($recordId);
                 $this->view->modelInfo = $modelInfo;
                 
                  $relName = $this->_request->getParam('rel');
                $categoryService = new Base_Model_ObtorLib_App_Core_Catalog_Service_Category();
                $categoryEntity  = new Base_Model_ObtorLib_App_Core_Catalog_Entity_Category();
                $categoryEntity->setRelName($relName);
                $categoryService->category = $categoryEntity;
                $categoryList = $categoryService->search();
                $this->view->categoryList = $categoryList;
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
            $pageHeading = "Delete-Model";
            $this->view->page_heading = $pageHeading;
            $this->view->data_page = "forms";

            // delete model....
            $recordId = $this->_request->getParam('id');
            $modelService = new Base_Model_ObtorLib_App_Core_Catalog_Service_Model();
            $modelEntity  = new Base_Model_ObtorLib_App_Core_Catalog_Entity_Model();
            $modelEntity->setId($recordId);
            $relName = $this->_request->getParam('rel');
            $modelService->model = $modelEntity;
            $isDeleted = $modelService->deleteModel();
            if ($isDeleted) {
                
                    $actionName = 'EDIT';
                    $logMessage = "log-msg-record-deleted";
                    $tableName = 'tbl_model';
                    $rowId = $recordId;
                    $this->addSystemLog($actionName, $logMessage, $tableName, $rowId);
                $this->_redirect("/admin/model/?action-status=deleted&rel=".$relName);
            } else {
                $this->_redirect("/admin/model/?action-status=failed&rel=".$relName);
            }
        } catch (Exception $ex) {
            throw new Exception('<ERROR>' . $ex->getMessage() . "\n");
        }
    }

}
