<?php

class Admin_AssetController extends Base_Model_Lib_App_Admin_Controller {

    public function init() {
        parent::init();
    }

    /**
     * The default action - show the home page
     */
    public function indexAction() {
        try {
            $pageHeading = "Assets";
            $this->view->page_heading = $pageHeading;
            $this->view->data_page = "tables";

            // get all the country...
            $assetService = new Base_Model_Lib_App_Core_Asset_Service_Asset();
            $assetEntity = new Base_Model_Lib_App_Core_Asset_Entity_Asset();
            
            $assetService->asset = $assetEntity;
            
            $objPaggination = new Base_Model_Lib_Base_Lib_Paggination();
            $page = $this->_getParam('page', 1);
            $objPaggination->CurrentPage = $page;
            $objPaggination->TotalResults = $assetService->searchCount();
            $paginationData = $objPaggination->getPaggingData();
            $pageLimit1 = $paginationData['MYSQL_LIMIT1'];
            $pageLimit2 = $paginationData['MYSQL_LIMIT2'];

            $limit = " LIMIT $pageLimit1,$pageLimit2";


            $assetService->asset = $assetEntity;
            $assetInfo = $assetService->search($limit);
            $this->view->assetInfo = $assetInfo;
            
            $this->view->pageNum = $page;
            $this->view->rowsPerPage = $objPaggination->ResultsPerPage;
            $this->view->paggination = $objPaggination;
            
            
        } catch (Exception $ex) {
            throw new Exception('<ERROR>' . $ex->getMessage() . "\n");
        }
    }

    /**
     * The add action
     */
    public function addAction() {
        try {
            $pageHeading = "Add-New-Asset";
            $this->view->page_heading = $pageHeading;
            $this->view->data_page = "forms";

            // add new asset information...
            $assetService = new Base_Model_Lib_App_Core_Asset_Service_Asset();
            $assetEntity = new Base_Model_Lib_App_Core_Asset_Entity_Asset();
            
            if ($this->_request->isPost()) {
                
                $itemPicture = $_FILES['txtItemPicture'];
                $itemPictureName = "";
                $itemPictureTmpName = "";
                $attachInvoiceName = "";
                $attachInvoiceTmpName = "";
                
                
                
                if($itemPicture){
                    if($itemPicture['name'] != ""){
                        $itemPictureName = $this->generateSystemFileName($itemPicture['name']);
                        $itemPictureTmpName = $itemPicture['tmp_name'];
                    }
                }
                $attachInvoice = $_FILES['txtAttachInvoice'];
                if($attachInvoice){
                    if($attachInvoice['name'] != ""){
                        $attachInvoiceName = $this->generateSystemFileName($attachInvoice['name']);
                        $attachInvoiceTmpName = $attachInvoice['tmp_name'];
                    }
                }
                
                $assetEntity->setAssetType($this->_request->getParam('txtAssetType'));
                $assetEntity->setTagNumber($this->_request->getParam('txtTagNumber'));
                $assetEntity->setDescription($this->_request->getParam('txtDescription'));
                $assetEntity->setCategory($this->_request->getParam('txtCategory'));
                $assetEntity->setVendor($this->_request->getParam('txtVendor'));
                $assetEntity->setModel($this->_request->getParam('txtModel'));
                $assetEntity->setSerialNumber($this->_request->getParam('txtSerialNumber'));
                $assetEntity->setBarcode($this->_request->getParam('txtBarcode'));
                $assetEntity->setDateAcquired($this->_request->getParam('txtDateAcquired'));
               // $assetEntity->setDateDisposed($this->_request->getParam('txtDateDisposed'));
                $assetEntity->setCountry($this->_request->getParam('txtCountry'));
                $assetEntity->setRegion($this->_request->getParam('txtRegion'));
                $assetEntity->setBranch($this->_request->getParam('txtBranchName'));
                $assetEntity->setDepartment($this->_request->getParam('txtDepartmentName'));
                $assetEntity->setCurrentUser($this->_request->getParam('txtCurrentUser'));
                //$assetEntity->setPriviousUser($this->_request->getParam('txtPriviousUser'));
                $recordStatus = $this->_request->getParam('txtStatus');
                $assetEntity->setStatus($recordStatus);
                //$assetEntity->setLastMaintenanceDate($this->_request->getParam('txtLastMaintenanceDate'));
                $assetEntity->setNextMaintenanceDate($this->_request->getParam('txtNextMaintenanceDate'));
                $assetEntity->setPurchasedDate($this->_request->getParam('txtPurchasedDate'));
                $assetEntity->setCost($this->_request->getParam('txtCost'));
                $assetEntity->setPurchasedFrom($this->_request->getParam('txtPurchasedFrom'));
                $assetEntity->setAttachedInvoice($attachInvoiceName);
                $assetEntity->setItemPicture($itemPictureName);
                $assetEntity->setWarrantyValiedUntil($this->_request->getParam('txtWarrantyValidUntil'));
                $assetEntity->setDateCreated($this->getSystemDate());
                $assetEntity->setCreatedBy($this->getUserId());
                $assetEntity->setModifiedBy(NULL);
                $assetEntity->setDateModified(null);
                $assetService->asset = $assetEntity;
                $assetId = $assetService->addAsset();
                if ($assetId) {
                    
                     if($itemPictureName){
                        move_uploaded_file($itemPictureTmpName,APPLICATION_PATH.'/../images/assets/item-pictures/'.$itemPictureName);
                    }
                    
                    if($attachInvoiceName){
                        move_uploaded_file($attachInvoiceTmpName,APPLICATION_PATH.'/../images/assets/invoices/'.$attachInvoiceName);
                    }
                    
                    // add the details to the system logs....
                    $actionName = 'ADD_NEW';
                    $logMessage = "log-msg-record-added";
                    $tableName = 'tbl_assets';
                    $rowId = $assetId;
                    $this->addSystemLog($actionName, $logMessage, $tableName, $rowId);
                    
                    $actionName = 'STATUS';
                    $logMessage = $recordStatus;
                    $tableName = 'tbl_assets';
                    $rowId = $assetId;
                    $this->addSystemLog($actionName, $logMessage, $tableName, $rowId);
                    
                    
                    $this->_redirect("/admin/asset/?action-status=updated");
                } else {
                    $this->_redirect("/admin/asset/?action-status=failed");
                }
            } else {
                
                // get all the country...
                $countryService = new Base_Model_Lib_App_Core_Catalog_Service_Country();
                $countryEntity  = new Base_Model_Lib_App_Core_Catalog_Entity_Country();
                $countryService->country = $countryEntity;
                $countries = $countryService->search();
                $this->view->countries = $countries;
                
                
                // get all the vendor list....
                $vendorService = new Base_Model_Lib_App_Core_Catalog_Service_Vendor();
                $vendorEntity  = new Base_Model_Lib_App_Core_Catalog_Entity_Vendor();
                $vendorEntity->setStatus('1');
                $vendorService->vendor = $vendorEntity;
                $vendorList = $vendorService->search();
                $this->view->vendorList = $vendorList;
                
                
                // get all the category list....
                $categoryService = new Base_Model_Lib_App_Core_Catalog_Service_Category();
                $categoryEntity  = new Base_Model_Lib_App_Core_Catalog_Entity_Category();
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
            $pageHeading = "Edit-Asset";
            $this->view->page_heading = $pageHeading;
            $this->view->data_page = "forms";

           // add new asset information...
            $assetService = new Base_Model_Lib_App_Core_Asset_Service_Asset();
            $assetEntity = new Base_Model_Lib_App_Core_Asset_Entity_Asset();
            
            if ($this->_request->isPost()) {
                
                $itemPicture = $_FILES['txtItemPicture'];
                $itemPictureName = "";
                $itemPictureTmpName = "";
                $attachInvoiceName = "";
                $attachInvoiceTmpName = "";
                
                
                if($itemPicture){
                    if($itemPicture['name'] != ""){
                        $itemPictureName = $this->generateSystemFileName($itemPicture['name']);
                        $itemPictureTmpName = $itemPicture['tmp_name'];
                    }
                }
                $attachInvoice = $_FILES['txtAttachInvoice'];
                if($attachInvoice){
                    if($attachInvoice['name'] != ""){
                        $attachInvoiceName = $this->generateSystemFileName($attachInvoice['name']);
                        $attachInvoiceTmpName = $attachInvoice['tmp_name'];
                    }
                }
                
                $recordId = $this->_request->getParam('id');
                $assetEntity->setId($recordId);
                $assetEntity->setAssetType($this->_request->getParam('txtAssetType'));
                $assetEntity->setTagNumber($this->_request->getParam('txtTagNumber'));
                $assetEntity->setDescription($this->_request->getParam('txtDescription'));
                $assetEntity->setCategory($this->_request->getParam('txtCategory'));
                $assetEntity->setVendor($this->_request->getParam('txtVendor'));
                $assetEntity->setModel($this->_request->getParam('txtModel'));
                $assetEntity->setSerialNumber($this->_request->getParam('txtSerialNumber'));
                $assetEntity->setBarcode($this->_request->getParam('txtBarcode'));
                $assetEntity->setDateAcquired($this->_request->getParam('txtDateAcquired'));
               
                $assetEntity->setCountry($this->_request->getParam('txtCountry'));
                $assetEntity->setRegion($this->_request->getParam('txtRegion'));
                $assetEntity->setBranch($this->_request->getParam('txtBranchName'));
                $assetEntity->setDepartment($this->_request->getParam('txtDepartmentName'));
                
                $newCurrentUser = $this->_request->getParam('txtCurrentUser');
                $oldCurrentUser = $this->_request->getParam('txtOldCurrentUser');
                
                $assetEntity->setCurrentUser($this->_request->getParam('txtCurrentUser'));
                
                
                if($oldCurrentUser != $newCurrentUser){
                    $assetEntity->setPriviousUser($oldCurrentUser);
                } else {
                    $assetEntity->setPriviousUser($this->_request->getParam('txtPreviousUser'));
                }
                
                $recordStatus = $this->_request->getParam('txtStatus');
                $oldStatus = $this->_request->getParam('txtOldStatus');
                $assetEntity->setStatus($recordStatus);
                if($recordStatus == 'assets-out-of-use' || $recordStatus == 'assets-sold'){
                    if($this->_request->getParam('txtDateDisposed') == ""){
                        $assetEntity->setDateDisposed($this->getSystemDate());
                    } else {
                        $assetEntity->setDateDisposed($this->_request->getParam('txtDateDisposed'));
                    }
                }
                
                //$assetEntity->setLastMaintenanceDate($this->_request->getParam('txtLastMaintenanceDate'));
                $assetEntity->setNextMaintenanceDate($this->_request->getParam('txtNextMaintenanceDate'));
                $assetEntity->setPurchasedDate($this->_request->getParam('txtPurchasedDate'));
                $assetEntity->setCost($this->_request->getParam('txtCost'));
                $assetEntity->setPurchasedFrom($this->_request->getParam('txtPurchasedFrom'));
                
                
                if($attachInvoiceName != ""){
                    $assetEntity->setAttachedInvoice($attachInvoiceName);
                }else{
                    $assetEntity->setAttachedInvoice($this->_request->getParam('txtOldAttachedInvoice'));
                }
                
                if($itemPictureName != ""){
                    $assetEntity->setItemPicture($itemPictureName);
                } else {
                    $assetEntity->setItemPicture($this->_request->getParam('txtItemOldPicture'));
                }
                
                
                $assetEntity->setWarrantyValiedUntil($this->_request->getParam('txtWarrantyValidUntil'));
                $assetEntity->setModifiedBy($this->getSystemDate());
                $assetEntity->setDateModified($this->getUserId());
                $assetService->asset = $assetEntity;
                $isUpdated = $assetService->updateAsset();
                if ($isUpdated) {
                    
                    if($itemPictureName){
                        move_uploaded_file($itemPictureTmpName,APPLICATION_PATH.'/../images/assets/item-pictures/'.$itemPictureName);
                    }
                    
                    if($attachInvoiceName){
                        move_uploaded_file($attachInvoiceTmpName,APPLICATION_PATH.'/../images/assets/invoices/'.$attachInvoiceName);
                    }
                    
                    $actionName = 'EDIT';
                    $logMessage = "log-msg-record-edited";
                    $tableName = 'tbl_assets';
                    $rowId = $recordId;
                    $this->addSystemLog($actionName, $logMessage, $tableName, $rowId);
                    if($recordStatus != $oldStatus){
                        $actionName = 'STATUS_CHANGED';
                        $logMessage = $recordStatus;
                        $tableName = 'tbl_assets';
                        $rowId = $recordId;
                        $this->addSystemLog($actionName, $logMessage, $tableName, $rowId);
                    }
                    
                    if($itemPictureName){
                        $actionName = 'EDIT';
                        $logMessage = 'item-picture-changed';
                        $tableName = 'tbl_assets';
                        $rowId = $recordId;
                        $this->addSystemLog($actionName, $logMessage, $tableName, $rowId);
                    }

                    if($attachInvoiceName){
                        $actionName = 'EDIT';
                        $logMessage = 'invoice-picture-changed';
                        $tableName = 'tbl_assets';
                        $rowId = $recordId;
                        $this->addSystemLog($actionName, $logMessage, $tableName, $rowId);
                    }
                    
                    if($oldCurrentUser != $newCurrentUser){
                        $actionName = 'ASSIGNED';
                        $logMessage = $newCurrentUser;
                        $tableName = 'tbl_assets';
                        $rowId = $recordId;
                        $this->addSystemLog($actionName, $logMessage, $tableName, $rowId);
                    }
                    
                    $this->_redirect("/admin/asset/?action-status=updated");
                } else {
                    $this->_redirect("/admin/asset/?action-status=failed");
                }
            } else {
                
                // get all the country...
                $countryService = new Base_Model_Lib_App_Core_Catalog_Service_Country();
                $countryEntity  = new Base_Model_Lib_App_Core_Catalog_Entity_Country();
                $countryService->country = $countryEntity;
                $countries = $countryService->search();
                $this->view->countries = $countries;
                
                $assetId = $this->_request->getParam('id');
                $assetInformation = $assetService->getAsset($assetId);
                $this->view->assetInformation = $assetInformation;
                
                $countryId = $assetInformation->getCountry();
                // get all the Regions...
                $regionService = new Base_Model_Lib_App_Core_Catalog_Service_Region();
                $regionEntity  = new Base_Model_Lib_App_Core_Catalog_Entity_Region();
                $regionEntity->setCountry($countryId);
                $regionService->region = $regionEntity;
                $regions = $regionService->search();
                $this->view->regions = $regions;
                
                
                $regionId = $assetInformation->getRegion();
                // get all the Regions...
                $branchService = new Base_Model_Lib_App_Core_Catalog_Service_Branch();
                $branchEntity  = new Base_Model_Lib_App_Core_Catalog_Entity_Branch();
                $branchEntity->setRegion($regionId);
                $branchService->branch = $branchEntity;
                $branches = $branchService->search();
                $this->view->branches = $branches;
            
                 $branchId = $assetInformation->getBranch();
                // get all the Regions...
                $departmentService = new Base_Model_Lib_App_Core_Catalog_Service_Department();
                $departmentEntity  = new Base_Model_Lib_App_Core_Catalog_Entity_Department();
                $departmentEntity->setBranch($branchId);
                $departmentService->department = $departmentEntity;
                $departments = $departmentService->search();
                $this->view->departments = $departments;
                
                // get all the vendor list....
                $vendorService = new Base_Model_Lib_App_Core_Catalog_Service_Vendor();
                $vendorEntity  = new Base_Model_Lib_App_Core_Catalog_Entity_Vendor();
                $vendorEntity->setStatus('1');
                $vendorService->vendor = $vendorEntity;
                $vendorList = $vendorService->search();
                $this->view->vendorList = $vendorList;
                
                
                // get all the category list....
                $categoryService = new Base_Model_Lib_App_Core_Catalog_Service_Category();
                $categoryEntity  = new Base_Model_Lib_App_Core_Catalog_Entity_Category();
                $categoryService->category = $categoryEntity;
                $categoryList = $categoryService->search();
                $this->view->categoryList = $categoryList;
                
                $categoryId = $assetInformation->getCategory();
            // get all the Modles...
            $modelService = new Base_Model_Lib_App_Core_Catalog_Service_Model();
            $modelEntity  = new Base_Model_Lib_App_Core_Catalog_Entity_Model();
            $modelEntity->setCategory($categoryId);
            $modelService->model = $modelEntity;
            $models = $modelService->search();
            $this->view->models = $models;
                
                
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
            $pageHeading = "Delete-Asset";
            $this->view->page_heading = $pageHeading;
            $this->view->data_page = "forms";

            // delete asset....
            $recordId = $this->_request->getParam('id');
            $assetService = new Base_Model_Lib_App_Core_Asset_Service_Asset();
            $assetEntity = new Base_Model_Lib_App_Core_Asset_Entity_Asset();
            $assetEntity->setId($recordId);
            $assetService->asset = $assetEntity;
            $isDeleted = $assetService->deleteAsset();
            if ($isDeleted) {
                
                    $actionName = 'DELETE';
                    $logMessage = "log-msg-record-deleted";
                    $tableName = 'tbl_assets';
                    $rowId = $recordId;
                    $this->addSystemLog($actionName, $logMessage, $tableName, $rowId);
                $this->_redirect("/admin/asset/?action-status=deleted");
            } else {
                $this->_redirect("/admin/asset/?action-status=failed");
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
            $pageHeading = "View-Asset";
            $this->view->page_heading = $pageHeading;
            $this->view->data_page = "forms";

           // add new asset information...
            $assetService = new Base_Model_Lib_App_Core_Asset_Service_Asset();
            $assetEntity = new Base_Model_Lib_App_Core_Asset_Entity_Asset();
            
            $assetId = $this->_request->getParam('id');
            $assetInformation = $assetService->getAsset($assetId);
            $this->view->assetInformation = $assetInformation;
                
            $countryId = $assetInformation->getCountry();
            
            $countryService = new Base_Model_Lib_App_Core_Catalog_Service_Country();
            $countryInfo    = $countryService->getCountry($countryId); 
            $this->view->countryInfo = $countryInfo;
                
            $regionId = $assetInformation->getRegion();
            $regionService = new Base_Model_Lib_App_Core_Catalog_Service_Region();
            $regionInfo    = $regionService->getRegion($regionId);
            $this->view->regionInfo = $regionInfo;
              
            $branchId = $assetInformation->getBranch();
            $branchService = new Base_Model_Lib_App_Core_Catalog_Service_Branch();
            $branchInfo    = $branchService->getBranch($branchId);    
            $this->view->branchInfo = $branchInfo;   
                
            $departmentId = $assetInformation->getDepartment();
            $departmentService = new Base_Model_Lib_App_Core_Catalog_Service_Department();
            $departmentInfo    =  $departmentService->getDepartment($departmentId);
            $this->view->departmentInfo = $departmentInfo;
             
            $venderId = $assetInformation->getVendor();
            $vendorService = new Base_Model_Lib_App_Core_Catalog_Service_Vendor();
            $venderInfo    = $vendorService->getVendor($venderId);
            $this->view->venderInfo = $venderInfo;
              
            
            $categoryId = $assetInformation->getCategory();
            $categoryService = new Base_Model_Lib_App_Core_Catalog_Service_Category();
            $categoryInfo    = $categoryService->getCategory($categoryId);
            $this->view->categoryInfo = $categoryInfo;
               
            $modelId = $assetInformation->getModel();
            $modelService = new Base_Model_Lib_App_Core_Catalog_Service_Model();
            $modelInfo = $modelService->getModel($modelId);
            $this->view->modelInfo = $modelInfo;
           
            
            // get the log information for the selected asset...
            $logService = new Base_Model_Lib_App_Core_System_Service_Log();
            $logEntity = new Base_Model_Lib_App_Core_System_Entity_Log();
            $logEntity->setTableName('tbl_assets');
            $logEntity->setRowId($assetId);
            $logService->log = $logEntity;
            $logInformation = $logService->search();
            $this->view->logInformation = $logInformation;
            
        } catch (Exception $ex) {
            throw new Exception('<ERROR>' . $ex->getMessage() . "\n");
        }
    }
    
    


}
