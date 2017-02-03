<?php

/**
 * Description of ProfessionalExperience
 *
 * @author Iyngaran Iyathurai <iyngaran55@gmail.com>
 */
class Base_Model_Lib_App_Core_Qualification_Service_ProfessionalExperience extends Base_Model_Lib_Eav_Model_Service {

    public $professionalExperience;

    /*
     * Get a user professionalExperience using id
     * @return      : Entity ProfessionalExperience Object (Base_Model_Lib_App_Core_Qualification_Entity_ProfessionalExperience)
     */

    public function getProfessionalExperience($id) {
        try {
            $objProfessionalExperience = new Base_Model_Lib_App_Core_Qualification_Dao_ProfessionalExperience();
            $professionalExperience = $objProfessionalExperience->getProfessionalExperience($id);
            return $professionalExperience;
        } catch (Exception $e) {
            throw new Base_Model_Lib_App_Core_Qualification_Exception($e);
        }
    }

    /*
     * Add new user professionalExperience
     * @return      : Integer ID / Null
     */

    public function addProfessionalExperience() {
        try {
            if (!($this->professionalExperience instanceof Base_Model_Lib_App_Core_Qualification_Entity_ProfessionalExperience)) {
                throw new Base_Model_Lib_App_Core_Qualification_Exception(" ProfessionalExperience Entity not initialized");
            } else {
                $objProfessionalExperience = new Base_Model_Lib_App_Core_Qualification_Dao_ProfessionalExperience();
                $objProfessionalExperience->professionalExperience = $this->professionalExperience;
                return $objProfessionalExperience->addProfessionalExperience();
            }
        } catch (Exception $ex) {
            throw new Base_Model_Lib_App_Core_Qualification_Exception($ex);
        }
    }

    /*
     * Update user professionalExperience
     * @return      : Integer ID / Null
     */

    public function updateProfessionalExperience() {
        try {
            if (!($this->professionalExperience instanceof Base_Model_Lib_App_Core_Qualification_Entity_ProfessionalExperience)) {
                throw new Base_Model_Lib_App_Core_Qualification_Exception(" ProfessionalExperience Entity not initialized");
            } else {
                $objProfessionalExperience = new Base_Model_Lib_App_Core_Qualification_Dao_ProfessionalExperience();
                $objProfessionalExperience->professionalExperience = $this->professionalExperience;
                return $objProfessionalExperience->updateProfessionalExperience();
            }
        } catch (Exception $ex) {
            throw new Base_Model_Lib_App_Core_Qualification_Exception($ex);
        }
    }

    /*
     * Delete user professionalExperience
     * @return      : Integer ID / Null
     */

    public function deleteProfessionalExperience() {
        try {
            if (!($this->professionalExperience instanceof Base_Model_Lib_App_Core_Qualification_Entity_ProfessionalExperience)) {
                throw new Base_Model_Lib_App_Core_Qualification_Exception(" ProfessionalExperience Entity not initialized");
            } else {
                $objProfessionalExperience = new Base_Model_Lib_App_Core_Qualification_Dao_ProfessionalExperience();
                $objProfessionalExperience->professionalExperience = $this->professionalExperience;
                return $objProfessionalExperience->deleteProfessionalExperience();
            }
        } catch (Exception $ex) {
            throw new Base_Model_Lib_App_Core_Qualification_Exception($ex);
        }
    }

    /*
     * Search user professionalExperiences....
     * @return : Array of ProfessionalExperiences Entities...
     */

    public function search() {
        try {
            if (!($this->professionalExperience instanceof Base_Model_Lib_App_Core_Qualification_Entity_ProfessionalExperience)) {
                throw new Base_Model_Lib_App_Core_Qualification_Exception(" ProfessionalExperience Entity not initialized");
            } else {
                $objProfessionalExperience = new Base_Model_Lib_App_Core_Qualification_Dao_ProfessionalExperience();
                $objProfessionalExperience->professionalExperience = $this->professionalExperience;
                return $objProfessionalExperience->search();
            }
        } catch (Exception $ex) {
            throw new Base_Model_Lib_App_Core_Qualification_Exception($ex);
        }
    }

}
