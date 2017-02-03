<?php
/**
 * @namespace       : Base
 * @package         : Model
 * @subpackage 		: Lib.Catelog.PromotionCode
 * @name 			: PromotionCode
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
class Base_Model_Lib_Catelog_Entity_PromotionCode {

	//declare variables...
	private $id;
        private $name;
        private $valueType;
        private $value;
        private $activeFrom;
        private $activeTo;
        private $status;
        
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

        public function getValueType() {
            return $this->valueType;
        }

        public function setValueType($valueType) {
            $this->valueType = $valueType;
        }

        public function getValue() {
            return $this->value;
        }

        public function setValue($value) {
            $this->value = $value;
        }

        public function getActiveFrom() {
            return $this->activeFrom;
        }

        public function setActiveFrom($activeFrom) {
            $this->activeFrom = $activeFrom;
        }

        public function getActiveTo() {
            return $this->activeTo;
        }

        public function setActiveTo($activeTo) {
            $this->activeTo = $activeTo;
        }

        public function getStatus() {
            return $this->status;
        }

        public function setStatus($status) {
            $this->status = $status;
        }


}
?>
