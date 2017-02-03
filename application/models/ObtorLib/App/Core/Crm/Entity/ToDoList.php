<?php

/**
 * Description of SubLead
 *
 * @author Iyngaran Iyathurai <iyngaran55@gmail.com>
 */
class Base_Model_ObtorLib_App_Core_Crm_Entity_ToDoList {

    //put your code here
    private $id;
    private $listTitle;
    private $listDescription;
    private $addedOn;
    private $addedBy;
    private $addedByUserObject;
    private $reminderOn;
    private $reminderDate;
    private $reminderTime;
    private $status;
    
    public function getId() {
        return $this->id;
    }

    public function getListTitle() {
        return $this->listTitle;
    }

    public function getListDescription() {
        return $this->listDescription;
    }

    public function getAddedOn() {
        return $this->addedOn;
    }

    public function getAddedBy() {
        return $this->addedBy;
    }

    public function getAddedByUserObject() {
        return $this->addedByUserObject;
    }

    public function getReminderOn() {
        return $this->reminderOn;
    }

    public function getReminderDate() {
        return $this->reminderDate;
    }

    public function getReminderTime() {
        return $this->reminderTime;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function setListTitle($listTitle) {
        $this->listTitle = $listTitle;
    }

    public function setListDescription($listDescription) {
        $this->listDescription = $listDescription;
    }

    public function setAddedOn($addedOn) {
        $this->addedOn = $addedOn;
    }

    public function setAddedBy($addedBy) {
        $this->addedBy = $addedBy;
    }

    public function setAddedByUserObject($addedByUserObject) {
        $this->addedByUserObject = $addedByUserObject;
    }

    public function setReminderOn($reminderOn) {
        $this->reminderOn = $reminderOn;
    }

    public function setReminderDate($reminderDate) {
        $this->reminderDate = $reminderDate;
    }

    public function setReminderTime($reminderTime) {
        $this->reminderTime = $reminderTime;
    }

    public function getStatus() {
        return $this->status;
    }

    public function setStatus($status) {
        $this->status = $status;
    }



    
}