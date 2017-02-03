<?php
class Admin_InvoiceController extends Base_Model_ObtorLib_App_Admin_Controller {

	
	
	
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
            
                        $invoiceNum                     = $this->_request->getParam('invoice-number');
                        $clientId                       = $this->_request->getParam('customer');
                        $fromDate                       = $this->_request->getParam('from-date');
                        $toDate                       = $this->_request->getParam('to-date');
                        $invoiceStatus 			= $this->_request->getParam('status');
                        
                        
			$objPaggination 			= new Base_Model_ObtorLib_Base_Lib_Paggination();
                        
			$objInvoiceService   		= new Base_Model_Lib_Invoice_Service_Invoice();
                        $objInvoiceEntity   		= new Base_Model_Lib_Invoice_Entity_Invoice();
                        $objInvoiceEntity->setInvoiceNum($invoiceNum);
                        $objInvoiceEntity->setClient($clientId);
                        $objInvoiceEntity->setStartDate($fromDate);
                        $objInvoiceEntity->setEndDate($toDate);
                        $objInvoiceEntity->setStatus($invoiceStatus);
                        $objInvoiceService->invoice    = $objInvoiceEntity;
                        $totalResult                             = $objInvoiceService->searchCount();
                        $page=$this->_getParam('page',1);
			$objPaggination->CurrentPage  = $page;
			$objPaggination->TotalResults = $totalResult;
			$paginationData               = $objPaggination->getPaggingData();
			$pageLimit1                   = $paginationData['MYSQL_LIMIT1'];
			$pageLimit2                   = $paginationData['MYSQL_LIMIT2'];
					
			$limit 						  = " LIMIT $pageLimit1,$pageLimit2";
                        
                        if($page == ''){
				$page = 1;
			}
			
			$result 		    = $objInvoiceService->search($limit," datepaid Desc");
			$this->view->invoices   = $result;
			$this->view->paggination    = $objPaggination;
			$this->view->pageNum        = $page;
                        $this->view->invoiceStatus        = $invoiceStatus;
			
			
		} catch ( Exception $ex ) {
			throw new Exception ( '<ERROR>' . $ex->getMessage () . "\n" );
		}

	}

        
        /**
	 * The default action - show the home page
	 */
	public function viewInvoiceAction() {
		try {

                        $pageHeading = "Transactions";
                        $this->view->page_heading = $pageHeading;
                        $this->view->data_page = "tables";
                        
                        $invoiceId 			= $this->_request->getParam('id');
                        $objInvoiceService   		= new Base_Model_Lib_Invoice_Service_Invoice();
                        $invoiceInfo                    = $objInvoiceService->getItem($invoiceId);
                        $this->view->invoiceInfo        = $invoiceInfo;
                        $customerCurrency               = $invoiceInfo->getClient()->getCurrency();
                        $this->view->customerCurrency   = $customerCurrency;
                   
                        $objInvoiceItemService          = new Base_Model_Lib_Invoice_Service_InvoiceItem();
                        $invoiceItems                   = $objInvoiceItemService->getAllByInvoiceId($invoiceId);
                        $this->view->invoiceItems       = $invoiceItems;
                        
                        
                        // get all the transaction ................
                        $objPaggination 			= new Base_Model_ObtorLib_Base_Lib_Paggination();
                        
			$objTransactionsService   		= new Base_Model_Lib_Invoice_Service_Transaction();
                        $objTransactionsEntity   		= new Base_Model_Lib_Invoice_Entity_Transaction();
                        $objTransactionsEntity->setInvoiceId($invoiceId);
                        $objTransactionsService->transaction    = $objTransactionsEntity;
                        $totalResult                             = $objTransactionsService->searchCount();
                        $page=$this->_getParam('page',1);
			$objPaggination->CurrentPage  = $page;
			$objPaggination->TotalResults = $totalResult;
			$paginationData               = $objPaggination->getPaggingData();
			$pageLimit1                   = $paginationData['MYSQL_LIMIT1'];
			$pageLimit2                   = $paginationData['MYSQL_LIMIT2'];
					
			$limit 						  = " LIMIT $pageLimit1,$pageLimit2";
                        
                        if($page == ''){
				$page = 1;
			}
			
			$result 		    = $objTransactionsService->search($limit);
			$this->view->transactions   = $result;
                        
                        
                        if ($this->_request->isPost()) {
                            
                            $invoiceId = $this->_request->getParam('txtInvoiceId');
                            $invoiceItemIds  = $this->_request->getParam('txtInvoiceItemId');
                            $invoiceItemDescriptions  = $this->_request->getParam('txtInvoiceItems');
                            $invoiceItemAmounts  = $this->_request->getParam('txtInvoiceAmount');
                            $invoiceItemTaxes  = $this->_request->getParam('txtInvoiceAmount');
                            
                            $objInvoiceItemService = new Base_Model_Lib_Invoice_Service_InvoiceItem();
                            foreach($invoiceItemIds As $itemIndex=>$invoiceItem){
                            
                                $objInvoiceItemEntity = new Base_Model_Lib_Invoice_Entity_InvoiceItem();
                                $invoiceItemId = $invoiceItem;
                                $invoiceItemDescription = $invoiceItemDescriptions[$itemIndex];
                                $invoiceItemAmount   = $invoiceItemAmounts[$itemIndex];
                                $invoiceItemTax   = $invoiceItemTaxes[$itemIndex];
                                $objInvoiceItemEntity->setId($invoiceItemId);
                                $objInvoiceItemEntity->setDescription($invoiceItemDescription);
                                $objInvoiceItemEntity->setAmount($invoiceItemAmount);
                                $objInvoiceItemEntity->setTaxed($invoiceItemTax);
                                $objInvoiceItemService->invoiceItem = $objInvoiceItemEntity;
                                $objInvoiceItemService->updateInvoiceItemInfo();
                            }
                            
                            
                            $invoiceItemDescription     = $this->_request->getParam('txtInvoiceItem');
                            $invoiceItemAmount          = $this->_request->getParam('txtInvoiceAmt');
                            $invoiceItemTaxe            = $this->_request->getParam('txtInvoicet');
                                if($invoiceItemDescription != ""){
                                    $objInvoiceItemEntity = new Base_Model_Lib_Invoice_Entity_InvoiceItem();
                                    $objInvoiceItemEntity->setInvoice($invoiceId);
                                    $objInvoiceItemEntity->setDescription($invoiceItemDescription);
                                    $objInvoiceItemEntity->setAmount($invoiceItemAmount);
                                    $objInvoiceItemEntity->setTaxed($invoiceItemTaxe);
                                    $objInvoiceItemService->invoiceItem = $objInvoiceItemEntity;
                                    $objInvoiceItemService->addInvoiceItemInfo();
                                }
                            $this->_redirect('/admin/billing/view-invoice/id/'.$invoiceId);
                            
                        }
                        
               				
		} catch ( Exception $ex ) {
			throw new Exception ( '<ERROR>' . $ex->getMessage () . "\n" );
		}

	}
	
    /**
     * The add action
     */
    public function searchAction() {
        try {
            $pageHeading = "Search-Invoice";
            $this->view->page_heading = $pageHeading;
            $this->view->data_page = "forms";

            $objClientService = new Base_Model_Lib_Client_Service_Client();
            $objClientEntity = new Base_Model_Lib_Client_Entity_Client();
            $objClientService->client = $objClientEntity;
            $clientDetails = $objClientService->search("");
            $this->view->clientDetails = $clientDetails;
            
        } catch (Exception $ex) {
            throw new Exception('<ERROR>' . $ex->getMessage() . "\n");
        }
    }
}