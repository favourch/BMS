<?php

/**
 * Description of Followup
 *
 * @author Iyngaran Iyathurai <iyngaran55@gmail.com>
 */
class Base_Model_ObtorLib_App_Core_Customer_Entity_Followup {

    //put your code here
    private $id;
    private $followupTitle;
    private $followupDescription;
    private $addedBy;
    private $addedOn;
    private $modifiedBy;
    private $modifiedOn;
    private $inquire;
    
    public function getId() {
        return $this->id;
    }

    public function getFollowupTitle() {
        return $this->followupTitle;
    }

    public function getFollowupDescription() {
        return $this->followupDescription;
    }

    public function getAddedBy() {
        return $this->addedBy;
    }

    public function getAddedOn() {
        return $this->addedOn;
    }

    public function getModifiedBy() {
        return $this->modifiedBy;
    }

    public function getModifiedOn() {
        return $this->modifiedOn;
    }

    public function getInquire() {
        return $this->inquire;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function setFollowupTitle($followupTitle) {
        $this->followupTitle = $followupTitle;
    }

    public function setFollowupDescription($followupDescription) {
        $this->followupDescription = $followupDescription;
    }

    public function setAddedBy($addedBy) {
        $this->addedBy = $addedBy;
    }

    public function setAddedOn($addedOn) {
        $this->addedOn = $addedOn;
    }

    public function setModifiedBy($modifiedBy) {
        $this->modifiedBy = $modifiedBy;
    }

    public function setModifiedOn($modifiedOn) {
        $this->modifiedOn = $modifiedOn;
    }

    public function setInquire($inquire) {
        $this->inquire = $inquire;
    }



}