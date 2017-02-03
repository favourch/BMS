<?php
/**
 * Description of Notification
 *
 * @author anushiya
 */
class Base_Model_ObtorLib_App_Core_System_Entity_Notification {
    
    private $id;
    private $relId;
    private $relType;
    private $notificationMessage;
    private $notificationType;
    private $addedOn;
    private $currentStatus;
    private $updatedOn;
    private $fromId;
    private $fromType;
    
    public function getId() {
        return $this->id;
    }

    public function getRelId() {
        return $this->relId;
    }

    public function getRelType() {
        return $this->relType;
    }

    public function getNotificationMessage() {
        return $this->notificationMessage;
    }

    public function getNotificationType() {
        return $this->notificationType;
    }

    public function getAddedOn() {
        return $this->addedOn;
    }

    public function getCurrentStatus() {
        return $this->currentStatus;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function setRelId($relId) {
        $this->relId = $relId;
    }

    public function setRelType($relType) {
        $this->relType = $relType;
    }

    public function setNotificationMessage($notificationMessage) {
        $this->notificationMessage = $notificationMessage;
    }

    public function setNotificationType($notificationType) {
        $this->notificationType = $notificationType;
    }

    public function setAddedOn($addedOn) {
        $this->addedOn = $addedOn;
    }

    public function setCurrentStatus($currentStatus) {
        $this->currentStatus = $currentStatus;
    }

    public function getUpdatedOn() {
        return $this->updatedOn;
    }

    public function setUpdatedOn($updatedOn) {
        $this->updatedOn = $updatedOn;
    }


    public function getFromId() {
        return $this->fromId;
    }

    public function getFromType() {
        return $this->fromType;
    }

    public function setFromId($fromId) {
        $this->fromId = $fromId;
    }

    public function setFromType($fromType) {
        $this->fromType = $fromType;
    }


    
}
