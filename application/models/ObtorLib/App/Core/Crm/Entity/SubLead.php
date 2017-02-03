<?php

/**
 * Description of SubLead
 *
 * @author Iyngaran Iyathurai <iyngaran55@gmail.com>
 */
class Base_Model_ObtorLib_App_Core_Crm_Entity_SubLead {

    //put your code here
    private $id;
    private $website;
    private $callornot;
    private $readornot;
    private $empct;
    private $leadId;
    
    public function getId() {
        return $this->id;
    }

    public function getWebsite() {
        return $this->website;
    }

    public function getCallornot() {
        return $this->callornot;
    }

    public function getReadornot() {
        return $this->readornot;
    }

    public function getEmpct() {
        return $this->empct;
    }

    public function getLeadId() {
        return $this->leadId;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function setWebsite($website) {
        $this->website = $website;
    }

    public function setCallornot($callornot) {
        $this->callornot = $callornot;
    }

    public function setReadornot($readornot) {
        $this->readornot = $readornot;
    }

    public function setEmpct($empct) {
        $this->empct = $empct;
    }

    public function setLeadId($leadId) {
        $this->leadId = $leadId;
    }


    
}