<?php

/**
 * Mail_Entity_Template
 * 
 * @date 2009-05-25
 * 
 *
 */
class Base_Model_Lib_System_Entity_SystemLog
{
	private $id;
        private $subject;
        private $message;
        private $date;
        private $logType;
        
        public function getId() {
            return $this->id;
        }

        public function setId($id) {
            $this->id = $id;
        }

        public function getSubject() {
            return $this->subject;
        }

        public function setSubject($subject) {
            $this->subject = $subject;
        }

        public function getMessage() {
            return $this->message;
        }

        public function setMessage($message) {
            $this->message = $message;
        }

        public function getDate() {
            return $this->date;
        }

        public function setDate($date) {
            $this->date = $date;
        }

        public function getLogType() {
            return $this->logType;
        }

        public function setLogType($logType) {
            $this->logType = $logType;
        }


}