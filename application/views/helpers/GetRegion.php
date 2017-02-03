<?php
class Zend_View_Helper_GetRegion
{
	public function getRegion($regionId)
	{
            // get a region info...
            $regionService = new Base_Model_ObtorLib_App_Core_Catalog_Service_Region();
            $regionInfo    = $regionService->getRegion($regionId); 
            return $regionInfo;
	}
}