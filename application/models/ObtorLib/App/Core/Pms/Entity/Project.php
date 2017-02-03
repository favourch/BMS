<?php

/**
 * Description of Project
 *
 * @author Iyngaran Iyathurai <iyngaran55@gmail.com>
 */
class Base_Model_ObtorLib_App_Core_Pms_Entity_Project {

    //put your code here
   private $id;
   private $projectName;
   private $startDate;
   private $targetendDate;
   private $actualendDate;
   private $targetBudget;
   private $projectUrl;
   private $projectStatus;
   private $projectPriority;
   private $projectType;
   private $progress;
   private $linkToAccountsContacts;
   private $projectNumber;

   public function getId() {
       return $this->id;
   }

   public function getProjectName() {
       return $this->projectName;
   }

   public function getStartDate() {
       return $this->startDate;
   }

   public function getTargetendDate() {
       return $this->targetendDate;
   }

   public function getActualendDate() {
       return $this->actualendDate;
   }

   public function getTargetBudget() {
       return $this->targetBudget;
   }

   public function getProjectUrl() {
       return $this->projectUrl;
   }

   public function getProjectStatus() {
       return $this->projectStatus;
   }

   public function getProjectPriority() {
       return $this->projectPriority;
   }

   public function getProjectType() {
       return $this->projectType;
   }

   public function getProgress() {
       return $this->progress;
   }

   public function getLinkToAccountsContacts() {
       return $this->linkToAccountsContacts;
   }

   public function getProjectNumber() {
       return $this->projectNumber;
   }

   public function setId($id) {
       $this->id = $id;
   }

   public function setProjectName($projectName) {
       $this->projectName = $projectName;
   }

   public function setStartDate($startDate) {
       $this->startDate = $startDate;
   }

   public function setTargetendDate($targetendDate) {
       $this->targetendDate = $targetendDate;
   }

   public function setActualendDate($actualendDate) {
       $this->actualendDate = $actualendDate;
   }

   public function setTargetBudget($targetBudget) {
       $this->targetBudget = $targetBudget;
   }

   public function setProjectUrl($projectUrl) {
       $this->projectUrl = $projectUrl;
   }

   public function setProjectStatus($projectStatus) {
       $this->projectStatus = $projectStatus;
   }

   public function setProjectPriority($projectPriority) {
       $this->projectPriority = $projectPriority;
   }

   public function setProjectType($projectType) {
       $this->projectType = $projectType;
   }

   public function setProgress($progress) {
       $this->progress = $progress;
   }

   public function setLinkToAccountsContacts($linkToAccountsContacts) {
       $this->linkToAccountsContacts = $linkToAccountsContacts;
   }

   public function setProjectNumber($projectNumber) {
       $this->projectNumber = $projectNumber;
   }



}