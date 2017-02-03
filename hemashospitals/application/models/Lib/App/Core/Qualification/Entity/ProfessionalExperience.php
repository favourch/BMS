<?php
/**
 * ProfessionalExperience class
 *
 * @package Qualification
 * @access public
 * @author Iyngaran Iyathurai <iyngaran55@gmail.com>
 * @date 2014-07-22
 */
class Base_Model_Lib_App_Core_Qualification_Entity_ProfessionalExperience
{

    // variables...
    private $id;
    private $companyName;
    private $jobTitle;
    private $fromDate;
    private $toDate;
    private $comments;
    private $relId;
    private $relObject;

    /**
     * @param mixed $comments
     */
    public function setComments($comments)
    {
        $this->comments = $comments;
    }

    /**
     * @return mixed
     */
    public function getComments()
    {
        return $this->comments;
    }

    /**
     * @param mixed $companyName
     */
    public function setCompanyName($companyName)
    {
        $this->companyName = $companyName;
    }

    /**
     * @return mixed
     */
    public function getCompanyName()
    {
        return $this->companyName;
    }

    /**
     * @param mixed $fromDate
     */
    public function setFromDate($fromDate)
    {
        $this->fromDate = $fromDate;
    }

    /**
     * @return mixed
     */
    public function getFromDate()
    {
        return $this->fromDate;
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
     * @param mixed $jobTitle
     */
    public function setJobTitle($jobTitle)
    {
        $this->jobTitle = $jobTitle;
    }

    /**
     * @return mixed
     */
    public function getJobTitle()
    {
        return $this->jobTitle;
    }

    /**
     * @param mixed $toDate
     */
    public function setToDate($toDate)
    {
        $this->toDate = $toDate;
    }

    /**
     * @return mixed
     */
    public function getToDate()
    {
        return $this->toDate;
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