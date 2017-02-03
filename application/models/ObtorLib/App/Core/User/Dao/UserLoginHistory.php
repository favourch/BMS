<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of UserLoginHistory
 *
 * @author anushiya
 */
class Base_Model_ObtorLib_App_Core_User_Dao_UserLoginHistory extends Zend_Db_Table_Abstract {

    //put your code here
    protected $_name = 'tbl_user_login_history'; // the table name 
    protected $_primary = 'id'; // the primary key
    public $userLoginHistory;

    /*
     * @name        : getUserLoginHistory
     * @Description : The function is to get a userLoginHistory information
     * 				  from the database.
     * @param       : $id (User Id)
     * @return      : Entity UserLoginHistory Object (Base_Model_ObtorLib_App_Core_User_Dao_UserLoginHistory)
     */

    public function getUserLoginHistory($id) {
        try {
            $id = (int) $id;
            $row = $this->fetchRow('id = ' . $id);
            if ($row) {
                $userLoginHistoryinInfo = $row->toArray();
                $objUserLog = new Base_Model_ObtorLib_App_Core_User_Entity_UserLoginHistory();
                $objUserLog->setId($userLoginHistoryinInfo['id']);
                $objUserLog->setLoginDate($userLoginHistoryinInfo['login_date']);
                $objUserLog->setLoginTime($userLoginHistoryinInfo['login_time']);
                $objUserLog->setLogoutTime($userLoginHistoryinInfo['logout_time']);
                $objUserLog->setTotalUsedTime($userLoginHistoryinInfo['total_used_time']);
                $objUserLog->setUserId($userLoginHistoryinInfo['tbl_user_id']);
                $objUserLog->setLoginFrom($userLoginHistoryinInfo['login_from']);
                return $objUserLog;
            } else {
                return null;
            }
        } catch (Exception $ex) {
            throw new Base_Model_ObtorLib_App_Core_User_Exception($ex);
        }
    }

    /*
     * Add new user log history...
     * @return      : Integer ID / Null
     */

    public function addUserLoginHistory() {
        try {
            if (!($this->userLoginHistory instanceof Base_Model_ObtorLib_App_Core_User_Entity_UserLoginHistory)) {
                throw new Base_Model_ObtorLib_App_Core_User_Exception(" UserLoginHistory Entity not initialized");
            } else {
                $data = array('login_date' => $this->userLoginHistory->getLoginDate(),
                    'login_time' => $this->userLoginHistory->getLoginTime(),
                    'logout_time' => $this->userLoginHistory->getLogoutTime(),
                    'total_used_time' => $this->userLoginHistory->getTotalUsedTime(),
                    'tbl_user_id' => $this->userLoginHistory->getUserId(),
                    'login_from' => $this->userLoginHistory->getLoginFrom());
                $last_inserted_id = $this->insert($data);
                return $last_inserted_id;
            }
        } catch (Exception $ex) {
            throw new Base_Model_ObtorLib_App_Core_User_Exception($ex);
        }
    }

    public function upldateUserLoginHistory() {
        try {
            if (!($this->userLoginHistory instanceof Base_Model_ObtorLib_App_Core_User_Entity_UserLoginHistory)) {
                throw new Base_Model_ObtorLib_App_Core_User_Exception(" UserLoginHistory Entity not initialized");
            } else {
                $data = array(
                    'logout_time' => $this->userLoginHistory->getLogoutTime(),
                    'total_used_time' => $this->userLoginHistory->getTotalUsedTime()
                );
                return $this->update($data, 'id = ' . (int) $this->userLoginHistory->getId());
            }
        } catch (Exception $ex) {
            throw new Base_Model_ObtorLib_App_Core_User_Exception($ex);
        }
    }
    
    
    /*
     * Search user assets....
     * @return : Array of Assets Entities...
     */

    public function search($limit) {
        try {
           if (!($this->userLoginHistory instanceof Base_Model_ObtorLib_App_Core_User_Entity_UserLoginHistory)) {
                throw new Base_Model_ObtorLib_App_Core_User_Exception(" UserLoginHistory Entity not initialized");
            } else {
                $arrWhere = array();
                $arrUserLoginHistory = array();
                
                
                $userLoginHistorySQL = "SELECT id FROM tbl_user_login_history ";
                
                $userId = $this->userLoginHistory->getUserId();
                if ($userId) {
                    array_push($arrWhere, "tbl_user_id = '" . $userId . "'");
                }

                if (count($arrWhere) > 0) {
                     $userLoginHistorySQL.= "WHERE " . implode(' AND ',$arrWhere);
                }

                $db = Zend_Db_Table_Abstract::getDefaultAdapter();
                $userLoginHistorySQL = $userLoginHistorySQL.$limit;
                $result = $db->fetchCol($userLoginHistorySQL);
                foreach ($result as $historyId) {
                    $userLoginHistoryInfo = $this->getUserLoginHistory($historyId);
                    array_push($arrUserLoginHistory, $userLoginHistoryInfo);
                }
                return $arrUserLoginHistory;
            }
        } catch (Exception $ex) {
            throw new Base_Model_ObtorLib_App_Core_Asset_Exception($ex);
        }
    }
    
    
    
    /*
     * Search user assets....
     * @return : Array of Assets Entities...
     */

    public function searchCount() {
        try {
           if (!($this->userLoginHistory instanceof Base_Model_ObtorLib_App_Core_User_Entity_UserLoginHistory)) {
                throw new Base_Model_ObtorLib_App_Core_User_Exception(" UserLoginHistory Entity not initialized");
            } else {
                $total_number = 0;
                $arrWhere = array();
                $arrUserLoginHistory = array();
                
                
                $userLoginHistorySQL = "SELECT count(id) As tot FROM tbl_user_login_history ";
                
                $userId = $this->userLoginHistory->getUserId();
                if ($userId) {
                    array_push($arrWhere, "tbl_user_id = '" . $userId . "'");
                }

                if (count($arrWhere) > 0) {
                     $userLoginHistorySQL.= "WHERE " . implode(' AND ',$arrWhere);
                }

                $db = Zend_Db_Table_Abstract::getDefaultAdapter();
                $result 	= $db->fetchRow($userLoginHistorySQL);
                $total_number = $result['tot']; 
                return $total_number;
            }
        } catch (Exception $ex) {
            throw new Base_Model_ObtorLib_App_Core_Asset_Exception($ex);
        }
    }
    

}
