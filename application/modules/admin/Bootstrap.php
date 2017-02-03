<?php

class Admin_Bootstrap extends Zend_Application_Module_Bootstrap {

    /**
     * Initialize the application autoload
     *
     * @return Zend_Application_Module_Autoloader
     */
    protected function _initAppAutoload() {

        // the session to store the logged in administrator information....
        $userInfo = new Zend_Session_Namespace('userInfo');
        Zend_Registry::set('userInfo', $userInfo);
    }

}
?>