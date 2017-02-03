<?php
class Zend_View_Helper_GetProject
{
	public function getProject($projectId)
	{
            $objProjectService = new Base_Model_ObtorLib_App_Core_Pms_Service_Project();
            $projectInformation = $objProjectService->getProject($projectId);
            return $projectInformation;
	}
}