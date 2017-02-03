<?php

/**
 * @namespace       : Base
 * @package         : Model
 * @subpackage 		: Lib.InvoiceItem.Service
 * @name 			: InvoiceItem
 * @author 			: Iyngaran Iyathurai
 * 			  		  Software eng - Bcas R&D
 * 			          E-Mail - Iyngaran55@yahoo.com, Iyngaran@bcas.lk
 *
 * @copyright Copyright (c) 2009 - 2010 BCAS R&D . (http://www.lab.bcasrd.com)
 *
 * Description : The Service class for the InvoiceItem Object
 *
 */
class Base_Model_Lib_Invoice_Service_InvoiceItem extends Base_Model_Lib_Eav_Model_Service {

    const RESULT_PER_PAGE = 20; // the const variable for pagging

    public $invoiceItem;

    /*
     * @name        : getInvoiceItem
     * @Description : The function is to get a invoiceItem information
     * 				  from the database.
     * @param       : $id (InvoiceItem Id)
     * @return      : Base_Model_Lib_Invoice_Entity_InvoiceItem
     */

    public function getItem($id) {
        $invoiceItem = "";
        try {
            $objInvoiceItem = new Base_Model_Lib_Invoice_Dao_InvoiceItem();
            $invoiceItem = $objInvoiceItem->getItem($id);
        } catch (Exception $e) {
            throw new Base_Model_Lib_Invoice_Exception("<strong>Oops !, Error Class name -</strong>  <em>Base_Model_Lib_Invoice_Service_InvoiceItem</em>, <strong>Function -</strong> <em>getInvoiceItem()</em>, <strong>Exception -</strong> <em>" . $e->getMessage() . "</em>");
        }
        return $invoiceItem;
    }

    /*
     * @name        : addInvoiceItem
     * @Description : The function is to add a invoiceItem information
     * 				  to the database.
     * @return      : Integer $last_inserted_id
     */

    public function addInvoiceItem() {
        $last_inserted_id = 0;
        try {

            if (!($this->invoiceItem instanceof Base_Model_Lib_Invoice_Entity_InvoiceItem))
                throw new Base_Model_Lib_Invoice_Exception(" InvoiceItem Entity not intialized");

            $objInvoiceItemDao = new Base_Model_Lib_Invoice_Dao_InvoiceItem();
            $objInvoiceItemDao->invoiceItem = $this->invoiceItem;
            $last_inserted_id = $objInvoiceItemDao->addInvoiceItem();
        } catch (Exception $e) {
            throw new Base_Model_Lib_Invoice_Exception("<strong>Oops !, Error Class name -</strong>  <em>Base_Model_Lib_Invoice_Service_InvoiceItem</em>, <strong>Function -</strong> <em>addInvoiceItem()</em>, <strong>Exception -</strong> <em>" . $e->getMessage() . "</em>");
        }

        return $last_inserted_id;
    }

    /*
     * @name        : updateInvoiceItem
     * @Description : The function is to update/edit a invoiceItem information
     * 				  in the database.
     * @return      : $success true/false
     */

    public function updateInvoiceItem() {
        $success = false;
        try {

            if (!($this->invoiceItem instanceof Base_Model_Lib_Invoice_Entity_InvoiceItem))
                throw new Base_Model_Lib_Invoice_Exception(" InvoiceItem Entity not intialized");

            $objInvoiceItemDao = new Base_Model_Lib_Invoice_Dao_InvoiceItem();
            $objInvoiceItemDao->invoiceItem = $this->invoiceItem;
            $success = $objInvoiceItemDao->updateInvoiceItem();
        } catch (Exception $e) {
            throw new Base_Model_Lib_Invoice_Exception("<strong>Oops !, Error Class name -</strong>  <em>Base_Model_Lib_Invoice_Service_InvoiceItem</em>, <strong>Function -</strong> <em>updateInvoiceItem()</em>, <strong>Exception -</strong> <em>" . $e->getMessage() . "</em>");
        }

        return $success;
    }

    /*
     * @name        : deleteInvoiceItem()
     * @Description : The function is to delete a invoiceItem information
      from the database.
     * @return      : $success true/false
     */

    public function deleteInvoiceItem() {
        $success = false;
        try {

            if (!($this->invoiceItem instanceof Base_Model_Lib_Invoice_Entity_InvoiceItem))
                throw new Base_Model_Lib_Invoice_Exception(" InvoiceItem Entity not intialized");

            $objInvoiceItemDao = new Base_Model_Lib_Invoice_Dao_InvoiceItem();
            $objInvoiceItemDao->invoiceItem = $this->invoiceItem;
            $success = $objInvoiceItemDao->deleteInvoiceItem();
        } catch (Exception $e) {
            throw new Base_Model_Lib_Invoice_Exception("<strong>Oops !, Error Class name -</strong>  <em>Base_Model_Lib_Invoice_Service_InvoiceItem</em>, <strong>Function -</strong> <em>deleteInvoiceItem()</em>, <strong>Exception -</strong> <em>" . $e->getMessage() . "</em>");
        }

        return $success;
    }
    
    
    /*
     * @name        : getAll()
     * @Description : The function is to get a invoiceItem information
     * 				  from the database.
     * @param       : $id (InvoiceItem Id)
     * @return      : Base_Model_Lib_Invoice_Entity_InvoiceItem
     */

    public function getAll() {
        $invoiceItem = array();
        try {
            $objInvoiceItem = new Base_Model_Lib_Invoice_Dao_InvoiceItem();
            $invoiceItem = $objInvoiceItem->getAll();
        } catch (Exception $e) {
            throw new Base_Model_Lib_Invoice_Exception("<strong>Oops !, Error Class name -</strong>  <em>Base_Model_Lib_Invoice_Service_InvoiceItem</em>, <strong>Function -</strong> <em>getInvoiceItem()</em>, <strong>Exception -</strong> <em>" . $e->getMessage() . "</em>");
        }
        return $invoiceItem;
    }
    
    
    /*
     * @name        : getAllByInvoiceId($invoiceId)
     * @Description : The function is to get a invoiceItem information
     * 				  from the database.
     * @param       : $id (InvoiceItem Id)
     * @return      : Base_Model_Lib_Invoice_Entity_InvoiceItem
     */

    public function getAllByInvoiceId($invoiceId) {
        $invoiceItem = array();
        try {
            $objInvoiceItem = new Base_Model_Lib_Invoice_Dao_InvoiceItem();
            $invoiceItem = $objInvoiceItem->getAllByInvoiceId($invoiceId);
        } catch (Exception $e) {
            throw new Base_Model_Lib_Invoice_Exception("<strong>Oops !, Error Class name -</strong>  <em>Base_Model_Lib_Invoice_Service_InvoiceItem</em>, <strong>Function -</strong> <em>getInvoiceItem()</em>, <strong>Exception -</strong> <em>" . $e->getMessage() . "</em>");
        }
        return $invoiceItem;
    }
    
    
       /*
     * @name        : getAllByInvoiceId($invoiceId)
     * @Description : The function is to get a invoiceItem information
     * 				  from the database.
     * @param       : $id (InvoiceItem Id)
     * @return      : Base_Model_Lib_Invoice_Entity_InvoiceItem
     */

    public function getAllHostingByInvoiceId($invoiceId) {
        $invoiceItem = array();
        try {
            $objInvoiceItem = new Base_Model_Lib_Invoice_Dao_InvoiceItem();
            $invoiceItem = $objInvoiceItem->getAllHostingByInvoiceId($invoiceId);
        } catch (Exception $e) {
            throw new Base_Model_Lib_Invoice_Exception("<strong>Oops !, Error Class name -</strong>  <em>Base_Model_Lib_Invoice_Service_InvoiceItem</em>, <strong>Function -</strong> <em>getInvoiceItem()</em>, <strong>Exception -</strong> <em>" . $e->getMessage() . "</em>");
        }
        return $invoiceItem;
    }
    
    
    /*
     * @name        : updateInvoiceItem
     * @Description : The function is to update/edit a invoiceItem information
     * 				  in the database.
     * @return      : $success true/false
     */

    public function updateInvoiceItemInfo() {
        $success = false;
        try {

            if (!($this->invoiceItem instanceof Base_Model_Lib_Invoice_Entity_InvoiceItem))
                throw new Base_Model_Lib_Invoice_Exception(" InvoiceItem Entity not intialized");

            $objInvoiceItemDao = new Base_Model_Lib_Invoice_Dao_InvoiceItem();
            $objInvoiceItemDao->invoiceItem = $this->invoiceItem;
            $success = $objInvoiceItemDao->updateInvoiceItemInfo();
        } catch (Exception $e) {
            throw new Base_Model_Lib_Invoice_Exception("<strong>Oops !, Error Class name -</strong>  <em>Base_Model_Lib_Invoice_Service_InvoiceItem</em>, <strong>Function -</strong> <em>updateInvoiceItem()</em>, <strong>Exception -</strong> <em>" . $e->getMessage() . "</em>");
        }

        return $success;
    }
    
    
     /*
     * @name        : updateInvoiceItem
     * @Description : The function is to update/edit a invoiceItem information
     * 				  in the database.
     * @return      : $success true/false
     */

    public function addInvoiceItemInfo() {
        $success = false;
        try {

            if (!($this->invoiceItem instanceof Base_Model_Lib_Invoice_Entity_InvoiceItem))
                throw new Base_Model_Lib_Invoice_Exception(" InvoiceItem Entity not intialized");

            $objInvoiceItemDao = new Base_Model_Lib_Invoice_Dao_InvoiceItem();
            $objInvoiceItemDao->invoiceItem = $this->invoiceItem;
            $success = $objInvoiceItemDao->addInvoiceItemInfo();
        } catch (Exception $e) {
            throw new Base_Model_Lib_Invoice_Exception("<strong>Oops !, Error Class name -</strong>  <em>Base_Model_Lib_Invoice_Service_InvoiceItem</em>, <strong>Function -</strong> <em>updateInvoiceItem()</em>, <strong>Exception -</strong> <em>" . $e->getMessage() . "</em>");
        }

        return $success;
    }
    
}
?>