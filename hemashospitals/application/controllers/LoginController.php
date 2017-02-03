<?php

class LoginController extends Zend_Controller_Action
{

	public function init()
	{
		/* Initialize action controller here */
                parent::init();
	}

	public function indexAction()
	{
            $this->_helper->layout->setLayout ( 'login_layout' );
	}


}