<?php

/**
 * Description of AnnouncementQueue
 *
 * @author Iyngaran Iyathurai <iyngaran55@gmail.com>
 */
class Base_Model_ObtorLib_App_Core_Announcement_Service_AnnouncementQueue extends Base_Model_ObtorLib_Eav_Model_Service {

    public $announcementQueue;

    /*
     * Get a user announcementQueue using id
     * @return      : Entity AnnouncementQueue Object (Base_Model_ObtorLib_App_Core_Announcement_Entity_AnnouncementQueue)
     */

    public function getAnnouncementQueue($id) {
        try {
            $objAnnouncementQueue = new Base_Model_ObtorLib_App_Core_Announcement_Dao_AnnouncementQueue();
            $announcementQueue = $objAnnouncementQueue->getAnnouncementQueue($id);
            return $announcementQueue;
        } catch (Exception $e) {
            throw new Base_Model_ObtorLib_App_Core_Announcement_Exception($e);
        }
    }

    /*
     * Add new user announcementQueue
     * @return      : Integer ID / Null
     */

    public function addAnnouncementQueue() {
        try {
            if (!($this->announcementQueue instanceof Base_Model_ObtorLib_App_Core_Announcement_Entity_AnnouncementQueue)) {
                throw new Base_Model_ObtorLib_App_Core_Announcement_Exception(" AnnouncementQueue Entity not intialized");
            } else {
                $objAnnouncementQueue = new Base_Model_ObtorLib_App_Core_Announcement_Dao_AnnouncementQueue();
                $objAnnouncementQueue->announcementQueue = $this->announcementQueue;
                return $objAnnouncementQueue->addAnnouncementQueue();
            }
        } catch (Exception $ex) {
            throw new Base_Model_ObtorLib_App_Core_Announcement_Exception($ex);
        }
    }

    /*
     * Update user announcementQueue
     * @return      : Integer ID / Null
     */

    public function updateAnnouncementQueue() {
        try {
            if (!($this->announcementQueue instanceof Base_Model_ObtorLib_App_Core_Announcement_Entity_AnnouncementQueue)) {
                throw new Base_Model_ObtorLib_App_Core_Announcement_Exception(" AnnouncementQueue Entity not intialized");
            } else {
                $objAnnouncementQueue = new Base_Model_ObtorLib_App_Core_Announcement_Dao_AnnouncementQueue();
                $objAnnouncementQueue->announcementQueue = $this->announcementQueue;
                return $objAnnouncementQueue->updateAnnouncementQueue();
            }
        } catch (Exception $ex) {
            throw new Base_Model_ObtorLib_App_Core_Announcement_Exception($ex);
        }
    }

    /*
     * Delete user announcementQueue
     * @return      : Integer ID / Null
     */

    public function deleteAnnouncementQueue() {
        try {
            if (!($this->announcementQueue instanceof Base_Model_ObtorLib_App_Core_Announcement_Entity_AnnouncementQueue)) {
                throw new Base_Model_ObtorLib_App_Core_Announcement_Exception(" AnnouncementQueue Entity not intialized");
            } else {
                $objAnnouncementQueue = new Base_Model_ObtorLib_App_Core_Announcement_Dao_AnnouncementQueue();
                $objAnnouncementQueue->announcementQueue = $this->announcementQueue;
                return $objAnnouncementQueue->deleteAnnouncementQueue();
            }
        } catch (Exception $ex) {
            throw new Base_Model_ObtorLib_App_Core_Announcement_Exception($ex);
        }
    }

    /*
     * Search user announcementQueues....
     * @return : Array of AnnouncementQueues Entities...
     */

    public function search($limit = null) {
        try {
            if (!($this->announcementQueue instanceof Base_Model_ObtorLib_App_Core_Announcement_Entity_AnnouncementQueue)) {
                throw new Base_Model_ObtorLib_App_Core_Announcement_Exception(" AnnouncementQueue Entity not intialized");
            } else {
                $objAnnouncementQueue = new Base_Model_ObtorLib_App_Core_Announcement_Dao_AnnouncementQueue();
                $objAnnouncementQueue->announcementQueue = $this->announcementQueue;
                return $objAnnouncementQueue->search($limit);
            }
        } catch (Exception $ex) {
            throw new Base_Model_ObtorLib_App_Core_Announcement_Exception($ex);
        }
    }
    
    
    /*
     * Search user announcementQueues....
     * @return : Array of AnnouncementQueues Entities...
     */

    public function searchCount() {
        try {
            if (!($this->announcementQueue instanceof Base_Model_ObtorLib_App_Core_Announcement_Entity_AnnouncementQueue)) {
                throw new Base_Model_ObtorLib_App_Core_Announcement_Exception(" AnnouncementQueue Entity not intialized");
            } else {
                $objAnnouncementQueue = new Base_Model_ObtorLib_App_Core_Announcement_Dao_AnnouncementQueue();
                $objAnnouncementQueue->announcementQueue = $this->announcementQueue;
                return $objAnnouncementQueue->searchCount();
            }
        } catch (Exception $ex) {
            throw new Base_Model_ObtorLib_App_Core_Announcement_Exception($ex);
        }
    }

}
