<?php

class Admin_StaffController extends Base_Model_ObtorLib_App_Admin_Controller {

    public function init() {
        parent::init();
    }

    /**
     * The default action - show the home page
     */
    public function indexAction() {
        try {
            $pageHeading = "Staff-Management";
            $this->view->page_heading = $pageHeading;
            $this->view->data_page = "tables";

            $employee_number = $this->_request->getParam('employee-number');
            $full_name = $this->_request->getParam('full-name');
            $date_of_birth = $this->_request->getParam('date-of-birth');
            $nic_number = $this->_request->getParam('nic-number');
            $driving_license_no = $this->_request->getParam('driving-license-no');
            $telephone_number_residence = $this->_request->getParam('telephone-number-residence');
            $contact_number = $this->_request->getParam('contact-number');
            $email_address_personal = $this->_request->getParam('email-address-personal');
            $email_address_office = $this->_request->getParam('email-address-office');
            $country = $this->_request->getParam('country');
            $region = $this->_request->getParam('region');
            $branch = $this->_request->getParam('branch');
            $department = $this->_request->getParam('department');
            $employee_status = $this->_request->getParam('employee-status');


            // get all the user all users...
            $employeeService = new Base_Model_ObtorLib_App_Core_Employee_Service_Employee();
            $employeeEntity = new Base_Model_ObtorLib_App_Core_Employee_Entity_Employee();
            $employeeEntity->setEmployeeNumber($employee_number);
            $employeeEntity->setFullName($full_name);
            $employeeEntity->setDateOfBirth($date_of_birth);
            $employeeEntity->setNationalIdentityCardNo($nic_number);
            $employeeEntity->setDrivingLicenseNo($driving_license_no);
            $employeeEntity->setTelephoneNumberResidence($telephone_number_residence);
            $employeeEntity->setTelephoneNumberMobile($contact_number);
            $employeeEntity->setEMailAddressPersonal($email_address_personal);
            $employeeEntity->setEMailAddressOffice($email_address_office);
            $employeeEntity->setCountry($country);
            $employeeEntity->setRegion($region);
            $employeeEntity->setBranch($branch);
            $employeeEntity->setDepartment($department);
            $employeeEntity->setEmployeeStatus($employee_status);

            $employeeService->employee = $employeeEntity;

            $objPaggination = new Base_Model_ObtorLib_Base_Lib_Paggination();
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
            $employeeService = new Base_Model_ObtorLib_App_Core_Employee_Service_Employee();
            $employeeEntity = new Base_Model_ObtorLib_App_Core_Employee_Entity_Employee();

            if ($this->_request->isPost()) {

                $employeeEntity->setEmployeeNumber($this->_request->getParam('txtEmployeeNumber'));
                $employeeEntity->setFullName($this->_request->getParam('txtFullName'));
                $employeeEntity->setNameWithInitials($this->_request->getParam('txtNameWithInitials'));
                $employeeEntity->setGender($this->_request->getParam('cmbGender'));
                $employeeEntity->setDateOfBirth($this->_request->getParam('txtDateOfBirth'));
                $employeeEntity->setCountry($this->_request->getParam('country'));
                $employeeEntity->setRegion($this->_request->getParam('region'));
                $employeeEntity->setBranch($this->_request->getParam('branch'));
                $employeeEntity->setDepartment($this->_request->getParam('department'));
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
                $employeeEntity->setTeamLeader($this->_request->getParam('txtTeamLeader'));
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
                $countryService = new Base_Model_ObtorLib_App_Core_Catalog_Service_Country();
                $countryEntity = new Base_Model_ObtorLib_App_Core_Catalog_Entity_Country();
                $countryService->country = $countryEntity;
                $countries = $countryService->search();
                $this->view->countries = $countries;
                
                $employee_status = 'In-Service';
                $employeeService = new Base_Model_ObtorLib_App_Core_Employee_Service_Employee();
                $employeeEntity = new Base_Model_ObtorLib_App_Core_Employee_Entity_Employee();
                $employeeEntity->setEmployeeStatus($employee_status);
                $employeeService->employee = $employeeEntity;
                $employeeInfo = $employeeService->search();
                $this->view->teamLeaderEmployeeInfo = $employeeInfo;
                
                $relName = 'job';
                $typesService = new Base_Model_Lib_Product_Service_Types();
                $typesList = $typesService->getAll($relName);
                $this->view->typesList = $typesList;
                
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
            $employeeService = new Base_Model_ObtorLib_App_Core_Employee_Service_Employee();
            $employeeEntity = new Base_Model_ObtorLib_App_Core_Employee_Entity_Employee();

            if ($this->_request->isPost()) {
                $employeeId = $this->_request->getParam('id');
                $employeeEntity->setId($employeeId);
                $employeeEntity->setEmployeeNumber($this->_request->getParam('txtEmployeeNumber'));
                $employeeEntity->setFullName($this->_request->getParam('txtFullName'));
                $employeeEntity->setNameWithInitials($this->_request->getParam('txtNameWithInitials'));
                $employeeEntity->setGender($this->_request->getParam('cmbGender'));
                $employeeEntity->setDateOfBirth($this->_request->getParam('txtDateOfBirth'));
                $employeeEntity->setCountry($this->_request->getParam('country'));
                $employeeEntity->setRegion($this->_request->getParam('region'));
                $employeeEntity->setBranch($this->_request->getParam('branch'));
                $employeeEntity->setDepartment($this->_request->getParam('department'));
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
                $employeeEntity->setTeamLeader($this->_request->getParam('txtTeamLeader'));
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
                $countryService = new Base_Model_ObtorLib_App_Core_Catalog_Service_Country();
                $countryEntity = new Base_Model_ObtorLib_App_Core_Catalog_Entity_Country();
                $countryService->country = $countryEntity;
                $countries = $countryService->search();
                $this->view->countries = $countries;


                $employeeId = $this->_request->getParam('id');
                $employeeInformation = $employeeService->getEmployee($employeeId);
                $this->view->employeeInformation = $employeeInformation;

                $countryId = $employeeInformation->getCountry();
                // get all the Regions...
                $regionService = new Base_Model_ObtorLib_App_Core_Catalog_Service_Region();
                $regionEntity = new Base_Model_ObtorLib_App_Core_Catalog_Entity_Region();
                $regionEntity->setCountry($countryId);
                $regionService->region = $regionEntity;
                $regions = $regionService->search();
                $this->view->regions = $regions;


                $regionId = $employeeInformation->getRegion();
                // get all the Regions...
                $branchService = new Base_Model_ObtorLib_App_Core_Catalog_Service_Branch();
                $branchEntity = new Base_Model_ObtorLib_App_Core_Catalog_Entity_Branch();
                $branchEntity->setRegion($regionId);
                $branchService->branch = $branchEntity;
                $branches = $branchService->search();
                $this->view->branches = $branches;

                $branchId = $employeeInformation->getBranch();
                // get all the Regions...
                $departmentService = new Base_Model_ObtorLib_App_Core_Catalog_Service_Department();
                $departmentEntity = new Base_Model_ObtorLib_App_Core_Catalog_Entity_Department();
                $departmentEntity->setBranch($branchId);
                $departmentService->department = $departmentEntity;
                $departments = $departmentService->search();
                $this->view->departments = $departments;
                
                $relName = 'job';
                $typesService = new Base_Model_Lib_Product_Service_Types();
                $typesList = $typesService->getAll($relName);
                $this->view->typesList = $typesList;
                
                $employee_status = 'In-Service';
                $employeeService = new Base_Model_ObtorLib_App_Core_Employee_Service_Employee();
                $employeeEntity = new Base_Model_ObtorLib_App_Core_Employee_Entity_Employee();
                $employeeEntity->setEmployeeStatus($employee_status);
                $employeeService->employee = $employeeEntity;
                $employeeInfo = $employeeService->search();
                $this->view->teamLeaderEmployeeInfo = $employeeInfo;
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
            $employeeId = $this->_request->getParam('id');
            $employeeService = new Base_Model_ObtorLib_App_Core_Employee_Service_Employee();
            $employeeEntity = new Base_Model_ObtorLib_App_Core_Employee_Entity_Employee();
            $employeeEntity->setId($employeeId);
            $employeeService->employee = $employeeEntity;
            $isDeleted = $employeeService->deleteEmployee();
            if ($isDeleted) {
                $this->_redirect("/admin/staff/?action-status=deleted");
            } else {
                $this->_redirect("/admin/staff/?action-status=failed");
            }
            
        } catch (Exception $ex) {
            throw new Exception('<ERROR>' . $ex->getMessage() . "\n");
        }
    }

    /**
     * The search action
     */
    public function searchAction() {
        try {
            $pageHeading = "Search-Staff";
            $this->view->page_heading = $pageHeading;
            $this->view->data_page = "forms";

            // get all the country...
            $countryService = new Base_Model_ObtorLib_App_Core_Catalog_Service_Country();
            $countryEntity = new Base_Model_ObtorLib_App_Core_Catalog_Entity_Country();
            $countryService->country = $countryEntity;
            $countries = $countryService->search();
            $this->view->countries = $countries;
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

            $employeeService = new Base_Model_ObtorLib_App_Core_Employee_Service_Employee();
            $employeeId = $this->_request->getParam('id');
            $employeeInformation = $employeeService->getEmployee($employeeId);
            $this->view->employeeInformation = $employeeInformation;

            $relId = $employeeId;
            $relObject = 'Employee';

            // get all the professional experiences for the selected staff ...
            $professionalExperienceService = new Base_Model_ObtorLib_App_Core_Qualification_Service_ProfessionalExperience();
            $professionalExperienceEntity = new Base_Model_ObtorLib_App_Core_Qualification_Entity_ProfessionalExperience();
            $professionalExperienceEntity->setRelId($relId);
            $professionalExperienceEntity->setRelObject($relObject);
            $professionalExperienceService->professionalExperience = $professionalExperienceEntity;
            $professionalExperience = $professionalExperienceService->search();
            $this->view->professionalExperience = $professionalExperience;


            // get all the Educational Qualification for the selected staff ...
            $educationService = new Base_Model_ObtorLib_App_Core_Qualification_Service_Education();
            $educationEntity = new Base_Model_ObtorLib_App_Core_Qualification_Entity_Education();
            $educationEntity->setRelId($relId);
            $educationEntity->setRelObject($relObject);
            $educationService->education = $educationEntity;
            $education = $educationService->search();
            $this->view->education = $education;

            // get all the professional experiences for the selected staff ...
            $skillsService = new Base_Model_ObtorLib_App_Core_Qualification_Service_Skill();
            $skillsEntity = new Base_Model_ObtorLib_App_Core_Qualification_Entity_Skill();
            $skillsEntity->setRelId($relId);
            $skillsEntity->setRelObject($relObject);
            $skillsService->skill = $skillsEntity;
            $skills = $skillsService->search();
            $this->view->skills = $skills;

            // get all the professional experiences for the selected staff ...
            $languagesService = new Base_Model_ObtorLib_App_Core_Qualification_Service_Language();
            $languagesEntity = new Base_Model_ObtorLib_App_Core_Qualification_Entity_Language();
            $languagesEntity->setRelId($relId);
            $languagesEntity->setRelObject($relObject);
            $languagesService->language = $languagesEntity;
            $languages = $languagesService->search();
            $this->view->languages = $languages;

            // get all the professional experiences for the selected staff ...
            $licensesService = new Base_Model_ObtorLib_App_Core_Qualification_Service_License();
            $licensesEntity = new Base_Model_ObtorLib_App_Core_Qualification_Entity_License();
            $licensesEntity->setRelId($relId);
            $licensesEntity->setRelObject($relObject);
            $licensesService->license = $licensesEntity;
            $licenses = $licensesService->search();
            $this->view->licenses = $licenses;

            // get all the professional experiences for the selected staff ...
            $attachmentsService = new Base_Model_ObtorLib_App_Core_Qualification_Service_Attachment();
            $attachmentsEntity = new Base_Model_ObtorLib_App_Core_Qualification_Entity_Attachment();
            $attachmentsEntity->setRelId($relId);
            $attachmentsEntity->setRelObject($relObject);
            $attachmentsService->attachment = $attachmentsEntity;
            $attachments = $attachmentsService->search();
            $this->view->attachments = $attachments;
        } catch (Exception $ex) {
            throw new Exception('<ERROR>' . $ex->getMessage() . "\n");
        }
    }

    /**
     * The delete action
     */
    public function imagesUploadAction() {
        try {
            $pageHeading = "View-Staff";
            $this->view->page_heading = $pageHeading;
            $this->view->data_page = "forms";

           $employeeService = new Base_Model_ObtorLib_App_Core_Employee_Service_Employee();


            if ($this->_request->isPost()) {

                $recordId = $this->_request->getParam('id');
                
                $itemPicture = $_FILES['txtItemPicture'];
                $old_image  = $this->_request->getParam('txtOldImage');
                $itemPictureName = "";
                $itemPictureTmpName = "";
                $attachInvoiceName = "";
                $attachInvoiceTmpName = "";



                if ($itemPicture) {
                    if ($itemPicture['name'] != "") {
                        $itemPictureName = $this->generateSystemFileName($itemPicture['name']);
                        $itemPictureTmpName = $itemPicture['tmp_name'];
                        
      
                        
                        if($itemPictureName){
                            $old_image_file = APPLICATION_PATH.'/../uploads/images/staff/'.$old_image;
                            unlink($old_image_file);
                            move_uploaded_file($itemPictureTmpName,APPLICATION_PATH.'/../uploads/images/staff/'.$itemPictureName);
                            
                            $employeeEntity = new Base_Model_ObtorLib_App_Core_Employee_Entity_Employee();
                            $employeeEntity->setProfileImage($itemPictureName);
                            $employeeEntity->setId($recordId);
                            $employeeService->employee = $employeeEntity;
                            $employeeService->uploadImage();
                            $this->_redirect("/admin/staff/images-upload/id/$recordId/?action-status=updated");
                            
                        }
                        
                    }
                }
            } else {
                
                
                 
                $employeeId = $this->_request->getParam('id');
                $employeeInformation = $employeeService->getEmployee($employeeId);
                $this->view->employeeInformation = $employeeInformation;
                
                
            }
        } catch (Exception $ex) {
            throw new Exception('<ERROR>' . $ex->getMessage() . "\n");
        }
    }

}
