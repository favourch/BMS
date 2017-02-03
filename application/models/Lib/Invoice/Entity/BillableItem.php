<?php
/**
 * @namespace       : Base
 * @package         : Model
 * @subpackage 		: Lib.Invoice.BillableItem
 * @name 			: BillableItem
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
class Base_Model_Lib_Invoice_Entity_BillableItem {

	//declare variables...
	private $id;
        private $client;
        private $description;
        private $hours;
        private $amount;
        private $recur;
        private $recurcycle;
        private $recurfor;
        private $invoiceaction;
        private $duedate;
        private $invoicecount;
        private $orderProduct;
        private $invoiceId;
        
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

        public function getDescription() {
            return $this->description;
        }

        public function setDescription($description) {
            $this->description = $description;
        }

        public function getHours() {
            return $this->hours;
        }

        public function setHours($hours) {
            $this->hours = $hours;
        }

        public function getAmount() {
            return $this->amount;
        }

        public function setAmount($amount) {
            $this->amount = $amount;
        }

        public function getRecur() {
            return $this->recur;
        }

        public function setRecur($recur) {
            $this->recur = $recur;
        }

        public function getRecurcycle() {
            return $this->recurcycle;
        }

        public function setRecurcycle($recurcycle) {
            $this->recurcycle = $recurcycle;
        }

        public function getRecurfor() {
            return $this->recurfor;
        }

        public function setRecurfor($recurfor) {
            $this->recurfor = $recurfor;
        }

        public function getInvoiceaction() {
            return $this->invoiceaction;
        }

        public function setInvoiceaction($invoiceaction) {
            $this->invoiceaction = $invoiceaction;
        }

        public function getDuedate() {
            return $this->duedate;
        }

        public function setDuedate($duedate) {
            $this->duedate = $duedate;
        }

        public function getInvoicecount() {
            return $this->invoicecount;
        }

        public function setInvoicecount($invoicecount) {
            $this->invoicecount = $invoicecount;
        }

        public function getOrderProduct() {
            return $this->orderProduct;
        }

        public function setOrderProduct($orderProduct) {
            $this->orderProduct = $orderProduct;
        }

        public function getInvoiceId() {
            return $this->invoiceId;
        }

        public function setInvoiceId($invoiceId) {
            $this->invoiceId = $invoiceId;
        }


}
?>
