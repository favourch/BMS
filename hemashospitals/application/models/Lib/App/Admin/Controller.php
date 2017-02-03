<?php

/**
 * @namespace       : Base
 * @package         : Model
 * @subpackage 	    : Lib.Admin
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
class Base_Model_Lib_App_Admin_Controller extends Base_Model_Lib_Base_Controller_System {

    private $_moduleTitle = "Administration-Panel-ObtorEBMS";
    protected $_pageTitle = null;
    private $_version_number = "1.0.3";

    public function init() {
        parent::init();
        
        $userInfo = Zend_Registry::get('userInfo');
        if($userInfo->userType != 'admin'){
            $this->_redirect('/admin/login/');
        }
        
        $this->view->pageTitle = $this->getModuleTitle();
        $this->view->versionNumber = $this->getVersionNumber();


        // get action status from url and assign to view...
        $action_status = $this->_request->getParam('action-status');
        $this->view->action_status = $action_status;
    }

    protected function getModuleTitle() {
        return $this->_moduleTitle;
    }

    protected function getVersionNumber() {
        return $this->_version_number;
    }

}