<?php

/**
 * @namespace       : Base
 * @package         : Model
 * @subpackage 		: Lib.User.Entity
 * @name 			: User
 * @author 			: Iyngaran Iyathurai
 * 			  		  Software eng - Bcas R&D
 * 			          E-Mail - Iyngaran55@yahoo.com, Iyngaran@bcas.lk
 * 
 * @copyright Copyright (c) 2009 - 2010 BCAS R&D . (http://www.lab.bcasrd.com)
 * 
 * Description : The entity class for the User Object 
 * 	
 */
class Base_Model_Lib_Client_Entity_Client {

    // declare the user propertise
    private $id;
    private $firstname;
    private $lastname;
    private $companyname;
    private $email;
    private $address1;
    private $address2;
    private $city;
    private $state;
    private $postcode;
    private $country;
    private $phonenumber;
    private $password;
    private $currency;
    private $defaultgateway;
    private $credit;
    private $taxexempt;
    private $latefeeoveride;
    private $overideduenotices;
    private $separateinvoices;
    private $disableautocc;
    private $datecreated;
    private $notes;
    private $billingcid;
    private $securityqid;
    private $securityqans;
    private $groupid;
    private $cardtype;
    private $cardlastfour;
    private $cardnum;
    private $startdate;
    private $expdate;
    private $issuenumber;
    private $bankname;
    private $banktype;
    private $bankcode;
    private $bankacct;
    private $gatewayid;
    private $lastlogin;
    private $ip;
    private $host;
    private $status;
    private $language;
    private $pwresetkey;
    private $pwresetexpiry;
    private $clientStartDate;
    private $clientEndDate;
    
    
    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function getFirstname() {
        return $this->firstname;
    }

    public function setFirstname($firstname) {
        $this->firstname = $firstname;
    }

    public function getLastname() {
        return $this->lastname;
    }

    public function setLastname($lastname) {
        $this->lastname = $lastname;
    }

    public function getCompanyname() {
        return $this->companyname;
    }

    public function setCompanyname($companyname) {
        $this->companyname = $companyname;
    }

    public function getEmail() {
        return $this->email;
    }

    public function setEmail($email) {
        $this->email = $email;
    }

    public function getAddress1() {
        return $this->address1;
    }

    public function setAddress1($address1) {
        $this->address1 = $address1;
    }

    public function getAddress2() {
        return $this->address2;
    }

    public function setAddress2($address2) {
        $this->address2 = $address2;
    }

    public function getCity() {
        return $this->city;
    }

    public function setCity($city) {
        $this->city = $city;
    }

    public function getState() {
        return $this->state;
    }

    public function setState($state) {
        $this->state = $state;
    }

    public function getPostcode() {
        return $this->postcode;
    }

    public function setPostcode($postcode) {
        $this->postcode = $postcode;
    }

    public function getCountry() {
        return $this->country;
    }

    public function setCountry($country) {
        $this->country = $country;
    }

    public function getPhonenumber() {
        return $this->phonenumber;
    }

    public function setPhonenumber($phonenumber) {
        $this->phonenumber = $phonenumber;
    }

    public function getPassword() {
        return $this->password;
    }

    public function setPassword($password) {
        $this->password = $password;
    }

    public function getCurrency() {
        return $this->currency;
    }

    public function setCurrency($currency) {
        $this->currency = $currency;
    }

    public function getDefaultgateway() {
        return $this->defaultgateway;
    }

    public function setDefaultgateway($defaultgateway) {
        $this->defaultgateway = $defaultgateway;
    }

    public function getCredit() {
        return $this->credit;
    }

    public function setCredit($credit) {
        $this->credit = $credit;
    }

    public function getTaxexempt() {
        return $this->taxexempt;
    }

    public function setTaxexempt($taxexempt) {
        $this->taxexempt = $taxexempt;
    }

    public function getLatefeeoveride() {
        return $this->latefeeoveride;
    }

    public function setLatefeeoveride($latefeeoveride) {
        $this->latefeeoveride = $latefeeoveride;
    }

    public function getOverideduenotices() {
        return $this->overideduenotices;
    }

    public function setOverideduenotices($overideduenotices) {
        $this->overideduenotices = $overideduenotices;
    }

    public function getSeparateinvoices() {
        return $this->separateinvoices;
    }

    public function setSeparateinvoices($separateinvoices) {
        $this->separateinvoices = $separateinvoices;
    }

    public function getDisableautocc() {
        return $this->disableautocc;
    }

    public function setDisableautocc($disableautocc) {
        $this->disableautocc = $disableautocc;
    }

    public function getDatecreated() {
        return $this->datecreated;
    }

    public function setDatecreated($datecreated) {
        $this->datecreated = $datecreated;
    }

    public function getNotes() {
        return $this->notes;
    }

    public function setNotes($notes) {
        $this->notes = $notes;
    }

    public function getBillingcid() {
        return $this->billingcid;
    }

    public function setBillingcid($billingcid) {
        $this->billingcid = $billingcid;
    }

    public function getSecurityqid() {
        return $this->securityqid;
    }

    public function setSecurityqid($securityqid) {
        $this->securityqid = $securityqid;
    }

    public function getSecurityqans() {
        return $this->securityqans;
    }

    public function setSecurityqans($securityqans) {
        $this->securityqans = $securityqans;
    }

    public function getGroupid() {
        return $this->groupid;
    }

    public function setGroupid($groupid) {
        $this->groupid = $groupid;
    }

    public function getCardtype() {
        return $this->cardtype;
    }

    public function setCardtype($cardtype) {
        $this->cardtype = $cardtype;
    }

    public function getCardlastfour() {
        return $this->cardlastfour;
    }

    public function setCardlastfour($cardlastfour) {
        $this->cardlastfour = $cardlastfour;
    }

    public function getCardnum() {
        return $this->cardnum;
    }

    public function setCardnum($cardnum) {
        $this->cardnum = $cardnum;
    }

    public function getStartdate() {
        return $this->startdate;
    }

    public function setStartdate($startdate) {
        $this->startdate = $startdate;
    }

    public function getExpdate() {
        return $this->expdate;
    }

    public function setExpdate($expdate) {
        $this->expdate = $expdate;
    }

    public function getIssuenumber() {
        return $this->issuenumber;
    }

    public function setIssuenumber($issuenumber) {
        $this->issuenumber = $issuenumber;
    }

    public function getBankname() {
        return $this->bankname;
    }

    public function setBankname($bankname) {
        $this->bankname = $bankname;
    }

    public function getBanktype() {
        return $this->banktype;
    }

    public function setBanktype($banktype) {
        $this->banktype = $banktype;
    }

    public function getBankcode() {
        return $this->bankcode;
    }

    public function setBankcode($bankcode) {
        $this->bankcode = $bankcode;
    }

    public function getBankacct() {
        return $this->bankacct;
    }

    public function setBankacct($bankacct) {
        $this->bankacct = $bankacct;
    }

    public function getGatewayid() {
        return $this->gatewayid;
    }

    public function setGatewayid($gatewayid) {
        $this->gatewayid = $gatewayid;
    }

    public function getLastlogin() {
        return $this->lastlogin;
    }

    public function setLastlogin($lastlogin) {
        $this->lastlogin = $lastlogin;
    }

    public function getIp() {
        return $this->ip;
    }

    public function setIp($ip) {
        $this->ip = $ip;
    }

    public function getHost() {
        return $this->host;
    }

    public function setHost($host) {
        $this->host = $host;
    }

    public function getStatus() {
        return $this->status;
    }

    public function setStatus($status) {
        $this->status = $status;
    }

    public function getLanguage() {
        return $this->language;
    }

    public function setLanguage($language) {
        $this->language = $language;
    }

    public function getPwresetkey() {
        return $this->pwresetkey;
    }

    public function setPwresetkey($pwresetkey) {
        $this->pwresetkey = $pwresetkey;
    }

    public function getPwresetexpiry() {
        return $this->pwresetexpiry;
    }

    public function setPwresetexpiry($pwresetexpiry) {
        $this->pwresetexpiry = $pwresetexpiry;
    }

    public function getClientStartDate() {
        return $this->clientStartDate;
    }

    public function setClientStartDate($clientStartDate) {
        $this->clientStartDate = $clientStartDate;
    }

    public function getClientEndDate() {
        return $this->clientEndDate;
    }

    public function setClientEndDate($clientEndDate) {
        $this->clientEndDate = $clientEndDate;
    }



}
?>