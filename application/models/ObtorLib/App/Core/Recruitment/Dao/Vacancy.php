<?php

/**
 * Description of Vacancy
 *
 * @author Iyngaran Iyathurai <iyngaran55@gmail.com>
 */
class Base_Model_ObtorLib_App_Core_Recruitment_Dao_Vacancy extends Zend_Db_Table_Abstract {

    //put your code here
    public $vacancy;
    protected $_name = 'tbl_vacancy';

    /*
     * Get a vacancy using id
     * @return      : Entity Vacancy Object (Base_Model_ObtorLib_App_Core_Recruitment_Entity_Vacancy)
     */

    public function getVacancy($id) {
        try {
            $id = (int) $id;
            $row = $this->fetchRow('id = ' . $id);
            if ($row) {
                $vacancyRow = $row->toArray();
                $vacancyEntity = new Base_Model_ObtorLib_App_Core_Recruitment_Entity_Vacancy();
                $vacancyEntity->setId($vacancyRow['id']);
                $vacancyEntity->setJobId($vacancyRow['job_id']);
                $vacancyEntity->setVacancyTitle($vacancyRow['vacancy_title']);
                $vacancyEntity->setCategory($vacancyRow['category_id']);
                $vacancyEntity->setSmallDescription($vacancyRow['small_description']);
                $vacancyEntity->setDetailedDescription($vacancyRow['detailed_description']);
                $vacancyEntity->setQty($vacancyRow['qty']);
                $vacancyEntity->setCountry($vacancyRow['country_id']);
                $vacancyEntity->setRegion($vacancyRow['region_id']);
                $vacancyEntity->setBranch($vacancyRow['branch_id']);
                $vacancyEntity->setDepartment($vacancyRow['department_id']);
                $vacancyEntity->setPublishStartDate($vacancyRow['publish_start_date']);
                $vacancyEntity->setPublishEnddate($vacancyRow['publish_end_date']);
                return $vacancyEntity;
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

    public function addVacancy() {
        try {
            if (!($this->vacancy instanceof Base_Model_ObtorLib_App_Core_Recruitment_Entity_Vacancy)) {
                throw new Base_Model_ObtorLib_App_Core_Recruitment_Exception(" Vacancy Entity not intialized");
            } else {
               
                $data = array(
                    'vacancy_title' => $this->vacancy->getVacancyTitle(),
                    'job_id'=> $this->vacancy->getJobId(),
                    'category_id' => $this->vacancy->getCategory(),
                    'small_description' => $this->vacancy->getSmallDescription(),
                    'detailed_description' => $this->vacancy->getDetailedDescription(),
                    'qty' => $this->vacancy->getQty(),
                    'country_id' => $this->vacancy->getCountry(),
                    'region_id' => $this->vacancy->getRegion(),
                    'branch_id' => $this->vacancy->getBranch(),
                    'department_id' => $this->vacancy->getDepartment(),
                    'publish_start_date' => $this->vacancy->getPublishStartDate(),
                    'publish_end_date' => $this->vacancy->getPublishEnddate());
                $last_inserted_id = $this->insert($data);
                return $last_inserted_id;
            }
        } catch (Exception $ex) {
            throw new Base_Model_ObtorLib_App_Core_Recruitment_Exception($ex);
        }
    }

    /*
     * Update vacancy
     * @return      : Boolean true/false
     */

    public function updateVacancy() {
        try {
            if (!($this->vacancy instanceof Base_Model_ObtorLib_App_Core_Recruitment_Entity_Vacancy)) {
                throw new Base_Model_ObtorLib_App_Core_Recruitment_Exception(" Vacancy Entity not intialized");
            } else {
                $data = array(
                    'vacancy_title' => $this->vacancy->getVacancyTitle(),
                    'job_id'=> $this->vacancy->getJobId(),
                    'category_id' => $this->vacancy->getCategory(),
                    'small_description' => $this->vacancy->getSmallDescription(),
                    'detailed_description' => $this->vacancy->getDetailedDescription(),
                    'qty' => $this->vacancy->getQty(),
                    'country_id' => $this->vacancy->getCountry(),
                    'region_id' => $this->vacancy->getRegion(),
                    'branch_id' => $this->vacancy->getBranch(),
                    'department_id' => $this->vacancy->getDepartment(),
                    'publish_start_date' => $this->vacancy->getPublishStartDate(),
                    'publish_end_date' => $this->vacancy->getPublishEnddate());
                return $this->update($data, 'id = ' . (int) $this->vacancy->getId());
            }
        } catch (Exception $ex) {
            throw new Base_Model_ObtorLib_App_Core_Recruitment_Exception($ex);
        }
    }

    /*
     * Delete vacancy
     * @return      : Integer ID / Null
     */

    public function deleteVacancy() {
        try {
            if (!($this->vacancy instanceof Base_Model_ObtorLib_App_Core_Recruitment_Entity_Vacancy)) {
                throw new Base_Model_ObtorLib_App_Core_Recruitment_Exception(" Vacancy Entity not intialized");
            } else {
                return $this->delete('id =' . (int) $this->vacancy->getId());
            }
        } catch (Exception $ex) {
            throw new Base_Model_ObtorLib_App_Core_Recruitment_Exception($ex);
        }
    }

    /*
     * Search user vacancies....
     * @return : Array of Vacancies Entities...
     */

    public function search() {
        try {
            if (!($this->vacancy instanceof Base_Model_ObtorLib_App_Core_Recruitment_Entity_Vacancy)) {
                throw new Base_Model_ObtorLib_App_Core_Recruitment_Exception(" Vacancy Entity not initialized");
            } else {
                $arrWhere = array();
                $arrVacancies = array();
                $categoryId = $this->vacancy->getCategory();
                $vacancySql = "SELECT id FROM tbl_vacancy ";
                if ($categoryId) {
                    array_push($arrWhere, "category_id = '" . $categoryId . "'");
                }

                if (count($arrWhere) > 0) {
                    $vacancySql.= "WHERE " . implode(' AND ',$arrWhere);
                }

                $db = Zend_Db_Table_Abstract::getDefaultAdapter();
                $result = $db->fetchCol($vacancySql);
                foreach ($result as $vacancyId) {
                    $vacancyInfo = $this->getVacancy($vacancyId);
                    array_push($arrVacancies, $vacancyInfo);
                }
                return $arrVacancies;
            }
        } catch (Exception $ex) {
            throw new Base_Model_ObtorLib_App_Core_Recruitment_Exception($ex);
        }
    }
    
    
    
    /*
     * count vacancies....
     * @return : Array of Vacancies Entities...
     */

    public function searchCount() {
        try {
            if (!($this->vacancy instanceof Base_Model_ObtorLib_App_Core_Recruitment_Entity_Vacancy)) {
                throw new Base_Model_ObtorLib_App_Core_Recruitment_Exception(" Vacancy Entity not initialized");
            } else {
                $arrWhere = array();
                $arrVacancies = array();
                $categoryId = $this->vacancy->getCategory();
                $vacancySql = "SELECT count(id) as tot FROM tbl_vacancy ";
                if ($categoryId) {
                    array_push($arrWhere, "category_id = '" . $categoryId . "'");
                }

                if (count($arrWhere) > 0) {
                    $vacancySql.= "WHERE " . implode(' AND ',$arrWhere);
                }

                $db = Zend_Db_Table_Abstract::getDefaultAdapter();
                $result 	= $db->fetchRow($vacancySql);
                $total_number = $result['tot']; 
                return $total_number;
            }
        } catch (Exception $ex) {
            throw new Base_Model_ObtorLib_App_Core_Recruitment_Exception($ex);
        }
    }

}
