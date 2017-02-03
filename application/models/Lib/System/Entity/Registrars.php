<?php

/**
 * @namespace       : Base
 * @package         : Model
 * @subpackage 		: Lib.Program.Entity
 * @name 			: Registrars
 * @author 			: Iyngaran Iyathurai
 * 			  		  Software eng - Bcas R&D
 * 			          E-Mail - Iyngaran55@yahoo.com, Iyngaran@bcas.lk
 *
 * @copyright Copyright (c) 2009 - 2010 BCAS R&D . (http://www.lab.bcasrd.com)
 *
 * Description : The entity class for the Registrars Object
 *
 */
class Base_Model_Lib_System_Entity_Registrars {

    // declare the propertise
    private $id;
    private $name;
    private $image_logo;
    private $description;
    private $status;
    private $username;
    private $password_2;
    private $is_test_mode;
    
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

    public function getImage_logo() {
        return $this->image_logo;
    }

    public function setImage_logo($image_logo) {
        $this->image_logo = $image_logo;
    }

    public function getDescription() {
        return $this->description;
    }

    public function setDescription($description) {
        $this->description = $description;
    }

    public function getStatus() {
        return $this->status;
    }

    public function setStatus($status) {
        $this->status = $status;
    }

    public function getUsername() {
        return $this->username;
    }

    public function setUsername($username) {
        $this->username = $username;
    }

    public function getPassword_2() {
        return $this->password_2;
    }

    public function setPassword_2($password_2) {
        $this->password_2 = $password_2;
    }

    public function getIs_test_mode() {
        return $this->is_test_mode;
    }

    public function setIs_test_mode($is_test_mode) {
        $this->is_test_mode = $is_test_mode;
    }


}