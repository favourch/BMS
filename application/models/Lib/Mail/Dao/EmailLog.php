<?php

/**
 * @namespace       : Base
 * @package         : Model
 * @subpackage 		: Lib.Mail.Dao
 * @name 			: EmailLog
 * @author 			: Iyngaran Iyathurai
 * 			          E-Mail - Iyngaran55@yahoo.com
 * 
 * @copyright  	Copyright (c) 2009 Hemnette Web Solutions (Pvt) Ltd, Sri Lanka.
 * 				(http://hemnettewebsolutions.com.au/)
 * 
 * Description : The object-oriented interface to bcas database table tbl_department 
 * 	
 */
class Base_Model_Lib_Mail_Dao_EmailLog extends Zend_Db_Table {

    protected $_name = 'tbl_email_log'; // the table name
    protected $_primary = 'id'; // the primary key
    public $emailLog;

    /*
     * @name        : getItem
     * @Description : The function is to get a mail log information
     * @param       : $code (page code)
     * @return      : Entity EmailLog Object (Base_Model_Lib_Catelog_Entity_EmailLog)
     */

    public function getItem($id) {
        $objEmailLog = new Base_Model_Lib_Mail_Entity_EmailLog();
        $objClientService = new Base_Model_Lib_Client_Service_Client();
        try {

            $id = (int) $id;
            $row = $this->fetchRow('id = ' . $id);

            if ($row != "") {
                $result = $row->toArray();
                $objEmailLog->setId($row ['id']);
                $objEmailLog->setUserid($objClientService->getClient($row ['userid']));
                $objEmailLog->setSubject($row ['subject']);
                $objEmailLog->setMessage($row ['message']);
                $objEmailLog->setDate($row ['date']);
                $objEmailLog->setTo($row ['to']);
                $objEmailLog->setCc($row ['cc']);
                $objEmailLog->setBcc($row ['bcc']);
            }
        } catch (Exception $e) {
           throw new Base_Model_Lib_Eav_Exception_Sql("<strong>Oops !, Error -</strong>" . $e->getMessage());
        }
        return $objEmailLog;
    }
    
    
    /*
     * @name        : addItem
     * @Description : The function is to add a emailLog information
     * 				  to the database.
     * @return      : Integer $last_inserted_id
     */

    public function addItem() {
        $last_inserted_id = 0;

        try {

           if (!($this->emailLog instanceof Base_Model_Lib_Mail_Entity_EmailLog))
                throw new Base_Model_Lib_Mail_Exception(" EmailLog Entity not intialized");

            $data = array(
                'userid' => $this->emailLog->getUserid(),
                'subject' => $this->emailLog->getSubject(),
                'message' => $this->emailLog->getMessage(),
                'date' => $this->emailLog->getDate(),
                'to' => $this->emailLog->getTo(),
		'cc' => $this->emailLog->getCc(),
		'bcc' => $this->emailLog->getBcc()
            );

            $last_inserted_id = $this->insert($data);
        } catch (Exception $e) {
            throw new Base_Model_Lib_Eav_Exception_Sql("<strong>Oops !, Error -</strong>" . $e->getMessage());
        }

        return $last_inserted_id;
    }

    /*
     * @name        : getAll
     * @Description : The function is to get all country information
     * 				  from the database.
     * @return      : Aray Of Entity Country Object (Base_Model_Lib_Catelog_Entity_Country)
     */

    public function getAll() {
        $emailLogInfo = array();

        try {
            $objEmailLog = new Base_Model_Lib_Mail_Entity_EmailLog();

            $select = $this->select()
                    ->from('tbl_email_log', array('id'));

            $result = $this->fetchAll($select);

            foreach ($result as $row) {
                $objEmailLog = $this->getItem($row->id);
                array_push($emailLogInfo, $objEmailLog);
            }
        } catch (Exception $e) {
           throw new Base_Model_Lib_Eav_Exception_Sql("<strong>Oops !, Error -</strong>" . $e->getMessage());
        }
        return $emailLogInfo;
    }

    /*
     * @name        : search
     * @Description : The function is to search mail log information
     * 				  from the database.
     * @return      : Aray Of Entity EmailLog Object (Base_Model_Lib_Mail_Entity_EmailLog)
     */

    public function search($limit) {
        // declare an array variable
        $arrEmaillogs = array();
        $arrWhere = array();
        $sql = "";
        try {

            if (!($this->emailLog instanceof Base_Model_Lib_Mail_Entity_EmailLog))
                throw new Base_Model_Lib_Mail_Exception(" EmailLog Entity not intialized");

            $userId = $this->emailLog->getUserid();

            $sql = "SELECT id FROM tbl_email_log ";

            if ($userId != '')
                array_push($arrWhere, "userid = '" . $userId . "'");


            if (count($arrWhere) > 0)
                $sql.= "WHERE " . implode(' AND ', $arrWhere);

            $sql.= $limit;
            $db = Zend_Db_Table_Abstract::getDefaultAdapter();
            $result = $db->fetchCol($sql);

            foreach ($result as $mid) {
                $objMailLog = $this->getItem($mid);
                array_push($arrEmaillogs, $objMailLog);
            }
        } catch (Exception $e) {
            throw new Base_Model_Lib_Eav_Exception_Sql("<strong>Oops !, Error -</strong>" . $e->getMessage());
        }
        return $arrEmaillogs;
    }

    /*
     * @name        : searchCount()
     * @Description : The function is to search mail log information
     * 				  from the database.
     * @return      : Aray Of Entity EmailLog Object (Base_Model_Lib_Mail_Entity_EmailLog)
     */

    public function searchCount() {
        // declare an array variable
        $totalMailLogs = 0;
        $arrWhere = array();
        $sql = "";
        try {

            if (!($this->emailLog instanceof Base_Model_Lib_Mail_Entity_EmailLog))
                throw new Base_Model_Lib_Mail_Exception(" EmailLog Entity not intialized");

            $userId = $this->emailLog->getUserid();

            $sql = "SELECT count(id) as tot FROM tbl_email_log ";

            if ($userId != '')
                array_push($arrWhere, "userid = '" . $userId . "'");


            if (count($arrWhere) > 0)
                $sql.= "WHERE " . implode(' AND ', $arrWhere);

            $db = Zend_Db_Table_Abstract::getDefaultAdapter();
            $totalMailLogs = $db->fetchOne($sql);
        } catch (Exception $e) {
            throw new Base_Model_Lib_Eav_Exception_Sql("<strong>Oops !, Error -</strong>" . $e->getMessage());
        }
        return $totalMailLogs;
    }

}