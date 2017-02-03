<?php
/**
 * Skill class
 *
 * @package Qualification
 * @access public
 * @author Iyngaran Iyathurai <iyngaran55@gmail.com>
 * @date 2014-07-22
 */
class Base_Model_Lib_App_Core_Qualification_Entity_Skill
{

    // variables...
    private $id;
    private $title;
    private $yearsOfExperience;
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
     * @param mixed $title
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }

    /**
     * @return mixed
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param mixed $yearsOfExperience
     */
    public function setYearsOfExperience($yearsOfExperience)
    {
        $this->yearsOfExperience = $yearsOfExperience;
    }

    /**
     * @return mixed
     */
    public function getYearsOfExperience()
    {
        return $this->yearsOfExperience;
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