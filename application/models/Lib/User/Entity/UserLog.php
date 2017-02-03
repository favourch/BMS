<?php
/**
 * @namespace       : Base
 * @package         : Model
 * @subpackage 		: Lib.User.Entity
 * @name 			:UserLog
 * @author 			: Iyngaran Iyathurai
 * 			  		  Software eng - Bcas R&D
 * 			          E-Mail - Iyngaran55@yahoo.com, Iyngaran@bcas.lk
 * 
 * @copyright Copyright (c) 2009 - 2010 BCAS R&D . (http://www.lab.bcasrd.com)
 * 
 * Description : The entity class for the UserLog Object 
 * 	
 */
class Base_Model_Lib_User_Entity_UserLog {

	// declare the user propertise
	private $id;
	private $loginDate;
	private $loginTime;
	private $logoutTime;
	private $totalUsedTime;
	private $userId;
	private $loginFrom;
	private $userInfo;
        private $userType;
	
	// propertise to search
	private $loginDateFrom;
	private $loginDateTo;
	private $limit;
	private $limitFrom;
	
	
	/**
	 * @return the $id
	 */
	public function getId() {
		return $this->id;
	}

	/**
	 * @param $id the $id to set
	 */
	public function setId($id) {
		$this->id = $id;
	}

	/**
	 * @return the $loginDate
	 */
	public function getLoginDate() {
		return $this->loginDate;
	}

	/**
	 * @param $loginDate the $loginDate to set
	 */
	public function setLoginDate($loginDate) {
		$this->loginDate = $loginDate;
	}

	/**
	 * @return the $loginTime
	 */
	public function getLoginTime() {
		return $this->loginTime;
	}

	/**
	 * @param $loginTime the $loginTime to set
	 */
	public function setLoginTime($loginTime) {
		$this->loginTime = $loginTime;
	}

	/**
	 * @return the $logoutTime
	 */
	public function getLogoutTime() {
		return $this->logoutTime;
	}

	/**
	 * @param $logoutTime the $logoutTime to set
	 */
	public function setLogoutTime($logoutTime) {
		$this->logoutTime = $logoutTime;
	}

	/**
	 * @return the $totalUsedTime
	 */
	public function getTotalUsedTime() {
		return $this->totalUsedTime;
	}

	/**
	 * @param $totalUsedTime the $totalUsedTime to set
	 */
	public function setTotalUsedTime($totalUsedTime) {
		$this->totalUsedTime = $totalUsedTime;
	}

	/**
	 * @return the $userId
	 */
	public function getUserId() {
		return $this->userId;
	}

	/**
	 * @param $userId the $userId to set
	 */
	public function setUserId($userId) {
		$this->userId = $userId;
	}
	/**
	 * @return the $loginFrom
	 */
	public function getLoginFrom() {
		return $this->loginFrom;
	}

	/**
	 * @param $loginFrom the $loginFrom to set
	 */
	public function setLoginFrom($loginFrom) {
		$this->loginFrom = $loginFrom;
	}
	/**
	 * @return the $userInfo
	 */
	public function getUserInfo() {
		return $this->userInfo;
	}

	/**
	 * @param $userInfo the $userInfo to set
	 */
	public function setUserInfo($userInfo) {
		$this->userInfo = $userInfo;
	}
	/**
	 * @return the $loginDateFrom
	 */
	public function getLoginDateFrom() {
		return $this->loginDateFrom;
	}

	/**
	 * @return the $loginDateTo
	 */
	public function getLoginDateTo() {
		return $this->loginDateTo;
	}

	/**
	 * @param $loginDateFrom the $loginDateFrom to set
	 */
	public function setLoginDateFrom($loginDateFrom) {
		$this->loginDateFrom = $loginDateFrom;
	}

	/**
	 * @param $loginDateTo the $loginDateTo to set
	 */
	public function setLoginDateTo($loginDateTo) {
		$this->loginDateTo = $loginDateTo;
	}





	public function getLimit()
	{
	    return $this->limit;
	}

	public function setLimit($limit)
	{
	    $this->limit = $limit;
	}

	public function getLimitFrom()
	{
	    return $this->limitFrom;
	}

	public function setLimitFrom($limitFrom)
	{
	    $this->limitFrom = $limitFrom;
	}
        
        public function getUserType() {
            return $this->userType;
        }

        public function setUserType($userType) {
            $this->userType = $userType;
        }


}
?>