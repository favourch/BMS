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
class Base_Model_Lib_Order_Entity_Order {

private $id = "";
private $ordernum = "";
private $userId = "";
private $contactId = "";
private $date = "";
private $nameservers = "";
private $transfersecret = "";
private $renewals = "";
private $promocode = "";
private $promotype = "";
private $promovalue = "";
private $orderdata = "";
private $amount = "";
private $paymentmethod = "";
private $invoiceid = "";
private $status = "";
private $ipaddress = "";
private $fraudmodule = "";
private $fraudoutput = "";
private $notes = "";
private $orderProducts;
private $orderdomain;
private $canvasser;
private $salesperson;
private $startDate;
private $endDate;


public function getId() {
    return $this->id;
}

public function setId($id) {
    $this->id = $id;
}

public function getOrdernum() {
    return $this->ordernum;
}

public function setOrdernum($ordernum) {
    $this->ordernum = $ordernum;
}

public function getUserId() {
    return $this->userId;
}

public function setUserId($userId) {
    $this->userId = $userId;
}

public function getContactId() {
    return $this->contactId;
}

public function setContactId($contactId) {
    $this->contactId = $contactId;
}

public function getDate() {
    return $this->date;
}

public function setDate($date) {
    $this->date = $date;
}

public function getNameservers() {
    return $this->nameservers;
}

public function setNameservers($nameservers) {
    $this->nameservers = $nameservers;
}

public function getTransfersecret() {
    return $this->transfersecret;
}

public function setTransfersecret($transfersecret) {
    $this->transfersecret = $transfersecret;
}

public function getRenewals() {
    return $this->renewals;
}

public function setRenewals($renewals) {
    $this->renewals = $renewals;
}

public function getPromocode() {
    return $this->promocode;
}

public function setPromocode($promocode) {
    $this->promocode = $promocode;
}

public function getPromotype() {
    return $this->promotype;
}

public function setPromotype($promotype) {
    $this->promotype = $promotype;
}

public function getPromovalue() {
    return $this->promovalue;
}

public function setPromovalue($promovalue) {
    $this->promovalue = $promovalue;
}

public function getOrderdata() {
    return $this->orderdata;
}

public function setOrderdata($orderdata) {
    $this->orderdata = $orderdata;
}

public function getAmount() {
    return $this->amount;
}

public function setAmount($amount) {
    $this->amount = $amount;
}

public function getPaymentmethod() {
    return $this->paymentmethod;
}

public function setPaymentmethod($paymentmethod) {
    $this->paymentmethod = $paymentmethod;
}

public function getInvoiceid() {
    return $this->invoiceid;
}

public function setInvoiceid($invoiceid) {
    $this->invoiceid = $invoiceid;
}

public function getStatus() {
    return $this->status;
}

public function setStatus($status) {
    $this->status = $status;
}

public function getIpaddress() {
    return $this->ipaddress;
}

public function setIpaddress($ipaddress) {
    $this->ipaddress = $ipaddress;
}

public function getFraudmodule() {
    return $this->fraudmodule;
}

public function setFraudmodule($fraudmodule) {
    $this->fraudmodule = $fraudmodule;
}

public function getFraudoutput() {
    return $this->fraudoutput;
}

public function setFraudoutput($fraudoutput) {
    $this->fraudoutput = $fraudoutput;
}

public function getNotes() {
    return $this->notes;
}

public function setNotes($notes) {
    $this->notes = $notes;
}

public function getOrderProducts() {
    return $this->orderProducts;
}

public function setOrderProducts($orderProducts) {
    $this->orderProducts = $orderProducts;
}
public function getOrderdomain() {
    return $this->orderdomain;
}

public function setOrderdomain($orderdomain) {
    $this->orderdomain = $orderdomain;
}

public function getCanvasser() {
    return $this->canvasser;
}

public function setCanvasser($canvasser) {
    $this->canvasser = $canvasser;
}

public function getSalesperson() {
    return $this->salesperson;
}

public function setSalesperson($salesperson) {
    $this->salesperson = $salesperson;
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
