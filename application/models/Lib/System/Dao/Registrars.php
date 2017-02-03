<?php

/**
 * @namespace       : Base
 * @package         : Model
 * @subpackage 		: Lib.System.Dao
 * @name 			: Registrars
 * @author 			: Iyngaran Iyathurai
 * 			  		  Software eng - Bcas R&D
 * 			          E-Mail - Iyngaran55@yahoo.com, Iyngaran@bcas.lk
 *
 * @copyright Copyright (c) 2009 - 2010 Jasmin Media . (http://www.jasmin-media.com/)
 *
 * @Created on     	: 11-04-2010
 * @Modified on     : 11-04-2010
 *
 */
class Base_Model_Lib_System_Dao_Registrars extends Zend_Db_Table {

    protected $_name = 'tbl_registrars'; // the table name
    protected $_primary = 'id'; // the primary key
    public $registrars;

    /*
     * @name        : getItem
     * @Description : The function is to get a Registrars information
     * 				  from the database.
     * @param       : $id (Registrars Id)
     * @return      : Entity Registrars Object (Base_Model_Lib_System_Entity_Registrars)
     */

    public function getItem($registrarsId) {
        $objRegistrars = new Base_Model_Lib_System_Entity_Registrars ( );
        try {

            $id = (int) $registrarsId;
            $row = $this->fetchRow('id = ' . $id);

            if ($row != "") {
                $result = $row->toArray();
                $objRegistrars->setId($row ['id']);
                $objRegistrars->setDescription($row ['description']);
                $objRegistrars->setImage_logo($row ['image_logo']);
                $objRegistrars->setIs_test_mode($row ['is_test_mode']);
                $objRegistrars->setName($row ['name']);
                $objRegistrars->setPassword_2($row ['password_2']);
                $objRegistrars->setStatus($row ['status']);
                $objRegistrars->setUsername($row ['username']);
            }
        } catch (Exception $e) {
            throw new Base_Model_Lib_Eav_Exception_Sql("<strong>Oops !, Error Class name -</strong>" . $e->getMessage());
        }
        return $objRegistrars;
    }

    /*
     * @name        : updateItem
     * @Description : The function is to update/edit a Registrars information
     * 				  in the database.
     * @return      : $success true/false
     */

    public function updateItem() {
        $success = false;
        try {

            if (!($this->registrars instanceof Base_Model_Lib_System_Entity_Registrars))
                throw new Base_Model_Lib_System_Exception(" Registrars Entity not intialized");

            $data = array('name' => $this->registrars->getName(),
                'description' => $this->registrars->getDescription(),
                'status' => $this->registrars->getStatus(),
                'username' => $this->registrars->getUsername(),
                'password_2' => $this->registrars->getPassword_2(),
                'is_test_mode' => $this->registrars->getIs_test_mode());

            $this->update($data, 'id = ' . (int) $this->registrars->getId());
            $success = true;
        } catch (Exception $e) {
            throw new Base_Model_Lib_Eav_Exception_Sql("<strong>Oops !, Error Class name -</strong>" . $e->getMessage());
        }
        return $success;
    }

    /*
     * @name        : addItem
     * @Description : The function is to add a Registrars information
     * 				  to the database.
     * @return      : Integer $last_inserted_id
     */

    public function addItem() {
        $last_inserted_id = 0;
        try {

            if (!($this->registrars instanceof Base_Model_Lib_System_Entity_Registrars))
                throw new Base_Model_Lib_System_Exception(" Registrars Entity not intialized");

            $data = array('name' => $this->registrars->getName(),
                'image_logo' => $this->registrars->getImage_logo(),
                'description' => $this->registrars->getDescription(),
                'status' => $this->registrars->getStatus(),
                'username' => $this->registrars->getUsername(),
                'password_2' => $this->registrars->getPassword_2(),
                'is_test_mode' => $this->registrars->getIs_test_mode());

            $last_inserted_id = $this->insert($data);
        } catch (Exception $e) {
            throw new Base_Model_Lib_Eav_Exception_Sql("<strong>Oops !, Error Class name -</strong>" . $e->getMessage());
        }

        return $last_inserted_id;
    }

    /*
     * @name        : getAllByType
     * @Description : The function is to get all users information
     * 				  from the database.
     * @return      : Aray Of Entity User Object (Base_Model_Lib_User_Entity_User)
     */

    public function getAll() {
        $registrarsValues = array();
        try {
            $objRegistrars = new Base_Model_Lib_System_Entity_Registrars();

            $select = $this->select()
                    ->from('tbl_registrars', array('id'));


            $result = $this->fetchAll($select);

            foreach ($result as $row) {
                $objRegistrars = $this->getItem($row->id);
                array_push($registrarsValues, $objRegistrars);
            }
        } catch (Exception $e) {
            throw new Base_Model_Lib_Eav_Exception_Sql("<strong>Oops !, Error Class name -</strong>" . $e->getMessage());
        }
        return $registrarsValues;
    }

    /*
     * @name        : deleteItem
     * @Description : The function is to add a Registrars information
     * 				  to the database.
     * @return      : Integer $last_inserted_id
     */

    public function deleteItem() {
        $success = false;
        try {

            if (!($this->registrars instanceof Base_Model_Lib_System_Entity_Registrars))
                throw new Base_Model_Lib_System_Exception(" Registrars Entity not intialized");

            if ($this->delete('id =' . (int) $this->registrars->getId()) == '1') {
                $success = true;
            }
        } catch (Exception $e) {
            throw new Base_Model_Lib_Eav_Exception_Sql("<strong>Oops !, Error Class name -</strong>" . $e->getMessage());
        }

        return $success;
    }
    
    
    /*
     * @name        : getAllByStatys($status)
     * @Description : The function is to get all users information
     * 				  from the database.
     * @return      : Aray Of Entity User Object (Base_Model_Lib_User_Entity_User)
     */

    public function getAllByStatus($status) {
        $registrarsValues = array();
        try {
            $objRegistrars = new Base_Model_Lib_System_Entity_Registrars();

            $select = $this->select()
                    ->from('tbl_registrars', array('id'))
                    ->where('status = ?',$status);


            $result = $this->fetchAll($select);

            foreach ($result as $row) {
                $objRegistrars = $this->getItem($row->id);
                array_push($registrarsValues, $objRegistrars);
            }
        } catch (Exception $e) {
            throw new Base_Model_Lib_Eav_Exception_Sql("<strong>Oops !, Error Class name -</strong>" . $e->getMessage());
        }
        return $registrarsValues;
    }

}
?>