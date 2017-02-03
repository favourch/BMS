<?php

/**
 * Description of ToDoList
 *
 * @author Iyngaran Iyathurai <iyngaran55@gmail.com>
 */
class Base_Model_ObtorLib_App_Core_Crm_Service_ToDoList extends Base_Model_ObtorLib_Eav_Model_Service {

    public $toDoList;

    /*
     * Get a user toDoList using id
     * @return      : Entity ToDoList Object (Base_Model_ObtorLib_App_Core_Crm_Entity_ToDoList)
     */

    public function getToDoList($id) {
        try {
            $objToDoList = new Base_Model_ObtorLib_App_Core_Crm_Dao_ToDoList();
            $toDoList = $objToDoList->getToDoList($id);
            return $toDoList;
        } catch (Exception $e) {
            throw new Base_Model_ObtorLib_App_Core_Crm_Exception($e);
        }
    }

    /*
     * Add new user toDoList
     * @return      : Integer ID / Null
     */

    public function addToDoList() {
        try {
            if (!($this->toDoList instanceof Base_Model_ObtorLib_App_Core_Crm_Entity_ToDoList)) {
                throw new Base_Model_ObtorLib_App_Core_Crm_Exception(" ToDoList Entity not intialized");
            } else {
                $objToDoList = new Base_Model_ObtorLib_App_Core_Crm_Dao_ToDoList();
                $objToDoList->toDoList = $this->toDoList;
                return $objToDoList->addToDoList();
            }
        } catch (Exception $ex) {
            throw new Base_Model_ObtorLib_App_Core_Crm_Exception($ex);
        }
    }

    /*
     * Update user toDoList
     * @return      : Integer ID / Null
     */

    public function updateToDoList() {
        try {
            if (!($this->toDoList instanceof Base_Model_ObtorLib_App_Core_Crm_Entity_ToDoList)) {
                throw new Base_Model_ObtorLib_App_Core_Crm_Exception(" ToDoList Entity not intialized");
            } else {
                $objToDoList = new Base_Model_ObtorLib_App_Core_Crm_Dao_ToDoList();
                $objToDoList->toDoList = $this->toDoList;
                return $objToDoList->updateToDoList();
            }
        } catch (Exception $ex) {
            throw new Base_Model_ObtorLib_App_Core_Crm_Exception($ex);
        }
    }

    /*
     * Delete user toDoList
     * @return      : Integer ID / Null
     */

    public function deleteToDoList() {
        try {
            if (!($this->toDoList instanceof Base_Model_ObtorLib_App_Core_Crm_Entity_ToDoList)) {
                throw new Base_Model_ObtorLib_App_Core_Crm_Exception(" ToDoList Entity not intialized");
            } else {
                $objToDoList = new Base_Model_ObtorLib_App_Core_Crm_Dao_ToDoList();
                $objToDoList->toDoList = $this->toDoList;
                return $objToDoList->deleteToDoList();
            }
        } catch (Exception $ex) {
            throw new Base_Model_ObtorLib_App_Core_Crm_Exception($ex);
        }
    }

    /*
     * Search user toDoLists....
     * @return : Array of ToDoLists Entities...
     */

    public function search() {
        try {
            if (!($this->toDoList instanceof Base_Model_ObtorLib_App_Core_Crm_Entity_ToDoList)) {
                throw new Base_Model_ObtorLib_App_Core_Crm_Exception(" ToDoList Entity not intialized");
            } else {
                $objToDoList = new Base_Model_ObtorLib_App_Core_Crm_Dao_ToDoList();
                $objToDoList->toDoList = $this->toDoList;
                return $objToDoList->search();
            }
        } catch (Exception $ex) {
            throw new Base_Model_ObtorLib_App_Core_Crm_Exception($ex);
        }
    }
    
    
     /*
     * Search user toDoLists....
     * @return : Array of ToDoLists Entities...
     */

    public function searchCount() {
        try {
            if (!($this->toDoList instanceof Base_Model_ObtorLib_App_Core_Crm_Entity_ToDoList)) {
                throw new Base_Model_ObtorLib_App_Core_Crm_Exception(" ToDoList Entity not intialized");
            } else {
                $objToDoList = new Base_Model_ObtorLib_App_Core_Crm_Dao_ToDoList();
                $objToDoList->toDoList = $this->toDoList;
                return $objToDoList->searchCount();
            }
        } catch (Exception $ex) {
            throw new Base_Model_ObtorLib_App_Core_Crm_Exception($ex);
        }
    }
    
        /*
     * Update user toDoList
     * @return      : Integer ID / Null
     */

    public function updateStatus() {
        try {
            if (!($this->toDoList instanceof Base_Model_ObtorLib_App_Core_Crm_Entity_ToDoList)) {
                throw new Base_Model_ObtorLib_App_Core_Crm_Exception(" ToDoList Entity not intialized");
            } else {
                $objToDoList = new Base_Model_ObtorLib_App_Core_Crm_Dao_ToDoList();
                $objToDoList->toDoList = $this->toDoList;
                return $objToDoList->updateStatus();
            }
        } catch (Exception $ex) {
            throw new Base_Model_ObtorLib_App_Core_Crm_Exception($ex);
        }
    }

}
