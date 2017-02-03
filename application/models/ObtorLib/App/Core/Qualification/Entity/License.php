<?php
/**
 * License class
 *
 * @package Qualification
 * @access public
 * @author Iyngaran Iyathurai <iyngaran55@gmail.com>
 * @date 2014-07-22
 */
class Base_Model_ObtorLib_App_Core_Qualification_Entity_License
{

    // variables...
    private $id;
    private $licenseType;
    private $licenseNumber;
    private $issuedDate;
    private $expiryDate;
    private $employeeId;
    private $relId;
    private $relObject;

    /**
     * @param mixed $expiryDate
     */
    public function setExpiryDate($expiryDate)
    {
        $this->expiryDate = $expiryDate;
    }

    /**
     * @return mixed
     */
    public function getExpiryDate()
    {
        return $this->expiryDate;
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
     * @param mixed $issuedDate
     */
    public function setIssuedDate($issuedDate)
    {
        $this->issuedDate = $issuedDate;
    }

    /**
     * @return mixed
     */
    public function getIssuedDate()
    {
        return $this->issuedDate;
    }

    /**
     * @param mixed $licenseNumber
     */
    public function setLicenseNumber($licenseNumber)
    {
        $this->licenseNumber = $licenseNumber;
    }

    /**
     * @return mixed
     */
    public function getLicenseNumber()
    {
        return $this->licenseNumber;
    }

    /**
     * @param mixed $licenseType
     */
    public function setLicenseType($licenseType)
    {
        $this->licenseType = $licenseType;
    }

    /**
     * @return mixed
     */
    public function getLicenseType()
    {
        return $this->licenseType;
    }

    /**
     * @param mixed $employeeId
     */
    public function setEmployeeId($employeeId)
    {
        $this->employeeId = $employeeId;
    }

    /**
     * @return mixed
     */
    public function getEmployeeId()
    {
        return $this->employeeId;
    }


    public function getRelId() {
        return $this->relId;
    }

    public function getRelObject() {
        return $this->relObject;
    }

    public function setRelId($relId) {
        $this->relId = $relId;
    }

    public function setRelObject($relObject) {
        $this->relObject = $relObject;
    }



}
?>