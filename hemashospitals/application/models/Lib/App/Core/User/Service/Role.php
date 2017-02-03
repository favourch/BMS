<?php

/**
 * Description of Role
 *
 * @author Iyngaran Iyathurai <iyngaran55@gmail.com>
 */
class Base_Model_Lib_App_Core_User_Service_Role extends Base_Model_Lib_Eav_Model_Service {

    public $role;

    /*
     * Get a user role using id
     * @return      : Entity User Role Object (Base_Model_Lib_App_Core_User_Entity_Role)
     */

    public function getRole($id) {
        try {
            $objRole = new Base_Model_Lib_App_Core_User_Dao_Role();
            $role = $objRole->getRole($id);
            return $role;
        } catch (Exception $e) {
            throw new Base_Model_Lib_App_Core_User_Exception($e);
        }
    }

    /*
     * Add new user role
     * @return      : Integer ID / Null
     */

    public function addRole() {
        try {
            if (!($this->role instanceof Base_Model_Lib_App_Core_User_Entity_Role)) {
                throw new Base_Model_Lib_App_Core_User_Exception(" User Role Entity not intialized");
            } else {
                $objRole = new Base_Model_Lib_App_Core_User_Dao_Role();
                $objRole->role = $this->role;
                return $objRole->addRole();
            }
        } catch (Exception $ex) {
            throw new Base_Model_Lib_App_Core_User_Exception($ex);
        }
    }

    /*
     * Update user role
     * @return      : Integer ID / Null
     */

    public function updateRole() {
        try {
            if (!($this->role instanceof Base_Model_Lib_App_Core_User_Entity_Role)) {
                throw new Base_Model_Lib_App_Core_User_Exception(" User Role Entity not intialized");
            } else {
                $objRole = new Base_Model_Lib_App_Core_User_Dao_Role();
                $objRole->role = $this->role;
                return $objRole->updateRole();
            }
        } catch (Exception $ex) {
            throw new Base_Model_Lib_App_Core_User_Exception($ex);
        }
    }

    /*
     * Delete user role
     * @return      : Integer ID / Null
     */

    public function deleteRole() {
        try {
            if (!($this->role instanceof Base_Model_Lib_App_Core_User_Entity_Role)) {
                throw new Base_Model_Lib_App_Core_User_Exception(" User Role Entity not intialized");
            } else {
                $objRole = new Base_Model_Lib_App_Core_User_Dao_Role();
                $objRole->role = $this->role;
                return $objRole->deleteRole();
            }
        } catch (Exception $ex) {
            throw new Base_Model_Lib_App_Core_User_Exception($ex);
        }
    }

    /*
     * Search user roles....
     * @return : Array of User Roles Entities...
     */

    public function search() {
        try {
            if (!($this->role instanceof Base_Model_Lib_App_Core_User_Entity_Role)) {
                throw new Base_Model_Lib_App_Core_User_Exception(" User Role Entity not intialized");
            } else {
                $objRole = new Base_Model_Lib_App_Core_User_Dao_Role();
                $objRole->role = $this->role;
                return $objRole->search();
            }
        } catch (Exception $ex) {
            throw new Base_Model_Lib_App_Core_User_Exception($ex);
        }
    }

}