<?php

/**
 * @namespace       : Base
 * @package         : Model
 * @subpackage 		: Lib.User.Dao
 * @name 			: UserOperation
 * @author 			: Iyngaran Iyathurai
 * 			  		  Software eng - Bcas R&D
 * 			          E-Mail - Iyngaran55@yahoo.com, Iyngaran@bcas.lk
 * 
 * @copyright Copyright (c) 2009 - 2010 BCAS R&D . (http://www.lab.bcasrd.com)
 * 
 * Description : The object-oriented interface to bcas database table tbl_user
 * 	
 */
class Base_Model_Lib_User_Dao_UserOperation extends Zend_Db_Table {

    protected $_name = 'tbl_user_operation'; // the table name 
    protected $_primary = 'id'; // the primary key


    /* protected $_dependentTables = array ('tbl_location' );

      protected $_referenceMap = array (
      'User' => array ('columns' => array ('id' ),
      'refTableClass' => 'Base_Model_Lib_User_Dao_User',
      'refColumns' => array ('tbl_user_id' ),
      'onDelete' => self::CASCADE,
      'onUpdate' => self::RESTRICT )
      );
     */
    // the userOperation object
    public $userOperation;

    // the methods goes from here......
    /*
     * @name        : getUserOperation
     * @Description : The function is to get a user information
     * 				  from the database.
     * @param       : $id (UserOperation Id)
     * @return      : Entity User Object (Base_Model_Lib_User_Entity_User)
     */

    public function getUserOperation($id) {
        $objUserOperation = new Base_Model_Lib_User_Entity_UserOperation ( );
        $objUserService = new Base_Model_Lib_User_Service_User();

        try {

            $id = (int) $id;
            $row = $this->fetchRow('id = ' . $id);

            if ($row != "") {
                $result = $row->toArray();
                $objUserOperation->setId($result ['id']);
                $objUserOperation->setKeyId($result ['key_id']);
                $objUserOperation->setMessage($result ['message']);
                $objUserOperation->setOperationDate($result ['operation_date']);
                $objUserOperation->setOperationType($result ['operation_type']);
                $objUserOperation->setTableName($result ['tbl_name']);
                $objUserOperation->setUserId($result ['tbl_user_id']);
            }
        } catch (Exception $e) {
            throw new Base_Model_Lib_Eav_Exception_Sql("<strong>Oops !, Error Class name -</strong>  <em>Base_Model_Lib_User_Dao_UserOperation</em>, <strong>Function -</strong> <em>getUserOperation()</em>, <strong>Exception -</strong> <em>" . $e->getMessage() . "</em>");
        }
        return $objUserOperation;
    }

    /*
     * @name        : addUserOperation
     * @Description : The function is to add a UserOperation information
     * 				  to the database.
     * @return      : Integer $last_inserted_id
     */

    public function addUserOperation() {
        $last_inserted_id = 0;

        try {

            if (!($this->userOperation instanceof Base_Model_Lib_User_Entity_UserOperation))
                throw new Base_Model_Lib_User_Exception(" UserOperation Entity not intialized");

            $data = array(
                'key_id' => $this->userOperation->getKeyId(),
                'message' => $this->userOperation->getMessage(),
                'operation_date' => $this->userOperation->getOperationDate(),
                'operation_type' => $this->userOperation->getOperationType(),
                'tbl_name' => $this->userOperation->getTableName(),
                'tbl_user_id' => $this->userOperation->getUserId()
            );

            $last_inserted_id = $this->insert($data);
        } catch (Exception $e) {
            throw new Base_Model_Lib_Eav_Exception_Sql("<strong>Oops !, Error Class name -</strong>  <em>Base_Model_Lib_User_Dao_UserOperation</em>, <strong>Function -</strong> <em>addUserOperation()</em>, <strong>Exception -</strong> <em>" . $e->getMessage() . "</em>");
        }

        return $last_inserted_id;
    }

    /*
     * @name        : updateUserOperation
     * @Description : The function is to update/edit a user information
     * 				  in the database.
     * @return      : $success true/false
     */

    public function updateUserOperation() {
        $success = false;
        try {

            if (!($this->userOperation instanceof Base_Model_Lib_User_Entity_UserOperation))
                throw new Base_Model_Lib_User_Exception(" UserOperation Entity not intialized");

            $data = array(
                'key_id' => $this->userOperation->getKeyId(),
                'message' => $this->userOperation->getMessage(),
                'operation_date' => $this->userOperation->getOperationDate(),
                'operation_type' => $this->userOperation->getOperationType(),
                'tbl_name' => $this->userOperation->getTableName(),
                'tbl_user_id' => $this->userOperation->getUserId()
            );

            $this->update($data, 'id = ' . (int) $this->userOperation->getId());
            $success = true;
        } catch (Exception $e) {
            throw new Base_Model_Lib_Eav_Exception_Sql("<strong>Oops !, Error Class name -</strong>  <em>Base_Model_Lib_User_Dao_UserOperation</em>, <strong>Function -</strong> <em>updateUserOperation()</em>, <strong>Exception -</strong> <em>" . $e->getMessage() . "</em>");
        }
        return $success;
    }

    /*
     * @name        : deleteUserOperation
     * @Description : The function is to delete a user information
     * 				  in the database.
     * @return      : $success true/false
     */

    public function deleteUserOperation() {
        $success = false;
        try {

            if (!($this->userOperation instanceof Base_Model_Lib_User_Entity_UserOperation))
                throw new Base_Model_Lib_User_Exception(" UserOperation Entity not intialized");

            if ($this->delete('id =' . (int) $this->userOperation->getId()) == '1') {
                $success = true;
            }
        } catch (Exception $e) {
            throw new Base_Model_Lib_Eav_Exception_Sql("<strong>Oops !, Error Class name -</strong>  <em>Base_Model_Lib_User_Dao_UserOperation</em>, <strong>Function -</strong> <em>deleteUserOperation()</em>, <strong>Exception -</strong> <em>" . $e->getMessage() . "</em>");
        }
        return $success;
    }

    /*
     * @name        : getAll
     * @Description : The function is to get all users information
     * 				  from the database.
     * @return      : Aray Of Entity User Object (Base_Model_Lib_User_Entity_UserOperation)
     */

    public function getAll() {
        $userOperation = array();

        try {
            $objUserOperation = new Base_Model_Lib_User_Entity_UserOperation( );

            $select = $this->select()->from('tbl_user_operation', array('id'));

            $result = $this->fetchAll($select);

            foreach ($result as $row) {
                $objUserOperation = $this->getUserOperation($row->id);
                array_push($userOperation, $objUserOperation);
            }
        } catch (Exception $e) {
            throw new Base_Model_Lib_Eav_Exception_Sql("<strong>Oops !, Error Class name -</strong>  <em>Base_Model_Lib_User_Entity_UserOperation</em>, <strong>Function -</strong> <em>getAll()</em>, <strong>Exception -</strong> <em>" . $e->getMessage() . "</em>");
        }
        return $userOperation;
    }

    // get log info....
    public function getLogInfo($tableName, $keyId) {
        $userOperation = array();

        try {
            $objUserOperation = new Base_Model_Lib_User_Entity_UserOperation( );

            $select = $this->select()
                    ->from('tbl_user_operation', array('id'))
                    ->where('tbl_name = ?', $tableName)
                    ->where('key_id = ?', $keyId);

            $result = $this->fetchAll($select);

            foreach ($result as $row) {
                $objUserOperation = $this->getUserOperation($row->id);
                array_push($userOperation, $objUserOperation);
            }
        } catch (Exception $e) {
            throw new Base_Model_Lib_Eav_Exception_Sql("<strong>Oops !, Error Class name -</strong>  <em>Base_Model_Lib_User_Entity_UserOperation</em>, <strong>Function -</strong> <em>getAll()</em>, <strong>Exception -</strong> <em>" . $e->getMessage() . "</em>");
        }
        return $userOperation;
    }

// get log info....
    public function getTableLogInfo($tableName) {
        $userOperation = array();

        try {
            $objUserOperation = new Base_Model_Lib_User_Entity_UserOperation( );

            $select = $this->select()
                    ->from('tbl_user_operation', array('id'))
                    ->where('tbl_name = ?', $tableName);

            $result = $this->fetchAll($select);

            foreach ($result as $row) {
                $objUserOperation = $this->getUserOperation($row->id);
                array_push($userOperation, $objUserOperation);
            }
        } catch (Exception $e) {
            throw new Base_Model_Lib_Eav_Exception_Sql("<strong>Oops !, Error Class name -</strong>  <em>Base_Model_Lib_User_Entity_UserOperation</em>, <strong>Function -</strong> <em>getAll()</em>, <strong>Exception -</strong> <em>" . $e->getMessage() . "</em>");
        }
        return $userOperation;
    }

    // get log info....
    public function getLogInfoByOperationType($tableName, $keyId, $operationType) {
        $userOperation = array();

        try {
            $objUserOperation = new Base_Model_Lib_User_Entity_UserOperation( );

            $select = $this->select()
                    ->from('tbl_user_operation', array('id'))
                    ->where('operation_type = ?', $operationType)
                    ->where('tbl_name = ?', $tableName)
                    ->where('key_id = ?', $keyId);

            $result = $this->fetchAll($select);

            foreach ($result as $row) {
                $objUserOperation = $this->getUserOperation($row->id);
                array_push($userOperation, $objUserOperation);
            }
        } catch (Exception $e) {
            throw new Base_Model_Lib_Eav_Exception_Sql("<strong>Oops !, Error Class name -</strong>  <em>Base_Model_Lib_User_Entity_UserOperation</em>, <strong>Function -</strong> <em>getAll()</em>, <strong>Exception -</strong> <em>" . $e->getMessage() . "</em>");
        }
        return $userOperation;
    }

// get log info....
    public function getLogInfoAdd($tableName, $keyId) {
        //$userOperation = array ();

        try {
            $objUserOperation = new Base_Model_Lib_User_Entity_UserOperation( );

            $select = $this->select()
                    ->from('tbl_user_operation', array('id'))
                    ->where('operation_type = ?', 'ADD NEW RECORD')
                    ->where('tbl_name = ?', $tableName)
                    ->where('key_id = ?', $keyId)
                    ->limit(1, 0);
            //print($select->__toString());
            //exit;
            $result = $this->fetchRow($select);


            $objUserOperation = $this->getUserOperation($result->id);
        } catch (Exception $e) {
            throw new Base_Model_Lib_Eav_Exception_Sql("<strong>Oops !, Error Class name -</strong>  <em>Base_Model_Lib_User_Entity_UserOperation</em>, <strong>Function -</strong> <em>getAll()</em>, <strong>Exception -</strong> <em>" . $e->getMessage() . "</em>");
        }
        return $objUserOperation;
    }

    /*
     * @name        : getAllLatestOperation
     * @Description : The function is to get all users information
     * 				  from the database.
     * @return      : Aray Of Entity User Object (Base_Model_Lib_User_Entity_UserOperation)
     */

    public function getAllLatestOperation($limit) {
        $userOperation = array();

        try {
            $objUserOperation = new Base_Model_Lib_User_Entity_UserOperation( );

            $select = $this->select()
                    ->from('tbl_user_operation', array('id'))
                    ->order(array('operation_date DESC'))
                    ->limit($limit, 0);

            $result = $this->fetchAll($select);

            foreach ($result as $row) {
                $objUserOperation = $this->getUserOperation($row->id);
                array_push($userOperation, $objUserOperation);
            }
        } catch (Exception $e) {
            throw new Base_Model_Lib_Eav_Exception_Sql("<strong>Oops !, Error Class name -</strong>  <em>Base_Model_Lib_User_Entity_UserOperation</em>, <strong>Function -</strong> <em>getAll()</em>, <strong>Exception -</strong> <em>" . $e->getMessage() . "</em>");
        }
        return $userOperation;
    }

    /*
     * @name        : search
     * @Description : The function is to search clientNotes information
     * 				  from the database.
     * @return      : Aray Of Entity Student Object (Base_Model_Lib_Student_Entity_Student)
     */

    public function search($limit) {
        // declare an array variable
        $arrUserOperations = array();
        $arrWhere = array();
        $sql = "";
        try {

            if (!($this->userOperation instanceof Base_Model_Lib_User_Entity_UserOperation))
                throw new Base_Model_Lib_User_Exception(" UserOperation Entity not intialized");

            $userId = $this->userOperation->getUserId();


            $sql = "SELECT id FROM tbl_user_operation ";

            if ($userId != '')
                array_push($arrWhere, "tbl_user_id = '" . $userId . "'");



            if (count($arrWhere) > 0)
                $sql.= "WHERE " . implode(' AND ', $arrWhere);

            // $limit
            $sql.= $limit;
            $db = Zend_Db_Table_Abstract::getDefaultAdapter();
            $result = $db->fetchCol($sql);

            foreach ($result as $oid) {
                $objUserOperations = $this->getUserOperation($oid);
                array_push($arrUserOperations, $objUserOperations);
            }
        } catch (Exception $e) {
            throw new Base_Model_Lib_Eav_Exception_Sql("<strong>Oops !, Error </strong>" . $e->getMessage());
        }
        return $arrUserOperations;
    }

    /*
     * @name        : search
     * @Description : The function is to search Student information
     * 				  from the database.
     * @return      : Aray Of Entity Student Object (Base_Model_Lib_Student_Entity_Student)
     */

    public function searchCount() {
        // declare an array variable
        $totalUserOperation = 0;
        $arrWhere = array();
        $sql = "";
        try {

            if (!($this->userOperation instanceof Base_Model_Lib_User_Entity_UserOperation))
                throw new Base_Model_Lib_User_Exception(" UserOperation Entity not intialized");

            $userId = $this->userOperation->getUserId();


            $sql = "SELECT count(id) as tot FROM tbl_user_operation ";

            if ($userId != '')
                array_push($arrWhere, "tbl_user_id = '" . $userId . "'");



            if (count($arrWhere) > 0)
                $sql.= "WHERE " . implode(' AND ', $arrWhere);



            $db = Zend_Db_Table_Abstract::getDefaultAdapter();
            $totalUserOperation = $db->fetchOne($sql);
        } catch (Exception $e) {
            throw new Base_Model_Lib_Eav_Exception_Sql("<strong>Oops !, Error </strong>" . $e->getMessage());
        }
        return $totalUserOperation;
    }

}

?>