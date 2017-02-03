<?php
/**
 * Created by PhpStorm.
 * Employee: ism-apac
 * Date: 8/7/14
 * Time: 3:26 PM
 */

class Base_Model_ObtorLib_App_Core_Employee_Dao_AttendanceDailySummary extends Zend_Db_Table_Abstract {

    //put your code here
    public $attendanceDailySummary;
    protected $_name = 'tbl_attendance_daily_summary';

    /*
     * Get a user employee using id
     * @return      : Entity Employee Object (Base_Model_ObtorLib_App_Core_Employee_Entity_AttendanceDailySummary)
     */

    public function getAttendanceDailySummary($id) {
        try {
            $id = (int) $id;
            $row = $this->fetchRow('id = ' . $id);
            if ($row) {
                $attendanceDailySummaryRow = $row->toArray();
                $attendanceDailySummaryDayEntity = new Base_Model_ObtorLib_App_Core_Employee_Entity_AttendanceDailySummary();
                $attendanceDailySummaryDayEntity->setId($attendanceDailySummaryRow['id']);
                $attendanceDailySummaryDayEntity->setDateOn($attendanceDailySummaryRow['date_on']);
                $attendanceDailySummaryDayEntity->setCountry($attendanceDailySummaryRow['country_id']);
                $attendanceDailySummaryDayEntity->setRegion($attendanceDailySummaryRow['region_id']);
                $attendanceDailySummaryDayEntity->setBranch($attendanceDailySummaryRow['branch_id']);
                $attendanceDailySummaryDayEntity->setDepartment($attendanceDailySummaryRow['department_id']);
                $attendanceDailySummaryDayEntity->setTotalStaffInService($attendanceDailySummaryRow['total_staff_in_service']);
                $attendanceDailySummaryDayEntity->setTotalStaffOnDuty($attendanceDailySummaryRow['total_staff_on_duty']);
                $attendanceDailySummaryDayEntity->setTotalStaffOffDuty($attendanceDailySummaryRow['total_staff_off_duty']);
                $attendanceDailySummaryDayEntity->setTotalPresentedStaff($attendanceDailySummaryRow['total_presented_staff']);
                $attendanceDailySummaryDayEntity->setTotalPresentedOnTime($attendanceDailySummaryRow['total_presented_on_time']);
                $attendanceDailySummaryDayEntity->setTotalPresentedLate($attendanceDailySummaryRow['total_presented_late']);
                $attendanceDailySummaryDayEntity->setTotalPresentedEarlyOff($attendanceDailySummaryRow['total_presented_early_off']);
                $attendanceDailySummaryDayEntity->setTotalAbsents($attendanceDailySummaryRow['total_absents']);
                return $attendanceDailySummaryDayEntity;
            } else {
                return null;
            }
        } catch (Exception $ex) {
            throw new Base_Model_ObtorLib_App_Core_Employee_Exception($ex);
        }
    }


    /*
     * Add AttendanceDailySummary
     * @return      : Integer ID / Null
     */

    public function addAttendanceDailySummary() {
        try {
            if (!($this->attendanceDailySummary instanceof Base_Model_ObtorLib_App_Core_Employee_Entity_AttendanceDailySummary)) {
                throw new Base_Model_ObtorLib_App_Core_Employee_Exception(" AttendanceDailySummary Entity not initialized");
            } else {
                
                $data = array('date_on'=>$this->attendanceDailySummary->getDateOn(),
                    'country_id'=>$this->attendanceDailySummary->getCountry(),
                    'region_id'=>$this->attendanceDailySummary->getRegion(),
                    'branch_id'=>$this->attendanceDailySummary->getBranch(),
                    'department_id'=>$this->attendanceDailySummary->getDepartment(),
                    'total_staff_in_service'=>$this->attendanceDailySummary->getTotalStaffInService(),
                    'total_staff_on_duty'=>$this->attendanceDailySummary->getTotalStaffOnDuty(),
                    'total_staff_off_duty'=>$this->attendanceDailySummary->getTotalStaffOffDuty(),
                    'total_presented_staff'=>$this->attendanceDailySummary->getTotalPresentedStaff(),
                    'total_presented_on_time'=>$this->attendanceDailySummary->getTotalPresentedOnTime(),
                    'total_presented_late'=>$this->attendanceDailySummary->getTotalPresentedLate(),
                    'total_presented_early_off'=>$this->attendanceDailySummary->getTotalPresentedEarlyOff(),
                    'total_absents'=>$this->attendanceDailySummary->getTotalAbsents());
                
                $last_inserted_id = $this->insert($data);
                return $last_inserted_id;
            }
        } catch (Exception $ex) {
            throw new Base_Model_ObtorLib_App_Core_Employee_Exception($ex);
        }
    }

    /*
     * Update AttendanceDailySummary
     * @return      : Boolean true/false
     */

    public function updateAttendanceDailySummary() {
        try {
            if (!($this->attendanceDailySummary instanceof Base_Model_ObtorLib_App_Core_Employee_Entity_AttendanceDailySummary)) {
                throw new Base_Model_ObtorLib_App_Core_Employee_Exception(" AttendanceDailySummary Entity not initialized");
            } else {
                  $data = array('total_staff_in_service'=>$this->attendanceDailySummary->getTotalStaffInService(),
                    'total_staff_on_duty'=>$this->attendanceDailySummary->getTotalStaffOnDuty(),
                    'total_staff_off_duty'=>$this->attendanceDailySummary->getTotalStaffOffDuty(),
                    'total_presented_staff'=>$this->attendanceDailySummary->getTotalPresentedStaff(),
                    'total_presented_on_time'=>$this->attendanceDailySummary->getTotalPresentedOnTime(),
                    'total_presented_late'=>$this->attendanceDailySummary->getTotalPresentedLate(),
                    'total_presented_early_off'=>$this->attendanceDailySummary->getTotalPresentedEarlyOff(),
                      'total_absents'=>$this->attendanceDailySummary->getTotalAbsents());
                return $this->update($data, 'id = ' . (int) $this->attendanceDailySummary->getId());
            }
        } catch (Exception $ex) {
            throw new Base_Model_ObtorLib_App_Core_Employee_Exception($ex);
        }
    }

    /*
     * Delete AttendanceDailySummary
     * @return      : Integer ID / Null
     */

    public function deleteAttendanceDailySummary() {
        try {
            if (!($this->attendanceDailySummary instanceof Base_Model_ObtorLib_App_Core_Employee_Entity_AttendanceDailySummary)) {
                throw new Base_Model_ObtorLib_App_Core_Employee_Exception(" AttendanceDailySummary Entity not initialized");
            } else {
                return $this->delete('id =' . (int) $this->attendanceDailySummary->getId());
            }
        } catch (Exception $ex) {
            throw new Base_Model_ObtorLib_App_Core_Employee_Exception($ex);
        }
    }

    /*
     * Search attendanceDailySummary....
     * @return : Array of AttendanceDailySummary Entities...
     */

    public function search() {
        try {
            if (!($this->attendanceDailySummary instanceof Base_Model_ObtorLib_App_Core_Employee_Entity_AttendanceDailySummary)) {
                throw new Base_Model_ObtorLib_App_Core_Employee_Exception(" AttendanceDailySummary Entity not initialized");
            } else {
                $arrWhere = array();
                $arrAttendanceDailySummary = array();
                
                
                $dateOn     = $this->attendanceDailySummary->getDateOn();
                $country    = $this->attendanceDailySummary->getCountry();
                $region     = $this->attendanceDailySummary->getRegion();
                $branch     = $this->attendanceDailySummary->getBranch();
                $department = $this->attendanceDailySummary->getDepartment();
                
                $fromDate   = $this->attendanceDailySummary->getFromDate();
                $toDate   = $this->attendanceDailySummary->getToDate();
                
                
                
                $attendanceDailySummarySql = "SELECT id FROM tbl_attendance_daily_summary ";
                
                if ($dateOn) {
                    array_push($arrWhere, "date_on = '" . $dateOn . "'");
                }
                
                if ($country) {
                    array_push($arrWhere, "country_id = '" . $country . "'");
                }
                
                if ($region) {
                    array_push($arrWhere, "region_id = '" . $region . "'");
                }
                
                if ($branch) {
                    array_push($arrWhere, "branch_id = '" . $branch . "'");
                }
                
                if ($department) {
                    array_push($arrWhere, "department_id = '" . $department . "'");
                }
                
                if($fromDate != '' && $toDate != ''){
                    array_push($arrWhere, "date_on BETWEEN '" . $fromDate . "' AND '" . $toDate . "'");
                }
                

                if (count($arrWhere) > 0) {
                    $attendanceDailySummarySql.= "WHERE " . implode($arrWhere);
                }

                $db = Zend_Db_Table_Abstract::getDefaultAdapter();
                $result = $db->fetchCol( $attendanceDailySummarySql);
                foreach ($result as $attendanceDailySummaryId) {
                    $attendanceDailySummaryIdInfo = $this->getAttendanceDailySummary($attendanceDailySummaryId);
                    array_push($arrAttendanceDailySummary, $attendanceDailySummaryIdInfo);
                }
                return $arrAttendanceDailySummary;
            }
        } catch (Exception $ex) {
            throw new Base_Model_ObtorLib_App_Core_Employee_Exception($ex);
        }
    }
    
     

}