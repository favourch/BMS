<?php

/**
 * Description of Project
 *
 * @author Iyngaran Iyathurai <iyngaran55@gmail.com>
 */
class Base_Model_ObtorLib_App_Core_Pms_Dao_Project extends Zend_Db_Table_Abstract {

    //put your code here
    public $project;
    protected $_name = 'tbl_project';

    /*
     * Get a project using id
     * @return      : Entity Project Object (Base_Model_ObtorLib_App_Core_Pms_Entity_Project)
     */

    public function getProject($id) {
        try {
            $id = (int) $id;
            $row = $this->fetchRow('id = ' . $id);
            if ($row) {
                $projectRow = $row->toArray();
                $projectEntity = new Base_Model_ObtorLib_App_Core_Pms_Entity_Project();
                $projectEntity->setId($projectRow['id']);
                $projectEntity->setProjectName($projectRow['project_name']);
                $projectEntity->setStartDate($projectRow['start_date']);
                $projectEntity->setTargetendDate($projectRow['targetend_date']);
                $projectEntity->setActualendDate($projectRow['actualend_date']);
                $projectEntity->setTargetBudget($projectRow['target_budget']);
                $projectEntity->setProjectUrl($projectRow['project_url']);
                $projectEntity->setProjectStatus($projectRow['project_status']);
                $projectEntity->setProjectPriority($projectRow['project_priority']);
                $projectEntity->setProjectType($projectRow['project_type']);
                $projectEntity->setProgress($projectRow['progress']);
                $projectEntity->setLinkToAccountsContacts($projectRow['link_to_accounts_contacts']);
                $projectEntity->setProjectNumber($projectRow['project_number']);
                return $projectEntity;
            } else {
                return null;
            }
        } catch (Exception $ex) {
            throw new Base_Model_ObtorLib_App_Core_Pms_Exception($ex);
        }
    }

    /*
     * Add new c
     * @return      : Integer ID / Null
     */

    public function addProject() {
        try {
            if (!($this->project instanceof Base_Model_ObtorLib_App_Core_Pms_Entity_Project)) {
                throw new Base_Model_ObtorLib_App_Core_Pms_Exception(" Project Entity not intialized");
            } else {
                $data = array(
                    'project_name' => $this->project->getProjectName(),
                    'start_date' => $this->project->getStartDate(),
                    'targetend_date' => $this->project->getTargetendDate(),
                    'actualend_date' => $this->project->getActualendDate(),
                    'target_budget' => $this->project->getTargetBudget(),
                    'project_url' => $this->project->getProjectUrl(),
                    'project_status' => $this->project->getProjectStatus(),
                    'project_priority' => $this->project->getProjectPriority(),
                    'project_type' => $this->project->getProjectType(),
                    'progress' => $this->project->getProgress(),
                    'link_to_accounts_contacts' => $this->project->getLinkToAccountsContacts(),
                    'project_number' => $this->project->getProjectNumber());
                $last_inserted_id = $this->insert($data);
                return $last_inserted_id;
            }
        } catch (Exception $ex) {
            throw new Base_Model_ObtorLib_App_Core_Pms_Exception($ex);
        }
    }

    /*
     * Update project
     * @return      : Boolean true/false
     */

    public function updateProject() {
        try {
            if (!($this->project instanceof Base_Model_ObtorLib_App_Core_Pms_Entity_Project)) {
                throw new Base_Model_ObtorLib_App_Core_Pms_Exception(" Project Entity not intialized");
            } else {
                $data = array(
                    'project_name' => $this->project->getProjectName(),
                    'start_date' => $this->project->getStartDate(),
                    'targetend_date' => $this->project->getTargetendDate(),
                    'actualend_date' => $this->project->getActualendDate(),
                    'target_budget' => $this->project->getTargetBudget(),
                    'project_url' => $this->project->getProjectUrl(),
                    'project_status' => $this->project->getProjectStatus(),
                    'project_priority' => $this->project->getProjectPriority(),
                    'project_type' => $this->project->getProjectType(),
                    'progress' => $this->project->getProgress(),
                    'link_to_accounts_contacts' => $this->project->getLinkToAccountsContacts(),
                    'project_number' => $this->project->getProjectNumber());
                return $this->update($data, 'id = ' . (int) $this->project->getId());
            }
        } catch (Exception $ex) {
            throw new Base_Model_ObtorLib_App_Core_Pms_Exception($ex);
        }
    }

    /*
     * Delete project
     * @return      : Integer ID / Null
     */

    public function deleteProject() {
        try {
            if (!($this->project instanceof Base_Model_ObtorLib_App_Core_Pms_Entity_Project)) {
                throw new Base_Model_ObtorLib_App_Core_Pms_Exception(" Project Entity not intialized");
            } else {
                return $this->delete('id =' . (int) $this->project->getId());
            }
        } catch (Exception $ex) {
            throw new Base_Model_ObtorLib_App_Core_Pms_Exception($ex);
        }
    }

    /*
     * Search user projects....
     * @return : Array of projects Entities...
     */

    public function search($limit=NULL) {
        try {
            if (!($this->project instanceof Base_Model_ObtorLib_App_Core_Pms_Entity_Project)) {
                throw new Base_Model_ObtorLib_App_Core_Pms_Exception(" project Entity not initialized");
            } else {
                $arrWhere = array();
                $arrProjects = array();

                $project_number =  $this->project->getProjectNumber();
                $project_name =  $this->project->getProjectName();
                $accounts_contacts =  $this->project->getLinkToAccountsContacts();
                $project_status =  $this->project->getProjectStatus();
                $project_priority =  $this->project->getProjectPriority();
                $project_type =  $this->project->getProjectType();
            
            
                $projectSql = "SELECT id FROM tbl_project ";
                if ($project_name) {
                    array_push($arrWhere, "project_name LIKE '" . '%'.$project_name.'%' . "'");
                }
                
                if ($project_number) {
                    array_push($arrWhere, "project_number = '" . $project_number . "'");
                }
                
                if ($accounts_contacts) {
                    array_push($arrWhere, "link_to_accounts_contacts = '" . $accounts_contacts . "'");
                }
                
                if ($project_status) {
                    array_push($arrWhere, "project_status = '" . $project_status . "'");
                }
                
                if ($project_priority) {
                    array_push($arrWhere, "project_priority = '" . $project_priority . "'");
                }
                
                if ($project_type) {
                    array_push($arrWhere, "project_type = '" . $project_type . "'");
                }
                
                

                if (count($arrWhere) > 0) {
                    $projectSql.= "WHERE " . implode(' AND ',$arrWhere);
                }
                
                $projectSql = $projectSql." ORDER BY id DESC";
                if(!is_null($limit)){
                    $projectSql = $projectSql.$limit;
                }

                $db = Zend_Db_Table_Abstract::getDefaultAdapter();
                $result = $db->fetchCol($projectSql);
                foreach ($result as $projectId) {
                    $projectInfo = $this->getProject($projectId);
                    array_push($arrProjects, $projectInfo);
                }
                return $arrProjects;
            }
        } catch (Exception $ex) {
            throw new Base_Model_ObtorLib_App_Core_Pms_Exception($ex);
        }
    }
    
    
    
    /*
     * count projects....
     * @return : Array of projects Entities...
     */

    public function searchCount() {
        try {
            if (!($this->project instanceof Base_Model_ObtorLib_App_Core_Pms_Entity_Project)) {
                throw new Base_Model_ObtorLib_App_Core_Pms_Exception(" project Entity not initialized");
            } else {
                $arrWhere = array();
                $total_number = 0;
                
                $projectName = $this->project->getProjectName();
                $projectSql = "SELECT count(id) as tot FROM tbl_project ";
                if ($projectName) {
                    array_push($arrWhere, "project_name = '" . $projectName . "'");
                }
                
                

                if (count($arrWhere) > 0) {
                    $projectSql.= "WHERE " . implode(' AND ',$arrWhere);
                }

                $db = Zend_Db_Table_Abstract::getDefaultAdapter();
                $result 	= $db->fetchRow($projectSql);
                $total_number = $result['tot']; 
                return $total_number;
            }
        } catch (Exception $ex) {
            throw new Base_Model_ObtorLib_App_Core_Pms_Exception($ex);
        }
    }
    
    
      /*
     * Delete project
     * @return      : Integer ID / Null
     */

    public function getStaffsProject($staffId) {
        try {
            $arrProjects = array();
            $projectSql = "SELECT DISTINCT `project_id` FROM `tbl_project_task` WHERE `assigned_to` = '".$staffId."'";
            $db = Zend_Db_Table_Abstract::getDefaultAdapter();
            $result = $db->fetchCol($projectSql);
            foreach ($result as $projectId) {
                 $projectInfo = $this->getProject($projectId);
                 array_push($arrProjects, $projectInfo);
            }
            return $arrProjects;
            
        } catch (Exception $ex) {
            throw new Base_Model_ObtorLib_App_Core_Pms_Exception($ex);
        }
    }

}
