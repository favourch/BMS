<?php

/**
 * Description of Permission
 *
 * @author Iyngaran Iyathurai <iyngaran55@gmail.com>
 */
class Base_Model_ObtorLib_App_Core_Doc_Service_Permission extends Base_Model_ObtorLib_Eav_Model_Service {

    public $permission;

    /*
     * Get a user permission using id
     * @return      : Entity Permission Object (Base_Model_ObtorLib_App_Core_Doc_Entity_Permission)
     */

    public function getPermission($id) {
        try {
            $objPermission = new Base_Model_ObtorLib_App_Core_Doc_Dao_Permission();
            $permission = $objPermission->getPermission($id);
            return $permission;
        } catch (Exception $e) {
            throw new Base_Model_ObtorLib_App_Core_Doc_Exception($e);
        }
    }

    /*
     * Add new user permission
     * @return      : Integer ID / Null
     */

    public function addPermission() {
        try {
            if (!($this->permission instanceof Base_Model_ObtorLib_App_Core_Doc_Entity_Permission)) {
                throw new Base_Model_ObtorLib_App_Core_Doc_Exception(" Permission Entity not intialized");
            } else {
                $objPermission = new Base_Model_ObtorLib_App_Core_Doc_Dao_Permission();
                $objPermission->permission = $this->permission;
                return $objPermission->addPermission();
            }
        } catch (Exception $ex) {
            throw new Base_Model_ObtorLib_App_Core_Doc_Exception($ex);
        }
    }

    /*
     * Update user permission
     * @return      : Integer ID / Null
     */

    public function updatePermission() {
        try {
            if (!($this->permission instanceof Base_Model_ObtorLib_App_Core_Doc_Entity_Permission)) {
                throw new Base_Model_ObtorLib_App_Core_Doc_Exception(" Permission Entity not intialized");
            } else {
                $objPermission = new Base_Model_ObtorLib_App_Core_Doc_Dao_Permission();
                $objPermission->permission = $this->permission;
                return $objPermission->updatePermission();
            }
        } catch (Exception $ex) {
            throw new Base_Model_ObtorLib_App_Core_Doc_Exception($ex);
        }
    }

    /*
     * Delete user permission
     * @return      : Integer ID / Null
     */

    public function deletePermission() {
        try {
            if (!($this->permission instanceof Base_Model_ObtorLib_App_Core_Doc_Entity_Permission)) {
                throw new Base_Model_ObtorLib_App_Core_Doc_Exception(" Permission Entity not intialized");
            } else {
                $objPermission = new Base_Model_ObtorLib_App_Core_Doc_Dao_Permission();
                $objPermission->permission = $this->permission;
                return $objPermission->deletePermission();
            }
        } catch (Exception $ex) {
            throw new Base_Model_ObtorLib_App_Core_Doc_Exception($ex);
        }
    }

    /*
     * Search user permissions....
     * @return : Array of Permissions Entities...
     */

    public function search($limit = null) {
        try {
            if (!($this->permission instanceof Base_Model_ObtorLib_App_Core_Doc_Entity_Permission)) {
                throw new Base_Model_ObtorLib_App_Core_Doc_Exception(" Permission Entity not intialized");
            } else {
                $objPermission = new Base_Model_ObtorLib_App_Core_Doc_Dao_Permission();
                $objPermission->permission = $this->permission;
                return $objPermission->search($limit);
            }
        } catch (Exception $ex) {
            throw new Base_Model_ObtorLib_App_Core_Doc_Exception($ex);
        }
    }

    /*
     * Search user permissions....
     * @return : Array of Permissions Entities...
     */

    public function searchCount() {
        try {
            if (!($this->permission instanceof Base_Model_ObtorLib_App_Core_Doc_Entity_Permission)) {
                throw new Base_Model_ObtorLib_App_Core_Doc_Exception(" Permission Entity not intialized");
            } else {
                $objPermission = new Base_Model_ObtorLib_App_Core_Doc_Dao_Permission();
                $objPermission->permission = $this->permission;
                return $objPermission->searchCount();
            }
        } catch (Exception $ex) {
            throw new Base_Model_ObtorLib_App_Core_Doc_Exception($ex);
        }
    }

    public function isSharedExists($document, $userId) {
        try {
            $objPermission = new Base_Model_ObtorLib_App_Core_Doc_Dao_Permission();
            $objPermission->permission = $this->permission;
            return $objPermission->isSharedExists($document, $userId);
        } catch (Exception $ex) {
            throw new Base_Model_ObtorLib_App_Core_Doc_Exception($ex);
        }
    }

}
