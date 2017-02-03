<?php

/**
 * Description of Notification
 *
 * @author anushiya
 */
class Base_Model_ObtorLib_App_Core_System_Dao_Notification extends Zend_Db_Table_Abstract {

    //put your code here
    public $notification;
    protected $_name = 'tbl_notifications';

    /*
     * Get a notification details using notification id
     * @return      : Entity Notification Object (Base_Model_ObtorLib_App_Core_System_Entity_Notification)
     */

    public function getNotification($id) {
        try {
            $id = (int) $id;
            $row = $this->fetchRow('id = ' . $id);
            if ($row) {
                $notifications = $row->toArray();
                $notificationEntity = new Base_Model_ObtorLib_App_Core_System_Entity_Notification();
                $notificationEntity->setId($notifications['id']);
                $notificationEntity->setRelId($notifications['rel_id']);
                $notificationEntity->setRelType($notifications['rel_type']);
                $notificationEntity->setNotificationMessage($notifications['notification_message']);
                $notificationEntity->setNotificationType($notifications['notification_type']);
                $notificationEntity->setAddedOn($notifications['added_on']);
                $notificationEntity->setCurrentStatus($notifications['current_status']);
                $notificationEntity->setUpdatedOn($notifications['current_status']);
                $notificationEntity->setFromId($notifications['from_id']);
                $notificationEntity->setFromType($notifications['from_type']);
                return $notificationEntity;
            } else {
                return null;
            }
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
                $data = array(
                    'rel_id' => $this->notification->getRelId(),
                    'rel_type' => $this->notification->getRelType(),
                    'notification_message' => $this->notification->getNotificationMessage(),
                    'notification_type' => $this->notification->getNotificationType(),
                    'added_on' => $this->notification->getAddedOn(),
                    'current_status' => $this->notification->getCurrentStatus(),
                    'from_id'=> $this->notification->getFromId(),
                    'from_type'=> $this->notification->getFromType()
                );
                $last_inserted_id = $this->insert($data);
                return $last_inserted_id;
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
                $data = array(
                    'current_status' => $this->notification->getCurrentStatus(),
                     'updated_on' => $this->notification->getUpdatedOn()
                );
                return $this->update($data, 'id = ' . (int) $this->notification->getId());
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
                $arrWhere = array();
                $arrNotifications = array();
                $relId    = $this->notification->getRelId();
                $relType = $this->notification->getRelType();
                $currentStatus = $this->notification->getCurrentStatus();
                
                $systemNotificationSql = "SELECT id FROM tbl_notifications ";
                

                if ($relId) {
                    array_push($arrWhere, "rel_id = '" . $relId . "'");
                }
                
                if ($relType) {
                    array_push($arrWhere, "rel_type = '" . $relType . "'");
                }
                
                if ($currentStatus) {
                    array_push($arrWhere, "current_status = '" . $currentStatus . "'");
                }
                

                if (count($arrWhere) > 0) {
                    $systemNotificationSql.= "WHERE " . implode(' AND ',$arrWhere);
                }

                $systemNotificationSql = $systemNotificationSql." ORDER BY id DESC";
                if(!is_null($limit)){
                    $systemNotificationSql = $systemNotificationSql.$limit;
                }

                $db = Zend_Db_Table_Abstract::getDefaultAdapter();
                $result = $db->fetchCol($systemNotificationSql);
                foreach ($result as $notificationId) {
                    $notificationInfo = $this->getNotification($notificationId);
                    array_push($arrNotifications, $notificationInfo);
                }
                return $arrNotifications;
            }
        } catch (Exception $ex) {
            throw new Base_Model_ObtorLib_App_Core_User_Exception($ex);
        }
    }
    
    
    
     /*
     * SearchCount system notification information ....
     * @return : Total number of System Notification Entities...
     */

    public function searchCount() {
        try {
            if (!($this->notification instanceof Base_Model_ObtorLib_App_Core_System_Entity_Notification)) {
                throw new Base_Model_ObtorLib_App_Core_System_Exception(" System Notification Entity not intialized");
            } else {
                $arrWhere = array();
                $relId    = $this->notification->getRelId();
                $relType = $this->notification->getRelType();
                $currentStatus = $this->notification->getCurrentStatus();
                $total_number = 0;
                
                $systemNotificationSql = "SELECT count(id) as tot FROM tbl_notifications ";
                

                if ($relId) {
                    array_push($arrWhere, "rel_id = '" . $relId . "'");
                }
                
                
                
                if ($relType) {
                    array_push($arrWhere, "rel_type = '" . $relType . "'");
                }
                
                  if ($currentStatus) {
                    array_push($arrWhere, "current_status = '" . $currentStatus . "'");
                }
                

                if (count($arrWhere) > 0) {
                    $systemNotificationSql.= "WHERE " . implode(' AND ',$arrWhere);
                }

                $db = Zend_Db_Table_Abstract::getDefaultAdapter();
                $result 	= $db->fetchRow($systemNotificationSql);
                $total_number = $result['tot']; 
                return $total_number;
            }
        } catch (Exception $ex) {
            throw new Base_Model_ObtorLib_App_Core_User_Exception($ex);
        }
    }

}
