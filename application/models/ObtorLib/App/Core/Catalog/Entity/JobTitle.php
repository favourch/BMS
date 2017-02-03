<?php

/**
 * @namespace       : Base
 * @package         : Model
 * @subpackage 		: Lib.Catelog.JobTitle
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
class Base_Model_ObtorLib_App_Core_Catalog_Entity_JobTitle {

    private $id;
    private $name;
    private $prefix;

    public function getId() {
        return $this->id;
    }

    public function getName() {
        return $this->name;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function setName($name) {
        $this->name = $name;
    }

    public function getPrefix() {
        return $this->prefix;
    }

    public function setPrefix($prefix) {
        $this->prefix = $prefix;
    }



}