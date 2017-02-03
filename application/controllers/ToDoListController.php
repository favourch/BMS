<?php

class ToDoListController extends Base_Model_ObtorLib_App_Staff_Controller {

    public function init() {
        parent::init();
    }

    /**
     * The default action - show the home page
     */
    public function indexAction() {
        try {
            $pageHeading = "My-To-Do-List";
            $this->view->page_heading = $pageHeading;
            $this->view->data_page = "tables";

            $title = $this->_request->getParam('q');
            $status = $this->_request->getParam('status');
            
            // get all the toDoList...
            $toDoListService = new Base_Model_ObtorLib_App_Core_Crm_Service_ToDoList();
            $toDoListEntity = new Base_Model_ObtorLib_App_Core_Crm_Entity_ToDoList();
            $toDoListEntity->setAddedByUserObject('Staff');
            $toDoListEntity->setListTitle($title);
            $toDoListEntity->setListDescription($title);
            $toDoListEntity->setStatus($status);
            $toDoListEntity->setAddedBy($this->getStaffUserId());
            $toDoListService->toDoList = $toDoListEntity;

            $objPaggination = new Base_Model_ObtorLib_Base_Lib_Paggination();
            $page = $this->_getParam('page', 1);
            $objPaggination->CurrentPage = $page;
            $objPaggination->TotalResults = $toDoListService->searchCount();
            $paginationData = $objPaggination->getPaggingData();
            $pageLimit1 = $paginationData['MYSQL_LIMIT1'];
            $pageLimit2 = $paginationData['MYSQL_LIMIT2'];

            $limit = " LIMIT $pageLimit1,$pageLimit2";


            $toDoListService->toDoList = $toDoListEntity;
            $toDoListInfo = $toDoListService->search($limit);
            $this->view->toDoListInfo = $toDoListInfo;

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
    public function addAction() {
        try {
            $pageHeading = "Add-New-ToDoList";
            $this->view->page_heading = $pageHeading;
            $this->view->data_page = "forms";

            // add new toDoList name...
            $toDoListService = new Base_Model_ObtorLib_App_Core_Crm_Service_ToDoList();
            $toDoListEntity = new Base_Model_ObtorLib_App_Core_Crm_Entity_ToDoList();
            
            if ($this->_request->isPost()) {
                $toDoListEntity->setListTitle($this->_request->getParam('txtTitle'));
                $toDoListEntity->setListDescription($this->_request->getParam('txtDescription'));
                $toDoListEntity->setReminderOn($this->_request->getParam('cmbReminderOn'));
                $toDoListEntity->setReminderDate($this->_request->getParam('txtReminderDateOn'));
                $toDoListEntity->setAddedOn($this->getSystemDateTime());
                $toDoListEntity->setAddedBy($this->getStaffUserId());
                $toDoListEntity->setAddedByUserObject('Staff');
                $toDoListEntity->setStatus('Active');
                $toDoListService->toDoList = $toDoListEntity;
                $toDoListId = $toDoListService->addToDoList();
                if ($toDoListId) {
                    $this->_redirect("/to-do-list/?action-status=updated");
                } else {
                    $this->_redirect("/to-do-list/?action-status=failed");
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
            $pageHeading = "Edit-ToDoList";
            $this->view->page_heading = $pageHeading;
            $this->view->data_page = "forms";

           // add new toDoList name...
            $toDoListService = new Base_Model_ObtorLib_App_Core_Crm_Service_ToDoList();
            $toDoListEntity = new Base_Model_ObtorLib_App_Core_Crm_Entity_ToDoList();
            
            if ($this->_request->isPost()) {
                $toDoListId = $this->_request->getParam('id');
                $toDoListEntity->setId($toDoListId);
                $toDoListEntity->setListTitle($this->_request->getParam('txtTitle'));
                $toDoListEntity->setListDescription($this->_request->getParam('txtDescription'));
                $toDoListEntity->setReminderOn($this->_request->getParam('cmbReminderOn'));
                $toDoListEntity->setReminderDate($this->_request->getParam('txtReminderDateOn'));
                $toDoListEntity->setAddedOn($this->getSystemDateTime());
                $toDoListEntity->setAddedBy($this->getStaffUserId());
                $toDoListEntity->setAddedByUserObject('Staff');
                $toDoListEntity->setStatus('Active');
                $toDoListService->toDoList = $toDoListEntity;
                $updated = $toDoListService->updateToDoList();
                if ($updated) {
                    $this->_redirect("/to-do-list/?action-status=updated");
                } else {
                    $this->_redirect("/to-do-list/?action-status=failed");
                }
            } else {
                $toDoListId = $this->_request->getParam('id');
                $toDoListInfo = $toDoListService->getToDoList($toDoListId);
                $this->view->toDoListInfo = $toDoListInfo;
            }
        } catch (Exception $ex) {
            throw new Exception('<ERROR>' . $ex->getMessage() . "\n");
        }
    }

    

    /**
     * The add action
     */
    public function deleteAction() {
        try {
            $pageHeading = "Delete-ToDoList";
            $this->view->page_heading = $pageHeading;
            $this->view->data_page = "forms";

            // delete toDoList....
            $status = 'Completed';
            $toDoListService = new Base_Model_ObtorLib_App_Core_Crm_Service_ToDoList();
            $toDoListEntity = new Base_Model_ObtorLib_App_Core_Crm_Entity_ToDoList();
            $toDoListEntity->setId($this->_request->getParam('id'));
            $toDoListEntity->setStatus($status);
            $toDoListService->toDoList = $toDoListEntity;
            $toDoListId = $toDoListService->updateStatus();
            if ($toDoListId) {
                $this->_redirect("/to-do-list/?action-status=deleted");
            } else {
                $this->_redirect("/to-do-list/?action-status=failed");
            }
        } catch (Exception $ex) {
            throw new Exception('<ERROR>' . $ex->getMessage() . "\n");
        }
    }
    
    
        /**
     * The add action
     */
    public function searchAction() {
        try {
            $pageHeading = "Search-ToDoList";
            $this->view->page_heading = $pageHeading;
            $this->view->data_page = "forms";

         
        } catch (Exception $ex) {
            throw new Exception('<ERROR>' . $ex->getMessage() . "\n");
        }
    }

}
