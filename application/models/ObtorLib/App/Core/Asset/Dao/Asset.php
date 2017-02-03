<?php
/**
 * Created by PhpStorm.
 * Asset: ism-apac
 * Date: 8/7/14
 * Time: 3:26 PM
 */

class Base_Model_ObtorLib_App_Core_Asset_Dao_Asset extends Zend_Db_Table_Abstract {

    //put your code here
    public $asset;
    protected $_name = 'tbl_assets';

    /*
     * Get a user asset using id
     * @return      : Entity Asset Object (Base_Model_ObtorLib_App_Core_Asset_Entity_Asset)
     */

    public function getAsset($id) {
        try {
            $id = (int) $id;
            $row = $this->fetchRow('id = ' . $id);
            if ($row) {
                $assetRow = $row->toArray();
                $assetEntity = new Base_Model_ObtorLib_App_Core_Asset_Entity_Asset();
                $assetEntity->setId($assetRow['id']);
                $assetEntity->setAssetType($assetRow['asset_type']);
                $assetEntity->setTagNumber($assetRow['tag_number']);
                $assetEntity->setDescription($assetRow['description']);
                $assetEntity->setCategory($assetRow['category']);
                $assetEntity->setVendor($assetRow['vendor']);
                $assetEntity->setModel($assetRow['model']);
                $assetEntity->setSerialNumber($assetRow['serial_number']);
                $assetEntity->setBarcode($assetRow['barcode']);
                $assetEntity->setDateAcquired($assetRow['date_acquired']);
                $assetEntity->setDateDisposed($assetRow['date_disposed']);
                $assetEntity->setCountry($assetRow['country']);
                $assetEntity->setRegion($assetRow['region']);
                $assetEntity->setBranch($assetRow['branch']);
                $assetEntity->setDepartment($assetRow['department']);
                $assetEntity->setCurrentUser($assetRow['current_user']);
                $assetEntity->setPriviousUser($assetRow['previous_user']);
                $assetEntity->setStatus($assetRow['status']);
                $assetEntity->setLastMaintenanceDate($assetRow['last_maintenance_date']);
                $assetEntity->setNextMaintenanceDate($assetRow['next_maintenance_date']);
                $assetEntity->setPurchasedDate($assetRow['purchased_date']);
                $assetEntity->setCost($assetRow['cost']);
                $assetEntity->setPurchasedFrom($assetRow['purchased_from']);
                $assetEntity->setAttachedInvoice($assetRow['attached_invoice']);
                $assetEntity->setItemPicture($assetRow['item_picture']);
                $assetEntity->setWarrantyValiedUntil($assetRow['warranty_valid_until']);
                $assetEntity->setDateCreated($assetRow['date_created']);
                $assetEntity->setCreatedBy($assetRow['created_by']);
                $assetEntity->setDateModified($assetRow['date_modified']);
                $assetEntity->setModifiedBy($assetRow['modified_by']);

                return $assetEntity;
            } else {
                return null;
            }
        } catch (Exception $ex) {
            throw new Base_Model_ObtorLib_App_Core_Asset_Exception($ex);
        }
    }


    /*
     * Add new user asset
     * @return      : Integer ID / Null
     */

    public function addAsset() {
        try {
            if (!($this->asset instanceof Base_Model_ObtorLib_App_Core_Asset_Entity_Asset)) {
                throw new Base_Model_ObtorLib_App_Core_Asset_Exception(" Asset Entity not initialized");
            } else {
                $data = array(
                    'asset_type' => $this->asset->getAssetType(),
                    'tag_number' => $this->asset->getTagNumber(),
                    'description' => $this->asset->getDescription(),
                    'category' => $this->asset->getCategory(),
                    'vendor' => $this->asset->getVendor(),
                    'model' => $this->asset->getModel(),
                    'serial_number' => $this->asset->getSerialNumber(),
                    'barcode' => $this->asset->getBarcode(),
                    'date_acquired' => $this->asset->getDateAcquired(),
                    'date_disposed' => $this->asset->getDateDisposed(),
                    'country' => $this->asset->getCountry(),
                    'region' => $this->asset->getRegion(),
                    'branch' => $this->asset->getBranch(),
                    'department' => $this->asset->getDepartment(),
                    'current_user' => $this->asset->getCurrentUser(),
                    'previous_user' => $this->asset->getPriviousUser(),
                    'status' => $this->asset->getStatus(),
                    'last_maintenance_date' => $this->asset->getLastMaintenanceDate(),
                    'next_maintenance_date' => $this->asset->getNextMaintenanceDate(),
                    'purchased_date' => $this->asset->getPurchasedDate(),
                    'cost' => $this->asset->getCost(),
                    'purchased_from' => $this->asset->getPurchasedFrom(),
                    'attached_invoice' => $this->asset->getAttachedInvoice(),
                    'item_picture' => $this->asset->getItemPicture(),
                    'warranty_valid_until' => $this->asset->getWarrantyValiedUntil(),
                    'date_created' => $this->asset->getDateCreated(),
                    'created_by' => $this->asset->getCreatedBy(),
                    'date_modified' => $this->asset->getDateModified(),
                    'modified_by' => $this->asset->getModifiedBy());
                $last_inserted_id = $this->insert($data);
                return $last_inserted_id;
            }
        } catch (Exception $ex) {
            throw new Base_Model_ObtorLib_App_Core_Asset_Exception($ex);
        }
    }

    /*
     * Update user asset
     * @return      : Boolean true/false
     */

    public function updateAsset() {
        try {
            if (!($this->asset instanceof Base_Model_ObtorLib_App_Core_Asset_Entity_Asset)) {
                throw new Base_Model_ObtorLib_App_Core_Asset_Exception(" Asset Entity not initialized");
            } else {
                $data = array(
                    'asset_type' => $this->asset->getAssetType(),
                    'tag_number' => $this->asset->getTagNumber(),
                    'description' => $this->asset->getDescription(),
                    'category' => $this->asset->getCategory(),
                    'vendor' => $this->asset->getVendor(),
                    'model' => $this->asset->getModel(),
                    'serial_number' => $this->asset->getSerialNumber(),
                    'barcode' => $this->asset->getBarcode(),
                    'date_acquired' => $this->asset->getDateAcquired(),
                    'date_disposed' => $this->asset->getDateDisposed(),
                    'country' => $this->asset->getCountry(),
                    'region' => $this->asset->getRegion(),
                    'branch' => $this->asset->getBranch(),
                    'department' => $this->asset->getDepartment(),
                    'current_user' => $this->asset->getCurrentUser(),
                    'previous_user' => $this->asset->getPriviousUser(),
                    'status' => $this->asset->getStatus(),
                    'last_maintenance_date' => $this->asset->getLastMaintenanceDate(),
                    'next_maintenance_date' => $this->asset->getNextMaintenanceDate(),
                    'purchased_date' => $this->asset->getPurchasedDate(),
                    'cost' => $this->asset->getCost(),
                    'purchased_from' => $this->asset->getPurchasedDate(),
                    'attached_invoice' => $this->asset->getAttachedInvoice(),
                    'item_picture' => $this->asset->getItemPicture(),
                    'warranty_valid_until' => $this->asset->getWarrantyValiedUntil(),
                    'date_created' => $this->asset->getDateCreated(),
                    'created_by' => $this->asset->getCreatedBy(),
                    'date_modified' => $this->asset->getDateModified(),
                    'modified_by' => $this->asset->getModifiedBy());
                return $this->update($data, 'id = ' . (int) $this->asset->getId());
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
                throw new Base_Model_ObtorLib_App_Core_Asset_Exception(" Asset Entity not initialized");
            } else {
                return $this->delete('id =' . (int) $this->asset->getId());
            }
        } catch (Exception $ex) {
            throw new Base_Model_ObtorLib_App_Core_Asset_Exception($ex);
        }
    }

    /*
     * Search user assets....
     * @return : Array of Assets Entities...
     */

    public function search($limit) {
        try {
            if (!($this->asset instanceof Base_Model_ObtorLib_App_Core_Asset_Entity_Asset)) {
                throw new Base_Model_ObtorLib_App_Core_Asset_Exception(" Asset Entity not initialized");
            } else {
                $arrWhere = array();
                $arrAssets = array();
                $tagNumber = $this->asset->getTagNumber();
                $assetSql = "SELECT id FROM tbl_assets ";
                if ($tagNumber) {
                    array_push($arrWhere, "tag_number = '" . $tagNumber . "'");
                }

                if (count($arrWhere) > 0) {
                     $assetSql.= "WHERE " . implode(' AND ',$arrWhere);
                }

                $db = Zend_Db_Table_Abstract::getDefaultAdapter();
                $assetSql = $assetSql.$limit;
                $result = $db->fetchCol($assetSql);
                foreach ($result as $assetId) {
                    $assetInfo = $this->getAsset($assetId);
                    array_push($arrAssets, $assetInfo);
                }
                return $arrAssets;
            }
        } catch (Exception $ex) {
            throw new Base_Model_ObtorLib_App_Core_Asset_Exception($ex);
        }
    }
    
    
    /*
     * Search assets....
     * @return : Integer - Total Number...
     */

    public function searchCount() {
        try {
            if (!($this->asset instanceof Base_Model_ObtorLib_App_Core_Asset_Entity_Asset)) {
                throw new Base_Model_ObtorLib_App_Core_Asset_Exception(" Asset Entity not initialized");
            } else {
                $arrWhere = array();
                $arrAssets = array();
                $tagNumber = $this->asset->getTagNumber();
                $assetSql = "SELECT count(id) As tot FROM tbl_assets ";
                if ($tagNumber) {
                    array_push($arrWhere, "tag_number = '" . $tagNumber . "'");
                }

                if (count($arrWhere) > 0) {
                     $assetSql.= "WHERE " . implode(' AND ',$arrWhere);
                }

                $db = Zend_Db_Table_Abstract::getDefaultAdapter();
                $result 	= $db->fetchRow($assetSql);
                $total_number = $result['tot']; 
                return $total_number;
            }
        } catch (Exception $ex) {
            throw new Base_Model_ObtorLib_App_Core_Asset_Exception($ex);
        }
    }
    
        
    public function getTotalAssetsValue($purchasedDateFrom,$purchasedDateTo,$execuldeStatus = NULL) {
        try {
            
                $totalAssetsValue = 0;
                $arrWhere = array();
                
                $totalAssetsValueSql = "SELECT sum(cost) as totalAssetsValue FROM tbl_assets ";
                
                if ($purchasedDateFrom != '' && $purchasedDateTo != '') {
                    array_push($arrWhere, "purchased_date BETWEEN '" . $purchasedDateFrom . "' AND '" . $purchasedDateTo . "'");
                }
                
                if($execuldeStatus){
                    $comma_separated = "('".implode("','", $execuldeStatus)."')";
                    if($comma_separated){
                        array_push($arrWhere, "status NOT IN $comma_separated");
                    }
                }
        
                if (count($arrWhere) > 0) {
                    $totalAssetsValueSql.= "WHERE " . implode(' AND ',$arrWhere);
                }
                
                $db = Zend_Db_Table_Abstract::getDefaultAdapter();
                $result 	= $db->fetchRow($totalAssetsValueSql);
                $totalAssetsValue = $result['totalAssetsValue'];
                return $totalAssetsValue;

        } catch (Exception $ex) {
            throw new Base_Model_ObtorLib_App_Core_Asset_Exception($ex);
        }
    }

}