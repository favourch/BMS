<?php

/**
 * @namespace       : Base
 * @package         : Model
 * @subpackage 	    : ObtorLib.Admin
 * @name 	    : Controller
 * @author 	    : Iyngaran Iyathurai
 * 	              Software eng - Bcas R&D
 * 	              E-Mail - Iyngaran55@yahoo.com, Iyngaran@bcas.lk
 *
 * @copyright Copyright (c) 2009 - 2010 BCAS R&D . (http://www.lab.bcasrd.com)
 *
 * Description : The base admin controller for the application
 *
 */
class Base_Model_ObtorLib_App_Staff_Controller extends Base_Model_ObtorLib_Base_Controller_System {

    private $_moduleTitle = "Administration-Panel-ObtorEBMS";
    protected $_pageTitle = null;
    private $_version_number = "1.0.3";

    public function init() {
        parent::init();
        
        $staffUserInfo = Zend_Registry::get('staffUserInfo');
        if($staffUserInfo->userType != 'staff'){
           $this->_redirect('/login/');
       }
        
        $this->view->pageTitle = $this->getModuleTitle();
        $this->view->versionNumber = $this->getVersionNumber();


        // get action status from url and assign to view...
        $action_status = $this->_request->getParam('action-status');
        $this->view->action_status = $action_status;
        
         $rel = $this->_request->getParam('rel');
         $this->view->actionRel = $rel;
         
          $status = $this->_request->getParam('status');
         $this->view->actionStatus = $status;
         
    }

    protected function getModuleTitle() {
        return $this->_moduleTitle;
    }

    protected function getVersionNumber() {
        return $this->_version_number;
    }

}