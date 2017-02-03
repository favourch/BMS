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
class Base_Model_Lib_System_Controller_Admin extends Zend_Controller_Action {

    public function init() {

        

        $administratorInfo = Zend_Registry::get('userLog');
        $administrator = $administratorInfo->adminInfo;
        $logId = $administratorInfo->logId;
        $isAdmin = $administratorInfo->isAdmin;

        if ($isAdmin != "Yes") {
            $this->_redirect('/admin/login/');
        }
        
        
        $moduleName = $this->getRequest ()->getModuleName ();
        $controllerName = $this->getRequest ()->getControllerName ();
        $actionName = $this->getRequest ()->getActionName ();


        $this->view->controllerName = $controllerName;
        $this->view->actionName = $actionName;
        
        
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

    public function htmlCharacterEncode($data) {
        $str = "";
        try {
            $str = htmlspecialchars($data, ENT_QUOTES);
            return $str;
        } catch (Exception $ex) {
            print($ex->getMessage());
        }
    }

    public function getFileName() {

        try {
            usleep(3000000);
            $fileName = strtotime("now");
            $fileName = $fileName . ".jpg";
            return $fileName;
        } catch (Exception $ex) {
            print ($ex->getMessage());
        }
    }

    public function getCurrentUserInfo() {
        try {

            $administratorInfo = Zend_Registry::get('userLog');
            $administrator = $administratorInfo->adminInfo;
            return $administrator;
        } catch (Exception $ex) {
            print ($ex->getMessage());
        }
    }

    public function getCurrentUserId() {
        try {

            $administratorInfo = $this->getCurrentUserInfo();
            $userId = $administratorInfo->getId();
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

    public function writeLog($logMessage) {
        $objOrderLog = new Base_Model_Lib_Ext_Logger();
        $objOrderLog->write($logMessage);
    }

    public function randomPassword() {
        $alphabet = "abcdefghijklmnopqrstuwxyzABCDEFGHIJKLMNOPQRSTUWXYZ0123456789";
        $pass = array(); //remember to declare $pass as an array
        $alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
        for ($i = 0; $i < 8; $i++) {
            $n = rand(0, $alphaLength);
            $pass[] = $alphabet[$n];
        }
        return implode($pass); //turn the array into a string
    }

    public function countMonths($dateTime1, $dateTime2) {
        $time1 = $dateTime1;
        $time2 = $dateTime2;
        $precision = 4;

        // If not numeric then convert texts to unix timestamps
        if (!is_int($time1)) {
            $time1 = strtotime($time1);
        }
        if (!is_int($time2)) {
            $time2 = strtotime($time2);
        }

        // If time1 is bigger than time2
        // Then swap time1 and time2
        if ($time1 > $time2) {
            $ttime = $time1;
            $time1 = $time2;
            $time2 = $ttime;
        }

        // Set up intervals and diffs arrays
        $intervals = array('year', 'month', 'day', 'hour', 'minute', 'second');
        $diffs = array();

        // Loop thru all intervals
        foreach ($intervals as $interval) {
            // Create temp time from time1 and interval
            $ttime = strtotime('+1 ' . $interval, $time1);
            // Set initial values
            $add = 1;
            $looped = 0;
            // Loop until temp time is smaller than time2
            while ($time2 >= $ttime) {
                // Create new temp time from time1 and interval
                $add++;
                $ttime = strtotime("+" . $add . " " . $interval, $time1);
                $looped++;
            }

            $time1 = strtotime("+" . $looped . " " . $interval, $time1);
            $diffs[$interval] = $looped;
        }

        $count = 0;
        $times = array();
        // Loop thru all diffs
        foreach ($diffs as $interval => $value) {
            // Break if we have needed precission
            if ($count >= $precision) {
                break;
            }
            // Add value and interval 
            // if value is bigger than 0
            if ($value > 0) {
                // Add s if value is not 1
                if ($value != 1) {
                    $interval .= "s";
                }
                // Add value and interval to times array
                $times[] = $value . " " . $interval;
                $count++;
            }
        }

        // Return string with times
        return implode(", ", $times);
    }

    public function makeStartDate($strdate) {
        try {

            list ( $y, $m, $d ) = explode('-', $strdate);
            $frmDate = date("Y-m-d H:i:s", mktime(0, 0, 0, $m, $d, $y));
            return $frmDate;
        } catch (Exception $e) {
            print ($ex->getMessage());
        }
    }

    public function makeEndDate($endDate) {
        try {

            list ( $y, $m, $d ) = explode('-', $endDate);
            $endDate = date("Y-m-d 23:59:59", mktime(0, 0, 0, $m, $d, $y));
            return $endDate;
        } catch (Exception $e) {
            print ($ex->getMessage());
        }
    }
    
    public function getYesterdayDate() {
        try {

            $yesterday  			= mktime(0, 0, 0, date("m")  , date("d")-1, date("Y"));
            $yesterday_date         	= date("Y-m-d",$yesterday);
            return $yesterday_date;
        } catch (Exception $e) {
            print ($ex->getMessage());
        }
    }
    
    
    // this week start date....
		public function getThisWeekStartDate() {
			$week_number = date("W") - 1;
			$year        = date("Y");
			$wk_ts  = strtotime('+' . $week_number . ' weeks', strtotime($year . '0101'));
    		$mon_ts = strtotime('-' . date('w', $wk_ts) + $first . ' days', $wk_ts);
    		return date('Y-m-d', $mon_ts);
        }
        
        // this week end date....
		public function getThisWeekEndDate() {
			$sStartDate = $this->getThisWeekStartDate();
			$sEndDate   = date('Y-m-d', strtotime('+6 days', strtotime($sStartDate)));
			return $sEndDate;
        }


// last week start date
		public function getLastWeekStartDate() {
			$week_number = date("W") - 2;
			$year        = date("Y");
			$wk_ts  = strtotime('+' . $week_number . ' weeks', strtotime($year . '0101'));
    		$mon_ts = strtotime('-' . date('w', $wk_ts) + $first . ' days', $wk_ts);
    		return date('Y-m-d', $mon_ts);
        }
        
        // last week end date
		public function getLastWeekEndDate() {
			$sStartDate = $this->getLastWeekStartDate();
			$sEndDate   = date('Y-m-d', strtotime('+6 days', strtotime($sStartDate)));
			return $sEndDate;
        }
        
        
         public function getMonthStartDateFromDate($currentDate){
                $datePieces = explode("-",$currentDate);
                $year = $datePieces[0];
                $month = $datePieces[1];
                $cdate = $datePieces[2]; 
                return date("Y-m-d", strtotime($month.'/01/'.$year.' 00:00:00'));	
        }

        public function getMonthEndDateFromDate($currentDate){
                $datePieces = explode("-",$currentDate);
                $datePieces = explode("-",$currentDate);
                $year = $datePieces[0];
                $month = $datePieces[1];
                $cdate = $datePieces[2];
                return date("Y-m-d", strtotime('-1 second',strtotime('+1 month',strtotime($month.'/01/'.$year.' 00:00:00'))));
        }

public function getLastMonthStartDate() {
            return date("Y-m-j", strtotime((date('m')-1).'/01/'.date('Y').' 00:00:00'));
        }

        public function getLastMonthEndDate() {
            return date("Y-m-j", strtotime('-1 second',strtotime('+1 month',strtotime((date('m')-1).'/01/'.date('Y').' 00:00:00'))));
        }
        
        public function getCurrentYear() {
		$year = "";
		try {
			
			$year = Zend_Date::now ();
			$year = $year->toString ("YYYY");
		
		} catch ( Exception $ex ) {
			print ("Error - " . $ex->getMessage ()) ;
		}
		return $year;
	
	}

}