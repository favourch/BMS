<?php
/**
 * @namespace       : Base
 * @package         : Model
 * @subpackage 		: Lib.Catelog.PaymentMethod
 * @name 			: PaymentMethod
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
class Base_Model_Lib_Catelog_Entity_PaymentMethod {

	//declare variables...
	private $id;
        private $name;
        private $nameKey;
        private $statusIs;
        private $settings;
        
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

        public function getNameKey() {
            return $this->nameKey;
        }

        public function setNameKey($nameKey) {
            $this->nameKey = $nameKey;
        }

        public function getStatusIs() {
            return $this->statusIs;
        }

        public function setStatusIs($statusIs) {
            $this->statusIs = $statusIs;
        }

        public function getSettings() {
            return $this->settings;
        }

        public function setSettings($settings) {
            $this->settings = $settings;
        }


}
?>
