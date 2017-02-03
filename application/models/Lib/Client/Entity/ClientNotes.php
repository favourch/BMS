<?php

/**
 * @namespace       : Base
 * @package         : Model
 * @subpackage 		: Lib.User.Entity
 * @name 			: User
 * @author 			: Iyngaran Iyathurai
 * 			  		  Software eng - Bcas R&D
 * 			          E-Mail - Iyngaran55@yahoo.com, Iyngaran@bcas.lk
 * 
 * @copyright Copyright (c) 2009 - 2010 BCAS R&D . (http://www.lab.bcasrd.com)
 * 
 * Description : The entity class for the User Object 
 * 	
 */
class Base_Model_Lib_Client_Entity_ClientNotes {

    // declare the user propertise
    private $id;
    private $client;
    private $admin;
    private $created;
    private $modified;
    private $notes;
    private $sticky;
    
    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function getClient() {
        return $this->client;
    }

    public function setClient($client) {
        $this->client = $client;
    }

    public function getAdmin() {
        return $this->admin;
    }

    public function setAdmin($admin) {
        $this->admin = $admin;
    }

    public function getCreated() {
        return $this->created;
    }

    public function setCreated($created) {
        $this->created = $created;
    }

    public function getModified() {
        return $this->modified;
    }

    public function setModified($modified) {
        $this->modified = $modified;
    }

    public function getNotes() {
        return $this->notes;
    }

    public function setNotes($notes) {
        $this->notes = $notes;
    }

    public function getSticky() {
        return $this->sticky;
    }

    public function setSticky($sticky) {
        $this->sticky = $sticky;
    }


}
?>