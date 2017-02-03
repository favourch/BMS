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
class Base_Model_Lib_User_Dao_User extends Zend_Db_Table {

    protected $_name = 'tbl_user'; // the table name
    protected $_primary = 'id'; // the primary key
    // the user object
    public $user;

    // the methods goes from here......
    /*
     * @name        : getUser
     * @Description : The function is to get a user information
     * 				  from the database.
     * @param       : $id (User Id)
     * @return      : Entity User Object (Base_Model_Lib_User_Entity_User)
     */

    public function getUser($id) {
        $objUser = new Base_Model_Lib_User_Entity_User ( );
        try {

            $id = (int) $id;
            $row = $this->fetchRow('id = ' . $id);

            if ($row != "") {
                $result = $row->toArray();
                $objUser->setId($result['id']);
                $objUser->setUsername($result['username']);
                $objUser->setPassword($result['password_2']);
                $objUser->setUserType($result['user_type']);
                $objUser->setEmailAddress($result['email']);
                $objUser->setIsEnabled($result['is_enabled']);
                $objUser->setFirstName($result['first_name']);
                $objUser->setLastName($result['last_name']);
                $objUser->setDesignation($result['designation']);
                $objUser->setLoginattempts($result['loginattempts']);
            }
        } catch (Exception $e) {
            throw new Base_Model_Lib_Eav_Exception_Sql("<strong>Oops !, Error Class name -</strong>  <em>Base_Model_Lib_User_Dao_User</em>, <strong>Function -</strong> <em>getUser()</em>, <strong>Exception -</strong> <em>" . $e->getMessage() . "</em>");
        }
        return $objUser;
    }

    /*
     * @name        : addUser
     * @Description : The function is to add a user information
     * 				  to the database.
     * @return      : Integer $last_inserted_id
     */

    public function addUser() {
        $last_inserted_id = 0;

        try {

            if (!($this->user instanceof Base_Model_Lib_User_Entity_User))
                throw new Base_Model_Lib_User_Exception(" User Entity not intialized");

            $data = array(
                'username' => $this->user->getUsername(),
                'password_2' => $this->user->getPassword(),
                'user_type' => $this->user->getUserType(),
                'email' => $this->user->getEmailAddress(),
                'is_enabled' => $this->user->getIsEnabled(),
                'first_name' => $this->user->getFirstName(),
                'last_name' => $this->user->getLastName(),
                'designation' => $this->user->getDesignation(),
                'loginattempts' => $this->user->getLoginattempts()
            );

            $last_inserted_id = $this->insert($data);
        } catch (Exception $e) {
            throw new Base_Model_Lib_Eav_Exception_Sql("<strong>Oops !, Error Class name -</strong>  <em>Base_Model_Lib_User_Dao_User</em>, <strong>Function -</strong> <em>addUser()</em>, <strong>Exception -</strong> <em>" . $e->getMessage() . "</em>");
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

            if (!($this->user instanceof Base_Model_Lib_User_Entity_User))
                throw new Base_Model_Lib_User_Exception(" User Entity not intialized");

            if ($this->user->getPassword() != "") {

                $data = array(
                    'username' => $this->user->getUsername(),
                    'password_2' => $this->user->getPassword(),
                    'user_type' => $this->user->getUserType(),
                    'email' => $this->user->getEmailAddress(),
                    'is_enabled' => $this->user->getIsEnabled(),
                    'first_name' => $this->user->getFirstName(),
                    'last_name' => $this->user->getLastName(),
                    'designation' => $this->user->getDesignation(),
                    'loginattempts' => $this->user->getLoginattempts()
                );
            } else {


                $data = array(
                    'user_type' => $this->user->getUserType(),
                    'email' => $this->user->getEmailAddress(),
                    'is_enabled' => $this->user->getIsEnabled(),
                    'first_name' => $this->user->getFirstName(),
                    'last_name' => $this->user->getLastName(),
                    'designation' => $this->user->getDesignation(),
                    'loginattempts' => $this->user->getLoginattempts()
                );
            }
            $this->update($data, 'id = ' . (int) $this->user->getId());
            $success = true;
        } catch (Exception $e) {
            throw new Base_Model_Lib_Eav_Exception_Sql("<strong>Oops !, Error Class name -</strong>  <em>Base_Model_Lib_User_Dao_User</em>, <strong>Function -</strong> <em>updateUser()</em>, <strong>Exception -</strong> <em>" . $e->getMessage() . "</em>");
        }
        return $success;
    }

    /*
     * @name        : deleteUser
     * @Description : The function is to delete a user information
     * 				  in the database.
     * @return      : $success true/false
     */

    public function deleteUser() {
        $success = false;
        try {

            if (!($this->user instanceof Base_Model_Lib_User_Entity_User))
                throw new Base_Model_Lib_User_Exception(" User Entity not intialized");

            if ($this->delete('id =' . (int) $this->user->getId()) == '1') {
                $success = true;
            }
        } catch (Exception $e) {
            throw new Base_Model_Lib_Eav_Exception_Sql("<strong>Oops !, Error Class name -</strong>  <em>Base_Model_Lib_User_Dao_User</em>, <strong>Function -</strong> <em>deleteUser()</em>, <strong>Exception -</strong> <em>" . $e->getMessage() . "</em>");
        }
        return $success;
    }

    /*
     * @name        : getAll
     * @Description : The function is to get all users information
     * 				  from the database.
     * @return      : Aray Of Entity User Object (Base_Model_Lib_User_Entity_User)
     */

    public function getAll() {
        $users = array();

        try {
            $objUser = new Base_Model_Lib_User_Entity_User ( );

            $select = $this->select()->from('tbl_user', array('id'));

            $result = $this->fetchAll($select);

            foreach ($result as $row) {
                $objUser = $this->getUser($row->id);
                array_push($users, $objUser);
            }
        } catch (Exception $e) {
            throw new Base_Model_Lib_Eav_Exception_Sql("<strong>Oops !, Error Class name -</strong>  <em>Base_Model_Lib_User_Entity_User</em>, <strong>Function -</strong> <em>getAll()</em>, <strong>Exception -</strong> <em>" . $e->getMessage() . "</em>");
        }
        return $users;
    }

    /*
     * @name        : updateUserPassword
     * @Description : The function is to updateUserPassword a user information
     * 				  in the database.
     * @return      : $success true/false
     */

    public function updateUserPassword() {
        $success = false;
        try {

            if (!($this->user instanceof Base_Model_Lib_User_Entity_User))
                throw new Base_Model_Lib_User_Exception(" User Entity not intialized");

            $data = array(
                'password_2' => md5($this->user->getPassword())
            );

            $this->update($data, 'id = ' . (int) $this->user->getId());
            $success = true;
        } catch (Exception $e) {
            throw new Base_Model_Lib_Eav_Exception_Sql("<strong>Oops !, Error Class name -</strong>  <em>Base_Model_Lib_User_Dao_User</em>, <strong>Function -</strong> <em>updateUserPassword()</em>, <strong>Exception -</strong> <em>" . $e->getMessage() . "</em>");
        }
        return $success;
    }

    /*
     * @name        : loginUser
     * @Description : The function is to auth users information
     * 				  in the database.
     * @param       : Username, Password
     * @return      : Boolean true/false, If the login is success, returns true, else false
     */

    public function loginUser($userName, $password, $userType) {
        $userObject = "";
        try {

            $select = $this->select()
                    ->from('tbl_user', array('id'))
                    ->where('username = ?', $userName)
                    ->where('password_2 = ?', $password)
                    ->where('is_enabled = ?', 'Enabled');

            //$sql = $select->__toString();
            //echo "$sql\n";
            //exit;
            $result = $this->fetchRow($select);
            if ($result->id != "" || $result->id != null) {
                $userObject = $this->getUser($result->id);
            }


        } catch (Exception $e) {
            throw new Base_Model_Lib_Eav_Exception_Sql("<strong>Oops !, Error Class name -</strong>  <em>Base_Model_Lib_User_Entity_User</em>, <strong>Function -</strong> <em>loginUser()</em>, <strong>Exception -</strong> <em>" . $e->getMessage() . "</em>");
        }
        return $userObject;
    }

    /*
     * @name        : isUsernameExists
     * @Description : The function is to check the user the username exists or not
     * 				  in the database.
     * @return      : $success true/false
     */

    public function isUsernameExists() {
        $isExists = false;
        try {

            if (!($this->user instanceof Base_Model_Lib_User_Entity_User))
                throw new Base_Model_Lib_User_Exception(" User Entity not intialized");

            $select = $this->select()
                    ->from('tbl_user', array('id'))
                    ->where('username = ?', $this->user->getUsername());

            $sql = $select->__toString();

            $result = $this->fetchRow($select);
            if (isset($result)) {
                if ($result->id != "" || $result->id != null) {
                    $isExists = true;
                }
            }
        } catch (Exception $e) {
            throw new Base_Model_Lib_Eav_Exception_Sql("<strong>Oops !, Error Class name -</strong>  <em>Base_Model_Lib_User_Dao_User</em>, <strong>Function -</strong> <em>updateUserPassword()</em>, <strong>Exception -</strong> <em>" . $e->getMessage() . "</em>");
        }
        return $isExists;
    }
    
    
    
    /*
     * @name        : updateUser
     * @Description : The function is to update/edit a user information
     * 				  in the database.
     * @return      : $success true/false
     */

    public function updateMyAccount() {
        $success = false;
        try {

            if (!($this->user instanceof Base_Model_Lib_User_Entity_User))
                throw new Base_Model_Lib_User_Exception(" User Entity not intialized");

            if ($this->user->getPassword() != "") {

                $data = array(
                    'username' => $this->user->getUsername(),
                    'password_2' => $this->user->getPassword(),
                    'email' => $this->user->getEmailAddress(),
                    'first_name' => $this->user->getFirstName(),
                    'last_name' => $this->user->getLastName(),
                    'designation' => $this->user->getDesignation(),
                    'loginattempts' => $this->user->getLoginattempts()
                );
            } else {


                $data = array(
                    'email' => $this->user->getEmailAddress(),
                    'first_name' => $this->user->getFirstName(),
                    'last_name' => $this->user->getLastName(),
                    'designation' => $this->user->getDesignation(),
                    'loginattempts' => $this->user->getLoginattempts()
                );
            }
            $this->update($data, 'id = ' . (int) $this->user->getId());
            $success = true;
        } catch (Exception $e) {
            throw new Base_Model_Lib_Eav_Exception_Sql("<strong>Oops !, Error Class name -</strong>  <em>Base_Model_Lib_User_Dao_User</em>, <strong>Function -</strong> <em>updateUser()</em>, <strong>Exception -</strong> <em>" . $e->getMessage() . "</em>");
        }
        return $success;
    }

    
    /*
	 * @name        : readUsersByEmail($userEmail)
	 * @Description : The function is to get all users information
	 * 				  from the database.
	 * @return      : Aray Of Entity User Object (Base_Model_Lib_User_Entity_User)
	 */
	
	public function readUsersByEmail($userEmail) {
		$objUser = new Base_Model_Lib_User_Entity_User ( );
		try {
			$sql 		= "SELECT id As id from tbl_user WHERE email = '".$userEmail."'";
			$db     	= Zend_Db_Table_Abstract::getDefaultAdapter();
			$result = $db->fetchAll($sql);
                        if($result){
			foreach ( $result as $row ) {
				$objUser = $this->getUser( $row['id']);
			}
                        } else {
                            return false;
                        }
		
		} catch ( Exception $e ) {
			throw new Base_Model_Lib_Eav_Exception_Sql ( "<strong>Oops !, Error Class name -</strong>  <em>Base_Model_Lib_User_Entity_User</em>, <strong>Function -</strong> <em>getAll()</em>, <strong>Exception -</strong> <em>" . $e->getMessage () . "</em>" );
		}
		return $objUser;
	}

}

?>