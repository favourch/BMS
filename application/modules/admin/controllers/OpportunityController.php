<?php

class Admin_OpportunityController extends Base_Model_ObtorLib_App_Admin_Controller {

    public function init() {
        parent::init();
    }

    /**
     * The default action - show the home page
     */
    public function indexAction() {
        try {
            $pageHeading = "Test";
            $this->view->page_heading = $pageHeading;
            $this->view->data_page = "tables";
              
                
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
//opportunity

                $id = $this->_request->getParam('txtId');
                $potentialNo = $this->_request->getParam('txtPotentialNo');
                $relatedTo = $this->_request->getParam('txtRelatedTo');
                $potentialName = $this->_request->getParam('txtPotentialName');
                $amount = $this->_request->getParam('txtAmount');
                $currency = $this->_request->getParam('txtCurrency');
                $closingdate = $this->_request->getParam('txt');
                $typeOfRevenue = $this->_request->getParam('txtTypeOfRevenue');
                $nextStep = $this->_request->getParam('txtNextStep');
                $isPrivate = $this->_request->getParam('txtIsPrivate');
                $probability = $this->_request->getParam('txtProbability');
                $campaignId = $this->_request->getParam('txtCampaignId');
                $salesStage = $this->_request->getParam('txtSalesStage');
                $potentialType = $this->_request->getParam('txtPotentialType');
                $leadSource = $this->_request->getParam('txtLeadSource');
                $productId = $this->_request->getParam('txtProductId');
                $productVersion = $this->_request->getParam('txtProductVersion');
                $quotationRef = $this->_request->getParam('txtQuotationRef');
                $partnerContact = $this->_request->getParam('txtPartnerContact');
                $remarks = $this->_request->getParam('txtRemarks');
                $runtimeFee = $this->_request->getParam('txtRuntimeFee');
                $followupDate = $this->_request->getParam('txtFollowupDate');
                $evaluationStatus = $this->_request->getParam('txtEvaluationStatus');
                $description = $this->_request->getParam('txtDescription');
                $forecastCategory = $this->_request->getParam('txtForecastCategory');
                $outComeanalysis = $this->_request->getParam('txtOutComeanalysis');
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
