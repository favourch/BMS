<?php

/**
 * Description of JobTitle
 *
 * @author Iyngaran Iyathurai <iyngaran55@gmail.com>
 */
class Base_Model_ObtorLib_App_Core_Catalog_Service_JobTitle extends Base_Model_ObtorLib_Eav_Model_Service {

    public $jobTitle;

    /*
     * Get a user jobTitle using id
     * @return      : Entity JobTitle Object (Base_Model_ObtorLib_App_Core_Catalog_Entity_JobTitle)
     */

    public function getJobTitle($id) {
        try {
            $objJobTitle = new Base_Model_ObtorLib_App_Core_Catalog_Dao_JobTitle();
            $jobTitle = $objJobTitle->getJobTitle($id);
            return $jobTitle;
        } catch (Exception $e) {
            throw new Base_Model_ObtorLib_App_Core_Catalog_Exception($e);
        }
    }

    /*
     * Add new user jobTitle
     * @return      : Integer ID / Null
     */

    public function addJobTitle() {
        try {
            if (!($this->jobTitle instanceof Base_Model_ObtorLib_App_Core_Catalog_Entity_JobTitle)) {
                throw new Base_Model_ObtorLib_App_Core_Catalog_Exception(" JobTitle Entity not intialized");
            } else {
                $objJobTitle = new Base_Model_ObtorLib_App_Core_Catalog_Dao_JobTitle();
                $objJobTitle->jobTitle = $this->jobTitle;
                return $objJobTitle->addJobTitle();
            }
        } catch (Exception $ex) {
            throw new Base_Model_ObtorLib_App_Core_Catalog_Exception($ex);
        }
    }

    /*
     * Update user jobTitle
     * @return      : Integer ID / Null
     */

    public function updateJobTitle() {
        try {
            if (!($this->jobTitle instanceof Base_Model_ObtorLib_App_Core_Catalog_Entity_JobTitle)) {
                throw new Base_Model_ObtorLib_App_Core_Catalog_Exception(" JobTitle Entity not intialized");
            } else {
                $objJobTitle = new Base_Model_ObtorLib_App_Core_Catalog_Dao_JobTitle();
                $objJobTitle->jobTitle = $this->jobTitle;
                return $objJobTitle->updateJobTitle();
            }
        } catch (Exception $ex) {
            throw new Base_Model_ObtorLib_App_Core_Catalog_Exception($ex);
        }
    }

    /*
     * Delete user jobTitle
     * @return      : Integer ID / Null
     */

    public function deleteJobTitle() {
        try {
            if (!($this->jobTitle instanceof Base_Model_ObtorLib_App_Core_Catalog_Entity_JobTitle)) {
                throw new Base_Model_ObtorLib_App_Core_Catalog_Exception(" JobTitle Entity not intialized");
            } else {
                $objJobTitle = new Base_Model_ObtorLib_App_Core_Catalog_Dao_JobTitle();
                $objJobTitle->jobTitle = $this->jobTitle;
                return $objJobTitle->deleteJobTitle();
            }
        } catch (Exception $ex) {
            throw new Base_Model_ObtorLib_App_Core_Catalog_Exception($ex);
        }
    }

    /*
     * Search user jobTitles....
     * @return : Array of JobTitles Entities...
     */

    public function search() {
        try {
            if (!($this->jobTitle instanceof Base_Model_ObtorLib_App_Core_Catalog_Entity_JobTitle)) {
                throw new Base_Model_ObtorLib_App_Core_Catalog_Exception(" JobTitle Entity not intialized");
            } else {
                $objJobTitle = new Base_Model_ObtorLib_App_Core_Catalog_Dao_JobTitle();
                $objJobTitle->jobTitle = $this->jobTitle;
                return $objJobTitle->search();
            }
        } catch (Exception $ex) {
            throw new Base_Model_ObtorLib_App_Core_Catalog_Exception($ex);
        }
    }

}
