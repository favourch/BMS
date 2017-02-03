<?php

class Admin_InquireController extends Base_Model_ObtorLib_App_Admin_Controller {

    public function init() {
        parent::init();
    }

    /**
     * The default action - show the home page
     */
    public function indexAction() {
        try {
            $pageHeading = "Inquire";
            $this->view->page_heading = $pageHeading;
            $this->view->data_page = "tables";
            
            $full_name          = $this->_request->getParam('full-name');
            $telephone_number   = $this->_request->getParam('telephone-number');
            $contact_number     = $this->_request->getParam('contact-number');
            $email_address      = $this->_request->getParam('email-address');
            $inquire_media      = $this->_request->getParam('inquire-media');
            $country            = $this->_request->getParam('country');
            $region             = $this->_request->getParam('region');
            $branch             = $this->_request->getParam('branch');
            $department         = $this->_request->getParam('department');
            $status             = $this->_request->getParam('status');
            
            
              
            // get all the inquire information...
            $objInquireEntity = new Base_Model_ObtorLib_App_Core_Customer_Entity_Inquire();
            $objInquireService = new Base_Model_ObtorLib_App_Core_Customer_Service_Inquire();
            $objInquireEntity->setFullName($full_name);
            $objInquireEntity->setTelephoneNumber($telephone_number);
            $objInquireEntity->setContactNumber($contact_number);
            $objInquireEntity->setEmailAddress($email_address);
            $objInquireEntity->setInquireMedia($inquire_media);
            $objInquireEntity->setCountry($country);
            $objInquireEntity->setRegion($region);
            $objInquireEntity->setBranch($branch);
            $objInquireEntity->setDepartment($department);
            $objInquireEntity->setStatus($status);
            $objInquireService->inquire = $objInquireEntity;
            
            $objPaggination = new Base_Model_ObtorLib_Base_Lib_Paggination();
            $page = $this->_getParam('page', 1);
            $objPaggination->CurrentPage = $page;
            $objPaggination->TotalResults = $objInquireService->searchCount();
            $paginationData = $objPaggination->getPaggingData();
            $pageLimit1 = $paginationData['MYSQL_LIMIT1'];
            $pageLimit2 = $paginationData['MYSQL_LIMIT2'];

            $limit = " LIMIT $pageLimit1,$pageLimit2";


            $objInquireService->inquire = $objInquireEntity;
            $inquiresInfo = $objInquireService->search($limit);
            $this->view->inquireInformation = $inquiresInfo;
            
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
            $pageHeading = "Add-New-Test";
            $this->view->page_heading = $pageHeading;
            $this->view->data_page = "forms";


            if ($this->_request->isPost()) {

                $id= $this->_request->getParam('txtId');
                $fullName= $this->_request->getParam('txtFullName');
                $postalAddressAddress= $this->_request->getParam('txtPostalAddressAddress');
                $postalAddressStreet= $this->_request->getParam('txtPostalAddressStreet');
                $postalAddressCity= $this->_request->getParam('txtPostalAddressCity');
                $postalAddressState= $this->_request->getParam('txtPostalAddressState');
                $postalAddressCountry= $this->_request->getParam('txtPostalAddressCountry');
                $postalAddressZip= $this->_request->getParam('txtPostalAddressZip');
                $telephoneNumber= $this->_request->getParam('txtTelephoneNumber');
                $contactNumber= $this->_request->getParam('txtContactNumber');
                $emailAddress= $this->_request->getParam('txtEmailAddress');
                $description= $this->_request->getParam('txtDescription');
                $gender= $this->_request->getParam('txtGender');
                $inquireMedia= $this->_request->getParam('txtInquireMedia');
                $country= $this->_request->getParam('txtCountry');
                $region= $this->_request->getParam('txtRegion');
                $branch= $this->_request->getParam('txtBranchName');
                $department= $this->_request->getParam('txtDepartmentName');
                $status= $this->_request->getParam('txtStatus');
                $addedBy= $this->_request->getParam('txtAddedBy');
                $addedOn= $this->_request->getParam('txtAddedOn');
                $updatedBy= $this->_request->getParam('txtUpdatedBy');
                $updatedOn= $this->_request->getParam('txtUpdatedOn');
                
                $objInquireEntity = new Base_Model_ObtorLib_App_Core_Customer_Entity_Inquire();
                $objInquireService = new Base_Model_ObtorLib_App_Core_Customer_Service_Inquire();
                $objInquireEntity->setFullName($fullName);
                $objInquireEntity->setPostalAddressAddress($postalAddressAddress);
                $objInquireEntity->setPostalAddressStreet($postalAddressStreet);
                $objInquireEntity->setPostalAddressCity($postalAddressCity);
                $objInquireEntity->setPostalAddressState($postalAddressState);
                $objInquireEntity->setPostalAddressCountry($postalAddressCountry);
                $objInquireEntity->setPostalAddressZip($postalAddressZip);
                $objInquireEntity->setTelephoneNumber($telephoneNumber);
                $objInquireEntity->setContactNumber($contactNumber);
                $objInquireEntity->setEmailAddress($emailAddress);
                $objInquireEntity->setDescription($description);
                $objInquireEntity->setGender($gender);
                $objInquireEntity->setInquireMedia($inquireMedia);
                $objInquireEntity->setCountry($country);
                $objInquireEntity->setRegion($region);
                $objInquireEntity->setBranch($branch);
                $objInquireEntity->setDepartment($department);
                $objInquireEntity->setStatus($status);
                $objInquireEntity->setAddedBy($addedBy);
                $objInquireEntity->setAddedOn($addedOn);
                $objInquireEntity->setUpdatedBy($updatedBy);
                $objInquireEntity->setUpdatedOn($updatedOn);
                $objInquireService->inquire = $objInquireEntity;
                $inquireId = $objInquireService->addInquire();
                if ($inquireId) {
                    $this->_redirect("/admin/inquire/?action-status=updated");
                } else {
                    $this->_redirect("/admin/inquire/?action-status=failed");
                }
            
            
            } else {
                
                 // get all the country...
                $countryService = new Base_Model_ObtorLib_App_Core_Catalog_Service_Country();
                $countryEntity  = new Base_Model_ObtorLib_App_Core_Catalog_Entity_Country();
                $countryService->country = $countryEntity;
                $countries = $countryService->search();
                $this->view->countries = $countries;
                
                $inquireMediaList = $this->getInquireMediaList();
                $this->view->inquireMediaList = $inquireMediaList;
                
                 $objCountryNameList = new Base_Model_Lib_Catelog_Service_Country();
                $countryNameList  = $objCountryNameList->getAll();
                $this->view->countryNameList = $countryNameList; 
                
                $inquireStatusList = $this->getInquireStatusList();
                $this->view->inquireStatusList = $inquireStatusList;
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
            $pageHeading = "Add-New-Test";
            $this->view->page_heading = $pageHeading;
            $this->view->data_page = "forms";

            $objInquireService = new Base_Model_ObtorLib_App_Core_Customer_Service_Inquire();

            if ($this->_request->isPost()) {

                $id= $this->_request->getParam('id');
                $fullName= $this->_request->getParam('txtFullName');
                $postalAddressAddress= $this->_request->getParam('txtPostalAddressAddress');
                $postalAddressStreet= $this->_request->getParam('txtPostalAddressStreet');
                $postalAddressCity= $this->_request->getParam('txtPostalAddressCity');
                $postalAddressState= $this->_request->getParam('txtPostalAddressState');
                $postalAddressCountry= $this->_request->getParam('txtPostalAddressCountry');
                $postalAddressZip= $this->_request->getParam('txtPostalAddressZip');
                $telephoneNumber= $this->_request->getParam('txtTelephoneNumber');
                $contactNumber= $this->_request->getParam('txtContactNumber');
                $emailAddress= $this->_request->getParam('txtEmailAddress');
                $description= $this->_request->getParam('txtDescription');
                $gender= $this->_request->getParam('txtGender');
                $inquireMedia= $this->_request->getParam('txtInquireMedia');
                $country= $this->_request->getParam('txtCountry');
                $region= $this->_request->getParam('txtRegion');
                $branch= $this->_request->getParam('txtBranchName');
                $department= $this->_request->getParam('txtDepartmentName');
                $status= $this->_request->getParam('txtStatus');
                $addedBy= $this->_request->getParam('txtAddedBy');
                $addedOn= $this->_request->getParam('txtAddedOn');
                $updatedBy= $this->_request->getParam('txtUpdatedBy');
                $updatedOn= $this->_request->getParam('txtUpdatedOn');
                
                $objInquireEntity = new Base_Model_ObtorLib_App_Core_Customer_Entity_Inquire();
                
                $objInquireEntity->setId($id);
                $objInquireEntity->setFullName($fullName);
                $objInquireEntity->setPostalAddressAddress($postalAddressAddress);
                $objInquireEntity->setPostalAddressStreet($postalAddressStreet);
                $objInquireEntity->setPostalAddressCity($postalAddressCity);
                $objInquireEntity->setPostalAddressState($postalAddressState);
                $objInquireEntity->setPostalAddressCountry($postalAddressCountry);
                $objInquireEntity->setPostalAddressZip($postalAddressZip);
                $objInquireEntity->setTelephoneNumber($telephoneNumber);
                $objInquireEntity->setContactNumber($contactNumber);
                $objInquireEntity->setEmailAddress($emailAddress);
                $objInquireEntity->setDescription($description);
                $objInquireEntity->setGender($gender);
                $objInquireEntity->setInquireMedia($inquireMedia);
                $objInquireEntity->setCountry($country);
                $objInquireEntity->setRegion($region);
                $objInquireEntity->setBranch($branch);
                $objInquireEntity->setDepartment($department);
                $objInquireEntity->setStatus($status);
                $objInquireEntity->setAddedBy($addedBy);
                $objInquireEntity->setAddedOn($addedOn);
                $objInquireEntity->setUpdatedBy($updatedBy);
                $objInquireEntity->setUpdatedOn($updatedOn);
                $objInquireService->inquire = $objInquireEntity;
                $isUpdated = $objInquireService->updateInquire();
                if ($isUpdated) {
                    $this->_redirect("/admin/inquire/?action-status=updated");
                } else {
                    $this->_redirect("/admin/inquire/?action-status=failed");
                }
            
            
            } else {
                
                 // get all the country...
                $countryService = new Base_Model_ObtorLib_App_Core_Catalog_Service_Country();
                $countryEntity  = new Base_Model_ObtorLib_App_Core_Catalog_Entity_Country();
                $countryService->country = $countryEntity;
                $countries = $countryService->search();
                $this->view->countries = $countries;
                
                $inquireId = $this->_request->getParam('id');
                $inquireInformation = $objInquireService->getInquire($inquireId);
                $this->view->inquireInformation = $inquireInformation;
                
                $countryId = $inquireInformation->getCountry();
                // get all the Regions...
                $regionService = new Base_Model_ObtorLib_App_Core_Catalog_Service_Region();
                $regionEntity  = new Base_Model_ObtorLib_App_Core_Catalog_Entity_Region();
                $regionEntity->setCountry($countryId);
                $regionService->region = $regionEntity;
                $regions = $regionService->search();
                $this->view->regions = $regions;
                
                
                $regionId = $inquireInformation->getRegion();
                // get all the Regions...
                $branchService = new Base_Model_ObtorLib_App_Core_Catalog_Service_Branch();
                $branchEntity  = new Base_Model_ObtorLib_App_Core_Catalog_Entity_Branch();
                $branchEntity->setRegion($regionId);
                $branchService->branch = $branchEntity;
                $branches = $branchService->search();
                $this->view->branches = $branches;
            
                 $branchId = $inquireInformation->getBranch();
                // get all the Regions...
                $departmentService = new Base_Model_ObtorLib_App_Core_Catalog_Service_Department();
                $departmentEntity  = new Base_Model_ObtorLib_App_Core_Catalog_Entity_Department();
                $departmentEntity->setBranch($branchId);
                $departmentService->department = $departmentEntity;
                $departments = $departmentService->search();
                $this->view->departments = $departments;
                
                 // get all the country...
                $countryService = new Base_Model_ObtorLib_App_Core_Catalog_Service_Country();
                $countryEntity  = new Base_Model_ObtorLib_App_Core_Catalog_Entity_Country();
                $countryService->country = $countryEntity;
                $countries = $countryService->search();
                $this->view->countries = $countries;
                
                $inquireMediaList = $this->getInquireMediaList();
                $this->view->inquireMediaList = $inquireMediaList;
                
                 $objCountryNameList = new Base_Model_Lib_Catelog_Service_Country();
                $countryNameList  = $objCountryNameList->getAll();
                $this->view->countryNameList = $countryNameList; 
                
                $inquireStatusList = $this->getInquireStatusList();
                $this->view->inquireStatusList = $inquireStatusList;
                
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
            $pageHeading = "Delete-Inquire";
            $this->view->page_heading = $pageHeading;
            $this->view->data_page = "forms";

            // delete inquire....
            $objInquireEntity = new Base_Model_ObtorLib_App_Core_Customer_Entity_Inquire();
            $objInquireService = new Base_Model_ObtorLib_App_Core_Customer_Service_Inquire();
            $objInquireEntity->setId($this->_request->getParam('id'));
            $objInquireService->inquire = $objInquireEntity;
            $isDeleted = $objInquireService->deleteInquire();
            if ($isDeleted) {
                $this->_redirect("/admin/inquire/?action-status=deleted");
            } else {
                $this->_redirect("/admin/inquire/?action-status=failed");
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
            $pageHeading = "Inquire-Details";
            $this->view->page_heading = $pageHeading;
            $this->view->data_page = "modals";

            $objInquireService = new Base_Model_ObtorLib_App_Core_Customer_Service_Inquire();
            $inquireId = $this->_request->getParam('id');
            $inquireInformation = $objInquireService->getInquire($inquireId);
            $this->view->inquireInformation = $inquireInformation;
            
            $objFollowupEntity = new Base_Model_ObtorLib_App_Core_Customer_Entity_Followup();
            $objFollowupService = new Base_Model_ObtorLib_App_Core_Customer_Service_Followup();
            $objFollowupEntity->setInquire($inquireId);
            $objFollowupService->followup = $objFollowupEntity;
            $followupInformations = $objFollowupService->search();
            $this->view->followupInformations = $followupInformations;


        } catch (Exception $ex) {
            throw new Exception('<ERROR>' . $ex->getMessage() . "\n");
        }
    }


    /**
     * The add action
     */
    public function followupAction() {
        try {
             $this->_helper->layout()->disableLayout();
            $pageHeading = "View-Test";
            $this->view->page_heading = $pageHeading;
            $this->view->data_page = "forms";
           
            $objFollowupEntity = new Base_Model_ObtorLib_App_Core_Customer_Entity_Followup();
            $objFollowupService = new Base_Model_ObtorLib_App_Core_Customer_Service_Followup();

            if ($this->_request->isPost()) {
                $inquire= $this->_request->getParam('txtInquireId');
                $followupTitle= $this->_request->getParam('txtFollowUpTitle');
                $followupDescription= $this->_request->getParam('txtFollowUpDescription');
                $addedBy= $this->getUserId();
                $addedOn= $this->getSystemDateTime();
                $modifiedBy= $this->getUserId();
                $modifiedOn= $this->getSystemDateTime();
                $objFollowupEntity->setInquire($inquire);
                $objFollowupEntity->setFollowupTitle($followupTitle);
                $objFollowupEntity->setFollowupDescription($followupDescription);
                $objFollowupEntity->setAddedBy($addedBy);
                $objFollowupEntity->setAddedOn($addedOn);
                $objFollowupEntity->setModifiedBy($modifiedBy);
                $objFollowupEntity->setModifiedOn($modifiedOn);
                $objFollowupService->followup = $objFollowupEntity;
                $recAdded = $objFollowupService->addFollowup();
                print("record-added");exit;
            }


        } catch (Exception $ex) {
            throw new Exception('<ERROR>' . $ex->getMessage() . "\n");
        }
    }
    
    
    /**
     * The add action
     */
    public function searchAction() {
        try {
            $pageHeading = "Search-Inquire";
            $this->view->page_heading = $pageHeading;
            $this->view->data_page = "forms";

            
        } catch (Exception $ex) {
            throw new Exception('<ERROR>' . $ex->getMessage() . "\n");
        }
    }

}
