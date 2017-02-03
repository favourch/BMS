<?php
class Zend_View_Helper_GetCountry
{
	public function getCountry($countryId)
	{
                 $countryService = new Base_Model_ObtorLib_App_Core_Catalog_Service_Country();
                 $countryInfo    = $countryService->getCountry($countryId);
                 return $countryInfo;
	}
}