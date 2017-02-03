<?php

/**
 * @namespace       : Base
 * @package         : Model
 * @subpackage 		: Lib.System.Service
 * @name 			: Settings
 * @author 			: Iyngaran Iyathurai
 * 			  		  Software eng - Bcas R&D
 * 			          E-Mail - Iyngaran55@yahoo.com, Iyngaran@bcas.lk
 *
 * @copyright Copyright (c) 2009 - 2010 BCAS R&D . (http://www.lab.bcasrd.com)
 *
 * Description : The Service class for the Settings Object
 *
 */
class Base_Model_Lib_System_Service_Settings extends Base_Model_Lib_Eav_Model_Service {

    public $settings;

    /*
     * @name        : getItem
     * @Description : The function is to get a Settings information
     * 				  from the database.
     * @param       : $id (Member Id)
     * @return      : Base_Model_Lib_System_Entity_Settings
     */

    public function getItem($id) {
        $settings = "";
        try {
            $objSettings = new Base_Model_Lib_System_Dao_Settings ( );
            $settings = $objSettings->getItem($id);
        } catch (Exception $e) {
            throw new Base_Model_Lib_System_Exception("<strong>Oops !, Error Class name -</strong>  <em>Base_Model_Lib_System_Service_Settings</em>, <strong>Function -</strong> <em>getItem()</em>, <strong>Exception -</strong> <em>" . $e->getMessage() . "</em>");
        }
        return $settings;
    }

    /*
     * @name        : updateItem
     * @Description : The function is to update/edit a Settings information
     * 				  in the database.
     * @return      : $success true/false
     */

    public function updateItem() {
        $success = false;
        try {

            if (!($this->settings instanceof Base_Model_Lib_System_Entity_Settings))
                throw new Base_Model_Lib_System_Exception(" Settings Entity not intialized");

            $objSettingsDao = new Base_Model_Lib_System_Dao_Settings ( );
            $objSettingsDao->settings = $this->settings;
            $success = $objSettingsDao->updateItem();
        } catch (Exception $e) {
            throw new Base_Model_Lib_System_Exception("<strong>Oops !, Error Class name -</strong>  <em>Base_Model_Lib_System_Service_Settings</em>, <strong>Function -</strong> <em>updateItem()</em>, <strong>Exception -</strong> <em>" . $e->getMessage() . "</em>");
        }

        return $success;
    }

    /*
     * @name        : updateItem
     * @Description : The function is to update/edit a Settings information
     * 				  in the database.
     * @return      : $success true/false
     */

    public function getAllByType($type) {
        $settingValues = "";
        try {
            $objSettingsDao = new Base_Model_Lib_System_Dao_Settings ( );
            $settingValues = $objSettingsDao->getAllByType($type);
        } catch (Exception $e) {
            throw new Base_Model_Lib_System_Exception("<strong>Oops !, Error Class name -</strong>  <em>Base_Model_Lib_System_Service_Settings</em>, <strong>Function -</strong> <em>updateItem()</em>, <strong>Exception -</strong> <em>" . $e->getMessage() . "</em>");
        }

        return $settingValues;
    }

    /*
     * @name        : getAllByTypeAndRel($type,$relId)
     * @Description : The function is to update/edit a Settings information
     * 				  in the database.
     * @return      : $success true/false
     */

    public function getAllByTypeAndRel($type, $relId) {
        $settingValues = "";
        try {
            $objSettingsDao = new Base_Model_Lib_System_Dao_Settings ( );
            $settingValues = $objSettingsDao->getAllByTypeAndRel($type, $relId);
        } catch (Exception $e) {
            throw new Base_Model_Lib_System_Exception("<strong>Oops !, Error Class name -</strong>  <em>Base_Model_Lib_System_Service_Settings</em>, <strong>Function -</strong> <em>updateItem()</em>, <strong>Exception -</strong> <em>" . $e->getMessage() . "</em>");
        }

        return $settingValues;
    }

    /*
     * @name        : updateValue()
     * @Description : The function is to update/edit a Settings information
     * 				  in the database.
     * @return      : $success true/false
     */

    public function updateValue() {
        $success = false;
        try {

            if (!($this->settings instanceof Base_Model_Lib_System_Entity_Settings))
                throw new Base_Model_Lib_System_Exception(" Settings Entity not intialized");

            $objSettingsDao = new Base_Model_Lib_System_Dao_Settings ( );
            $objSettingsDao->settings = $this->settings;
            $success = $objSettingsDao->updateValue();
        } catch (Exception $e) {
            throw new Base_Model_Lib_System_Exception("<strong>Oops !, Error Class name -</strong>  <em>Base_Model_Lib_System_Service_Settings</em>, <strong>Function -</strong> <em>updateItem()</em>, <strong>Exception -</strong> <em>" . $e->getMessage() . "</em>");
        }

        return $success;
    }

    /**
     * 
     * @param type $reportDate
     * @return type
     *  Get Office Working Time Using Date.....
     * 
     */
    public function getOfficeWorkingTime($reportDate) {
        $weekDayStrName = date("l", strtotime($reportDate));
        $openTimeInformation = '';
        $objWeekDaysService = new Base_Model_Lib_Catelog_Service_WeekDays();
        $allWeekDays = $objWeekDaysService->getAllWithSettings();

        $arrStaffWorkingTime = array();
        foreach ($allWeekDays As $weekIndex => $weekDay) {

            $weekDayStr = $weekDay->getName();
            $weekDay_is_office_open = $weekDay->getIsOpen();
            $onTimeOffTimeSettings = $weekDay->getSettings();
            $openTime = "";
            $closeTime = "";
            foreach ($onTimeOffTimeSettings As $settingIndex => $onTimeOffTimeSetting) {

                if ($onTimeOffTimeSetting->getSettingFieldName() == 'Open-At') {
                    $openTime = $onTimeOffTimeSetting->getSettingValue();
                } elseif ($onTimeOffTimeSetting->getSettingFieldName() == 'Close-At') {
                    $closeTime = $onTimeOffTimeSetting->getSettingValue();
                }elseif($onTimeOffTimeSetting->getSettingFieldName() == 'Opening-Hours'){
                    $opening_hours_in_day = $onTimeOffTimeSetting->getSettingValue();
                }
                
                
            }
            $arrStaffWorkingTime[$weekDayStr]['day_name'] = $weekDayStr;
            $arrStaffWorkingTime[$weekDayStr]['is_working_day'] = $weekDay_is_office_open;
            $arrStaffWorkingTime[$weekDayStr]['on_time'] = $openTime;
            $arrStaffWorkingTime[$weekDayStr]['off_time'] = $closeTime;
            $arrStaffWorkingTime[$weekDayStr]['opening_hours_in_day'] = $opening_hours_in_day;
        }
        $openTimeInformation = $arrStaffWorkingTime[$weekDayStrName];
        return $openTimeInformation;
    }

}

?>