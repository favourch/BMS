<?php

/**
 * Description of Inquire
 *
 * @author Iyngaran Iyathurai <iyngaran55@gmail.com>
 */
class Base_Model_ObtorLib_App_Core_Customer_Dao_Inquire extends Zend_Db_Table_Abstract {

    //put your code here
    public $inquire;
    protected $_name = 'tbl_inquire';

    /*
     * Get a inquire using id
     * @return      : Entity Inquire Object (Base_Model_ObtorLib_App_Core_Customer_Entity_Inquire)
     */

    public function getInquire($id) {
        try {
            $id = (int) $id;
            $row = $this->fetchRow('id = ' . $id);
            if ($row) {
                $inquireRow = $row->toArray();
                $inquireEntity = new Base_Model_ObtorLib_App_Core_Customer_Entity_Inquire();
                $inquireEntity->setId($inquireRow['id']);
                $inquireEntity->setFullName($inquireRow['fullname']);
                $inquireEntity->setPostalAddressAddress($inquireRow['postal_address_address']);
                $inquireEntity->setPostalAddressStreet($inquireRow['postal_address_street']);
                $inquireEntity->setPostalAddressCity($inquireRow['postal_address_city']);
                $inquireEntity->setPostalAddressState($inquireRow['postal_address_state']);
                $inquireEntity->setPostalAddressCountry($inquireRow['postal_address_country']);
                $inquireEntity->setPostalAddressZip($inquireRow['postal_address_zip']);
                $inquireEntity->setTelephoneNumber($inquireRow['telephone_number']);
                $inquireEntity->setContactNumber($inquireRow['contact_number']);
                $inquireEntity->setEmailAddress($inquireRow['email_address']);
                $inquireEntity->setDescription($inquireRow['description']);
                $inquireEntity->setGender($inquireRow['gender']);
                $inquireEntity->setInquireMedia($inquireRow['inquire_media']);
                $inquireEntity->setCountry($inquireRow['country_id']);
                $inquireEntity->setRegion($inquireRow['region_id']);
                $inquireEntity->setBranch($inquireRow['branch_id']);
                $inquireEntity->setDepartment($inquireRow['department_id']);
                $inquireEntity->setStatus($inquireRow['status']);
                $inquireEntity->setAddedBy($inquireRow['added_by']);
                $inquireEntity->setAddedOn($inquireRow['added_on']);
                $inquireEntity->setUpdatedBy($inquireRow['updated_by']);
                $inquireEntity->setUpdatedOn($inquireRow['updated_on']);
                return $inquireEntity;
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

    public function addInquire() {
        try {
            if (!($this->inquire instanceof Base_Model_ObtorLib_App_Core_Customer_Entity_Inquire)) {
                throw new Base_Model_ObtorLib_App_Core_Customer_Exception(" Inquire Entity not intialized");
            } else {
              
                $data = array(
                    'fullname' => $this->inquire->getFullName(),
                    'postal_address_address' => $this->inquire->getPostalAddressAddress(),
                    'postal_address_street' => $this->inquire->getPostalAddressStreet(),
                    'postal_address_city' => $this->inquire->getPostalAddressCity(),
                    'postal_address_state' => $this->inquire->getPostalAddressState(),
                    'postal_address_country' => $this->inquire->getPostalAddressCountry(),
                    'postal_address_zip' => $this->inquire->getPostalAddressZip(),
                    'telephone_number' => $this->inquire->getTelephoneNumber(),
                    'contact_number' => $this->inquire->getContactNumber(),
                    'email_address' => $this->inquire->getEmailAddress(),
                    'description' => $this->inquire->getDescription(),
                    'gender' => $this->inquire->getGender(),
                    'inquire_media' => $this->inquire->getInquireMedia(),
                    'country_id' => $this->inquire->getCountry(),
                    'region_id' => $this->inquire->getRegion(),
                    'branch_id' => $this->inquire->getBranch(),
                    'department_id' => $this->inquire->getDepartment(),
                    'status' => $this->inquire->getStatus(),
                    'added_by' => $this->inquire->getAddedBy(),
                    'added_on' => $this->inquire->getAddedOn(),
                    'updated_by' => $this->inquire->getAddedBy(),
                    'updated_on' => $this->inquire->getUpdatedOn());
                
                $last_inserted_id = $this->insert($data);
                return $last_inserted_id;
            }
        } catch (Exception $ex) {
            throw new Base_Model_ObtorLib_App_Core_Customer_Exception($ex);
        }
    }

    /*
     * Update inquire
     * @return      : Boolean true/false
     */

    public function updateInquire() {
        try {
            if (!($this->inquire instanceof Base_Model_ObtorLib_App_Core_Customer_Entity_Inquire)) {
                throw new Base_Model_ObtorLib_App_Core_Customer_Exception(" Inquire Entity not intialized");
            } else {
                $data = array(
                    'fullname' => $this->inquire->getFullName(),
                    'postal_address_address' => $this->inquire->getPostalAddressAddress(),
                    'postal_address_street' => $this->inquire->getPostalAddressStreet(),
                    'postal_address_city' => $this->inquire->getPostalAddressCity(),
                    'postal_address_state' => $this->inquire->getPostalAddressState(),
                    'postal_address_country' => $this->inquire->getPostalAddressCountry(),
                    'postal_address_zip' => $this->inquire->getPostalAddressZip(),
                    'telephone_number' => $this->inquire->getTelephoneNumber(),
                    'contact_number' => $this->inquire->getContactNumber(),
                    'email_address' => $this->inquire->getEmailAddress(),
                    'description' => $this->inquire->getDescription(),
                    'gender' => $this->inquire->getGender(),
                    'inquire_media' => $this->inquire->getInquireMedia(),
                    'country_id' => $this->inquire->getCountry(),
                    'region_id' => $this->inquire->getRegion(),
                    'branch_id' => $this->inquire->getBranch(),
                    'department_id' => $this->inquire->getDepartment(),
                    'status' => $this->inquire->getStatus(),
                    'added_by' => $this->inquire->getAddedBy(),
                    'added_on' => $this->inquire->getAddedOn(),
                    'updated_by' => $this->inquire->getAddedBy(),
                    'updated_on' => $this->inquire->getUpdatedOn());
                return $this->update($data, 'id = ' . (int) $this->inquire->getId());
            }
        } catch (Exception $ex) {
            throw new Base_Model_ObtorLib_App_Core_Customer_Exception($ex);
        }
    }

    /*
     * Delete inquire
     * @return      : Integer ID / Null
     */

    public function deleteInquire() {
        try {
            if (!($this->inquire instanceof Base_Model_ObtorLib_App_Core_Customer_Entity_Inquire)) {
                throw new Base_Model_ObtorLib_App_Core_Customer_Exception(" Inquire Entity not intialized");
            } else {
                return $this->delete('id =' . (int) $this->inquire->getId());
            }
        } catch (Exception $ex) {
            throw new Base_Model_ObtorLib_App_Core_Customer_Exception($ex);
        }
    }

    /*
     * Search system inquire information ....
     * @return : Array of System inquire Entities...
     */

    public function search($limit = null) {
        try {
            if (!($this->inquire instanceof Base_Model_ObtorLib_App_Core_Customer_Entity_Inquire)) {
                throw new Base_Model_ObtorLib_App_Core_Customer_Exception(" Inquire Entity not intialized");
            } else {
                $arrWhere = array();
                $arrInquires = array();
                $full_name          = $this->inquire->getFullName();
                $telephone_number   = $this->inquire->getTelephoneNumber();
                $contact_number     = $this->inquire->getContactNumber();
                $email_address      = $this->inquire->getEmailAddress();
                $inquire_media      = $this->inquire->getInquireMedia();
                $country            = $this->inquire->getCountry();
                $region             = $this->inquire->getRegion();
                $branch             = $this->inquire->getBranch();
                $department         = $this->inquire->getDepartment();
                $status             = $this->inquire->getStatus();
               
                
                $inquireSql = "SELECT id FROM tbl_inquire ";
                
                if ($full_name) {
                    array_push($arrWhere, "fullname = '" . $full_name . "'");
                }
                
                if ($telephone_number) {
                    array_push($arrWhere, "telephone_number = '" . $telephone_number . "'");
                }
                
                if ($contact_number) {
                    array_push($arrWhere, "contact_number = '" . $contact_number . "'");
                }
                
                if ($email_address) {
                    array_push($arrWhere, "email_address = '" . $email_address . "'");
                }
                
                if ($inquire_media) {
                    array_push($arrWhere, "inquire_media = '" . $inquire_media . "'");
                }
                
                
                if ($country) {
                    array_push($arrWhere, "country_id = '" . $country . "'");
                }
                
                if ($region) {
                    array_push($arrWhere, "region_id = '" . $region . "'");
                }
                
                if ($branch) {
                    array_push($arrWhere, "branch_id = '" . $branch . "'");
                }
                
                if ($department) {
                    array_push($arrWhere, "department_id = '" . $department . "'");
                }
                
                if ($status) {
                    array_push($arrWhere, "status = '" . $status . "'");
                }
                

                if (count($arrWhere) > 0) {
                    $inquireSql.= "WHERE " . implode(' AND ',$arrWhere);
                }

                $inquireSql = $inquireSql." ORDER BY id DESC";
                if(!is_null($limit)){
                    $inquireSql = $inquireSql.$limit;
                }

                $db = Zend_Db_Table_Abstract::getDefaultAdapter();
                $result = $db->fetchCol($inquireSql);
                foreach ($result as $inquireId) {
                    $inquireInfo = $this->getinquire($inquireId);
                    array_push($arrInquires, $inquireInfo);
                }
                return $arrInquires;
            }
        } catch (Exception $ex) {
            throw new Base_Model_ObtorLib_App_Core_Customer_Exception($ex);
        }
    }
    
    public function searchCount() {
        try {
            if (!($this->inquire instanceof Base_Model_ObtorLib_App_Core_Customer_Entity_Inquire)) {
                throw new Base_Model_ObtorLib_App_Core_Customer_Exception(" Inquire Entity not intialized");
            } else {
                $arrWhere = array();
                $full_name          = $this->inquire->getFullName();
                $telephone_number   = $this->inquire->getTelephoneNumber();
                $contact_number     = $this->inquire->getContactNumber();
                $email_address      = $this->inquire->getEmailAddress();
                $inquire_media      = $this->inquire->getInquireMedia();
                $country            = $this->inquire->getCountry();
                $region             = $this->inquire->getRegion();
                $branch             = $this->inquire->getBranch();
                $department         = $this->inquire->getDepartment();
                $status             = $this->inquire->getStatus();
               
                
                $inquireSql = "SELECT count(id) as tot FROM tbl_inquire ";
                
                if ($full_name) {
                    array_push($arrWhere, "fullname = '" . $full_name . "'");
                }
                
                if ($telephone_number) {
                    array_push($arrWhere, "telephone_number = '" . $telephone_number . "'");
                }
                
                if ($contact_number) {
                    array_push($arrWhere, "contact_number = '" . $contact_number . "'");
                }
                
                if ($email_address) {
                    array_push($arrWhere, "email_address = '" . $email_address . "'");
                }
                
                if ($inquire_media) {
                    array_push($arrWhere, "inquire_media = '" . $inquire_media . "'");
                }
                
                
                if ($country) {
                    array_push($arrWhere, "country_id = '" . $country . "'");
                }
                
                if ($region) {
                    array_push($arrWhere, "region_id = '" . $region . "'");
                }
                
                if ($branch) {
                    array_push($arrWhere, "branch_id = '" . $branch . "'");
                }
                
                if ($department) {
                    array_push($arrWhere, "department_id = '" . $department . "'");
                }
                
                if ($status) {
                    array_push($arrWhere, "status = '" . $status . "'");
                }
                

                if (count($arrWhere) > 0) {
                    $inquireSql.= "WHERE " . implode(' AND ',$arrWhere);
                }

                $inquireSql = $inquireSql." ORDER BY id DESC";
                if(!is_null($limit)){
                    $inquireSql = $inquireSql.$limit;
                }

                
                $db = Zend_Db_Table_Abstract::getDefaultAdapter();
                $result 	= $db->fetchRow($inquireSql);
                $total_number = $result['tot']; 
                return $total_number;
            }
        } catch (Exception $ex) {
            throw new Base_Model_ObtorLib_App_Core_Customer_Exception($ex);
        }
    }
    

}
