<?php
require_once 'cron_functions.php';
// this need to be done by csv. This script is used only for demo data
function createDateRangeArray($strDateFrom,$strDateTo)
{
    // takes two dates formatted as YYYY-MM-DD and creates an
    // inclusive array of the dates between the from and to dates.

    // could test validity of dates here but I'm already doing
    // that in the main script

    $aryRange=array();

    $iDateFrom=mktime(1,0,0,substr($strDateFrom,5,2),     substr($strDateFrom,8,2),substr($strDateFrom,0,4));
    $iDateTo=mktime(1,0,0,substr($strDateTo,5,2),     substr($strDateTo,8,2),substr($strDateTo,0,4));

    if ($iDateTo>=$iDateFrom)
    {
        array_push($aryRange,date('Y-m-d',$iDateFrom)); // first entry
        while ($iDateFrom<$iDateTo)
        {
            $iDateFrom+=86400; // add 24 hours
            array_push($aryRange,date('Y-m-d',$iDateFrom));
        }
    }
    return $aryRange;
}

$strDateFrom = '2014-02-01';
$strDateTo = '2014-02-28';
$fingerprint_dates = createDateRangeArray($strDateFrom,$strDateTo);

foreach($fingerprint_dates As $fpDate){
    
    $dayName =  date("l",strtotime($fpDate));
    if($dayName != 'Saturday' || $dayName != 'Sunday' ){
        
    $employee_status = 'In-Service';
    // get all the user all staffs...
    $employeeService = new Base_Model_ObtorLib_App_Core_Employee_Service_Employee();
    $employeeEntity = new Base_Model_ObtorLib_App_Core_Employee_Entity_Employee();
    $employeeEntity->setEmployeeStatus($employee_status);
    $employeeService->employee = $employeeEntity;
    $employeeInfo = $employeeService->search(NULL);
    
    foreach($employeeInfo As $eIndex=>$empInfo){
        $staff_id = $empInfo->getId();
        $staff_employee_number = $empInfo->getEmployeeNumber();
        
        $arrInTimes = array('08:15','08:17','08:18','08:05','08:07','08:19','08:20','08:22','08:23','08:24','08:26','08:27','08:30','08:32','08:35','08:38','08:40','08:42','08:45','08:55','09:18','09:28','09:38','09:40','09:45','09:52','09:59','10:10','10:15','10:20','10:30','10:35');
        $rand_intime_key = array_rand($arrInTimes, 1);
        $staff_in_time =  $arrInTimes[$rand_intime_key];
        
        $arrOutTimes = array('16:15','16:17','16:18','17:05','17:07','17:19','16:20','16:22','16:23','17:24','17:26','17:27','17:30','17:32','17:35','17:38','17:40','17:42','17:45','17:55','18:18','18:28','18:38','18:40','18:45','18:52','18:59','19:10','19:15','19:20','19:30','19:35');
        $rand_outtime_key = array_rand($arrOutTimes, 1);
        $staff_out_time =  $arrOutTimes[$rand_outtime_key];
        
        $updated_on_terminal = $fpDate.' 11:55:00';
        // insert intime....
        $inTimeData = array('date_on'=>$fpDate,'in_or_out'=>'1','in_or_out_time'=>$staff_in_time,'staff_id'=>$staff_id,'staff_employee_id'=>$staff_employee_number,'updated_on_terminal'=>$updated_on_terminal);
        $db = Zend_Db_Table_Abstract::getDefaultAdapter();
        $result 	= $db->insert('tbl_attendance_fingerprint_tmp',$inTimeData);
        
        // insert outtime....
        $updated_on_terminal = $fpDate.' 18:55:00';
        $outTimeData = array('date_on'=>$fpDate,'in_or_out'=>'0','in_or_out_time'=>$staff_out_time,'staff_id'=>$staff_id,'staff_employee_id'=>$staff_employee_number,'updated_on_terminal'=>$updated_on_terminal);
        $db = Zend_Db_Table_Abstract::getDefaultAdapter();
        $result 	= $db->insert('tbl_attendance_fingerprint_tmp',$outTimeData);

        
        print($staff_id." - ".$staff_employee_number."\n");
    }
    
    }
    print($fpDate."\n");
}

// Echo done
echo date('H:i:s') . " Done writing file.\r\n";
?>
