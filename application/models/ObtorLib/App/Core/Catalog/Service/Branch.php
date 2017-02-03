<?php

/**
 * Description of Branch
 *
 * @author Iyngaran Iyathurai <iyngaran55@gmail.com>
 */
class Base_Model_ObtorLib_App_Core_Catalog_Service_Branch extends Base_Model_ObtorLib_Eav_Model_Service {

    public $branch;

    /*
     * Get a user branch using id
     * @return      : Entity Branch Object (Base_Model_ObtorLib_App_Core_Catalog_Entity_Branch)
     */

    public function getBranch($id) {
        try {
            $objBranch = new Base_Model_ObtorLib_App_Core_Catalog_Dao_Branch();
            $branch = $objBranch->getBranch($id);
            return $branch;
        } catch (Exception $e) {
            throw new Base_Model_ObtorLib_App_Core_Catalog_Exception($e);
        }
    }

    /*
     * Add new user branch
     * @return      : Integer ID / Null
     */

    public function addBranch() {
        try {
            if (!($this->branch instanceof Base_Model_ObtorLib_App_Core_Catalog_Entity_Branch)) {
                throw new Base_Model_ObtorLib_App_Core_Catalog_Exception(" Branch Entity not intialized");
            } else {
                $objBranch = new Base_Model_ObtorLib_App_Core_Catalog_Dao_Branch();
                $objBranch->branch = $this->branch;
                return $objBranch->addBranch();
            }
        } catch (Exception $ex) {
            throw new Base_Model_ObtorLib_App_Core_Catalog_Exception($ex);
        }
    }

    /*
     * Update user branch
     * @return      : Integer ID / Null
     */

    public function updateBranch() {
        try {
            if (!($this->branch instanceof Base_Model_ObtorLib_App_Core_Catalog_Entity_Branch)) {
                throw new Base_Model_ObtorLib_App_Core_Catalog_Exception(" Branch Entity not intialized");
            } else {
                $objBranch = new Base_Model_ObtorLib_App_Core_Catalog_Dao_Branch();
                $objBranch->branch = $this->branch;
                return $objBranch->updateBranch();
            }
        } catch (Exception $ex) {
            throw new Base_Model_ObtorLib_App_Core_Catalog_Exception($ex);
        }
    }

    /*
     * Delete user branch
     * @return      : Integer ID / Null
     */

    public function deleteBranch() {
        try {
            if (!($this->branch instanceof Base_Model_ObtorLib_App_Core_Catalog_Entity_Branch)) {
                throw new Base_Model_ObtorLib_App_Core_Catalog_Exception(" Branch Entity not intialized");
            } else {
                $objBranch = new Base_Model_ObtorLib_App_Core_Catalog_Dao_Branch();
                $objBranch->branch = $this->branch;
                return $objBranch->deleteBranch();
            }
        } catch (Exception $ex) {
            throw new Base_Model_ObtorLib_App_Core_Catalog_Exception($ex);
        }
    }

    /*
     * Search user branchs....
     * @return : Array of Branchs Entities...
     */

    public function search() {
        try {
            if (!($this->branch instanceof Base_Model_ObtorLib_App_Core_Catalog_Entity_Branch)) {
                throw new Base_Model_ObtorLib_App_Core_Catalog_Exception(" Branch Entity not intialized");
            } else {
                $objBranch = new Base_Model_ObtorLib_App_Core_Catalog_Dao_Branch();
                $objBranch->branch = $this->branch;
                return $objBranch->search();
            }
        } catch (Exception $ex) {
            throw new Base_Model_ObtorLib_App_Core_Catalog_Exception($ex);
        }
    }

}
