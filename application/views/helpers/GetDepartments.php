<?php
class Zend_View_Helper_GetDepartments
{
	public function getDepartments($branchId)
	{
            // get all the Regions...
            $departmentService = new Base_Model_ObtorLib_App_Core_Catalog_Service_Department();
            $departmentEntity  = new Base_Model_ObtorLib_App_Core_Catalog_Entity_Department();
            $departmentEntity->setBranch($branchId);
            $departmentService->department = $departmentEntity;
            $departments = $departmentService->search();
            return $departments;
	}
}