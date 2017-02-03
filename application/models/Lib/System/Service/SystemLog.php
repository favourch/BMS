<?php

/**
 * @namespace       : Base
 * @package         : Model
 * @subpackage 		: Lib.System.Service
 * @name 			: SystemLog
 * @author 			: Iyngaran Iyathurai
 * 			  		  Software eng - Bcas R&D
 * 			          E-Mail - Iyngaran55@yahoo.com, Iyngaran@bcas.lk
 *
 * @copyright Copyright (c) 2009 - 2010 BCAS R&D . (http://www.lab.bcasrd.com)
 *
 * Description : The Service class for the SystemLog Object
 *
 */
class Base_Model_Lib_System_Service_SystemLog extends Base_Model_Lib_Eav_Model_Service {

    public $systemLog;

    /*
     * @name        : getItem
     * @Description : The function is to get a SystemLog information
     * 				  from the database.
     * @param       : $id (Member Id)
     * @return      : Base_Model_Lib_System_Entity_SystemLog
     */

    public function getItem($id) {
        $systemLog = "";
        try {
            $objSystemLog = new Base_Model_Lib_System_Dao_SystemLog ( );
            $systemLog = $objSystemLog->getItem($id);
        } catch (Exception $e) {
            throw new Base_Model_Lib_System_Exception("<strong>Oops !, Error Class name -</strong>" . $e->getMessage());
        }
        return $systemLog;
    }

    /*
     * @name        : updateItem
     * @Description : The function is to update/edit a SystemLog information
     * 				  in the database.
     * @return      : $success true/false
     */

    public function addItem() {
        $last_inserted_id = '';
        try {

            if (!($this->systemLog instanceof Base_Model_Lib_System_Entity_SystemLog))
                throw new Base_Model_Lib_System_Exception(" SystemLog Entity not intialized");

            $objSystemLogDao = new Base_Model_Lib_System_Dao_SystemLog ( );
            $objSystemLogDao->systemLog = $this->systemLog;
            $last_inserted_id = $objSystemLogDao->addItem();
        } catch (Exception $e) {
            throw new Base_Model_Lib_System_Exception("<strong>Oops !, Error Class name -</strong>" . $e->getMessage());
        }

        return $last_inserted_id;
    }

    /*
     * @name        : search
     * @Description : The function is to search mailLogs information
     * 				  from the database.
     * @return      : Array Of Base_Model_Lib_Client_Entity_Client
     */

    public function search($limit) {
        $arrSystemlogs = '';
        try {


            if (!($this->systemLog instanceof Base_Model_Lib_System_Entity_SystemLog))
                throw new Base_Model_Lib_System_Exception(" SystemLog Entity not intialized");


            $objSystemLogDao = new Base_Model_Lib_System_Dao_SystemLog ( );
            $objSystemLogDao->systemLog = $this->systemLog;
            $arrSystemlogs = $objSystemLogDao->search($limit);
        } catch (Exception $e) {
            throw new Base_Model_Lib_Client_Exception("<strong>Oops !, Error Class name -</strong>  <em>Base_Model_Lib_Client_Service_Client</em>, <strong>Function -</strong> <em>search()</em>, <strong>Exception -</strong> <em>" . $e->getMessage() . "</em>");
        }
        return $arrSystemlogs;
    }

    /*
     * @name        : search
     * @Description : The function is to search mailLogs information
     * 				  from the database.
     * @return      : Array Of Base_Model_Lib_Client_Entity_Client
     */

    public function searchCount() {
        $totalSystemLogs = 0;
        try {


            if (!($this->systemLog instanceof Base_Model_Lib_System_Entity_SystemLog))
                throw new Base_Model_Lib_System_Exception(" SystemLog Entity not intialized");


            $objSystemLogDao = new Base_Model_Lib_System_Dao_SystemLog ( );
            $objSystemLogDao->systemLog = $this->systemLog;
            $totalSystemLogs = $objSystemLogDao->searchCount();
        } catch (Exception $e) {
            throw new Base_Model_Lib_Client_Exception("<strong>Oops !, Error Class name -</strong>  <em>Base_Model_Lib_Client_Service_Client</em>, <strong>Function -</strong> <em>search()</em>, <strong>Exception -</strong> <em>" . $e->getMessage() . "</em>");
        }
        return $totalSystemLogs;
    }

}

?>