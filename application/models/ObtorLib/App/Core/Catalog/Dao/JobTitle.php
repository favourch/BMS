<?php

/**
 * Description of JobTitle
 *
 * @author Iyngaran Iyathurai <iyngaran55@gmail.com>
 */
class Base_Model_ObtorLib_App_Core_Catalog_Dao_JobTitle extends Zend_Db_Table_Abstract {

    //put your code here
    public $jobTitle;
    protected $_name = 'tbl_job_title';

    /*
     * Get a jobTitle using id
     * @return      : Entity JobTitle Object (Base_Model_ObtorLib_App_Core_Catalog_Entity_JobTitle)
     */

    public function getJobTitle($id) {
        try {
            $id = (int) $id;
            $row = $this->fetchRow('id = ' . $id);
            if ($row) {
                $jobTitleRow = $row->toArray();
                $jobTitleEntity = new Base_Model_ObtorLib_App_Core_Catalog_Entity_JobTitle();
                $jobTitleEntity->setId($jobTitleRow['id']);
                $jobTitleEntity->setName($jobTitleRow['name']);
                $jobTitleEntity->setPrefix($jobTitleRow['prefix']);
                return $jobTitleEntity;
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

    public function addJobTitle() {
        try {
            if (!($this->jobTitle instanceof Base_Model_ObtorLib_App_Core_Catalog_Entity_JobTitle)) {
                throw new Base_Model_ObtorLib_App_Core_Catalog_Exception(" JobTitle Entity not intialized");
            } else {
                $data = array(
                    'name' => $this->jobTitle->getName(),
                    'prefix' => $this->jobTitle->getPrefix());
                $last_inserted_id = $this->insert($data);
                return $last_inserted_id;
            }
        } catch (Exception $ex) {
            throw new Base_Model_ObtorLib_App_Core_Catalog_Exception($ex);
        }
    }

    /*
     * Update jobTitle
     * @return      : Boolean true/false
     */

    public function updateJobTitle() {
        try {
            if (!($this->jobTitle instanceof Base_Model_ObtorLib_App_Core_Catalog_Entity_JobTitle)) {
                throw new Base_Model_ObtorLib_App_Core_Catalog_Exception(" JobTitle Entity not intialized");
            } else {
                $data = array(
                    'name' => $this->jobTitle->getName(),
                    'prefix' => $this->jobTitle->getPrefix());
                return $this->update($data, 'id = ' . (int) $this->jobTitle->getId());
            }
        } catch (Exception $ex) {
            throw new Base_Model_ObtorLib_App_Core_Catalog_Exception($ex);
        }
    }

    /*
     * Delete jobTitle
     * @return      : Integer ID / Null
     */

    public function deleteJobTitle() {
        try {
            if (!($this->jobTitle instanceof Base_Model_ObtorLib_App_Core_Catalog_Entity_JobTitle)) {
                throw new Base_Model_ObtorLib_App_Core_Catalog_Exception(" JobTitle Entity not intialized");
            } else {
                return $this->delete('id =' . (int) $this->jobTitle->getId());
            }
        } catch (Exception $ex) {
            throw new Base_Model_ObtorLib_App_Core_Catalog_Exception($ex);
        }
    }

    /*
     * Search jobTitles....
     * @return : Array of JobTitles Entities...
     */

    public function search() {
        try {
            if (!($this->jobTitle instanceof Base_Model_ObtorLib_App_Core_Catalog_Entity_JobTitle)) {
                throw new Base_Model_ObtorLib_App_Core_Catalog_Exception(" JobTitle Entity not intialized");
            } else {
                $arrWhere = array();
                $arrCountries = array();
                $jobTitleName = $this->jobTitle->getName();
                $jobTitleSql = "SELECT id FROM tbl_job_title ";

                if ($jobTitleName) {
                    array_push($arrWhere, "name = '" . $jobTitleName . "'");
                }

                if (count($arrWhere) > 0) {
                    $jobTitleSql.= "WHERE " . implode($arrWhere);
                }

                $db = Zend_Db_Table_Abstract::getDefaultAdapter();
                $result = $db->fetchCol($jobTitleSql);
                foreach ($result as $jobTitleId) {
                    $jobTitleInfo = $this->getJobTitle($jobTitleId);
                    array_push($arrCountries, $jobTitleInfo);
                }
                return $arrCountries;
            }
        } catch (Exception $ex) {
            throw new Base_Model_ObtorLib_App_Core_Catalog_Exception($ex);
        }
    }

}
