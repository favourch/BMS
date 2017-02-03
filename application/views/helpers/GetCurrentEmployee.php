<?php
class Zend_View_Helper_GetCurrentEmployee
{
	public function getCurrentEmployee()
	{
           $staffUserInfo = Zend_Registry::get('staffUserInfo');
           return unserialize($staffUserInfo->user);
	}
}