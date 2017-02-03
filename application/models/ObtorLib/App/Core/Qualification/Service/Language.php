<?php

/**
 * Description of Language
 *
 * @author Iyngaran Iyathurai <iyngaran55@gmail.com>
 */
class Base_Model_ObtorLib_App_Core_Qualification_Service_Language extends Base_Model_ObtorLib_Eav_Model_Service {

    public $language;

    /*
     * Get a user language using id
     * @return      : Entity Language Object (Base_Model_ObtorLib_App_Core_Qualification_Entity_Language)
     */

    public function getLanguage($id) {
        try {
            $objLanguage = new Base_Model_ObtorLib_App_Core_Qualification_Dao_Language();
            $language = $objLanguage->getLanguage($id);
            return $language;
        } catch (Exception $e) {
            throw new Base_Model_ObtorLib_App_Core_Qualification_Exception($e);
        }
    }

    /*
     * Add new user language
     * @return      : Integer ID / Null
     */

    public function addLanguage() {
        try {
            if (!($this->language instanceof Base_Model_ObtorLib_App_Core_Qualification_Entity_Language)) {
                throw new Base_Model_ObtorLib_App_Core_Qualification_Exception(" Language Entity not initialized");
            } else {
                $objLanguage = new Base_Model_ObtorLib_App_Core_Qualification_Dao_Language();
                $objLanguage->language = $this->language;
                return $objLanguage->addLanguage();
            }
        } catch (Exception $ex) {
            throw new Base_Model_ObtorLib_App_Core_Qualification_Exception($ex);
        }
    }

    /*
     * Update user language
     * @return      : Integer ID / Null
     */

    public function updateLanguage() {
        try {
            if (!($this->language instanceof Base_Model_ObtorLib_App_Core_Qualification_Entity_Language)) {
                throw new Base_Model_ObtorLib_App_Core_Qualification_Exception(" Language Entity not initialized");
            } else {
                $objLanguage = new Base_Model_ObtorLib_App_Core_Qualification_Dao_Language();
                $objLanguage->language = $this->language;
                return $objLanguage->updateLanguage();
            }
        } catch (Exception $ex) {
            throw new Base_Model_ObtorLib_App_Core_Qualification_Exception($ex);
        }
    }

    /*
     * Delete user language
     * @return      : Integer ID / Null
     */

    public function deleteLanguage() {
        try {
            if (!($this->language instanceof Base_Model_ObtorLib_App_Core_Qualification_Entity_Language)) {
                throw new Base_Model_ObtorLib_App_Core_Qualification_Exception(" Language Entity not initialized");
            } else {
                $objLanguage = new Base_Model_ObtorLib_App_Core_Qualification_Dao_Language();
                $objLanguage->language = $this->language;
                return $objLanguage->deleteLanguage();
            }
        } catch (Exception $ex) {
            throw new Base_Model_ObtorLib_App_Core_Qualification_Exception($ex);
        }
    }

    /*
     * Search user languages....
     * @return : Array of Languages Entities...
     */

    public function search() {
        try {
            if (!($this->language instanceof Base_Model_ObtorLib_App_Core_Qualification_Entity_Language)) {
                throw new Base_Model_ObtorLib_App_Core_Qualification_Exception(" Language Entity not initialized");
            } else {
                $objLanguage = new Base_Model_ObtorLib_App_Core_Qualification_Dao_Language();
                $objLanguage->language = $this->language;
                return $objLanguage->search();
            }
        } catch (Exception $ex) {
            throw new Base_Model_ObtorLib_App_Core_Qualification_Exception($ex);
        }
    }

}
