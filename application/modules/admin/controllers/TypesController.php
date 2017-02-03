<?php

class Admin_TypesController extends Base_Model_ObtorLib_App_Admin_Controller {

    public function init() {
        parent::init();
    }

    /**
     * The default action - show the home page
     */
    public function indexAction() {
        try {
            $pageHeading = "Job-Types";
            $this->view->page_heading = $pageHeading;
            $this->view->data_page = "tables";
                // get all the types list....
                $relName = $this->_request->getParam('rel');
                $typesService = new Base_Model_Lib_Product_Service_Types();
                $typesList = $typesService->getAll($relName);
                $this->view->typesList = $typesList;
                
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
            $pageHeading = "Add-New-Type";
            $this->view->page_heading = $pageHeading;
            $this->view->data_page = "forms";

            // add new country name...
            $typesService = new Base_Model_Lib_Product_Service_Types();
            $typesEntity  = new Base_Model_Lib_Product_Entity_Types();
            
            if ($this->_request->isPost()) {
                $relName = $this->_request->getParam('rel');
                $typesEntity->setName($this->_request->getParam('txtTypeName'));
                $typesEntity->setObjectType($relName);
                $typesService->types = $typesEntity;

                $typesId = $typesService->addItem();
                if ($typesId) {
                    
                    // add the details to the system logs....
                    $actionName = 'ADD_NEW';
                    $logMessage = "log-msg-record-added";
                    $tableName = 'tbl_types';
                    $rowId = $typesId;
                    $this->addSystemLog($actionName, $logMessage, $tableName, $rowId);
                    $this->_redirect("/admin/types/?action-status=updated&rel=".$relName);
                } else {
                    $this->_redirect("/admin/types/?action-status=failed&rel=".$relName);
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
            $pageHeading = "Edit-Category";
            $this->view->page_heading = $pageHeading;
            $this->view->data_page = "forms";

       
            // add new country name...
            $typesService = new Base_Model_Lib_Product_Service_Types();
            $typesEntity  = new Base_Model_Lib_Product_Entity_Types();
            
            if ($this->_request->isPost()) {
                $relName = $this->_request->getParam('rel');
                $recordId = $this->_request->getParam('id');
                $typesEntity->setId($recordId);
                $typesEntity->setName($this->_request->getParam('txtTypeName'));
                $typesEntity->setObjectType($relName);
                $typesService->types = $typesEntity;

                $isUpdated = $typesService->updateItem();
                if ($isUpdated) {
                    
                    // add the details to the system logs....
                    $actionName = 'EDIT';
                    $logMessage = "log-msg-record-edited";
                    $tableName = 'tbl_types';
                    $rowId = $recordId;
                    $this->addSystemLog($actionName, $logMessage, $tableName, $rowId);
                    $this->_redirect("/admin/types/?action-status=updated&rel=".$relName);
                } else {
                    $this->_redirect("/admin/types/?action-status=failed&rel=".$relName);
                }
            } else {
                  $recordId = $this->_request->getParam('id');
                 $typesService = new Base_Model_Lib_Product_Service_Types();
                 $typesInfo    = $typesService->getItem($recordId);
                 $this->view->typesInfo = $typesInfo;
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
            $pageHeading = "Delete-Category";
            $this->view->page_heading = $pageHeading;
            $this->view->data_page = "forms";

            // delete types....
            $recordId = $this->_request->getParam('id');
            $typesService = new Base_Model_Lib_Product_Service_Types();
            $typesEntity  = new Base_Model_Lib_Product_Entity_Types();
            $typesEntity->setId($recordId);
            $relName = $this->_request->getParam('rel');
            $typesService->types = $typesEntity;
            $isDeleted = $typesService->deleteItem();
            if ($isDeleted) {
                
                    $actionName = 'EDIT';
                    $logMessage = "log-msg-record-deleted";
                    $tableName = 'tbl_types';
                    $rowId = $recordId;
                    $this->addSystemLog($actionName, $logMessage, $tableName, $rowId);
                $this->_redirect("/admin/types/?action-status=deleted&rel=".$relName);
            } else {
                $this->_redirect("/admin/types/?action-status=failed&rel=".$relName);
            }
        } catch (Exception $ex) {
            throw new Exception('<ERROR>' . $ex->getMessage() . "\n");
        }
    }

}
