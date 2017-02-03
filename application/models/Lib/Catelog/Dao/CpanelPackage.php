<?php

/**
 * @namespace       : Base
 * @package         : Model
 * @subpackage 		: Lib.Catelog.Dao
 * @name 			: CpanelPackage
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
class Base_Model_Lib_Catelog_Dao_CpanelPackage extends Zend_Db_Table {

    protected $_name = 'tbl_system_cpanel_Package'; // the table name
    protected $_primary = 'id'; // the primary key
    public $cpanelPackage;

    /*
     * @name        : getItem
     * @Description : The function is to get a cpanelPackage page information
     * 				  from the database.
     * @param       : $code (page code)
     * @return      : Entity CpanelPackage Object (Base_Model_Lib_Catelog_Entity_CpanelPackage)
     */

    public function getItem($id) {
        $objCpanelPackage = new Base_Model_Lib_Catelog_Entity_CpanelPackage( );

        try {

            $id = (int) $id;
            $row = $this->fetchRow('id = ' . $id);

            if ($row != "") {
                $result = $row->toArray();
                $objCpanelPackage->setId($row ['id']);
                $objCpanelPackage->setName($row ['packageName']);
            }
        } catch (Exception $e) {
            throw new Base_Model_Lib_Eav_Exception_Sql("<strong>Oops !, Error Class name -</strong>  <em>Base_Model_Lib_Catelog_Dao_CpanelPackage</em>, <strong>Function -</strong> <em>getItem()</em>, <strong>Exception -</strong> <em>" . $e->getMessage() . "</em>");
        }
        return $objCpanelPackage;
    }

    /*
     * @name        : getAll
     * @Description : The function is to get all cpanelPackage information
     * 				  from the database.
     * @return      : Aray Of Entity CpanelPackage Object (Base_Model_Lib_Catelog_Entity_CpanelPackage)
     */

    public function getAll() {
        $cpanelPackageInfo = array();

        try {
            $objCpanelPackage = new Base_Model_Lib_Catelog_Entity_CpanelPackage( );

            $select = $this->select()
                    ->from('tbl_system_cpanel_Package', array('id'));

            $result = $this->fetchAll($select);

            foreach ($result as $row) {
                $objCpanelPackage = $this->getItem($row->id);
                array_push($cpanelPackageInfo, $objCpanelPackage);
            }
        } catch (Exception $e) {
            throw new Base_Model_Lib_Eav_Exception_Sql("<strong>Oops !, Error Class name -</strong>  <em>Base_Model_Lib_User_Entity_User</em>, <strong>Function -</strong> <em>getAll()</em>, <strong>Exception -</strong> <em>" . $e->getMessage() . "</em>");
        }
        return $cpanelPackageInfo;
    }

}

?>