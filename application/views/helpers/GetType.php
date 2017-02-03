<?php
class Zend_View_Helper_GetType
{
	public function getType($typeId)
	{
                 $typesService = new Base_Model_Lib_Product_Service_Types();
                 $typeInfo    = $typesService->getItem($typeId);
                 return $typeInfo;
	}
}