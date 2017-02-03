<?php

/**
 * @namespace       : Base
 * @package         : Model
 * @subpackage 		: Lib.Catelog.Service
 * @name 			: Language
 * @author 			: Iyngaran Iyathurai
 * 			  		  Software eng - Bcas R&D
 * 			          E-Mail - Iyngaran55@yahoo.com, Iyngaran@bcas.lk
 *
 * @copyright Copyright (c) 2009 - 2010 BCAS R&D . (http://www.lab.bcasrd.com)
 *
 * Description : The Service class for the Language Object
 *
 */
class Base_Model_Lib_Catelog_Service_Language extends Base_Model_Lib_Eav_Model_Service {

    public $language;

    /*
     * @name        : getItem
     * @Description : The function is to get a language page information
     * 				  from the database.
     * @param       : $code (Page code)
     * @return      : Base_Model_Lib_Catelog_Entity_Language
     */

    public function getItem($id) {
        $languageInfo = "";
        try {
            $objLanguageDao = new Base_Model_Lib_Catelog_Dao_Language();
            $languageInfo = $objLanguageDao->getItem($id);
        } catch (Exception $e) {
            throw new Base_Model_Lib_Catelog_Exception("<strong>Oops !, Error Class name -</strong>  <em>Base_Model_Lib_Catelog_Service_Language</em>, <strong>Function -</strong> <em>getItem()</em>, <strong>Exception -</strong> <em>" . $e->getMessage() . "</em>");
        }
        return $languageInfo;
    }

    /*
     * @name        : getItem
     * @Description : The function is to get a language page information
     * 				  from the database.
     * @param       : $code (Page code)
     * @return      : Base_Model_Lib_Catelog_Entity_Language
     */

    public function getAll() {
        $languageInfo = "";
        try {
            $objLanguageDao = new Base_Model_Lib_Catelog_Dao_Language();
            $languageInfo = $objLanguageDao->getAll();
        } catch (Exception $e) {
            throw new Base_Model_Lib_Catelog_Exception("<strong>Oops !, Error Class name -</strong>  <em>Base_Model_Lib_Catelog_Service_Language</em>, <strong>Function -</strong> <em>getItem()</em>, <strong>Exception -</strong> <em>" . $e->getMessage() . "</em>");
        }
        return $languageInfo;
    }

}

?>