<?php

class Admin_AnnouncementController extends Base_Model_ObtorLib_App_Admin_Controller {

    public function init() {
        parent::init();
    }

    /**
     * The default action - show the home page
     */
    public function indexAction() {
        try {
            $pageHeading = "Latest-Announcement";
            $this->view->page_heading = $pageHeading;
            $this->view->data_page = "tables";
            
            $announce_to = $this->_request->getParam('announce-to');
            $announce_media = $this->_request->getParam('announce-media');
            $status = $this->_request->getParam('status');
            $announcement_subject = $this->_request->getParam('announcement-subject');
            
              
            // get all the user all users...
            $objAnnouncementService = new Base_Model_ObtorLib_App_Core_Announcement_Service_Announcement();
            $objAnnouncementEntity = new Base_Model_ObtorLib_App_Core_Announcement_Entity_Announcement();
            $objAnnouncementEntity->setAnnounceTo($announce_to);
            $objAnnouncementEntity->setAnnounceType($announce_media);
            $objAnnouncementEntity->setStatus($status);
            $objAnnouncementEntity->setSubject($announcement_subject);
            $objAnnouncementService->announcement = $objAnnouncementEntity;

            $objPaggination = new Base_Model_ObtorLib_Base_Lib_Paggination();
            $page = $this->_getParam('page', 1);
            $objPaggination->CurrentPage = $page;
            $objPaggination->TotalResults = $objAnnouncementService->searchCount();
            $paginationData = $objPaggination->getPaggingData();
            $pageLimit1 = $paginationData['MYSQL_LIMIT1'];
            $pageLimit2 = $paginationData['MYSQL_LIMIT2'];

            $limit = " LIMIT $pageLimit1,$pageLimit2";


            $objAnnouncementService->announcement = $objAnnouncementEntity;
            $announcementListInfo = $objAnnouncementService->search($limit);
            $this->view->announcementListInfo = $announcementListInfo;

            $this->view->pageNum = $page;
            $this->view->rowsPerPage = $objPaggination->ResultsPerPage;
            $this->view->paggination = $objPaggination;
                
        } catch (Exception $ex) {
            throw new Exception('<ERROR>' . $ex->getMessage() . "\n");
        }
    }

    /**
     * The add action
     */
    public function recipientListAction() {
        try {
            $pageHeading = "Add-Recipient-List-For-Announcement";
            $this->view->page_heading = $pageHeading;
            $this->view->data_page = "forms";
            
            
            // get all the user all users...
            $employee_status = "In-Service";
            $employeeService = new Base_Model_ObtorLib_App_Core_Employee_Service_Employee();
            $employeeEntity = new Base_Model_ObtorLib_App_Core_Employee_Entity_Employee();
            $employeeEntity->setEmployeeStatus($employee_status);
            $employeeService->employee = $employeeEntity;
            $employeeInfo = $employeeService->search();
            $this->view->employeeInfo = $employeeInfo;
            
            $objAnnouncementQueueService = new Base_Model_ObtorLib_App_Core_Announcement_Service_AnnouncementQueue();
            
            
             if ($this->_request->isPost()) {
                 $announcementId =  $this->_request->getParam('announcementId');
                 $queLists =  $this->_request->getParam('txtRecList');
                 foreach($queLists As $queList){
                     
                     $objAnnouncementQueueEntity = new Base_Model_ObtorLib_App_Core_Announcement_Entity_AnnouncementQueue();
                     $objAnnouncementQueueEntity->setStaffId($queList);
                     $objAnnouncementQueueEntity->setAddedOn($this->getSystemDateTime());
                     $objAnnouncementQueueEntity->setAnnouncement($announcementId);
                     $objAnnouncementQueueEntity->setCustomerId($queList);
                     $objAnnouncementQueueEntity->setStatus('Pending');
                     $objAnnouncementQueueEntity->setUpdatedOn($this->getSystemDateTime());
                     $objAnnouncementQueueService->announcementQueue = $objAnnouncementQueueEntity;
                     $objAnnouncementQueueService->addAnnouncementQueue();
                 }
                 $this->_redirect("/admin/announcement/?action-status=recipient-list-updated");

             }
            
            
        } catch (Exception $ex) {
            throw new Exception('<ERROR>' . $ex->getMessage() . "\n");
        }
    }
    
    /**
     * The add action
     */
    public function addAnnouncementAction() {
        try {
            $pageHeading = "Add-New-Announcement";
            $this->view->page_heading = $pageHeading;
            $this->view->data_page = "forms";

            $objAnnouncementService = new Base_Model_ObtorLib_App_Core_Announcement_Service_Announcement();
            $objAnnouncementEntity = new Base_Model_ObtorLib_App_Core_Announcement_Entity_Announcement();
            
            if ($this->_request->isPost()) {
                $objAnnouncementEntity->setAnnounceTo($this->_request->getParam('announce-to'));
                $objAnnouncementEntity->setAnnounceType($this->_request->getParam('announce-media'));
                $objAnnouncementEntity->setSubject($this->_request->getParam('txtAnnouncementSubject'));
                $objAnnouncementEntity->setMessage($this->_request->getParam('txtMessage'));
                $objAnnouncementEntity->setStatus('Pending');
                $objAnnouncementEntity->setAddedBy($this->getUserId());
                $objAnnouncementEntity->setAddedOn($this->getSystemDateTime());
                $objAnnouncementService->announcement = $objAnnouncementEntity;
                $announcementId = $objAnnouncementService->addAnnouncement();
                if ($announcementId) {
                    $this->_redirect("/admin/announcement/recipient-list/?announcementId=".$announcementId."&action-status=select-recipient-list");
                } else {
                    $this->_redirect("/admin/announcement/add-announcement/?action-status=failed");
                }
            }
            
            
        } catch (Exception $ex) {
            throw new Exception('<ERROR>' . $ex->getMessage() . "\n");
        }
    }

    
        /**
     * The add action
     */
    public function editAnnouncementAction() {
        try {
            $pageHeading = "Edit-Announcement";
            $this->view->page_heading = $pageHeading;
            $this->view->data_page = "forms";

            $objAnnouncementService = new Base_Model_ObtorLib_App_Core_Announcement_Service_Announcement();
            $objAnnouncementEntity = new Base_Model_ObtorLib_App_Core_Announcement_Entity_Announcement();
            
            if ($this->_request->isPost()) {
                $objAnnouncementEntity->setId($this->_request->getParam('id'));
                $objAnnouncementEntity->setAnnounceTo($this->_request->getParam('announce-to'));
                $objAnnouncementEntity->setAnnounceType($this->_request->getParam('announce-media'));
                $objAnnouncementEntity->setSubject($this->_request->getParam('txtAnnouncementSubject'));
                $objAnnouncementEntity->setMessage($this->_request->getParam('txtMessage'));
                $objAnnouncementEntity->setStatus('Pending');
                $objAnnouncementEntity->setAddedBy($this->getUserId());
                $objAnnouncementEntity->setAddedOn($this->getSystemDateTime());
                $objAnnouncementService->announcement = $objAnnouncementEntity;
                $announcementUpdated = $objAnnouncementService->updateAnnouncement();
                if ($announcementUpdated) {
                    $this->_redirect("/admin/announcement/?action-status=updated");
                } else {
                    $this->_redirect("/admin/announcement/?action-status=failed");
                }
            } else {
                
                 $recordId = $this->_request->getParam('id');
                 $announcementInfo    = $objAnnouncementService->getAnnouncement($recordId);
                 $this->view->announcementInfo = $announcementInfo;
                
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
            $pageHeading = "View-Announcement";
            $this->view->page_heading = $pageHeading;
            $this->view->data_page = "forms";

            $objAnnouncementService = new Base_Model_ObtorLib_App_Core_Announcement_Service_Announcement();
            $recordId = $this->_request->getParam('id');
            $announcementInfo    = $objAnnouncementService->getAnnouncement($recordId);
            $this->view->announcementInfo = $announcementInfo;
            
            // announcement que....
            $objAnnouncementQueueService = new Base_Model_ObtorLib_App_Core_Announcement_Service_AnnouncementQueue();
            $objAnnouncementQueueEntity = new Base_Model_ObtorLib_App_Core_Announcement_Entity_AnnouncementQueue();
            $objAnnouncementQueueEntity->setAnnouncement($recordId);
            $objAnnouncementQueueService->announcementQueue = $objAnnouncementQueueEntity;
            $announcementQueueList = $objAnnouncementQueueService->search();
            $this->view->announcementQueueList = $announcementQueueList;
            
        } catch (Exception $ex) {
            throw new Exception('<ERROR>' . $ex->getMessage() . "\n");
        }
    }
    
    
    /**
     * The add action
     */
    public function deleteAction() {
        try {
            $pageHeading = "View-Test";
            $this->view->page_heading = $pageHeading;
            $this->view->data_page = "forms";

            $recordId = $this->_request->getParam('id');
            $objAnnouncementService = new Base_Model_ObtorLib_App_Core_Announcement_Service_Announcement();
            $objAnnouncementEntity = new Base_Model_ObtorLib_App_Core_Announcement_Entity_Announcement();
            $objAnnouncementEntity->setId($recordId);
            $objAnnouncementService->announcement = $objAnnouncementEntity;
            $announcementDeleted = $objAnnouncementService->deleteAnnouncement();
            
            // announcement que....
            $objAnnouncementQueueService = new Base_Model_ObtorLib_App_Core_Announcement_Service_AnnouncementQueue();
            $objAnnouncementQueueEntity = new Base_Model_ObtorLib_App_Core_Announcement_Entity_AnnouncementQueue();
            $objAnnouncementQueueEntity->setAnnouncement($recordId);
            $objAnnouncementQueueService->announcementQueue = $objAnnouncementQueueEntity;
            $announcementQueueList = $objAnnouncementQueueService->search();
            
            foreach($announcementQueueList As $aIndex=>$announcementQueue){
            
                $objAnnouncementQueueEntity = new Base_Model_ObtorLib_App_Core_Announcement_Entity_AnnouncementQueue();
                $objAnnouncementQueueEntity->setId($announcementQueue->getId());
                $objAnnouncementQueueService->announcementQueue = $objAnnouncementQueueEntity;
                $objAnnouncementQueueService->deleteAnnouncementQueue();
                
            }
            $this->_redirect("/admin/announcement/?action-status=deleted");
            
            
        } catch (Exception $ex) {
            throw new Exception('<ERROR>' . $ex->getMessage() . "\n");
        }
    }
    
           /**
     * The professionalExperience action
     */
    public function searchAction() {
        try {
            $pageHeading = "Search-Announcement";
            $this->view->page_heading = $pageHeading;
            $this->view->data_page = "tables";
            
            
        } catch (Exception $ex) {
            throw new Exception('<ERROR>' . $ex->getMessage() . "\n");
        }
    }
    

}
