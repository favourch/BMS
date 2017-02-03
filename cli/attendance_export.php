<?php
require_once 'cron_functions.php';

$reportDate = '2014-01-01';

function getOfficeWorkingTime($reportDate){
    $weekDayStrName =  date("l",strtotime($reportDate));
    $openTimeInformation = '';
    $objWeekDaysService = new Base_Model_Lib_Catelog_Service_WeekDays();
    $allWeekDays = $objWeekDaysService->getAllWithSettings();

    $arrStaffWorkingTime = array();
    foreach($allWeekDays As $weekIndex=>$weekDay){

        $weekDayStr             = $weekDay->getName();
        $weekDay_is_office_open = $weekDay->getIsOpen();
        $onTimeOffTimeSettings  = $weekDay->getSettings();
        $openTime = "";
        $closeTime = "";
        foreach($onTimeOffTimeSettings As $settingIndex=>$onTimeOffTimeSetting){

            if($onTimeOffTimeSetting->getSettingFieldName() == 'Open-At'){
                $openTime = $onTimeOffTimeSetting->getSettingValue();
            } elseif($onTimeOffTimeSetting->getSettingFieldName() == 'Close-At'){
                $closeTime = $onTimeOffTimeSetting->getSettingValue();
            }
        }
        $arrStaffWorkingTime[$weekDayStr]['day_name'] = $weekDayStr;
        $arrStaffWorkingTime[$weekDayStr]['is_working_day'] = $weekDay_is_office_open;
        $arrStaffWorkingTime[$weekDayStr]['on_time'] = $openTime;
        $arrStaffWorkingTime[$weekDayStr]['off_time'] = $closeTime;
    }
    $openTimeInformation = $arrStaffWorkingTime[$weekDayStrName];
    return $openTimeInformation;
}

// Get system settings...
$objSettingService = new Base_Model_Lib_System_Service_Settings();
// get attendance settings....paramater is setting id..
$useCommonOfficeHours = $objSettingService->getItem('55');
$UseEmployeesIndividual = $objSettingService->getItem('56');
$allowedLateComes                           = $objSettingService->getItem('59');
$allowedEarlyOff                            = $objSettingService->getItem('60');
$deductingLeaveForLateCome                  = $objSettingService->getItem('61');
$deductingLeaveForLateComeAndEarlyOff_45    = $objSettingService->getItem('62');
$deductingLeaveForLateComeAndEarlyOff_120   = $objSettingService->getItem('63');



$staff_actual_working_hrs = NULL;
if($useCommonOfficeHours->getSettingValue() == 'Yes' && $UseEmployeesIndividual->getSettingValue() == 'No'){
    $officeWorkingTimeInfo      = getOfficeWorkingTime($reportDate);
    $staff_actual_working_hrs   = $officeWorkingTimeInfo;
} elseif($useCommonOfficeHours->getSettingValue() == 'No' && $UseEmployeesIndividual->getSettingValue() == 'Yes'){
    // get the staffs working time from the staff's profile...
} else {
    print("Global setting not found for attendance. The script stops as it is unable to continue.");
}


$report_date_day_name           = $staff_actual_working_hrs['day_name'];
$report_date_is_working_day     = $staff_actual_working_hrs['is_working_day'];
$report_date_on_time            = $staff_actual_working_hrs['on_time'];
$report_date_off_time           = $staff_actual_working_hrs['off_time'];
print($report_date_day_name." - ".$report_date_is_working_day." - ".$report_date_on_time." - ".$report_date_off_time."\n");
print("Report Date -".$reportDate."\n");

$dbDefaultAdapter = Zend_Db_Table_Abstract::getDefaultAdapter();

$attendanceFingerprintTmpSql = "SELECT * FROM tbl_attendance_fingerprint_tmp WHERE date_on = '".$reportDate."'";
$attendance_result_from_finger_print = $dbDefaultAdapter->fetchAll($attendanceFingerprintTmpSql);
foreach($attendance_result_from_finger_print As $fpIndex=>$fingerPrint){
    
    if($report_date_is_working_day == 'Yes'){
         // get from fingerprint....
    $fingerPrintId                          = $fingerPrint['id'];
    $fingerPrintDateOn                      = $fingerPrint['date_on'];
    $fingerPrintInOrOut                     = $fingerPrint['in_or_out'];
    $fingerPrintInOrOutTime                 = $fingerPrint['in_or_out_time'];
    $fingerPrintStaffId                     = $fingerPrint['staff_id'];
    $fingerPrintStaffEmployeeId             = $fingerPrint['staff_employee_id'];
    $fingerPrintUpdatedOnTerminal           = $fingerPrint['updated_on_terminal'];
    $terminal_id                            = $fingerPrint['terminal_id'];
    //=============================================================================
    
    //============// get employee information....//=============================
     $employeeService = new Base_Model_ObtorLib_App_Core_Employee_Service_Employee();
     $employeeInformation  = $employeeService->getEmployee($fingerPrintStaffId);
     $employeeType = $employeeInformation->getEmployeeType();
    //==========================================================================
    
    
    // Get attendance records,if records exits on the attendance table, using date and staff id...
    $sql_get_attendance_records = "SELECT * FROM tbl_attendance WHERE date_on = '".$fingerPrintDateOn."' AND tbl_employee_id = '".$fingerPrintStaffId."'"; // the tbl_employee_id is the unique id in the employee table
    $result_attendance_records 	= $dbDefaultAdapter->fetchRow($sql_get_attendance_records);
    $attendance_record_exits = NULL;
    $existing_attendance_record_id    = '';
    $existing_attendance_in_time      = '';
    $existing_attendance_out_time     = '';
    $existing_other_in_out            = '';
    if($result_attendance_records){
        
        if($result_attendance_records['id'] && $result_attendance_records['id'] != ""){
                $attendance_record_exits            = 'Yes';
                $existing_attendance_record_id      = $result_attendance_records['id'];
                $existing_attendance_in_time        = $result_attendance_records['attendance_in_time'];
                $existing_attendance_out_time       = $result_attendance_records['attendance_out_time'];
                $existing_other_in_out              = $result_attendance_records['other_in_out'];
        }
        
    }
    
    
    $other_in_out = "";
    
    $id                                 = "";	
    $date_on                            = $fingerPrintDateOn;	
    $is_working_day                     = $staff_actual_working_hrs['is_working_day']; 	
    $scheduled_on_time                  = $staff_actual_working_hrs['on_time']; 	
    $scheduled_off_time                 = $staff_actual_working_hrs['off_time'];
    
    $scheduled_on_time_int = strtotime($scheduled_on_time);
    $scheduled_off_time_int  = strtotime($scheduled_off_time);
    // if $fingerPrintInOrOut is 1, then that is IN Time, and 0 is out time
    if($fingerPrintInOrOut == 1){
        $in_time_fp_serial                  = $terminal_id;	
        $attendance_in_time                 = $fingerPrintInOrOutTime;
        $attendance_in_time_int             = strtotime($attendance_in_time);
        $is_late = NULL;
        
        if($attendance_in_time_int>$scheduled_on_time_int){
             $is_late                            = "Yes";
             $in_time_different_min              = ($attendance_in_time_int - $scheduled_on_time_int) / 60;
             $in_time_different_min_type        = "-"; 	
        }else{
            $is_late                            = "No";
            $in_time_different_min              = ($scheduled_on_time_int-$attendance_in_time_int) / 60;
             $in_time_different_min_type        = "+"; 	
        }
        
       
    }elseif($fingerPrintInOrOut == 0){
        $out_time_fp_serial                 = $terminal_id;	
        $attendance_out_time                = $fingerPrintInOrOutTime; 
        $attendance_out_time_int            = strtotime($attendance_out_time);
        
        if($scheduled_off_time_int>$attendance_out_time_int){
            $is_early_off                       = 'Yes';
            $out_time_different_min             = ($scheduled_off_time_int-$attendance_out_time_int)/60;
            $out_time_different_min_type        = "-"; 	
        } else {
            $is_early_off             = 'No';
            $out_time_different_min             = ($attendance_out_time_int-$scheduled_off_time_int)/60;
            $out_time_different_min_type        = "-"; 	
        }    
    }
    
    $other_in_out                       = "";
    $in_time_status_exempted            = "";
    $out_time_status_exempted            = "";
    $is_on_leave                        = "";
    $deducted_leave_for_late_come       = 0;
    $deducted_leave_for_early_off       = 0;
    $tbl_employee_id                    = $fingerPrintStaffId;
    
    
    
    
    $sql_query = "";
    
    if($attendance_record_exits == 'Yes'){
        // update the details.....
        if($fingerPrintInOrOut == 1){ // update the intime details....
            
            $sql_query = "UPDATE `tbl_attendance` "
                    . "SET "
                    . "`attendance_in_time` = '".$attendance_in_time."', "
                    . "`is_late` = '".$is_late."', "
                    . "`other_in_out` = '".$other_in_out."', "
                    . "`in_time_fp_serial` = '".$in_time_fp_serial."', "
                    . "`in_time_status_exempted` = '".$in_time_status_exempted."', "
                    . "`in_time_different_min` = '".$in_time_different_min."', "
                    . "`in_time_different_min_type` = '".$in_time_different_min_type."', "
                    . "`deducted_leave_for_late_come` = '".$deducted_leave_for_late_come."' "
                    . "WHERE `id` = '".$existing_attendance_record_id."'";
            
        }elseif ($fingerPrintInOrOut == 0) { // update the out time details...
            
            $sql_query = "UPDATE `tbl_attendance` "
                    . "SET "
                    . "`attendance_out_time` = '".$attendance_out_time."', "
                    . "`is_early_off` = '".$is_early_off."', "
                    . "`other_in_out` = '".$other_in_out."', "
                    . "`out_time_fp_serial` = '".$out_time_fp_serial."', "
                    . "`out_time_status_exempted` = '".$out_time_status_exempted."', "
                    . "`out_time_different_min` = '".$out_time_different_min."', "
                    . "`out_time_different_min_type` = '".$out_time_different_min_type."', "
                    . "`deducted_leave_for_early_off` = '".$deducted_leave_for_early_off."' "
                    . "WHERE `id` = '".$existing_attendance_record_id."'";
            
        }
    } else {
        // insert the details....
        if($fingerPrintInOrOut == 1){ // insert the intime details....
            
            $sql_query = "INSERT INTO `tbl_attendance` ("
                    . "`id`, "
                    . "`date_on`, "
                    . "`is_working_day`, "
                    . "`scheduled_on_time`, "
                    . "`scheduled_off_time`, "
                    . "`attendance_in_time`, "
                    . "`is_late`,"
                    . "`other_in_out`,"
                    . "`in_time_fp_serial`,"
                    . "`in_time_status_exempted`,"
                    . "`in_time_different_min`,"
                    . "`in_time_different_min_type`,"
                    . "`is_on_leave`,"
                    . "`deducted_leave_for_late_come`, "
                    . "`employee_type`, "
                    . "`tbl_employee_id`) "
                    . "VALUES ("
                    . "NULL, "
                    . "'".$date_on."', "
                    . "'".$report_date_is_working_day."', "
                    . "'".$report_date_on_time."', "
                    . "'".$report_date_off_time."', "
                    . "'".$attendance_in_time."', "
                    . "'".$is_late."', "
                    . "'".$other_in_out."', "
                    . "'".$in_time_fp_serial."', "
                    . "'".$in_time_status_exempted."', "
                    . "'".$in_time_different_min."', "
                    . "'".$in_time_different_min_type."', "
                    . "'".$is_on_leave."', "
                    . "'".$deducted_leave_for_late_come."', "
                    . "'".$employeeType."', "
                    . "'".$tbl_employee_id."')";
            
        }elseif ($fingerPrintInOrOut == 0) { // insert the out time details...
            
            $sql_query = "INSERT INTO `tbl_attendance` ("
                    . "`id`, "
                    . "`date_on`, "
                    . "`is_working_day`, "
                    . "`scheduled_on_time`, "
                    . "`scheduled_off_time`, "
                    . "`attendance_out_time`, "
                    . "`is_early_off`,"
                    . "`other_in_out`,"
                    . "`out_time_fp_serial`,"
                    . "`out_time_status_exempted`,"
                    . "`out_time_different_min`,"
                    . "`out_time_different_min_type`,"
                    . "`is_on_leave`,"
                    . "`deducted_leave_for_early_off`, "
                    . "`employee_type`, "
                    . "`tbl_employee_id`) "
                    . "VALUES ("
                    . "NULL, "
                    . "'".$date_on."', "
                    . "'".$report_date_is_working_day."', "
                    . "'".$report_date_on_time."', "
                    . "'".$report_date_off_time."', "
                    . "'".$attendance_out_time."', "
                    . "'".$is_early_off."', "
                    . "'".$other_in_out."', "
                    . "'".$out_time_fp_serial."', "
                    . "'".$out_time_status_exempted."', "
                    . "'".$out_time_different_min."', "
                    . "'".$out_time_different_min_type."', "
                    . "'".$is_on_leave."', "
                    . "'".$deducted_leave_for_early_off."', "
                     . "'".$employeeType."', "
                    . "'".$tbl_employee_id."')";
        }
    }
    // insert the sql for intime and out time.......
    $attendance_result_from_finger_print = $dbDefaultAdapter->query($sql_query);    
    print("Attendance updated, Staff ID -".$tbl_employee_id."\n");
    } else {
        print("Report Date -".$reportDate."\n");
        print("It is not a working day. Skipping update....\n");
        
    }
}
print("Report Date -".$reportDate." completed..."."\n");
//print_r($staff_actual_working_hrs);

// Echo done
echo date('H:i:s') . " Done writing file.\r\n";
?>
