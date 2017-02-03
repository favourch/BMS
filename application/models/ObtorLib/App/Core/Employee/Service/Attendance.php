<?php

/**
 * Created by PhpStorm.
 * Employee: ism-apac
 * Date: 8/7/14
 * Time: 3:26 PM
 */
class Base_Model_ObtorLib_App_Core_Employee_Service_Attendance extends Base_Model_ObtorLib_Eav_Model_Service {

    public $attendance;

    /*
     * Get a attendance using id
     * @return      : Entity Attendance Object (Base_Model_ObtorLib_App_Core_Employee_Entity_Attendance)
     */

    public function getAttendance($id) {
        try {
            $objAttendance = new Base_Model_ObtorLib_App_Core_Employee_Dao_Attendance();
            $attendance = $objAttendance->getAttendance($id);
            return $attendance;
        } catch (Exception $e) {
            throw new Base_Model_ObtorLib_App_Core_Employee_Exception($e);
        }
    }

    /*
     * Add new attendance
     * @return      : Integer ID / Null
     */

    public function addAttendance() {
        try {
            if (!($this->attendance instanceof Base_Model_ObtorLib_App_Core_Employee_Entity_Attendance)) {
                throw new Base_Model_ObtorLib_App_Core_Employee_Exception(" Attendance Entity not initialized");
            } else {
                $objAttendance = new Base_Model_ObtorLib_App_Core_Employee_Dao_Attendance();
                $objAttendance->attendance = $this->attendance;
                return $objAttendance->addAttendance();
            }
        } catch (Exception $ex) {
            throw new Base_Model_ObtorLib_App_Core_Employee_Exception($ex);
        }
    }

    /*
     * Update attendance
     * @return      : Integer ID / Null
     */

    public function updateAttendance() {
        try {
            if (!($this->attendance instanceof Base_Model_ObtorLib_App_Core_Employee_Entity_Attendance)) {
                throw new Base_Model_ObtorLib_App_Core_Employee_Exception(" Attendance Entity not initialized");
            } else {
                $objAttendance = new Base_Model_ObtorLib_App_Core_Employee_Dao_Attendance();
                $objAttendance->attendance = $this->attendance;
                return $objAttendance->updateAttendance();
            }
        } catch (Exception $ex) {
            throw new Base_Model_ObtorLib_App_Core_Employee_Exception($ex);
        }
    }

    /*
     * Delete attendance
     * @return      : Integer ID / Null
     */

    public function deleteAttendance() {
        try {
            if (!($this->attendance instanceof Base_Model_ObtorLib_App_Core_Employee_Entity_Attendance)) {
                throw new Base_Model_ObtorLib_App_Core_Employee_Exception(" Attendance Entity not initialized");
            } else {
                $objAttendance = new Base_Model_ObtorLib_App_Core_Employee_Dao_Attendance();
                $objAttendance->attendance = $this->attendance;
                return $objAttendance->deleteAttendance();
            }
        } catch (Exception $ex) {
            throw new Base_Model_ObtorLib_App_Core_Employee_Exception($ex);
        }
    }

    /*
     * Search attendances....
     * @return : Array of Attendances Entities...
     */

    public function search($limit = NULL) {
        try {
            if (!($this->attendance instanceof Base_Model_ObtorLib_App_Core_Employee_Entity_Attendance)) {
                throw new Base_Model_ObtorLib_App_Core_Employee_Exception(" Attendance Entity not initialized");
            } else {
                $objAttendance = new Base_Model_ObtorLib_App_Core_Employee_Dao_Attendance();
                $objAttendance->attendance = $this->attendance;
                return $objAttendance->search($limit);
            }
        } catch (Exception $ex) {
            throw new Base_Model_ObtorLib_App_Core_Employee_Exception($ex);
        }
    }
    
    
    /*
     * Search attendances....
     * @return : Array of Attendances Entities...
     */

    public function getAttendanceByDateAndStaffId($dateOn,$staffId) {
        try {
                $objAttendance = new Base_Model_ObtorLib_App_Core_Employee_Dao_Attendance();
                return $objAttendance->getAttendanceByDateAndStaffId($dateOn,$staffId);
                
        } catch (Exception $ex) {
            throw new Base_Model_ObtorLib_App_Core_Employee_Exception($ex);
        }
    }

    /**
     * Process attendance by date
     */
    public function processAttendance($dateOn) {
        try {
            // 0 - Out
            // 1 - In
            // Get system settings...
            $employeeService = new Base_Model_ObtorLib_App_Core_Employee_Service_Employee();
            $objSettingService = new Base_Model_Lib_System_Service_Settings();
            // get attendance settings....paramater is setting id..
            $useCommonOfficeHours = $objSettingService->getItem('55');
            $UseEmployeesIndividual = $objSettingService->getItem('56');
            $allowedLateComes = $objSettingService->getItem('59');
            $allowedEarlyOff = $objSettingService->getItem('60');
            $deductingLeaveForLateCome = $objSettingService->getItem('61');
            $deductingLeaveForLateComeAndEarlyOff_45 = $objSettingService->getItem('62');
            $deductingLeaveForLateComeAndEarlyOff_120 = $objSettingService->getItem('63');


            $officeWorkingTimeInfo = $objSettingService->getOfficeWorkingTime($dateOn);


            $dbDefaultAdapter = Zend_Db_Table_Abstract::getDefaultAdapter();

            $attendanceFingerprintTmpSql = "SELECT * FROM tbl_attendance_fingerprint_tmp WHERE date_on = '" . $dateOn . "'";
            $attendance_result_from_finger_print = $dbDefaultAdapter->fetchAll($attendanceFingerprintTmpSql);
            if ($attendance_result_from_finger_print) {
                foreach ($attendance_result_from_finger_print As $fpIndex => $fingerPrint) {
                    
                    // get from fingerprint....
                    $fingerPrintId = $fingerPrint['id'];
                    $fingerPrintDateOn = $fingerPrint['date_on'];
                    $fingerPrintInOrOut = $fingerPrint['in_or_out'];
                    $fingerPrintInOrOutTime = $fingerPrint['in_or_out_time'];
                    $fingerPrintStaffId = $fingerPrint['staff_id'];
                    $fingerPrintStaffEmployeeId = $fingerPrint['staff_employee_id'];
                    $fingerPrintUpdatedOnTerminal = $fingerPrint['updated_on_terminal'];
                    $terminal_id = $fingerPrint['terminal_id'];

                    // check which time base, we should use..., Common office hours or staff's working hours...
                    $staff_actual_working_hrs = NULL;
                    
                    $staff_actual_working_hrs = $employeeService->getWorkingTime($fingerPrintStaffId, $fingerPrintDateOn);

                    // split the actual working hours....
                    $report_date_day_name = $staff_actual_working_hrs['day_name'];
                    $report_date_is_working_day = $staff_actual_working_hrs['is_working_day'];
                    $report_date_on_time = $staff_actual_working_hrs['on_time'];
                    $report_date_off_time = $staff_actual_working_hrs['off_time'];
                    $report_expected_working_hrs = $staff_actual_working_hrs['opening_hours_in_day'];
                    print("Date On          : " . $dateOn . "\n");
                    print("Week Day         : " . $report_date_day_name . "\n");
                    print("Is working Day   : " . $report_date_is_working_day . "\n");
                    print("On Time          : " . $report_date_on_time . "\n");
                    print("Off Time         : " . $report_date_off_time . "\n");
                    print("Expected Working Hrs         : " . $report_expected_working_hrs . "(days)  \n");

                    $dbDefaultAdapter = Zend_Db_Table_Abstract::getDefaultAdapter();

                    
                    //=============================================================================
                    // query the current record in tbl_attendance_fingerprint_tmp_backup, and if exists skip the proccess...
                    $sql_fingerprint_tmp_backup = "SELECT count(id) as tot FROM tbl_attendance_fingerprint_tmp_backup WHERE date_on = '" . $fingerPrintDateOn . "' AND in_or_out = '" . $fingerPrintInOrOut . "' AND in_or_out_time = '" . $fingerPrintInOrOutTime . "' AND (staff_id = '" . $fingerPrintStaffId . "' OR staff_employee_id = '" . $fingerPrintStaffEmployeeId . "') LIMIT 0,1";
                    $rs_existing_rec_total = $dbDefaultAdapter->fetchRow($sql_fingerprint_tmp_backup);
                    $existing_rec_total = $rs_existing_rec_total['tot'];
                    if ($existing_rec_total == 0) {  // if record not exists in tbl_attendance_fingerprint_tmp_backup
                        //============// get employee information....//=============================
                        $employeeService = new Base_Model_ObtorLib_App_Core_Employee_Service_Employee();
                        $employeeInformation = $employeeService->getEmployee($fingerPrintStaffId);
                        $employeeType = $employeeInformation->getEmployeeType();
                        //==========================================================================
                        // Get attendance records,if records exits on the attendance table, using date and staff id...
                        $sql_get_attendance_records = "SELECT * FROM tbl_attendance WHERE date_on = '" . $fingerPrintDateOn . "' AND tbl_employee_id = '" . $fingerPrintStaffId . "'"; // the tbl_employee_id is the unique id in the employee table
                        $result_attendance_records = $dbDefaultAdapter->fetchRow($sql_get_attendance_records);
                        $attendance_record_exits = NULL;
                        $existing_attendance_record_id = '';
                        $existing_attendance_in_time = '';
                        $existing_attendance_out_time = '';
                        $existing_other_in_out = '';


                        if ($result_attendance_records) {
                            if ($result_attendance_records['id'] && $result_attendance_records['id'] != "") {
                                $attendance_record_exits = 'Yes';
                                $existing_attendance_record_id = $result_attendance_records['id'];
                                $existing_attendance_in_time = $result_attendance_records['attendance_in_time'];
                                $existing_attendance_out_time = $result_attendance_records['attendance_out_time'];
                                $existing_other_in_out = $result_attendance_records['other_in_out'];
                            }
                        }


                        $other_in_out = "";
                        $id = "";
                        $date_on = $fingerPrintDateOn;
                        $is_working_day = $staff_actual_working_hrs['is_working_day'];
                        $scheduled_on_time = $staff_actual_working_hrs['on_time'];
                        $scheduled_off_time = $staff_actual_working_hrs['off_time'];

                        $scheduled_on_time_int = strtotime($scheduled_on_time);
                        $scheduled_off_time_int = strtotime($scheduled_off_time);


                        // if $fingerPrintInOrOut is 1, then that is IN Time, and 0 is out time
                        if ($fingerPrintInOrOut == 1) {
                            $in_time_fp_serial = $terminal_id;
                            $attendance_in_time = $fingerPrintInOrOutTime;
                            $attendance_in_time_int = strtotime($attendance_in_time);
                            $is_late = NULL;

                            if ($attendance_in_time_int > $scheduled_on_time_int) {
                                $is_late = "Yes";
                                $in_time_different_min = ($attendance_in_time_int - $scheduled_on_time_int) / 60;
                                $in_time_different_min_type = "-";
                            } else {
                                $is_late = "No";
                                $in_time_different_min = ($scheduled_on_time_int - $attendance_in_time_int) / 60;
                                $in_time_different_min_type = "+";
                            }
                        } elseif ($fingerPrintInOrOut == 0) {
                            $out_time_fp_serial = $terminal_id;
                            $attendance_out_time = $fingerPrintInOrOutTime;
                            $attendance_out_time_int = strtotime($attendance_out_time);

                            if ($scheduled_off_time_int > $attendance_out_time_int) {
                                $is_early_off = 'Yes';
                                $out_time_different_min = ($scheduled_off_time_int - $attendance_out_time_int) / 60;
                                $out_time_different_min_type = "-";
                            } else {
                                $is_early_off = 'No';
                                $out_time_different_min = ($attendance_out_time_int - $scheduled_off_time_int) / 60;
                                $out_time_different_min_type = "-";
                            }
                        }



                        $other_in_out = "";
                        $in_time_status_exempted = "";
                        $out_time_status_exempted = "";
                        $is_on_leave = "";
                        $deducted_leave_for_late_come = 0;
                        $deducted_leave_for_early_off = 0;
                        $tbl_employee_id = $fingerPrintStaffId;

                        $sql_query = "";

                        // generate sql to insert the data to the main table.....
                        // procces the attendance for Working and Non-Working Staffs.. and then Do the modification if working day or non-working day
                        //+++++++++++++++++++++++++++++++++++++++++++++++++

                        if ($attendance_record_exits == 'Yes') {
                            // update the details.....
                            if ($fingerPrintInOrOut == 1) { // update the intime details....
                                if ($existing_attendance_in_time) {
                                    $recExisting_attendance_in_time_int = strtotime($existing_attendance_in_time);
                                    $new_attendance_in_time_int = strtotime($attendance_in_time);

                                    // check if the new in time is smaller than existing in time, then that new intime becomes 
                                    // actual intime and existing intime will go to other inout
                                    if ($new_attendance_in_time_int == $recExisting_attendance_in_time_int) {
                                        $attendance_in_time = $attendance_in_time; // the new intime
                                        $other_in_out = $existing_other_in_out;
                                    } else if ($new_attendance_in_time_int < $recExisting_attendance_in_time_int) {
                                        $attendance_in_time = $attendance_in_time; // the new intime
                                        $other_in_out = $existing_other_in_out . "," . $existing_attendance_in_time;
                                    } else {
                                        $other_in_out = $existing_other_in_out . "," . $attendance_in_time;
                                        $attendance_in_time = $existing_attendance_in_time; // the old intime
                                    }

                                    // calculate the in time different again....
                                    $attendance_in_time_int = strtotime($attendance_in_time);
                                    if ($attendance_in_time_int > $scheduled_on_time_int) {
                                        $is_late = "Yes";
                                        $in_time_different_min = ($attendance_in_time_int - $scheduled_on_time_int) / 60;
                                        $in_time_different_min_type = "-";
                                    } else {
                                        $is_late = "No";
                                        $in_time_different_min = ($scheduled_on_time_int - $attendance_in_time_int) / 60;
                                        $in_time_different_min_type = "+";
                                    }
                                }

                                $sql_query = "UPDATE `tbl_attendance` "
                                        . "SET "
                                        . "`attendance_in_time` = '" . $attendance_in_time . "', "
                                        . "`is_late` = '" . $is_late . "', "
                                        . "`other_in_out` = '" . $other_in_out . "', "
                                        . "`in_time_fp_serial` = '" . $in_time_fp_serial . "', "
                                        . "`in_time_status_exempted` = '" . $in_time_status_exempted . "', "
                                        . "`in_time_different_min` = '" . $in_time_different_min . "', "
                                        . "`in_time_different_min_type` = '" . $in_time_different_min_type . "'"
                                        . "WHERE `id` = '" . $existing_attendance_record_id . "'";
                            } elseif ($fingerPrintInOrOut == 0) { // update the out time details...
                                if ($existing_attendance_out_time) {

                                    $recExisting_attendance_out_time_int = strtotime($existing_attendance_out_time);
                                    $new_attendance_out_time_int = strtotime($attendance_out_time);

                                    // check if the new out time is bigger than existing out time, then that new out time becomes 
                                    // actual out time and existing outtime will go to other inout
                                    if ($new_attendance_out_time_int == $recExisting_attendance_out_time_int) {
                                        $attendance_out_time = $attendance_out_time;
                                        $other_in_out = $existing_other_in_out;
                                    } else if ($new_attendance_out_time_int > $recExisting_attendance_out_time_int) {
                                        $attendance_out_time = $attendance_out_time; // the new intime
                                        $other_in_out = $existing_other_in_out . "," . $existing_attendance_out_time;
                                    } else {
                                        $other_in_out = $existing_other_in_out . "," . $attendance_out_time;
                                        $attendance_out_time = $existing_attendance_out_time; // the old intime
                                    }


                                    // calculate the out time different again....
                                    $attendance_out_time_int = strtotime($attendance_out_time);
                                    if ($scheduled_off_time_int > $attendance_out_time_int) {
                                        $is_early_off = 'Yes';
                                        $out_time_different_min = ($scheduled_off_time_int - $attendance_out_time_int) / 60;
                                        $out_time_different_min_type = "-";
                                    } else {
                                        $is_early_off = 'No';
                                        $out_time_different_min = ($attendance_out_time_int - $scheduled_off_time_int) / 60;
                                        $out_time_different_min_type = "+";
                                    }
                                }


                                $sql_query = "UPDATE `tbl_attendance` "
                                        . "SET "
                                        . "`attendance_out_time` = '" . $attendance_out_time . "', "
                                        . "`is_early_off` = '" . $is_early_off . "', "
                                        . "`other_in_out` = '" . $other_in_out . "', "
                                        . "`out_time_fp_serial` = '" . $out_time_fp_serial . "', "
                                        . "`out_time_status_exempted` = '" . $out_time_status_exempted . "', "
                                        . "`out_time_different_min` = '" . $out_time_different_min . "', "
                                        . "`out_time_different_min_type` = '" . $out_time_different_min_type . "'"
                                        . "WHERE `id` = '" . $existing_attendance_record_id . "'";
                            }
                        } else {
                            // insert the details....
                            if ($fingerPrintInOrOut == 1) { // insert the intime details....
                                $sql_query = "INSERT INTO `tbl_attendance` ("
                                        . "`id`, "
                                        . "`date_on`, "
                                        . "`day_of_the_week`, "
                                        . "`is_working_day`, "
                                        . "`expected_working_hrs_day`, "
                                        . "`scheduled_on_time`, "
                                        . "`scheduled_off_time`, "
                                        . "`attendance_in_time`, "
                                        . "`is_late`,"
                                        . "`other_in_out`,"
                                        . "`in_time_fp_serial`,"
                                        . "`in_time_different_min`,"
                                        . "`in_time_different_min_type`,"
                                        . "`is_on_leave`,"
                                        . "`employee_type`, "
                                        . "`tbl_employee_id`) "
                                        . "VALUES ("
                                        . "NULL, "
                                        . "'" . $date_on . "', "
                                        . "'" . $report_date_day_name . "', "
                                        . "'" . $report_date_is_working_day . "', "
                                        . "'" . $report_expected_working_hrs . "', "
                                        . "'" . $report_date_on_time . "', "
                                        . "'" . $report_date_off_time . "', "
                                        . "'" . $attendance_in_time . "', "
                                        . "'" . $is_late . "', "
                                        . "'" . $other_in_out . "', "
                                        . "'" . $in_time_fp_serial . "', "
                                        . "'" . $in_time_different_min . "', "
                                        . "'" . $in_time_different_min_type . "', "
                                        . "'" . $is_on_leave . "', "
                                        . "'" . $employeeType . "', "
                                        . "'" . $tbl_employee_id . "')";
                            } elseif ($fingerPrintInOrOut == 0) { // insert the out time details...
                                $sql_query = "INSERT INTO `tbl_attendance` ("
                                        . "`id`, "
                                        . "`date_on`, "
                                        . "`day_of_the_week`, "
                                        . "`is_working_day`, "
                                        . "`expected_working_hrs_day`, "
                                        . "`scheduled_on_time`, "
                                        . "`scheduled_off_time`, "
                                        . "`attendance_out_time`, "
                                        . "`is_early_off`,"
                                        . "`other_in_out`,"
                                        . "`out_time_fp_serial`,"
                                        . "`out_time_different_min`,"
                                        . "`out_time_different_min_type`,"
                                        . "`is_on_leave`,"
                                        . "`employee_type`, "
                                        . "`tbl_employee_id`) "
                                        . "VALUES ("
                                        . "NULL, "
                                        . "'" . $date_on . "', "
                                        . "'" . $report_date_day_name . "', "
                                        . "'" . $report_date_is_working_day . "', "
                                        . "'" . $report_expected_working_hrs . "', "
                                        . "'" . $report_date_on_time . "', "
                                        . "'" . $report_date_off_time . "', "
                                        . "'" . $attendance_out_time . "', "
                                        . "'" . $is_early_off . "', "
                                        . "'" . $other_in_out . "', "
                                        . "'" . $out_time_fp_serial . "', "
                                        . "'" . $out_time_different_min . "', "
                                        . "'" . $out_time_different_min_type . "', "
                                        . "'" . $is_on_leave . "', "
                                        . "'" . $employeeType . "', "
                                        . "'" . $tbl_employee_id . "')";
                            }
                        }

                        // insert the sql for intime and out time.......
                        $attendance_result_from_finger_print = $dbDefaultAdapter->query($sql_query);
                        print("Attendance updated, Staff ID -" . $tbl_employee_id . "\n");

                        // Insert the current record to the backup table and delete from tmp table
                        $fingerprint_tmp_backupData = array('date_on' => $fingerPrintDateOn, 'in_or_out' => $fingerPrintInOrOut, 'in_or_out_time' => $fingerPrintInOrOutTime, 'staff_id' => $fingerPrintStaffId, 'staff_employee_id' => $fingerPrintStaffEmployeeId, 'updated_on_terminal' => $fingerPrintUpdatedOnTerminal, 'terminal_id' => $terminal_id);
                        $db = Zend_Db_Table_Abstract::getDefaultAdapter();
                        $rsfingerprint_tmp_backupData = $db->insert('tbl_attendance_fingerprint_tmp_backup', $fingerprint_tmp_backupData);



                        // again query the attendance records.....
                        $sql_get_final_attendance_records = "SELECT * FROM tbl_attendance WHERE date_on = '" . $fingerPrintDateOn . "' AND tbl_employee_id = '" . $fingerPrintStaffId . "'";
                        $result_final_attendance_records = $dbDefaultAdapter->fetchRow($sql_get_final_attendance_records);
                        $record_final_attendance_id = $result_final_attendance_records['id'];
                        $record_final_attendance_date = $result_final_attendance_records['date_on'];
                        $record_final_attendance_in_time = $result_final_attendance_records['attendance_in_time'];
                        $record_final_attendance_out_time = $result_final_attendance_records['attendance_out_time'];
                        $record_final_scheduled_is_working_day = $result_final_attendance_records['is_working_day'];
                        $record_final_scheduled_on_time = $result_final_attendance_records['scheduled_on_time']; // actual on time
                        $record_final_scheduled_off_time = $result_final_attendance_records['scheduled_off_time']; // actual off time..
                        $record_final_scheduled_expected_working_hrs_day = $result_final_attendance_records['expected_working_hrs_day'];
                        $record_final_attendance_is_late = $result_final_attendance_records['is_late'];
                        $record_final_attendance_is_early_off = $result_final_attendance_records['is_early_off'];

                        // if in time and out time are exists on the system....

                        if ($record_final_attendance_in_time != "" && $record_final_attendance_out_time != "") {

                            // scheduled working hours....
                            $scheduled_on_time = strtotime($record_final_scheduled_on_time);
                            $scheduled_off_time = strtotime($record_final_scheduled_off_time);
                            $scheduled_expected_working_hrs_day = $record_final_scheduled_expected_working_hrs_day;
                            $scheduled_expected_working_hrs = 0;

                            if ($scheduled_off_time > $scheduled_on_time) {
                                $scheduled_expected_working_hrs = ($scheduled_off_time - $scheduled_on_time) / 3600; // 3600 seconds in an hour
                            }


                            // current records fp details....
                            $current_record_attendance_in_time = strtotime($record_final_attendance_in_time);
                            $current_record_attendance_out_time = strtotime($record_final_attendance_out_time);
                            $current_record_counted_working_hrs = 0;




                            if ($current_record_attendance_out_time > $current_record_attendance_in_time) {
                                $current_record_counted_working_hrs = ($current_record_attendance_out_time - $current_record_attendance_in_time) / 3600; // 3600 seconds in an hour
                            }

                            if ($scheduled_expected_working_hrs > 0) {
                                $counted_working_day = ($scheduled_expected_working_hrs_day / $scheduled_expected_working_hrs) * $current_record_counted_working_hrs;
                            }

                            if ($record_final_scheduled_is_working_day == 'Yes') { // if it is a working day, go as normal...
                                $first_day_of_current_attendance_month = date('Y-m-01', strtotime($record_final_attendance_date));
                                $last_day_of_current_attendance_month = date('Y-m-t', strtotime($record_final_attendance_date));

                                $from_day_of_current_attendance_month = $first_day_of_current_attendance_month;
                                $to_day_of_current_attendance_month = $last_day_of_current_attendance_month . " 23:59:59.999";

                                // get total intime status exempted
                                $sql_count_in_time_status_exempted = "SELECT count(id) as tot FROM tbl_attendance WHERE in_time_status_exempted = 'Yes' AND date_on BETWEEN '" . $from_day_of_current_attendance_month . "' AND '" . $to_day_of_current_attendance_month . "'";
                                $rs_count_in_time_status_exempted = $dbDefaultAdapter->fetchRow($sql_count_in_time_status_exempted);
                                $total_in_time_status_exempted = $rs_count_in_time_status_exempted['tot'];

                                // get total outtime status exempted
                                $sql_count_out_time_status_exempted = "SELECT count(id) as tot FROM tbl_attendance WHERE in_time_status_exempted = 'Yes' AND date_on BETWEEN '" . $from_day_of_current_attendance_month . "' AND '" . $to_day_of_current_attendance_month . "'";
                                $rs_count_out_time_status_exempted = $dbDefaultAdapter->fetchRow($sql_count_out_time_status_exempted);
                                $total_out_time_status_exempted = $rs_count_out_time_status_exempted['tot'];


                                $in_time_status_exempted = '';
                                $out_time_status_exempted = '';
                                $extra_working_hrs = 0;
                                $deducted_leave_for_late_come = 0;
                                $deducted_leave_for_early_off = 0;

                                if ($record_final_attendance_is_late == 'Yes') {
                                    if ($total_in_time_status_exempted < $allowedLateComes) {
                                        $in_time_status_exempted = 'Yes';
                                    }
                                }

                                if ($record_final_attendance_is_early_off == 'Yes') {
                                    if ($total_out_time_status_exempted < $allowedEarlyOff) {
                                        $out_time_status_exempted = 'Yes';
                                    }
                                }

                                if ($current_record_counted_working_hrs > $scheduled_expected_working_hrs) {
                                    $extra_working_hrs = $current_record_counted_working_hrs - $scheduled_expected_working_hrs;
                                }


                                if ($deductingLeaveForLateCome == 'Yes') {

                                    if ($record_final_attendance_is_late == 'Yes') {
                                        $total_late_income_min = (strtotime($record_final_attendance_in_time) - strtotime($record_final_scheduled_on_time)) / 60;
                                        if ($total_late_income_min < 45) {
                                            $deducted_leave_for_late_come = $deductingLeaveForLateComeAndEarlyOff_45;
                                        } elseif ($total_late_income_min < 120) {
                                            $deducted_leave_for_late_come = $deductingLeaveForLateComeAndEarlyOff_120;
                                        } else {
                                            $deducted_leave_for_late_come = $counted_working_day;
                                        }
                                    }

                                    if ($record_final_attendance_is_early_off == 'Yes') {
                                        $total_early_off_min = (strtotime($record_final_scheduled_off_time) - strtotime($record_final_attendance_out_time)) / 60;

                                        if ($total_early_off_min < 45) {
                                            $deducted_leave_for_early_off = $deductingLeaveForLateComeAndEarlyOff_45;
                                        } elseif ($total_early_off_min < 120) {
                                            $deducted_leave_for_early_off = $deductingLeaveForLateComeAndEarlyOff_120;
                                        } else {
                                            $deducted_leave_for_early_off = $counted_working_day;
                                        }
                                    }
                                }


                                $attendance_record_final_update = "UPDATE `tbl_attendance` SET "
                                        . "`in_time_status_exempted` = '" . $in_time_status_exempted . "', "
                                        . "`out_time_status_exempted` = '" . $out_time_status_exempted . "', "
                                        . "`deducted_leave_for_late_come` = '" . $deducted_leave_for_late_come . "', "
                                        . "`deducted_leave_for_early_off` = '" . $deducted_leave_for_early_off . "', "
                                        . "`counted_working_day` = '" . $counted_working_day . "', "
                                        . "`extra_working_hrs` = '" . $extra_working_hrs . "' "
                                        . "WHERE `id` = '" . $record_final_attendance_id . "'";
                            } else { // if it is not a working day, make that working hours as extra working hours...
                                $extra_working_hrs = $current_record_counted_working_hrs;
                                $attendance_record_final_update = "UPDATE `tbl_attendance` SET "
                                        . "`is_late` = 'No', "
                                        . "`is_early_off` = 'No', "
                                        . "`counted_working_day` = '" . $counted_working_day . "', "
                                        . "`extra_working_hrs` = '" . $extra_working_hrs . "', "
                                        . "`deducted_leave_for_late_come` = NULL, "
                                        . "`deducted_leave_for_early_off` = NULL "
                                        . "WHERE `id` = '" . $record_final_attendance_id . "'";
                            }


                            $db = Zend_Db_Table_Abstract::getDefaultAdapter();
                            $rsAttendance_record_final_update = $dbDefaultAdapter->query($attendance_record_final_update);
                        }



                        //++++++++++++++++++++++++++++++++++++++++++++++++++++++
                    } // if record not exists in tbl_attendance_fingerprint_tmp_backup
                    // delete the record from tmp table....
                    $db = Zend_Db_Table_Abstract::getDefaultAdapter();
                    $delfingerprint_tmp = $db->delete('tbl_attendance_fingerprint_tmp', 'id =' . (int) $fingerPrintId);
                }
            }
        } catch (Exception $ex) {
            throw new Base_Model_ObtorLib_App_Core_Employee_Exception($ex);
        }
    }

    public function getStaffAttendanceReport($staffId, $fromDate, $toDate) {
        try {
            
            $reportDates = $this->getDatesBetweenTwoDates($fromDate, $toDate);
            
            $reportData = array();
            foreach($reportDates As $rDateIndex=>$reportDate){
                
                 
                $attendanceInfo = $this->getAttendanceByDateAndStaffId($reportDate,$staffId);
                 
                if($attendanceInfo){
                $inTime = $attendanceInfo->getAttendanceInTime();
                $outTime = $attendanceInfo->getAttendanceOutTime();
                $otherInOut = $attendanceInfo->getOtherInOut();
                $isLate = $attendanceInfo->getIsLate();
                $earlyOff = $attendanceInfo->getIsEarlyOff();
                $onLeave = 'Yes';
                $officeHoliday = 'Yes';
                $expectedWorkDay = $attendanceInfo->getExpectedWorkingHrsDay();
                $countedWorkingDay = $attendanceInfo->getCountedWorkingDay();
                $countedExtraWorkingHrs = $attendanceInfo->getExtraWorkingHrs();
                $approvedExtraWorkingHrs = $attendanceInfo->getExtraWorkingHrsApproved();
                $In_Time_Exempted = $attendanceInfo->getInTimeStatusExempted();
                $Out_Time_Exempted = $attendanceInfo->getOutTimeStatusExempted();
                $In_Time_Excused = $attendanceInfo->getInTimeExecused();
                $Out_Time_Excused = $attendanceInfo->getOutTimeExecused();
                
                
                $arrAttendanceStatus = array('In-Time-Exempted'=>$In_Time_Exempted,'Out-Time-Exempted'=>$Out_Time_Exempted,'In-Time-Excused'=>$In_Time_Excused,'Out-Time-Excused'=>$Out_Time_Excused);
                }
                
                $objStaffAttendanceReportRow = new Base_Model_ObtorLib_App_Core_Employee_Entity_StaffAttendanceReportRow();
                $objStaffAttendanceReportRow->setDateOn($reportDate);
                $objStaffAttendanceReportRow->setWeekDay($this->getDayFromDate($reportDate));
                $objStaffAttendanceReportRow->setInTime($inTime);
                $objStaffAttendanceReportRow->setOutTime($outTime);
                $objStaffAttendanceReportRow->setOtherInOut($otherInOut);
                $objStaffAttendanceReportRow->setIsLate($isLate);
                $objStaffAttendanceReportRow->setEarlyOff($earlyOff);
                $objStaffAttendanceReportRow->setOnLeave($onLeave);
                $objStaffAttendanceReportRow->setOfficeHoliday($officeHoliday); 
                $objStaffAttendanceReportRow->setExpectedWorkDay($expectedWorkDay);
                $objStaffAttendanceReportRow->setAttendanceStatus($arrAttendanceStatus);
                $objStaffAttendanceReportRow->setCountedWorkingDay($countedWorkingDay);
                $objStaffAttendanceReportRow->setCountedExtraWorkingHrs($countedExtraWorkingHrs);
                $objStaffAttendanceReportRow->setApprovedExtraWorkingHrs($approvedExtraWorkingHrs);
                array_push($reportData, $objStaffAttendanceReportRow);  
            }
            
            return $reportData;
            
        } catch (Exception $ex) {
            throw new Base_Model_ObtorLib_App_Core_Employee_Exception($ex);
        }
    }

    public function getDatesBetweenTwoDates($fromDate, $toDate) {
        $dateMonthYearArr = array();
        $fromDateTS = strtotime($fromDate);
        $toDateTS = strtotime($toDate);

        for ($currentDateTS = $fromDateTS; $currentDateTS <= $toDateTS; $currentDateTS += (60 * 60 * 24)) {
            $currentDateStr = date("Y-m-d", $currentDateTS);
            $dateMonthYearArr[] = $currentDateStr;
        }
        return $dateMonthYearArr;
    }
    
    protected function getDayFromDate($date)
	{
		$myDate = $date;
		$day =  date('l', strtotime($myDate));
		return $day;
	}

}
