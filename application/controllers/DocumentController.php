<?php

class DocumentController extends Base_Model_ObtorLib_App_Staff_Controller {

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
            $sharedUserId = $this->getStaffUserId();
            $objDocumentEntity = new Base_Model_ObtorLib_App_Core_Doc_Entity_Document();
            $objDocumentService = new Base_Model_ObtorLib_App_Core_Doc_Service_Document();
            $objDocumentEntity->setSharedUserId($sharedUserId);
            $objDocumentService->document = $objDocumentEntity;
            
            $objPaggination = new Base_Model_ObtorLib_Base_Lib_Paggination();
            $page = $this->_getParam('page', 1);
            $objPaggination->CurrentPage = $page;
            $objPaggination->TotalResults = $objDocumentService->searchCountSharedDoc();
            $paginationData = $objPaggination->getPaggingData();
            $pageLimit1 = $paginationData['MYSQL_LIMIT1'];
            $pageLimit2 = $paginationData['MYSQL_LIMIT2'];

            $limit = " LIMIT $pageLimit1,$pageLimit2";


            $objDocumentService->document = $objDocumentEntity;
            $documentsInfo = $objDocumentService->searchSharedDoc($limit);
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
    
}
