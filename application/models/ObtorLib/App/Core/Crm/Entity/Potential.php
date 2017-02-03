<?php

/**
 * Description of Potential
 *
 * @author Iyngaran Iyathurai <iyngaran55@gmail.com>
 */
class Base_Model_ObtorLib_App_Core_Crm_Entity_Potential {

    //put your code here
    private $id;
    private $potentialNo;
    private $relatedTo;
    private $potentialName;
    private $amount;
    private $currency;
    private $closingdate;
    private $typeOfRevenue;
    private $nextStep;
    private $isPrivate;
    private $probability;
    private $campaignId;
    private $salesStage;
    private $potentialType;
    private $leadSource;
    private $productId;
    private $productVersion;
    private $quotationRef;
    private $partnerContact;
    private $remarks;
    private $runtimeFee;
    private $followupDate;
    private $evaluationStatus;
    private $description;
    private $forecastCategory;
    private $outComeanalysis;
    
    public function getId() {
        return $this->id;
    }

    public function getPotentialNo() {
        return $this->potentialNo;
    }

    public function getRelatedTo() {
        return $this->relatedTo;
    }

    public function getPotentialName() {
        return $this->potentialName;
    }

    public function getAmount() {
        return $this->amount;
    }

    public function getCurrency() {
        return $this->currency;
    }

    public function getClosingdate() {
        return $this->closingdate;
    }

    public function getTypeOfRevenue() {
        return $this->typeOfRevenue;
    }

    public function getNextStep() {
        return $this->nextStep;
    }

    public function getIsPrivate() {
        return $this->isPrivate;
    }

    public function getProbability() {
        return $this->probability;
    }

    public function getCampaignId() {
        return $this->campaignId;
    }

    public function getSalesStage() {
        return $this->salesStage;
    }

    public function getPotentialType() {
        return $this->potentialType;
    }

    public function getLeadSource() {
        return $this->leadSource;
    }

    public function getProductId() {
        return $this->productId;
    }

    public function getProductVersion() {
        return $this->productVersion;
    }

    public function getQuotationRef() {
        return $this->quotationRef;
    }

    public function getPartnerContact() {
        return $this->partnerContact;
    }

    public function getRemarks() {
        return $this->remarks;
    }

    public function getRuntimeFee() {
        return $this->runtimeFee;
    }

    public function getFollowupDate() {
        return $this->followupDate;
    }

    public function getEvaluationStatus() {
        return $this->evaluationStatus;
    }

    public function getDescription() {
        return $this->description;
    }

    public function getForecastCategory() {
        return $this->forecastCategory;
    }

    public function getOutComeanalysis() {
        return $this->outComeanalysis;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function setPotentialNo($potentialNo) {
        $this->potentialNo = $potentialNo;
    }

    public function setRelatedTo($relatedTo) {
        $this->relatedTo = $relatedTo;
    }

    public function setPotentialName($potentialName) {
        $this->potentialName = $potentialName;
    }

    public function setAmount($amount) {
        $this->amount = $amount;
    }

    public function setCurrency($currency) {
        $this->currency = $currency;
    }

    public function setClosingdate($closingdate) {
        $this->closingdate = $closingdate;
    }

    public function setTypeOfRevenue($typeOfRevenue) {
        $this->typeOfRevenue = $typeOfRevenue;
    }

    public function setNextStep($nextStep) {
        $this->nextStep = $nextStep;
    }

    public function setIsPrivate($isPrivate) {
        $this->isPrivate = $isPrivate;
    }

    public function setProbability($probability) {
        $this->probability = $probability;
    }

    public function setCampaignId($campaignId) {
        $this->campaignId = $campaignId;
    }

    public function setSalesStage($salesStage) {
        $this->salesStage = $salesStage;
    }

    public function setPotentialType($potentialType) {
        $this->potentialType = $potentialType;
    }

    public function setLeadSource($leadSource) {
        $this->leadSource = $leadSource;
    }

    public function setProductId($productId) {
        $this->productId = $productId;
    }

    public function setProductVersion($productVersion) {
        $this->productVersion = $productVersion;
    }

    public function setQuotationRef($quotationRef) {
        $this->quotationRef = $quotationRef;
    }

    public function setPartnerContact($partnerContact) {
        $this->partnerContact = $partnerContact;
    }

    public function setRemarks($remarks) {
        $this->remarks = $remarks;
    }

    public function setRuntimeFee($runtimeFee) {
        $this->runtimeFee = $runtimeFee;
    }

    public function setFollowupDate($followupDate) {
        $this->followupDate = $followupDate;
    }

    public function setEvaluationStatus($evaluationStatus) {
        $this->evaluationStatus = $evaluationStatus;
    }

    public function setDescription($description) {
        $this->description = $description;
    }

    public function setForecastCategory($forecastCategory) {
        $this->forecastCategory = $forecastCategory;
    }

    public function setOutComeanalysis($outComeanalysis) {
        $this->outComeanalysis = $outComeanalysis;
    }



    
}