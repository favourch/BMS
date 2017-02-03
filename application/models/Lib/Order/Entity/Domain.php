<?php
/**
 * @namespace       : Base
 * @package         : Model
 * @subpackage 		: Lib.Order.Entity
 * @name 			: Order
 * @author 			: Iyngaran Iyathurai
 * 			  		  Software eng - Monara IT (LTD) PVT
 * 			          E-Mail - Iyngaran55@yahoo.com, Iyngaran@bcas.lk
 *
 * @copyright Copyright (c) 2009 - 2010 Monara IT (LTD) PVT . (http://www.pluspro.com/)
 *
 * @Created on     	: 28-11-2010
 * @Modified on     : 28-11-2010
 *
 */
class Base_Model_Lib_Order_Entity_Domain {

    private $id; 	
    private $client; 	
    private $order; 	
    private $type; 	
    private $registrationdate;	
    private $domain; 	
    private $firstpaymentamount; 	
    private $recurringamount; 	
    private $registrar; 	
    private $registrationperiod; 	
    private $expirydate; 	
    private $subscriptionid; 	
    private $promoid; 	
    private $status; 	
    private $nextduedate; 	
    private $nextinvoicedate; 	
    private $additionalnotes; 	
    private $paymentmethod; 	
    private $dnsmanagement; 	
    private $emailforwarding; 	
    private $idprotection; 	
    private $donotrenew; 	
    private $reminders; 	
    private $synced;
    private $registrarLock;
    private $defaultNameServer;
    private $nameServer1;
    private $nameServer2;
    private $nameServer3;
    private $nameServer4;
    private $nameServer5;
    private $ePPCode;
     private $startDate;
        private $endDate;


    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function getClient() {
        return $this->client;
    }

    public function setClient($client) {
        $this->client = $client;
    }

    public function getOrder() {
        return $this->order;
    }

    public function setOrder($order) {
        $this->order = $order;
    }

    public function getType() {
        return $this->type;
    }

    public function setType($type) {
        $this->type = $type;
    }

    public function getRegistrationdate() {
        return $this->registrationdate;
    }

    public function setRegistrationdate($registrationdate) {
        $this->registrationdate = $registrationdate;
    }

    public function getDomain() {
        return $this->domain;
    }

    public function setDomain($domain) {
        $this->domain = $domain;
    }

    public function getFirstpaymentamount() {
        return $this->firstpaymentamount;
    }

    public function setFirstpaymentamount($firstpaymentamount) {
        $this->firstpaymentamount = $firstpaymentamount;
    }

    public function getRecurringamount() {
        return $this->recurringamount;
    }

    public function setRecurringamount($recurringamount) {
        $this->recurringamount = $recurringamount;
    }

    public function getRegistrar() {
        return $this->registrar;
    }

    public function setRegistrar($registrar) {
        $this->registrar = $registrar;
    }

    public function getRegistrationperiod() {
        return $this->registrationperiod;
    }

    public function setRegistrationperiod($registrationperiod) {
        $this->registrationperiod = $registrationperiod;
    }

    public function getExpirydate() {
        return $this->expirydate;
    }

    public function setExpirydate($expirydate) {
        $this->expirydate = $expirydate;
    }

    public function getSubscriptionid() {
        return $this->subscriptionid;
    }

    public function setSubscriptionid($subscriptionid) {
        $this->subscriptionid = $subscriptionid;
    }

    public function getPromoid() {
        return $this->promoid;
    }

    public function setPromoid($promoid) {
        $this->promoid = $promoid;
    }

    public function getStatus() {
        return $this->status;
    }

    public function setStatus($status) {
        $this->status = $status;
    }

    public function getNextduedate() {
        return $this->nextduedate;
    }

    public function setNextduedate($nextduedate) {
        $this->nextduedate = $nextduedate;
    }

    public function getNextinvoicedate() {
        return $this->nextinvoicedate;
    }

    public function setNextinvoicedate($nextinvoicedate) {
        $this->nextinvoicedate = $nextinvoicedate;
    }

    public function getAdditionalnotes() {
        return $this->additionalnotes;
    }

    public function setAdditionalnotes($additionalnotes) {
        $this->additionalnotes = $additionalnotes;
    }

    public function getPaymentmethod() {
        return $this->paymentmethod;
    }

    public function setPaymentmethod($paymentmethod) {
        $this->paymentmethod = $paymentmethod;
    }

    public function getDnsmanagement() {
        return $this->dnsmanagement;
    }

    public function setDnsmanagement($dnsmanagement) {
        $this->dnsmanagement = $dnsmanagement;
    }

    public function getEmailforwarding() {
        return $this->emailforwarding;
    }

    public function setEmailforwarding($emailforwarding) {
        $this->emailforwarding = $emailforwarding;
    }

    public function getIdprotection() {
        return $this->idprotection;
    }

    public function setIdprotection($idprotection) {
        $this->idprotection = $idprotection;
    }

    public function getDonotrenew() {
        return $this->donotrenew;
    }

    public function setDonotrenew($donotrenew) {
        $this->donotrenew = $donotrenew;
    }

    public function getReminders() {
        return $this->reminders;
    }

    public function setReminders($reminders) {
        $this->reminders = $reminders;
    }

    public function getSynced() {
        return $this->synced;
    }

    public function setSynced($synced) {
        $this->synced = $synced;
    }


    public function getRegistrarLock() {
        return $this->registrarLock;
    }

    public function setRegistrarLock($registrarLock) {
        $this->registrarLock = $registrarLock;
    }

    public function getDefaultNameServer() {
        return $this->defaultNameServer;
    }

    public function setDefaultNameServer($defaultNameServer) {
        $this->defaultNameServer = $defaultNameServer;
    }

    public function getNameServer1() {
        return $this->nameServer1;
    }

    public function setNameServer1($nameServer1) {
        $this->nameServer1 = $nameServer1;
    }

    public function getNameServer2() {
        return $this->nameServer2;
    }

    public function setNameServer2($nameServer2) {
        $this->nameServer2 = $nameServer2;
    }

    public function getNameServer3() {
        return $this->nameServer3;
    }

    public function setNameServer3($nameServer3) {
        $this->nameServer3 = $nameServer3;
    }

    public function getNameServer4() {
        return $this->nameServer4;
    }

    public function setNameServer4($nameServer4) {
        $this->nameServer4 = $nameServer4;
    }

    public function getNameServer5() {
        return $this->nameServer5;
    }

    public function setNameServer5($nameServer5) {
        $this->nameServer5 = $nameServer5;
    }
    public function getEPPCode() {
        return $this->ePPCode;
    }

    public function setEPPCode($ePPCode) {
        $this->ePPCode = $ePPCode;
    }

    public function getStartDate() {
        return $this->startDate;
    }

    public function setStartDate($startDate) {
        $this->startDate = $startDate;
    }

    public function getEndDate() {
        return $this->endDate;
    }

    public function setEndDate($endDate) {
        $this->endDate = $endDate;
    }



}
?>
