<?php
/**
 * Education class
 *
 * @package Qualification
 * @access public
 * @author Iyngaran Iyathurai <iyngaran55@gmail.com>
 * @date 2014-07-22
 */
class Base_Model_ObtorLib_App_Core_Qualification_Entity_Education
{

    // variables...
    private $id;
    private $level;
    private $institute;
    private $majorSpecialization;
    private $year;
    private $gpa;
    private $startDate;
    private $endDate;
    private $relId;
    private $relObject;
    
    /**
     * @param mixed $endDate
     */
    public function setEndDate($endDate)
    {
        $this->endDate = $endDate;
    }

    /**
     * @return mixed
     */
    public function getEndDate()
    {
        return $this->endDate;
    }

    /**
     * @param mixed $gpa
     */
    public function setGpa($gpa)
    {
        $this->gpa = $gpa;
    }

    /**
     * @return mixed
     */
    public function getGpa()
    {
        return $this->gpa;
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
     * @param mixed $institute
     */
    public function setInstitute($institute)
    {
        $this->institute = $institute;
    }

    /**
     * @return mixed
     */
    public function getInstitute()
    {
        return $this->institute;
    }

    /**
     * @param mixed $level
     */
    public function setLevel($level)
    {
        $this->level = $level;
    }

    /**
     * @return mixed
     */
    public function getLevel()
    {
        return $this->level;
    }

    /**
     * @param mixed $majorSpecialization
     */
    public function setMajorSpecialization($majorSpecialization)
    {
        $this->majorSpecialization = $majorSpecialization;
    }

    /**
     * @return mixed
     */
    public function getMajorSpecialization()
    {
        return $this->majorSpecialization;
    }

    /**
     * @param mixed $startDate
     */
    public function setStartDate($startDate)
    {
        $this->startDate = $startDate;
    }

    /**
     * @return mixed
     */
    public function getStartDate()
    {
        return $this->startDate;
    }

    /**
     * @param mixed $year
     */
    public function setYear($year)
    {
        $this->year = $year;
    }

    /**
     * @return mixed
     */
    public function getYear()
    {
        return $this->year;
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