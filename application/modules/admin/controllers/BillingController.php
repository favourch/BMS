<?php
class Admin_BillingController extends Base_Model_ObtorLib_App_Admin_Controller {

	
	
	
public function init() {
		parent::init();
	}
        
        
   
	
	/**
	 * The default action - show the home page
	 */
	public function transactionsAction() {
		try {
				
                        $pageHeading = "Transactions";
                        $this->view->page_heading = $pageHeading;
                        $this->view->data_page = "tables";
			$objPaggination 			= new Base_Model_ObtorLib_Base_Lib_Paggination();
                        
			$objTransactionsService   		= new Base_Model_Lib_Invoice_Service_Transaction();
                        $objTransactionsEntity   		= new Base_Model_Lib_Invoice_Entity_Transaction();
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
			$this->view->paggination    = $objPaggination;
			$this->view->pageNum        = $page;
			
			
		} catch ( Exception $ex ) {
			throw new Exception ( '<ERROR>' . $ex->getMessage () . "\n" );
		}

	}
	

	
/**
	 * The default action - show the home page
	 */
	public function editTransactionsAction() {
		try {

                    $pageHeading = "Edit-Transactions";
                    $this->view->page_heading = $pageHeading;
                    $this->view->data_page = "tables";
                        
                    $objTransactionsService   		= new Base_Model_Lib_Invoice_Service_Transaction();
                    $objTransactionsEntity   		= new Base_Model_Lib_Invoice_Entity_Transaction();
			
                    if ($this->_request->isPost()) {
                        
                        $objTransactionsEntity->setId($this->_request->getParam('txtId'));
                        $objTransactionsEntity->setClient($this->_request->getParam('cmbClient'));
                        $objTransactionsEntity->setDate($this->_request->getParam('txtTransactionDate'));
                        $objTransactionsEntity->setGateway($this->_request->getParam('cmbPaymentMethod'));
                        $objTransactionsEntity->setDescription($this->_request->getParam('txtDescription'));
                        $objTransactionsEntity->setInvoiceId($this->_request->getParam('txtInvoiceID'));
                        $objTransactionsEntity->setTransId($this->_request->getParam('txtTransactionID'));
                        $objTransactionsEntity->setAmountIn($this->_request->getParam('txtAmountIn'));
                        $objTransactionsEntity->setFees($this->_request->getParam('txtFees'));
                        $objTransactionsEntity->setAmountOut($this->_request->getParam('txtAmountOut'));
                        $objTransactionsService->transaction = $objTransactionsEntity;
                        $objTransactionsService->updateTransaction();
                        $this->_redirect('/admin/billing/transactions/');
                        
                    } else {
                        
                                $objClientService = new Base_Model_Lib_Client_Service_Client();
                                $objClientEntity = new Base_Model_Lib_Client_Entity_Client();
                                $objClientService->client = $objClientEntity; 
                                $clientDetails    = $objClientService->search("");
                                $this->view->clientDetails = $clientDetails;
                                
                                $transactionId  = $this->_request->getParam('id');
                                $transactionInfo = $objTransactionsService->getItem($transactionId);
                                $this->view->transactionInfo = $transactionInfo;
                                
                                $objPaymentMethodService = new Base_Model_Lib_Catelog_Service_PaymentMethod();
                                $paymentMethods          = $objPaymentMethodService->getAll();
                                $this->view->paymentMethods = $paymentMethods;
                    }
			
                    
                   
                    
				
		} catch ( Exception $ex ) {
			throw new Exception ( '<ERROR>' . $ex->getMessage () . "\n" );
		}

	}
	
	
	public function deleteTransactionAction() {
		try {
			
			$objTransactionsService   		= new Base_Model_Lib_Invoice_Service_Transaction();
                        $objTransactionsEntity   		= new Base_Model_Lib_Invoice_Entity_Transaction();
			$transactionId 				= $this->_request->getParam('id');
                        
                        $invoiceId                                      = $this->_request->getParam('invoiceId');
                        $reDirectionAction 				= $this->_request->getParam('act');
			
			$objTransactionsEntity->setId($transactionId);
			$objTransactionsService->transaction = $objTransactionsEntity;
			$objTransactionsService->deleteTransaction();
                        if($reDirectionAction == 'view-invoice'){
                            $this->_redirect('admin/billing/view-invoice/id/'.$invoiceId);
                        } else {
                            $this->_redirect('/admin/billing/transactions/');
                        }
			
		} catch ( Exception $ex ) {
			throw new Exception ( '<ERROR>' . $ex->getMessage () . "\n" );
		}
	}
	
	
        
	

}