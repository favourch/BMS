<?php

/**
 * Description of User
 *
 * @author Iyngaran Iyathurai <iyngaran55@gmail.com>
 */
class Base_Model_ObtorLib_App_Core_User_Service_User extends Base_Model_ObtorLib_Eav_Model_Service {

    public $user;

    /*
     * Get a user user using id
     * @return      : Entity User User Object (Base_Model_ObtorLib_App_Core_User_Entity_User)
     */

    public function getUser($id) {
        try {
            $objUser = new Base_Model_ObtorLib_App_Core_User_Dao_User();
            $user = $objUser->getUser($id);
            return $user;
        } catch (Exception $e) {
            throw new Base_Model_ObtorLib_App_Core_User_Exception($e);
        }
    }

    /*
     * Add new user user
     * @return      : Integer ID / Null
     */

    public function addUser() {
        try {
            if (!($this->user instanceof Base_Model_ObtorLib_App_Core_User_Entity_User)) {
                throw new Base_Model_ObtorLib_App_Core_User_Exception(" User User Entity not intialized");
            } else {
                $objUser = new Base_Model_ObtorLib_App_Core_User_Dao_User();
                $objUser->user = $this->user;
                return $objUser->addUser();
            }
        } catch (Exception $ex) {
            throw new Base_Model_ObtorLib_App_Core_User_Exception($ex);
        }
    }

    /*
     * Update user user
     * @return      : Integer ID / Null
     */

    public function updateUser() {
        try {
            if (!($this->user instanceof Base_Model_ObtorLib_App_Core_User_Entity_User)) {
                throw new Base_Model_ObtorLib_App_Core_User_Exception(" User User Entity not intialized");
            } else {
                $objUser = new Base_Model_ObtorLib_App_Core_User_Dao_User();
                $objUser->user = $this->user;
                return $objUser->updateUser();
            }
        } catch (Exception $ex) {
            throw new Base_Model_ObtorLib_App_Core_User_Exception($ex);
        }
    }

    /*
     * Delete user user
     * @return      : Integer ID / Null
     */

    public function deleteUser() {
        try {
            if (!($this->user instanceof Base_Model_ObtorLib_App_Core_User_Entity_User)) {
                throw new Base_Model_ObtorLib_App_Core_User_Exception(" User User Entity not intialized");
            } else {
                $objUser = new Base_Model_ObtorLib_App_Core_User_Dao_User();
                $objUser->user = $this->user;
                return $objUser->deleteUser();
            }
        } catch (Exception $ex) {
            throw new Base_Model_ObtorLib_App_Core_User_Exception($ex);
        }
    }

    /*
     * Search user users....
     * @return : Array of User Users Entities...
     */

    public function search() {
        try {
            if (!($this->user instanceof Base_Model_ObtorLib_App_Core_User_Entity_User)) {
                throw new Base_Model_ObtorLib_App_Core_User_Exception(" User User Entity not intialized");
            } else {
                $objUser = new Base_Model_ObtorLib_App_Core_User_Dao_User();
                $objUser->user = $this->user;
                return $objUser->search();
            }
        } catch (Exception $ex) {
            throw new Base_Model_ObtorLib_App_Core_User_Exception($ex);
        }
    }
    
    
    /*
     * Search user users....
     * @return : Array of User Users Entities...
     */

    public function doLogin() {
        try {
            if (!($this->user instanceof Base_Model_ObtorLib_App_Core_User_Entity_User)) {
                throw new Base_Model_ObtorLib_App_Core_User_Exception(" User User Entity not intialized");
            } else {
                $objUser = new Base_Model_ObtorLib_App_Core_User_Dao_User();
                $objUser->user = $this->user;
                return $objUser->doLogin();
            }
        } catch (Exception $ex) {
            throw new Base_Model_ObtorLib_App_Core_User_Exception($ex);
        }
    }
    
    
     /*
     * Update user user
     * @return      : Integer ID / Null
     */

    public function updateUserImage() {
        try {
            if (!($this->user instanceof Base_Model_ObtorLib_App_Core_User_Entity_User)) {
                throw new Base_Model_ObtorLib_App_Core_User_Exception(" User User Entity not intialized");
            } else {
                $objUser = new Base_Model_ObtorLib_App_Core_User_Dao_User();
                $objUser->user = $this->user;
                return $objUser->updateUserImage();
            }
        } catch (Exception $ex) {
            throw new Base_Model_ObtorLib_App_Core_User_Exception($ex);
        }
    }
    
       /*
     * Update user user
     * @return      : Integer ID / Null
     */

    public function myAccountUpdate() {
        try {
            if (!($this->user instanceof Base_Model_ObtorLib_App_Core_User_Entity_User)) {
                throw new Base_Model_ObtorLib_App_Core_User_Exception(" User User Entity not intialized");
            } else {
                $objUser = new Base_Model_ObtorLib_App_Core_User_Dao_User();
                $objUser->user = $this->user;
                return $objUser->myAccountUpdate();
            }
        } catch (Exception $ex) {
            throw new Base_Model_ObtorLib_App_Core_User_Exception($ex);
        }
    }

}