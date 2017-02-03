<?php

/**
 * Description of Lead
 *
 * @author Iyngaran Iyathurai <iyngaran55@gmail.com>
 */
class Base_Model_ObtorLib_App_Core_Crm_Entity_Lead {

    //put your code here
    private $id;
    private $leadNo;
    private $email;
    private $intrest;
    private $firstName;
    private $salutation;
    private $lastName;
    private $company;
    private $anualRevenue;
    private $industry;
    private $campaign;
    private $rating;
    private $leadstatus;
    private $leadsource;
    private $converted;
    private $designation;
    private $licencekeystatus;
    private $space;
    private $comments;
    private $priority;
    private $demoRequest;
    private $partnerContact;
    private $productVersion;
    private $product;
    private $maildate;
    private $nextStepDate;
    private $fundingSituation;
    private $purpose;
    private $evaluationStatus;
    private $transferdate;
    private $revenueType;
    private $noofEmployees;
    private $yahooId;
    private $assignLeadchk;
    private $assignedTo;
    
    public function getId() {
        return $this->id;
    }

    public function getLeadNo() {
        return $this->leadNo;
    }

    public function getEmail() {
        return $this->email;
    }

    public function getIntrest() {
        return $this->intrest;
    }

    public function getFirstName() {
        return $this->firstName;
    }

    public function getSalutation() {
        return $this->salutation;
    }

    public function getLastName() {
        return $this->lastName;
    }

    public function getCompany() {
        return $this->company;
    }

    public function getAnualRevenue() {
        return $this->anualRevenue;
    }

    public function getIndustry() {
        return $this->industry;
    }

    public function getCampaign() {
        return $this->campaign;
    }

    public function getRating() {
        return $this->rating;
    }

    public function getLeadstatus() {
        return $this->leadstatus;
    }

    public function getLeadsource() {
        return $this->leadsource;
    }

    public function getConverted() {
        return $this->converted;
    }

    public function getDesignation() {
        return $this->designation;
    }

    public function getLicencekeystatus() {
        return $this->licencekeystatus;
    }

    public function getSpace() {
        return $this->space;
    }

    public function getComments() {
        return $this->comments;
    }

    public function getPriority() {
        return $this->priority;
    }

    public function getDemoRequest() {
        return $this->demoRequest;
    }

    public function getPartnerContact() {
        return $this->partnerContact;
    }

    public function getProductVersion() {
        return $this->productVersion;
    }

    public function getProduct() {
        return $this->product;
    }

    public function getMaildate() {
        return $this->maildate;
    }

    public function getNextStepDate() {
        return $this->nextStepDate;
    }

    public function getFundingSituation() {
        return $this->fundingSituation;
    }

    public function getPurpose() {
        return $this->purpose;
    }

    public function getEvaluationStatus() {
        return $this->evaluationStatus;
    }

    public function getTransferdate() {
        return $this->transferdate;
    }

    public function getRevenueType() {
        return $this->revenueType;
    }

    public function getNoofEmployees() {
        return $this->noofEmployees;
    }

    public function getYahooId() {
        return $this->yahooId;
    }

    public function getAssignLeadchk() {
        return $this->assignLeadchk;
    }

    public function getAssignedTo() {
        return $this->assignedTo;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function setLeadNo($leadNo) {
        $this->leadNo = $leadNo;
    }

    public function setEmail($email) {
        $this->email = $email;
    }

    public function setIntrest($intrest) {
        $this->intrest = $intrest;
    }

    public function setFirstName($firstName) {
        $this->firstName = $firstName;
    }

    public function setSalutation($salutation) {
        $this->salutation = $salutation;
    }

    public function setLastName($lastName) {
        $this->lastName = $lastName;
    }

    public function setCompany($company) {
        $this->company = $company;
    }

    public function setAnualRevenue($anualRevenue) {
        $this->anualRevenue = $anualRevenue;
    }

    public function setIndustry($industry) {
        $this->industry = $industry;
    }

    public function setCampaign($campaign) {
        $this->campaign = $campaign;
    }

    public function setRating($rating) {
        $this->rating = $rating;
    }

    public function setLeadstatus($leadstatus) {
        $this->leadstatus = $leadstatus;
    }

    public function setLeadsource($leadsource) {
        $this->leadsource = $leadsource;
    }

    public function setConverted($converted) {
        $this->converted = $converted;
    }

    public function setDesignation($designation) {
        $this->designation = $designation;
    }

    public function setLicencekeystatus($licencekeystatus) {
        $this->licencekeystatus = $licencekeystatus;
    }

    public function setSpace($space) {
        $this->space = $space;
    }

    public function setComments($comments) {
        $this->comments = $comments;
    }

    public function setPriority($priority) {
        $this->priority = $priority;
    }

    public function setDemoRequest($demoRequest) {
        $this->demoRequest = $demoRequest;
    }

    public function setPartnerContact($partnerContact) {
        $this->partnerContact = $partnerContact;
    }

    public function setProductVersion($productVersion) {
        $this->productVersion = $productVersion;
    }

    public function setProduct($product) {
        $this->product = $product;
    }

    public function setMaildate($maildate) {
        $this->maildate = $maildate;
    }

    public function setNextStepDate($nextStepDate) {
        $this->nextStepDate = $nextStepDate;
    }

    public function setFundingSituation($fundingSituation) {
        $this->fundingSituation = $fundingSituation;
    }

    public function setPurpose($purpose) {
        $this->purpose = $purpose;
    }

    public function setEvaluationStatus($evaluationStatus) {
        $this->evaluationStatus = $evaluationStatus;
    }

    public function setTransferdate($transferdate) {
        $this->transferdate = $transferdate;
    }

    public function setRevenueType($revenueType) {
        $this->revenueType = $revenueType;
    }

    public function setNoofEmployees($noofEmployees) {
        $this->noofEmployees = $noofEmployees;
    }

    public function setYahooId($yahooId) {
        $this->yahooId = $yahooId;
    }

    public function setAssignLeadchk($assignLeadchk) {
        $this->assignLeadchk = $assignLeadchk;
    }

    public function setAssignedTo($assignedTo) {
        $this->assignedTo = $assignedTo;
    }


    
    
}