<?php
/**
 * Description of Log
 *
 * @author anushiya
 */
class Base_Model_ObtorLib_App_Core_System_Entity_Log {
    
    private $id;
    private $tableName;
    private $rowId;
    private $action;
    private $actionDate;
    private $logMessage;
    private $userDisplayName;
    private $userId;
    private $userType;
    private $ipAddress;
    
    public function getId() {
        return $this->id;
    }

    public function getTableName() {
        return $this->tableName;
    }

    public function getRowId() {
        return $this->rowId;
    }

    public function getAction() {
        return $this->action;
    }

    public function getActionDate() {
        return $this->actionDate;
    }

    public function getLogMessage() {
        return $this->logMessage;
    }

    public function getUserDisplayName() {
        return $this->userDisplayName;
    }

    public function getUserId() {
        return $this->userId;
    }

    public function getUserType() {
        return $this->userType;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function setTableName($tableName) {
        $this->tableName = $tableName;
    }

    public function setRowId($rowId) {
        $this->rowId = $rowId;
    }

    public function setAction($action) {
        $this->action = $action;
    }

    public function setActionDate($actionDate) {
        $this->actionDate = $actionDate;
    }

    public function setLogMessage($logMessage) {
        $this->logMessage = $logMessage;
    }

    public function setUserDisplayName($userDisplayName) {
        $this->userDisplayName = $userDisplayName;
    }

    public function setUserId($userId) {
        $this->userId = $userId;
    }

    public function setUserType($userType) {
        $this->userType = $userType;
    }

    public function getIpAddress() {
        return $this->ipAddress;
    }

    public function setIpAddress($ipAddress) {
        $this->ipAddress = $ipAddress;
    }


}
