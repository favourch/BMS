<?php
class Zend_View_Helper_GetDepartment
{
	public function getDepartment($departmentId)
	{
            // get all the Regions...
            $departmentService = new Base_Model_ObtorLib_App_Core_Catalog_Service_Department();
            return $departmentService->getDepartment($departmentId);
	}
}