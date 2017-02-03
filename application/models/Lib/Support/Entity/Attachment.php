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
class Base_Model_Lib_Support_Entity_Attachment {

    // declare the user propertise
    private $id;
    private $fileName;
    private $attachmentObject;
    private $attachmentObjectId;
    
    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function getFileName() {
        return $this->fileName;
    }

    public function setFileName($fileName) {
        $this->fileName = $fileName;
    }

    public function getAttachmentObject() {
        return $this->attachmentObject;
    }

    public function setAttachmentObject($attachmentObject) {
        $this->attachmentObject = $attachmentObject;
    }

    public function getAttachmentObjectId() {
        return $this->attachmentObjectId;
    }

    public function setAttachmentObjectId($attachmentObjectId) {
        $this->attachmentObjectId = $attachmentObjectId;
    }


}
?>