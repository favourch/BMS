<?php

/**
 * Description of Log
 *
 * @author anushiya
 */
class Base_Model_ObtorLib_App_Core_System_Dao_Log extends Zend_Db_Table_Abstract {

    //put your code here
    public $log;
    protected $_name = 'tbl_system_log';

    /*
     * Get a log details using log id
     * @return      : Entity Log Object (Base_Model_ObtorLib_App_Core_System_Entity_Log)
     */

    public function getLog($id) {
        try {
            $id = (int) $id;
            $row = $this->fetchRow('id = ' . $id);
            if ($row) {
                $userLogs = $row->toArray();
                $userLogEntity = new Base_Model_ObtorLib_App_Core_System_Entity_Log();
                $userLogEntity->setId($userLogs['id']);
                $userLogEntity->setTableName($userLogs['table_name']);
                $userLogEntity->setRowId($userLogs['row_id']);
                $userLogEntity->setAction($userLogs['log_action']);
                $userLogEntity->setActionDate($userLogs['log_action_date']);
                $userLogEntity->setLogMessage($userLogs['log_message']);
                $userLogEntity->setUserDisplayName($userLogs['action_user_display_name']);
                $userLogEntity->setUserId($userLogs['action_user_id']);
                $userLogEntity->setUserType($userLogs['action_user_type']);
                $userLogEntity->setIpAddress($userLogs['ip_address']);
                return $userLogEntity;
            } else {
                return null;
            }
        } catch (Exception $ex) {
            throw new Base_Model_ObtorLib_App_Core_System_Exception($ex);
        }
    }

     /*
     * Add system log information
     * @return      : Integer ID / Null
     */
    public function addLog() {
        try {
            if (!($this->log instanceof Base_Model_ObtorLib_App_Core_System_Entity_Log)) {
                throw new Base_Model_ObtorLib_App_Core_System_Exception(" System Log Entity not intialized");
            } else {
                $data = array(
                    'table_name' => $this->log->getTableName(),
                    'row_id' => $this->log->getRowId(),
                    'log_action' => $this->log->getAction(),
                    'log_action_date' => $this->log->getActionDate(),
                    'log_message' => $this->log->getLogMessage(),
                    'action_user_display_name' => $this->log->getUserDisplayName(),
                    'action_user_id' => $this->log->getUserId(),
                    'action_user_type' => $this->log->getUserType(),
                    'ip_address' => $this->log->getIpAddress()
                );
                $last_inserted_id = $this->insert($data);
                return $last_inserted_id;
            }
        } catch (Exception $ex) {
            throw new Base_Model_ObtorLib_App_Core_System_Exception($ex);
        }
    }
    
    
    /*
     * Update system log information
     * @return      : Boolean true/false
     */
    public function updateLog() {
        try {
            if (!($this->log instanceof Base_Model_ObtorLib_App_Core_System_Entity_Log)) {
                throw new Base_Model_ObtorLib_App_Core_System_Exception(" System Log Entity not intialized");
            } else {
                $data = array(
                    'table_name' => $this->log->getTableName(),
                    'row_id' => $this->log->getRowId(),
                    'log_action' => $this->log->getAction(),
                    'log_action_date' => $this->log->getActionDate(),
                    'log_message' => $this->log->getLogMessage(),
                    'action_user_display_name' => $this->log->getUserDisplayName(),
                    'action_user_id' => $this->log->getUserId(),
                    'action_user_type' => $this->log->getUserType()
                );
                return $this->update($data, 'id = ' . (int) $this->log->getId());
            }
        } catch (Exception $ex) {
            throw new Base_Model_ObtorLib_App_Core_System_Exception($ex);
        }
    }
    
    /*
     * Search system log information ....
     * @return : Array of System Log Entities...
     */

    public function search($limit = null) {
        try {
            if (!($this->log instanceof Base_Model_ObtorLib_App_Core_System_Entity_Log)) {
                throw new Base_Model_ObtorLib_App_Core_System_Exception(" System Log Entity not intialized");
            } else {
                $arrWhere = array();
                $arrLogs = array();
                $tableName = $this->log->getTableName();
                $row_id    = $this->log->getRowId();
                $actionUserId = $this->log->getUserId();
                $actionUserType = $this->log->getUserType();
                
                $systemLogSql = "SELECT id FROM tbl_system_log ";
                
                if ($tableName) {
                    array_push($arrWhere, "table_name = '" . $tableName . "'");
                }
                
                if ($row_id) {
                    array_push($arrWhere, "row_id = '" . $row_id . "'");
                }
                
                
                 if ($actionUserId) {
                    array_push($arrWhere, "action_user_id = '" . $actionUserId . "'");
                }
                
                if ($actionUserType) {
                    array_push($arrWhere, "action_user_type = '" . $actionUserType . "'");
                }
                

                if (count($arrWhere) > 0) {
                    $systemLogSql.= "WHERE " . implode(' AND ',$arrWhere);
                }

                $systemLogSql = $systemLogSql." ORDER BY ID DESC";
                if(!is_null($limit)){
                    $systemLogSql = $systemLogSql.$limit;
                }

                $db = Zend_Db_Table_Abstract::getDefaultAdapter();
                $result = $db->fetchCol($systemLogSql);
                foreach ($result as $logId) {
                    $logInfo = $this->getLog($logId);
                    array_push($arrLogs, $logInfo);
                }
                return $arrLogs;
            }
        } catch (Exception $ex) {
            throw new Base_Model_ObtorLib_App_Core_User_Exception($ex);
        }
    }
    
    
    
     /*
     * SearchCount system log information ....
     * @return : Total number of System Log Entities...
     */

    public function searchCount() {
        try {
            if (!($this->log instanceof Base_Model_ObtorLib_App_Core_System_Entity_Log)) {
                throw new Base_Model_ObtorLib_App_Core_System_Exception(" System Log Entity not intialized");
            } else {
                $arrWhere = array();
                $arrLogs = array();
                $tableName = $this->log->getTableName();
                $row_id    = $this->log->getRowId();
                $actionUserId = $this->log->getUserId();
                $actionUserType = $this->log->getUserType();
                
                $systemLogSql = "SELECT count(id) As tot FROM tbl_system_log ";
                
                if ($tableName) {
                    array_push($arrWhere, "table_name = '" . $tableName . "'");
                }
                
                if ($row_id) {
                    array_push($arrWhere, "row_id = '" . $row_id . "'");
                }
                
                
                 if ($actionUserId) {
                    array_push($arrWhere, "action_user_id = '" . $actionUserId . "'");
                }
                
                if ($actionUserType) {
                    array_push($arrWhere, "action_user_type = '" . $actionUserType . "'");
                }
                

                if (count($arrWhere) > 0) {
                    $systemLogSql.= "WHERE " . implode(' AND ',$arrWhere);
                }

                

                $db = Zend_Db_Table_Abstract::getDefaultAdapter();
                $result 	= $db->fetchRow($systemLogSql);
                $total_number = $result['tot']; 
                return $total_number;
            }
        } catch (Exception $ex) {
            throw new Base_Model_ObtorLib_App_Core_User_Exception($ex);
        }
    }

}
