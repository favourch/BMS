<?php

/**
 * Description of Announcement
 *
 * @author Iyngaran Iyathurai <iyngaran55@gmail.com>
 */
class Base_Model_ObtorLib_App_Core_Announcement_Service_Announcement extends Base_Model_ObtorLib_Eav_Model_Service {

    public $announcement;

    /*
     * Get a user announcement using id
     * @return      : Entity Announcement Object (Base_Model_ObtorLib_App_Core_Announcement_Entity_Announcement)
     */

    public function getAnnouncement($id) {
        try {
            $objAnnouncement = new Base_Model_ObtorLib_App_Core_Announcement_Dao_Announcement();
            $announcement = $objAnnouncement->getAnnouncement($id);
            return $announcement;
        } catch (Exception $e) {
            throw new Base_Model_ObtorLib_App_Core_Announcement_Exception($e);
        }
    }

    /*
     * Add new user announcement
     * @return      : Integer ID / Null
     */

    public function addAnnouncement() {
        try {
            if (!($this->announcement instanceof Base_Model_ObtorLib_App_Core_Announcement_Entity_Announcement)) {
                throw new Base_Model_ObtorLib_App_Core_Announcement_Exception(" Announcement Entity not intialized");
            } else {
                $objAnnouncement = new Base_Model_ObtorLib_App_Core_Announcement_Dao_Announcement();
                $objAnnouncement->announcement = $this->announcement;
                return $objAnnouncement->addAnnouncement();
            }
        } catch (Exception $ex) {
            throw new Base_Model_ObtorLib_App_Core_Announcement_Exception($ex);
        }
    }

    /*
     * Update user announcement
     * @return      : Integer ID / Null
     */

    public function updateAnnouncement() {
        try {
            if (!($this->announcement instanceof Base_Model_ObtorLib_App_Core_Announcement_Entity_Announcement)) {
                throw new Base_Model_ObtorLib_App_Core_Announcement_Exception(" Announcement Entity not intialized");
            } else {
                $objAnnouncement = new Base_Model_ObtorLib_App_Core_Announcement_Dao_Announcement();
                $objAnnouncement->announcement = $this->announcement;
                return $objAnnouncement->updateAnnouncement();
            }
        } catch (Exception $ex) {
            throw new Base_Model_ObtorLib_App_Core_Announcement_Exception($ex);
        }
    }

    /*
     * Delete user announcement
     * @return      : Integer ID / Null
     */

    public function deleteAnnouncement() {
        try {
            if (!($this->announcement instanceof Base_Model_ObtorLib_App_Core_Announcement_Entity_Announcement)) {
                throw new Base_Model_ObtorLib_App_Core_Announcement_Exception(" Announcement Entity not intialized");
            } else {
                $objAnnouncement = new Base_Model_ObtorLib_App_Core_Announcement_Dao_Announcement();
                $objAnnouncement->announcement = $this->announcement;
                return $objAnnouncement->deleteAnnouncement();
            }
        } catch (Exception $ex) {
            throw new Base_Model_ObtorLib_App_Core_Announcement_Exception($ex);
        }
    }

    /*
     * Search user announcements....
     * @return : Array of Announcements Entities...
     */

    public function search($limit = null) {
        try {
            if (!($this->announcement instanceof Base_Model_ObtorLib_App_Core_Announcement_Entity_Announcement)) {
                throw new Base_Model_ObtorLib_App_Core_Announcement_Exception(" Announcement Entity not intialized");
            } else {
                $objAnnouncement = new Base_Model_ObtorLib_App_Core_Announcement_Dao_Announcement();
                $objAnnouncement->announcement = $this->announcement;
                return $objAnnouncement->search($limit);
            }
        } catch (Exception $ex) {
            throw new Base_Model_ObtorLib_App_Core_Announcement_Exception($ex);
        }
    }
    
    
    /*
     * Search user announcements....
     * @return : Array of Announcements Entities...
     */

    public function searchCount() {
        try {
            if (!($this->announcement instanceof Base_Model_ObtorLib_App_Core_Announcement_Entity_Announcement)) {
                throw new Base_Model_ObtorLib_App_Core_Announcement_Exception(" Announcement Entity not intialized");
            } else {
                $objAnnouncement = new Base_Model_ObtorLib_App_Core_Announcement_Dao_Announcement();
                $objAnnouncement->announcement = $this->announcement;
                return $objAnnouncement->searchCount();
            }
        } catch (Exception $ex) {
            throw new Base_Model_ObtorLib_App_Core_Announcement_Exception($ex);
        }
    }

}
