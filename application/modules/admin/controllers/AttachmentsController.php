<?php

class Admin_AttachmentsController extends Base_Model_ObtorLib_App_Admin_Controller {

    public function init() {
        parent::init();
    }

    /**
     * The default action - show the home page
     */
    public function indexAction() {
        try {
            $pageHeading = "Attachments";
            $this->view->page_heading = $pageHeading;
            $this->view->data_page = "tables";
            
            $relId = $this->_request->getParam('rel-id');
            $relObject = $this->_request->getParam('rel-object');
            
            // get all the professional experiences for the selected staff ...
            $attachmentsService = new Base_Model_ObtorLib_App_Core_Qualification_Service_Attachment();
            $attachmentsEntity  = new Base_Model_ObtorLib_App_Core_Qualification_Entity_Attachment();
            $attachmentsEntity->setRelId($relId);
            $attachmentsEntity->setRelObject($relObject);
            $attachmentsService->attachment = $attachmentsEntity;
            $attachments = $attachmentsService->search();
            $this->view->attachments = $attachments;
            
            $this->view->relId = $relId;
            $this->view->relObject = $relObject;
            
            
        } catch (Exception $ex) {
            throw new Exception('<ERROR>' . $ex->getMessage() . "\n");
        }
    }

    /**
     * The add action
     */
    public function addAction() {
        try {
            $pageHeading = "Add-New-Attachment";
            $this->view->page_heading = $pageHeading;
            $this->view->data_page = "forms";

           // get all the professional experiences for the selected staff ...
            $attachmentsService = new Base_Model_ObtorLib_App_Core_Qualification_Service_Attachment();
            $attachmentsEntity  = new Base_Model_ObtorLib_App_Core_Qualification_Entity_Attachment();
            
            if ($this->_request->isPost()) {
                
                $attachedFile = $_FILES['txtAttachment'];
                $attachedFileName = "";
                
                 if($attachedFile){
                    if($attachedFile['name'] != ""){
                        $attachedFileName = $this->generateSystemFileName($attachedFile['name']);
                        $attachedFileTempName = $attachedFile['tmp_name'];
                    }
                }
                
                
                $relId = $this->_request->getParam('rel-id');
                $relObject = $this->_request->getParam('rel-object');
                $attachmentsEntity->setAttachmentTitle($this->_request->getParam('txtAttachmentTitle'));
                $attachmentsEntity->setAttachmentDescription($this->_request->getParam('txtAttachmentDescription'));
                
                $attachmentsEntity->setDocPath($attachedFileName);
                $attachmentsEntity->setRelId($relId);
                $attachmentsEntity->setRelObject($relObject);

                $attachmentsService->attachment = $attachmentsEntity;

                $attachmentId = $attachmentsService->addAttachment();
                if ($attachmentId) {
                    if($attachedFileTempName){
                        move_uploaded_file($attachedFileTempName,APPLICATION_PATH.'/../uploads/attachments/'.$relObject.'/'.$attachedFileName);
                    }
                    $this->_redirect("/admin/attachments/?rel-id=".$relId."&rel-object=".$relObject."&action-status=updated");
                } else {
                    $this->_redirect("/admin/attachments/?rel-id=".$relId."&rel-object=".$relObject."&action-status=failed");
                }
            } 
        } catch (Exception $ex) {
            throw new Exception('<ERROR>' . $ex->getMessage() . "\n");
        }
    }

    /**
     * The add action
     */
    public function editAction() {
        try {
            $pageHeading = "Edit-Attachment";
            $this->view->page_heading = $pageHeading;
            $this->view->data_page = "forms";

            // get all the professional experiences for the selected staff ...
            $attachmentsService = new Base_Model_ObtorLib_App_Core_Qualification_Service_Attachment();
            $attachmentsEntity  = new Base_Model_ObtorLib_App_Core_Qualification_Entity_Attachment();
            
            if ($this->_request->isPost()) {
                
                $attachedFile = $_FILES['txtAttachment'];
                $attachedFileName = "";
                
                 if($attachedFile){
                    if($attachedFile['name'] != ""){
                        $attachedFileName = $this->generateSystemFileName($attachedFile['name']);
                        $attachedFileTempName = $attachedFile['tmp_name'];
                    }
                }

               
                $attachmentsEntity->setId($this->_request->getParam('id'));
                 $relId = $this->_request->getParam('rel-id');
                $relObject = $this->_request->getParam('rel-object');
                $attachmentsEntity->setAttachmentTitle($this->_request->getParam('txtAttachmentTitle'));
                $attachmentsEntity->setAttachmentDescription($this->_request->getParam('txtAttachmentDescription'));
                
                $attachmentsEntity->setDocPath($attachedFileName);
                $attachmentsEntity->setRelId($relId);
                $attachmentsEntity->setRelObject($relObject);

                $attachmentsService->attachment = $attachmentsEntity;

                $isUpdated = $attachmentsService->updateAttachment();
                if ($isUpdated) {
                    
                    if($attachedFileTempName){
                        move_uploaded_file($attachedFileTempName,APPLICATION_PATH.'/../uploads/attachments/'.$relObject.'/'.$attachedFileName);
                    }
                    $this->_redirect("/admin/attachments/?rel-id=".$relId."&rel-object=".$relObject."&action-status=updated");
                } else {
                    $this->_redirect("/admin/attachments/?rel-id=".$relId."&rel-object=".$relObject."&action-status=failed");
                }
            } else {
                $attachmentId = $this->_request->getParam('id');
                $attachmentsInfo = $attachmentsService->getAttachment($attachmentId);
                $this->view->attachmentsInfo = $attachmentsInfo;

            }
        } catch (Exception $ex) {
            throw new Exception('<ERROR>' . $ex->getMessage() . "\n");
        }
    }
    
    
    /**
     * The add action
     */
    public function viewAction() {
        try {
            $pageHeading = "View-Attachment";
            $this->view->page_heading = $pageHeading;
            $this->view->data_page = "forms";

           // get all the professional experiences for the selected staff ...
            $attachmentId = $this->_request->getParam('id');
            $attachmentsService = new Base_Model_ObtorLib_App_Core_Qualification_Service_Attachment();
                $attachmentsInfo = $attachmentsService->getAttachment($attachmentId);
                $this->view->attachmentsInfo = $attachmentsInfo;
                
        } catch (Exception $ex) {
            throw new Exception('<ERROR>' . $ex->getMessage() . "\n");
        }
    }

    

    /**
     * The add action
     */
    public function deleteAction() {
        try {
            $pageHeading = "Delete-Country";
            $this->view->page_heading = $pageHeading;
            $this->view->data_page = "forms";

            $relId = $this->_request->getParam('rel-id');
            $relObject = $this->_request->getParam('rel-object');
            $attachmentId = $this->_request->getParam('id');
            
            // get all the professional experiences for the selected staff ...
            $attachmentsService = new Base_Model_ObtorLib_App_Core_Qualification_Service_Attachment();
            $attachmentsEntity  = new Base_Model_ObtorLib_App_Core_Qualification_Entity_Attachment();
            $attachmentsEntity->setId($attachmentId);
            $attachmentsService->attachment = $attachmentsEntity;
            $isDeleted = $attachmentsService->deleteAttachment();
            if ($isDeleted) {
                    $this->_redirect("/admin/attachments/?rel-id=".$relId."&rel-object=".$relObject."&action-status=deleted");
                } else {
                    $this->_redirect("/admin/attachments/?rel-id=".$relId."&rel-object=".$relObject."&action-status=failed");
                }
            
        } catch (Exception $ex) {
            throw new Exception('<ERROR>' . $ex->getMessage() . "\n");
        }
    }

}
