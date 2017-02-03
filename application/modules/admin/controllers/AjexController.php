<?php

class Admin_AjexController extends Base_Model_ObtorLib_App_Admin_Controller {

    public function init() {
        parent::init();
        
    }

    /**
     * The default action - show the home page
     */
    public function loadRegionAction() {
        try {
            $this->_helper->layout()->disableLayout();
            $pageHeading = "Regions";
            $this->view->page_heading = $pageHeading;
            $this->view->data_page = "tables";

            $countryId = $this->_request->getParam('countryId');
            // get all the Regions...
            $regionService = new Base_Model_ObtorLib_App_Core_Catalog_Service_Region();
            $regionEntity  = new Base_Model_ObtorLib_App_Core_Catalog_Entity_Region();
            $regionEntity->setCountry($countryId);
            $regionService->region = $regionEntity;
            $regions = $regionService->search();
            $this->view->regions = $regions;
        } catch (Exception $ex) {
            throw new Exception('<ERROR>' . $ex->getMessage() . "\n");
        }
    }
    
    
    /**
     * The default action - show the home page
     */
    public function loadBranchAction() {
        try {
            $this->_helper->layout()->disableLayout();
            $pageHeading = "Branches";
            $this->view->page_heading = $pageHeading;
            $this->view->data_page = "tables";

            $regionId = $this->_request->getParam('regionId');
            // get all the Regions...
            $branchService = new Base_Model_ObtorLib_App_Core_Catalog_Service_Branch();
            $branchEntity  = new Base_Model_ObtorLib_App_Core_Catalog_Entity_Branch();
            $branchEntity->setRegion($regionId);
            $branchService->branch = $branchEntity;
            $branches = $branchService->search();
            $this->view->branches = $branches;
        } catch (Exception $ex) {
            throw new Exception('<ERROR>' . $ex->getMessage() . "\n");
        }
    }
    
    
    /**
     * The default action - show the home page
     */
    public function loadDepartmentAction() {
        try {
            $this->_helper->layout()->disableLayout();
            $pageHeading = "Department";
            $this->view->page_heading = $pageHeading;
            $this->view->data_page = "tables";

            $branchId = $this->_request->getParam('branchId');
            // get all the Regions...
            $departmentService = new Base_Model_ObtorLib_App_Core_Catalog_Service_Department();
            $departmentEntity  = new Base_Model_ObtorLib_App_Core_Catalog_Entity_Department();
            $departmentEntity->setBranch($branchId);
            $departmentService->department = $departmentEntity;
            $departments = $departmentService->search();
            $this->view->departments = $departments;
        } catch (Exception $ex) {
            throw new Exception('<ERROR>' . $ex->getMessage() . "\n");
        }
    }
    
    
    /**
     * The default action - show the home page
     */
    public function loadModelAction() {
        try {
            $this->_helper->layout()->disableLayout();
            $pageHeading = "Department";
            $this->view->page_heading = $pageHeading;
            $this->view->data_page = "tables";

            $categoryId = $this->_request->getParam('categoryId');
            // get all the Modles...
            $modelService = new Base_Model_ObtorLib_App_Core_Catalog_Service_Model();
            $modelEntity  = new Base_Model_ObtorLib_App_Core_Catalog_Entity_Model();
            $modelEntity->setCategory($categoryId);
            $modelService->model = $modelEntity;
            $models = $modelService->search();
            $this->view->models = $models;
        } catch (Exception $ex) {
            throw new Exception('<ERROR>' . $ex->getMessage() . "\n");
        }
    }
    
        
    /**
     * The add action
     */
    public function eventsAction() {
        try {
            
             $this->_helper->layout()->disableLayout();
             $objCalendarEntity = new Base_Model_ObtorLib_App_Core_System_Entity_Calendar();
             $objCalendarService = new Base_Model_ObtorLib_App_Core_System_Service_Calendar();
             $objCalendarService->calendar = $objCalendarEntity;
             $eventCalender = $objCalendarService->search();
             $this->view->eventCalender = $eventCalender;
  
        } catch (Exception $ex) {
            throw new Exception('<ERROR>' . $ex->getMessage() . "\n");
        }
    }
    
        public function quickAddEventsAction() {
        try {
            
             $title = $this->_request->getParam('title');
             $dateOn = $this->_request->getParam('dateOn');
             $allDay = $this->_request->getParam('allDay');
             
             $startDate = $this->makeStartDate($dateOn);
             $endDate = $this->makeEndDate($dateOn);
             
             
             $this->_helper->layout()->disableLayout();
             $objCalendarEntity = new Base_Model_ObtorLib_App_Core_System_Entity_Calendar();
             $objCalendarService = new Base_Model_ObtorLib_App_Core_System_Service_Calendar();
             $objCalendarEntity->setTitle($title);
             $objCalendarEntity->setStartDate($startDate);
             $objCalendarEntity->setEndDate($endDate);
             $objCalendarEntity->setTitleCategory($title);
             $objCalendarEntity->setAllDay($allDay);
             $objCalendarEntity->setAddedBy($this->getUserId());
             $objCalendarEntity->setAddedOn($this->getSystemDateTime());
             $objCalendarEntity->setUpdatedBy($this->getUserId());
             $objCalendarEntity->setUpdatedOn($this->getSystemDateTime());
             $objCalendarService->calendar = $objCalendarEntity;
             $objCalendarService->addCalendar();
             print("Updated");
             exit;

  
        } catch (Exception $ex) {
            throw new Exception('<ERROR>' . $ex->getMessage() . "\n");
        }
    }
    
    
    public function addEventAction() {
        try {
            
             $title = $this->_request->getParam('title');
             $startDateOn = $this->_request->getParam('startDateOn');
             $endDateOn = $this->_request->getParam('endDateOn');
             $category = $this->_request->getParam('category');
             $allDay = $this->_request->getParam('allDay');
             
             $startDate = $this->makeStartDate($startDateOn);
             $endDate = $this->makeEndDate($endDateOn);
             
             
             $this->_helper->layout()->disableLayout();
             $objCalendarEntity = new Base_Model_ObtorLib_App_Core_System_Entity_Calendar();
             $objCalendarService = new Base_Model_ObtorLib_App_Core_System_Service_Calendar();
             $objCalendarEntity->setTitle($title);
             $objCalendarEntity->setStartDate($startDate);
             $objCalendarEntity->setEndDate($endDate);
             $objCalendarEntity->setTitleCategory($category);
             $objCalendarEntity->setAllDay($allDay);
             $objCalendarEntity->setAddedBy($this->getUserId());
             $objCalendarEntity->setAddedOn($this->getSystemDateTime());
             $objCalendarEntity->setUpdatedBy($this->getUserId());
             $objCalendarEntity->setUpdatedOn($this->getSystemDateTime());
             $objCalendarService->calendar = $objCalendarEntity;
             $objCalendarService->addCalendar();
             print("Updated");
             exit;

  
        } catch (Exception $ex) {
            throw new Exception('<ERROR>' . $ex->getMessage() . "\n");
        }
    }
    
    
    public function quickUpdateEventAction() {
        try {
            
             $eventId = $this->_request->getParam('id');
             $title = $this->_request->getParam('title');
             $dateOn = $this->_request->getParam('dateOn');
             $allDay = $this->_request->getParam('allDay');
             
             $startDate = $this->makeStartDate($dateOn);
             $endDate = $this->makeEndDate($dateOn);
             
             
             $this->_helper->layout()->disableLayout();
             $objCalendarEntity = new Base_Model_ObtorLib_App_Core_System_Entity_Calendar();
             $objCalendarService = new Base_Model_ObtorLib_App_Core_System_Service_Calendar();
             $objCalendarEntity->setId($eventId);
             $objCalendarEntity->setTitle($title);
             $objCalendarEntity->setStartDate($startDate);
             $objCalendarEntity->setEndDate($endDate);
             $objCalendarEntity->setTitleCategory($title);
             $objCalendarEntity->setAllDay($allDay);
             $objCalendarEntity->setAddedBy($this->getUserId());
             $objCalendarEntity->setAddedOn($this->getSystemDateTime());
             $objCalendarEntity->setUpdatedBy($this->getUserId());
             $objCalendarEntity->setUpdatedOn($this->getSystemDateTime());
             $objCalendarService->calendar = $objCalendarEntity;
             $objCalendarService->updateCalendar();
             print("Updated");
             exit;

  
        } catch (Exception $ex) {
            throw new Exception('<ERROR>' . $ex->getMessage() . "\n");
        }
    }
    
    
            public function deleteEventAction() {
        try {
            
             $event_id = $this->_request->getParam('event_id');
             
             $this->_helper->layout()->disableLayout();
             $objCalendarEntity = new Base_Model_ObtorLib_App_Core_System_Entity_Calendar();
             $objCalendarService = new Base_Model_ObtorLib_App_Core_System_Service_Calendar();
             $objCalendarEntity->setId($event_id);
             $objCalendarService->calendar = $objCalendarEntity;
             $objCalendarService->deleteEvent();
             print("Deleted");
             exit;

  
        } catch (Exception $ex) {
            throw new Exception('<ERROR>' . $ex->getMessage() . "\n");
        }
    }
    
    
    public function updateEventDateAction() {
        try {
            
             $eventId = $this->_request->getParam('id');
             $startDateOn = $this->_request->getParam('startDate');
             $endDateOn = $this->_request->getParam('endDate');
            
             
             $startDate = $this->makeStartDate($startDateOn);
             $endDate = $this->makeEndDate($endDateOn);
             
             
             $this->_helper->layout()->disableLayout();
             $objCalendarEntity = new Base_Model_ObtorLib_App_Core_System_Entity_Calendar();
             $objCalendarService = new Base_Model_ObtorLib_App_Core_System_Service_Calendar();
             $objCalendarEntity->setId($eventId);
             $objCalendarEntity->setStartDate($startDate);
             $objCalendarEntity->setEndDate($endDate);
             $objCalendarEntity->setUpdatedBy($this->getUserId());
             $objCalendarEntity->setUpdatedOn($this->getSystemDateTime());
             $objCalendarService->calendar = $objCalendarEntity;
             $objCalendarService->updateCalendarDate();
             print("Updated");
             exit;

  
        } catch (Exception $ex) {
            throw new Exception('<ERROR>' . $ex->getMessage() . "\n");
        }
    }

}
