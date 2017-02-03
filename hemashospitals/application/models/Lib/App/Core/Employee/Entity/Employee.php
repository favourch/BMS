<?php
/**
 * Created by PhpStorm.
 * User: ism-apac
 * Date: 8/7/14
 * Time: 3:26 PM
 */

class Base_Model_Lib_App_Core_Employee_Entity_Employee {

    private $id;
    private $employee_number;
    private $full_name;
    private $name_with_initials;
    private $gender;
    private $date_of_birth;
    private $country;
    private $region;
    private $branch;
    private $department;
    private $national_identity_card_no;
    private $driving_license_no;
    private $telephone_number_residence;
    private $telephone_number_mobile;
    private $e_mail_address_personal;
    private $e_mail_address_office;
    private $joined_date;
    private $designation;
    private $contract_status;
    private $employee_type;
    private $employee_status;
    private $staff_id_status;
    private $staff_id_issue_date;
    private $epf_etf_number;
    private $epf_etf_number_joined_date;
    private $permanent_address_address;
    private $permanent_address_street;
    private $permanent_address_city;
    private $permanent_address_state;
    private $permanent_address_zip;
    private $permanent_address_country;
    private $residential_address_address;
    private $residential_address_street;
    private $residential_address_city;
    private $residential_address_state;
    private $residential_address_zip;
    private $residential_address_country;
    private $emergency_contact_name;
    private $emergency_contact_relationship;
    private $emergency_contact_email_address;
    private $emergency_contact_telephone_number_residence;
    private $emergency_contact_telephone_number_mobile;
    private $emergency_contact_address_country;
    private $emergency_contact_address;
    private $emergency_contact_address_street;
    private $emergency_contact_address_city;
    private $emergency_contact_address_state;
    private $emergency_contact_address_zip;

    /**
     * @param mixed $branch
     */
    public function setBranch($branch)
    {
        $this->branch = $branch;
    }

    /**
     * @return mixed
     */
    public function getBranch()
    {
        return $this->branch;
    }

    /**
     * @param mixed $contract_status
     */
    public function setContractStatus($contract_status)
    {
        $this->contract_status = $contract_status;
    }

    /**
     * @return mixed
     */
    public function getContractStatus()
    {
        return $this->contract_status;
    }

    /**
     * @param mixed $country
     */
    public function setCountry($country)
    {
        $this->country = $country;
    }

    /**
     * @return mixed
     */
    public function getCountry()
    {
        return $this->country;
    }

    /**
     * @param mixed $date_of_birth
     */
    public function setDateOfBirth($date_of_birth)
    {
        $this->date_of_birth = $date_of_birth;
    }

    /**
     * @return mixed
     */
    public function getDateOfBirth()
    {
        return $this->date_of_birth;
    }

    /**
     * @param mixed $department
     */
    public function setDepartment($department)
    {
        $this->department = $department;
    }

    /**
     * @return mixed
     */
    public function getDepartment()
    {
        return $this->department;
    }

    /**
     * @param mixed $designation
     */
    public function setDesignation($designation)
    {
        $this->designation = $designation;
    }

    /**
     * @return mixed
     */
    public function getDesignation()
    {
        return $this->designation;
    }

    /**
     * @param mixed $driving_license_no
     */
    public function setDrivingLicenseNo($driving_license_no)
    {
        $this->driving_license_no = $driving_license_no;
    }

    /**
     * @return mixed
     */
    public function getDrivingLicenseNo()
    {
        return $this->driving_license_no;
    }

    /**
     * @param mixed $e_mail_address_office
     */
    public function setEMailAddressOffice($e_mail_address_office)
    {
        $this->e_mail_address_office = $e_mail_address_office;
    }

    /**
     * @return mixed
     */
    public function getEMailAddressOffice()
    {
        return $this->e_mail_address_office;
    }

    /**
     * @param mixed $e_mail_address_personal
     */
    public function setEMailAddressPersonal($e_mail_address_personal)
    {
        $this->e_mail_address_personal = $e_mail_address_personal;
    }

    /**
     * @return mixed
     */
    public function getEMailAddressPersonal()
    {
        return $this->e_mail_address_personal;
    }

    /**
     * @param mixed $emergency_contact_address
     */
    public function setEmergencyContactAddress($emergency_contact_address)
    {
        $this->emergency_contact_address = $emergency_contact_address;
    }

    /**
     * @return mixed
     */
    public function getEmergencyContactAddress()
    {
        return $this->emergency_contact_address;
    }

    /**
     * @param mixed $emergency_contact_address_city
     */
    public function setEmergencyContactAddressCity($emergency_contact_address_city)
    {
        $this->emergency_contact_address_city = $emergency_contact_address_city;
    }

    /**
     * @return mixed
     */
    public function getEmergencyContactAddressCity()
    {
        return $this->emergency_contact_address_city;
    }

    /**
     * @param mixed $emergency_contact_address_country
     */
    public function setEmergencyContactAddressCountry($emergency_contact_address_country)
    {
        $this->emergency_contact_address_country = $emergency_contact_address_country;
    }

    /**
     * @return mixed
     */
    public function getEmergencyContactAddressCountry()
    {
        return $this->emergency_contact_address_country;
    }

    /**
     * @param mixed $emergency_contact_address_state
     */
    public function setEmergencyContactAddressState($emergency_contact_address_state)
    {
        $this->emergency_contact_address_state = $emergency_contact_address_state;
    }

    /**
     * @return mixed
     */
    public function getEmergencyContactAddressState()
    {
        return $this->emergency_contact_address_state;
    }

    /**
     * @param mixed $emergency_contact_address_street
     */
    public function setEmergencyContactAddressStreet($emergency_contact_address_street)
    {
        $this->emergency_contact_address_street = $emergency_contact_address_street;
    }

    /**
     * @return mixed
     */
    public function getEmergencyContactAddressStreet()
    {
        return $this->emergency_contact_address_street;
    }

    /**
     * @param mixed $emergency_contact_address_zip
     */
    public function setEmergencyContactAddressZip($emergency_contact_address_zip)
    {
        $this->emergency_contact_address_zip = $emergency_contact_address_zip;
    }

    /**
     * @return mixed
     */
    public function getEmergencyContactAddressZip()
    {
        return $this->emergency_contact_address_zip;
    }

    /**
     * @param mixed $emergency_contact_email_address
     */
    public function setEmergencyContactEmailAddress($emergency_contact_email_address)
    {
        $this->emergency_contact_email_address = $emergency_contact_email_address;
    }

    /**
     * @return mixed
     */
    public function getEmergencyContactEmailAddress()
    {
        return $this->emergency_contact_email_address;
    }

    /**
     * @param mixed $emergency_contact_name
     */
    public function setEmergencyContactName($emergency_contact_name)
    {
        $this->emergency_contact_name = $emergency_contact_name;
    }

    /**
     * @return mixed
     */
    public function getEmergencyContactName()
    {
        return $this->emergency_contact_name;
    }

    /**
     * @param mixed $emergency_contact_relationship
     */
    public function setEmergencyContactRelationship($emergency_contact_relationship)
    {
        $this->emergency_contact_relationship = $emergency_contact_relationship;
    }

    /**
     * @return mixed
     */
    public function getEmergencyContactRelationship()
    {
        return $this->emergency_contact_relationship;
    }

    /**
     * @param mixed $emergency_contact_telephone_number_mobile
     */
    public function setEmergencyContactTelephoneNumberMobile($emergency_contact_telephone_number_mobile)
    {
        $this->emergency_contact_telephone_number_mobile = $emergency_contact_telephone_number_mobile;
    }

    /**
     * @return mixed
     */
    public function getEmergencyContactTelephoneNumberMobile()
    {
        return $this->emergency_contact_telephone_number_mobile;
    }

    /**
     * @param mixed $emergency_contact_telephone_number_residence
     */
    public function setEmergencyContactTelephoneNumberResidence($emergency_contact_telephone_number_residence)
    {
        $this->emergency_contact_telephone_number_residence = $emergency_contact_telephone_number_residence;
    }

    /**
     * @return mixed
     */
    public function getEmergencyContactTelephoneNumberResidence()
    {
        return $this->emergency_contact_telephone_number_residence;
    }

    /**
     * @param mixed $employee_number
     */
    public function setEmployeeNumber($employee_number)
    {
        $this->employee_number = $employee_number;
    }

    /**
     * @return mixed
     */
    public function getEmployeeNumber()
    {
        return $this->employee_number;
    }

    /**
     * @param mixed $employee_status
     */
    public function setEmployeeStatus($employee_status)
    {
        $this->employee_status = $employee_status;
    }

    /**
     * @return mixed
     */
    public function getEmployeeStatus()
    {
        return $this->employee_status;
    }

    /**
     * @param mixed $employee_type
     */
    public function setEmployeeType($employee_type)
    {
        $this->employee_type = $employee_type;
    }

    /**
     * @return mixed
     */
    public function getEmployeeType()
    {
        return $this->employee_type;
    }

    /**
     * @param mixed $epf_etf_number
     */
    public function setEpfEtfNumber($epf_etf_number)
    {
        $this->epf_etf_number = $epf_etf_number;
    }

    /**
     * @return mixed
     */
    public function getEpfEtfNumber()
    {
        return $this->epf_etf_number;
    }

    /**
     * @param mixed $epf_etf_number_joined_date
     */
    public function setEpfEtfNumberJoinedDate($epf_etf_number_joined_date)
    {
        $this->epf_etf_number_joined_date = $epf_etf_number_joined_date;
    }

    /**
     * @return mixed
     */
    public function getEpfEtfNumberJoinedDate()
    {
        return $this->epf_etf_number_joined_date;
    }

    /**
     * @param mixed $full_name
     */
    public function setFullName($full_name)
    {
        $this->full_name = $full_name;
    }

    /**
     * @return mixed
     */
    public function getFullName()
    {
        return $this->full_name;
    }

    /**
     * @param mixed $gender
     */
    public function setGender($gender)
    {
        $this->gender = $gender;
    }

    /**
     * @return mixed
     */
    public function getGender()
    {
        return $this->gender;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $joined_date
     */
    public function setJoinedDate($joined_date)
    {
        $this->joined_date = $joined_date;
    }

    /**
     * @return mixed
     */
    public function getJoinedDate()
    {
        return $this->joined_date;
    }

    /**
     * @param mixed $name_with_initials
     */
    public function setNameWithInitials($name_with_initials)
    {
        $this->name_with_initials = $name_with_initials;
    }

    /**
     * @return mixed
     */
    public function getNameWithInitials()
    {
        return $this->name_with_initials;
    }

    /**
     * @param mixed $national_identity_card_no
     */
    public function setNationalIdentityCardNo($national_identity_card_no)
    {
        $this->national_identity_card_no = $national_identity_card_no;
    }

    /**
     * @return mixed
     */
    public function getNationalIdentityCardNo()
    {
        return $this->national_identity_card_no;
    }

    /**
     * @param mixed $permanent_address_address
     */
    public function setPermanentAddressAddress($permanent_address_address)
    {
        $this->permanent_address_address = $permanent_address_address;
    }

    /**
     * @return mixed
     */
    public function getPermanentAddressAddress()
    {
        return $this->permanent_address_address;
    }

    /**
     * @param mixed $permanent_address_city
     */
    public function setPermanentAddressCity($permanent_address_city)
    {
        $this->permanent_address_city = $permanent_address_city;
    }

    /**
     * @return mixed
     */
    public function getPermanentAddressCity()
    {
        return $this->permanent_address_city;
    }

    /**
     * @param mixed $permanent_address_country
     */
    public function setPermanentAddressCountry($permanent_address_country)
    {
        $this->permanent_address_country = $permanent_address_country;
    }

    /**
     * @return mixed
     */
    public function getPermanentAddressCountry()
    {
        return $this->permanent_address_country;
    }

    /**
     * @param mixed $permanent_address_state
     */
    public function setPermanentAddressState($permanent_address_state)
    {
        $this->permanent_address_state = $permanent_address_state;
    }

    /**
     * @return mixed
     */
    public function getPermanentAddressState()
    {
        return $this->permanent_address_state;
    }

    /**
     * @param mixed $permanent_address_street
     */
    public function setPermanentAddressStreet($permanent_address_street)
    {
        $this->permanent_address_street = $permanent_address_street;
    }

    /**
     * @return mixed
     */
    public function getPermanentAddressStreet()
    {
        return $this->permanent_address_street;
    }

    /**
     * @param mixed $permanent_address_zip
     */
    public function setPermanentAddressZip($permanent_address_zip)
    {
        $this->permanent_address_zip = $permanent_address_zip;
    }

    /**
     * @return mixed
     */
    public function getPermanentAddressZip()
    {
        return $this->permanent_address_zip;
    }

    /**
     * @param mixed $region
     */
    public function setRegion($region)
    {
        $this->region = $region;
    }

    /**
     * @return mixed
     */
    public function getRegion()
    {
        return $this->region;
    }

    /**
     * @param mixed $residential_address_address
     */
    public function setResidentialAddressAddress($residential_address_address)
    {
        $this->residential_address_address = $residential_address_address;
    }

    /**
     * @return mixed
     */
    public function getResidentialAddressAddress()
    {
        return $this->residential_address_address;
    }

    /**
     * @param mixed $residential_address_city
     */
    public function setResidentialAddressCity($residential_address_city)
    {
        $this->residential_address_city = $residential_address_city;
    }

    /**
     * @return mixed
     */
    public function getResidentialAddressCity()
    {
        return $this->residential_address_city;
    }

    /**
     * @param mixed $residential_address_country
     */
    public function setResidentialAddressCountry($residential_address_country)
    {
        $this->residential_address_country = $residential_address_country;
    }

    /**
     * @return mixed
     */
    public function getResidentialAddressCountry()
    {
        return $this->residential_address_country;
    }

    /**
     * @param mixed $residential_address_state
     */
    public function setResidentialAddressState($residential_address_state)
    {
        $this->residential_address_state = $residential_address_state;
    }

    /**
     * @return mixed
     */
    public function getResidentialAddressState()
    {
        return $this->residential_address_state;
    }

    /**
     * @param mixed $residential_address_street
     */
    public function setResidentialAddressStreet($residential_address_street)
    {
        $this->residential_address_street = $residential_address_street;
    }

    /**
     * @return mixed
     */
    public function getResidentialAddressStreet()
    {
        return $this->residential_address_street;
    }

    /**
     * @param mixed $residential_address_zip
     */
    public function setResidentialAddressZip($residential_address_zip)
    {
        $this->residential_address_zip = $residential_address_zip;
    }

    /**
     * @return mixed
     */
    public function getResidentialAddressZip()
    {
        return $this->residential_address_zip;
    }

    /**
     * @param mixed $staff_id_issue_date
     */
    public function setStaffIdIssueDate($staff_id_issue_date)
    {
        $this->staff_id_issue_date = $staff_id_issue_date;
    }

    /**
     * @return mixed
     */
    public function getStaffIdIssueDate()
    {
        return $this->staff_id_issue_date;
    }

    /**
     * @param mixed $staff_id_status
     */
    public function setStaffIdStatus($staff_id_status)
    {
        $this->staff_id_status = $staff_id_status;
    }

    /**
     * @return mixed
     */
    public function getStaffIdStatus()
    {
        return $this->staff_id_status;
    }

    /**
     * @param mixed $telephone_number_mobile
     */
    public function setTelephoneNumberMobile($telephone_number_mobile)
    {
        $this->telephone_number_mobile = $telephone_number_mobile;
    }

    /**
     * @return mixed
     */
    public function getTelephoneNumberMobile()
    {
        return $this->telephone_number_mobile;
    }

    /**
     * @param mixed $telephone_number_residence
     */
    public function setTelephoneNumberResidence($telephone_number_residence)
    {
        $this->telephone_number_residence = $telephone_number_residence;
    }

    /**
     * @return mixed
     */
    public function getTelephoneNumberResidence()
    {
        return $this->telephone_number_residence;
    }




}