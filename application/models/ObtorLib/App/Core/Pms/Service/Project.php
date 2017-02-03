<?php

/**
 * Description of Project
 *
 * @author Iyngaran Iyathurai <iyngaran55@gmail.com>
 */
class Base_Model_ObtorLib_App_Core_Pms_Service_Project extends Base_Model_ObtorLib_Eav_Model_Service {

    public $project;

    /*
     * Get a user project using id
     * @return      : Entity Project Object (Base_Model_ObtorLib_App_Core_Pms_Entity_Project)
     */

    public function getProject($id) {
        try {
            $objProject = new Base_Model_ObtorLib_App_Core_Pms_Dao_Project();
            $project = $objProject->getProject($id);
            return $project;
        } catch (Exception $e) {
            throw new Base_Model_ObtorLib_App_Core_Pms_Exception($e);
        }
    }

    /*
     * Add new user project
     * @return      : Integer ID / Null
     */

    public function addProject() {
        try {
            if (!($this->project instanceof Base_Model_ObtorLib_App_Core_Pms_Entity_Project)) {
                throw new Base_Model_ObtorLib_App_Core_Pms_Exception(" Project Entity not intialized");
            } else {
                $objProject = new Base_Model_ObtorLib_App_Core_Pms_Dao_Project();
                $objProject->project = $this->project;
                return $objProject->addProject();
            }
        } catch (Exception $ex) {
            throw new Base_Model_ObtorLib_App_Core_Pms_Exception($ex);
        }
    }

    /*
     * Update user project
     * @return      : Integer ID / Null
     */

    public function updateProject() {
        try {
            if (!($this->project instanceof Base_Model_ObtorLib_App_Core_Pms_Entity_Project)) {
                throw new Base_Model_ObtorLib_App_Core_Pms_Exception(" Project Entity not intialized");
            } else {
                $objProject = new Base_Model_ObtorLib_App_Core_Pms_Dao_Project();
                $objProject->project = $this->project;
                return $objProject->updateProject();
            }
        } catch (Exception $ex) {
            throw new Base_Model_ObtorLib_App_Core_Pms_Exception($ex);
        }
    }

    /*
     * Delete user project
     * @return      : Integer ID / Null
     */

    public function deleteProject() {
        try {
            if (!($this->project instanceof Base_Model_ObtorLib_App_Core_Pms_Entity_Project)) {
                throw new Base_Model_ObtorLib_App_Core_Pms_Exception(" Project Entity not intialized");
            } else {
                $objProject = new Base_Model_ObtorLib_App_Core_Pms_Dao_Project();
                $objProject->project = $this->project;
                return $objProject->deleteProject();
            }
        } catch (Exception $ex) {
            throw new Base_Model_ObtorLib_App_Core_Pms_Exception($ex);
        }
    }

    /*
     * Search user projects....
     * @return : Array of Projects Entities...
     */

    public function search($limit=NULL) {
        try {
            if (!($this->project instanceof Base_Model_ObtorLib_App_Core_Pms_Entity_Project)) {
                throw new Base_Model_ObtorLib_App_Core_Pms_Exception(" Project Entity not intialized");
            } else {
                $objProject = new Base_Model_ObtorLib_App_Core_Pms_Dao_Project();
                $objProject->project = $this->project;
                return $objProject->search($limit);
            }
        } catch (Exception $ex) {
            throw new Base_Model_ObtorLib_App_Core_Pms_Exception($ex);
        }
    }
    
    
    /*
     * Search user projects....
     * @return : Total number Projects...
     */

    public function searchCount() {
        try {
            if (!($this->project instanceof Base_Model_ObtorLib_App_Core_Pms_Entity_Project)) {
                throw new Base_Model_ObtorLib_App_Core_Pms_Exception(" Project Entity not intialized");
            } else {
                $objProject = new Base_Model_ObtorLib_App_Core_Pms_Dao_Project();
                $objProject->project = $this->project;
                return $objProject->searchCount();
            }
        } catch (Exception $ex) {
            throw new Base_Model_ObtorLib_App_Core_Pms_Exception($ex);
        }
    }
    
        /*
     * Get a user project using id
     * @return      : Entity Project Object (Base_Model_ObtorLib_App_Core_Pms_Entity_Project)
     */

    public function getStaffsProject($staffId) {
        try {
            $objProject = new Base_Model_ObtorLib_App_Core_Pms_Dao_Project();
            $projects = $objProject->getStaffsProject($staffId);
            return $projects;
        } catch (Exception $e) {
            throw new Base_Model_ObtorLib_App_Core_Pms_Exception($e);
        }
    }

}
