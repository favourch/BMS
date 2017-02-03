<?php
class Zend_View_Helper_GetBranch
{
	public function getBranch($branchId)
	{
            // get branch...
            $branchService = new Base_Model_ObtorLib_App_Core_Catalog_Service_Branch();
            return $branchService->getBranch($branchId);
	}
}