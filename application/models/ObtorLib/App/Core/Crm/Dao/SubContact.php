<?php

/**
 * Description of SubContact
 *
 * @author Iyngaran Iyathurai <iyngaran55@gmail.com>
 */
class Base_Model_ObtorLib_App_Core_Crm_Dao_SubContact extends Zend_Db_Table_Abstract {

    //put your code here
    public $subContact;
    protected $_name = 'tbl_sub_contactdetails';

    /*
     * Get a subContact using id
     * @return      : Entity SubContact Object (Base_Model_ObtorLib_App_Core_Crm_Entity_SubContact)
     */

    public function getSubContact($id) {
        try {
            $id = (int) $id;
            $row = $this->fetchRow('id = ' . $id);
            if ($row) {
                $subContactRow = $row->toArray();
                $subContactEntity = new Base_Model_ObtorLib_App_Core_Crm_Entity_SubContact();
                $subContactEntity->setId($subContactRow['id']);
                $subContactEntity->setHomephone($subContactRow['homephone']);
                $subContactEntity->setOtherphone($subContactRow['otherphone']);
                $subContactEntity->setAssistant($subContactRow['assistant']);
                $subContactEntity->setAssistantphone($subContactRow['assistantphone']);
                $subContactEntity->setBirthday($subContactRow['birthday']);
                $subContactEntity->setLaststayintouchrequest($subContactRow['laststayintouchrequest']);
                $subContactEntity->setLaststayintouchsavedate($subContactRow['laststayintouchsavedate']);
                $subContactEntity->setLeadsource($subContactRow['leadsource']);
                $subContactEntity->setContactId($subContactRow['contact_id']);
                return $subContactEntity;
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

    public function addSubContact() {
        try {
            if (!($this->subContact instanceof Base_Model_ObtorLib_App_Core_Crm_Entity_SubContact)) {
                throw new Base_Model_ObtorLib_App_Core_Crm_Exception(" SubContact Entity not intialized");
            } else {
                $data = array(
                    'homephone' => $this->subContact->getHomephone(),
                    'otherphone' => $this->subContact->getOtherphone(),
                    'assistant' => $this->subContact->getAssistant(),
                    'assistantphone' => $this->subContact->getAssistantphone(),
                    'birthday' => $this->subContact->getBirthday(),
                    'laststayintouchrequest' => $this->subContact->getLaststayintouchrequest(),
                    'laststayintouchsavedate' => $this->subContact->getLaststayintouchsavedate(),
                    'leadsource' => $this->subContact->getLeadsource(),
                    'contact_id' => $this->subContact->getContactId());
                $last_inserted_id = $this->insert($data);
                return $last_inserted_id;
            }
        } catch (Exception $ex) {
            throw new Base_Model_ObtorLib_App_Core_Crm_Exception($ex);
        }
    }

    /*
     * Update subContact
     * @return      : Boolean true/false
     */

    public function updateSubContact() {
        try {
            if (!($this->subContact instanceof Base_Model_ObtorLib_App_Core_Crm_Entity_SubContact)) {
                throw new Base_Model_ObtorLib_App_Core_Crm_Exception(" SubContact Entity not intialized");
            } else {
                $data = array(
                    'homephone' => $this->subContact->getHomephone(),
                    'otherphone' => $this->subContact->getOtherphone(),
                    'assistant' => $this->subContact->getAssistant(),
                    'assistantphone' => $this->subContact->getAssistantphone(),
                    'birthday' => $this->subContact->getBirthday(),
                    'laststayintouchrequest' => $this->subContact->getLaststayintouchrequest(),
                    'laststayintouchsavedate' => $this->subContact->getLaststayintouchsavedate(),
                    'leadsource' => $this->subContact->getLeadsource(),
                    'contact_id' => $this->subContact->getContactId());
                return $this->update($data, 'id = ' . (int) $this->subContact->getId());
            }
        } catch (Exception $ex) {
            throw new Base_Model_ObtorLib_App_Core_Crm_Exception($ex);
        }
    }

    /*
     * Delete subContact
     * @return      : Integer ID / Null
     */

    public function deleteSubContact() {
        try {
            if (!($this->subContact instanceof Base_Model_ObtorLib_App_Core_Crm_Entity_SubContact)) {
                throw new Base_Model_ObtorLib_App_Core_Crm_Exception(" SubContact Entity not intialized");
            } else {
                return $this->delete('id =' . (int) $this->subContact->getId());
            }
        } catch (Exception $ex) {
            throw new Base_Model_ObtorLib_App_Core_Crm_Exception($ex);
        }
    }

    /*
     * Search user subContacts....
     * @return : Array of SubContacts Entities...
     */

    public function search($limit = null) {
        try {
            if (!($this->subContact instanceof Base_Model_ObtorLib_App_Core_Crm_Entity_SubContact)) {
                throw new Base_Model_ObtorLib_App_Core_Crm_Exception("SubContact Entity not intialized");
            } else {
                $arrWhere = array();
                $arrSubContacts = array();
                $contactId = $this->subContact->getContactId();
                $subContactSql = "SELECT id FROM tbl_sub_contactdetails ";
                
                if ($contactId) {
                    array_push($arrWhere, "contact_id = '" . $contactId . "'");
                }

                if (count($arrWhere) > 0) {
                    $subContactSql.= "WHERE " . implode(' AND ',$arrWhere);
                }
                
                $subContactSql = $subContactSql." ORDER BY id DESC";
                
                if(!is_null($limit)){
                    $subContactSql = $subContactSql.$limit;
                }

                $db = Zend_Db_Table_Abstract::getDefaultAdapter();
                $result = $db->fetchCol($subContactSql);
                foreach ($result as $subContactId) {
                    $subContactInfo = $this->getSubContact($subContactId);
                    array_push($arrSubContacts, $subContactInfo);
                }
                return $arrSubContacts;
            }
        } catch (Exception $ex) {
            throw new Base_Model_ObtorLib_App_Core_Crm_Exception($ex);
        }
    }
    
    
    
    /*
     * count subContacts....
     * @return : Array of SubContacts Entities...
     */

    public function searchCount() {
        try {
            if (!($this->subContact instanceof Base_Model_ObtorLib_App_Core_Crm_Entity_SubContact)) {
                throw new Base_Model_ObtorLib_App_Core_Crm_Exception("SubContact Entity not intialized");
            } else {
                $total_number = 0;
                $contactId = $this->subContact->getContactId();
                $subContactSql = "SELECT id FROM tbl_sub_contactdetails ";
                
                if ($contactId) {
                    array_push($arrWhere, "contact_id = '" . $contactId . "'");
                }

                if (count($arrWhere) > 0) {
                    $subContactSql.= "WHERE " . implode(' AND ',$arrWhere);
                }

                $db = Zend_Db_Table_Abstract::getDefaultAdapter();
                $result 	= $db->fetchRow($subContactSql);
                $total_number = $result['tot']; 
                return $total_number;
            }
        } catch (Exception $ex) {
            throw new Base_Model_ObtorLib_App_Core_Crm_Exception($ex);
        }
    }
}
