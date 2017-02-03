<?php
class Base_Model_ObtorLib_App_Core_Qualification_Dao_Education extends Zend_Db_Table_Abstract{


    //put your code here
    public $education;
    protected $_name = 'tbl_education';

    /*
     * Get a education information using education id
     * @return      : Entity Education Object (Base_Model_ObtorLib_App_Core_Qualification_Entity_Education)
     */

    public function getEducation($id) {
        try {
            $id = (int) $id;
            $row = $this->fetchRow('id = ' . $id);
            if ($row) {
                $educationRow = $row->toArray();
                $educationEntity = new Base_Model_ObtorLib_App_Core_Qualification_Entity_Education();
                $educationEntity->setId($educationRow['id']);
                $educationEntity->setLevel($educationRow['level']);
                $educationEntity->setInstitute($educationRow['institute']);
                $educationEntity->setMajorSpecialization($educationRow['major_specialization']);
                $educationEntity->setYear($educationRow['e_year']);
                $educationEntity->setGpa($educationRow['gpa']);
                $educationEntity->setStartDate($educationRow['start_date']);
                $educationEntity->setEndDate($educationRow['end_date']);
                $educationEntity->setRelId($educationRow['rel_id']);
                $educationEntity->setRelObject($educationRow['rel_object']);
                return $educationEntity;
            } else {
                return null;
            }
        } catch (Exception $ex) {
            throw new Base_Model_ObtorLib_App_Core_Qualification_Exception($ex);
        }
    }



    /*
     * Add new Education
     * @return      : Integer ID / Null
     */

    public function addEducation() {
        try {
            if (!($this->education instanceof Base_Model_ObtorLib_App_Core_Qualification_Entity_Education)) {
                throw new Base_Model_ObtorLib_App_Core_Qualification_Exception(" Education Entity not initialized");
            } else {
                $data = array(
                    'level' => $this->education->getLevel(),
                    'institute' => $this->education->getInstitute(),
                    'major_specialization' => $this->education->getMajorSpecialization(),
                    'e_year' => $this->education->getYear(),
                    'gpa' => $this->education->getGpa(),
                    'start_date' => $this->education->getStartDate(),
                    'end_date' => $this->education->getEndDate(),
                    'rel_id' => $this->education->getRelId(),
                    'rel_object'=>$this->education->getRelObject());
                $last_inserted_id = $this->insert($data);
                return $last_inserted_id;
            }
        } catch (Exception $ex) {
            throw new Base_Model_ObtorLib_App_Core_Qualification_Exception($ex);
        }
    }



    /*
    * Update education
    * @return      : Boolean true/false
    */

    public function updateEducation() {
        try {
            if (!($this->education instanceof Base_Model_ObtorLib_App_Core_Qualification_Entity_Education)) {
                throw new Base_Model_ObtorLib_App_Core_Qualification_Exception(" Education Entity not initialized");
            } else {
                 $data = array(
                    'level' => $this->education->getLevel(),
                    'institute' => $this->education->getInstitute(),
                    'major_specialization' => $this->education->getMajorSpecialization(),
                    'e_year' => $this->education->getYear(),
                    'gpa' => $this->education->getGpa(),
                    'start_date' => $this->education->getStartDate(),
                    'end_date' => $this->education->getEndDate(),
                    'rel_id' => $this->education->getRelId(),
                    'rel_object'=>$this->education->getRelObject());
                return $this->update($data, 'id = ' . (int) $this->education->getId());
            }
        } catch (Exception $ex) {
            throw new Base_Model_ObtorLib_App_Core_Qualification_Exception($ex);
        }
    }


    /*
    * Delete education
    * @return      : Boolean true/false
    */

    public function deleteEducation() {
        try {
            if (!($this->education instanceof Base_Model_ObtorLib_App_Core_Qualification_Entity_Education)) {
                throw new Base_Model_ObtorLib_App_Core_Qualification_Exception(" Education Entity not initialized");
            } else {
                return $this->delete('id =' . (int) $this->education->getId());
            }
        } catch (Exception $ex) {
            throw new Base_Model_ObtorLib_App_Core_Qualification_Exception($ex);
        }
    }


    /*
     * Search educations....
     * @return : Array of Educations Entities...
     */

    public function search() {
        try {
            if (!($this->education instanceof Base_Model_ObtorLib_App_Core_Qualification_Entity_Education)) {
                throw new Base_Model_ObtorLib_App_Core_Qualification_Exception(" Education Entity not initialized");
            } else {
                $arrWhere = array();
                $arrEducations = array();
                $relId = $this->education->getRelId();
                $relObject = $this->education->getRelObject();
                $educationSql = "SELECT id FROM tbl_education ";

                if ($relId) {
                    array_push($arrWhere, "rel_id = '" . $relId . "'");
                }
                
                if ($relObject) {
                    array_push($arrWhere, "rel_object = '" . $relObject . "'");
                }
                

                if (count($arrWhere) > 0) {
                    $educationSql.= "WHERE " . implode(' AND ',$arrWhere);
                }

                $db = Zend_Db_Table_Abstract::getDefaultAdapter();
                $result = $db->fetchCol($educationSql);
                foreach ($result as $educationId) {
                    $educationInfo = $this->getEducation($educationId);
                    array_push($arrEducations, $educationInfo);
                }
                return $arrEducations;
            }
        } catch (Exception $ex) {
            throw new Base_Model_ObtorLib_App_Core_Qualification_Exception($ex);
        }
    }


} 