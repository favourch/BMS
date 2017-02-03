<?php

/**
 * Description of Calendar
 *
 * @author anushiya
 */
class Base_Model_ObtorLib_App_Core_System_Service_Calendar extends Base_Model_ObtorLib_Eav_Model_Service {

    //put your code here
    public $calendar;

    /*
     * Get a calendar details using calendar id
     * @return      : Entity Calendar Object (Base_Model_ObtorLib_App_Core_System_Entity_Calendar)
     */

    public function getCalendar($id) {
        try {
            $objSystemCalendar = new Base_Model_ObtorLib_App_Core_System_Dao_Calendar();
            $calendar = $objSystemCalendar->getCalendar($id);
            return $calendar;
        } catch (Exception $ex) {
            throw new Base_Model_ObtorLib_App_Core_System_Exception($ex);
        }
    }

    /*
     * Add system calendar information
     * @return      : Integer ID / Null
     */

    public function addCalendar() {
        try {
            if (!($this->calendar instanceof Base_Model_ObtorLib_App_Core_System_Entity_Calendar)) {
                throw new Base_Model_ObtorLib_App_Core_System_Exception(" System Calendar Entity not intialized");
            } else {
                $objCalendar = new Base_Model_ObtorLib_App_Core_System_Dao_Calendar();
                $objCalendar->calendar = $this->calendar;
                return $objCalendar->addCalendar();
            }
        } catch (Exception $ex) {
            throw new Base_Model_ObtorLib_App_Core_System_Exception($ex);
        }
    }

    /*
     * Update system calendar information
     * @return      : Boolean true/false
     */

    public function updateCalendar() {
        try {
            if (!($this->calendar instanceof Base_Model_ObtorLib_App_Core_System_Entity_Calendar)) {
                throw new Base_Model_ObtorLib_App_Core_System_Exception(" System Calendar Entity not intialized");
            } else {
                $objCalendar = new Base_Model_ObtorLib_App_Core_System_Dao_Calendar();
                $objCalendar->calendar = $this->calendar;
                return $objCalendar->updateCalendar();
            }
        } catch (Exception $ex) {
            throw new Base_Model_ObtorLib_App_Core_System_Exception($ex);
        }
    }
    
    
       /*
     * Delete system calendar information
     * @return      : Boolean true/false
     */

    public function deleteEvent() {
        try {
            if (!($this->calendar instanceof Base_Model_ObtorLib_App_Core_System_Entity_Calendar)) {
                throw new Base_Model_ObtorLib_App_Core_System_Exception(" System Calendar Entity not intialized");
            } else {
                $objCalendar = new Base_Model_ObtorLib_App_Core_System_Dao_Calendar();
                $objCalendar->calendar = $this->calendar;
                return $objCalendar->deleteEvent();
            }
        } catch (Exception $ex) {
            throw new Base_Model_ObtorLib_App_Core_System_Exception($ex);
        }
    }

    /*
     * Search system calendar information ....
     * @return : Array of System Calendar Entities...
     */

    public function search($limit = null) {
        try {
            if (!($this->calendar instanceof Base_Model_ObtorLib_App_Core_System_Entity_Calendar)) {
                throw new Base_Model_ObtorLib_App_Core_System_Exception(" System Calendar Entity not intialized");
            } else {
                $objCalendar = new Base_Model_ObtorLib_App_Core_System_Dao_Calendar();
                $objCalendar->calendar = $this->calendar;
                return $objCalendar->search($limit);
            }
        } catch (Exception $ex) {
            throw new Base_Model_ObtorLib_App_Core_System_Exception($ex);
        }
    }
    
    
     /*
     * Search system calendar information ....
     * @return : Array of System Calendar Entities...
     */

    public function searchCount() {
        try {
            if (!($this->calendar instanceof Base_Model_ObtorLib_App_Core_System_Entity_Calendar)) {
                throw new Base_Model_ObtorLib_App_Core_System_Exception(" System Calendar Entity not intialized");
            } else {
                $objCalendar = new Base_Model_ObtorLib_App_Core_System_Dao_Calendar();
                $objCalendar->calendar = $this->calendar;
                return $objCalendar->searchCount();
            }
        } catch (Exception $ex) {
            throw new Base_Model_ObtorLib_App_Core_System_Exception($ex);
        }
    }
    
      /*
     * Update system calendar information
     * @return      : Boolean true/false
     */

    public function updateCalendarDate() {
        try {
            if (!($this->calendar instanceof Base_Model_ObtorLib_App_Core_System_Entity_Calendar)) {
                throw new Base_Model_ObtorLib_App_Core_System_Exception(" System Calendar Entity not intialized");
            } else {
                $objCalendar = new Base_Model_ObtorLib_App_Core_System_Dao_Calendar();
                $objCalendar->calendar = $this->calendar;
                return $objCalendar->updateCalendarDate();
            }
        } catch (Exception $ex) {
            throw new Base_Model_ObtorLib_App_Core_System_Exception($ex);
        }
    }

}
