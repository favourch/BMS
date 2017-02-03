<?php
/**
 * @namespace       : Base
 * @package         : Model
 * @subpackage 		: Lib.Program.Entity
 * @name 			: Server
 * @author 			: Iyngaran Iyathurai
 * 			  		  Software eng - Bcas R&D
 * 			          E-Mail - Iyngaran55@yahoo.com, Iyngaran@bcas.lk
 *
 * @copyright Copyright (c) 2009 - 2010 BCAS R&D . (http://www.lab.bcasrd.com)
 *
 * Description : The entity class for the Server Object
 *
 */
class Base_Model_Lib_System_Entity_Server {

	// declare the propertise
	private $id;
        private $name;
        private $ipaddress;
        private $assignedips;
        private $hostname;
        private $monthlycost;
        private $noc;
        private $statusaddress;
        private $nameserver1;
        private $nameserver1ip;
        private $nameserver2;
        private $nameserver2ip;
        private $nameserver3;
        private $nameserver3ip;
        private $nameserver4;
        private $nameserver4ip;
        private $nameserver5;
        private $nameserver5ip;
        private $maxaccounts;
        private $type;
        private $username;
        private $password;
        private $accesshash;
        private $secure;
        private $active;
        private $disabled;
        
        public function getId() {
            return $this->id;
        }

        public function setId($id) {
            $this->id = $id;
        }

        public function getName() {
            return $this->name;
        }

        public function setName($name) {
            $this->name = $name;
        }

        public function getIpaddress() {
            return $this->ipaddress;
        }

        public function setIpaddress($ipaddress) {
            $this->ipaddress = $ipaddress;
        }

        public function getAssignedips() {
            return $this->assignedips;
        }

        public function setAssignedips($assignedips) {
            $this->assignedips = $assignedips;
        }

        public function getHostname() {
            return $this->hostname;
        }

        public function setHostname($hostname) {
            $this->hostname = $hostname;
        }

        public function getMonthlycost() {
            return $this->monthlycost;
        }

        public function setMonthlycost($monthlycost) {
            $this->monthlycost = $monthlycost;
        }

        public function getNoc() {
            return $this->noc;
        }

        public function setNoc($noc) {
            $this->noc = $noc;
        }

        public function getStatusaddress() {
            return $this->statusaddress;
        }

        public function setStatusaddress($statusaddress) {
            $this->statusaddress = $statusaddress;
        }

        public function getNameserver1() {
            return $this->nameserver1;
        }

        public function setNameserver1($nameserver1) {
            $this->nameserver1 = $nameserver1;
        }

        public function getNameserver1ip() {
            return $this->nameserver1ip;
        }

        public function setNameserver1ip($nameserver1ip) {
            $this->nameserver1ip = $nameserver1ip;
        }

        public function getNameserver2() {
            return $this->nameserver2;
        }

        public function setNameserver2($nameserver2) {
            $this->nameserver2 = $nameserver2;
        }

        public function getNameserver2ip() {
            return $this->nameserver2ip;
        }

        public function setNameserver2ip($nameserver2ip) {
            $this->nameserver2ip = $nameserver2ip;
        }

        public function getNameserver3() {
            return $this->nameserver3;
        }

        public function setNameserver3($nameserver3) {
            $this->nameserver3 = $nameserver3;
        }

        public function getNameserver3ip() {
            return $this->nameserver3ip;
        }

        public function setNameserver3ip($nameserver3ip) {
            $this->nameserver3ip = $nameserver3ip;
        }

        public function getNameserver4() {
            return $this->nameserver4;
        }

        public function setNameserver4($nameserver4) {
            $this->nameserver4 = $nameserver4;
        }

        public function getNameserver4ip() {
            return $this->nameserver4ip;
        }

        public function setNameserver4ip($nameserver4ip) {
            $this->nameserver4ip = $nameserver4ip;
        }

        public function getNameserver5() {
            return $this->nameserver5;
        }

        public function setNameserver5($nameserver5) {
            $this->nameserver5 = $nameserver5;
        }

        public function getNameserver5ip() {
            return $this->nameserver5ip;
        }

        public function setNameserver5ip($nameserver5ip) {
            $this->nameserver5ip = $nameserver5ip;
        }

        public function getMaxaccounts() {
            return $this->maxaccounts;
        }

        public function setMaxaccounts($maxaccounts) {
            $this->maxaccounts = $maxaccounts;
        }

        public function getType() {
            return $this->type;
        }

        public function setType($type) {
            $this->type = $type;
        }

        public function getUsername() {
            return $this->username;
        }

        public function setUsername($username) {
            $this->username = $username;
        }

        public function getPassword() {
            return $this->password;
        }

        public function setPassword($password) {
            $this->password = $password;
        }

        public function getAccesshash() {
            return $this->accesshash;
        }

        public function setAccesshash($accesshash) {
            $this->accesshash = $accesshash;
        }

        public function getSecure() {
            return $this->secure;
        }

        public function setSecure($secure) {
            $this->secure = $secure;
        }

        public function getActive() {
            return $this->active;
        }

        public function setActive($active) {
            $this->active = $active;
        }

        public function getDisabled() {
            return $this->disabled;
        }

        public function setDisabled($disabled) {
            $this->disabled = $disabled;
        }


}