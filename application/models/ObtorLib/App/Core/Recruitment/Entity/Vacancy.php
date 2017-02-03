<?php

/**
 * Description of Vacancy
 *
 * @author Iyngaran Iyathurai <iyngaran55@gmail.com>
 */
class Base_Model_ObtorLib_App_Core_Recruitment_Entity_Vacancy {

    //put your code here
    private $id;
    private $jobId;
    private $vacancyTitle;
    private $category;
    private $smallDescription;
    private $detailedDescription;
    private $qty;
    private $country;
    private $region;
    private $branch;
    private $department;
    private $publishStartDate;
    private $publishEnddate;
    
    public function getId() {
        return $this->id;
    }

    public function getVacancyTitle() {
        return $this->vacancyTitle;
    }

    public function getCategory() {
        return $this->category;
    }

    public function getSmallDescription() {
        return $this->smallDescription;
    }

    public function getDetailedDescription() {
        return $this->detailedDescription;
    }

    public function getQty() {
        return $this->qty;
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

    public function getPublishStartDate() {
        return $this->publishStartDate;
    }

    public function getPublishEnddate() {
        return $this->publishEnddate;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function setVacancyTitle($vacancyTitle) {
        $this->vacancyTitle = $vacancyTitle;
    }

    public function setCategory($category) {
        $this->category = $category;
    }

    public function setSmallDescription($smallDescription) {
        $this->smallDescription = $smallDescription;
    }

    public function setDetailedDescription($detailedDescription) {
        $this->detailedDescription = $detailedDescription;
    }

    public function setQty($qty) {
        $this->qty = $qty;
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

    public function setPublishStartDate($publishStartDate) {
        $this->publishStartDate = $publishStartDate;
    }

    public function setPublishEnddate($publishEnddate) {
        $this->publishEnddate = $publishEnddate;
    }


    public function getJobId() {
        return $this->jobId;
    }

    public function setJobId($jobId) {
        $this->jobId = $jobId;
    }


}