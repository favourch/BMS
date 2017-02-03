<?php

/**
 * @namespace       : Base
 * @package         : Model
 * @subpackage 		: Lib.Invoice.Service
 * @name 			: Invoice
 * @author 			: Iyngaran Iyathurai
 * 			  		  Software eng - Bcas R&D
 * 			          E-Mail - Iyngaran55@yahoo.com, Iyngaran@bcas.lk
 *
 * @copyright Copyright (c) 2009 - 2010 BCAS R&D . (http://www.lab.bcasrd.com)
 *
 * Description : The Service class for the Invoice Object
 *
 */
class Base_Model_Lib_Invoice_Service_Invoice extends Base_Model_Lib_Eav_Model_Service {

    const RESULT_PER_PAGE = 20; // the const variable for pagging

    public $invoice;

    /*
     * @name        : getInvoice
     * @Description : The function is to get a invoice information
     * 				  from the database.
     * @param       : $id (Invoice Id)
     * @return      : Base_Model_Lib_Invoice_Entity_Invoice
     */

    public function getItem($id) {
        $invoice = "";
        try {
            $objInvoice = new Base_Model_Lib_Invoice_Dao_Invoice();
            $invoice = $objInvoice->getItem($id);
        } catch (Exception $e) {
            throw new Base_Model_Lib_Invoice_Exception("<strong>Oops !, Error Class name -</strong>  <em>Base_Model_Lib_Invoice_Service_Invoice</em>, <strong>Function -</strong> <em>getInvoice()</em>, <strong>Exception -</strong> <em>" . $e->getMessage() . "</em>");
        }
        return $invoice;
    }

    /*
     * @name        : addInvoice
     * @Description : The function is to add a invoice information
     * 				  to the database.
     * @return      : Integer $last_inserted_id
     */

    public function addInvoice() {
        $last_inserted_id = 0;
        try {

            if (!($this->invoice instanceof Base_Model_Lib_Invoice_Entity_Invoice))
                throw new Base_Model_Lib_Invoice_Exception(" Invoice Entity not intialized");

            $objInvoiceDao = new Base_Model_Lib_Invoice_Dao_Invoice();
            $objInvoiceDao->invoice = $this->invoice;
            $last_inserted_id = $objInvoiceDao->addInvoice();
        } catch (Exception $e) {
            throw new Base_Model_Lib_Invoice_Exception("<strong>Oops !, Error Class name -</strong>  <em>Base_Model_Lib_Invoice_Service_Invoice</em>, <strong>Function -</strong> <em>addInvoice()</em>, <strong>Exception -</strong> <em>" . $e->getMessage() . "</em>");
        }

        return $last_inserted_id;
    }

    /*
     * @name        : updateInvoice
     * @Description : The function is to update/edit a invoice information
     * 				  in the database.
     * @return      : $success true/false
     */

    public function updateInvoice() {
        $success = false;
        try {

            if (!($this->invoice instanceof Base_Model_Lib_Invoice_Entity_Invoice))
                throw new Base_Model_Lib_Invoice_Exception(" Invoice Entity not intialized");

            $objInvoiceDao = new Base_Model_Lib_Invoice_Dao_Invoice();
            $objInvoiceDao->invoice = $this->invoice;
            $success = $objInvoiceDao->updateInvoice();
        } catch (Exception $e) {
            throw new Base_Model_Lib_Invoice_Exception("<strong>Oops !, Error Class name -</strong>  <em>Base_Model_Lib_Invoice_Service_Invoice</em>, <strong>Function -</strong> <em>updateInvoice()</em>, <strong>Exception -</strong> <em>" . $e->getMessage() . "</em>");
        }

        return $success;
    }

    /*
     * @name        : deleteInvoice()
     * @Description : The function is to delete a invoice information
      from the database.
     * @return      : $success true/false
     */

    public function deleteInvoice() {
        $success = false;
        try {

            if (!($this->invoice instanceof Base_Model_Lib_Invoice_Entity_Invoice))
                throw new Base_Model_Lib_Invoice_Exception(" Invoice Entity not intialized");

            $objInvoiceDao = new Base_Model_Lib_Invoice_Dao_Invoice();
            $objInvoiceDao->invoice = $this->invoice;
            $success = $objInvoiceDao->deleteInvoice();
        } catch (Exception $e) {
            throw new Base_Model_Lib_Invoice_Exception("<strong>Oops !, Error Class name -</strong>  <em>Base_Model_Lib_Invoice_Service_Invoice</em>, <strong>Function -</strong> <em>deleteInvoice()</em>, <strong>Exception -</strong> <em>" . $e->getMessage() . "</em>");
        }

        return $success;
    }

    /*
     * @name        : getAll()
     * @Description : The function is to get a invoice information
     * 				  from the database.
     * @param       : $id (Invoice Id)
     * @return      : Base_Model_Lib_Invoice_Entity_Invoice
     */

    public function getAll() {
        $invoice = array();
        try {
            $objInvoice = new Base_Model_Lib_Invoice_Dao_Invoice();
            $invoice = $objInvoice->getAll();
        } catch (Exception $e) {
            throw new Base_Model_Lib_Invoice_Exception("<strong>Oops !, Error Class name -</strong>  <em>Base_Model_Lib_Invoice_Service_Invoice</em>, <strong>Function -</strong> <em>getInvoice()</em>, <strong>Exception -</strong> <em>" . $e->getMessage() . "</em>");
        }
        return $invoice;
    }

    /*
     * @name        : getAllByStatus($invoiceStatus)
     * @Description : The function is to get a invoice information
     * 				  from the database.
     * @param       : $id (Invoice Id)
     * @return      : Base_Model_Lib_Invoice_Entity_Invoice
     */

    public function getAllByStatus($invoiceStatus) {
        $invoice = array();
        try {
            $objInvoice = new Base_Model_Lib_Invoice_Dao_Invoice();
            $invoice = $objInvoice->getAllByStatus($invoiceStatus);
        } catch (Exception $e) {
            throw new Base_Model_Lib_Invoice_Exception("<strong>Oops !, Error Class name -</strong>  <em>Base_Model_Lib_Invoice_Service_Invoice</em>, <strong>Function -</strong> <em>getInvoice()</em>, <strong>Exception -</strong> <em>" . $e->getMessage() . "</em>");
        }
        return $invoice;
    }

    /*
     * @name        : getAllPendingInvoicesToPay($dudate)
     * @Description : The function is to get a invoice information
     * 				  from the database.
     * @param       : $id (Invoice Id)
     * @return      : Base_Model_Lib_Invoice_Entity_Invoice
     */

    public function getAllPendingInvoicesToPay($dudate) {
        $invoice = array();
        try {
            $objInvoice = new Base_Model_Lib_Invoice_Dao_Invoice();
            $invoice = $objInvoice->getAllPendingInvoicesToPay($dudate);
        } catch (Exception $e) {
            throw new Base_Model_Lib_Invoice_Exception("<strong>Oops !, Error Class name -</strong>  <em>Base_Model_Lib_Invoice_Service_Invoice</em>, <strong>Function -</strong> <em>getInvoice()</em>, <strong>Exception -</strong> <em>" . $e->getMessage() . "</em>");
        }
        return $invoice;
    }

    /*
     * @name        : getAllPendingInvoicesToPay($dudate)
     * @Description : The function is to get a invoice information
     * 				  from the database.
     * @param       : $id (Invoice Id)
     * @return      : Base_Model_Lib_Invoice_Entity_Invoice
     */

    public function getAllMyPendingInvoices($clientId) {
        $invoice = array();
        try {
            $objInvoice = new Base_Model_Lib_Invoice_Dao_Invoice();
            $invoice = $objInvoice->getAllMyPendingInvoices($clientId);
        } catch (Exception $e) {
            throw new Base_Model_Lib_Invoice_Exception("<strong>Oops !, Error Class name -</strong>  <em>Base_Model_Lib_Invoice_Service_Invoice</em>, <strong>Function -</strong> <em>getInvoice()</em>, <strong>Exception -</strong> <em>" . $e->getMessage() . "</em>");
        }
        return $invoice;
    }

    /*
     * @name        : updateInvoice
     * @Description : The function is to update/edit a invoice information
     * 				  in the database.
     * @return      : $success true/false
     */

    public function updateInvoiceStatus() {
        $success = false;
        try {

            if (!($this->invoice instanceof Base_Model_Lib_Invoice_Entity_Invoice))
                throw new Base_Model_Lib_Invoice_Exception(" Invoice Entity not intialized");

            $objInvoiceDao = new Base_Model_Lib_Invoice_Dao_Invoice();
            $objInvoiceDao->invoice = $this->invoice;
            $success = $objInvoiceDao->updateInvoiceStatus();
        } catch (Exception $e) {
            throw new Base_Model_Lib_Invoice_Exception("<strong>Oops !, Error Class name -</strong>  <em>Base_Model_Lib_Invoice_Service_Invoice</em>, <strong>Function -</strong> <em>updateInvoice()</em>, <strong>Exception -</strong> <em>" . $e->getMessage() . "</em>");
        }

        return $success;
    }

    /*
     * @name        : search
     * @Description : The function is to search invoice information
     * 				  from the database.
     * @return      : Array Of Base_Model_Lib_Order_Entity_Order
     */

    public function search($limit,$orderBy = null) {
        $invoices = "";
        try {


            if (!($this->invoice instanceof Base_Model_Lib_Invoice_Entity_Invoice))
                throw new Base_Model_Lib_Invoice_Exception(" Invoice Entity not intialized");

            $objInvoiceDao = new Base_Model_Lib_Invoice_Dao_Invoice();
            $objInvoiceDao->invoice = $this->invoice;
            $invoices = $objInvoiceDao->search($limit,$orderBy);
        } catch (Exception $e) {
            throw new Base_Model_Lib_Order_Exception("<strong>Oops !, Error Class name -</strong>  <em>Base_Model_Lib_Order_Service_Order</em>, <strong>Function -</strong> <em>search()</em>, <strong>Exception -</strong> <em>" . $e->getMessage() . "</em>");
        }
        return $invoices;
    }

    /*
     * @name        : search
     * @Description : The function is to search invoice information
     * 				  from the database.
     * @return      : Array Of Base_Model_Lib_Order_Entity_Order
     */

    public function searchCount() {
        $totalInvoices = 0;
        try {


            if (!($this->invoice instanceof Base_Model_Lib_Invoice_Entity_Invoice))
                throw new Base_Model_Lib_Invoice_Exception(" Invoice Entity not intialized");

            $objInvoiceDao = new Base_Model_Lib_Invoice_Dao_Invoice();
            $objInvoiceDao->invoice = $this->invoice;
            $totalInvoices = $objInvoiceDao->searchCount();
        } catch (Exception $e) {
            throw new Base_Model_Lib_Order_Exception("<strong>Oops !, Error Class name -</strong>  <em>Base_Model_Lib_Order_Service_Order</em>, <strong>Function -</strong> <em>search()</em>, <strong>Exception -</strong> <em>" . $e->getMessage() . "</em>");
        }
        return $totalInvoices;
    }

}

?>