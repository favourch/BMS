<?php

class Admin_SalaryParticularsController extends Base_Model_ObtorLib_App_Admin_Controller {

    public function init() {
        parent::init();
    }

    /**
     * The default action - show the home page
     */
    public function indexAction() {
        try {
            $pageHeading = "Salary-Particulars";
            $this->view->page_heading = $pageHeading;
            $this->view->data_page = "tables";
            
            $relId = $this->_request->getParam('rel-id');
            
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
     * The add action
     */
    public function addAction() {
        try {
            $pageHeading = "Add-New-Salary-Particulars";
            $this->view->page_heading = $pageHeading;
            $this->view->data_page = "forms";

           // add employeeSalary for the selected staff ...
            $employeeSalaryService = new Base_Model_ObtorLib_App_Core_Employee_Service_EmployeeSalary();
            $employeeSalaryEntity  = new Base_Model_ObtorLib_App_Core_Employee_Entity_EmployeeSalary();
            
            if ($this->_request->isPost()) {
                
                $relId = $this->_request->getParam('rel-id');
                $employeeSalaryEntity->setSalaryType($this->_request->getParam('cmbSalaryType'));
                $employeeSalaryEntity->setSalaryAmount($this->_request->getParam('txtSalaryAmount'));
                $employeeSalaryEntity->setEffectiveFrom($this->_request->getParam('txtEffectiveFrom'));
                $employeeSalaryEntity->setRemarks($this->_request->getParam('txtRemarks'));
                $employeeSalaryEntity->setStatus($this->_request->getParam('cmbCurrentStatus'));
                $employeeSalaryEntity->setAddedOn($this->getSystemDateTime());
                $employeeSalaryEntity->setAddedBy($this->getUserId());
                 $employeeSalaryEntity->setUpdatedOn($this->getSystemDateTime());
                $employeeSalaryEntity->setUpdatedBy($this->getUserId());
                $employeeSalaryEntity->setEmployeeId($relId);

                $employeeSalaryService->employeeSalary = $employeeSalaryEntity;

                $salaryId = $employeeSalaryService->addEmployeeSalary();
                if ($salaryId) {
                    $this->_redirect("/admin/salary-particulars/?rel-id=".$relId."&action-status=updated");
                } else {
                    $this->_redirect("/admin/salary-particulars/?rel-id=".$relId."&action-status=failed");
                }
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
            $pageHeading = "Edit-Salary-Particulars";
            $this->view->page_heading = $pageHeading;
            $this->view->data_page = "forms";

             // add employeeSalary for the selected staff ...
            $employeeSalaryService = new Base_Model_ObtorLib_App_Core_Employee_Service_EmployeeSalary();
            $employeeSalaryEntity  = new Base_Model_ObtorLib_App_Core_Employee_Entity_EmployeeSalary();
            
            if ($this->_request->isPost()) {
                
                $relId = $this->_request->getParam('rel-id');
                $slpId = $this->_request->getParam('id');
                $employeeSalaryEntity->setId($slpId);
                $employeeSalaryEntity->setSalaryType($this->_request->getParam('cmbSalaryType'));
                $employeeSalaryEntity->setSalaryAmount($this->_request->getParam('txtSalaryAmount'));
                $employeeSalaryEntity->setEffectiveFrom($this->_request->getParam('txtEffectiveFrom'));
                $employeeSalaryEntity->setRemarks($this->_request->getParam('txtRemarks'));
                $employeeSalaryEntity->setStatus($this->_request->getParam('cmbCurrentStatus'));
                $employeeSalaryEntity->setAddedOn($this->getSystemDateTime());
                $employeeSalaryEntity->setAddedBy($this->getUserId());
                 $employeeSalaryEntity->setUpdatedOn($this->getSystemDateTime());
                $employeeSalaryEntity->setUpdatedBy($this->getUserId());
                $employeeSalaryEntity->setEmployeeId($relId);

                $employeeSalaryService->employeeSalary = $employeeSalaryEntity;

                $isUpdated = $employeeSalaryService->updateEmployeeSalary();
                if ($isUpdated) {
                    $this->_redirect("/admin/salary-particulars/?rel-id=".$relId."&action-status=updated");
                } else {
                    $this->_redirect("/admin/salary-particulars/?rel-id=".$relId."&action-status=failed");
                }
            } else {
                $salaryParticularId = $this->_request->getParam('id');
                $salaryInfo         = $employeeSalaryService->getEmployeeSalary($salaryParticularId);
                $this->view->salaryInfo = $salaryInfo;
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
     * The add action
     */
    public function deleteAction() {
        try {
            $pageHeading = "Delete-Salary-Particulars";
            $this->view->page_heading = $pageHeading;
            $this->view->data_page = "forms";

            $relId = $this->_request->getParam('rel-id');
            $salaryParticularsId = $this->_request->getParam('id');
            
             // add employeeSalary for the selected staff ...
            $employeeSalaryService = new Base_Model_ObtorLib_App_Core_Employee_Service_EmployeeSalary();
            $employeeSalaryEntity  = new Base_Model_ObtorLib_App_Core_Employee_Entity_EmployeeSalary();
            $employeeSalaryEntity->setId($salaryParticularsId);
            $employeeSalaryService->employeeSalary = $employeeSalaryEntity;
            $isDeleted = $employeeSalaryService->deleteEmployeeSalary();
            if ($isDeleted) {
                    $this->_redirect("/admin/salary-particulars/?rel-id=".$relId."&action-status=deleted");
                } else {
                     $this->_redirect("/admin/salary-particulars/?rel-id=".$relId."&action-status=failed");
                }
            
        } catch (Exception $ex) {
            throw new Exception('<ERROR>' . $ex->getMessage() . "\n");
        }
    }

}
