<?php
/**
 * @namespace       : Base
 * @package         : Model
 * @subpackage 		: Lib.Invoice.Invoice
 * @name 			: Invoice
 * @author 			: Iyngaran Iyathurai
 * 			  		  Software eng - Bcas R&D
 * 			          E-Mail - Iyngaran55@yahoo.com, Iyngaran@bcas.lk
 *
 * @copyright Copyright (c) 2009 - 2010 Jasmin Media . (http://www.jasmin-media.com/)
 *
 * @Created on     	: 11-04-2010
 * @Modified on     : 11-04-2010
 *
 */
class Base_Model_Lib_Invoice_Entity_Transaction {

	//declare variables...
	private $id;
        private $client;
        private $currency;
        private $gateway;
        private $date;
        private $description;
        private $amountIn;
        private $fees;
        private $amountOut;
        private $rate;
        private $transId;
        private $invoiceId;
        private $refundId;
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

        public function getCurrency() {
            return $this->currency;
        }

        public function setCurrency($currency) {
            $this->currency = $currency;
        }

        public function getGateway() {
            return $this->gateway;
        }

        public function setGateway($gateway) {
            $this->gateway = $gateway;
        }

        public function getDate() {
            return $this->date;
        }

        public function setDate($date) {
            $this->date = $date;
        }

        public function getDescription() {
            return $this->description;
        }

        public function setDescription($description) {
            $this->description = $description;
        }

        public function getAmountIn() {
            return $this->amountIn;
        }

        public function setAmountIn($amountIn) {
            $this->amountIn = $amountIn;
        }

        public function getFees() {
            return $this->fees;
        }

        public function setFees($fees) {
            $this->fees = $fees;
        }

        public function getAmountOut() {
            return $this->amountOut;
        }

        public function setAmountOut($amountOut) {
            $this->amountOut = $amountOut;
        }

        public function getRate() {
            return $this->rate;
        }

        public function setRate($rate) {
            $this->rate = $rate;
        }

        public function getTransId() {
            return $this->transId;
        }

        public function setTransId($transId) {
            $this->transId = $transId;
        }

        public function getInvoiceId() {
            return $this->invoiceId;
        }

        public function setInvoiceId($invoiceId) {
            $this->invoiceId = $invoiceId;
        }

        public function getRefundId() {
            return $this->refundId;
        }

        public function setRefundId($refundId) {
            $this->refundId = $refundId;
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
