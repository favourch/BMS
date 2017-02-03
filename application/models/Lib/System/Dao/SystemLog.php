<?php

/**
 * @namespace       : Base
 * @package         : Model
 * @subpackage 		: Lib.System.Dao
 * @name 			: SystemLog
 * @author 			: Iyngaran Iyathurai
 * 			  		  Software eng - Bcas R&D
 * 			          E-Mail - Iyngaran55@yahoo.com, Iyngaran@bcas.lk
 *
 * @copyright Copyright (c) 2009 - 2010 Jasmin Media . (http://www.jasmin-media.com/)
 *
 * @Created on     	: 11-04-2010
 * @Modified on     : 11-04-2010
 *
 */
class Base_Model_Lib_System_Dao_SystemLog extends Zend_Db_Table {

    protected $_name = 'tbl_system_log'; // the table name
    protected $_primary = 'id'; // the primary key
    public $systemLog;

    /*
     * @name        : getItem
     * @Description : The function is to get a SystemLog information
     * 				  from the database.
     * @param       : $id (SystemLog Id)
     * @return      : Entity SystemLog Object (Base_Model_Lib_System_Entity_SystemLog)
     */

    public function getItem($systemLogId) {
        $objSystemLog = new Base_Model_Lib_System_Entity_SystemLog();
        try {

            $id = (int) $systemLogId;
            $row = $this->fetchRow('id = ' . $id);

            if ($row != "") {
                $result = $row->toArray();
                $objSystemLog->setId($row ['id']);
                $objSystemLog->setDate($row ['date']);
                $objSystemLog->setLogType($row ['log_type']);
                $objSystemLog->setMessage($row ['message']);
                $objSystemLog->setSubject($row ['subject']);
            }
        } catch (Exception $e) {
            throw new Base_Model_Lib_Eav_Exception_Sql("<strong>Oops !, Error Class name -</strong>" . $e->getMessage());
        }
        return $objSystemLog;
    }

    /*
     * @name        : addItem
     * @Description : The function is to add a SystemLog information
     * 				  to the database.
     * @return      : Integer $last_inserted_id
     */

    public function addItem() {
        $last_inserted_id = 0;
        try {

            if (!($this->systemLog instanceof Base_Model_Lib_System_Entity_SystemLog))
                throw new Base_Model_Lib_System_Exception(" SystemLog Entity not intialized");

            $data = array('subject' => $this->systemLog->getSubject(),
                'message' => $this->systemLog->getMessage(),
                'date' => $this->systemLog->getDate(),
                'log_type' => $this->systemLog->getLogType());

            $last_inserted_id = $this->insert($data);
        } catch (Exception $e) {
            throw new Base_Model_Lib_Eav_Exception_Sql("<strong>Oops !, Error Class name -</strong>" . $e->getMessage());
        }

        return $last_inserted_id;
    }

    /*
     * @name        : search
     * @Description : The function is to search mail log information
     * 				  from the database.
     * @return      : Aray Of Entity SystemLog Object (Base_Model_Lib_Mail_Entity_SystemLog)
     */

    public function search($limit) {
        // declare an array variable
        $arrSystemlogs = array();
        $arrWhere = array();
        $sql = "";
        try {

            if (!($this->systemLog instanceof Base_Model_Lib_System_Entity_SystemLog))
                throw new Base_Model_Lib_System_Exception(" SystemLog Entity not intialized");


            $logType = $this->systemLog->getLogType();
            
            $sql = "SELECT id FROM tbl_system_log ";

            if ($logType != '')
                array_push($arrWhere, "log_type = '" . $logType . "'");

            if (count($arrWhere) > 0)
                $sql.= "WHERE " . implode(' AND ', $arrWhere);

            $sql.= $limit;
            $db = Zend_Db_Table_Abstract::getDefaultAdapter();
            $result = $db->fetchCol($sql);

            foreach ($result as $mid) {
                $objSystemLog = $this->getItem($mid);
                array_push($arrSystemlogs, $objSystemLog);
            }
        } catch (Exception $e) {
            throw new Base_Model_Lib_Eav_Exception_Sql("<strong>Oops !, Error -</strong>" . $e->getMessage());
        }
        return $arrSystemlogs;
    }

    /*
     * @name        : searchCount()
     * @Description : The function is to search mail log information
     * 				  from the database.
     * @return      : Aray Of Entity SystemLog Object (Base_Model_Lib_Mail_Entity_SystemLog)
     */

    public function searchCount() {
        // declare an array variable
        $totalSystemLogs = 0;
        $arrWhere = array();
        $sql = "";
        try {

            if (!($this->systemLog instanceof Base_Model_Lib_System_Entity_SystemLog))
                throw new Base_Model_Lib_System_Exception(" SystemLog Entity not intialized");

            $logType = $this->systemLog->getLogType();
            
            $sql = "SELECT count(id) as tot FROM tbl_system_log ";
            
            if ($logType != '')
                array_push($arrWhere, "log_type = '" . $logType . "'");

            if (count($arrWhere) > 0)
                $sql.= "WHERE " . implode(' AND ', $arrWhere);

            $db = Zend_Db_Table_Abstract::getDefaultAdapter();
            $totalSystemLogs = $db->fetchOne($sql);
        } catch (Exception $e) {
            throw new Base_Model_Lib_Eav_Exception_Sql("<strong>Oops !, Error -</strong>" . $e->getMessage());
        }
        return $totalSystemLogs;
    }

}
?>