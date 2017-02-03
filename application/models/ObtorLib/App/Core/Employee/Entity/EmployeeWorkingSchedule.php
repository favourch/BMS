<?php
/**
 * Created by PhpStorm.
 * User: ism-apac
 * Date: 8/7/14
 * Time: 3:26 PM
 */

class Base_Model_ObtorLib_App_Core_Employee_Entity_EmployeeWorkingSchedule {

        private $id;
	private $effectiveFromDate;
        private $isActive;
        private $employeeId;
        private $weekDays;
        
        public function getId() {
            return $this->id;
        }

        public function getEffectiveFromDate() {
            return $this->effectiveFromDate;
        }

        public function getIsActive() {
            return $this->isActive;
        }

        public function getEmployeeId() {
            return $this->employeeId;
        }

        public function getWeekDays() {
            return $this->weekDays;
        }

        public function setId($id) {
            $this->id = $id;
        }

        public function setEffectiveFromDate($effectiveFromDate) {
            $this->effectiveFromDate = $effectiveFromDate;
        }

        public function setIsActive($isActive) {
            $this->isActive = $isActive;
        }

        public function setEmployeeId($employeeId) {
            $this->employeeId = $employeeId;
        }

        public function setWeekDays($weekDays) {
            $this->weekDays = $weekDays;
        }


}