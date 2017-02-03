<?php

/**
 * Description of Department
 *
 * @author Iyngaran Iyathurai <iyngaran55@gmail.com>
 */
class Base_Model_ObtorLib_App_Core_Catalog_Dao_Department extends Zend_Db_Table_Abstract {

    //put your code here
    public $department;
    protected $_name = 'tbl_department';

    /*
     * Get a department using id
     * @return      : Entity Department Object (Base_Model_ObtorLib_App_Core_Catalog_Entity_Department)
     */

    public function getDepartment($id) {
        try {
            $id = (int) $id;
            $row = $this->fetchRow('id = ' . $id);
            if ($row) {
                $departmentRow = $row->toArray();
                $countryService = new Base_Model_ObtorLib_App_Core_Catalog_Service_Country();
                $regionService = new Base_Model_ObtorLib_App_Core_Catalog_Service_Region();
                $branchService = new Base_Model_ObtorLib_App_Core_Catalog_Service_Branch();
                $departmentEntity = new Base_Model_ObtorLib_App_Core_Catalog_Entity_Department();
                $departmentEntity->setId($departmentRow['id']);
                $departmentEntity->setName($departmentRow['name']);
                $departmentEntity->setBranch($branchService->getBranch($departmentRow['branch_id']));
                $departmentEntity->setPrefix($departmentRow['prefix']);
                return $departmentEntity;
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

    public function addDepartment() {
        try {
            if (!($this->department instanceof Base_Model_ObtorLib_App_Core_Catalog_Entity_Department)) {
                throw new Base_Model_ObtorLib_App_Core_Catalog_Exception(" Department Entity not intialized");
            } else {
                $data = array(
                    'name' => $this->department->getName(),
                    'branch_id' => $this->department->getBranch(),
                    'prefix' => $this->department->getPrefix());
                $last_inserted_id = $this->insert($data);
                return $last_inserted_id;
            }
        } catch (Exception $ex) {
            throw new Base_Model_ObtorLib_App_Core_Catalog_Exception($ex);
        }
    }

    /*
     * Update department
     * @return      : Boolean true/false
     */

    public function updateDepartment() {
        try {
            if (!($this->department instanceof Base_Model_ObtorLib_App_Core_Catalog_Entity_Department)) {
                throw new Base_Model_ObtorLib_App_Core_Catalog_Exception(" Department Entity not intialized");
            } else {
                 $data = array(
                    'name' => $this->department->getName(),
                    'branch_id' => $this->department->getBranch(),
                    'prefix' => $this->department->getPrefix());
                return $this->update($data, 'id = ' . (int) $this->department->getId());
            }
        } catch (Exception $ex) {
            throw new Base_Model_ObtorLib_App_Core_Catalog_Exception($ex);
        }
    }

    /*
     * Delete department
     * @return      : Integer ID / Null
     */

    public function deleteDepartment() {
        try {
            if (!($this->department instanceof Base_Model_ObtorLib_App_Core_Catalog_Entity_Department)) {
                throw new Base_Model_ObtorLib_App_Core_Catalog_Exception(" Department Entity not intialized");
            } else {
                return $this->delete('id =' . (int) $this->department->getId());
            }
        } catch (Exception $ex) {
            throw new Base_Model_ObtorLib_App_Core_Catalog_Exception($ex);
        }
    }

    /*
     * Search departments....
     * @return : Array of Departments Entities...
     */

    public function search() {
        try {
            if (!($this->department instanceof Base_Model_ObtorLib_App_Core_Catalog_Entity_Department)) {
                throw new Base_Model_ObtorLib_App_Core_Catalog_Exception(" Department Entity not intialized");
            } else {
                $arrWhere = array();
                $arrDepartmentes = array();
                $departmentName = $this->department->getName();
                $branchId       = $this->department->getBranch();
                
                $departmentSql = "SELECT id FROM tbl_department ";

                if ($branchId) {
                    array_push($arrWhere, "branch_id = '" . $branchId . "'");
                }
                
                if ($departmentName) {
                    array_push($arrWhere, "name = '" . $departmentName . "'");
                }

                if (count($arrWhere) > 0) {
                    $departmentSql.= "WHERE " . implode($arrWhere);
                }

                $db = Zend_Db_Table_Abstract::getDefaultAdapter();
                $result = $db->fetchCol($departmentSql);
                foreach ($result as $departmentId) {
                    $departmentInfo = $this->getDepartment($departmentId);
                    array_push($arrDepartmentes, $departmentInfo);
                }
                return $arrDepartmentes;
            }
        } catch (Exception $ex) {
            throw new Base_Model_ObtorLib_App_Core_Catalog_Exception($ex);
        }
    }

}
