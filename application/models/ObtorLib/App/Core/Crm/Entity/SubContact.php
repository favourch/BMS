<?php

/**
 * Description of SubContact
 *
 * @author Iyngaran Iyathurai <iyngaran55@gmail.com>
 */
class Base_Model_ObtorLib_App_Core_Crm_Entity_SubContact {

    //put your code here
    private $id;
    private $homephone;
    private $otherphone;
    private $assistant;
    private $assistantphone;
    private $birthday;
    private $laststayintouchrequest;
    private $laststayintouchsavedate;
    private $leadsource;
    private $contactId;
    
    public function getId() {
        return $this->id;
    }

    public function getHomephone() {
        return $this->homephone;
    }

    public function getOtherphone() {
        return $this->otherphone;
    }

    public function getAssistant() {
        return $this->assistant;
    }

    public function getAssistantphone() {
        return $this->assistantphone;
    }

    public function getBirthday() {
        return $this->birthday;
    }

    public function getLaststayintouchrequest() {
        return $this->laststayintouchrequest;
    }

    public function getLaststayintouchsavedate() {
        return $this->laststayintouchsavedate;
    }

    public function getLeadsource() {
        return $this->leadsource;
    }

    public function getContactId() {
        return $this->contactId;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function setHomephone($homephone) {
        $this->homephone = $homephone;
    }

    public function setOtherphone($otherphone) {
        $this->otherphone = $otherphone;
    }

    public function setAssistant($assistant) {
        $this->assistant = $assistant;
    }

    public function setAssistantphone($assistantphone) {
        $this->assistantphone = $assistantphone;
    }

    public function setBirthday($birthday) {
        $this->birthday = $birthday;
    }

    public function setLaststayintouchrequest($laststayintouchrequest) {
        $this->laststayintouchrequest = $laststayintouchrequest;
    }

    public function setLaststayintouchsavedate($laststayintouchsavedate) {
        $this->laststayintouchsavedate = $laststayintouchsavedate;
    }

    public function setLeadsource($leadsource) {
        $this->leadsource = $leadsource;
    }

    public function setContactId($contactId) {
        $this->contactId = $contactId;
    }


}