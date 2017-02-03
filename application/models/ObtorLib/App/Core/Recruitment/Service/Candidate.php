<?php

/**
 * Description of Candidate
 *
 * @author Iyngaran Iyathurai <iyngaran55@gmail.com>
 */
class Base_Model_ObtorLib_App_Core_Recruitment_Service_Candidate extends Base_Model_ObtorLib_Eav_Model_Service {

    public $candidate;

    /*
     * Get a user candidate using id
     * @return      : Entity Candidate Object (Base_Model_ObtorLib_App_Core_Recruitment_Entity_Candidate)
     */

    public function getCandidate($id) {
        try {
            $objCandidate = new Base_Model_ObtorLib_App_Core_Recruitment_Dao_Candidate();
            $candidate = $objCandidate->getCandidate($id);
            return $candidate;
        } catch (Exception $e) {
            throw new Base_Model_ObtorLib_App_Core_Recruitment_Exception($e);
        }
    }

    /*
     * Add new user candidate
     * @return      : Integer ID / Null
     */

    public function addCandidate() {
        try {
            if (!($this->candidate instanceof Base_Model_ObtorLib_App_Core_Recruitment_Entity_Candidate)) {
                throw new Base_Model_ObtorLib_App_Core_Recruitment_Exception(" Candidate Entity not intialized");
            } else {
                $objCandidate = new Base_Model_ObtorLib_App_Core_Recruitment_Dao_Candidate();
                $objCandidate->candidate = $this->candidate;
                return $objCandidate->addCandidate();
            }
        } catch (Exception $ex) {
            throw new Base_Model_ObtorLib_App_Core_Recruitment_Exception($ex);
        }
    }

    /*
     * Update user candidate
     * @return      : Integer ID / Null
     */

    public function updateCandidate() {
        try {
            if (!($this->candidate instanceof Base_Model_ObtorLib_App_Core_Recruitment_Entity_Candidate)) {
                throw new Base_Model_ObtorLib_App_Core_Recruitment_Exception(" Candidate Entity not intialized");
            } else {
                $objCandidate = new Base_Model_ObtorLib_App_Core_Recruitment_Dao_Candidate();
                $objCandidate->candidate = $this->candidate;
                return $objCandidate->updateCandidate();
            }
        } catch (Exception $ex) {
            throw new Base_Model_ObtorLib_App_Core_Recruitment_Exception($ex);
        }
    }

    /*
     * Delete user candidate
     * @return      : Integer ID / Null
     */

    public function deleteCandidate() {
        try {
            if (!($this->candidate instanceof Base_Model_ObtorLib_App_Core_Recruitment_Entity_Candidate)) {
                throw new Base_Model_ObtorLib_App_Core_Recruitment_Exception(" Candidate Entity not intialized");
            } else {
                $objCandidate = new Base_Model_ObtorLib_App_Core_Recruitment_Dao_Candidate();
                $objCandidate->candidate = $this->candidate;
                return $objCandidate->deleteCandidate();
            }
        } catch (Exception $ex) {
            throw new Base_Model_ObtorLib_App_Core_Recruitment_Exception($ex);
        }
    }

    /*
     * Search candidates....
     * @return : Array of candidates Entities...
     */

    public function search($limit = null) {
        try {
            if (!($this->candidate instanceof Base_Model_ObtorLib_App_Core_Recruitment_Entity_Candidate)) {
                throw new Base_Model_ObtorLib_App_Core_Recruitment_Exception(" Candidate Entity not initialized");
            } else {
                $objCandidate = new Base_Model_ObtorLib_App_Core_Recruitment_Dao_Candidate();
                $objCandidate->candidate = $this->candidate;
                return $objCandidate->search($limit);
            }
        } catch (Exception $ex) {
            throw new Base_Model_ObtorLib_App_Core_Recruitment_Exception($ex);
        }
    }
    
    
    /*
     * Search candidates....
     * @return : Array of candidates Entities...
     */

    public function searchCount() {
        try {
            if (!($this->candidate instanceof Base_Model_ObtorLib_App_Core_Recruitment_Entity_Candidate)) {
                throw new Base_Model_ObtorLib_App_Core_Recruitment_Exception(" Candidate Entity not initialized");
            } else {
                $objCandidate = new Base_Model_ObtorLib_App_Core_Recruitment_Dao_Candidate();
                $objCandidate->candidate = $this->candidate;
                return $objCandidate->searchCount();
            }
        } catch (Exception $ex) {
            throw new Base_Model_ObtorLib_App_Core_Recruitment_Exception($ex);
        }
    }

}
