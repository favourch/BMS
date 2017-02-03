<?php

/**
 * @namespace       : Base
 * @package         : Model
 * @subpackage 	    : ObtorLib.Base.Controller
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
class Base_Model_ObtorLib_Base_Controller_System extends Zend_Controller_Action {

    public function init() {
        parent::init();
        $controllerName = $this->getRequest()->getControllerName();
        $actionName = $this->getRequest()->getActionName();
        $this->view->controllerName = $controllerName;
        $this->view->actionName = $actionName;
        $this->view->latestNotifications = $this->getNotifications();
        $this->view->totalUnreadNotification = $this->countUnreadNotification();
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

    // this week start date....
    public function getThisWeekStartDate() {
        $week_number = date("W");
        $year = date("Y");
        $wk_ts = strtotime('+' . $week_number . ' weeks', strtotime($year . '0101'));
        $mon_ts = strtotime('-' . date('w', $wk_ts) + $first . ' days', $wk_ts);
        return date('Y-m-d', $mon_ts);
    }

    // this week end date....
    public function getThisWeekEndDate() {
        $sStartDate = $this->getThisWeekStartDate();
        $sEndDate = date('Y-m-d', strtotime('+6 days', strtotime($sStartDate)));
        return $sEndDate;
    }

    // next week start date
    public function getNextWeekStartDate() {
        $week_number = date("W") + 1;
        $year = date("Y");
        $wk_ts = strtotime('+' . $week_number . ' weeks', strtotime($year . '0101'));
        $mon_ts = strtotime('-' . date('w', $wk_ts) + $first . ' days', $wk_ts);
        return date('Y-m-d', $mon_ts);
    }

    // next week end date
    public function getNextWeekEndDate() {
        $sStartDate = $this->getNextWeekStartDate();
        $sEndDate = date('Y-m-d', strtotime('+6 days', strtotime($sStartDate)));
        return $sEndDate;
    }

    // last week start date
    public function getLastWeekStartDate() {
        $week_number = date("W") - 1;
        $year = date("Y");
        $wk_ts = strtotime('+' . $week_number . ' weeks', strtotime($year . '0101'));
        $mon_ts = strtotime('-' . date('w', $wk_ts) + $first . ' days', $wk_ts);
        return date('Y-m-d', $mon_ts);
    }

    // last week end date
    public function getLastWeekEndDate() {
        $sStartDate = $this->getLastWeekStartDate();
        $sEndDate = date('Y-m-d', strtotime('+6 days', strtotime($sStartDate)));
        return $sEndDate;
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
    public function getStaffUserInfo() {
        $staffUserInfo = "";
        try {
            $staffUserInfo = Zend_Registry::get('staffUserInfo');
            return unserialize($staffUserInfo->user);
        } catch (Exception $ex) {
            print ("Error - " . $ex->getMessage());
        }
    }

    // function is to get the current user information
    public function getStaffUserId() {
        $userId = "";
        try {
            $userId = $this->getStaffUserInfo()->getId();
            return $userId;
        } catch (Exception $ex) {
            print ("Error - " . $ex->getMessage());
        }
        return $userId;
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
    public function addSystemLog($actionName, $message, $tableName, $rowId) {
        try {
            // add the details to the system logs....
            $userInfo = $this->getUserInfo();
            $userType = $this->getUserType();
            $userId = $userInfo->getId();
            $userDisplayName = $userInfo->getDisplayName();

            $userInfo = Zend_Registry::get('userInfo');
            $ipAddress = $userInfo->loginFromIP;

            $objLogEntity = new Base_Model_ObtorLib_App_Core_System_Entity_Log();
            $objLogService = new Base_Model_ObtorLib_App_Core_System_Service_Log();
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

    public function getLanguages() {
        try {

            $arrLanguages = array(
                'Mandarin' => 'Mandarin',
                'Spanish' => 'Spanish',
                'English' => 'English',
                'Hindi' => 'Hindi'
            );
            return $arrLanguages;
        } catch (Exception $ex) {
            print ("Error - " . $ex->getMessage());
        }
    }

    public function getLicense() {
        try {

            $arrLicense = array(
                'Vehicle-License' => 'Vehicle-License',
                'Pilot-License' => 'Pilot-License'
            );
            return $arrLicense;
        } catch (Exception $ex) {
            print ("Error - " . $ex->getMessage());
        }
    }

    public function getWeekDays() {
        try {

            $arrWorkingDay = array('Sunday' => 'Sunday', 'Monday' => 'Monday', 'Tuesday' => 'Tuesday', 'Wednesday' => 'Wednesday', 'Thursday' => 'Thursday', 'Friday' => 'Friday', 'Saturday' => 'Saturday');
            return $arrWorkingDay;
        } catch (Exception $ex) {
            print ("Error - " . $ex->getMessage());
        }
    }

    public function getMonths() {
        try {

            $arrMonths = array('Sunday' => 'Sunday', 'Monday' => 'Monday', 'Tuesday' => 'Tuesday', 'Wednesday' => 'Wednesday', 'Thursday' => 'Thursday', 'Friday' => 'Friday', 'Saturday' => 'Saturday');
            return $arrMonths;
        } catch (Exception $ex) {
            print ("Error - " . $ex->getMessage());
        }
    }

    public function getPmsPriorityList() {
        try {
            $arrTaskPriorityList = array(
                'none' => 'none',
                'low' => 'low',
                'normal' => 'normal',
                'high' => 'high',
                'urgent' => 'urgent',
                'immediate' => 'immediate');
            return $arrTaskPriorityList;
        } catch (Exception $ex) {
            print ("Error - " . $ex->getMessage());
        }
    }

    public function getTaskTypeList() {
        try {
            $arrTaskTypeList = array(
                'feature' => 'feature',
                'trivial' => 'trivial',
                'text' => 'text',
                'tweak' => 'tweak',
                'minor' => 'minor',
                'major' => 'major',
                'crash' => 'crash',
                'block' => 'block');
            return $arrTaskTypeList;
        } catch (Exception $ex) {
            print ("Error - " . $ex->getMessage());
        }
    }

    public function getPmsStatusList() {
        try {
            $arrTaskTypeList = array(
                'beta-check' => 'beta-check',
                'sprint-to-do' => 'sprint-to-do',
                'sprint-in-progress' => 'sprint-in-progress');
            return $arrTaskTypeList;
        } catch (Exception $ex) {
            print ("Error - " . $ex->getMessage());
        }
    }

    public function getProjectTypeList() {
        try {
            $arrTaskTypeList = array(
                'feature' => 'feature',
                'trivial' => 'trivial',
                'text' => 'text',
                'tweak' => 'tweak',
                'minor' => 'minor',
                'major' => 'major',
                'crash' => 'crash',
                'block' => 'block');
            return $arrTaskTypeList;
        } catch (Exception $ex) {
            print ("Error - " . $ex->getMessage());
        }
    }

    public function getInquireMediaList() {
        try {
            $arrInquireMediaList = array(
                'phone-call' => 'phone-call',
                'face-to-face' => 'face-to-face',
                'web' => 'web');
            return $arrInquireMediaList;
        } catch (Exception $ex) {
            print ("Error - " . $ex->getMessage());
        }
    }

    public function getInquireStatusList() {
        try {
            $arrInquireStatusList = array(
                'in-progress' => 'in-progress',
                'completed' => 'completed');
            return $arrInquireStatusList;
        } catch (Exception $ex) {
            print ("Error - " . $ex->getMessage());
        }
    }

    public function getRealIpAddr() {
        if (!empty($_SERVER['HTTP_CLIENT_IP'])) {   //check ip from share internet
            $ip = $_SERVER['HTTP_CLIENT_IP'];
        } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {   //to check ip is pass from proxy
            $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
        } else {
            $ip = $_SERVER['REMOTE_ADDR'];
        }
        return $ip;
    }

    public function getNotifications() {
        try {
            $relId = 6;
            $relType = 'Admin';
            $objNotificationEntity = new Base_Model_ObtorLib_App_Core_System_Entity_Notification();
            $objNotificationService = new Base_Model_ObtorLib_App_Core_System_Service_Notification();
            $objNotificationEntity->setRelId($relId);
            $objNotificationEntity->setRelType($relType);
            $objNotificationService->notification = $objNotificationEntity;
            $limit = " LIMIT 0,5";
            $notifications = $objNotificationService->search($limit);
            return $notifications;
        } catch (Exception $ex) {
            print ("Error - " . $ex->getMessage());
        }
    }

    public function countUnreadNotification() {
        try {
            $totalNotifications = 0;
            $relId = 6;
            $relType = 'Admin';
            $objNotificationEntity = new Base_Model_ObtorLib_App_Core_System_Entity_Notification();
            $objNotificationService = new Base_Model_ObtorLib_App_Core_System_Service_Notification();
            $objNotificationEntity->setRelId($relId);
            $objNotificationEntity->setRelType($relType);
            $objNotificationEntity->setCurrentStatus('Unread');
            $objNotificationService->notification = $objNotificationEntity;
            $totalNotifications = $objNotificationService->searchCount();
            return $totalNotifications;
        } catch (Exception $ex) {
            print ("Error - " . $ex->getMessage());
        }
    }

    public function makeStartDate($strdate) {
        try {

            $frmDate = date("Y-m-d H:i:s", strtotime($strdate));
            return $frmDate;
        } catch (Exception $e) {
            print ("Error - " . $ex->getMessage());
        }
    }

    public function makeEndDate($endDate) {
        try {

            $endDate = date("Y-m-d 23:59:59", strtotime($endDate));
            return $endDate;
        } catch (Exception $e) {
            print ("Error - " . $ex->getMessage());
        }
    }

    public function getDatesBetweenTwoDates($fromDate, $toDate) {
        $dateMonthYearArr = array();
        $fromDateTS = strtotime($fromDate);
        $toDateTS = strtotime($toDate);

        for ($currentDateTS = $fromDateTS; $currentDateTS <= $toDateTS; $currentDateTS += (60 * 60 * 24)) {
            $currentDateStr = date("Y-m-d", $currentDateTS);
            $dateMonthYearArr[] = $currentDateStr;
        }
        return $dateMonthYearArr;
    }

    public function getMonthStartDateFromDate($currentDate) {
        $datePieces = explode("-", $currentDate);
        $year = $datePieces[0];
        $month = $datePieces[1];
        $cdate = $datePieces[2];
        return date("Y-m-d", strtotime($month . '/01/' . $year . ' 00:00:00'));
    }

    public function getMonthEndDateFromDate($currentDate) {
        $datePieces = explode("-", $currentDate);
        $datePieces = explode("-", $currentDate);
        $year = $datePieces[0];
        $month = $datePieces[1];
        $cdate = $datePieces[2];
        return date("Y-m-d", strtotime('-1 second', strtotime('+1 month', strtotime($month . '/01/' . $year . ' 00:00:00'))));
    }

}
