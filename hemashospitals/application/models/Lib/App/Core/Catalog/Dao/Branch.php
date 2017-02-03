<?php

/**
 * Description of Branch
 *
 * @author Iyngaran Iyathurai <iyngaran55@gmail.com>
 */
class Base_Model_Lib_App_Core_Catalog_Dao_Branch extends Zend_Db_Table_Abstract {

    //put your code here
    public $branch;
    protected $_name = 'tbl_branches';

    /*
     * Get a branch using id
     * @return      : Entity Branch Object (Base_Model_Lib_App_Core_Catalog_Entity_Branch)
     */

    public function getBranch($id) {
        try {
            $id = (int) $id;
            $row = $this->fetchRow('id = ' . $id);
            if ($row) {
                $branchRow = $row->toArray();
                $countryService = new Base_Model_Lib_App_Core_Catalog_Service_Country();
                $regionService = new Base_Model_Lib_App_Core_Catalog_Service_Region();
                $branchEntity = new Base_Model_Lib_App_Core_Catalog_Entity_Branch();
                $branchEntity->setId($branchRow['id']);
                $branchEntity->setName($branchRow['name']);
                $branchEntity->setRegion($regionService->getRegion($branchRow['region_id']));
                $branchEntity->setPrefix($branchRow['prefix']);
                return $branchEntity;
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

    public function addBranch() {
        try {
            if (!($this->branch instanceof Base_Model_Lib_App_Core_Catalog_Entity_Branch)) {
                throw new Base_Model_Lib_App_Core_Catalog_Exception(" Branch Entity not intialized");
            } else {
                $data = array(
                    'name' => $this->branch->getName(),
                    'region_id' => $this->branch->getRegion(),
                    'prefix' => $this->branch->getPrefix());
                $last_inserted_id = $this->insert($data);
                return $last_inserted_id;
            }
        } catch (Exception $ex) {
            throw new Base_Model_Lib_App_Core_Catalog_Exception($ex);
        }
    }

    /*
     * Update branch
     * @return      : Boolean true/false
     */

    public function updateBranch() {
        try {
            if (!($this->branch instanceof Base_Model_Lib_App_Core_Catalog_Entity_Branch)) {
                throw new Base_Model_Lib_App_Core_Catalog_Exception(" Branch Entity not intialized");
            } else {
                 $data = array(
                    'name' => $this->branch->getName(),
                    'region_id' => $this->branch->getRegion(),
                    'prefix' => $this->branch->getPrefix());
                return $this->update($data, 'id = ' . (int) $this->branch->getId());
            }
        } catch (Exception $ex) {
            throw new Base_Model_Lib_App_Core_Catalog_Exception($ex);
        }
    }

    /*
     * Delete branch
     * @return      : Integer ID / Null
     */

    public function deleteBranch() {
        try {
            if (!($this->branch instanceof Base_Model_Lib_App_Core_Catalog_Entity_Branch)) {
                throw new Base_Model_Lib_App_Core_Catalog_Exception(" Branch Entity not intialized");
            } else {
                return $this->delete('id =' . (int) $this->branch->getId());
            }
        } catch (Exception $ex) {
            throw new Base_Model_Lib_App_Core_Catalog_Exception($ex);
        }
    }

    /*
     * Search branchs....
     * @return : Array of Branchs Entities...
     */

    public function search() {
        try {
            if (!($this->branch instanceof Base_Model_Lib_App_Core_Catalog_Entity_Branch)) {
                throw new Base_Model_Lib_App_Core_Catalog_Exception(" Branch Entity not intialized");
            } else {
                $arrWhere = array();
                $arrBranches = array();
                $branchName = $this->branch->getName();
                $region = $this->branch->getRegion();
                
                $branchSql = "SELECT id FROM tbl_branches ";
                
                if($region) {
                    array_push($arrWhere, "region_id = '" . $region . "'");
                }

                if ($branchName) {
                    array_push($arrWhere, "name = '" . $branchName . "'");
                }

                if (count($arrWhere) > 0) {
                    $branchSql.= "WHERE " . implode($arrWhere);
                }

                $db = Zend_Db_Table_Abstract::getDefaultAdapter();
                $result = $db->fetchCol($branchSql);
                foreach ($result as $branchId) {
                    $branchInfo = $this->getBranch($branchId);
                    array_push($arrBranches, $branchInfo);
                }
                return $arrBranches;
            }
        } catch (Exception $ex) {
            throw new Base_Model_Lib_App_Core_Catalog_Exception($ex);
        }
    }

}
