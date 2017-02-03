<?php
class Zend_View_Helper_GetRegions
{
	public function getRegions($country)
	{
		$countryId = $country;
            // get all the Regions...
            $regionService = new Base_Model_ObtorLib_App_Core_Catalog_Service_Region();
            $regionEntity  = new Base_Model_ObtorLib_App_Core_Catalog_Entity_Region();
            $regionEntity->setCountry($countryId);
            $regionService->region = $regionEntity;
            $regions = $regionService->search();
            return $regions;
	}
}