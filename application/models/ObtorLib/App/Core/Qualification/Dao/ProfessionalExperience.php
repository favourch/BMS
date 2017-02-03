<?php
class Base_Model_ObtorLib_App_Core_Qualification_Dao_ProfessionalExperience extends Zend_Db_Table_Abstract{


    //put your code here
    public $professionalExperience;
    protected $_name = 'tbl_professional_experience';

    /*
     * Get a professionalExperience information using professionalExperience id
     * @return      : Entity ProfessionalExperience Object (Base_Model_ObtorLib_App_Core_Qualification_Entity_ProfessionalExperience)
     */

    public function getProfessionalExperience($id) {
        try {
            $id = (int) $id;
            $row = $this->fetchRow('id = ' . $id);
            if ($row) {
                $professionalExperienceRow = $row->toArray();
                $professionalExperienceEntity = new Base_Model_ObtorLib_App_Core_Qualification_Entity_ProfessionalExperience();
                $professionalExperienceEntity->setId($professionalExperienceRow['id']);
                $professionalExperienceEntity->setCompanyName($professionalExperienceRow['company_name']);
                $professionalExperienceEntity->setJobTitle($professionalExperienceRow['job_title']);
                $professionalExperienceEntity->setFromDate($professionalExperienceRow['from_date']);
                $professionalExperienceEntity->setToDate($professionalExperienceRow['to_date']);
                $professionalExperienceEntity->setComments($professionalExperienceRow['comments']);
                $professionalExperienceEntity->setRelId($professionalExperienceRow['rel_id']);
                $professionalExperienceEntity->setRelObject($professionalExperienceRow['rel_object']);
                return $professionalExperienceEntity;
            } else {
                return null;
            }
        } catch (Exception $ex) {
            throw new Base_Model_ObtorLib_App_Core_Qualification_Exception($ex);
        }
    }



    /*
     * Add new ProfessionalExperience
     * @return      : Integer ID / Null
     */

    public function addProfessionalExperience() {
        try {
            if (!($this->professionalExperience instanceof Base_Model_ObtorLib_App_Core_Qualification_Entity_ProfessionalExperience)) {
                throw new Base_Model_ObtorLib_App_Core_Qualification_Exception(" ProfessionalExperience Entity not initialized");
            } else {
                $data = array(
                    'company_name' => $this->professionalExperience->getCompanyName(),
                    'job_title' => $this->professionalExperience->getJobTitle(),
                    'from_date' => $this->professionalExperience->getFromDate(),
                    'to_date' => $this->professionalExperience->getToDate(),
                    'comments' => $this->professionalExperience->getComments(),
                    'rel_id' => $this->professionalExperience->getRelId(),
                    'rel_object' => $this->professionalExperience->getRelObject());
                $last_inserted_id = $this->insert($data);
                return $last_inserted_id;
            }
        } catch (Exception $ex) {
            throw new Base_Model_ObtorLib_App_Core_Qualification_Exception($ex);
        }
    }



    /*
    * Update professionalExperience
    * @return      : Boolean true/false
    */

    public function updateProfessionalExperience() {
        try {
            if (!($this->professionalExperience instanceof Base_Model_ObtorLib_App_Core_Qualification_Entity_ProfessionalExperience)) {
                throw new Base_Model_ObtorLib_App_Core_Qualification_Exception(" ProfessionalExperience Entity not initialized");
            } else {
               $data = array(
                    'company_name' => $this->professionalExperience->getCompanyName(),
                    'job_title' => $this->professionalExperience->getJobTitle(),
                    'from_date' => $this->professionalExperience->getFromDate(),
                    'to_date' => $this->professionalExperience->getToDate(),
                    'comments' => $this->professionalExperience->getComments(),
                    'rel_id' => $this->professionalExperience->getRelId(),
                    'rel_object' => $this->professionalExperience->getRelObject());
                return $this->update($data, 'id = ' . (int) $this->professionalExperience->getId());
            }
        } catch (Exception $ex) {
            throw new Base_Model_ObtorLib_App_Core_Qualification_Exception($ex);
        }
    }


    /*
    * Delete professionalExperience
    * @return      : Boolean true/false
    */

    public function deleteProfessionalExperience() {
        try {
            if (!($this->professionalExperience instanceof Base_Model_ObtorLib_App_Core_Qualification_Entity_ProfessionalExperience)) {
                throw new Base_Model_ObtorLib_App_Core_Qualification_Exception(" ProfessionalExperience Entity not initialized");
            } else {
                return $this->delete('id =' . (int) $this->professionalExperience->getId());
            }
        } catch (Exception $ex) {
            throw new Base_Model_ObtorLib_App_Core_Qualification_Exception($ex);
        }
    }


    /*
     * Search professionalExperiences....
     * @return : Array of ProfessionalExperiences Entities...
     */

    public function search() {
        try {
            if (!($this->professionalExperience instanceof Base_Model_ObtorLib_App_Core_Qualification_Entity_ProfessionalExperience)) {
                throw new Base_Model_ObtorLib_App_Core_Qualification_Exception(" ProfessionalExperience Entity not initialized");
            } else {
                $arrWhere = array();
                $arrProfessionalExperiences = array();
                $relId = $this->professionalExperience->getRelId();
                $relObject = $this->professionalExperience->getRelObject();
                $professionalExperienceSql = "SELECT id FROM tbl_professional_experience ";

                if ($relId) {
                    array_push($arrWhere, "rel_id = '" . $relId . "'");
                }
                
                if ($relObject) {
                    array_push($arrWhere, "rel_object = '" . $relObject . "'");
                }
                

                if (count($arrWhere) > 0) {
                    $professionalExperienceSql.= "WHERE " . implode(' AND ',$arrWhere);
                }

                $db = Zend_Db_Table_Abstract::getDefaultAdapter();
                $result = $db->fetchCol($professionalExperienceSql);
                foreach ($result as $professionalExperienceId) {
                    $professionalExperienceInfo = $this->getProfessionalExperience($professionalExperienceId);
                    array_push($arrProfessionalExperiences, $professionalExperienceInfo);
                }
                return $arrProfessionalExperiences;
            }
        } catch (Exception $ex) {
            throw new Base_Model_ObtorLib_App_Core_Qualification_Exception($ex);
        }
    }


} 