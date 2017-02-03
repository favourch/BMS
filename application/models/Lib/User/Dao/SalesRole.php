<?php

/**
 * @namespace       : Base
 * @package         : Model
 * @subpackage 		: Lib.User.Dao
 * @name 			: User
 * @author 			: Iyngaran Iyathurai
 * 			  		  Software eng - Bcas R&D
 * 			          E-Mail - Iyngaran55@yahoo.com, Iyngaran@bcas.lk
 *
 * @copyright Copyright (c) 2009 - 2010 BCAS R&D . (http://www.lab.bcasrd.com)
 *
 * Description : The object-oriented interface to bcas database table tbl_user
 *
 */
class Base_Model_Lib_User_Dao_SalesRole extends Zend_Db_Table {

    protected $_name = 'tbl_sales_role'; // the table name
    protected $_primary = 'id'; // the primary key
    // the user object
    public $salesRole;

    // the methods goes from here......
    /*
     * @name        : getSalesRole
     * @Description : The function is to get a SalesRole information
     * 				  from the database.
     * @param       : $id (User Id)
     * @return      : Entity SalesRole Object (Base_Model_Lib_User_Entity_SalesRole)
     */

    public function getSalesRole($id) {
        $objSalesRole = new Base_Model_Lib_User_Entity_SalesRole();
        try {

            $id = (int) $id;
            $row = $this->fetchRow('id = ' . $id);

            if ($row != "") {
                $result = $row->toArray();
                $objSalesRole->setId($result['id']);
                $objSalesRole->setRole($result['role']);
                $objSalesRole->setStatus($result['status']);
            }
        } catch (Exception $e) {
            throw new Base_Model_Lib_Eav_Exception_Sql("<strong>Oops !, Error Class name -</strong>  <em>Base_Model_Lib_User_Dao_User</em>, <strong>Function -</strong> <em>getUser()</em>, <strong>Exception -</strong> <em>" . $e->getMessage() . "</em>");
        }
        return $objSalesRole;
    }

    /*
     * @name        : getAll
     * @Description : The function is to get all users information
     * 				  from the database.
     * @return      : Aray Of Entity User Object (Base_Model_Lib_User_Entity_User)
     */

    public function getAll() {
        $salesRoles = array();

        try {
            $objSalesRole = new Base_Model_Lib_User_Entity_SalesRole();

            $select = $this->select()
                    ->from('tbl_sales_role', array('id'));

            $result = $this->fetchAll($select);

            foreach ($result as $row) {
                $objSalesRole = $this->getSalesRole($row->id);
                array_push($salesRoles, $objSalesRole);
            }
        } catch (Exception $e) {
            throw new Base_Model_Lib_Eav_Exception_Sql("<strong>Oops !, Error Class name -</strong>  <em>Base_Model_Lib_User_Entity_User</em>, <strong>Function -</strong> <em>getAll()</em>, <strong>Exception -</strong> <em>" . $e->getMessage() . "</em>");
        }
        return $salesRoles;
    }

}

?>