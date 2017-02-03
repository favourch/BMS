<?php

/**
 * @namespace       : Base
 * @package         : Model
 * @subpackage 		: Lib.Product.Entity
 * @name 			: Pricing
 * @author 			: Iyngaran Iyathurai
 * 			  		  Software eng - Monara IT (LTD) PVT
 * 			          E-Mail - Iyngaran55@yahoo.com, Iyngaran@bcas.lk
 *
 * @copyright Copyright (c) 2009 - 2010 Monara IT (LTD) PVT . (http://www.pluspro.com/)
 *
 * @Created on     	: 28-11-2010
 * @Modified on     : 28-11-2010
 *
 */
class Base_Model_Lib_Product_Entity_Pricing {

    //declare variables...
    private $id;
    private $type;
    private $currency;
    private $productId;
    private $monthlySetupfee;
    private $quarterlySetupfee;
    private $semiAnnuallySetupfee;
    private $annuallySetupfee;
    private $bienniallySetupfee;
    private $trienniallySetupfee;
    private $monthlyFee;
    private $quarterlyFee;
    private $semiAnnuallyFee;
    private $annuallyFee;
    private $bienniallyFee;
    private $trienniallyFee;
    
    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function getType() {
        return $this->type;
    }

    public function setType($type) {
        $this->type = $type;
    }

    public function getProductId() {
        return $this->productId;
    }

    public function setProductId($productId) {
        $this->productId = $productId;
    }

    public function getMonthlySetupfee() {
        return $this->monthlySetupfee;
    }

    public function setMonthlySetupfee($monthlySetupfee) {
        $this->monthlySetupfee = $monthlySetupfee;
    }

    public function getQuarterlySetupfee() {
        return $this->quarterlySetupfee;
    }

    public function setQuarterlySetupfee($quarterlySetupfee) {
        $this->quarterlySetupfee = $quarterlySetupfee;
    }

    public function getSemiAnnuallySetupfee() {
        return $this->semiAnnuallySetupfee;
    }

    public function setSemiAnnuallySetupfee($semiAnnuallySetupfee) {
        $this->semiAnnuallySetupfee = $semiAnnuallySetupfee;
    }

    public function getAnnuallySetupfee() {
        return $this->annuallySetupfee;
    }

    public function setAnnuallySetupfee($annuallySetupfee) {
        $this->annuallySetupfee = $annuallySetupfee;
    }

    public function getBienniallySetupfee() {
        return $this->bienniallySetupfee;
    }

    public function setBienniallySetupfee($bienniallySetupfee) {
        $this->bienniallySetupfee = $bienniallySetupfee;
    }

    public function getTrienniallySetupfee() {
        return $this->trienniallySetupfee;
    }

    public function setTrienniallySetupfee($trienniallySetupfee) {
        $this->trienniallySetupfee = $trienniallySetupfee;
    }

    public function getMonthlyFee() {
        return $this->monthlyFee;
    }

    public function setMonthlyFee($monthlyFee) {
        $this->monthlyFee = $monthlyFee;
    }

    public function getQuarterlyFee() {
        return $this->quarterlyFee;
    }

    public function setQuarterlyFee($quarterlyFee) {
        $this->quarterlyFee = $quarterlyFee;
    }

    public function getSemiAnnuallyFee() {
        return $this->semiAnnuallyFee;
    }

    public function setSemiAnnuallyFee($semiAnnuallyFee) {
        $this->semiAnnuallyFee = $semiAnnuallyFee;
    }

    public function getAnnuallyFee() {
        return $this->annuallyFee;
    }

    public function setAnnuallyFee($annuallyFee) {
        $this->annuallyFee = $annuallyFee;
    }

    public function getBienniallyFee() {
        return $this->bienniallyFee;
    }

    public function setBienniallyFee($bienniallyFee) {
        $this->bienniallyFee = $bienniallyFee;
    }

    public function getTrienniallyFee() {
        return $this->trienniallyFee;
    }

    public function setTrienniallyFee($trienniallyFee) {
        $this->trienniallyFee = $trienniallyFee;
    }

    public function getCurrency() {
        return $this->currency;
    }

    public function setCurrency($currency) {
        $this->currency = $currency;
    }



}
?>
