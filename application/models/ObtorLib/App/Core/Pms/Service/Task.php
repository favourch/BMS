<?php

/**
 * Description of Task
 *
 * @author Iyngaran Iyathurai <iyngaran55@gmail.com>
 */
class Base_Model_ObtorLib_App_Core_Pms_Service_Task extends Base_Model_ObtorLib_Eav_Model_Service {

    public $task;

    /*
     * Get a user task using id
     * @return      : Entity Task Object (Base_Model_ObtorLib_App_Core_Pms_Entity_Task)
     */

    public function getTask($id) {
        try {
            $objTask = new Base_Model_ObtorLib_App_Core_Pms_Dao_Task();
            $task = $objTask->getTask($id);
            return $task;
        } catch (Exception $e) {
            throw new Base_Model_ObtorLib_App_Core_Pms_Exception($e);
        }
    }

    /*
     * Add new user task
     * @return      : Integer ID / Null
     */

    public function addTask() {
        try {
            if (!($this->task instanceof Base_Model_ObtorLib_App_Core_Pms_Entity_Task)) {
                throw new Base_Model_ObtorLib_App_Core_Pms_Exception(" Task Entity not intialized");
            } else {
                $objTask = new Base_Model_ObtorLib_App_Core_Pms_Dao_Task();
                $objTask->task = $this->task;
                return $objTask->addTask();
            }
        } catch (Exception $ex) {
            throw new Base_Model_ObtorLib_App_Core_Pms_Exception($ex);
        }
    }

    /*
     * Update user task
     * @return      : Integer ID / Null
     */

    public function updateTask() {
        try {
            if (!($this->task instanceof Base_Model_ObtorLib_App_Core_Pms_Entity_Task)) {
                throw new Base_Model_ObtorLib_App_Core_Pms_Exception(" Task Entity not intialized");
            } else {
                $objTask = new Base_Model_ObtorLib_App_Core_Pms_Dao_Task();
                $objTask->task = $this->task;
                return $objTask->updateTask();
            }
        } catch (Exception $ex) {
            throw new Base_Model_ObtorLib_App_Core_Pms_Exception($ex);
        }
    }
    
    
        /*
     * Update user task
     * @return      : Integer ID / Null
     */

    public function updateTaskStatus() {
        try {
            if (!($this->task instanceof Base_Model_ObtorLib_App_Core_Pms_Entity_Task)) {
                throw new Base_Model_ObtorLib_App_Core_Pms_Exception(" Task Entity not intialized");
            } else {
                $objTask = new Base_Model_ObtorLib_App_Core_Pms_Dao_Task();
                $objTask->task = $this->task;
                return $objTask->updateTaskStatus();
            }
        } catch (Exception $ex) {
            throw new Base_Model_ObtorLib_App_Core_Pms_Exception($ex);
        }
    }

    /*
     * Delete user task
     * @return      : Integer ID / Null
     */

    public function deleteTask() {
        try {
            if (!($this->task instanceof Base_Model_ObtorLib_App_Core_Pms_Entity_Task)) {
                throw new Base_Model_ObtorLib_App_Core_Pms_Exception(" Task Entity not intialized");
            } else {
                $objTask = new Base_Model_ObtorLib_App_Core_Pms_Dao_Task();
                $objTask->task = $this->task;
                return $objTask->deleteTask();
            }
        } catch (Exception $ex) {
            throw new Base_Model_ObtorLib_App_Core_Pms_Exception($ex);
        }
    }

    /*
     * Search tasks....
     * @return : Array of tasks Entities...
     */

    public function search($limit = null) {
        try {
            if (!($this->task instanceof Base_Model_ObtorLib_App_Core_Pms_Entity_Task)) {
                throw new Base_Model_ObtorLib_App_Core_Pms_Exception(" Task Entity not initialized");
            } else {
                $objTask = new Base_Model_ObtorLib_App_Core_Pms_Dao_Task();
                $objTask->task = $this->task;
                return $objTask->search($limit);
            }
        } catch (Exception $ex) {
            throw new Base_Model_ObtorLib_App_Core_Pms_Exception($ex);
        }
    }
    
    
    /*
     * Search tasks....
     * @return : Array of tasks Entities...
     */

    public function searchCount() {
        try {
            if (!($this->task instanceof Base_Model_ObtorLib_App_Core_Pms_Entity_Task)) {
                throw new Base_Model_ObtorLib_App_Core_Pms_Exception(" Task Entity not initialized");
            } else {
                $objTask = new Base_Model_ObtorLib_App_Core_Pms_Dao_Task();
                $objTask->task = $this->task;
                return $objTask->searchCount();
            }
        } catch (Exception $ex) {
            throw new Base_Model_ObtorLib_App_Core_Pms_Exception($ex);
        }
    }
    
    
        /*
     * Search tasks....
     * @return : Array of tasks Entities...
     */

    public function getTotalOnProgressTasks() {
        try {
           $objTask = new Base_Model_ObtorLib_App_Core_Pms_Dao_Task();
                return $objTask->getTotalOnProgressTasks();
        } catch (Exception $ex) {
            throw new Base_Model_ObtorLib_App_Core_Pms_Exception($ex);
        }
    }

}
