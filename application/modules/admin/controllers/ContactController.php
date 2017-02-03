<?php

class Admin_ContactController extends Base_Model_ObtorLib_App_Admin_Controller {

    public function init() {
        parent::init();
    }

    /**
     * The default action - show the home page
     */
    public function indexAction() {
        try {
            $pageHeading = "Contacts";
            $this->view->page_heading = $pageHeading;
            $this->view->data_page = "tables";
            
             // get all the contact information...
            $objContactEntity = new Base_Model_ObtorLib_App_Core_Crm_Entity_Contact();
            $objContactService = new Base_Model_ObtorLib_App_Core_Crm_Service_Contact();
            $objContactService->contact = $objContactEntity;
            
            $objPaggination = new Base_Model_ObtorLib_Base_Lib_Paggination();
            $page = $this->_getParam('page', 1);
            $objPaggination->CurrentPage = $page;
            $objPaggination->TotalResults = $objContactService->searchCount();
            $paginationData = $objPaggination->getPaggingData();
            $pageLimit1 = $paginationData['MYSQL_LIMIT1'];
            $pageLimit2 = $paginationData['MYSQL_LIMIT2'];

            $limit = " LIMIT $pageLimit1,$pageLimit2";


            $objContactService->contact = $objContactEntity;
            $contactsInfo = $objContactService->search($limit);
            $this->view->contactInformation = $contactsInfo;
            
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
            $pageHeading = "Add-New-Test";
            $this->view->page_heading = $pageHeading;
            $this->view->data_page = "forms";


            if ($this->_request->isPost()) {
// contacts

                $id = $this->_request->getParam('txtId');
                $contactNo = $this->_request->getParam('txtContactNo');
                $accountId = $this->_request->getParam('txtAccountId');
                $salutation = $this->_request->getParam('txtSalutation');
                $firstName = $this->_request->getParam('txtFirstName');
                $lastName = $this->_request->getParam('txtLastName');
                $emailAddress = $this->_request->getParam('txtEmailAddress');
                $phone = $this->_request->getParam('txtPhone');
                $mobile = $this->_request->getParam('txtMobile');
                $title = $this->_request->getParam('txtTitle');
                $fax = $this->_request->getParam('txtFax');
                $reportsTo = $this->_request->getParam('txtReportsTo');
                $training = $this->_request->getParam('txtTraining');
                $userType = $this->_request->getParam('txtUserType');
                $contactType = $this->_request->getParam('txtContactType');
                $otherEmail = $this->_request->getParam('txtOtherEmail');
                $yahooId = $this->_request->getParam('txtYahooId');
                $donotCall = $this->_request->getParam('txtDonotCall');
                $emailOptOut = $this->_request->getParam('txtEmailOptOut');
                $imageName = $this->_request->getParam('txtImageName');
                $reference = $this->_request->getParam('txtReference');
                $notifyOwner = $this->_request->getParam('txtNotifyOwner');
                
                 $objContactEntity = new Base_Model_ObtorLib_App_Core_Crm_Entity_Contact();
                 $objContactService = new Base_Model_ObtorLib_App_Core_Crm_Service_Contact();

                 $objContactEntity->setContactNo($contactNo);
                 $objContactEntity->setAccountId($accountId);
                 $objContactEntity->setSalutation($salutation);
                 $objContactEntity->setFirstName($firstName);
                 $objContactEntity->setLastName($lastName);
                 $objContactEntity->setEmailAddress($emailAddress);
                 $objContactEntity->setPhone($phone);
                 $objContactEntity->setMobile($mobile);
                 $objContactEntity->setTitle($title);
                 $objContactEntity->setFax($fax);
                 $objContactEntity->setReportsTo($reportsTo);
                 $objContactEntity->setTraining($training);
                 $objContactEntity->setUserType($userType);
                 $objContactEntity->setContactType($contactType);
                 $objContactEntity->setOtherEmail($otherEmail);
                 $objContactEntity->setYahooId($yahooId);
                 $objContactEntity->setDonotCall($donotCall);
                 $objContactEntity->setEmailOptOut($emailOptOut);
                 $objContactEntity->setImageName($imageName);
                 $objContactEntity->setReference($reference);
                 $objContactEntity->setNotifyOwner($notifyOwner);
                 $objContactService->contact = $objContactEntity;
                 
                 $contactId = $objContactService->addContact();
                if ($contactId) {
                    $this->_redirect("/admin/contact/?action-status=updated");
                } else {
                    $this->_redirect("/admin/contact/?action-status=failed");
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
            $pageHeading = "Add-New-Test";
            $this->view->page_heading = $pageHeading;
            $this->view->data_page = "forms";


            $objContactService = new Base_Model_ObtorLib_App_Core_Crm_Service_Contact();
            
            if ($this->_request->isPost()) {
// contacts

                $id = $this->_request->getParam('id');
                $contactNo = $this->_request->getParam('txtContactNo');
                $accountId = $this->_request->getParam('txtAccountId');
                $salutation = $this->_request->getParam('txtSalutation');
                $firstName = $this->_request->getParam('txtFirstName');
                $lastName = $this->_request->getParam('txtLastName');
                $emailAddress = $this->_request->getParam('txtEmailAddress');
                $phone = $this->_request->getParam('txtPhone');
                $mobile = $this->_request->getParam('txtMobile');
                $title = $this->_request->getParam('txtTitle');
                $fax = $this->_request->getParam('txtFax');
                $reportsTo = $this->_request->getParam('txtReportsTo');
                $training = $this->_request->getParam('txtTraining');
                $userType = $this->_request->getParam('txtUserType');
                $contactType = $this->_request->getParam('txtContactType');
                $otherEmail = $this->_request->getParam('txtOtherEmail');
                $yahooId = $this->_request->getParam('txtYahooId');
                $donotCall = $this->_request->getParam('txtDonotCall');
                $emailOptOut = $this->_request->getParam('txtEmailOptOut');
                $imageName = $this->_request->getParam('txtImageName');
                $reference = $this->_request->getParam('txtReference');
                $notifyOwner = $this->_request->getParam('txtNotifyOwner');
                
                 $objContactEntity = new Base_Model_ObtorLib_App_Core_Crm_Entity_Contact();
                 

                 $objContactEntity->setId($id);
                 $objContactEntity->setContactNo($contactNo);
                 $objContactEntity->setAccountId($accountId);
                 $objContactEntity->setSalutation($salutation);
                 $objContactEntity->setFirstName($firstName);
                 $objContactEntity->setLastName($lastName);
                 $objContactEntity->setEmailAddress($emailAddress);
                 $objContactEntity->setPhone($phone);
                 $objContactEntity->setMobile($mobile);
                 $objContactEntity->setTitle($title);
                 $objContactEntity->setFax($fax);
                 $objContactEntity->setReportsTo($reportsTo);
                 $objContactEntity->setTraining($training);
                 $objContactEntity->setUserType($userType);
                 $objContactEntity->setContactType($contactType);
                 $objContactEntity->setOtherEmail($otherEmail);
                 $objContactEntity->setYahooId($yahooId);
                 $objContactEntity->setDonotCall($donotCall);
                 $objContactEntity->setEmailOptOut($emailOptOut);
                 $objContactEntity->setImageName($imageName);
                 $objContactEntity->setReference($reference);
                 $objContactEntity->setNotifyOwner($notifyOwner);
                 $objContactService->contact = $objContactEntity;
                 
                 $isUpdated = $objContactService->updateContact();
                if ($isUpdated) {
                    $this->_redirect("/admin/contact/?action-status=updated");
                } else {
                    $this->_redirect("/admin/contact/?action-status=failed");
                }
                 
                 
            } else {
                 $contactId = $this->_request->getParam('id');
                 $objContactService = new Base_Model_ObtorLib_App_Core_Crm_Service_Contact();
                 $contactInfo    = $objContactService->getContact($contactId);
                 $this->view->contactInfo = $contactInfo;
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
            $pageHeading = "Delete-Contact";
            $this->view->page_heading = $pageHeading;
            $this->view->data_page = "forms";

            // delete contact....
            $contactId = $this->_request->getParam('id');
            $objContactEntity = new Base_Model_ObtorLib_App_Core_Crm_Entity_Contact();
            $objContactService = new Base_Model_ObtorLib_App_Core_Crm_Service_Contact();
            $objContactEntity->setId($contactId);
            $objContactService->contact = $objContactEntity;
            $isDeleted = $objContactService->deleteContact();
            if ($isDeleted) {
        
                $this->_redirect("/admin/contact/?action-status=deleted");
            } else {
                $this->_redirect("/admin/contact/?action-status=failed");
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
            $pageHeading = "View-Test";
            $this->view->page_heading = $pageHeading;
            $this->view->data_page = "forms";

            
        } catch (Exception $ex) {
            throw new Exception('<ERROR>' . $ex->getMessage() . "\n");
        }
    }
    

}
