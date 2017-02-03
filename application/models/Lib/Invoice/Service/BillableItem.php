<?php

/**
 * @namespace       : Base
 * @package         : Model
 * @subpackage 		: Lib.BillableItem.Service
 * @name 			: BillableItem
 * @author 			: Iyngaran Iyathurai
 * 			  		  Software eng - Bcas R&D
 * 			          E-Mail - Iyngaran55@yahoo.com, Iyngaran@bcas.lk
 *
 * @copyright Copyright (c) 2009 - 2010 BCAS R&D . (http://www.lab.bcasrd.com)
 *
 * Description : The Service class for the BillableItem Object
 *
 */
class Base_Model_Lib_Invoice_Service_BillableItem extends Base_Model_Lib_Eav_Model_Service {

    const RESULT_PER_PAGE = 20; // the const variable for pagging

    public $billableItem;

    /*
     * @name        : getBillableItem
     * @Description : The function is to get a billableItem information
     * 				  from the database.
     * @param       : $id (BillableItem Id)
     * @return      : Base_Model_Lib_Invoice_Entity_BillableItem
     */

    public function getItem($id) {
        $billableItem = "";
        try {
            $objBillableItem = new Base_Model_Lib_Invoice_Dao_BillableItem();
            $billableItem = $objBillableItem->getItem($id);
        } catch (Exception $e) {
            throw new Base_Model_Lib_Invoice_Exception("<strong>Oops !, Error Class name -</strong>  <em>Base_Model_Lib_Invoice_Service_BillableItem</em>, <strong>Function -</strong> <em>getBillableItem()</em>, <strong>Exception -</strong> <em>" . $e->getMessage() . "</em>");
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

            $objBillableItemDao = new Base_Model_Lib_Invoice_Dao_BillableItem();
            $objBillableItemDao->billableItem = $this->billableItem;
            $last_inserted_id = $objBillableItemDao->addBillableItem();
        } catch (Exception $e) {
            throw new Base_Model_Lib_Invoice_Exception("<strong>Oops !, Error Class name -</strong>  <em>Base_Model_Lib_Invoice_Service_BillableItem</em>, <strong>Function -</strong> <em>addBillableItem()</em>, <strong>Exception -</strong> <em>" . $e->getMessage() . "</em>");
        }

        return $last_inserted_id;
    }

    /*
     * @name        : updateBillableItem
     * @Description : The function is to update/edit a billableItem information
     * 				  in the database.
     * @return      : $success true/false
     */

    public function updateBillableItem() {
        $success = false;
        try {

            if (!($this->billableItem instanceof Base_Model_Lib_Invoice_Entity_BillableItem))
                throw new Base_Model_Lib_Invoice_Exception(" BillableItem Entity not intialized");

            $objBillableItemDao = new Base_Model_Lib_Invoice_Dao_BillableItem();
            $objBillableItemDao->billableItem = $this->billableItem;
            $success = $objBillableItemDao->updateBillableItem();
        } catch (Exception $e) {
            throw new Base_Model_Lib_Invoice_Exception("<strong>Oops !, Error Class name -</strong>  <em>Base_Model_Lib_Invoice_Service_BillableItem</em>, <strong>Function -</strong> <em>updateBillableItem()</em>, <strong>Exception -</strong> <em>" . $e->getMessage() . "</em>");
        }

        return $success;
    }

    /*
     * @name        : deleteBillableItem()
     * @Description : The function is to delete a billableItem information
      from the database.
     * @return      : $success true/false
     */

    public function deleteBillableItem() {
        $success = false;
        try {

            if (!($this->billableItem instanceof Base_Model_Lib_Invoice_Entity_BillableItem))
                throw new Base_Model_Lib_Invoice_Exception(" BillableItem Entity not intialized");

            $objBillableItemDao = new Base_Model_Lib_Invoice_Dao_BillableItem();
            $objBillableItemDao->billableItem = $this->billableItem;
            $success = $objBillableItemDao->deleteBillableItem();
        } catch (Exception $e) {
            throw new Base_Model_Lib_Invoice_Exception("<strong>Oops !, Error Class name -</strong>  <em>Base_Model_Lib_Invoice_Service_BillableItem</em>, <strong>Function -</strong> <em>deleteBillableItem()</em>, <strong>Exception -</strong> <em>" . $e->getMessage() . "</em>");
        }

        return $success;
    }
    
    
    /*
     * @name        : getAll()
     * @Description : The function is to get a billableItem information
     * 				  from the database.
     * @param       : $id (BillableItem Id)
     * @return      : Base_Model_Lib_Invoice_Entity_BillableItem
     */

    public function getAll() {
        $billableItem = array();
        try {
            $objBillableItem = new Base_Model_Lib_Invoice_Dao_BillableItem();
            $billableItem = $objBillableItem->getAll();
        } catch (Exception $e) {
            throw new Base_Model_Lib_Invoice_Exception("<strong>Oops !, Error Class name -</strong>  <em>Base_Model_Lib_Invoice_Service_BillableItem</em>, <strong>Function -</strong> <em>getBillableItem()</em>, <strong>Exception -</strong> <em>" . $e->getMessage() . "</em>");
        }
        return $billableItem;
    }
}
?>