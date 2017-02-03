<?php

/**
 * @namespace       : Base
 * @package         : Model
 * @subpackage 		: Lib.Catelog.Country
 * @name 			: Price
 * @author 			: Iyngaran Iyathurai
 * 			  		  Software eng - Bcas R&D
 * 			          E-Mail - Iyngaran55@yahoo.com, Iyngaran@bcas.lk
 *
 * @copyright Copyright (c) 2009 - 2010 SaaiSoft . (http://www.saaisoft.com/)
 *
 * @Created on     	: 16-11-2010
 * @Modified on     : 16-11-2010
 *
 */
class Base_Model_Lib_Catelog_Entity_Country {

    private $id;
    private $name;
    private $countryCode;

    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function getName() {
        return $this->name;
    }

    public function setName($name) {
        $this->name = $name;
    }

    public function getCountryCode() {
        return $this->countryCode;
    }

    public function setCountryCode($countryCode) {
        $this->countryCode = $countryCode;
    }

}