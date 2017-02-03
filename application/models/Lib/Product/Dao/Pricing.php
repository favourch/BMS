<?php

/**
 * @namespace       : Base
 * @package         : Model
 * @subpackage 		: Lib.Product.Dao
 * @name 			: Pricing
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
class Base_Model_Lib_Product_Dao_Pricing extends Zend_Db_Table {

    protected $_name = 'tbl_pricing'; // the table name
    protected $_primary = 'id'; // the primary key
    public $pricing;

    /*
     * @name        : getItem
     * @Description : The function is to get a Pricing information
     * 				  from the database.
     * @param       : $id (Pricing Id)
     * @return      : Entity Pricing Object (Base_Model_Lib_Product_Entity_Pricing)
     */

    public function getItem($pricingId) {
        $objPricing = new Base_Model_Lib_Product_Entity_Pricing ( );
        try {
            if ($pricingId) {
                $id = (int) $pricingId;
                $row = $this->fetchRow('id = ' . $id);

                if ($row != "") {
                    $result = $row->toArray();
                    $objPricing->setId($row ['id']);
                    $objPricing->setType($row ['type']);
                    $objPricing->setCurrency($row ['currency']);
                    $objPricing->setProductId($row ['tbl_product_id']);
                    $objPricing->setMonthlySetupfee($row ['msetupfee']);
                    $objPricing->setQuarterlySetupfee($row ['qsetupfee']);
                    $objPricing->setSemiAnnuallySetupfee($row ['ssetupfee']);
                    $objPricing->setAnnuallySetupfee($row ['asetupfee']);
                    $objPricing->setBienniallySetupfee($row ['bsetupfee']);
                    $objPricing->setTrienniallySetupfee($row ['tsetupfee']);
                    $objPricing->setMonthlyFee($row ['monthly']);
                    $objPricing->setQuarterlyFee($row ['quarterly']);
                    $objPricing->setSemiAnnuallyFee($row ['semiannually']);
                    $objPricing->setAnnuallyFee($row ['annually']);
                    $objPricing->setBienniallyFee($row ['biennially']);
                    $objPricing->setTrienniallyFee($row ['triennially']);
                }
            }
        } catch (Exception $e) {
            throw new Base_Model_Lib_Eav_Exception_Sql("<strong>Oops !, Error Class name -</strong>  <em>Base_Model_Lib_Product_Dao_Pricing</em>, <strong>Function -</strong> <em>getItem()</em>, <strong>Exception -</strong> <em>" . $e->getMessage() . "</em>");
        }
        return $objPricing;
    }

    /*
     * @name        : addItem
     * @Description : The function is to add a Pricing information
     * 				  to the database.
     * @return      : Integer $last_inserted_id
     */

    public function addItem() {
        $last_inserted_id = 0;

        try {

            if (!($this->pricing instanceof Base_Model_Lib_Product_Entity_Pricing))
                throw new Base_Model_Lib_Product_Exception(" Pricing Entity not intialized");

            $data = array(
                'type' => $this->pricing->getType(),
                'currency' => $this->pricing->getCurrency(),
                'tbl_product_id' => $this->pricing->getProductId(),
                'msetupfee' => $this->pricing->getMonthlySetupfee(),
                'qsetupfee' => $this->pricing->getQuarterlySetupfee(),
                'ssetupfee' => $this->pricing->getSemiAnnuallySetupfee(),
                'asetupfee' => $this->pricing->getAnnuallySetupfee(),
                'bsetupfee' => $this->pricing->getBienniallySetupfee(),
                'tsetupfee' => $this->pricing->getTrienniallySetupfee(),
                'monthly' => $this->pricing->getMonthlyFee(),
                'quarterly' => $this->pricing->getQuarterlyFee(),
                'semiannually' => $this->pricing->getSemiAnnuallyFee(),
                'annually' => $this->pricing->getAnnuallyFee(),
                'biennially' => $this->pricing->getBienniallyFee(),
                'triennially' => $this->pricing->getTrienniallyFee());

            $last_inserted_id = $this->insert($data);
        } catch (Exception $e) {
            throw new Base_Model_Lib_Eav_Exception_Sql("<strong>Oops !, Error Class name -</strong>  <em>Base_Model_Lib_Product_Dao_Product</em>, <strong>Function -</strong> <em>addItem()</em>, <strong>Exception -</strong> <em>" . $e->getMessage() . "</em>");
        }

        return $last_inserted_id;
    }

    /*
     * @name        : updateItem
     * @Description : The function is to update/edit a Pricing information
     * 				  in the database.
     * @return      : $success true/false
     */

    public function updateItem() {
        $success = false;
        try {

            if (!($this->pricing instanceof Base_Model_Lib_Product_Entity_Pricing))
                throw new Base_Model_Lib_Product_Exception(" Pricing Entity not intialized");

            $data = array(
                'currency' => $this->pricing->getCurrency(),
                'msetupfee' => $this->pricing->getMonthlySetupfee(),
                'qsetupfee' => $this->pricing->getQuarterlySetupfee(),
                'ssetupfee' => $this->pricing->getSemiAnnuallySetupfee(),
                'asetupfee' => $this->pricing->getAnnuallySetupfee(),
                'bsetupfee' => $this->pricing->getBienniallySetupfee(),
                'tsetupfee' => $this->pricing->getTrienniallySetupfee(),
                'monthly' => $this->pricing->getMonthlyFee(),
                'quarterly' => $this->pricing->getQuarterlyFee(),
                'semiannually' => $this->pricing->getSemiAnnuallyFee(),
                'annually' => $this->pricing->getAnnuallyFee(),
                'biennially' => $this->pricing->getBienniallyFee(),
                'triennially' => $this->pricing->getTrienniallyFee());

            $this->update($data, 'id = ' . (int) $this->pricing->getId());
            $success = true;
        } catch (Exception $e) {
            throw new Base_Model_Lib_Eav_Exception_Sql("<strong>Oops !, Error Class name -</strong>  <em>Base_Model_Lib_Product_Dao_Pricing</em>, <strong>Function -</strong> <em>updateItem()</em>, <strong>Exception -</strong> <em>" . $e->getMessage() . "</em>");
        }
        return $success;
    }

    /*
     * @name        : deleteItem
     * @Description : The function is to delete a Pricing information
     * 				  in the database.
     * @return      : $success true/false
     */

    public function deleteItem() {
        $success = false;
        try {

            if (!($this->pricing instanceof Base_Model_Lib_Product_Entity_Pricing))
                throw new Base_Model_Lib_Product_Exception(" Pricing Entity not intialized");

            if ($this->delete('id =' . (int) $this->pricing->getId()) == '1') {
                $success = true;
            }
        } catch (Exception $e) {
            throw new Base_Model_Lib_Eav_Exception_Sql("<strong>Oops !, Error Class name -</strong>  <em>Base_Model_Lib_Product_Dao_Pricing</em>, <strong>Function -</strong> <em>deleteItem()</em>, <strong>Exception -</strong> <em>" . $e->getMessage() . "</em>");
        }
        return $success;
    }

    /*
     * @name        : getAll
     * @Description : The function is to get all users information
     * 				  from the database.
     * @return      : Aray Of Entity User Object (Base_Model_Lib_User_Entity_User)
     */

    public function getAll($productId) {
        $pricing = array();

        try {
            $objPricing = new Base_Model_Lib_Product_Entity_Pricing ( );

            $select = $this->select()
                    ->from('tbl_pricing', array('id'))
                    ->where('tbl_product_id = ?', $productId);

            $result = $this->fetchAll($select);

            foreach ($result as $row) {
                $objPricing = $this->getItem($row->id);
                array_push($pricing, $objPricing);
            }
        } catch (Exception $e) {
            throw new Base_Model_Lib_Eav_Exception_Sql("<strong>Oops !, Error Class name -</strong>  <em>Base_Model_Lib_User_Entity_User</em>, <strong>Function -</strong> <em>getAll()</em>, <strong>Exception -</strong> <em>" . $e->getMessage() . "</em>");
        }
        return $pricing;
    }
    
    
    
    /*
     * @name        : getProductPriceByCurrency($productId,$currencyId)
     * @Description : The function is to get all users information
     * 				  from the database.
     * @return      : Aray Of Entity User Object (Base_Model_Lib_User_Entity_User)
     */

    public function getProductPriceByCurrency($productId,$currencyId,$productType) {
        $objPricing = null;

        try {
            $objPricing = new Base_Model_Lib_Product_Entity_Pricing ( );

            $select = $this->select()
                    ->from('tbl_pricing', array('id'))
                    ->where('tbl_product_id = ?', $productId)
                    ->where('currency = ?', $currencyId)
                    ->where('type = ?', $productType);
            //$sql = $select->__toString();
            //echo "$sql\n";
            //exit;
            $result = $this->fetchAll($select);
            
            foreach ($result as $row) {
                $objPricing = $this->getItem($row->id);
            }
        } catch (Exception $e) {
            throw new Base_Model_Lib_Eav_Exception_Sql("<strong>Oops !, Error Class name -</strong>  <em>Base_Model_Lib_User_Entity_User</em>, <strong>Function -</strong> <em>getAll()</em>, <strong>Exception -</strong> <em>" . $e->getMessage() . "</em>");
        }
        return $objPricing;
    }

}

?>
