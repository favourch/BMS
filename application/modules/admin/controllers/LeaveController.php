<?php

class Admin_LeaveController extends Base_Model_ObtorLib_App_Admin_Controller {

    public function init() {
        parent::init();
    }

    /**
     * The default action - show the home page
     */
    public function indexAction() {
        try {
            $pageHeading = "Latest-Leave-Applications";
            $this->view->page_heading = $pageHeading;
            $this->view->data_page = "tables";
            
             $employee = $this->_request->getParam('employee');
             $leaveStatus = $this->_request->getParam('status');
             $leaveFromDate = $this->_request->getParam('leave-from');
             $leaveToDate = $this->_request->getParam('leave-to');
             
            
             $objLeaveEntity = new Base_Model_ObtorLib_App_Core_Employee_Entity_Leave();
             $objLeaveService = new Base_Model_ObtorLib_App_Core_Employee_Service_Leave();
             $objLeaveEntity->setEmployee($employee);
             $objLeaveEntity->setAppStatus($leaveStatus);
             $objLeaveEntity->setFromDate($leaveFromDate);
             $objLeaveEntity->setToDate($leaveToDate);
             $objLeaveService->leave = $objLeaveEntity;
             $leaveInformations = $objLeaveService->search();
             $this->view->leaveInformations = $leaveInformations;
                
        } catch (Exception $ex) {
            throw new Exception('<ERROR>' . $ex->getMessage() . "\n");
        }
    }
    
    
      /**
     * The default action - show the home page
     */
    public function latestLeaveApplicationsAction() {
        try {
            $pageHeading = "Latest-Leave-Applications";
            $this->view->page_heading = $pageHeading;
            $this->view->data_page = "tables";
            
             $objLeaveEntity = new Base_Model_ObtorLib_App_Core_Employee_Entity_Leave();
             $objLeaveService = new Base_Model_ObtorLib_App_Core_Employee_Service_Leave();
             $objLeaveService->leave = $objLeaveEntity;
             $leaveInformations = $objLeaveService->search();
             $this->view->leaveInformations = $leaveInformations;
                
        } catch (Exception $ex) {
            throw new Exception('<ERROR>' . $ex->getMessage() . "\n");
        }
    }

    /**
     * The add action
     */
    public function addAction() {
        try {
            $pageHeading = "Add-New-Leave";
            $this->view->page_heading = $pageHeading;
            $this->view->data_page = "forms";

            if ($this->_request->isPost()) {

                $id                     = $this->_request->getParam('txtId');
                $employee               = $this->_request->getParam('txtEmployee');
                $noOfDaysLeave          = $this->_request->getParam('txtNoOfDaysLeave');
                $reason                 = $this->_request->getParam('txtReason');
                $managerEmployeeId      = $this->_request->getParam('txtManagerEmployeeId');
                $supervisorEmployeeId   = $this->_request->getParam('txtSupervisorEmployeeId');
                $actingStaffId          = $this->_request->getParam('txtActingStaffId');
                $workAreaToBeCovered    = $this->_request->getParam('txtWorkAreaToBeCovered');
                $adminRemarks           = $this->_request->getParam('txtAdminRemarks');
                $appStatus              = 'Pending';
                $lastUpdatedDate        = $this->getSystemDateTime();
                $lastUpdatedBy          = $this->getUserId();
                
                
                $objLeaveEntity = new Base_Model_ObtorLib_App_Core_Employee_Entity_Leave();
                $objLeaveService = new Base_Model_ObtorLib_App_Core_Employee_Service_Leave();
                $objLeaveEntity->setEmployee($employee);
                $objLeaveEntity->setNoOfDaysLeave($noOfDaysLeave);
                $objLeaveEntity->setReason($reason);
                $objLeaveEntity->setActingStaffId($actingStaffId);
                $objLeaveEntity->setWorkAreaToBeCovered($workAreaToBeCovered);
                $objLeaveEntity->setActingStaffSignature(NULL);
                $objLeaveEntity->setActingStaffRemarks(NULL);
                $objLeaveEntity->setActingStaffSignatureDate(NULL);
                $objLeaveEntity->setSupervisorSignature(NULL);
                $objLeaveEntity->setSupervisorRemarks(NULL);
                $objLeaveEntity->setSupervisorSignatureDate(NULL);
                $objLeaveEntity->setSupervisorEmployeeId($supervisorEmployeeId);
                $objLeaveEntity->setManagerSignature(NULL);
                $objLeaveEntity->setManagerRemarks(NULL);
                $objLeaveEntity->setManagerSignatureDate(NULL);
                $objLeaveEntity->setManagerEmployeeId($managerEmployeeId);
                $objLeaveEntity->setAppStatus($appStatus);
                $objLeaveEntity->setIsApprovedByAdmin(NULL);
                $objLeaveEntity->setAdminInfo(NULL);
                $objLeaveEntity->setAdminSignatureDate(NULL);
                $objLeaveEntity->setAdminRemarks($adminRemarks);
                $objLeaveEntity->setLastUpdatedDate($lastUpdatedDate);
                $objLeaveEntity->setLastUpdatedBy($lastUpdatedBy);
                $objLeaveService->leave = $objLeaveEntity;
                $leaveId = $objLeaveService->addLeave();
                if ($leaveId) {
                    
                    
                    $objLeaveDaysService    = new Base_Model_ObtorLib_App_Core_Employee_Service_LeaveDay();

                    $leaveDays          = $this->_request->getParam('txtDateOn');
                    $leaveTypes         = $this->_request->getParam('txtLeaveType');
                    
                    $leaveFromTimeHr    = $this->_request->getParam('cmbFromTimeHr');
                    $leaveFromTimeMin   = $this->_request->getParam('cmbFromTimeMin');
                    
                    $leaveToTimeHr     = $this->_request->getParam('cmbToTimeHr');
                    $leaveToTimeMin    = $this->_request->getParam('cmbToTimeMin');
                    
                    $leaveFromDate      = '';
                    $leaveToDate        = '';
                    
                    
                    foreach($leaveDays As $lIndex=>$leaveDay){
                        
                        if($lIndex == 0){
                            $leaveFromDate      = $leaveDay;
                        }
                        
                        $leaveTimeFrom = '';
                        $leaveTimeTo = '';
                        $leaveType = $leaveTypes[$lIndex];
                        if($leaveFromTimeHr){
                            $leaveTimeFrom = $leaveFromTimeHr[$lIndex].":".$leaveFromTimeMin[$lIndex];
                            $leaveTimeTo = $leaveToTimeHr[$lIndex].":".$leaveToTimeMin[$lIndex];
                        }
                        
                        $objLeaveDaysEntity     = new Base_Model_ObtorLib_App_Core_Employee_Entity_LeaveDay();
                        $objLeaveDaysEntity->setEmployeeId($employee);
                        $objLeaveDaysEntity->setEmployeeLeave($leaveId);
                        $objLeaveDaysEntity->setLeaveDate($leaveDay);
                        $objLeaveDaysEntity->setLeaveTimeFrom($leaveTimeFrom);
                        $objLeaveDaysEntity->setLeaveTimeTo($leaveTimeTo);
                        $objLeaveDaysEntity->setLeaveType($leaveType);
                        $objLeaveDaysService->leaveDay = $objLeaveDaysEntity;
                        $objLeaveDaysService->addLeaveDay();
                        
                        $leaveToDate        = $leaveDay;
                    }
                    
                    $objLeaveEntity = new Base_Model_ObtorLib_App_Core_Employee_Entity_Leave();
                    $objLeaveEntity->setId($leaveId);
                    $objLeaveEntity->setFromDate($leaveFromDate);
                    $objLeaveEntity->setToDate($leaveToDate);
                    $objLeaveService->leave = $objLeaveEntity;
                    $objLeaveService->updateFromToLeave();
                    
                    $this->_redirect("/admin/leave/latest-leave-applications/?action-status=updated");
                } else {
                    $this->_redirect("/admin/leave/latest-leave-applications/?action-status=failed");
                }
                

            } else {
                 // get all the user all users...
                $employee_status = 'In-Service';
                $employeeService = new Base_Model_ObtorLib_App_Core_Employee_Service_Employee();
                $employeeEntity = new Base_Model_ObtorLib_App_Core_Employee_Entity_Employee();
                $employeeEntity->setEmployeeStatus($employee_status);
                $employeeService->employee = $employeeEntity;
                $employeeInfo = $employeeService->search();
                $this->view->employeeInfo = $employeeInfo;
                
                $employee = $this->_request->getParam('employee');
                $noOfDaysLeave = $this->_request->getParam('no-of-days-leave');
                $this->view->employee = $employee;
                $this->view->noOfDaysLeave = $noOfDaysLeave;
                
                $employeeId = $this->_request->getParam('employee');
                $no_of_days_leave = $this->_request->getParam('no-of-days-leave');
                $leaveEmployeeInfo   =  $employeeService->getEmployee($employeeId);
                $this->view->leaveEmployeeInfo = $leaveEmployeeInfo;
                $this->view->no_of_days_leave = $no_of_days_leave;
                
                
            }

            
        } catch (Exception $ex) {
            throw new Exception('<ERROR>' . $ex->getMessage() . "\n");
        }
    }
    
    
    
        /**
     * The edit action
     */
    public function editAction() {
        try {
            $pageHeading = "Edit-Leave";
            $this->view->page_heading = $pageHeading;
            $this->view->data_page = "forms";
            
            $objLeaveService = new Base_Model_ObtorLib_App_Core_Employee_Service_Leave();

            if ($this->_request->isPost()) {

                $id = $this->_request->getParam('id');
                $employee = $this->_request->getParam('txtEmployee');
                $noOfDaysLeave = $this->_request->getParam('txtNoOfDaysLeave');
                $reason = $this->_request->getParam('txtReason');
                $actingStaffId = $this->_request->getParam('txtActingStaffId');
                $workAreaToBeCovered = $this->_request->getParam('txtWorkAreaToBeCovered');
                $actingStaffSignature = $this->_request->getParam('txtActingStaffSignature');
                $actingStaffRemarks = $this->_request->getParam('txtActingStaffRemarks');
                $actingStaffSignatureDate = $this->_request->getParam('txtActingStaffSignatureDate');
                $supervisorSignature = $this->_request->getParam('txtSupervisorSignature');
                $supervisorRemarks = $this->_request->getParam('txtSupervisorRemarks');
                $supervisorSignatureDate = $this->_request->getParam('txtSupervisorSignatureDate');
                $supervisorEmployeeId = $this->_request->getParam('txtSupervisorEmployeeId');
                $managerSignature = $this->_request->getParam('txtManagerSignature');
                $managerRemarks = $this->_request->getParam('txtManagerRemarks');
                $managerSignatureDate = $this->_request->getParam('txtManagerSignatureDate');
                $managerEmployeeId = $this->_request->getParam('txtManagerEmployeeId');
                $appStatus = $this->_request->getParam('txtAppStatus');
                $isApprovedByAdmin = $this->_request->getParam('txtIsApprovedByAdmin');
                $adminInfo = $this->_request->getParam('txtAdminInfo');
                $adminSignatureDate = $this->_request->getParam('txtAdminSignatureDate');
                $adminRemarks = $this->_request->getParam('txtAdminRemarks');
                $lastUpdatedDate = $this->_request->getParam('txtLastUpdatedDate');
                $lastUpdatedBy = $this->_request->getParam('txtLastUpdatedBy');
                
                $objLeaveEntity = new Base_Model_ObtorLib_App_Core_Employee_Entity_Leave();
                $objLeaveEntity->setId($id);
                $objLeaveEntity->setEmployee($employee);
                $objLeaveEntity->setNoOfDaysLeave($noOfDaysLeave);
                $objLeaveEntity->setReason($reason);
                $objLeaveEntity->setActingStaffId($actingStaffId);
                $objLeaveEntity->setWorkAreaToBeCovered($workAreaToBeCovered);
                $objLeaveEntity->setActingStaffSignature($actingStaffSignature);
                $objLeaveEntity->setActingStaffRemarks($actingStaffRemarks);
                $objLeaveEntity->setActingStaffSignatureDate($actingStaffSignatureDate);
                $objLeaveEntity->setSupervisorSignature($supervisorSignature);
                $objLeaveEntity->setSupervisorRemarks($supervisorRemarks);
                $objLeaveEntity->setSupervisorSignatureDate($supervisorSignatureDate);
                $objLeaveEntity->setSupervisorEmployeeId($supervisorEmployeeId);
                $objLeaveEntity->setManagerSignature($managerSignature);
                $objLeaveEntity->setManagerRemarks($managerRemarks);
                $objLeaveEntity->setManagerSignatureDate($managerSignatureDate);
                $objLeaveEntity->setManagerEmployeeId($managerEmployeeId);
                $objLeaveEntity->setAppStatus($appStatus);
                $objLeaveEntity->setIsApprovedByAdmin($isApprovedByAdmin);
                $objLeaveEntity->setAdminInfo($adminInfo);
                $objLeaveEntity->setAdminSignatureDate($adminSignatureDate);
                $objLeaveEntity->setAdminRemarks($adminRemarks);
                $objLeaveEntity->setLastUpdatedDate($lastUpdatedDate);
                $objLeaveEntity->setLastUpdatedBy($lastUpdatedBy);
                $objLeaveService->leave = $objLeaveEntity;                
                $isUpdated = $objLeaveService->updateLeave();
                if ($isUpdated) {
                    
                    $objLeaveDaysService    = new Base_Model_ObtorLib_App_Core_Employee_Service_LeaveDay();

                    $leaveDayIds          = $this->_request->getParam('txtLeaveDayId');
                    $leaveDays          = $this->_request->getParam('txtDateOn');
                    $leaveTypes         = $this->_request->getParam('txtLeaveType');
                    
                    $leaveFromTimeHr    = $this->_request->getParam('cmbFromTimeHr');
                    $leaveFromTimeMin   = $this->_request->getParam('cmbFromTimeMin');
                    
                    $leaveToTimeHr     = $this->_request->getParam('cmbToTimeHr');
                    $leaveToTimeMin    = $this->_request->getParam('cmbToTimeMin');
                    
                    $leaveFromDate      = '';
                    $leaveToDate        = '';
                    
                    
                    foreach($leaveDays As $lIndex=>$leaveDay){
                        
                        if($lIndex == 0){
                            $leaveFromDate      = $leaveDay;
                        }
                        
                        $leaveTimeFrom = '';
                        $leaveTimeTo = '';
                        $leaveType = $leaveTypes[$lIndex];
                        if($leaveFromTimeHr){
                            $leaveTimeFrom = $leaveFromTimeHr[$lIndex].":".$leaveFromTimeMin[$lIndex];
                            $leaveTimeTo = $leaveToTimeHr[$lIndex].":".$leaveToTimeMin[$lIndex];
                        }
                        
                        $leaveDayId = $leaveDayIds[$lIndex];
                        $objLeaveDaysEntity     = new Base_Model_ObtorLib_App_Core_Employee_Entity_LeaveDay();
                        $objLeaveDaysEntity->setEmployeeId($employee);
                        $objLeaveDaysEntity->setEmployeeLeave($id);
                        $objLeaveDaysEntity->setLeaveDate($leaveDay);
                        $objLeaveDaysEntity->setLeaveTimeFrom($leaveTimeFrom);
                        $objLeaveDaysEntity->setLeaveTimeTo($leaveTimeTo);
                        $objLeaveDaysEntity->setLeaveType($leaveType);
                        $objLeaveDaysEntity->setId($leaveDayId);
                        $objLeaveDaysService->leaveDay = $objLeaveDaysEntity;
                        $objLeaveDaysService->updateLeaveDay();
                        
                        $leaveToDate        = $leaveDay;
                    }
                    $objLeaveEntity = new Base_Model_ObtorLib_App_Core_Employee_Entity_Leave();
                    $objLeaveEntity->setId($id);
                    $objLeaveEntity->setFromDate($leaveFromDate);
                    $objLeaveEntity->setToDate($leaveToDate);
                    $objLeaveService->leave = $objLeaveEntity;
                    $objLeaveService->updateFromToLeave();
                    
                    $this->_redirect("/admin/leave/latest-leave-applications/?action-status=updated");
                } else {
                    $this->_redirect("/admin/leave/latest-leave-applications/?action-status=failed");
                }
                

            } else {
                $leaveId = $this->_request->getParam('id');
                $leaveInformation = $objLeaveService->getLeave($leaveId);
                $this->view->leaveInformation = $leaveInformation;
                
                 // get all the user all users...
                $employee_status = 'In-Service';
                $employeeService = new Base_Model_ObtorLib_App_Core_Employee_Service_Employee();
                $employeeEntity = new Base_Model_ObtorLib_App_Core_Employee_Entity_Employee();
                $employeeEntity->setEmployeeStatus($employee_status);
                $employeeService->employee = $employeeEntity;
                $employeeInfo = $employeeService->search();
                $this->view->employeeInfo = $employeeInfo;
                
                
                $employeeId = $this->_request->getParam('employee');
                $no_of_days_leave = $this->_request->getParam('no-of-days-leave');
                $leaveEmployeeInfo   =  $employeeService->getEmployee($employeeId);
                $this->view->leaveEmployeeInfo = $leaveEmployeeInfo;
                $this->view->no_of_days_leave = $no_of_days_leave;
            }

            
        } catch (Exception $ex) {
            throw new Exception('<ERROR>' . $ex->getMessage() . "\n");
        }
    }

    
/**
     * The add action
     */
    public function viewAction() {
        try {
           $pageHeading = "Edit-Leave";
            $this->view->page_heading = $pageHeading;
            $this->view->data_page = "forms";
            
            $objLeaveService = new Base_Model_ObtorLib_App_Core_Employee_Service_Leave();
            $leaveId = $this->_request->getParam('id');
            $leaveInformation = $objLeaveService->getLeave($leaveId);
            $this->view->leaveInformation = $leaveInformation;
            
        } catch (Exception $ex) {
            throw new Exception('<ERROR>' . $ex->getMessage() . "\n");
        }
    }
    
    
    /**
     * The add action
     */
    public function addLeaveAction() {
        try {
            $pageHeading = "Add-New-Leave-Application-Step-1";
            $this->view->page_heading = $pageHeading;
            $this->view->data_page = "forms";

             // get all the user all users...
                $employee_status = 'In-Service';
                $employeeService = new Base_Model_ObtorLib_App_Core_Employee_Service_Employee();
                $employeeEntity = new Base_Model_ObtorLib_App_Core_Employee_Entity_Employee();
                $employeeEntity->setEmployeeStatus($employee_status);
                $employeeService->employee = $employeeEntity;
                $employeeInfo = $employeeService->search();
                $this->view->employeeInfo = $employeeInfo;
            
        } catch (Exception $ex) {
            throw new Exception('<ERROR>' . $ex->getMessage() . "\n");
        }
    }
    
    
    /**
     * The add action
     */
    public function searchAction() {
        try {
            $pageHeading = "Search-Leave-Application";
            $this->view->page_heading = $pageHeading;
            $this->view->data_page = "forms";

             // get all the user all users...
                $employee_status = 'In-Service';
                $employeeService = new Base_Model_ObtorLib_App_Core_Employee_Service_Employee();
                $employeeEntity = new Base_Model_ObtorLib_App_Core_Employee_Entity_Employee();
                $employeeEntity->setEmployeeStatus($employee_status);
                $employeeService->employee = $employeeEntity;
                $employeeInfo = $employeeService->search();
                $this->view->employeeInfo = $employeeInfo;
                
                
            
            
        } catch (Exception $ex) {
            throw new Exception('<ERROR>' . $ex->getMessage() . "\n");
        }
    }
    
    
    /**
     * The add action
     */
    public function deleteAction() {
        try {
            $pageHeading = "View-Test";
            $this->view->page_heading = $pageHeading;
            $this->view->data_page = "forms";

            $objLeaveService = new Base_Model_ObtorLib_App_Core_Employee_Service_Leave();
            $leaveId = $this->_request->getParam('id');
            $leaveInformation = $objLeaveService->getLeave($leaveId);
            
                
                $leaveDays = $leaveInformation->getLeaveDays();
                
                $objLeaveDaysService    = new Base_Model_ObtorLib_App_Core_Employee_Service_LeaveDay();
                
                foreach($leaveDays As $lIndex=>$leaveDay){
                    
                    $leaveDayId = $leaveDay->getId();
                    $objLeaveDaysEntity     = new Base_Model_ObtorLib_App_Core_Employee_Entity_LeaveDay();
                    $objLeaveDaysEntity->setId($leaveDayId);
                    $objLeaveDaysService->leaveDay = $objLeaveDaysEntity;
                    $objLeaveDaysService->deleteLeaveDay();
                    
                }
                
             $objLeaveEntity = new Base_Model_ObtorLib_App_Core_Employee_Entity_Leave();
             $objLeaveEntity->setId($leaveId);
             $objLeaveService->leave = $objLeaveEntity;
             $objLeaveService->deleteLeave();
             $this->_redirect("/admin/leave/latest-leave-applications/?action-status=deleted");
            
            
        } catch (Exception $ex) {
            throw new Exception('<ERROR>' . $ex->getMessage() . "\n");
        }
    }
    

}
