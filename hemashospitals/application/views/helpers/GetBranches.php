<?php
class Zend_View_Helper_GetBranches
{
	public function getBranches($regionId)
	{
            // get all the Regions...
            $branchService = new Base_Model_Lib_App_Core_Catalog_Service_Branch();
            $branchEntity  = new Base_Model_Lib_App_Core_Catalog_Entity_Branch();
            $branchEntity->setRegion($regionId);
            $branchService->branch = $branchEntity;
            $branches = $branchService->search();
            return $branches;
	}
}