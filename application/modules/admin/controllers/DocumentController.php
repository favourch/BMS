<?php

class Admin_DocumentController extends Base_Model_ObtorLib_App_Admin_Controller {

    public function init() {
        parent::init();
    }

    /**
     * The default action - show the home page
     */
    public function indexAction() {
        try {
            $pageHeading = "Documents";
            $this->view->page_heading = $pageHeading;
            $this->view->data_page = "tables";
            
            // get all the document information...
            $objDocumentEntity = new Base_Model_ObtorLib_App_Core_Doc_Entity_Document();
            $objDocumentService = new Base_Model_ObtorLib_App_Core_Doc_Service_Document();
            $objDocumentService->document = $objDocumentEntity;
            
            $objPaggination = new Base_Model_ObtorLib_Base_Lib_Paggination();
            $page = $this->_getParam('page', 1);
            $objPaggination->CurrentPage = $page;
            $objPaggination->TotalResults = $objDocumentService->searchCount();
            $paginationData = $objPaggination->getPaggingData();
            $pageLimit1 = $paginationData['MYSQL_LIMIT1'];
            $pageLimit2 = $paginationData['MYSQL_LIMIT2'];

            $limit = " LIMIT $pageLimit1,$pageLimit2";


            $objDocumentService->document = $objDocumentEntity;
            $documentsInfo = $objDocumentService->search($limit);
            $this->view->documentInformation = $documentsInfo;
            
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
            $pageHeading = "Add-New-Document";
            $this->view->page_heading = $pageHeading;
            $this->view->data_page = "forms";

            $objDocumentService = new Base_Model_ObtorLib_App_Core_Doc_Service_Document();
             if ($this->_request->isPost()) {
                 
                 
                $itemAttachment 		= $_FILES['txtAttachment'];
                $itemAttachmentName 		= "";
                $itemAttachmentTmpName 		= "";
                $itemAttachmentName 		= "";
                $itemAttachmentTmpName 		= "";



                if ($itemAttachment) {
                    if ($itemAttachment['name'] != "") {
                        $itemAttachmentName = $this->generateSystemFileName($itemAttachment['name']);
                        $itemAttachmentTmpName = $itemAttachment['tmp_name'];
                        
      
                        
                        if($itemAttachmentName){
                            move_uploaded_file($itemAttachmentTmpName,APPLICATION_PATH.'/../uploads/documents/'.$itemAttachmentName);
                            
                       		 $objDocumentEntity = new Base_Model_ObtorLib_App_Core_Doc_Entity_Document();
				 $objDocumentEntity->setDocTitle($this->_request->getParam('txtDocumentTitle'));
				 $objDocumentEntity->setDocDescription($this->_request->getParam('txtDescription'));
				 $objDocumentEntity->setDocAttachment($itemAttachmentName);
				 $objDocumentEntity->setDocPermission($this->_request->getParam('txtPermission'));
				 $objDocumentEntity->setDocAddedBy($this->getUserId());
				 $objDocumentEntity->setDocAddedOn($this->getSystemDateTime());
				 $objDocumentEntity->setDocUpdatedBy($this->getUserId());
				 $objDocumentEntity->setDocUpdatedOn($this->getSystemDateTime());
				 $objDocumentService->document = $objDocumentEntity;
				 $documentId = $objDocumentService->addDocument();
                                 if($this->_request->getParam('txtPermission') == 'Private'){
                                     $this->_redirect("/admin/document/?action-status=updated");
                                 } else {
                                     $this->_redirect("/admin/document/share/?action-status=updated&documentId=".$documentId);     
                                 }
				 
                        }
                        
                    }
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
            $pageHeading = "Edit-Document";
            $this->view->page_heading = $pageHeading;
            $this->view->data_page = "forms";

            $objDocumentService = new Base_Model_ObtorLib_App_Core_Doc_Service_Document();
             if ($this->_request->isPost()) {
                 
                 
                $itemAttachment 		= $_FILES['txtAttachment'];
                $itemAttachmentName 		= "";
                $itemAttachmentTmpName 		= "";
                $itemAttachmentName 		= "";
                $itemAttachmentTmpName 		= "";


                 

                if ($itemAttachment && $itemAttachment['name'] != "") {
                        $itemAttachmentName = $this->generateSystemFileName($itemAttachment['name']);
                        $itemAttachmentTmpName = $itemAttachment['tmp_name'];
    
                        if($itemAttachmentName){
                           // here update with attachment...  
                            	 $old_attachment  = $this->_request->getParam('txtOldAttachment');
                                 $old_attachment_file = APPLICATION_PATH.'/../uploads/documents/'.$old_attachment;
                                 unlink($old_attachment_file);
                            
                                 move_uploaded_file($itemAttachmentTmpName,APPLICATION_PATH.'/../uploads/documents/'.$itemAttachmentName);
                                 $recordId = $this->_request->getParam('id');
                       		 $objDocumentEntity = new Base_Model_ObtorLib_App_Core_Doc_Entity_Document();
                                 $objDocumentEntity->setId($recordId);
				 $objDocumentEntity->setDocTitle($this->_request->getParam('txtDocumentTitle'));
				 $objDocumentEntity->setDocDescription($this->_request->getParam('txtDescription'));
				 $objDocumentEntity->setDocAttachment($itemAttachmentName);
				 $objDocumentEntity->setDocPermission($this->_request->getParam('txtPermission'));
				 $objDocumentEntity->setDocAddedBy($this->getUserId());
				 $objDocumentEntity->setDocAddedOn($this->getSystemDateTime());
				 $objDocumentEntity->setDocUpdatedBy($this->getUserId());
				 $objDocumentEntity->setDocUpdatedOn($this->getSystemDateTime());
				 $objDocumentService->document = $objDocumentEntity;
				 $objDocumentService->updateDocument();
				 if($this->_request->getParam('txtPermission') == 'Private'){
                                     $this->_redirect("/admin/document/?action-status=updated");
                                 } else {
                                      $this->_redirect("/admin/document/share/?action-status=updated&documentId=".$recordId);    
                                 }
                        } else {
                             $this->_redirect("/admin/document/?action-status=failed");
                        }
                        
  
                } else {
                    
                                 $recordId = $this->_request->getParam('id');
                       		 $objDocumentEntity = new Base_Model_ObtorLib_App_Core_Doc_Entity_Document();
                                 $objDocumentEntity->setId($recordId);
				 $objDocumentEntity->setDocTitle($this->_request->getParam('txtDocumentTitle'));
				 $objDocumentEntity->setDocDescription($this->_request->getParam('txtDescription'));
				 $objDocumentEntity->setDocAttachment($itemAttachmentName);
				 $objDocumentEntity->setDocPermission($this->_request->getParam('txtPermission'));
				 $objDocumentEntity->setDocAddedBy($this->getUserId());
				 $objDocumentEntity->setDocAddedOn($this->getSystemDateTime());
				 $objDocumentEntity->setDocUpdatedBy($this->getUserId());
				 $objDocumentEntity->setDocUpdatedOn($this->getSystemDateTime());
				 $objDocumentService->document = $objDocumentEntity;
				 $objDocumentService->updateDocumentInfo();
				 if($this->_request->getParam('txtPermission') == 'Private'){
                                     $this->_redirect("/admin/document/?action-status=updated");
                                 } else {
                                      $this->_redirect("/admin/document/share/?action-status=updated&documentId=".$recordId);    
                                 }
                    
                    $this->_redirect("/admin/document/?action-status=updated");
                }
                 
             } else {
                 $recordId = $this->_request->getParam('id');
                 $documentInfo    = $objDocumentService->getDocument($recordId);
                 $this->view->documentInfo = $documentInfo; 
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
            $pageHeading = "View-Document";
            $this->view->page_heading = $pageHeading;
            $this->view->data_page = "forms";

            $objDocumentService = new Base_Model_ObtorLib_App_Core_Doc_Service_Document();
            $recordId = $this->_request->getParam('id');
            $documentInfo    = $objDocumentService->getDocument($recordId);
            $this->view->documentInfo = $documentInfo; 
            
            $objDocumentPermissionService = new Base_Model_ObtorLib_App_Core_Doc_Service_Permission();
            $objDocumentPermissionEntity = new Base_Model_ObtorLib_App_Core_Doc_Entity_Permission();
            $objDocumentPermissionEntity->setDocument($recordId);
            $objDocumentPermissionService->permission = $objDocumentPermissionEntity;
            $shareList = $objDocumentPermissionService->search();
            $this->view->shareList = $shareList;

        } catch (Exception $ex) {
            throw new Exception('<ERROR>' . $ex->getMessage() . "\n");
        }
    }
    
    
    /**
     * The add action
     */
    public function shareAction() {
        try {
            $pageHeading = "Share-Document";
            $this->view->page_heading = $pageHeading;
            $this->view->data_page = "forms";
            
            
            // get all the user all users...
            $employee_status = "In-Service";
            $employeeService = new Base_Model_ObtorLib_App_Core_Employee_Service_Employee();
            $employeeEntity = new Base_Model_ObtorLib_App_Core_Employee_Entity_Employee();
            $employeeEntity->setEmployeeStatus($employee_status);
            $employeeService->employee = $employeeEntity;
            $employeeInfo = $employeeService->search();
            $this->view->employeeInfo = $employeeInfo;
            
             $objPermissionService = new Base_Model_ObtorLib_App_Core_Doc_Service_Permission();
            
            
             if ($this->_request->isPost()) {
                 $documentId =  $this->_request->getParam('documentId');
                 $queLists =  $this->_request->getParam('txtRecList');
                 foreach($queLists As $queList){
                     
                     $isSharedExists = $objPermissionService->isSharedExists($documentId, $queList);
                     if(!$isSharedExists){
                        $objPermissionEntity = new Base_Model_ObtorLib_App_Core_Doc_Entity_Permission();
                        $objPermissionEntity->setDocument($documentId);
                        $objPermissionEntity->setIsRead('Yes');
                        $objPermissionEntity->setIsWrite('No');
                        $objPermissionEntity->setUserId($queList);
                        $objPermissionService->permission = $objPermissionEntity;
                        $objPermissionService->addPermission();
                     }
                 }
                 $this->_redirect("/admin/document/?action-status=share-list-updated");

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
            $pageHeading = "View-Document";
            $this->view->page_heading = $pageHeading;
            $this->view->data_page = "forms";

            $objDocumentService = new Base_Model_ObtorLib_App_Core_Doc_Service_Document();
            $objDocumentEntity = new Base_Model_ObtorLib_App_Core_Doc_Entity_Document();
            $recordId = $this->_request->getParam('id');
            $objDocumentEntity->setId($recordId);
            $objDocumentService->document = $objDocumentEntity;
            $objDocumentService->deleteDocument();
            
            $objDocumentPermissionService = new Base_Model_ObtorLib_App_Core_Doc_Service_Permission();
            $objDocumentPermissionEntity = new Base_Model_ObtorLib_App_Core_Doc_Entity_Permission();
            $objDocumentPermissionEntity->setDocument($recordId);
            $objDocumentPermissionService->permission = $objDocumentPermissionEntity;
            $shareList = $objDocumentPermissionService->search();
            
            
            foreach($shareList As $sIndex=>$share){
                $objDocumentPermissionEntity = new Base_Model_ObtorLib_App_Core_Doc_Entity_Permission();
                $objDocumentPermissionEntity->setId($share->getId());
                $objDocumentPermissionService->permission = $objDocumentPermissionEntity;
                $objDocumentPermissionService->deletePermission();
                
            }
             $this->_redirect("/admin/document/?action-status=deleted");

        } catch (Exception $ex) {
            throw new Exception('<ERROR>' . $ex->getMessage() . "\n");
        }
    }

}
