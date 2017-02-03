<?php

/**
 * Mail_Entity_Template
 * 
 * @date 2009-05-25
 * 
 *
 */
class Base_Model_Lib_Mail_Entity_EmailLog
{
	private $id;
        private $userid;
        private $subject;
        private $message;
        private $date;
        private $to;
        private $cc;
        private $bcc;
        
        public function getId() {
            return $this->id;
        }

        public function setId($id) {
            $this->id = $id;
        }

        public function getUserid() {
            return $this->userid;
        }

        public function setUserid($userid) {
            $this->userid = $userid;
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

        public function getTo() {
            return $this->to;
        }

        public function setTo($to) {
            $this->to = $to;
        }

        public function getCc() {
            return $this->cc;
        }

        public function setCc($cc) {
            $this->cc = $cc;
        }

        public function getBcc() {
            return $this->bcc;
        }

        public function setBcc($bcc) {
            $this->bcc = $bcc;
        }


}