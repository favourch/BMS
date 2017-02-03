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
class Base_Model_Lib_Support_Entity_Message {

    // declare the user propertise
    private $id;
    private $message;
    private $addedBy;
    private $addedByObject;
    private $addedOn;
    private $sendEmail;
    private $status;
    private $ticketId;
    private $messageId;
    private $messageObject;
    private $messageType;
    private $messageReply;
    
    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function getMessage() {
        return $this->message;
    }

    public function setMessage($message) {
        $this->message = $message;
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

    public function getSendEmail() {
        return $this->sendEmail;
    }

    public function setSendEmail($sendEmail) {
        $this->sendEmail = $sendEmail;
    }

    public function getStatus() {
        return $this->status;
    }

    public function setStatus($status) {
        $this->status = $status;
    }

    public function getTicketId() {
        return $this->ticketId;
    }

    public function setTicketId($ticketId) {
        $this->ticketId = $ticketId;
    }

    public function getMessageId() {
        return $this->messageId;
    }

    public function setMessageId($messageId) {
        $this->messageId = $messageId;
    }

    public function getMessageObject() {
        return $this->messageObject;
    }

    public function setMessageObject($messageObject) {
        $this->messageObject = $messageObject;
    }

    public function getMessageType() {
        return $this->messageType;
    }

    public function setMessageType($messageType) {
        $this->messageType = $messageType;
    }

    public function getMessageReply() {
        return $this->messageReply;
    }

    public function setMessageReply($messageReply) {
        $this->messageReply = $messageReply;
    }


}
?>