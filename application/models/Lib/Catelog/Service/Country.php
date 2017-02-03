<?php

/**
 * @namespace       : Base
 * @package         : Model
 * @subpackage 		: Lib.Catelog.Service
 * @name 			: Country
 * @author 			: Iyngaran Iyathurai
 * 			  		  Software eng - Bcas R&D
 * 			          E-Mail - Iyngaran55@yahoo.com, Iyngaran@bcas.lk
 *
 * @copyright Copyright (c) 2009 - 2010 BCAS R&D . (http://www.lab.bcasrd.com)
 *
 * Description : The Service class for the Country Object
 *
 */
class Base_Model_Lib_Catelog_Service_Country extends Base_Model_Lib_Eav_Model_Service {

    public $country;

    /*
     * @name        : getItem
     * @Description : The function is to get a country page information
     * 				  from the database.
     * @param       : $code (Page code)
     * @return      : Base_Model_Lib_Catelog_Entity_Country
     */

    public function getItem($id) {
        $countryInfo = "";
        try {
            $objCountryDao = new Base_Model_Lib_Catelog_Dao_Country();
            $countryInfo = $objCountryDao->getItem($id);
        } catch (Exception $e) {
            throw new Base_Model_Lib_Catelog_Exception("<strong>Oops !, Error Class name -</strong>  <em>Base_Model_Lib_Catelog_Service_Country</em>, <strong>Function -</strong> <em>getItem()</em>, <strong>Exception -</strong> <em>" . $e->getMessage() . "</em>");
        }
        return $countryInfo;
    }

    /*
     * @name        : getItem
     * @Description : The function is to get a country page information
     * 				  from the database.
     * @param       : $code (Page code)
     * @return      : Base_Model_Lib_Catelog_Entity_Country
     */

    public function getAll() {
        $countryInfo = "";
        try {
            $objCountryDao = new Base_Model_Lib_Catelog_Dao_Country();
            $countryInfo = $objCountryDao->getAll();
        } catch (Exception $e) {
            throw new Base_Model_Lib_Catelog_Exception("<strong>Oops !, Error Class name -</strong>  <em>Base_Model_Lib_Catelog_Service_Country</em>, <strong>Function -</strong> <em>getItem()</em>, <strong>Exception -</strong> <em>" . $e->getMessage() . "</em>");
        }
        return $countryInfo;
    }

    
     public function getCountryByCode($countryCode) {
        $countryInfo = "";
        try {
            $objCountryDao = new Base_Model_Lib_Catelog_Dao_Country();
            $countryInfo = $objCountryDao->getCountryByCode($countryCode);
        } catch (Exception $e) {
            throw new Base_Model_Lib_Catelog_Exception("<strong>Oops !, Error Class name -</strong>  <em>Base_Model_Lib_Catelog_Service_Country</em>, <strong>Function -</strong> <em>getItem()</em>, <strong>Exception -</strong> <em>" . $e->getMessage() . "</em>");
        }
        return $countryInfo;
    }

    
}

?>