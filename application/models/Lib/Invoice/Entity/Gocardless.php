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
class Base_Model_Lib_Invoice_Entity_Gocardless {

	//declare variables...
	private $id;
        private $invoiceId;
        private $billcreated;
        private $resourceId;
        private $setupId;
        private $preauthId;
        private $paymentFailed;
        
        public function getId() {
            return $this->id;
        }

        public function setId($id) {
            $this->id = $id;
        }

        public function getInvoiceId() {
            return $this->invoiceId;
        }

        public function setInvoiceId($invoiceId) {
            $this->invoiceId = $invoiceId;
        }

        public function getBillcreated() {
            return $this->billcreated;
        }

        public function setBillcreated($billcreated) {
            $this->billcreated = $billcreated;
        }

        public function getResourceId() {
            return $this->resourceId;
        }

        public function setResourceId($resourceId) {
            $this->resourceId = $resourceId;
        }

        public function getSetupId() {
            return $this->setupId;
        }

        public function setSetupId($setupId) {
            $this->setupId = $setupId;
        }

        public function getPreauthId() {
            return $this->preauthId;
        }

        public function setPreauthId($preauthId) {
            $this->preauthId = $preauthId;
        }

        public function getPaymentFailed() {
            return $this->paymentFailed;
        }

        public function setPaymentFailed($paymentFailed) {
            $this->paymentFailed = $paymentFailed;
        }


}
?>
