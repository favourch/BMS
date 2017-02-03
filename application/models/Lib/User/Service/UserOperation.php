<?php

/**
 * @namespace       : Base
 * @package         : Model
 * @subpackage 		: Lib.User.Service
 * @name 			: UserOperation
 * @author 			: Iyngaran Iyathurai
 * 			  		  Software eng - Bcas R&D
 * 			          E-Mail - Iyngaran55@yahoo.com, Iyngaran@bcas.lk
 * 
 * @copyright Copyright (c) 2009 - 2010 BCAS R&D . (http://www.lab.bcasrd.com)
 * 
 * Description : The Service class for the User Object 
 * 	
 */
class Base_Model_Lib_User_Service_UserOperation extends Base_Model_Lib_Eav_Model_Service {

    public $userOperation;

    /*
     * @name        : getUserOperation
     * @Description : The function is to get a user information
     * 				  from the database.
     * @param       : $id (User Id)
     * @return      : Base_Model_Lib_User_Entity_User
     */

    public function getUserOperation($id) {
        $userOperation = "";
        try {
            $objUser = new Base_Model_Lib_User_Dao_UserOperation();
            $userOperation = $objUser->getUser($id);
        } catch (Exception $e) {
            throw new Base_Model_Lib_User_Exception("<strong>Oops !, Error Class name -</strong>  <em>Base_Model_Lib_User_Service_UserOperation</em>, <strong>Function -</strong> <em>getUserOperation()</em>, <strong>Exception -</strong> <em>" . $e->getMessage() . "</em>");
        }
        return $userOperation;
    }

    /*
     * @name        : addUserOperation
     * @Description : The function is to add a user information
     * 				  to the database.
     * @return      : Integer $last_inserted_id
     */

    public function addUserOperation() {
        $last_inserted_id = 0;
        try {

            if (!($this->userOperation instanceof Base_Model_Lib_User_Entity_UserOperation))
                throw new Base_Model_Lib_User_Exception(" UserOperation Entity not intialized");

            $objUserOperationDao = new Base_Model_Lib_User_Dao_UserOperation();
            $objUserOperationDao->userOperation = $this->userOperation;
            $last_inserted_id = $objUserOperationDao->addUserOperation();
        } catch (Exception $e) {
            throw new Base_Model_Lib_User_Exception("<strong>Oops !, Error Class name -</strong>  <em>Base_Model_Lib_User_Service_User</em>, <strong>Function -</strong> <em>addUserOperationDao()</em>, <strong>Exception -</strong> <em>" . $e->getMessage() . "</em>");
        }

        return $last_inserted_id;
    }

    /*
     * @name        : updateUser
     * @Description : The function is to update/edit a user information
     * 				  in the database.
     * @return      : $success true/false
     */

    public function updateUser() {
        $success = false;
        try {
            
        } catch (Exception $e) {
            throw new Base_Model_Lib_User_Exception("<strong>Oops !, Error Class name -</strong>  <em>Base_Model_Lib_User_Service_User</em>, <strong>Function -</strong> <em>updateUser()</em>, <strong>Exception -</strong> <em>" . $e->getMessage() . "</em>");
        }

        return $success;
    }

    /*
     * @name        : deleteUser()
     * @Description : The function is to delete a user information
      from the database.
     * @return      : $success true/false
     */

    public function deleteUser() {
        $success = false;
        try {
            
        } catch (Exception $e) {
            throw new Base_Model_Lib_User_Exception("<strong>Oops !, Error Class name -</strong>  <em>Base_Model_Lib_User_Service_User</em>, <strong>Function -</strong> <em>deleteUser()</em>, <strong>Exception -</strong> <em>" . $e->getMessage() . "</em>");
        }

        return $success;
    }

    /*
     * @name        : getAll
     * @Description : The function is to get All user information
     * 				  from the database.
     * @return      : Array Of Base_Model_Lib_User_Entity_UserOperation
     */

    public function getAll() {
        $userOperation = "";
        try {
            $objUserOp = new Base_Model_Lib_User_Dao_UserOperation();
            $userOperation = $objUserOp->getAll();
        } catch (Exception $e) {
            throw new Base_Model_Lib_User_Exception("<strong>Oops !, Error Class name -</strong>  <em>Base_Model_Lib_User_Dao_UserOperation</em>, <strong>Function -</strong> <em>getAll()</em>, <strong>Exception -</strong> <em>" . $e->getMessage() . "</em>");
        }
        return $userOperation;
    }

    // get log info....

    public function getLogInfo($tableName, $keyId) {
        $userOperation = "";
        try {
            $objUserOp = new Base_Model_Lib_User_Dao_UserOperation();
            $userOperation = $objUserOp->getLogInfo($tableName, $keyId);
        } catch (Exception $e) {
            throw new Base_Model_Lib_User_Exception("<strong>Oops !, Error Class name -</strong>  <em>Base_Model_Lib_User_Dao_UserOperation</em>, <strong>Function -</strong> <em>getAll()</em>, <strong>Exception -</strong> <em>" . $e->getMessage() . "</em>");
        }
        return $userOperation;
    }

// get log info....

    public function getTableLogInfo($tableName) {
        $userOperation = "";
        try {
            $objUserOp = new Base_Model_Lib_User_Dao_UserOperation();
            $userOperation = $objUserOp->getTableLogInfo($tableName);
        } catch (Exception $e) {
            throw new Base_Model_Lib_User_Exception("<strong>Oops !, Error Class name -</strong>  <em>Base_Model_Lib_User_Dao_UserOperation</em>, <strong>Function -</strong> <em>getAll()</em>, <strong>Exception -</strong> <em>" . $e->getMessage() . "</em>");
        }
        return $userOperation;
    }

    // get log info....

    public function getLogInfoByOperationType($tableName, $keyId, $operationType) {
        $userOperation = "";
        try {
            $objUserOp = new Base_Model_Lib_User_Dao_UserOperation();
            $userOperation = $objUserOp->getLogInfoByOperationType($tableName, $keyId, $operationType);
        } catch (Exception $e) {
            throw new Base_Model_Lib_User_Exception("<strong>Oops !, Error Class name -</strong>  <em>Base_Model_Lib_User_Dao_UserOperation</em>, <strong>Function -</strong> <em>getAll()</em>, <strong>Exception -</strong> <em>" . $e->getMessage() . "</em>");
        }
        return $userOperation;
    }

// get log info....

    public function getLogInfoAdd($tableName, $keyId) {
        $userOperation = "";
        try {
            $objUserOp = new Base_Model_Lib_User_Dao_UserOperation();
            $userOperation = $objUserOp->getLogInfoAdd($tableName, $keyId);
        } catch (Exception $e) {
            throw new Base_Model_Lib_User_Exception("<strong>Oops !, Error Class name -</strong>  <em>Base_Model_Lib_User_Dao_UserOperation</em>, <strong>Function -</strong> <em>getAll()</em>, <strong>Exception -</strong> <em>" . $e->getMessage() . "</em>");
        }
        return $userOperation;
    }

    /*
     * @name        : getAllLatestOperation($limit) 
     * @Description : The function is to get All user information
     * 				  from the database.
     * @return      : Array Of Base_Model_Lib_User_Entity_UserOperation
     */

    public function getAllLatestOperation($limit) {
        $userOperation = "";
        try {
            $objUserOp = new Base_Model_Lib_User_Dao_UserOperation();
            $userOperation = $objUserOp->getAllLatestOperation($limit);
        } catch (Exception $e) {
            throw new Base_Model_Lib_User_Exception("<strong>Oops !, Error Class name -</strong>  <em>Base_Model_Lib_User_Dao_UserOperation</em>, <strong>Function -</strong> <em>getAll()</em>, <strong>Exception -</strong> <em>" . $e->getMessage() . "</em>");
        }
        return $userOperation;
    }

    /*
     * @name        : search
     * @Description : The function is to search clients information
     * 				  from the database.
     * @return      : Array Of Base_Model_Lib_Client_Entity_Client
     */

    public function search($limit) {
        $arrUserOperations = array();
        try {
            if (!($this->userOperation instanceof Base_Model_Lib_User_Entity_UserOperation))
                throw new Base_Model_Lib_User_Exception(" UserOperation Entity not intialized");

            $objUserOperationDao = new Base_Model_Lib_User_Dao_UserOperation();
            $objUserOperationDao->userOperation = $this->userOperation;
            $arrUserOperations = $objUserOperationDao->search($limit);
        } catch (Exception $e) {
            throw new Base_Model_Lib_Client_Exception("<strong>Oops !, Error </strong>" . $e->getMessage());
        }
        return $arrUserOperations;
    }

    /*
     * @name        : searchCount
     * @Description : The function is to search students information
     * 				  from the database.
     * @return      : Array Of Base_Model_Lib_Student_Entity_Student
     */

    public function searchCount() {
        $totalUserOperation = 0;
        try {

            if (!($this->userOperation instanceof Base_Model_Lib_User_Entity_UserOperation))
                throw new Base_Model_Lib_User_Exception(" UserOperation Entity not intialized");

            $objUserOperationDao = new Base_Model_Lib_User_Dao_UserOperation();
            $objUserOperationDao->userOperation = $this->userOperation;
            $totalUserOperation = $objUserOperationDao->searchCount();
        } catch (Exception $e) {
            throw new Base_Model_Lib_Client_Exception("<strong>Oops !, Error </strong>" . $e->getMessage());
        }
        return $totalUserOperation;
    }

}

?>