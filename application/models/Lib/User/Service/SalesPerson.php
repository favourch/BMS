<?php

/**
 * @namespace       : Base
 * @package         : Model
 * @subpackage 		: Lib.SalesPerson.Service
 * @name 			: SalesPerson
 * @author 			: Iyngaran Iyathurai
 * 			  		  Software eng - Monara IT (LTD) PVT
 * 			          E-Mail - Iyngaran55@yahoo.com, Iyngaran@bcas.lk
 *
 * @copyright Copyright (c) 2009 - 2010 Monara IT (LTD) PVT . (http://www.pluspro.com)
 *
 * Description : The Service class for the SalesPerson Object
 *
 */
class Base_Model_Lib_User_Service_SalesPerson extends Base_Model_Lib_Eav_Model_Service {

    public $salesPerson;

    /*
     * @name        : getItem
     * @Description : The function is to get a SalesPerson information
     * 				  from the database.
     * @param       : $id (Member Id)
     * @return      : Base_Model_Lib_User_Entity_SalesPerson
     */

    public function getSalesPerson($id) {
        $salesPerson = "";
        try {
            $objSalesPerson = new Base_Model_Lib_User_Dao_SalesPerson ( );
            $salesPerson = $objSalesPerson->getSalesPerson($id);
        } catch (Exception $e) {
            throw new Base_Model_Lib_User_Exception("<strong>Oops !, Error Class name -</strong>  <em>Base_Model_Lib_User_Service_Currency</em>, <strong>Function -</strong> <em>getItem()</em>, <strong>Exception -</strong> <em>" . $e->getMessage() . "</em>");
        }
        return $salesPerson;
    }

    /*
     * @name        : getAll()
     * @Description : The function is to get All SalesPerson information
     * 				  from the database.
     * @return      : Array Of Base_Model_Lib_Member_Entity_SalesPerson
     */

    public function getAll() {
        $salesPerson = "";
        try {
            $objSalesPerson = new Base_Model_Lib_User_Dao_SalesPerson();
            $salesPerson = $objSalesPerson->getAll();
        } catch (Exception $e) {
            throw new Base_Model_Lib_User_Exception("<strong>Oops !, Error Class name -</strong>  <em>Base_Model_Lib_User_Service_SalesPerson</em>, <strong>Function -</strong> <em>getAll()</em>, <strong>Exception -</strong> <em>" . $e->getMessage() . "</em>");
        }
        return $salesPerson;
    }
    
    
    /*
     * @name        : getAll()
     * @Description : The function is to get All SalesPerson information
     * 				  from the database.
     * @return      : Array Of Base_Model_Lib_Member_Entity_SalesPerson
     */

    public function getAllBySalesRole($salesRole) {
        $salesPerson = "";
        try {
            $objSalesPerson = new Base_Model_Lib_User_Dao_SalesPerson();
            $salesPerson = $objSalesPerson->getAllBySalesRole($salesRole);
        } catch (Exception $e) {
            throw new Base_Model_Lib_User_Exception("<strong>Oops !, Error Class name -</strong>  <em>Base_Model_Lib_User_Service_SalesPerson</em>, <strong>Function -</strong> <em>getAll()</em>, <strong>Exception -</strong> <em>" . $e->getMessage() . "</em>");
        }
        return $salesPerson;
    }

}
?>