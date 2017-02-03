<?php

/**
 * Description of Model
 *
 * @author Iyngaran Iyathurai <iyngaran55@gmail.com>
 */
class Base_Model_Lib_App_Core_Catalog_Dao_Model extends Zend_Db_Table_Abstract {

    //put your code here
    public $model;
    protected $_name = 'tbl_model';

    /*
     * Get a model using id
     * @return      : Entity Model Object (Base_Model_Lib_App_Core_Catalog_Entity_Model)
     */

    public function getModel($id) {
        try {
            $id = (int) $id;
            $row = $this->fetchRow('id = ' . $id);
            if ($row) {
                $modelRow = $row->toArray();
                $modelEntity = new Base_Model_Lib_App_Core_Catalog_Entity_Model();
                $modelEntity->setId($modelRow['id']);
                $modelEntity->setName($modelRow['name']);
                $modelEntity->setCategory($modelRow['category']);
                $modelEntity->setDateCreated($modelRow['date_created']);
                $modelEntity->setCreatedBy($modelRow['created_by']);
                $modelEntity->setDateModified($modelRow['date_modified']);
                $modelEntity->setModifiedBy($modelRow['modified_by']);
                $modelEntity->setRelName($modelRow['rel_name']);
                return $modelEntity;
            } else {
                return null;
            }
        } catch (Exception $ex) {
            throw new Base_Model_Lib_App_Core_Catalog_Exception($ex);
        }
    }

    /*
     * Add new c
     * @return      : Integer ID / Null
     */

    public function addModel() {
        try {
            if (!($this->model instanceof Base_Model_Lib_App_Core_Catalog_Entity_Model)) {
                throw new Base_Model_Lib_App_Core_Catalog_Exception(" Model Entity not initialized");
            } else {
                $data = array(
                    'name' => $this->model->getName(),
                    'category' => $this->model->getCategory(),
                    'rel_name' => $this->model->getRelName(),
                    'date_created' => $this->model->getDateCreated(),
                    'created_by' => $this->model->getCreatedBy(),
                    'date_modified' => $this->model->getDateModified(),
                    'modified_by' => $this->model->getModifiedBy());
                $last_inserted_id = $this->insert($data);
                return $last_inserted_id;
            }
        } catch (Exception $ex) {
            throw new Base_Model_Lib_App_Core_Catalog_Exception($ex);
        }
    }

    /*
     * Update model
     * @return      : Boolean true/false
     */

    public function updateModel() {
        try {
            if (!($this->model instanceof Base_Model_Lib_App_Core_Catalog_Entity_Model)) {
                throw new Base_Model_Lib_App_Core_Catalog_Exception(" Model Entity not initialized");
            } else {
                $data = array(
                    'name' => $this->model->getName(),
                    'category' => $this->model->getCategory(),
                    'date_modified' => $this->model->getDateModified(),
                    'modified_by' => $this->model->getModifiedBy());
                return $this->update($data, 'id = ' . (int) $this->model->getId());
            }
        } catch (Exception $ex) {
            throw new Base_Model_Lib_App_Core_Catalog_Exception($ex);
        }
    }

    /*
     * Delete model
     * @return      : Integer ID / Null
     */

    public function deleteModel() {
        try {
            if (!($this->model instanceof Base_Model_Lib_App_Core_Catalog_Entity_Model)) {
                throw new Base_Model_Lib_App_Core_Catalog_Exception(" Model Entity not initialized");
            } else {
                return $this->delete('id =' . (int) $this->model->getId());
            }
        } catch (Exception $ex) {
            throw new Base_Model_Lib_App_Core_Catalog_Exception($ex);
        }
    }

    /*
     * Search models....
     * @return : Array of Models Entities...
     */

    public function search() {
        try {
            if (!($this->model instanceof Base_Model_Lib_App_Core_Catalog_Entity_Model)) {
                throw new Base_Model_Lib_App_Core_Catalog_Exception(" Model Entity not initialized");
            } else {
                $arrWhere = array();
                $arrModels = array();
                $modelName = $this->model->getName();
                $category = $this->model->getCategory();
                
                $modelSql = "SELECT id FROM tbl_model ";

                if ($modelName) {
                    array_push($arrWhere, "name = '" . $modelName . "'");
                }
                
                if ($category) {
                    array_push($arrWhere, "category = '" . $category . "'");
                }

                if (count($arrWhere) > 0) {
                    $modelSql.= "WHERE " . implode(' AND ',$arrWhere);
                }

                $db = Zend_Db_Table_Abstract::getDefaultAdapter();
                $result = $db->fetchCol($modelSql);
                foreach ($result as $modelId) {
                    $modelInfo = $this->getModel($modelId);
                    array_push($arrModels, $modelInfo);
                }
                return $arrModels;
            }
        } catch (Exception $ex) {
            throw new Base_Model_Lib_App_Core_Catalog_Exception($ex);
        }
    }

}
