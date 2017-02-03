<?php

/**
 * Description of Skill
 *
 * @author Iyngaran Iyathurai <iyngaran55@gmail.com>
 */
class Base_Model_ObtorLib_App_Core_Qualification_Service_Skill extends Base_Model_ObtorLib_Eav_Model_Service {

    public $skill;

    /*
     * Get a user skill using id
     * @return      : Entity Skill Object (Base_Model_ObtorLib_App_Core_Qualification_Entity_Skill)
     */

    public function getSkill($id) {
        try {
            $objSkill = new Base_Model_ObtorLib_App_Core_Qualification_Dao_Skill();
            $skill = $objSkill->getSkill($id);
            return $skill;
        } catch (Exception $e) {
            throw new Base_Model_ObtorLib_App_Core_Qualification_Exception($e);
        }
    }

    /*
     * Add new user skill
     * @return      : Integer ID / Null
     */

    public function addSkill() {
        try {
            if (!($this->skill instanceof Base_Model_ObtorLib_App_Core_Qualification_Entity_Skill)) {
                throw new Base_Model_ObtorLib_App_Core_Qualification_Exception(" Skill Entity not initialized");
            } else {
                $objSkill = new Base_Model_ObtorLib_App_Core_Qualification_Dao_Skill();
                $objSkill->skill = $this->skill;
                return $objSkill->addSkill();
            }
        } catch (Exception $ex) {
            throw new Base_Model_ObtorLib_App_Core_Qualification_Exception($ex);
        }
    }

    /*
     * Update user skill
     * @return      : Integer ID / Null
     */

    public function updateSkill() {
        try {
            if (!($this->skill instanceof Base_Model_ObtorLib_App_Core_Qualification_Entity_Skill)) {
                throw new Base_Model_ObtorLib_App_Core_Qualification_Exception(" Skill Entity not initialized");
            } else {
                $objSkill = new Base_Model_ObtorLib_App_Core_Qualification_Dao_Skill();
                $objSkill->skill = $this->skill;
                return $objSkill->updateSkill();
            }
        } catch (Exception $ex) {
            throw new Base_Model_ObtorLib_App_Core_Qualification_Exception($ex);
        }
    }

    /*
     * Delete user skill
     * @return      : Integer ID / Null
     */

    public function deleteSkill() {
        try {
            if (!($this->skill instanceof Base_Model_ObtorLib_App_Core_Qualification_Entity_Skill)) {
                throw new Base_Model_ObtorLib_App_Core_Qualification_Exception(" Skill Entity not initialized");
            } else {
                $objSkill = new Base_Model_ObtorLib_App_Core_Qualification_Dao_Skill();
                $objSkill->skill = $this->skill;
                return $objSkill->deleteSkill();
            }
        } catch (Exception $ex) {
            throw new Base_Model_ObtorLib_App_Core_Qualification_Exception($ex);
        }
    }

    /*
     * Search user skills....
     * @return : Array of Skills Entities...
     */

    public function search() {
        try {
            if (!($this->skill instanceof Base_Model_ObtorLib_App_Core_Qualification_Entity_Skill)) {
                throw new Base_Model_ObtorLib_App_Core_Qualification_Exception(" Skill Entity not initialized");
            } else {
                $objSkill = new Base_Model_ObtorLib_App_Core_Qualification_Dao_Skill();
                $objSkill->skill = $this->skill;
                return $objSkill->search();
            }
        } catch (Exception $ex) {
            throw new Base_Model_ObtorLib_App_Core_Qualification_Exception($ex);
        }
    }

}
