<?php
class Base_Model_ObtorLib_App_Core_Qualification_Dao_License extends Zend_Db_Table_Abstract{


    //put your code here
    public $license;
    protected $_name = 'tbl_license';

    /*
     * Get a license information using license id
     * @return      : Entity License Object (Base_Model_ObtorLib_App_Core_Qualification_Entity_License)
     */

    public function getLicense($id) {
        try {
            $id = (int) $id;
            $row = $this->fetchRow('id = ' . $id);
            if ($row) {
                $licenseRow = $row->toArray();
                $licenseEntity = new Base_Model_ObtorLib_App_Core_Qualification_Entity_License();
                $licenseEntity->setId($licenseRow['id']);
                $licenseEntity->setLicenseType($licenseRow['license_type']);
                $licenseEntity->setLicenseNumber($licenseRow['license_number']);
                $licenseEntity->setIssuedDate($licenseRow['issued_date']);
                $licenseEntity->setExpiryDate($licenseRow['expiry_date']);
                $licenseEntity->setEmployeeId($licenseRow['employee_id']);
                $licenseEntity->setRelId($licenseRow['rel_id']);
                $licenseEntity->setRelObject($licenseRow['rel_object']);
                return $licenseEntity;
            } else {
                return null;
            }
        } catch (Exception $ex) {
            throw new Base_Model_ObtorLib_App_Core_Qualification_Exception($ex);
        }
    }

    /*
     * Add new License
     * @return      : Integer ID / Null
     */

    public function addLicense() {
        try {
            if (!($this->license instanceof Base_Model_ObtorLib_App_Core_Qualification_Entity_License)) {
                throw new Base_Model_ObtorLib_App_Core_Qualification_Exception(" License Entity not initialized");
            } else {
                $data = array(
                    'license_type' => $this->license->getLicenseType(),
                    'license_number' => $this->license->getLicenseNumber(),
                    'issued_date' => $this->license->getIssuedDate(),
                    'expiry_date' => $this->license->getExpiryDate(),
                    'rel_id' => $this->license->getRelId(),
                    'rel_object' => $this->license->getRelObject(),
                    'employee_id' => $this->license->getEmployeeId());
                $last_inserted_id = $this->insert($data);
                return $last_inserted_id;
            }
        } catch (Exception $ex) {
            throw new Base_Model_ObtorLib_App_Core_Qualification_Exception($ex);
        }
    }



    /*
    * Update license
    * @return      : Boolean true/false
    */

    public function updateLicense() {
        try {
            if (!($this->license instanceof Base_Model_ObtorLib_App_Core_Qualification_Entity_License)) {
                throw new Base_Model_ObtorLib_App_Core_Qualification_Exception(" License Entity not initialized");
            } else {
                $data = array(
                    'license_type' => $this->license->getLicenseType(),
                    'license_number' => $this->license->getLicenseNumber(),
                    'issued_date' => $this->license->getIssuedDate(),
                    'expiry_date' => $this->license->getExpiryDate(),
                    'rel_id' => $this->license->getRelId(),
                    'rel_object' => $this->license->getRelObject(),
                    'employee_id' => $this->license->getEmployeeId());
                return $this->update($data, 'id = ' . (int) $this->license->getId());
            }
        } catch (Exception $ex) {
            throw new Base_Model_ObtorLib_App_Core_Qualification_Exception($ex);
        }
    }


    /*
    * Delete license
    * @return      : Boolean true/false
    */

    public function deleteLicense() {
        try {
            if (!($this->license instanceof Base_Model_ObtorLib_App_Core_Qualification_Entity_License)) {
                throw new Base_Model_ObtorLib_App_Core_Qualification_Exception(" License Entity not initialized");
            } else {
                return $this->delete('id =' . (int) $this->license->getId());
            }
        } catch (Exception $ex) {
            throw new Base_Model_ObtorLib_App_Core_Qualification_Exception($ex);
        }
    }


    /*
     * Search licenses....
     * @return : Array of Licenses Entities...
     */

    public function search() {
        try {
            if (!($this->license instanceof Base_Model_ObtorLib_App_Core_Qualification_Entity_License)) {
                throw new Base_Model_ObtorLib_App_Core_Qualification_Exception(" License Entity not initialized");
            } else {
                $arrWhere = array();
                $arrLicenses = array();
                $relId = $this->license->getRelId();
                $relObject = $this->license->getRelObject();
                
                $licenseSql = "SELECT id FROM tbl_license ";

                if ($relId) {
                    array_push($arrWhere, "rel_id = '" . $relId . "'");
                }
                
                if ($relObject) {
                    array_push($arrWhere, "rel_object = '" . $relObject . "'");
                }
                if (count($arrWhere) > 0) {
                    $licenseSql.= "WHERE " . implode(' AND ',$arrWhere);
                }

                $db = Zend_Db_Table_Abstract::getDefaultAdapter();
                $result = $db->fetchCol($licenseSql);
                foreach ($result as $licenseId) {
                    $licenseInfo = $this->getLicense($licenseId);
                    array_push($arrLicenses, $licenseInfo);
                }
                return $arrLicenses;
            }
        } catch (Exception $ex) {
            throw new Base_Model_ObtorLib_App_Core_Qualification_Exception($ex);
        }
    }


} 