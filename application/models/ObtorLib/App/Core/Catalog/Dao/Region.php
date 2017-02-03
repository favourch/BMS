<?php

/**
 * Description of Region
 *
 * @author Iyngaran Iyathurai <iyngaran55@gmail.com>
 */
class Base_Model_ObtorLib_App_Core_Catalog_Dao_Region extends Zend_Db_Table_Abstract {

    //put your code here
    public $region;
    protected $_name = 'tbl_region';

    /*
     * Get a region using id
     * @return      : Entity Region Object (Base_Model_ObtorLib_App_Core_Catalog_Entity_Region)
     */

    public function getRegion($id) {
        try {
            $id = (int) $id;
            $row = $this->fetchRow('id = ' . $id);
            if ($row) {
                $regionRow = $row->toArray();
                $countryService = new Base_Model_ObtorLib_App_Core_Catalog_Service_Country();
                $regionEntity = new Base_Model_ObtorLib_App_Core_Catalog_Entity_Region();
                $regionEntity->setId($regionRow['id']);
                $regionEntity->setName($regionRow['name']);
                $regionEntity->setCountry($countryService->getCountry($regionRow['country_id']));
                $regionEntity->setPrefix($regionRow['prefix']);
                return $regionEntity;
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

    public function addRegion() {
        try {
            if (!($this->region instanceof Base_Model_ObtorLib_App_Core_Catalog_Entity_Region)) {
                throw new Base_Model_ObtorLib_App_Core_Catalog_Exception(" Region Entity not intialized");
            } else {
                $data = array(
                    'name' => $this->region->getName(),
                    'country_id' => $this->region->getCountry(),
                    'prefix' => $this->region->getPrefix());
                $last_inserted_id = $this->insert($data);
                return $last_inserted_id;
            }
        } catch (Exception $ex) {
            throw new Base_Model_ObtorLib_App_Core_Catalog_Exception($ex);
        }
    }

    /*
     * Update region
     * @return      : Boolean true/false
     */

    public function updateRegion() {
        try {
            if (!($this->region instanceof Base_Model_ObtorLib_App_Core_Catalog_Entity_Region)) {
                throw new Base_Model_ObtorLib_App_Core_Catalog_Exception(" Region Entity not intialized");
            } else {
                 $data = array(
                    'name' => $this->region->getName(),
                    'country_id' => $this->region->getCountry(),
                    'prefix' => $this->region->getPrefix());
                return $this->update($data, 'id = ' . (int) $this->region->getId());
            }
        } catch (Exception $ex) {
            throw new Base_Model_ObtorLib_App_Core_Catalog_Exception($ex);
        }
    }

    /*
     * Delete region
     * @return      : Integer ID / Null
     */

    public function deleteRegion() {
        try {
            if (!($this->region instanceof Base_Model_ObtorLib_App_Core_Catalog_Entity_Region)) {
                throw new Base_Model_ObtorLib_App_Core_Catalog_Exception(" Region Entity not intialized");
            } else {
                return $this->delete('id =' . (int) $this->region->getId());
            }
        } catch (Exception $ex) {
            throw new Base_Model_ObtorLib_App_Core_Catalog_Exception($ex);
        }
    }

    /*
     * Search regions....
     * @return : Array of Regions Entities...
     */

    public function search() {
        try {
            if (!($this->region instanceof Base_Model_ObtorLib_App_Core_Catalog_Entity_Region)) {
                throw new Base_Model_ObtorLib_App_Core_Catalog_Exception(" Region Entity not intialized");
            } else {
                $arrWhere = array();
                $arrCountries = array();
                $country = $this->region->getCountry();
                $regionName = $this->region->getName();
                $regionSql = "SELECT id FROM tbl_region ";
                
                 if ($country) {
                    array_push($arrWhere, "country_id = '" . $country . "'");
                }

                if ($regionName) {
                    array_push($arrWhere, "name = '" . $regionName . "'");
                }

                if (count($arrWhere) > 0) {
                    $regionSql.= "WHERE " . implode($arrWhere);
                }

                $db = Zend_Db_Table_Abstract::getDefaultAdapter();
                $result = $db->fetchCol($regionSql);
                foreach ($result as $regionId) {
                    $regionInfo = $this->getRegion($regionId);
                    array_push($arrCountries, $regionInfo);
                }
                return $arrCountries;
            }
        } catch (Exception $ex) {
            throw new Base_Model_ObtorLib_App_Core_Catalog_Exception($ex);
        }
    }

}
