<?php

/**
 * Description of Announcement
 *
 * @author Iyngaran Iyathurai <iyngaran55@gmail.com>
 */
class Base_Model_ObtorLib_App_Core_Announcement_Entity_Announcement {

    //put your code here
   private $id;
   private $announceTo;
   private $announceType;
   private $subject;
   private $message;
   private $status;
   private $addedBy;
   private $addedOn;
   
   public function getId() {
       return $this->id;
   }

   public function getAnnounceTo() {
       return $this->announceTo;
   }

   public function getAnnounceType() {
       return $this->announceType;
   }

   public function getSubject() {
       return $this->subject;
   }

   public function getMessage() {
       return $this->message;
   }

   public function getStatus() {
       return $this->status;
   }

   public function getAddedBy() {
       return $this->addedBy;
   }

   public function getAddedOn() {
       return $this->addedOn;
   }

   public function setId($id) {
       $this->id = $id;
   }

   public function setAnnounceTo($announceTo) {
       $this->announceTo = $announceTo;
   }

   public function setAnnounceType($announceType) {
       $this->announceType = $announceType;
   }

   public function setSubject($subject) {
       $this->subject = $subject;
   }

   public function setMessage($message) {
       $this->message = $message;
   }

   public function setStatus($status) {
       $this->status = $status;
   }

   public function setAddedBy($addedBy) {
       $this->addedBy = $addedBy;
   }

   public function setAddedOn($addedOn) {
       $this->addedOn = $addedOn;
   }



}