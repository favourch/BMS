<?php
/**
 * Created by PhpStorm.
 * Employee: ism-apac
 * Date: 8/7/14
 * Time: 3:26 PM
 */

class Base_Model_ObtorLib_App_Core_Employee_Service_EmployeeSalary  extends Base_Model_ObtorLib_Eav_Model_Service {

    public $employeeSalary;

    /*
     * Get a user employeeSalary using id
     * @return      : Entity Employee Employee Object (Base_Model_ObtorLib_App_Core_Employee_Entity_Employee)
     */

    public function getEmployeeSalary($id) {
        try {
            $objEmployeeSalary = new Base_Model_ObtorLib_App_Core_Employee_Dao_EmployeeSalary();
            $employeeSalary = $objEmployeeSalary->getEmployeeSalary($id);
            return $employeeSalary;
        } catch (Exception $e) {
            throw new Base_Model_ObtorLib_App_Core_Employee_Exception($e);
        }
    }

    /*
     * Add new user employeeSalary
     * @return      : Integer ID / Null
     */

    public function addEmployeeSalary() {
        try {
            if (!($this->employeeSalary instanceof Base_Model_ObtorLib_App_Core_Employee_Entity_EmployeeSalary)) {
                throw new Base_Model_ObtorLib_App_Core_Employee_Exception(" EmployeeSalary Entity not initialized");
            } else {
                $objEmployeeSalary = new Base_Model_ObtorLib_App_Core_Employee_Dao_EmployeeSalary();
                $objEmployeeSalary->employeeSalary = $this->employeeSalary;
                return $objEmployeeSalary->addEmployeeSalary();
            }
        } catch (Exception $ex) {
            throw new Base_Model_ObtorLib_App_Core_Employee_Exception($ex);
        }
    }

    /*
     * Update user employeeSalary
     * @return      : Integer ID / Null
     */

    public function updateEmployeeSalary() {
        try {
            if (!($this->employeeSalary instanceof Base_Model_ObtorLib_App_Core_Employee_Entity_EmployeeSalary)) {
                throw new Base_Model_ObtorLib_App_Core_Employee_Exception(" EmployeeSalary Entity not initialized");
            } else {
                $objEmployeeSalary = new Base_Model_ObtorLib_App_Core_Employee_Dao_EmployeeSalary();
                $objEmployeeSalary->employeeSalary = $this->employeeSalary;
                return $objEmployeeSalary->updateEmployeeSalary();
            }
        } catch (Exception $ex) {
            throw new Base_Model_ObtorLib_App_Core_Employee_Exception($ex);
        }
    }

    /*
     * Delete user employeeSalary
     * @return      : Integer ID / Null
     */

    public function deleteEmployeeSalary() {
        try {
             if (!($this->employeeSalary instanceof Base_Model_ObtorLib_App_Core_Employee_Entity_EmployeeSalary)) {
                throw new Base_Model_ObtorLib_App_Core_Employee_Exception(" EmployeeSalary Entity not initialized");
            } else {
                $objEmployeeSalary = new Base_Model_ObtorLib_App_Core_Employee_Dao_EmployeeSalary();
                $objEmployeeSalary->employeeSalary = $this->employeeSalary;
                return $objEmployeeSalary->deleteEmployeeSalary();
            }
        } catch (Exception $ex) {
            throw new Base_Model_ObtorLib_App_Core_Employee_Exception($ex);
        }
    }

    /*
     * Search user employeeSalarys....
     * @return : Array of Employee Employees Entities...
     */

    public function search() {
        try {
            if (!($this->employeeSalary instanceof Base_Model_ObtorLib_App_Core_Employee_Entity_EmployeeSalary)) {
                throw new Base_Model_ObtorLib_App_Core_Employee_Exception(" EmployeeSalary Employee Entity not initialized");
            } else {
                $objEmployeeSalary = new Base_Model_ObtorLib_App_Core_Employee_Dao_EmployeeSalary();
                $objEmployeeSalary->employeeSalary = $this->employeeSalary;
                return $objEmployeeSalary->search();
            }
        } catch (Exception $ex) {
            throw new Base_Model_ObtorLib_App_Core_Employee_Exception($ex);
        }
    }


    /*
    * Search user employeeSalarys....
    * @return : Array of Employee Employees Entities...
    */

    public function searchCount() {
        try {
            if (!($this->employeeSalary instanceof Base_Model_ObtorLib_App_Core_Employee_Entity_EmployeeSalary)) {
                throw new Base_Model_ObtorLib_App_Core_Employee_Exception(" EmployeeSalary Employee Entity not initialized");
            } else {
                $objEmployeeSalary = new Base_Model_ObtorLib_App_Core_Employee_Dao_EmployeeSalary();
                $objEmployeeSalary->employeeSalary = $this->employeeSalary;
                return $objEmployeeSalary->searchCount();
            }
        } catch (Exception $ex) {
            throw new Base_Model_ObtorLib_App_Core_Employee_Exception($ex);
        }
    }
    
    
    
    /*
     * Name : salaryGenerator
     * Description : This function is to generate the staffs (All Staffs) salary every month..
     *      
     */
    public function generateSalary($salaryDate) {
        try {
            
            $_SALARY_MONTH = date('F',strtotime($salaryDate));
            $_SALARY_YEAR = date('Y',strtotime($salaryDate));
            
            $currentDateTimeObj = Zend_Date::now();
            $currentDateTime = $currentDateTimeObj->toString("YYYY-MM-dd HH:mm:ss");
            
             
             $objSettingService                          = new Base_Model_Lib_System_Service_Settings();
            // get attendance settings....paramater is setting id..
             $employeesProvidentFunddeDuctionsName      = $objSettingService->getItem('71')->getSettingFieldName();
             $employeesProvidentFunddeDuctions          = $objSettingService->getItem('71')->getSettingValue();
             
             $employeesTrustFundDuctionsName 		= $objSettingService->getItem('72')->getSettingFieldName();
             $employeesTrustFundDuctions 		= $objSettingService->getItem('72')->getSettingValue();
             
             $employeesSalaryLimitForTax 		= $objSettingService->getItem('73')->getSettingValue();
             
             $employeesTaxDuctionsName 			= $objSettingService->getItem('74')->getSettingFieldName();
             $employeesTaxDuctions 			= $objSettingService->getItem('74')->getSettingValue();
         
             // Get all the In Service staffs....
             $employee_status = 'In-Service';
             $employeeService = new Base_Model_ObtorLib_App_Core_Employee_Service_Employee();
             $employeeEntity = new Base_Model_ObtorLib_App_Core_Employee_Entity_Employee();
             $employeeEntity->setEmployeeStatus($employee_status);
             $employeeService->employee = $employeeEntity;
             $inServiceStaffs = $employeeService->search();
             
             $employeeSalaryService = new Base_Model_ObtorLib_App_Core_Employee_Service_EmployeeSalary();
             $objEmployeeSalaryPaymentService = new Base_Model_ObtorLib_App_Core_Employee_Service_EmployeeSalaryPayment();
             $employeeSalaryPaymentBreakdownService = new Base_Model_ObtorLib_App_Core_Employee_Service_EmployeeSalaryPaymentBreakdown();
             
             foreach($inServiceStaffs As $sIndex=>$staffInfo){
             
                 // staff id
                 $employeeId = $staffInfo->getId();
                 
                 // get all the salary particulars for the selected staff..
                 
                $employeeSalaryEntity  = new Base_Model_ObtorLib_App_Core_Employee_Entity_EmployeeSalary();
                $employeeSalaryEntity->setEmployeeId($employeeId);
                $employeeSalaryEntity->setStatus('Enabled');
                $employeeSalaryService->employeeSalary = $employeeSalaryEntity;
                $salaryParticulars = $employeeSalaryService->search();
                 
                
                // add a row to the tbl_employee_salary_payments - we need the tbl_employee_salary_payments 
                // id to add tbl_employee_salary_payment_breakdown
                $objEmployeeSalaryPaymentEntity = new Base_Model_ObtorLib_App_Core_Employee_Entity_EmployeeSalaryPayment();
                $objEmployeeSalaryPaymentEntity->setSalMonth($_SALARY_MONTH);
                $objEmployeeSalaryPaymentEntity->setSalYear($_SALARY_YEAR);
                $objEmployeeSalaryPaymentEntity->setGrossSalaryAmount(NULL);
                $objEmployeeSalaryPaymentEntity->setTotalDeduction(NULL);
                $objEmployeeSalaryPaymentEntity->setNetSalaryAmount(NULL);
                $objEmployeeSalaryPaymentEntity->setCurrentStatus('Pending');
                $objEmployeeSalaryPaymentEntity->setGeneratedOn($currentDateTime);
                $objEmployeeSalaryPaymentEntity->setPaidOn(NULL);
                $objEmployeeSalaryPaymentEntity->setPaidBy(NULL);
                $objEmployeeSalaryPaymentEntity->setEmployeeId($employeeId);
                $objEmployeeSalaryPaymentService->employeeSalaryPayment = $objEmployeeSalaryPaymentEntity;
                $employeeSalaryPaymentId = $objEmployeeSalaryPaymentService->addEmployeeSalaryPayment();
                
                $total_basic_salary         = 0;
                $total_allowance_salary     = 0;
                $total_bonus_salary         = 0;
                
                
                
                foreach($salaryParticulars As $spIndex=>$salaryParticular){
                    $salary_amount = $salaryParticular->getSalaryAmount();
                    $salary_type = $salaryParticular->getSalaryType();
                    $remarks     = $salaryParticular->getRemarks();
                    
                    if($salary_type == 'Basic'){
                        $total_basic_salary = $total_basic_salary + $salary_amount;
                    }elseif($salary_type == 'Allowance'){
                        $total_allowance_salary     = $total_allowance_salary + $salary_amount;
                    }elseif($salary_type == 'Bonus'){
                        $total_bonus_salary     = $total_bonus_salary + $salary_amount;
                    }
                    
                    $employeeSalaryPaymentBreakdownEntity = new Base_Model_ObtorLib_App_Core_Employee_Entity_EmployeeSalaryPaymentBreakdown();
                    $employeeSalaryPaymentBreakdownEntity->setSalaryType($salary_type);
                    $employeeSalaryPaymentBreakdownEntity->setRemarks($remarks);
                    $employeeSalaryPaymentBreakdownEntity->setAmount($salary_amount);
                    $employeeSalaryPaymentBreakdownEntity->setAmountType('Addition');
                    $employeeSalaryPaymentBreakdownEntity->setGeneratedOn($currentDateTime);
                    $employeeSalaryPaymentBreakdownEntity->setEmployeeId($employeeId);
                    $employeeSalaryPaymentBreakdownEntity->setAddedOn(NULL);
                    $employeeSalaryPaymentBreakdownEntity->setAddedBy(NULL);
                    $employeeSalaryPaymentBreakdownEntity->setEmployeeSalaryPaymentId($employeeSalaryPaymentId);
                    $employeeSalaryPaymentBreakdownService->employeeSalaryPaymentBreakdown = $employeeSalaryPaymentBreakdownEntity;
                    $employeeSalaryPaymentBreakdownService->addEmployeeSalaryPaymentBreakdown();
                }
                
                
                
                // calculate the system salary Deductions
                
                $epfDeduction = 0;
                $etfDeduction = 0;
                $taxDeduction = 0;
                
                // EPF  Deduction
                $epfDeduction = ($employeesProvidentFunddeDuctions/100)*$total_basic_salary;
                $etfDeduction = ($employeesTrustFundDuctions/100)*$total_basic_salary;
                
                if($employeesSalaryLimitForTax<$total_basic_salary){
                   $taxDeduction = ($employeesTaxDuctions/100)*$total_basic_salary; 
                }
                
                
                // add epf deduction....
                $remarks = $employeesProvidentFunddeDuctionsName;
                $employeeSalaryPaymentBreakdownEntity = new Base_Model_ObtorLib_App_Core_Employee_Entity_EmployeeSalaryPaymentBreakdown();
                $employeeSalaryPaymentBreakdownEntity->setSalaryType(NULL);
                $employeeSalaryPaymentBreakdownEntity->setRemarks($remarks);
                $employeeSalaryPaymentBreakdownEntity->setAmount($epfDeduction);
                $employeeSalaryPaymentBreakdownEntity->setAmountType('Deduction');
                $employeeSalaryPaymentBreakdownEntity->setGeneratedOn($currentDateTime);
                $employeeSalaryPaymentBreakdownEntity->setEmployeeId($employeeId);
                $employeeSalaryPaymentBreakdownEntity->setAddedOn(NULL);
                $employeeSalaryPaymentBreakdownEntity->setAddedBy(NULL);
                $employeeSalaryPaymentBreakdownEntity->setEmployeeSalaryPaymentId($employeeSalaryPaymentId);
                $employeeSalaryPaymentBreakdownService->employeeSalaryPaymentBreakdown = $employeeSalaryPaymentBreakdownEntity;
                $employeeSalaryPaymentBreakdownService->addEmployeeSalaryPaymentBreakdown();
                
                // add etf deduction....
                $remarks = $employeesTrustFundDuctionsName;
                $employeeSalaryPaymentBreakdownEntity = new Base_Model_ObtorLib_App_Core_Employee_Entity_EmployeeSalaryPaymentBreakdown();
                $employeeSalaryPaymentBreakdownEntity->setSalaryType(NULL);
                $employeeSalaryPaymentBreakdownEntity->setRemarks($remarks);
                $employeeSalaryPaymentBreakdownEntity->setAmount($etfDeduction);
                $employeeSalaryPaymentBreakdownEntity->setAmountType('Deduction');
                $employeeSalaryPaymentBreakdownEntity->setGeneratedOn($currentDateTime);
                $employeeSalaryPaymentBreakdownEntity->setEmployeeId($employeeId);
                $employeeSalaryPaymentBreakdownEntity->setAddedOn(NULL);
                $employeeSalaryPaymentBreakdownEntity->setAddedBy(NULL);
                $employeeSalaryPaymentBreakdownEntity->setEmployeeSalaryPaymentId($employeeSalaryPaymentId);
                $employeeSalaryPaymentBreakdownService->employeeSalaryPaymentBreakdown = $employeeSalaryPaymentBreakdownEntity;
                $employeeSalaryPaymentBreakdownService->addEmployeeSalaryPaymentBreakdown();
                
                if($taxDeduction>0){
                    $remarks = $employeesTaxDuctionsName;
                    $employeeSalaryPaymentBreakdownEntity = new Base_Model_ObtorLib_App_Core_Employee_Entity_EmployeeSalaryPaymentBreakdown();
                    $employeeSalaryPaymentBreakdownEntity->setSalaryType(NULL);
                    $employeeSalaryPaymentBreakdownEntity->setRemarks($remarks);
                    $employeeSalaryPaymentBreakdownEntity->setAmount($taxDeduction);
                    $employeeSalaryPaymentBreakdownEntity->setAmountType('Deduction');
                    $employeeSalaryPaymentBreakdownEntity->setGeneratedOn($currentDateTime);
                    $employeeSalaryPaymentBreakdownEntity->setEmployeeId($employeeId);
                    $employeeSalaryPaymentBreakdownEntity->setAddedOn(NULL);
                    $employeeSalaryPaymentBreakdownEntity->setAddedBy(NULL);
                    $employeeSalaryPaymentBreakdownEntity->setEmployeeSalaryPaymentId($employeeSalaryPaymentId);
                    $employeeSalaryPaymentBreakdownService->employeeSalaryPaymentBreakdown = $employeeSalaryPaymentBreakdownEntity;
                    $employeeSalaryPaymentBreakdownService->addEmployeeSalaryPaymentBreakdown();
                }
                
                
                
                $total_salary_amount = $total_basic_salary+$total_allowance_salary+$total_bonus_salary;
                $total_salary_deduction = $epfDeduction + $etfDeduction + $taxDeduction;
                $net_salary_amount  = $total_salary_amount - $total_salary_deduction;
                
                $objEmployeeSalaryPaymentEntity = new Base_Model_ObtorLib_App_Core_Employee_Entity_EmployeeSalaryPayment();
                $objEmployeeSalaryPaymentEntity->setId($employeeSalaryPaymentId);
                $objEmployeeSalaryPaymentEntity->setGrossSalaryAmount($total_salary_amount);
                $objEmployeeSalaryPaymentEntity->setTotalDeduction($total_salary_deduction);
                $objEmployeeSalaryPaymentEntity->setNetSalaryAmount($net_salary_amount);
                $objEmployeeSalaryPaymentService->employeeSalaryPayment = $objEmployeeSalaryPaymentEntity;
                $recUpdated = $objEmployeeSalaryPaymentService->updateEmployeeSalaryPaymentFinalAmount();
                
                print("Record updated for staff id - ".$employeeId);
                print("\n");
                
             }
             
            
        } catch (Exception $ex) {
            throw new Base_Model_ObtorLib_App_Core_Employee_Exception($ex);
        }
    }
    
}