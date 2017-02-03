<?php

/**
 * Description of Document
 *
 * @author Iyngaran Iyathurai <iyngaran55@gmail.com>
 */
class Base_Model_ObtorLib_App_Core_Doc_Entity_Document {

    //put your code here
   private $id;
   private $docTitle;
   private $docDescription;
   private $docPermission;
   private $docAttachment;
   private $docAddedBy;
   private $docAddedOn;
   private $docUpdatedBy;
   private $docUpdatedOn;
   private $sharedUserId;
   
   public function getId() {
       return $this->id;
   }

   public function getDocTitle() {
       return $this->docTitle;
   }

   public function getDocDescription() {
       return $this->docDescription;
   }

   public function getDocPermission() {
       return $this->docPermission;
   }

   public function getDocAttachment() {
       return $this->docAttachment;
   }

   public function setId($id) {
       $this->id = $id;
   }

   public function setDocTitle($docTitle) {
       $this->docTitle = $docTitle;
   }

   public function setDocDescription($docDescription) {
       $this->docDescription = $docDescription;
   }

   public function setDocPermission($docPermission) {
       $this->docPermission = $docPermission;
   }

   public function setDocAttachment($docAttachment) {
       $this->docAttachment = $docAttachment;
   }

   public function getDocAddedBy() {
       return $this->docAddedBy;
   }

   public function getDocAddedOn() {
       return $this->docAddedOn;
   }

   public function getDocUpdatedBy() {
       return $this->docUpdatedBy;
   }

   public function getDocUpdatedOn() {
       return $this->docUpdatedOn;
   }

   public function setDocAddedBy($docAddedBy) {
       $this->docAddedBy = $docAddedBy;
   }

   public function setDocAddedOn($docAddedOn) {
       $this->docAddedOn = $docAddedOn;
   }

   public function setDocUpdatedBy($docUpdatedBy) {
       $this->docUpdatedBy = $docUpdatedBy;
   }

   public function setDocUpdatedOn($docUpdatedOn) {
       $this->docUpdatedOn = $docUpdatedOn;
   }

   public function getSharedUserId() {
       return $this->sharedUserId;
   }

   public function setSharedUserId($sharedUserId) {
       $this->sharedUserId = $sharedUserId;
   }




}