<?php

/**
 * Description of Vacancy
 *
 * @author Iyngaran Iyathurai <iyngaran55@gmail.com>
 */
class Base_Model_ObtorLib_App_Core_Recruitment_Service_Vacancy extends Base_Model_ObtorLib_Eav_Model_Service {

    public $vacancy;

    /*
     * Get a user vacancy using id
     * @return      : Entity Vacancy Object (Base_Model_ObtorLib_App_Core_Recruitment_Entity_Vacancy)
     */

    public function getVacancy($id) {
        try {
            $objVacancy = new Base_Model_ObtorLib_App_Core_Recruitment_Dao_Vacancy();
            $vacancy = $objVacancy->getVacancy($id);
            return $vacancy;
        } catch (Exception $e) {
            throw new Base_Model_ObtorLib_App_Core_Recruitment_Exception($e);
        }
    }

    /*
     * Add new user vacancy
     * @return      : Integer ID / Null
     */

    public function addVacancy() {
        try {
            if (!($this->vacancy instanceof Base_Model_ObtorLib_App_Core_Recruitment_Entity_Vacancy)) {
                throw new Base_Model_ObtorLib_App_Core_Recruitment_Exception(" Vacancy Entity not intialized");
            } else {
                $objVacancy = new Base_Model_ObtorLib_App_Core_Recruitment_Dao_Vacancy();
                $objVacancy->vacancy = $this->vacancy;
                return $objVacancy->addVacancy();
            }
        } catch (Exception $ex) {
            throw new Base_Model_ObtorLib_App_Core_Recruitment_Exception($ex);
        }
    }

    /*
     * Update user vacancy
     * @return      : Integer ID / Null
     */

    public function updateVacancy() {
        try {
            if (!($this->vacancy instanceof Base_Model_ObtorLib_App_Core_Recruitment_Entity_Vacancy)) {
                throw new Base_Model_ObtorLib_App_Core_Recruitment_Exception(" Vacancy Entity not intialized");
            } else {
                $objVacancy = new Base_Model_ObtorLib_App_Core_Recruitment_Dao_Vacancy();
                $objVacancy->vacancy = $this->vacancy;
                return $objVacancy->updateVacancy();
            }
        } catch (Exception $ex) {
            throw new Base_Model_ObtorLib_App_Core_Recruitment_Exception($ex);
        }
    }

    /*
     * Delete user vacancy
     * @return      : Integer ID / Null
     */

    public function deleteVacancy() {
        try {
            if (!($this->vacancy instanceof Base_Model_ObtorLib_App_Core_Recruitment_Entity_Vacancy)) {
                throw new Base_Model_ObtorLib_App_Core_Recruitment_Exception(" Vacancy Entity not intialized");
            } else {
                $objVacancy = new Base_Model_ObtorLib_App_Core_Recruitment_Dao_Vacancy();
                $objVacancy->vacancy = $this->vacancy;
                return $objVacancy->deleteVacancy();
            }
        } catch (Exception $ex) {
            throw new Base_Model_ObtorLib_App_Core_Recruitment_Exception($ex);
        }
    }

     /*
     * Search user vacancies....
     * @return : Array of vacancies Entities...
     */

    public function search() {
        try {
            if (!($this->vacancy instanceof Base_Model_ObtorLib_App_Core_Recruitment_Entity_Vacancy)) {
                throw new Base_Model_ObtorLib_App_Core_Recruitment_Exception(" Vacancy Entity not initialized");
            } else {
                $objVacancy = new Base_Model_ObtorLib_App_Core_Recruitment_Dao_Vacancy();
                $objVacancy->vacancy = $this->vacancy;
                return $objVacancy->search();
            }
        } catch (Exception $ex) {
            throw new Base_Model_ObtorLib_App_Core_Recruitment_Exception($ex);
        }
    }
    
    
    /*
     * Search user vacancies....
     * @return : Array of vacancies Entities...
     */

    public function searchCount() {
        try {
            if (!($this->vacancy instanceof Base_Model_ObtorLib_App_Core_Recruitment_Entity_Vacancy)) {
                throw new Base_Model_ObtorLib_App_Core_Recruitment_Exception(" Vacancy Entity not initialized");
            } else {
                $objVacancy = new Base_Model_ObtorLib_App_Core_Recruitment_Dao_Vacancy();
                $objVacancy->vacancy = $this->vacancy;
                return $objVacancy->searchCount();
            }
        } catch (Exception $ex) {
            throw new Base_Model_ObtorLib_App_Core_Recruitment_Exception($ex);
        }
    }

}
