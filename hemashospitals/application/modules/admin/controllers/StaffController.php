<?php

class Admin_StaffController extends Base_Model_Lib_App_Admin_Controller {


    public function init() {
        parent::init();
    }

    /**
     * The default action - show the home page
     */
    public function indexAction() {
        try {
            $pageHeading = "Staff Management";
            $this->view->page_heading = $pageHeading;
            $this->view->data_page = "tables";
            
             // get all the user all users...
            $employeeService = new Base_Model_Lib_App_Core_Employee_Service_Employee();
            $employeeEntity = new Base_Model_Lib_App_Core_Employee_Entity_Employee();
            $employeeService->employee = $employeeEntity;
            
            $objPaggination = new Base_Model_Lib_Base_Lib_Paggination();
            $page = $this->_getParam('page', 1);
            $objPaggination->CurrentPage = $page;
            $objPaggination->TotalResults = $employeeService->searchCount();
            $paginationData = $objPaggination->getPaggingData();
            $pageLimit1 = $paginationData['MYSQL_LIMIT1'];
            $pageLimit2 = $paginationData['MYSQL_LIMIT2'];

            $limit = " LIMIT $pageLimit1,$pageLimit2";


            $employeeService->employee = $employeeEntity;
            $employeeInfo = $employeeService->search($limit);
            $this->view->employeeInfo = $employeeInfo;
            
            $this->view->pageNum = $page;
            $this->view->rowsPerPage = $objPaggination->ResultsPerPage;
            $this->view->paggination = $objPaggination;
            
        } catch (Exception $ex) {
            throw new Exception('<ERROR>' . $ex->getMessage() . "\n");
        }
    }
    
    /**
     * The add action
     */
    public function addAction() {
        try {
            $pageHeading = "Add-New-Staff";
            $this->view->page_heading = $pageHeading;
            $this->view->data_page = "forms";
            
             // add new staff.....
            $employeeService = new Base_Model_Lib_App_Core_Employee_Service_Employee();
            $employeeEntity = new Base_Model_Lib_App_Core_Employee_Entity_Employee();
            
            if ($this->_request->isPost()) {
                
                $employeeEntity->setEmployeeNumber($this->_request->getParam('txtEmployeeNumber'));
                $employeeEntity->setFullName($this->_request->getParam('txtFullName'));
                $employeeEntity->setNameWithInitials($this->_request->getParam('txtNameWithInitials'));
                $employeeEntity->setGender($this->_request->getParam('cmbGender'));
                $employeeEntity->setDateOfBirth($this->_request->getParam('txtDateOfBirth'));
                $employeeEntity->setCountry($this->_request->getParam('txtCountry'));
                $employeeEntity->setRegion($this->_request->getParam('txtRegion'));
                $employeeEntity->setBranch($this->_request->getParam('txtBranchName'));
                $employeeEntity->setDepartment($this->_request->getParam('txtDepartmentName'));
                $employeeEntity->setNationalIdentityCardNo($this->_request->getParam('txtNICNumber'));
                $employeeEntity->setDrivingLicenseNo($this->_request->getParam('txtDrivingLicenseNo'));
                $employeeEntity->setTelephoneNumberResidence($this->_request->getParam('txtEmployeeTelephoneNumberResidence'));
                $employeeEntity->setTelephoneNumberMobile($this->_request->getParam('txtEmployeeContactNumber'));
                $employeeEntity->setEMailAddressPersonal($this->_request->getParam('txtEmployeeEmailAddressPersonal'));
                $employeeEntity->setEMailAddressOffice($this->_request->getParam('txtEmailAddressOffice'));
                $employeeEntity->setJoinedDate($this->_request->getParam('txtEmployeeJoinedDate'));
                $employeeEntity->setDesignation($this->_request->getParam('txtEmployeeDesignation'));
                $employeeEntity->setContractStatus($this->_request->getParam('cmbContractStatus'));
                $employeeEntity->setEmployeeType($this->_request->getParam('cmbEmployeeType'));
                $employeeEntity->setEmployeeStatus($this->_request->getParam('cmbEmployeeStatus'));
                $employeeEntity->setStaffIdStatus($this->_request->getParam('cmbStaffIDStatus'));
                $employeeEntity->setStaffIdIssueDate($this->_request->getParam('txtStaffIdIssuedDate'));
                $employeeEntity->setEpfEtfNumber($this->_request->getParam('txtEpfEtfNumber'));
                $employeeEntity->setEpfEtfNumberJoinedDate($this->_request->getParam('txtEpfEtfJoinedDate'));
                $employeeEntity->setPermanentAddressAddress($this->_request->getParam('txtEmployeeAddress'));
                $employeeEntity->setPermanentAddressStreet($this->_request->getParam('txtEmployeeAddressStreet'));
                $employeeEntity->setPermanentAddressCity($this->_request->getParam('txtEmployeeAddressCity'));
                $employeeEntity->setPermanentAddressState($this->_request->getParam('txtEmployeeAddressState'));
                $employeeEntity->setPermanentAddressZip($this->_request->getParam('txtEmployeeAddressZip'));
                $employeeEntity->setPermanentAddressCountry($this->_request->getParam('txtEmployeeAddressCountry'));
                $employeeEntity->setResidentialAddressAddress($this->_request->getParam('txtEmployeeResidentialAddress'));
                $employeeEntity->setResidentialAddressStreet($this->_request->getParam('txtEmployeeResidentialAddressStreet'));
                $employeeEntity->setResidentialAddressCity($this->_request->getParam('txtEmployeeResidentialAddressCity'));
                $employeeEntity->setResidentialAddressState($this->_request->getParam('txtEmployeeResidentialAddressState'));
                $employeeEntity->setResidentialAddressZip($this->_request->getParam('txtEmployeeResidentialAddressZip'));
                $employeeEntity->setResidentialAddressCountry($this->_request->getParam('txtEmployeeResidentialAddressCountry'));
                $employeeEntity->setEmergencyContactName($this->_request->getParam('txtEmergencyContactName'));
                $employeeEntity->setEmergencyContactRelationship($this->_request->getParam('txtEmergencyContactRelationship'));
                $employeeEntity->setEmergencyContactEmailAddress($this->_request->getParam('txtEmergencyContactEmailaddress'));
                $employeeEntity->setEmergencyContactTelephoneNumberResidence($this->_request->getParam('txtEmergencyContactTelephoneNumberResidence'));
                $employeeEntity->setEmergencyContactTelephoneNumberMobile($this->_request->getParam('txtEmergencyContactMobileNumber'));
                $employeeEntity->setEmergencyContactAddress($this->_request->getParam('txtEmergencyContactAddress'));
                $employeeEntity->setEmergencyContactAddressStreet($this->_request->getParam('txtEmergencyContactAddressStreet'));
                $employeeEntity->setEmergencyContactAddressCity($this->_request->getParam('txtEmergencyContactAddressCity'));
                $employeeEntity->setEmergencyContactAddressState($this->_request->getParam('txtEmergencyContactAddressState'));
                $employeeEntity->setEmergencyContactAddressZip($this->_request->getParam('txtEmergencyContactAddressZipPostalCode'));
                $employeeEntity->setEmergencyContactAddressCountry($this->_request->getParam('txtEmergencyContactAddressCountry'));
                $employeeService->employee = $employeeEntity;
                $employeeId = $employeeService->addEmployee();
                if ($employeeId) {
                    $this->_redirect("/admin/staff/?action-status=updated");
                } else {
                    $this->_redirect("/admin/staff/?action-status=failed");
                }
            } else {
                // get all the country...
                $countryService = new Base_Model_Lib_App_Core_Catalog_Service_Country();
                $countryEntity  = new Base_Model_Lib_App_Core_Catalog_Entity_Country();
                $countryService->country = $countryEntity;
                $countries = $countryService->search();
                $this->view->countries = $countries;
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
            $pageHeading = "Edit-Staff";
            $this->view->page_heading = $pageHeading;
            $this->view->data_page = "forms";
            
             // add new staff.....
            $employeeService = new Base_Model_Lib_App_Core_Employee_Service_Employee();
            $employeeEntity = new Base_Model_Lib_App_Core_Employee_Entity_Employee();
            
            if ($this->_request->isPost()) {
                $employeeId = $this->_request->getParam('id');
                $employeeEntity->setId($employeeId);
                $employeeEntity->setEmployeeNumber($this->_request->getParam('txtEmployeeNumber'));
                $employeeEntity->setFullName($this->_request->getParam('txtFullName'));
                $employeeEntity->setNameWithInitials($this->_request->getParam('txtNameWithInitials'));
                $employeeEntity->setGender($this->_request->getParam('cmbGender'));
                $employeeEntity->setDateOfBirth($this->_request->getParam('txtDateOfBirth'));
                $employeeEntity->setCountry($this->_request->getParam('txtCountry'));
                $employeeEntity->setRegion($this->_request->getParam('txtRegion'));
                $employeeEntity->setBranch($this->_request->getParam('txtBranchName'));
                $employeeEntity->setDepartment($this->_request->getParam('txtDepartmentName'));
                $employeeEntity->setNationalIdentityCardNo($this->_request->getParam('txtNICNumber'));
                $employeeEntity->setDrivingLicenseNo($this->_request->getParam('txtDrivingLicenseNo'));
                $employeeEntity->setTelephoneNumberResidence($this->_request->getParam('txtEmployeeTelephoneNumberResidence'));
                $employeeEntity->setTelephoneNumberMobile($this->_request->getParam('txtEmployeeContactNumber'));
                $employeeEntity->setEMailAddressPersonal($this->_request->getParam('txtEmployeeEmailAddressPersonal'));
                $employeeEntity->setEMailAddressOffice($this->_request->getParam('txtEmailAddressOffice'));
                $employeeEntity->setJoinedDate($this->_request->getParam('txtEmployeeJoinedDate'));
                $employeeEntity->setDesignation($this->_request->getParam('txtEmployeeDesignation'));
                $employeeEntity->setContractStatus($this->_request->getParam('cmbContractStatus'));
                $employeeEntity->setEmployeeType($this->_request->getParam('cmbEmployeeType'));
                $employeeEntity->setEmployeeStatus($this->_request->getParam('cmbEmployeeStatus'));
                $employeeEntity->setStaffIdStatus($this->_request->getParam('cmbStaffIDStatus'));
                $employeeEntity->setStaffIdIssueDate($this->_request->getParam('txtStaffIdIssuedDate'));
                $employeeEntity->setEpfEtfNumber($this->_request->getParam('txtEpfEtfNumber'));
                $employeeEntity->setEpfEtfNumberJoinedDate($this->_request->getParam('txtEpfEtfJoinedDate'));
                $employeeEntity->setPermanentAddressAddress($this->_request->getParam('txtEmployeeAddress'));
                $employeeEntity->setPermanentAddressStreet($this->_request->getParam('txtEmployeeAddressStreet'));
                $employeeEntity->setPermanentAddressCity($this->_request->getParam('txtEmployeeAddressCity'));
                $employeeEntity->setPermanentAddressState($this->_request->getParam('txtEmployeeAddressState'));
                $employeeEntity->setPermanentAddressZip($this->_request->getParam('txtEmployeeAddressZip'));
                $employeeEntity->setPermanentAddressCountry($this->_request->getParam('txtEmployeeAddressCountry'));
                $employeeEntity->setResidentialAddressAddress($this->_request->getParam('txtEmployeeResidentialAddress'));
                $employeeEntity->setResidentialAddressStreet($this->_request->getParam('txtEmployeeResidentialAddressStreet'));
                $employeeEntity->setResidentialAddressCity($this->_request->getParam('txtEmployeeResidentialAddressCity'));
                $employeeEntity->setResidentialAddressState($this->_request->getParam('txtEmployeeResidentialAddressState'));
                $employeeEntity->setResidentialAddressZip($this->_request->getParam('txtEmployeeResidentialAddressZip'));
                $employeeEntity->setResidentialAddressCountry($this->_request->getParam('txtEmployeeResidentialAddressCountry'));
                $employeeEntity->setEmergencyContactName($this->_request->getParam('txtEmergencyContactName'));
                $employeeEntity->setEmergencyContactRelationship($this->_request->getParam('txtEmergencyContactRelationship'));
                $employeeEntity->setEmergencyContactEmailAddress($this->_request->getParam('txtEmergencyContactEmailaddress'));
                $employeeEntity->setEmergencyContactTelephoneNumberResidence($this->_request->getParam('txtEmergencyContactTelephoneNumberResidence'));
                $employeeEntity->setEmergencyContactTelephoneNumberMobile($this->_request->getParam('txtEmergencyContactMobileNumber'));
                $employeeEntity->setEmergencyContactAddress($this->_request->getParam('txtEmergencyContactAddress'));
                $employeeEntity->setEmergencyContactAddressStreet($this->_request->getParam('txtEmergencyContactAddressStreet'));
                $employeeEntity->setEmergencyContactAddressCity($this->_request->getParam('txtEmergencyContactAddressCity'));
                $employeeEntity->setEmergencyContactAddressState($this->_request->getParam('txtEmergencyContactAddressState'));
                $employeeEntity->setEmergencyContactAddressZip($this->_request->getParam('txtEmergencyContactAddressZipPostalCode'));
                $employeeEntity->setEmergencyContactAddressCountry($this->_request->getParam('txtEmergencyContactAddressCountry'));
                $employeeService->employee = $employeeEntity;
                $isUpdated = $employeeService->updateEmployee();
                if ($isUpdated) {
                    $this->_redirect("/admin/staff/?action-status=updated");
                } else {
                    $this->_redirect("/admin/staff/?action-status=failed");
                }
            } else {
                // get all the country...
                $countryService = new Base_Model_Lib_App_Core_Catalog_Service_Country();
                $countryEntity  = new Base_Model_Lib_App_Core_Catalog_Entity_Country();
                $countryService->country = $countryEntity;
                $countries = $countryService->search();
                $this->view->countries = $countries;
                
                
                $employeeId = $this->_request->getParam('id');
                $employeeInformation = $employeeService->getEmployee($employeeId);
                $this->view->employeeInformation = $employeeInformation;
                
                $countryId = $employeeInformation->getCountry();
                // get all the Regions...
                $regionService = new Base_Model_Lib_App_Core_Catalog_Service_Region();
                $regionEntity  = new Base_Model_Lib_App_Core_Catalog_Entity_Region();
                $regionEntity->setCountry($countryId);
                $regionService->region = $regionEntity;
                $regions = $regionService->search();
                $this->view->regions = $regions;
                
                
                $regionId = $employeeInformation->getRegion();
                // get all the Regions...
                $branchService = new Base_Model_Lib_App_Core_Catalog_Service_Branch();
                $branchEntity  = new Base_Model_Lib_App_Core_Catalog_Entity_Branch();
                $branchEntity->setRegion($regionId);
                $branchService->branch = $branchEntity;
                $branches = $branchService->search();
                $this->view->branches = $branches;
            
                 $branchId = $employeeInformation->getBranch();
                // get all the Regions...
                $departmentService = new Base_Model_Lib_App_Core_Catalog_Service_Department();
                $departmentEntity  = new Base_Model_Lib_App_Core_Catalog_Entity_Department();
                $departmentEntity->setBranch($branchId);
                $departmentService->department = $departmentEntity;
                $departments = $departmentService->search();
                $this->view->departments = $departments;
            }

            
        } catch (Exception $ex) {
            throw new Exception('<ERROR>' . $ex->getMessage() . "\n");
        }
    }
    
    
          /**
     * The delete action
     */
    public function deleteAction() {
        try {
            $pageHeading = "Add-New-Staff";
            $this->view->page_heading = $pageHeading;
            $this->view->data_page = "forms";

            
        } catch (Exception $ex) {
            throw new Exception('<ERROR>' . $ex->getMessage() . "\n");
        }
    }
    
    
              /**
     * The search action
     */
    public function searchAction() {
        try {
            $pageHeading = "Add-New-Staff";
            $this->view->page_heading = $pageHeading;
            $this->view->data_page = "forms";

            
        } catch (Exception $ex) {
            throw new Exception('<ERROR>' . $ex->getMessage() . "\n");
        }
    }

    
     /**
     * The delete action
     */
    public function viewAction() {
        try {
            $pageHeading = "View-Staff";
            $this->view->page_heading = $pageHeading;
            $this->view->data_page = "forms";

            $employeeService = new Base_Model_Lib_App_Core_Employee_Service_Employee();
            $employeeId = $this->_request->getParam('id');
            $employeeInformation = $employeeService->getEmployee($employeeId);
            $this->view->employeeInformation = $employeeInformation;
            
            $relId = $employeeId;
            $relObject = 'Employee';
            
            // get all the professional experiences for the selected staff ...
            $professionalExperienceService = new Base_Model_Lib_App_Core_Qualification_Service_ProfessionalExperience();
            $professionalExperienceEntity  = new Base_Model_Lib_App_Core_Qualification_Entity_ProfessionalExperience();
            $professionalExperienceEntity->setRelId($relId);
            $professionalExperienceEntity->setRelObject($relObject);
            $professionalExperienceService->professionalExperience = $professionalExperienceEntity;
            $professionalExperience = $professionalExperienceService->search();
            $this->view->professionalExperience = $professionalExperience;
            
            
            // get all the Educational Qualification for the selected staff ...
            $educationService = new Base_Model_Lib_App_Core_Qualification_Service_Education();
            $educationEntity  = new Base_Model_Lib_App_Core_Qualification_Entity_Education();
            $educationEntity->setRelId($relId);
            $educationEntity->setRelObject($relObject);
            $educationService->education = $educationEntity;
            $education = $educationService->search();
            $this->view->education = $education;
            
            // get all the professional experiences for the selected staff ...
            $skillsService = new Base_Model_Lib_App_Core_Qualification_Service_Skill();
            $skillsEntity  = new Base_Model_Lib_App_Core_Qualification_Entity_Skill();
            $skillsEntity->setRelId($relId);
            $skillsEntity->setRelObject($relObject);
            $skillsService->skill = $skillsEntity;
            $skills = $skillsService->search();
            $this->view->skills = $skills;

        } catch (Exception $ex) {
            throw new Exception('<ERROR>' . $ex->getMessage() . "\n");
        }
    }
}
