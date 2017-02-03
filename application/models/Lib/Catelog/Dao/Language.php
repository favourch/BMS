<?php

/**
 * @namespace       : Base
 * @package         : Model
 * @subpackage 		: Lib.Catelog.Dao
 * @name 			: Language
 * @author 			: Iyngaran Iyathurai
 * 			  		  Software eng - Bcas R&D
 * 			          E-Mail - Iyngaran55@yahoo.com, Iyngaran@bcas.lk
 *
 * @copyright Copyright (c) 2009 - 2010 SaaiSoft . (http://www.saaisoft.com/)
 *
 * @Created on     	: 11-04-2010
 * @Modified on     : 11-04-2010
 *
 */
class Base_Model_Lib_Catelog_Dao_Language extends Zend_Db_Table {

    protected $_name = 'tbl_language_list'; // the table name
    protected $_primary = 'id'; // the primary key
    public $language;

    /*
     * @name        : getItem
     * @Description : The function is to get a language page information
     * 				  from the database.
     * @param       : $code (page code)
     * @return      : Entity Language Object (Base_Model_Lib_Catelog_Entity_Language)
     */

    public function getItem($id) {
        $objLanguage = new Base_Model_Lib_Catelog_Entity_Language( );

        try {

            $id = (int) $id;
            $row = $this->fetchRow('id = ' . $id);

            if ($row != "") {
                $result = $row->toArray();
                $objLanguage->setId($row ['id']);
                $objLanguage->setName($row ['name']);
                $objLanguage->setLanguageCode($row ['language_code']);
            }
        } catch (Exception $e) {
            throw new Base_Model_Lib_Eav_Exception_Sql("<strong>Oops !, Error Class name -</strong>  <em>Base_Model_Lib_Catelog_Dao_Language</em>, <strong>Function -</strong> <em>getItem()</em>, <strong>Exception -</strong> <em>" . $e->getMessage() . "</em>");
        }
        return $objLanguage;
    }

    /*
     * @name        : getAll
     * @Description : The function is to get all language information
     * 				  from the database.
     * @return      : Aray Of Entity Language Object (Base_Model_Lib_Catelog_Entity_Language)
     */

    public function getAll() {
        $languageInfo = array();

        try {
            $objLanguage = new Base_Model_Lib_Catelog_Entity_Language( );

            $select = $this->select()
                    ->from('tbl_language_list', array('id'));

            $result = $this->fetchAll($select);

            foreach ($result as $row) {
                $objLanguage = $this->getItem($row->id);
                array_push($languageInfo, $objLanguage);
            }
        } catch (Exception $e) {
            throw new Base_Model_Lib_Eav_Exception_Sql("<strong>Oops !, Error Class name -</strong>  <em>Base_Model_Lib_User_Entity_User</em>, <strong>Function -</strong> <em>getAll()</em>, <strong>Exception -</strong> <em>" . $e->getMessage() . "</em>");
        }
        return $languageInfo;
    }

}

?>