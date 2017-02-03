<?php

/**
 * Description of AnnouncementQueue
 *
 * @author Iyngaran Iyathurai <iyngaran55@gmail.com>
 */
class Base_Model_ObtorLib_App_Core_Announcement_Dao_AnnouncementQueue extends Zend_Db_Table_Abstract {

    //put your code here
    public $announcementQueue;
    protected $_name = 'tbl_announcement_queue';

    /*
     * Get a announcementQueue using id
     * @return      : Entity AnnouncementQueue Object (Base_Model_ObtorLib_App_Core_Announcement_Entity_AnnouncementQueue)
     */

    public function getAnnouncementQueue($id) {
        try {
            $id = (int) $id;
            $row = $this->fetchRow('id = ' . $id);
            if ($row) {
                $announcementQueueRow = $row->toArray();
                $announcementQueueEntity = new Base_Model_ObtorLib_App_Core_Announcement_Entity_AnnouncementQueue();
                $announcementQueueEntity->setId($announcementQueueRow['id']);
                $announcementQueueEntity->setStatus($announcementQueueRow['status']);
                $announcementQueueEntity->setAddedOn($announcementQueueRow['added_on']);
                $announcementQueueEntity->setUpdatedOn($announcementQueueRow['updated_on']);
                $announcementQueueEntity->setStaffId($announcementQueueRow['staff_id']);
                $announcementQueueEntity->setCustomerId($announcementQueueRow['customer_id']);
                $announcementQueueEntity->setAnnouncement($announcementQueueRow['announcement_id']);
                return $announcementQueueEntity;
            } else {
                return null;
            }
        } catch (Exception $ex) {
            throw new Base_Model_ObtorLib_App_Core_Announcement_Exception($ex);
        }
    }

    /*
     * Add new c
     * @return      : Integer ID / Null
     */

    public function addAnnouncementQueue() {
        try {
            if (!($this->announcementQueue instanceof Base_Model_ObtorLib_App_Core_Announcement_Entity_AnnouncementQueue)) {
                throw new Base_Model_ObtorLib_App_Core_Announcement_Exception(" AnnouncementQueue Entity not intialized");
            } else {
                $data = array(
                    'status' => $this->announcementQueue->getStatus(),
                    'added_on' => $this->announcementQueue->getAddedOn(),
                    'updated_on' => $this->announcementQueue->getUpdatedOn(),
                    'staff_id' => $this->announcementQueue->getStaffId(),
                    'customer_id' => $this->announcementQueue->getCustomerId(),
                    'announcement_id' => $this->announcementQueue->getAnnouncement());
                
                $last_inserted_id = $this->insert($data);
                return $last_inserted_id;
            }
        } catch (Exception $ex) {
            throw new Base_Model_ObtorLib_App_Core_Announcement_Exception($ex);
        }
    }

    /*
     * Update announcementQueue
     * @return      : Boolean true/false
     */

    public function updateAnnouncementQueue() {
        try {
            if (!($this->announcementQueue instanceof Base_Model_ObtorLib_App_Core_Announcement_Entity_AnnouncementQueue)) {
                throw new Base_Model_ObtorLib_App_Core_Announcement_Exception(" AnnouncementQueue Entity not intialized");
            } else {
                      $data = array(
                    'status' => $this->announcementQueue->getStatus(),
                    'added_on' => $this->announcementQueue->getAddedOn(),
                    'updated_on' => $this->announcementQueue->getUpdatedOn(),
                    'staff_id' => $this->announcementQueue->getStaffId(),
                    'customer_id' => $this->announcementQueue->getCustomerId(),
                    'announcement_id' => $this->announcementQueue->getAnnouncement());
                return $this->update($data, 'id = ' . (int) $this->announcementQueue->getId());
            }
        } catch (Exception $ex) {
            throw new Base_Model_ObtorLib_App_Core_Announcement_Exception($ex);
        }
    }

    /*
     * Delete announcementQueue
     * @return      : Integer ID / Null
     */

    public function deleteAnnouncementQueue() {
        try {
            if (!($this->announcementQueue instanceof Base_Model_ObtorLib_App_Core_Announcement_Entity_AnnouncementQueue)) {
                throw new Base_Model_ObtorLib_App_Core_Announcement_Exception(" AnnouncementQueue Entity not intialized");
            } else {
                return $this->delete('id =' . (int) $this->announcementQueue->getId());
            }
        } catch (Exception $ex) {
            throw new Base_Model_ObtorLib_App_Core_Announcement_Exception($ex);
        }
    }

    /*
     * Search announcementQueues....
     * @return : Array of AnnouncementQueues Entities...
     */

    public function search($limit = null) {
        try {
            if (!($this->announcementQueue instanceof Base_Model_ObtorLib_App_Core_Announcement_Entity_AnnouncementQueue)) {
                throw new Base_Model_ObtorLib_App_Core_Announcement_Exception(" AnnouncementQueue Entity not intialized");
            } else {
                $arrWhere = array();
                $arrAnnouncementQueue = array();
                $announcement = $this->announcementQueue->getAnnouncement();
                $announcementQueueSql = "SELECT id FROM tbl_announcement_queue ";

                if ($announcement) {
                    array_push($arrWhere, "announcement_id = '" . $announcement . "'");
                }

                if (count($arrWhere) > 0) {
                    $announcementQueueSql.= "WHERE " . implode($arrWhere);
                }
                
                $announcementQueueSql = $announcementQueueSql." ORDER BY id DESC";
                if(!is_null($limit)){
                    $announcementQueueSql = $announcementQueueSql.$limit;
                }

                $db = Zend_Db_Table_Abstract::getDefaultAdapter();
                $result = $db->fetchCol($announcementQueueSql);
                foreach ($result as $announcementQueueId) {
                    $announcementQueueInfo = $this->getAnnouncementQueue($announcementQueueId);
                    array_push($arrAnnouncementQueue, $announcementQueueInfo);
                }
                return $arrAnnouncementQueue;
            }
        } catch (Exception $ex) {
            throw new Base_Model_ObtorLib_App_Core_Announcement_Exception($ex);
        }
    }
    
    
     public function searchCount() {
        try {
            if (!($this->announcementQueue instanceof Base_Model_ObtorLib_App_Core_Announcement_Entity_AnnouncementQueue)) {
                throw new Base_Model_ObtorLib_App_Core_Announcement_Exception(" AnnouncementQueue Entity not intialized");
            } else {
                $total_number = 0;
                 $arrWhere = array();
                $announcement = $this->announcementQueue->getAnnouncement();
                $announcementQueueSql = "SELECT count(id) as tot FROM tbl_announcement_queue ";

                if ($announcement) {
                    array_push($arrWhere, "announcement_id = '" . $announcement . "'");
                }

                if (count($arrWhere) > 0) {
                    $announcementQueueSql.= "WHERE " . implode($arrWhere);
                }
                
                $db = Zend_Db_Table_Abstract::getDefaultAdapter();
                $result 	= $db->fetchRow($announcementQueueSql);
                $total_number = $result['tot']; 
                return $total_number;
            }
        } catch (Exception $ex) {
            throw new Base_Model_ObtorLib_App_Core_Announcement_Exception($ex);
        }
    }
    

}
