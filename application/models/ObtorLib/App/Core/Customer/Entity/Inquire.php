<?php

/**
 * Description of Inquire
 *
 * @author Iyngaran Iyathurai <iyngaran55@gmail.com>
 */
class Base_Model_ObtorLib_App_Core_Customer_Entity_Inquire {

    //put your code here
    private $id;
    private $fullName;
    private $postalAddressAddress;
    private $postalAddressStreet;
    private $postalAddressCity;
    private $postalAddressState;
    private $postalAddressCountry;
    private $postalAddressZip;
    private $telephoneNumber;
    private $contactNumber;
    private $emailAddress;
    private $description;
    private $gender;
    private $inquireMedia;
    private $country;
    private $region;
    private $branch;
    private $department;
    private $status;
    private $addedBy;
    private $addedOn;
    private $updatedBy;
    private $updatedOn;
    
    public function getId() {
        return $this->id;
    }

    public function getFullName() {
        return $this->fullName;
    }

    public function getPostalAddressAddress() {
        return $this->postalAddressAddress;
    }

    public function getPostalAddressStreet() {
        return $this->postalAddressStreet;
    }

    public function getPostalAddressCity() {
        return $this->postalAddressCity;
    }

    public function getPostalAddressState() {
        return $this->postalAddressState;
    }

    public function getPostalAddressCountry() {
        return $this->postalAddressCountry;
    }

    public function getPostalAddressZip() {
        return $this->postalAddressZip;
    }

    public function getTelephoneNumber() {
        return $this->telephoneNumber;
    }

    public function getContactNumber() {
        return $this->contactNumber;
    }

    public function getEmailAddress() {
        return $this->emailAddress;
    }

    public function getDescription() {
        return $this->description;
    }

    public function getGender() {
        return $this->gender;
    }

    public function getInquireMedia() {
        return $this->inquireMedia;
    }

    public function getCountry() {
        return $this->country;
    }

    public function getRegion() {
        return $this->region;
    }

    public function getBranch() {
        return $this->branch;
    }

    public function getDepartment() {
        return $this->department;
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

    public function getUpdatedBy() {
        return $this->updatedBy;
    }

    public function getUpdatedOn() {
        return $this->updatedOn;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function setFullName($fullName) {
        $this->fullName = $fullName;
    }

    public function setPostalAddressAddress($postalAddressAddress) {
        $this->postalAddressAddress = $postalAddressAddress;
    }

    public function setPostalAddressStreet($postalAddressStreet) {
        $this->postalAddressStreet = $postalAddressStreet;
    }

    public function setPostalAddressCity($postalAddressCity) {
        $this->postalAddressCity = $postalAddressCity;
    }

    public function setPostalAddressState($postalAddressState) {
        $this->postalAddressState = $postalAddressState;
    }

    public function setPostalAddressCountry($postalAddressCountry) {
        $this->postalAddressCountry = $postalAddressCountry;
    }

    public function setPostalAddressZip($postalAddressZip) {
        $this->postalAddressZip = $postalAddressZip;
    }

    public function setTelephoneNumber($telephoneNumber) {
        $this->telephoneNumber = $telephoneNumber;
    }

    public function setContactNumber($contactNumber) {
        $this->contactNumber = $contactNumber;
    }

    public function setEmailAddress($emailAddress) {
        $this->emailAddress = $emailAddress;
    }

    public function setDescription($description) {
        $this->description = $description;
    }

    public function setGender($gender) {
        $this->gender = $gender;
    }

    public function setInquireMedia($inquireMedia) {
        $this->inquireMedia = $inquireMedia;
    }

    public function setCountry($country) {
        $this->country = $country;
    }

    public function setRegion($region) {
        $this->region = $region;
    }

    public function setBranch($branch) {
        $this->branch = $branch;
    }

    public function setDepartment($department) {
        $this->department = $department;
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

    public function setUpdatedBy($updatedBy) {
        $this->updatedBy = $updatedBy;
    }

    public function setUpdatedOn($updatedOn) {
        $this->updatedOn = $updatedOn;
    }



}