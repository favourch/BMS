<?php

/**
 * Description of Model
 *
 * @author Iyngaran Iyathurai <iyngaran55@gmail.com>
 */
class Base_Model_ObtorLib_App_Core_Catalog_Service_Model extends Base_Model_ObtorLib_Eav_Model_Service {

    public $model;

    /*
     * Get a user model using id
     * @return      : Entity Model Object (Base_Model_ObtorLib_App_Core_Catalog_Entity_Model)
     */

    public function getModel($id) {
        try {
            $objModel = new Base_Model_ObtorLib_App_Core_Catalog_Dao_Model();
            $model = $objModel->getModel($id);
            return $model;
        } catch (Exception $e) {
            throw new Base_Model_ObtorLib_App_Core_Catalog_Exception($e);
        }
    }

    /*
     * Add new user model
     * @return      : Integer ID / Null
     */

    public function addModel() {
        try {
            if (!($this->model instanceof Base_Model_ObtorLib_App_Core_Catalog_Entity_Model)) {
                throw new Base_Model_ObtorLib_App_Core_Catalog_Exception(" Model Entity not initialized");
            } else {
                $objModel = new Base_Model_ObtorLib_App_Core_Catalog_Dao_Model();
                $objModel->model = $this->model;
                return $objModel->addModel();
            }
        } catch (Exception $ex) {
            throw new Base_Model_ObtorLib_App_Core_Catalog_Exception($ex);
        }
    }

    /*
     * Update user model
     * @return      : Integer ID / Null
     */

    public function updateModel() {
        try {
            if (!($this->model instanceof Base_Model_ObtorLib_App_Core_Catalog_Entity_Model)) {
                throw new Base_Model_ObtorLib_App_Core_Catalog_Exception(" Model Entity not initialized");
            } else {
                $objModel = new Base_Model_ObtorLib_App_Core_Catalog_Dao_Model();
                $objModel->model = $this->model;
                return $objModel->updateModel();
            }
        } catch (Exception $ex) {
            throw new Base_Model_ObtorLib_App_Core_Catalog_Exception($ex);
        }
    }

    /*
     * Delete user model
     * @return      : Integer ID / Null
     */

    public function deleteModel() {
        try {
            if (!($this->model instanceof Base_Model_ObtorLib_App_Core_Catalog_Entity_Model)) {
                throw new Base_Model_ObtorLib_App_Core_Catalog_Exception(" Model Entity not initialized");
            } else {
                $objModel = new Base_Model_ObtorLib_App_Core_Catalog_Dao_Model();
                $objModel->model = $this->model;
                return $objModel->deleteModel();
            }
        } catch (Exception $ex) {
            throw new Base_Model_ObtorLib_App_Core_Catalog_Exception($ex);
        }
    }

    /*
     * Search user models....
     * @return : Array of Models Entities...
     */

    public function search() {
        try {
            if (!($this->model instanceof Base_Model_ObtorLib_App_Core_Catalog_Entity_Model)) {
                throw new Base_Model_ObtorLib_App_Core_Catalog_Exception(" Model Entity not initialized");
            } else {
                $objModel = new Base_Model_ObtorLib_App_Core_Catalog_Dao_Model();
                $objModel->model = $this->model;
                return $objModel->search();
            }
        } catch (Exception $ex) {
            throw new Base_Model_ObtorLib_App_Core_Catalog_Exception($ex);
        }
    }

}
