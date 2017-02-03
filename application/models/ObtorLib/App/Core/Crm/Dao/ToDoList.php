<?php

/**
 * Description of ToDoList
 *
 * @author Iyngaran Iyathurai <iyngaran55@gmail.com>
 */
class Base_Model_ObtorLib_App_Core_Crm_Dao_ToDoList extends Zend_Db_Table_Abstract {

    //put your code here
    public $toDoList;
    protected $_name = 'tbl_to_do_list';

    /*
     * Get a toDoList using id
     * @return      : Entity ToDoList Object (Base_Model_ObtorLib_App_Core_Crm_Entity_ToDoList)
     */

    public function getToDoList($id) {
        try {
            $id = (int) $id;
            $row = $this->fetchRow('id = ' . $id);
            if ($row) {
                $toDoListRow = $row->toArray();
                $toDoListEntity = new Base_Model_ObtorLib_App_Core_Crm_Entity_ToDoList();
                $toDoListEntity->setId($toDoListRow['id']);
                $toDoListEntity->setListTitle($toDoListRow['list_title']);
                $toDoListEntity->setListDescription($toDoListRow['list_description']);
                $toDoListEntity->setAddedOn($toDoListRow['added_on']);
                $toDoListEntity->setAddedBy($toDoListRow['added_by']);
                $toDoListEntity->setAddedByUserObject($toDoListRow['added_user_type']);
                $toDoListEntity->setReminderOn($toDoListRow['reminder_on']);
                $toDoListEntity->setReminderDate($toDoListRow['reminder_date']);
                $toDoListEntity->setReminderTime($toDoListRow['reminder_time']);    
                $toDoListEntity->setStatus($toDoListRow['current_status']);
                return $toDoListEntity;
            } else {
                return null;
            }
        } catch (Exception $ex) {
            throw new Base_Model_ObtorLib_App_Core_Crm_Exception($ex);
        }
    }

    /*
     * Add new c
     * @return      : Integer ID / Null
     */

    public function addToDoList() {
        try {
            if (!($this->toDoList instanceof Base_Model_ObtorLib_App_Core_Crm_Entity_ToDoList)) {
                throw new Base_Model_ObtorLib_App_Core_Crm_Exception(" ToDoList Entity not intialized");
            } else {
                $data = array(
                    'list_title' => $this->toDoList->getListTitle(),
                    'list_description' => $this->toDoList->getListDescription(),
                    'added_on' => $this->toDoList->getAddedOn(),
                    'added_by' => $this->toDoList->getAddedBy(),
                    'added_user_type' => $this->toDoList->getAddedByUserObject(),
                    'reminder_on' => $this->toDoList->getReminderOn(),
                    'reminder_date' => $this->toDoList->getReminderDate(),
                    'reminder_time' => $this->toDoList->getReminderTime(),
                    'current_status' => $this->toDoList->getStatus());
                $last_inserted_id = $this->insert($data);
                return $last_inserted_id;
            }
        } catch (Exception $ex) {
            throw new Base_Model_ObtorLib_App_Core_Crm_Exception($ex);
        }
    }

    /*
     * Update toDoList
     * @return      : Boolean true/false
     */

    public function updateToDoList() {
        try {
            if (!($this->toDoList instanceof Base_Model_ObtorLib_App_Core_Crm_Entity_ToDoList)) {
                throw new Base_Model_ObtorLib_App_Core_Crm_Exception(" ToDoList Entity not intialized");
            } else {
               $data = array(
                    'list_title' => $this->toDoList->getListTitle(),
                    'list_description' => $this->toDoList->getListDescription(),
                    'reminder_on' => $this->toDoList->getReminderOn(),
                    'reminder_date' => $this->toDoList->getReminderDate(),
                    'reminder_time' => $this->toDoList->getReminderTime());
                return $this->update($data, 'id = ' . (int) $this->toDoList->getId());
            }
        } catch (Exception $ex) {
            throw new Base_Model_ObtorLib_App_Core_Crm_Exception($ex);
        }
    }

    /*
     * Delete toDoList
     * @return      : Integer ID / Null
     */

    public function deleteToDoList() {
        try {
            if (!($this->toDoList instanceof Base_Model_ObtorLib_App_Core_Crm_Entity_ToDoList)) {
                throw new Base_Model_ObtorLib_App_Core_Crm_Exception(" ToDoList Entity not intialized");
            } else {
                return $this->delete('id =' . (int) $this->toDoList->getId());
            }
        } catch (Exception $ex) {
            throw new Base_Model_ObtorLib_App_Core_Crm_Exception($ex);
        }
    }

    /*
     * Search user toDoLists....
     * @return : Array of ToDoLists Entities...
     */

    public function search($limit = null) {
        try {
            if (!($this->toDoList instanceof Base_Model_ObtorLib_App_Core_Crm_Entity_ToDoList)) {
                throw new Base_Model_ObtorLib_App_Core_Crm_Exception("ToDoList Entity not intialized");
            } else {
                $arrWhere = array();
                $arrToDoLists = array();
                $userId = $this->toDoList->getAddedBy();
                $userType = $this->toDoList->getAddedByUserObject();
                $reminderStatus = $this->toDoList->getStatus();
                $title = $this->toDoList->getListTitle();
                
                
                $toDoListSql = "SELECT id FROM tbl_to_do_list ";
                
                if ($title) {
                    array_push($arrWhere, "list_title LIKE '" . '%'.$title.'%' . "'");
                }
                
                if ($userId) {
                    array_push($arrWhere, "added_by = '" . $userId . "'");
                }
                
                if ($userType) {
                    array_push($arrWhere, "added_user_type = '" . $userType . "'");
                }
                
                if ($reminderStatus) {
                    array_push($arrWhere, "current_status = '" . $reminderStatus . "'");
                }

                if (count($arrWhere) > 0) {
                    $toDoListSql.= "WHERE " . implode(' AND ',$arrWhere);
                }
                
                $toDoListSql = $toDoListSql." ORDER BY id DESC";
                
                if(!is_null($limit)){
                    $toDoListSql = $toDoListSql.$limit;
                }

                $db = Zend_Db_Table_Abstract::getDefaultAdapter();
                $result = $db->fetchCol($toDoListSql);
                foreach ($result as $toDoListId) {
                    $toDoListInfo = $this->getToDoList($toDoListId);
                    array_push($arrToDoLists, $toDoListInfo);
                }
                return $arrToDoLists;
            }
        } catch (Exception $ex) {
            throw new Base_Model_ObtorLib_App_Core_Crm_Exception($ex);
        }
    }
    
    
    
    /*
     * count toDoLists....
     * @return : Array of ToDoLists Entities...
     */

    public function searchCount() {
        try {
            if (!($this->toDoList instanceof Base_Model_ObtorLib_App_Core_Crm_Entity_ToDoList)) {
                throw new Base_Model_ObtorLib_App_Core_Crm_Exception("ToDoList Entity not intialized");
            } else {
                $total_number = 0;
                $arrWhere = array();
                $userId = $this->toDoList->getAddedBy();
                $userType = $this->toDoList->getAddedByUserObject();
                $reminderStatus = $this->toDoList->getStatus();
                $title = $this->toDoList->getListTitle();
                
                
                $toDoListSql = "SELECT count(id) as tot FROM tbl_to_do_list ";
                
                if ($title) {
                    array_push($arrWhere, "list_title LIKE '" . '%'.$title.'%' . "'");
                }
                
                if ($userId) {
                    array_push($arrWhere, "added_by = '" . $userId . "'");
                }
                
                if ($userType) {
                    array_push($arrWhere, "added_user_type = '" . $userType . "'");
                }
                
                if ($reminderStatus) {
                    array_push($arrWhere, "current_status = '" . $reminderStatus . "'");
                }

                if (count($arrWhere) > 0) {
                    $toDoListSql.= "WHERE " . implode(' AND ',$arrWhere);
                }

                $db = Zend_Db_Table_Abstract::getDefaultAdapter();
                $result 	= $db->fetchRow($toDoListSql);
                $total_number = $result['tot']; 
                return $total_number;
            }
        } catch (Exception $ex) {
            throw new Base_Model_ObtorLib_App_Core_Crm_Exception($ex);
        }
    }
    
    
        /*
     * Update toDoList
     * @return      : Boolean true/false
     */

    public function updateStatus() {
        try {
            if (!($this->toDoList instanceof Base_Model_ObtorLib_App_Core_Crm_Entity_ToDoList)) {
                throw new Base_Model_ObtorLib_App_Core_Crm_Exception(" ToDoList Entity not intialized");
            } else {
               $data = array('current_status' => $this->toDoList->getStatus());
                return $this->update($data, 'id = ' . (int) $this->toDoList->getId());
            }
        } catch (Exception $ex) {
            throw new Base_Model_ObtorLib_App_Core_Crm_Exception($ex);
        }
    }
}
