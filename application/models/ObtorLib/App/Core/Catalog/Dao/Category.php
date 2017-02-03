<?php

/**
 * Description of Category
 *
 * @author Iyngaran Iyathurai <iyngaran55@gmail.com>
 */
class Base_Model_ObtorLib_App_Core_Catalog_Dao_Category extends Zend_Db_Table_Abstract {

    //put your code here
    public $category;
    protected $_name = 'tbl_category';

    /*
     * Get a category using id
     * @return      : Entity Category Object (Base_Model_ObtorLib_App_Core_Catalog_Entity_Category)
     */

    public function getCategory($id) {
        try {
            $id = (int) $id;
            $row = $this->fetchRow('id = ' . $id);
            if ($row) {
                $categoryRow = $row->toArray();
                $categoryEntity = new Base_Model_ObtorLib_App_Core_Catalog_Entity_Category();
                $categoryEntity->setId($categoryRow['id']);
                $categoryEntity->setName($categoryRow['name']);
                $categoryEntity->setRelName($categoryRow['rel_name']);
                $categoryEntity->setPrefix($categoryRow['prefix']);
                $categoryEntity->setDateCreated($categoryRow['date_created']);
                $categoryEntity->setCreatedBy($categoryRow['created_by']);
                $categoryEntity->setDateModified($categoryRow['date_modified']);
                $categoryEntity->setModifiedBy($categoryRow['modified_by']);
                return $categoryEntity;
            } else {
                return null;
            }
        } catch (Exception $ex) {
            throw new Base_Model_ObtorLib_App_Core_Catalog_Exception($ex);
        }
    }

    /*
     * Add new c
     * @return      : Integer ID / Null
     */

    public function addCategory() {
        try {
            if (!($this->category instanceof Base_Model_ObtorLib_App_Core_Catalog_Entity_Category)) {
                throw new Base_Model_ObtorLib_App_Core_Catalog_Exception(" Category Entity not initialized");
            } else {
                $data = array(
                    'name' => $this->category->getName(),
                    'rel_name' => $this->category->getRelName(),
                    'prefix' => $this->category->getPrefix(),
                    'date_created' => $this->category->getDateCreated(),
                    'created_by' => $this->category->getCreatedBy(),
                    'date_modified' => $this->category->getDateModified(),
                    'modified_by' => $this->category->getModifiedBy());
                $last_inserted_id = $this->insert($data);
                return $last_inserted_id;
            }
        } catch (Exception $ex) {
            throw new Base_Model_ObtorLib_App_Core_Catalog_Exception($ex);
        }
    }

    /*
     * Update category
     * @return      : Boolean true/false
     */

    public function updateCategory() {
        try {
            if (!($this->category instanceof Base_Model_ObtorLib_App_Core_Catalog_Entity_Category)) {
                throw new Base_Model_ObtorLib_App_Core_Catalog_Exception(" Category Entity not initialized");
            } else {
                $data = array(
                    'name' => $this->category->getName(),
                    'rel_name' => $this->category->getRelName(),
                    'prefix' => $this->category->getPrefix(),
                    'date_modified' => $this->category->getDateModified(),
                    'modified_by' => $this->category->getModifiedBy());
                return $this->update($data, 'id = ' . (int) $this->category->getId());
            }
        } catch (Exception $ex) {
            throw new Base_Model_ObtorLib_App_Core_Catalog_Exception($ex);
        }
    }

    /*
     * Delete category
     * @return      : Integer ID / Null
     */

    public function deleteCategory() {
        try {
            if (!($this->category instanceof Base_Model_ObtorLib_App_Core_Catalog_Entity_Category)) {
                throw new Base_Model_ObtorLib_App_Core_Catalog_Exception(" Category Entity not initialized");
            } else {
                return $this->delete('id =' . (int) $this->category->getId());
            }
        } catch (Exception $ex) {
            throw new Base_Model_ObtorLib_App_Core_Catalog_Exception($ex);
        }
    }

    /*
     * Search categorys....
     * @return : Array of Categorys Entities...
     */

    public function search() {
        try {
            if (!($this->category instanceof Base_Model_ObtorLib_App_Core_Catalog_Entity_Category)) {
                throw new Base_Model_ObtorLib_App_Core_Catalog_Exception(" Category Entity not initialized");
            } else {
                $arrWhere = array();
                $arrCountries = array();
                $relName = $this->category->getRelName();
                $categorySql = "SELECT id FROM tbl_category ";

                if ($relName) {
                    array_push($arrWhere, "rel_name = '" . $relName . "'");
                }

                if (count($arrWhere) > 0) {
                    $categorySql.= "WHERE " . implode($arrWhere);
                }

                $db = Zend_Db_Table_Abstract::getDefaultAdapter();
                $result = $db->fetchCol($categorySql);
                foreach ($result as $categoryId) {
                    $categoryInfo = $this->getCategory($categoryId);
                    array_push($arrCountries, $categoryInfo);
                }
                return $arrCountries;
            }
        } catch (Exception $ex) {
            throw new Base_Model_ObtorLib_App_Core_Catalog_Exception($ex);
        }
    }

}
