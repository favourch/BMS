<?php

/**
 * Description of Region
 *
 * @author Iyngaran Iyathurai <iyngaran55@gmail.com>
 */
class Base_Model_Lib_App_Core_Catalog_Service_Region extends Base_Model_Lib_Eav_Model_Service {

    public $region;

    /*
     * Get a user region using id
     * @return      : Entity Region Object (Base_Model_Lib_App_Core_Catalog_Entity_Region)
     */

    public function getRegion($id) {
        try {
            $objRegion = new Base_Model_Lib_App_Core_Catalog_Dao_Region();
            $region = $objRegion->getRegion($id);
            return $region;
        } catch (Exception $e) {
            throw new Base_Model_Lib_App_Core_Catalog_Exception($e);
        }
    }

    /*
     * Add new user region
     * @return      : Integer ID / Null
     */

    public function addRegion() {
        try {
            if (!($this->region instanceof Base_Model_Lib_App_Core_Catalog_Entity_Region)) {
                throw new Base_Model_Lib_App_Core_Catalog_Exception(" Region Entity not intialized");
            } else {
                $objRegion = new Base_Model_Lib_App_Core_Catalog_Dao_Region();
                $objRegion->region = $this->region;
                return $objRegion->addRegion();
            }
        } catch (Exception $ex) {
            throw new Base_Model_Lib_App_Core_Catalog_Exception($ex);
        }
    }

    /*
     * Update user region
     * @return      : Integer ID / Null
     */

    public function updateRegion() {
        try {
            if (!($this->region instanceof Base_Model_Lib_App_Core_Catalog_Entity_Region)) {
                throw new Base_Model_Lib_App_Core_Catalog_Exception(" Region Entity not intialized");
            } else {
                $objRegion = new Base_Model_Lib_App_Core_Catalog_Dao_Region();
                $objRegion->region = $this->region;
                return $objRegion->updateRegion();
            }
        } catch (Exception $ex) {
            throw new Base_Model_Lib_App_Core_Catalog_Exception($ex);
        }
    }

    /*
     * Delete user region
     * @return      : Integer ID / Null
     */

    public function deleteRegion() {
        try {
            if (!($this->region instanceof Base_Model_Lib_App_Core_Catalog_Entity_Region)) {
                throw new Base_Model_Lib_App_Core_Catalog_Exception(" Region Entity not intialized");
            } else {
                $objRegion = new Base_Model_Lib_App_Core_Catalog_Dao_Region();
                $objRegion->region = $this->region;
                return $objRegion->deleteRegion();
            }
        } catch (Exception $ex) {
            throw new Base_Model_Lib_App_Core_Catalog_Exception($ex);
        }
    }

    /*
     * Search user regions....
     * @return : Array of Regions Entities...
     */

    public function search() {
        try {
            if (!($this->region instanceof Base_Model_Lib_App_Core_Catalog_Entity_Region)) {
                throw new Base_Model_Lib_App_Core_Catalog_Exception(" Region Entity not intialized");
            } else {
                $objRegion = new Base_Model_Lib_App_Core_Catalog_Dao_Region();
                $objRegion->region = $this->region;
                return $objRegion->search();
            }
        } catch (Exception $ex) {
            throw new Base_Model_Lib_App_Core_Catalog_Exception($ex);
        }
    }

}
