<?php
/**
 * Created by PhpStorm.
 * Employee: ism-apac
 * Date: 8/7/14
 * Time: 3:26 PM
 */

class Base_Model_ObtorLib_App_Core_Employee_Dao_Employee extends Zend_Db_Table_Abstract {

    //put your code here
    public $employee;
    protected $_name = 'tbl_employee';

    /*
     * Get a user employee using id
     * @return      : Entity Employee Object (Base_Model_ObtorLib_App_Core_Employee_Entity_Employee)
     */

    public function getEmployee($id) {
        try {
            $id = (int) $id;
            $row = $this->fetchRow('id = ' . $id);
            if ($row) {
                $employeeRow = $row->toArray();
                $employeeEntity = new Base_Model_ObtorLib_App_Core_Employee_Entity_Employee();
                $employeeEntity->setId($employeeRow['id']);
                $employeeEntity->setEmployeeNumber($employeeRow['employee_number']);
                $employeeEntity->setFullName($employeeRow['full_name']);
                $employeeEntity->setNameWithInitials($employeeRow['name_with_initials']);
                $employeeEntity->setGender($employeeRow['gender']);
                $employeeEntity->setDateOfBirth($employeeRow['date_of_birth']);
                $employeeEntity->setCountry($employeeRow['country']);
                $employeeEntity->setRegion($employeeRow['region']);
                $employeeEntity->setBranch($employeeRow['branch']);
                $employeeEntity->setDepartment($employeeRow['department']);
                $employeeEntity->setNationalIdentityCardNo($employeeRow['national_identity_card_no']);
                $employeeEntity->setDrivingLicenseNo($employeeRow['driving_license_no']);
                $employeeEntity->setTelephoneNumberResidence($employeeRow['telephone_number_residence']);
                $employeeEntity->setTelephoneNumberMobile($employeeRow['telephone_number_mobile']);
                $employeeEntity->setEMailAddressPersonal($employeeRow['e_mail_address_personal']);
                $employeeEntity->setEMailAddressOffice($employeeRow['e_mail_address_office']);
                $employeeEntity->setJoinedDate($employeeRow['joined_date']);
                $employeeEntity->setDesignation($employeeRow['designation']);
                $employeeEntity->setContractStatus($employeeRow['contract_status']);
                $employeeEntity->setEmployeeType($employeeRow['employee_type']);
                $employeeEntity->setEmployeeStatus($employeeRow['employee_status']);
                $employeeEntity->setStaffIdStatus($employeeRow['staff_id_status']);
                $employeeEntity->setStaffIdIssueDate($employeeRow['staff_id_issue_date']);
                $employeeEntity->setEpfEtfNumber($employeeRow['epf_etf_number']);
                $employeeEntity->setEpfEtfNumberJoinedDate($employeeRow['epf_etf_number_joined_date']);
                $employeeEntity->setPermanentAddressAddress($employeeRow['permanent_address_address']);
                $employeeEntity->setPermanentAddressStreet($employeeRow['permanent_address_street']);
                $employeeEntity->setPermanentAddressCity($employeeRow['permanent_address_city']);
                $employeeEntity->setPermanentAddressState($employeeRow['permanent_address_state']);
                $employeeEntity->setPermanentAddressZip($employeeRow['permanent_address_zip']);
                $employeeEntity->setPermanentAddressCountry($employeeRow['permanent_address_country']);
                $employeeEntity->setResidentialAddressAddress($employeeRow['residential_address_address']);
                $employeeEntity->setResidentialAddressStreet($employeeRow['residential_address_street']);
                $employeeEntity->setResidentialAddressCity($employeeRow['residential_address_city']);
                $employeeEntity->setResidentialAddressState($employeeRow['residential_address_state']);
                $employeeEntity->setResidentialAddressZip($employeeRow['residential_address_zip']);
                $employeeEntity->setResidentialAddressCountry($employeeRow['residential_address_country']);
                $employeeEntity->setEmergencyContactName($employeeRow['emergency_contact_name']);
                $employeeEntity->setEmergencyContactRelationship($employeeRow['emergency_contact_relationship']);
                $employeeEntity->setEmergencyContactEmailAddress($employeeRow['emergency_contact_email_address']);
                $employeeEntity->setEmergencyContactTelephoneNumberResidence($employeeRow['emergency_contact_telephone_number_residence']);
                $employeeEntity->setEmergencyContactTelephoneNumberMobile($employeeRow['emergency_contact_telephone_number_mobile']);
                $employeeEntity->setEmergencyContactAddress($employeeRow['emergency_contact_address_country']);
                $employeeEntity->setEmergencyContactAddressStreet($employeeRow['emergency_contact_address']);
                $employeeEntity->setEmergencyContactAddressCity($employeeRow['emergency_contact_address_street']);
                $employeeEntity->setEmergencyContactAddressState($employeeRow['emergency_contact_address_city']);
                $employeeEntity->setEmergencyContactAddressZip($employeeRow['emergency_contact_address_state']);
                $employeeEntity->setEmergencyContactAddressCountry($employeeRow['emergency_contact_address_zip']);
                $employeeEntity->setProfileImage($employeeRow['profile_image']);
                $employeeEntity->setTeamLeader($employeeRow['team_leader']);
                return $employeeEntity;
            } else {
                return null;
            }
        } catch (Exception $ex) {
            throw new Base_Model_ObtorLib_App_Core_Employee_Exception($ex);
        }
    }


    /*
     * Add new user employee
     * @return      : Integer ID / Null
     */

    public function addEmployee() {
        try {
            if (!($this->employee instanceof Base_Model_ObtorLib_App_Core_Employee_Entity_Employee)) {
                throw new Base_Model_ObtorLib_App_Core_Employee_Exception(" Employee Entity not initialized");
            } else {
                $data = array(
                    'employee_number' => $this->employee->getEmployeeNumber(),
                    'full_name' => $this->employee->getFullName(),
                    'name_with_initials' => $this->employee->getNameWithInitials(),
                    'gender' => $this->employee->getGender(),
                    'date_of_birth' => $this->employee->getDateOfBirth(),
                    'country' => $this->employee->getCountry(),
                    'region' => $this->employee->getRegion(),
                    'branch' => $this->employee->getBranch(),
                    'department' => $this->employee->getDepartment(),
                    'national_identity_card_no' => $this->employee->getNationalIdentityCardNo(),
                    'driving_license_no' => $this->employee->getDrivingLicenseNo(),
                    'telephone_number_residence' => $this->employee->getTelephoneNumberResidence(),
                    'telephone_number_mobile' => $this->employee->getTelephoneNumberMobile(),
                    'e_mail_address_personal' => $this->employee->getEMailAddressPersonal(),
                    'e_mail_address_office' => $this->employee->getEMailAddressOffice(),
                    'joined_date' => $this->employee->getJoinedDate(),
                    'designation' => $this->employee->getDesignation(),
                    'contract_status' => $this->employee->getContractStatus(),
                    'employee_type' => $this->employee->getEmployeeType(),
                    'employee_status' => $this->employee->getEmployeeStatus(),
                    'staff_id_status' => $this->employee->getStaffIdStatus(),
                    'staff_id_issue_date' => $this->employee->getStaffIdIssueDate(),
                    'epf_etf_number' => $this->employee->getEpfEtfNumber(),
                    'epf_etf_number_joined_date' => $this->employee->getEpfEtfNumberJoinedDate(),
                    'permanent_address_address' => $this->employee->getPermanentAddressAddress(),
                    'permanent_address_street' => $this->employee->getPermanentAddressStreet(),
                    'permanent_address_city' => $this->employee->getPermanentAddressCity(),
                    'permanent_address_state' => $this->employee->getPermanentAddressState(),
                    'permanent_address_zip' => $this->employee->getPermanentAddressZip(),
                    'permanent_address_country' => $this->employee->getPermanentAddressCountry(),
                    'residential_address_address' => $this->employee->getResidentialAddressAddress(),
                    'residential_address_street' => $this->employee->getResidentialAddressStreet(),
                    'residential_address_city' => $this->employee->getResidentialAddressCity(),
                    'residential_address_state' => $this->employee->getResidentialAddressState(),
                    'residential_address_zip' => $this->employee->getResidentialAddressZip(),
                    'residential_address_country' => $this->employee->getResidentialAddressCountry(),
                    'emergency_contact_name' => $this->employee->getEmergencyContactName(),
                    'emergency_contact_relationship' => $this->employee->getEmergencyContactRelationship(),
                    'emergency_contact_email_address' => $this->employee->getEmergencyContactEmailAddress(),
                    'emergency_contact_telephone_number_residence' => $this->employee->getEmergencyContactTelephoneNumberResidence(),
                    'emergency_contact_telephone_number_mobile' => $this->employee->getEmergencyContactTelephoneNumberMobile(),
                    'emergency_contact_address_country' => $this->employee->getEmergencyContactAddressCountry(),
                    'emergency_contact_address' => $this->employee->getEmergencyContactAddress(),
                    'emergency_contact_address_street' => $this->employee->getEmergencyContactAddressStreet(),
                    'emergency_contact_address_city' => $this->employee->getEmergencyContactAddressCity(),
                    'emergency_contact_address_state' => $this->employee->getEmergencyContactAddressState(),
                    'emergency_contact_address_zip' => $this->employee->getEmergencyContactAddressZip(),
                    'team_leader'=> $this->employee->getTeamLeader());
                $last_inserted_id = $this->insert($data);
                return $last_inserted_id;
            }
        } catch (Exception $ex) {
            throw new Base_Model_ObtorLib_App_Core_Employee_Exception($ex);
        }
    }

    /*
     * Update user employee
     * @return      : Boolean true/false
     */

    public function updateEmployee() {
        try {
            if (!($this->employee instanceof Base_Model_ObtorLib_App_Core_Employee_Entity_Employee)) {
                throw new Base_Model_ObtorLib_App_Core_Employee_Exception(" Employee Entity not initialized");
            } else {
                $data = array(
                    'employee_number' => $this->employee->getEmployeeNumber(),
                    'full_name' => $this->employee->getFullName(),
                    'name_with_initials' => $this->employee->getNameWithInitials(),
                    'gender' => $this->employee->getGender(),
                    'date_of_birth' => $this->employee->getDateOfBirth(),
                    'country' => $this->employee->getCountry(),
                    'region' => $this->employee->getRegion(),
                    'branch' => $this->employee->getBranch(),
                    'department' => $this->employee->getDepartment(),
                    'national_identity_card_no' => $this->employee->getNationalIdentityCardNo(),
                    'driving_license_no' => $this->employee->getDrivingLicenseNo(),
                    'telephone_number_residence' => $this->employee->getTelephoneNumberResidence(),
                    'telephone_number_mobile' => $this->employee->getTelephoneNumberMobile(),
                    'e_mail_address_personal' => $this->employee->getEMailAddressPersonal(),
                    'e_mail_address_office' => $this->employee->getEMailAddressOffice(),
                    'joined_date' => $this->employee->getJoinedDate(),
                    'designation' => $this->employee->getDesignation(),
                    'contract_status' => $this->employee->getContractStatus(),
                    'employee_type' => $this->employee->getEmployeeType(),
                    'employee_status' => $this->employee->getEmployeeStatus(),
                    'staff_id_status' => $this->employee->getStaffIdStatus(),
                    'staff_id_issue_date' => $this->employee->getStaffIdIssueDate(),
                    'epf_etf_number' => $this->employee->getEpfEtfNumber(),
                    'epf_etf_number_joined_date' => $this->employee->getEpfEtfNumberJoinedDate(),
                    'permanent_address_address' => $this->employee->getPermanentAddressAddress(),
                    'permanent_address_street' => $this->employee->getPermanentAddressStreet(),
                    'permanent_address_city' => $this->employee->getPermanentAddressCity(),
                    'permanent_address_state' => $this->employee->getPermanentAddressState(),
                    'permanent_address_zip' => $this->employee->getPermanentAddressZip(),
                    'permanent_address_country' => $this->employee->getPermanentAddressCountry(),
                    'residential_address_address' => $this->employee->getResidentialAddressAddress(),
                    'residential_address_street' => $this->employee->getResidentialAddressStreet(),
                    'residential_address_city' => $this->employee->getResidentialAddressCity(),
                    'residential_address_state' => $this->employee->getResidentialAddressState(),
                    'residential_address_zip' => $this->employee->getResidentialAddressZip(),
                    'residential_address_country' => $this->employee->getResidentialAddressCountry(),
                    'emergency_contact_name' => $this->employee->getEmergencyContactName(),
                    'emergency_contact_relationship' => $this->employee->getEmergencyContactRelationship(),
                    'emergency_contact_email_address' => $this->employee->getEmergencyContactEmailAddress(),
                    'emergency_contact_telephone_number_residence' => $this->employee->getEmergencyContactTelephoneNumberResidence(),
                    'emergency_contact_telephone_number_mobile' => $this->employee->getEmergencyContactTelephoneNumberMobile(),
                    'emergency_contact_address_country' => $this->employee->getEmergencyContactAddressCountry(),
                    'emergency_contact_address' => $this->employee->getEmergencyContactAddress(),
                    'emergency_contact_address_street' => $this->employee->getEmergencyContactAddressStreet(),
                    'emergency_contact_address_city' => $this->employee->getEmergencyContactAddressCity(),
                    'emergency_contact_address_state' => $this->employee->getEmergencyContactAddressState(),
                    'emergency_contact_address_zip' => $this->employee->getEmergencyContactAddressZip(),
                    'team_leader'=> $this->employee->getTeamLeader());
                return $this->update($data, 'id = ' . (int) $this->employee->getId());
            }
        } catch (Exception $ex) {
            throw new Base_Model_ObtorLib_App_Core_Employee_Exception($ex);
        }
    }

    /*
     * Delete user employee
     * @return      : Integer ID / Null
     */

    public function deleteEmployee() {
        try {
            if (!($this->employee instanceof Base_Model_ObtorLib_App_Core_Employee_Entity_Employee)) {
                throw new Base_Model_ObtorLib_App_Core_Employee_Exception(" Employee Entity not initialized");
            } else {
                return $this->delete('id =' . (int) $this->employee->getId());
            }
        } catch (Exception $ex) {
            throw new Base_Model_ObtorLib_App_Core_Employee_Exception($ex);
        }
    }

    /*
     * Search user employees....
     * @return : Array of Employees Entities...
     */

    public function search($limit) {
        try {
            if (!($this->employee instanceof Base_Model_ObtorLib_App_Core_Employee_Entity_Employee)) {
                throw new Base_Model_ObtorLib_App_Core_Employee_Exception(" Employee Entity not initialized");
            } else {
                $arrWhere = array();
                $arrEmployees = array();
                
                $employee_number            = $this->employee->getEmployeeNumber();
                $full_name                  = $this->employee->getFullName();
                $date_of_birth              = $this->employee->getDateOfBirth();
                $nic_number                 = $this->employee->getNationalIdentityCardNo();
                $driving_license_no         = $this->employee->getDrivingLicenseNo();
                $telephone_number_residence = $this->employee->getTelephoneNumberResidence();
                $contact_number             = $this->employee->getTelephoneNumberMobile();
                $email_address_personal     = $this->employee->getEMailAddressPersonal();
                $email_address_office       = $this->employee->getEMailAddressOffice();
                $country                    = $this->employee->getCountry();
                $region                     = $this->employee->getRegion();
                $branch                     = $this->employee->getBranch();
                $department                 = $this->employee->getDepartment();
                $employeeStatus             = $this->employee->getEmployeeStatus();
                $employee_type              = $this->employee->getEmployeeType();
                
                $employeeSql = "SELECT id FROM tbl_employee ";
                if ($employee_number) {
                    array_push($arrWhere, "employee_number = '" . $employee_number . "'");
                }
                
                
                if ($full_name) {
                    array_push($arrWhere, "full_name LIKE '" . $full_name . "'");
                }
                
                if ($date_of_birth) {
                    array_push($arrWhere, "date_of_birth = '" . $date_of_birth . "'");
                }
                
                if ($nic_number) {
                    array_push($arrWhere, "national_identity_card_no = '" . $nic_number . "'");
                }
                
                if ($driving_license_no) {
                    array_push($arrWhere, "driving_license_no = '" . $driving_license_no . "'");
                }
                
                if ($telephone_number_residence) {
                    array_push($arrWhere, "telephone_number_residence = '" . $telephone_number_residence . "'");
                }
                
                if ($contact_number) {
                    array_push($arrWhere, "telephone_number_mobile = '" . $contact_number . "'");
                }
                
                if ($email_address_personal) {
                    array_push($arrWhere, "e_mail_address_personal = '" . $email_address_personal . "'");
                }
                
                if ($email_address_office) {
                    array_push($arrWhere, "e_mail_address_office = '" . $email_address_office . "'");
                }
                
                if ($employeeStatus) {
                    array_push($arrWhere, "employee_status = '" . $employeeStatus . "'");
                }
                
                 if ($employee_type) {
                    array_push($arrWhere, "employee_type = '" . $employee_type . "'");
                }
                
                if ($country) {
                    array_push($arrWhere, "country = '" . $country . "'");
                }
                
                if ($region) {
                    array_push($arrWhere, "region = '" . $region . "'");
                }
                
                if ($branch) {
                    array_push($arrWhere, "branch = '" . $branch . "'");
                }
                
                if ($department) {
                    array_push($arrWhere, "department = '" . $department . "'");
                }
                
                

                if (count($arrWhere) > 0) {
                    $employeeSql.= "WHERE " . implode(' AND ',$arrWhere);
                }
                
                $employeeSql = $employeeSql." ORDER BY id DESC";
                if(!is_null($limit)){
                    $employeeSql = $employeeSql.$limit;
                }

                $db = Zend_Db_Table_Abstract::getDefaultAdapter();
                $result = $db->fetchCol($employeeSql);
                foreach ($result as $employeeId) {
                    $employeeInfo = $this->getEmployee($employeeId);
                    array_push($arrEmployees, $employeeInfo);
                }
                return $arrEmployees;
            }
        } catch (Exception $ex) {
            throw new Base_Model_ObtorLib_App_Core_Employee_Exception($ex);
        }
    }
    
    
    
    /*
     * count employees....
     * @return : Array of Employees Entities...
     */

    public function searchCount() {
        try {
            if (!($this->employee instanceof Base_Model_ObtorLib_App_Core_Employee_Entity_Employee)) {
                throw new Base_Model_ObtorLib_App_Core_Employee_Exception(" Employee Entity not initialized");
            } else {
                $arrWhere = array();
                $arrEmployees = array();
                
                
                
                $employee_number            = $this->employee->getEmployeeNumber();
                $full_name                  = $this->employee->getFullName();
                $date_of_birth              = $this->employee->getDateOfBirth();
                $nic_number                 = $this->employee->getNationalIdentityCardNo();
                $driving_license_no         = $this->employee->getDrivingLicenseNo();
                $telephone_number_residence = $this->employee->getTelephoneNumberResidence();
                $contact_number             = $this->employee->getTelephoneNumberMobile();
                $email_address_personal     = $this->employee->getEMailAddressPersonal();
                $email_address_office       = $this->employee->getEMailAddressOffice();
                $country                    = $this->employee->getCountry();
                $region                     = $this->employee->getRegion();
                $branch                     = $this->employee->getBranch();
                $department                 = $this->employee->getDepartment();
                $employeeStatus             = $this->employee->getEmployeeStatus();
                $employee_type              = $this->employee->getEmployeeType();
                
                $employeeSql = "SELECT count(id) as tot FROM tbl_employee ";
                if ($employee_number) {
                    array_push($arrWhere, "employee_number = '" . $employee_number . "'");
                }
                
                
                if ($full_name) {
                    array_push($arrWhere, "full_name LIKE '" . $full_name . "'");
                }
                
                if ($date_of_birth) {
                    array_push($arrWhere, "date_of_birth = '" . $date_of_birth . "'");
                }
                
                if ($nic_number) {
                    array_push($arrWhere, "national_identity_card_no = '" . $nic_number . "'");
                }
                
                if ($driving_license_no) {
                    array_push($arrWhere, "driving_license_no = '" . $driving_license_no . "'");
                }
                
                if ($telephone_number_residence) {
                    array_push($arrWhere, "telephone_number_residence = '" . $telephone_number_residence . "'");
                }
                
                if ($contact_number) {
                    array_push($arrWhere, "telephone_number_mobile = '" . $contact_number . "'");
                }
                
                if ($email_address_personal) {
                    array_push($arrWhere, "e_mail_address_personal = '" . $email_address_personal . "'");
                }
                
                if ($email_address_office) {
                    array_push($arrWhere, "e_mail_address_office = '" . $email_address_office . "'");
                }
                
                if ($employeeStatus) {
                    array_push($arrWhere, "employee_status = '" . $employeeStatus . "'");
                }
                
                if ($employee_type) {
                    array_push($arrWhere, "employee_type = '" . $employee_type . "'");
                }
                
                if ($country) {
                    array_push($arrWhere, "country = '" . $country . "'");
                }
                
                if ($region) {
                    array_push($arrWhere, "region = '" . $region . "'");
                }
                
                if ($branch) {
                    array_push($arrWhere, "branch = '" . $branch . "'");
                }
                
                if ($department) {
                    array_push($arrWhere, "department = '" . $department . "'");
                }

                if (count($arrWhere) > 0) {
                    $employeeSql.= "WHERE " . implode(' AND ',$arrWhere);
                }

                $db = Zend_Db_Table_Abstract::getDefaultAdapter();
                $result 	= $db->fetchRow($employeeSql);
                $total_number = $result['tot']; 
                return $total_number;
            }
        } catch (Exception $ex) {
            throw new Base_Model_ObtorLib_App_Core_Employee_Exception($ex);
        }
    }

    
    /*
     * Update user employee
     * @return      : Boolean true/false
     */

    public function uploadImage() {
        try {
            if (!($this->employee instanceof Base_Model_ObtorLib_App_Core_Employee_Entity_Employee)) {
                throw new Base_Model_ObtorLib_App_Core_Employee_Exception(" Employee Entity not initialized");
            } else {
                $data = array('profile_image' => $this->employee->getProfileImage());
                return $this->update($data, 'id = ' . (int) $this->employee->getId());
            }
        } catch (Exception $ex) {
            throw new Base_Model_ObtorLib_App_Core_Employee_Exception($ex);
        }
    }
    
    
     /*
     * Update user employee
     * @return      : Boolean true/false
     */

    public function updatePassword() {
        try {
            if (!($this->employee instanceof Base_Model_ObtorLib_App_Core_Employee_Entity_Employee)) {
                throw new Base_Model_ObtorLib_App_Core_Employee_Exception(" Employee Entity not initialized");
            } else {
                $data = array('login_password' => $this->employee->getPassword());
                return $this->update($data, 'id = ' . (int) $this->employee->getId());
            }
        } catch (Exception $ex) {
            throw new Base_Model_ObtorLib_App_Core_Employee_Exception($ex);
        }
    }
    
    
        /*
     * Update password
     * @return      : Boolean true/false
     */

    public function generatePassword() {
        try {
            if (!($this->employee instanceof Base_Model_ObtorLib_App_Core_Employee_Entity_Employee)) {
                throw new Base_Model_ObtorLib_App_Core_Employee_Exception(" Employee Entity not initialized");
            } else {
                $data = array(
                    'login_password' => $this->employee->getPassword(),
                    'password-key' => $this->employee->getPasswordKey());
                return $this->update($data, 'id = ' . (int) $this->employee->getId());
            }
        } catch (Exception $ex) {
            throw new Base_Model_ObtorLib_App_Core_Employee_Exception($ex);
        }
    }
    
    
    // do login ...
        public function doLogin() {
        try {
            if (!($this->employee instanceof Base_Model_ObtorLib_App_Core_Employee_Entity_Employee)) {
                throw new Base_Model_ObtorLib_App_Core_Employee_Exception(" Employee Entity not initialized");
            } else {

                $employeeEmail = $this->employee->getEMailAddressOffice();
                $employeePassword = $this->employee->getPassword();
                
                $employeeSql = "SELECT id FROM tbl_employee WHERE e_mail_address_office = '".$employeeEmail."' AND login_password = '".$employeePassword."' AND employee_status = 'In-Service'";
                
                $db = Zend_Db_Table_Abstract::getDefaultAdapter();
                $result = $db->fetchCol($employeeSql);
                if($result){
                    foreach ($result as $employeeId) {
                        $employeeInfo = $this->getEmployee($employeeId);
                        return $employeeInfo;
                    }
                }
                return null;
       
            }
        } catch (Exception $ex) {
            throw new Base_Model_ObtorLib_App_Core_User_Exception($ex);
        }
    }
    
    
}