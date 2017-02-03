<?php

class Admin_DomainController extends Base_Model_ObtorLib_App_Admin_Controller {

    public function init() {
        parent::init();
    }

    /**
     * The default action - show the home page
     */
    public function indexAction() {
        try {
            $pageHeading = "Transactions";
            $this->view->page_heading = $pageHeading;
            $this->view->data_page = "tables";

            $domainStatus = $this->_getParam('status', 0);
            if ($domainStatus == 1) {
                $domainStatus = "";
            }
            $objPaggination = new Base_Model_ObtorLib_Base_Lib_Paggination();

            $objDomainService = new Base_Model_Lib_Order_Service_Domain();
            $objDomainEntity = new Base_Model_Lib_Order_Entity_Domain();
            $objDomainEntity->setStatus($domainStatus);

            $objDomainService->domain = $objDomainEntity;

            $totalResult = $objDomainService->searchCount();
            $page = $this->_getParam('page', 1);
            $objPaggination->CurrentPage = $page;
            $objPaggination->TotalResults = $totalResult;
            $paginationData = $objPaggination->getPaggingData();
            $pageLimit1 = $paginationData['MYSQL_LIMIT1'];
            $pageLimit2 = $paginationData['MYSQL_LIMIT2'];

            $limit = " LIMIT $pageLimit1,$pageLimit2";

            if ($page == '') {
                $page = 1;
            }

            $result = $objDomainService->search($limit);
            $this->view->domains = $result;
            $this->view->paggination = $objPaggination;

            $this->view->pageNum = $page;


            $status = $this->_request->getParam('astatus');
            $this->view->status = $status;
            $this->view->domainStatus = $domainStatus;
        } catch (Exception $ex) {
            throw new Exception('<ERROR>' . $ex->getMessage() . "\n");
        }
    }

    
        /**
     * The add action
     */
    public function searchAction() {
        try {
            $pageHeading = "Search-Domain";
            $this->view->page_heading = $pageHeading;
            $this->view->data_page = "forms";

            
            
        } catch (Exception $ex) {
            throw new Exception('<ERROR>' . $ex->getMessage() . "\n");
        }
    }

}
