<?php

/**
 * Description of Followup
 *
 * @author Iyngaran Iyathurai <iyngaran55@gmail.com>
 */
class Base_Model_ObtorLib_App_Core_Customer_Dao_Followup extends Zend_Db_Table_Abstract {

    //put your code here
    public $followup;
    protected $_name = 'tbl_inquire_followup';

    /*
     * Get a followup using id
     * @return      : Entity Followup Object (Base_Model_ObtorLib_App_Core_Customer_Entity_Followup)
     */

    public function getFollowup($id) {
        try {
            $id = (int) $id;
            $row = $this->fetchRow('id = ' . $id);
            if ($row) {
                $followupRow = $row->toArray();
                $followupEntity = new Base_Model_ObtorLib_App_Core_Customer_Entity_Followup();
                $followupEntity->setId($followupRow['id']);
                $followupEntity->setFollowupTitle($followupRow['followup_title']);
                $followupEntity->setFollowupDescription($followupRow['followup_description']);
                $followupEntity->setAddedBy($followupRow['added_by']);
                $followupEntity->setAddedOn($followupRow['added_on']);
                $followupEntity->setModifiedBy($followupRow['modified_by']);
                $followupEntity->setModifiedOn($followupRow['modified_on']);
                $followupEntity->setInquire($followupRow['inquire_id']);
                return $followupEntity;
            } else {
                return null;
            }
        } catch (Exception $ex) {
            throw new Base_Model_ObtorLib_App_Core_Customer_Exception($ex);
        }
    }

    /*
     * Add new c
     * @return      : Integer ID / Null
     */

    public function addFollowup() {
        try {
            if (!($this->followup instanceof Base_Model_ObtorLib_App_Core_Customer_Entity_Followup)) {
                throw new Base_Model_ObtorLib_App_Core_Customer_Exception(" Followup Entity not intialized");
            } else {
               
                $data = array(
                    'followup_title' => $this->followup->getFollowupTitle(),
                    'followup_description' => $this->followup->getFollowupDescription(),
                    'added_by' => $this->followup->getAddedBy(),
                    'added_on' => $this->followup->getAddedOn(),
                    'modified_by' => $this->followup->getModifiedBy(),
                    'modified_on' => $this->followup->getModifiedOn(),
                    'inquire_id' => $this->followup->getInquire());
                
                $last_inserted_id = $this->insert($data);
                return $last_inserted_id;
            }
        } catch (Exception $ex) {
            throw new Base_Model_ObtorLib_App_Core_Customer_Exception($ex);
        }
    }

    /*
     * Update followup
     * @return      : Boolean true/false
     */

    public function updateFollowup() {
        try {
            if (!($this->followup instanceof Base_Model_ObtorLib_App_Core_Customer_Entity_Followup)) {
                throw new Base_Model_ObtorLib_App_Core_Customer_Exception(" Followup Entity not intialized");
            } else {
                 $data = array(
                    'followup_title' => $this->followup->getFollowupTitle(),
                    'followup_description' => $this->followup->getFollowupDescription(),
                    'modified_by' => $this->followup->getModifiedBy(),
                    'modified_on' => $this->followup->getModifiedOn(),
                    'inquire_id' => $this->followup->getInquire());
                return $this->update($data, 'id = ' . (int) $this->followup->getId());
            }
        } catch (Exception $ex) {
            throw new Base_Model_ObtorLib_App_Core_Customer_Exception($ex);
        }
    }

    /*
     * Delete followup
     * @return      : Integer ID / Null
     */

    public function deleteFollowup() {
        try {
            if (!($this->followup instanceof Base_Model_ObtorLib_App_Core_Customer_Entity_Followup)) {
                throw new Base_Model_ObtorLib_App_Core_Customer_Exception(" Followup Entity not intialized");
            } else {
                return $this->delete('id =' . (int) $this->followup->getId());
            }
        } catch (Exception $ex) {
            throw new Base_Model_ObtorLib_App_Core_Customer_Exception($ex);
        }
    }

    /*
     * Search followups....
     * @return : Array of Followups Entities...
     */

    public function search() {
        try {
            if (!($this->followup instanceof Base_Model_ObtorLib_App_Core_Customer_Entity_Followup)) {
                throw new Base_Model_ObtorLib_App_Core_Customer_Exception(" Followup Entity not intialized");
            } else {
                $arrWhere = array();
                $arrInquires = array();
                $inquireId = $this->followup->getInquire();
                $followupSql = "SELECT id FROM tbl_inquire_followup ";

                if ($inquireId) {
                    array_push($arrWhere, "inquire_id = '" . $inquireId . "'");
                }

                if (count($arrWhere) > 0) {
                    $followupSql.= "WHERE " . implode($arrWhere);
                }

                $db = Zend_Db_Table_Abstract::getDefaultAdapter();
                $result = $db->fetchCol($followupSql);
                foreach ($result as $followupId) {
                    $followupInfo = $this->getFollowup($followupId);
                    array_push($arrInquires, $followupInfo);
                }
                return $arrInquires;
            }
        } catch (Exception $ex) {
            throw new Base_Model_ObtorLib_App_Core_Customer_Exception($ex);
        }
    }

}
