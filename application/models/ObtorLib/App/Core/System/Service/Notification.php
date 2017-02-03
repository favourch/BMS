<?php

/**
 * Description of Notification
 *
 * @author anushiya
 */
class Base_Model_ObtorLib_App_Core_System_Service_Notification extends Base_Model_ObtorLib_Eav_Model_Service {

    //put your code here
    public $notification;

    /*
     * Get a notification details using notification id
     * @return      : Entity Notification Object (Base_Model_ObtorLib_App_Core_System_Entity_Notification)
     */

    public function getNotification($id) {
        try {
            $objSystemNotification = new Base_Model_ObtorLib_App_Core_System_Dao_Notification();
            $notification = $objSystemNotification->getNotification($id);
            return $notification;
        } catch (Exception $ex) {
            throw new Base_Model_ObtorLib_App_Core_System_Exception($ex);
        }
    }

    /*
     * Add system notification information
     * @return      : Integer ID / Null
     */

    public function addNotification() {
        try {
            if (!($this->notification instanceof Base_Model_ObtorLib_App_Core_System_Entity_Notification)) {
                throw new Base_Model_ObtorLib_App_Core_System_Exception(" System Notification Entity not intialized");
            } else {
                $objNotification = new Base_Model_ObtorLib_App_Core_System_Dao_Notification();
                $objNotification->notification = $this->notification;
                return $objNotification->addNotification();
            }
        } catch (Exception $ex) {
            throw new Base_Model_ObtorLib_App_Core_System_Exception($ex);
        }
    }

    /*
     * Update system notification information
     * @return      : Boolean true/false
     */

    public function updateNotification() {
        try {
            if (!($this->notification instanceof Base_Model_ObtorLib_App_Core_System_Entity_Notification)) {
                throw new Base_Model_ObtorLib_App_Core_System_Exception(" System Notification Entity not intialized");
            } else {
                $objNotification = new Base_Model_ObtorLib_App_Core_System_Dao_Notification();
                $objNotification->notification = $this->notification;
                return $objNotification->updateNotification();
            }
        } catch (Exception $ex) {
            throw new Base_Model_ObtorLib_App_Core_System_Exception($ex);
        }
    }

    /*
     * Search system notification information ....
     * @return : Array of System Notification Entities...
     */

    public function search($limit = null) {
        try {
            if (!($this->notification instanceof Base_Model_ObtorLib_App_Core_System_Entity_Notification)) {
                throw new Base_Model_ObtorLib_App_Core_System_Exception(" System Notification Entity not intialized");
            } else {
                $objNotification = new Base_Model_ObtorLib_App_Core_System_Dao_Notification();
                $objNotification->notification = $this->notification;
                return $objNotification->search($limit);
            }
        } catch (Exception $ex) {
            throw new Base_Model_ObtorLib_App_Core_System_Exception($ex);
        }
    }
    
    
     /*
     * Search system notification information ....
     * @return : Array of System Notification Entities...
     */

    public function searchCount() {
        try {
            if (!($this->notification instanceof Base_Model_ObtorLib_App_Core_System_Entity_Notification)) {
                throw new Base_Model_ObtorLib_App_Core_System_Exception(" System Notification Entity not intialized");
            } else {
                $objNotification = new Base_Model_ObtorLib_App_Core_System_Dao_Notification();
                $objNotification->notification = $this->notification;
                return $objNotification->searchCount();
            }
        } catch (Exception $ex) {
            throw new Base_Model_ObtorLib_App_Core_System_Exception($ex);
        }
    }

}
