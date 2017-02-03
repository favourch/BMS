<?php

/**
 * Description of Candidate
 *
 * @author Iyngaran Iyathurai <iyngaran55@gmail.com>
 */
class Base_Model_ObtorLib_App_Core_Recruitment_Dao_Candidate extends Zend_Db_Table_Abstract {

    //put your code here
    public $candidate;
    protected $_name = 'tbl_candidates';

    /*
     * Get a candidate using id
     * @return      : Entity Candidate Object (Base_Model_ObtorLib_App_Core_Recruitment_Entity_Candidate)
     */

    public function getCandidate($id) {
        try {
            $id = (int) $id;
            $row = $this->fetchRow('id = ' . $id);
            if ($row) {
                $candidateRow = $row->toArray();
                $candidateEntity = new Base_Model_ObtorLib_App_Core_Recruitment_Entity_Candidate();
                $candidateEntity->setId($candidateRow['id']);
                $candidateEntity->setFullName($candidateRow['full_name']);
                $candidateEntity->setNameWithIni($candidateRow['name_with_ini']);
                $candidateEntity->setEmailAddress($candidateRow['email_address']);
                $candidateEntity->setTelephoneNumber($candidateRow['telephone_number']);
                $candidateEntity->setContactNumber($candidateRow['contact_number']);
                $candidateEntity->setDateOfBirth($candidateRow['date_of_birth']);
                $candidateEntity->setGender($candidateRow['gender']);
                $candidateEntity->setPermanentAddressAddress($candidateRow['permanent_address_address']);
                $candidateEntity->setPermanentAddressStreet($candidateRow['permanent_address_street']);
                $candidateEntity->setPermanentAddressCity($candidateRow['permanent_address_city']);
                $candidateEntity->setPermanentAddressState($candidateRow['permanent_address_state']);
                $candidateEntity->setPermanentAddressZip($candidateRow['permanent_address_zip']);
                $candidateEntity->setPermanentAddressCountry($candidateRow['permanent_address_country']);
                $candidateEntity->setResidentialAddressAddress($candidateRow['residential_address_address']);
                $candidateEntity->setResidentialAddressStreet($candidateRow['residential_address_street']);
                $candidateEntity->setResidentialAddressCity($candidateRow['residential_address_city']);
                $candidateEntity->setResidentialAddressState($candidateRow['residential_address_state']);
                $candidateEntity->setResidentialAddressZip($candidateRow['residential_address_zip']);
                $candidateEntity->setResidentialAddressCountry($candidateRow['residential_address_country']);
                $candidateEntity->setVacancy($candidateRow['vacancy_id']);
                return $candidateEntity;
            } else {
                return null;
            }
        } catch (Exception $ex) {
            throw new Base_Model_ObtorLib_App_Core_Recruitment_Exception($ex);
        }
    }

    /*
     * Add new c
     * @return      : Integer ID / Null
     */

    public function addCandidate() {
        try {
            if (!($this->candidate instanceof Base_Model_ObtorLib_App_Core_Recruitment_Entity_Candidate)) {
                throw new Base_Model_ObtorLib_App_Core_Recruitment_Exception(" Candidate Entity not intialized");
            } else {
               
                $data = array(
                    'full_name' => $this->candidate->getFullName(),
                    'name_with_ini' => $this->candidate->getNameWithIni(),
                    'email_address' => $this->candidate->getEmailAddress(),
                    'telephone_number' => $this->candidate->getTelephoneNumber(),
                    'contact_number' => $this->candidate->getContactNumber(),
                    'date_of_birth' => $this->candidate->getDateOfBirth(),
                    'gender' => $this->candidate->getGender(),
                    'permanent_address_address' => $this->candidate->getPermanentAddressAddress(),
                    'permanent_address_street' => $this->candidate->getPermanentAddressStreet(),
                    'permanent_address_city' => $this->candidate->getPermanentAddressCity(),
                    'permanent_address_state' => $this->candidate->getPermanentAddressState(),
                    'permanent_address_zip' => $this->candidate->getPermanentAddressZip(),
                    'permanent_address_country' => $this->candidate->getPermanentAddressCountry(),
                    'residential_address_address' => $this->candidate->getResidentialAddressAddress(),
                    'residential_address_street' => $this->candidate->getResidentialAddressStreet(),
                    'residential_address_city' => $this->candidate->getResidentialAddressCity(),
                    'residential_address_state' => $this->candidate->getResidentialAddressState(),
                    'residential_address_zip' => $this->candidate->getResidentialAddressZip(),
                    'residential_address_country' => $this->candidate->getResidentialAddressCountry(),
                    'vacancy_id' => $this->candidate->getVacancy());
                
                $last_inserted_id = $this->insert($data);
                return $last_inserted_id;
            }
        } catch (Exception $ex) {
            throw new Base_Model_ObtorLib_App_Core_Recruitment_Exception($ex);
        }
    }

    /*
     * Update candidate
     * @return      : Boolean true/false
     */

    public function updateCandidate() {
        try {
            if (!($this->candidate instanceof Base_Model_ObtorLib_App_Core_Recruitment_Entity_Candidate)) {
                throw new Base_Model_ObtorLib_App_Core_Recruitment_Exception(" Candidate Entity not intialized");
            } else {
                 $data = array(
                    'full_name' => $this->candidate->getFullName(),
                    'name_with_ini' => $this->candidate->getNameWithIni(),
                    'email_address' => $this->candidate->getEmailAddress(),
                    'telephone_number' => $this->candidate->getTelephoneNumber(),
                    'contact_number' => $this->candidate->getContactNumber(),
                    'date_of_birth' => $this->candidate->getDateOfBirth(),
                    'gender' => $this->candidate->getGender(),
                    'permanent_address_address' => $this->candidate->getPermanentAddressAddress(),
                    'permanent_address_street' => $this->candidate->getPermanentAddressStreet(),
                    'permanent_address_city' => $this->candidate->getPermanentAddressCity(),
                    'permanent_address_state' => $this->candidate->getPermanentAddressState(),
                    'permanent_address_zip' => $this->candidate->getPermanentAddressZip(),
                    'permanent_address_country' => $this->candidate->getPermanentAddressCountry(),
                    'residential_address_address' => $this->candidate->getResidentialAddressAddress(),
                    'residential_address_street' => $this->candidate->getResidentialAddressStreet(),
                    'residential_address_city' => $this->candidate->getResidentialAddressCity(),
                    'residential_address_state' => $this->candidate->getResidentialAddressState(),
                    'residential_address_zip' => $this->candidate->getResidentialAddressZip(),
                    'residential_address_country' => $this->candidate->getResidentialAddressCountry(),
                    'vacancy_id' => $this->candidate->getVacancy());
                return $this->update($data, 'id = ' . (int) $this->candidate->getId());
            }
        } catch (Exception $ex) {
            throw new Base_Model_ObtorLib_App_Core_Recruitment_Exception($ex);
        }
    }

    /*
     * Delete candidate
     * @return      : Integer ID / Null
     */

    public function deleteCandidate() {
        try {
            if (!($this->candidate instanceof Base_Model_ObtorLib_App_Core_Recruitment_Entity_Candidate)) {
                throw new Base_Model_ObtorLib_App_Core_Recruitment_Exception(" Candidate Entity not intialized");
            } else {
                return $this->delete('id =' . (int) $this->candidate->getId());
            }
        } catch (Exception $ex) {
            throw new Base_Model_ObtorLib_App_Core_Recruitment_Exception($ex);
        }
    }

    /*
     * Search user candidates....
     * @return : Array of Vacancies Entities...
     */

    public function search($limit = null) {
        try {
            if (!($this->candidate instanceof Base_Model_ObtorLib_App_Core_Recruitment_Entity_Candidate)) {
                throw new Base_Model_ObtorLib_App_Core_Recruitment_Exception(" Candidate Entity not initialized");
            } else {
                $arrWhere = array();
                $arrVacancies = array();
                $vacancyId = $this->candidate->getVacancy();
                $candidateSql = "SELECT id FROM tbl_candidates ";
                if ($vacancyId) {
                    array_push($arrWhere, "category_id = '" . $vacancyId . "'");
                }

                if (count($arrWhere) > 0) {
                    $candidateSql.= "WHERE " . implode(' AND ',$arrWhere);
                }
                
                $candidateSql = $candidateSql." ORDER BY id Asc";
                if(!is_null($limit)){
                    $candidateSql = $candidateSql.$limit;
                }

                $db = Zend_Db_Table_Abstract::getDefaultAdapter();
                $result = $db->fetchCol($candidateSql);
                foreach ($result as $candidateId) {
                    $candidateInfo = $this->getCandidate($candidateId);
                    array_push($arrVacancies, $candidateInfo);
                }
                return $arrVacancies;
            }
        } catch (Exception $ex) {
            throw new Base_Model_ObtorLib_App_Core_Recruitment_Exception($ex);
        }
    }
    
    
    
    /*
     * count candidates....
     * @return : Array of Vacancies Entities...
     */

    public function searchCount() {
        try {
            if (!($this->candidate instanceof Base_Model_ObtorLib_App_Core_Recruitment_Entity_Candidate)) {
                throw new Base_Model_ObtorLib_App_Core_Recruitment_Exception(" Candidate Entity not initialized");
            } else {
                $arrWhere = array();
                $arrVacancies = array();
                $vacancyId = $this->candidate->getVacancy();
                $candidateSql = "SELECT count(id) as tot FROM tbl_candidates ";
                if ($vacancyId) {
                    array_push($arrWhere, "category_id = '" . $vacancyId . "'");
                }

                if (count($arrWhere) > 0) {
                    $candidateSql.= "WHERE " . implode(' AND ',$arrWhere);
                }

                $db = Zend_Db_Table_Abstract::getDefaultAdapter();
                $result 	= $db->fetchRow($candidateSql);
                $total_number = $result['tot']; 
                return $total_number;
            }
        } catch (Exception $ex) {
            throw new Base_Model_ObtorLib_App_Core_Recruitment_Exception($ex);
        }
    }

}
