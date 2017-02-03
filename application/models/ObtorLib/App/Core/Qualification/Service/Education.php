<?php

/**
 * Description of Education
 *
 * @author Iyngaran Iyathurai <iyngaran55@gmail.com>
 */
class Base_Model_ObtorLib_App_Core_Qualification_Service_Education extends Base_Model_ObtorLib_Eav_Model_Service {

    public $education;

    /*
     * Get a user education using id
     * @return      : Entity Education Object (Base_Model_ObtorLib_App_Core_Qualification_Entity_Education)
     */

    public function getEducation($id) {
        try {
            $objEducation = new Base_Model_ObtorLib_App_Core_Qualification_Dao_Education();
            $education = $objEducation->getEducation($id);
            return $education;
        } catch (Exception $e) {
            throw new Base_Model_ObtorLib_App_Core_Qualification_Exception($e);
        }
    }

    /*
     * Add new user education
     * @return      : Integer ID / Null
     */

    public function addEducation() {
        try {
            if (!($this->education instanceof Base_Model_ObtorLib_App_Core_Qualification_Entity_Education)) {
                throw new Base_Model_ObtorLib_App_Core_Qualification_Exception(" Education Entity not initialized");
            } else {
                $objEducation = new Base_Model_ObtorLib_App_Core_Qualification_Dao_Education();
                $objEducation->education = $this->education;
                return $objEducation->addEducation();
            }
        } catch (Exception $ex) {
            throw new Base_Model_ObtorLib_App_Core_Qualification_Exception($ex);
        }
    }

    /*
     * Update user education
     * @return      : Integer ID / Null
     */

    public function updateEducation() {
        try {
            if (!($this->education instanceof Base_Model_ObtorLib_App_Core_Qualification_Entity_Education)) {
                throw new Base_Model_ObtorLib_App_Core_Qualification_Exception(" Education Entity not initialized");
            } else {
                $objEducation = new Base_Model_ObtorLib_App_Core_Qualification_Dao_Education();
                $objEducation->education = $this->education;
                return $objEducation->updateEducation();
            }
        } catch (Exception $ex) {
            throw new Base_Model_ObtorLib_App_Core_Qualification_Exception($ex);
        }
    }

    /*
     * Delete user education
     * @return      : Integer ID / Null
     */

    public function deleteEducation() {
        try {
            if (!($this->education instanceof Base_Model_ObtorLib_App_Core_Qualification_Entity_Education)) {
                throw new Base_Model_ObtorLib_App_Core_Qualification_Exception(" Education Entity not initialized");
            } else {
                $objEducation = new Base_Model_ObtorLib_App_Core_Qualification_Dao_Education();
                $objEducation->education = $this->education;
                return $objEducation->deleteEducation();
            }
        } catch (Exception $ex) {
            throw new Base_Model_ObtorLib_App_Core_Qualification_Exception($ex);
        }
    }

    /*
     * Search user educations....
     * @return : Array of Educations Entities...
     */

    public function search() {
        try {
            if (!($this->education instanceof Base_Model_ObtorLib_App_Core_Qualification_Entity_Education)) {
                throw new Base_Model_ObtorLib_App_Core_Qualification_Exception(" Education Entity not initialized");
            } else {
                $objEducation = new Base_Model_ObtorLib_App_Core_Qualification_Dao_Education();
                $objEducation->education = $this->education;
                return $objEducation->search();
            }
        } catch (Exception $ex) {
            throw new Base_Model_ObtorLib_App_Core_Qualification_Exception($ex);
        }
    }

}
