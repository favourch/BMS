<?php

/**
 * @namespace       : Base
 * @package         : Model
 * @subpackage 		: Lib.Department.Service
 * @name 			: Department
 * @author 			: Iyngaran Iyathurai
 * 			  		  Software eng - Bcas R&D
 * 			          E-Mail - Iyngaran55@yahoo.com, Iyngaran@bcas.lk
 * 
 * @copyright Copyright (c) 2009 - 2010 BCAS R&D . (http://www.lab.bcasrd.com)
 * 
 * Description : The Service class for the Department Object 
 * 	
 */
class Base_Model_Lib_Catelog_Service_Department extends Base_Model_Lib_Eav_Model_Service {

    // the department object
    public $department;

    // the methods goes from here....
    /*
     * @name        : getItem($id)
     * @Description : The function is to get a department information
     * 				  from the database.
     * @param       : $id (Department Id)
     * @return      : Base_Model_Lib_Department_Entity_Department
     */

    public function getItem($id) {
        $department = "";
        try {
            $objDepartment = new Base_Model_Lib_Catelog_Dao_Department();
            $department = $objDepartment->getItem($id);
        } catch (Exception $e) {
            throw new Base_Model_Lib_Catelog_Exception("<strong>Oops !, Error Class name -</strong>  <em>Base_Model_Lib_Catelog_Service_Department</em>, <strong>Function -</strong> <em>getItem()</em>, <strong>Exception -</strong> <em>" . $e->getMessage() . "</em>");
        }
        return $department;
    }

    /*
     * @name        : addItem()
     * @Description : The function is to add a department information
     * 				  to the database.
     * @return      : Integer $last_inserted_id
     */

    public function addItem() {
        $last_inserted_id = 0;
        try {

            if (!($this->department instanceof Base_Model_Lib_Catelog_Entity_Department))
                throw new Base_Model_Lib_Catelog_Exception(" Department Entity not intialized");

            $objDepartmentDao = new Base_Model_Lib_Catelog_Dao_Department();
            $objDepartmentDao->department = $this->department;
            $last_inserted_id = $objDepartmentDao->addItem();
        } catch (Exception $e) {
            throw new Base_Model_Lib_Catelog_Exception("<strong>Oops !, Error Class name -</strong>  <em>Base_Model_Lib_Catelog_Service_Department</em>, <strong>Function -</strong> <em>addDepartment()</em>, <strong>Exception -</strong> <em>" . $e->getMessage() . "</em>");
        }

        return $last_inserted_id;
    }

    /*
     * @name        : updateItem()
     * @Description : The function is to update/edit a department information
     * 				  in the database.
     * @return      : $success true/false
     */

    public function updateItem() {
        $success = false;
        try {

            if (!($this->department instanceof Base_Model_Lib_Catelog_Entity_Department))
                throw new Base_Model_Lib_Catelog_Exception(" Department Entity not intialized");

            $objDepartmentDao = new Base_Model_Lib_Catelog_Dao_Department();
            $objDepartmentDao->department = $this->department;
            $success = $objDepartmentDao->updateItem();
        } catch (Exception $e) {
            throw new Base_Model_Lib_Catelog_Exception("<strong>Oops !, Error Class name -</strong>  <em>Base_Model_Lib_Catelog_Service_Department</em>, <strong>Function -</strong> <em>updateDepartment()</em>, <strong>Exception -</strong> <em>" . $e->getMessage() . "</em>");
        }

        return $success;
    }

    /*
     * @name        : deleteDepartment()
     * @Description : The function is to update/edit a department information
     * 				  in the database.
     * @return      : $success true/false
     */

    public function deleteItem() {
        $success = false;
        try {

            if (!($this->department instanceof Base_Model_Lib_Catelog_Entity_Department))
                throw new Base_Model_Lib_Catelog_Exception(" Department Entity not intialized");

            $objDepartmentDao = new Base_Model_Lib_Catelog_Dao_Department();
            $objDepartmentDao->department = $this->department;
            $success = $objDepartmentDao->deleteItem();
        } catch (Exception $e) {
            throw new Base_Model_Lib_Catelog_Exception("<strong>Oops !, Error Class name -</strong>  <em>Base_Model_Lib_Catelog_Service_Department</em>, <strong>Function -</strong> <em>deleteDepartment()</em>, <strong>Exception -</strong> <em>" . $e->getMessage() . "</em>");
        }

        return $success;
    }

    /*
     * @name        : getAll
     * @Description : The function is to get All location information
     * 				  from the database.
     * @return      : Array Of Base_Model_Lib_Catelog_Dao_Department
     */

    public function getAll() {
        $departments = "";
        try {
            $objDepartment = new Base_Model_Lib_Catelog_Dao_Department();
            $departments = $objDepartment->getAll();
        } catch (Exception $e) {
            throw new Base_Model_Lib_Catelog_Exception("<strong>Oops !, Error Class name -</strong>  <em>Base_Model_Lib_Catelog_Dao_Department</em>, <strong>Function -</strong> <em>getAll()</em>, <strong>Exception -</strong> <em>" . $e->getMessage() . "</em>");
        }
        return $departments;
    }

}

?>