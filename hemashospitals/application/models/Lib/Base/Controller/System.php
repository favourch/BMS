<?php

/**
 * @namespace       : Base
 * @package         : Model
 * @subpackage 	    : Lib.Base.Controller
 * @name 	    : System
 * @author 	    : Iyngaran Iyathurai
 * 	              Software eng - Bcas R&D
 * 	              E-Mail - Iyngaran55@yahoo.com, Iyngaran@bcas.lk
 *
 * @copyright Copyright (c) 2009 - 2010 BCAS R&D . (http://www.lab.bcasrd.com)
 *
 * Description : The base controller for the application
 *
 */
class Base_Model_Lib_Base_Controller_System extends Zend_Controller_Action {

    public function init() {
        parent::init();
    }

    public function getSystemDate() {
        $myDate = "";
        try {
            $myDate = Zend_Date::now();
            $myDate = $myDate->toString("YYYY-MM-dd");
        } catch (Exception $ex) {
            print ("Error - " . $ex->getMessage());
        }
        return $myDate;
    }

    public function getSystemTime() {
        $myTime = "";
        try {
            $myTime = Zend_Date::now();
            $myTime = $myTime->toString("HH:mm:ss");
        } catch (Exception $ex) {
            print ("Error - " . $ex->getMessage());
        }
        return $myTime;
    }

    public function getSystemDateTime() {
        $myDate = "";
        try {
            $myDate = Zend_Date::now();
            $myDate = $myDate->toString("YYYY-MM-dd HH:mm:ss");
        } catch (Exception $ex) {
            print ("Error - " . $ex->getMessage());
        }
        return $myDate;
    }

    // function is to get the current administrator user id
    public function getUserId() {
        $userId = "";
        try {
            $userId = $this->getUserInfo()->getId();
            return $userId;
        } catch (Exception $ex) {
            print ("Error - " . $ex->getMessage());
        }
        return $userId;
    }
    
    
    // function is to get the current user information
    public function getUserInfo() {
        $userInfo = "";
        try {
            $userInfo = Zend_Registry::get('userInfo');
            return unserialize($userInfo->user);
        } catch (Exception $ex) {
            print ("Error - " . $ex->getMessage());
        }
    }
    
    
    // function is to get the current user information
    public function getUserType() {
        $userInfo = "";
        try {
            $userInfo = Zend_Registry::get('userInfo');
            return $userInfo->userType;
        } catch (Exception $ex) {
            print ("Error - " . $ex->getMessage());
        }
    }

    // function to generate the file name...
    public function generateSystemFileName($filename) {
        $rndNumber = rand();
        $fileExtension = end(explode(".", $filename));
        $currentTime = strtotime($this->getSystemDateTime());
        $systemFileName = $rndNumber . $currentTime . "." . $fileExtension;
        return $systemFileName;
    }

    // the function to add a system log information....
    public function addSystemLog($actionName,$message,$tableName,$rowId) {
        try {
                    // add the details to the system logs....
                    $userInfo = $this->getUserInfo();
                    $userType = $this->getUserType();
                    $userId = $userInfo->getId();
                    $userDisplayName = $userInfo->getDisplayName();
                    
                    $userInfo = Zend_Registry::get('userInfo');
                    $ipAddress = $userInfo->loginFromIP;
                    
                    $objLogEntity = new Base_Model_Lib_App_Core_System_Entity_Log();
                    $objLogService = new Base_Model_Lib_App_Core_System_Service_Log();
                    $objLogEntity->setAction($actionName); // add, edit, delete and etc...
                    $objLogEntity->setActionDate($this->getSystemDateTime());
                    $logMessage = $message;
                    $objLogEntity->setLogMessage($logMessage);
                    $objLogEntity->setRowId($rowId);
                    $objLogEntity->setTableName($tableName);
                    $objLogEntity->setUserDisplayName($userDisplayName);
                    $objLogEntity->setUserId($userId);
                    $objLogEntity->setIpAddress($ipAddress);
                    $objLogEntity->setUserType($userType);
                    $objLogService->log = $objLogEntity;
                    $objLogService->addLog();  
        } catch (Exception $ex) {
            print ("Error - " . $ex->getMessage());
        }
    }

}
