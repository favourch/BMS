<?php

/**
 * Description of Role
 *
 * @author Iyngaran Iyathurai <iyngaran55@gmail.com>
 */
class Base_Model_ObtorLib_App_Core_User_Dao_Role extends Zend_Db_Table_Abstract {

    //put your code here
    public $role;
    protected $_name = 'tbl_user_roles';

    /*
     * Get a user role using id
     * @return      : Entity User Role Object (Base_Model_ObtorLib_App_Core_User_Entity_Role)
     */

    public function getRole($id) {
        try {
            $id = (int) $id;
            $row = $this->fetchRow('id = ' . $id);
            if ($row) {
                $userRoles = $row->toArray();
                $userRoleEntity = new Base_Model_ObtorLib_App_Core_User_Entity_Role();
                $userRoleEntity->setId($userRoles['id']);
                $userRoleEntity->setName($userRoles['role_name']);
                return $userRoleEntity;
            } else {
                return null;
            }
        } catch (Exception $ex) {
            throw new Base_Model_ObtorLib_App_Core_User_Exception($ex);
        }
    }

    /*
     * Add new user role
     * @return      : Integer ID / Null
     */

    public function addRole() {
        try {
            if (!($this->role instanceof Base_Model_ObtorLib_App_Core_User_Entity_Role)) {
                throw new Base_Model_ObtorLib_App_Core_User_Exception(" User Role Entity not intialized");
            } else {
                $data = array('role_name' => $this->role->getName());
                $last_inserted_id = $this->insert($data);
                return $last_inserted_id;
            }
        } catch (Exception $ex) {
            throw new Base_Model_ObtorLib_App_Core_User_Exception($ex);
        }
    }

    /*
     * Update user role
     * @return      : Boolean true/false
     */

    public function updateRole() {
        try {
            if (!($this->role instanceof Base_Model_ObtorLib_App_Core_User_Entity_Role)) {
                throw new Base_Model_ObtorLib_App_Core_User_Exception(" User Role Entity not intialized");
            } else {
                $data = array('role_name' => $this->role->getName());
                return $this->update($data, 'id = ' . (int) $this->role->getId());
            }
        } catch (Exception $ex) {
            throw new Base_Model_ObtorLib_App_Core_User_Exception($ex);
        }
    }

    /*
     * Delete user role
     * @return      : Integer ID / Null
     */

    public function deleteRole() {
        try {
            if (!($this->role instanceof Base_Model_ObtorLib_App_Core_User_Entity_Role)) {
                throw new Base_Model_ObtorLib_App_Core_User_Exception(" User Role Entity not intialized");
            } else {
                return $this->delete('id =' . (int) $this->role->getId());
            }
        } catch (Exception $ex) {
            throw new Base_Model_ObtorLib_App_Core_User_Exception($ex);
        }
    }

    /*
     * Search user roles....
     * @return : Array of User Roles Entities...
     */

    public function search() {
        try {
            if (!($this->role instanceof Base_Model_ObtorLib_App_Core_User_Entity_Role)) {
                throw new Base_Model_ObtorLib_App_Core_User_Exception(" User Role Entity not intialized");
            } else {
                $arrWhere = array();
                $arrRoles = array();
                $roleName = $this->role->getName();
                $userRoleSql = "SELECT id FROM tbl_user_roles ";
                if ($roleName) {
                    array_push($arrWhere, "role_name = '" . $roleName . "'");
                }

                if (count($arrWhere) > 0) {
                    $userRoleSql.= "WHERE " . implode($arrWhere);
                }

                $db = Zend_Db_Table_Abstract::getDefaultAdapter();
                $result = $db->fetchCol($userRoleSql);
                foreach ($result as $roleId) {
                    $roleInfo = $this->getRole($roleId);
                    array_push($arrRoles, $roleInfo);
                }
                return $arrRoles;
            }
        } catch (Exception $ex) {
            throw new Base_Model_ObtorLib_App_Core_User_Exception($ex);
        }
    }

}