<?php

class Admin_CategoryController extends Base_Model_Lib_App_Admin_Controller {

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
                // get all the category list....
                $relName = $this->_request->getParam('rel');
                $categoryService = new Base_Model_Lib_App_Core_Catalog_Service_Category();
                $categoryEntity  = new Base_Model_Lib_App_Core_Catalog_Entity_Category();
                $categoryEntity->setRelName($relName);
                $categoryService->category = $categoryEntity;
                $categoryList = $categoryService->search();
                $this->view->categoryList = $categoryList;
                
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
            $pageHeading = "Add-New-Category";
            $this->view->page_heading = $pageHeading;
            $this->view->data_page = "forms";

            // add new country name...
            $categoryService = new Base_Model_Lib_App_Core_Catalog_Service_Category();
            $categoryEntity  = new Base_Model_Lib_App_Core_Catalog_Entity_Category();
            
            if ($this->_request->isPost()) {
                $relName = $this->_request->getParam('rel');
                $categoryEntity->setName($this->_request->getParam('txtCategoryName'));
                $categoryEntity->setPrefix($this->_request->getParam('txtCategoryCode'));
                $categoryEntity->setCreatedBy($this->getUserId());
                $categoryEntity->setDateCreated($this->getSystemDateTime());
                $categoryEntity->setRelName($relName);
                $categoryEntity->setDateModified(NULL);
                $categoryEntity->setModifiedBy(NULL);
                $categoryService->category = $categoryEntity;

                $categoryId = $categoryService->addCategory();
                if ($categoryId) {
                    
                    // add the details to the system logs....
                    $actionName = 'ADD_NEW';
                    $logMessage = "log-msg-record-added";
                    $tableName = 'tbl_category';
                    $rowId = $categoryId;
                    $this->addSystemLog($actionName, $logMessage, $tableName, $rowId);
                    $this->_redirect("/admin/category/?action-status=updated&rel=".$relName);
                } else {
                    $this->_redirect("/admin/category/?action-status=failed&rel=".$relName);
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
            $categoryService = new Base_Model_Lib_App_Core_Catalog_Service_Category();
            $categoryEntity  = new Base_Model_Lib_App_Core_Catalog_Entity_Category();
            
            if ($this->_request->isPost()) {
                $relName = $this->_request->getParam('rel');
                $recordId = $this->_request->getParam('id');
                $categoryEntity->setId($recordId);
                $categoryEntity->setName($this->_request->getParam('txtCategoryName'));
                $categoryEntity->setPrefix($this->_request->getParam('txtCategoryCode'));
                $categoryEntity->setCreatedBy($this->getUserId());
                $categoryEntity->setDateCreated($this->getSystemDateTime());
                $categoryEntity->setRelName($relName);
                $categoryEntity->setDateModified($this->getSystemDateTime());
                $categoryEntity->setModifiedBy($this->getUserId());
                $categoryService->category = $categoryEntity;

                $isUpdated = $categoryService->updateCategory();
                if ($isUpdated) {
                    
                    // add the details to the system logs....
                    $actionName = 'EDIT';
                    $logMessage = "log-msg-record-edited";
                    $tableName = 'tbl_category';
                    $rowId = $recordId;
                    $this->addSystemLog($actionName, $logMessage, $tableName, $rowId);
                    $this->_redirect("/admin/category/?action-status=updated&rel=".$relName);
                } else {
                    $this->_redirect("/admin/category/?action-status=failed&rel=".$relName);
                }
            } else {
                  $recordId = $this->_request->getParam('id');
                 $categoryService = new Base_Model_Lib_App_Core_Catalog_Service_Category();
                 $categoryInfo    = $categoryService->getCategory($recordId);
                 $this->view->categoryInfo = $categoryInfo;
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

            // delete category....
            $recordId = $this->_request->getParam('id');
            $categoryService = new Base_Model_Lib_App_Core_Catalog_Service_Category();
            $categoryEntity  = new Base_Model_Lib_App_Core_Catalog_Entity_Category();
            $categoryEntity->setId($recordId);
            $relName = $this->_request->getParam('rel');
            $categoryService->category = $categoryEntity;
            $isDeleted = $categoryService->deleteCategory();
            if ($isDeleted) {
                
                    $actionName = 'EDIT';
                    $logMessage = "log-msg-record-deleted";
                    $tableName = 'tbl_category';
                    $rowId = $recordId;
                    $this->addSystemLog($actionName, $logMessage, $tableName, $rowId);
                $this->_redirect("/admin/category/?action-status=deleted&rel=".$relName);
            } else {
                $this->_redirect("/admin/category/?action-status=failed&rel=".$relName);
            }
        } catch (Exception $ex) {
            throw new Exception('<ERROR>' . $ex->getMessage() . "\n");
        }
    }

}
