<?php
class Zend_View_Helper_GetAdminUser
{
	public function getAdminUser($userId)
	{
            // get employee...
            $userService = new Base_Model_ObtorLib_App_Core_User_Service_User();
            return $userService->getUser($userId);
	}
}