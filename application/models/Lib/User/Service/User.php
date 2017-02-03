<?php

/**
 * @namespace       : Base
 * @package         : Model
 * @subpackage 		: Lib.User.Service
 * @name 			: User
 * @author 			: Iyngaran Iyathurai
 * 			  		  Software eng - Bcas R&D
 * 			          E-Mail - Iyngaran55@yahoo.com, Iyngaran@bcas.lk
 *
 * @copyright Copyright (c) 2009 - 2010 BCAS R&D . (http://www.lab.bcasrd.com)
 *
 * Description : The Service class for the User Object
 *
 */
class Base_Model_Lib_User_Service_User extends Base_Model_Lib_Eav_Model_Service {

    const RESULT_PER_PAGE = 20; // the const variable for pagging

    public $user;

    /*
     * @name        : getUser
     * @Description : The function is to get a user information
     * 				  from the database.
     * @param       : $id (User Id)
     * @return      : Base_Model_Lib_User_Entity_User
     */

    public function getUser($id) {
        $user = "";
        try {
            $objUser = new Base_Model_Lib_User_Dao_User();
            $user = $objUser->getUser($id);
        } catch (Exception $e) {
            throw new Base_Model_Lib_User_Exception("<strong>Oops !, Error Class name -</strong>  <em>Base_Model_Lib_User_Service_User</em>, <strong>Function -</strong> <em>getUser()</em>, <strong>Exception -</strong> <em>" . $e->getMessage() . "</em>");
        }
        return $user;
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

            $objUserDao = new Base_Model_Lib_User_Dao_User();
            $objUserDao->user = $this->user;
            $last_inserted_id = $objUserDao->addUser();
        } catch (Exception $e) {
            throw new Base_Model_Lib_User_Exception("<strong>Oops !, Error Class name -</strong>  <em>Base_Model_Lib_User_Service_User</em>, <strong>Function -</strong> <em>addUser()</em>, <strong>Exception -</strong> <em>" . $e->getMessage() . "</em>");
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

            $objUserDao = new Base_Model_Lib_User_Dao_User();
            $objUserDao->user = $this->user;
            $success = $objUserDao->updateUser();
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

            if (!($this->user instanceof Base_Model_Lib_User_Entity_User))
                throw new Base_Model_Lib_User_Exception(" User Entity not intialized");

            $objUserDao = new Base_Model_Lib_User_Dao_User();
            $objUserDao->user = $this->user;
            $success = $objUserDao->deleteUser();
        } catch (Exception $e) {
            throw new Base_Model_Lib_User_Exception("<strong>Oops !, Error Class name -</strong>  <em>Base_Model_Lib_User_Service_User</em>, <strong>Function -</strong> <em>deleteUser()</em>, <strong>Exception -</strong> <em>" . $e->getMessage() . "</em>");
        }

        return $success;
    }

    /*
     * @name        : getAll
     * @Description : The function is to get All user information
     * 				  from the database.
     * @return      : Array Of Base_Model_Lib_User_Dao_User
     */

    public function getAll() {
        $users = "";
        try {
            $objUser = new Base_Model_Lib_User_Dao_User();
            $users = $objUser->getAll();
        } catch (Exception $e) {
            throw new Base_Model_Lib_User_Exception("<strong>Oops !, Error Class name -</strong>  <em>Base_Model_Lib_User_Dao_User</em>, <strong>Function -</strong> <em>getAll()</em>, <strong>Exception -</strong> <em>" . $e->getMessage() . "</em>");
        }
        return $users;
    }

    /*
     * @name        : updateUserPassword
     * @Description : The function is to update/edit a user password information
     * 				  in the database.
     * @return      : $success true/false
     */

    public function updateUserPassword() {
        $success = false;
        try {

            if (!($this->user instanceof Base_Model_Lib_User_Entity_User))
                throw new Base_Model_Lib_User_Exception(" User Entity not intialized");

            $objUserDao = new Base_Model_Lib_User_Dao_User();
            $objUserDao->user = $this->user;
            $success = $objUserDao->updateUserPassword();
        } catch (Exception $e) {
            throw new Base_Model_Lib_User_Exception("<strong>Oops !, Error Class name -</strong>  <em>Base_Model_Lib_User_Service_User</em>, <strong>Function -</strong> <em>updateUser()</em>, <strong>Exception -</strong> <em>" . $e->getMessage() . "</em>");
        }

        return $success;
    }

    /*
     * @name        : loginUser
     * @Description : The function is to auth users information
     * 				  in the database.
     * @param       : Username, Password
     * @return      : Entity User Object (Base_Model_Lib_User_Entity_User)
     */

    public function loginUser($userName, $password, $userType) {
        $userObject = "";
        try {
            $objDaoUser = new Base_Model_Lib_User_Dao_User();
            $userObject = $objDaoUser->loginUser($userName, $password, $userType);
        } catch (Exception $e) {
            throw new Base_Model_Lib_Eav_Exception_Sql("<strong>Oops !, Error Class name -</strong>  <em>Base_Model_Lib_User_Entity_User</em>, <strong>Function -</strong> <em>loginUser()</em>, <strong>Exception -</strong> <em>" . $e->getMessage() . "</em>");
        }
        return $userObject;
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

            $objUserDao = new Base_Model_Lib_User_Dao_User();
            $objUserDao->user = $this->user;
            $success = $objUserDao->updateMyAccount();
        } catch (Exception $e) {
            throw new Base_Model_Lib_User_Exception("<strong>Oops !, Error Class name -</strong>  <em>Base_Model_Lib_User_Service_User</em>, <strong>Function -</strong> <em>updateUser()</em>, <strong>Exception -</strong> <em>" . $e->getMessage() . "</em>");
        }

        return $success;
    }
    
    
     /*
	 * @name        : readUsersByEmail($userEmail)
	 * @Description : The function is to get a user information
	 * 				  from the database.
	 * @param       : $id (User Id)
	 * @return      : Base_Model_Lib_User_Entity_User
	 */
	
	public static function readUsersByEmail($userEmail)
	{
		$user = "";
		try {
			$objUser 		= new Base_Model_Lib_User_Dao_User();
			$user 			= $objUser->readUsersByEmail($userEmail);
		} catch( Exception $e) {
			throw new Base_Model_Lib_User_Exception("<strong>Oops !, Error Class name -</strong>  <em>Base_Model_Lib_User_Dao_User</em>, <strong>Function -</strong> <em>getAll()</em>, <strong>Exception -</strong> <em>".$e->getMessage()."</em>");
		}
		return $user;
	}

}

?>