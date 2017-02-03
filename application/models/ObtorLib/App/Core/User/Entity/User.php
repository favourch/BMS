<?php

/**
 * Description of User
 *
 * @author Iyngaran Iyathurai <iyngaran55@gmail.com>
 */
class Base_Model_ObtorLib_App_Core_User_Entity_User {

    //put your code here
    private $id;
    private $userRole;
    private $empNumber;
    private $fullName;
    private $displayName;
    private $country;
    private $region;
    private $branch;
    private $department;
    private $emailAddress;
    private $userName;
    private $userPassword;
    private $isDeleted;
    private $statusIs;
    private $dateCreated;
    private $dateModified;
    private $modifiedUser;
    private $createdBy;
    private $lastLoginDate;
    private $lastLoginFrom;
    private $totalLogisNumber;
    private $dataPrivilage;
    private $allowedCountries;
    private $allowedRegions;
    private $allowedBranches;
    private $allowedDepartments;
    private $defaultCurrency;
    private $userImage;
    
    public function getId() {
        return $this->id;
    }

    public function getUserRole() {
        return $this->userRole;
    }

    public function getEmpNumber() {
        return $this->empNumber;
    }

    public function getFullName() {
        return $this->fullName;
    }

    public function getDisplayName() {
        return $this->displayName;
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

    public function getEmailAddress() {
        return $this->emailAddress;
    }

    public function getUserName() {
        return $this->userName;
    }

    public function getUserPassword() {
        return $this->userPassword;
    }

    public function getIsDeleted() {
        return $this->isDeleted;
    }

    public function getStatusIs() {
        return $this->statusIs;
    }

    public function getDateCreated() {
        return $this->dateCreated;
    }

    public function getDateModified() {
        return $this->dateModified;
    }

    public function getModifiedUser() {
        return $this->modifiedUser;
    }

    public function getCreatedBy() {
        return $this->createdBy;
    }

    public function getLastLoginDate() {
        return $this->lastLoginDate;
    }

    public function getLastLoginFrom() {
        return $this->lastLoginFrom;
    }

    public function getTotalLogisNumber() {
        return $this->totalLogisNumber;
    }

    public function getDataPrivilage() {
        return $this->dataPrivilage;
    }

    public function getAllowedCountries() {
        return $this->allowedCountries;
    }

    public function getAllowedRegions() {
        return $this->allowedRegions;
    }

    public function getAllowedBranches() {
        return $this->allowedBranches;
    }

    public function getAllowedDepartments() {
        return $this->allowedDepartments;
    }

    public function getDefaultCurrency() {
        return $this->defaultCurrency;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function setUserRole($userRole) {
        $this->userRole = $userRole;
    }

    public function setEmpNumber($empNumber) {
        $this->empNumber = $empNumber;
    }

    public function setFullName($fullName) {
        $this->fullName = $fullName;
    }

    public function setDisplayName($displayName) {
        $this->displayName = $displayName;
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

    public function setEmailAddress($emailAddress) {
        $this->emailAddress = $emailAddress;
    }

    public function setUserName($userName) {
        $this->userName = $userName;
    }

    public function setUserPassword($userPassword) {
        $this->userPassword = $userPassword;
    }

    public function setIsDeleted($isDeleted) {
        $this->isDeleted = $isDeleted;
    }

    public function setStatusIs($statusIs) {
        $this->statusIs = $statusIs;
    }

    public function setDateCreated($dateCreated) {
        $this->dateCreated = $dateCreated;
    }

    public function setDateModified($dateModified) {
        $this->dateModified = $dateModified;
    }

    public function setModifiedUser($modifiedUser) {
        $this->modifiedUser = $modifiedUser;
    }

    public function setCreatedBy($createdBy) {
        $this->createdBy = $createdBy;
    }

    public function setLastLoginDate($lastLoginDate) {
        $this->lastLoginDate = $lastLoginDate;
    }

    public function setLastLoginFrom($lastLoginFrom) {
        $this->lastLoginFrom = $lastLoginFrom;
    }

    public function setTotalLogisNumber($totalLogisNumber) {
        $this->totalLogisNumber = $totalLogisNumber;
    }

    public function setDataPrivilage($dataPrivilage) {
        $this->dataPrivilage = $dataPrivilage;
    }

    public function setAllowedCountries($allowedCountries) {
        $this->allowedCountries = $allowedCountries;
    }

    public function setAllowedRegions($allowedRegions) {
        $this->allowedRegions = $allowedRegions;
    }

    public function setAllowedBranches($allowedBranches) {
        $this->allowedBranches = $allowedBranches;
    }

    public function setAllowedDepartments($allowedDepartments) {
        $this->allowedDepartments = $allowedDepartments;
    }

    public function setDefaultCurrency($defaultCurrency) {
        $this->defaultCurrency = $defaultCurrency;
    }

    public function getUserImage() {
        return $this->userImage;
    }

    public function setUserImage($userImage) {
        $this->userImage = $userImage;
    }

}