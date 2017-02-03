<?php

/**
 * Description of License
 *
 * @author Iyngaran Iyathurai <iyngaran55@gmail.com>
 */
class Base_Model_Lib_App_Core_Qualification_Service_License extends Base_Model_Lib_Eav_Model_Service {

    public $license;

    /*
     * Get a user license using id
     * @return      : Entity License Object (Base_Model_Lib_App_Core_Qualification_Entity_License)
     */

    public function getLicense($id) {
        try {
            $objLicense = new Base_Model_Lib_App_Core_Qualification_Dao_License();
            $license = $objLicense->getLicense($id);
            return $license;
        } catch (Exception $e) {
            throw new Base_Model_Lib_App_Core_Qualification_Exception($e);
        }
    }

    /*
     * Add new user license
     * @return      : Integer ID / Null
     */

    public function addLicense() {
        try {
            if (!($this->license instanceof Base_Model_Lib_App_Core_Qualification_Entity_License)) {
                throw new Base_Model_Lib_App_Core_Qualification_Exception(" License Entity not initialized");
            } else {
                $objLicense = new Base_Model_Lib_App_Core_Qualification_Dao_License();
                $objLicense->license = $this->license;
                return $objLicense->addLicense();
            }
        } catch (Exception $ex) {
            throw new Base_Model_Lib_App_Core_Qualification_Exception($ex);
        }
    }

    /*
     * Update user license
     * @return      : Integer ID / Null
     */

    public function updateLicense() {
        try {
            if (!($this->license instanceof Base_Model_Lib_App_Core_Qualification_Entity_License)) {
                throw new Base_Model_Lib_App_Core_Qualification_Exception(" License Entity not initialized");
            } else {
                $objLicense = new Base_Model_Lib_App_Core_Qualification_Dao_License();
                $objLicense->license = $this->license;
                return $objLicense->updateLicense();
            }
        } catch (Exception $ex) {
            throw new Base_Model_Lib_App_Core_Qualification_Exception($ex);
        }
    }

    /*
     * Delete user license
     * @return      : Integer ID / Null
     */

    public function deleteLicense() {
        try {
            if (!($this->license instanceof Base_Model_Lib_App_Core_Qualification_Entity_License)) {
                throw new Base_Model_Lib_App_Core_Qualification_Exception(" License Entity not initialized");
            } else {
                $objLicense = new Base_Model_Lib_App_Core_Qualification_Dao_License();
                $objLicense->license = $this->license;
                return $objLicense->deleteLicense();
            }
        } catch (Exception $ex) {
            throw new Base_Model_Lib_App_Core_Qualification_Exception($ex);
        }
    }

    /*
     * Search user licenses....
     * @return : Array of Licenses Entities...
     */

    public function search() {
        try {
            if (!($this->license instanceof Base_Model_Lib_App_Core_Qualification_Entity_License)) {
                throw new Base_Model_Lib_App_Core_Qualification_Exception(" License Entity not initialized");
            } else {
                $objLicense = new Base_Model_Lib_App_Core_Qualification_Dao_License();
                $objLicense->license = $this->license;
                return $objLicense->search();
            }
        } catch (Exception $ex) {
            throw new Base_Model_Lib_App_Core_Qualification_Exception($ex);
        }
    }

}
