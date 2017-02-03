<?php
class Zend_View_Helper_GetCountryList
{
	public function getCountryList($countryCode)
	{
                 $countryInfo = NULL;
                 $countryService = new Base_Model_Lib_Catelog_Service_Country();
                 if($countryService->getCountryByCode($countryCode)){
                    $countryInfo    = $countryService->getCountryByCode($countryCode)->getName();
                 } else {
                     $countryInfo = '-';
                 }
                 return $countryInfo;
	}
}