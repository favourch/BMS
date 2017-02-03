<?php

class AttendanceController extends Base_Model_ObtorLib_App_Staff_Controller
{

	public function init()
	{
            parent::init();
	}

	
          /**
     * The professionalExperience action
     */
    public function indexAction(){
        try {
            $pageHeading = "Attendance-Summary";
            $this->view->page_heading = $pageHeading;
            $this->view->data_page = "tables";
            
            $reportMonth = $this->_request->getParam('month');
            $reportYear = $this->_request->getParam('year');
            $reportFromDate = '';
            $reportEndDate = '';
            
            if($reportMonth == '' && $reportYear == ''){
                $reportFromDate = $this->getMonthStartDateFromDate($this->getSystemDate());
                $reportEndDate = $this->getMonthEndDateFromDate($this->getSystemDate());
            } else {
                $reportDate = $reportYear.'-'.$reportMonth.'-01';
                $reportFromDate = $this->getMonthStartDateFromDate($reportDate);
                $reportEndDate = $this->getMonthEndDateFromDate($reportDate);
            }
            
            
            // get report data.....
            
            $staffId = $this->getStaffUserId();
            $objAttendanceServivce = new Base_Model_ObtorLib_App_Core_Employee_Service_Attendance();
            $reportData = $objAttendanceServivce->getStaffAttendanceReport($staffId, $reportFromDate, $reportEndDate);
            $this->view->reportData = $reportData;
            
            $this->view->reportMonth = 'Janualy';
            $this->view->reportYear = '2014';
            
            
            
            
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


}