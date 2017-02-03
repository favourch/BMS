<?php

/**
 * Description of Candidate
 *
 * @author Iyngaran Iyathurai <iyngaran55@gmail.com>
 */
class Base_Model_ObtorLib_App_Core_Recruitment_Entity_Candidate {

    //put your code here
    private $id;
    private $fullName;
    private $nameWithIni;
    private $emailAddress;
    private $telephoneNumber;
    private $contactNumber;
    private $dateOfBirth;
    private $gender;
    private $permanentAddressAddress;
    private $permanentAddressStreet;
    private $permanentAddressCity;
    private $permanentAddressState;
    private $permanentAddressZip;
    private $permanentAddressCountry;
    private $residentialAddressAddress;
    private $residentialAddressStreet;
    private $residentialAddressCity;
    private $residentialAddressState;
    private $residentialAddressZip;
    private $residentialAddressCountry;
    private $vacancy;
    
    public function getId() {
        return $this->id;
    }

    public function getFullName() {
        return $this->fullName;
    }

    public function getNameWithIni() {
        return $this->nameWithIni;
    }

    public function getEmailAddress() {
        return $this->emailAddress;
    }

    public function getTelephoneNumber() {
        return $this->telephoneNumber;
    }

    public function getContactNumber() {
        return $this->contactNumber;
    }

    public function getDateOfBirth() {
        return $this->dateOfBirth;
    }

    public function getGender() {
        return $this->gender;
    }

    public function getPermanentAddressAddress() {
        return $this->permanentAddressAddress;
    }

    public function getPermanentAddressStreet() {
        return $this->permanentAddressStreet;
    }

    public function getPermanentAddressCity() {
        return $this->permanentAddressCity;
    }

    public function getPermanentAddressState() {
        return $this->permanentAddressState;
    }

    public function getPermanentAddressZip() {
        return $this->permanentAddressZip;
    }

    public function getPermanentAddressCountry() {
        return $this->permanentAddressCountry;
    }

    public function getResidentialAddressAddress() {
        return $this->residentialAddressAddress;
    }

    public function getResidentialAddressStreet() {
        return $this->residentialAddressStreet;
    }

    public function getResidentialAddressCity() {
        return $this->residentialAddressCity;
    }

    public function getResidentialAddressState() {
        return $this->residentialAddressState;
    }

    public function getResidentialAddressZip() {
        return $this->residentialAddressZip;
    }

    public function getResidentialAddressCountry() {
        return $this->residentialAddressCountry;
    }

    public function getVacancy() {
        return $this->vacancy;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function setFullName($fullName) {
        $this->fullName = $fullName;
    }

    public function setNameWithIni($nameWithIni) {
        $this->nameWithIni = $nameWithIni;
    }

    public function setEmailAddress($emailAddress) {
        $this->emailAddress = $emailAddress;
    }

    public function setTelephoneNumber($telephoneNumber) {
        $this->telephoneNumber = $telephoneNumber;
    }

    public function setContactNumber($contactNumber) {
        $this->contactNumber = $contactNumber;
    }

    public function setDateOfBirth($dateOfBirth) {
        $this->dateOfBirth = $dateOfBirth;
    }

    public function setGender($gender) {
        $this->gender = $gender;
    }

    public function setPermanentAddressAddress($permanentAddressAddress) {
        $this->permanentAddressAddress = $permanentAddressAddress;
    }

    public function setPermanentAddressStreet($permanentAddressStreet) {
        $this->permanentAddressStreet = $permanentAddressStreet;
    }

    public function setPermanentAddressCity($permanentAddressCity) {
        $this->permanentAddressCity = $permanentAddressCity;
    }

    public function setPermanentAddressState($permanentAddressState) {
        $this->permanentAddressState = $permanentAddressState;
    }

    public function setPermanentAddressZip($permanentAddressZip) {
        $this->permanentAddressZip = $permanentAddressZip;
    }

    public function setPermanentAddressCountry($permanentAddressCountry) {
        $this->permanentAddressCountry = $permanentAddressCountry;
    }

    public function setResidentialAddressAddress($residentialAddressAddress) {
        $this->residentialAddressAddress = $residentialAddressAddress;
    }

    public function setResidentialAddressStreet($residentialAddressStreet) {
        $this->residentialAddressStreet = $residentialAddressStreet;
    }

    public function setResidentialAddressCity($residentialAddressCity) {
        $this->residentialAddressCity = $residentialAddressCity;
    }

    public function setResidentialAddressState($residentialAddressState) {
        $this->residentialAddressState = $residentialAddressState;
    }

    public function setResidentialAddressZip($residentialAddressZip) {
        $this->residentialAddressZip = $residentialAddressZip;
    }

    public function setResidentialAddressCountry($residentialAddressCountry) {
        $this->residentialAddressCountry = $residentialAddressCountry;
    }

    public function setVacancy($vacancy) {
        $this->vacancy = $vacancy;
    }



}