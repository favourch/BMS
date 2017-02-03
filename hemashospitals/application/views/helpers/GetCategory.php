<?php
class Zend_View_Helper_GetCategory
{
	public function getCategory($categoryId)
	{
                 $categoryService = new Base_Model_Lib_App_Core_Catalog_Service_Category();
                 $categoryInfo    = $categoryService->getCategory($categoryId);
            return $categoryInfo;
	}
}