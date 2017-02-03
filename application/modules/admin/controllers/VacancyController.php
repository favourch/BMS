<?php

class Admin_VacancyController extends Base_Model_ObtorLib_App_Admin_Controller {

    public function init() {
        parent::init();
    }

    /**
     * The default action - show the home page
     */
    public function indexAction() {
        try {
            $pageHeading = "Vacancies";
            $this->view->page_heading = $pageHeading;
            $this->view->data_page = "tables";
            
            // get all the user all users...
            $vacancyService = new Base_Model_ObtorLib_App_Core_Recruitment_Service_Vacancy();
            $vacancyEntity = new Base_Model_ObtorLib_App_Core_Recruitment_Entity_Vacancy();
            $vacancyService->vacancy = $vacancyEntity;
            
            $objPaggination = new Base_Model_ObtorLib_Base_Lib_Paggination();
            $page = $this->_getParam('page', 1);
            $objPaggination->CurrentPage = $page;
            $objPaggination->TotalResults = $vacancyService->searchCount();
            $paginationData = $objPaggination->getPaggingData();
            $pageLimit1 = $paginationData['MYSQL_LIMIT1'];
            $pageLimit2 = $paginationData['MYSQL_LIMIT2'];

            $limit = " LIMIT $pageLimit1,$pageLimit2";


            $vacancyService->vacancy = $vacancyEntity;
            $vacancyInfo = $vacancyService->search($limit);
            $this->view->vacancyInfo = $vacancyInfo;
            
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
            $pageHeading = "Add-New-Vacancy";
            $this->view->page_heading = $pageHeading;
            $this->view->data_page = "forms";

            if ($this->_request->isPost()) {

                $id = $this->_request->getParam('txtId');
                $jobTitle = $this->_request->getParam('txtJobTitle');
                $vacancyTitle = $this->_request->getParam('txtVacancyTitle');
                $category = $this->_request->getParam('txtJobCategory');
                $smallDescription = $this->_request->getParam('txtSmallDescription');
                $detailedDescription = $this->_request->getParam('txtDetailedDescription');
                $qty = $this->_request->getParam('txtQty');
                $country = $this->_request->getParam('country');
                $region = $this->_request->getParam('region');
                $branch = $this->_request->getParam('branch');
                $department = $this->_request->getParam('department');
                $publishStartDate = $this->_request->getParam('txtPublishStartDate');
                $publishEnddate = $this->_request->getParam('txtPublishEnddate');
                
                $vacancyService = new Base_Model_ObtorLib_App_Core_Recruitment_Service_Vacancy();
                $vacancyEntity = new Base_Model_ObtorLib_App_Core_Recruitment_Entity_Vacancy();
                $vacancyEntity->setId($id);
                $vacancyEntity->setJobId($jobTitle);
                $vacancyEntity->setVacancyTitle($vacancyTitle);
                $vacancyEntity->setCategory($category);
                $vacancyEntity->setSmallDescription($smallDescription);
                $vacancyEntity->setDetailedDescription($detailedDescription);
                $vacancyEntity->setQty($qty);
                $vacancyEntity->setCountry($country);
                $vacancyEntity->setRegion($region);
                $vacancyEntity->setBranch($branch);
                $vacancyEntity->setDepartment($department);
                $vacancyEntity->setPublishStartDate($publishStartDate);
                $vacancyEntity->setPublishEnddate($publishEnddate);
                $vacancyService->vacancy = $vacancyEntity;
                $vacancyId = $vacancyService->addVacancy();
                if ($vacancyId) {
                    $this->_redirect("/admin/vacancy/?action-status=updated");
                } else {
                    $this->_redirect("/admin/vacancy/?action-status=failed");
                }
            
            } else {
                // get all the country...
                $countryService = new Base_Model_ObtorLib_App_Core_Catalog_Service_Country();
                $countryEntity  = new Base_Model_ObtorLib_App_Core_Catalog_Entity_Country();
                $countryService->country = $countryEntity;
                $countries = $countryService->search();
                $this->view->countries = $countries;
                
                // get all the jobTitle...
                $jobTitleService = new Base_Model_ObtorLib_App_Core_Catalog_Service_JobTitle();
                $jobTitleEntity  = new Base_Model_ObtorLib_App_Core_Catalog_Entity_JobTitle();
                $jobTitleService->jobTitle = $jobTitleEntity;
                $jobTitles = $jobTitleService->search();
                $this->view->jobTitles = $jobTitles;
                
                $relName = 'job';
                $categoryService = new Base_Model_ObtorLib_App_Core_Catalog_Service_Category();
                $categoryEntity  = new Base_Model_ObtorLib_App_Core_Catalog_Entity_Category();
                $categoryEntity->setRelName($relName);
                $categoryService->category = $categoryEntity;
                $categoryList = $categoryService->search();
                $this->view->categoryList = $categoryList;
                
                
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
            $pageHeading = "Edit-Vacancy";
            $this->view->page_heading = $pageHeading;
            $this->view->data_page = "forms";
            
            $vacancyService = new Base_Model_ObtorLib_App_Core_Recruitment_Service_Vacancy();

            if ($this->_request->isPost()) {

                $id = $this->_request->getParam('id');
                $jobTitle = $this->_request->getParam('txtJobTitle');
                $vacancyTitle = $this->_request->getParam('txtVacancyTitle');
                $category = $this->_request->getParam('txtJobCategory');
                $smallDescription = $this->_request->getParam('txtSmallDescription');
                $detailedDescription = $this->_request->getParam('txtDetailedDescription');
                $qty = $this->_request->getParam('txtQty');
                $country = $this->_request->getParam('country');
                $region = $this->_request->getParam('region');
                $branch = $this->_request->getParam('branch');
                $department = $this->_request->getParam('department');
                $publishStartDate = $this->_request->getParam('txtPublishStartDate');
                $publishEnddate = $this->_request->getParam('txtPublishEnddate');
                
                
                $vacancyEntity = new Base_Model_ObtorLib_App_Core_Recruitment_Entity_Vacancy();
                $vacancyEntity->setId($id);
                $vacancyEntity->setJobId($jobTitle);
                $vacancyEntity->setVacancyTitle($vacancyTitle);
                $vacancyEntity->setCategory($category);
                $vacancyEntity->setSmallDescription($smallDescription);
                $vacancyEntity->setDetailedDescription($detailedDescription);
                $vacancyEntity->setQty($qty);
                $vacancyEntity->setCountry($country);
                $vacancyEntity->setRegion($region);
                $vacancyEntity->setBranch($branch);
                $vacancyEntity->setDepartment($department);
                $vacancyEntity->setPublishStartDate($publishStartDate);
                $vacancyEntity->setPublishEnddate($publishEnddate);
                $vacancyService->vacancy = $vacancyEntity;
               
                $isUpdated = $vacancyService->updateVacancy();
                if ($isUpdated) {
                    $this->_redirect("/admin/vacancy/?action-status=updated");
                } else {
                    $this->_redirect("/admin/vacancy/?action-status=failed");
                }
            
            } else {
                // get all the country...
                $countryService = new Base_Model_ObtorLib_App_Core_Catalog_Service_Country();
                $countryEntity  = new Base_Model_ObtorLib_App_Core_Catalog_Entity_Country();
                $countryService->country = $countryEntity;
                $countries = $countryService->search();
                $this->view->countries = $countries;
                
                $vacancyId = $this->_request->getParam('id');
                $vacancyInformation = $vacancyService->getVacancy($vacancyId);
                $this->view->vacancyInformation = $vacancyInformation;
                
                $countryId = $vacancyInformation->getCountry();
                // get all the Regions...
                $regionService = new Base_Model_ObtorLib_App_Core_Catalog_Service_Region();
                $regionEntity  = new Base_Model_ObtorLib_App_Core_Catalog_Entity_Region();
                $regionEntity->setCountry($countryId);
                $regionService->region = $regionEntity;
                $regions = $regionService->search();
                $this->view->regions = $regions;
                
                
                $regionId = $vacancyInformation->getRegion();
                // get all the Regions...
                $branchService = new Base_Model_ObtorLib_App_Core_Catalog_Service_Branch();
                $branchEntity  = new Base_Model_ObtorLib_App_Core_Catalog_Entity_Branch();
                $branchEntity->setRegion($regionId);
                $branchService->branch = $branchEntity;
                $branches = $branchService->search();
                $this->view->branches = $branches;
            
                 $branchId = $vacancyInformation->getBranch();
                // get all the Regions...
                $departmentService = new Base_Model_ObtorLib_App_Core_Catalog_Service_Department();
                $departmentEntity  = new Base_Model_ObtorLib_App_Core_Catalog_Entity_Department();
                $departmentEntity->setBranch($branchId);
                $departmentService->department = $departmentEntity;
                $departments = $departmentService->search();
                $this->view->departments = $departments;
                
                
                // get all the jobTitle...
                $jobTitleService = new Base_Model_ObtorLib_App_Core_Catalog_Service_JobTitle();
                $jobTitleEntity  = new Base_Model_ObtorLib_App_Core_Catalog_Entity_JobTitle();
                $jobTitleService->jobTitle = $jobTitleEntity;
                $jobTitles = $jobTitleService->search();
                $this->view->jobTitles = $jobTitles;
                
                $relName = 'job';
                $categoryService = new Base_Model_ObtorLib_App_Core_Catalog_Service_Category();
                $categoryEntity  = new Base_Model_ObtorLib_App_Core_Catalog_Entity_Category();
                $categoryEntity->setRelName($relName);
                $categoryService->category = $categoryEntity;
                $categoryList = $categoryService->search();
                $this->view->categoryList = $categoryList;
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
    
    
    /**
     * The delete action
     */
    public function deleteAction() {
        try {
            $pageHeading = "Delete-Vacancy";
            $this->view->page_heading = $pageHeading;
            $this->view->data_page = "forms";

            // delete vacancy....
            $vacancyService = new Base_Model_ObtorLib_App_Core_Recruitment_Service_Vacancy();
            $vacancyEntity = new Base_Model_ObtorLib_App_Core_Recruitment_Entity_Vacancy();
            $vacancyEntity->setId($this->_request->getParam('id'));
            $vacancyService->vacancy = $vacancyEntity;
            $isDeleted = $vacancyService->deleteVacancy();
            if ($isDeleted) {
                $this->_redirect("/admin/vacancy/?action-status=deleted");
            } else {
                $this->_redirect("/admin/vacancy/?action-status=failed");
            }
        } catch (Exception $ex) {
            throw new Exception('<ERROR>' . $ex->getMessage() . "\n");
        }
    }
    

}
