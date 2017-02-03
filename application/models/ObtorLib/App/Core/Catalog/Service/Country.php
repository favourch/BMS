<?php

/**
 * Description of Country
 *
 * @author Iyngaran Iyathurai <iyngaran55@gmail.com>
 */
class Base_Model_ObtorLib_App_Core_Catalog_Service_Country extends Base_Model_ObtorLib_Eav_Model_Service {

    public $country;

    /*
     * Get a user country using id
     * @return      : Entity Country Object (Base_Model_ObtorLib_App_Core_Catalog_Entity_Country)
     */

    public function getCountry($id) {
        try {
            $objCountry = new Base_Model_ObtorLib_App_Core_Catalog_Dao_Country();
            $country = $objCountry->getCountry($id);
            return $country;
        } catch (Exception $e) {
            throw new Base_Model_ObtorLib_App_Core_Catalog_Exception($e);
        }
    }

    /*
     * Add new user country
     * @return      : Integer ID / Null
     */

    public function addCountry() {
        try {
            if (!($this->country instanceof Base_Model_ObtorLib_App_Core_Catalog_Entity_Country)) {
                throw new Base_Model_ObtorLib_App_Core_Catalog_Exception(" Country Entity not intialized");
            } else {
                $objCountry = new Base_Model_ObtorLib_App_Core_Catalog_Dao_Country();
                $objCountry->country = $this->country;
                return $objCountry->addCountry();
            }
        } catch (Exception $ex) {
            throw new Base_Model_ObtorLib_App_Core_Catalog_Exception($ex);
        }
    }

    /*
     * Update user country
     * @return      : Integer ID / Null
     */

    public function updateCountry() {
        try {
            if (!($this->country instanceof Base_Model_ObtorLib_App_Core_Catalog_Entity_Country)) {
                throw new Base_Model_ObtorLib_App_Core_Catalog_Exception(" Country Entity not intialized");
            } else {
                $objCountry = new Base_Model_ObtorLib_App_Core_Catalog_Dao_Country();
                $objCountry->country = $this->country;
                return $objCountry->updateCountry();
            }
        } catch (Exception $ex) {
            throw new Base_Model_ObtorLib_App_Core_Catalog_Exception($ex);
        }
    }

    /*
     * Delete user country
     * @return      : Integer ID / Null
     */

    public function deleteCountry() {
        try {
            if (!($this->country instanceof Base_Model_ObtorLib_App_Core_Catalog_Entity_Country)) {
                throw new Base_Model_ObtorLib_App_Core_Catalog_Exception(" Country Entity not intialized");
            } else {
                $objCountry = new Base_Model_ObtorLib_App_Core_Catalog_Dao_Country();
                $objCountry->country = $this->country;
                return $objCountry->deleteCountry();
            }
        } catch (Exception $ex) {
            throw new Base_Model_ObtorLib_App_Core_Catalog_Exception($ex);
        }
    }

    /*
     * Search user countrys....
     * @return : Array of Countrys Entities...
     */

    public function search() {
        try {
            if (!($this->country instanceof Base_Model_ObtorLib_App_Core_Catalog_Entity_Country)) {
                throw new Base_Model_ObtorLib_App_Core_Catalog_Exception(" Country Entity not intialized");
            } else {
                $objCountry = new Base_Model_ObtorLib_App_Core_Catalog_Dao_Country();
                $objCountry->country = $this->country;
                return $objCountry->search();
            }
        } catch (Exception $ex) {
            throw new Base_Model_ObtorLib_App_Core_Catalog_Exception($ex);
        }
    }

}
