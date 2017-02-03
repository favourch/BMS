<?php
/**
 * @namespace       : Base
 * @package         : Model
 * @subpackage 		: Lib.Status.Entity
 * @name 			: StatusChange
 * @author 			: Iyngaran Iyathurai
 * 			  		  Software eng - Bcas R&D
 * 			          E-Mail - Iyngaran55@yahoo.com, Iyngaran@bcas.lk
 * 
 * @copyright Copyright (c) 2009 - 2010 BCAS R&D . (http://www.lab.bcasrd.com)
 * 
 * Description : The entity class for the StatusChange Object 
 * 	
 */
class Base_Model_Lib_Status_Entity_StatusChange {
	
	// declare the propertise
	private $id;
	private $updatedBy;
	private $statusId;
	private $updatedTime;
	private $statusChangeObjectKey;
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
	 * @return the $updatedBy
	 */
	public function getUpdatedBy() {
		return $this->updatedBy;
	}

	/**
	 * @param $updatedBy the $updatedBy to set
	 */
	public function setUpdatedBy($updatedBy) {
		$this->updatedBy = $updatedBy;
	}

	/**
	 * @return the $statusId
	 */
	public function getStatusId() {
		return $this->statusId;
	}

	/**
	 * @param $statusId the $statusId to set
	 */
	public function setStatusId($statusId) {
		$this->statusId = $statusId;
	}

	/**
	 * @return the $updatedTime
	 */
	public function getUpdatedTime() {
		return $this->updatedTime;
	}

	/**
	 * @param $updatedTime the $updatedTime to set
	 */
	public function setUpdatedTime($updatedTime) {
		$this->updatedTime = $updatedTime;
	}

	/**
	 * @return the $statusChangeObjectKey
	 */
	public function getStatusChangeObjectKey() {
		return $this->statusChangeObjectKey;
	}

	/**
	 * @param $statusChangeObjectKey the $statusChangeObjectKey to set
	 */
	public function setStatusChangeObjectKey($statusChangeObjectKey) {
		$this->statusChangeObjectKey = $statusChangeObjectKey;
	}


}

?>