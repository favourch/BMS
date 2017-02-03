<?php

class Admin_OrderController extends Base_Model_ObtorLib_App_Admin_Controller {

    public function init() {
        parent::init();
    }

    /**
     * The default action - show the home page
     */
    public function indexAction() {
        try {
            
             $pageHeading = "Orders";
            $this->view->page_heading = $pageHeading;
            $this->view->data_page = "tables";
            
            $orderStatus = $this->_getParam('order-status', 0);
            if ($orderStatus == 1) {
                $orderStatus = "";
            }
            
            $status = $this->_request->getParam('status');
             $clientId = $this->_request->getParam('client');
            
            $objPaggination = new Base_Model_ObtorLib_Base_Lib_Paggination();

            $objOrderService = new Base_Model_Lib_Order_Service_Order();
            $objOrderEntity = new Base_Model_Lib_Order_Entity_Order();
            $objOrderEntity->setStatus($orderStatus);
            $objOrderEntity->setUserId($clientId);

            $objOrderService->order = $objOrderEntity;

            $totalResult = $objOrderService->searchCount();
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

            $result = $objOrderService->search($limit);
            $this->view->orders = $result;
            $this->view->paggination = $objPaggination;

            $this->view->pageNum = $page;
            $this->view->status = $status;
            $this->view->orderStatus = $orderStatus;
            
        } catch (Exception $ex) {
            throw new Exception('<ERROR>' . $ex->getMessage() . "\n");
        }
    }

    /**
     * The default action - show the home page
     */
    public function addAction() {
        try {

            $pageHeading = "Add-New-Order";
            $this->view->page_heading = $pageHeading;
            $this->view->data_page = "tables";
                    
             $objClientService = new Base_Model_Lib_Client_Service_Client();
            
            if ($this->_request->isPost()) {

                $ordernum = date("YmdHis");
                $clientId = $this->_request->getParam('cmbClient');
                $orderDate = $this->getSystemDateTime();
                $promocode = $this->_request->getParam('cmbPromotionCode');
                $promotype = null;
                $promovalue = null;
                if ($promocode != "") {
                    $objPromotionCodeService = new Base_Model_Lib_Catelog_Service_PromotionCode();
                    $promotionCodeInfo = $objPromotionCodeService->getItem($promocode);
                    $promotype = $promotionCodeInfo->getValueType();
                    $promovalue = $promotionCodeInfo->getValue();
                }
                $orderdata = serialize($this->_request->getParam('orderData'));
                $paymentmethod = $this->_request->getParam('cmbPaymentMethod');
                $status = $this->_request->getParam('cmbOrderStatus');
                $ipaddress = $this->getRealIpAddr();
                $notes = $this->_request->getParam('txtOrderNotes');
                $canvasser = $this->_request->getParam('cmbCanvasser');
                $salesperson = $this->_request->getParam('cmbSalesperson');

                // get the client's information....
                $clientInformation = $objClientService->getClient($clientId);
                $objCurrencyService = new Base_Model_Lib_Catelog_Service_Currency();
                $defaultCurrency    = $objCurrencyService->getDefaultCurrency();
                $currencyId        = $defaultCurrency->getId();
                $clientName        = $clientInformation->getFirstname();
                $clientEmail       = $clientInformation->getEmail();
                if($clientInformation){
                    if($clientInformation->getCurrency()){
                        $currencyId =  $clientInformation->getCurrency()->getId();
                    }
                }
                
                // save the order details...............
                $objOrderService = new Base_Model_Lib_Order_Service_Order();
                $objOrderEntity = new Base_Model_Lib_Order_Entity_Order();
                $objOrderEntity->setOrdernum($ordernum);
                $objOrderEntity->setUserId($clientId);
                $objOrderEntity->setDate($orderDate);
                $objOrderEntity->setPromocode($promocode);
                $objOrderEntity->setPromotype($promotype);
                $objOrderEntity->setPromovalue($promovalue);
                $objOrderEntity->setOrderdata($orderdata);
                $objOrderEntity->setPaymentmethod($paymentmethod);
                $objOrderEntity->setStatus($status);
                $objOrderEntity->setIpaddress($ipaddress);
                $objOrderEntity->setNotes($notes);
                $objOrderEntity->setCanvasser($canvasser);
                $objOrderEntity->setSalesperson($salesperson);
                $objOrderService->order = $objOrderEntity;
                $orderId = $objOrderService->addItem();
                
                // activity log.....
                //^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^
                // add the details to the system logs....
                    $actionName = 'ADD_NEW';
                    $logMessage = "log-msg-record-added";
                    $tableName = 'tbl_orders';
                    $rowId = $orderId;
                    $this->addSystemLog($actionName, $logMessage, $tableName, $rowId);
                    //^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^
                

                // add order items......
                // get the order product details..................
                $productIds = $this->_request->getParam('cmbProductService');
                $productDomainNames = $this->_request->getParam('txtDomainName');
                $productBillingCycles = $this->_request->getParam('cmbBillingCycle');
                $productQuantitities = $this->_request->getParam('txtProductQuantity');
                $productPricies = $this->_request->getParam('txtPriceOverride');
                $productPriciesForAmt = $productPricies;

                $objOrderProductService = new Base_Model_Lib_Order_Service_Product();
                $objProductService = new Base_Model_Lib_Product_Service_Product();
                $objProductPricingService = new Base_Model_Lib_Product_Service_Pricing();
                $currencyId = $currencyId;
                $orderAmount = 0;

                $arrCpanelAccounts = array();
                foreach ($productIds As $pIndex => $productId) {

                    $productInfo = $objProductService->getItem($productId);
                    $productName = $productInfo->getProductName();
                    $productPriceInfo = $objProductPricingService->getProductPriceByCurrency($productId, $currencyId, 'product');
                    $productMsetupfee = $productPriceInfo->getMonthlySetupfee();
                    $productQsetupfee = $productPriceInfo->getQuarterlySetupfee();
                    $productSsetupfee = $productPriceInfo->getSemiAnnuallySetupfee();
                    $productASsetupfee = $productPriceInfo->getAnnuallySetupfee();
                    $productBsetupfee = $productPriceInfo->getBienniallySetupfee();
                    $productTsetupfee = $productPriceInfo->getTrienniallySetupfee();
                    $productMonthly = $productPriceInfo->getMonthlyFee();
                    $productQuarterly = $productPriceInfo->getQuarterlyFee();
                    $productSemiannually = $productPriceInfo->getSemiAnnuallyFee();
                    $productAnnually = $productPriceInfo->getAnnuallyFee();
                    $productBiennially = $productPriceInfo->getBienniallyFee();
                    $productTriennially = $productPriceInfo->getTrienniallyFee();

                    $domainName = $productDomainNames[$pIndex];
                    if($productInfo->getCPanelPackage() != ''){
                            $userName = substr($domainName, 0, 8);
                            $userPasswrd = $this->randomPassword();
                            $objCpanelAccount = new stdClass();
                            $objCpanelAccount->domainName = $domainName;
                            $objCpanelAccount->username = $userName;
                            $objCpanelAccount->userPassword = $userPasswrd; 
                            $objCpanelAccount->package = $productInfo->getCPanelPackage();
                            array_push($arrCpanelAccounts, $objCpanelAccount);
                    }

                    $firstPaymentAmount = "";
                    $amount = "";
                    $productBillingCycle = $productBillingCycles[$pIndex];
                    if ($productBillingCycle == 'Monthly') {
                        $firstPaymentAmount = $productMsetupfee + $productMonthly;
                        $amount = $productMonthly;
                    } elseif ($productBillingCycle == 'Quarterly') {
                        $firstPaymentAmount = $productQsetupfee + $productQuarterly;
                        $amount = $productQuarterly;
                    } elseif ($productBillingCycle == 'Semi-Annually') {
                        $firstPaymentAmount = $productSsetupfee + $productSemiannually;
                        $amount = $productSemiannually;
                    } elseif ($productBillingCycle == 'Annually') {
                        $firstPaymentAmount = $productASsetupfee + $productAnnually;
                        $amount = $productAnnually;
                    } elseif ($productBillingCycle == 'Biennially') {
                        $firstPaymentAmount = $productBsetupfee + $productBiennially;
                        $amount = $productBiennially;
                    } elseif ($productBillingCycle == 'Triennially') {
                        $firstPaymentAmount = $productTsetupfee + $productTriennially;
                        $amount = $productBiennially;
                    }
                    
                    
                    if($productPriciesForAmt[$pIndex] != ''){
                        $firstPaymentAmount = $productPriciesForAmt[$pIndex];
                        $amount             = $productPriciesForAmt[$pIndex];
                    }
                    
                    $objOrderProductEntity = new Base_Model_Lib_Order_Entity_Product();
                    $objOrderProductEntity->setClient($clientId);
                    $objOrderProductEntity->setOrder($orderId);
                    $objOrderProductEntity->setProduct($productId);
                    $objOrderProductEntity->setServer(null);
                    $objOrderProductEntity->setRegdate($this->getSystemDateTime());
                    $objOrderProductEntity->setDomain($domainName);
                    $objOrderProductEntity->setDomainStatus('Active');
                    $objOrderProductEntity->setPaymentMethod($paymentmethod);
                    $objOrderProductEntity->setFirstPaymentAmount($firstPaymentAmount);
                    $objOrderProductEntity->setAmount($amount);
                    $objOrderProductEntity->setBillingCycle($productBillingCycle);
                    $objOrderProductEntity->setNextDueDate(null);
                    $objOrderProductEntity->setNextInvoiceDate(null);
                    $objOrderProductEntity->setUsername($userName);
                    $objOrderProductEntity->setPassword($userPasswrd);
                    $objOrderProductEntity->setNotes(NULL);
                    $objOrderProductEntity->setSubscription(NULL);
                    $objOrderProductEntity->setPromotionCode($promocode);
                    $objOrderProductEntity->setSuspendreason(null);
                    $objOrderProductEntity->setOverideautosuspend(null);
                    $objOrderProductEntity->setOveridesuspenduntil(null);
                    $objOrderProductEntity->setDedicatedIp(null);
                    $objOrderProductEntity->setAssignedIps(null);
                    $objOrderProductEntity->setNs1(null);
                    $objOrderProductEntity->setNs2(null);
                    $objOrderProductEntity->setDiskusage(null);
                    $objOrderProductEntity->setDisklimit(null);
                    $objOrderProductEntity->setBwlimit(null);
                    $objOrderProductEntity->setBwusage(null);
                    $objOrderProductEntity->setLastupdate($this->getSystemDateTime());
                    $objOrderProductService->product = $objOrderProductEntity;
                    $objOrderProductService->addItem();
                    $orderAmount = $orderAmount + $firstPaymentAmount;
                    
                    
                    
                    $actionName = 'ADD_NEW';
                    $logMessage = "log-msg-record-added-order-product";
                    $tableName = 'tbl_orders';
                    $rowId = $orderId;
                    $this->addSystemLog($actionName, $logMessage, $tableName, $rowId);
                    
                    
                }


                $domainNames = $this->_request->getParam('txtDomain');
                $domainActionType = $this->_request->getParam('rdDomainRegistration');
                $domainRegistrationPeriod = $this->_request->getParam('regperiod');
                $dNSManagements = $this->_request->getParam('chkDnsManagement');
                $emailForwarding = $this->_request->getParam('chkEmailForwarding');
                $iDProtection = $this->_request->getParam('chkIDProtection');
                

                // get default registar...
                $objRegistrarService = new Base_Model_Lib_System_Service_Registrars();
                $enabledRegistrars   = $objRegistrarService->getAllByStatus('Enabled'); 
                $enabledRegistrar    = $enabledRegistrars[0];
                $defaultRegistrar    = $enabledRegistrar->getName();
                
                $objSettingService = new Base_Model_Lib_System_Service_Settings();
                $generalSettingsValues = $objSettingService->getAllByType('DOMAIN_SETTINGS');
                
                $nameServer1         = "";
                $nameServer2         = '';
                $nameServer3         = '';
                $nameServer4         = '';
                $nameServer5         = '';
                foreach($generalSettingsValues As $gIndex=>$nameServers){
                    
                    if($nameServers->getSettingFieldName() == 'Default Nameserver 1'){
                        $nameServer1         = $nameServers->getSettingValue();
                    }
                    
                    if($nameServers->getSettingFieldName() == 'Default Nameserver 2'){
                        $nameServer2         = $nameServers->getSettingValue();
                    }
                    
                    if($nameServers->getSettingFieldName() == 'Default Nameserver 3'){
                        $nameServer3         = $nameServers->getSettingValue();
                    }
                    
                    if($nameServers->getSettingFieldName() == 'Default Nameserver 4'){
                        $nameServer4         = $nameServers->getSettingValue();
                    }
                    
                    if($nameServers->getSettingFieldName() == 'Default Nameserver 5'){
                        $nameServer5         = $nameServers->getSettingValue();
                    }
                    
                    
                }

                // add the domain details....

                $objDomainService = new Base_Model_Lib_Order_Service_Domain();

                foreach ($domainNames As $dIndex => $domainName) {
                    
                    
                    if($domainName != '' && $domainActionType[$dIndex] != ''){
                        
                        $firstpaymentamount = '7.99';
                        $recurringamount = '7.99';
                        $orderAmount = $orderAmount + $firstpaymentamount;
                        $objDomainEntity = new Base_Model_Lib_Order_Entity_Domain();
                        $objDomainEntity->setClient($clientId);
                        $objDomainEntity->setOrder($orderId);
                        $objDomainEntity->setType($domainActionType[$dIndex]);
                        $objDomainEntity->setRegistrationdate(null);
                        $objDomainEntity->setRegistrarLock('Yes');
                        $objDomainEntity->setDomain($domainName);
                        $objDomainEntity->setFirstpaymentamount($firstpaymentamount);
                        $objDomainEntity->setRecurringamount($recurringamount);
                        $objDomainEntity->setRegistrar($defaultRegistrar);
                        $objDomainEntity->setRegistrationperiod($domainRegistrationPeriod[$dIndex]);
                        $objDomainEntity->setExpirydate(null);
                        $objDomainEntity->setSubscriptionid(null);
                        $objDomainEntity->setPromoid(null);
                        $objDomainEntity->setStatus('Pending');
                        $objDomainEntity->setNextduedate(null);
                        $objDomainEntity->setNextinvoicedate(null);
                        $objDomainEntity->setAdditionalnotes(null);
                        $objDomainEntity->setPaymentmethod($paymentmethod);
                        $objDomainEntity->setDnsmanagement($dNSManagements[$dIndex]);
                        $objDomainEntity->setEmailforwarding($emailForwarding[$dIndex]);
                        $objDomainEntity->setIdprotection($iDProtection[$dIndex]);
                        $objDomainEntity->setDonotrenew(null);
                        $objDomainEntity->setReminders(null);
                        $objDomainEntity->setSynced(null);
                        $objDomainEntity->setNameServer1($nameServer1);
                        $objDomainEntity->setNameServer2($nameServer2);
                        $objDomainEntity->setNameServer3($nameServer3);
                        $objDomainEntity->setNameServer4($nameServer4);
                        $objDomainEntity->setNameServer5($nameServer5);
                        $objDomainService->domain = $objDomainEntity;
                        $domainId = $objDomainService->addItem();
                    
                        //^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^
                        $actionName = 'ADD_NEW';
                        $logMessage = "log-msg-record-added-order-domain";
                        $tableName = 'tbl_orders';
                        $rowId = $orderId;
                        $this->addSystemLog($actionName, $logMessage, $tableName, $rowId);
                        //^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^
                    }
                }


                // create invoice for the order....
                $orderInfo = $objOrderService->getOrder($orderId);
                $objInvoiceService = new Base_Model_Lib_Invoice_Service_Invoice();
                $objInvoiceEntity = new Base_Model_Lib_Invoice_Entity_Invoice();
                $objInvoiceEntity->setClient($clientId);
                $objInvoiceEntity->setInvoiceNum($ordernum);
                $objInvoiceEntity->setDate($this->getSystemDateTime());
                $objInvoiceEntity->setDueDate($this->getSystemDateTime());
                $objInvoiceEntity->setDatePaid(null);
                $objInvoiceEntity->setSubTotal($orderAmount);
                $objInvoiceEntity->setCredit(null);
                $objInvoiceEntity->setTax(null);
                $objInvoiceEntity->setTax2(null);
                $objInvoiceEntity->setTotal($orderAmount);
                $objInvoiceEntity->setTaxrate(null);
                $objInvoiceEntity->setTaxrate2(null);
                $objInvoiceEntity->setStatus('Pending');
                $objInvoiceEntity->setPaymentmethod($paymentmethod);
                $objInvoiceEntity->setNotes(null);
                $objInvoiceService->invoice = $objInvoiceEntity;
                $invoiceId = $objInvoiceService->addInvoice();


                // update amount and invoice id for the order...
                $objOrderService = new Base_Model_Lib_Order_Service_Order();
                $objOrderEntity = new Base_Model_Lib_Order_Entity_Order();
                $objOrderEntity->setId($orderId);
                $objOrderEntity->setAmount($orderAmount);
                $objOrderEntity->setInvoiceid($invoiceId);
                $objOrderService->order = $objOrderEntity;
                $objOrderService->updateItemInvoiceInfo();

                // invoice items....
                $orderProducts = $orderInfo->getOrderProducts();
                $orderDomains = $orderInfo->getOrderdomain();


                $objInvoiceItemService = new Base_Model_Lib_Invoice_Service_InvoiceItem();

                foreach ($orderProducts As $oPIndex => $orderProduct) {
                    
                    $productBillingCycle = $orderProduct->getBillingCycle();
                    
                    $productPriceInfo = $objProductPricingService->getProductPriceByCurrency($productId, $currencyId, 'product');
                    $productMsetupfee = $productPriceInfo->getMonthlySetupfee();
                    $productQsetupfee = $productPriceInfo->getQuarterlySetupfee();
                    $productSsetupfee = $productPriceInfo->getSemiAnnuallySetupfee();
                    $productASsetupfee = $productPriceInfo->getAnnuallySetupfee();
                    $productBsetupfee = $productPriceInfo->getBienniallySetupfee();
                    $productTsetupfee = $productPriceInfo->getTrienniallySetupfee();
                    $productMonthly = $productPriceInfo->getMonthlyFee();
                    $productQuarterly = $productPriceInfo->getQuarterlyFee();
                    $productSemiannually = $productPriceInfo->getSemiAnnuallyFee();
                    $productAnnually = $productPriceInfo->getAnnuallyFee();
                    $productBiennially = $productPriceInfo->getBienniallyFee();
                    $productTriennially = $productPriceInfo->getTrienniallyFee();
                    
                    $firstPaymentAmount = "";
                    $amount = "";
                    $productFees        = 0;
                    $productSetUpFees   = 0;
                    
                    if ($productBillingCycle == 'Monthly') {
                        $firstPaymentAmount = $productMsetupfee + $productMonthly;
                        $productFees        = $productMonthly;
                        $productSetUpFees   = $productMsetupfee;
                    } elseif ($productBillingCycle == 'Quarterly') {
                        $firstPaymentAmount = $productQsetupfee + $productQuarterly;
                        $productFees        = $productQuarterly;
                        $productSetUpFees   = $productQsetupfee;
                    } elseif ($productBillingCycle == 'Semi-Annually') {
                        $firstPaymentAmount = $productSsetupfee + $productSemiannually;
                        $productFees        = $productSemiannually;
                        $productSetUpFees   = $productSsetupfee;
                    } elseif ($productBillingCycle == 'Annually') {
                        $firstPaymentAmount = $productASsetupfee + $productAnnually;
                        $productFees        = $productAnnually;
                        $productSetUpFees   = $productASsetupfee;
                    } elseif ($productBillingCycle == 'Biennially') {
                        $firstPaymentAmount = $productBsetupfee + $productBiennially;
                        $productFees        = $productBiennially;
                        $productSetUpFees   = $productBsetupfee;
                    } elseif ($productBillingCycle == 'Triennially') {
                        $firstPaymentAmount = $productTsetupfee + $productTriennially;
                        $productFees        = $productTriennially;
                        $productSetUpFees   = $productTsetupfee;
                    }
                    
                    
                    if($productFees == $orderProduct->getAmount()){
                        // order item fees....
                        $objInvoiceItemEntity = new Base_Model_Lib_Invoice_Entity_InvoiceItem();
                        $objInvoiceItemEntity->setInvoice($invoiceId);
                        $objInvoiceItemEntity->setClient($clientId);
                        $objInvoiceItemEntity->setType('Item');
                        $objInvoiceItemEntity->setRelid($orderId);
                        $objInvoiceItemEntity->setDescription($orderProduct->getProduct()->getProductName());
                        $objInvoiceItemEntity->setAmount($productFees);
                        $objInvoiceItemEntity->setTaxed(null);
                        $objInvoiceItemEntity->setDuedate($this->getSystemDateTime());
                        $objInvoiceItemEntity->setPaymentmethod($paymentmethod);
                        $objInvoiceItemEntity->setNotes(null);
                        $objInvoiceItemService->invoiceItem = $objInvoiceItemEntity;
                        $objInvoiceItemService->addInvoiceItem();
                    
                        // order item setup fees....
                        $objInvoiceItemEntity = new Base_Model_Lib_Invoice_Entity_InvoiceItem();
                        $objInvoiceItemEntity->setInvoice($invoiceId);
                        $objInvoiceItemEntity->setClient($clientId);
                        $objInvoiceItemEntity->setType('Hosting');
                        $objInvoiceItemEntity->setRelid($orderId);
                        $objInvoiceItemEntity->setDescription($orderProduct->getProduct()->getProductName()." Standard Setup Fee");
                        $objInvoiceItemEntity->setAmount($productSetUpFees);
                        $objInvoiceItemEntity->setTaxed(null);
                        $objInvoiceItemEntity->setDuedate($this->getSystemDateTime());
                        $objInvoiceItemEntity->setPaymentmethod($paymentmethod);
                        $objInvoiceItemEntity->setNotes(null);
                        $objInvoiceItemService->invoiceItem = $objInvoiceItemEntity;
                        $objInvoiceItemService->addInvoiceItem();

                    } else {
                        
                        $objInvoiceItemEntity = new Base_Model_Lib_Invoice_Entity_InvoiceItem();
                        $objInvoiceItemEntity->setInvoice($invoiceId);
                        $objInvoiceItemEntity->setClient($clientId);
                        $objInvoiceItemEntity->setType('Item');
                        $objInvoiceItemEntity->setRelid($orderId);
                        $objInvoiceItemEntity->setDescription($orderProduct->getProduct()->getProductName());
                        $objInvoiceItemEntity->setAmount($orderProduct->getAmount());
                        $objInvoiceItemEntity->setTaxed(null);
                        $objInvoiceItemEntity->setDuedate($this->getSystemDateTime());
                        $objInvoiceItemEntity->setPaymentmethod($paymentmethod);
                        $objInvoiceItemEntity->setNotes(null);
                        $objInvoiceItemService->invoiceItem = $objInvoiceItemEntity;
                        $objInvoiceItemService->addInvoiceItem();
                        
                    }
                    
                }
                
                foreach($orderDomains As $dIndex=>$orderDomain){
                    
                    $type = "Domain ".$orderDomain->getType();
                    $itemDescription = $type." - ".$orderDomain->getDomain()." - ".$orderDomain->getRegistrationperiod()." Year/s";
                    $firstpaymentamount = '7.99';
                    
                    $objInvoiceItemEntity = new Base_Model_Lib_Invoice_Entity_InvoiceItem();
                    $objInvoiceItemEntity->setInvoice($invoiceId);
                    $objInvoiceItemEntity->setClient($clientId);
                    $objInvoiceItemEntity->setType($type);
                    $objInvoiceItemEntity->setRelid($orderId);
                    $objInvoiceItemEntity->setDescription($itemDescription);
                    $objInvoiceItemEntity->setAmount($firstpaymentamount);
                    $objInvoiceItemEntity->setTaxed(null);
                    $objInvoiceItemEntity->setDuedate($this->getSystemDateTime());
                    $objInvoiceItemEntity->setPaymentmethod($paymentmethod);
                    $objInvoiceItemEntity->setNotes(null);
                    $objInvoiceItemService->invoiceItem = $objInvoiceItemEntity;
                    $objInvoiceItemService->addInvoiceItem();
                }
                
                
                if($invoiceId != ""){
                        //^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^
                        $actionName = 'ADD_NEW';
                        $logMessage = "log-msg-record-added-order-invoice";
                        $tableName = 'tbl_orders';
                        $rowId = $orderId;
                        $this->addSystemLog($actionName, $logMessage, $tableName, $rowId);
                        
                        $actionName = 'ADD_NEW';
                        $logMessage = "log-msg-record-added";
                        $tableName = 'tbl_invoices';
                        $rowId = $invoiceId;
                        $this->addSystemLog($actionName, $logMessage, $tableName, $rowId);
                        //^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^
                        
                        
                }
                

                // create cpanel accounts..............
                if($arrCpanelAccounts){
                    
                    $objCpanellService = new Base_Model_Lib_Api_Service_Cpanel();
                    foreach($arrCpanelAccounts As $cIndex=>$cpanel){
                        
                        $domainName     = $cpanel->domainName;
                        $userName       = $cpanel->username;
                        $userPasswrd    = $cpanel->userPassword;
                        $userPackage    = $cpanel->package;
                       
                        $objCpanellService->createAccount($domainName, $userName, $userPasswrd,$userPackage);
                        
                        $actionName = 'ADD_NEW';
                        $logMessage = "cpanel-account-created";
                        $tableName = 'tbl_orders';
                        $rowId = $orderId;
                        $this->addSystemLog($actionName, $logMessage, $tableName, $rowId);
                    
                    }
                    
                }
                
                
                // send welcome mail to that client....
                    $objMailTemplate = new Base_Model_Lib_Mail_Service_Template();
                    $mailTemplate = $objMailTemplate->read('4');
                    $mail = new Base_Model_Lib_Mail_Service_Mailer();
                    $emailText = $mailTemplate->getMailBody();
                    $emailBody = $mailTemplate->getMailHtmlBody();
                    $mailSubject = $mailTemplate->getMailSubject();
                    $tag = array('[to_name]' => $clientName);
                    $mail->setTag($tag);
                    $mail->setText($emailText);
                    $mail->setHtml($emailBody);
                    $mail->setFrom($mailTemplate->getMailFrom(), $mailTemplate->getMailFromName());
                    $mail->addTo($clientEmail, $clientName);
                    $mail->setSubject($mailSubject);
                    $mail->setMailType('html');
                    $mail->send();
                    
                     $actionName = 'ADD_NEW';
                        $logMessage = "email-notifiaction-sent-to-client";
                        $tableName = 'tbl_orders';
                        $rowId = $orderId;
                        $this->addSystemLog($actionName, $logMessage, $tableName, $rowId);

                $this->_redirect('/admin/order/?action-status=updated');
            } else {


               
                $objClientEntity = new Base_Model_Lib_Client_Entity_Client();
                $objClientService->client = $objClientEntity;
                $clientDetails = $objClientService->search("");
                $this->view->clientDetails = $clientDetails;
                $client = $this->_request->getParam('client');
                $this->view->clientId = $client;
                
                $objPaymentMethodService = new Base_Model_Lib_Catelog_Service_PaymentMethod();
                $paymentMethods = $objPaymentMethodService->getAll();
                $this->view->paymentMethods = $paymentMethods;

                // get all active promotion codes...
                $objPromotionCodeService = new Base_Model_Lib_Catelog_Service_PromotionCode();
                $promotionCodes = $objPromotionCodeService->getAll();
                $this->view->promotionCodes = $promotionCodes;


                $objProductAndServices = new Base_Model_Lib_Product_Service_Group();
                $productAndServices = $objProductAndServices->getAllWithProducts();
                $this->view->productAndServices = $productAndServices;


                // get all canvasser...
                $objSalesPersonService = new Base_Model_Lib_User_Service_SalesPerson();
                $salesRoleCanvasser = 6;
                $canvassers = $objSalesPersonService->getAllBySalesRole($salesRoleCanvasser);
                $this->view->canvassers = $canvassers;

                $salesRoleSalesperson = 7;
                $salespersons = $objSalesPersonService->getAllBySalesRole($salesRoleSalesperson);
                $this->view->salespersons = $salespersons;
            }
        } catch (Exception $ex) {
            throw new Exception('<ERROR>' . $ex->getMessage() . "\n");
        }
    }

    /**
     * The default action - show the home page
     */
    public function editAction() {
        try {

            $pageHeading = "Edit-Order";
            $this->view->page_heading = $pageHeading;
            $this->view->data_page = "tables";

            if ($this->_request->isPost()) {


                $id = $this->_request->getParam('txtId');
                $firstname = $this->_request->getParam('first_name');
                $lastname = $this->_request->getParam('last_name');
                $companyname = $this->_request->getParam('company_name');
                $email = $this->_request->getParam('email_address');
                $address1 = $this->_request->getParam('address1');
                $address2 = $this->_request->getParam('address2');
                $city = $this->_request->getParam('city_name');
                $state = $this->_request->getParam('state_region');
                $postcode = $this->_request->getParam('post_code');
                $country = $this->_request->getParam('country_name');
                $phonenumber = $this->_request->getParam('phone_number');
                $password = $this->_request->getParam('order_password');
                $currency = $this->_request->getParam('currency');
                $defaultgateway = $this->_request->getParam('payment_method');
                $credit = 0;
                $taxexempt = $this->_request->getParam('tax_exempt');
                $latefeeoveride = $this->_request->getParam('late_fees');
                $overideduenotices = $this->_request->getParam('overdue_notices');
                if ($overideduenotices == "") {
                    $overideduenotices = 0;
                }
                $separateinvoices = $this->_request->getParam('separate_invoices');
                if ($separateinvoices == "") {
                    $separateinvoices = 0;
                }


                $disableautocc = $this->_request->getParam('disable_cc_processing');
                if ($disableautocc == "") {
                    $disableautocc = 0;
                }

                $datecreated = $this->getSystemDateTime();
                $notes = $this->_request->getParam('admin_notes');
                $billingcid = 0;
                $securityqid = $this->_request->getParam('security_question');
                $securityqans = $this->_request->getParam('security_answer');
                $groupid = 0;
                $cardtype = null;
                $cardlastfour = null;
                $cardnum = null;
                $startdate = null;
                $expdate = null;
                $issuenumber = null;
                $bankname = null;
                $banktype = null;
                $bankcode = null;
                $bankacct = null;
                $gatewayid = null;
                $lastlogin = null;
                $ip = null;
                $host = null;
                $status = $this->_request->getParam('status');
                $language = $this->_request->getParam('language');
                $pwresetkey = null;
                $pwresetexpiry = null;


                $objOrderService = new Base_Model_Lib_Order_Service_Order();
                $objOrderEntity = new Base_Model_Lib_Order_Entity_Order();
                $objOrderEntity->setId($id);
                $objOrderEntity->setFirstname($firstname);
                $objOrderEntity->setLastname($lastname);
                $objOrderEntity->setCompanyname($companyname);
                $objOrderEntity->setEmail($email);
                $objOrderEntity->setAddress1($address1);
                $objOrderEntity->setAddress2($address2);
                $objOrderEntity->setCity($city);
                $objOrderEntity->setState($state);
                $objOrderEntity->setPostcode($postcode);
                $objOrderEntity->setCountry($country);
                $objOrderEntity->setPhonenumber($phonenumber);
                $objOrderEntity->setPassword($password);
                $objOrderEntity->setCurrency($currency);
                $objOrderEntity->setDefaultgateway($defaultgateway);
                $objOrderEntity->setCredit($credit);
                $objOrderEntity->setTaxexempt($taxexempt);
                $objOrderEntity->setLatefeeoveride($latefeeoveride);
                $objOrderEntity->setOverideduenotices($overideduenotices);
                $objOrderEntity->setSeparateinvoices($separateinvoices);
                $objOrderEntity->setDisableautocc($disableautocc);
                $objOrderEntity->setDatecreated($datecreated);
                $objOrderEntity->setNotes($notes);
                $objOrderEntity->setBillingcid($billingcid);
                $objOrderEntity->setSecurityqid($securityqid);
                $objOrderEntity->setSecurityqans($securityqans);
                $objOrderEntity->setGroupid($groupid);
                $objOrderEntity->setCardtype($cardtype);
                $objOrderEntity->setCardlastfour($cardlastfour);
                $objOrderEntity->setCardnum($cardnum);
                $objOrderEntity->setStartdate($startdate);
                $objOrderEntity->setExpdate($expdate);
                $objOrderEntity->setIssuenumber($issuenumber);
                $objOrderEntity->setBankname($bankname);
                $objOrderEntity->setBanktype($banktype);
                $objOrderEntity->setBankcode($bankcode);
                $objOrderEntity->setBankacct($bankacct);
                $objOrderEntity->setGatewayid($gatewayid);
                $objOrderEntity->setLastlogin($lastlogin);
                $objOrderEntity->setIp($ip);
                $objOrderEntity->setHost($host);
                $objOrderEntity->setStatus($status);
                $objOrderEntity->setLanguage($language);
                $objOrderEntity->setPwresetkey($pwresetkey);
                $objOrderEntity->setPwresetexpiry($pwresetexpiry);
                $objOrderService->order = $objOrderEntity;

                if ($objOrderService->updateOrder()) {
                    $this->_redirect('/admin/order/?status=edited');
                } else {
                    $this->_redirect('/admin/order/add/?error=1');
                }
            } else {

                $objOrderService = new Base_Model_Lib_Order_Service_Order();
                $orderId = $this->_request->getParam('id');
                $orderInfo = $objOrderService->getOrder($orderId);
                $this->view->orderInfo = $orderInfo;
            }
        } catch (Exception $ex) {
            throw new Exception('<ERROR>' . $ex->getMessage() . "\n");
        }
    }

    public function deleteAction() {
        try {

            $objOrderService = new Base_Model_Lib_Order_Service_Order();
            $objOrderEntity = new Base_Model_Lib_Order_Entity_Order();
            $orderId = $this->_request->getParam('id');

            $objOrderEntity->setId($orderId);
            $objOrderService->order = $objOrderEntity;
            $objOrderService->deleteItem();
            $this->_redirect('/admin/order/?action-status=deleted');
        } catch (Exception $ex) {
            throw new Exception('<ERROR>' . $ex->getMessage() . "\n");
        }
    }

    /**
     * The default action - show the home page
     */
    public function viewAction() {

        try {
            
            $pageHeading = "Order-Information";
            $this->view->page_heading = $pageHeading;
            $this->view->data_page = "tables";
            
            $orderId = $this->_request->getParam('id');
            $objOrderService = new Base_Model_Lib_Order_Service_Order();
            $objOrderEntity = new Base_Model_Lib_Order_Entity_Order();
            $orderInformation = $objOrderService->getOrder($orderId);
            $this->view->orderInformation = $orderInformation;
            
             $status = $this->_request->getParam('status');
             $newStatus = $this->_request->getParam('new-status');
             $this->view->status = $status;
             $this->view->newStatus = $newStatus;
            
            if ($this->_request->isPost()) {
                
                $selectedOrderId =  $this->getRequest()->getPost('txtOrderId');  
                $orderStatus = $this->getRequest()->getPost('bthUpdateOrder');
                if($orderStatus == 'Cancel_Refund'){
                   $orderStatus = 'Cancelled'; 
                } else {
                    $orderStatus = $orderStatus;
                }
                
                if($orderStatus != 'Delete'){
                    $logMessage = "The order status has changed as '$orderStatus' for the order #$selectedOrderId by $currentUserName";
                    $operationType = "STATUS_CHANGED";
                    $objOrderEntity->setId($selectedOrderId);
                    $objOrderEntity->setStatus($orderStatus);
                    $objOrderService->order = $objOrderEntity;
                    $objOrderService->updateOrderStatus();
                    
                } else {
                    $logMessage = "The order #$selectedOrderId has been deleted by $currentUserName";
                    $operationType = "DELETE_RECORD"; 
                    $objOrderEntity->setId($selectedOrderId);
                    $objOrderService->order = $objOrderEntity;
                    $objOrderService->deleteItem();
                }
                
                
                //^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^
                 $currentUserName = $this->getCurrentUserInfo()->getFirstName();
                 $objUserOperationService = new Base_Model_Lib_User_Service_UserOperation();
                 $objUserOperationEntity = new Base_Model_Lib_User_Entity_UserOperation();
                 $objUserOperationEntity->setUserId($this->getCurrentUserId());
                 $objUserOperationEntity->setTableName("tbl_orders");
                 $objUserOperationEntity->setKeyId($orderId);
                 $objUserOperationEntity->setOperationType($operationType);
                 $objUserOperationEntity->setOperationDate($this->getSystemDateTime());
                 $objUserOperationEntity->setMessage($logMessage);
                 $objUserOperationService->userOperation = $objUserOperationEntity;
                 $objUserOperationService->addUserOperation();
                 //^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^
                if($orderStatus != 'Delete'){
                    $this->_redirect('/admin/order/view/id/'.$orderId.'/?status=edited&new-status='.$orderStatus);
                } else {
                    $this->_redirect('/admin/order/?status=deleted');
                }
                
            }
            
            
        } catch (Exception $ex) {
            throw new Exception('<ERROR>' . $ex->getMessage() . "\n");
        }
    }

    /**
     * The default action - show the home page
     */
    public function viewProductServiceAction() {

        try {

            $pageHeading = "View-Order-Product-Service";
            $this->view->page_heading = $pageHeading;
            $this->view->data_page = "tables";
            
            $clientId = $this->_request->getParam('client');
            $orderProductId = $this->_request->getParam('id');

            $objOrderProductService = new Base_Model_Lib_Order_Service_Product();
            $orderProductInformation = $objOrderProductService->getItem($orderProductId);
            $this->view->orderProductInformation = $orderProductInformation;

            // get all order products by client id....
            $objOrderProductEntity = new Base_Model_Lib_Order_Entity_Product();
            $objOrderProductEntity->setClient($clientId);
            $objOrderProductService->product = $objOrderProductEntity;
            $this->view->orderProducts = $objOrderProductService->search("");

            $objProductAndServices = new Base_Model_Lib_Product_Service_Group();
            $productAndServices = $objProductAndServices->getAllWithProducts();
            $this->view->productAndServices = $productAndServices;

            $objPaymentMethodService = new Base_Model_Lib_Catelog_Service_PaymentMethod();
            $paymentMethods = $objPaymentMethodService->getAll();
            $this->view->paymentMethods = $paymentMethods;

            // get all active promotion codes...
            $objPromotionCodeService = new Base_Model_Lib_Catelog_Service_PromotionCode();
            $promotionCodes = $objPromotionCodeService->getAll();
            $this->view->promotionCodes = $promotionCodes;
            
           $objCpanelPackages = new Base_Model_Lib_Catelog_Service_CpanelPackage();
                 $cpanelPackages  = $objCpanelPackages->getAll();
                 $this->view->cpanelPackages = $cpanelPackages;
            
            if ($this->_request->isPost()) {
                
                    $userName       = $this->getRequest()->getPost('txtUsername');
                    $domainName     = $this->getRequest()->getPost('txtDomain');
                    $password       = $this->getRequest()->getPost('txtPassword');
                    $package        = $this->getRequest()->getPost('cmbcPanelPackage');
                    $orderId        = $orderProductInformation->getOrder();
                    
                    $runCommand = $this->getRequest()->getPost('bthRunCommand');
                    $objCpanellService = new Base_Model_Lib_Api_Service_Cpanel();
                    if($runCommand == 'Create'){
                        $objCpanellService->createAccount($domainName, $userName, $password, $package);
                        
                        //^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^
                        $currentUserName = $this->getCurrentUserInfo()->getFirstName();
                        $objUserOperationService = new Base_Model_Lib_User_Service_UserOperation();
                        $objUserOperationEntity = new Base_Model_Lib_User_Entity_UserOperation();
                        $objUserOperationEntity->setUserId($this->getCurrentUserId());
                        $objUserOperationEntity->setTableName("tbl_orders");
                        $objUserOperationEntity->setKeyId($orderId);
                        $objUserOperationEntity->setOperationType("EDIT_RECORD");
                        $objUserOperationEntity->setOperationDate($this->getSystemDateTime());
                        $objUserOperationEntity->setMessage("A cPanel account created for the domain name $domainName and order id #$orderId by $currentUserName. The account username : $userName,password : $password,Package : $package");
                        $objUserOperationService->userOperation = $objUserOperationEntity;
                        $objUserOperationService->addUserOperation();
                        //^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^
                        
                        $this->_redirect('/admin/order/view-product-service/client/'.$clientId.'/id/'.$orderProductId.'/?command=created');
                    } elseif($runCommand == 'Suspend'){
                        $objCpanellService->suspendAccount($userName,'Payment not done');
                        
                        //^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^
                        $currentUserName = $this->getCurrentUserInfo()->getFirstName();
                        $objUserOperationService = new Base_Model_Lib_User_Service_UserOperation();
                        $objUserOperationEntity = new Base_Model_Lib_User_Entity_UserOperation();
                        $objUserOperationEntity->setUserId($this->getCurrentUserId());
                        $objUserOperationEntity->setTableName("tbl_orders");
                        $objUserOperationEntity->setKeyId($orderId);
                        $objUserOperationEntity->setOperationType("EDIT_RECORD");
                        $objUserOperationEntity->setOperationDate($this->getSystemDateTime());
                        $objUserOperationEntity->setMessage("A cPanel account suspended for the domain name $domainName and order id #$orderId by $currentUserName");
                        $objUserOperationService->userOperation = $objUserOperationEntity;
                        $objUserOperationService->addUserOperation();
                        //^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^
                        
                        $this->_redirect('/admin/order/view-product-service/client/'.$clientId.'/id/'.$orderProductId.'/?command=suspended');
                    } elseif($runCommand == 'Unsuspend'){
                        $objCpanellService->unSuspendAccount($userName);
                        
                         //^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^
                        $currentUserName = $this->getCurrentUserInfo()->getFirstName();
                        $objUserOperationService = new Base_Model_Lib_User_Service_UserOperation();
                        $objUserOperationEntity = new Base_Model_Lib_User_Entity_UserOperation();
                        $objUserOperationEntity->setUserId($this->getCurrentUserId());
                        $objUserOperationEntity->setTableName("tbl_orders");
                        $objUserOperationEntity->setKeyId($orderId);
                        $objUserOperationEntity->setOperationType("EDIT_RECORD");
                        $objUserOperationEntity->setOperationDate($this->getSystemDateTime());
                        $objUserOperationEntity->setMessage("A cPanel account unsuspended for the domain name $domainName and order id #$orderId by $currentUserName");
                        $objUserOperationService->userOperation = $objUserOperationEntity;
                        $objUserOperationService->addUserOperation();
                        //^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^
                        
                        $this->_redirect('/admin/order/view-product-service/client/'.$clientId.'/id/'.$orderProductId.'/?command=unsuspended');
                    } elseif($runCommand == 'Terminate'){
                         $objCpanellService->terminateAccount($userName);
                         
                         //^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^
                        $currentUserName = $this->getCurrentUserInfo()->getFirstName();
                        $objUserOperationService = new Base_Model_Lib_User_Service_UserOperation();
                        $objUserOperationEntity = new Base_Model_Lib_User_Entity_UserOperation();
                        $objUserOperationEntity->setUserId($this->getCurrentUserId());
                        $objUserOperationEntity->setTableName("tbl_orders");
                        $objUserOperationEntity->setKeyId($orderId);
                        $objUserOperationEntity->setOperationType("EDIT_RECORD");
                        $objUserOperationEntity->setOperationDate($this->getSystemDateTime());
                        $objUserOperationEntity->setMessage("A cPanel account terminated for the domain name $domainName and order id #$orderId by $currentUserName");
                        $objUserOperationService->userOperation = $objUserOperationEntity;
                        $objUserOperationService->addUserOperation();
                        //^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^
                         
                        $this->_redirect('/admin/order/view-product-service/client/'.$clientId.'/id/'.$orderProductId.'/?command=terminated');
                    } elseif($runCommand == 'ChangePackage'){
   
                        $res = $objCpanellService->changePackage($userName,$package);
                        
                         //^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^
                        $currentUserName = $this->getCurrentUserInfo()->getFirstName();
                        $objUserOperationService = new Base_Model_Lib_User_Service_UserOperation();
                        $objUserOperationEntity = new Base_Model_Lib_User_Entity_UserOperation();
                        $objUserOperationEntity->setUserId($this->getCurrentUserId());
                        $objUserOperationEntity->setTableName("tbl_orders");
                        $objUserOperationEntity->setKeyId($orderId);
                        $objUserOperationEntity->setOperationType("EDIT_RECORD");
                        $objUserOperationEntity->setOperationDate($this->getSystemDateTime());
                        $objUserOperationEntity->setMessage("A cPanel account changed to $package for the domain name $domainName and order id #$orderId by $currentUserName");
                        $objUserOperationService->userOperation = $objUserOperationEntity;
                        $objUserOperationService->addUserOperation();
                        //^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^
                        $this->_redirect('/admin/order/view-product-service/client/'.$clientId.'/id/'.$orderProductId.'/?command=Change Package');
                    } elseif($runCommand == 'ChangePassword'){
                        $objCpanellService->updateAccountPassword($userName,$password);
                        
                        //^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^
                        $currentUserName = $this->getCurrentUserInfo()->getFirstName();
                        $objUserOperationService = new Base_Model_Lib_User_Service_UserOperation();
                        $objUserOperationEntity = new Base_Model_Lib_User_Entity_UserOperation();
                        $objUserOperationEntity->setUserId($this->getCurrentUserId());
                        $objUserOperationEntity->setTableName("tbl_orders");
                        $objUserOperationEntity->setKeyId($orderId);
                        $objUserOperationEntity->setOperationType("EDIT_RECORD");
                        $objUserOperationEntity->setOperationDate($this->getSystemDateTime());
                        $objUserOperationEntity->setMessage("A cPanel account password changed for the domain name $domainName and order id #$orderId by $currentUserName");
                        $objUserOperationService->userOperation = $objUserOperationEntity;
                        $objUserOperationService->addUserOperation();
                        //^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^
                        
                        $this->_redirect('/admin/order/view-product-service/client/'.$clientId.'/id/'.$orderProductId.'/?command=Change Password');
                    } else {
                
                        $objOrderProductEntity = new Base_Model_Lib_Order_Entity_Product();
                        $objOrderProductEntity->setId($this->_request->getParam('txtId'));
                        $objOrderProductEntity->setProduct($this->_request->getParam('cmbProductService'));
                        $objOrderProductEntity->setServer($this->_request->getParam('cmbServer'));
                        $objOrderProductEntity->setDomain($this->_request->getParam('txtDomain'));
                        $objOrderProductEntity->setDomainStatus($this->_request->getParam('cmbStatus'));
                        $objOrderProductEntity->setPaymentMethod($this->_request->getParam('cmbPaymentMethod'));
                        $objOrderProductEntity->setFirstPaymentAmount($this->_request->getParam('txtFirstPaymentAmount'));
                        $objOrderProductEntity->setAmount($this->_request->getParam('txtRecurringAmount'));
                        $objOrderProductEntity->setBillingCycle($this->_request->getParam('cmbBillingCycle'));
                        $objOrderProductEntity->setNextDueDate($this->_request->getParam('txtNextDueDate'));
                        $nextInvoiceDate = date('Y-m-d H:i:s',(strtotime('-2 day',strtotime($this->_request->getParam('txtNextDueDate')))));
                        $objOrderProductEntity->setNextInvoiceDate($nextInvoiceDate);
                        $objOrderProductEntity->setUsername($this->_request->getParam('txtUsername'));
                        $objOrderProductEntity->setPassword($this->_request->getParam('txtPassword'));
                        $objOrderProductEntity->setNotes($this->_request->getParam('admin_notes'));
                        $objOrderProductEntity->setSubscription($this->_request->getParam('txtSubscriptionID'));
                        $objOrderProductEntity->setPromotionCode($this->_request->getParam('cmbPromotionCode'));
                        $objOrderProductEntity->setOverideautosuspend($this->_request->getParam('chkOverideAutoSuspend'));
                        $objOrderProductEntity->setOveridesuspenduntil($this->_request->getParam('txtOverideAutoSuspendDate'));
                        $objOrderProductEntity->setDedicatedIp($this->_request->getParam('txtDedicatedIP'));
                        $objOrderProductEntity->setLastupdate($this->getSystemDateTime());
                        $objOrderProductEntity->setHasAdmin($this->_request->getParam('cmbHasAdmin'));
                        $objOrderProductEntity->setCPanelPackage($this->_request->getParam('cmbcPanelPackage'));
                        $objOrderProductService->product = $objOrderProductEntity;
                        $objOrderProductService->updateProductService();
                
                        $this->_redirect('/admin/order/view-product-service/client/'.$clientId.'/id/'.$orderProductId.'/?status=edited');
                    }
            }
            
            $status = $this->_request->getParam('status');
            $this->view->status = $status;
            $command = $this->_request->getParam('command');
            $this->view->command = $command;

        } catch (Exception $ex) {
            throw new Exception('<ERROR>' . $ex->getMessage() . "\n");
        }
    }
    
    
    
    /**
     * The default action - show the home page
     */
    public function viewDomainAction() {

        try {
            $pageHeading = "Domains";
            $this->view->page_heading = $pageHeading;
            $this->view->data_page = "tables";
            
            $clientId = $this->_request->getParam('client');
            $domainId = $this->_request->getParam('id');
            
            $objDomainService = new Base_Model_Lib_Order_Service_Domain();
            $clientsDomains = $objDomainService->getAllDomainsByClientId($clientId); 
            $this->view->clientsDomains = $clientsDomains;
            
            $selectedDomainInformation = $objDomainService->getItem($domainId);
            $this->view->domainInformation = $selectedDomainInformation;
            
            $objRegistrarsService = new Base_Model_Lib_System_Service_Registrars();
            $registrars = $objRegistrarsService->getAll();
            $this->view->registrars = $registrars;
            
            $objPaymentMethodService = new Base_Model_Lib_Catelog_Service_PaymentMethod();
            $paymentMethods = $objPaymentMethodService->getAll();
            $this->view->paymentMethods = $paymentMethods;
            
            if ($this->_request->isPost()) {
                
                        $domainId = $this->_request->getParam('txtId');
                        $clientId = $this->_request->getParam('txtClientId');
                        $objDomainEntity = new Base_Model_Lib_Order_Entity_Domain();
                        $objDomainEntity->setId($this->_request->getParam('txtId'));
                        $objDomainEntity->setRegistrationdate($this->_request->getParam('txtRegistrationDate'));
                        $objDomainEntity->setDomain($this->_request->getParam('txtDomainName'));
                        $objDomainEntity->setFirstpaymentamount($this->_request->getParam('txtFirstPaymentAmount'));
                        $objDomainEntity->setRecurringamount($this->_request->getParam('txtRecurringAmount'));
                        $objDomainEntity->setRegistrar($this->_request->getParam('cmbRegistrar'));
                        $objDomainEntity->setRegistrationperiod($this->_request->getParam('txtRegistrationPeriod'));
                        $objDomainEntity->setExpirydate($this->_request->getParam('txtExpiryDate'));
                        $objDomainEntity->setSubscriptionid($this->_request->getParam('txtSubscriptionID'));
                        $objDomainEntity->setPromoid($this->_request->getParam('txtPromotionCode'));
                        $objDomainEntity->setStatus($this->_request->getParam('cmbStatus'));
                        $objDomainEntity->setNextduedate($this->_request->getParam('txtNextDueDate'));
                        $objDomainEntity->setNextinvoicedate($this->_request->getParam('txtNextDueDate'));
                        $objDomainEntity->setAdditionalnotes($this->_request->getParam('admin_notes')); // admin_notes
                        $objDomainEntity->setPaymentmethod($this->_request->getParam('cmbPaymentMethod'));
                        $objDomainEntity->setDnsmanagement($this->_request->getParam('chkDnsManagement'));
                        $objDomainEntity->setEmailforwarding($this->_request->getParam('chkEmailForwarding'));
                        $objDomainEntity->setIdprotection($this->_request->getParam('chkIDProtection'));
                        $objDomainEntity->setDonotrenew($this->_request->getParam('chkDonotrenew'));
                        $objDomainEntity->setRegistrarLock($this->_request->getParam('chkRegistrarLock'));
                        $objDomainEntity->setNameServer1($this->_request->getParam('txtNameserver1'));
                        $objDomainEntity->setNameServer2($this->_request->getParam('txtNameserver2'));
                        $objDomainEntity->setNameServer3($this->_request->getParam('txtNameserver3'));
                        $objDomainEntity->setNameServer4($this->_request->getParam('txtNameserver4'));
                        $objDomainEntity->setReminders(null);
                        $objDomainEntity->setSynced(null);
                        $objDomainService->domain = $objDomainEntity;
                        $objDomainService->updateItem();
                        
                         $this->_redirect('/admin/order/view-domain/client/'.$clientId.'/id/'.$domainId.'/?status=updated');
                
                
            }
            
            
            $status = $this->_request->getParam('status');
$this->view->status = $status;

	} catch (Exception $ex) {
            throw new Exception('<ERROR>' . $ex->getMessage() . "\n");
        }
    }
    
    
        /**
     * The add action
     */
    public function searchAction() {
        try {
            $pageHeading = "Search-Order";
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