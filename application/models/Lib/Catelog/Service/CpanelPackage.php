<?php

/**
 * @namespace       : Base
 * @package         : Model
 * @subpackage 		: Lib.Catelog.Service
 * @name 			: CpanelPackage
 * @author 			: Iyngaran Iyathurai
 * 			  		  Software eng - Bcas R&D
 * 			          E-Mail - Iyngaran55@yahoo.com, Iyngaran@bcas.lk
 *
 * @copyright Copyright (c) 2009 - 2010 BCAS R&D . (http://www.lab.bcasrd.com)
 *
 * Description : The Service class for the CpanelPackage Object
 *
 */
class Base_Model_Lib_Catelog_Service_CpanelPackage extends Base_Model_Lib_Eav_Model_Service {

    public $cpanelPackage;

    /*
     * @name        : getItem
     * @Description : The function is to get a cpanelPackage page information
     * 				  from the database.
     * @param       : $code (Page code)
     * @return      : Base_Model_Lib_Catelog_Entity_CpanelPackage
     */

    public function getItem($id) {
        $cpanelPackageInfo = "";
        try {
            $objCpanelPackageDao = new Base_Model_Lib_Catelog_Dao_CpanelPackage();
            $cpanelPackageInfo = $objCpanelPackageDao->getItem($id);
        } catch (Exception $e) {
            throw new Base_Model_Lib_Catelog_Exception("<strong>Oops !, Error Class name -</strong>  <em>Base_Model_Lib_Catelog_Service_CpanelPackage</em>, <strong>Function -</strong> <em>getItem()</em>, <strong>Exception -</strong> <em>" . $e->getMessage() . "</em>");
        }
        return $cpanelPackageInfo;
    }

    /*
     * @name        : getItem
     * @Description : The function is to get a cpanelPackage page information
     * 				  from the database.
     * @param       : $code (Page code)
     * @return      : Base_Model_Lib_Catelog_Entity_CpanelPackage
     */

    public function getAll() {
        $cpanelPackageInfo = "";
        try {
            $objCpanelPackageDao = new Base_Model_Lib_Catelog_Dao_CpanelPackage();
            $cpanelPackageInfo = $objCpanelPackageDao->getAll();
        } catch (Exception $e) {
            throw new Base_Model_Lib_Catelog_Exception("<strong>Oops !, Error Class name -</strong>  <em>Base_Model_Lib_Catelog_Service_CpanelPackage</em>, <strong>Function -</strong> <em>getItem()</em>, <strong>Exception -</strong> <em>" . $e->getMessage() . "</em>");
        }
        return $cpanelPackageInfo;
    }

}

?>