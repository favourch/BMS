<?php

/**
 * Description of Task
 *
 * @author Iyngaran Iyathurai <iyngaran55@gmail.com>
 */
class Base_Model_ObtorLib_App_Core_Pms_Dao_Task extends Zend_Db_Table_Abstract {

    //put your code here
    public $task;
    protected $_name = 'tbl_project_task';

    /*
     * Get a task using id
     * @return      : Entity Task Object (Base_Model_ObtorLib_App_Core_Pms_Entity_Task)
     */

    public function getTask($id) {
        try {
            $id = (int) $id;
            $row = $this->fetchRow('id = ' . $id);
            if ($row) {
                $taskRow = $row->toArray();
                $taskEntity = new Base_Model_ObtorLib_App_Core_Pms_Entity_Task();
                $taskEntity->setId($taskRow['id']);
                $taskEntity->setName($taskRow['task_name']);
                $taskEntity->setDescription($taskRow['task_description']);
                $taskEntity->setTaskType($taskRow['task_type']);
                $taskEntity->setPriority($taskRow['task_priority']);
                $taskEntity->setProgress($taskRow['task_progress']);
                $taskEntity->setAllocatedHours($taskRow['allocated_hours']);
                $taskEntity->setHoursSpent($taskRow['hours_spent']);
                $taskEntity->setStartDate($taskRow['start_date']);
                $taskEntity->setEndDate($taskRow['end_date']);
                $taskEntity->setProjectId($taskRow['task_id']);
                $taskEntity->setAssignedTo($taskRow['assigned_to']);
                $taskEntity->setCurrentStatus($taskRow['current_status']);   
                $taskEntity->setProjectId($taskRow['project_id']);
                return $taskEntity;
            } else {
                return null;
            }
        } catch (Exception $ex) {
            throw new Base_Model_ObtorLib_App_Core_Pms_Exception($ex);
        }
    }

    /*
     * Add new c
     * @return      : Integer ID / Null
     */

    public function addTask() {
        try {
            if (!($this->task instanceof Base_Model_ObtorLib_App_Core_Pms_Entity_Task)) {
                throw new Base_Model_ObtorLib_App_Core_Pms_Exception(" Task Entity not intialized");
            } else {
                $data = array(
                    'task_name' => $this->task->getName(),
                    'task_description' => $this->task->getDescription(),
                    'task_type' => $this->task->getTaskType(),
                    'task_priority' => $this->task->getPriority(),
                    'task_progress' => $this->task->getProgress(),
                    'allocated_hours' => $this->task->getAllocatedHours(),
                    'hours_spent' => $this->task->getHoursSpent(),
                    'start_date' => $this->task->getStartDate(),
                    'end_date' => $this->task->getEndDate(),
                    'project_id' => $this->task->getProjectId(),
                    'assigned_to' => $this->task->getAssignedTo(),
                    'current_status' => $this->task->getCurrentStatus());
                $last_inserted_id = $this->insert($data);
                return $last_inserted_id;
            }
        } catch (Exception $ex) {
            throw new Base_Model_ObtorLib_App_Core_Pms_Exception($ex);
        }
    }

    /*
     * Update task
     * @return      : Boolean true/false
     */

    public function updateTask() {
        try {
            if (!($this->task instanceof Base_Model_ObtorLib_App_Core_Pms_Entity_Task)) {
                throw new Base_Model_ObtorLib_App_Core_Pms_Exception(" Task Entity not intialized");
            } else {
                $data = array(
                    'task_name' => $this->task->getName(),
                    'task_description' => $this->task->getDescription(),
                    'task_type' => $this->task->getTaskType(),
                    'task_priority' => $this->task->getPriority(),
                    'task_progress' => $this->task->getProgress(),
                    'allocated_hours' => $this->task->getAllocatedHours(),
                    'hours_spent' => $this->task->getHoursSpent(),
                    'start_date' => $this->task->getStartDate(),
                    'end_date' => $this->task->getEndDate(),
                    'project_id' => $this->task->getProjectId(),
                    'assigned_to' => $this->task->getAssignedTo(),
                    'current_status' => $this->task->getCurrentStatus());
                return $this->update($data, 'id = ' . (int) $this->task->getId());
            }
        } catch (Exception $ex) {
            throw new Base_Model_ObtorLib_App_Core_Pms_Exception($ex);
        }
    }

    /*
     * Delete task
     * @return      : Integer ID / Null
     */

    public function deleteTask() {
        try {
            if (!($this->task instanceof Base_Model_ObtorLib_App_Core_Pms_Entity_Task)) {
                throw new Base_Model_ObtorLib_App_Core_Pms_Exception(" Task Entity not intialized");
            } else {
                return $this->delete('id =' . (int) $this->task->getId());
            }
        } catch (Exception $ex) {
            throw new Base_Model_ObtorLib_App_Core_Pms_Exception($ex);
        }
    }

    /*
     * Search user tasks....
     * @return : Array of tasks Entities...
     */

    public function search($limit = null) {
        try {
            if (!($this->task instanceof Base_Model_ObtorLib_App_Core_Pms_Entity_Task)) {
                throw new Base_Model_ObtorLib_App_Core_Pms_Exception(" Task Entity not initialized");
            } else {
                $arrWhere = array();
                $arrtasks = array();
                $projectId = $this->task->getProjectId();
                $assignedTo = $this->task->getAssignedTo();
                $name = $this->task->getProjectId();
                $currentStatus = $this->task->getCurrentStatus();
                $taskType = $this->task->getTaskType();
                $priority = $this->task->getPriority();
                
                
                $taskSql = "SELECT id FROM tbl_project_task ";
                if ($projectId) {
                     array_push($arrWhere, "project_id = '" . $projectId . "'");
                }
                
                if ($assignedTo) {
                     array_push($arrWhere, "assigned_to = '" . $assignedTo . "'");
                }
                
                if ($name) {
                     array_push($arrWhere, "task_name = '" . '%'.$name.'%' . "'");
                }
                
                if ($currentStatus) {
                     array_push($arrWhere, "current_status = '" . $currentStatus . "'");
                }
                
                if ($taskType) {
                     array_push($arrWhere, "task_type = '" . $taskType . "'");
                }
                
                if ($priority) {
                     array_push($arrWhere, "task_priority = '" . $priority . "'");
                }
                
                

                if (count($arrWhere) > 0) {
                    $taskSql.= "WHERE " . implode(' AND ',$arrWhere);
                }
                
                $taskSql = $taskSql." ORDER BY id Asc";
                if(!is_null($limit)){
                    $taskSql = $taskSql.$limit;
                }

                $db = Zend_Db_Table_Abstract::getDefaultAdapter();
                $result = $db->fetchCol($taskSql);
                foreach ($result as $taskId) {
                    $taskInfo = $this->getTask($taskId);
                    array_push($arrtasks, $taskInfo);
                }
                return $arrtasks;
            }
        } catch (Exception $ex) {
            throw new Base_Model_ObtorLib_App_Core_Pms_Exception($ex);
        }
    }
    
    
    
    /*
     * count tasks....
     * @return : Array of tasks Entities...
     */

    public function searchCount() {
        try {
            if (!($this->task instanceof Base_Model_ObtorLib_App_Core_Pms_Entity_Task)) {
                throw new Base_Model_ObtorLib_App_Core_Pms_Exception(" Task Entity not initialized");
            } else {
                $arrWhere = array();
                $total_number = 0;
                $projectId = $this->task->getProjectId();
                $assignedTo = $this->task->getAssignedTo();
                $name = $this->task->getProjectId();
                $currentStatus = $this->task->getCurrentStatus();
                $taskType = $this->task->getTaskType();
                $priority = $this->task->getPriority();
                
                
                $taskSql = "SELECT count(id) as tot FROM tbl_project_task ";
                
                if ($projectId) {
                     array_push($arrWhere, "project_id = '" . $projectId . "'");
                }
                
                if ($assignedTo) {
                     array_push($arrWhere, "assigned_to = '" . $assignedTo . "'");
                }
                
                if ($name) {
                     array_push($arrWhere, "task_name = '" . '%'.$name.'%' . "'");
                }
                
                if ($currentStatus) {
                     array_push($arrWhere, "current_status = '" . $currentStatus . "'");
                }
                
                if ($taskType) {
                     array_push($arrWhere, "task_type = '" . $taskType . "'");
                }
                
                if ($priority) {
                     array_push($arrWhere, "task_priority = '" . $priority . "'");
                }

                if (count($arrWhere) > 0) {
                    $taskSql.= "WHERE " . implode(' AND ',$arrWhere);
                }

                $db = Zend_Db_Table_Abstract::getDefaultAdapter();
                $result 	= $db->fetchRow($taskSql);
                $total_number = $result['tot']; 
                return $total_number;
            }
        } catch (Exception $ex) {
            throw new Base_Model_ObtorLib_App_Core_Pms_Exception($ex);
        }
    }
    
    
        /*
     * Update task
     * @return      : Boolean true/false
     */

    public function updateTaskStatus() {
        try {
            if (!($this->task instanceof Base_Model_ObtorLib_App_Core_Pms_Entity_Task)) {
                throw new Base_Model_ObtorLib_App_Core_Pms_Exception(" Task Entity not intialized");
            } else {
                $data = array(
                    'task_progress' => $this->task->getProgress(),
                    'assigned_to' => $this->task->getAssignedTo(),
                    'current_status' => $this->task->getCurrentStatus());
                return $this->update($data, 'id = ' . (int) $this->task->getId());
            }
        } catch (Exception $ex) {
            throw new Base_Model_ObtorLib_App_Core_Pms_Exception($ex);
        }
    }
    
    /*
     * count tasks.... - Total On Progress Tasks
     * @return : Array of tasks Entities...
     */

    public function getTotalOnProgressTasks() {
        try {
            $taskSql = "SELECT count(id) as tot FROM tbl_project_task";
                $db = Zend_Db_Table_Abstract::getDefaultAdapter();
                $result 	= $db->fetchRow($taskSql);
                $total_number = $result['tot']; 
                return $total_number;
        } catch (Exception $ex) {
            throw new Base_Model_ObtorLib_App_Core_Pms_Exception($ex);
        }
    }

}
