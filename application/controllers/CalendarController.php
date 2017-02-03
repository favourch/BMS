<?php

class CalendarController extends Base_Model_ObtorLib_App_Staff_Controller {

    public function init() {
        parent::init();
    }

    /**
     * The default action - show the home page
     */
    public function indexAction() {
        try {
            $pageHeading = "Calendar";
            $this->view->page_heading = $pageHeading;
            $this->view->data_page = "calendar";
              
                
        } catch (Exception $ex) {
            throw new Exception('<ERROR>' . $ex->getMessage() . "\n");
        }
    }
    
    



}
