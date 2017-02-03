<?php

/**
 * Description of Contact
 *
 * @author Iyngaran Iyathurai <iyngaran55@gmail.com>
 */
class Base_Model_ObtorLib_App_Core_Crm_Entity_Contact {

    //put your code here
   private $id;
   private $contactNo;
   private $accountId;
   private $salutation;
   private $firstName;
   private $lastName;
   private $emailAddress;
   private $phone;
   private $mobile;
   private $title;
   private $fax;
   private $reportsTo;
   private $training;
   private $userType;
   private $contactType;
   private $otherEmail;
   private $yahooId;
   private $donotCall;
   private $emailOptOut;
   private $imageName;
   private $reference;
   private $notifyOwner;
   
   public function getId() {
       return $this->id;
   }

   public function getContactNo() {
       return $this->contactNo;
   }

   public function getAccountId() {
       return $this->accountId;
   }

   public function getSalutation() {
       return $this->salutation;
   }

   public function getFirstName() {
       return $this->firstName;
   }

   public function getLastName() {
       return $this->lastName;
   }

   public function getEmailAddress() {
       return $this->emailAddress;
   }

   public function getPhone() {
       return $this->phone;
   }

   public function getMobile() {
       return $this->mobile;
   }

   public function getTitle() {
       return $this->title;
   }

   public function getFax() {
       return $this->fax;
   }

   public function getReportsTo() {
       return $this->reportsTo;
   }

   public function getTraining() {
       return $this->training;
   }

   public function getUserType() {
       return $this->userType;
   }

   public function getContactType() {
       return $this->contactType;
   }

   public function getOtherEmail() {
       return $this->otherEmail;
   }

   public function getYahooId() {
       return $this->yahooId;
   }

   public function getDonotCall() {
       return $this->donotCall;
   }

   public function getEmailOptOut() {
       return $this->emailOptOut;
   }

   public function getImageName() {
       return $this->imageName;
   }

   public function getReference() {
       return $this->reference;
   }

   public function getNotifyOwner() {
       return $this->notifyOwner;
   }

   public function setId($id) {
       $this->id = $id;
   }

   public function setContactNo($contactNo) {
       $this->contactNo = $contactNo;
   }

   public function setAccountId($accountId) {
       $this->accountId = $accountId;
   }

   public function setSalutation($salutation) {
       $this->salutation = $salutation;
   }

   public function setFirstName($firstName) {
       $this->firstName = $firstName;
   }

   public function setLastName($lastName) {
       $this->lastName = $lastName;
   }

   public function setEmailAddress($emailAddress) {
       $this->emailAddress = $emailAddress;
   }

   public function setPhone($phone) {
       $this->phone = $phone;
   }

   public function setMobile($mobile) {
       $this->mobile = $mobile;
   }

   public function setTitle($title) {
       $this->title = $title;
   }

   public function setFax($fax) {
       $this->fax = $fax;
   }

   public function setReportsTo($reportsTo) {
       $this->reportsTo = $reportsTo;
   }

   public function setTraining($training) {
       $this->training = $training;
   }

   public function setUserType($userType) {
       $this->userType = $userType;
   }

   public function setContactType($contactType) {
       $this->contactType = $contactType;
   }

   public function setOtherEmail($otherEmail) {
       $this->otherEmail = $otherEmail;
   }

   public function setYahooId($yahooId) {
       $this->yahooId = $yahooId;
   }

   public function setDonotCall($donotCall) {
       $this->donotCall = $donotCall;
   }

   public function setEmailOptOut($emailOptOut) {
       $this->emailOptOut = $emailOptOut;
   }

   public function setImageName($imageName) {
       $this->imageName = $imageName;
   }

   public function setReference($reference) {
       $this->reference = $reference;
   }

   public function setNotifyOwner($notifyOwner) {
       $this->notifyOwner = $notifyOwner;
   }


}