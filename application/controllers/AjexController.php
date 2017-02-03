<?php

class AjexController extends Base_Model_ObtorLib_App_Staff_Controller {

    public function init() {
        parent::init();
        
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

}
