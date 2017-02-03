<?php
/**
 * Language class
 *
 * @package Qualification
 * @access public
 * @author Iyngaran Iyathurai <iyngaran55@gmail.com>
 * @date 2014-07-22
 */
class Base_Model_Lib_App_Core_Qualification_Entity_Language
{

    // variables...
    private $id;
    private $language;
    private $fluency;
    private $competency;
    private $comments;
    private $employeeId;

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
     * @param mixed $competency
     */
    public function setCompetency($competency)
    {
        $this->competency = $competency;
    }

    /**
     * @return mixed
     */
    public function getCompetency()
    {
        return $this->competency;
    }

    /**
     * @param mixed $fluency
     */
    public function setFluency($fluency)
    {
        $this->fluency = $fluency;
    }

    /**
     * @return mixed
     */
    public function getFluency()
    {
        return $this->fluency;
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
     * @param mixed $language
     */
    public function setLanguage($language)
    {
        $this->language = $language;
    }

    /**
     * @return mixed
     */
    public function getLanguage()
    {
        return $this->language;
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



}
?>