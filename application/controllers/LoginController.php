<?php

class LoginController extends Base_Model_ObtorLib_Base_Controller_System
{

	public function init()
	{
		/* Initialize action controller here */
                parent::init();
	}

	public function indexAction()
	{
            $this->_helper->layout->setLayout ( 'staff/login_layout' );
            
                   $pageHeading = "Login";
            $this->view->page_heading = $pageHeading;
            $this->view->data_page = "login";

            
              if ($this->_request->isPost()) {

                $employeeService = new Base_Model_ObtorLib_App_Core_Employee_Service_Employee();
                $employeeEntity = new Base_Model_ObtorLib_App_Core_Employee_Entity_Employee();
                $employeeEntity->setEMailAddressOffice($this->_request->getParam('txtUsername'));
                $employeeEntity->setPassword(md5($this->_request->getParam('txtPassword')));
                $employeeService->employee = $employeeEntity;
                $loggedInUser = $employeeService->doLogin();
                if (is_null($loggedInUser)) {
                    $this->_redirect('/login/?error=invalid-username-or-password');
                } else {
                    
                    
                    $ipAddress = $this->getRealIpAddr();
                    $loginHistoryId = 0;
                      // store the current user's details into the registry...
                    $staffUserInfo = Zend_Registry::get('staffUserInfo');
                    $staffUserInfo->user = serialize($loggedInUser);
                    $staffUserInfo->logedInTime = $this->getSystemDateTime();
                    $staffUserInfo->loginHistoryId = $loginHistoryId;
                    $staffUserInfo->loginFromIP = $ipAddress;
                    $staffUserInfo->userType = 'staff';
                    Zend_Registry::set('staffUserInfo', $staffUserInfo);
                    // add the login details to the system logs....
                    $actionName = 'LOGIN';
                    $logMessage = $loggedInUser->getFullName()." has logged into the system from ".$this->getRealIpAddr();
                    $tableName = 'tbl_employee';
                    $rowId = $loggedInUser->getId();
                   // $this->addSystemLog($actionName, $logMessage, $tableName, $rowId);
                  
                    $this->_redirect('/');
                }
            }
            
            
	}
        
        
        /**
     * The default action - show the home page
     */
    public function logoutAction() {
        try {
            $this->_helper->layout()->disableLayout();
            $pageHeading = "Login";
            $this->view->page_heading = $pageHeading;
            $this->view->data_page = "login";


                    
                    $staffUserInfo = Zend_Registry::get('staffUserInfo');
                    unset($staffUserInfo->user);
                    unset($staffUserInfo->logedInTime);
                    unset($staffUserInfo->loginHistoryId);
                    unset($staffUserInfo->userType);
                    unset($staffUserInfo);
                    Zend_Registry::set('staffUserInfo',$staffUserInfo);
                    
                    $this->_redirect('/login/');
            
            
        } catch (Exception $ex) {
            throw new Exception('<ERROR>' . $ex->getMessage() . "\n");
        }
    }

    
        /**
     * The default action - show the home page
     */
    public function resetPasswordAction() {
        try {
            $this->_helper->layout->setLayout ( 'login_layout' );
            $pageHeading = "Reset-Password";
            $this->view->page_heading = $pageHeading;
            $this->view->data_page = "login";

        } catch (Exception $ex) {
            throw new Exception('<ERROR>' . $ex->getMessage() . "\n");
        }
    }
    
            /**
     * The default action - show the home page
     */
    public function lockscreenAction() {
        try {
            $this->_helper->layout->setLayout ( 'login_layout' );
            $pageHeading = "Lock-Screen";
            $this->view->page_heading = $pageHeading;
            $this->view->data_page = "login";

        } catch (Exception $ex) {
            throw new Exception('<ERROR>' . $ex->getMessage() . "\n");
        }
    }


}