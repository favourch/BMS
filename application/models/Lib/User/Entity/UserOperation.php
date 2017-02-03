<?php
/**
 * @namespace       : Base
 * @package         : Model
 * @subpackage 		: Lib.User.Entity
 * @name 			: UserOperation
 * @author 			: Iyngaran Iyathurai
 * 			  		  Software eng - Bcas R&D
 * 			          E-Mail - Iyngaran55@yahoo.com, Iyngaran@bcas.lk
 * 
 * @copyright Copyright (c) 2009 - 2010 BCAS R&D . (http://www.lab.bcasrd.com)
 * 
 * Description : The entity class for the UserOperation Object 
 * 	
 */
class Base_Model_Lib_User_Entity_UserOperation {

	// declare the user propertise
	private $id;
	private $userId;
	private $tableName;
	private $keyId;
	private $operationType;
	private $operationDate;
	private $message;
	/**
	 * @return the $id
	 */
	public function getId() {
		return $this->id;
	}

	/**
	 * @return the $userId
	 */
	public function getUserId() {
		return $this->userId;
	}

	/**
	 * @return the $tableName
	 */
	public function getTableName() {
		return $this->tableName;
	}

	/**
	 * @return the $keyId
	 */
	public function getKeyId() {
		return $this->keyId;
	}

	/**
	 * @return the $operationType
	 */
	public function getOperationType() {
		return $this->operationType;
	}

	/**
	 * @return the $operationDate
	 */
	public function getOperationDate() {
		return $this->operationDate;
	}

	/**
	 * @return the $message
	 */
	public function getMessage() {
		return $this->message;
	}

	/**
	 * @param $id the $id to set
	 */
	public function setId($id) {
		$this->id = $id;
	}

	/**
	 * @param $userId the $userId to set
	 */
	public function setUserId($userId) {
		$this->userId = $userId;
	}

	/**
	 * @param $tableName the $tableName to set
	 */
	public function setTableName($tableName) {
		$this->tableName = $tableName;
	}

	/**
	 * @param $keyId the $keyId to set
	 */
	public function setKeyId($keyId) {
		$this->keyId = $keyId;
	}

	/**
	 * @param $operationType the $operationType to set
	 */
	public function setOperationType($operationType) {
		$this->operationType = $operationType;
	}

	/**
	 * @param $operationDate the $operationDate to set
	 */
	public function setOperationDate($operationDate) {
		$this->operationDate = $operationDate;
	}

	/**
	 * @param $message the $message to set
	 */
	public function setMessage($message) {
		$this->message = $message;
	}

	
	
}

?>