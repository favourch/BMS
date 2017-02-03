<?php

/**
 * @namespace       : Base
 * @package         : Model
 * @subpackage 		: Lib.Invoice.Dao
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
class Base_Model_Lib_Invoice_Dao_BillableItem extends Zend_Db_Table {

    protected $_name = 'tbl_billable_items'; // the table name
    protected $_primary = 'id'; // the primary key
    public $billableItem;

    /*
     * @name        : getItem
     * @Description : The function is to get a BillableItem information
     * 				  from the database.
     * @param       : $id (BillableItem Id)
     * @return      : Entity BillableItem Object (Base_Model_Lib_Invoice_Entity_BillableItem)
     */

    public function getItem($billableItemId) {
        $objBillableItem = new Base_Model_Lib_Invoice_Entity_BillableItem ( );

        try {
            if ($billableItemId) {
                $id = (int) $billableItemId;
                $row = $this->fetchRow('id = ' . $id);

                if ($row != "") {
                    $result = $row->toArray();
                    $objBillableItem->setId($row['id']);
                    $objBillableItem->setBillableItem($row['tbl_billableItem_id']);
                    $objBillableItem->setDescription($row['description']);
                    $objBillableItem->setHours($row['hours']);
                    $objBillableItem->setAmount($row['amount']);
                    $objBillableItem->setRecur($row['recur']);
                    $objBillableItem->setRecurcycle($row['recurcycle']);
                    $objBillableItem->setRecurfor($row['recurfor']);
                    $objBillableItem->setInvoiceaction($row['invoiceaction']);
                    $objBillableItem->setDuedate($row['duedate']);
                    $objBillableItem->setInvoicecount($row['invoicecount']);
                    $objBillableItem->setOrderProduct($row['tbl_order_product_id']);
                }
            }
        } catch (Exception $e) {
            throw new Base_Model_Lib_Eav_Exception_Sql("<strong>Oops !, Error Class name -</strong>  <em>Base_Model_Lib_Invoice_Dao_BillableItem</em>, <strong>Function -</strong> <em>getItem()</em>, <strong>Exception -</strong> <em>" . $e->getMessage() . "</em>");
        }
        return $objBillableItem;
    }

    /*
     * @name        : getAll
     * @Description : The function is to get all users information
     * 				  from the database.
     * @return      : Aray Of Entity User Object (Base_Model_Lib_User_Entity_User)
     */

    public function getAll() {
        $billableItem = array();

        try {
            $objBillableItem = new Base_Model_Lib_Invoice_Entity_BillableItem ( );

            $select = $this->select()->from('tbl_billable_items', array('id'));

            $result = $this->fetchAll($select);

            foreach ($result as $row) {
                $objBillableItem = $this->getItem($row->id);
                array_push($billableItem, $objBillableItem);
            }
        } catch (Exception $e) {
            throw new Base_Model_Lib_Eav_Exception_Sql("<strong>Oops !, Error Class name -</strong>  <em>Base_Model_Lib_User_Entity_User</em>, <strong>Function -</strong> <em>getAll()</em>, <strong>Exception -</strong> <em>" . $e->getMessage() . "</em>");
        }
        return $billableItem;
    }

    /*
     * @name        : addBillableItem
     * @Description : The function is to add a billableItem information
     * 				  to the database.
     * @return      : Integer $last_inserted_id
     */

    public function addBillableItem() {
        $last_inserted_id = 0;

        try {

            if (!($this->billableItem instanceof Base_Model_Lib_Invoice_Entity_BillableItem))
                throw new Base_Model_Lib_Invoice_Exception(" BillableItem Entity not intialized");

            $data = array(
                'tbl_client_id' => $this->billableItem->getClient(),
                'description' => $this->billableItem->getDescription(),
                'hours' => $this->billableItem->getHours(),
                'amount' => $this->billableItem->getAmount(),
                'recur' => $this->billableItem->getRecur(),
                'recurcycle' => $this->billableItem->getRecurcycle(),
                'recurfor' => $this->billableItem->getRecurfor(),
                'invoiceaction' => $this->billableItem->getInvoiceaction(),
                'duedate' => $this->billableItem->getDuedate(),
                'invoicecount' => $this->billableItem->getInvoicecount(),
                'tbl_order_product_id' => $this->billableItem->getOrderProduct(),
                'invoice_id' => $this->billableItem->getInvoiceId()
            );

            $last_inserted_id = $this->insert($data);
        } catch (Exception $e) {
            throw new Base_Model_Lib_Eav_Exception_Sql("<strong>Oops !, Error Class name -</strong>  <em>Base_Model_Lib_BillableItem_Dao_BillableItem</em>, <strong>Function -</strong> <em>addBillableItem()</em>, <strong>Exception -</strong> <em>" . $e->getMessage() . "</em>");
        }

        return $last_inserted_id;
    }

    
        /*
     * @name        : updateBillableItem
     * @Description : The function is to add a billableItem information
     * 				  to the database.
     * @return      : Integer $last_inserted_id
     */

    public function updateBillableItem() {
        $success = false;

        try {

            if (!($this->billableItem instanceof Base_Model_Lib_Invoice_Entity_BillableItem))
                throw new Base_Model_Lib_Invoice_Exception(" BillableItem Entity not intialized");

            $data = array(
                'tbl_client_id' => $this->billableItem->getClient(),
                'description' => $this->billableItem->getDescription(),
                'hours' => $this->billableItem->getHours(),
                'amount' => $this->billableItem->getAmount(),
                'recur' => $this->billableItem->getRecur(),
                'recurcycle' => $this->billableItem->getRecurcycle(),
                'recurfor' => $this->billableItem->getRecurfor(),
                'invoiceaction' => $this->billableItem->getInvoiceaction(),
                'duedate' => $this->billableItem->getDuedate(),
                'invoicecount' => $this->billableItem->getInvoicecount(),
                'tbl_order_product_id' => $this->billableItem->getOrderProduct(),
                'invoice_id' => $this->billableItem->getInvoiceId()
            );

            $this->update($data, 'id = ' . (int) $this->billableItem->getId());
            $success = true;
        } catch (Exception $e) {
            throw new Base_Model_Lib_Eav_Exception_Sql("<strong>Oops !, Error Class name -</strong>  <em>Base_Model_Lib_BillableItem_Dao_BillableItem</em>, <strong>Function -</strong> <em>addBillableItem()</em>, <strong>Exception -</strong> <em>" . $e->getMessage() . "</em>");
        }

        return $success;
    }
    
    
    /*
     * @name        : updateBillableItem
     * @Description : The function is to add a billableItem information
     * 				  to the database.
     * @return      : Integer $last_inserted_id
     */

    public function deleteBillableItem() {
        $success = false;

        try {

            if (!($this->billableItem instanceof Base_Model_Lib_Invoice_Entity_BillableItem))
                throw new Base_Model_Lib_Invoice_Exception(" BillableItem Entity not intialized");

            if ($this->delete('id =' . (int) $this->billableItem->getId()) == '1') {
                $success = true;
            }
            
        } catch (Exception $e) {
            throw new Base_Model_Lib_Eav_Exception_Sql("<strong>Oops !, Error Class name -</strong>  <em>Base_Model_Lib_BillableItem_Dao_BillableItem</em>, <strong>Function -</strong> <em>addBillableItem()</em>, <strong>Exception -</strong> <em>" . $e->getMessage() . "</em>");
        }

        return $success;
    }
    
}
?>