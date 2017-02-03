<?php
/**
 * Created by PhpStorm.
 * Employee: ism-apac
 * Date: 8/7/14
 * Time: 3:26 PM
 */

class Base_Model_ObtorLib_App_Core_Employee_Dao_EmployeeSalary extends Zend_Db_Table_Abstract {

    //put your code here
    public $employeeSalary;
    protected $_name = 'tbl_employee_salary';

    /*
     * Get a user employee using id
     * @return      : Entity EmployeeSalary Object (Base_Model_ObtorLib_App_Core_Employee_Entity_EmployeeSalary)
     */

    public function getEmployeeSalary($id) {
        try {
            $id = (int) $id;
            $row = $this->fetchRow('id = ' . $id);
            if ($row) {
                $result = $row->toArray();
                $objEmployeeSalary = new Base_Model_ObtorLib_App_Core_Employee_Entity_EmployeeSalary();
                $objEmployeeSalary->setId($result['id']);
                $objEmployeeSalary->setSalaryAmount($result['salary_amount']);
                $objEmployeeSalary->setSalaryType($result['salary_type']);
                $objEmployeeSalary->setEffectiveFrom($result['effective_from']);
                $objEmployeeSalary->setRemarks($result['remarks']);
                $objEmployeeSalary->setAddedOn($result['added_on']);
                $objEmployeeSalary->setAddedBy($result['added_by']);
                $objEmployeeSalary->setUpdatedOn($result['updated_on']);
                $objEmployeeSalary->setUpdatedBy($result['updated_by']);
                $objEmployeeSalary->setEmployeeId($result['tbl_employee_id']);
                $objEmployeeSalary->setStatus($result['status']);
                return $objEmployeeSalary;
            } else {
                return null;
            }
        } catch (Exception $ex) {
            throw new Base_Model_ObtorLib_App_Core_Employee_Exception($ex);
        }
    }


    /*
     * Add new user addEmployeeSalary
     * @return      : Integer ID / Null
     */

    public function addEmployeeSalary() {
        try {
            if (!($this->employeeSalary instanceof Base_Model_ObtorLib_App_Core_Employee_Entity_EmployeeSalary)) {
                throw new Base_Model_ObtorLib_App_Core_Employee_Exception(" EmployeeSalary Entity not initialized");
            } else {
                $data = array('salary_amount' => $this->employeeSalary->getSalaryAmount(),
                'salary_type' => $this->employeeSalary->getSalaryType(),
                'effective_from' => $this->employeeSalary->getEffectiveFrom(),
                'remarks' => $this->employeeSalary->getRemarks(),
                'added_on' => $this->employeeSalary->getAddedOn(),
                'added_by' => $this->employeeSalary->getAddedBy(),
                'updated_on' => $this->employeeSalary->getUpdatedOn(),
                'updated_by' => $this->employeeSalary->getUpdatedBy(),
                'tbl_employee_id'=> $this->employeeSalary->getEmployeeId(),
                'status'=>$this->employeeSalary->getStatus());
                
                $last_inserted_id = $this->insert($data);
                return $last_inserted_id;
            }
        } catch (Exception $ex) {
            throw new Base_Model_ObtorLib_App_Core_Employee_Exception($ex);
        }
    }

    /*
     * Update user employee working time..
     * @return      : Boolean true/false
     */

    public function updateEmployeeSalary() {
        try {
            if (!($this->employeeSalary instanceof Base_Model_ObtorLib_App_Core_Employee_Entity_EmployeeSalary)) {
                throw new Base_Model_ObtorLib_App_Core_Employee_Exception(" EmployeeSalary Entity not initialized");
            } else {
               $data = array('salary_amount' => $this->employeeSalary->getSalaryAmount(),
                'salary_type' => $this->employeeSalary->getSalaryType(),
                'effective_from' => $this->employeeSalary->getEffectiveFrom(),
                'remarks' => $this->employeeSalary->getRemarks(),
                'updated_on' => $this->employeeSalary->getUpdatedOn(),
                'updated_by' => $this->employeeSalary->getUpdatedBy(),
                'tbl_employee_id'=> $this->employeeSalary->getEmployeeId(),
                'status'=>$this->employeeSalary->getStatus());
                return $this->update($data, 'id = ' . (int) $this->employeeSalary->getId());
            }
        } catch (Exception $ex) {
            throw new Base_Model_ObtorLib_App_Core_Employee_Exception($ex);
        }
    }

    /*
     * Delete user employee working time...
     * @return      : Integer ID / Null
     */

    public function deleteEmployeeSalary() {
        try {
            if (!($this->employeeSalary instanceof Base_Model_ObtorLib_App_Core_Employee_Entity_EmployeeSalary)) {
                throw new Base_Model_ObtorLib_App_Core_Employee_Exception(" EmployeeSalary Entity not initialized");
            } else {
                return $this->delete('id =' . (int) $this->employeeSalary->getId());
            }
        } catch (Exception $ex) {
            throw new Base_Model_ObtorLib_App_Core_Employee_Exception($ex);
        }
    }

    /*
     * Search user employees....
     * @return : Array of Employees Entities...
     */

    public function search() {
        try {
           if (!($this->employeeSalary instanceof Base_Model_ObtorLib_App_Core_Employee_Entity_EmployeeSalary)) {
                throw new Base_Model_ObtorLib_App_Core_Employee_Exception(" EmployeeSalary Entity not initialized");
            } else {
                $arrWhere = array();
                $arrEmployeeSalary = array();

                $employeeId = $this->employeeSalary->getEmployeeId();
                
                $employeeSalSql = "SELECT id FROM tbl_employee_salary ";
               
                
                if ($employeeId) {
                    array_push($arrWhere, "tbl_employee_id = '" . $employeeId . "'");
                }

                if (count($arrWhere) > 0) {
                    $employeeSalSql.= "WHERE " . implode(' AND ',$arrWhere);
                }


                $db = Zend_Db_Table_Abstract::getDefaultAdapter();
                $result = $db->fetchCol($employeeSalSql);
                foreach ($result as $empId) {
                    $employeeInfo = $this->getEmployeeSalary($empId);
                    array_push($arrEmployeeSalary, $employeeInfo);
                }
                return $arrEmployeeSalary;
            }
        } catch (Exception $ex) {
            throw new Base_Model_ObtorLib_App_Core_Employee_Exception($ex);
        }
    }



    /*
     * Search user employees....
     * @return : Array of Employees Entities...
     */

    public function searchCount() {
        try {
            if (!($this->employeeSalary instanceof Base_Model_ObtorLib_App_Core_Employee_Entity_EmployeeSalary)) {
                throw new Base_Model_ObtorLib_App_Core_Employee_Exception(" EmployeeSalary Entity not initialized");
            } else {
                $arrWhere = array();
                $total_number = 0;

                $employeeId = $this->employeeSalary->getEmployeeId();

                $employeeSalSql = "SELECT count(id) as tot FROM tbl_employee_salary ";


                if ($employeeId) {
                    array_push($arrWhere, "tbl_employee_id = '" . $employeeId . "'");
                }

                if (count($arrWhere) > 0) {
                    $employeeSalSql.= "WHERE " . implode(' AND ',$arrWhere);
                }


                $db = Zend_Db_Table_Abstract::getDefaultAdapter();
                $result 	= $db->fetchRow($employeeSalSql);
                $total_number = $result['tot'];
                return $total_number;
            }
        } catch (Exception $ex) {
            throw new Base_Model_ObtorLib_App_Core_Employee_Exception($ex);
        }
    }
     
}