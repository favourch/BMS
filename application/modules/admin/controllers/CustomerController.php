<?php

class Admin_CustomerController extends Base_Model_ObtorLib_App_Admin_Controller {

    private $clientInfo;

    public function init() {
        parent::init();
    }

    /**
     * The default action - show the home page
     */
    public function indexAction() {
        try {
            
            $pageHeading = "Manage-Customers";
            $this->view->page_heading = $pageHeading;
            $this->view->data_page = "tables";
            
            $firstName         = $this->_request->getParam('first-name');
            $lastName          = $this->_request->getParam('last-name');
            $emailAddress      = $this->_request->getParam('email-address');
            $status            = $this->_request->getParam('customer-status');
            
            $objPaggination = new Base_Model_ObtorLib_Base_Lib_Paggination();

            $objClientService = new Base_Model_Lib_Client_Service_Client();
            $objClientEntity = new Base_Model_Lib_Client_Entity_Client();
            $objClientEntity->setFirstname($firstName);
            $objClientEntity->setLastname($lastName);
            $objClientEntity->setEmail($emailAddress);
            $objClientEntity->setStatus($status);
            $objClientService->client = $objClientEntity;

            $totalResult = $objClientService->searchCount();
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

            $result = $objClientService->search($limit);
            $this->view->clients = $result;
            $this->view->paggination = $objPaggination;

            $this->view->pageNum = $page;
        } catch (Exception $ex) {
            throw new Exception('<ERROR>' . $ex->getMessage() . "\n");
        }
    }

    /**
     * The default action - show the home page
     */
    public function addAction() {
        try {
            
            $pageHeading = "Add-New-Customer";
            $this->view->page_heading = $pageHeading;
            $this->view->data_page = "tables";

            if ($this->_request->isPost()) {


                $id = NULL;
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
                $password = $this->_request->getParam('client_password');
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


                $objClientService = new Base_Model_Lib_Client_Service_Client();
                $objClientEntity = new Base_Model_Lib_Client_Entity_Client();
                $objClientEntity->setFirstname($firstname);
                $objClientEntity->setLastname($lastname);
                $objClientEntity->setCompanyname($companyname);
                $objClientEntity->setEmail($email);
                $objClientEntity->setAddress1($address1);
                $objClientEntity->setAddress2($address2);
                $objClientEntity->setCity($city);
                $objClientEntity->setState($state);
                $objClientEntity->setPostcode($postcode);
                $objClientEntity->setCountry($country);
                $objClientEntity->setPhonenumber($phonenumber);
                $objClientEntity->setPassword(md5($password));
                $objClientEntity->setCurrency($currency);
                $objClientEntity->setDefaultgateway($defaultgateway);
                $objClientEntity->setCredit($credit);
                $objClientEntity->setTaxexempt($taxexempt);
                $objClientEntity->setLatefeeoveride($latefeeoveride);
                $objClientEntity->setOverideduenotices($overideduenotices);
                $objClientEntity->setSeparateinvoices($separateinvoices);
                $objClientEntity->setDisableautocc($disableautocc);
                $objClientEntity->setDatecreated($datecreated);
                $objClientEntity->setNotes($notes);
                $objClientEntity->setBillingcid($billingcid);
                $objClientEntity->setSecurityqid($securityqid);
                $objClientEntity->setSecurityqans($securityqans);
                $objClientEntity->setGroupid($groupid);
                $objClientEntity->setCardtype($cardtype);
                $objClientEntity->setCardlastfour($cardlastfour);
                $objClientEntity->setCardnum($cardnum);
                $objClientEntity->setStartdate($startdate);
                $objClientEntity->setExpdate($expdate);
                $objClientEntity->setIssuenumber($issuenumber);
                $objClientEntity->setBankname($bankname);
                $objClientEntity->setBanktype($banktype);
                $objClientEntity->setBankcode($bankcode);
                $objClientEntity->setBankacct($bankacct);
                $objClientEntity->setGatewayid($gatewayid);
                $objClientEntity->setLastlogin($lastlogin);
                $objClientEntity->setIp($ip);
                $objClientEntity->setHost($host);
                $objClientEntity->setStatus($status);
                $objClientEntity->setLanguage($language);
                $objClientEntity->setPwresetkey($pwresetkey);
                $objClientEntity->setPwresetexpiry($pwresetexpiry);
                $objClientService->client = $objClientEntity;
                $clientId = $objClientService->addClient();
                if ($clientId) {
                    
                     // add the details to the system logs....
                    $actionName = 'ADD_NEW';
                    $logMessage = "log-msg-record-added";
                    $tableName = 'tbl_clients';
                    $rowId = $clientId;
                    $this->addSystemLog($actionName, $logMessage, $tableName, $rowId);
                    
                     // send welcome mail to that client....
                    $objMailTemplate = new Base_Model_Lib_Mail_Service_Template();
                    $mailTemplate = $objMailTemplate->read('9');
                    $mail = new Base_Model_Lib_Mail_Service_Mailer();
                    $emailText = $mailTemplate->getMailBody();
                    $emailBody = $mailTemplate->getMailHtmlBody();
                    $signature = '';
                    $tag = array('{$client_first_name}' => $firstname, '{$client_email}' => $email, '{$client_password}' => $password,'{$signature}' => $signature);
                    $mail->setTag($tag);
                    $mail->setText($emailText);
                    $mail->setHtml($emailBody);
                    $mail->setFrom($mailTemplate->getMailFrom(), $mailTemplate->getMailFromName());
                    $mail->addTo($email, $firstname);
                    $mail->setSubject($mailTemplate->getMailSubject());
                    $mail->setMailType('html');
                    $mail->send();
                    
                    $actionName = 'ADD_NEW';
                    $logMessage = "email-notifiaction-sent-to-client";
                    $tableName = 'tbl_clients';
                    $rowId = $clientId;
                    $this->addSystemLog($actionName, $logMessage, $tableName, $rowId);
                    
        
                    // record this email....
                    $emailMessage = strtr($emailBody, $tag);
                    $objEmailLogService = new Base_Model_Lib_Mail_Service_EmailLog();
                    $objEmailLogEntity = new Base_Model_Lib_Mail_Entity_EmailLog();
                    $objEmailLogEntity->setUserid($clientId);
                    $objEmailLogEntity->setSubject($mailTemplate->getMailSubject());
                    $objEmailLogEntity->setDate($this->getSystemDateTime());
                    $objEmailLogEntity->setMessage($emailMessage);
                    $objEmailLogEntity->setTo($email);
                    $objEmailLogService->emailLog = $objEmailLogEntity;
                    $objEmailLogService->addItem();
         

                    $this->_redirect('/admin/customer/?action-status=updated');
                } else {
                    $this->_redirect('/admin/customer/?action-status=failed');
                }
            }



            // get all the countries....
            $objCountryService = new Base_Model_Lib_Catelog_Service_Country();
            $countryList = $objCountryService->getAll();
            $this->view->countryList = $countryList;

            
            // get all languages...
            $objLanguageService = new Base_Model_Lib_Catelog_Service_Language();
            $languageList = $objLanguageService->getAll();
            $this->view->languageList = $languageList;


            // get all currencies...
            $objCurrencyService = new Base_Model_Lib_Catelog_Service_Currency();
            $currencyList = $objCurrencyService->getAll();
            $this->view->currencyList = $currencyList;

            // get all payment method...
            $objPaymentMethodService = new Base_Model_Lib_Catelog_Service_PaymentMethod();
            $paymentMethodList = $objPaymentMethodService->getAll();
            $this->view->paymentMethodList = $paymentMethodList;
        
             // get all Security Questions
            $objSequsService = new Base_Model_Lib_Status_Service_SecurityQuestion();
            $seqServiceList = $objSequsService->getAll();
            $this->view->seqServiceList = $seqServiceList;
           
            
            
        } catch (Exception $ex) {
            throw new Exception('<ERROR>' . $ex->getMessage() . "\n");
        }
    }

    /**
     * The default action - show the home page
     */
    public function editAction() {
        try {

            $pageHeading = "Edit-Customer";
            $this->view->page_heading = $pageHeading;
            $this->view->data_page = "tables";

            if ($this->_request->isPost()) {


                $id = $this->_request->getParam('id');
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
                $password = $this->_request->getParam('client_password');
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


                $objClientService = new Base_Model_Lib_Client_Service_Client();
                $objClientEntity = new Base_Model_Lib_Client_Entity_Client();
                $objClientEntity->setId($id);
                $objClientEntity->setFirstname($firstname);
                $objClientEntity->setLastname($lastname);
                $objClientEntity->setCompanyname($companyname);
                $objClientEntity->setEmail($email);
                $objClientEntity->setAddress1($address1);
                $objClientEntity->setAddress2($address2);
                $objClientEntity->setCity($city);
                $objClientEntity->setState($state);
                $objClientEntity->setPostcode($postcode);
                $objClientEntity->setCountry($country);
                $objClientEntity->setPhonenumber($phonenumber);
                $objClientEntity->setPassword(md5($password));
                $objClientEntity->setCurrency($currency);
                $objClientEntity->setDefaultgateway($defaultgateway);
                $objClientEntity->setCredit($credit);
                $objClientEntity->setTaxexempt($taxexempt);
                $objClientEntity->setLatefeeoveride($latefeeoveride);
                $objClientEntity->setOverideduenotices($overideduenotices);
                $objClientEntity->setSeparateinvoices($separateinvoices);
                $objClientEntity->setDisableautocc($disableautocc);
                $objClientEntity->setDatecreated($datecreated);
                $objClientEntity->setNotes($notes);
                $objClientEntity->setBillingcid($billingcid);
                $objClientEntity->setSecurityqid($securityqid);
                $objClientEntity->setSecurityqans($securityqans);
                $objClientEntity->setGroupid($groupid);
                $objClientEntity->setCardtype($cardtype);
                $objClientEntity->setCardlastfour($cardlastfour);
                $objClientEntity->setCardnum($cardnum);
                $objClientEntity->setStartdate($startdate);
                $objClientEntity->setExpdate($expdate);
                $objClientEntity->setIssuenumber($issuenumber);
                $objClientEntity->setBankname($bankname);
                $objClientEntity->setBanktype($banktype);
                $objClientEntity->setBankcode($bankcode);
                $objClientEntity->setBankacct($bankacct);
                $objClientEntity->setGatewayid($gatewayid);
                $objClientEntity->setLastlogin($lastlogin);
                $objClientEntity->setIp($ip);
                $objClientEntity->setHost($host);
                $objClientEntity->setStatus($status);
                $objClientEntity->setLanguage($language);
                $objClientEntity->setPwresetkey($pwresetkey);
                $objClientEntity->setPwresetexpiry($pwresetexpiry);
                $objClientService->client = $objClientEntity;

                if ($objClientService->updateClient()) {

                    
                   $actionName = 'EDIT';
                    $logMessage = "log-msg-record-edited";
                    $tableName = 'tbl_clients';
                    $rowId = $id;
                    $this->addSystemLog($actionName, $logMessage, $tableName, $rowId);


                    $this->_redirect('/admin/customer/?action-status=updated');
                } else {
                    $this->_redirect('/admin/customer/?action-status=failed');
                }
            } else {

                $objClientService = new Base_Model_Lib_Client_Service_Client();
                $clientId = $this->_request->getParam('id');
                $clientInfo = $objClientService->getClient($clientId);
                $this->view->clientInfo = $clientInfo;
            }



            // get all the countries....
            $objCountryService = new Base_Model_Lib_Catelog_Service_Country();
            $countryList = $objCountryService->getAll();
            $this->view->countryList = $countryList;

            // get all languages...
            $objLanguageService = new Base_Model_Lib_Catelog_Service_Language();
            $languageList = $objLanguageService->getAll();
            $this->view->languageList = $languageList;


            // get all currencies...
            $objCurrencyService = new Base_Model_Lib_Catelog_Service_Currency();
            $currencyList = $objCurrencyService->getAll();
            $this->view->currencyList = $currencyList;

            // get all payment method...
            $objPaymentMethodService = new Base_Model_Lib_Catelog_Service_PaymentMethod();
            $paymentMethodList = $objPaymentMethodService->getAll();
            $this->view->paymentMethodList = $paymentMethodList;
            
            
             // get all Security Questions
            $objSequsService = new Base_Model_Lib_Status_Service_SecurityQuestion();
            $seqServiceList = $objSequsService->getAll();
            $this->view->seqServiceList = $seqServiceList;
            
            
        } catch (Exception $ex) {
            throw new Exception('<ERROR>' . $ex->getMessage() . "\n");
        }
    }

    public function deleteAction() {
        try {

            $objClientService = new Base_Model_Lib_Client_Service_Client();
            $objClientEntity = new Base_Model_Lib_Client_Entity_Client();
            $clientId = $this->_request->getParam('id');
            $clientInfo = $objClientService->getClient($clientId);
            $firstname = $clientInfo->getFirstname();
            $objClientEntity->setId($clientId);
            $objClientService->client = $objClientEntity;
            $objClientService->deleteClient();

            $actionName = 'DELETE';
            $logMessage = "log-msg-record-deleted";
            $tableName = 'tbl_clients';
            $rowId = $clientId;
            $this->addSystemLog($actionName, $logMessage, $tableName, $rowId);

           $this->_redirect("/admin/customer/?action-status=deleted");
        } catch (Exception $ex) {
            throw new Exception('<ERROR>' . $ex->getMessage() . "\n");
        }
    }

    /**
     * The default action - show the home page
     */
    public function viewAction() {

        try {
            $objClientService = new Base_Model_Lib_Client_Service_Client();
            $clientId = $this->_request->getParam('id');
            $clientInfo = $objClientService->getClient($clientId);
            $this->view->clientInfo = $clientInfo;



            $this->view->clientCurrency = $clientInfo->getCurrency();
            $clientFrom = $clientInfo->getStartdate();
            $clientTo = $this->getTodayDateTime();

            $clintDuration = $this->countMonths($clientFrom, $clientTo);
            $this->view->clintDuration = $clintDuration;

            // get recent send emails....
            $objPaggination = new Base_Model_Lib_Ext_Paggination();

            $objMailLogService = new Base_Model_Lib_Mail_Service_EmailLog();
            $objMailLogEntity = new Base_Model_Lib_Mail_Entity_EmailLog();

            $objMailLogEntity->setUserid($clientId);
            $objMailLogService->emailLog = $objMailLogEntity;

            $totalResult = $objMailLogService->searchCount();
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
            $result = $objMailLogService->search($limit);
            $this->view->maillogs = $result;


            // get the Invoices/Billing details....
            //------ paid invoice -----------------------------------
            $objInvoiceEntity = new Base_Model_Lib_Invoice_Entity_Invoice();
            $objInvoiceService = new Base_Model_Lib_Invoice_Service_Invoice();
            $objInvoiceEntity->setClient($clientId);
            $objInvoiceEntity->setStatus('Paid');
            $objInvoiceService->invoice = $objInvoiceEntity;
            $invoiceInformation = $objInvoiceService->search("");
            $totalPaidAmount = 0;
            $countInvoice = 0;
            foreach ($invoiceInformation As $iIndex => $invoiceInfo) {
                $totalPaidAmount = $totalPaidAmount + $invoiceInfo->getTotal();
                $countInvoice = $countInvoice + 1;
            }
            $this->view->totalPaidAmount = $totalPaidAmount;
            $this->view->totalPaidInvoice = $countInvoice;
            //------------------------------------------------------
            //------ unpaid paid invoice -----------------------------------
            $objInvoiceEntity = new Base_Model_Lib_Invoice_Entity_Invoice();
            $objInvoiceService = new Base_Model_Lib_Invoice_Service_Invoice();
            $objInvoiceEntity->setClient($clientId);
            $objInvoiceEntity->setStatus('Unpaid');
            $objInvoiceService->invoice = $objInvoiceEntity;
            $invoiceInformation = $objInvoiceService->search("");
            $totalUnpaidPaidAmount = 0;
            $countUnpaidInvoice = 0;
            foreach ($invoiceInformation As $iIndex => $invoiceInfo) {
                $totalUnpaidPaidAmount = $totalUnpaidPaidAmount + $invoiceInfo->getTotal();
                $countUnpaidInvoice = $countUnpaidInvoice + 1;
            }
            //------------------------------------------------------
            //------ unpaid paid invoice -----------------------------------
            $objInvoiceEntity = new Base_Model_Lib_Invoice_Entity_Invoice();
            $objInvoiceService = new Base_Model_Lib_Invoice_Service_Invoice();
            $objInvoiceEntity->setClient($clientId);
            $objInvoiceEntity->setStatus('Unpaid');
            $objInvoiceService->invoice = $objInvoiceEntity;
            $invoiceInformation = $objInvoiceService->search("");
            $totalUnpaidPaidAmount = 0;
            $countUnpaidInvoice = 0;
            foreach ($invoiceInformation As $iIndex => $invoiceInfo) {
                $totalUnpaidPaidAmount = $totalUnpaidPaidAmount + $invoiceInfo->getTotal();
                $countUnpaidInvoice = $countUnpaidInvoice + 1;
            }
            //------------------------------------------------------
            //------ Pending invoice -----------------------------------
            $objInvoiceEntity = new Base_Model_Lib_Invoice_Entity_Invoice();
            $objInvoiceService = new Base_Model_Lib_Invoice_Service_Invoice();
            $objInvoiceEntity->setClient($clientId);
            $objInvoiceEntity->setStatus('Pending');
            $objInvoiceService->invoice = $objInvoiceEntity;
            $invoiceInformation = $objInvoiceService->search("");
            $totalPendingAmount = 0;
            $countPendingInvoice = 0;
            foreach ($invoiceInformation As $iIndex => $invoiceInfo) {
                $totalPendingAmount = $totalPendingAmount + $invoiceInfo->getTotal();
                $countPendingInvoice = $countPendingInvoice + 1;
            }

            $totalUnpaidDueAmount = $totalUnpaidPaidAmount + $totalPendingAmount;
            $totalUnpaidDueCount = $countUnpaidInvoice + $countPendingInvoice;
            $this->view->totalUnpaidDueAmount = $totalUnpaidDueAmount;
            $this->view->totalUnpaidDueCount = $totalUnpaidDueCount;

            //------------------------------------------------------
            //------ Cancelled invoice -----------------------------------
            $objInvoiceEntity = new Base_Model_Lib_Invoice_Entity_Invoice();
            $objInvoiceService = new Base_Model_Lib_Invoice_Service_Invoice();
            $objInvoiceEntity->setClient($clientId);
            $objInvoiceEntity->setStatus('Cancelled');
            $objInvoiceService->invoice = $objInvoiceEntity;
            $invoiceInformation = $objInvoiceService->search("");
            $totalCancelledAmount = 0;
            $countCancelledInvoice = 0;
            foreach ($invoiceInformation As $iIndex => $invoiceInfo) {
                $totalCancelledAmount = $totalCancelledAmount + $invoiceInfo->getTotal();
                $countCancelledInvoice = $countCancelledInvoice + 1;
            }
            $this->view->totalCancelledAmount = $totalCancelledAmount;
            $this->view->countCancelledInvoice = $countCancelledInvoice;
            //------------------------------------------------------
            //------ Refunded invoice -----------------------------------
            $objInvoiceEntity = new Base_Model_Lib_Invoice_Entity_Invoice();
            $objInvoiceService = new Base_Model_Lib_Invoice_Service_Invoice();
            $objInvoiceEntity->setClient($clientId);
            $objInvoiceEntity->setStatus('Refunded');
            $objInvoiceService->invoice = $objInvoiceEntity;
            $invoiceInformation = $objInvoiceService->search("");
            $totalRefundedAmount = 0;
            $countRefundedInvoice = 0;
            foreach ($invoiceInformation As $iIndex => $invoiceInfo) {
                $totalRefundedAmount = $totalCancelledAmount + $invoiceInfo->getTotal();
                $countRefundedInvoice = $countCancelledInvoice + 1;
            }
            $this->view->totalRefundedAmount = $totalRefundedAmount;
            $this->view->countRefundedInvoice = $countRefundedInvoice;
            //------------------------------------------------------

            $objOrderProductService = new Base_Model_Lib_Order_Service_Product();
            $objProductGroup = new Base_Model_Lib_Product_Service_Group();
            $productGroups = $objProductGroup->getAll();
            $arrProductGroups = array();
            foreach ($productGroups As $pIndex => $productGroup) {

                $objProductServiceInfo = new stdClass();
                $objProductServiceInfo->name = $productGroup->getName();
                $objProductServiceInfo->id = $productGroup->getId();
                $objProductServiceInfo->numberOfOrder = $objOrderProductService->countOrderProduct($productGroup->getId(), $clientId);
                array_push($arrProductGroups, $objProductServiceInfo);
            }
            $this->view->productGroups = $arrProductGroups;


            $objPaggination = new Base_Model_Lib_Ext_Paggination();

            $objDomainService = new Base_Model_Lib_Order_Service_Domain();
            $objDomainEntity = new Base_Model_Lib_Order_Entity_Domain();
            $objDomainEntity->setClient($clientId);

            $objDomainService->domain = $objDomainEntity;

            $totalNumberOfDomains = $objDomainService->searchCount();
            $this->view->totalNumberOfDomains = $totalNumberOfDomains;


            $objPaggination = new Base_Model_Lib_Ext_Paggination();

            $objTicketService = new Base_Model_Lib_Support_Service_Ticket();
            $objTicketEntity = new Base_Model_Lib_Support_Entity_Ticket();
            $objTicketEntity->setClient($clientId);
            $objTicketService->ticket = $objTicketEntity;
            $totalNumberOfTickets = $objTicketService->searchCount();
            $this->view->totalNumberOfTickets = $totalNumberOfTickets;
        } catch (Exception $ex) {
            throw new Exception('<ERROR>' . $ex->getMessage() . "\n");
        }
    }

    /**
     * The default action - show the home page
     */
    public function viewProfileAction() {

        try {
            $objClientService = new Base_Model_Lib_Client_Service_Client();
            $clientId = $this->_request->getParam('id');
            $clientInfo = $objClientService->getClient($clientId);
            $this->view->clientInfo = $clientInfo;
        } catch (Exception $ex) {
            throw new Exception('<ERROR>' . $ex->getMessage() . "\n");
        }
    }

    /**
     * The default action - show the home page
     */
    public function viewContactsAction() {

        try {

            $objClientService = new Base_Model_Lib_Client_Service_Client();
            $clientId = $this->_request->getParam('id');
            $clientInfo = $objClientService->getClient($clientId);
            $this->view->clientInfo = $clientInfo;
        } catch (Exception $ex) {
            throw new Exception('<ERROR>' . $ex->getMessage() . "\n");
        }
    }

    /**
     * The default action - show the home page
     */
    public function viewProductServicesAction() {

        try {

            $objClientService = new Base_Model_Lib_Client_Service_Client();
            $clientId = $this->_request->getParam('id');
            $clientInfo = $objClientService->getClient($clientId);
            $this->view->clientInfo = $clientInfo;


            $objPaggination = new Base_Model_Lib_Ext_Paggination();

            $objOrderService = new Base_Model_Lib_Order_Service_Order();
            $objOrderEntity = new Base_Model_Lib_Order_Entity_Order();
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
        } catch (Exception $ex) {
            throw new Exception('<ERROR>' . $ex->getMessage() . "\n");
        }
    }

    /**
     * The default action - show the home page
     */
    public function viewDomainsAction() {

        try {
            $objClientService = new Base_Model_Lib_Client_Service_Client();
            $clientId = $this->_request->getParam('id');
            $clientInfo = $objClientService->getClient($clientId);
            $this->view->clientInfo = $clientInfo;

            $objDomainService = new Base_Model_Lib_Order_Service_Domain();
            $objDomainEntity = new Base_Model_Lib_Order_Entity_Domain();
            $objDomainEntity->setClient($clientId);
            $objDomainService->domain = $objDomainEntity;
            $myDomains = $objDomainService->search("");
            $this->view->myDomains = $myDomains;
        } catch (Exception $ex) {
            throw new Exception('<ERROR>' . $ex->getMessage() . "\n");
        }
    }

    /**
     * The default action - show the home page
     */
    public function viewBillableItemsAction() {
        try {
            $objClientService = new Base_Model_Lib_Client_Service_Client();
            $clientId = $this->_request->getParam('id');
            $clientInfo = $objClientService->getClient($clientId);
            $this->view->clientInfo = $clientInfo;
        } catch (Exception $ex) {
            throw new Exception('<ERROR>' . $ex->getMessage() . "\n");
        }
    }

    /**
     * The default action - show the home page
     */
    public function viewInvoicesAction() {
        try {
            $objClientService = new Base_Model_Lib_Client_Service_Client();
            $clientId = $this->_request->getParam('id');
            $clientInfo = $objClientService->getClient($clientId);
            $this->view->clientInfo = $clientInfo;

            $objInvoiceService = new Base_Model_Lib_Invoice_Service_Invoice();
            $objInvoiceEntity = new Base_Model_Lib_Invoice_Entity_Invoice();
            $objInvoiceEntity->setClient($clientId);
            $objInvoiceService->invoice = $objInvoiceEntity;
            $myInvoices = $objInvoiceService->search("");
            $this->view->myInvoices = $myInvoices;
        } catch (Exception $ex) {
            throw new Exception('<ERROR>' . $ex->getMessage() . "\n");
        }
    }

    /**
     * The default action - show the home page
     */
    public function viewTransactionsAction() {
        try {
            $objClientService = new Base_Model_Lib_Client_Service_Client();
            $clientId = $this->_request->getParam('id');
            $clientInfo = $objClientService->getClient($clientId);
            $this->view->clientInfo = $clientInfo;


            $objTransactionsService = new Base_Model_Lib_Invoice_Service_Transaction();
            $objTransactionsEntity = new Base_Model_Lib_Invoice_Entity_Transaction();
            $objTransactionsEntity->setClient($clientId);
            $objTransactionsService->transaction = $objTransactionsEntity;

            $result = $objTransactionsService->search($limit);
            $this->view->transactions = $result;
        } catch (Exception $ex) {
            throw new Exception('<ERROR>' . $ex->getMessage() . "\n");
        }
    }
    
    
    
    /**
     * The default action - show the home page
     */
    public function viewEmailsAction() {
        try {
            $objClientService = new Base_Model_Lib_Client_Service_Client();
            $clientId = $this->_request->getParam('id');
            $clientInfo = $objClientService->getClient($clientId);
            $this->view->clientInfo = $clientInfo;

            
            $currentUserId = $clientId;
            $objPaggination = new Base_Model_Lib_Ext_Paggination();

            $objMailLogService = new Base_Model_Lib_Mail_Service_EmailLog();
            $objMailLogEntity = new Base_Model_Lib_Mail_Entity_EmailLog();

            $objMailLogEntity->setUserid($currentUserId);
            $objMailLogService->emailLog = $objMailLogEntity;

            $totalResult = $objMailLogService->searchCount();
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
            $result = $objMailLogService->search($limit);
            $this->view->maillogs = $result;
            $this->view->paggination = $objPaggination;

            $this->view->pageNum = $page;

           
        } catch (Exception $ex) {
            throw new Exception('<ERROR>' . $ex->getMessage() . "\n");
        }
    }
    
    
    
    /**
     * The default action - show the home page
     */
    public function viewNotesAction() {
        try {
            $objClientService = new Base_Model_Lib_Client_Service_Client();
            $clientId = $this->_request->getParam('id');
            $clientInfo = $objClientService->getClient($clientId);
            $this->view->clientInfo = $clientInfo;

          
        } catch (Exception $ex) {
            throw new Exception('<ERROR>' . $ex->getMessage() . "\n");
        }
    }
    
    
    /**
     * The default action - show the home page
     */
    public function viewLogsAction() {
        try {
            $objClientService = new Base_Model_Lib_Client_Service_Client();
            $clientId = $this->_request->getParam('id');
            $clientInfo = $objClientService->getClient($clientId);
            $this->view->clientInfo = $clientInfo;

          
        } catch (Exception $ex) {
            throw new Exception('<ERROR>' . $ex->getMessage() . "\n");
        }
    }
    
    
       /**
     * The default action - show the home page
     */
    public function searchAction() {
        try {
            $pageHeading = "Search-Customer";
            $this->view->page_heading = $pageHeading;
            $this->view->data_page = "forms";
            
        } catch (Exception $ex) {
            throw new Exception('<ERROR>' . $ex->getMessage() . "\n");
        }
    }

}