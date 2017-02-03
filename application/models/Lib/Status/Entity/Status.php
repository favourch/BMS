<?php
/**
 * @namespace       : Base
 * @package         : Model
 * @subpackage 		: Lib.Status.Entity
 * @name 			: Status
 * @author 			: Iyngaran Iyathurai
 * 			  		  Software eng - Bcas R&D
 * 			          E-Mail - Iyngaran55@yahoo.com, Iyngaran@bcas.lk
 * 
 * @copyright Copyright (c) 2009 - 2010 BCAS R&D . (http://www.lab.bcasrd.com)
 * 
 * Description : The entity class for the Status Object 
 * 	
 */
class Base_Model_Lib_Status_Entity_Status {

	
	// declare the propertise
	private $id;
	private $name;
	private $type;
        private $statusColorCode;
	
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
	 * @return the $type
	 */
	public function getType() {
		return $this->type;
	}

	/**
	 * @param $type the $type to set
	 */
	public function setType($type) {
		$this->type = $type;
	}

	public function getStatusColorCode() {
            return $this->statusColorCode;
        }

        public function setStatusColorCode($statusColorCode) {
            $this->statusColorCode = $statusColorCode;
        }


	
}
?>