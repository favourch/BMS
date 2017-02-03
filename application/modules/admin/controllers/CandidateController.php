<?php

class Admin_CandidateController extends Base_Model_ObtorLib_App_Admin_Controller {

    public function init() {
        parent::init();
    }

    /**
     * The default action - show the home page
     */
    public function indexAction() {
        try {
            $pageHeading = "Candidates";
            $this->view->page_heading = $pageHeading;
            $this->view->data_page = "tables";
            
            // get all the candidate information...
            $objCandidateEntity = new Base_Model_ObtorLib_App_Core_Recruitment_Entity_Candidate();
            $objCandidateService = new Base_Model_ObtorLib_App_Core_Recruitment_Service_Candidate();
            $objCandidateService->candidate = $objCandidateEntity;
            
            $objPaggination = new Base_Model_ObtorLib_Base_Lib_Paggination();
            $page = $this->_getParam('page', 1);
            $objPaggination->CurrentPage = $page;
            $objPaggination->TotalResults = $objCandidateService->searchCount();
            $paginationData = $objPaggination->getPaggingData();
            $pageLimit1 = $paginationData['MYSQL_LIMIT1'];
            $pageLimit2 = $paginationData['MYSQL_LIMIT2'];

            $limit = " LIMIT $pageLimit1,$pageLimit2";


            $objCandidateService->candidate = $objCandidateEntity;
            $candidatesInfo = $objCandidateService->search($limit);
            $this->view->candidateInformation = $candidatesInfo;
            
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
            $pageHeading = "Add-New-Candidate";
            $this->view->page_heading = $pageHeading;
            $this->view->data_page = "forms";

            if ($this->_request->isPost()) {


                $id = $this->_request->getParam('txtId');
                $fullName = $this->_request->getParam('txtFullName');
                $nameWithIni = $this->_request->getParam('txtNameWithIni');
                $emailAddress = $this->_request->getParam('txtEmailAddress');
                $telephoneNumber = $this->_request->getParam('txtTelephoneNumber');
                $contactNumber = $this->_request->getParam('txtContactNumber');
                $dateOfBirth = $this->_request->getParam('txtDateOfBirth');
                $gender = $this->_request->getParam('txtGender');
                $permanentAddressAddress = $this->_request->getParam('txtPermanentAddressAddress');
                $permanentAddressStreet = $this->_request->getParam('txtPermanentAddressStreet');
                $permanentAddressCity = $this->_request->getParam('txtPermanentAddressCity');
                $permanentAddressState = $this->_request->getParam('txtPermanentAddressState');
                $permanentAddressZip = $this->_request->getParam('txtPermanentAddressZip');
                $permanentAddressCountry = $this->_request->getParam('txtPermanentAddressCountry');
                $residentialAddressAddress = $this->_request->getParam('txtResidentialAddressAddress');
                $residentialAddressStreet = $this->_request->getParam('txtResidentialAddressStreet');
                $residentialAddressCity = $this->_request->getParam('txtResidentialAddressCity');
                $residentialAddressState = $this->_request->getParam('txtResidentialAddressState');
                $residentialAddressZip = $this->_request->getParam('txtResidentialAddressZip');
                $residentialAddressCountry = $this->_request->getParam('txtResidentialAddressCountry');
                $vacancy = $this->_request->getParam('txtVacancy');
                
                $objCandidateEntity = new Base_Model_ObtorLib_App_Core_Recruitment_Entity_Candidate();
                $objCandidateService = new Base_Model_ObtorLib_App_Core_Recruitment_Service_Candidate();
                $objCandidateEntity->setId($id);
                $objCandidateEntity->setFullName($fullName);
                $objCandidateEntity->setNameWithIni($nameWithIni);
                $objCandidateEntity->setEmailAddress($emailAddress);
                $objCandidateEntity->setTelephoneNumber($telephoneNumber);
                $objCandidateEntity->setContactNumber($contactNumber);
                $objCandidateEntity->setDateOfBirth($dateOfBirth);
                $objCandidateEntity->setGender($gender);
                $objCandidateEntity->setPermanentAddressAddress($permanentAddressAddress);
                $objCandidateEntity->setPermanentAddressStreet($permanentAddressStreet);
                $objCandidateEntity->setPermanentAddressCity($permanentAddressCity);
                $objCandidateEntity->setPermanentAddressState($permanentAddressState);
                $objCandidateEntity->setPermanentAddressZip($permanentAddressZip);
                $objCandidateEntity->setPermanentAddressCountry($permanentAddressCountry);
                $objCandidateEntity->setResidentialAddressAddress($residentialAddressAddress);
                $objCandidateEntity->setResidentialAddressStreet($residentialAddressStreet);
                $objCandidateEntity->setResidentialAddressCity($residentialAddressCity);
                $objCandidateEntity->setResidentialAddressState($residentialAddressState);
                $objCandidateEntity->setResidentialAddressZip($residentialAddressZip);
                $objCandidateEntity->setResidentialAddressCountry($residentialAddressCountry);
                $objCandidateEntity->setVacancy($vacancy);
                $objCandidateService->candidate = $objCandidateEntity;
                
                $candidateId = $objCandidateService->addCandidate();
                if ($candidateId) {
                    $this->_redirect("/admin/candidate/?action-status=updated");
                } else {
                    $this->_redirect("/admin/candidate/?action-status=failed");
                }
                
                
            } else {
                $vacancyService = new Base_Model_ObtorLib_App_Core_Recruitment_Service_Vacancy();
                $vacancyEntity = new Base_Model_ObtorLib_App_Core_Recruitment_Entity_Vacancy();
                $vacancyService->vacancy = $vacancyEntity;
                $vacancyService->vacancy = $vacancyEntity;
                $vacancyInfo = $vacancyService->search();
                $this->view->vacancyInfo = $vacancyInfo;
                
                $objCountryNameList = new Base_Model_Lib_Catelog_Service_Country();
                $countryNameList  = $objCountryNameList->getAll();
                $this->view->countryNameList = $countryNameList; 
                
            }

            
        } catch (Exception $ex) {
            throw new Exception('<ERROR>' . $ex->getMessage() . "\n");
        }
    }

    
    
    
    /**
     * The add action
     */
    public function editAction() {
        try {
            $pageHeading = "Edit-Candidate";
            $this->view->page_heading = $pageHeading;
            $this->view->data_page = "forms";

             $objCandidateService = new Base_Model_ObtorLib_App_Core_Recruitment_Service_Candidate();
             
            if ($this->_request->isPost()) {


                $id = $this->_request->getParam('id');
                $fullName = $this->_request->getParam('txtFullName');
                $nameWithIni = $this->_request->getParam('txtNameWithIni');
                $emailAddress = $this->_request->getParam('txtEmailAddress');
                $telephoneNumber = $this->_request->getParam('txtTelephoneNumber');
                $contactNumber = $this->_request->getParam('txtContactNumber');
                $dateOfBirth = $this->_request->getParam('txtDateOfBirth');
                $gender = $this->_request->getParam('txtGender');
                $permanentAddressAddress = $this->_request->getParam('txtPermanentAddressAddress');
                $permanentAddressStreet = $this->_request->getParam('txtPermanentAddressStreet');
                $permanentAddressCity = $this->_request->getParam('txtPermanentAddressCity');
                $permanentAddressState = $this->_request->getParam('txtPermanentAddressState');
                $permanentAddressZip = $this->_request->getParam('txtPermanentAddressZip');
                $permanentAddressCountry = $this->_request->getParam('txtPermanentAddressCountry');
                $residentialAddressAddress = $this->_request->getParam('txtResidentialAddressAddress');
                $residentialAddressStreet = $this->_request->getParam('txtResidentialAddressStreet');
                $residentialAddressCity = $this->_request->getParam('txtResidentialAddressCity');
                $residentialAddressState = $this->_request->getParam('txtResidentialAddressState');
                $residentialAddressZip = $this->_request->getParam('txtResidentialAddressZip');
                $residentialAddressCountry = $this->_request->getParam('txtResidentialAddressCountry');
                $vacancy = $this->_request->getParam('txtVacancy');
                
                $objCandidateEntity = new Base_Model_ObtorLib_App_Core_Recruitment_Entity_Candidate();
               
                $objCandidateEntity->setId($id);
                $objCandidateEntity->setFullName($fullName);
                $objCandidateEntity->setNameWithIni($nameWithIni);
                $objCandidateEntity->setEmailAddress($emailAddress);
                $objCandidateEntity->setTelephoneNumber($telephoneNumber);
                $objCandidateEntity->setContactNumber($contactNumber);
                $objCandidateEntity->setDateOfBirth($dateOfBirth);
                $objCandidateEntity->setGender($gender);
                $objCandidateEntity->setPermanentAddressAddress($permanentAddressAddress);
                $objCandidateEntity->setPermanentAddressStreet($permanentAddressStreet);
                $objCandidateEntity->setPermanentAddressCity($permanentAddressCity);
                $objCandidateEntity->setPermanentAddressState($permanentAddressState);
                $objCandidateEntity->setPermanentAddressZip($permanentAddressZip);
                $objCandidateEntity->setPermanentAddressCountry($permanentAddressCountry);
                $objCandidateEntity->setResidentialAddressAddress($residentialAddressAddress);
                $objCandidateEntity->setResidentialAddressStreet($residentialAddressStreet);
                $objCandidateEntity->setResidentialAddressCity($residentialAddressCity);
                $objCandidateEntity->setResidentialAddressState($residentialAddressState);
                $objCandidateEntity->setResidentialAddressZip($residentialAddressZip);
                $objCandidateEntity->setResidentialAddressCountry($residentialAddressCountry);
                $objCandidateEntity->setVacancy($vacancy);
                $objCandidateService->candidate = $objCandidateEntity;
    
                $isUpdated = $objCandidateService->updateCandidate();
                if ($isUpdated) {
                    $this->_redirect("/admin/candidate/?action-status=updated");
                } else {
                    $this->_redirect("/admin/candidate/?action-status=failed");
                }
                
                
            } else {
                
                $candidateId = $this->_request->getParam('id');
                $candidateInformation = $objCandidateService->getCandidate($candidateId);
                $this->view->candidateInformation = $candidateInformation;
                
                $vacancyService = new Base_Model_ObtorLib_App_Core_Recruitment_Service_Vacancy();
                $vacancyEntity = new Base_Model_ObtorLib_App_Core_Recruitment_Entity_Vacancy();
                $vacancyService->vacancy = $vacancyEntity;
                $vacancyService->vacancy = $vacancyEntity;
                $vacancyInfo = $vacancyService->search();
                $this->view->vacancyInfo = $vacancyInfo;
                
                $objCountryNameList = new Base_Model_Lib_Catelog_Service_Country();
                $countryNameList  = $objCountryNameList->getAll();
                $this->view->countryNameList = $countryNameList; 
                
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
            $pageHeading = "Delete-Candidates";
            $this->view->page_heading = $pageHeading;
            $this->view->data_page = "forms";

            // delete vacancy....
            $objCandidateEntity = new Base_Model_ObtorLib_App_Core_Recruitment_Entity_Candidate();
            $objCandidateService = new Base_Model_ObtorLib_App_Core_Recruitment_Service_Candidate();
            $objCandidateEntity->setId($this->_request->getParam('id'));
            $objCandidateService->candidate = $objCandidateEntity;
            $isDeleted = $objCandidateService->deleteCandidate();
            if ($isDeleted) {
                $this->_redirect("/admin/candidate/?action-status=deleted");
            } else {
                $this->_redirect("/admin/candidate/?action-status=failed");
            }
        } catch (Exception $ex) {
            throw new Exception('<ERROR>' . $ex->getMessage() . "\n");
        }
    }
    
    
    
/**
     * The add action
     */
    public function viewAction() {
        try {
            $pageHeading = "View-Test";
            $this->view->page_heading = $pageHeading;
            $this->view->data_page = "forms";

            
        } catch (Exception $ex) {
            throw new Exception('<ERROR>' . $ex->getMessage() . "\n");
        }
    }
    

}
