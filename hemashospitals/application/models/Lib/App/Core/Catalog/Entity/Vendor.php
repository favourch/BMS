<?php

/**
 * Description of Vendor
 *
 * @author Iyngaran Iyathurai <iyngaran55@gmail.com>
 */
class Base_Model_Lib_App_Core_Catalog_Entity_Vendor {

    //put your code here

    private $id;
    private $name;
    private $address;
    private $contactNumbers;
    private $status;
    private $dateCreated;
    private $createdBy;
    private $dateModified;
    private $modifiedBy;

    /**
     * @param mixed $createdBy
     */
    public function setCreatedBy($createdBy)
    {
        $this->createdBy = $createdBy;
    }

    /**
     * @return mixed
     */
    public function getCreatedBy()
    {
        return $this->createdBy;
    }

    /**
     * @param mixed $dateCreated
     */
    public function setDateCreated($dateCreated)
    {
        $this->dateCreated = $dateCreated;
    }

    /**
     * @return mixed
     */
    public function getDateCreated()
    {
        return $this->dateCreated;
    }

    /**
     * @param mixed $dateModified
     */
    public function setDateModified($dateModified)
    {
        $this->dateModified = $dateModified;
    }

    /**
     * @return mixed
     */
    public function getDateModified()
    {
        return $this->dateModified;
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
     * @param mixed $modifiedBy
     */
    public function setModifiedBy($modifiedBy)
    {
        $this->modifiedBy = $modifiedBy;
    }

    /**
     * @return mixed
     */
    public function getModifiedBy()
    {
        return $this->modifiedBy;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    public function getAddress() {
        return $this->address;
    }

    public function getContactNumbers() {
        return $this->contactNumbers;
    }

    public function getStatus() {
        return $this->status;
    }

    public function setAddress($address) {
        $this->address = $address;
    }

    public function setContactNumbers($contactNumbers) {
        $this->contactNumbers = $contactNumbers;
    }

    public function setStatus($status) {
        $this->status = $status;
    }




}