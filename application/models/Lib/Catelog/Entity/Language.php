<?php

/**
 * @namespace       : Base
 * @package         : Model
 * @subpackage 		: Lib.Catelog.Language
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
class Base_Model_Lib_Catelog_Entity_Language {

    private $id;
    private $name;
    private $languageCode;

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

    public function getLanguageCode() {
        return $this->languageCode;
    }

    public function setLanguageCode($languageCode) {
        $this->languageCode = $languageCode;
    }


}