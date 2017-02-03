<?php

/**
 * Description of Contact
 *
 * @author Iyngaran Iyathurai <iyngaran55@gmail.com>
 */
class Base_Model_ObtorLib_App_Core_Crm_Dao_Contact extends Zend_Db_Table_Abstract {

    //put your code here
    public $contact;
    protected $_name = 'tbl_contactdetails';

    /*
     * Get a contact using id
     * @return      : Entity Contact Object (Base_Model_ObtorLib_App_Core_Crm_Entity_Contact)
     */

    public function getContact($id) {
        try {
            $id = (int) $id;
            $row = $this->fetchRow('id = ' . $id);
            if ($row) {
                $contactRow = $row->toArray();
                $contactEntity = new Base_Model_ObtorLib_App_Core_Crm_Entity_Contact();
                $contactEntity->setId($contactRow['id']);
                $contactEntity->setContactNo($contactRow['contact_no']);
                $contactEntity->setAccountId($contactRow['accountid']);
                $contactEntity->setSalutation($contactRow['salutation']);
                $contactEntity->setFirstName($contactRow['firstname']);
                $contactEntity->setLastName($contactRow['lastname']);
                $contactEntity->setEmailAddress($contactRow['email_address']);
                $contactEntity->setPhone($contactRow['phone']);
                $contactEntity->setMobile($contactRow['mobile']);
                $contactEntity->setTitle($contactRow['title']);
                $contactEntity->setFax($contactRow['fax']);
                $contactEntity->setReportsTo($contactRow['reportsto']);
                $contactEntity->setTraining($contactRow['training']);
                $contactEntity->setUserType($contactRow['usertype']);
                $contactEntity->setContactType($contactRow['contacttype']);
                $contactEntity->setOtherEmail($contactRow['otheremail']);
                $contactEntity->setYahooId($contactRow['yahooid']);
                $contactEntity->setDonotCall($contactRow['donotcall']);
                $contactEntity->setEmailOptOut($contactRow['emailoptout']);
                $contactEntity->setImageName($contactRow['imagename']);
                $contactEntity->setReference($contactRow['reference']);
                $contactEntity->setNotifyOwner($contactRow['notifyowner']);
                return $contactEntity;
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

    public function addContact() {
        try {
            if (!($this->contact instanceof Base_Model_ObtorLib_App_Core_Crm_Entity_Contact)) {
                throw new Base_Model_ObtorLib_App_Core_Crm_Exception(" Contact Entity not intialized");
            } else {
                $data = array(
                    'contact_no' => $this->contact->getContactNo(),
                    'accountid' => $this->contact->getAccountId(),
                    'salutation' => $this->contact->getSalutation(),
                    'firstname' => $this->contact->getFirstName(),
                    'lastname' => $this->contact->getLastName(),
                    'email_address' => $this->contact->getEmailAddress(),
                    'phone' => $this->contact->getPhone(),
                    'mobile' => $this->contact->getMobile(),
                    'title' => $this->contact->getTitle(),
                    'fax' => $this->contact->getFax(),
                    'reportsto' => $this->contact->getReportsTo(),
                    'training' => $this->contact->getTraining(),
                    'usertype' => $this->contact->getUserType(),
                    'contacttype' => $this->contact->getContactType(),
                    'otheremail' => $this->contact->getOtherEmail(),
                    'yahooid' => $this->contact->getYahooId(),
                    'donotcall' => $this->contact->getDonotCall(),
                    'emailoptout' => $this->contact->getEmailOptOut(),
                    'imagename' => $this->contact->getImageName(),
                    'reference' => $this->contact->getReference(),
                    'notifyowner' => $this->contact->getNotifyOwner());
                $last_inserted_id = $this->insert($data);
                return $last_inserted_id;
            }
        } catch (Exception $ex) {
            throw new Base_Model_ObtorLib_App_Core_Crm_Exception($ex);
        }
    }

    /*
     * Update contact
     * @return      : Boolean true/false
     */

    public function updateContact() {
        try {
            if (!($this->contact instanceof Base_Model_ObtorLib_App_Core_Crm_Entity_Contact)) {
                throw new Base_Model_ObtorLib_App_Core_Crm_Exception(" Contact Entity not intialized");
            } else {
                $data = array(
                    'contact_no' => $this->contact->getContactNo(),
                    'accountid' => $this->contact->getAccountId(),
                    'salutation' => $this->contact->getSalutation(),
                    'firstname' => $this->contact->getFirstName(),
                    'lastname' => $this->contact->getLastName(),
                    'email_address' => $this->contact->getEmailAddress(),
                    'phone' => $this->contact->getPhone(),
                    'mobile' => $this->contact->getMobile(),
                    'title' => $this->contact->getTitle(),
                    'fax' => $this->contact->getFax(),
                    'reportsto' => $this->contact->getReportsTo(),
                    'training' => $this->contact->getTraining(),
                    'usertype' => $this->contact->getUserType(),
                    'contacttype' => $this->contact->getContactType(),
                    'otheremail' => $this->contact->getOtherEmail(),
                    'yahooid' => $this->contact->getYahooId(),
                    'donotcall' => $this->contact->getDonotCall(),
                    'emailoptout' => $this->contact->getEmailOptOut(),
                    'imagename' => $this->contact->getImageName(),
                    'reference' => $this->contact->getReference(),
                    'notifyowner' => $this->contact->getNotifyOwner());
                return $this->update($data, 'id = ' . (int) $this->contact->getId());
            }
        } catch (Exception $ex) {
            throw new Base_Model_ObtorLib_App_Core_Crm_Exception($ex);
        }
    }

    /*
     * Delete contact
     * @return      : Integer ID / Null
     */

    public function deleteContact() {
        try {
            if (!($this->contact instanceof Base_Model_ObtorLib_App_Core_Crm_Entity_Contact)) {
                throw new Base_Model_ObtorLib_App_Core_Crm_Exception(" Contact Entity not intialized");
            } else {
                return $this->delete('id =' . (int) $this->contact->getId());
            }
        } catch (Exception $ex) {
            throw new Base_Model_ObtorLib_App_Core_Crm_Exception($ex);
        }
    }

    /*
     * Search user contacts....
     * @return : Array of Contacts Entities...
     */

    public function search($limit = null) {
        try {
            if (!($this->contact instanceof Base_Model_ObtorLib_App_Core_Crm_Entity_Contact)) {
                throw new Base_Model_ObtorLib_App_Core_Crm_Exception("Contact Entity not intialized");
            } else {
                $arrWhere = array();
                $arrContacts = array();
                $accountId = $this->contact->getAccountId();
                $contactSql = "SELECT id FROM tbl_contactdetails ";
                
                if ($accountId) {
                    array_push($arrWhere, "accountid = '" . $accountId . "'");
                }

                if (count($arrWhere) > 0) {
                    $contactSql.= "WHERE " . implode(' AND ',$arrWhere);
                }
                
                $contactSql = $contactSql." ORDER BY id DESC";
                
                if(!is_null($limit)){
                    $contactSql = $contactSql.$limit;
                }

                $db = Zend_Db_Table_Abstract::getDefaultAdapter();
                $result = $db->fetchCol($contactSql);
                foreach ($result as $contactId) {
                    $contactInfo = $this->getContact($contactId);
                    array_push($arrContacts, $contactInfo);
                }
                return $arrContacts;
            }
        } catch (Exception $ex) {
            throw new Base_Model_ObtorLib_App_Core_Crm_Exception($ex);
        }
    }
    
    
    
    /*
     * count contacts....
     * @return : Array of Contacts Entities...
     */

    public function searchCount() {
        try {
            if (!($this->contact instanceof Base_Model_ObtorLib_App_Core_Crm_Entity_Contact)) {
                throw new Base_Model_ObtorLib_App_Core_Crm_Exception("Contact Entity not intialized");
            } else {
                $total_number = 0;
                $arrWhere = array();
                $accountId = $this->contact->getAccountId();
                $contactSql = "SELECT count(id) as tot FROM tbl_contactdetails ";
                
                if ($accountId) {
                    array_push($arrWhere, "accountid = '" . $accountId . "'");
                }

                if (count($arrWhere) > 0) {
                    $contactSql.= "WHERE " . implode(' AND ',$arrWhere);
                }

                $db = Zend_Db_Table_Abstract::getDefaultAdapter();
                $result 	= $db->fetchRow($contactSql);
                $total_number = $result['tot']; 
                return $total_number;
            }
        } catch (Exception $ex) {
            throw new Base_Model_ObtorLib_App_Core_Crm_Exception($ex);
        }
    }
}
