<?php
class Zend_View_Helper_GetTotalStaffInService
{
	public function getTotalStaffInService()
	{
            // get all the user all users...
            $employee_status = 'In-Service';
            $employeeService = new Base_Model_ObtorLib_App_Core_Employee_Service_Employee();
            $employeeEntity = new Base_Model_ObtorLib_App_Core_Employee_Entity_Employee();
            $employeeEntity->setEmployeeStatus($employee_status);
            $employeeService->employee = $employeeEntity;
            return $employeeService->searchCount();
            
	}
}