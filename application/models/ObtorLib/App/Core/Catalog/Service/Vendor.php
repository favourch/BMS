<?php

/**
 * Description of Vendor
 *
 * @author Iyngaran Iyathurai <iyngaran55@gmail.com>
 */
class Base_Model_ObtorLib_App_Core_Catalog_Service_Vendor extends Base_Model_ObtorLib_Eav_Model_Service {

    public $vendor;

    /*
     * Get a user vendor using id
     * @return      : Entity Vendor Object (Base_Model_ObtorLib_App_Core_Catalog_Entity_Vendor)
     */

    public function getVendor($id) {
        try {
            $objVendor = new Base_Model_ObtorLib_App_Core_Catalog_Dao_Vendor();
            $vendor = $objVendor->getVendor($id);
            return $vendor;
        } catch (Exception $e) {
            throw new Base_Model_ObtorLib_App_Core_Catalog_Exception($e);
        }
    }

    /*
     * Add new user vendor
     * @return      : Integer ID / Null
     */

    public function addVendor() {
        try {
            if (!($this->vendor instanceof Base_Model_ObtorLib_App_Core_Catalog_Entity_Vendor)) {
                throw new Base_Model_ObtorLib_App_Core_Catalog_Exception(" Vendor Entity not initialized");
            } else {
                $objVendor = new Base_Model_ObtorLib_App_Core_Catalog_Dao_Vendor();
                $objVendor->vendor = $this->vendor;
                return $objVendor->addVendor();
            }
        } catch (Exception $ex) {
            throw new Base_Model_ObtorLib_App_Core_Catalog_Exception($ex);
        }
    }

    /*
     * Update user vendor
     * @return      : Integer ID / Null
     */

    public function updateVendor() {
        try {
            if (!($this->vendor instanceof Base_Model_ObtorLib_App_Core_Catalog_Entity_Vendor)) {
                throw new Base_Model_ObtorLib_App_Core_Catalog_Exception(" Vendor Entity not initialized");
            } else {
                $objVendor = new Base_Model_ObtorLib_App_Core_Catalog_Dao_Vendor();
                $objVendor->vendor = $this->vendor;
                return $objVendor->updateVendor();
            }
        } catch (Exception $ex) {
            throw new Base_Model_ObtorLib_App_Core_Catalog_Exception($ex);
        }
    }

    /*
     * Delete user vendor
     * @return      : Integer ID / Null
     */

    public function deleteVendor() {
        try {
            if (!($this->vendor instanceof Base_Model_ObtorLib_App_Core_Catalog_Entity_Vendor)) {
                throw new Base_Model_ObtorLib_App_Core_Catalog_Exception(" Vendor Entity not initialized");
            } else {
                $objVendor = new Base_Model_ObtorLib_App_Core_Catalog_Dao_Vendor();
                $objVendor->vendor = $this->vendor;
                return $objVendor->deleteVendor();
            }
        } catch (Exception $ex) {
            throw new Base_Model_ObtorLib_App_Core_Catalog_Exception($ex);
        }
    }

    /*
     * Search user vendors....
     * @return : Array of Vendors Entities...
     */

    public function search() {
        try {
            if (!($this->vendor instanceof Base_Model_ObtorLib_App_Core_Catalog_Entity_Vendor)) {
                throw new Base_Model_ObtorLib_App_Core_Catalog_Exception(" Vendor Entity not initialized");
            } else {
                $objVendor = new Base_Model_ObtorLib_App_Core_Catalog_Dao_Vendor();
                $objVendor->vendor = $this->vendor;
                return $objVendor->search();
            }
        } catch (Exception $ex) {
            throw new Base_Model_ObtorLib_App_Core_Catalog_Exception($ex);
        }
    }

}
