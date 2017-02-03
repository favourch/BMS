<?php
/**
 * Attachment class
 *
 * @package Qualification
 * @access public
 * @author Iyngaran Iyathurai <iyngaran55@gmail.com>
 * @date 2014-07-22
 */
class Base_Model_ObtorLib_App_Core_Qualification_Entity_Attachment
{

    // variables...
    private $id;
    private $attachmentTitle;
    private $attachmentDescription;
    private $comments;
    private $docPath;
    private $relId;
    private $relObject;

    public function getId() {
        return $this->id;
    }

    public function getAttachmentTitle() {
        return $this->attachmentTitle;
    }

    public function getAttachmentDescription() {
        return $this->attachmentDescription;
    }

    public function getDocPath() {
        return $this->docPath;
    }

    public function getRelId() {
        return $this->relId;
    }

    public function getRelObject() {
        return $this->relObject;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function setAttachmentTitle($attachmentTitle) {
        $this->attachmentTitle = $attachmentTitle;
    }

    public function setAttachmentDescription($attachmentDescription) {
        $this->attachmentDescription = $attachmentDescription;
    }

    public function setDocPath($docPath) {
        $this->docPath = $docPath;
    }

    public function setRelId($relId) {
        $this->relId = $relId;
    }

    public function setRelObject($relObject) {
        $this->relObject = $relObject;
    }



}
?>