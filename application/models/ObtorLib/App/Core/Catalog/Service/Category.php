<?php

/**
 * Description of Category
 *
 * @author Iyngaran Iyathurai <iyngaran55@gmail.com>
 */
class Base_Model_ObtorLib_App_Core_Catalog_Service_Category extends Base_Model_ObtorLib_Eav_Model_Service {

    public $category;

    /*
     * Get a user category using id
     * @return      : Entity Category Object (Base_Model_ObtorLib_App_Core_Catalog_Entity_Category)
     */

    public function getCategory($id) {
        try {
            $objCategory = new Base_Model_ObtorLib_App_Core_Catalog_Dao_Category();
            $category = $objCategory->getCategory($id);
            return $category;
        } catch (Exception $e) {
            throw new Base_Model_ObtorLib_App_Core_Catalog_Exception($e);
        }
    }

    /*
     * Add new user category
     * @return      : Integer ID / Null
     */

    public function addCategory() {
        try {
            if (!($this->category instanceof Base_Model_ObtorLib_App_Core_Catalog_Entity_Category)) {
                throw new Base_Model_ObtorLib_App_Core_Catalog_Exception(" Category Entity not initialized");
            } else {
                $objCategory = new Base_Model_ObtorLib_App_Core_Catalog_Dao_Category();
                $objCategory->category = $this->category;
                return $objCategory->addCategory();
            }
        } catch (Exception $ex) {
            throw new Base_Model_ObtorLib_App_Core_Catalog_Exception($ex);
        }
    }

    /*
     * Update user category
     * @return      : Integer ID / Null
     */

    public function updateCategory() {
        try {
            if (!($this->category instanceof Base_Model_ObtorLib_App_Core_Catalog_Entity_Category)) {
                throw new Base_Model_ObtorLib_App_Core_Catalog_Exception(" Category Entity not initialized");
            } else {
                $objCategory = new Base_Model_ObtorLib_App_Core_Catalog_Dao_Category();
                $objCategory->category = $this->category;
                return $objCategory->updateCategory();
            }
        } catch (Exception $ex) {
            throw new Base_Model_ObtorLib_App_Core_Catalog_Exception($ex);
        }
    }

    /*
     * Delete user category
     * @return      : Integer ID / Null
     */

    public function deleteCategory() {
        try {
            if (!($this->category instanceof Base_Model_ObtorLib_App_Core_Catalog_Entity_Category)) {
                throw new Base_Model_ObtorLib_App_Core_Catalog_Exception(" Category Entity not initialized");
            } else {
                $objCategory = new Base_Model_ObtorLib_App_Core_Catalog_Dao_Category();
                $objCategory->category = $this->category;
                return $objCategory->deleteCategory();
            }
        } catch (Exception $ex) {
            throw new Base_Model_ObtorLib_App_Core_Catalog_Exception($ex);
        }
    }

    /*
     * Search user categorys....
     * @return : Array of Categorys Entities...
     */

    public function search() {
        try {
            if (!($this->category instanceof Base_Model_ObtorLib_App_Core_Catalog_Entity_Category)) {
                throw new Base_Model_ObtorLib_App_Core_Catalog_Exception(" Category Entity not initialized");
            } else {
                $objCategory = new Base_Model_ObtorLib_App_Core_Catalog_Dao_Category();
                $objCategory->category = $this->category;
                return $objCategory->search();
            }
        } catch (Exception $ex) {
            throw new Base_Model_ObtorLib_App_Core_Catalog_Exception($ex);
        }
    }

}
