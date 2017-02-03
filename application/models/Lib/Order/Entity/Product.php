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
class Base_Model_Lib_Order_Entity_Product {

    private $id;
    private $client;
    private $order;
    private $product;
    private $server;
    private $regdate;
    private $domain;
    private $paymentMethod;
    private $firstPaymentAmount;
    private $amount;
    private $billingCycle;
    private $nextDueDate;
    private $nextInvoiceDate;
    private $domainStatus;
    private $username;
    private $password;
    private $notes;
    private $subscription;
    private $promotionCode;
    private $suspendreason;
    private $overideautosuspend;
    private $overidesuspenduntil;
    private $dedicatedIp;
    private $assignedIps;
    private $ns1;
    private $ns2;
    private $diskusage;
    private $disklimit;
    private $bwusage;
    private $bwlimit;
    private $lastupdate;
    private $cPanelPackage;
    private $hasAdmin;
    
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

    public function getProduct() {
        return $this->product;
    }

    public function setProduct($product) {
        $this->product = $product;
    }

    public function getServer() {
        return $this->server;
    }

    public function setServer($server) {
        $this->server = $server;
    }

    public function getRegdate() {
        return $this->regdate;
    }

    public function setRegdate($regdate) {
        $this->regdate = $regdate;
    }

    public function getDomain() {
        return $this->domain;
    }

    public function setDomain($domain) {
        $this->domain = $domain;
    }

    public function getPaymentMethod() {
        return $this->paymentMethod;
    }

    public function setPaymentMethod($paymentMethod) {
        $this->paymentMethod = $paymentMethod;
    }

    public function getFirstPaymentAmount() {
        return $this->firstPaymentAmount;
    }

    public function setFirstPaymentAmount($firstPaymentAmount) {
        $this->firstPaymentAmount = $firstPaymentAmount;
    }

    public function getAmount() {
        return $this->amount;
    }

    public function setAmount($amount) {
        $this->amount = $amount;
    }

    public function getBillingCycle() {
        return $this->billingCycle;
    }

    public function setBillingCycle($billingCycle) {
        $this->billingCycle = $billingCycle;
    }

    public function getNextDueDate() {
        return $this->nextDueDate;
    }

    public function setNextDueDate($nextDueDate) {
        $this->nextDueDate = $nextDueDate;
    }

    public function getNextInvoiceDate() {
        return $this->nextInvoiceDate;
    }

    public function setNextInvoiceDate($nextInvoiceDate) {
        $this->nextInvoiceDate = $nextInvoiceDate;
    }

    public function getDomainStatus() {
        return $this->domainStatus;
    }

    public function setDomainStatus($domainStatus) {
        $this->domainStatus = $domainStatus;
    }

    public function getUsername() {
        return $this->username;
    }

    public function setUsername($username) {
        $this->username = $username;
    }

    public function getPassword() {
        return $this->password;
    }

    public function setPassword($password) {
        $this->password = $password;
    }

    public function getNotes() {
        return $this->notes;
    }

    public function setNotes($notes) {
        $this->notes = $notes;
    }

    public function getSubscription() {
        return $this->subscription;
    }

    public function setSubscription($subscription) {
        $this->subscription = $subscription;
    }

    public function getPromotionCode() {
        return $this->promotionCode;
    }

    public function setPromotionCode($promotionCode) {
        $this->promotionCode = $promotionCode;
    }

    public function getSuspendreason() {
        return $this->suspendreason;
    }

    public function setSuspendreason($suspendreason) {
        $this->suspendreason = $suspendreason;
    }

    public function getOverideautosuspend() {
        return $this->overideautosuspend;
    }

    public function setOverideautosuspend($overideautosuspend) {
        $this->overideautosuspend = $overideautosuspend;
    }

    public function getOveridesuspenduntil() {
        return $this->overidesuspenduntil;
    }

    public function setOveridesuspenduntil($overidesuspenduntil) {
        $this->overidesuspenduntil = $overidesuspenduntil;
    }

    public function getDedicatedIp() {
        return $this->dedicatedIp;
    }

    public function setDedicatedIp($dedicatedIp) {
        $this->dedicatedIp = $dedicatedIp;
    }

    public function getAssignedIps() {
        return $this->assignedIps;
    }

    public function setAssignedIps($assignedIps) {
        $this->assignedIps = $assignedIps;
    }

    public function getNs1() {
        return $this->ns1;
    }

    public function setNs1($ns1) {
        $this->ns1 = $ns1;
    }

    public function getNs2() {
        return $this->ns2;
    }

    public function setNs2($ns2) {
        $this->ns2 = $ns2;
    }

    public function getDiskusage() {
        return $this->diskusage;
    }

    public function setDiskusage($diskusage) {
        $this->diskusage = $diskusage;
    }

    public function getDisklimit() {
        return $this->disklimit;
    }

    public function setDisklimit($disklimit) {
        $this->disklimit = $disklimit;
    }

    public function getBwusage() {
        return $this->bwusage;
    }

    public function setBwusage($bwusage) {
        $this->bwusage = $bwusage;
    }

    public function getBwlimit() {
        return $this->bwlimit;
    }

    public function setBwlimit($bwlimit) {
        $this->bwlimit = $bwlimit;
    }

    public function getLastupdate() {
        return $this->lastupdate;
    }

    public function setLastupdate($lastupdate) {
        $this->lastupdate = $lastupdate;
    }

    public function getCPanelPackage() {
        return $this->cPanelPackage;
    }

    public function setCPanelPackage($cPanelPackage) {
        $this->cPanelPackage = $cPanelPackage;
    }

    public function getHasAdmin() {
        return $this->hasAdmin;
    }

    public function setHasAdmin($hasAdmin) {
        $this->hasAdmin = $hasAdmin;
    }


}
?>
