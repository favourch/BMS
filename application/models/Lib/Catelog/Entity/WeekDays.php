<?php
/**
 * @namespace       : Base
 * @package         : Model
 * @subpackage 		: Lib.Catelog.WeekDays
 * @name 			: WeekDays
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
class Base_Model_Lib_Catelog_Entity_WeekDays {

	//declare variables...
	private $id;
        private $name;
        private $nameKey;
        private $isOpen;
        private $settings;
        
        public function getId() {
            return $this->id;
        }

        public function getName() {
            return $this->name;
        }

        public function getNameKey() {
            return $this->nameKey;
        }

        public function getIsOpen() {
            return $this->isOpen;
        }

        public function getSettings() {
            return $this->settings;
        }

        public function setId($id) {
            $this->id = $id;
        }

        public function setName($name) {
            $this->name = $name;
        }

        public function setNameKey($nameKey) {
            $this->nameKey = $nameKey;
        }

        public function setIsOpen($isOpen) {
            $this->isOpen = $isOpen;
        }

        public function setSettings($settings) {
            $this->settings = $settings;
        }


        

}
?>
