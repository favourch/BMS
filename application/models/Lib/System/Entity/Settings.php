<?php
/**
 * @namespace       : Base
 * @package         : Model
 * @subpackage 		: Lib.Program.Entity
 * @name 			: Settings
 * @author 			: Iyngaran Iyathurai
 * 			  		  Software eng - Bcas R&D
 * 			          E-Mail - Iyngaran55@yahoo.com, Iyngaran@bcas.lk
 *
 * @copyright Copyright (c) 2009 - 2010 BCAS R&D . (http://www.lab.bcasrd.com)
 *
 * Description : The entity class for the Settings Object
 *
 */
class Base_Model_Lib_System_Entity_Settings {

	// declare the propertise
	private $id;
        private $settingType;
        private $settingFieldName;
        private $settingValue;
        private $displayOrder;
        private $relId;
        private $fieldDescription;
        private $inputType;
        
        public function getId() {
            return $this->id;
        }

        public function setId($id) {
            $this->id = $id;
        }

        public function getSettingType() {
            return $this->settingType;
        }

        public function setSettingType($settingType) {
            $this->settingType = $settingType;
        }

        public function getSettingFieldName() {
            return $this->settingFieldName;
        }

        public function setSettingFieldName($settingFieldName) {
            $this->settingFieldName = $settingFieldName;
        }

        public function getSettingValue() {
            return $this->settingValue;
        }

        public function setSettingValue($settingValue) {
            $this->settingValue = $settingValue;
        }

        public function getDisplayOrder() {
            return $this->displayOrder;
        }

        public function setDisplayOrder($displayOrder) {
            $this->displayOrder = $displayOrder;
        }

        public function getRelId() {
            return $this->relId;
        }

        public function setRelId($relId) {
            $this->relId = $relId;
        }

        public function getFieldDescription() {
            return $this->fieldDescription;
        }

        public function setFieldDescription($fieldDescription) {
            $this->fieldDescription = $fieldDescription;
        }

        public function getInputType() {
            return $this->inputType;
        }

        public function setInputType($inputType) {
            $this->inputType = $inputType;
        }


}