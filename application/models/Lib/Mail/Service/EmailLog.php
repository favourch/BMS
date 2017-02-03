<?php

/**
 * @namespace       : Base
 * @package         : Model
 * @subpackage 		: Lib.Mail.Service
 * @name 			: EmailLog
 * @author 			: Iyngaran Iyathurai
 * 			  		  Software eng - Bcas R&D
 * 			          E-Mail - Iyngaran55@yahoo.com, Iyngaran@bcas.lk
 * 
 * @copyright Copyright (c) 2009 - 2010 BCAS R&D . (http://www.lab.bcasrd.com)
 * 
 * Description : The Service class for the EmailLog Object 
 * 	
 */
class Base_Model_Lib_Mail_Service_EmailLog extends Base_Model_Lib_Eav_Model_Service {

    // the emailLog object
    public $emailLog;

    // the methods goes from here....
    /*
     * @name        : getItem($id)
     * @Description : The function is to get a emailLog information
     * 				  from the database.
     * @param       : $id (EmailLog Id)
     * @return      : Base_Model_Lib_EmailLog_Entity_EmailLog
     */

    public function getItem($id) {
        $emailLog = "";
        try {
            $objEmailLog = new Base_Model_Lib_Mail_Dao_EmailLog();
            $emailLog = $objEmailLog->getItem($id);
        } catch (Exception $e) {
            throw new Base_Model_Lib_Catelog_Exception("<strong>Oops !, Error -</strong>" . $e->getMessage());
        }
        return $emailLog;
    }

    /*
     * @name        : addItem()
     * @Description : The function is to add a emailLog information
     * 				  to the database.
     * @return      : Integer $last_inserted_id
     */

    public function addItem() {
        $last_inserted_id = 0;
        try {

            if (!($this->emailLog instanceof Base_Model_Lib_Mail_Entity_EmailLog))
                throw new Base_Model_Lib_Catelog_Exception(" EmailLog Entity not intialized");

            $objEmailLogDao = new Base_Model_Lib_Mail_Dao_EmailLog();
            $objEmailLogDao->emailLog = $this->emailLog;
            $last_inserted_id = $objEmailLogDao->addItem();
        } catch (Exception $e) {
            throw new Base_Model_Lib_Catelog_Exception("<strong>Oops !, Error Class name -</strong>  <em>Base_Model_Lib_Catelog_Service_EmailLog</em>, <strong>Function -</strong> <em>addEmailLog()</em>, <strong>Exception -</strong> <em>" . $e->getMessage() . "</em>");
        }

        return $last_inserted_id;
    }

    /*
     * @name        : getAll
     * @Description : The function is to get All location information
     * 				  from the database.
     * @return      : Array Of Base_Model_Lib_Mail_Dao_EmailLog
     */

    public function getAll() {
        $emailLogs = "";
        try {
            $objEmailLog = new Base_Model_Lib_Mail_Dao_EmailLog();
            $emailLogs = $objEmailLog->getAll();
        } catch (Exception $e) {
            throw new Base_Model_Lib_Catelog_Exception("<strong>Oops !, Error Class name -</strong>  <em>Base_Model_Lib_Mail_Dao_EmailLog</em>, <strong>Function -</strong> <em>getAll()</em>, <strong>Exception -</strong> <em>" . $e->getMessage() . "</em>");
        }
        return $emailLogs;
    }

    /*
     * @name        : search
     * @Description : The function is to search mailLogs information
     * 				  from the database.
     * @return      : Array Of Base_Model_Lib_Client_Entity_Client
     */

    public function search($limit) {
        $mailLogs = "";
        try {


            if (!($this->emailLog instanceof Base_Model_Lib_Mail_Entity_EmailLog))
                throw new Base_Model_Lib_Catelog_Exception(" EmailLog Entity not intialized");

            $objMailLogDao = new Base_Model_Lib_Mail_Dao_EmailLog();
            $objMailLogDao->emailLog = $this->emailLog;
            $mailLogs = $objMailLogDao->search($limit);
        } catch (Exception $e) {
            throw new Base_Model_Lib_Client_Exception("<strong>Oops !, Error Class name -</strong>  <em>Base_Model_Lib_Client_Service_Client</em>, <strong>Function -</strong> <em>search()</em>, <strong>Exception -</strong> <em>" . $e->getMessage() . "</em>");
        }
        return $mailLogs;
    }

    /*
     * @name        : search
     * @Description : The function is to search mailLogs information
     * 				  from the database.
     * @return      : Array Of Base_Model_Lib_Client_Entity_Client
     */

    public function searchCount() {
        $totalMailLogs = 0;
        try {


            if (!($this->emailLog instanceof Base_Model_Lib_Mail_Entity_EmailLog))
                throw new Base_Model_Lib_Catelog_Exception(" EmailLog Entity not intialized");

            $objMailLogDao = new Base_Model_Lib_Mail_Dao_EmailLog();
            $objMailLogDao->emailLog = $this->emailLog;
            $totalMailLogs = $objMailLogDao->searchCount();
        } catch (Exception $e) {
            throw new Base_Model_Lib_Client_Exception("<strong>Oops !, Error Class name -</strong>  <em>Base_Model_Lib_Client_Service_Client</em>, <strong>Function -</strong> <em>search()</em>, <strong>Exception -</strong> <em>" . $e->getMessage() . "</em>");
        }
        return $totalMailLogs;
    }

}