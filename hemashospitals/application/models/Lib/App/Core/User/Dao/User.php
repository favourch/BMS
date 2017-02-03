<?php

/**
 * Description of User
 *
 * @author Iyngaran Iyathurai <iyngaran55@gmail.com>
 */
class Base_Model_Lib_App_Core_User_Dao_User extends Zend_Db_Table_Abstract {

    //put your code here
    public $user;
    protected $_name = 'tbl_user';

    /*
     * Get a user user using id
     * @return      : Entity User Object (Base_Model_Lib_App_Core_User_Entity_User)
     */

    public function getUser($id) {
        try {
            $id = (int) $id;
            $row = $this->fetchRow('id = ' . $id);
            if ($row) {
                $users = $row->toArray();
                $userEntity = new Base_Model_Lib_App_Core_User_Entity_User();
                $userRoleService = new Base_Model_Lib_App_Core_User_Service_Role();
                $userEntity->setId($users['id']);
                $userEntity->setUserRole($userRoleService->getRole($users['user_role_id']));
                $userEntity->setEmpNumber($users['emp_number']);
                $userEntity->setFullName($users['full_name']);
                $userEntity->setDisplayName($users['display_name']);
                $userEntity->setCountry($users['country_id']);
                $userEntity->setRegion($users['region_id']);
                $userEntity->setBranch($users['branch_id']);
                $userEntity->setDepartment($users['department_id']);
                $userEntity->setEmailAddress($users['email_address']);
                $userEntity->setUserName($users['user_name']);
                $userEntity->setUserPassword($users['user_password']);
                $userEntity->setIsDeleted($users['is_deleted']);
                $userEntity->setStatusIs($users['status_is']);
                $userEntity->setDateCreated($users['date_created']);
                $userEntity->setDateModified($users['date_modified']);
                $userEntity->setModifiedUser($users['modified_user_id']);
                $userEntity->setCreatedBy($users['created_by']);
                $userEntity->setLastLoginDate($users['last_login_date']);
                $userEntity->setLastLoginFrom($users['last_login_from']);
                $userEntity->setTotalLogisNumber($users['total_logis_number']);
                $userEntity->setDataPrivilage($users['user_data_privilage']);
                $userEntity->setAllowedCountries($users['allowed_countries']);
                $userEntity->setAllowedRegions($users['allowed_regions']);
                $userEntity->setAllowedBranches($users['allowed_branches']);
                $userEntity->setAllowedDepartments($users['allowed_departments']);
                $userEntity->setDefaultCurrency($users['default_currency_id']);
                return $userEntity;
            } else {
                return null;
            }
        } catch (Exception $ex) {
            throw new Base_Model_Lib_App_Core_User_Exception($ex);
        }
    }

    /*
     * Add new user user
     * @return      : Integer ID / Null
     */

    public function addUser() {
        try {
            if (!($this->user instanceof Base_Model_Lib_App_Core_User_Entity_User)) {
                throw new Base_Model_Lib_App_Core_User_Exception(" User Entity not initialized");
            } else {
                $data = array(
                    'user_role_id' => $this->user->getUserRole(),
                    'emp_number' => $this->user->getEmpNumber(),
                    'full_name' => $this->user->getFullName(),
                    'display_name' => $this->user->getDisplayName(),
                    'country_id' => $this->user->getCountry(),
                    'region_id' => $this->user->getRegion(),
                    'branch_id' => $this->user->getBranch(),
                    'department_id' => $this->user->getDepartment(),
                    'email_address' => $this->user->getEmailAddress(),
                    'user_name' => $this->user->getUserName(),
                    'user_password' => $this->user->getUserPassword(),
                    'is_deleted' => $this->user->getIsDeleted(),
                    'status_is' => $this->user->getStatusIs(),
                    'date_created' => $this->user->getDateCreated(),
                    'date_modified' => $this->user->getDateModified(),
                    'modified_user_id' => $this->user->getModifiedUser(),
                    'created_by' => $this->user->getCreatedBy(),
                    'last_login_date' => $this->user->getLastLoginDate(),
                    'last_login_from' => $this->user->getLastLoginFrom(),
                    'total_logis_number' => $this->user->getTotalLogisNumber(),
                    'user_data_privilage' => $this->user->getDataPrivilage(),
                    'allowed_countries' => $this->user->getAllowedCountries(),
                    'allowed_regions' => $this->user->getAllowedRegions(),
                    'allowed_branches' => $this->user->getAllowedBranches(),
                    'allowed_departments' => $this->user->getAllowedDepartments(),
                    'default_currency_id' => $this->user->getDefaultCurrency());
                $last_inserted_id = $this->insert($data);
                return $last_inserted_id;
            }
        } catch (Exception $ex) {
            throw new Base_Model_Lib_App_Core_User_Exception($ex);
        }
    }

    /*
     * Update user user
     * @return      : Boolean true/false
     */

    public function updateUser() {
        try {
            if (!($this->user instanceof Base_Model_Lib_App_Core_User_Entity_User)) {
                throw new Base_Model_Lib_App_Core_User_Exception(" User Entity not initialized");
            } else {
                $data = array(
                    'user_role_id' => $this->user->getUserRole(),
                    'emp_number' => $this->user->getEmpNumber(),
                    'full_name' => $this->user->getFullName(),
                    'display_name' => $this->user->getDisplayName(),
                    'country_id' => $this->user->getCountry(),
                    'region_id' => $this->user->getRegion(),
                    'branch_id' => $this->user->getBranch(),
                    'department_id' => $this->user->getDepartment(),
                    'email_address' => $this->user->getEmailAddress(),
                    'user_name' => $this->user->getUserName(),
                    'status_is' => $this->user->getStatusIs(),
                    'date_modified' => $this->user->getDateModified(),
                    'modified_user_id' => $this->user->getModifiedUser(),
                    'user_data_privilage' => $this->user->getDataPrivilage(),
                    'allowed_countries' => $this->user->getAllowedCountries(),
                    'allowed_regions' => $this->user->getAllowedRegions(),
                    'allowed_branches' => $this->user->getAllowedBranches(),
                    'allowed_departments' => $this->user->getAllowedDepartments(),
                    'default_currency_id' => $this->user->getDefaultCurrency());
                
                return $this->update($data, 'id = ' . (int) $this->user->getId());
            }
        } catch (Exception $ex) {
            throw new Base_Model_Lib_App_Core_User_Exception($ex);
        }
    }

    /*
     * Delete user user
     * @return      : Integer ID / Null
     */

    public function deleteUser() {
        try {
            if (!($this->user instanceof Base_Model_Lib_App_Core_User_Entity_User)) {
                throw new Base_Model_Lib_App_Core_User_Exception(" User Entity not initialized");
            } else {
                $data = array(
                    'date_modified' => $this->user->getDateModified(),
                    'modified_user_id' => $this->user->getModifiedUser(),
                    'is_deleted' => $this->user->getIsDeleted());

                return $this->update($data, 'id = ' . (int) $this->user->getId());
            }
        } catch (Exception $ex) {
            throw new Base_Model_Lib_App_Core_User_Exception($ex);
        }
    }

    /*
     * Search user users....
     * @return : Array of Users Entities...
     */

    public function search() {
        try {
            if (!($this->user instanceof Base_Model_Lib_App_Core_User_Entity_User)) {
                throw new Base_Model_Lib_App_Core_User_Exception(" User Entity not initialized");
            } else {
                $arrWhere = array();
                $arrUsers = array();
                $userEmail = $this->user->getEmailAddress();
                $userSql = "SELECT id FROM tbl_user ";
                array_push($arrWhere, "is_deleted = 0");
                if ($userEmail) {
                    array_push($arrWhere, "email_address = '" . $userEmail . "'");
                }

                if (count($arrWhere) > 0) {
                    $userSql.= "WHERE " . implode($arrWhere);
                }

                $db = Zend_Db_Table_Abstract::getDefaultAdapter();
                $result = $db->fetchCol($userSql);
                foreach ($result as $userId) {
                    $userInfo = $this->getUser($userId);
                    array_push($arrUsers, $userInfo);
                }
                return $arrUsers;
            }
        } catch (Exception $ex) {
            throw new Base_Model_Lib_App_Core_User_Exception($ex);
        }
    }
    
    
    
    public function doLogin() {
        try {
            if (!($this->user instanceof Base_Model_Lib_App_Core_User_Entity_User)) {
                throw new Base_Model_Lib_App_Core_User_Exception(" User Entity not initialized");
            } else {

                $userName = $this->user->getUserName();
                $userPassword = $this->user->getUserPassword();
                
                $userSql = "SELECT id FROM tbl_user WHERE user_name = '".$userName."' AND user_password = '".$userPassword."' AND status_is = '1' AND is_deleted = '0'";
                
                $db = Zend_Db_Table_Abstract::getDefaultAdapter();
                $result = $db->fetchCol($userSql);
                if($result){
                    foreach ($result as $userId) {
                        $userInfo = $this->getUser($userId);
                        return $userInfo;
                    }
                }
                return null;
       
            }
        } catch (Exception $ex) {
            throw new Base_Model_Lib_App_Core_User_Exception($ex);
        }
    }


}
