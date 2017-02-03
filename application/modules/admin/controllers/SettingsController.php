<?php

class Admin_SettingsController extends Base_Model_ObtorLib_App_Admin_Controller {

    public function init() {
        parent::init();
    }

    /**
     * The default action - show the home page
     */
    public function indexAction() {
        try {
            
        } catch (Exception $ex) {
            throw new Exception('<ERROR>' . $ex->getMessage() . "\n");
        }
    }

    /**
     * The default action - show the home page
     */
    public function paymentGatewaysAction() {
        try {

            $pageHeading = "Payment-Gateways";
            $this->view->page_heading = $pageHeading;
            $this->view->data_page = "forms";


            $objPaymentMethods = new Base_Model_Lib_Catelog_Service_PaymentMethod();
            $allPaymentMethods = $objPaymentMethods->getAllWithSettings();
            $this->view->allPaymentMethods = $allPaymentMethods;

            if ($this->_request->isPost()) {

                $paymentMethodId = $this->_request->getParam('txtPaymentMethodId');
                $paymentMethodDisplayName = $this->_request->getParam('txtPaymentMethodName');
                $paymentMethodNameKey = $this->_request->getParam('txtNameKey');
                $paymentMethodIsEnabled = $this->_request->getParam('rdStatus');

                $objPaymentMethodsEntity = new Base_Model_Lib_Catelog_Entity_PaymentMethod();
                $objPaymentMethodsEntity->setId($paymentMethodId);
                $objPaymentMethodsEntity->setName($paymentMethodDisplayName);
                $objPaymentMethodsEntity->setNameKey($paymentMethodNameKey);
                $objPaymentMethodsEntity->setStatusIs($paymentMethodIsEnabled);
                $objPaymentMethods->paymentMethod = $objPaymentMethodsEntity;
                $objPaymentMethods->updateItem();

                $fieldIds = $this->_request->getParam('txtFieldId');
                //$fieldValue   = $this->_request->getParam('txtFieldName');

                $objSettingService = new Base_Model_Lib_System_Service_Settings();
                foreach ($fieldIds As $fIndex => $fieldId) {
                    $fieldValueInputName = 'txtFieldName' . $fIndex;
                    $settingValue = $this->_request->getParam($fieldValueInputName);
                    if ($settingValue == "") {
                        $settingValue = " ";
                    }
                    $objSettingEntity = new Base_Model_Lib_System_Entity_Settings();
                    $objSettingEntity->setId($fieldId);
                    $objSettingEntity->setSettingValue($settingValue);
                    $objSettingService->settings = $objSettingEntity;
                    $objSettingService->updateValue();
                }

                $this->_redirect('/admin/settings/payment-gateways/?action-status=updated');
            }

            $status = $this->_request->getParam('status');
            $this->view->status = $status;
        } catch (Exception $ex) {
            throw new Exception('<ERROR>' . $ex->getMessage() . "\n");
        }
    }

    /**
     * The default action - show the home page
     */
    public function generalSettingsAction() {
        try {

            $pageHeading = "General-Settings";
            $this->view->page_heading = $pageHeading;
            $this->view->data_page = "forms";

            $objSettingService = new Base_Model_Lib_System_Service_Settings();
            $generalSettingsValues = $objSettingService->getAllByType('GENERAL_SETTINGS');
            $this->view->generalSettingsValues = $generalSettingsValues;


            if ($this->_request->isPost()) {


                $fieldIds = $this->_request->getParam('txtFieldId');
                //$fieldValue   = $this->_request->getParam('txtFieldName');

                $objSettingService = new Base_Model_Lib_System_Service_Settings();
                foreach ($fieldIds As $fIndex => $fieldId) {
                    $fieldValueInputName = 'txtFieldName' . $fIndex;
                    $settingValue = $this->_request->getParam($fieldValueInputName);
                    if ($settingValue == "") {
                        $settingValue = " ";
                    }
                    $objSettingEntity = new Base_Model_Lib_System_Entity_Settings();
                    $objSettingEntity->setId($fieldId);
                    $objSettingEntity->setSettingValue($settingValue);
                    $objSettingService->settings = $objSettingEntity;
                    $objSettingService->updateValue();
                }

                $this->_redirect('/admin/settings/general-settings/?action-status=updated');
            }

            $status = $this->_request->getParam('status');
            $this->view->status = $status;
        } catch (Exception $ex) {
            throw new Exception('<ERROR>' . $ex->getMessage() . "\n");
        }
    }

    /**
     * The default action - show the home page
     */
    public function domainSettingsAction() {
        try {

            $pageHeading = "Domain-Settings";
            $this->view->page_heading = $pageHeading;
            $this->view->data_page = "forms";
            $objSettingService = new Base_Model_Lib_System_Service_Settings();
            $generalSettingsValues = $objSettingService->getAllByType('DOMAIN_SETTINGS');
            $this->view->generalSettingsValues = $generalSettingsValues;


            if ($this->_request->isPost()) {


                $fieldIds = $this->_request->getParam('txtFieldId');
                //$fieldValue   = $this->_request->getParam('txtFieldName');

                $objSettingService = new Base_Model_Lib_System_Service_Settings();
                foreach ($fieldIds As $fIndex => $fieldId) {
                    $fieldValueInputName = 'txtFieldName' . $fIndex;
                    $settingValue = $this->_request->getParam($fieldValueInputName);
                    if ($settingValue == "") {
                        $settingValue = " ";
                    }
                    $objSettingEntity = new Base_Model_Lib_System_Entity_Settings();
                    $objSettingEntity->setId($fieldId);
                    $objSettingEntity->setSettingValue($settingValue);
                    $objSettingService->settings = $objSettingEntity;
                    $objSettingService->updateValue();
                }

                $this->_redirect('/admin/settings/domain-settings/?action-status=updated');
            }

            $status = $this->_request->getParam('status');
            $this->view->status = $status;
        } catch (Exception $ex) {
            throw new Exception('<ERROR>' . $ex->getMessage() . "\n");
        }
    }
    
    
    /**
     * The default action - show the home page
     */
    public function leaveSettingsAction() {
        try {

            $pageHeading = "Staff-Leave-Settings";
            $this->view->page_heading = $pageHeading;
            $this->view->data_page = "forms";
            $objSettingService = new Base_Model_Lib_System_Service_Settings();
            $generalSettingsValues = $objSettingService->getAllByType('STAFF_LEAVE_SETTING');
            $this->view->generalSettingsValues = $generalSettingsValues;


            if ($this->_request->isPost()) {


                $fieldIds = $this->_request->getParam('txtFieldId');
                //$fieldValue   = $this->_request->getParam('txtFieldName');

                $objSettingService = new Base_Model_Lib_System_Service_Settings();
                foreach ($fieldIds As $fIndex => $fieldId) {
                    $fieldValueInputName = 'txtFieldName' . $fIndex;
                    $settingValue = $this->_request->getParam($fieldValueInputName);
                    if ($settingValue == "") {
                        $settingValue = " ";
                    }
                    $objSettingEntity = new Base_Model_Lib_System_Entity_Settings();
                    $objSettingEntity->setId($fieldId);
                    $objSettingEntity->setSettingValue($settingValue);
                    $objSettingService->settings = $objSettingEntity;
                    $objSettingService->updateValue();
                }

                $this->_redirect('/admin/settings/leave-settings/?action-status=updated');
            }

            $status = $this->_request->getParam('status');
            $this->view->status = $status;
        } catch (Exception $ex) {
            throw new Exception('<ERROR>' . $ex->getMessage() . "\n");
        }
    }

    
     /**
     * The default action - show the home page
     */
    public function officeTimeSettingsAction() {
        try {

            $pageHeading = "Office-Opening-Hours";
            $this->view->page_heading = $pageHeading;
            $this->view->data_page = "forms";


           $objWeekDaysService = new Base_Model_Lib_Catelog_Service_WeekDays();
            $allWeekDays = $objWeekDaysService->getAllWithSettings();
            $this->view->allWeekDays = $allWeekDays;

            if ($this->_request->isPost()) {

                $weekDayId = $this->_request->getParam('txtWeekDayId');
                $weekDayDisplayName = $this->_request->getParam('txtWeekDayName');
                $weekDayNameKey = $this->_request->getParam('txtNameKey');
                $weekDayStatusIs = $this->_request->getParam('rdIsOpen');

                $objWeekDaysEntity = new Base_Model_Lib_Catelog_Entity_WeekDays();
                $objWeekDaysEntity->setId($weekDayId);
                $objWeekDaysEntity->setName($weekDayDisplayName);
                $objWeekDaysEntity->setNameKey($weekDayNameKey);
                $objWeekDaysEntity->setIsOpen($weekDayStatusIs);
                $objWeekDaysService->weekDays = $objWeekDaysEntity;
                $objWeekDaysService->updateItem();

                $fieldIds = $this->_request->getParam('txtFieldId');
                //$fieldValue   = $this->_request->getParam('txtFieldName');

                $objSettingService = new Base_Model_Lib_System_Service_Settings();
                foreach ($fieldIds As $fIndex => $fieldId) {
                    $fieldValueInputName = 'txtFieldName' . $fIndex;
                    $settingValue = $this->_request->getParam($fieldValueInputName);
                    if ($settingValue == "") {
                        $settingValue = " ";
                    }
                    $objSettingEntity = new Base_Model_Lib_System_Entity_Settings();
                    $objSettingEntity->setId($fieldId);
                    $objSettingEntity->setSettingValue($settingValue);
                    $objSettingService->settings = $objSettingEntity;
                    $objSettingService->updateValue();
                }

                $this->_redirect('/admin/settings/office-time-settings/?action-status=updated');
            }
            
        } catch (Exception $ex) {
            throw new Exception('<ERROR>' . $ex->getMessage() . "\n");
        }
    }
    
    
    /**
     * The default action - show the home page
     */
    public function systemSettingsAction() {
        try {

            $pageHeading = "System-Settings";
            $this->view->page_heading = $pageHeading;
            $this->view->data_page = "forms";


            $objParentSettingService = new Base_Model_Lib_Catelog_Service_ParentSetting();
            $allParentSettings = $objParentSettingService->getAllWithSettings();
            $this->view->allParentSettings = $allParentSettings;

            if ($this->_request->isPost()) {

                $parentSettingId = $this->_request->getParam('txtParentSettingId');
                $parentSettingDisplayName = $this->_request->getParam('txtParentSettingName');
                $parentSettingNameKey = $this->_request->getParam('txtNameKey');
                $parentSettingIsEnabled = $this->_request->getParam('rdStatus');

                $objParentSettingEntity = new Base_Model_Lib_Catelog_Entity_ParentSetting();
                $objParentSettingEntity->setId($parentSettingId);
                $objParentSettingEntity->setName($parentSettingDisplayName);
                $objParentSettingEntity->setNameKey($parentSettingNameKey);
                $objParentSettingService->parentSetting = $objParentSettingEntity;
                $objParentSettingService->updateItem();

                $fieldIds = $this->_request->getParam('txtFieldId');
                //$fieldValue   = $this->_request->getParam('txtFieldName');

                $objSettingService = new Base_Model_Lib_System_Service_Settings();
                foreach ($fieldIds As $fIndex => $fieldId) {
                    $fieldValueInputName = 'txtFieldName' . $fIndex;
                    $settingValue = $this->_request->getParam($fieldValueInputName);
                    if ($settingValue == "") {
                        $settingValue = " ";
                    }
                    $objSettingEntity = new Base_Model_Lib_System_Entity_Settings();
                    $objSettingEntity->setId($fieldId);
                    $objSettingEntity->setSettingValue($settingValue);
                    $objSettingService->settings = $objSettingEntity;
                    $objSettingService->updateValue();
                }

                $this->_redirect('/admin/settings/system-settings/?action-status=updated');
            }
            
        } catch (Exception $ex) {
            throw new Exception('<ERROR>' . $ex->getMessage() . "\n");
        }
    }
    

}
