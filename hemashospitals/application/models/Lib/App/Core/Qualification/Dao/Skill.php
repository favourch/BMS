<?php
class Base_Model_Lib_App_Core_Qualification_Dao_Skill extends Zend_Db_Table_Abstract{


    //put your code here
    public $skill;
    protected $_name = 'tbl_skill';

    /*
     * Get a skill information using skill id
     * @return      : Entity Skill Object (Base_Model_Lib_App_Core_Qualification_Entity_Skill)
     */

    public function getSkill($id) {
        try {
            $id = (int) $id;
            $row = $this->fetchRow('id = ' . $id);
            if ($row) {
                $skillRow = $row->toArray();
                $skillEntity = new Base_Model_Lib_App_Core_Qualification_Entity_Skill();
                $skillEntity->setId($skillRow['id']);
                $skillEntity->setTitle($skillRow['title']);
                $skillEntity->setYearsOfExperience($skillRow['years_of_experience']);
                $skillEntity->setComments($skillRow['comment']);
                $skillEntity->setRelId($skillRow['rel_id']);
                $skillEntity->setRelObject($skillRow['rel_object']);
                return $skillEntity;
            } else {
                return null;
            }
        } catch (Exception $ex) {
            throw new Base_Model_Lib_App_Core_Qualification_Exception($ex);
        }
    }



    /*
     * Add new Skill
     * @return      : Integer ID / Null
     */

    public function addSkill() {
        try {
            if (!($this->skill instanceof Base_Model_Lib_App_Core_Qualification_Entity_Skill)) {
                throw new Base_Model_Lib_App_Core_Qualification_Exception(" Skill Entity not initialized");
            } else {
                $data = array(
                    'title' => $this->skill->getTitle(),
                    'years_of_experience' => $this->skill->getYearsOfExperience(),
                    'comment' => $this->skill->getComments(),
                    'rel_id' => $this->skill->getRelId(),
                    'rel_object' => $this->skill->getRelObject());
                $last_inserted_id = $this->insert($data);
                return $last_inserted_id;
            }
        } catch (Exception $ex) {
            throw new Base_Model_Lib_App_Core_Qualification_Exception($ex);
        }
    }



    /*
    * Update skill
    * @return      : Boolean true/false
    */

    public function updateSkill() {
        try {
            if (!($this->skill instanceof Base_Model_Lib_App_Core_Qualification_Entity_Skill)) {
                throw new Base_Model_Lib_App_Core_Qualification_Exception(" Skill Entity not initialized");
            } else {
                $data = array(
                    'title' => $this->skill->getTitle(),
                    'years_of_experience' => $this->skill->getYearsOfExperience(),
                    'comment' => $this->skill->getComments(),
                    'rel_id' => $this->skill->getRelId(),
                    'rel_object' => $this->skill->getRelObject());
                return $this->update($data, 'id = ' . (int) $this->skill->getId());
            }
        } catch (Exception $ex) {
            throw new Base_Model_Lib_App_Core_Qualification_Exception($ex);
        }
    }


    /*
    * Delete skill
    * @return      : Boolean true/false
    */

    public function deleteSkill() {
        try {
            if (!($this->skill instanceof Base_Model_Lib_App_Core_Qualification_Entity_Skill)) {
                throw new Base_Model_Lib_App_Core_Qualification_Exception(" Skill Entity not initialized");
            } else {
                return $this->delete('id =' . (int) $this->skill->getId());
            }
        } catch (Exception $ex) {
            throw new Base_Model_Lib_App_Core_Qualification_Exception($ex);
        }
    }


    /*
     * Search skills....
     * @return : Array of Skills Entities...
     */

    public function search() {
        try {
            if (!($this->skill instanceof Base_Model_Lib_App_Core_Qualification_Entity_Skill)) {
                throw new Base_Model_Lib_App_Core_Qualification_Exception(" Skill Entity not initialized");
            } else {
                $arrWhere = array();
                $arrSkills = array();
                $relId = $this->skill->getRelId();
                $relObject = $this->skill->getRelObject();
                
                $skillSql = "SELECT id FROM tbl_skill ";

                if ($relId) {
                    array_push($arrWhere, "rel_id = '" . $relId . "'");
                }
                
                if ($relObject) {
                    array_push($arrWhere, "rel_object = '" . $relObject . "'");
                }
                

                if (count($arrWhere) > 0) {
                    $skillSql.= "WHERE " . implode(' AND ',$arrWhere);
                }

                $db = Zend_Db_Table_Abstract::getDefaultAdapter();
                $result = $db->fetchCol($skillSql);
                foreach ($result as $skillId) {
                    $skillInfo = $this->getSkill($skillId);
                    array_push($arrSkills, $skillInfo);
                }
                return $arrSkills;
            }
        } catch (Exception $ex) {
            throw new Base_Model_Lib_App_Core_Qualification_Exception($ex);
        }
    }


} 