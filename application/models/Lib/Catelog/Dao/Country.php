<?php

/**
 * @namespace       : Base
 * @package         : Model
 * @subpackage 		: Lib.Catelog.Dao
 * @name 			: Country
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
class Base_Model_Lib_Catelog_Dao_Country extends Zend_Db_Table {

    protected $_name = 'tbl_country_name_list'; // the table name
    protected $_primary = 'id'; // the primary key
    public $country;

    /*
     * @name        : getItem
     * @Description : The function is to get a country page information
     * 				  from the database.
     * @param       : $code (page code)
     * @return      : Entity Country Object (Base_Model_Lib_Catelog_Entity_Country)
     */

    public function getItem($id) {
        $objCountry = new Base_Model_Lib_Catelog_Entity_Country( );

        try {

            $id = (int) $id;
            $row = $this->fetchRow('id = ' . $id);

            if ($row != "") {
                $result = $row->toArray();
                $objCountry->setId($row ['id']);
                $objCountry->setName($row ['name']);
                $objCountry->setCountryCode($row ['country_code']);
            }
        } catch (Exception $e) {
            throw new Base_Model_Lib_Eav_Exception_Sql("<strong>Oops !, Error Class name -</strong>  <em>Base_Model_Lib_Catelog_Dao_Country</em>, <strong>Function -</strong> <em>getItem()</em>, <strong>Exception -</strong> <em>" . $e->getMessage() . "</em>");
        }
        return $objCountry;
    }

    /*
     * @name        : getAll
     * @Description : The function is to get all country information
     * 				  from the database.
     * @return      : Aray Of Entity Country Object (Base_Model_Lib_Catelog_Entity_Country)
     */

    public function getAll() {
        $countryInfo = array();

        try {
            $objCountry = new Base_Model_Lib_Catelog_Entity_Country( );

            $select = $this->select()
                    ->from('tbl_country_name_list', array('id'));

            $result = $this->fetchAll($select);

            foreach ($result as $row) {
                $objCountry = $this->getItem($row->id);
                array_push($countryInfo, $objCountry);
            }
        } catch (Exception $e) {
            throw new Base_Model_Lib_Eav_Exception_Sql("<strong>Oops !, Error Class name -</strong>  <em>Base_Model_Lib_User_Entity_User</em>, <strong>Function -</strong> <em>getAll()</em>, <strong>Exception -</strong> <em>" . $e->getMessage() . "</em>");
        }
        return $countryInfo;
    }
    
    
    
    /*
     * @name        : getAll
     * @Description : The function is to get all country information
     * 				  from the database.
     * @return      : Aray Of Entity Country Object (Base_Model_Lib_Catelog_Entity_Country)
     */

    public function getCountryByCode($countryCode) {
        $countryInfo = array();

        try {
            $objCountry = new Base_Model_Lib_Catelog_Entity_Country( );

            $select = $this->select()
                    ->from('tbl_country_name_list', array('id'))
                    ->where('country_code = ?', $countryCode);

            $result = $this->fetchAll($select);

            foreach ($result as $row) {
                $objCountry = $this->getItem($row->id);
                return $objCountry;
            }
        } catch (Exception $e) {
            throw new Base_Model_Lib_Eav_Exception_Sql("<strong>Oops !, Error Class name -</strong>  <em>Base_Model_Lib_User_Entity_User</em>, <strong>Function -</strong> <em>getAll()</em>, <strong>Exception -</strong> <em>" . $e->getMessage() . "</em>");
        }
        return $countryInfo;
    }

}

?>