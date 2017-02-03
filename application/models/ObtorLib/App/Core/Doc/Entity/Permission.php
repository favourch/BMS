<?php

/**
 * Description of Permission
 *
 * @author Iyngaran Iyathurai <iyngaran55@gmail.com>
 */
class Base_Model_ObtorLib_App_Core_Doc_Entity_Permission {

    //put your code here
   private $id;
   private $document;
   private $userId;
   private $isRead;
   private $isWrite;
   
   public function getId() {
       return $this->id;
   }

   public function getDocument() {
       return $this->document;
   }

   public function getUserId() {
       return $this->userId;
   }

   public function getIsRead() {
       return $this->isRead;
   }

   public function getIsWrite() {
       return $this->isWrite;
   }

   public function setId($id) {
       $this->id = $id;
   }

   public function setDocument($document) {
       $this->document = $document;
   }

   public function setUserId($userId) {
       $this->userId = $userId;
   }

   public function setIsRead($isRead) {
       $this->isRead = $isRead;
   }

   public function setIsWrite($isWrite) {
       $this->isWrite = $isWrite;
   }




}