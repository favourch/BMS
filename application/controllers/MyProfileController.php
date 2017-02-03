<?php

class MyProfileController extends Base_Model_ObtorLib_App_Staff_Controller
{

	public function init()
	{
            parent::init();
	}

	public function indexAction()
	{
            try {
            $pageHeading = "My-Profile";
            $this->view->page_heading = $pageHeading;
            $this->view->data_page = "forms";

            $employeeService = new Base_Model_ObtorLib_App_Core_Employee_Service_Employee();
            $employeeId = $this->getStaffUserId();
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
    public function imageUploadAction() {
        try {
            $pageHeading = "Upload-Profile-Image";
            $this->view->page_heading = $pageHeading;
            $this->view->data_page = "forms";

           $employeeService = new Base_Model_ObtorLib_App_Core_Employee_Service_Employee();


            if ($this->_request->isPost()) {

                $recordId = $this->getStaffUserId();
                
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
                            $this->_redirect("/my-profile/?action-status=updated");
                            
                        }
                        
                    }
                }
            } else {
                
                
                 
                $employeeId = $this->getStaffUserId();
                $employeeInformation = $employeeService->getEmployee($employeeId);
                $this->view->employeeInformation = $employeeInformation;
                
                
            }
        } catch (Exception $ex) {
            throw new Exception('<ERROR>' . $ex->getMessage() . "\n");
        }
    }
    
    
      /**
     * The professionalExperience action
     */
    public function professionalExperienceAction() {
        try {
            $pageHeading = "Professional-Experience";
            $this->view->page_heading = $pageHeading;
            $this->view->data_page = "tables";
            
            $relId = $this->getStaffUserId();
            $relObject = 'Employee';
            
            // get all the professional experiences for the selected staff ...
            $professionalExperienceService = new Base_Model_ObtorLib_App_Core_Qualification_Service_ProfessionalExperience();
            $professionalExperienceEntity  = new Base_Model_ObtorLib_App_Core_Qualification_Entity_ProfessionalExperience();
            $professionalExperienceEntity->setRelId($relId);
            $professionalExperienceEntity->setRelObject($relObject);
            $professionalExperienceService->professionalExperience = $professionalExperienceEntity;
            $professionalExperience = $professionalExperienceService->search();
            $this->view->professionalExperience = $professionalExperience;
            
            $this->view->relId = $relId;
            $this->view->relObject = $relObject;
            
        } catch (Exception $ex) {
            throw new Exception('<ERROR>' . $ex->getMessage() . "\n");
        }
    }
    
    
             /**
     * The professionalExperience action
     */
    public function professionalExperienceViewAction() {
        try {
            $pageHeading = "View-Professional-Experience";
            $this->view->page_heading = $pageHeading;
            $this->view->data_page = "forms";

           // get all the professional experiences for the selected staff ...
            $professionalExperienceService = new Base_Model_ObtorLib_App_Core_Qualification_Service_ProfessionalExperience();            
             $experienceId = $this->_request->getParam('id');
             $professionalExperienceInfo = $professionalExperienceService->getProfessionalExperience($experienceId);
             $this->view->professionalExperienceInfo = $professionalExperienceInfo;
            
        } catch (Exception $ex) {
            throw new Exception('<ERROR>' . $ex->getMessage() . "\n");
        }
    }
    
           /**
     * The professionalExperience action
     */
    public function educationQualificationAction() {
        try {
             $pageHeading = "Educational-Qualification";
            $this->view->page_heading = $pageHeading;
            $this->view->data_page = "tables";
            
            $relId = $this->getStaffUserId();
            $relObject = 'Employee';
            
            // get all the Educational Qualification for the selected staff ...
            $educationService = new Base_Model_ObtorLib_App_Core_Qualification_Service_Education();
            $educationEntity  = new Base_Model_ObtorLib_App_Core_Qualification_Entity_Education();
            $educationEntity->setRelId($relId);
            $educationEntity->setRelObject($relObject);
            $educationService->education = $educationEntity;
            $education = $educationService->search();
            $this->view->education = $education;
            
            $this->view->relId = $relId;
            $this->view->relObject = $relObject;
            
            
        } catch (Exception $ex) {
            throw new Exception('<ERROR>' . $ex->getMessage() . "\n");
        }
    }
    
    
             /**
     * The professionalExperience action
     */
    public function educationQualificationViewAction() {
        try {
            $pageHeading = "View-Professional-Experience";
            $this->view->page_heading = $pageHeading;
            $this->view->data_page = "forms";

           // get all the Educational Qualification for the selected staff ...
            $educationService = new Base_Model_ObtorLib_App_Core_Qualification_Service_Education();   
            $educationId = $this->_request->getParam('id');
                $edualificationInfo = $educationService->getEducation($educationId);
                $this->view->edualificationInfo = $edualificationInfo;
                
        } catch (Exception $ex) {
            throw new Exception('<ERROR>' . $ex->getMessage() . "\n");
        }
    }
    
    
          /**
     * The professionalExperience action
     */
    public function skillsAction() {
        try {
             $pageHeading = "Skills";
            $this->view->page_heading = $pageHeading;
            $this->view->data_page = "tables";
            
            $relId = $this->getStaffUserId();
            $relObject = 'Employee';
            
            // get all the professional experiences for the selected staff ...
            $skillsService = new Base_Model_ObtorLib_App_Core_Qualification_Service_Skill();
            $skillsEntity  = new Base_Model_ObtorLib_App_Core_Qualification_Entity_Skill();
            $skillsEntity->setRelId($relId);
            $skillsEntity->setRelObject($relObject);
            $skillsService->skill = $skillsEntity;
            $skills = $skillsService->search();
            $this->view->skills = $skills;
            
            $this->view->relId = $relId;
            $this->view->relObject = $relObject;
            
        } catch (Exception $ex) {
            throw new Exception('<ERROR>' . $ex->getMessage() . "\n");
        }
    }
    
    
      /**
     * The professionalExperience action
     */
    public function skillsViewAction() {
        try {
            $pageHeading = "View-Skill";
            $this->view->page_heading = $pageHeading;
            $this->view->data_page = "forms";

           // get all the professional experiences for the selected staff ...
            $skillsService = new Base_Model_ObtorLib_App_Core_Qualification_Service_Skill();
             $skillId = $this->_request->getParam('id');
             $skillsInfo = $skillsService->getSkill($skillId);
             $this->view->skillsInfo = $skillsInfo;
                
        } catch (Exception $ex) {
            throw new Exception('<ERROR>' . $ex->getMessage() . "\n");
        }
    }
    
    
    /**
     * The professionalExperience action
     */
    public function languagesAction() {
        try {
           $pageHeading = "Languages";
            $this->view->page_heading = $pageHeading;
            $this->view->data_page = "tables";
            
            $relId = $this->getStaffUserId();
            $relObject = 'Employee';
            
            // get all the professional experiences for the selected staff ...
            $languagesService = new Base_Model_ObtorLib_App_Core_Qualification_Service_Language();
            $languagesEntity  = new Base_Model_ObtorLib_App_Core_Qualification_Entity_Language();
            $languagesEntity->setRelId($relId);
            $languagesEntity->setRelObject($relObject);
            $languagesService->language = $languagesEntity;
            $languages = $languagesService->search();
            $this->view->languages = $languages;
            
            $this->view->relId = $relId;
            $this->view->relObject = $relObject;
            
        } catch (Exception $ex) {
            throw new Exception('<ERROR>' . $ex->getMessage() . "\n");
        }
    }
    
    
    /**
     * The languagesView action
     */
    public function languagesViewAction() {
        try {
             $pageHeading = "View-Language";
            $this->view->page_heading = $pageHeading;
            $this->view->data_page = "forms";

           // get all the professional experiences for the selected staff ...
            $languagesService = new Base_Model_ObtorLib_App_Core_Qualification_Service_Language();
             $languageId = $this->_request->getParam('id');
             $languagesInfo = $languagesService->getLanguage($languageId);
             $this->view->languagesInfo = $languagesInfo;
        } catch (Exception $ex) {
            throw new Exception('<ERROR>' . $ex->getMessage() . "\n");
        }
    }
    
    
       /**
     * The professionalExperience action
     */
    public function licenseAction() {
        try {
           $pageHeading = "License";
            $this->view->page_heading = $pageHeading;
            $this->view->data_page = "tables";
            
            $relId = $this->getStaffUserId();
            $relObject = 'Employee';
            
            // get all the professional experiences for the selected staff ...
            $licensesService = new Base_Model_ObtorLib_App_Core_Qualification_Service_License();
            $licensesEntity  = new Base_Model_ObtorLib_App_Core_Qualification_Entity_License();
            $licensesEntity->setRelId($relId);
            $licensesEntity->setRelObject($relObject);
            $licensesService->license = $licensesEntity;
            $licenses = $licensesService->search();
            $this->view->licenses = $licenses;
            
            $this->view->relId = $relId;
            $this->view->relObject = $relObject;
            
        } catch (Exception $ex) {
            throw new Exception('<ERROR>' . $ex->getMessage() . "\n");
        }
    }
    

           /**
     * The professionalExperience action
     */
    public function attachmentsAction() {
        try {
            $pageHeading = "Attachments";
            $this->view->page_heading = $pageHeading;
            $this->view->data_page = "tables";
            
            $relId = $this->getStaffUserId();
            $relObject = 'Employee';
            
            // get all the professional experiences for the selected staff ...
            $attachmentsService = new Base_Model_ObtorLib_App_Core_Qualification_Service_Attachment();
            $attachmentsEntity  = new Base_Model_ObtorLib_App_Core_Qualification_Entity_Attachment();
            $attachmentsEntity->setRelId($relId);
            $attachmentsEntity->setRelObject($relObject);
            $attachmentsService->attachment = $attachmentsEntity;
            $attachments = $attachmentsService->search();
            $this->view->attachments = $attachments;
            
            $this->view->relId = $relId;
            $this->view->relObject = $relObject;
        } catch (Exception $ex) {
            throw new Exception('<ERROR>' . $ex->getMessage() . "\n");
        }
    }
    
    
             /**
     * The professionalExperience action
     */
    public function attachmentsViewAction() {
        try {
           $pageHeading = "View-Attachment";
            $this->view->page_heading = $pageHeading;
            $this->view->data_page = "forms";

           // get all the professional experiences for the selected staff ...
            $attachmentId = $this->_request->getParam('id');
            $attachmentsService = new Base_Model_ObtorLib_App_Core_Qualification_Service_Attachment();
                $attachmentsInfo = $attachmentsService->getAttachment($attachmentId);
                $this->view->attachmentsInfo = $attachmentsInfo;
            
        } catch (Exception $ex) {
            throw new Exception('<ERROR>' . $ex->getMessage() . "\n");
        }
    }
    
    
             /**
     * The professionalExperience action
     */
    public function workingTimeAction() {
        try {
             $pageHeading = "Working-Time";
            $this->view->page_heading = $pageHeading;
            $this->view->data_page = "tables";
            
            $relId = $this->getStaffUserId();
            // get all the professional experiences for the selected staff ...
            $employeeWorkingScheduleEntity  = new Base_Model_ObtorLib_App_Core_Employee_Entity_EmployeeWorkingSchedule();
            $employeeWorkingScheduleService  = new Base_Model_ObtorLib_App_Core_Employee_Service_EmployeeWorkingSchedule();
            $employeeWorkingScheduleEntity->setEmployeeId($relId);
            $employeeWorkingScheduleService->employeeWorkingSchedule = $employeeWorkingScheduleEntity;
            $employeeWorkingSchedule = $employeeWorkingScheduleService->search();
            $this->view->employeeWorkingSchedule = $employeeWorkingSchedule;
            
            $this->view->relId = $relId;
            
        } catch (Exception $ex) {
            throw new Exception('<ERROR>' . $ex->getMessage() . "\n");
        }
    }

    
          /**
     * The professionalExperience action
     */
    public function salaryParticularsAction() {
        try {
           $pageHeading = "Salary-Particulars";
            $this->view->page_heading = $pageHeading;
            $this->view->data_page = "tables";
            
            $relId = $this->getStaffUserId();
            
            // get all the professional experiences for the selected staff ...
            $employeeSalaryService = new Base_Model_ObtorLib_App_Core_Employee_Service_EmployeeSalary();
            $employeeSalaryEntity  = new Base_Model_ObtorLib_App_Core_Employee_Entity_EmployeeSalary();
            $employeeSalaryEntity->setEmployeeId($relId);
            $employeeSalaryService->employeeSalary = $employeeSalaryEntity;
            $salaryParticulars = $employeeSalaryService->search();
            $this->view->salaryParticulars = $salaryParticulars;
            
            $this->view->relId = $relId;
            
        } catch (Exception $ex) {
            throw new Exception('<ERROR>' . $ex->getMessage() . "\n");
        }
    }
    
    
      /**
     * The professionalExperience action
     */
    public function salaryParticularsViewAction() {
        try {
            $pageHeading = "View-Salary-Particulars";
            $this->view->page_heading = $pageHeading;
            $this->view->data_page = "forms";

           $employeeSalaryService = new Base_Model_ObtorLib_App_Core_Employee_Service_EmployeeSalary();
           $salaryParticularId = $this->_request->getParam('id');
                $salaryInfo         = $employeeSalaryService->getEmployeeSalary($salaryParticularId);
                $this->view->salaryInfo = $salaryInfo;
            
        } catch (Exception $ex) {
            throw new Exception('<ERROR>' . $ex->getMessage() . "\n");
        }
    }
    
    
             /**
     * The professionalExperience action
     */
    public function myAccountAction() {
        try {
            $pageHeading = "Account-Settings";
            $this->view->page_heading = $pageHeading;
            $this->view->data_page = "tables";
            
             if ($this->_request->isPost()) {
                
                $staff_password = $this->_request->getParam('txtUserPassword');
                $employeeService = new Base_Model_ObtorLib_App_Core_Employee_Service_Employee();
                $employeeEntity = new Base_Model_ObtorLib_App_Core_Employee_Entity_Employee();
                $employeeEntity->setId($this->getStaffUserId());
                $employeeEntity->setPassword(md5($staff_password));
                $employeeService->employee = $employeeEntity;
                $isUpdated = $employeeService->updatePassword();
                if ($isUpdated) {   
                    $this->_redirect("/my-profile/my-account/?action-status=updated");
                } else {
                    $this->_redirect("/my-profile/my-account/?action-status=failed");
                }
             }
            
            
        } catch (Exception $ex) {
            throw new Exception('<ERROR>' . $ex->getMessage() . "\n");
        }
    }
    
    
         /**
     * The professionalExperience action
     */
    public function testAction() {
        try {
            $pageHeading = "Professional-Experience";
            $this->view->page_heading = $pageHeading;
            $this->view->data_page = "tables";
            
            
        } catch (Exception $ex) {
            throw new Exception('<ERROR>' . $ex->getMessage() . "\n");
        }
    }


}