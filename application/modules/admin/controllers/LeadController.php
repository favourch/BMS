<?php

class Admin_LeadController extends Base_Model_ObtorLib_App_Admin_Controller {

    public function init() {
        parent::init();
    }

    /**
     * The default action - show the home page
     */
    public function indexAction() {
        try {
            $pageHeading = "Leads";
            $this->view->page_heading = $pageHeading;
            $this->view->data_page = "tables";
            
            // get all the lead information...
            $objLeadEntity = new Base_Model_ObtorLib_App_Core_Crm_Entity_Lead();
            $objLeadService = new Base_Model_ObtorLib_App_Core_Crm_Service_Lead();
            $objLeadService->lead = $objLeadEntity;
            
            $objPaggination = new Base_Model_ObtorLib_Base_Lib_Paggination();
            $page = $this->_getParam('page', 1);
            $objPaggination->CurrentPage = $page;
            $objPaggination->TotalResults = $objLeadService->searchCount();
            $paginationData = $objPaggination->getPaggingData();
            $pageLimit1 = $paginationData['MYSQL_LIMIT1'];
            $pageLimit2 = $paginationData['MYSQL_LIMIT2'];

            $limit = " LIMIT $pageLimit1,$pageLimit2";


            $objLeadService->lead = $objLeadEntity;
            $leadsInfo = $objLeadService->search($limit);
            $this->view->leadInformation = $leadsInfo;
            
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
                // lead....
                $id = $this->_request->getParam('txtId');
                $leadNo = $this->_request->getParam('txtLeadNo');
                $email = $this->_request->getParam('txtEmail');
                $intrest = $this->_request->getParam('txtIntrest');
                $firstName = $this->_request->getParam('txtFirstName');
                $salutation = $this->_request->getParam('txtSalutation');
                $lastName = $this->_request->getParam('txtLastName');
                $company = $this->_request->getParam('txtCompany');
                $anualRevenue = $this->_request->getParam('txtAnualRevenue');
                $industry = $this->_request->getParam('txtIndustry');
                $campaign = $this->_request->getParam('txtCampaign');
                $rating = $this->_request->getParam('txtRating');
                $leadstatus = $this->_request->getParam('txtLeadStatus');
                $leadsource = $this->_request->getParam('txtLeadSource');
                $converted = $this->_request->getParam('txtConverted');
                $designation = $this->_request->getParam('txtDesignation');
                $licencekeystatus = $this->_request->getParam('txtLicencekeystatus');
                $space = $this->_request->getParam('txtSpace');
                $comments = $this->_request->getParam('txtComments');
                $priority = $this->_request->getParam('txtPriority');
                $demoRequest = $this->_request->getParam('txtDemoRequest');
                $partnerContact = $this->_request->getParam('txtPartnerContact');
                $productVersion = $this->_request->getParam('txtProductVersion');
                $product = $this->_request->getParam('txtProduct');
                $maildate = $this->_request->getParam('txtMaildate');
                $nextStepDate = $this->_request->getParam('txtNextStepDate');
                $fundingSituation = $this->_request->getParam('txtFundingSituation');
                $purpose = $this->_request->getParam('txtPurpose');
                $evaluationStatus = $this->_request->getParam('txtEvaluationStatus');
                $transferdate = $this->_request->getParam('txtTransferdate');
                $revenueType = $this->_request->getParam('txtRevenueType');
                $noofEmployees = $this->_request->getParam('txtNoofEmployees');
                $yahooId = $this->_request->getParam('txtYahooId');
                $assignLeadchk = $this->_request->getParam('txtAssignLeadchk');
                $assignedTo = $this->_request->getParam('txtAssignedTo');
                
                $objLeadEntity = new Base_Model_ObtorLib_App_Core_Crm_Entity_Lead();
                $objLeadService = new Base_Model_ObtorLib_App_Core_Crm_Service_Lead();
                $objLeadEntity->setLeadNo($leadNo);
                $objLeadEntity->setEmail($email);
                $objLeadEntity->setIntrest($intrest);
                $objLeadEntity->setFirstName($firstName);
                $objLeadEntity->setSalutation($salutation);
                $objLeadEntity->setLastName($lastName);
                $objLeadEntity->setCompany($company);
                $objLeadEntity->setAnualRevenue($anualRevenue);
                $objLeadEntity->setIndustry($industry);
                $objLeadEntity->setCampaign($campaign);
                $objLeadEntity->setRating($rating);
                $objLeadEntity->setLeadstatus($leadstatus);
                $objLeadEntity->setLeadsource($leadsource);
                $objLeadEntity->setConverted($converted);
                $objLeadEntity->setDesignation($designation);
                $objLeadEntity->setLicencekeystatus($licencekeystatus);
                $objLeadEntity->setSpace($space);
                $objLeadEntity->setComments($comments);
                $objLeadEntity->setPriority($priority);
                $objLeadEntity->setDemoRequest($demoRequest);
                $objLeadEntity->setPartnerContact($partnerContact);
                $objLeadEntity->setProductVersion($productVersion);
                $objLeadEntity->setProduct($product);
                $objLeadEntity->setMaildate($maildate);
                $objLeadEntity->setNextStepDate($nextStepDate);
                $objLeadEntity->setFundingSituation($fundingSituation);
                $objLeadEntity->setPurpose($purpose);
                $objLeadEntity->setEvaluationStatus($evaluationStatus);
                $objLeadEntity->setTransferdate($transferdate);
                $objLeadEntity->setRevenueType($revenueType);
                $objLeadEntity->setNoofEmployees($noofEmployees);
                $objLeadEntity->setYahooId($yahooId);
                $objLeadEntity->setAssignLeadchk($assignLeadchk);
                $objLeadEntity->setAssignedTo($assignedTo);
                $objLeadService->lead = $objLeadEntity;
                $leadId = $objLeadService->addLead();
                if ($leadId) {
                    $this->_redirect("/admin/lead/?action-status=updated");
                } else {
                    $this->_redirect("/admin/lead/?action-status=failed");
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


            $objLeadService = new Base_Model_ObtorLib_App_Core_Crm_Service_Lead();

            if ($this->_request->isPost()) {
                // lead....
                $id = $this->_request->getParam('id');
                $leadNo = $this->_request->getParam('txtLeadNo');
                $email = $this->_request->getParam('txtEmail');
                $intrest = $this->_request->getParam('txtIntrest');
                $firstName = $this->_request->getParam('txtFirstName');
                $salutation = $this->_request->getParam('txtSalutation');
                $lastName = $this->_request->getParam('txtLastName');
                $company = $this->_request->getParam('txtCompany');
                $anualRevenue = $this->_request->getParam('txtAnualRevenue');
                $industry = $this->_request->getParam('txtIndustry');
                $campaign = $this->_request->getParam('txtCampaign');
                $rating = $this->_request->getParam('txtRating');
                $leadstatus = $this->_request->getParam('txtLeadStatus');
                $leadsource = $this->_request->getParam('txtLeadSource');
                $converted = $this->_request->getParam('txtConverted');
                $designation = $this->_request->getParam('txtDesignation');
                $licencekeystatus = $this->_request->getParam('txtLicencekeystatus');
                $space = $this->_request->getParam('txtSpace');
                $comments = $this->_request->getParam('txtComments');
                $priority = $this->_request->getParam('txtPriority');
                $demoRequest = $this->_request->getParam('txtDemoRequest');
                $partnerContact = $this->_request->getParam('txtPartnerContact');
                $productVersion = $this->_request->getParam('txtProductVersion');
                $product = $this->_request->getParam('txtProduct');
                $maildate = $this->_request->getParam('txtMaildate');
                $nextStepDate = $this->_request->getParam('txtNextStepDate');
                $fundingSituation = $this->_request->getParam('txtFundingSituation');
                $purpose = $this->_request->getParam('txtPurpose');
                $evaluationStatus = $this->_request->getParam('txtEvaluationStatus');
                $transferdate = $this->_request->getParam('txtTransferdate');
                $revenueType = $this->_request->getParam('txtRevenueType');
                $noofEmployees = $this->_request->getParam('txtNoofEmployees');
                $yahooId = $this->_request->getParam('txtYahooId');
                $assignLeadchk = $this->_request->getParam('txtAssignLeadchk');
                $assignedTo = $this->_request->getParam('txtAssignedTo');
                
                $objLeadEntity = new Base_Model_ObtorLib_App_Core_Crm_Entity_Lead();
                
                $objLeadEntity->setId($id);
                $objLeadEntity->setLeadNo($leadNo);
                $objLeadEntity->setEmail($email);
                $objLeadEntity->setIntrest($intrest);
                $objLeadEntity->setFirstName($firstName);
                $objLeadEntity->setSalutation($salutation);
                $objLeadEntity->setLastName($lastName);
                $objLeadEntity->setCompany($company);
                $objLeadEntity->setAnualRevenue($anualRevenue);
                $objLeadEntity->setIndustry($industry);
                $objLeadEntity->setCampaign($campaign);
                $objLeadEntity->setRating($rating);
                $objLeadEntity->setLeadstatus($leadstatus);
                $objLeadEntity->setLeadsource($leadsource);
                $objLeadEntity->setConverted($converted);
                $objLeadEntity->setDesignation($designation);
                $objLeadEntity->setLicencekeystatus($licencekeystatus);
                $objLeadEntity->setSpace($space);
                $objLeadEntity->setComments($comments);
                $objLeadEntity->setPriority($priority);
                $objLeadEntity->setDemoRequest($demoRequest);
                $objLeadEntity->setPartnerContact($partnerContact);
                $objLeadEntity->setProductVersion($productVersion);
                $objLeadEntity->setProduct($product);
                $objLeadEntity->setMaildate($maildate);
                $objLeadEntity->setNextStepDate($nextStepDate);
                $objLeadEntity->setFundingSituation($fundingSituation);
                $objLeadEntity->setPurpose($purpose);
                $objLeadEntity->setEvaluationStatus($evaluationStatus);
                $objLeadEntity->setTransferdate($transferdate);
                $objLeadEntity->setRevenueType($revenueType);
                $objLeadEntity->setNoofEmployees($noofEmployees);
                $objLeadEntity->setYahooId($yahooId);
                $objLeadEntity->setAssignLeadchk($assignLeadchk);
                $objLeadEntity->setAssignedTo($assignedTo);
                $objLeadService->lead = $objLeadEntity;
                $isUpdated = $objLeadService->updateLead();
                if ($isUpdated) {
                    $this->_redirect("/admin/lead/?action-status=updated");
                } else {
                    $this->_redirect("/admin/lead/?action-status=failed");
                }
            

            } else {
                
                 $leadId = $this->_request->getParam('id');
                $leadInformation = $objLeadService->getLead($leadId);
                $this->view->leadInformation = $leadInformation;
                
            }

            
        } catch (Exception $ex) {
            throw new Exception('<ERROR>' . $ex->getMessage() . "\n");
        }
    }
    
    
    /**
     * The delete action
     */
    public function deleteAction() {
        try {
            $pageHeading = "Delete-Vacancy";
            $this->view->page_heading = $pageHeading;
            $this->view->data_page = "forms";

            // delete lead....
            $objLeadEntity = new Base_Model_ObtorLib_App_Core_Crm_Entity_Lead();
            $objLeadService = new Base_Model_ObtorLib_App_Core_Crm_Service_Lead();
            $objLeadEntity->setId($this->_request->getParam('id'));
            $objLeadService->lead = $objLeadEntity;
            $isDeleted = $objLeadService->deleteLead();
            if ($isDeleted) {
                $this->_redirect("/admin/lead/?action-status=deleted");
            } else {
                $this->_redirect("/admin/lead/?action-status=failed");
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
    
    /**
     * The add action
     */
    public function uploadAction() {
        try {
            $pageHeading = "Upload-Leads-CSV";
            $this->view->page_heading = $pageHeading;
            $this->view->data_page = "forms";
            
            if ($this->_request->isPost()) {
                $this->_redirect("/admin/lead/?action-status=file-uploaded");
            }

            
        } catch (Exception $ex) {
            throw new Exception('<ERROR>' . $ex->getMessage() . "\n");
        }
    }
    

}
