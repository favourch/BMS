<?php

class Admin_LoginController extends  Base_Model_Lib_Base_Controller_System {

    public function init() {
        parent::init();
    }

    /**
     * The default action - show the home page
     */
    public function indexAction() {
        try {
            $this->_helper->layout->setLayout ( 'login_layout' );
            $pageHeading = "Login";
            $this->view->page_heading = $pageHeading;
            $this->view->data_page = "login";


            if ($this->_request->isPost()) {

                $userService = new Base_Model_Lib_App_Core_User_Service_User();
                $userEntity = new Base_Model_Lib_App_Core_User_Entity_User();
                $userEntity->setUserName($this->_request->getParam('txtUsername'));
                $userEntity->setUserPassword($this->_request->getParam('txtPassword'));
                $userService->user = $userEntity;
                $loggedInUser = $userService->doLogin();
                if (is_null($loggedInUser)) {
                    $this->_redirect('/admin/login/?error=invalid-username-or-password');
                } else {
                    
                    // add the login history.....
                    $userLoginHistoryService = new Base_Model_Lib_App_Core_User_Service_UserLoginHistory();
                    $userLoginHistoryEntity = new Base_Model_Lib_App_Core_User_Entity_UserLoginHistory();
                    $userLoginHistoryEntity->setLoginDate($this->getSystemDate());
                    $userLoginHistoryEntity->setLoginTime($this->getSystemTime());
                    $userLoginHistoryEntity->setLogoutTime(null);
                    $userLoginHistoryEntity->setTotalUsedTime(0);
                    $userLoginHistoryEntity->setUserId($loggedInUser->getId());
                    $ipAddress = $this->getRealIpAddr();
                    $userLoginHistoryEntity->setLoginFrom($ipAddress);
                    $userLoginHistoryService->userLoginHistory = $userLoginHistoryEntity;
                    $loginHistoryId = $userLoginHistoryService->addUserLoginHistory();
                    
                      // store the current user's details into the registry...
                    $userInfo = Zend_Registry::get('userInfo');
                    $userInfo->user = serialize($loggedInUser);
                    $userInfo->logedInTime = $this->getSystemDateTime();
                    $userInfo->loginHistoryId = $loginHistoryId;
                    $userInfo->loginFromIP = $ipAddress;
                    $userInfo->userType = 'admin';
                    Zend_Registry::set('userInfo', $userInfo);
                    // add the login details to the system logs....
                    $actionName = 'LOGIN';
                    $logMessage = $loggedInUser->getFullName()." has logged into the system from ".$this->getRealIpAddr();
                    $tableName = 'tbl_user';
                    $rowId = $loggedInUser->getId();
                    $this->addSystemLog($actionName, $logMessage, $tableName, $rowId);
                  
                    $this->_redirect('/admin/');
                }
            }
        } catch (Exception $ex) {
            throw new Exception('<ERROR>' . $ex->getMessage() . "\n");
        }
    }

    private function getRealIpAddr() {
        if (!empty($_SERVER['HTTP_CLIENT_IP'])) {   //check ip from share internet
            $ip = $_SERVER['HTTP_CLIENT_IP'];
        } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {   //to check ip is pass from proxy
            $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
        } else {
            $ip = $_SERVER['REMOTE_ADDR'];
        }
        return $ip;
    }
    
    
    
    
/**
     * The default action - show the home page
     */
    public function logoutAction() {
        try {
            $this->_helper->layout()->disableLayout();
            $pageHeading = "Login";
            $this->view->page_heading = $pageHeading;
            $this->view->data_page = "login";


            // store the current user's details into the registry...
                    $userInfo = Zend_Registry::get('userInfo');
                    $loggedInUser = unserialize($userInfo->user);
                    $loggedInTime = $userInfo->logedInTime;
                    $loginHistoryId = $userInfo->loginHistoryId;


                    // add the login details to the system logs....
                    $objLogEntity = new Base_Model_Lib_App_Core_System_Entity_Log();
                    $objLogService = new Base_Model_Lib_App_Core_System_Service_Log();
                    $objLogEntity->setAction('LOGIN');
                    $objLogEntity->setActionDate($this->getSystemDateTime());
                    $logMessage = $loggedInUser->getFullName()." user has log-out from the system from ".$this->getRealIpAddr();
                    $objLogEntity->setLogMessage($logMessage);
                    $objLogEntity->setRowId($loggedInUser->getId());
                    $objLogEntity->setTableName('tbl_user');
                    $objLogEntity->setUserDisplayName($loggedInUser->getDisplayName());
                    $objLogEntity->setUserId($loggedInUser->getId());
                    $objLogEntity->setUserType('admin');
                    $objLogService->log = $objLogEntity;
                    $objLogService->addLog();  
                    
                    // add the login history.....
                    $loginTime         	= $loggedInTime;
                    $logOutTime        	= $this->getSystemTime();
                    $difference 		= strtotime($loginTime) - strtotime($logOutTime);
                    $userLoginHistoryService = new Base_Model_Lib_App_Core_User_Service_UserLoginHistory();
                    $userLoginHistoryEntity = new Base_Model_Lib_App_Core_User_Entity_UserLoginHistory();
                    $userLoginHistoryEntity->setId($loginHistoryId);
                    $userLoginHistoryEntity->setLogoutTime($this->getSystemTime());
                    $userLoginHistoryEntity->setTotalUsedTime($difference);
                    $userLoginHistoryService->userLoginHistory = $userLoginHistoryEntity;
                    $userLoginHistoryService->upldateUserLoginHistory();
                    
                    
                    $userInfo = Zend_Registry::get('userInfo');
                    unset($userInfo->user);
                    unset($userInfo->logedInTime);
                    unset($userInfo->loginHistoryId);
                    unset($userInfo->userType);
                    unset($userInfo);
                    Zend_Registry::set('userInfo', $userInfo);
                    
                    $this->_redirect('/admin/login/');
            
            
        } catch (Exception $ex) {
            throw new Exception('<ERROR>' . $ex->getMessage() . "\n");
        }
    }


}
