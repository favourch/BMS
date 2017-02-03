<?php

/**
 * Description of Country
 *
 * @author Iyngaran Iyathurai <iyngaran55@gmail.com>
 */
class Base_Model_Lib_App_Core_Catalog_Dao_Country extends Zend_Db_Table_Abstract {

    //put your code here
    public $country;
    protected $_name = 'tbl_country';

    /*
     * Get a country using id
     * @return      : Entity Country Object (Base_Model_Lib_App_Core_Catalog_Entity_Country)
     */

    public function getCountry($id) {
        try {
            $id = (int) $id;
            $row = $this->fetchRow('id = ' . $id);
            if ($row) {
                $countryRow = $row->toArray();
                $countryEntity = new Base_Model_Lib_App_Core_Catalog_Entity_Country();
                $countryEntity->setId($countryRow['id']);
                $countryEntity->setName($countryRow['name']);
                $countryEntity->setPrefix($countryRow['prefix']);
                return $countryEntity;
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

    public function addCountry() {
        try {
            if (!($this->country instanceof Base_Model_Lib_App_Core_Catalog_Entity_Country)) {
                throw new Base_Model_Lib_App_Core_Catalog_Exception(" Country Entity not intialized");
            } else {
                $data = array(
                    'name' => $this->country->getName(),
                    'prefix' => $this->country->getPrefix());
                $last_inserted_id = $this->insert($data);
                return $last_inserted_id;
            }
        } catch (Exception $ex) {
            throw new Base_Model_Lib_App_Core_Catalog_Exception($ex);
        }
    }

    /*
     * Update country
     * @return      : Boolean true/false
     */

    public function updateCountry() {
        try {
            if (!($this->country instanceof Base_Model_Lib_App_Core_Catalog_Entity_Country)) {
                throw new Base_Model_Lib_App_Core_Catalog_Exception(" Country Entity not intialized");
            } else {
                $data = array(
                    'name' => $this->country->getName(),
                    'prefix' => $this->country->getPrefix());
                return $this->update($data, 'id = ' . (int) $this->country->getId());
            }
        } catch (Exception $ex) {
            throw new Base_Model_Lib_App_Core_Catalog_Exception($ex);
        }
    }

    /*
     * Delete country
     * @return      : Integer ID / Null
     */

    public function deleteCountry() {
        try {
            if (!($this->country instanceof Base_Model_Lib_App_Core_Catalog_Entity_Country)) {
                throw new Base_Model_Lib_App_Core_Catalog_Exception(" Country Entity not intialized");
            } else {
                return $this->delete('id =' . (int) $this->country->getId());
            }
        } catch (Exception $ex) {
            throw new Base_Model_Lib_App_Core_Catalog_Exception($ex);
        }
    }

    /*
     * Search countrys....
     * @return : Array of Countrys Entities...
     */

    public function search() {
        try {
            if (!($this->country instanceof Base_Model_Lib_App_Core_Catalog_Entity_Country)) {
                throw new Base_Model_Lib_App_Core_Catalog_Exception(" Country Entity not intialized");
            } else {
                $arrWhere = array();
                $arrCountries = array();
                $countryName = $this->country->getName();
                $countrySql = "SELECT id FROM tbl_country ";

                if ($countryName) {
                    array_push($arrWhere, "name = '" . $countryName . "'");
                }

                if (count($arrWhere) > 0) {
                    $countrySql.= "WHERE " . implode($arrWhere);
                }

                $db = Zend_Db_Table_Abstract::getDefaultAdapter();
                $result = $db->fetchCol($countrySql);
                foreach ($result as $countryId) {
                    $countryInfo = $this->getCountry($countryId);
                    array_push($arrCountries, $countryInfo);
                }
                return $arrCountries;
            }
        } catch (Exception $ex) {
            throw new Base_Model_Lib_App_Core_Catalog_Exception($ex);
        }
    }

}
