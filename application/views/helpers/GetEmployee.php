<?php
class Zend_View_Helper_GetEmployee
{
	public function getEmployee($employeeId)
	{
            // get employee...
            $employeeService = new Base_Model_ObtorLib_App_Core_Employee_Service_Employee();
            return $employeeService->getEmployee($employeeId);
	}
}