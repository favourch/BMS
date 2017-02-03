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
class Base_Model_Lib_User_Dao_SalesPerson extends Zend_Db_Table {

    protected $_name = 'tbl_sales_person'; // the table name
    protected $_primary = 'id'; // the primary key
    // the user object
    public $salesPerson;

    // the methods goes from here......
    /*
     * @name        : getSalesPerson
     * @Description : The function is to get a SalesPerson information
     * 				  from the database.
     * @param       : $id (User Id)
     * @return      : Entity SalesPerson Object (Base_Model_Lib_User_Entity_SalesPerson)
     */

    public function getSalesPerson($id) {
        $objSalesPerson = new Base_Model_Lib_User_Entity_SalesPerson();
        try {

            $id = (int) $id;
            $row = $this->fetchRow('id = ' . $id);

            if ($row != "") {
                $result = $row->toArray();
                $objSalesPerson->setId($result['id']);
                $objSalesPerson->setFirstName($result['firstName']);
                $objSalesPerson->setLastName($result['lastName']);
                $objSalesPerson->setSalesRole($result['salesRole']);
                $objSalesPerson->setNotes($result['notes']);
                $objSalesPerson->setStatus($result['status']);
                $objSalesPerson->setActive($result['active']);
                $objSalesPerson->setSalecomm($result['salecomm']);
                $objSalesPerson->setRecurcomm($result['recurcomm']);
                $objSalesPerson->setAddress($result['address']);
                $objSalesPerson->setAddress_line_2($result['address_line_2']);
                $objSalesPerson->setTown($result['town']);
                $objSalesPerson->setCounty($result['county']);
                $objSalesPerson->setPost_code($result['post_code']);
                $objSalesPerson->setLeadCommission($result['leadCommission']);
            }
        } catch (Exception $e) {
            throw new Base_Model_Lib_Eav_Exception_Sql("<strong>Oops !, Error Class name -</strong>  <em>Base_Model_Lib_User_Dao_User</em>, <strong>Function -</strong> <em>getUser()</em>, <strong>Exception -</strong> <em>" . $e->getMessage() . "</em>");
        }
        return $objSalesPerson;
    }

    /*
     * @name        : getAll
     * @Description : The function is to get all users information
     * 				  from the database.
     * @return      : Aray Of Entity User Object (Base_Model_Lib_User_Entity_User)
     */

    public function getAll() {
        $salesPersons = array();

        try {
            $objSalesPerson = new Base_Model_Lib_User_Entity_SalesPerson();

            $select = $this->select()
                    ->from('tbl_sales_person', array('id'));

            $result = $this->fetchAll($select);

            foreach ($result as $row) {
                $objSalesPerson = $this->getSalesPerson($row->id);
                array_push($salesPersons, $objSalesPerson);
            }
        } catch (Exception $e) {
            throw new Base_Model_Lib_Eav_Exception_Sql("<strong>Oops !, Error Class name -</strong>  <em>Base_Model_Lib_User_Entity_User</em>, <strong>Function -</strong> <em>getAll()</em>, <strong>Exception -</strong> <em>" . $e->getMessage() . "</em>");
        }
        return $salesPersons;
    }
    
    
    
      /*
     * @name        : getAllBySalesRole()
     * @Description : The function is to get all users information
     * 				  from the database.
     * @return      : Aray Of Entity User Object (Base_Model_Lib_User_Entity_User)
     */

    public function getAllBySalesRole($salesRole) {
        $salesPersons = array();

        try {
            $objSalesPerson = new Base_Model_Lib_User_Entity_SalesPerson();

            $select = $this->select()
                    ->from('tbl_sales_person', array('id'))
                     ->where('salesRole = ?',$salesRole);

            $result = $this->fetchAll($select);

            foreach ($result as $row) {
                $objSalesPerson = $this->getSalesPerson($row->id);
                array_push($salesPersons, $objSalesPerson);
            }
        } catch (Exception $e) {
            throw new Base_Model_Lib_Eav_Exception_Sql("<strong>Oops !, Error Class name -</strong>  <em>Base_Model_Lib_User_Entity_User</em>, <strong>Function -</strong> <em>getAll()</em>, <strong>Exception -</strong> <em>" . $e->getMessage() . "</em>");
        }
        return $salesPersons;
    }

}

?>