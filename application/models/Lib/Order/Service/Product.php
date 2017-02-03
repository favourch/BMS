<?php

/**
 * @namespace       : Base
 * @package         : Model
 * @subpackage 		: Lib.Product.Service
 * @name 			: Product
 * @author 			: Iyngaran Iyathurai
 * 			  		  Software eng - Monara IT (LTD) PVT
 * 			          E-Mail - Iyngaran55@yahoo.com, Iyngaran@bcas.lk
 *
 * @copyright Copyright (c) 2009 - 2010 Monara IT (LTD) PVT . (http://www.pluspro.com)
 *
 * Description : The Service class for the Product Object
 *
 */
class Base_Model_Lib_Order_Service_Product extends Base_Model_Lib_Eav_Model_Service {

    public $product;

    /*
     * @name        : getItem
     * @Description : The function is to get a Product information
     * 				  from the database.
     * @param       : $id (Member Id)
     * @return      : Base_Model_Lib_Order_Entity_Product
     */

    public function getItem($id) {
        $product = "";
        try {
            $objProduct = new Base_Model_Lib_Order_Dao_Product ( );
            $product = $objProduct->getProduct($id);
        } catch (Exception $e) {
            throw new Base_Model_Lib_Order_Exception("<strong>Oops !, Error Class name -</strong>  <em>Base_Model_Lib_Order_Service_Currency</em>, <strong>Function -</strong> <em>getItem()</em>, <strong>Exception -</strong> <em>" . $e->getMessage() . "</em>");
        }
        return $product;
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

            $objProductDao = new Base_Model_Lib_Order_Dao_Product( );
            $objProductDao->product = $this->product;
            $last_inserted_id = $objProductDao->addItem();
        } catch (Exception $e) {
            throw new Base_Model_Lib_Order_Exception("<strong>Oops !, Error Class name -</strong>  <em>Base_Model_Lib_Order_Service_Product</em>, <strong>Function -</strong> <em>addItem()</em>, <strong>Exception -</strong> <em>" . $e->getMessage() . "</em>");
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

            $objProductDao = new Base_Model_Lib_Order_Dao_Product( );
            $objProductDao->product = $this->product;
            $success = $objProductDao->updateItem();
        } catch (Exception $e) {
            throw new Base_Model_Lib_Order_Exception("<strong>Oops !, Error Class name -</strong>  <em>Base_Model_Lib_Order_Service_Product</em>, <strong>Function -</strong> <em>updateItem()</em>, <strong>Exception -</strong> <em>" . $e->getMessage() . "</em>");
        }

        return $success;
    }

    /*
     * @name        : deleteItem()
     * @Description : The function is to update/edit a Product information
     * 				  in the database.
     * @return      : $success true/false
     */

    public function deleteItem() {
        $success = false;
        try {

            if (!($this->product instanceof Base_Model_Lib_Order_Entity_Product))
                throw new Base_Model_Lib_Order_Exception(" Product Entity not intialized");

            $objProductDao = new Base_Model_Lib_Order_Dao_Product( );
            $objProductDao->product = $this->product;
            $success = $objProductDao->deleteItem();
        } catch (Exception $e) {
            throw new Base_Model_Lib_Order_Exception("<strong>Oops !, Error Class name -</strong>  <em>Base_Model_Lib_Order_Service_Catelog</em>, <strong>Function -</strong> <em>deleteItem()</em>, <strong>Exception -</strong> <em>" . $e->getMessage() . "</em>");
        }

        return $success;
    }

    /*
     * @name        : getAll()
     * @Description : The function is to get All Product information
     * 				  from the database.
     * @return      : Array Of Base_Model_Lib_Member_Entity_Product
     */

    public function getAll() {
        $product = "";
        try {
            $objProduct = new Base_Model_Lib_Order_Dao_Product();
            $product = $objProduct->getAll();
        } catch (Exception $e) {
            throw new Base_Model_Lib_Order_Exception("<strong>Oops !, Error Class name -</strong>  <em>Base_Model_Lib_Order_Service_Product</em>, <strong>Function -</strong> <em>getAll()</em>, <strong>Exception -</strong> <em>" . $e->getMessage() . "</em>");
        }
        return $product;
    }

    /*
     * @name        : getAll()
     * @Description : The function is to get All Product information
     * 				  from the database.
     * @return      : Array Of Base_Model_Lib_Member_Entity_Product
     */

    public function getAllOrderProducts($orderId) {
        $product = "";
        try {
            $objProduct = new Base_Model_Lib_Order_Dao_Product();
            $product = $objProduct->getAllOrderProducts($orderId);
        } catch (Exception $e) {
            throw new Base_Model_Lib_Order_Exception("<strong>Oops !, Error Class name -</strong>  <em>Base_Model_Lib_Order_Service_Product</em>, <strong>Function -</strong> <em>getAll()</em>, <strong>Exception -</strong> <em>" . $e->getMessage() . "</em>");
        }
        return $product;
    }

    /*
     * @name        : updateItemSubscriptionId()
     * @Description : The function is to update/edit a Product information
     * 				  in the database.
     * @return      : $success true/false
     */

    public function updateItemSubscriptionId() {
        $success = false;
        try {

            if (!($this->product instanceof Base_Model_Lib_Order_Entity_Product))
                throw new Base_Model_Lib_Order_Exception(" Product Entity not intialized");

            $objProductDao = new Base_Model_Lib_Order_Dao_Product( );
            $objProductDao->product = $this->product;
            $success = $objProductDao->updateItemSubscriptionId();
        } catch (Exception $e) {
            throw new Base_Model_Lib_Order_Exception("<strong>Oops !, Error Class name -</strong>  <em>Base_Model_Lib_Order_Service_Product</em>, <strong>Function -</strong> <em>updateItem()</em>, <strong>Exception -</strong> <em>" . $e->getMessage() . "</em>");
        }

        return $success;
    }

    /*
     * @name        : updateItemSubscriptionId()
     * @Description : The function is to update/edit a Product information
     * 				  in the database.
     * @return      : $success true/false
     */

    public function updateItemInvoiceDates() {
        $success = false;
        try {

            if (!($this->product instanceof Base_Model_Lib_Order_Entity_Product))
                throw new Base_Model_Lib_Order_Exception(" Product Entity not intialized");

            $objProductDao = new Base_Model_Lib_Order_Dao_Product( );
            $objProductDao->product = $this->product;
            $success = $objProductDao->updateItemInvoiceDates();
        } catch (Exception $e) {
            throw new Base_Model_Lib_Order_Exception("<strong>Oops !, Error Class name -</strong>  <em>Base_Model_Lib_Order_Service_Product</em>, <strong>Function -</strong> <em>updateItem()</em>, <strong>Exception -</strong> <em>" . $e->getMessage() . "</em>");
        }

        return $success;
    }

    /*
     * @name        : search
     * @Description : The function is to search order information
     * 				  from the database.
     * @return      : Aray Of Entity Student Object (Base_Model_Lib_Student_Entity_Student)
     */

    public function search($limit) {
        $arrProducts = '';
        try {

            if (!($this->product instanceof Base_Model_Lib_Order_Entity_Product))
                throw new Base_Model_Lib_Order_Exception(" Product Entity not intialized");

            $objProductDao = new Base_Model_Lib_Order_Dao_Product( );
            $objProductDao->product = $this->product;
            $arrProducts = $objProductDao->search($limit);
        } catch (Exception $e) {
            throw new Base_Model_Lib_Order_Exception("<strong>Error : </strong>" . $e->getMessage());
        }

        return $arrProducts;
    }

    /*
     * @name        : searchCount()
     * @Description : The function is to search count order information
     * 				  from the database.
     * @return      : Aray Of Entity Order Product Object (Base_Model_Lib_Order_Entity_Product)
     */

    public function searchCount() {
        $totalProducts = 0;
        try {

            if (!($this->product instanceof Base_Model_Lib_Order_Entity_Product))
                throw new Base_Model_Lib_Order_Exception(" Product Entity not intialized");

            $objProductDao = new Base_Model_Lib_Order_Dao_Product( );
            $objProductDao->product = $this->product;
            $totalProducts = $objProductDao->searchCount();
        } catch (Exception $e) {
            throw new Base_Model_Lib_Order_Exception("<strong>Error : </strong>" . $e->getMessage());
        }

        return $totalProducts;
    }

    /*
     * @name        : getAll()
     * @Description : The function is to get All Product information
     * 				  from the database.
     * @return      : Array Of Base_Model_Lib_Member_Entity_Product
     */

    public function countOrderProduct($productGroup, $clientId) {
        $totalOrderProduct = 0;
        try {
            $objProduct = new Base_Model_Lib_Order_Dao_Product();
            $totalOrderProduct = $objProduct->countOrderProduct($productGroup, $clientId);
        } catch (Exception $e) {
            throw new Base_Model_Lib_Order_Exception("<strong>Oops !, Error Class name -</strong>  <em>Base_Model_Lib_Order_Service_Product</em>, <strong>Function -</strong> <em>getAll()</em>, <strong>Exception -</strong> <em>" . $e->getMessage() . "</em>");
        }
        return $totalOrderProduct;
    }

    /*
     * @name        : updateProductService()
     * @Description : The function is to update/edit a Product information
     * 				  in the database.
     * @return      : $success true/false
     */

    public function updateProductService() {
        $success = false;
        try {

            if (!($this->product instanceof Base_Model_Lib_Order_Entity_Product))
                throw new Base_Model_Lib_Order_Exception(" Product Entity not intialized");

            $objProductDao = new Base_Model_Lib_Order_Dao_Product( );
            $objProductDao->product = $this->product;
            $success = $objProductDao->updateProductService();
        } catch (Exception $e) {
            throw new Base_Model_Lib_Order_Exception("<strong>Oops !, Error Class name -</strong>  <em>Base_Model_Lib_Order_Service_Product</em>, <strong>Function -</strong> <em>updateItem()</em>, <strong>Exception -</strong> <em>" . $e->getMessage() . "</em>");
        }

        return $success;
    }

    /*
     * @name        : updateItemStatus()
     * @Description : The function is to update/edit a Product information
     * 				  in the database.
     * @return      : $success true/false
     */

    public function updateItemStatus() {
        $success = false;
        try {

            if (!($this->product instanceof Base_Model_Lib_Order_Entity_Product))
                throw new Base_Model_Lib_Order_Exception(" Product Entity not intialized");

            $objProductDao = new Base_Model_Lib_Order_Dao_Product( );
            $objProductDao->product = $this->product;
            $success = $objProductDao->updateItemStatus();
        } catch (Exception $e) {
            throw new Base_Model_Lib_Eav_Exception_Sql("<strong>Oops !, Error Class name -</strong> " . $e->getMessage());
        }

        return $success;
    }

}

?>