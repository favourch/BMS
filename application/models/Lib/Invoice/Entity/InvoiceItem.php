<?php
/**
 * @namespace       : Base
 * @package         : Model
 * @subpackage 		: Lib.Invoice.InvoiceItem
 * @name 			: InvoiceItem
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
class Base_Model_Lib_Invoice_Entity_InvoiceItem {

	//declare variables...
	private $id;
        private $invoice;
        private $client;
        private $type;
        private $relid;
        private $description;
        private $amount;
        private $taxed;
        private $duedate;
        private $paymentmethod;
        private $notes;
        
        public function getId() {
            return $this->id;
        }

        public function setId($id) {
            $this->id = $id;
        }

        public function getInvoice() {
            return $this->invoice;
        }

        public function setInvoice($invoice) {
            $this->invoice = $invoice;
        }

        public function getClient() {
            return $this->client;
        }

        public function setClient($client) {
            $this->client = $client;
        }

        public function getType() {
            return $this->type;
        }

        public function setType($type) {
            $this->type = $type;
        }

        public function getRelid() {
            return $this->relid;
        }

        public function setRelid($relid) {
            $this->relid = $relid;
        }

        public function getDescription() {
            return $this->description;
        }

        public function setDescription($description) {
            $this->description = $description;
        }

        public function getAmount() {
            return $this->amount;
        }

        public function setAmount($amount) {
            $this->amount = $amount;
        }

        public function getTaxed() {
            return $this->taxed;
        }

        public function setTaxed($taxed) {
            $this->taxed = $taxed;
        }

        public function getDuedate() {
            return $this->duedate;
        }

        public function setDuedate($duedate) {
            $this->duedate = $duedate;
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


        
}
?>
