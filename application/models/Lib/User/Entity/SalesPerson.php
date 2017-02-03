<?php

/**
 * @namespace       : Base
 * @package         : Model
 * @subpackage 		: Lib.User.Entity
 * @name 			: SalesPerson
 * @author 			: Iyngaran Iyathurai
 * 			  		  Software eng - Bcas R&D
 * 			          E-Mail - Iyngaran55@yahoo.com, Iyngaran@bcas.lk
 * 
 * @copyright Copyright (c) 2009 - 2010 BCAS R&D . (http://www.lab.bcasrd.com)
 * 
 * Description : The entity class for the User Object 
 * 	
 */
class Base_Model_Lib_User_Entity_SalesPerson {

    // declare the user propertise
    private $id;
    private $firstName = "";
    private $lastName  = "";
    private $salesRole = "";
    private $notes = "";
    private $status = "";
    private $active = "";
    private $salecomm = "";
    private $recurcomm = "";
    private $address = "";
    private $address_line_2 = "";
    private $town = "";
    private $county = "";
    private $post_code = "";
    private $leadCommission = "";
    
    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function getFirstName() {
        return $this->firstName;
    }

    public function setFirstName($firstName) {
        $this->firstName = $firstName;
    }

    public function getLastName() {
        return $this->lastName;
    }

    public function setLastName($lastName) {
        $this->lastName = $lastName;
    }

    public function getSalesRole() {
        return $this->salesRole;
    }

    public function setSalesRole($salesRole) {
        $this->salesRole = $salesRole;
    }

    public function getNotes() {
        return $this->notes;
    }

    public function setNotes($notes) {
        $this->notes = $notes;
    }

    public function getStatus() {
        return $this->status;
    }

    public function setStatus($status) {
        $this->status = $status;
    }

    public function getActive() {
        return $this->active;
    }

    public function setActive($active) {
        $this->active = $active;
    }

    public function getSalecomm() {
        return $this->salecomm;
    }

    public function setSalecomm($salecomm) {
        $this->salecomm = $salecomm;
    }

    public function getRecurcomm() {
        return $this->recurcomm;
    }

    public function setRecurcomm($recurcomm) {
        $this->recurcomm = $recurcomm;
    }

    public function getAddress() {
        return $this->address;
    }

    public function setAddress($address) {
        $this->address = $address;
    }

    public function getAddress_line_2() {
        return $this->address_line_2;
    }

    public function setAddress_line_2($address_line_2) {
        $this->address_line_2 = $address_line_2;
    }

    public function getTown() {
        return $this->town;
    }

    public function setTown($town) {
        $this->town = $town;
    }

    public function getCounty() {
        return $this->county;
    }

    public function setCounty($county) {
        $this->county = $county;
    }

    public function getPost_code() {
        return $this->post_code;
    }

    public function setPost_code($post_code) {
        $this->post_code = $post_code;
    }

    public function getLeadCommission() {
        return $this->leadCommission;
    }

    public function setLeadCommission($leadCommission) {
        $this->leadCommission = $leadCommission;
    }


    
}
?>