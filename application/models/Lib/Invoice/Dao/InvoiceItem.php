<?php

/**
 * @namespace       : Base
 * @package         : Model
 * @subpackage 		: Lib.Invoice.Dao
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
class Base_Model_Lib_Invoice_Dao_InvoiceItem extends Zend_Db_Table {

    protected $_name = 'tbl_invoice_items'; // the table name
    protected $_primary = 'id'; // the primary key
    public $invoiceItem;

    /*
     * @name        : getItem
     * @Description : The function is to get a InvoiceItem information
     * 				  from the database.
     * @param       : $id (InvoiceItem Id)
     * @return      : Entity InvoiceItem Object (Base_Model_Lib_Invoice_Entity_InvoiceItem)
     */

    public function getItem($invoiceItemId) {
        $objInvoiceItem = new Base_Model_Lib_Invoice_Entity_InvoiceItem ( );

        try {
            if ($invoiceItemId) {
                $id = (int) $invoiceItemId;
                $row = $this->fetchRow('id = ' . $id);

                if ($row != "") {
                    $result = $row->toArray();
                    $objInvoiceItem->setId($row['id']);
                    $objInvoiceItem->setInvoice($row['tbl_invoice_id']);
                    $objInvoiceItem->setClient($row['tbl_client_id']);
                    $objInvoiceItem->setType($row['type']);
                    $objInvoiceItem->setRelid($row['relid']);
                    $objInvoiceItem->setDescription($row['description']);
                    $objInvoiceItem->setAmount($row['amount']);
                    $objInvoiceItem->setTaxed($row['taxed']);
                    $objInvoiceItem->setDuedate($row['duedate']);
                    $objInvoiceItem->setPaymentmethod($row['paymentmethod']);
                    $objInvoiceItem->setNotes($row['notes']);
                }
            }
        } catch (Exception $e) {
            throw new Base_Model_Lib_Eav_Exception_Sql("<strong>Oops !, Error Class name -</strong>  <em>Base_Model_Lib_Invoice_Dao_InvoiceItem</em>, <strong>Function -</strong> <em>getItem()</em>, <strong>Exception -</strong> <em>" . $e->getMessage() . "</em>");
        }
        return $objInvoiceItem;
    }

    /*
     * @name        : getAll
     * @Description : The function is to get all users information
     * 				  from the database.
     * @return      : Aray Of Entity User Object (Base_Model_Lib_User_Entity_User)
     */

    public function getAll() {
        $invoiceItem = array();

        try {
            $objInvoiceItem = new Base_Model_Lib_Invoice_Entity_InvoiceItem ( );

            $select = $this->select()->from('tbl_invoice_items', array('id'));

            $result = $this->fetchAll($select);

            foreach ($result as $row) {
                $objInvoiceItem = $this->getItem($row->id);
                array_push($invoiceItem, $objInvoiceItem);
            }
        } catch (Exception $e) {
            throw new Base_Model_Lib_Eav_Exception_Sql("<strong>Oops !, Error Class name -</strong>  <em>Base_Model_Lib_User_Entity_User</em>, <strong>Function -</strong> <em>getAll()</em>, <strong>Exception -</strong> <em>" . $e->getMessage() . "</em>");
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

            
            $data = array(
                'tbl_invoice_id' => $this->invoiceItem->getInvoice(),
                'tbl_client_id' => $this->invoiceItem->getClient(),
                'type' => $this->invoiceItem->getType(),
                'relid' => $this->invoiceItem->getRelid(),
                'description' => $this->invoiceItem->getDescription(),
                'amount' => $this->invoiceItem->getAmount(),
                'taxed' => $this->invoiceItem->getTaxed(),
                'duedate' => $this->invoiceItem->getDuedate(),
                'paymentmethod' => $this->invoiceItem->getPaymentmethod(),
                'notes' => $this->invoiceItem->getNotes()
            );

            $last_inserted_id = $this->insert($data);
        } catch (Exception $e) {
            throw new Base_Model_Lib_Eav_Exception_Sql("<strong>Oops !, Error Class name -</strong>  <em>Base_Model_Lib_Invoice_Dao_InvoiceItem</em>, <strong>Function -</strong> <em>addInvoiceItem()</em>, <strong>Exception -</strong> <em>" . $e->getMessage() . "</em>");
        }

        return $last_inserted_id;
    }

    
        /*
     * @name        : updateInvoiceItem
     * @Description : The function is to add a invoiceItem information
     * 				  to the database.
     * @return      : Integer $last_inserted_id
     */

    public function updateInvoiceItem() {
        $success = false;

        try {

            if (!($this->invoiceItem instanceof Base_Model_Lib_Invoice_Entity_InvoiceItem))
                throw new Base_Model_Lib_Invoice_Exception(" InvoiceItem Entity not intialized");

            $data = array(
                'tbl_invoice_id' => $this->invoiceItem->getInvoice(),
                'tbl_client_id' => $this->invoiceItem->getClient(),
                'type' => $this->invoiceItem->getType(),
                'relid' => $this->invoiceItem->getRelid(),
                'description' => $this->invoiceItem->getDescription(),
                'amount' => $this->invoiceItem->getAmount(),
                'taxed' => $this->invoiceItem->getTaxed(),
                'duedate' => $this->invoiceItem->getDuedate(),
                'paymentmethod' => $this->invoiceItem->getPaymentmethod(),
                'notes' => $this->invoiceItem->getNotes()
            );

            $this->update($data, 'id = ' . (int) $this->invoiceItem->getId());
            $success = true;
        } catch (Exception $e) {
            throw new Base_Model_Lib_Eav_Exception_Sql("<strong>Oops !, Error Class name -</strong>  <em>Base_Model_Lib_Invoice_Dao_InvoiceItem</em>, <strong>Function -</strong> <em>addInvoiceItem()</em>, <strong>Exception -</strong> <em>" . $e->getMessage() . "</em>");
        }

        return $success;
    }
    
    
    /*
     * @name        : updateInvoiceItem
     * @Description : The function is to add a invoiceItem information
     * 				  to the database.
     * @return      : Integer $last_inserted_id
     */

    public function deleteInvoiceItem() {
        $success = false;

        try {

            if (!($this->invoiceItem instanceof Base_Model_Lib_Invoice_Entity_InvoiceItem))
                throw new Base_Model_Lib_Invoice_Exception(" InvoiceItem Entity not intialized");

            if ($this->delete('id =' . (int) $this->invoiceItem->getId()) == '1') {
                $success = true;
            }
            
        } catch (Exception $e) {
            throw new Base_Model_Lib_Eav_Exception_Sql("<strong>Oops !, Error Class name -</strong>  <em>Base_Model_Lib_Invoice_Dao_InvoiceItem</em>, <strong>Function -</strong> <em>addInvoiceItem()</em>, <strong>Exception -</strong> <em>" . $e->getMessage() . "</em>");
        }

        return $success;
    }
    
    
      /*
     * @name        : getAllByInvoiceId
     * @Description : The function is to get all users information
     * 				  from the database.
     * @return      : Aray Of Entity User Object (Base_Model_Lib_User_Entity_User)
     */

    public function getAllByInvoiceId($invoiceId) {
        $invoiceItem = array();

        try {
            $objInvoiceItem = new Base_Model_Lib_Invoice_Entity_InvoiceItem ( );

            $select = $this->select()
                    ->from('tbl_invoice_items', array('id'))
                    ->where('tbl_invoice_id = ?', $invoiceId);

            $result = $this->fetchAll($select);

            foreach ($result as $row) {
                $objInvoiceItem = $this->getItem($row->id);
                array_push($invoiceItem, $objInvoiceItem);
            }
        } catch (Exception $e) {
            throw new Base_Model_Lib_Eav_Exception_Sql("<strong>Oops !, Error Class name -</strong>  <em>Base_Model_Lib_User_Entity_User</em>, <strong>Function -</strong> <em>getAll()</em>, <strong>Exception -</strong> <em>" . $e->getMessage() . "</em>");
        }
        return $invoiceItem;
    }
    
    
    
        /*
     * @name        : getAllHostingByInvoiceId
     * @Description : The function is to get all users information
     * 				  from the database.
     * @return      : Aray Of Entity User Object (Base_Model_Lib_User_Entity_User)
     */

    public function getAllHostingByInvoiceId($invoiceId) {
        $invoiceItem = array();

        try {
            $objInvoiceItem = new Base_Model_Lib_Invoice_Entity_InvoiceItem ( );

            $select = $this->select()
                    ->from('tbl_invoice_items', array('id'))
                    ->where('type = ?', 'Hosting')
                    ->where('tbl_invoice_id = ?', $invoiceId);

            $result = $this->fetchAll($select);

            foreach ($result as $row) {
                $objInvoiceItem = $this->getItem($row->id);
                array_push($invoiceItem, $objInvoiceItem);
            }
        } catch (Exception $e) {
            throw new Base_Model_Lib_Eav_Exception_Sql("<strong>Oops !, Error Class name -</strong>  <em>Base_Model_Lib_User_Entity_User</em>, <strong>Function -</strong> <em>getAll()</em>, <strong>Exception -</strong> <em>" . $e->getMessage() . "</em>");
        }
        return $invoiceItem;
    }
    
    
    
     /*
     * @name        : updateInvoiceItem
     * @Description : The function is to add a invoiceItem information
     * 				  to the database.
     * @return      : Integer $last_inserted_id
     */

    public function updateInvoiceItemInfo() {
        $success = false;

        try {

            if (!($this->invoiceItem instanceof Base_Model_Lib_Invoice_Entity_InvoiceItem))
                throw new Base_Model_Lib_Invoice_Exception(" InvoiceItem Entity not intialized");

            $data = array(
                'description' => $this->invoiceItem->getDescription(),
                'amount' => $this->invoiceItem->getAmount(),
                'taxed' => $this->invoiceItem->getTaxed()
            );

            $this->update($data, 'id = ' . (int) $this->invoiceItem->getId());
            $success = true;
        } catch (Exception $e) {
            throw new Base_Model_Lib_Eav_Exception_Sql("<strong>Oops !, Error Class name -</strong>  <em>Base_Model_Lib_Invoice_Dao_InvoiceItem</em>, <strong>Function -</strong> <em>addInvoiceItem()</em>, <strong>Exception -</strong> <em>" . $e->getMessage() . "</em>");
        }

        return $success;
    }
    
    
    
    /*
     * @name        : addInvoiceItem
     * @Description : The function is to add a invoiceItem information
     * 				  to the database.
     * @return      : Integer $last_inserted_id
     */

    public function addInvoiceItemInfo() {
        $last_inserted_id = 0;

        try {

            if (!($this->invoiceItem instanceof Base_Model_Lib_Invoice_Entity_InvoiceItem))
                throw new Base_Model_Lib_Invoice_Exception(" InvoiceItem Entity not intialized");

            
            $data = array(
                'tbl_invoice_id' => $this->invoiceItem->getInvoice(),
                'description' => $this->invoiceItem->getDescription(),
                'amount' => $this->invoiceItem->getAmount(),
                'taxed' => $this->invoiceItem->getTaxed()
            );

            $last_inserted_id = $this->insert($data);
        } catch (Exception $e) {
            throw new Base_Model_Lib_Eav_Exception_Sql("<strong>Oops !, Error Class name -</strong>  <em>Base_Model_Lib_Invoice_Dao_InvoiceItem</em>, <strong>Function -</strong> <em>addInvoiceItem()</em>, <strong>Exception -</strong> <em>" . $e->getMessage() . "</em>");
        }

        return $last_inserted_id;
    }
}
?>