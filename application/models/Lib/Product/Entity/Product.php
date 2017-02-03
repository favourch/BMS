<?php
/**
 * @namespace       : Base
 * @package         : Model
 * @subpackage 		: Lib.Product.Entity
 * @name 			: Product
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
class Base_Model_Lib_Product_Entity_Product {

	//declare variables...
	private $id;
        private $productType;
        private $productGroup;
        private $productName;
        private $productDescription;
        private $isHidden;
        private $showdomainoptions;
        private $welcomeemail;
        private $stockcontrol;
        private $productQty;
        private $paytype;
        private $allowqty;
        private $recurringcycles;
        private $tax;
        private $downloads;
        private $sortOrder;
        private $isRetired;
        private $productPrices;
        private $hasAdmin;
        private $cPanelPackage;
        

        public function getId() {
            return $this->id;
        }

        public function setId($id) {
            $this->id = $id;
        }

        public function getProductType() {
            return $this->productType;
        }

        public function setProductType($productType) {
            $this->productType = $productType;
        }

        public function getProductGroup() {
            return $this->productGroup;
        }

        public function setProductGroup($productGroup) {
            $this->productGroup = $productGroup;
        }

        public function getProductName() {
            return $this->productName;
        }

        public function setProductName($productName) {
            $this->productName = $productName;
        }

        public function getProductDescription() {
            return $this->productDescription;
        }

        public function setProductDescription($productDescription) {
            $this->productDescription = $productDescription;
        }

        public function getIsHidden() {
            return $this->isHidden;
        }

        public function setIsHidden($isHidden) {
            $this->isHidden = $isHidden;
        }

        public function getShowdomainoptions() {
            return $this->showdomainoptions;
        }

        public function setShowdomainoptions($showdomainoptions) {
            $this->showdomainoptions = $showdomainoptions;
        }

        public function getWelcomeemail() {
            return $this->welcomeemail;
        }

        public function setWelcomeemail($welcomeemail) {
            $this->welcomeemail = $welcomeemail;
        }

        public function getStockcontrol() {
            return $this->stockcontrol;
        }

        public function setStockcontrol($stockcontrol) {
            $this->stockcontrol = $stockcontrol;
        }

        public function getProductQty() {
            return $this->productQty;
        }

        public function setProductQty($productQty) {
            $this->productQty = $productQty;
        }

        public function getPaytype() {
            return $this->paytype;
        }

        public function setPaytype($paytype) {
            $this->paytype = $paytype;
        }

        public function getAllowqty() {
            return $this->allowqty;
        }

        public function setAllowqty($allowqty) {
            $this->allowqty = $allowqty;
        }

        public function getRecurringcycles() {
            return $this->recurringcycles;
        }

        public function setRecurringcycles($recurringcycles) {
            $this->recurringcycles = $recurringcycles;
        }

        public function getTax() {
            return $this->tax;
        }

        public function setTax($tax) {
            $this->tax = $tax;
        }

        public function getDownloads() {
            return $this->downloads;
        }

        public function setDownloads($downloads) {
            $this->downloads = $downloads;
        }

        public function getSortOrder() {
            return $this->sortOrder;
        }

        public function setSortOrder($sortOrder) {
            $this->sortOrder = $sortOrder;
        }

        public function getIsRetired() {
            return $this->isRetired;
        }

        public function setIsRetired($isRetired) {
            $this->isRetired = $isRetired;
        }

        public function getProductPrices() {
            return $this->productPrices;
        }

        public function setProductPrices($productPrices) {
            $this->productPrices = $productPrices;
        }

        public function getHasAdmin() {
            return $this->hasAdmin;
        }

        public function setHasAdmin($hasAdmin) {
            $this->hasAdmin = $hasAdmin;
        }
        
        public function getCPanelPackage() {
            return $this->cPanelPackage;
        }

        public function setCPanelPackage($cPanelPackage) {
            $this->cPanelPackage = $cPanelPackage;
        }


}
?>