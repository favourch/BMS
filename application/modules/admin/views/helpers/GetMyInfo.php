<?php
class Zend_View_Helper_GetMyInfo
{
	public function getMyInfo()
	{
            // get employee...
            $userInfo = Zend_Registry::get('userInfo');
            return unserialize($userInfo->user);
            
	}
}