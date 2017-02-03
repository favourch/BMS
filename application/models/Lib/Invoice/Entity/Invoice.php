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
class Base_Model_Lib_Invoice_Entity_Invoice {

	//declare variables...
	private $id;
        private $client;
        private $invoiceNum;
        private $date;
        private $dueDate;
        private $datePaid;
        private $subTotal;
        private $credit;
        private $tax;
        private $tax2;
        private $total;
        private $taxrate;
        private $taxrate2;
        private $status;
        private $paymentmethod;
        private $notes;
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

        public function getInvoiceNum() {
            return $this->invoiceNum;
        }

        public function setInvoiceNum($invoiceNum) {
            $this->invoiceNum = $invoiceNum;
        }

        public function getDate() {
            return $this->date;
        }

        public function setDate($date) {
            $this->date = $date;
        }

        public function getDueDate() {
            return $this->dueDate;
        }

        public function setDueDate($dueDate) {
            $this->dueDate = $dueDate;
        }

        public function getDatePaid() {
            return $this->datePaid;
        }

        public function setDatePaid($datePaid) {
            $this->datePaid = $datePaid;
        }

        public function getSubTotal() {
            return $this->subTotal;
        }

        public function setSubTotal($subTotal) {
            $this->subTotal = $subTotal;
        }

        public function getCredit() {
            return $this->credit;
        }

        public function setCredit($credit) {
            $this->credit = $credit;
        }

        public function getTax() {
            return $this->tax;
        }

        public function setTax($tax) {
            $this->tax = $tax;
        }

        public function getTax2() {
            return $this->tax2;
        }

        public function setTax2($tax2) {
            $this->tax2 = $tax2;
        }

        public function getTotal() {
            return $this->total;
        }

        public function setTotal($total) {
            $this->total = $total;
        }

        public function getTaxrate() {
            return $this->taxrate;
        }

        public function setTaxrate($taxrate) {
            $this->taxrate = $taxrate;
        }

        public function getTaxrate2() {
            return $this->taxrate2;
        }

        public function setTaxrate2($taxrate2) {
            $this->taxrate2 = $taxrate2;
        }

        public function getStatus() {
            return $this->status;
        }

        public function setStatus($status) {
            $this->status = $status;
        }

        public function getPaymentmethod() {
            return $this->paymentmethod;
        }

        public function setPaymentmethod($paymentmethod) {
            $this->paymentmethod = $paymentmethod;
        }

        public function getNotes() {
            return $this->notes;
        }

        public function setNotes($notes) {
            $this->notes = $notes;
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
