<?php

/**
 * Description of SubLead
 *
 * @author Iyngaran Iyathurai <iyngaran55@gmail.com>
 */
class Base_Model_ObtorLib_App_Core_Crm_Dao_SubLead extends Zend_Db_Table_Abstract {

    //put your code here
    public $subLead;
    protected $_name = 'tbl_leadsubdetails';

    /*
     * Get a subLead using id
     * @return      : Entity SubLead Object (Base_Model_ObtorLib_App_Core_Crm_Entity_SubLead)
     */

    public function getSubLead($id) {
        try {
            $id = (int) $id;
            $row = $this->fetchRow('id = ' . $id);
            if ($row) {
                $subLeadRow = $row->toArray();
                $subLeadEntity = new Base_Model_ObtorLib_App_Core_Crm_Entity_SubLead();
                $subLeadEntity->setId($subLeadRow['id']);
                $subLeadEntity->setWebsite($subLeadRow['website']);
                $subLeadEntity->setReadornot($subLeadRow['readornot']);
                $subLeadEntity->setCallornot($subLeadRow['callornot']);
                $subLeadEntity->setEmpct($subLeadRow['empct']);
                $subLeadEntity->setLeadId($subLeadRow['lead_id']);
                return $subLeadEntity;
            } else {
                return null;
            }
        } catch (Exception $ex) {
            throw new Base_Model_ObtorLib_App_Core_Crm_Exception($ex);
        }
    }

    /*
     * Add new c
     * @return      : Integer ID / Null
     */

    public function addSubLead() {
        try {
            if (!($this->subLead instanceof Base_Model_ObtorLib_App_Core_Crm_Entity_SubLead)) {
                throw new Base_Model_ObtorLib_App_Core_Crm_Exception(" SubLead Entity not intialized");
            } else {
                $data = array(
                    'website' => $this->subLead->getHomephone(),
                    'callornot' => $this->subLead->getOtherphone(),
                    'readornot' => $this->subLead->getAssistant(),
                    'empct' => $this->subLead->getAssistantphone(),
                    'lead_id' => $this->subLead->getBirthday());
                $last_inserted_id = $this->insert($data);
                return $last_inserted_id;
            }
        } catch (Exception $ex) {
            throw new Base_Model_ObtorLib_App_Core_Crm_Exception($ex);
        }
    }

    /*
     * Update subLead
     * @return      : Boolean true/false
     */

    public function updateSubLead() {
        try {
            if (!($this->subLead instanceof Base_Model_ObtorLib_App_Core_Crm_Entity_SubLead)) {
                throw new Base_Model_ObtorLib_App_Core_Crm_Exception(" SubLead Entity not intialized");
            } else {
               $data = array(
                    'website' => $this->subLead->getHomephone(),
                    'callornot' => $this->subLead->getOtherphone(),
                    'readornot' => $this->subLead->getAssistant(),
                    'empct' => $this->subLead->getAssistantphone(),
                    'lead_id' => $this->subLead->getBirthday());
                return $this->update($data, 'id = ' . (int) $this->subLead->getId());
            }
        } catch (Exception $ex) {
            throw new Base_Model_ObtorLib_App_Core_Crm_Exception($ex);
        }
    }

    /*
     * Delete subLead
     * @return      : Integer ID / Null
     */

    public function deleteSubLead() {
        try {
            if (!($this->subLead instanceof Base_Model_ObtorLib_App_Core_Crm_Entity_SubLead)) {
                throw new Base_Model_ObtorLib_App_Core_Crm_Exception(" SubLead Entity not intialized");
            } else {
                return $this->delete('id =' . (int) $this->subLead->getId());
            }
        } catch (Exception $ex) {
            throw new Base_Model_ObtorLib_App_Core_Crm_Exception($ex);
        }
    }

    /*
     * Search user subLeads....
     * @return : Array of SubLeads Entities...
     */

    public function search($limit = null) {
        try {
            if (!($this->subLead instanceof Base_Model_ObtorLib_App_Core_Crm_Entity_SubLead)) {
                throw new Base_Model_ObtorLib_App_Core_Crm_Exception("SubLead Entity not intialized");
            } else {
                $arrWhere = array();
                $arrSubLeads = array();
                $leadId = $this->subLead->getLeadId();
                $subLeadSql = "SELECT id FROM tbl_leadsubdetails ";
                
                if ($leadId) {
                    array_push($arrWhere, "lead_id = '" . $leadId . "'");
                }

                if (count($arrWhere) > 0) {
                    $subLeadSql.= "WHERE " . implode(' AND ',$arrWhere);
                }
                
                $subLeadSql = $subLeadSql." ORDER BY id DESC";
                
                if(!is_null($limit)){
                    $subLeadSql = $subLeadSql.$limit;
                }

                $db = Zend_Db_Table_Abstract::getDefaultAdapter();
                $result = $db->fetchCol($subLeadSql);
                foreach ($result as $subLeadId) {
                    $subLeadInfo = $this->getSubLead($subLeadId);
                    array_push($arrSubLeads, $subLeadInfo);
                }
                return $arrSubLeads;
            }
        } catch (Exception $ex) {
            throw new Base_Model_ObtorLib_App_Core_Crm_Exception($ex);
        }
    }
    
    
    
    /*
     * count subLeads....
     * @return : Array of SubLeads Entities...
     */

    public function searchCount() {
        try {
            if (!($this->subLead instanceof Base_Model_ObtorLib_App_Core_Crm_Entity_SubLead)) {
                throw new Base_Model_ObtorLib_App_Core_Crm_Exception("SubLead Entity not intialized");
            } else {
                $total_number = 0;
                $leadId = $this->subLead->getLeadId();
                $subLeadSql = "SELECT id FROM tbl_leadsubdetails ";
                
                if ($leadId) {
                    array_push($arrWhere, "lead_id = '" . $leadId . "'");
                }

                if (count($arrWhere) > 0) {
                    $subLeadSql.= "WHERE " . implode(' AND ',$arrWhere);
                }

                $db = Zend_Db_Table_Abstract::getDefaultAdapter();
                $result 	= $db->fetchRow($subLeadSql);
                $total_number = $result['tot']; 
                return $total_number;
            }
        } catch (Exception $ex) {
            throw new Base_Model_ObtorLib_App_Core_Crm_Exception($ex);
        }
    }
}
