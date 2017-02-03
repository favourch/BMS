<?php
include 'con.php';

$SQL_STAFFS = "SELECT * FROM tbl_employee";
$RS_STAFF  = mysql_query($SQL_STAFFS) or die(mysql_error());

while($staff_rows = mysql_fetch_assoc($RS_STAFF)){
    
    $staffId = $staff_rows['id'];
    $SQL_INSERT_SCHEDULE = "INSERT INTO `tbl_employee_working_schedule` ("
            . "`employee_id`, "
            . "`effective_from`, "
            . "`is_active`) VALUES ("
            . "'$staffId', "
            . "'2014-08-12', "
            . "'Yes')";
    
    $scheduleRs = mysql_query($SQL_INSERT_SCHEDULE);
    $scheduleId = mysql_insert_id();
    
    $SQL_WORKING_TIME = "INSERT INTO `tbl_employee_working_time` (`is_working`, `week_day`, `on_time`, `off_time`, `schedule_id`) VALUES
                        ('No', 'Sunday', '00:00:00', '00:00:00', '".$scheduleId."'),
                        ('Yes', 'Monday', '08:30:00', '17:30:00', '".$scheduleId."'),
                        ('Yes', 'Tuesday', '08:30:00', '17:30:00', '".$scheduleId."'),
                        ('Yes', 'Wednesday', '08:30:00', '17:30:00', '".$scheduleId."'),
                        ('Yes', 'Thursday', '08:30:00', '17:30:00', '".$scheduleId."'),
                        ('Yes', 'Friday', '08:30:00', '17:30:00', '".$scheduleId."'),
                        ('No', 'Saturday', '00:00:00', '00:00:00', '".$scheduleId."')";
    
    $RS_WORKING_TIME = mysql_query($SQL_WORKING_TIME);
    
    
    print("Working Time Inserted For Staff ID ".$staffId."\n");
    
}

