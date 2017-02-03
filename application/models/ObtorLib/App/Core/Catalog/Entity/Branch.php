<?php

/**
 * Description of Branch
 *
 * @author Iyngaran Iyathurai <iyngaran55@gmail.com>
 */
class Base_Model_ObtorLib_App_Core_Catalog_Entity_Branch {

    //put your code here

    private $id;
    private $name;
    private $region;
    private $prefix;

    public function getId() {
        return $this->id;
    }

    public function getName() {
        return $this->name;
    }

    public function getRegion() {
        return $this->region;
    }

    public function getPrefix() {
        return $this->prefix;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function setName($name) {
        $this->name = $name;
    }

    public function setRegion($region) {
        $this->region = $region;
    }

    public function setPrefix($prefix) {
        $this->prefix = $prefix;
    }



}
