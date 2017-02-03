<?php
/**
 * Created by PhpStorm.
 * Asset: ism-apac
 * Date: 8/7/14
 * Time: 3:26 PM
 */

class Base_Model_ObtorLib_App_Core_Asset_Service_Asset  extends Base_Model_ObtorLib_Eav_Model_Service {

    public $asset;

    /*
     * Get a user asset using id
     * @return      : Entity Asset Asset Object (Base_Model_ObtorLib_App_Core_Asset_Entity_Asset)
     */

    public function getAsset($id) {
        try {
            $objAsset = new Base_Model_ObtorLib_App_Core_Asset_Dao_Asset();
            $asset = $objAsset->getAsset($id);
            return $asset;
        } catch (Exception $e) {
            throw new Base_Model_ObtorLib_App_Core_Asset_Exception($e);
        }
    }

    /*
     * Add new user asset
     * @return      : Integer ID / Null
     */

    public function addAsset() {
        try {
            if (!($this->asset instanceof Base_Model_ObtorLib_App_Core_Asset_Entity_Asset)) {
                throw new Base_Model_ObtorLib_App_Core_Asset_Exception(" Asset Asset Entity not initialized");
            } else {
                $objAsset = new Base_Model_ObtorLib_App_Core_Asset_Dao_Asset();
                $objAsset->asset = $this->asset;
                return $objAsset->addAsset();
            }
        } catch (Exception $ex) {
            throw new Base_Model_ObtorLib_App_Core_Asset_Exception($ex);
        }
    }

    /*
     * Update user asset
     * @return      : Integer ID / Null
     */

    public function updateAsset() {
        try {
            if (!($this->asset instanceof Base_Model_ObtorLib_App_Core_Asset_Entity_Asset)) {
                throw new Base_Model_ObtorLib_App_Core_Asset_Exception(" Asset Asset Entity not initialized");
            } else {
                $objAsset = new Base_Model_ObtorLib_App_Core_Asset_Dao_Asset();
                $objAsset->asset = $this->asset;
                return $objAsset->updateAsset();
            }
        } catch (Exception $ex) {
            throw new Base_Model_ObtorLib_App_Core_Asset_Exception($ex);
        }
    }

    /*
     * Delete user asset
     * @return      : Integer ID / Null
     */

    public function deleteAsset() {
        try {
            if (!($this->asset instanceof Base_Model_ObtorLib_App_Core_Asset_Entity_Asset)) {
                throw new Base_Model_ObtorLib_App_Core_Asset_Exception(" Asset Asset Entity not initialized");
            } else {
                $objAsset = new Base_Model_ObtorLib_App_Core_Asset_Dao_Asset();
                $objAsset->asset = $this->asset;
                return $objAsset->deleteAsset();
            }
        } catch (Exception $ex) {
            throw new Base_Model_ObtorLib_App_Core_Asset_Exception($ex);
        }
    }

    /*
     * Search user assets....
     * @return : Array of Asset Assets Entities...
     */

    public function search($limit) {
        try {
            if (!($this->asset instanceof Base_Model_ObtorLib_App_Core_Asset_Entity_Asset)) {
                throw new Base_Model_ObtorLib_App_Core_Asset_Exception(" Asset Asset Entity not initialized");
            } else {
                $objAsset = new Base_Model_ObtorLib_App_Core_Asset_Dao_Asset();
                $objAsset->asset = $this->asset;
                return $objAsset->search($limit);
            }
        } catch (Exception $ex) {
            throw new Base_Model_ObtorLib_App_Core_Asset_Exception($ex);
        }
    }
    
    
    /*
     * Search count....
     * @return : Integer - Total Number...
     */

    public function searchCount() {
        try {
            if (!($this->asset instanceof Base_Model_ObtorLib_App_Core_Asset_Entity_Asset)) {
                throw new Base_Model_ObtorLib_App_Core_Asset_Exception(" Asset Asset Entity not initialized");
            } else {
                $objAsset = new Base_Model_ObtorLib_App_Core_Asset_Dao_Asset();
                $objAsset->asset = $this->asset;
                return $objAsset->searchCount();
            }
        } catch (Exception $ex) {
            throw new Base_Model_ObtorLib_App_Core_Asset_Exception($ex);
        }
    }
    
    
     public function getTotalAssetsValue($purchasedDateFrom,$purchasedDateTo,$execuldeStatus = NULL) {
        try {
            $objAsset = new Base_Model_ObtorLib_App_Core_Asset_Dao_Asset();
            return $objAsset->getTotalAssetsValue($purchasedDateFrom, $purchasedDateTo, $execuldeStatus); 
        } catch (Exception $ex) {
            throw new Base_Model_ObtorLib_App_Core_Asset_Exception($ex);
        }
    }

}