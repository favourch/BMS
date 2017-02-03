<?php

/**
 * @namespace       : Base
 * @package         : Model
 * @subpackage 		: Lib.SalesRole.Service
 * @name 			: SalesRole
 * @author 			: Iyngaran Iyathurai
 * 			  		  Software eng - Monara IT (LTD) PVT
 * 			          E-Mail - Iyngaran55@yahoo.com, Iyngaran@bcas.lk
 *
 * @copyright Copyright (c) 2009 - 2010 Monara IT (LTD) PVT . (http://www.pluspro.com)
 *
 * Description : The Service class for the SalesRole Object
 *
 */
class Base_Model_Lib_User_Service_SalesRole extends Base_Model_Lib_Eav_Model_Service {

    public $salesRole;

    /*
     * @name        : getItem
     * @Description : The function is to get a SalesRole information
     * 				  from the database.
     * @param       : $id (Member Id)
     * @return      : Base_Model_Lib_User_Entity_SalesRole
     */

    public function getItem($id) {
        $salesRole = "";
        try {
            $objSalesRole = new Base_Model_Lib_User_Dao_SalesRole ( );
            $salesRole = $objSalesRole->getItem($id);
        } catch (Exception $e) {
            throw new Base_Model_Lib_User_Exception("<strong>Oops !, Error Class name -</strong>  <em>Base_Model_Lib_User_Service_Currency</em>, <strong>Function -</strong> <em>getItem()</em>, <strong>Exception -</strong> <em>" . $e->getMessage() . "</em>");
        }
        return $salesRole;
    }

    /*
     * @name        : getAll()
     * @Description : The function is to get All SalesRole information
     * 				  from the database.
     * @return      : Array Of Base_Model_Lib_Member_Entity_SalesRole
     */

    public function getAll() {
        $salesRole = "";
        try {
            $objSalesRole = new Base_Model_Lib_User_Dao_SalesRole();
            $salesRole = $objSalesRole->getAll();
        } catch (Exception $e) {
            throw new Base_Model_Lib_User_Exception("<strong>Oops !, Error Class name -</strong>  <em>Base_Model_Lib_User_Service_SalesRole</em>, <strong>Function -</strong> <em>getAll()</em>, <strong>Exception -</strong> <em>" . $e->getMessage() . "</em>");
        }
        return $salesRole;
    }

}
?>