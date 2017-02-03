<?php
/**
 * Created by PhpStorm.
 * User: ism-apac
 * Date: 8/7/14
 * Time: 3:26 PM
 */

class Base_Model_ObtorLib_App_Core_Employee_Entity_EmployeeWorkingTime {

        private $id;
	private $weekDay;
	private $onTime;
	private $offTime;
	private $isWorking;
        private $schedule;
        private $expectedWorkingHours;
        
        public function getId() {
            return $this->id;
        }

        public function getWeekDay() {
            return $this->weekDay;
        }

        public function getOnTime() {
            return $this->onTime;
        }

        public function getOffTime() {
            return $this->offTime;
        }

        public function getIsWorking() {
            return $this->isWorking;
        }

        public function getSchedule() {
            return $this->schedule;
        }

        public function setId($id) {
            $this->id = $id;
        }

        public function setWeekDay($weekDay) {
            $this->weekDay = $weekDay;
        }

        public function setOnTime($onTime) {
            $this->onTime = $onTime;
        }

        public function setOffTime($offTime) {
            $this->offTime = $offTime;
        }

        public function setIsWorking($isWorking) {
            $this->isWorking = $isWorking;
        }

        public function setSchedule($schedule) {
            $this->schedule = $schedule;
        }

        public function getExpectedWorkingHours() {
            return $this->expectedWorkingHours;
        }

        public function setExpectedWorkingHours($expectedWorkingHours) {
            $this->expectedWorkingHours = $expectedWorkingHours;
        }



}