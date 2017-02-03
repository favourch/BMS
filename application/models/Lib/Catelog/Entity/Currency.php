<?php
/**
 * @namespace       : Base
 * @package         : Model
 * @subpackage 		: Lib.Catelog.Currency
 * @name 			: Currency
 * @author 			: Iyngaran Iyathurai
 * 			  		  Software eng - Bcas R&D
 * 			          E-Mail - Iyngaran55@yahoo.com, Iyngaran@bcas.lk
 *
 * @copyright Copyright (c) 2009 - 2010 Jasmin Media . (http://www.jasmin-media.com/)
 *
 * @Created on     	: 11-04-2010
 * @Modified on     : 11-04-2010
 *
 */
class Base_Model_Lib_Catelog_Entity_Currency {

	//declare variables...
	private $id;
	private $name;
	private $code;
	private $currentRateInUsd;
        private $isDefault;
        private $currencySym;
        
        
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
	 * @return the $code
	 */
	public function getCode() {
		return $this->code;
	}

	/**
	 * @param $code the $code to set
	 */
	public function setCode($code) {
		$this->code = $code;
	}

	

	public function getCurrentRateInUsd()
	{
	    return $this->currentRateInUsd;
	}

	public function setCurrentRateInUsd($currentRateInUsd)
	{
	    $this->currentRateInUsd = $currentRateInUsd;
	}
        
        public function getIsDefault() {
            return $this->isDefault;
        }

        public function setIsDefault($isDefault) {
            $this->isDefault = $isDefault;
        }

        public function getCurrencySym() {
            return $this->currencySym;
        }

        public function setCurrencySym($currencySym) {
            $this->currencySym = $currencySym;
        }


}
?>
