<?php

class Admin_VendorController extends Base_Model_ObtorLib_App_Admin_Controller {

    public function init() {
        parent::init();
    }

    /**
     * The default action - show the home page
     */
    public function indexAction() {
        try {
            $pageHeading = "Vendors";
            $this->view->page_heading = $pageHeading;
            $this->view->data_page = "tables";
                // get all the vendor list....
                $vendorService = new Base_Model_ObtorLib_App_Core_Catalog_Service_Vendor();
                $vendorEntity  = new Base_Model_ObtorLib_App_Core_Catalog_Entity_Vendor();
                $vendorService->vendor = $vendorEntity;
                $vendorList = $vendorService->search();
                $this->view->vendorList = $vendorList;
                
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
            $pageHeading = "Add-New-Vendor";
            $this->view->page_heading = $pageHeading;
            $this->view->data_page = "forms";

            // add new country name...
            $vendorService = new Base_Model_ObtorLib_App_Core_Catalog_Service_Vendor();
            $vendorEntity  = new Base_Model_ObtorLib_App_Core_Catalog_Entity_Vendor();
            
            if ($this->_request->isPost()) {
                $vendorEntity->setName($this->_request->getParam('txtVendorName'));
                $vendorEntity->setAddress($this->_request->getParam('txtVendorAddress'));
                $vendorEntity->setContactNumbers($this->_request->getParam('txtContactNumber'));
                $vendorEntity->setStatus($this->_request->getParam('txtVendorStatus'));
                $vendorEntity->setCreatedBy($this->getUserId());
                $vendorEntity->setDateCreated($this->getSystemDateTime());
                $vendorEntity->setDateModified(NULL);
                $vendorEntity->setModifiedBy(NULL);
                $vendorService->vendor = $vendorEntity;

                $vendorId = $vendorService->addVendor();
                if ($vendorId) {
                    
                    // add the details to the system logs....
                    $actionName = 'ADD_NEW';
                    $logMessage = "log-msg-record-added";
                    $tableName = 'tbl_vendor';
                    $rowId = $vendorId;
                    $this->addSystemLog($actionName, $logMessage, $tableName, $rowId);
                    $this->_redirect("/admin/vendor/?action-status=updated");
                } else {
                    $this->_redirect("/admin/vendor/?action-status=failed");
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
            $pageHeading = "Edit-Vendor";
            $this->view->page_heading = $pageHeading;
            $this->view->data_page = "forms";

       
            // add new country name...
            $vendorService = new Base_Model_ObtorLib_App_Core_Catalog_Service_Vendor();
            $vendorEntity  = new Base_Model_ObtorLib_App_Core_Catalog_Entity_Vendor();
            
            if ($this->_request->isPost()) {
                $recordId = $this->_request->getParam('id');
                $vendorEntity->setId($recordId);
                $vendorEntity->setName($this->_request->getParam('txtVendorName'));
                 $vendorEntity->setAddress($this->_request->getParam('txtVendorAddress'));
                $vendorEntity->setContactNumbers($this->_request->getParam('txtContactNumber'));
                $vendorEntity->setStatus($this->_request->getParam('txtVendorStatus'));
                $vendorEntity->setCreatedBy($this->getUserId());
                $vendorEntity->setDateCreated($this->getSystemDateTime());
                $vendorEntity->setDateModified($this->getSystemDateTime());
                $vendorEntity->setModifiedBy($this->getUserId());
                $vendorService->vendor = $vendorEntity;

                $isUpdated = $vendorService->updateVendor();
                if ($isUpdated) {
                    
                    // add the details to the system logs....
                    $actionName = 'EDIT';
                    $logMessage = "log-msg-record-edited";
                    $tableName = 'tbl_vendor';
                    $rowId = $recordId;
                    $this->addSystemLog($actionName, $logMessage, $tableName, $rowId);
                    $this->_redirect("/admin/vendor/?action-status=updated");
                } else {
                    $this->_redirect("/admin/vendor/?action-status=failed");
                }
            } else {
                  $recordId = $this->_request->getParam('id');
                 $vendorService = new Base_Model_ObtorLib_App_Core_Catalog_Service_Vendor();
                 $vendorInfo    = $vendorService->getVendor($recordId);
                 $this->view->vendorInfo = $vendorInfo;
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
            $pageHeading = "Delete-Vendor";
            $this->view->page_heading = $pageHeading;
            $this->view->data_page = "forms";

            // delete vendor....
            $recordId = $this->_request->getParam('id');
            $vendorService = new Base_Model_ObtorLib_App_Core_Catalog_Service_Vendor();
            $vendorEntity  = new Base_Model_ObtorLib_App_Core_Catalog_Entity_Vendor();
            $vendorEntity->setId($recordId);
            $relName = $this->_request->getParam('rel');
            $vendorService->vendor = $vendorEntity;
            $isDeleted = $vendorService->deleteVendor();
            if ($isDeleted) {
                
                    $actionName = 'EDIT';
                    $logMessage = "log-msg-record-deleted";
                    $tableName = 'tbl_vendor';
                    $rowId = $recordId;
                    $this->addSystemLog($actionName, $logMessage, $tableName, $rowId);
                $this->_redirect("/admin/vendor/?action-status=deleted");
            } else {
                $this->_redirect("/admin/vendor/?action-status=failed");
            }
        } catch (Exception $ex) {
            throw new Exception('<ERROR>' . $ex->getMessage() . "\n");
        }
    }

}
