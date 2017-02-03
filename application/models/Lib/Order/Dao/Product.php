<?php

/**
 * @namespace       : Base
 * @package         : Model
 * @subpackage 		: Lib.Product.Dao
 * @name 			: Product
 * @author 			: Iyngaran Iyathurai
 * 			  		  Software eng - Monara IT (LTD) PVT
 * 			          E-Mail - Iyngaran55@yahoo.com, Iyngaran@bcas.lk
 *
 * @copyright Copyright (c) 2009 - 2010 Monara IT (LTD) PVT Pvt Ltd. (http://www.pluspro.com/)
 *
 * @Created on     	: 28-11-2010
 * @Modified on     : 28-11-2010
 *
 */
class Base_Model_Lib_Order_Dao_Product extends Zend_Db_Table {

    protected $_name = 'tbl_order_products'; // the table name
    protected $_primary = 'id'; // the primary key
    public $product;

    /*
     * @name        : getItem
     * @Description : The function is to get a Product information
     * 				  from the database.
     * @param       : $id (Product Id)
     * @return      : Entity Product Object (Base_Model_Lib_Order_Entity_Product)
     */

    public function getProduct($productId) {
        $objProduct = new Base_Model_Lib_Order_Entity_Product();
        $objProductService = new Base_Model_Lib_Product_Service_Product();
        $objPaymentMethodService = new Base_Model_Lib_Catelog_Service_PaymentMethod();
        $objPromotionCodeService = new Base_Model_Lib_Catelog_Service_PromotionCode();
        try {
            if ($productId) {
                $id = (int) $productId;
                $row = $this->fetchRow('id = ' . $id);

                if ($row != "") {
                    $result = $row->toArray();
                    $objProduct->setId($row ['id']);
                    $objProduct->setClient($row ['tbl_client_id']);
                    $objProduct->setOrder($row ['tbl_order_id']);
                    $objProduct->setProduct($objProductService->getItem($row ['tbl_product_id']));
                    $objProduct->setServer($row ['server']);
                    $objProduct->setRegdate($row ['regdate']);
                    $objProduct->setDomain($row ['domain']);
                    $objProduct->setPaymentMethod($objPaymentMethodService->getItem($row ['paymentmethod']));
                    $objProduct->setFirstPaymentAmount($row ['firstpaymentamount']);
                    $objProduct->setAmount($row ['amount']);
                    $objProduct->setBillingCycle($row ['billingcycle']);
                    $objProduct->setNextDueDate($row ['nextduedate']);
                    $objProduct->setNextInvoiceDate($row ['nextinvoicedate']);
                    $objProduct->setDomainStatus($row ['domainstatus']);
                    $objProduct->setUsername($row ['username']);
                    $objProduct->setPassword($row ['password']);
                    $objProduct->setNotes($row ['notes']);
                    $objProduct->setSubscription($row ['subscriptionid']);
                    $objProduct->setPromotionCode($objPromotionCodeService->getItem($row ['promoid']));
                    $objProduct->setSuspendreason($row ['suspendreason']);
                    $objProduct->setOverideautosuspend($row ['overideautosuspend']);
                    $objProduct->setOveridesuspenduntil($row ['overidesuspenduntil']);
                    $objProduct->setDedicatedIp($row ['dedicatedip']);
                    $objProduct->setAssignedIps($row ['assignedips']);
                    $objProduct->setNs1($row ['ns1']);
                    $objProduct->setNs2($row ['ns2']);
                    $objProduct->setDiskusage($row ['diskusage']);
                    $objProduct->setDisklimit($row ['disklimit']);
                    $objProduct->setBwusage($row ['bwusage']);
                    $objProduct->setBwlimit($row ['bwlimit']);
                    $objProduct->setLastupdate($row ['lastupdate']);
                    $objProduct->setCPanelPackage($row ['cpanel_package']);
                    $objProduct->setHasAdmin($row ['has_admin']);
                }
            }
        } catch (Exception $e) {
            throw new Base_Model_Lib_Eav_Exception_Sql("<strong>Oops !, Error Class name -</strong>  <em>Base_Model_Lib_Order_Dao_Product</em>, <strong>Function -</strong> <em>getItem()</em>, <strong>Exception -</strong> <em>" . $e->getMessage() . "</em>");
        }
        return $objProduct;
    }

    /*
     * @name        : addItem
     * @Description : The function is to add a Product information
     * 				  to the database.
     * @return      : Integer $last_inserted_id
     */

    public function addItem() {
        $last_inserted_id = 0;

        try {

            if (!($this->product instanceof Base_Model_Lib_Order_Entity_Product))
                throw new Base_Model_Lib_Order_Exception(" Product Entity not intialized");

            $data = array(
                'tbl_client_id' => $this->product->getClient(),
                'tbl_order_id' => $this->product->getOrder(),
                'tbl_product_id' => $this->product->getProduct(),
                'server' => $this->product->getServer(),
                'regdate' => $this->product->getRegdate(),
                'domain' => $this->product->getDomain(),
                'paymentmethod' => $this->product->getPaymentMethod(),
                'firstpaymentamount' => $this->product->getFirstPaymentAmount(),
                'amount' => $this->product->getAmount(),
                'billingcycle' => $this->product->getBillingCycle(),
                'nextduedate' => $this->product->getNextDueDate(),
                'nextinvoicedate' => $this->product->getNextInvoiceDate(),
                'domainstatus' => $this->product->getDomainStatus(),
                'username' => $this->product->getUsername(),
                'password' => $this->product->getPassword(),
                'notes' => $this->product->getNotes(),
                'subscriptionid' => $this->product->getSubscription(),
                'promoid' => $this->product->getPromotionCode(),
                'suspendreason' => $this->product->getSuspendreason(),
                'overideautosuspend' => $this->product->getOverideautosuspend(),
                'overidesuspenduntil' => $this->product->getOveridesuspenduntil(),
                'dedicatedip' => $this->product->getDedicatedIp(),
                'assignedips' => $this->product->getAssignedIps(),
                'ns1' => $this->product->getNs1(),
                'ns2' => $this->product->getNs2(),
                'diskusage' => $this->product->getDiskusage(),
                'disklimit' => $this->product->getDisklimit(),
                'bwusage' => $this->product->getBwusage(),
                'bwlimit' => $this->product->getBwlimit(),
                'lastupdate' => $this->product->getLastupdate(),
                'cpanel_package' => $this->product->getCPanelPackage(),
                'has_admin' => $this->product->getHasAdmin());

            $last_inserted_id = $this->insert($data);
        } catch (Exception $e) {
            throw new Base_Model_Lib_Eav_Exception_Sql("<strong>Oops !, Error Class name -</strong>  <em>Base_Model_Lib_Order_Dao_Product</em>, <strong>Function -</strong> <em>addItem()</em>, <strong>Exception -</strong> <em>" . $e->getMessage() . "</em>");
        }

        return $last_inserted_id;
    }

    /*
     * @name        : updateItem
     * @Description : The function is to update/edit a Product information
     * 				  in the database.
     * @return      : $success true/false
     */

    public function updateItem() {
        $success = false;
        try {

            if (!($this->product instanceof Base_Model_Lib_Order_Entity_Product))
                throw new Base_Model_Lib_Order_Exception(" Product Entity not intialized");

            $data = array(
                'tbl_client_id' => $this->product->getClient(),
                'tbl_order_id' => $this->product->getOrder(),
                'tbl_product_id' => $this->product->getProduct(),
                'server' => $this->product->getServer(),
                'regdate' => $this->product->getRegdate(),
                'domain' => $this->product->getDomain(),
                'paymentmethod' => $this->product->getPaymentMethod(),
                'firstpaymentamount' => $this->product->getFirstPaymentAmount(),
                'amount' => $this->product->getAmount(),
                'billingcycle' => $this->product->getBillingCycle(),
                'nextduedate' => $this->product->getNextDueDate(),
                'nextinvoicedate' => $this->product->getNextInvoiceDate(),
                'domainstatus' => $this->product->getDomainStatus(),
                'username' => $this->product->getUsername(),
                'password' => $this->product->getPassword(),
                'notes' => $this->product->getNotes(),
                'subscriptionid' => $this->product->getSubscription(),
                'promoid' => $this->product->getPromotionCode(),
                'suspendreason' => $this->product->getSuspendreason(),
                'overideautosuspend' => $this->product->getOverideautosuspend(),
                'overidesuspenduntil' => $this->product->getOveridesuspenduntil(),
                'dedicatedip' => $this->product->getDedicatedIp(),
                'assignedips' => $this->product->getAssignedIps(),
                'ns1' => $this->product->getNs1(),
                'ns2' => $this->product->getNs2(),
                'diskusage' => $this->product->getDiskusage(),
                'disklimit' => $this->product->getDisklimit(),
                'bwusage' => $this->product->getBwusage(),
                'bwlimit' => $this->product->getBwlimit(),
                'lastupdate' => $this->product->getLastupdate(),
                'cpanel_package' => $this->product->getCPanelPackage(),
                'has_admin' => $this->product->getHasAdmin());

            $this->update($data, 'id = ' . (int) $this->product->getId());
            $success = true;
        } catch (Exception $e) {
            throw new Base_Model_Lib_Eav_Exception_Sql("<strong>Oops !, Error Class name -</strong>  <em>Base_Model_Lib_Order_Dao_Product</em>, <strong>Function -</strong> <em>updateItem()</em>, <strong>Exception -</strong> <em>" . $e->getMessage() . "</em>");
        }
        return $success;
    }

    /*
     * @name        : deleteItem
     * @Description : The function is to delete a Product information
     * 				  in the database.
     * @return      : $success true/false
     */

    public function deleteItem() {
        $success = false;
        try {

            if (!($this->product instanceof Base_Model_Lib_Order_Entity_Product))
                throw new Base_Model_Lib_Order_Exception(" Product Entity not intialized");

            if ($this->delete('id =' . (int) $this->product->getId()) == '1') {
                $success = true;
            }
        } catch (Exception $e) {
            throw new Base_Model_Lib_Eav_Exception_Sql("<strong>Oops !, Error Class name -</strong>  <em>Base_Model_Lib_Order_Dao_Product</em>, <strong>Function -</strong> <em>deleteItem()</em>, <strong>Exception -</strong> <em>" . $e->getMessage() . "</em>");
        }
        return $success;
    }

    /*
     * @name        : getAll
     * @Description : The function is to get all users information
     * 				  from the database.
     * @return      : Aray Of Entity User Object (Base_Model_Lib_User_Entity_User)
     */

    public function getAll() {
        $product = array();

        try {
            $objProduct = new Base_Model_Lib_Order_Entity_Product ( );

            $select = $this->select()
                    ->from('tbl_order_products', array('id'));

            $result = $this->fetchAll($select);

            foreach ($result as $row) {
                $objProduct = $this->getProduct($row->id);
                array_push($product, $objProduct);
            }
        } catch (Exception $e) {
            throw new Base_Model_Lib_Eav_Exception_Sql("<strong>Oops !, Error Class name -</strong>  <em>Base_Model_Lib_User_Entity_User</em>, <strong>Function -</strong> <em>getAll()</em>, <strong>Exception -</strong> <em>" . $e->getMessage() . "</em>");
        }
        return $product;
    }

    /*
     * @name        : search
     * @Description : The function is to search Student information
     * 				  from the database.
     * @return      : Aray Of Entity Student Object (Base_Model_Lib_Student_Entity_Student)
     */

    public function search($limit) {
        // declare an array variable
        $arrProducts = array();
        $arrWhere = array();
        $sql = "";
        try {

            if (!($this->product instanceof Base_Model_Lib_Order_Entity_Product))
                throw new Base_Model_Lib_Order_Exception(" Product Entity not intialized");

            $clientId = $this->product->getClient();
            $ipAddress = $this->product->getDedicatedIp();
            $productStatus = $this->product->getDomainStatus();

            $sql = "SELECT id FROM tbl_order_products ";

            if ($clientId != '')
                array_push($arrWhere, "tbl_client_id = '" . $clientId . "'");

            if ($ipAddress != '')
                array_push($arrWhere, "dedicatedip = '" . $ipAddress . "'");

            if ($productStatus != '')
                array_push($arrWhere, "domainstatus = '" . $productStatus . "'");



            if (count($arrWhere) > 0)
                $sql.= "WHERE " . implode(' AND ', $arrWhere);

            // $limit
            $sql.= $limit;
            $db = Zend_Db_Table_Abstract::getDefaultAdapter();
            $result = $db->fetchCol($sql);

            foreach ($result as $cid) {
                $objProduct = $this->getProduct($cid);
                array_push($arrProducts, $objProduct);
            }
        } catch (Exception $e) {
            throw new Base_Model_Lib_Eav_Exception_Sql("<strong>Oops !, Error Class name -</strong>  <em>Base_Model_Lib_Order_Entity_Product</em>, <strong>Function -</strong> <em>loginProduct()</em>, <strong>Exception -</strong> <em>" . $e->getMessage() . "</em>");
        }
        return $arrProducts;
    }

    /*
     * @name        : searchCount()
     * @Description : The function is to search Student information
     * 				  from the database.
     * @return      : Aray Of Entity Student Object (Base_Model_Lib_Student_Entity_Student)
     */

    public function searchCount() {
        // declare an array variable
        $totalProducts = 0;
        $arrWhere = array();
        $sql = "";
        try {

            if (!($this->product instanceof Base_Model_Lib_Order_Entity_Product))
                throw new Base_Model_Lib_Order_Exception(" Product Entity not intialized");

            $clientId = $this->product->getClient();
            $ipAddress = $this->product->getDedicatedIp();
            $productStatus = $this->product->getDomainStatus();

            $sql = "SELECT id FROM tbl_order_products ";

            if ($clientId != '')
                array_push($arrWhere, "tbl_client_id = '" . $clientId . "'");

            if ($ipAddress != '')
                array_push($arrWhere, "dedicatedip = '" . $ipAddress . "'");

            if ($productStatus != '')
                array_push($arrWhere, "domainstatus = '" . $productStatus . "'");



            if (count($arrWhere) > 0)
                $sql.= "WHERE " . implode(' AND ', $arrWhere);

            // $limit
            $db = Zend_Db_Table_Abstract::getDefaultAdapter();
            $totalProducts = $db->fetchOne($sql);
        } catch (Exception $e) {
            throw new Base_Model_Lib_Eav_Exception_Sql("<strong>Oops !, Error Class name -</strong>  <em>Base_Model_Lib_Order_Entity_Product</em>, <strong>Function -</strong> <em>loginProduct()</em>, <strong>Exception -</strong> <em>" . $e->getMessage() . "</em>");
        }
        return $totalProducts;
    }

    /*
     * @name        : getAllOrderProducts
     * @Description : The function is to get all users information
     * 				  from the database.
     * @return      : Aray Of Entity User Object (Base_Model_Lib_User_Entity_User)
     */

    public function getAllOrderProducts($orderId) {
        $orderProducts = array();

        try {
            $objProduct = new Base_Model_Lib_Order_Entity_Product ( );

            $select = $this->select()
                    ->from('tbl_order_products', array('id'))
                    ->where('tbl_order_id = ?', $orderId);

            $result = $this->fetchAll($select);

            foreach ($result as $row) {
                $objProduct = $this->getProduct($row->id);
                array_push($orderProducts, $objProduct);
            }
        } catch (Exception $e) {
            throw new Base_Model_Lib_Eav_Exception_Sql("<strong>Oops !, Error Class name -</strong>  <em>Base_Model_Lib_User_Entity_User</em>, <strong>Function -</strong> <em>getAll()</em>, <strong>Exception -</strong> <em>" . $e->getMessage() . "</em>");
        }
        return $orderProducts;
    }

    /*
     * @name        : updateItem
     * @Description : The function is to update/edit a Product information
     * 				  in the database.
     * @return      : $success true/false
     */

    public function updateItemSubscriptionId() {
        $success = false;
        try {

            if (!($this->product instanceof Base_Model_Lib_Order_Entity_Product))
                throw new Base_Model_Lib_Order_Exception(" Product Entity not intialized");

            $data = array('subscriptionid' => $this->product->getSubscription());

            $this->update($data, 'id = ' . (int) $this->product->getId());
            $success = true;
        } catch (Exception $e) {
            throw new Base_Model_Lib_Eav_Exception_Sql("<strong>Oops !, Error Class name -</strong>  <em>Base_Model_Lib_Order_Dao_Product</em>, <strong>Function -</strong> <em>updateItem()</em>, <strong>Exception -</strong> <em>" . $e->getMessage() . "</em>");
        }
        return $success;
    }

    /*
     * @name        : updateItem
     * @Description : The function is to update/edit a Product information
     * 				  in the database.
     * @return      : $success true/false
     */

    public function updateItemInvoiceDates() {
        $success = false;
        try {

            if (!($this->product instanceof Base_Model_Lib_Order_Entity_Product))
                throw new Base_Model_Lib_Order_Exception(" Product Entity not intialized");

            $data = array(
                'nextduedate' => $this->product->getNextDueDate(),
                'nextinvoicedate' => $this->product->getNextInvoiceDate());

            $this->update($data, 'id = ' . (int) $this->product->getId());
            $success = true;
        } catch (Exception $e) {
            throw new Base_Model_Lib_Eav_Exception_Sql("<strong>Oops !, Error Class name -</strong>  <em>Base_Model_Lib_Order_Dao_Product</em>, <strong>Function -</strong> <em>updateItem()</em>, <strong>Exception -</strong> <em>" . $e->getMessage() . "</em>");
        }
        return $success;
    }

    public function countOrderProduct($productGroup, $clientId) {
        $totalOrderProduct = 0;
        try {

            $sql = "SELECT count(id) as tot FROM tbl_order_products WHERE tbl_client_id = '" . $clientId . "' AND tbl_product_id IN (SELECT id FROM tbl_products WHERE gid = '" . $productGroup . "')";
            $db = Zend_Db_Table_Abstract::getDefaultAdapter();
            $totalOrderProduct = $db->fetchOne($sql);
        } catch (Exception $e) {
            throw new Base_Model_Lib_Eav_Exception_Sql("<strong>Oops !, Error " . $e->getMessage());
        }
        return $totalOrderProduct;
    }

    /*
     * @name        : updateItem
     * @Description : The function is to update/edit a Product information
     * 				  in the database.
     * @return      : $success true/false
     */

    public function updateProductService() {
        $success = false;
        try {

            if (!($this->product instanceof Base_Model_Lib_Order_Entity_Product))
                throw new Base_Model_Lib_Order_Exception(" Product Entity not intialized");

            $data = array(
                'tbl_product_id' => $this->product->getProduct(),
                'server' => $this->product->getServer(),
                'domain' => $this->product->getDomain(),
                'paymentmethod' => $this->product->getPaymentMethod(),
                'firstpaymentamount' => $this->product->getFirstPaymentAmount(),
                'amount' => $this->product->getAmount(),
                'billingcycle' => $this->product->getBillingCycle(),
                'nextduedate' => $this->product->getNextDueDate(),
                'nextinvoicedate' => $this->product->getNextInvoiceDate(),
                'domainstatus' => $this->product->getDomainStatus(),
                'username' => $this->product->getUsername(),
                'password' => $this->product->getPassword(),
                'notes' => $this->product->getNotes(),
                'subscriptionid' => $this->product->getSubscription(),
                'promoid' => $this->product->getPromotionCode(),
                'suspendreason' => $this->product->getSuspendreason(),
                'overideautosuspend' => $this->product->getOverideautosuspend(),
                'overidesuspenduntil' => $this->product->getOveridesuspenduntil(),
                'dedicatedip' => $this->product->getDedicatedIp(),
                'lastupdate' => $this->product->getLastupdate(),
                'cpanel_package' => $this->product->getCPanelPackage(),
                'has_admin' => $this->product->getHasAdmin());

            $this->update($data, 'id = ' . (int) $this->product->getId());
            $success = true;
        } catch (Exception $e) {
            throw new Base_Model_Lib_Eav_Exception_Sql("<strong>Oops !, Error Class name -</strong>  <em>Base_Model_Lib_Order_Dao_Product</em>, <strong>Function -</strong> <em>updateItem()</em>, <strong>Exception -</strong> <em>" . $e->getMessage() . "</em>");
        }
        return $success;
    }

    /*
     * @name        : updateItemStatus
     * @Description : The function is to update/edit a Product information
     * 				  in the database.
     * @return      : $success true/false
     */

    public function updateItemStatus() {
        $success = false;
        try {

            if (!($this->product instanceof Base_Model_Lib_Order_Entity_Product))
                throw new Base_Model_Lib_Order_Exception(" Product Entity not intialized");

            $data = array(
                'domainstatus' => $this->product->getDomainStatus());

            $this->update($data, 'id = ' . (int) $this->product->getId());
            $success = true;
        } catch (Exception $e) {
            throw new Base_Model_Lib_Eav_Exception_Sql("<strong>Oops !, Error Class name -</strong> " . $e->getMessage());
        }
        return $success;
    }

}

?>
