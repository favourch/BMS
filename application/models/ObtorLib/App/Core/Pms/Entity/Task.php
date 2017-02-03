<?php

/**
 * Description of Task
 *
 * @author Iyngaran Iyathurai <iyngaran55@gmail.com>
 */
class Base_Model_ObtorLib_App_Core_Pms_Entity_Task {

    //put your code here
   private $id;
   private $name;
   private $description;
   private $taskType;
   private $priority;
   private $progress;
   private $allocatedHours;
   private $hoursSpent;
   private $startDate;
   private $endDate;
   private $projectId;
   private $assignedTo;
   private $currentStatus;
   
   public function getId() {
       return $this->id;
   }

   public function getName() {
       return $this->name;
   }

   public function getDescription() {
       return $this->description;
   }

   public function getTaskType() {
       return $this->taskType;
   }

   public function getPriority() {
       return $this->priority;
   }

   public function getProgress() {
       return $this->progress;
   }

   public function getAllocatedHours() {
       return $this->allocatedHours;
   }

   public function getHoursSpent() {
       return $this->hoursSpent;
   }

   public function getStartDate() {
       return $this->startDate;
   }

   public function getEndDate() {
       return $this->endDate;
   }

   public function getProjectId() {
       return $this->projectId;
   }

   public function getAssignedTo() {
       return $this->assignedTo;
   }

   public function getCurrentStatus() {
       return $this->currentStatus;
   }

   public function setId($id) {
       $this->id = $id;
   }

   public function setName($name) {
       $this->name = $name;
   }

   public function setDescription($description) {
       $this->description = $description;
   }

   public function setTaskType($taskType) {
       $this->taskType = $taskType;
   }

   public function setPriority($priority) {
       $this->priority = $priority;
   }

   public function setProgress($progress) {
       $this->progress = $progress;
   }

   public function setAllocatedHours($allocatedHours) {
       $this->allocatedHours = $allocatedHours;
   }

   public function setHoursSpent($hoursSpent) {
       $this->hoursSpent = $hoursSpent;
   }

   public function setStartDate($startDate) {
       $this->startDate = $startDate;
   }

   public function setEndDate($endDate) {
       $this->endDate = $endDate;
   }

   public function setProjectId($projectId) {
       $this->projectId = $projectId;
   }

   public function setAssignedTo($assignedTo) {
       $this->assignedTo = $assignedTo;
   }

   public function setCurrentStatus($currentStatus) {
       $this->currentStatus = $currentStatus;
   }


   
}