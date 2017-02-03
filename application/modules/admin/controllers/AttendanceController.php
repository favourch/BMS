<?php

class Admin_AttendanceController extends Base_Model_ObtorLib_App_Admin_Controller {

    public function init() {
        parent::init();
    }

    /**
     * The default action - show the home page
     */
    public function indexAction() {
        try {
            $pageHeading = "Attendance-Details";
            $this->view->page_heading = $pageHeading;
            $this->view->data_page = "tables";
            
            $reportDateOn = $this->_request->getParam("report_date");
            
            $objAttendanceEntity = new Base_Model_ObtorLib_App_Core_Employee_Entity_Attendance();
            $objAttendanceService = new Base_Model_ObtorLib_App_Core_Employee_Service_Attendance();
            if(!$reportDateOn){
                $reportDateOn = $this->getSystemDate();
            }
            $objAttendanceEntity->setDateOn($reportDateOn);
            $objAttendanceService->attendance = $objAttendanceEntity;
            $attendanceInformation = $objAttendanceService->search();
            $this->view->attendanceInformation = $attendanceInformation;
            $this->view->reportDateOn = $reportDateOn;
            
            // count full time staff....
            $employeeService = new Base_Model_ObtorLib_App_Core_Employee_Service_Employee();
            $employee_type = '6';
            $employee_status = 'In-Service';
            // count full time....
            $employeeEntity = new Base_Model_ObtorLib_App_Core_Employee_Entity_Employee();
            $employeeEntity->setEmployeeStatus($employee_status);
            $employeeEntity->setEmployeeType($employee_type);
            $employeeService->employee = $employeeEntity;
            $totalFullTimeStaff = $employeeService->searchCount();
            $this->view->totalFullTimeStaff = $totalFullTimeStaff;
            
            $totalFullTimeStaffOnLeave      = 0;
            $this->view->totalFullTimeStaffOnLeave = $totalFullTimeStaffOnLeave;
            
            $totalFullTimeStaffAbsent      = 0;
            $this->view->totalFullTimeStaffAbsent = $totalFullTimeStaffAbsent;
             
            
            
            
            // count part time staff....
            $employee_type = '10';
            $employeeEntity = new Base_Model_ObtorLib_App_Core_Employee_Entity_Employee();
            $employeeEntity->setEmployeeStatus($employee_status);
            $employeeEntity->setEmployeeType($employee_type);
            $employeeService->employee = $employeeEntity;
            $totalPartTimeStaff = $employeeService->searchCount();
            $this->view->totalPartTimeStaff = $totalPartTimeStaff;
            
            $totalPartTimeStaffOnLeave = 0;
            $this->view->totalPartTimeStaffOnLeave = $totalPartTimeStaffOnLeave;
            $totalPartTimeStaffAbsent = 0;
            $this->view->totalPartTimeStaffAbsent = $totalPartTimeStaffAbsent;
            
            
            // count freelance and Others....
            $employee_type = '5';
            $employeeEntity = new Base_Model_ObtorLib_App_Core_Employee_Entity_Employee();
            $employeeEntity->setEmployeeStatus($employee_status);
            $employeeEntity->setEmployeeType($employee_type);
            $employeeService->employee = $employeeEntity;
            $totalFreelanceStaff = $employeeService->searchCount();
            
            
            $totalOtherStaffs  = $totalFreelanceStaff;
            $this->view->totalOtherStaffs = $totalOtherStaffs;
            
            $totalNumberOfStaffs = $totalFullTimeStaff + $totalPartTimeStaff + $totalFreelanceStaff;
            $this->view->totalNumberOfStaffs = $totalNumberOfStaffs;
            
            $totalNumberOfStaffsOnLeave   = 0;
            $totalNumberOfStaffsAbsent    = 0;
            $this->view->totalNumberOfStaffsOnLeave = $totalNumberOfStaffsOnLeave;
            $this->view->totalNumberOfStaffsAbsent = $totalNumberOfStaffsAbsent;
            
            
            $finalTotalOnLeave = 0;
            $this->view->finalTotalOnLeave = $finalTotalOnLeave;
            
            $finalTotalAbsent = 0;
            $this->view->finalTotalAbsent = $finalTotalAbsent;
            
                
        } catch (Exception $ex) {
            throw new Exception('<ERROR>' . $ex->getMessage() . "\n");
        }
    }

    /**
     * The add action
     */
    public function addAction() {
        try {
            $pageHeading = "Add-New-Attendance";
            $this->view->page_heading = $pageHeading;
            $this->view->data_page = "forms";
            
            $employeeService = new Base_Model_ObtorLib_App_Core_Employee_Service_Employee();

            if ($this->_request->isPost()) {

                $dateOn = $this->_request->getParam('txtDateOn');
                $attendanceInTime = $this->_request->getParam('cmbAttInTimeHr').":".$this->_request->getParam('cmbAttInTimeMin');
                $attendanceOutTime = $this->_request->getParam('cmbAttOutTimeHr').":".$this->_request->getParam('cmbAttOutTimeMin');
                $employee = $this->_request->getParam('employee');
                $staffInfo = $employeeService->getEmployee($employee);
                
                $employeeNumber = $staffInfo->getEmployeeNumber();
                // add the attendence details...
                $inOrOut = 1; // in time...
                $outTimeData = array(
                    'date_on'=>$dateOn,
                    'in_or_out'=>$inOrOut,
                    'in_or_out_time'=>$attendanceInTime,
                    'staff_id'=>$employee,
                    'staff_employee_id'=>$employeeNumber);
                $db 		= Zend_Db_Table_Abstract::getDefaultAdapter();
                $result             = $db->insert('tbl_attendance_fingerprint_tmp',$outTimeData);
                
                $inOrOut = 0; // out time...
                $outTimeData = array(
                    'date_on'=>$dateOn,
                    'in_or_out'=>$inOrOut,
                    'in_or_out_time'=>$attendanceOutTime,
                    'staff_id'=>$employee,
                    'staff_employee_id'=>$employeeNumber);
                $db 		= Zend_Db_Table_Abstract::getDefaultAdapter();
                $result             = $db->insert('tbl_attendance_fingerprint_tmp',$outTimeData);
                $isUpdated = true;
                if ($isUpdated) {
                    $this->_redirect("/admin/attendance/?action-status=updated");
                } else {
                    $this->_redirect("/admin/attendance/?action-status=failed");
                }
                
                

            } else {
                // get all the user all users...
                $employee_status = 'In-Service';
                $employeeEntity = new Base_Model_ObtorLib_App_Core_Employee_Entity_Employee();
                $employeeEntity->setEmployeeStatus($employee_status);
                $employeeService->employee = $employeeEntity;
                $employeeInfo = $employeeService->search();
                $this->view->employeeInfo = $employeeInfo;
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
            $pageHeading = "Add-New-Attendance";
            $this->view->page_heading = $pageHeading;
            $this->view->data_page = "forms";
            
            $objAttendanceService = new Base_Model_ObtorLib_App_Core_Employee_Service_Attendance();

            if ($this->_request->isPost()) {


                $id = $this->_request->getParam('id');
                $dateOn = $this->_request->getParam('txtDateOn');
                $isWorkingDay = $this->_request->getParam('txtIsWorkingDay');
                $scheduledOnTime = $this->_request->getParam('txtScheduledOnTime');
                $scheduledOffTime = $this->_request->getParam('txtScheduledOffTime');
                $attendanceInTime = $this->_request->getParam('txtAttendanceInTime');
                $attendanceOutTime = $this->_request->getParam('txtAttendanceOutTime');
                $isLate = $this->_request->getParam('txtIsLate');
                $isEarlyOff = $this->_request->getParam('txtIsEarlyOff');
                $otherInOut = $this->_request->getParam('txtOtherInOut');
                $remarks = $this->_request->getParam('txtRemarks');
                $inTimeFpSerial = $this->_request->getParam('txtInTimeFpSerial');
                $outTimeFpSerial = $this->_request->getParam('txtOutTimeFpSerial');
                $inTimeStatusExempted = $this->_request->getParam('txtInTimeStatusExempted');
                $outTimeStatusExempted = $this->_request->getParam('txtOutTimeStatusExempted');
                $inTimeExecused = $this->_request->getParam('txtInTimeExecused');
                $outTimeExecused = $this->_request->getParam('txtOutTimeExecused');
                $inTimeDifferentMin = $this->_request->getParam('txtInTimeDifferentMin');
                $outTimeDifferentMin = $this->_request->getParam('txtOutTimeDifferentMin');
                $inTimeDifferentMinType = $this->_request->getParam('txtInTimeDifferentMinType');
                $outTimeDifferentMinType = $this->_request->getParam('txtOutTimeDifferentMinType');
                $isOnLeave = $this->_request->getParam('txtIsOnLeave');
                $countedWorkingDay = $this->_request->getParam('txtCountedWorkingDay');
                $extraWorkingHrs = $this->_request->getParam('txtExtraWorkingHrs');
                $extraWorkingHrsApproved = $this->_request->getParam('txtExtraWorkingHrsApproved');
                $approvedExtraWorkingHrs = $this->_request->getParam('txtApprovedExtraWorkingHrs');
                $isPaidForExtraHrs = $this->_request->getParam('txtIsPaidForExtraHrs');
                $manuallyAddedOrEdited = $this->_request->getParam('txtManuallyAddedOrEdited');
                $employee = $this->_request->getParam('txtEmployee');
                
                
                // add the attendence details...
                $objAttendanceEntity = new Base_Model_ObtorLib_App_Core_Employee_Entity_Attendance();
                
                $objAttendanceEntity->setId($id);
                $objAttendanceEntity->setDateOn($dateOn);
                $objAttendanceEntity->setIsWorkingDay($isWorkingDay);
                $objAttendanceEntity->setScheduledOnTime($scheduledOnTime);
                $objAttendanceEntity->setScheduledOffTime($scheduledOffTime);
                $objAttendanceEntity->setAttendanceInTime($attendanceInTime);
                $objAttendanceEntity->setAttendanceOutTime($attendanceOutTime);
                $objAttendanceEntity->setIsLate($isLate);
                $objAttendanceEntity->setIsEarlyOff($isEarlyOff);
                $objAttendanceEntity->setOtherInOut($otherInOut);
                $objAttendanceEntity->setRemarks($remarks);
                $objAttendanceEntity->setInTimeFpSerial($inTimeFpSerial);
                $objAttendanceEntity->setOutTimeFpSerial($outTimeFpSerial);
                $objAttendanceEntity->setInTimeStatusExempted($inTimeStatusExempted);
                $objAttendanceEntity->setOutTimeStatusExempted($outTimeStatusExempted);
                $objAttendanceEntity->setInTimeExecused($inTimeExecused);
                $objAttendanceEntity->setOutTimeExecused($outTimeExecused);
                $objAttendanceEntity->setInTimeDifferentMin($inTimeDifferentMin);
                $objAttendanceEntity->setOutTimeDifferentMin($outTimeDifferentMin);
                $objAttendanceEntity->setInTimeDifferentMinType($inTimeDifferentMinType);
                $objAttendanceEntity->setOutTimeDifferentMinType($outTimeDifferentMinType);
                $objAttendanceEntity->setIsOnLeave($isOnLeave);
                $objAttendanceEntity->setCountedWorkingDay($countedWorkingDay);
                $objAttendanceEntity->setExtraWorkingHrs($extraWorkingHrs);
                $objAttendanceEntity->setExtraWorkingHrsApproved($extraWorkingHrsApproved);
                $objAttendanceEntity->setApprovedExtraWorkingHrs($approvedExtraWorkingHrs);
                $objAttendanceEntity->setIsPaidForExtraHrs($isPaidForExtraHrs);
                $objAttendanceEntity->setManuallyAddedOrEdited($manuallyAddedOrEdited);
                $objAttendanceEntity->setEmployee($employee);
                $objAttendanceService->attendance = $objAttendanceEntity;
                $isUpdated = $objAttendanceService->updateAttendance();
                if ($isUpdated) {
                    $this->_redirect("/admin/attendance/?action-status=updated");
                } else {
                    $this->_redirect("/admin/attendance/?action-status=failed");
                }
                
                

            } else {
                
                $attendanceId = $this->_request->getParam('id');
                $attendanceInformation = $objAttendanceService->getAttendance($attendanceId);
                $this->view->attendanceInformation = $attendanceInformation;
                
                $employeeService = new Base_Model_ObtorLib_App_Core_Employee_Service_Employee();
                $employee_status = 'In-Service';
                $employeeEntity = new Base_Model_ObtorLib_App_Core_Employee_Entity_Employee();
                $employeeEntity->setEmployeeStatus($employee_status);
                $employeeService->employee = $employeeEntity;
                $employeeInfo = $employeeService->search();
                $this->view->employeeInfo = $employeeInfo;
                
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
            $pageHeading = "View-Attendance-Information";
            $this->view->page_heading = $pageHeading;
            $this->view->data_page = "forms";

            $objAttendanceService = new Base_Model_ObtorLib_App_Core_Employee_Service_Attendance();
            $attendanceId = $this->_request->getParam('id');
            $attendanceInformation = $objAttendanceService->getAttendance($attendanceId);
            $this->view->attendanceInformation = $attendanceInformation;

        } catch (Exception $ex) {
            throw new Exception('<ERROR>' . $ex->getMessage() . "\n");
        }
    }
    
    /**
     * The upload action
     */
    public function uploadAction() {
        try {
            $pageHeading = "Uploading-Attendance";
            $this->view->page_heading = $pageHeading;
            $this->view->data_page = "forms";
            
            if ($this->_request->isPost()) {

                $attendanceTmpCsv = $_FILES['txtAttachment']['tmp_name'];
                $attendanceCsvFileName = $_FILES['txtAttachment']['name'];
                
                if($attendanceCsvFileName != ''){
                $uploadedCsvPath = APPLICATION_PATH.'/../uploads/attendance/csv/'.$attendanceCsvFileName;
                move_uploaded_file($attendanceTmpCsv,$uploadedCsvPath);
                 
                $uploadedFilePath = $uploadedCsvPath;
                $csvFp = fopen($uploadedFilePath,'r') or die("can't open file");
                
                $rowNum = 1;
                $arrAttendanceRows = array();
                while(!feof($csvFp))
                {
                   $attendanceRow                   = fgetcsv($csvFp);
                   array_push($arrAttendanceRows, $attendanceRow[0]);
                }
                
                // read the data from array...
                foreach($arrAttendanceRows As $aIndex=>$attendanceRow){
                    $attendanceRowPieces = explode(";",$attendanceRow);
                    
                    $dateOn                          =  $attendanceRowPieces[0];
                    $inOrOut                         =  $attendanceRowPieces[1];
                    $inOrOutTime                     =  $attendanceRowPieces[2];
                    $staffId                         =  $attendanceRowPieces[3];
                    $staffEmployeeId                 =  $attendanceRowPieces[4];
                    $updatedDateTimeOnTerminal       =  $attendanceRowPieces[5];
                    $terminalId                      =  $attendanceRowPieces[6];
                    
                    $outTimeData = array('date_on'=>$dateOn,'in_or_out'=>$inOrOut,'in_or_out_time'=>$inOrOutTime,'staff_id'=>$staffId,'staff_employee_id'=>$staffEmployeeId,'updated_on_terminal'=>$updatedDateTimeOnTerminal,'terminal_id'=>$terminalId);
                    $db 		= Zend_Db_Table_Abstract::getDefaultAdapter();
                    $result             = $db->insert('tbl_attendance_fingerprint_tmp',$outTimeData);
                   
                }
                
                
                 $this->_redirect("/admin/attendance/?action-status=updated");
                }else {
                  $this->_redirect("/admin/attendance/?action-status=failed");
                }
              
            }

        } catch (Exception $ex) {
            throw new Exception('<ERROR>' . $ex->getMessage() . "\n");
        }
    }
    
    
        /**
     * The upload action
     */
    public function searchAction() {
        try {
            $pageHeading = "Search-Attendance";
            $this->view->page_heading = $pageHeading;
            $this->view->data_page = "forms";

            
        } catch (Exception $ex) {
            throw new Exception('<ERROR>' . $ex->getMessage() . "\n");
        }
    }
    
    
          /**
     * The upload action
     */
    public function runCommandsAction() {
        try {
            $pageHeading = "Run-Attendance-Command";
            $this->view->page_heading = $pageHeading;
            $this->view->data_page = "forms";
            
             if ($this->_request->isPost()) {
                 
                  
             }

            
        } catch (Exception $ex) {
            throw new Exception('<ERROR>' . $ex->getMessage() . "\n");
        }
    }
    
              /**
     * The upload action
     */
    public function importAction() {
        try {
           
            if ($this->_request->isPost()) {
                $reportDate = $this->_request->getParam('dateOn');
                $objAttendanceService                       = new Base_Model_ObtorLib_App_Core_Employee_Service_Attendance();
                $objAttendanceService->processAttendance($reportDate);
                print("Done");exit;
            }else{
                print("Failed");exit;
            }
            
            
        } catch (Exception $ex) {
            throw new Exception('<ERROR>' . $ex->getMessage() . "\n");
        }
    }

}
