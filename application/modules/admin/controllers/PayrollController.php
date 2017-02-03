<?php

class Admin_PayrollController extends Base_Model_ObtorLib_App_Admin_Controller {

    public function init() {
        parent::init();
    }

    /**
     * The default action - show the home page
     */
    public function indexAction() {
        try {
            $pageHeading = "Salary-Payments";
            $this->view->page_heading = $pageHeading;
            $this->view->data_page = "tables";
            
            $salaryStatus = $this->_request->getParam('status');
            $employee = $this->_request->getParam('employee');
            $salaryMonth = $this->_request->getParam('month');
            $salaryYear = $this->_request->getParam('year');
            
              
            $objEmployeeSalaryPaymentService = new Base_Model_ObtorLib_App_Core_Employee_Service_EmployeeSalaryPayment();
            $objEmployeeSalaryPaymentEntity = new Base_Model_ObtorLib_App_Core_Employee_Entity_EmployeeSalaryPayment();
            $objEmployeeSalaryPaymentEntity->setCurrentStatus($salaryStatus);
            $objEmployeeSalaryPaymentEntity->setEmployeeId($employee);
            $objEmployeeSalaryPaymentEntity->setSalMonth($salaryMonth);
            $objEmployeeSalaryPaymentEntity->setSalYear($salaryYear);
            $objEmployeeSalaryPaymentService->employeeSalaryPayment = $objEmployeeSalaryPaymentEntity;
            $objPaggination = new Base_Model_ObtorLib_Base_Lib_Paggination();
            $page = $this->_getParam('page', 1);
            $objPaggination->CurrentPage = $page;
            $objPaggination->TotalResults = $objEmployeeSalaryPaymentService->searchCount();
            $paginationData = $objPaggination->getPaggingData();
            $pageLimit1 = $paginationData['MYSQL_LIMIT1'];
            $pageLimit2 = $paginationData['MYSQL_LIMIT2'];

            $limit = " LIMIT $pageLimit1,$pageLimit2";
            
            $objEmployeeSalaryPaymentService->employeeSalaryPayment = $objEmployeeSalaryPaymentEntity;
            $employeeSalaryPayment = $objEmployeeSalaryPaymentService->search($limit);
            $this->view->employeeSalaryPayment = $employeeSalaryPayment;

            $this->view->pageNum            = $page;
            $this->view->rowsPerPage        = $objPaggination->ResultsPerPage;
            $this->view->paggination        = $objPaggination;
            
                
        } catch (Exception $ex) {
            throw new Exception('<ERROR>' . $ex->getMessage() . "\n");
        }
    }
    
    
    
      /**
     * The default action - show the home page
     */
    public function recentSalaryPaymentsAction() {
        try {
            $pageHeading = "Salary-Payments";
            $this->view->page_heading = $pageHeading;
            $this->view->data_page = "tables";
            
            $salaryStatus = 'Paid';
              
            $objEmployeeSalaryPaymentService = new Base_Model_ObtorLib_App_Core_Employee_Service_EmployeeSalaryPayment();
            $objEmployeeSalaryPaymentEntity = new Base_Model_ObtorLib_App_Core_Employee_Entity_EmployeeSalaryPayment();
            $objEmployeeSalaryPaymentEntity->setCurrentStatus($salaryStatus);
            $objEmployeeSalaryPaymentService->employeeSalaryPayment = $objEmployeeSalaryPaymentEntity;
            $objPaggination = new Base_Model_ObtorLib_Base_Lib_Paggination();
            $page = $this->_getParam('page', 1);
            $objPaggination->CurrentPage = $page;
            $objPaggination->TotalResults = $objEmployeeSalaryPaymentService->searchCount();
            $paginationData = $objPaggination->getPaggingData();
            $pageLimit1 = $paginationData['MYSQL_LIMIT1'];
            $pageLimit2 = $paginationData['MYSQL_LIMIT2'];

            $limit = " LIMIT $pageLimit1,$pageLimit2";
            
            $objEmployeeSalaryPaymentService->employeeSalaryPayment = $objEmployeeSalaryPaymentEntity;
            $employeeSalaryPayment = $objEmployeeSalaryPaymentService->search($limit);
            $this->view->employeeSalaryPayment = $employeeSalaryPayment;

            $this->view->pageNum            = $page;
            $this->view->rowsPerPage        = $objPaggination->ResultsPerPage;
            $this->view->paggination        = $objPaggination;
            
                
        } catch (Exception $ex) {
            throw new Exception('<ERROR>' . $ex->getMessage() . "\n");
        }
    }
    
    

    /**
     * The add action
     */
    public function searchAction() {
        try {
            $pageHeading = "Search-Salary-Payments";
            $this->view->page_heading = $pageHeading;
            $this->view->data_page = "forms";
            
            // get all the user all users...
                $employee_status = 'In-Service';
                $employeeService = new Base_Model_ObtorLib_App_Core_Employee_Service_Employee();
                $employeeEntity = new Base_Model_ObtorLib_App_Core_Employee_Entity_Employee();
                $employeeEntity->setEmployeeStatus($employee_status);
                $employeeService->employee = $employeeEntity;
                $employeeInfo = $employeeService->search();
                $this->view->employeeInfo = $employeeInfo;

            
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
     * The add action
     */
    public function extraBonusAction() {
        try {
            $pageHeading = "View-Test";
            $this->view->page_heading = $pageHeading;
            $this->view->data_page = "forms";

            // get all the user all users...
                $employee_status = 'In-Service';
                $employeeService = new Base_Model_ObtorLib_App_Core_Employee_Service_Employee();
                $employeeEntity = new Base_Model_ObtorLib_App_Core_Employee_Entity_Employee();
                $employeeEntity->setEmployeeStatus($employee_status);
                $employeeService->employee = $employeeEntity;
                $employeeInfo = $employeeService->search();
                $this->view->employeeInfo = $employeeInfo;
                
                
                if ($this->_request->isPost()) {
                    
                    $employeeId         = $this->_request->getParam('employee');
                    $salaryMonth        = $this->_request->getParam('month');
                    $salaryYear         = $this->_request->getParam('year');
                    $bonusAmount        = $this->_request->getParam('txtExtraBonus');
                    $remarks            = $this->_request->getParam('txtRemarks');
                    
                    $employeeSalaryPaymentBreakdownService = new Base_Model_ObtorLib_App_Core_Employee_Service_EmployeeSalaryPaymentBreakdown();
                    $objEmployeeSalaryPaymentService = new Base_Model_ObtorLib_App_Core_Employee_Service_EmployeeSalaryPayment();
                    $objEmployeeSalaryPaymentEntity = new Base_Model_ObtorLib_App_Core_Employee_Entity_EmployeeSalaryPayment();
                    $objEmployeeSalaryPaymentEntity->setEmployeeId($employeeId);
                    $objEmployeeSalaryPaymentEntity->setSalMonth($salaryMonth);
                    $objEmployeeSalaryPaymentEntity->setSalYear($salaryYear);
                    $objEmployeeSalaryPaymentService->employeeSalaryPayment = $objEmployeeSalaryPaymentEntity;
                    $limit = " LIMIT 0,1";
                    $employeeSalaryPayment = $objEmployeeSalaryPaymentService->search($limit);
                    if($employeeSalaryPayment){
                        
                        $employeeSalaryInfo = $employeeSalaryPayment[0];
                        $employeeSalaryPaymentId = $employeeSalaryInfo->getId();
                        
                        
                        
                        $salary_type = 'ExtraBonus';
                        $employeeSalaryPaymentBreakdownEntity = new Base_Model_ObtorLib_App_Core_Employee_Entity_EmployeeSalaryPaymentBreakdown();
                        $employeeSalaryPaymentBreakdownEntity->setSalaryType($salary_type);
                        $employeeSalaryPaymentBreakdownEntity->setRemarks($remarks);
                        $employeeSalaryPaymentBreakdownEntity->setAmount($bonusAmount);
                        $employeeSalaryPaymentBreakdownEntity->setAmountType('Addition');
                        $employeeSalaryPaymentBreakdownEntity->setGeneratedOn($this->getSystemDateTime());
                        $employeeSalaryPaymentBreakdownEntity->setEmployeeId($employeeId);
                        $employeeSalaryPaymentBreakdownEntity->setAddedOn($this->getSystemDateTime());
                        $employeeSalaryPaymentBreakdownEntity->setAddedBy($this->getUserId());
                        $employeeSalaryPaymentBreakdownEntity->setEmployeeSalaryPaymentId($employeeSalaryPaymentId);
                        $employeeSalaryPaymentBreakdownService->employeeSalaryPaymentBreakdown = $employeeSalaryPaymentBreakdownEntity;
                        $employeeSalaryPaymentBreakdownService->addEmployeeSalaryPaymentBreakdown();
                        
                        $total_salary_amount = $employeeSalaryInfo->getGrossSalaryAmount() + $bonusAmount;
                        $total_salary_deduction = $employeeSalaryInfo->getTotalDeduction();
                        $net_salary_amount  = $total_salary_amount - $total_salary_deduction; 
                        
                        $objEmployeeSalaryPaymentEntity = new Base_Model_ObtorLib_App_Core_Employee_Entity_EmployeeSalaryPayment();
                        $objEmployeeSalaryPaymentEntity->setId($employeeSalaryPaymentId);
                        $objEmployeeSalaryPaymentEntity->setGrossSalaryAmount($total_salary_amount);
                        $objEmployeeSalaryPaymentEntity->setTotalDeduction($total_salary_deduction);
                        $objEmployeeSalaryPaymentEntity->setNetSalaryAmount($net_salary_amount);
                        $objEmployeeSalaryPaymentService->employeeSalaryPayment = $objEmployeeSalaryPaymentEntity;
                        $recUpdated = $objEmployeeSalaryPaymentService->updateEmployeeSalaryPaymentFinalAmount();
                        
                        $this->_redirect("/admin/payroll/?action-status=updated");
                        
                    } else {
                         $this->_redirect("/admin/payroll/extra-bonus/?action-status=salary-not-generated-for-selected-month");
                    }
                    
                    
                    
                }
            
        } catch (Exception $ex) {
            throw new Exception('<ERROR>' . $ex->getMessage() . "\n");
        }
    }
    
    
        /**
     * The add action
     */
    public function extraDeductionAction() {
        try {
            $pageHeading = "View-Test";
            $this->view->page_heading = $pageHeading;
            $this->view->data_page = "forms";

            // get all the user all users...
                $employee_status = 'In-Service';
                $employeeService = new Base_Model_ObtorLib_App_Core_Employee_Service_Employee();
                $employeeEntity = new Base_Model_ObtorLib_App_Core_Employee_Entity_Employee();
                $employeeEntity->setEmployeeStatus($employee_status);
                $employeeService->employee = $employeeEntity;
                $employeeInfo = $employeeService->search();
                $this->view->employeeInfo = $employeeInfo;
                
                
                if ($this->_request->isPost()) {
                    
                    $employeeId         = $this->_request->getParam('employee');
                    $salaryMonth        = $this->_request->getParam('month');
                    $salaryYear         = $this->_request->getParam('year');
                    $deductionAmount        = $this->_request->getParam('txtDeductionAmount');
                    $remarks            = $this->_request->getParam('txtRemarks');
                    
                    $employeeSalaryPaymentBreakdownService = new Base_Model_ObtorLib_App_Core_Employee_Service_EmployeeSalaryPaymentBreakdown();
                    $objEmployeeSalaryPaymentService = new Base_Model_ObtorLib_App_Core_Employee_Service_EmployeeSalaryPayment();
                    $objEmployeeSalaryPaymentEntity = new Base_Model_ObtorLib_App_Core_Employee_Entity_EmployeeSalaryPayment();
                    $objEmployeeSalaryPaymentEntity->setEmployeeId($employeeId);
                    $objEmployeeSalaryPaymentEntity->setSalMonth($salaryMonth);
                    $objEmployeeSalaryPaymentEntity->setSalYear($salaryYear);
                    $objEmployeeSalaryPaymentService->employeeSalaryPayment = $objEmployeeSalaryPaymentEntity;
                    $limit = " LIMIT 0,1";
                    $employeeSalaryPayment = $objEmployeeSalaryPaymentService->search($limit);
                    if($employeeSalaryPayment){
                        
                        $employeeSalaryInfo = $employeeSalaryPayment[0];
                        $employeeSalaryPaymentId = $employeeSalaryInfo->getId();
                        
                        
                        
                        $salary_type = 'ExtraBonus';
                        $employeeSalaryPaymentBreakdownEntity = new Base_Model_ObtorLib_App_Core_Employee_Entity_EmployeeSalaryPaymentBreakdown();
                        $employeeSalaryPaymentBreakdownEntity->setSalaryType($salary_type);
                        $employeeSalaryPaymentBreakdownEntity->setRemarks($remarks);
                        $employeeSalaryPaymentBreakdownEntity->setAmount($deductionAmount);
                        $employeeSalaryPaymentBreakdownEntity->setAmountType('Deduction');
                        $employeeSalaryPaymentBreakdownEntity->setGeneratedOn($this->getSystemDateTime());
                        $employeeSalaryPaymentBreakdownEntity->setEmployeeId($employeeId);
                        $employeeSalaryPaymentBreakdownEntity->setAddedOn($this->getSystemDateTime());
                        $employeeSalaryPaymentBreakdownEntity->setAddedBy($this->getUserId());
                        $employeeSalaryPaymentBreakdownEntity->setEmployeeSalaryPaymentId($employeeSalaryPaymentId);
                        $employeeSalaryPaymentBreakdownService->employeeSalaryPaymentBreakdown = $employeeSalaryPaymentBreakdownEntity;
                        $employeeSalaryPaymentBreakdownService->addEmployeeSalaryPaymentBreakdown();
                        
                        $total_salary_amount = $employeeSalaryInfo->getGrossSalaryAmount();
                        $total_salary_deduction = $employeeSalaryInfo->getTotalDeduction() + $deductionAmount;
                        $net_salary_amount  = $total_salary_amount - $total_salary_deduction; 
                        
                        $objEmployeeSalaryPaymentEntity = new Base_Model_ObtorLib_App_Core_Employee_Entity_EmployeeSalaryPayment();
                        $objEmployeeSalaryPaymentEntity->setId($employeeSalaryPaymentId);
                        $objEmployeeSalaryPaymentEntity->setGrossSalaryAmount($total_salary_amount);
                        $objEmployeeSalaryPaymentEntity->setTotalDeduction($total_salary_deduction);
                        $objEmployeeSalaryPaymentEntity->setNetSalaryAmount($net_salary_amount);
                        $objEmployeeSalaryPaymentService->employeeSalaryPayment = $objEmployeeSalaryPaymentEntity;
                        $recUpdated = $objEmployeeSalaryPaymentService->updateEmployeeSalaryPaymentFinalAmount();
                        
                        $this->_redirect("/admin/payroll/?action-status=updated");
                        
                    } else {
                         $this->_redirect("/admin/payroll/extra-deduction/?action-status=salary-not-generated-for-selected-month");
                    }
                    
                    
                    
                }
            
        } catch (Exception $ex) {
            throw new Exception('<ERROR>' . $ex->getMessage() . "\n");
        }
    }
    
    /**
     * The add action
     */
    public function salaryViewAction() {
        try {
            $pageHeading = "View-Salary-Information";
            $this->view->page_heading = $pageHeading;
            $this->view->data_page = "forms";

            $salaryId = $this->_request->getParam('id');
            $objEmployeeSalaryPaymentService = new Base_Model_ObtorLib_App_Core_Employee_Service_EmployeeSalaryPayment();
            $employeeSalaryPaymentInfo  = $objEmployeeSalaryPaymentService->getEmployeeSalaryPayment($salaryId);
            $this->view->employeeSalaryPaymentInfo = $employeeSalaryPaymentInfo;
            
            $employeeSalaryPaymentBreakdownService = new Base_Model_ObtorLib_App_Core_Employee_Service_EmployeeSalaryPaymentBreakdown();
            $employeeSalaryPaymentBreakdownEntity = new Base_Model_ObtorLib_App_Core_Employee_Entity_EmployeeSalaryPaymentBreakdown();
            $employeeSalaryPaymentBreakdownEntity->setEmployeeSalaryPaymentId($salaryId);
            $employeeSalaryPaymentBreakdownService->employeeSalaryPaymentBreakdown = $employeeSalaryPaymentBreakdownEntity;
            $employeeSalaryPaymentBreakdownInfo = $employeeSalaryPaymentBreakdownService->search();
            $this->view->employeeSalaryPaymentBreakdownInfo = $employeeSalaryPaymentBreakdownInfo;
        } catch (Exception $ex) {
            throw new Exception('<ERROR>' . $ex->getMessage() . "\n");
        }
    }
    
    
    
    /**
     * The add action
     */
    public function payNowAction() {
        try {
            $pageHeading = "View-Test";
            $this->view->page_heading = $pageHeading;
            $this->view->data_page = "forms";
            if ($this->_request->isPost()) {
                $salaryId = $this->_request->getParam('salaryId');
                $objEmployeeSalaryPaymentService = new Base_Model_ObtorLib_App_Core_Employee_Service_EmployeeSalaryPayment();
                $objEmployeeSalaryPaymentEntity = new Base_Model_ObtorLib_App_Core_Employee_Entity_EmployeeSalaryPayment();
                $objEmployeeSalaryPaymentEntity->setId($salaryId);
                $objEmployeeSalaryPaymentEntity->setCurrentStatus('Paid');
                $objEmployeeSalaryPaymentEntity->setPaidBy($this->getUserId());
                $objEmployeeSalaryPaymentEntity->setPaidOn($this->getSystemDateTime());
                $objEmployeeSalaryPaymentService->employeeSalaryPayment = $objEmployeeSalaryPaymentEntity;
                $objEmployeeSalaryPaymentService->updateEmployeeSalaryPaymentStatus();
                print("Done");exit;
            }else{
                print("Failed");exit;
            }
            
            exit;
            
        } catch (Exception $ex) {
            throw new Exception('<ERROR>' . $ex->getMessage() . "\n");
        }
    }
    
    
     /**
     * The add action
     */
    public function salaryBreakdownViewAction() {
        try {
            $pageHeading = "View-Salary-Breakdown-Information";
            $this->view->page_heading = $pageHeading;
            $this->view->data_page = "forms";
            
            $salaryPaymentBreakdownId = $this->_request->getParam('id');
            $employeeSalaryPaymentBreakdownService = new Base_Model_ObtorLib_App_Core_Employee_Service_EmployeeSalaryPaymentBreakdown();
            $salaryPaymentBreakdownInfo  = $employeeSalaryPaymentBreakdownService->getEmployeeSalaryPaymentBreakdown($salaryPaymentBreakdownId);
            $this->view->salaryPaymentBreakdownInfo = $salaryPaymentBreakdownInfo;
            

            
        } catch (Exception $ex) {
            throw new Exception('<ERROR>' . $ex->getMessage() . "\n");
        }
    }
    
    
        /**
     * The default action - show the home page
     */
    public function employeeSalaryViewAction() {
        try {
            $pageHeading = "Employee-Salary-Payments";
            $this->view->page_heading = $pageHeading;
            $this->view->data_page = "tables";
            
            $salaryStatus = 'Paid';
            $employee = $this->_request->getParam('employee');
            $salaryYear = $this->_request->getParam('year');
            
              
            $objEmployeeSalaryPaymentService = new Base_Model_ObtorLib_App_Core_Employee_Service_EmployeeSalaryPayment();
            $objEmployeeSalaryPaymentEntity = new Base_Model_ObtorLib_App_Core_Employee_Entity_EmployeeSalaryPayment();
            $objEmployeeSalaryPaymentEntity->setCurrentStatus($salaryStatus);
            $objEmployeeSalaryPaymentEntity->setEmployeeId($employee);
            $objEmployeeSalaryPaymentEntity->setSalMonth($salaryMonth);
            $objEmployeeSalaryPaymentEntity->setSalYear($salaryYear);
            $objEmployeeSalaryPaymentService->employeeSalaryPayment = $objEmployeeSalaryPaymentEntity;
            $objPaggination = new Base_Model_ObtorLib_Base_Lib_Paggination();
            $page = $this->_getParam('page', 1);
            $objPaggination->CurrentPage = $page;
            $objPaggination->TotalResults = $objEmployeeSalaryPaymentService->searchCount();
            $paginationData = $objPaggination->getPaggingData();
            $pageLimit1 = $paginationData['MYSQL_LIMIT1'];
            $pageLimit2 = $paginationData['MYSQL_LIMIT2'];

            $limit = " LIMIT $pageLimit1,$pageLimit2";
            
            $objEmployeeSalaryPaymentService->employeeSalaryPayment = $objEmployeeSalaryPaymentEntity;
            $employeeSalaryPayment = $objEmployeeSalaryPaymentService->search($limit);
            $this->view->employeeSalaryPayment = $employeeSalaryPayment;

            $this->view->pageNum            = $page;
            $this->view->rowsPerPage        = $objPaggination->ResultsPerPage;
            $this->view->paggination        = $objPaggination;
            
                
        } catch (Exception $ex) {
            throw new Exception('<ERROR>' . $ex->getMessage() . "\n");
        }
    }

}
