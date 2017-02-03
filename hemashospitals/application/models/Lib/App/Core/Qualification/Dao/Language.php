<?php
class Base_Model_Lib_App_Core_Qualification_Dao_Language extends Zend_Db_Table_Abstract{


    //put your code here
    public $language;
    protected $_name = 'tbl_language';

    /*
     * Get a language information using language id
     * @return      : Entity Language Object (Base_Model_Lib_App_Core_Qualification_Entity_Language)
     */

    public function getLanguage($id) {
        try {
            $id = (int) $id;
            $row = $this->fetchRow('id = ' . $id);
            if ($row) {
                $languageRow = $row->toArray();
                $languageEntity = new Base_Model_Lib_App_Core_Qualification_Entity_Language();
                $languageEntity->setId($languageRow['id']);
                $languageEntity->setLanguage($languageRow['language']);
                $languageEntity->setFluency($languageRow['fluency']);
                $languageEntity->setCompetency($languageRow['competency']);
                $languageEntity->setComments($languageRow['comments']);
                $languageEntity->setEmployeeId($languageRow['employee_id']);
                return $languageEntity;
            } else {
                return null;
            }
        } catch (Exception $ex) {
            throw new Base_Model_Lib_App_Core_Qualification_Exception($ex);
        }
    }



    /*
     * Add new Language
     * @return      : Integer ID / Null
     */

    public function addLanguage() {
        try {
            if (!($this->language instanceof Base_Model_Lib_App_Core_Qualification_Entity_Language)) {
                throw new Base_Model_Lib_App_Core_Qualification_Exception(" Language Entity not initialized");
            } else {
                $data = array(
                    'language' => $this->language->getLanguage(),
                    'fluency' => $this->language->getFluency(),
                    'competency' => $this->language->getCompetency(),
                    'comments' => $this->language->getComments(),
                    'employee_id' => $this->language->getEmployeeId());
                $last_inserted_id = $this->insert($data);
                return $last_inserted_id;
            }
        } catch (Exception $ex) {
            throw new Base_Model_Lib_App_Core_Qualification_Exception($ex);
        }
    }



    /*
    * Update language
    * @return      : Boolean true/false
    */

    public function updateLanguage() {
        try {
            if (!($this->language instanceof Base_Model_Lib_App_Core_Qualification_Entity_Language)) {
                throw new Base_Model_Lib_App_Core_Qualification_Exception(" Language Entity not initialized");
            } else {
                $data = array(
                    'language' => $this->language->getLanguage(),
                    'fluency' => $this->language->getFluency(),
                    'competency' => $this->language->getCompetency(),
                    'comments' => $this->language->getComments(),
                    'employee_id' => $this->language->getEmployeeId());
                return $this->update($data, 'id = ' . (int) $this->language->getId());
            }
        } catch (Exception $ex) {
            throw new Base_Model_Lib_App_Core_Qualification_Exception($ex);
        }
    }


    /*
    * Delete language
    * @return      : Boolean true/false
    */

    public function deleteLanguage() {
        try {
            if (!($this->language instanceof Base_Model_Lib_App_Core_Qualification_Entity_Language)) {
                throw new Base_Model_Lib_App_Core_Qualification_Exception(" Language Entity not initialized");
            } else {
                return $this->delete('id =' . (int) $this->language->getId());
            }
        } catch (Exception $ex) {
            throw new Base_Model_Lib_App_Core_Qualification_Exception($ex);
        }
    }


    /*
     * Search languages....
     * @return : Array of Languages Entities...
     */

    public function search() {
        try {
            if (!($this->language instanceof Base_Model_Lib_App_Core_Qualification_Entity_Language)) {
                throw new Base_Model_Lib_App_Core_Qualification_Exception(" Language Entity not initialized");
            } else {
                $arrWhere = array();
                $arrLanguages = array();
                $employeeId = $this->language->getEmployeeId();
                $languageSql = "SELECT id FROM tbl_language ";

                if ($employeeId) {
                    array_push($arrWhere, "employee_id = '" . $employeeId . "'");
                }

                if (count($arrWhere) > 0) {
                    $languageSql.= "WHERE " . implode($arrWhere);
                }

                $db = Zend_Db_Table_Abstract::getDefaultAdapter();
                $result = $db->fetchCol($languageSql);
                foreach ($result as $languageId) {
                    $languageInfo = $this->getLanguage($languageId);
                    array_push($arrLanguages, $languageInfo);
                }
                return $arrLanguages;
            }
        } catch (Exception $ex) {
            throw new Base_Model_Lib_App_Core_Qualification_Exception($ex);
        }
    }


} 