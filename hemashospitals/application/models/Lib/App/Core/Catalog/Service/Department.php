<?php

/**
 * Description of Department
 *
 * @author Iyngaran Iyathurai <iyngaran55@gmail.com>
 */
class Base_Model_Lib_App_Core_Catalog_Service_Department extends Base_Model_Lib_Eav_Model_Service {

    public $department;

    /*
     * Get a user department using id
     * @return      : Entity Department Object (Base_Model_Lib_App_Core_Catalog_Entity_Department)
     */

    public function getDepartment($id) {
        try {
            $objDepartment = new Base_Model_Lib_App_Core_Catalog_Dao_Department();
            $department = $objDepartment->getDepartment($id);
            return $department;
        } catch (Exception $e) {
            throw new Base_Model_Lib_App_Core_Catalog_Exception($e);
        }
    }

    /*
     * Add new user department
     * @return      : Integer ID / Null
     */

    public function addDepartment() {
        try {
            if (!($this->department instanceof Base_Model_Lib_App_Core_Catalog_Entity_Department)) {
                throw new Base_Model_Lib_App_Core_Catalog_Exception(" Department Entity not intialized");
            } else {
                $objDepartment = new Base_Model_Lib_App_Core_Catalog_Dao_Department();
                $objDepartment->department = $this->department;
                return $objDepartment->addDepartment();
            }
        } catch (Exception $ex) {
            throw new Base_Model_Lib_App_Core_Catalog_Exception($ex);
        }
    }

    /*
     * Update user department
     * @return      : Integer ID / Null
     */

    public function updateDepartment() {
        try {
            if (!($this->department instanceof Base_Model_Lib_App_Core_Catalog_Entity_Department)) {
                throw new Base_Model_Lib_App_Core_Catalog_Exception(" Department Entity not intialized");
            } else {
                $objDepartment = new Base_Model_Lib_App_Core_Catalog_Dao_Department();
                $objDepartment->department = $this->department;
                return $objDepartment->updateDepartment();
            }
        } catch (Exception $ex) {
            throw new Base_Model_Lib_App_Core_Catalog_Exception($ex);
        }
    }

    /*
     * Delete user department
     * @return      : Integer ID / Null
     */

    public function deleteDepartment() {
        try {
            if (!($this->department instanceof Base_Model_Lib_App_Core_Catalog_Entity_Department)) {
                throw new Base_Model_Lib_App_Core_Catalog_Exception(" Department Entity not intialized");
            } else {
                $objDepartment = new Base_Model_Lib_App_Core_Catalog_Dao_Department();
                $objDepartment->department = $this->department;
                return $objDepartment->deleteDepartment();
            }
        } catch (Exception $ex) {
            throw new Base_Model_Lib_App_Core_Catalog_Exception($ex);
        }
    }

    /*
     * Search user departments....
     * @return : Array of Departments Entities...
     */

    public function search() {
        try {
            if (!($this->department instanceof Base_Model_Lib_App_Core_Catalog_Entity_Department)) {
                throw new Base_Model_Lib_App_Core_Catalog_Exception(" Department Entity not intialized");
            } else {
                $objDepartment = new Base_Model_Lib_App_Core_Catalog_Dao_Department();
                $objDepartment->department = $this->department;
                return $objDepartment->search();
            }
        } catch (Exception $ex) {
            throw new Base_Model_Lib_App_Core_Catalog_Exception($ex);
        }
    }

}
