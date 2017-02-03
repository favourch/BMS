<?php

/**
 * Description of AnnouncementQueue
 *
 * @author Iyngaran Iyathurai <iyngaran55@gmail.com>
 */
class Base_Model_ObtorLib_App_Core_Announcement_Entity_AnnouncementQueue {

    //put your code here
   private $id;
   private $status;
   private $addedOn;
   private $updatedOn;
   private $staffId;
   private $customerId;
   private $announcement;
   
   public function getId() {
       return $this->id;
   }

   public function getStatus() {
       return $this->status;
   }

   public function getAddedOn() {
       return $this->addedOn;
   }

   public function getUpdatedOn() {
       return $this->updatedOn;
   }

   public function getStaffId() {
       return $this->staffId;
   }

   public function getCustomerId() {
       return $this->customerId;
   }

   public function getAnnouncement() {
       return $this->announcement;
   }

   public function setId($id) {
       $this->id = $id;
   }

   public function setStatus($status) {
       $this->status = $status;
   }

   public function setAddedOn($addedOn) {
       $this->addedOn = $addedOn;
   }

   public function setUpdatedOn($updatedOn) {
       $this->updatedOn = $updatedOn;
   }

   public function setStaffId($staffId) {
       $this->staffId = $staffId;
   }

   public function setCustomerId($customerId) {
       $this->customerId = $customerId;
   }

   public function setAnnouncement($announcement) {
       $this->announcement = $announcement;
   }


   
}