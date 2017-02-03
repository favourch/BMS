<?php

/**
 * Description of Permission
 *
 * @author Iyngaran Iyathurai <iyngaran55@gmail.com>
 */
class Base_Model_ObtorLib_App_Core_Doc_Dao_Permission extends Zend_Db_Table_Abstract {

    //put your code here
    public $permission;
    protected $_name = 'tbl_doc_permission';

    /*
     * Get a permission using id
     * @return      : Entity Permission Object (Base_Model_ObtorLib_App_Core_Doc_Entity_Permission)
     */

    public function getPermission($id) {
        try {
            $id = (int) $id;
            $row = $this->fetchRow('id = ' . $id);
            if ($row) {
                $permissionRow = $row->toArray();
                $permissionEntity = new Base_Model_ObtorLib_App_Core_Doc_Entity_Permission();
                $permissionEntity->setId($permissionRow['id']);
                $permissionEntity->setDocument($permissionRow['permission_id']);
                $permissionEntity->setUserId($permissionRow['user_id']);
                $permissionEntity->setIsRead($permissionRow['is_read']);
                $permissionEntity->setIsWrite($permissionRow['is_write']);
                return $permissionEntity;
            } else {
                return null;
            }
        } catch (Exception $ex) {
            throw new Base_Model_ObtorLib_App_Core_Doc_Exception($ex);
        }
    }

    /*
     * Add new c
     * @return      : Integer ID / Null
     */

    public function addPermission() {
        try {
            if (!($this->permission instanceof Base_Model_ObtorLib_App_Core_Doc_Entity_Permission)) {
                throw new Base_Model_ObtorLib_App_Core_Doc_Exception(" Permission Entity not intialized");
            } else {
                $data = array('document_id' => $this->permission->getDocument(),
                    'user_id' => $this->permission->getUserId(),
                    'is_read' => $this->permission->getIsRead(),
                    'is_write' => $this->permission->getIsWrite());
                $last_inserted_id = $this->insert($data);
                return $last_inserted_id;
            }
        } catch (Exception $ex) {
            throw new Base_Model_ObtorLib_App_Core_Doc_Exception($ex);
        }
    }

    /*
     * Update permission
     * @return      : Boolean true/false
     */

    public function updatePermission() {
        try {
            if (!($this->permission instanceof Base_Model_ObtorLib_App_Core_Doc_Entity_Permission)) {
                throw new Base_Model_ObtorLib_App_Core_Doc_Exception(" Permission Entity not intialized");
            } else {
                $data = array('document_id' => $this->permission->getDocument(),
                    'user_id' => $this->permission->getUserId(),
                    'is_read' => $this->permission->getIsRead(),
                    'is_write' => $this->permission->getIsWrite());
                return $this->update($data, 'id = ' . (int) $this->permission->getId());
            }
        } catch (Exception $ex) {
            throw new Base_Model_ObtorLib_App_Core_Doc_Exception($ex);
        }
    }

    /*
     * Delete permission
     * @return      : Integer ID / Null
     */

    public function deletePermission() {
        try {
            if (!($this->permission instanceof Base_Model_ObtorLib_App_Core_Doc_Entity_Permission)) {
                throw new Base_Model_ObtorLib_App_Core_Doc_Exception(" Permission Entity not intialized");
            } else {
                return $this->delete('id =' . (int) $this->permission->getId());
            }
        } catch (Exception $ex) {
            throw new Base_Model_ObtorLib_App_Core_Doc_Exception($ex);
        }
    }

    /*
     * Search permissions....
     * @return : Array of Permissions Entities...
     */

    public function search() {
        try {
            if (!($this->permission instanceof Base_Model_ObtorLib_App_Core_Doc_Entity_Permission)) {
                throw new Base_Model_ObtorLib_App_Core_Doc_Exception(" Permission Entity not intialized");
            } else {
                $arrWhere = array();
                $arrPermissions = array();
                $document = $this->permission->getDocument();
                $permissionSql = "SELECT id FROM tbl_doc_permission ";

                if ($document) {
                    array_push($arrWhere, "document_id = '" . $document . "'");
                }

                if (count($arrWhere) > 0) {
                    $permissionSql.= "WHERE " . implode($arrWhere);
                }

                $db = Zend_Db_Table_Abstract::getDefaultAdapter();
                $result = $db->fetchCol($permissionSql);
                foreach ($result as $permissionId) {
                    $permissionInfo = $this->getPermission($permissionId);
                    array_push($arrPermissions, $permissionInfo);
                }
                return $arrPermissions;
            }
        } catch (Exception $ex) {
            throw new Base_Model_ObtorLib_App_Core_Doc_Exception($ex);
        }
    }

    public function isSharedExists($document, $userId) {
        try {
            $total_number = 0;
            $permissionSql = "SELECT count(id) as tot FROM tbl_doc_permission WHERE user_id = '" . $userId . "' AND document_id = '" . $document . "'";
            $db = Zend_Db_Table_Abstract::getDefaultAdapter();
            $result = $db->fetchRow($permissionSql);
            $total_number = $result['tot'];
            if ($total_number > 0) {
                return true;
            } else {
                return false;
            }
        } catch (Exception $ex) {
            throw new Base_Model_ObtorLib_App_Core_Doc_Exception($ex);
        }
    }

}