<?php
/**
 * Created by PhpStorm.
 * User: ism-apac
 * Date: 8/7/14
 * Time: 3:26 PM
 */

class Base_Model_ObtorLib_App_Core_Asset_Entity_Asset {


    private $id;
    private $assetType;
    private $tagNumber;
    private $description;
    private $category;
    private $vendor;
    private $model;
    private $serialNumber;
    private $barcode;
    private $dateAcquired;
    private $dateDisposed;
    private $country;
    private $region;
    private $branch;
    private $department;
    private $currentUser;
    private $priviousUser;
    private $status;
    private $lastMaintenanceDate;
    private $nextMaintenanceDate;
    private $purchasedDate;
    private $cost;
    private $purchasedFrom;
    private $attachedInvoice;
    private $itemPicture;
    private $warrantyValiedUntil;
    private $dateCreated;
    private $createdBy;
    private $dateModified;
    private $modifiedBy;

    /**
     * @param mixed $assetType
     */
    public function setAssetType($assetType)
    {
        $this->assetType = $assetType;
    }

    /**
     * @return mixed
     */
    public function getAssetType()
    {
        return $this->assetType;
    }

    /**
     * @param mixed $attachedInvoice
     */
    public function setAttachedInvoice($attachedInvoice)
    {
        $this->attachedInvoice = $attachedInvoice;
    }

    /**
     * @return mixed
     */
    public function getAttachedInvoice()
    {
        return $this->attachedInvoice;
    }

    /**
     * @param mixed $barcode
     */
    public function setBarcode($barcode)
    {
        $this->barcode = $barcode;
    }

    /**
     * @return mixed
     */
    public function getBarcode()
    {
        return $this->barcode;
    }

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
     * @param mixed $category
     */
    public function setCategory($category)
    {
        $this->category = $category;
    }

    /**
     * @return mixed
     */
    public function getCategory()
    {
        return $this->category;
    }

    /**
     * @param mixed $cost
     */
    public function setCost($cost)
    {
        $this->cost = $cost;
    }

    /**
     * @return mixed
     */
    public function getCost()
    {
        return $this->cost;
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
     * @param mixed $currentUser
     */
    public function setCurrentUser($currentUser)
    {
        $this->currentUser = $currentUser;
    }

    /**
     * @return mixed
     */
    public function getCurrentUser()
    {
        return $this->currentUser;
    }

    /**
     * @param mixed $dateAcquired
     */
    public function setDateAcquired($dateAcquired)
    {
        $this->dateAcquired = $dateAcquired;
    }

    /**
     * @return mixed
     */
    public function getDateAcquired()
    {
        return $this->dateAcquired;
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
     * @param mixed $dateDisposed
     */
    public function setDateDisposed($dateDisposed)
    {
        $this->dateDisposed = $dateDisposed;
    }

    /**
     * @return mixed
     */
    public function getDateDisposed()
    {
        return $this->dateDisposed;
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
     * @param mixed $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

    /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
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
     * @param mixed $itemPicture
     */
    public function setItemPicture($itemPicture)
    {
        $this->itemPicture = $itemPicture;
    }

    /**
     * @return mixed
     */
    public function getItemPicture()
    {
        return $this->itemPicture;
    }

    /**
     * @param mixed $lastMaintenanceDate
     */
    public function setLastMaintenanceDate($lastMaintenanceDate)
    {
        $this->lastMaintenanceDate = $lastMaintenanceDate;
    }

    /**
     * @return mixed
     */
    public function getLastMaintenanceDate()
    {
        return $this->lastMaintenanceDate;
    }

    /**
     * @param mixed $model
     */
    public function setModel($model)
    {
        $this->model = $model;
    }

    /**
     * @return mixed
     */
    public function getModel()
    {
        return $this->model;
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
     * @param mixed $nextMaintenanceDate
     */
    public function setNextMaintenanceDate($nextMaintenanceDate)
    {
        $this->nextMaintenanceDate = $nextMaintenanceDate;
    }

    /**
     * @return mixed
     */
    public function getNextMaintenanceDate()
    {
        return $this->nextMaintenanceDate;
    }

    /**
     * @param mixed $priviousUser
     */
    public function setPriviousUser($priviousUser)
    {
        $this->priviousUser = $priviousUser;
    }

    /**
     * @return mixed
     */
    public function getPriviousUser()
    {
        return $this->priviousUser;
    }

    /**
     * @param mixed $purchasedDate
     */
    public function setPurchasedDate($purchasedDate)
    {
        $this->purchasedDate = $purchasedDate;
    }

    /**
     * @return mixed
     */
    public function getPurchasedDate()
    {
        return $this->purchasedDate;
    }

    /**
     * @param mixed $purchasedFrom
     */
    public function setPurchasedFrom($purchasedFrom)
    {
        $this->purchasedFrom = $purchasedFrom;
    }

    /**
     * @return mixed
     */
    public function getPurchasedFrom()
    {
        return $this->purchasedFrom;
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
     * @param mixed $serialNumber
     */
    public function setSerialNumber($serialNumber)
    {
        $this->serialNumber = $serialNumber;
    }

    /**
     * @return mixed
     */
    public function getSerialNumber()
    {
        return $this->serialNumber;
    }

    /**
     * @param mixed $status
     */
    public function setStatus($status)
    {
        $this->status = $status;
    }

    /**
     * @return mixed
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @param mixed $tagNumber
     */
    public function setTagNumber($tagNumber)
    {
        $this->tagNumber = $tagNumber;
    }

    /**
     * @return mixed
     */
    public function getTagNumber()
    {
        return $this->tagNumber;
    }

    /**
     * @param mixed $vendor
     */
    public function setVendor($vendor)
    {
        $this->vendor = $vendor;
    }

    /**
     * @return mixed
     */
    public function getVendor()
    {
        return $this->vendor;
    }

    /**
     * @param mixed $warrantyValiedUntil
     */
    public function setWarrantyValiedUntil($warrantyValiedUntil)
    {
        $this->warrantyValiedUntil = $warrantyValiedUntil;
    }

    /**
     * @return mixed
     */
    public function getWarrantyValiedUntil()
    {
        return $this->warrantyValiedUntil;
    }



}