<?php

/**
 * @namespace       : Base
 * @package         : Model
 * @subpackage 		: Lib.Catelog.Dao
 * @name 			: Department
 * @author 			: Iyngaran Iyathurai
 * 			  		  Software eng - Bcas R&D
 * 			          E-Mail - Iyngaran55@yahoo.com, Iyngaran@bcas.lk
 * 
 * @copyright Copyright (c) 2009 - 2010 BCAS R&D . (http://www.lab.bcasrd.com)
 * 
 * Description : The object-oriented interface to bcas database table tbl_department 
 * 	
 */
class Base_Model_Lib_Catelog_Dao_Department extends Zend_Db_Table {

    protected $_name = 'tbl_department'; // the table name 
    protected $_primary = 'id'; // the primary key
    // the department object
    public $department;

    // the functions goes from here
    /*
     * @name        : getDepartment
     * @Description : The function is to get a department information
     * 				  from the database.
     * @param       : $id (Department Id)
     * @return      : The Entity Department Object (Base_Model_Lib_Department_Entity_Department)
     */

    public function getItem($id) {
        $objDepartment = new Base_Model_Lib_Catelog_Entity_Department();
        try {

            $id = (int) $id;
            $row = $this->fetchRow('id = ' . $id);

            if ($row != "") {
                $result = $row->toArray();
                $objDepartment->setId($result ['id']);
                $objDepartment->setName($result ['name']);
                $objDepartment->setAddedOn($result ['added_on']);
                $objDepartment->setModifiedOn($result ['modified_on']);
                $objDepartment->setModifiedBy($result ['recently_modified_by']);
            }
        } catch (Exception $e) {
            throw new Base_Model_Lib_Eav_Exception_Sql("<strong>Oops !, Error Class name -</strong>  <em>Base_Model_Lib_Catelog_Dao_Department</em>, <strong>Function -</strong> <em>getDepartment()</em>, <strong>Exception -</strong> <em>" . $e->getMessage() . "</em>");
        }
        return $objDepartment;
    }

    /*
     * @name        : addDepartment
     * @Description : The function is to add a department information
     * 				  to the database.
     * @return      : Integer $last_inserted_id
     */

    public function addItem() {
        $last_inserted_id = 0;

        try {

            if (!($this->department instanceof Base_Model_Lib_Catelog_Entity_Department))
                throw new Base_Model_Lib_Catelog_Exception(" Department Entity not intialized");

            $data = array(
                'name' => $this->department->getName(),
                'tbl_branches_id' => $this->department->getBranch(),
                'added_on' => $this->department->getAddedOn(),
                'modified_on' => $this->department->getModifiedOn(),
                'recently_modified_by' => $this->department->getModifiedBy()
            );

            $last_inserted_id = $this->insert($data);
        } catch (Exception $e) {
            throw new Base_Model_Lib_Eav_Exception_Sql("<strong>Oops !, Error Class name -</strong>  <em>Base_Model_Lib_Catelog_Dao_Department</em>, <strong>Function -</strong> <em>addDepartment()</em>, <strong>Exception -</strong> <em>" . $e->getMessage() . "</em>");
        }

        return $last_inserted_id;
    }

    /*
     * @name        : updateDepartment
     * @Description : The function is to update/edit a department information
     * 				  in the database.
     * @return      : $success true/false
     */

    public function updateItem() {
        $success = false;
        try {

            if (!($this->department instanceof Base_Model_Lib_Catelog_Entity_Department))
                throw new Base_Model_Lib_Catelog_Exception(" Department Entity not intialized");

            $data = array(
                'name' => $this->department->getName(),
                'tbl_branches_id' => $this->department->getBranch(),
                'modified_on' => $this->department->getModifiedOn(),
                'recently_modified_by' => $this->department->getModifiedBy()
            );

            $this->update($data, 'id = ' . (int) $this->department->getId());
            $success = true;
        } catch (Exception $e) {
            throw new Base_Model_Lib_Eav_Exception_Sql("<strong>Oops !, Error Class name -</strong>  <em>Base_Model_Lib_Catelog_Dao_Department</em>, <strong>Function -</strong> <em>updateDepartment()</em>, <strong>Exception -</strong> <em>" . $e->getMessage() . "</em>");
        }
        return $success;
    }

    /*
     * @name        : deleteDepartment
     * @Description : The function is to update/edit a department information
     * 				  in the database.
     * @return      : $success true/false
     */

    public function deleteItem() {
        $success = false;
        try {

            if (!($this->department instanceof Base_Model_Lib_Catelog_Entity_Department))
                throw new Base_Model_Lib_Catelog_Exception(" Department Entity not intialized");

            if ($this->delete('id =' . (int) $this->department->getId()) == '1') {
                $success = true;
            }
        } catch (Exception $e) {
            throw new Base_Model_Lib_Eav_Exception_Sql("<strong>Oops !, Error Class name -</strong>  <em>Base_Model_Lib_Department_Dao_Department</em>, <strong>Function -</strong> <em>deleteDepartment()</em>, <strong>Exception -</strong> <em>" . $e->getMessage() . "</em>");
        }
        return $success;
    }

    /*
     * @name        : getAll
     * @Description : The function is to get all department information
     * 				  from the database.
     * @return      : Aray Of Entity Department Object (Base_Model_Lib_Department_Entity_Departmen)
     */

    public function getAll() {
        $departments = array();

        try {
            $objDepartment = new Base_Model_Lib_Catelog_Entity_Department( );

            $select = $this->select()
                    ->from('tbl_department', array('id'));

            $result = $this->fetchAll($select);

            foreach ($result as $row) {
                $objDepartment = $this->getItem($row->id);
                array_push($departments, $objDepartment);
            }
        } catch (Exception $e) {
            throw new Base_Model_Lib_Eav_Exception_Sql("<strong>Oops !, Error Class name -</strong>  <em>Base_Model_Lib_Catelog_Entity_Department</em>, <strong>Function -</strong> <em>getAll()</em>, <strong>Exception -</strong> <em>" . $e->getMessage() . "</em>");
        }
        return $departments;
    }

}

?>