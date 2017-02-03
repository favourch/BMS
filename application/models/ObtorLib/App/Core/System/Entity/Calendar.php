<?php
/**
 * Description of Log
 *
 * @author anushiya
 */
class Base_Model_ObtorLib_App_Core_System_Entity_Calendar {
    
    private $id;
    private $title;
    private $titleCategory;
    private $allDay;
    private $startDate;
    private $endDate;
    private $addedOn;
    private $addedBy;
    private $updatedOn;
    private $updatedBy;
    

    public function getId() {
        return $this->id;
    }

    public function getTitle() {
        return $this->title;
    }

    public function getTitleCategory() {
        return $this->titleCategory;
    }

    public function getStartDate() {
        return $this->startDate;
    }

    public function getEndDate() {
        return $this->endDate;
    }

    public function getAddedOn() {
        return $this->addedOn;
    }

    public function getAddedBy() {
        return $this->addedBy;
    }

    public function getUpdatedOn() {
        return $this->updatedOn;
    }

    public function getUpdatedBy() {
        return $this->updatedBy;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function setTitle($title) {
        $this->title = $title;
    }

    public function setTitleCategory($titleCategory) {
        $this->titleCategory = $titleCategory;
    }

    public function setStartDate($startDate) {
        $this->startDate = $startDate;
    }

    public function setEndDate($endDate) {
        $this->endDate = $endDate;
    }

    public function setAddedOn($addedOn) {
        $this->addedOn = $addedOn;
    }

    public function setAddedBy($addedBy) {
        $this->addedBy = $addedBy;
    }

    public function setUpdatedOn($updatedOn) {
        $this->updatedOn = $updatedOn;
    }

    public function setUpdatedBy($updatedBy) {
        $this->updatedBy = $updatedBy;
    }

    public function getAllDay() {
        return $this->allDay;
    }

    public function setAllDay($allDay) {
        $this->allDay = $allDay;
    }


}