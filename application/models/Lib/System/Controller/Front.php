<?php

/**
 * @namespace       : Base
 * @package         : Model
 * @subpackage 		: Lib.System.Controller
 * @name 			: Admin
 * @author 			: Iyngaran Iyathurai
 * 			  		  Software eng - Bcas R&D
 * 			          E-Mail - Iyngaran55@yahoo.com, Iyngaran@bcas.lk
 *
 * @copyright Copyright (c) 2009 - 2010 BCAS R&D . (http://www.lab.bcasrd.com)
 *
 * Description : The Admin class to check the authentication in the admin module, its extends the Zend_Controller_Action.
 * 				 The isAdminLogin() function checks the session, and its return true if admin session is valied
 * 				 else returns false, the init function calls this isAdminLogin(), and redirect to login page
 * 				 if the admin session is not valied.
 * 				 So in the admin module, we need to extends this class in to Admin Controller classes, so that will do the
 * 				 authentication
 *
 */
class Base_Model_Lib_System_Controller_Front extends Zend_Controller_Action {

    public function init() {



        $clientUserInfo = Zend_Registry::get('clientLog');
        $administrator = $clientUserInfo->clientInfo;
        $logId = $clientUserInfo->logId;
        $isClient = $clientUserInfo->isClient;

        if ($isClient != "Yes") {
            $this->_redirect('/login/');
        }
    }

    public function getTodayDate() {
        $myDate = "";
        try {

            $myDate = Zend_Date::now();
            $myDate = $myDate->toString("YYYY-MM-dd");
        } catch (Exception $ex) {
            print($e->getMessage());
        }
        return $myDate;
    }

    public function getTodayDateTime() {
        $myDate = "";
        try {

            $myDate = Zend_Date::now();
            $myDate = $myDate->toString("YYYY-MM-dd HH:mm:ss");
        } catch (Exception $ex) {
            print($e->getMessage());
        }
        return $myDate;
    }

    public function getCurrentTime() {
        $myDate = "";
        try {

            $myDate = Zend_Date::now();
            $myDate = $myDate->toString("HH:mm:ss");
        } catch (Exception $ex) {
            print($e->getMessage());
        }
        return $myDate;
    }

    public function generateEncryptedKey() {
        $encKey = "";
        try {

            $time = time();
            $rndNumber = rand();

            $keyVal = $time . $rndNumber;

            $encKey = md5($keyVal);
        } catch (Exception $e) {
            print($e->getMessage());
        }

        return $encKey;
    }

    public function getFileExtension($filename) {
        return end(explode(".", $filename));
    }

    public function getUser() {
        try {

            $userInfo = Zend_Auth::getInstance()->getStorage()->read();
            return $userInfo;
        } catch (Exception $e) {
            print($e->getMessage());
        }
    }

    public function getCurrentUserInfo() {
        try {

            $currentUserInfo = Zend_Registry::get('clientLog');
            $currentUser = $currentUserInfo->clientInfo;
            return $currentUser;
        } catch (Exception $ex) {
            print ($ex->getMessage());
        }
    }

    public function getCurrentUserId() {
        try {

            $currentUserInfo = $this->getCurrentUserInfo();
            $userId = $currentUserInfo->getId();
            return $userId;
        } catch (Exception $ex) {
            print ($ex->getMessage());
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

}