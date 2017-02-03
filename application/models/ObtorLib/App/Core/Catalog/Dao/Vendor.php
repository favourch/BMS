<?php

/**
 * Description of Vendor
 *
 * @author Iyngaran Iyathurai <iyngaran55@gmail.com>
 */
class Base_Model_ObtorLib_App_Core_Catalog_Dao_Vendor extends Zend_Db_Table_Abstract {

    //put your code here
    public $vendor;
    protected $_name = 'tbl_vendor';

    /*
     * Get a vendor using id
     * @return      : Entity Vendor Object (Base_Model_ObtorLib_App_Core_Catalog_Entity_Vendor)
     */

    public function getVendor($id) {
        try {
            $id = (int) $id;
            $row = $this->fetchRow('id = ' . $id);
            if ($row) {
                $vendorRow = $row->toArray();
                $vendorEntity = new Base_Model_ObtorLib_App_Core_Catalog_Entity_Vendor();
                $vendorEntity->setId($vendorRow['id']);
                $vendorEntity->setName($vendorRow['name']);
                $vendorEntity->setDateCreated($vendorRow['date_created']);
                $vendorEntity->setCreatedBy($vendorRow['created_by']);
                $vendorEntity->setDateModified($vendorRow['date_modified']);
                $vendorEntity->setModifiedBy($vendorRow['modified_by']);
                $vendorEntity->setAddress($vendorRow['address']);
                $vendorEntity->setContactNumbers($vendorRow['contact_numbers']);
                $vendorEntity->setStatus($vendorRow['status']);
                return $vendorEntity;
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

    public function addVendor() {
        try {
            if (!($this->vendor instanceof Base_Model_ObtorLib_App_Core_Catalog_Entity_Vendor)) {
                throw new Base_Model_ObtorLib_App_Core_Catalog_Exception(" Vendor Entity not initialized");
            } else {
                $data = array(
                    'name' => $this->vendor->getName(),
                    'date_created' => $this->vendor->getDateCreated(),
                    'created_by' => $this->vendor->getCreatedBy(),
                    'date_modified' => $this->vendor->getDateModified(),
                    'modified_by' => $this->vendor->getModifiedBy(),
                    'address' => $this->vendor->getAddress(),
                    'contact_numbers' => $this->vendor->getContactNumbers(),
                    'status' => $this->vendor->getStatus());
                $last_inserted_id = $this->insert($data);
                return $last_inserted_id;
            }
        } catch (Exception $ex) {
            throw new Base_Model_ObtorLib_App_Core_Catalog_Exception($ex);
        }
    }

    /*
     * Update vendor
     * @return      : Boolean true/false
     */

    public function updateVendor() {
        try {
            if (!($this->vendor instanceof Base_Model_ObtorLib_App_Core_Catalog_Entity_Vendor)) {
                throw new Base_Model_ObtorLib_App_Core_Catalog_Exception(" Vendor Entity not initialized");
            } else {
                $data = array(
                    'name' => $this->vendor->getName(),
                    'date_created' => $this->vendor->getDateCreated(),
                    'created_by' => $this->vendor->getCreatedBy(),
                    'date_modified' => $this->vendor->getDateModified(),
                    'modified_by' => $this->vendor->getModifiedBy(),
                    'address' => $this->vendor->getAddress(),
                    'contact_numbers' => $this->vendor->getContactNumbers(),
                    'status' => $this->vendor->getStatus());
                return $this->update($data, 'id = ' . (int) $this->vendor->getId());
            }
        } catch (Exception $ex) {
            throw new Base_Model_ObtorLib_App_Core_Catalog_Exception($ex);
        }
    }

    /*
     * Delete vendor
     * @return      : Integer ID / Null
     */

    public function deleteVendor() {
        try {
            if (!($this->vendor instanceof Base_Model_ObtorLib_App_Core_Catalog_Entity_Vendor)) {
                throw new Base_Model_ObtorLib_App_Core_Catalog_Exception(" Vendor Entity not initialized");
            } else {
                return $this->delete('id =' . (int) $this->vendor->getId());
            }
        } catch (Exception $ex) {
            throw new Base_Model_ObtorLib_App_Core_Catalog_Exception($ex);
        }
    }

    /*
     * Search vendors....
     * @return : Array of Vendors Entities...
     */

    public function search() {
        try {
            if (!($this->vendor instanceof Base_Model_ObtorLib_App_Core_Catalog_Entity_Vendor)) {
                throw new Base_Model_ObtorLib_App_Core_Catalog_Exception(" Vendor Entity not initialized");
            } else {
                $arrWhere = array();
                $arrCountries = array();
                $vendorName = $this->vendor->getName();
                $vendorStatus = $this->vendor->getStatus();
                $vendorSql = "SELECT id FROM tbl_vendor ";

                if ($vendorName) {
                    array_push($arrWhere, "name = '" . $vendorName . "'");
                }
                
                if ($vendorStatus) {
                    array_push($arrWhere, "status = '" . $vendorStatus . "'");
                }

                if (count($arrWhere) > 0) {
                    $vendorSql.= "WHERE " . implode($arrWhere);
                }

                $db = Zend_Db_Table_Abstract::getDefaultAdapter();
                $result = $db->fetchCol($vendorSql);
                foreach ($result as $vendorId) {
                    $vendorInfo = $this->getVendor($vendorId);
                    array_push($arrCountries, $vendorInfo);
                }
                return $arrCountries;
            }
        } catch (Exception $ex) {
            throw new Base_Model_ObtorLib_App_Core_Catalog_Exception($ex);
        }
    }

}
