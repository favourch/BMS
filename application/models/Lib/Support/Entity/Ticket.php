<?php

/**
 * @namespace       : Base
 * @package         : Model
 * @subpackage 		: Lib.User.Entity
 * @name 			: User
 * @author 			: Iyngaran Iyathurai
 * 			  		  Software eng - Bcas R&D
 * 			          E-Mail - Iyngaran55@yahoo.com, Iyngaran@bcas.lk
 * 
 * @copyright Copyright (c) 2009 - 2010 BCAS R&D . (http://www.lab.bcasrd.com)
 * 
 * Description : The entity class for the User Object 
 * 	
 */
class Base_Model_Lib_Support_Entity_Ticket {

    // declare the user propertise
    private $id;
    private $toName;
    private $toEmail;
    private $doSendEmail;
    private $ccRecipients;
    private $department;
    private $subject;
    private $priority;
    private $ticketDescription;
    private $client;
    private $status;
    private $addedBy;
    private $addedByObject;
    private $addedOn;
    private $lastReplyOn;
    
    
    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function getToName() {
        return $this->toName;
    }

    public function setToName($toName) {
        $this->toName = $toName;
    }

    public function getToEmail() {
        return $this->toEmail;
    }

    public function setToEmail($toEmail) {
        $this->toEmail = $toEmail;
    }

    public function getDoSendEmail() {
        return $this->doSendEmail;
    }

    public function setDoSendEmail($doSendEmail) {
        $this->doSendEmail = $doSendEmail;
    }

    public function getCcRecipients() {
        return $this->ccRecipients;
    }

    public function setCcRecipients($ccRecipients) {
        $this->ccRecipients = $ccRecipients;
    }

    public function getDepartment() {
        return $this->department;
    }

    public function setDepartment($department) {
        $this->department = $department;
    }

    public function getSubject() {
        return $this->subject;
    }

    public function setSubject($subject) {
        $this->subject = $subject;
    }

    public function getPriority() {
        return $this->priority;
    }

    public function setPriority($priority) {
        $this->priority = $priority;
    }

    public function getTicketDescription() {
        return $this->ticketDescription;
    }

    public function setTicketDescription($ticketDescription) {
        $this->ticketDescription = $ticketDescription;
    }


    public function getClient() {
        return $this->client;
    }

    public function setClient($client) {
        $this->client = $client;
    }

    public function getStatus() {
        return $this->status;
    }

    public function setStatus($status) {
        $this->status = $status;
    }

    public function getAddedBy() {
        return $this->addedBy;
    }

    public function setAddedBy($addedBy) {
        $this->addedBy = $addedBy;
    }

    public function getAddedByObject() {
        return $this->addedByObject;
    }

    public function setAddedByObject($addedByObject) {
        $this->addedByObject = $addedByObject;
    }

    public function getAddedOn() {
        return $this->addedOn;
    }

    public function setAddedOn($addedOn) {
        $this->addedOn = $addedOn;
    }

    public function getLastReplyOn() {
        return $this->lastReplyOn;
    }

    public function setLastReplyOn($lastReplyOn) {
        $this->lastReplyOn = $lastReplyOn;
    }



}
?>