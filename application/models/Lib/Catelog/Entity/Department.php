<?php
/**
 * @namespace       : Base
 * @package         : Model
 * @subpackage 		: Lib.Catelog.Entity
 * @name 			: Department
 * @author 			: Iyngaran Iyathurai
 * 			  		  Software eng - Bcas R&D
 * 			          E-Mail - Iyngaran55@yahoo.com, Iyngaran@bcas.lk
 * 
 * @copyright Copyright (c) 2009 - 2010 BCAS R&D . (http://www.lab.bcasrd.com)
 * 
 * Description : The entity class for the Department Object 
 * 	
 */
class Base_Model_Lib_Catelog_Entity_Department {

	
	// declare the propertise
	private $id;
	private $name;
	private $branch;
	private $addedOn;
	private $modifiedOn;
	private $modifiedBy;
	private $programs;
	
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
	 * @return the $name
	 */
	public function getName() {
		return $this->name;
	}

	/**
	 * @param $name the $name to set
	 */
	public function setName($name) {
		$this->name = $name;
	}

	/**
	 * @return the $branch
	 */
	public function getBranch() {
		return $this->branch;
	}

	/**
	 * @param $branch the $branch to set
	 */
	public function setBranch($branch) {
		$this->branch = $branch;
	}

	/**
	 * @return the $addedOn
	 */
	public function getAddedOn() {
		return $this->addedOn;
	}

	/**
	 * @param $addedOn the $addedOn to set
	 */
	public function setAddedOn($addedOn) {
		$this->addedOn = $addedOn;
	}

	/**
	 * @return the $modifiedOn
	 */
	public function getModifiedOn() {
		return $this->modifiedOn;
	}

	/**
	 * @param $modifiedOn the $modifiedOn to set
	 */
	public function setModifiedOn($modifiedOn) {
		$this->modifiedOn = $modifiedOn;
	}

	/**
	 * @return the $modifiedBy
	 */
	public function getModifiedBy() {
		return $this->modifiedBy;
	}

	/**
	 * @param $modifiedBy the $modifiedBy to set
	 */
	public function setModifiedBy($modifiedBy) {
		$this->modifiedBy = $modifiedBy;
	}
	/**
	 * @return the $programs
	 */
	public function getPrograms() {
		return $this->programs;
	}

	/**
	 * @param $programs the $programs to set
	 */
	public function setPrograms($programs) {
		$this->programs = $programs;
	}



}
?>