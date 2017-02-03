<?php

class Admin_IndexController extends Base_Model_Lib_App_Admin_Controller {


    public function init() {
        parent::init();
    }

    /**
     * The default action - show the home page
     */
    public function indexAction() {
        try {
            $pageHeading = "Dashboard";
            $this->view->page_heading = $pageHeading;
            $this->view->data_page = "dashboard";
            
        } catch (Exception $ex) {
            throw new Exception('<ERROR>' . $ex->getMessage() . "\n");
        }
    }

}
