<?php

/**
 * Description of Log
 *
 * @author anushiya
 */
class Base_Model_ObtorLib_App_Core_System_Service_Log extends Base_Model_ObtorLib_Eav_Model_Service {

    //put your code here
    public $log;

    /*
     * Get a log details using log id
     * @return      : Entity Log Object (Base_Model_ObtorLib_App_Core_System_Entity_Log)
     */

    public function getLog($id) {
        try {
            $objSystemLog = new Base_Model_ObtorLib_App_Core_System_Dao_Log();
            $log = $objSystemLog->getLog($id);
            return $log;
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
                $objLog = new Base_Model_ObtorLib_App_Core_System_Dao_Log();
                $objLog->log = $this->log;
                return $objLog->addLog();
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
                $objLog = new Base_Model_ObtorLib_App_Core_System_Dao_Log();
                $objLog->log = $this->log;
                return $objLog->updateLog();
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
                $objLog = new Base_Model_ObtorLib_App_Core_System_Dao_Log();
                $objLog->log = $this->log;
                return $objLog->search($limit);
            }
        } catch (Exception $ex) {
            throw new Base_Model_ObtorLib_App_Core_System_Exception($ex);
        }
    }
    
    
     /*
     * Search system log information ....
     * @return : Array of System Log Entities...
     */

    public function searchCount() {
        try {
            if (!($this->log instanceof Base_Model_ObtorLib_App_Core_System_Entity_Log)) {
                throw new Base_Model_ObtorLib_App_Core_System_Exception(" System Log Entity not intialized");
            } else {
                $objLog = new Base_Model_ObtorLib_App_Core_System_Dao_Log();
                $objLog->log = $this->log;
                return $objLog->searchCount();
            }
        } catch (Exception $ex) {
            throw new Base_Model_ObtorLib_App_Core_System_Exception($ex);
        }
    }

}
