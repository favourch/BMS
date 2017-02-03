<?php

/**
 * Description of Announcement
 *
 * @author Iyngaran Iyathurai <iyngaran55@gmail.com>
 */
class Base_Model_ObtorLib_App_Core_Announcement_Dao_Announcement extends Zend_Db_Table_Abstract {

    //put your code here
    public $announcement;
    protected $_name = 'tbl_announcements';

    /*
     * Get a announcement using id
     * @return      : Entity Announcement Object (Base_Model_ObtorLib_App_Core_Announcement_Entity_Announcement)
     */

    public function getAnnouncement($id) {
        try {
            $id = (int) $id;
            $row = $this->fetchRow('id = ' . $id);
            if ($row) {
                $announcementRow = $row->toArray();
                $announcementEntity = new Base_Model_ObtorLib_App_Core_Announcement_Entity_Announcement();
                $announcementEntity->setId($announcementRow['id']);
                $announcementEntity->setAnnounceTo($announcementRow['announce_to']);
                $announcementEntity->setAnnounceType($announcementRow['announce_type']);
                $announcementEntity->setSubject($announcementRow['subject']);
                $announcementEntity->setMessage($announcementRow['message']);
                $announcementEntity->setStatus($announcementRow['status']);
                $announcementEntity->setAddedBy($announcementRow['added_by']);
                $announcementEntity->setAddedOn($announcementRow['added_on']);
                return $announcementEntity;
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

    public function addAnnouncement() {
        try {
            if (!($this->announcement instanceof Base_Model_ObtorLib_App_Core_Announcement_Entity_Announcement)) {
                throw new Base_Model_ObtorLib_App_Core_Announcement_Exception(" Announcement Entity not intialized");
            } else {
                $data = array(
                    'announce_to' => $this->announcement->getAnnounceTo(),
                    'announce_type' => $this->announcement->getAnnounceType(),
                    'subject' => $this->announcement->getSubject(),
                    'message' => $this->announcement->getMessage(),
                    'status' => $this->announcement->getStatus(),
                    'added_by' => $this->announcement->getAddedBy(),
                    'added_on' => $this->announcement->getAddedOn());
                $last_inserted_id = $this->insert($data);
                return $last_inserted_id;
            }
        } catch (Exception $ex) {
            throw new Base_Model_ObtorLib_App_Core_Announcement_Exception($ex);
        }
    }

    /*
     * Update announcement
     * @return      : Boolean true/false
     */

    public function updateAnnouncement() {
        try {
            if (!($this->announcement instanceof Base_Model_ObtorLib_App_Core_Announcement_Entity_Announcement)) {
                throw new Base_Model_ObtorLib_App_Core_Announcement_Exception(" Announcement Entity not intialized");
            } else {
               $data = array(
                    'announce_to' => $this->announcement->getAnnounceTo(),
                    'announce_type' => $this->announcement->getAnnounceType(),
                    'subject' => $this->announcement->getSubject(),
                    'message' => $this->announcement->getMessage(),
                    'status' => $this->announcement->getStatus(),
                    'added_by' => $this->announcement->getAddedBy(),
                    'added_on' => $this->announcement->getAddedOn());
                return $this->update($data, 'id = ' . (int) $this->announcement->getId());
            }
        } catch (Exception $ex) {
            throw new Base_Model_ObtorLib_App_Core_Announcement_Exception($ex);
        }
    }

    /*
     * Delete announcement
     * @return      : Integer ID / Null
     */

    public function deleteAnnouncement() {
        try {
            if (!($this->announcement instanceof Base_Model_ObtorLib_App_Core_Announcement_Entity_Announcement)) {
                throw new Base_Model_ObtorLib_App_Core_Announcement_Exception(" Announcement Entity not intialized");
            } else {
                return $this->delete('id =' . (int) $this->announcement->getId());
            }
        } catch (Exception $ex) {
            throw new Base_Model_ObtorLib_App_Core_Announcement_Exception($ex);
        }
    }

    /*
     * Search announcements....
     * @return : Array of Announcements Entities...
     */

    public function search($limit = null) {
        try {
            if (!($this->announcement instanceof Base_Model_ObtorLib_App_Core_Announcement_Entity_Announcement)) {
                throw new Base_Model_ObtorLib_App_Core_Announcement_Exception(" Announcement Entity not intialized");
            } else {
                $arrWhere = array();
                $arrAnnouncements = array();
                $announceTo = $this->announcement->getAnnounceTo();
                $announce_media = $this->announcement->getAnnounceType();
                $status = $this->announcement->getStatus();
                $announcement_subject = $this->announcement->getSubject();
                
                
                $announcementSql = "SELECT id FROM tbl_announcements ";

                if ($announceTo) {
                    array_push($arrWhere, "announce_to = '" . $announceTo . "'");
                }
                
                 if ($announce_media) {
                    array_push($arrWhere, "announce_type = '" . $announce_media . "'");
                }
                
                 if ($status) {
                    array_push($arrWhere, "status = '" . $status . "'");
                }
                
                if ($announcement_subject) {
                    array_push($arrWhere, "subject LIKE '" . '%'.$announcement_subject.'%' . "'");
                }
                
                

                if (count($arrWhere) > 0) {
                    $announcementSql.= "WHERE " . implode($arrWhere);
                }
                
                $announcementSql = $announcementSql." ORDER BY id DESC";
                if(!is_null($limit)){
                    $announcementSql = $announcementSql.$limit;
                }

                $db = Zend_Db_Table_Abstract::getDefaultAdapter();
                $result = $db->fetchCol($announcementSql);
                foreach ($result as $announcementId) {
                    $announcementInfo = $this->getAnnouncement($announcementId);
                    array_push($arrAnnouncements, $announcementInfo);
                }
                return $arrAnnouncements;
            }
        } catch (Exception $ex) {
            throw new Base_Model_ObtorLib_App_Core_Announcement_Exception($ex);
        }
    }
    
    
    public function searchCount() {
        try {
                        if (!($this->announcement instanceof Base_Model_ObtorLib_App_Core_Announcement_Entity_Announcement)) {
                throw new Base_Model_ObtorLib_App_Core_Announcement_Exception(" Announcement Entity not intialized");
            } else {
                $arrWhere = array();
                $total_number = 0;
                $announceTo = $this->announcement->getAnnounceTo();
                $announcementSql = "SELECT count(id) as tot FROM tbl_announcements ";
               
                if ($announceTo) {
                    array_push($arrWhere, "announce_to = '" . $announceTo . "'");
                }

                if (count($arrWhere) > 0) {
                    $announcementSql.= "WHERE " . implode($arrWhere);
                }

                
                $db = Zend_Db_Table_Abstract::getDefaultAdapter();
                $result 	= $db->fetchRow($announcementSql);
                $total_number = $result['tot']; 
                return $total_number;
            }
        } catch (Exception $ex) {
            throw new Base_Model_ObtorLib_App_Core_Customer_Exception($ex);
        }
    }
    

}
