<?php

class Admin_LogsController extends Base_Model_Lib_App_Admin_Controller {


    public function init() {
        parent::init();
    }

    /**
     * The default action - show the home page
     */
    public function indexAction() {
        try {
            $pageHeading = "System-Logs";
            $this->view->page_heading = $pageHeading;
            $this->view->data_page = "tables";
            
             // get all the log information...
            $objLogEntity = new Base_Model_Lib_App_Core_System_Entity_Log();
            $objLogService = new Base_Model_Lib_App_Core_System_Service_Log();
            $objLogService->log = $objLogEntity;
            
            $objPaggination = new Base_Model_Lib_Base_Lib_Paggination();
            $page = $this->_getParam('page', 1);
            $objPaggination->CurrentPage = $page;
            $objPaggination->TotalResults = $objLogService->searchCount();
            $paginationData = $objPaggination->getPaggingData();
            $pageLimit1 = $paginationData['MYSQL_LIMIT1'];
            $pageLimit2 = $paginationData['MYSQL_LIMIT2'];

            $limit = " LIMIT $pageLimit1,$pageLimit2";


            $objLogService->log = $objLogEntity;
            $logsInfo = $objLogService->search($limit);
            $this->view->logInformation = $logsInfo;
            
            $this->view->pageNum = $page;
            $this->view->rowsPerPage = $objPaggination->ResultsPerPage;
            $this->view->paggination = $objPaggination;
            
        } catch (Exception $ex) {
            throw new Exception('<ERROR>' . $ex->getMessage() . "\n");
        }
    }
    
    
    /**
     * The default action - show the home page
     */
    public function viewAction() {
        try {
            $pageHeading = "System-Logs";
            $this->view->page_heading = $pageHeading;
            $this->view->data_page = "tables";
            
             // get all the log information...
            $logId = $this->_request->getParam('id');
            $objLogService = new Base_Model_Lib_App_Core_System_Service_Log();
            $logInformation = $objLogService->getLog($logId);
            $this->view->logInformation = $logInformation;
            
        } catch (Exception $ex) {
            throw new Exception('<ERROR>' . $ex->getMessage() . "\n");
        }
    }
    
}
