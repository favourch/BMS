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
class Base_Model_Lib_App_Core_User_Service_UserLoginHistory extends Base_Model_Lib_Eav_Model_Service {

    //put your code here

    public $userLoginHistory;

    /*
     * Get a user user using id
     * @return      : Entity User User Object (Base_Model_Lib_App_Core_User_Entity_User)
     */

    public function getUserLoginHistory($id) {
        try {
            $objUserLoginHistory = new Base_Model_Lib_App_Core_User_Dao_UserLoginHistory();
            $userLoginHistory = $objUserLoginHistory->getUserLoginHistory($id);
            return $userLoginHistory;
        } catch (Exception $e) {
            throw new Base_Model_Lib_App_Core_User_Exception($e);
        }
    }

    /*
     * Add new user user
     * @return      : Integer ID / Null
     */

    public function addUserLoginHistory() {
        try {
            if (!($this->userLoginHistory instanceof Base_Model_Lib_App_Core_User_Entity_UserLoginHistory)) {
                throw new Base_Model_Lib_App_Core_User_Exception(" UserLoginHistory Entity not intialized");
            } else {
                $objUserLoginHistory = new Base_Model_Lib_App_Core_User_Dao_UserLoginHistory();
                $objUserLoginHistory->userLoginHistory = $this->userLoginHistory;
                return $objUserLoginHistory->addUserLoginHistory();
            }
        } catch (Exception $ex) {
            throw new Base_Model_Lib_App_Core_User_Exception($ex);
        }
    }

    /*
     * Update user user
     * @return      : Integer ID / Null
     */

    public function upldateUserLoginHistory() {
        try {
            if (!($this->userLoginHistory instanceof Base_Model_Lib_App_Core_User_Entity_UserLoginHistory)) {
                throw new Base_Model_Lib_App_Core_User_Exception(" UserLoginHistory Entity not intialized");
            } else {
                $objUserLoginHistory = new Base_Model_Lib_App_Core_User_Dao_UserLoginHistory();
                $objUserLoginHistory->userLoginHistory = $this->userLoginHistory;
                return $objUserLoginHistory->upldateUserLoginHistory();
            }
        } catch (Exception $ex) {
            throw new Base_Model_Lib_App_Core_User_Exception($ex);
        }
    }

}
